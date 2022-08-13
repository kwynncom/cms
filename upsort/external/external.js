function kwGetLatestWWW(cb) {
    
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
