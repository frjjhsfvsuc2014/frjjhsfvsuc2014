<?php

/*--------------------------------------------------

	AUTHOR
	Last name : ZYRA
	First name : Jérémy

	FILE
	Name : capcha.php
	Last modified : 04/07/2013
	
	DESCRIPTION
	It is a picture who generate capcha.

----------------------------------------------------*/

header("Content-type: image/png");

//Random numbers
$digit1 = mt_rand(0, 9);
$digit2 = mt_rand(0, 9);
$digit3 = mt_rand(0, 9);
$digit4 = mt_rand(0, 9);
$digit5 = mt_rand(0, 9);

$height = 30;
$width = 100;

$code = $digit1 . ' ' . $digit2 . ' ' . $digit3 . ' ' . $digit4 . ' ' . $digit5;

//Make picture
$picture = imagecreate($width, $height);
imagecolorallocate($picture, 255, 255, 255); 
$black = imagecolorallocate($picture, 0, 0, 0);
$mediumHeight = ($height / 2) - 8;
imagestring($picture, 6, 10, $mediumHeight, $code, $black);

for($x = 5; $x < $width; $x += 6)
{
    imageline($picture, $x, 0, $x - 5, $height, $black);
}

//Display picture
imagepng($picture);
imagedestroy($picture);

?>