<?php

require_once('base.php');
require_once('admin_base.php');
require_once('SessionUtil.php');
require_once('ConstUtil.php');
require_once('MessageUtil.php');
require_once('AdminShopBusiness.php');
require_once('SupportException.php');
require_once('FilesOperateBusiness.php');
require_once('AdminCityBusiness.php');
require_once('AdminShopCatagoryBusiness.php');




$logger = LoggerManager::getLogger('login');


$logger->info('我的店铺管理：開始');
$admin = new AdminShopBusiness();
$smarty->assign("auditstatus",ConstUtil::getAuditStatusShopAll());
$smarty->assign("YNStatus",ConstUtil::getYesNo_NG());
$filesopr = new FilesOperateBusiness();
$shopcatabsi = new AdminShopCatagoryBusiness();

$shopcata = $shopcatabsi->getLevel1List();
$shopcata2 = $shopcatabsi->getLevel2List();
$smarty->assign("shopcata",$shopcata);



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
	$list = $admin->getMyShopList($_SESSION['admininfo']['ID'],$currpage,PAGE_NUMBER,$_SESSION['query']);//修改为自己的分页查询函数

	//$pagepar = array("pagecount"=>$adminmodule->getTotalPage(),"recordcount"=>$adminmodule->getTotalRow(),"currpage"=>$currpage,"numberpage"=>$numberpage);
	$smarty->assign("pagecount",$admin->getTotalPage());
	//----------------分页公共部分---------------------------
	$smarty->assign("list",$list);


	//---------公共部分，看看是否需要加入------------------
	$smarty->assign("action_link",array($_TITLES['02_myshop_add']));//action_link 不能更改，或者为action_link1
	$smarty->assign("url_here",$_TITLES['01_myshop_list']['text']);//url_here不能更改

	
	$smarty->display("backstage/myshop_list.htm");
}
else if ($_REQUEST['act'] == 'show')
{
	$id = $_REQUEST['id'];
	$data = $admin->getShopInfo($id);
	$smarty->assign("url_here",$_TITLES['06_shop_show']['text']);//url_here不能更改
	$smarty->assign("data",$data);
	$smarty->display("backstage/myshop_show.htm");
}
else if ($_REQUEST['act'] == 'add' || $_REQUEST['act'] == 'edit')
{
	$citybsi = new AdminCityBusiness();
	
	$countrylist = $citybsi->getAllChilds('0','99999');
	$provincelist = $citybsi->getAllChilds('1',null);
	$citylist = $citybsi->getAllChilds('2',null);
	$skirtlist = $citybsi->getAllChilds('3',null);
	
	$smarty->assign("countrylist",$countrylist);
	
	$id = $_REQUEST['id'];
	if (!empty($id))
	{
		$data = $admin->getShopInfo($id);
		$smarty->assign("data",$data);
		$smarty->assign("shopcata2",$shopcata2);
		$smarty->assign("provincelist",$provincelist);
		$smarty->assign("citylist",$citylist);
		$smarty->assign("skirtlist",$skirtlist);
		$smarty->assign("url_here",$_TITLES['03_myshop_edit']['text']);//url_here不能更改
	}
	else 
	{
		$smarty->assign("url_here",$_TITLES['02_myshop_add']['text']);//url_here不能更改
	}
	$smarty->display("backstage/myshop_add.htm");
}
else if ($_REQUEST['act'] == 'ajaxlist')
{
	$pid = $_REQUEST['pid'];
	$shopcatalist = $shopcatabsi->getLevel2List($pid);
	echo json_encode($shopcatalist);
}

else if ($_REQUEST['act'] == 'submit')
{
	$data = $_POST['data'];
	//$upfilelist = $filesopr->uploadFiles($_FILES, UPLOAD_FILES_SHOP_PATH);
	
	
	
	$uprs = $filesopr->uploadFilesSingle($_FILES['shoplicence'], UPLOAD_FILES_SHOP_PATH);
	if (!empty($uprs))
	{
		$data['busilicence'] = $uprs;
	}
	$uprs = $filesopr->uploadFilesSingle($_FILES['shopphoto'], UPLOAD_FILES_SHOP_PATH);
	if (!empty($uprs))
	{
		$data['shoppicture'] = $uprs;
	}
	$uprs = $filesopr->uploadFilesSingle($_FILES['shopmap'], UPLOAD_FILES_SHOP_PATH);
	if (!empty($uprs))
	{
		$data['mapurl'] = $uprs;
	}
	
	$id = $_POST['id'];
	if (empty($id))
	{
		$data['verifystate'] = '0';
		$data['commentnum'] = '0';
		$data['focusnum'] = '0';
		$data['isclose'] = '0';
		$data['idt_user'] = $_SESSION['admininfo']['ID'];
		
		$admin->addShop($data);
	}
	else 
	{
		$admin->editShop($id, $data);
	}
	
	
	echo "<script language='javascript'>";
	echo "location='shopadmin_shop.php';";
	echo "</script>";
}
else if ($_REQUEST['act'] == 'del')
{
	$id = $_REQUEST['id'];
	$status = $_REQUEST['status'];
	if ($status == '1')
	{
		$status = '0';
	}
	else 
	{
		$status = '1';
	}
	$admin->deleteShop($id, $status);
	echo "<script language='javascript'>";
	echo "location='shopadmin_shop.php';";
	echo "</script>";
}
else if ($_REQUEST['act'] == 'close')
{
	$id = $_REQUEST['id'];
	$data = $admin->getShopInfo($id);
	$smarty->assign("url_here",$_TITLES['06_shop_close']['text']);//url_here不能更改
	$smarty->assign("data",$data);
	$smarty->display("backstage/myshop_close.htm");
}
else if ($_REQUEST['act'] == 'close_rs')
{
	$id = $_REQUEST['id'];
	$data = $_POST['data'];
	
	$admin->closeShop($id,$data);
	echo "<script language='javascript'>";
	echo "location='shopadmin_shop.php';";
	echo "</script>";
}
else if ($_REQUEST['act'] == 'download')
{
	if(isset($_REQUEST["id"]) && $_REQUEST["id"] > 0)
	{
		$id = $_REQUEST["id"];
		$lic = $admin->getLicence($id);
		$fils = new FilesOperateBusiness();
		$fils->downloadFile(UPLOAD_FILES_SHOP_PATH.$lic, $lic);

		//FilesOperateBusiness::downloadFile(UPLOAD_FILES_HELP_PATH.$info["newfilename"],$info["oldfilename"]);

	}
	exit;
}





?>