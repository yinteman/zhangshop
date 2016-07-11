<?php 
function buildRandomString($type=1,$length=4){
	switch ($type) {
		case 1:
			$chars=join("",range(0, 9));//jion函数是implode()的别名;implode将数组内的所有键值连接起来成为字符串；
			break;
		case 2:
			$chars=join("",array_merge(range("a", "z"),range("A", "Z")));//array_merge()是将数组合并成为一个
			break;
		case 3:
			$chars=join("",array_merge(range("a", "z"),range("A", "Z"),range(0,9)));
			//echo $chars;
			break;
		}
	if ($length > strlen($chars)){
		exit;
	}
	$chars=str_shuffle($chars); //str_shuffle() 函数随机打乱字符串中的所有字符。
	
	return substr($chars, 0,$length);}

/***截取文件类型*****/
function getExit($fileName){
	return strtolower(substr($fileName, strrpos($fileName, '.') +1));
}


function getUniName(){
	return uniqid(time());
}

 ?>
