<?php
/***
*添加分类
*/
function addFenlei(){
	$arr=$_POST;
	
	if (insert("zhang_cat",$arr)){
		$msg="添加成功!<a href='admin/addFenleiAction.php'>继续添加</a>|<a href='admin/listFenleiAction.php'>查看列表</a>";
	}else{
		$msg="添加失败!<a href='admin/addFenleiAction.php'>继续添加</a>|<a href='admin/listFenleiAction.php'>查看列表</a>";
	}
	return $msg;
}
/**
*获取所有分类信息
*/

function listFenlei(){
	$sql="select * from zhang_cat";
	$rows=selectall($sql);
	return $rows;
}
/**
*添加分类的分页显示
*/
function listFenyeBypage($page,$pagesize=2){
	global $totalpage;
	$sql="select * from zhang_cat";
	$totalNum=getselectnum($sql);
	$totalpage=ceil( $totalNum / $pagesize);
	//var_dump($totalpage);
	if ($page < 1|| $page==''||!is_numeric($page)) {
		$page=1;
	}
	if ($page > $totalpage) {
		$page=$totalpage;
	}
	$offset=($page-1)*$pagesize;
	$sql="select id,cname from zhang_cat limit {$offset},{$pagesize}";
	$rows=selectall($sql);
	return  $rows;
}
/***
*修改分类页面
*/
function editFenlei($id){
	$arr=$_POST;
	$where=" id='{$id}'";
if (update("zhang_cat",$arr,$where)){
	$msg="修改成功！<a href='admin/listFenleiAction.php'>返回查看分类列表</a>";
}else{$msg="修改失败！<a href='admin/listFenleiAction.php'>返回查看分类列表</a>";}
return $msg;
}
/*
**删除分类项目
*/
function deletFenlei($id){
	$res=checkedproexists($id);
	var_dump($res);
	if ( ! $res) {
		$where="id='{$id}'";
	if(delete("zhang_cat",$where)){

		$msg=" 删除成功！<a href='admin/listFenleiAction.php'>返回查看分类列表</a>";
	}else{
		$msg="删除失败！<a href='admin/listFenleiAction.php'>返回查看分类列表</a>";
	}
	}else{
       $msg="请先删除该分类下的商品！<a href='admin/listProductAction.php'>查看商品列表</a>" ;
	}
	 return $msg;
	
}
 ?>
