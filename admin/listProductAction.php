<?php 
require_once "../include.php";
$pagesize=2;
@$page=$_GET['page']?$_GET['page']:1;
@$keywords=$_GET['keywords']?$_GET['keywords']:'';
@$order=$_GET['order']?$_GET['order']:'';
$where='';
$where .=$keywords?"&keywords={$keywords}":'';
$where .=$order?"&order={$order}":'';
echo $where;
//echo $keywords;
$rows=getProductByPage($page,$pagesize,$keywords,$order);
//var_dump($rows);
if (!$rows) {
	 alerMsg("请添加商品","addProductAction.php");
}
$i=1;
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
<!--************************工具栏开始***************************************-->
 <div class="container-fluid">
      <div class="row">
      	   <div class="col-md-4 col-md-offset-2">
      	 	<a href="addProductAction.php" class="btn btn-primary">添加商品</a>
      	 	</div>
      	</div>
      	 <form action="" class="form-inline">
      	 <div class="row">
      	 <div class="form-group">
      	     <div class="col-md-offset-10">
      	     <label class="control-label">商品价格：</label>
      	 	
      	 		<select class="form-control" onchange="change()" id="select1">
      	 			<option>请选择</option>
      	 			<option value="iPrice asc">由低到高</option>
      	 			<option value="iPrice desc">由高到低</option>
      	 		</select>
      	 	</div>
      	 	</div>
 
      	</div>

       <div class="form-group">
        <div class="row">
           <div class="col-md-6 col-md-offset-9">
           <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for..." id="sreach"/>
           <span class="input-group-btn">
           <button class="btn btn-default glyphicon glyphicon-search" type="button" onclick="search()"></button>
             </span>
           </div><!-- /input-group -->
        </div><!-- /.col-lg-6 -->
     </div><!-- /.row -->
</div>  
</form>  
</div>
<!--************************工具栏完******************************************-->
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
	     		<th>商品分类</th>
	     		<th>是否上架</th>
	     		<th>上架时间</th>
	     		<th>市场价格</th>
	     		<th>我的价格</th>
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
         <td><?php  echo $row['cname'];  ?></td>
         <td><?php  echo $row['isshow']==1?"上架":"没有上架"; ?></td>
         <td><?php   echo $row['pubtime']; ?></td>
         <td><?php   echo $row['mprice']; ?></td>
         <td><?php   echo $row['iprice'];  ?></td>
      <td style="display:none;"></td>
       <td>
        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal<?php echo $row['id'];?>" id="detail">详情</button>
        <!--******- ********************************显示商品详情对话框***************************-->
<div class="modal fade" id="myModal<?php echo $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
           <!-- modal-header -->
             <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                   <h4 class="modal-title">
                    <span id="lblAddTitle" style="font-weight:bold">详情信息</span>
                </h4>
            </div>
            <!-- modal-header -->
            <table  class="table">
              <div class="modal-body">
              <tr>
                <td>商品名称</td>
                <td ><?php echo $row['pname'];?></td>
              </tr>
               <tr>
                <td>商品类别</td>
                <td ><?php echo $row['cname'];?></td>
              </tr>
              <tr>
                <td>商品图片</td>
                <td>
                <?php 
                $imagefiles=getAllImgByProId($row['id']);
                foreach ($imagefiles as $imagefile):
                  ?>
                <img src="../uplode/<?php echo $imagefile['albumpath'];?>" style="width: 100px;height: 100px">
                <?php endforeach;?>
                </td>
              </tr>
              </div>
            </table>
            <div class="modal-footer bg-info">
                    <a  class="btn btn-default" data-dismiss="modal">Close</a>
            </div>
        </div><!-- modal-content -->
    </div><!-- modal-dialog -->
</div>
<!--******- ********************************显示商品详情对话框***完************************-->
             <button class="btn btn-mini btn-default" type="button" onclick="editPro(<?php echo $row['id'];?>)">修改</button>
      	     <button class="btn btn-mini" type="button" onclick="delPro(<?php echo $row['id'];?>)">删除</button></td>
      </tr>
        <?php
        $i++;
        endforeach;?>
	     </tbody>
	    <?PHP if($totalpage>= 0 ):
	        $arr=showPage($page,$totalpage,$where);
	       // var_dump($arr);?>
	     <tfoot>
	     	<tr>
	     	    <td colspan="8">
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
function editPro(id){
  location.href="editProductAction.php?id="+id;
}
function delPro(id){
   alert(id);
  location.href="../doAction.php?act=delproduct&id="+id;
}
function search(){
  //alert("EEEEEEEEEEEEEe");
  var val=$('#sreach').val();

 // alert(val);
  location.href="listProductAction.php?keywords="+val;
}
function change(){
  var val=$('#select1 option:selected').val();
  location.href="listProductAction.php?order="+val;
}
</script>
 </html>