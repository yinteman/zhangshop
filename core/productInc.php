<?php 
//require_once '../include.php';
/****
**添加商品
*
*/
function addproduct(){
	$arr=$_POST;
	$arr['pubtime']=time();
	if($arr['pname']==''||$arr['cid']==0){
		exit("请添加商品");
	}
	$path="uplode";
	$uplodeFiles=uplodeFile($path);
   
	if (is_array($uplodeFiles)){
		foreach ($uplodeFiles as $key => $uplodeFile) {
             
			thumb("e://Demo/zhangshop/".$path.'/'.$uplodeFile['name'],"image50/".$uplodeFile['name'],50,50);
			thumb("e://Demo/zhangshop/".$path.'/'.$uplodeFile['name'],"image200/".$uplodeFile['name'],200,200);
			thumb("e://Demo/zhangshop/".$path.'/'.$uplodeFile['name'],"image350/".$uplodeFile['name'],350,350);
			thumb("e://Demo/zhangshop/".$path.'/'.$uplodeFile['name'],"image800/".$uplodeFile['name'],800,800);
			
		}
		
	}
	$res=insert("zhang_pro",$arr);
	$pid=getIndx('zhang_pro');
	var_dump($pid);
	
	if ($res) {
		foreach ($uplodeFiles as $uplodeFile):
			$arr1['pid']=$pid[0];
			$arr1['albumpath']=$uplodeFile['name'];
			if(addAlbum($arr1)){
				$msg="上传成功<a href='admin/listProductAction.php'>返回查看列表</a>";};
		endforeach;
	}else{
		foreach ($uplodeFiles as $key => $uplodeFile):
			if (file_exists("../image50/".$uplodeFile['name'])) {
				unlink("../image50/".$uplodeFile['name']);
			}
			if (file_exists("../image200/".$uplodeFile['name'])) {
				unlink("../image200/".$uplodeFile['name']);
			}
			if (file_exists("../image350/".$uplodeFile['name'])) {
				unlink("../image350/".$uplodeFile['name']);
			}
			if (file_exists("../image800/".$uplodeFile['name'])) {
				unlink("../image800/".$uplodeFile['name']);
			}

		endforeach;
		$msg="文件上传失败<a href='../admin/addproduct.php'>重新添加文件</a>";
	}
	return $msg;

}
/****
*
*获取商品信息（联合查询；
*/

function getAllByAdmin($offset,$pagesize,$keywords='',$orderby=''){
	$where=$keywords?"where p.pname like '%{$keywords}%'":null;
	$sql="select p.id ,p.pname,p.pnum,p.mprice,p.iprice,p.pdesc,p.pubtime,p.isshow,p.ishot,c.cname from zhang_pro as p join zhang_cat as c on p.cid=c.id {$where} {$orderby} limit {$offset},{$pagesize}";
	$rows=selectall($sql);
	return $rows;
}

/***
*获取页面分页的商品信息
*/
function getProductByPage($page,$pagesize=2,$keywords='',$order=''){
	global $totalpage;

	$where=$keywords?"where pname like '%{$keywords}%'":null;
	$orderby=$order?"order by {$order}":'' ;
	$sql="select * from zhang_pro ".$where;
	$totalnum=getselectnum($sql);

	//var_dump($totalnum);
	
	$totalpage=ceil($totalnum / $pagesize);

	if ($page < 1 || $page==''||!is_numeric($page)) {
		$page=1;
	}
	if ($page > $totalpage) {
		$page = $totalpage;
	}
	$offset=($page -1)* $pagesize;
	//var_dump($page);
	//echo $offset;
	$rows=getAllByAdmin($offset,$pagesize,$keywords,$orderby);
	return $rows;
}

