<?php
require_once('base.php');
if(!isset($_SESSION['adminLogin_ok']) && $_SESSION['adminLogin_ok'] != '1' && $page_name != 'admin_login.php'){
	header('Location:admin_login.php');
	exit();
}

if ($_SESSION['admininfo']['usertype'] == '1'|| $_SESSION['admininfo']['adminflg'] == '1')
{
	//echo "OK";
}
else 
{
	$smarty->display('error.tpl');
	exit;
}















?>