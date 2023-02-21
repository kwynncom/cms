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

		$vtr = $this->vrorf(isrv('doc'), 'internal');
		if (!$vtr) $vtr = $this->vrorf(kwifs($_SERVER, 'HTTP_REFERER'), 'referer');
		kwas($vtr, 'bad ref HV val d 2316');
		
		header('Location: ' . self::vpath . $tr);
		exit(0);
	}
	
	private function vrorf($rin, string $rty) : string {
		try {
			kwas($rin && is_string($rin), 'bad ref HT val d 2331');
			kwas(isset($rin[0]), 'bad ref HTML val data 2312');
			$isr = $rty === 'referer';
			if ($isr) kwas(substr($rin, 0, 8) === 'https://', 'bad ref HT val d 0118');
			$relp = $rin;
			kwas(!isset($relp[self::maxurllen]), 'bad referrer HTML validator data 2255');
			if ($isr) {
				$sz = strlen($this->upfx);
				kwas(substr($rin, 0, $sz) === substr($this->upfx, 0, $sz), 'bad ref HT val d 0121');
				$t20 = substr($rin, $sz);
			} else $t20 = $rin; 
			kwas( preg_match('(^/[A-Za-z0-9_\.-/]+$)', $t20), 'bad ref HTML val data 2348');
			kwas(!preg_match('/\.{2}/', $t20), 'bad ref HTML val data 2348');	
			return $rin;
		} catch(Exception $ex) { }
		
		return '';
	}
	
	public static function gethref() : string {
		$o = new self();
		return $o->docurl;
	}
	
} ?>
<a href='<?php echo(htvalNuURLDo::gethref()); ?>'>
	<img src='/t/5/02/html5_valid.jpg' alt='HTML5 validation check' width='103' height='36' />
</a>
