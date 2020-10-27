<?php

require_once('/opt/kwynn/kwutils.php');

class pacer_rewrite {
    public function __construct() {
	$this->p10();
    }
    
    private function p10() {
	// $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	$u = $_SERVER['REQUEST_URI'];
	preg_match('/\/([^\/]+\.html)/', $u, $m);
	if (isset($m[1])) $this->p20($m[1]);
	return;
    }
    
    private function p20($fn) {
	$path = __DIR__ . '/' . 'dat/' . $fn;
	$fo = file_get_contents($path); 
	$oo = getDOMO($fo);
	$fn = file_get_contents(__DIR__ . '/template.html');
	$on = getDOMO($fn);
	$content = $oo->getElementById('cmecfMainContent');
	// $clone = $content->cloneNode(true);
	$imp = $on->importNode($content, 1);
	$on->getElementById('theBody')->appendChild($imp);
	
	
	echo($on->saveHTML()); //  Date Modified and Etag
	return;
    }
    
}

new pacer_rewrite();
