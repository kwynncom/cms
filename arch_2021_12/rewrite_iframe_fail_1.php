<?php

require_once('/opt/kwynn/kwutils.php');
require_once('ETagDM.php');

class pacer_rewrite {
	public function __construct() {	$this->p10();   }
    
    private static function getPaths($url, $fn) {

		$tp = __DIR__                . '/template.php';

		if (isAWS() || 1) return ['template' => $tp, 'datf' => './dat/' . $fn, 'datu' => $url];
		// else         return ['template' => $tp, 'dat' => __DIR__ . '/../pacer' . '/dat/' . $fn];
    }
    
    private function p10() {
		$u = $_SERVER['REQUEST_URI'];
		preg_match('/\/([^\/]+\.html)/', $u, $m);
		if (isset($m[1])) $this->p20($u, $m[1]);
		return;
    }
    
    private function p20($url, $fn) {
	
		$paths = self::getPaths($url, $fn);

		$etp = '';
		
		$path = $paths['datf'];
		$ts10 = filemtime($path);
		$tp = $paths['template'];
		$ts20 = filemtime($tp);
		$tsmax = max($ts20, $ts10);
		
		ETagDM::exit304IfTS($tsmax);
		
		$etp .= $path . $ts10;
		$etp .= $tp . $ts20;
		
		ETagDM::doHeaders($etp, $tsmax);
		
		self::req($url, $tp);
		
		return;
    }
	
	private static function req($pacerPath, $tp) {
		require_once($tp);
		exit(0); // ****
	}
   
}

new pacer_rewrite();
