<?php

require_once('/opt/kwynn/kwutils.php');

class cookies {
	
	public function __construct() {
		$this->procIn();
		require_once('frag10.php');		
	}
	
	private function procIn() {
		$in = kwjssrp();
		return;
	}
	
	
	private function exp() {
		$ha = headers_list(); // indexed 0, 1, ...
		$sck =  'Set-Cookie: ';
		$sckl = strlen($sck);
		foreach($ha as $r) {
			if (strpos($r, $sck) === false) continue;
			$r = substr($r, $sckl);
			preg_match('/[^;=]+/', $r, $mnm);
			preg_match('/expires=([^;]+)/', $r, $mex);
			continue;
		}
	}
}

new cookies();
