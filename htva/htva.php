<?php 

	require_once('/opt/kwynn/kwutils.php');

	class htvalNuURLDo {
		
		const vpath = '/htval/?doc=';
		const mypath = '/t/23/02/htva/htva.php';
		const htmlrefk = 'redir';
		const htmlrefv = 'yes';		
		const vdoc = 'doc';
		const maxurllen = 200;
		
		public  readonly string $docurl;
		private readonly string $upfx;
		
		
		public function __construct() {
			$this->upfx = "https://$_SERVER[HTTP_HOST]";
			$this->docurl = self::vpath . $this->upfx . $_SERVER['REQUEST_URI'];
			$this->doIfHT();
		}
		
		private function doIfHT()  {
			if (kwifs(isrv(self::htmlrefk)) !== self::htmlrefv) return;
			$relp =   isrv(self::vdoc);
			kwas($relp && is_string($relp) && !isset($relp[self::maxurllen]), 'bad referrer HTML validator data 2255');
			kwas(preg_match('(^[A-Za-z0-9_\.-/]+$)', $relp), 'bad ref HTML val data 2348');
			header('Location: ' . self::vpath . $this->upfx . $relp);
			exit(0);
		}
	}
	
$kwt2302htvnudo = new htvalNuURLDo();

?>
<a href='<?php  echo($kwt2302htvnudo->docurl); 
						  unset($kwt2302htvnudo); ?>'>
	<img src='/t/5/02/html5_valid.jpg' alt='HTML5 validation check' width='103' height='36' />
</a>

