<?php
require_once('base.php');
if ($_SESSION['userinfo']['comtype'] == '1' && $_SESSION['userinfo']['usertype'] == '1')
{
	//echo "OK";
}
else 
{
	$smarty->display('error.tpl');
	exit;
}


?>