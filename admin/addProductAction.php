<?php 
require_once "../include.php";
//checkLogined();
$rows= listFenlei();
if (!$rows) {
	alerMsg("还没添加分类信息","addFenleiAction.php");
}


 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>添加商品信息</title>
 	<link rel="stylesheet" href="../bootstrap/css/bootstrap.css" />
 	<link rel="stylesheet" type="text/css" href="styles/addproduct.css"/>
 </head>
 <body>
 <div class="container">
  <div class="row-fluid">
     <form role="form" method="post" enctype="multipart/form-data" action="../doAction.php?act=addproduct" >
         <div class="form-group row-fluid">

  	        <label class="span4">商品名称</label>
  	        <input class="span8 form-control" name="pname"/>
  	     </div>
         <div class="form-group row-fluid">
         	<label class="span4">商品分类</label>
  	        <select class="span8 from-control" name="cid">
  	           <?php foreach ($rows as $row):?>
  	           	<option value="<?php echo $row['id'];?>"><?php echo $row['cname']; ?></option>
  	           <?php endforeach;?>
  	        </select>
  	     </div>
  	     <div class="form-group row-fluid">
  	        <label class="span4">商品货号</label>
  	        <input class="span8 form-control" name="psn"/>
  	     </div>
  	     <div class="form-group row-fluid">
  	        <label class="span4">商品数量</label>
  	        <input class="span8 form-control" name="pnum"/>
  	     </div>
  	     <div class="form-group row-fluid">
  	        <label class="span4">商品市场价</label>
  	        <input class="span8 form-control" name="mprice"/>
  	     </div>
  	     <div class="form-group row-fluid">
  	        <label class="span4">我的商品价</label>
  	        <input class="span8 form-control" name="iprice"/>
  	     </div>
  	     <div class="form-group row-fluid">
  	        <label class="span4">商品描述</label>
  	        <textarea class="span8 form-control" name="pdesc"></textarea>
  	     </div>
         <div class="form-group row-fluid">
  	        <label class="span4">商品图像</label>
  	        <a href="javascript:void(0)" id="selectFileBtn" class="span8 btn btn-primary">添加附件</a>
  	        <div id="attachList" class="row-fluid"></div>
  	     </div>
  	    <div class="form-group row-fluid">
  	         <input type="submit" class="btn btn-primary" value="发布商品"/></div>
</form>
   </div>
  </div>
 </body>
 <script type="text/javascript" src="../plugins/jquery-2.0.3.min.js"></script>
<script src="../plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript">
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


</script>
 </html>