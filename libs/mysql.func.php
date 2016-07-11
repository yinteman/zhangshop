<?php 

/**
*连接数据库；
*/
function connect(){
	
	$link=mysqli_connect(DB_HOST,DB_USER,DB_PWD,DB_databas) or die("连接失败");
	//mysqli_query($link,"SET NAMES 'UTF8'");
	return $link;
}
/**
*插入操作
*insert into table(`username`,`password`)values('adf','sdgfds');
*/
function insert($table,$arr){
	$link=connect();
    $key="`".implode("`,`", array_keys($arr))."`" ;
    $val="'".implode("','", array_values($arr))."'" ;
    $sql="INSERT  INTO  {$table}(".$key.") VALUES (".$val.");";
    //echo $sql;
    mysqli_query($link,$sql);
    //var_dump(mysqli_insert_id($link));
     return mysqli_affected_rows($link);}
/**
*修改操作.更新操作
*update table set `key1`='valudes' where ....;
*/
function update($table,$arr,$where=null){
	$str='';
	foreach ($arr as $key => $value):
		if ($str=="") {
			$step="";
		}else{
			$step=",";
		}
		$str .=$step."`".$key."` ='".$value."'";
	endforeach;
	$where=$where==null?null:" WHERE ".$where;
	$sql="UPDATE {$table} SET {$str} ".$where;
	$link=connect();
	mysqli_query($link,$sql);
	return mysqli_affected_rows($link);
}
/**
*删除操作
*delete table where....;
*/
function delete($table,$where=null){
	$link=connect();
	$where=$where==null?null:"WHERE ".$where;
	$sql="DELETE FROM {$table} ".$where;
	//echo $sql;
	mysqli_query($link,$sql);
	return mysqli_affected_rows($link);
}
/**
*查询选定的条目
*
*/
function selectone($sql,$result_type=MYSQL_ASSOC){
	$link=connect();
	$result=mysqli_query($link,$sql);
	//var_dump($sql);
    $row=mysqli_fetch_array($result,$result_type);
         return $row;
}
/**
*查询所有的信息
*/
function selectall($sql,$result_type=MYSQL_ASSOC){
	$link=connect();
	$result=mysqli_query($link,$sql);
	$rows=array();
	//echo $sql;
	//var_dump($result);

	while ( $row=mysqli_fetch_array($result,$result_type)) {

		$rows[]=$row;
	}
	return $rows;
}
/**
*获得查询条目的总和
*/
function getselectnum($sql){
	   $link=connect();
      $result=mysqli_query($link,$sql);
      return mysqli_num_rows($result);
}

/**
*获得当前id的值节点位置
*/
function getIndx($table){
	$link=connect();
	$sql="select max(id) from {$table}";
	$result=mysqli_query($link,$sql);
	return mysqli_fetch_array($result);
	
}
 
 ?>
