<?php

require_once('base.php');
require_once('admin_base.php');

require_once('SessionUtil.php');
require_once('ConstUtil.php');
require_once('MessageUtil.php');
require_once('AdminActBusiness.php');
require_once('SupportException.php');



$logger = LoggerManager::getLogger('login');


$logger->info('活动图片管理：開始');
$admin = new AdminActBusiness();

$actcatalog = $admin->getActCatalogList();

$smarty->assign("actcatalog",$actcatalog);
$smarty->assign("YNflg",ConstUtil::getYesNo_NG());
if (empty($_REQUEST['act']) || $_REQUEST['act'] == 'list')//列表
{
	
	//-----------------------------------------------------------------
	$currpage = $_REQUEST['p'];
	if (empty($currpage))
	{
		$currpage = 1;
	}
	if ($_POST['query'] != null)
	{
		$_SESSION['query'] = $_POST['query'];
	}
	$list = $admin->getAllActList($currpage,PAGE_NUMBER,$_SESSION['query']);//修改为自己的分页查询函数
	$smarty->assign("query",$_SESSION['query']);

	//$pagepar = array("pagecount"=>$adminmodule->getTotalPage(),"recordcount"=>$adminmodule->getTotalRow(),"currpage"=>$currpage,"numberpage"=>$numberpage);
	$smarty->assign("pagecount",$admin->getTotalPage());
	//----------------分页公共部分---------------------------
	$smarty->assign("list",$list);
	

	//---------公共部分，看看是否需要加入------------------
	$smarty->assign("url_here",$_TITLES['01_act_list']['text']);//url_here不能更改
	
	$smarty->display("backstage/act_list.htm");
}
else if ($_REQUEST['act'] == 'show' || $_REQUEST['act'] == 'theme' || $_REQUEST['act'] == 'recommend')
{
	
	
	$id = $_REQUEST['id'];
	$data = $admin->getActInfo($id);
	
	if ($_REQUEST['act'] == 'show')
	{
		$smarty->assign("url_here",$_TITLES['04_act_show']['text']);//url_here不能更改
	}
	else if ($_REQUEST['act'] == 'recommend')
	{
		$smarty->assign("url_here",$_TITLES['02_act_recommend']['text']);//url_here不能更改
	}
	else if ($_REQUEST['act'] == 'theme')
	{
		
		$smarty->assign("url_here",$_TITLES['03_act_theme']['text']);//url_here不能更改
	}
	
	$smarty->assign("act",$_REQUEST['act']);
	
	$smarty->assign("data",$data[0]);

	
	$smarty->display("backstage/act_show.htm");
}
else if ($_REQUEST['act'] == 'recommend_rs')
{
	$id = $_REQUEST['id'];
	$rflg = $_REQUEST['status'];

	$data = $admin->recommentAct($id, $rflg);
	echo "<script language='javascript'>";
	echo "location='admin_act.php';";
	echo "</script>";
	
	
}
else if ($_REQUEST['act'] == 'theme_rs')
{
	$id = $_REQUEST['id'];
	$themeflg = $_REQUEST['status'];
	$data = $admin->themeAct($id, $themeflg);
	echo "<script language='javascript'>";
	echo "location='admin_act.php';";
	echo "</script>";
}




?>