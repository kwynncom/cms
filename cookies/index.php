<!DOCTYPE html>
<html lang='en'>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=UTF-8'    />
<meta name='viewport' content='width=device-width, initial-scale=1.0' />

<title>cookies</title>

<style>
    body { font-family: sans-serif; }
</style>

<script src='/opt/kwynn/js/utils.js'></script>
<script>
class getEmailCookie {
	constructor() {
		onDOMLoad(() => { kwjss.sobf('/t/7/12/email/cookieMgrKw', {}, this.onret, false); });
	}
	
	onret(res) {
		inht('out10', res);
	}
	
}
	
	new getEmailCookie();
</script>

</head>
<body>
	<pre id='out10'></pre>
</body>
</html>
