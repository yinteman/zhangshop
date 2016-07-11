<?php 
require_once '../include.php';
$username=$_POST['username'];
$password=md5($_POST['upwd']);
$verify1=strtoupper($_POST['verify']);
$verify2=strtoupper($_SESSION['verify']);
$autoFlag=$_POST['autoFlag'];
//echo $verify1."$$$$$$$$$$$$$$$$".$verify2;
if ($verify1 !=$verify2) {
	alerMsg("请重新输入验证码",'login.html');
}

$sql="SELECT * FROM zhang_admin WHERE username='{$username}' AND password='{$password}';";

$row=checkAdmin($sql);
var_dump($row);
if($row){
	if($autoFlag){
		setcookie("adminName",$row['username'],time()+7*3600*24);
		setcookie("aId",$row['id'],time()+7*3600*24);
	     }
	$_SESSION['adminName']=$row['username'];
	$_SESSION['aId']=$row['id'];
	alerMsg("登录成功",'index1.php');
}else{
	alerMsg("登录失败，请重新登录",'login.html');
}







 ?>