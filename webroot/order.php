<?php
header("Content-type: image/png"); 
$str1= 'Servus Rob  aus BZ '; 
$rand= rand(1924,934465); 
$image= imagecreate(800,300); 
$background = imagecolorallocate($image,50,50,50); 
$color_white= imagecolorallocate($image,255,255,255); 
$color_red= imagecolorallocate($image,254,0,0); 
imagefill($image,0,0,$background); 
imagestring($image,18,50,25,$str1,$color_white); 
imagestring($image,18,730,260,$rand,$color_red);
imagepng($image);
?>


