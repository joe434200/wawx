<?php

require_once('base.php');
require_once('GroupBusiness.php');
require_once('SessionUtil.php');
require_once('ConstUtil.php');

$ID=$_REQUEST['ID'];  
$mem_ID = $_SESSION['baseinfo']['ID'];
$groupbusi = new GroupBusiness();

$rs = $groupbusi->getGroupMessage($ID,"topic","member","photo"); //get圈子话题成员图片基本信息

$pageTitle = "圈子：".$rs['main']['groupname'];
$checkIn = $groupbusi->checkIN($ID,$mem_ID);

//echo $_SESSION['groupPower'];
/*echo "<pre>";
print_r($checkIn);
exit;*/
$otherGrp = $groupbusi->getOtherGroup();
	
$smarty->assign("otherGrp",$otherGrp);

$smarty->assign("pageTitle",$pageTitle);
$smarty->assign("checkIn",$checkIn);
$smarty->assign("rs",$rs);

$smarty->display("group/grp_single_home.tpl");

?>