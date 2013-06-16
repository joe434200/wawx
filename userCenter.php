<?php
require_once('base.php');
require_once('LoginBusiness.php');
require_once('SessionUtil.php');
require_once('ConstUtil.php');
require_once('SelfBusiness.php');
require_once('UserBusiness.php');


$module =$_REQUEST['module'];//获取进入模块
$_SESSION['temp']['module'] = $module;//把module的值写到session
$currtime = date("Y-m-d H:i:s");//当前时间
$userid = $_SESSION['baseinfo']['ID'];//进入设置的仅为当前登录用户
$selfbusi = new SelfBuiness();
$userbusi = new UserBusiness();


//查询个人基本资料
$self = $selfbusi->getSpace($userid);
$smarty->assign('self',$self);


$hinfo = $userbusi->getUserBox('2', $userid, '1','2');
$smarty->assign('hinfo',$hinfo);

	
if($module == "index" || empty($module))//主页（我的概况）
{
	$info = $selfbusi->getUserInfo($userid);
	
	
	$smarty->assign('info',$info);
    $smarty->display('user/my_index.tpl');
}
else if($module == "dataModify")//修改资料
{
	$smarty->display('user/my_data_modify.tpl');
}
else if($module == "dataFriend")//交友资料
{
	$smarty->display('user/my_data_friend.tpl');
}
else if($module == "dataHobby")//兴趣爱好
{
	$smarty->display('user/my_data_hobby.tpl');
}
else if($module == "avatar")//修改头像
{
	$smarty->display('user/my_avatar_set.tpl');
}
else if($module == "privacy")//隐私设置
{
	$smarty->display('user/my_privacy.tpl');
}
else if($module == "password")//密码设置
{
	$smarty->display('user/my_password.tpl');
}
else if($module == "order")//我的订单
{
	$info = $userbusi->getUserOrderInfo($userid, '1');
	$smarty->assign('info',$info);
	$smarty->display('user/my_order.tpl');
}
else if($module == "address")//地址管理
{
	$address = $userbusi->getRecieveAdress($userid);
	$data = $userbusi->getLevelAddr('1', '1');
	$smarty->assign('data',$data);
	$smarty->assign('addr',$address);
	$smarty->display('user/my_address.tpl');
}
else if($module == "collect")//我的收藏(商品收藏)
{
	$data = $userbusi->getGoodsCollect($userid, '2','1');
	$smarty->assign('data',$data);
	$smarty->display('user/my_collect.tpl');
}
else if($module == "collectTZ")//帖子收藏
{
	$data = $userbusi->getTZCollect($userid,'1');
	$smarty->assign('data',$data);
	$smarty->display('user/my_collect_tz.tpl');
}
else if($module == "collectRZ")//日志收藏
{
	$data = $userbusi->getRZCollect($userid,'1');
	$smarty->assign('data',$data);
	$smarty->display('user/my_collect_rz.tpl');
}
else if($module == "outbox")//发信箱
{
	$info = $userbusi->getUserBox('1', $userid, '1','2');
	$smarty->assign('info',$info);
	$smarty->display('user/my_outbox.tpl');
}
else if($module == "inbox")//收信箱
{
	$info = $userbusi->getUserBox('2', $userid, '1','2');
	$smarty->assign('info',$info);
	$smarty->display('user/my_inbox.tpl');
}
else if($module == "dustbin")//垃圾箱
{
	$info = $userbusi->getUserBox('3', $userid, '1','2');
	$smarty->assign('info',$info);
	$smarty->display('user/my_dustbin.tpl');
}
else if($module == "")
{}
else if($module == "")
{}
else if($module == "")
{}
else if($module == "")
{}
else if($module == "")
{}


//echo "<pre>";
//print_r($self);
//exit;
?>