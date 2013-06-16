<?php

require_once('base.php');
require_once('admin_base.php');
require_once('SessionUtil.php');
require_once('ConstUtil.php');
require_once('MessageUtil.php');
require_once('AdminShopBusiness.php');
require_once('SupportException.php');
require_once('FilesOperateBusiness.php');


$logger = LoggerManager::getLogger('login');


$logger->info('店铺管理：開始');
$admin = new AdminShopBusiness();
$smarty->assign("auditstatus",ConstUtil::getAuditStatusShopAll());
$smarty->assign("YNStatus",ConstUtil::getYesNo_NG());



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
	$list = $admin->getAllShopList($currpage,PAGE_NUMBER,$_SESSION['query']);//修改为自己的分页查询函数

	//$pagepar = array("pagecount"=>$adminmodule->getTotalPage(),"recordcount"=>$adminmodule->getTotalRow(),"currpage"=>$currpage,"numberpage"=>$numberpage);
	$smarty->assign("pagecount",$admin->getTotalPage());
	//----------------分页公共部分---------------------------
	$smarty->assign("list",$list);


	//---------公共部分，看看是否需要加入------------------
	$smarty->assign("url_here",$_TITLES['01_shop_list']['text']);//url_here不能更改

	
	$smarty->display("backstage/shop_list.htm");
}
else if ($_REQUEST['act'] == 'show')
{
	$id = $_REQUEST['id'];
	$data = $admin->getShopInfo($id);
	$smarty->assign("url_here",$_TITLES['03_shop_show']['text']);//url_here不能更改
	$smarty->assign("data",$data);
	$smarty->display("backstage/shop_show.htm");
}
else if ($_REQUEST['act'] =='audit')
{
	$id = $_REQUEST['id'];
	$data = $admin->getShopInfo($id);
	$smarty->assign("url_here",$_TITLES['02_shop_audit']['text']);//url_here不能更改

	$smarty->assign("data",$data);
	$smarty->display("backstage/shop_audit.htm");
}
else if ($_REQUEST['act'] == 'audit_rs')
{
	$data = $_POST['data'];

	$id = $_POST['id'];
	$admin->audit($id, $data);
	echo "<script language='javascript'>";
	echo "location='admin_shop.php';";
	echo "</script>";
}

else if ($_REQUEST['act'] == 'download')
{
	if(isset($_REQUEST["id"]) && $_REQUEST["id"] > 0)
	{
		$id = $_REQUEST["id"];
		$lic = $admin->getLicence($id);
		FilesOperateBusiness::downloadFile(UPLOAD_FILES_SHOP_PATH.$lic, $lic);

		//FilesOperateBusiness::downloadFile(UPLOAD_FILES_HELP_PATH.$info["newfilename"],$info["oldfilename"]);

	}
	exit;
}




?>