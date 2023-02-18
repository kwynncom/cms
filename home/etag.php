<?php

//							 12345678901234567890123456789012 // 32 chars
// What I had before: ETag: "1676605826-1676605826-1676307600"
// try 1:					 kwynn-com-hm-v1-i0w0u0
//						     kwynn_com_v1-i0w0u0
//							 kwynn_com_v1i0w0u0
// forcing larger:			 kwynn_com_v1i1659839768w0u1659839768
// hex:						 kwynn_com_v1h62ef2518w0u62ef2518

class kwHomeETag {
	
	const clv = 1;
	const pfx = 'kwynn_com_v';
	
	const idxf = 'hm';
	const upf  = 'up';
	const wkf  = 'wk';
	const Ubase = 1676605826;
	const wkbase = 156;
	
	public static function get(array $vs) : string {
		$e = self::pfx . self::clv;
		foreach([self::idxf, self::wkf, self::upf] as $f) {
			$e .= $f[0];
			$v = $vs[$f];
			if ($f === self::wkf) $v -= self::wkbase;
			else				  $v -= self::Ubase ;
			$e .= dechex($v);
		}
		
		return $e;
	}
}
