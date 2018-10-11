<?php
include('header.php');
if (!isset($_SESSION['pseudo']))
	header('Location: connexion.php');
?>
<style>
label > input{
	visibility: hidden;
	position: absolute;
}
label > input + img{
	cursor:pointer;
	border:2px solid transparent;
}
label > input:checked + img{
	 border:2px solid #e5e5f9;
	border-radius:10px;
}
</style>
<div class="container">
	<div class="columns">
		<div class="column col-8">
			<div class="container">
				<form method="POST" action="process_img.php">
				<div class="columns col-oneline">
					<div class="column col-4"><label>
					<input  type="radio" name="filter" value= 1 required checked="checked">
					<img class="img-responsive" src="filter1.png">
					</label></div>
					<div class="column col-4"><label>
					<input type="radio" name="filter" value= 2 >
					<img class="img-responsive" src="filter2.png">
					</label></div>
					<div class="column col-4"><label>
					<input type="radio" name="filter" value= 3 >
					<img class="img-responsive" src="filter3.png">
					</label></div>
					<div class="column col-4"><label>
					<input type="radio" name="filter" value= 4 >
					<img class="img-responsive" src="filter4.png">
					</label></div>
				</div>
			<div class="container">
				<video autoplay="true" id="cam" class="img-responsive"></video>
			<canvas id="canvas" style="display:none"></canvas>
			<input type="text" name="img"  id="test_img">
			<button type="submit"id="startbutton" onclick="takePicture()">photo</button>
			</form>
			<button type="button" id="stopbutton" onclick="stop()">hide</button>
<script language="javascript" type="text/javascript">
var video = document.getElementById('cam');
var photo = document.getElementById('test_img');
var canvas = document.getElementById('canvas');

if (navigator.mediaDevices.getUserMedia) {
	navigator.mediaDevices.getUserMedia({video: true})
		.then(function(stream) {
			video.srcObject = stream;
		})
		.catch(function(error) {
			upload_form();
		});
}

function takePicture(){
	canvas.width = video.videoWidth;
	canvas.height = video.videoHeight;
	canvas.getContext('2d').drawImage(video, 0, 0, video.videoWidth, video.videoHeight);
	console.log(video.videoHeight);
	var data = canvas.toDataURL('image/png');
	photo.setAttribute('value', data);
}
function stop(){
		if(video.style.display != "none")
			video.style.display = "none";
		else
			cam.style.display = "";
}
</script>
			</div>
			</div>
		</div>
		<div class="column 4">
		<img class="img-responsive" src="<?php echo $_SESSION['lastPic']?>">
		</div>
	</div>
</div>
</body>
</html>
