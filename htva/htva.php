<?php 

require_once('/opt/kwynn/kwutils.php');

class htvalNuURLDo {

	const urlkey = 'doc';		
	const vpath = '/htval/?showsource=yes&' . self::urlkey . '=';
	const mypath = '/t/23/02/htva/htva.php';
	
	const htmlrefk = 'redir'; 
	const htmlrefv = 'yes';		
	
	const maxurllen = 200;

	private readonly string $docurl;
	private readonly string $upfx;


	private function __construct() {
		$this->upfx = "https://$_SERVER[HTTP_HOST]";
		$this->docurl = self::vpath . $this->upfx . $_SERVER['REQUEST_URI'];
		$this->doIfHT();
	}

	private function doIfHT()  {
		if (kwifs(isrv(self::htmlrefk)) !== self::htmlrefv) return;
		header('Location: ' . self::vpath . $this->vrord());
		exit(0);
	}
	
	private function vrord() : string {
		$ref = kwifs($_SERVER, 'HTTP_REFERER');
		kwas($ref && is_string($ref) && !isset($ref[self::maxurllen]), 'bad referrer HTML validator data 2255');
		kwas(substr($ref, 0, 8) === 'https://', 'bad ref HT val d 0118');
		$sz = strlen($this->upfx);
		kwas(substr($ref, 0, $sz) === substr($this->upfx, 0, $sz), 'bad ref HT val d 0121');
		$t20 = substr($ref, $sz);
		kwas( preg_match('(^/[A-Za-z0-9_\.-/]+$)', $t20), 'bad ref HTML val data 2348');
		kwas(!preg_match('/\.{2}/', $t20), 'bad ref HTML val data 2348');	
		return $ref;
	}
	
	public static function gethref() : string {
		$o = new self();
		return $o->docurl;
	}
} /* end class */		 $kwGVhtvahref = htvalNuURLDo::gethref(); ?>
<a href='<?php		echo($kwGVhtvahref); 
				   unset($kwGVhtvahref); ?>'>
	<img src='/t/5/02/html5_valid.jpg' alt='HTML5 validation check' width='103' height='36' />
</a>
