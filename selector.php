<?php
require_once('base.php');
require_once('BaseBusiness.php');
require_once('FileFilterUtil.php');
require_once('SelectorBusiness.php');


$type = $_REQUEST['type'];

$dbinfo = getFieldList($type);

if (empty($dbinfo))
{
	exit;
}


$sel = new SelectorBusiness();

$currpage = $_REQUEST['p'];
if (empty($currpage))
{
	$currpage = 1;
}
if ($_POST['query'] != null)
{
	$_SESSION['query'] = $_POST['query'];
}


$data = $sel->getDataList($dbinfo,$currpage,PAGE_NUMBER);




$smarty->assign("data",$data);
$smarty->assign("showid",$showid);
$smarty->assign("hiddenid",$hiddenid);
$smarty->assign("fields",$dbinfo['fields']);
$smarty->assign("showfield",$dbinfo['backshowfield']);
$smarty->assign("hiddenfield",$dbinfo['backhiddenfield']);




$smarty->display("selector/index.tpl");












function getFieldList($type)
{
	$fieldlist = array();
	switch ($type)
	{
		case '0':
			$fieldlist['tblname'] = 't_user';
			$fieldlist['backshowfield'] = 'nickname';
			$fieldlist['backhiddenfield'] = 'ID';
			$fieldlist['fields'] = 
			array(
			 array("key"=>"ID","showname"=>"ID")
			,array("key"=>"nickname","showname"=>"昵称") 
			,array("key"=>"realname","showname"=>"真实姓名") 
			);
			$fieldlist['where'] = "  usertype='0'  AND status='1'  ";
			break;
		case '1':
			$fieldlist['tblname'] = 't_shopinfo';
			$fieldlist['backshowfield'] = 'shopname';
			$fieldlist['backhiddenfield'] = 'ID';
			$fieldlist['fields'] = 
			array(
			array("key"=>"ID","showname"=>"ID")
			,array("key"=>"shopname","showname"=>"店铺名称")
			,array("key"=>"telephone","showname"=>"电话") 
			,array("key"=>"address","showname"=>"地址") 
			,array("key"=>"busline","showname"=>"公交线") 
			);
			$fieldlist['where'] = " verifystate='2'  AND isclose='0' ";
			break;
		case '2':
			$fieldlist['tblname'] = 't_goods';
			$fieldlist['backshowfield'] = 'goodsname';
			$fieldlist['backhiddenfield'] = 'ID';
			$fieldlist['fields'] = 
			array(
			array("key"=>"ID","showname"=>"ID") 
			,array("key"=>"goodsname","showname"=>"商品名称")
			,array("key"=>"goodsbrief","showname"=>"商品简介") 
			);
			$fieldlist['where'] = " isdelete='0'  AND isout='0' ";
			break;
			
	}
	return $fieldlist;
}





?>