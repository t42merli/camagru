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

function close_modal(id){
	document.getElementById(id).className = "modal";
}

function like(button, post_id, user){
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			button.innerHTML = "UNLIKE";
			button.setAttribute("onclick", "unlike(this,"+ post_id + ","+user+")");
			document.getElementById("nb_likes"+post_id).innerHTML = this.responseText;
		}
	}
	xmlhttp.open("GET", "like.php?post=" + post_id+ "&user="+user, true);
	xmlhttp.send();
}

function unlike(button, post_id, user){
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			button.innerHTML = "LIKE";
			button.setAttribute("onclick", "like(this,"+ post_id + ","+user+")");
			document.getElementById("nb_likes"+post_id).innerHTML = this.responseText;
		}
	}
	xmlhttp.open("GET", "unlike.php?post=" + post_id+ "&user="+user, true);
	xmlhttp.send();
}

function comment(post_id, user){
	var comment = document.getElementById('comment'+post_id);
	if(comment.value == "")
	{	
		comment.setCustomValidity('remplir le commentaire avant de poster');
		return;
	}
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById('toast' + post_id).style.display = "";
		}
	}
	xmlhttp.open("GET", "comment.php?post=" + post_id+ "&user="+user+"&comment="+comment.value, true);
	xmlhttp.send();
	comment.value = "";
}