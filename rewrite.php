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
	$f = file_get_contents($path); 
	$o = getDOMO($f);
	$body = $o->getElementsByTagName('body')->item(0);
	$p    = $o->createElement('p', 'hikw');
	$p->setAttribute('style', 'position: absolute; margin-bottom: 10ex;');
	$body->insertBefore($p, $body->firstChild);
	
	
	echo($o->saveHTML()); //  Date Modified and Etag
	return;
    }
    
}

new pacer_rewrite();
