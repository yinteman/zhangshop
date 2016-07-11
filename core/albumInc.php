<?php 
function addAlbum($arr){
	var_dump($arr);
	$id=insert("zhang_album",$arr);
	return $id;
}

/**
*获得商品的所有图片信息
*/
function getAllImgByProId($id,$limit=''){
	$limit= $limit==''?'':" limit {$limit}" ;
	$sql="select * from zhang_album where pid={$id} ".$limit;
	//echo $sql;
	$imagFiles=selectall($sql);
	//var_dump($imagFiles);
	return $imagFiles;
}
/***
*添加商品图片的文字水印
*/
function dowatertext($id){
	$images=getAllImgByProId($id);
	//var_dump($images);

	if ($images && is_array($images)) {
		foreach ($images as $image):
			$filename="e://Demo/zhangshop/uplode/".$image['albumpath'];
		    
		    watertext($filename ,$text='myDo',$x=200,$y=200);
		endforeach;
		$msg="水印添加成功 !!<a href='admin/listProductImageAction.php'>查看列表</a>";
	      }else{
	      	$msg="水印添加失败 !!<a href='admin/listProductImageAction.php'>查看列表</a>";
	      }
	      return $msg;
	      
}

/**
*
*添加商品图片的图片水印
*/

function dowaterimage($id){
	$images=getAllImgByProId($id);
    if ($images && is_array($images)) {
		foreach ($images as $image):
			$filename="e://Demo/zhangshop/uplode/".$image['albumpath'];
		    $logo="e://Demo/zhangshop/mylogo.jpg";
		    waterImage($filename,$logo);
		endforeach;
		$msg="水印添加成功 !!<a href='admin/listProductImageAction.php'>查看列表</a>";
	      }else{
	      	$msg="水印添加失败 !!<a href='admin/listProductImageAction.php'>查看列表</a>";
	      }
	      return $msg;
}
 ?> 
