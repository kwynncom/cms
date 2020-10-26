<?php

function isa($a, $k, &$v = false) {
    if (isset($a[$k])) 
	 $v  = $a[$k];
    else $v  = false;
    
    return $v;
}