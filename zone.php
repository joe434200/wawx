<?php
require_once('base.php');
require_once('LoginBusiness.php');
require_once('SessionUtil.php');
require_once('ConstUtil.php');
require_once('SelfBusiness.php');
require_once('WbBusiness.php');


$wbbusi = new WbBusiness();

$wbid = $_REQUEST['uid'];
$userid = $_SESSION['baseinfo']['ID'];
if($wbid == $userid)
{
	$wbbusi->toLocation("self_zone.php");
}
else 
{
	$wbbusi->toLocation("wb_index.php?uid=$wbid");
}
?>