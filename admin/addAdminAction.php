<?php 

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>添加管理员</title>
</head>
<body>
<form action="../doAction.php?act=addAdmin" method="post">
	<span>管理员名称</span>
	<input type="text" name="username">
	<span>管理员密码</span>
	<input type="password" name="password">
	<span>邮箱</span>
	<input type="text" name="email">
	<button type="submit">提交</button>
</form>
	
</body>
</html>