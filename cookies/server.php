<?php

require_once('/opt/kwynn/kwutils.php');

class cookies {
	
	public function __construct() {
		$this->coi = [];
		$this->procIn();
		$this->exp();
		require_once('frag10.php');		
	}
	
	private function procIn() {
		$all = kwjssrp();
		$hrss = kwifs($all, 'hours');
		if ($hrss === false) return;
		kwas(is_numeric($hrss), 'hours must be numeric');
		if ($hrss === '0') $hrs = 0;
		else $hrs = floatval($hrss);
		try { kwas(is_array($all['toch']), 'no toch array'); } catch(Exception $ex) { return; }
		
		foreach($all['toch'] as $c) {
			$v = kwifs($_COOKIE, $c);
			if (!$v) continue;		  // This is normal if you just expired it.
			if ($hrs === 0) $sex = 0;
			else			$sex = roint(time() + $hrs * 3600);
			
			$exa = ['kwcex' => $sex];
			if (in_array($c, ['atkey', 'rtkey', 'pemck_user'])) $exa['path'] = '/t/7/12/email';
			
			kwscookie($c, $v, $exa);
			
		}
		
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
			
			$ex = kwifs($mex, 1);
			if (!$ex) $tos = 'Session';
			$tos = $ex;
			
			$nm = kwifs($mnm, 0);
			if (!$nm) continue;

			$this->coi[$nm] = $tos;
			
			continue;
		}
	}
}

new cookies();
