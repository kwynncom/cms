<?php

require_once(__DIR__ . '/../utils/getFiles.php');
require_once(__DIR__ . '/../dat/vis.php');

class ht10 {
	
	const maxdlen = 41;
	const ddatef  = 'm/d/y H:i';

	public function __construct() { 
		$this->isad = $isad = isKwGoo();
		$this->isav = $isav = fileVis::isAdminOn();
		$paths = $isad && $isav ? sortSiteByTime::getPaths() : fileVis::getVis();
		$this->ht10($paths);
	}
	
	private function ht10($theps) {
		require_once(__DIR__ . '/ht03_top.html');
		require_once('ht05_frag.php');
		require_once('ht10_frag10.php');
		require_once(__DIR__ . '/ht90_bottom.html');
	}
	
	public static function cutp($p) {
		return substr($p, 0, self::maxdlen);
	}
	
	
}

new ht10();

