<?php 
//require_once "include.php";
function watertext($filename,$newpath='../uplode/{$filename}',$text='myDo',$x=200,$y=200){
$fileInfo=getimagesize($filename);
var_dump($fileInfo);
$creatfun=str_replace("/", "createfrom", $fileInfo['mime']);
$outfun=str_replace("/", '', $fileInfo['mime']);
$image= $creatfun($filename);
$fontfile="font/2.ttf";
$color=imagecolorallocatealpha($image, 200, 180, 20, 20);

imagettftext($image, 20, 15, $x, $y, $color, $fontfile, $text);
//header("content-type:{$fileInfo['mime']}");
$outfun($image,$newpath);
imagedestroy($image);
}
watertext('dajiaq.jpg','dajiaqnew');
$flename='dajiaq.jpg';
echo dirname($flename) ;

function waterImage($des,$logo){
$logInfo=getimagesize($logo);
$desInfo=getimagesize($des);

$creatfunLo=str_replace("/", "createfrom", $logInfo['mime']);
$creatfunDe=str_replace("/", "createfrom", $desInfo['mime']);
$desImg=$creatfunDe($des);
$src_im=$creatfunLo($logo);
$outfunDe=str_replace("/", '', $desInfo['mime']);

imagecopymerge($desImg, $src_im, 10, 10, 0, 0, $logInfo[0], $logInfo[1], 50);

$outfunDe($desImg,$des);
imagedestroy($desImg);
imagedestroy($src_im);
}


 ?>