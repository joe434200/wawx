<?php

require_once('base.php');
require_once('admin_base.php');
require_once('SessionUtil.php');
require_once('ConstUtil.php');
require_once('MessageUtil.php');
require_once('AdminGroupTopicCatalogBusiness.php');
require_once('SupportException.php');



$logger = LoggerManager::getLogger('login');


$logger->info('圈子话题分类开始：開始');
$admin = new AdminGroupTopicCatalogBusiness();




if (empty($_REQUEST['act']) || $_REQUEST['act'] == 'list')//列表
{
	
	//-----------------------------------------------------------------
	$currpage = $_REQUEST['p'];
	if (empty($currpage))
	{
		$currpage = 1;
	}
	$list = $admin->getAllGrpTopicType($currpage,PAGE_NUMBER);//修改为自己的分页查询函数
	//$pagepar = array("pagecount"=>$adminmodule->getTotalPage(),"recordcount"=>$adminmodule->getTotalRow(),"currpage"=>$currpage,"numberpage"=>$numberpage);
	$smarty->assign("pagecount",$admin->getTotalPage());
	//----------------分页公共部分---------------------------
	$smarty->assign("list",$list);

	//---------公共部分，看看是否需要加入------------------
	$smarty->assign("url_here",$_TITLES['01_grouptopictype_list']['text']);//url_here不能更改
	$smarty->assign("action_link",array($_TITLES['02_grouptopictype_add']));//action_link 不能更改，或者为action_link1
	$smarty->display("backstage/grouptopiccatalog_list.htm");
}
else if ($_REQUEST['act'] == 'add')
{
	
	$data = $admin->getGrpTopicType();
	$smarty->assign('parent',$data);
	$smarty->assign("url_here",$_TITLES['02_grouptopictype_add']['text']);//url_here不能更改
	
	$smarty->display("backstage/grouptopiccatalog_add.htm");
	
}
else if ($_REQUEST['act'] == 'edit')
{
	
	$mid = $_REQUEST['id'];
	$orgin = $admin->getOneGrpTopicTypeByID($mid);
	
	$data = $admin->getGrpTopicType();
	$smarty->assign('parent',$data);
	$smarty->assign("data",$orgin[0]);//url_here不能更改
	
	$smarty->assign("id",$mid);
	
	$smarty->assign("url_here",$_TITLES['03_grouptopictype_edit']['text']);//url_here不能更改
	$smarty->display("backstage/grouptopiccatalog_add.htm");
	
	
}
else if ($_REQUEST['act'] == 'del')
{
	$mid = $_REQUEST['id'];
	$admin->deleteGrpTopicType($mid);
	echo "<script language='javascript'>";
	echo "location='admin_grouptopictype.php';";
	echo "</script>";
}
else if ($_REQUEST['act'] == 'submit')
{
	$id = $_POST['id'];
	$data = $_POST['data'];
	if($_POST['level'] == "1")
	{
		$data['parentid'] = "99999";			
	}
	if(empty($id))
	{
	
		$admin->insertGrpTopicType($data);
	}
	else 
	{
		$admin->updateGrpTopicType($data,$id);
	}
	echo "<script language='javascript'>";
	echo "location='admin_grouptopictype.php';";
	echo "</script>";
}



?>