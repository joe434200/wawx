<?php 
function smarty_modifier_zipcod($string,$int,$flag){
	//return $int;
	if ($int ==1){
	return  substr($string,0,strrpos($string, '-'));
	}
	else {
		return substr(strstr($string,'-'),1) ;
	}


}
?>