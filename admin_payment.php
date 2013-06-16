<?php

require_once('base.php');
require_once('admin_base.php');
require_once('SessionUtil.php');
require_once('ConstUtil.php');
require_once('MessageUtil.php');
require_once('AdminPaymentBusiness.php');
require_once('SupportException.php');



$logger = LoggerManager::getLogger('login');


$logger->info('支付方式：開始');
$adminpay = new AdminPaymentBusiness();




if (empty($_REQUEST['act']) || $_REQUEST['act'] == 'list')//列表
{
	
	//-----------------------------------------------------------------
	$currpage = $_REQUEST['p'];
	if (empty($currpage))
	{
		$currpage = 1;
	}
	$paylist = $adminpay->getAllPayments($currpage,PAGE_NUMBER);//修改为自己的分页查询函数
	//$pagepar = array("pagecount"=>$adminmodule->getTotalPage(),"recordcount"=>$adminmodule->getTotalRow(),"currpage"=>$currpage,"numberpage"=>$numberpage);
	$smarty->assign("pagecount",$adminpay->getTotalPage());
	//----------------分页公共部分---------------------------
	$smarty->assign("payments",$paylist);

	//---------公共部分，看看是否需要加入------------------
	$smarty->assign("url_here",$_TITLES['01_payment_list']['text']);//url_here不能更改
	$smarty->assign("action_link",array($_TITLES['02_payment_add']));//action_link 不能更改，或者为action_link1
	
	
	$smarty->display("backstage/payment_list.htm");
}







else if ($_REQUEST['act'] == 'add')
{
	
	$smarty->assign("url_here",$_TITLES['02_payment_add']['text']);//url_here不能更改
	$smarty->display("backstage/payment_add.htm");
}
else if ($_REQUEST['act'] == 'edit')
{
	$mid = $_REQUEST['id'];
	$data = $adminpay->getOnePaymentByID($mid);
	$smarty->assign("data",$data[0]);//url_here不能更改
	
	$smarty->assign("url_here",$_TITLES['03_payment_edit']['text']);//url_here不能更改
	$smarty->display("backstage/payment_add.htm");
	
	
}
else if ($_REQUEST['act'] == 'del')
{
	$mid = $_REQUEST['id'];
	$adminpay->deleteModules($mid);
	echo "<script language='javascript'>";
	echo "location='admin_payment.php';";
	echo "</script>";
}
else if ($_REQUEST['act'] == 'submit')
{
	$id = $_REQUEST['id'];
	$data = $_POST['data'];
	
	
	

	if (empty($id))//新增
	{
		$adminpay->insertModules($data);
	}
	else //更新
	{
		$adminpay->updateModules($data, $id);
	}
	echo "<script language='javascript'>";
	echo "location='admin_payment.php';";
	echo "</script>";
}



?>