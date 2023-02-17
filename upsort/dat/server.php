<?php

require_once('vis.php');

if (didAnyCallMe(__FILE__)) { 
	if (isrv('getOne')) { echo(fileVis::getOneLatest()); exit(0); }
	else new fileVis();
}
