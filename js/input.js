class ta_input {
    
    construct() { this.tov = false; }
        
    input(tin) {
	const self = this;
	if (this.tov) clearTimeout(this.tov);
	this.tov = setTimeout(function() { self.input20(tin); }, 3000);
    }
    
    input20(tin) {
	console.log(tin.length);
    }
}
var KW_TA_INO = new ta_input();