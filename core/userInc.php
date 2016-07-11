<?php 
//require_once "../include.php";

function addUser(){
	$arr=$_POST;
	$arr['password']=md5($arr['password']);
	$arr['regtime']=time();
	$uplodeFile=uplodeFile("userUplode");
	//var_dump($uplodeFile);

	if (!($uplodeFile && is_array($uplodeFile))){
		
		echo  "请重新上传文件<a href='admin/addUserAction.php'>添加用户信息</a>";

	}else{
	     $arr['face']=$uplodeFile[0]['name'];
	     if (insert("zhang_user",$arr)) {
	     	$msg="添加用户信息成功！<a href='admin/addUserAction.php'>继续添加用户信息</a>|<a href='admin/listUserAction.php'>查看用户列表</a>";
	     }else{
	     	$msg="添加用户信息失败！<a href='admin/addUserAction.php'>继续添加用户信息</a>|<a href='admin/listUserAction.php'>查看用户列表</a>";
	     }
}

return $msg;
}
/***
*获取用户分页列表
*/

function listUserByPage($page,$pagesize){
	global $totalpage;
	$sql="select * from zhang_user";
	$totalnum=getselectnum($sql);
	$totalpage=ceil( $totalnum / $pagesize);
	if ($page==''||$page<1||!is_numeric($page)) {
		$page=1;
	}
	if ($page > $totalpage) {
		$page = $totalpage;
	}
	$offset=($page -1)*$pagesize; 
	$sql="select id , username, sex , face ,useremail ,regtime  from zhang_user limit {$offset},{$pagesize}";
	$result=selectall($sql);
	return $result;
}

/***
*查询指定用户的信息
*/
function getUserById($id){
	$sql="select * from zhang_user where id={$id}";
	$rows=selectone($sql);
	return $rows;
}
/**
*修改用户信息
*/
function edituser($id){
	$arr=$_POST;
	var_dump($arr);
	$arr['password']=md5($arr['password']);
	if (@$_FILES['changefile']['name'] && is_array($_FILES['changefile'])) {
		//var_dump($_FILES['changefile']);
		$resface=$arr['face'];
		if (file_exists("userUplode/{$resface}")) {
			unlink("userUplode/{$resface}");
		}
		$uplodeFile=uplodeFile("userUplode");
		var_dump($uplodeFile);
		if (is_array($uplodeFile)&& $uplodeFile) {
			$arr['face']=$uplodeFile[0]['name'];
		}
	}
	
	var_dump($arr['face']);
	$where="id={$id}";
    if (update("zhang_user",$arr,$where)) {
    	$msg="修改成功！<a href='admin/listUserAction.php'>返回查看列表</a>";
    }else{
    	$msg="修改失败！<a href='admin/listUserAction.php'>返回查看列表</a>";
    }
    return $msg;
}

/**
*删除用户信息
*/
function delUser($id){
 $sql="select face from zhang_user where id={$id}";
 $row=selectone($sql);
 var_dump($row);
 $filename=$row['face'];
 if (file_exists("userUplode/{$filename}")) {
 	       unlink("userUplode/{$filename}");
 }
 $where="id='{$id}'";
 if (delete("zhang_user",$where)) {
 	$msg="删除成功！<a href='admin/listUserAction.php'>返回查看列表</a>";
 	}else{
 		$msg="修改失败！<a href='admin/listUserAction.php'>返回查看列表</a>";
 	}
 	return $msg;
}
 ?>
