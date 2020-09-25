<?php

require_once('./../users/users.php');
require_once('utils.php');


class cms_auth extends dao_generic {
    
    public static function authOrDie() {
	$isa = self::isAuth();
	kwas($isa, 'not auth user - Kw1137');
    }
    
    public static function isAuth() {
	$o = new self();
	return $o->isAuthI();
    }
    
    const db = 'cms';
    function __construct() {
        parent::__construct(self::db);
        $this->ucoll    = $this->client->selectCollection(self::db, 'users');
	$q = ['user' => users::getUName()];
	$this->ucoll->upsert($q, $q);
	$r = $this->ucoll->findOne($q);
	$this->isauth = false;
	if (isa($r,'auth') === 'sakw2020_0924_1') $this->isauth = true;
    }
    
    private function isAuthI() { return $this->isauth; }
}
