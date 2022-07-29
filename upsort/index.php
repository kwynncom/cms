<?php

require_once('getFiles.php');
require_once('ht10.php');

$G_KWA = sortSiteByTime::getPaths();
new ht10($G_KWA); 
unset($G_KWA);
