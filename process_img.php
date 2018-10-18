<?php
session_start();
if($_POST['img'] == "")
{
	$size1 = getimagesize($_FILES['upload']['tmp_name']);
	if($_FILES['upload']['type'] == "image/png")
	{
		$img1 = imagecreatefrompng($_FILES['upload']['tmp_name']);
		imagesavealpha( $img1, true );
	}
	else
		$img1 = imagecreatefromjpeg($_FILES['upload']['tmp_name']);
	
}
else
{
	$img1 = imagecreatefrompng($_POST['img']);
	$size1 = getimagesize($_POST['img']);
}
$img2 = imagecreatefrompng("filter".$_POST['filter']. ".png");
$size2 = getimagesize("filter".$_POST['filter']. ".png");
imagecopyresized($img1, $img2, 0, 0, 0, 0, $size1[0], $size1[1],  $size2[0], $size2[1]);
ob_start();
	imagepng($img1);
	$data = ob_get_contents();
ob_end_clean();
$finalImg = 'data:image/png;base64,' . base64_encode($data);
if (!isset($_SESSION['lastPic']))
	$_SESSION['lastPic'] = array();
$_SESSION['lastPic'][] = $finalImg;
header('Location: photo.php');
?>
