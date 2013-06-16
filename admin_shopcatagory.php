<?php

require_once('base.php');
require_once('admin_base.php');
require_once('SessionUtil.php');
require_once('ConstUtil.php');
require_once('MessageUtil.php');
require_once('AdminShopCatagoryBusiness.php');
require_once('SupportException.php');



$logger = LoggerManager::getLogger('login');


$logger->info('活动分类：開始');
$admin = new AdminShopCatagoryBusiness();

if ($_REQUEST['act'] == 'add' || $_REQUEST['act'] == 'edit')
{
	$lev1list = $admin->getLevel1List();
	$smarty->assign("lev1list",$lev1list);
}




if (empty($_REQUEST['act']) || $_REQUEST['act'] == 'list')//列表
{
	
	//-----------------------------------------------------------------
	$currpage = $_REQUEST['p'];
	if (empty($currpage))
	{
		$currpage = 1;
	}
	$list = $admin->getAllShopCatagory($currpage,PAGE_NUMBER);//修改为自己的分页查询函数
	//$pagepar = array("pagecount"=>$adminmodule->getTotalPage(),"recordcount"=>$adminmodule->getTotalRow(),"currpage"=>$currpage,"numberpage"=>$numberpage);
	$smarty->assign("pagecount",$admin->getTotalPage());
	//----------------分页公共部分---------------------------
	$smarty->assign("list",$list);

	//---------公共部分，看看是否需要加入------------------
	$smarty->assign("url_here",$_TITLES['01_shopcatagory_list']['text']);//url_here不能更改
	
	$smarty->assign("action_link",array($_TITLES['02_shopcatagory_add']));//action_link 不能更改，或者为action_link1
	
	
	$smarty->display("backstage/shopcatagory_list.htm");
}
else if ($_REQUEST['act'] == 'add')
{
	
	$smarty->assign("url_here",$_TITLES['02_shopcatagory_add']['text']);//url_here不能更改
	$smarty->assign("lev1list",$lev1list);
	$smarty->display("backstage/shopcatagory_add.htm");
}
else if ($_REQUEST['act'] == 'edit')
{
	$mid = $_REQUEST['id'];
	$data = $admin->getOneShopCatagorytByID($mid);
	$smarty->assign("data",$data[0]);//url_here不能更改
	$smarty->assign("lev1list",$lev1list);
	
	$smarty->assign("url_here",$_TITLES['03_shopcatagory_edit']['text']);//url_here不能更改
	$smarty->display("backstage/shopcatagory_add.htm");
	
	
}
else if ($_REQUEST['act'] == 'del')
{
	$mid = $_REQUEST['id'];
	$admin->deleteShopCatagory($mid);
	echo "<script language='javascript'>";
	echo "location='admin_shopcatagory.php';";
	echo "</script>";
}
else if ($_REQUEST['act'] == 'submit')
{
	$id = $_REQUEST['id'];
	$data = $_POST['data'];
	
	
	
	

	if (empty($id))//新增
	{
		$admin->insertShopCatagory($data);
	}
	else //更新
	{
		$admin->updateShopCatagory($data, $id);
	}
	echo "<script language='javascript'>";
	echo "location='admin_shopcatagory.php';";
	echo "</script>";
}
else if ($_REQUEST['act'] == 'ajaxset')
{
	
	$objid = $_REQUEST['objid'];
	$data = explode("_", $objid);
	$isshow = '1';
	if ($data[0] == 'yimg')
	{
		$isshow = '0';
	}
	$rs = $admin->updateVisible($data[1],$isshow);
	if ($rs)
	{
		echo $objid;
	}
	else 
	{
		echo "F";
	}
	
}



?>