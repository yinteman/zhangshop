<?php 
require_once "../include.php";
$id=$_REQUEST['id'];
$sql="select id,cname from zhang_cat where id='{$id}'";
$arr=selectone($sql);

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
      <form class="form-horizontal" action="../doAction.php?act=editFenlei&id=<?php echo $id ;?>" method="post">
      <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">分类名称</label>
    <div class="col-sm-10">
      <input name="cname" type="text" class="form-control" id="inputEmail3" placeholder=" <?php echo $arr['cname'];?> ">
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