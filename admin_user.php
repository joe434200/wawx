<?php

require_once('base.php');
require_once('admin_base.php');
require_once('SessionUtil.php');
require_once('ConstUtil.php');
require_once('MessageUtil.php');
require_once('AdminUserBusiness.php');
require_once('SupportException.php');



$logger = LoggerManager::getLogger('login');


$logger->info('用户管理：開始');
$admin = new AdminUserBusiness();

$smarty->assign("YNflg",ConstUtil::getYesNo_NG());
$smarty->assign("standardusrtype",ConstUtil::getStandardUserType());
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
	$list = $admin->getAllUserList($currpage,PAGE_NUMBER,$_SESSION['query']);//修改为自己的分页查询函数
	$smarty->assign("query",$_SESSION['query']);

	//$pagepar = array("pagecount"=>$adminmodule->getTotalPage(),"recordcount"=>$adminmodule->getTotalRow(),"currpage"=>$currpage,"numberpage"=>$numberpage);
	$smarty->assign("pagecount",$admin->getTotalPage());
	//----------------分页公共部分---------------------------
	$smarty->assign("list",$list);
	

	//---------公共部分，看看是否需要加入------------------
	$smarty->assign("url_here",$_TITLES['01_user_list']['text']);//url_here不能更改
	$smarty->assign("action_link",array($_TITLES['05_user_add']));//action_link 不能更改，或者为action_link1
	
	$smarty->display("backstage/user_list.htm");
}
else if ($_REQUEST['act'] == 'edit')
{
	$id = $_REQUEST['id'];
	$data = $admin->getUserInfo($id);
	$smarty->assign("data",$data);
	
	$smarty->display("backstage/user_edit.htm");
	
	//cardnum
//cardvaliddatefrom
//cardvaliddateto
}
else if ($_REQUEST['act'] == 'add')
{

	
	$smarty->display("backstage/user_add.htm");
	
	//cardnum
//cardvaliddatefrom
//cardvaliddateto
}
else if ($_REQUEST['act'] == "chkmail")
{
	$email = $_REQUEST['email'];

	
	$rs = $admin->getUserInfoByMail($email);
	if (count($rs) > 0)
	{
		$text = MessageUtil::getMessage('E0004_ZH');
		ECHO $text;
		//MessageUtil::getMessage('W0010');
	}



}
else if ($_REQUEST['act'] == 'card')
{
	if (empty($_SESSION['CardNo']))
	{
		$_SESSION['CardNo'] = $admin->getCardNum();
	}
	echo $_SESSION['CardNo'];
}
else if ($_REQUEST['act'] == 'submit')
{
	$data = $_POST['data'];
	$id = $_POST['id'];
	if (empty($id))
	{
		$data['usertype'] = '0';
		$data['shieldflg'] = '0';
		$data['adminflg'] = '1';
		$data['status'] = '1';
		
		$admin->addAdminUser($data);
	}
	else 
	{
		$admin->editUser($id, $data);
	}
	echo "<script language='javascript'>";
	echo "location='admin_user.php';";
	echo "</script>";
	
}
else if ($_REQUEST['act'] == 'show' || $_REQUEST['act'] == 'excel' || $_REQUEST['act'] == 'super')
{
	
	
	$id = $_REQUEST['id'];
	$data = $admin->getUserInfo($id);
	
	if ($_REQUEST['act'] == 'show')
	{
		$smarty->assign("url_here",$_TITLES['04_user_show']['text']);//url_here不能更改
	}
	else if ($_REQUEST['act'] == 'excel')
	{
		$smarty->assign("url_here",$_TITLES['02_user_recommend']['text']);//url_here不能更改
	}
	else if ($_REQUEST['act'] == 'super')
	{
		
		$smarty->assign("url_here",$_TITLES['03_user_theme']['text']);//url_here不能更改
	}
	
	$smarty->assign("act",$_REQUEST['act']);
	
	$smarty->assign("data",$data);

	
	$smarty->display("backstage/user_show.htm");
}
else if ($_REQUEST['act'] == 'excel_rs')
{
	$id = $_REQUEST['id'];
	$rflg = $_REQUEST['status'];

	$data = $admin->excelUser($id, $rflg);
	echo "<script language='javascript'>";
	echo "location='admin_user.php';";
	echo "</script>";
	
	
}
else if ($_REQUEST['act'] == 'super_rs')
{
	$id = $_REQUEST['id'];
	$themeflg = $_REQUEST['status'];
	$data = $admin->superUser($id, $themeflg);
	echo "<script language='javascript'>";
	echo "location='admin_user.php';";
	echo "</script>";
}
else if ($_REQUEST['act'] == 'del')
{
	$id = $_REQUEST['id'];
	$admin->deleteUser($id);
	echo "<script language='javascript'>";
	echo "location='admin_user.php';";
	echo "</script>";
}




?>