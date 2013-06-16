<?php

require_once('base.php');
require_once('admin_base.php');
require_once('SessionUtil.php');
require_once('ConstUtil.php');
require_once('Const.php');
require_once('MessageUtil.php');
require_once('AdminModuleBusiness.php');
require_once('SupportException.php');



$logger = LoggerManager::getLogger('login');


$logger->info('登录：開始');
$adminmodule = new AdminModuleBusiness();
$parentlist = $adminmodule->getAllTopModules();

if (empty($_REQUEST['act']) || $_REQUEST['act'] == 'list')//列表
{
	
	$query = $_POST['query'];
	
	if ($_POST['query'] != null)
	{
		$_SESSION['query'] = $_POST['query'];
	}
	
	
	
	//-----------------------------------------------------------------
	$currpage = $_REQUEST['p'];
	if (empty($currpage))
	{
		$currpage = 1;
	}
	$modulelist = $adminmodule->getAllModules($currpage,PAGE_NUMBER,$_SESSION['query']);//修改为自己的分页查询函数
	//$pagepar = array("pagecount"=>$adminmodule->getTotalPage(),"recordcount"=>$adminmodule->getTotalRow(),"currpage"=>$currpage,"numberpage"=>$numberpage);
	$smarty->assign("pagecount",$adminmodule->getTotalPage());
	$smarty->assign("query",$_SESSION['query']);
	//----------------分页公共部分---------------------------
	$smarty->assign("modules",$modulelist);
	$smarty->assign("usertype",ConstUtil::getUserType());
	$smarty->assign("pmodules",$adminmodule->getAllTopModules());
	$smarty->assign("query",$query);
	//---------公共部分，看看是否需要加入------------------
	$smarty->assign("url_here",$_TITLES['01_module_list']['text']);//url_here不能更改
	$smarty->assign("action_link",array($_TITLES['02_module_add']));//action_link 不能更改，或者为action_link1
	
	
	
	
	//---------------------------------------------------
	//$smarty->display("backstage/module_list.htm");
	
	$smarty->display("backstage/module_list.htm");
}
else if ($_REQUEST['act'] == 'add')
{
	$smarty->assign("parentlist",$parentlist);//url_here不能更改
	$smarty->assign("url_here",$_TITLES['02_module_add']['text']);//url_here不能更改
	$smarty->display("backstage/module_add.htm");
}
else if ($_REQUEST['act'] == 'edit')
{
	$mid = $_REQUEST['id'];
	$data = $adminmodule->getAllModulesByID($mid);
	$smarty->assign("data",$data[0]);//url_here不能更改
	$smarty->assign("parentlist",$parentlist);//url_here不能更改
	$smarty->assign("url_here",$_TITLES['03_module_add']['text']);//url_here不能更改
	$smarty->display("backstage/module_add.htm");
	
	
}
else if ($_REQUEST['act'] == 'del')
{
	$mid = $_REQUEST['id'];
	$adminmodule->deleteModules($mid);
	echo "<script language='javascript'>";
	echo "location='admin_module.php';";
	echo "</script>";
}
else if ($_REQUEST['act'] == 'reuse')
{
	$mid = $_REQUEST['id'];
	$adminmodule->reuseModule($mid);
	echo "<script language='javascript'>";
	echo "location='admin_module.php';";
	echo "</script>";
}
else if ($_REQUEST['act'] == 'submit')
{
	$mid = $_REQUEST['mid'];
	$data = $_POST['data'];
	$data['delflag'] = '0';
	if ($data['nodetype'] != 1)
	{
		$data['parentid'] = DEFAULT_PARENTID;
	}
	
	
	if (empty($mid))//新增
	{
		$adminmodule->insertModules($data);
	}
	else //更新
	{
		$adminmodule->updateModules($data, $mid);
	}
	echo "<script language='javascript'>";
	echo "location='admin_module.php';";
	echo "</script>";
}
?>