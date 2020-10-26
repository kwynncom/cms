<?php

require_once('/opt/kwynn/kwutils.php');

class pacer_rewrite {
    public function __construct() {
	$this->p10();
    }
    
    private function p10() {
	$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	$u = $_SERVER['REQUEST_URI'];
	preg_match('/\/([^\/]+\.html)/', $u, $m);
	return;
    }
    
}

new pacer_rewrite();

