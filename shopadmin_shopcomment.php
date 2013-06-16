<?php

require_once('base.php');
require_once('admin_base.php');
require_once('SessionUtil.php');
require_once('ConstUtil.php');
require_once('MessageUtil.php');
require_once('AdminShopBusiness.php');
require_once('SupportException.php');



$logger = LoggerManager::getLogger('login');


$logger->info('店铺评论：開始');
$admin = new AdminShopBusiness();

$smarty->assign("evaresult",ConstUtil::getSummeryList());




if (empty($_REQUEST['act']) || $_REQUEST['act'] == 'ini')//列表
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
	$shopid = $_REQUEST['id'];
	$from = $_REQUEST['f'];
	$smarty->assign("from",$from);//I,A,I表示自己，即从店铺来,A表示管理员来，可以屏蔽
	
	$list = $admin->getCommentOfShopByShopID($shopid,$currpage,PAGE_NUMBER,$_SESSION['query']);//修改为自己的分页查询函数
	$data = $admin->getShopInfo($shopid);

	//$pagepar = array("pagecount"=>$adminmodule->getTotalPage(),"recordcount"=>$adminmodule->getTotalRow(),"currpage"=>$currpage,"numberpage"=>$numberpage);
	$smarty->assign("pagecount",$admin->getTotalPage());
	//----------------分页公共部分---------------------------
	$smarty->assign("list",$list);
	$smarty->assign("data",$data);


	//---------公共部分，看看是否需要加入------------------
	$smarty->assign("url_here",$_TITLES['01_shopcomment_list']['text']);//url_here不能更改

	$smarty->display("backstage/shopcomment_list.htm");
}
else if ($_REQUEST['act'] == 'del')
{
	$id = $_REQUEST['id'];
	$sid = $_REQUEST['shopid'];
	$from = $_REQUEST['f'];
	$admin->deleteComment($id);
	echo "<script language='javascript'>";
	echo "location='shopadmin_shopcomment.php?id=$sid&f=$from';";
	echo "</script>";
}
else if ($_REQUEST['act'] == 'visibal')
{
	$id = $_REQUEST['id'];
	$status = $_REQUEST['s'];
	$sid = $_REQUEST['shopid'];
	$from = $_REQUEST['f'];
	if (empty($status) || $status == '0')
	{
		$status = '1';
	}
	else 
	{
		$status = '0';
	}
	$admin->setCommentVisible($id, $status);
	echo "<script language='javascript'>";
	echo "location='shopadmin_shopcomment.php?id=$sid&f=$from';";
	echo "</script>";
}




?>