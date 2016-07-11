<?php 
header("content-type:text/html;charset=utf-8");
date_default_timezone_set("PRC");
session_start();
define("ROOT", dirname(__FILE__));
//echo ROOT;
set_include_path(".".PATH_SEPARATOR.ROOT."/libs".PATH_SEPARATOR.ROOT."/core".PATH_SEPARATOR.ROOT."/configs".PATH_SEPARATOR.get_include_path());
//echo  '.'.PATH_SEPARATOR.'\lib'.PATH_SEPARATOR.'\core'.PATH_SEPARATOR.ROOT.get_include_path();
require_once 'mysql.func.php';
require_once 'common.func.php';
require_once 'image.func.php';
require_once 'page.func.php';
require_once 'stringe.func.php';
require_once 'upload.func.php';
require_once 'adminInc.php';
require_once 'configs.php';
require_once 'fenleiInc.php';
require_once 'productInc.php';
require_once 'albumInc.php';
require_once 'userInc.php';
connect();

 ?>