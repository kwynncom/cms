<!DOCTYPE html>
<html lang='en'>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=UTF-8'    />
<meta name='viewport' content='width=device-width, initial-scale=1.0' />

<title>last site update</title>
<script src='/opt/kwynn/js/utils.js'></script>
<script src='/t/22/06/upsort/external/external.js'></script>
<script>
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

