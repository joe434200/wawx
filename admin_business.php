<?php

require_once('base.php');
require_once('admin_base.php');
require_once('SessionUtil.php');
require_once('ConstUtil.php');
require_once('MessageUtil.php');
require_once('AdminBusinessBusiness.php');
require_once('SupportException.php');
require_once('FilesOperateBusiness.php');


$logger = LoggerManager::getLogger('login');


$logger->info('商家管理：開始');
$admin = new AdminBusinessBusiness();
$smarty->assign("auditstatus",ConstUtil::getAuditStatusShop());
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
	$list = $admin->getAllUserList($currpage,PAGE_NUMBER,$_SESSION['query']);//修改为自己的分页查询函数

	//$pagepar = array("pagecount"=>$adminmodule->getTotalPage(),"recordcount"=>$adminmodule->getTotalRow(),"currpage"=>$currpage,"numberpage"=>$numberpage);
	$smarty->assign("pagecount",$admin->getTotalPage());
	//----------------分页公共部分---------------------------
	$smarty->assign("list",$list);


	//---------公共部分，看看是否需要加入------------------
	$smarty->assign("url_here",$_TITLES['01_business_list']['text']);//url_here不能更改

	$smarty->display("backstage/business_list.htm");
}
else if ($_REQUEST['act'] == 'status')
{
	$type = $_REQUEST['type'];
	$status = $_REQUEST['v']; 
	$id = $_REQUEST['id'];
	$admin->setStatus($id, $type, $status);
	$rsdata = array(array("id"=>$id,"status"=>$status,"type"=>$type));
	echo json_encode($rsdata);
	
}
else if ($_REQUEST['act'] =='audit')
{
	$id = $_REQUEST['id'];
	$data = $admin->getUserInfo($id);
	$smarty->assign("url_here",$_TITLES['03_business_audit']['text']);//url_here不能更改

	$smarty->assign("data",$data);
	$smarty->display("backstage/business_audit.htm");
}
else if ($_REQUEST['act'] == 'audit_rs')
{
	$data = $_POST['data'];

	$id = $_POST['id'];
	$admin->audit($id, $data);
	echo "<script language='javascript'>";
	echo "location='admin_business.php';";
	echo "</script>";
}
else if ($_REQUEST['act'] == 'del')
{
	$id = $_REQUEST['id'];
	$admin->deleteUser($id);
	echo "<script language='javascript'>";
	echo "location='admin_business.php';";
	echo "</script>";
}
else if ($_REQUEST['act'] == 'download')
{
	if(isset($_REQUEST["id"]) && $_REQUEST["id"] > 0)
	{
		$id = $_REQUEST["id"];
		$lic = $admin->getLicence($id);
		FilesOperateBusiness::downloadFile(UPLOAD_FILES_REG_PATH.$lic, $lic);

		//FilesOperateBusiness::downloadFile(UPLOAD_FILES_HELP_PATH.$info["newfilename"],$info["oldfilename"]);

	}
	exit;
}




?>