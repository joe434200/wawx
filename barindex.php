<?php
require_once('base.php');
require_once('LoginBusiness.php');
require_once('SessionUtil.php');
require_once('ConstUtil.php');
require_once('GroupBusiness.php');
require_once('hdBusiness.php');
require_once('DateUtil.php');
require_once('FilesOperateBusiness.php');
require_once('FileUtil.php');
require_once('MininatureUtil.php');

$hd = new hdBusiness();
$module=$_REQUEST['module'];
/**
 * 李楠
 * Enter description here ...
 * @var unknown_type
 */
 
 //-------------------add by zrh---------------------
$_SESSION['barType'] = 1;
//-------------------add by zrh end-------------------
IF(empty($module) || !isset($module))
{	
	
	TplConstTitle::setPageTitle($smarty,'bar_Index'); 
	
	$groupbusi = new GroupBusiness();
	$order_act = " m.attentionnum DESC limit 0,4 ";
	/*
	* 获取圈子首页所有信息
	* */
		$homeGrp = $groupbusi->getHomeMessage("home");
		$act_hot = $hd -> getAct_list_order_log("1,2,3,4",null,$order_act,null);
		
		$insnum = $groupbusi->getInsNum();
		$exnum = $groupbusi->getExcelringNum();
		$supernum = $groupbusi->getSuper();
		
		//echo "<pre>";
		
		//print_r($homeGrp);
		
		/*
		 * start1,start2,start3变量用于换一组的实现
		 */
		$smarty->assign("act_hot",$act_hot);
		$smarty->assign("insnum",$insnum);
		$smarty->assign("exnum",$exnum);
		$smarty->assign("supernum",$supernum);
		$smarty->assign("start1",0);
		$smarty->assign("start2",0);
		$smarty->assign("start3",0);
		$smarty->assign("homeGrp",$homeGrp);
	/**
	 * 李楠
	 * Enter description here ...
	 * @var unknown_type
	 */
		
		$smarty->display('barindex/index.tpl');
}
ELSEIF($module=="changeGroup")  ///换一组的AJAX
{
	/*
	 * 获取类型（感兴趣圈子，圈子达人，优秀圈主）
	 * 获取start
	 */
	$type=$_REQUEST['type'];
	$start = $_REQUEST['start'];
	
	/*
	 * 获取新组信息
	 */
	$homeGrp = $groupbusi->getHomeMessage($type,$start); 
	
	$json = json_encode($homeGrp[$type]);
	
	echo $json;
	
}
ELSEIF($module=="changeAct")
{
	$data = $hd -> getAct_list_order_log("1,2,3,4",null,null,null);
	$count = ceil(count($data)/4);
	while($_GET['pagesAct'] >= ($count))
	$_GET['pagesAct'] = $_GET['pagesAct'] - ($count);
	$pagesAct = $_GET['pagesAct']*4;
	$order = " m.attentionnum DESC limit $pagesAct,4 ";
	$data = $hd -> getAct_list_order_log("1,2,3,4",null,$order,null);
	$response = json_encode($data);
	echo $response;
	
}
?>