<?php 

	require_once('/opt/kwynn/kwutils.php');

	class htvalNuURLDo {
		
		const ifreff = 'htvalnurelpath';
		const maxurllen = 200;
		
		public  readonly string $docurl;
		private readonly string $upfx;
		
		
		public function __construct() {
			$this->upfx = "https://$_SERVER[HTTP_HOST]";
			if ($this->doIFInit()) return;
			$this->docurl = $this->upfx . $_SERVER['REQUEST_URI'];
		}
		
		private function doIFInit() : bool {
			$ifrm = kwifs($_REQUEST, self::ifreff);
			if (!$ifrm) return FALSE;
			kwas(is_string($ifrm) && !isset($ifrm[self::maxurllen]) && file_exists(dr() . $ifrm), 'bad referrer HTML validator data 2255');
			$this->docurl = $this->upfx . $ifrm;
			return TRUE;
		}
	}
	
$kwt2302htvnudo = new htvalNuURLDo();

?>
<a href='/htval?doc=<?php  echo($kwt2302htvnudo->docurl); 
						  unset($kwt2302htvnudo); ?>'>
	<img src='/t/5/02/html5_valid.jpg' alt='HTML5 validation check' width='103' height='36' />
</a>

