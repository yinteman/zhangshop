<?php 
require_once '../include.php';
$id=$_REQUEST['id'];
$sql="select username, password,email from zhang_admin where id='{$id}';";
$arr=selectone($sql);
//var_dump($arr)
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>修改页面</title>
	<link rel="stylesheet"  href="../bootstrap/css/bootstrap.min.css">
</head>
<body>
	<div class="container-fluid">
      <form class="form-horizontal" action="../doAction.php?act=editAdmin&id=<?php echo $id ;?>" method="post">
      <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">姓名</label>
    <div class="col-sm-10">
      <input name="username" type="text" class="form-control" id="inputEmail3" placeholder=" <?php echo $arr['username'];?> ">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="inputEmail3" name="email" placeholder="<?php echo $arr['email'];?>" >
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="password">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <input type="submit" class="btn btn-default"></input> 
    </div>
  </div>
</form>
	</div>
</body>
</html>