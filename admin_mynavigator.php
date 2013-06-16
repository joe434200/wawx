<?php

require_once('base.php');
require_once('admin_base.php');
require_once('SessionUtil.php');
require_once('ConstUtil.php');
require_once('Const.php');
require_once('MessageUtil.php');
require_once('AdminMyNavigatorBusiness.php');
require_once('SupportException.php');



$logger = LoggerManager::getLogger('login');


$logger->info('登录：開始');
$adminnavi = new AdminMyNavigatorBusiness();


if (empty($_REQUEST['act']) || $_REQUEST['act'] == 'ini')//列表
{
	$mynavigators = $adminnavi->getMyNavigators($_SESSION['admininfo']['ID']);
	$mayallmodules = $adminnavi->getAllModules($_SESSION['admininfo']['usertype']);
	//echo "<pre>";
	//print_r($mayallmodules);
	$smarty->assign("data",$_SESSION['admininfo']);
	$smarty->assign("mynavigators",$mynavigators);
	$smarty->assign("allmodules",$mayallmodules);
	
	$smarty->display("backstage/mynavigator.htm");
}
else if ($_REQUEST['act'] == 'submit')
{
	$dataa = $_POST['data'];
	$datab = $_POST['nav_list'];
	$mynavi = split(",", $datab);
	
	if (!empty($_POST['confirm_password']))
	{
		$dataa['password'] = $_POST['confirm_password'];
	}
	//echo "<pre>";
	//print_r($mynavi);
	$adminnavi->updateMyInfo($dataa,$mynavi,$_SESSION['admininfo']['ID']);
	echo "<script language='javascript'>";
	echo "location='admin_mynavigator.php';";
	echo "</script>";
}
?>