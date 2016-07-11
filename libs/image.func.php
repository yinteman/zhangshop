<?php 
require_once 'stringe.func.php';

function verifyImage($type,$length,$pixel=0,$pline=0){
	$width=80;
	$height=30;
	$image=imagecreatetruecolor($width, $height);
	$white=imagecolorallocate($image, 255, 255, 255);
	$black=imagecolorallocate($image, 0, 0, 0);
	imagefill($image, 0, 0,$white);
	imagerectangle($image, 0.5, 0.5, $width-0.5, $height-0.5, $black);
	$fontfile=array("1.ttf","2.ttf","3.ttf","4.ttf","5.ttf");
	
	$chars=buildRandomString($type,$length);
	//echo $chars;
	$_SESSION['verify']=$chars;
	for ($i=0; $i <$length ; $i++) { 
		$size=mt_rand(16,18);
		$font="../font/".$fontfile[mt_rand(0,count($fontfile)-1)];
		$x=5+$size* $i;
		$y=mt_rand(15,26);
		$angle=mt_rand(-15,15);
		$colors=imagecolorallocate($image, mt_rand(0,100), mt_rand(55,180), mt_rand(100,255));
		$text=substr($chars,$i,1);
		imagettftext($image, $size, $angle, $x, $y, $colors, $font, $text);

	}
	if ($pixel) {
		for ($i=0; $i <$pixel ; $i++) { 
			$colors=imagecolorallocate($image, mt_rand(0,100), mt_rand(55,180), mt_rand(100,255));
			imagesetpixel($image, mt_rand(0,$width-0.5), mt_rand(0,$height-0.5), $colors);
		}
	}
	if ($pline) {
		for ($i=0; $i <$pline ; $i++) { 
			$colors=imagecolorallocate($image, mt_rand(0,100), mt_rand(55,180), mt_rand(100,255));
			imageline($image, mt_rand(0,$width-0.5), mt_rand(0,$height-0.5), mt_rand(0,$width-0.5), mt_rand(0,$height-0.5), $colors);
		}
	}
	header("content-type:image/jpeg");
	imagejpeg($image);
	imagedestroy($image);
}
/**
*生成缩略图；
**/
function thumb($filename,$disnation=null,$dist_w=500,$dist_h=500){
	//echo $filename;
	list($re_w,$re_h,$imagetype)=getimagesize($filename);
	$mime=image_type_to_mime_type($imagetype);//生成的值为iamge/jpeg,image/gif;
	$creatFun=str_replace("/", "createfrom", $mime);
	$outFun=str_replace("/", null, $mime);
	$re_image=$creatFun($filename);
	$dis_image=imagecreatetruecolor($dist_w ,$dist_h);
	imagecopyresampled($dis_image, $re_image, 0, 0, 0, 0, $dist_w, $dist_h, $re_w, $re_h);
    if (!file_exists(dirname($disnation)) && $disnation) {
    	mkdir(dirname($disnation),0777,true);
    	
    }
    $disFilname=$disnation===null?getUniName().".".getExit($filename):$disnation;
	$outFun($dis_image,$disFilname);
	imagedestroy($re_image);
	imagedestroy($dis_image);

}
/*$filename="e://Demo/zhangshop/uplode/14634164595739f68b9f259lufei.jpg";
$dis="../image50/14634164595739f68b9f259lufei.jpg";
thumb($filename,$dis,$dist_w=50,$dist_h=50);
*/

/**
*添加文字水印
**/
function watertext($filename,$text='myDo',$x=200,$y=200){
$fileInfo=getimagesize($filename);

$creatfun=str_replace("/", "createfrom", $fileInfo['mime']);
$outfun=str_replace("/", '', $fileInfo['mime']);
$image= $creatfun($filename);
$fontfile="font/2.ttf";
$color=imagecolorallocatealpha($image, 200, 180, 20, 20);

imagettftext($image, 20, 15, $x, $y, $color, $fontfile, $text);
$filename=basename($filename);
$newpath="./uplode/wtxt/".$filename;
//header("content-type:{$fileInfo['mime']}");
$outfun($image,$newpath);
imagedestroy($image);
}

/**
*添加图片水印
*/
function waterImage($des,$logo){
$logInfo=getimagesize($logo);
$desInfo=getimagesize($des);

$creatfunLo=str_replace("/", "createfrom", $logInfo['mime']);
$creatfunDe=str_replace("/", "createfrom", $desInfo['mime']);
$desImg=$creatfunDe($des);
$src_im=$creatfunLo($logo);
$outfunDe=str_replace("/", '', $desInfo['mime']);

imagecopymerge($desImg, $src_im, 10, 10, 0, 0, $logInfo[0], $logInfo[1], 50);
$filename=basename($des);
//echo $filename;
$newpath="./uplode/wimg/".$filename;

 if (!file_exists(dirname($newpath)) && $newpath) {
    	mkdir(dirname($newpath),0777,true);}

$outfunDe($desImg,$newpath);
imagedestroy($desImg);
imagedestroy($src_im);
}

 ?>