<?php

require_once('base.php');
require_once('admin_base.php');
require_once('SessionUtil.php');
require_once('ConstUtil.php');
require_once('MessageUtil.php');
require_once('AdminPhotoCommentBusiness.php');
require_once('SupportException.php');



$logger = LoggerManager::getLogger('login');


$logger->info('图片评论管理：開始');
$admin = new AdminPhotoCommentBusiness();

$smarty->assign("photoremarktype",ConstUtil::getPhotoRemarkType());
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
	$list = $admin->getAllPhotoComment($currpage,PAGE_NUMBER,$_SESSION['query']);//修改为自己的分页查询函数
	$smarty->assign("query",$_SESSION['query']);
	$smarty->assign("shieldstatus",ConstUtil::getShieldStatus());

	//$pagepar = array("pagecount"=>$adminmodule->getTotalPage(),"recordcount"=>$adminmodule->getTotalRow(),"currpage"=>$currpage,"numberpage"=>$numberpage);
	$smarty->assign("pagecount",$admin->getTotalPage());
	//----------------分页公共部分---------------------------
	$smarty->assign("list",$list);

	//---------公共部分，看看是否需要加入------------------
	$smarty->assign("url_here",$_TITLES['01_photocomment_list']['text']);//url_here不能更改
	
	$smarty->display("backstage/photocomment_list.htm");
}
else if ($_REQUEST['act'] == 'show' || $_REQUEST['act'] == 'shield')
{
	
	
	$id = $_REQUEST['id'];
	$data = $admin->getPhotoCommentInfo($id);
	
	if ($_REQUEST['act'] == 'show')
	{
		$smarty->assign("url_here",$_TITLES['03_photocomment_show']['text']);//url_here不能更改
	}
	
	else if ($_REQUEST['act'] == 'shield')
	{
		
		$smarty->assign("url_here",$_TITLES['02_photocomment_shield']['text']);//url_here不能更改
	}
	
	$smarty->assign("act",$_REQUEST['act']);
	
	$smarty->assign("data",$data[0]);

	
	$smarty->display("backstage/photocomment_show.htm");
}

else if ($_REQUEST['act'] == 'shield_rs')
{
	$id = $_REQUEST['id'];
	$themeflg = $_REQUEST['status'];
	$data = $admin->shield($id, $themeflg);
	echo "<script language='javascript'>";
	echo "location='admin_photocomment.php';";
	echo "</script>";
}



?>