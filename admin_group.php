<?php

require_once('base.php');
require_once('admin_base.php');
require_once('SessionUtil.php');
require_once('ConstUtil.php');
require_once('MessageUtil.php');
require_once('AdminGroupBusiness.php');
require_once('SupportException.php');



$logger = LoggerManager::getLogger('login');


$logger->info('圈子列表：開始');
$admin = new AdminGroupBusiness();

$grouptype = $admin->getGroupType();


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
	
	$list = $admin->getAllGroupList($currpage,PAGE_NUMBER,$_SESSION['query']);//修改为自己的分页查询函数
	
	$smarty->assign("query",$_SESSION['query']);

	//$pagepar = array("pagecount"=>$adminmodule->getTotalPage(),"recordcount"=>$adminmodule->getTotalRow(),"currpage"=>$currpage,"numberpage"=>$numberpage);
	$smarty->assign("pagecount",$admin->getTotalPage());
	//----------------分页公共部分---------------------------
	$smarty->assign("list",$list);
	
	$smarty->assign("grouptype",$grouptype);//圈子分类，Master合并后，调用赋予
	
	$smarty->assign("shieldstatus",ConstUtil::getShieldStatus());
	$smarty->assign("auditstatus",ConstUtil::getAuditStatus());

	//---------公共部分，看看是否需要加入------------------
	$smarty->assign("url_here",$_TITLES['01_group_list']['text']);//url_here不能更改
	
	//$smarty->assign("action_link",array($_TITLES['02_studentwill_add']));//action_link 不能更改，或者为action_link1
	
	
	$smarty->display("backstage/group_list.htm");
}
else if ($_REQUEST['act'] == 'show' || $_REQUEST['act'] == 'audit' || $_REQUEST['act'] == 'shield')
{
	
	
	$id = $_REQUEST['id'];
	$data = $admin->getGroupInfo($id);
	
	if ($_REQUEST['act'] == 'show')
	{
		$smarty->assign("url_here",$_TITLES['04_group_show']['text']);//url_here不能更改
	}
	else if ($_REQUEST['act'] == 'audit')
	{
		$smarty->assign("url_here",$_TITLES['02_group_audit']['text']);//url_here不能更改
	}
	else if ($_REQUEST['act'] == 'shield')
	{
		
		$smarty->assign("url_here",$_TITLES['03_group_shield']['text']);//url_here不能更改
	}
	
	$smarty->assign("act",$_REQUEST['act']);
	
	$smarty->assign("data",$data[0]);

	$smarty->display("backstage/group_show.htm");
}
else if ($_REQUEST['act'] == 'audit_rs')
{
	$id = $_REQUEST['id'];
	$auditflg = $_REQUEST['status'];

	$data = $admin->auditGroup($id, $auditflg);
	echo "<script language='javascript'>";
	echo "location='admin_group.php';";
	echo "</script>";
	
	
}
else if ($_REQUEST['act'] == 'shield_rs')
{
	$id = $_REQUEST['id'];
	$shieldflg = $_REQUEST['status'];
	$data = $admin->shieldGroup($id, $shieldflg);
	echo "<script language='javascript'>";
	echo "location='admin_group.php';";
	echo "</script>";
}




?>