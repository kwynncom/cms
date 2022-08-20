<!DOCTYPE html>
<html lang='en'>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=UTF-8'    />
<meta name='viewport' content='width=device-width, initial-scale=1.0' />

<title>cookies</title>

<style>
    body { font-family: sans-serif; }
	.cookv { padding-left: 1ex; }
	:invalid { background-color: lightSalmon; }
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

function togglev(showit) {
	const setto = showit ? 'visible' : 'hidden';
	qsa('.cookv').forEach((e) => { e.style.visibility = setto; });	
}

class changeCVs {
	constructor() {
		checkNum();
	}
}

function checkNum() {
	const e = byid('cexHours');
	const v = e.value;
	let cv = '';
	if (!is_numeric(v)) cv = 'not a number';
	e.setCustomValidity(cv);
}

</script>

</head>
<body>
	<h1 style='font-size: 120%;'>your active cookies for this site</h1>
	
	<div><input type='checkbox' onclick='togglev(this.checked);' /> show values (Don't let bad guys see values!)</div>
	
	<div id='out10'></div>
</body>
</html>
