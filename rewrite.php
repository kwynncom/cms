<?php

require_once('/opt/kwynn/kwutils.php');
require_once('ETagDM.php');

class pacer_rewrite {
	public function __construct() {	$this->p10();   }
    
    private static function getPaths($fn) {

		$tp = __DIR__                . '/template.html';

		if (isAWS() || 1) return ['template' => $tp, 'dat' => __DIR__ .               '/dat/' . $fn];
		// else         return ['template' => $tp, 'dat' => __DIR__ . '/../pacer' . '/dat/' . $fn];
    }
    
    private function p10() {
		$u = $_SERVER['REQUEST_URI'];
		preg_match('/\/([^\/]+\.html)/', $u, $m);
		if (isset($m[1])) $this->p20($m[1]);
		return;
    }
    
    private function p20($fn) {
	
		$paths = self::getPaths($fn);

		$etp = '';
		
		$path = $paths['dat'];
		$ts10 = filemtime($path);
		$etp .= $path . $ts10;
		$fo = file_get_contents($path); 
		$oo = getDOMO($fo);
		$tp = $paths['template'];
		$ts20 = filemtime($tp);
		$etp .= $tp . $ts20;
		$fn = file_get_contents($tp);
		$on = getDOMO($fn);
		$content = $oo->getElementById('cmecfMainContent');
		$imp = $on->importNode($content, 1);
		$on->getElementById('pacerParent')->appendChild($imp);

		ETagDM::doHeaders($etp, max($ts20, $ts10));
		
		echo($on->saveHTML()); //  Date Modified and Etag
		return;
    }
   
}

new pacer_rewrite();
