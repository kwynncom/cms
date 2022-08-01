class upsortGet1Cl {
    
    constructor(cb) {
        this.ocb = cb;
        kwjss.sobf('/t/22/06/upsort/dat/server.php?getOne=1', false, (res) => {this.icb(res); });
    }
    
    icb(res) {
        res['rjs'] = UtoLocF(res['U']);
        this.ocb(res);
    }
}

