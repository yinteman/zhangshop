<?php 


function showPage($page,$totalpage,$where=''){
	$where=($where==null)?null:$where;
	$url=$_SERVER["PHP_SELF"];
	$p='';
	$jinyong=($page==1|| $page == $totalpage)?"<li class='disabled'>":"<li>";

	$pre=$jinyong."<a href='{$url}?page=".($page -1).$where."' aria-label='Previous'><span aria-hidden='true'>prev</span></a></li>";
	$arr[]=$pre;
	for($i=1; $i <= $totalpage;$i++):
		if ($page == $i) {
			$p ="<li class='active'><a href='{$url}?page={$i}{$where}'>{$i}<span class='sr-only'>(current)</span></a></li>";
			
		}else{
			$p ="<li><a href='{$url}?page={$i}{$where}'>{$i}</a></li>";
			
		}
		$arr[]=$p;
	endfor;
	$next=$jinyong."<a href='{$url}?page=".($page +1).$where."' aria-label='Next'><span aria-hidden='true'>next</span></a></li>";
	$arr[]=$next;
    return $arr;
}
//print_r(showPage(1,2)) ;


 ?>