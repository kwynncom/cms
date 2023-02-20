<?php

require_once(__DIR__ . '/' . 'config.php');

class wwwLatestUpdateCache extends dao_generic_3 implements upsortDBConfig  {
	
	const q = ['_id' => 'cache'];
	const vf = 'v';
	
	public static function get() : array { 
		if (isrv('cache') === 'no') return [];
		$o = new self();
		return $o->getI();
	}
	
	public static function put(array $a) {
		new self($a);
	}
	
	private function __construct(array $a = []) {
		parent::__construct(self::dbname);
		$this->creTabs('cache');
		if (!$a) return;
		unset($a['_id']);
		$this->ccoll->upsert(self::q, $a);
	}
	
	public function getI() : array {
		$r = $this->ccoll->findOne(self::q);
		if (!$r) return [];
		return $r; // [self::vf];
	}
	
}
