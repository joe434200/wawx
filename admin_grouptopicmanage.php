<?php

require_once('base.php');
require_once('admin_base.php');
require_once('SessionUtil.php');
require_once('ConstUtil.php');
require_once('MessageUtil.php');
require_once('AdminGroupTopicsManageBusiness.php');
require_once('SupportException.php');



$logger = LoggerManager::getLogger('login');


$logger->info('圈子话题管理：開始');
$admin = new AdminGroupTopicsManageBusiness();

$grouptopictype = $admin->getGroupTopicType();


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
	
	$list = $admin->getAllGroupTopicsList($currpage,PAGE_NUMBER,$_SESSION['query']);//修改为自己的分页查询函数
	
	$smarty->assign("query",$_SESSION['query']);

	//$pagepar = array("pagecount"=>$adminmodule->getTotalPage(),"recordcount"=>$adminmodule->getTotalRow(),"currpage"=>$currpage,"numberpage"=>$numberpage);
	$smarty->assign("pagecount",$admin->getTotalPage());
	//----------------分页公共部分---------------------------
	$smarty->assign("list",$list);
	
	$smarty->assign("grouptopictype",$grouptopictype);//圈子分类，Master合并后，调用赋予
	
	
	$smarty->assign("excelstatus",ConstUtil::getExcelStatus());
	$smarty->assign("shieldstatus",ConstUtil::getShieldStatus());
	$smarty->assign("topstatus",ConstUtil::getTopStatus());

	//---------公共部分，看看是否需要加入------------------
	$smarty->assign("url_here",$_TITLES['01_grouptopics_list']['text']);//url_here不能更改
	
	//$smarty->assign("action_link",array($_TITLES['02_studentwill_add']));//action_link 不能更改，或者为action_link1
	

	$smarty->display("backstage/grouptopics_list.htm");
}
else if ($_REQUEST['act'] == 'show' || $_REQUEST['act'] == 'shield' )
{
	
	
	$id = $_REQUEST['id'];
	$data = $admin->getGroupTopicInfo($id);
	
	if ($_REQUEST['act'] == 'show')
	{
		$smarty->assign("url_here",$_TITLES['04_group_show']['text']);//url_here不能更改
	}
	
	else if ($_REQUEST['act'] == 'shield')
	{
		
		$smarty->assign("url_here",$_TITLES['02_grouptopics_shield']['text']);//url_here不能更改
	}
	
	$smarty->assign("act",$_REQUEST['act']);
	
	$smarty->assign("data",$data[0]);

	$smarty->display("backstage/grouptopics_show.htm");
}

else if ($_REQUEST['act'] == 'shield_rs')
{
	$id = $_REQUEST['id'];
	$shieldflg = $_REQUEST['status'];
	$data = $admin->shieldGrpTopic($id, $shieldflg);
	echo "<script language='javascript'>";
	echo "location='admin_grouptopicmanage.php';";
	echo "</script>";
}



?>