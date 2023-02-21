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
		$tr =  kwifs($_SERVER, 'HTTP_REFERER'); // isrv(self::urlkey);
		$this->vrord($tr);
		header('Location: ' . self::vpath . $tr);
		exit(0);
	}
	
	private function vrord(string $rin) {
		kwas(substr($rin, 0, 8) === 'https://', 'bad ref HT val d 0118');
		$relp = $rin;
		kwas($relp && is_string($relp) && !isset($relp[self::maxurllen]), 'bad referrer HTML validator data 2255');
		$sz = strlen($this->upfx);
		kwas(substr($rin, 0, $sz) === substr($this->upfx, 0, $sz), 'bad ref HT val d 0121');
		$t20 = substr($rin, $sz);
		kwas( preg_match('(^/[A-Za-z0-9_\.-/]+$)', $t20), 'bad ref HTML val data 2348');
		kwas(!preg_match('/\.{2}/', $t20), 'bad ref HTML val data 2348');	
	}
	
	public static function gethref() : string {
		$o = new self();
		return $o->docurl;
	}
	
} ?>
<a href='<?php echo(htvalNuURLDo::gethref()); ?>'>
	<img src='/t/5/02/html5_valid.jpg' alt='HTML5 validation check' width='103' height='36' />
</a>
