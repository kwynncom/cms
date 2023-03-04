function kwGetLatestWWW(cb) { // 2023/02/16 - moved from external file

	try {
		const urlb = '/t/22/06/upsort/dat/server.php?getOne=1';

		const p10 = kwjss.sobf(urlb);
		const p20 = new Promise((resolve) => onDOMLoad(resolve));
		Promise.all([p10, p20 ])
			.then(([r, ignoreFromDOM]) => 
			{ 
				r['rjs'] = UtoLocF(r['U']);
				cb(r);
				kwjss.sobf(urlb + '&cache=no', {}, (r20) => { 
					r20['rjs'] = UtoLocF(r20['U']);
					cb(r20); 
				});
			});
	} catch (ex) { cl(ex); }
} // func


function kwOnLatestWWW(res) {
	inht('gopa23', res['rjs']);
}

kwGetLatestWWW(kwOnLatestWWW);    
