<?php

require_once('/opt/kwynn/kwutils.php');

class pacer_rewrite {
    public function __construct() {
	$this->p10();
    }
    
    private static function getPaths($fn) {
	
	$tp = __DIR__                . '/template.html';
	
	if (isAWS()) return ['template' => $tp, 'dat' => __DIR__ .               '/dat/' . $fn];
	else         return ['template' => $tp, 'dat' => __DIR__ . '/../pacer' . '/dat/' . $fn];
    }
    
    private function p10() {
	// $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	$u = $_SERVER['REQUEST_URI'];
	preg_match('/\/([^\/]+\.html)/', $u, $m);
	if (isset($m[1])) $this->p20($m[1]);
	return;
    }
    
    private function p20($fn) {
	
	$paths = self::getPaths($fn);
	
	$path = $paths['dat'];
	$fo = file_get_contents($path); 
	$oo = getDOMO($fo);
	$tp = $paths['template'];
	$fn = file_get_contents($tp);
	$on = getDOMO($fn);
	$content = $oo->getElementById('cmecfMainContent');
	// $clone = $content->cloneNode(true);
	$imp = $on->importNode($content, 1);
	$on->getElementById('pacerParent')->appendChild($imp);
	
	
	echo($on->saveHTML()); //  Date Modified and Etag
	return;
    }
    
}

new pacer_rewrite();
