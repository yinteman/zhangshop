<?php 
require_once 'include.php';
$act=$_GET['act'];
$msg='';
//echo $act;
switch ($act) {
	case 'login':
		$msg=login();
		break;
	case 'addAdmin':
	   //echo "$$$$$$$$$$$$$$4";
		$msg=addAdmin();
		break;
	case 'editAdmin':
	    $id=$_GET['id'];
	   //echo "$$$$$$$$$$$$$$4";
		$msg=editAdmin($id);
		break;
	case 'delAdmin':
	    $id=$_GET['id'];
	   //echo "$$$$$$$$$$$$$$4";
		$msg=delAdmin($id);
		break;
	case 'addFenlei':
		$msg=addFenlei();
		break;
	case 'editFenlei':
		$id=$_GET['id'];
		$msg=editFenlei($id);
		break;	
    case 'deletFenlei':
    	$id=$_GET['id'];
    	$msg=deletFenlei($id);
    	break;
    case 'addproduct':
    	$msg=addproduct();
    	break;
    case 'editproduct':
        $id=$_GET['id'];
        $msg=editproduct($id);
        break;
     case 'delproduct':
        $id=$_GET['id'];
        $msg=delproduct($id);
        break;
    case 'addUser':
        $msg=addUser();
        break;
    case 'edituser':
        $id=$_GET['id'];
    	$msg=edituser($id);
    	break;
    case 'delUser':
    	$id=$_GET['id'];
    	$msg=delUser($id);
    	break;
    case 'watertext':
    	$id=$_GET['id'];
    	$msg=dowatertext($id);
    	break;
    case 'waterimage':
    	$id=$_GET['id'];
    	$msg=dowaterimage($id);
    	break;
}
?>  
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	<h3><?php echo $msg;?><h3>
</body>
</html>