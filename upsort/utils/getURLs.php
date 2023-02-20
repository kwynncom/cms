<?php

require_once('getFiles.php');
require_once(dr() . '/t/23/02/webhook_git/pull/get.php');

class getAllUpPgURLs {
	public static function get() { 
		$f = getSiteFiles::get();
		$u = GitGet::get();
		self::normUs($u);
		$a = kwam($f, $u);
		usort($a, ['self', 'sortAndProcess']);
		return $a;
	}
	
	public static function normUs(&$a) {
		foreach($a as $i => $ignore) self::normU($a[$i]);
	}
	
	private static function sortAndProcess(array $a, array $b) {
		return $b['U'] - $a['U'];
	}
	
	private static function normU(&$a) {
		if (!isset($a['U'])) $a['U'] = $a['pushed_at_U'];
		if ($a['_id'][0] !== '/') $a['_id'] = $a['html_url'];
		if (!isset($a['p'])) $a['p'] = $a['_id'];
	}
}

if (didCLICallMe(__FILE__)) getAllUpPgURLs::get();
