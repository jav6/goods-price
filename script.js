function once_alert() {
	var alerted = localStorage.getItem('alerted') || '';
	if (alerted != 'yes') {
		var txt = "Welcome - English isn\'t my first language, so please excuse any mistakes - and say to me - Thanks";
		alert(txt);
		localStorage.setItem('alerted','yes');
	}
}