<?php

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

require_once('frag10.php');

