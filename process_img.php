<?php
session_start();
$img1 = imagecreatefrompng($_POST['img']);
$img2 = imagecreatefrompng("filter".$_POST['filter']. ".png");
$size1 = getimagesize($_POST['img']);
$size2 = getimagesize("filter".$_POST['filter']. ".png");
imagecopyresized($img1, $img2, 0, 0, 0, 0, $size1[0], $size1[1],  $size2[0], $size2[1]);
ob_start();
	imagepng($img1);
	$data = ob_get_contents();
ob_end_clean();
$finalImg = 'data:image/png;base64,' . base64_encode($data);
$_SESSION['lastPic'] = $finalImg;
header('Location: photo.php');
?>