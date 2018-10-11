function check_exist(input, to_check){
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			if (this.responseText == 1)
				input.setCustomValidity(to_check + ' already used');
			else
				input.setCustomValidity('');
		}
	}
	xmlhttp.open("GET", "check_exist.php?to_check=" + to_check + "&value=" + input.value, true);
	xmlhttp.send();
}

function check(input) {
	if (input.value != document.getElementById('password2').value) {
		input.setCustomValidity('Password Must be Matching.');
	} else {
		input.setCustomValidity('');
	}
}
