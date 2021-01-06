<?php
header("Content-type: image/png"); 
$str1= 'Servus Rob aus BZ '; 
$str2= rand(1924,934465); 
$image= imagecreate(200,40); 
$background = imagecolorallocate($image,0,0,70); 
$color= imagecolorallocate($image,255,255,255); 
imagefill($image,0,0,$background); 
imagestring($image,10,5,5,$str1,$color); 
imagestring($image,10,5,20,$str2,$color);
#$save = "/images/". strtolower(oder) .".png";
imagepng($image);
?>


