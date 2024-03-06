<?php

require_once('/opt/kwynn/kwutils.php');
require_once(dr() . '/t/22/06/upsort/dat/vis.php');
require_once(dr() . '/t/21/12/flatten.php');
require_once(__DIR__ . '/etag.php');

#[\AllowDynamicProperties]
class kwHomePageAssist {
	
	public readonly string $oneuphu;
	public readonly int    $flatn;
	
	public function __construct(string $idxPath) {
		$this->muts = [];
		$this->mats = [];
		$this->muts[] = $this->mats[kwHomeETag::idxf] = filemtime($idxPath);
		$this->doUp();
		$this->doFlat();
		$this->doHeaders();
	}
	
	private function doHeaders() {
		$max = max($this->muts);
		$et  = kwHomeETag::get($this->mats);
		kwTSHeaders($max, $et);
		return;
	}
	
	private function doFlat() {
		$weeko = new weeksFlattenCurve();
		$this->flatn = $this->mats[kwHomeETag::wkf] = $weeko->weekn;
		$this->muts[] = $weeko->UDM;
		return;
	}
	
	private function doUp() {
		$a = fileVis::getOneLatest('array');
		$kwt39 = kwifs($a, 'dHussjs');
		if (!$kwt39) return;
		$this->oneuphu = $kwt39;
		$this->muts[] = $this->mats[kwHomeETag::upf] = $a['U'];
		return;
	}
}

