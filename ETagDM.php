<?php

require_once('/opt/kwynn/kwutils.php');

class ETagDM {
	
	const minHash =  32;
	const maxHash = 128;
	const minTS   = 600000000; // timestamp somewhat before the development of the WWW
	const maxFutureTS = 200000; // we'll allow for over a day due to timezone weirdness and such
	
	public static function doHeaders($tin, $ts) {
		self::et($tin);
		self::dm($ts);
	}
	
	public static function et($tin) {
		kwas($tin, 'ETag false');
		kwas(is_string($tin), 'non string ETag');
		if (self::doETHash($tin)) return;
		kwas(self::doETHash(md5($tin)), 'md5 ETag fail');
	}
	
	public static function doETHash($tin) {
		try {
			kwas(!isset($tin[self::maxHash]), 'ETag too big');
			kwas($tin && is_string($tin), 'ETag - tin must be string and truthy');
			$len = strlen($tin);
			kwas($len >= self::minHash && $len <= self::maxHash, 'ETag bad size');
			kwas(preg_match('/^[A-Za-z0-9]+$/', $tin), 'not a hash ETag');
			header('ETag: ' . '"' . $tin . '"');
			return TRUE;
		} catch(Exception $ex) { }
		
		return FALSE;
	}
	
	public static function dm($ts) {
		kwas($ts && is_integer($ts) && $ts > self::minTS && $ts < (time() + self::maxFutureTS), 'bad timestamp UNIX Epoch, web era');
		header("Last-Modified: " . dateTZ("D, d M Y H:i:s", $ts, 'GMT') . " GMT");
	}
}
