<?php

require_once(__DIR__ . '/../utils/getFiles.php');
require_once(__DIR__ . '/../dat/vis.php');

class ht10 {
	
	const maxdlen = 41;
	const ddatef  = 'm/d/y H:i';

	public function __construct() { 
		$paths = isKwGoo() ? sortSiteByTime::getPaths() : fileVis::getVis();
		$this->ht10($paths);
	}
	
	private function ht10($theps) {
		require_once(__DIR__ . '/top.html');
		require_once('ht05.php');
		require_once('ht10_frag10.php');
	}
	
	public static function cutp($p) {
		return substr($p, 0, self::maxdlen);
	}
	
	
}

new ht10();