/**
*获得单条商品的信息
*/
function getproOne($id){
	$sql="select p.id ,p.pname,p.psn,p.pnum,p.mprice,p.iprice,p.pdesc,p.pubtime,p.isshow,p.ishot,c.cname ,p.cid from zhang_pro as p join zhang_cat as c on p.cid=c.id where p.id='{$id}'";
	$row=selectone($sql);
	return $row;
}
/***
*修改商品信息
*/
function editproduct($id){
    $where="id='{$id}'";
    $arr=$_POST;
	if($arr['pname']==''||$arr['cid']==0){
		exit("请添加商品");
	}
	$path="uplode";
	$uplodeFiles=uplodeFile($path);
   
	if (is_array($uplodeFiles)){
		foreach ($uplodeFiles as $key => $uplodeFile) {
             
			thumb("e://Demo/zhangshop/".$path.'/'.$uplodeFile['name'],"image50/".$uplodeFile['name'],50,50);
			thumb("e://Demo/zhangshop/".$path.'/'.$uplodeFile['name'],"image200/".$uplodeFile['name'],200,200);
			thumb("e://Demo/zhangshop/".$path.'/'.$uplodeFile['name'],"image350/".$uplodeFile['name'],350,350);
			thumb("e://Demo/zhangshop/".$path.'/'.$uplodeFile['name'],"image800/".$uplodeFile['name'],800,800);
			
		}
		
	}
	$res=insert("zhang_pro",$arr);
	$pid=getIndx('zhang_pro');
	//var_dump($pid);
	
	if ($res) {
		if (is_array($uplodeFiles)) {
		
		
		foreach ($uplodeFiles as $uplodeFile):
			$arr1['pid']=$pid[0];
			$arr1['albumpath']=$uplodeFile['name'];
			if(addAlbum($arr1)){
				$msg="上传成功<a href='admin/listProductAction.php'>返回查看列表</a>";};
		endforeach;
	}else{ 
	$msg="没有修改图片<a href='admin/listProductAction.php'>返回查看列表</a>";}
	}else{
		foreach ($uplodeFiles as $key => $uplodeFile):
			if (file_exists("../image50/".$uplodeFile['name'])) {
				unlink("../image50/".$uplodeFile['name']);
			}
			if (file_exists("../image200/".$uplodeFile['name'])) {
				unlink("../image200/".$uplodeFile['name']);
			}
			if (file_exists("../image350/".$uplodeFile['name'])) {
				unlink("../image350/".$uplodeFile['name']);
			}
			if (file_exists("../image800/".$uplodeFile['name'])) {
				unlink("../image800/".$uplodeFile['name']);
			}

		endforeach;
		$msg="文件上传失败<a href='admin/addproduct.php'>重新添加文件</a>";
	}
   
   
	return $msg;
	}
/**
*删除商品
**/

function delproduct($id){
	$where="id='{$id}'";
	$res=delete("zhang_pro",$where);
	if (!$res) {
		exit("没有删除成功");
	}
	$proImg=getAllImgByProId($id);
	//var_dump($proImg[0]);
	if (is_array($proImg[0])){
		  
		  
		if (file_exists("uplode/".$proImg[0]['albumpath'])) {
			unlink("uplode/".$proImg[0]['albumpath']);

		}
         
		if (file_exists("image200/".$proImg[0]['albumpath'])) {
			unlink("image200/".$proImg[0]['albumpath']);
		}
		if (file_exists("image350/".$proImg[0]['albumpath'])) {
			unlink("image350/".$proImg[0]['albumpath']);
		}
		if (file_exists("image200/".$proImg[0]['albumpath'])) {
			unlink("image200/".$proImg[0]['albumpath']);
		}
		if (file_exists("image800/".$proImg[0]['albumpath'])) {
			unlink("image800/".$proImg[0]['albumpath']);
		}
		if (file_exists("image50/".$proImg[0]['albumpath'])) {
			unlink("image50/".$proImg[0]['albumpath']);
		}
		$where1="pid='{$id}'";
		$res1=delete("zhang_album",$where1);
		if (res1) {
			$msg="删除成功！！<a href='admin/listProductAction.php'>查看列表</a>";
		}else{
			$msg="删除失败！！！<a href='admin/listProductAction.php'>查看列表</a>";
		}
	}
	return $msg;
}

/**
*检查分类下是否有产品
**/
function checkedproexists($cid){
	$sql="select * from zhang_pro where cid='{$cid}'";
	$rows=selectall($sql);
	return $rows;
}
/***
*获取对应分类下的所有商品
*/
function getProByCid($id,$limit=''){
	$limit= $limit==''?'':"limit {$limit}";
	$sql="select p.id ,p.pname,p.psn,p.pnum,p.mprice,p.iprice,p.pdesc,p.pubtime,p.isshow,p.ishot,c.cname ,p.cid from zhang_pro as p join zhang_cat as c on p.cid=c.id where p.cid='{$id}' {$limit} ;";
    $rows=selectall($sql);
    return $rows;
}


 ?>


