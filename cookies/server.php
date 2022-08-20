<?php

if (1) {
	// header('Content-Type: application/json');
	echo(json_encode($_COOKIE, JSON_PRETTY_PRINT));
}
else  if (1) {
	// header('Content-Type: text/plain');
	var_dump($_COOKIE);
}
if (0) {
$ha = headers_list(); // indexed 0, 1, ...
foreach($ha as $r) {
	if (strpos($r, 'Set-Cookie: ' . '') !== 0) continue;
	preg_match('/expires=([^;]+)/', $r, $ms);
	// return self::send20(kwifs($ms, 1), $preEx, $r, kwifs($ms, 0));
	$ignore = 1;
}

}