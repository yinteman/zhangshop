<?php 
require_once "../include.php";
@$page=$_GET['page']?$_GET['page']:1;
$pagesize=2;
$rows=getProductByPage($page,$pagesize);
$i=1;
//var_dump($rows);
if (!$rows) {
	alerMsg("没有商品信息","listProductAction.php");
}
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
 	<title>商品分类信息</title>
 </head>
 <link rel="stylesheet"  href="../bootstrap/css/bootstrap.min.css">
 <link rel="stylesheet" type="text/css" href="styles/index1.css">
  <link rel="stylesheet" href="styles/main.css" />
    <link rel="stylesheet" href="styles/theme.css" />
    <link rel="stylesheet" href="styles/MoneAdmin.css" />
    <link href="styles/layout2.css" rel="stylesheet" />

 <script type="text/javascript" src="../plugins/jquery-2.0.3.min.js"></script>

 <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
 <style type="text/css">
#listProduct{width: 1000px;margin:5px auto;}

 </style>

 <body>

<!-- 左边面板的设置 -->
<div id="leftlist">
<div class="panel panel-default">
     <div class="panel-heading">后台信息分类</div>
        <ul id="menu" class="collapse">
           <li class="panel ">
                    <a href="index1.php" >
                        <i class="glyphicon glyphicon-home"></i>&nbsp;&nbsp;<span>首页</span>
                     </a>                   
                </li>
             <!--  用户管理 开始-->
            <li class="panel ">
                 <a href="#" data-parent="#menu" data-toggle="collapse" class="alccordion-togge" data-target="#admin-nav">
                        <i class="glyphicon glyphicon-user"> </i>&nbsp;&nbsp;<span>管理员用户管理</span>   
                    </a>
                    <ul class="collapse" id="admin-nav">
                        <li class=""><a href="addAdminAction.php"><i class="glyphicon glyphicon-plus"></i> 添加管理员</a></li>
                        <li class=""><a href="listAdminAction.php"><i class="glyphicon glyphicon-th-list"></i> 查看管理员列表 </a></li>
                    </ul>
            </li>
             <!--  用户管理  完-->
              <!--  分类管理  开始-->
              <li class="panel ">
                 <a href="#" data-parent="#menu" data-toggle="collapse" class="alccordion-togge" data-target="#fenlei-nav">
                        <i class="glyphicon glyphicon-user"> </i>&nbsp;&nbsp;<span>分类管理</span>   
                    </a>
                    <ul class="collapse" id="fenlei-nav">
                        <li class=""><a href="addFenleiAction.php"><i class="glyphicon glyphicon-plus"></i> 添加分类</a></li>
                        <li class=""><a href="listFenleiAction.php"><i class="glyphicon glyphicon-th-list"></i> 查看分类列表 </a></li>
                    </ul>
            </li>
            <!--  商品管理  开始-->
              <li class="panel ">
                 <a href="#" data-parent="#menu" data-toggle="collapse" class="alccordion-togge" data-target="#product-nav">
                        <i class="glyphicon glyphicon-user"> </i>&nbsp;&nbsp;<span>商品管理</span>   
                    </a>
                    <ul class="collapse" id="product-nav">
                        <li class=""><a href="addProductAction.php"><i class="glyphicon glyphicon-plus"></i> 添加商品</a></li>
                        <li class=""><a href="listProductAction.php"><i class="glyphicon glyphicon-th-list"></i> 查看商品列表 </a></li>
                    </ul>
            </li>
             <!--  商品管理  结束-->
             <!--  商品图片管理  开始-->
              <li class="panel ">
                 <a href="#" data-parent="#menu" data-toggle="collapse" class="alccordion-togge" data-target="#productimg-nav">
                        <i class="glyphicon glyphicon-user"> </i>&nbsp;&nbsp;<span>商品图片管理</span>   
                    </a>
                    <ul class="collapse" id="productimg-nav">
                        <li class=""><a href="listProductAction.php"><i class="glyphicon glyphicon-th-list"></i> 查看商品图片列表 </a></li>
                    </ul>
            </li>
             <!--  商品图片管理  结束-->
  </ul>
    
</div>  
</div>
<!--  左边面板结束 -->

	<!-- 显示商品列表信息 --> 
<div  id="listProduct">
    <div class="panel panel-default">
	  <div class="panel-heading">分类信息</div>
	  <table class="table table-hover">
	     <thead>
	     	<tr>
	     		<th>编号</th>
	     		<th>商品名称</th>
	     		<th>商品图片</th>
	     		<th>操作</th>
	     	</tr>
	     </thead>
	     <?php 

	   foreach ($rows as $row):
	     	
	  	     ?>
	     <tbody>
	  	 <tr>
	  	 <td><?php  echo $i ;?></td>
         <td><?php   echo $row['pname']; ?></td>
          
         <td>
         	<?php 
                 $rowimages=getAllImgByProId($row['id']);
                 if ($rowimages):
                 	foreach ($rowimages as $rowimage):
             ?>
                 <img src="../uplode/<?php echo $rowimage['albumpath']?>" style="width: 200px;height: 200px"/>
             <?php 
             endforeach;
             endif;   ?>
         </td>
       <td>
       
             <button class="btn btn-mini btn-default" type="button" onclick="doimg(<?php echo $row['id'];?>,'watertext')">添加文字水印</button>
      	     <button class="btn btn-mini" type="button" onclick="doimg(<?php echo $row['id'];?>,'waterimage')">添加图片水印</button></td>
      </tr>
        <?php
        $i++;
        endforeach;?>
	     </tbody>
	    <?PHP if($totalpage>= 0 ):
	        $arr=showPage($page,$totalpage);
	       // var_dump($arr);?>
	     <tfoot>
	     	<tr>
	     	    <td colspan="4">
	     	<nav>
                <ul class="pagination">
	     	      <?php 
	     	       foreach ($arr as $i) {
	     	      	echo $i;}
	     	      
	     	      ?>
                 </ul>
              </nav>
              </td>
             </tr>
             </tfoot>
       <?php endif;?>
	  </table>
     </div> 
</div>

<!--显示商品信息完-->

 	
 </body>
<script type="text/javascript">
function doimg(id,act){
	alert(id+"DDDDDDDDDDDDDDDDDDDD"+act);
	location.href="../doAction.php?act="+act+"&id="+id;

}
</script>
 </html>