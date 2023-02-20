<?php


require_once('/opt/kwynn/isKwGoo.php');
require_once(__DIR__ . '/' . 'config.php');
require_once(__DIR__ . '/' . 'cache.php');
require_once(dr() . '/t/23/02/webhook_git/pull/get.php');
require_once(__DIR__ . '/../utils/getURLs.php');

class fileVis extends dao_generic_3 implements upsortDBConfig {
	
	private readonly array $ftss;

	public static function getOneLatest(string $fmt = 'json') {
		if ($c = wwwLatestUpdateCache::get()) {
			if ($fmt === 'json') return json_encode($c); 
			else return $c;
		} unset($c);
		$o = new self('getVis', true);
		$a = $o->sendOne(true);
		$ret = $a['dHussjs'];
		wwwLatestUpdateCache::put($a);
		return $ret;
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
	
	private function getUs() : array {
		if (!$this->ouids) return [];
		
		$a = GitGet::get($this->ouids);
		getAllUpPgURLs::normUs($a);
		return $a;
	}
	
	private function setVis() {
		$f = $this->getVis10();
		$u = $this->getUs();
			
		$a = kwam($f, $u);
		usort($a, [$this, 'sort']);
		$this->ftss = $a;
	}
	
	
	// private function get
	private function getVis10() : array {
		
		$a = $this->vcoll->find([]);
		if (!$a) return [];

		$dr = $_SERVER['DOCUMENT_ROOT'];
		
		$t = [];
		
		$this->ouids = [];
		foreach($a as $r) {
			$p =  $r['_id'];
			$fp = $dr . '/' . $p;
			if ($p[0] !== '/' || !file_exists($fp)) {
				$this->ouids[] = $p;
				continue;
			}
			$t[] = ['p' => $p, 'U' => filemtime($fp)];
		}
		
		return $t;
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
		$p    = $d['p']; kwas($p[0] !== '/' || is_readable($droot . $p), 'bad val vis 2 0259');
		$dat['_id'] = $p;
		if ($isck) {
			$dres = $this->vcoll->insertOne($dat); kwas($dres->getInsertedCount() === 1, 'bad db res count insert vis 3');
		} else {
			$dres = $this->vcoll->deleteOne($dat); kwas($dres->getDeletedCount() === 1, 'bad db res count vis 4 - del');
		}
		return;
	}
}
