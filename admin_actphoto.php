<?php

require_once('base.php');
require_once('admin_base.php');
require_once('SessionUtil.php');
require_once('ConstUtil.php');
require_once('MessageUtil.php');
require_once('AdminActPhotoBusiness.php');
require_once('SupportException.php');



$logger = LoggerManager::getLogger('login');


$logger->info('活动图片管理：開始');
$admin = new AdminActPhotoBusiness();

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
	$list = $admin->getAllActPhotoList($currpage,PAGE_NUMBER,$_SESSION['query']);//修改为自己的分页查询函数
	$smarty->assign("query",$_SESSION['query']);

	//$pagepar = array("pagecount"=>$adminmodule->getTotalPage(),"recordcount"=>$adminmodule->getTotalRow(),"currpage"=>$currpage,"numberpage"=>$numberpage);
	$smarty->assign("pagecount",$admin->getTotalPage());
	//----------------分页公共部分---------------------------
	$smarty->assign("list",$list);

	//---------公共部分，看看是否需要加入------------------
	$smarty->assign("url_here",$_TITLES['01_actphoto_list']['text']);//url_here不能更改
	
	$smarty->display("backstage/actphoto_list.htm");
}
else if ($_REQUEST['act'] == 'shield')
{
	$currpage = $_REQUEST['p'];
	if (empty($currpage))
	{
		$currpage = 1;
	}
	$id = $_REQUEST['id'];
	$list = $admin->getActPhotoListByActID($id,$currpage,PAGE_NUMBER);//修改为自己的分页查询函数
	
	$smarty->assign("url_here",$_TITLES['02_actphoto_shield']['text']);//url_here不能更改
	$smarty->assign("list",$list);
	$smarty->display("backstage/actphoto_show.htm");
}
else if ($_REQUEST['act'] == 'ajaxset')
{
	$id = $_REQUEST['id'];
	$shieldflg = $admin->getShieldFlg($id);
	if ($shieldflg['shieldflg'] == '1' || $shieldflg['shieldflg'] == 1)
	{
		$rsf = 0;
	}
	else 
	{
		$rsf = 1;
	}
	$admin->shieldActPhoto($id, $rsf);
	
	
	echo $id."|".$rsf;
	
}



?>