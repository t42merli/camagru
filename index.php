<?php
include('header.php');
?>
<div class="container">
<div class="columns">
    <div id="post" class="column col-8 col-mx-auto">
<?php
$_SESSION['post_date'] =  "2999-01-01 00:00:00";
include('get_post.php');
?>
<script language="javascript" type="text/javascript">

window.onscroll = function(ev) {
    if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
        var loading = document.getElementById('loading');
        loading.style.display = "";
        var xmlhttp = new XMLHttpRequest();
	    xmlhttp.onreadystatechange = function() {
		    if (this.readyState == 4 && this.status == 200) {
			    document.getElementById('post').innerHTML += this.responseText;
		    }
        }
        xmlhttp.open("GET", "get_post.php", true);
        xmlhttp.send();
        loading.style.display = "none";
    }
}
</script>
 </div>
</div>
<div id="loading" class="loading loading-lg" style="display:none"></div>
</div>