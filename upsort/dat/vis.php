<?php

require_once('/opt/kwynn/kwutils.php');

class fileVis extends dao_generic_3 {
	
	const dbname = 'wwwFileVis';
	
	public function __construct(string $from = '') {
		parent::__construct(self::dbname);
		$this->creTabs('vis');
		if ($from === 'getVis') { $this->setVis(); return; }
		$this->do10();

	}
	
	public function isvis(string $pin) {
		kwGooOrDie();
		return $this->vcoll->count(['_id' => $pin]);
		
	}
	
	public function getVisI() { return $this->ftss; }
	
	private function setVis() {
		 $this->ftss = [];
		
		$a = $this->vcoll->find();
		if (!$a) return;
		
		foreach($a as $r) {
			$p = $r['_id']; 
			$this->ftss[] = ['p' => $p, 'U' => filemtime($p)];
		}
		
		usort($this->ftss, [$this, 'sort']);
		
	}
	
	private function sort($a, $b) {
		$dU = $a['U'] - $b['U'];
		if ($dU) return $dU;
		return strcmp($a['p'], $b['p']);
		
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
