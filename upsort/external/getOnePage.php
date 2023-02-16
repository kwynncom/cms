<!DOCTYPE html>
<html lang='en'>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=UTF-8'    />
<meta name='viewport' content='width=device-width, initial-scale=1.0' />

<title>last site update</title>
<script src='/opt/kwynn/js/utils.js'></script>
<script>
	
	function kwGetLatestWWW(cb) { // 2023/02/16 - moved from external file
    
		try {

			const p10 = kwjss.sobf('/t/22/06/upsort/dat/server.php?getOne=1');
			const p20 = new Promise((resolve) => onDOMLoad(resolve));
			Promise.all([p10, p20 ])
				.then(([r, ignoreFromDOM]) => 
				{ 
					r['rjs'] = UtoLocF(r['U']);
					cb(r);
				});
		} catch (ex) { cl(ex); }
	} // func
	
	
    function onLatest(res) {
        inht('gopa23', res['rjs']);
    }
    
	kwGetLatestWWW(onLatest);    

</script>

<style>
    body { 
		font-family: monospace; 
		margin: 0; 
		padding: 0;
		font-size: 130%;
	}
</style>
</head>
<body>
	<div style='display: inline-block; text-align: center; ' id='gopa23' >
		<?php 
			require_once(__DIR__ . '/' . 'getOneSS.php'); 
		?>
	</div>
</body>
</html>
