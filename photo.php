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
	border:2px solid #5755d9;
	border-radius:10px;
}
</style>
<div class="container">
	<div class="columns">
        <div class="column col-8">
            <div class="container">
                <h3> Filtre:</h3>
                <form method="POST" action="process_img.php" enctype="multipart/form-data">
                    <div class="columns col-oneline">
                        <div class="column col-4">
                            <label>
                                <input  type="radio" name="filter" value= 1 required checked="checked">
                                <img class="img-responsive" src="filter1.png">
                            </label>
                        </div>
                        <div class="column col-4">
                            <label>
                                <input type="radio" name="filter" value= 2 >
                                <img class="img-responsive" src="filter2.png">
                            </label>
                        </div>
                        <div class="column col-4">
                            <label>
                                <input type="radio" name="filter" value= 3 >
                                <img class="img-responsive" src="filter3.png">
                            </label>
                        </div>
                        <div class="column col-4">
                            <label>
                                <input type="radio" name="filter" value= 4 >
                                <img class="img-responsive" src="filter4.png">
                            </label>
                        </div>
                    </div>
                    <br>
                    <div id="upload" style="display:none" class="empty">
                        <div class="empty-icon">
                            <i class="icon icon-photo"></i>
                        </div>
                        <p class="empty-title h5">Vous n'avez pas de webcam</p>
                        <p class="empty-subtitle">Telecharger un fichier</p>
                        <div class="empty-action">
                            <input id="upload_form" class="form-input" type="file" accept=".jpeg, .jpg, .png" name="upload">
                            <button type="submit" class="btn btn-primary">Telecharger</button>
                        </div>
                    </div>
                    <div id="cam_div" class="container" style="text-align: center;border:2px solid #5755d9;border-radius:2px;">
                        <video autoplay="true" id="cam" class="video-responsive"></video>
                        <canvas id="canvas" style="display:none"></canvas>
                        <input type="text" name="img"  id="test_img" style="display:none">
                        <button style="margin-top:5px" class="btn btn-link" type="submit" id="startbutton" onclick="takePicture()">
                            <img src="camera.svg" width="32px" alt="Pendre une photo">
                        </button>                       
                    </div>
                </form>
            </div>
        </div>
        <div class="column 4" >
            <?php
            if(isset($_SESSION['lastPic']))
            {
                echo '
            <form method="POST" action="post_pic.php">
                <div class="panel">
                    <div class="panel-header">
                        <div class="panel-title"> Quelle photo publier ?</div>
                    </div>
                    <div class="panel-body" style="max-height:600px">';
                        $i = 0;
                        while (isset($_SESSION['lastPic'][$i]))
                        {
                            echo '<label>
                            <input type="radio" name="i" value='.$i.' required checked="checked">
                            <img class="img-responsive" src="'.$_SESSION['lastPic'][$i] . '">
                            </label>';
                            $i++;
                        }
                    echo '
                    </div>
                    <div class="panel-footer">
                        <div class="input-group">
                            <input class="form-input" type="text" placeholder="Publication" name="post">
                            <button class="btn btn-primary input-group-btn" type="submit">post pic</button>
                        </div>
                    </div>
                </div>
            </form>';
            }
            ?>
        </div>
    </div>
</div>
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
function upload_form(){
    var cam_div = document.getElementById('cam_div');
    cam_div.style.display = "none";
    var upload = document.getElementById('upload');
    upload.style.display = "";
    document.getElementById('upload_form').setAttribute("required", "");
}
</script>
</body>
</html>
