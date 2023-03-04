class kwGetLatestWWWcl {
	constructor() {	try { this.do10(); } catch (ex) { cl(ex); }	}
	
	do10() {
		const urlb = '/t/22/06/upsort/dat/server.php?getOne=1';

		const p10 = kwjss.sobf(urlb);
		const p20 = new Promise((resolve) => onDOMLoad(resolve));
		Promise.all([p10, p20 ])
			.then(([r, ignoreFromDOM]) => 
			{ 
				this.onres(r);
				kwjss.sobf(urlb + '&cache=no', {}, this.onres);
			});		
	}
	
	onres(r) {
		const rjs = UtoLocF(r['U']);
		inht('gopa23', rjs);	
	}
}

new kwGetLatestWWWcl();
