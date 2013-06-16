<?php

require_once('base.php');
require_once('admin_base.php');
require_once('SessionUtil.php');
require_once('ConstUtil.php');
require_once('MessageUtil.php');
require_once('AdminLinkUrlBusiness.php');
require_once('SupportException.php');



$logger = LoggerManager::getLogger('login');


$logger->info('友情链接：開始');
$admin = new AdminLinkUrlBusiness();




if (empty($_REQUEST['act']) || $_REQUEST['act'] == 'list')//列表
{
	
	//-----------------------------------------------------------------
	$currpage = $_REQUEST['p'];
	if (empty($currpage))
	{
		$currpage = 1;
	}
	$list = $admin->getAllLinkUrl($currpage,PAGE_NUMBER);//修改为自己的分页查询函数
	//$pagepar = array("pagecount"=>$adminmodule->getTotalPage(),"recordcount"=>$adminmodule->getTotalRow(),"currpage"=>$currpage,"numberpage"=>$numberpage);
	$smarty->assign("pagecount",$admin->getTotalPage());
	//----------------分页公共部分---------------------------
	$smarty->assign("list",$list);

	//---------公共部分，看看是否需要加入------------------
	$smarty->assign("url_here",$_TITLES['01_linkurl_list']['text']);//url_here不能更改
	
	$smarty->assign("action_link",array($_TITLES['02_linkurl_add']));//action_link 不能更改，或者为action_link1
	
	
	$smarty->display("backstage/linkurl_list.htm");
}
else if ($_REQUEST['act'] == 'add')
{
	
	$smarty->assign("url_here",$_TITLES['02_linkurl_add']['text']);//url_here不能更改
	$smarty->assign("lev1list",$lev1list);
	$smarty->display("backstage/linkurl_add.htm");
}
else if ($_REQUEST['act'] == 'edit')
{
	$mid = $_REQUEST['id'];
	$data = $admin->getOneLinkUrlByID($mid);
	$smarty->assign("data",$data[0]);//url_here不能更改
	$smarty->assign("lev1list",$lev1list);
	
	$smarty->assign("url_here",$_TITLES['03_linkurl_edit']['text']);//url_here不能更改
	$smarty->display("backstage/linkurl_add.htm");
	
	
}
else if ($_REQUEST['act'] == 'del')
{
	$mid = $_REQUEST['id'];
	$admin->deleteLinkUrl($mid);
	echo "<script language='javascript'>";
	echo "location='admin_linkurl.php';";
	echo "</script>";
}
else if ($_REQUEST['act'] == 'submit')
{
	$id = $_REQUEST['id'];
	$data = $_POST['data'];
	
	
	
	

	if (empty($id))//新增
	{
		$admin->insertLinkUrl($data);
	}
	else //更新
	{
		$admin->updateLinkUrl($data, $id);
	}
	echo "<script language='javascript'>";
	echo "location='admin_linkurl.php';";
	echo "</script>";
}



?>