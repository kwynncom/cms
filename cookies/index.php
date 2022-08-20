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
	
	var GDOV;
	
	
class getEmailCookie {
	constructor() {
		onDOMLoad(() => { kwjss.sobf('/t/7/12/email/cookieMgrKw', {}, this.onret, false); });
	}
	
	onret(res) {
		inht('out10', res);
		GDOV = new changeCVs(); 
	}
	
}
new getEmailCookie();

function togglev(showit) {
	const setto = showit ? 'visible' : 'hidden';
	qsa('.cookv').forEach((e) => { e.style.visibility = setto; });	
}

class changeCVs {
	constructor() {
		this.ckcks = [];
		this.setKeys();
	}
	
	doit() {
		checkNum();
		this.do10();
	}
	
	setKeys() {
		const cks = qsa('[data-ckey]');
		cks.forEach((e) => { this.ckcks.push(e);	});		
	}
	
	do10() {
		const ckks = [];
		this.ckcks.forEach((e) => { 
			if (e.checked) ckks.push(e.dataset.ckey);
		});
		
		const arecv = ckks.length > 0;
		const cv = arecv ? '' : 'nothing checked';
		const col = arecv ? 'white' : 'lightSalmon';
		
		this.ckcks.forEach((e) => { 
			e.setCustomValidity(cv);
			e.parentNode.style.backgroundColor = col;
		});	
		
		cl(ckks);
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
	
	<div style='margin-top: 1ex;'>
	<input type='number' style='font-family: monospace; width: 5em;' oninput='checkNum();' id='cexHours' /> <label>hours </label>
	<button onclick='GDOV.doit();'>change expiration</button>
</div>

<p>Check the boxes associated with names and then set the number of hours until expiration.  Fractions are fine.  Note these special cases:</p>

<ul>
	<li>0 means the cookie lasts until the browser closes</li>
	<li>negative numbers will expire / delete the cookie(s)</li>
</ul>

<p>The hours box must be set to a number / any number.  At least one cookie's box has to be checked.
	
</p>
</body>
</html>
