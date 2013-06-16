<?php

require_once('base.php');
require_once('admin_base.php');
require_once('SessionUtil.php');
require_once('ConstUtil.php');
require_once('MessageUtil.php');
require_once('AdminForumTopicCatalogBusiness.php');
require_once('SupportException.php');



$logger = LoggerManager::getLogger('login');


$logger->info('论坛话题分类开始：開始');
$admin = new AdminForumTopicCatalogBusiness();




if (empty($_REQUEST['act']) || $_REQUEST['act'] == 'list')//列表
{
	
	//-----------------------------------------------------------------
	$currpage = $_REQUEST['p'];
	if (empty($currpage))
	{
		$currpage = 1;
	}
	$list = $admin->getAllForumTopicCatalog($currpage,PAGE_NUMBER);//修改为自己的分页查询函数
	//$pagepar = array("pagecount"=>$adminmodule->getTotalPage(),"recordcount"=>$adminmodule->getTotalRow(),"currpage"=>$currpage,"numberpage"=>$numberpage);
	$smarty->assign("pagecount",$admin->getTotalPage());
	//----------------分页公共部分---------------------------
	$smarty->assign("list",$list);

	//---------公共部分，看看是否需要加入------------------
	$smarty->assign("url_here",$_TITLES['01_forumtopictype_list']['text']);//url_here不能更改
	$smarty->assign("action_link",array($_TITLES['02_forumtopictype_add']));//action_link 不能更改，或者为action_link1
	
	
	$smarty->display("backstage/forumtopiccatalog_list.htm");
}






else if ($_REQUEST['act'] == 'add')
{
	
	$data = $admin->getForumTopicCatalog();
	$smarty->assign('parent',$data);
	$smarty->assign("url_here",$_TITLES['02_forumtopic_add']['text']);//url_here不能更改
	
	$smarty->display("backstage/forumtopiccatalog_add.htm");
	
}
else if ($_REQUEST['act'] == 'edit')
{
	
	$mid = $_REQUEST['id'];
	$orgin = $admin->getOneForumTopicCatalogByID($mid);
	
	$data = $admin->getForumTopicCatalog();
	$smarty->assign('parent',$data);
	$smarty->assign("data",$orgin[0]);//url_here不能更改
	$smarty->assign('id',$mid);
	
	$smarty->assign("url_here",$_TITLES['03_forumtopiccatalog_edit']['text']);//url_here不能更改
	$smarty->display("backstage/forumtopiccatalog_add.htm");
	
	
}
else if ($_REQUEST['act'] == 'del')
{
	$mid = $_REQUEST['id'];
	$admin->deleteForumTopicCatalog($mid);
	echo "<script language='javascript'>";
	echo "location='admin_forumtopictype.php';";
	echo "</script>";
}
else if ($_REQUEST['act'] == 'submit')
{
	$id = $_POST['id'];
	$data = $_POST['data'];

	if(empty($id))
	{
	
		$admin->insertForumTopicCatalog($data);
	}
	else 
	{
		$admin->updateForumTopicCatalog($data,$id);
	}
	
	//echo "<pre>";
	//print_r($data);
	//exit;
	
	
	echo "<script language='javascript'>";
	echo "location='admin_forumtopictype.php';";
	echo "</script>";
}



?>