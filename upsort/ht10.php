<?php

require_once('getFiles.php');

class ht10 {
	
	const maxdlen = 41;
	const ddatef  = 'm/d/y H:i';

	public function __construct() { 
		$this->ht10(sortSiteByTime::getPaths());
	}
	
	private function ht10($theps) {
		require_once(__DIR__ . '/html/top.html');
		require_once('frag10.php');
		require_once(__DIR__ . '/html/bottom.html');
	}
	
	public static function cutp($p) {
		return substr($p, 0, self::maxdlen);
		
	}
}

new ht10();

