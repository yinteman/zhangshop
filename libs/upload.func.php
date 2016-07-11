<?php 
	require_once 'stringe.func.php';
	function buildInfo(){
    if (!$_FILES) {
      return ;
    }

   // var_dump($_FILES);
        $i=0;
       foreach($_FILES as $v){
    //单文件
    if(is_string($v['name'])){
      $files[$i]=$v;
      $i++;
    }else{
      //多文件
      foreach($v['name'] as $key=>$val){
        $files[$i]['name']=$val;
        $files[$i]['size']=$v['size'][$key];
        $files[$i]['tmp_name']=$v['tmp_name'][$key];
        $files[$i]['error']=$v['error'][$key];
        $files[$i]['type']=$v['type'][$key];
        $i++;
      }
    }
  }
  return $files;
}

	function uplodeFile($path='./zhangshop/uplod',$arr=array("jpeg","gif","jpg","png")){
       $i=0;
       if (!file_exists($path)) {
       	      mkdir($path);
       }
    
       $files=buildInfo();
       if (!$files|| !is_array($files)) {
           return ;
       }
       
       foreach ($files as $file) {
         if ($file['error']) {
         	$msg="文件传输错误";
         }
         $ext=getExit($file['name']);
         if (!in_array( $ext ,$arr)) {
         	exit("不能上传该文件");
         }

         if (!is_uploaded_file($file['tmp_name'])) {
         	exit("通过pOST没有这文件");
         }
         $fileName=getUniName().$file['name'];
         //echo $fileName;
         $distination=$path."/". $fileName;
        if (move_uploaded_file($file['tmp_name'], $distination)) {
         	$file['name']=$fileName;
         	unset($file['error'],$file['tmp_name']);
         	$uplodeFiles[$i]=$file;
         	$i++;
         }else{$msg="上传文件失败";}
         
        }
       // var_dump($uplodeFiles);
       return $uplodeFiles;
	}













 ?>