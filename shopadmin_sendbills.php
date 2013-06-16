<?php

require_once('base.php');
require_once('admin_base.php');
require_once('SessionUtil.php');
require_once('ConstUtil.php');
require_once('MessageUtil.php');
require_once('AdminStudentWillBusiness.php');
require_once('SupportException.php');



$logger = LoggerManager::getLogger('login');


$logger->info('学生惠分类：開始');
$admin = new AdminStudentWillBusiness();

$lev1list = $admin->getLevel1List();


if (empty($_REQUEST['act']) || $_REQUEST['act'] == 'list')//列表
{
	
	//-----------------------------------------------------------------
	$currpage = $_REQUEST['p'];
	if (empty($currpage))
	{
		$currpage = 1;
	}
	
	$list = $admin->getAllStudentWill($currpage,PAGE_NUMBER);//修改为自己的分页查询函数

	//$pagepar = array("pagecount"=>$adminmodule->getTotalPage(),"recordcount"=>$adminmodule->getTotalRow(),"currpage"=>$currpage,"numberpage"=>$numberpage);
	$smarty->assign("pagecount",$admin->getTotalPage());
	//----------------分页公共部分---------------------------
	$smarty->assign("list",$list);
	$smarty->assign("willtype",ConstUtil::getStudentWillType());

	//---------公共部分，看看是否需要加入------------------
	$smarty->assign("url_here",$_TITLES['01_studentwill_list']['text']);//url_here不能更改
	
	$smarty->assign("action_link",array($_TITLES['02_studentwill_add']));//action_link 不能更改，或者为action_link1
	
	
	$smarty->display("backstage/studentwill_list.htm");
}
else if ($_REQUEST['act'] == 'add')
{
	
	$smarty->assign("url_here",$_TITLES['02_studentwill_add']['text']);//url_here不能更改
	$smarty->assign("lev1list",$lev1list);
	$smarty->display("backstage/studentwill_add.htm");
}
else if ($_REQUEST['act'] == 'edit')
{
	$mid = $_REQUEST['id'];
	$data = $admin->getOneStudentWillByID($mid);
	$smarty->assign("data",$data[0]);//url_here不能更改
	$smarty->assign("lev1list",$lev1list);
	
	$smarty->assign("url_here",$_TITLES['03_studentwill_edit']['text']);//url_here不能更改
	$smarty->display("backstage/studentwill_add.htm");
	
	
}
else if ($_REQUEST['act'] == 'del')
{
	$mid = $_REQUEST['id'];
	$admin->deleteStudentWill($mid);
	echo "<script language='javascript'>";
	echo "location='admin_studentwill.php';";
	echo "</script>";
}
else if ($_REQUEST['act'] == 'submit')
{
	$id = $_REQUEST['id'];
	$data = $_POST['data'];
	$level = $_POST['level'];
	
	if ($level == '1')
	{
		$data['parentid'] = '99999';
	}
	
	
	

	if (empty($id))//新增
	{
		$admin->insertStudentWill($data);
	}
	else //更新
	{
		$admin->updateStudentWill($data, $id);
	}
	echo "<script language='javascript'>";
	echo "location='admin_studentwill.php';";
	echo "</script>";
}



?>