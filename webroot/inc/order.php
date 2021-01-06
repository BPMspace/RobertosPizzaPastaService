<?php
header("Content-type: image/png"); 
$str1= 'Servus Rob  aus BZ '; 
$str2= rand(1924,934465); 
$image= imagecreate(600,200); 
$background = imagecolorallocate($image,50,50,50); 
$color= imagecolorallocate($image,255,255,255); 
imagefill($image,0,0,$background); 
imagestring($image,18,50,25,$str1,$color); 
imagestring($image,18,50,45,$str2,$color);
imagepng($image);
?>


