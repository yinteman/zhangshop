<?php 
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>添加用户</title>
 </head>
 <body>
 	<form action="../doAction.php?act=addUser" method="post" enctype="multipart/form-data" >
	<span>用户名称</span>
	<input type="text" name="username">
	<span>用户密码</span>
	<input type="password" name="password">
	<span>用户邮箱</span>
	<input type="email" name="useremail">
	<span>性别</span>
	<input type="radio" name='sex' checked="checked" value="1" />男
	<input type="radio" name='sex'  value="2"/>女
	<input type="radio" name='sex'  value="3"/>保密
    <span>头像</span>
    <input type="file" name="myfile"/>
	<button type="submit">提交</button>
</form>
 </body>
 </html>