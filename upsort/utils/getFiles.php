<?php 

require_once('/opt/kwynn/isKwGoo.php');


class getSiteFiles {
	
	const minDate = 1270400000; // 1270400000 === Sun Apr 04 2010 12:53:20 GMT-0400 (Eastern Daylight Time)
	private  array $thedat;
	private readonly string $droot;
	private readonly array $therawa;
	

public static function get() {
	$o = new self();
	return $o->getPathsI();
}

private function getPathsI() : array 
{ 
	return kwifs($this, 'thedat', ['kwiff' => []]);

}

private function __construct() {
	$this->set10();
	$this->p20();
	$this->doHT();
}

private function set10() {
	$this->droot = $root = dr();
	// -L follow symlinks
	$c = 'find -L ' . $root . '/ ' . ' -type f -printf "%T+\t%p\n" 2> /dev/null ';
	kwGooOrDie();
	$res = shell_exec($c); 
	unset($c);
	$this->therawa = explode("\n", $res); unset($res);
}

private function doHT() {

	
}

private function p20() {

	$a = kwifs($this, 'therawa', ['kwiff' => []]); /* unset($this->therawa); not to be used again, but I set to read only */

	$a20 = [];
	foreach($a as $r) {
		if (preg_match('/\/\.git\//', $r)) continue;
		$a20[] = $r;
	} unset($a);
	
	$rootsz = strlen($this->droot);
	$i = 0;

	foreach($a20 as $r) {

		if (!trim($r)) continue;

		$re = '/(\S+)\s+(\S+.*)/';
		preg_match($re, $r, $ms);
		$hu = $ms[1];
		// $hu = str_replace('+', ' ', $hu);
		// $ts = strtotime($hu);
		$rp = $ms[2];
		$p = substr($rp, $rootsz);
		$this->buildDat($p, $ms[1]);
	}
} // func

private function setTimePs($rt, &$ref) {
	$re = '/([^+]+)\+([^\.]+)\.(\d{9})/';
	preg_match($re, $rt, $ms);
	$ts = strtotime($ms[1] . ' ' . $ms[2]);
	$rflns = '0.' . $ms[3];
	$flns = floatval($rflns);
	$tsfl = $ts + $flns;
	$ns = intval($ms[3]);
	
	kwas($ts > self::minDate, 'files are too old based on settings');
	kwas($tsfl >= $ts, 'timestamp float should be >= ts');
	
	$ref['U'] = $ts;
	// $ref->Ufl = $tsfl;
	// $ref->nsonly = $ns;
}

private function buildDat($p, $rt) {
	$to = [];
	$temp = [];
	$to['p'] = $p;
	$this->setTimePs($rt, $to);
	$this->thedat[] = $to;
}

} // class



