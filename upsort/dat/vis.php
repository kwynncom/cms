<?php

require_once('/opt/kwynn/kwutils.php');
require_once('/opt/kwynn/isKwGoo.php');

class fileVis extends dao_generic_3 {
	
	const dbname = 'wwwFileVis';
	
	public static function getOneInternal() {
		$o = new self('getVis', true);
		$a = $o->sendOne(true);
		return $a['dHussjs'];
		
	}
	
	public function __construct(string $from = '', bool $getOneInteral = false) {
		$this->dbInit();
		$g1 =  isrv('getOne');
		if ($from === 'getVis' || $g1) { 
			$this->setVis(); 
			if (!$g1) return; 
		}
		if (isrv('eid') === 'adminToggle') { $this->setMode(); return; }
		if ($g1) $this->sendOne($getOneInteral);
		if ($from !== 'iao') $this->do10();


	}
	
	public function sendOne($internal) {
		$r = $this->ftss[0];
		$r['r'] = date('r', $r['U']);
		if ($internal) { 
			//  Sat, Aug 13, 2022, 01:59 AM EDT
			$r['dHussjs'] = date('D, M d, Y, h:i A T', $r['U']); 
			return $r; 
		} else kwjae($r);
	}
	
	private function dbInit() {
		parent::__construct(self::dbname);
		$this->creTabs('vis');		
	}
	
	public static function isAdminOn() {
		$o = new self('iao');
		return $o->isAdminOnI();

		
	}
	
	public function isAdminOnI() {
		$this->creTabs('admin');
		$res = $this->acoll->findOne(['_id' => 'adminModeStatus']);
		if (!$res) return true;
		return kwifs($res['isAdmin']);
	}	
	
	private function setMode() {
		kwGooOrDie();
		$isa = isrv('checked'); kwas(is_bool($isa), 'bad setMode 0407 fileVis');
		$this->creTabs('admin');
		$q['_id'] = 'adminModeStatus';
		$dat = $q;
		$dat['isAdmin'] = $isa;
		$this->acoll->upsert($q, $dat);
	}
	
	public function isvis(string $pin) {
		return $this->vcoll->count(['_id' => $pin]);
		
	}
	
	public function getVisI() { return $this->ftss; }
	
	private function setVis() {
		 $this->ftss = [];
		
		$a = $this->vcoll->find([]);
		if (!$a) return;
		
		
		$dr = $_SERVER['DOCUMENT_ROOT'];
		foreach($a as $r) {
			$p =  $r['_id']; 
			$this->ftss[] = ['p' => $p, 'U' => filemtime($dr . '/' . $p)];
		}
		
		usort($this->ftss, [$this, 'sort']);
		
	}
	
	private function sort($a, $b) {
		$dU = $b['U'] - $a['U'];
		if ($dU) return $dU;
		return strcmp($b['p'], $a['p']);
		
	}
	
	public static function getVis() {
		$o = new self('getVis');
		return $o->getVisI();
		
	}
	
	private function do10() {
		if (isrv('action') !== 'toggle') return;
		
		kwGooOrDie();
		
		$droot = $_SERVER['DOCUMENT_ROOT'];
		$isck = isrv('checked'); kwas(is_bool($isck), 'bad val vis 1 0258');
		$d    = isrv('dataset');
		$p    = $d['p']; kwas(is_readable($droot . $p), 'bad val vis 2 0259');
		$dat['_id'] = $p;
		if ($isck) {
			$dres = $this->vcoll->insertOne($dat); kwas($dres->getInsertedCount() === 1, 'bad db res count insert vis 3');
		} else {
			$dres = $this->vcoll->deleteOne($dat); kwas($dres->getDeletedCount() === 1, 'bad db res count vis 4 - del');
		}
		return;
	}
}
