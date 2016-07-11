<?php 
require_once "../include.php";
checkLogined();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>index</title>
	<link rel="stylesheet"  href="../bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="styles/index1.css">
    <link rel="stylesheet" href="styles/main.css" />
    <link rel="stylesheet" href="styles/theme.css" />
    <link rel="stylesheet" href="styles/MoneAdmin.css" />
    <link href="styles/layout2.css" rel="stylesheet" />
</head>
<body class="padTop53">
<!-- 总体的一个div-->
<div id="wrap">
<!-- header navbo -->
<div id="top">
	<nav class="navbar  navbar-inverse navbar-fixed-top " role="navigation" >
		
         <!-- 设置图标 开始 -->
        <header class="navbar-header">
        	<a href="index1.php " class="navbar-brand">
        		<img src="images/logon_logo.png">
        	</a>
        </header>
         <!-- 设置图标 完-->
        <!--  设置选项 开始-->
    <ul class="nav  navbar-right" style="margin: 10px">
    <div class="btn-group nav-right">
       <button class="btn "><i class="glyphicon glyphicon-user  "></i>&nbsp;管理员</button>
        <button class="btn dropdown-toggle" data-toggle="dropdown" href="#" id="dLabel" aria-haspopup="true" aria-expanded="false">
         <i class="glyphicon glyphicon-chevron-down"></i>
      </button>
    <ul class="dropdown-menu" ria-labelledby="dLabel" role="menu">
        <li><a href="#"><i class="icon-user"></i> 管理员信息 </a>
        </li>
        <li><a href="doAction.php"><i class="icon-gear"></i>登出</a>
        </li>
    </ul>
    </div>
  </ul>
      <!--  设置选项 完-->
  </nav>
</div>
<!-- 头部设置结束 -->
<!-- 左边面板的设置 -->
<div id="left">
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

<!-- 左边面板的设置 完-->



</div>
</body>
<script type="text/javascript" src="../plugins/jquery-2.0.3.min.js"></script>
<script src="../plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>

</html>