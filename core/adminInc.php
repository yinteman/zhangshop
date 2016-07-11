<?php 

/***
*检测管理员的权限
*/
function checkAdmin($sql){
	return selectone($sql);
}
/**
*检测是否登出
*/
function checkLogined(){
	if ($_SESSION['aId']=='' && $_COOKIE['aId']=='') {
		alerMsg("清先登录",'../admin/login.html');
	}
}
/**
*注销退出
*/
function loginout(){
	$_SESSION=array();
	if (isset($_COOKIE[session_name()])) {
		setcookie(session_name(),'',time() -1);
	}
	session_destroy();
	alerMsg("退出成功",'../admin/login.html');
}
/**
*新建管理员
*
*/
function addAdmin(){
	$arr=$_POST;
	$arr['password']=md5($arr['password']);
	if (insert("zhang_admin",$arr)) {
		$msg="添加成功<a href='admin/listAdminAction.php'>查看列表</a>";
	}else{
		$msg="添加失败<a href='admin/listAdminAction.php'>查看列表</a>";
	}
	return $msg;
}
/**
*获取所有管理员信息
*/
function getAllAdmin(){
	$sql="SELECT `id`,`username`,`email` FROM zhang_admin";
	$rows=selectall($sql);
	return $rows;
}

/**
*修改管理员信息
*/
function editAdmin($id){
	$arr=$_POST;
	$arr['password']=md5($arr['password']);
    $where="`id`={$id}";
    if(update("zhang_admin",$arr,$where)){
    	$msg="修改成功<a href='admin/listAdminAction.php'>查看列表</a>";
    }else{
    	$msg="修改失败<a href='admin/listAdminAction.php'>查看列表</a>";
    }

    return $msg;
}
/**
*删除管理员信息
*/
function delAdmin($id){
	$where="`id`='{$id}'";
	if(delete("zhang_admin",$where)){
		$msg="删除成功<a href='admin/listAdminAction.php'>查看列表</a>";
	}else{
		$msg="删除失败<a href='admin/listAdminAction.php'>查看列表</a>";
	}
	return $msg;
}

/**
*获取管理员分类信息
*/
function getAdminByPage($page,$pagesize=2){
	global $page,$totalpage;
	$sql="select * from zhang_admin";
	$totalRows=getselectnum($sql);
	$totalpage=ceil($totalRows/$pagesize);
	if ($page <1 ||$page==null||!is_numeric($page)) {
		$page=1;
	}
	if ($page>$totalpage) {
		$page =$totalpage;
	}
    $offset=($page -1)*$pagesize;
    $sql="select id,username,email from zhang_admin limit {$offset},{$pagesize}";
    $rows=selectall($sql);
    return $rows;
}

 ?>