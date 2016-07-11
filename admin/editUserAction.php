<?php
require_once '../include.php';
$id=$_GET['id'];

$userInfo=getUserById($id);
var_dump($userInfo);
if (!$userInfo) {
	alerMsg("没有该用户","listUserAction.php");
}

 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>修改用户信息</title>
 	<link rel="stylesheet" href="../bootstrap/css/bootstrap.css" />
 	<link rel="stylesheet" type="text/css" href="styles/addproduct.css"/>
 </head>
 <body>
 <div class="container">
  <div class="row-fluid">
     <form role="form" method="post" enctype="multipart/form-data" action="../doAction.php?act=edituser&id=<?php echo $id;?>">
         <div class="form-group row-fluid">

  	        <label class="span4">用户姓名</label>
  	        <input class="span8 form-control" name="username" value="<?php echo $userInfo['username']?>">
  	     </div>
  	     <div class="form-group row-fluid">

  	        <label class="span4">用户密码</label>
  	        <input class="span8 form-control" name="password" >
  	     </div>
         <div class="form-group row-fluid">
         	<label class="span4">性别</label>
  	        <input type="radio" name="sex" value="mal" <?php echo $userInfo['sex']=='mal'?"checked='checked'":null;?>>男
  	        <input type="radio" name="sex" value="femal" <?php echo $userInfo['sex']=='femal'?"checked='checked'":null;?>>女
  	        <input type="radio" name="sex" value="unsee" <?php echo $userInfo['sex']=='unsee'?"checked='checked'":null;?>>保密
  	     </div>
  	     <div class="form-group row-fluid">
  	        <label class="span4">email</label>
  	        <input class="span8 form-control" name="useremail" value="<?php echo $userInfo['useremail'];?>" />
  	     </div>
         <div class="form-group row-fluid">
  
  	        <label class="span4">用户头像</label>
  	        <input type="file" name="changefile"></input>
  	        <!-- <a href="javascript:void(0)" id="selectFileBtn" class="span8 btn btn-primary">添加附件</a>
  	        <div id="attachList" class="row-fluid"></div> -->
  	     </div>
  	     <div class="form-group row-fluid">
  	        
  	        <input type="text" name='face' style="display: none;" value="<?php echo $userInfo['face']?>"></input>
  	     </div>
  	    <div class="form-group row-fluid">
  	         <input type="submit" class="btn btn-primary" value="修改用户信息"/></div>
</form>
   </div>
  </div>
 </body>
 <script type="text/javascript" src="../plugins/jquery-2.0.3.min.js"></script>
<script src="../plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
<!-- <script type="text/javascript">
      $(document).ready(function(){
        	$("#selectFileBtn").click(function(){
        		$fileField = $('<input type="file" name="thumbs[]"/>');
        		$fileField.hide();
        		$("#attachList").append($fileField);
        		$fileField.trigger("click");
        		$fileField.change(function(){
        		$path = $(this).val();
        		$filename = $path.substring($path.lastIndexOf("\\")+1);
        		$attachItem = $('<div class="attachItem"><div class="left">a.gif</div><div class="right"><a href="#" title="删除附件">删除</a></div></div>');
        		$attachItem.find(".left").html($filename);
        		$("#attachList").append($attachItem);		
        		});
        	});

        	$("#attachList>.attachItem").find('a').live('click',function(obj,i){
        		$(this).parents('.attachItem').prev('input').remove();
        		$(this).parents('.attachItem').remove();
        	});

           });


</script> -->
 </html>