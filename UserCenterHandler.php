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




if($module == "dataModify")//修改用户基本信息
{
	$data = $_POST['self'];
	//城市没有处理
	$selfbusi->self_update('t_user', $data, "u.id='$userid'");
	$selfbusi->toLocation("UserCenter.php?module=dataFriend");
}
else if($module == "dataFriend")//修改用户交友资料
{
	$data = $_POST['self'];
	$selfbusi->self_update('t_user', $data, "u.id='$userid'");
	$selfbusi->toLocation("UserCenter.php?module=dataHobby");
}
else if($module == "dataHobby")//修改用户兴趣资料
{
	$data = $_POST['self'];
	$selfbusi->self_update('t_user', $data, "u.id='$userid'");
	$selfbusi->toLocation("UserCenter.php");
}
else if($module == "privacy")//修改用户隐私可见
{
	$data = $_POST['self'];
	$selfbusi->self_update('t_user', $data, "u.id='$userid'");
	$selfbusi->toLocation("UserCenter.php");
}
else if($module == "password")//修改密码
{
	$data['password'] = $_POST['password'];
	$selfbusi->self_update('t_user', $data, "u.id='$userid'");
	$selfbusi->toLocation("UserCenter.php");
}
else if($module == "addrAdd")//添加收货地址
{
	$data = $_POST['addr'];
	$data['idt_user'] = $userid;
	$selfbusi->self_insert('t_consigneeadress', $data);
	$selfbusi->toLocation("UserCenter.php?module=address");
	
}
else if($module == "addrUse")//肯定使用收货地址
{
	$addrid = $_POST['useid'];
	$data['isuse'] = "1";
	$data2['isuse'] = "0";
	$selfbusi->self_update('t_consigneeadress', $data2, "u.idt_user='$userid'");
	$selfbusi->self_update('t_consigneeadress', $data, "u.id='$addrid'");	
	$selfbusi->toLocation("UserCenter.php?module=address");
}
else if($module == "AjaxCheckPwd")//ajax判断用户原密码
{
	$pwd = $_POST['password'];
	if($userbusi->checkPwd($userid, $pwd))
	{
		echo "clear";
	}
	else 
	{
		echo "wrong";
	}
}
else if($module == "AjaxGetBox")//ajax获取分页信箱
{
	$type = $_POST['type'];
	$page = $_POST['page'];
	$isread = $_POST['isread'];
	$data = $userbusi->getUserBox($type, $userid, $page,$isread);
	$response = json_encode($data);
	echo $response;
}
else if($module == "AjaxDelBox")//ajax删除信箱记录
{
	$type = $_POST['type'];
	$id = $_POST['id'];
	$where = "d.id='$id'";
	$userbusi->self_delete('t_message', $where);
	echo $type;
}
else if($module == "AjaxDelMultiBox")//ajax删除信箱记录
{
	$type = $_POST['type'];
	$id = $_POST['id'];
	$part = explode("|",$id);
	$where = " ";
	$i = "";
	for($i=0;$i<count($part);$i++)
	{
		$where .= "  d.id='$part[$i]'  OR";
	}
	$where = substr($where, 0,(strlen($where)-2));
	$userbusi->self_delete('t_message', $where);
	echo $type;
}
else if($module == "AjaxGetUserOrder")//ajax获取分页订单
{
	$page = $_POST['page'];
	$data = $userbusi->getUserOrderInfo($userid, $page);
	$response = json_encode($data);
	echo $response;
}
else if($module == "AjaxGoodsCollect")//ajax获取分页商品收藏
{
	$type = $_POST['type'];
	$page = $_POST['page'];
	$data = $userbusi->getGoodsCollect($userid, $type, $page);
	$response = json_encode($data);
	echo $response;
}
else if($module == "AjaxDelMultiCol")//ajax删除收藏
{
	$id = $_POST['id'];
	$part = explode("|",$id);
	$where = " ";
	$i = "";
	for($i=0;$i<count($part)-1;$i++)
	{
		$where .= "  d.id='$part[$i]'  OR";
	}
	$where = substr($where, 0,(strlen($where)-2));
	$userbusi->self_delete('t_goods_collect', $where);
	echo "";
}
else if($module == "AjaxTZCollect")//ajax分页获取帖子
{
	$page = $_POST['page'];
	$data = $userbusi->getTZCollect($userid, $page);
	$response = json_encode($data);
	echo $response;
}
else if($module == "AjaxRZCollect")//ajax获取分页日志
{
	$page = $_POST['page'];
	$data = $userbusi->getRZCollect($userid, $page);
	$response = json_encode($data);
	echo $response;
}
else if($module == "AjaxRZShow")//Ajax显示日志
{
	$diaryid = $_POST['diaryid'];
	$data = $userbusi->get_diary_show($diaryid);
	$response = json_encode($data);
	echo $response;
}
else if($module == "AjaxAddFriend")//ajax添加好友
{
	//插入添加好友数据
	$frid = $_POST['frid'];
	$data['friendid'] = $frid;
	$data['idt_user'] = $userid;
	$data['createtime'] = $currtime;
	$data['overflg'] = '0';
	$userbusi->self_insert('t_user_friends', $data);
	
	//反写消息表
	$msgid = $_POST['msgid'];
	$mata['type'] = '6';
	$mata['readflg'] = '1';
	$where = "u.ID = '$msgid'";
	$userbusi->self_update('t_message', $mata, $where);
	
	
}
else if($module == "AjaxCancelOrder")//ajax取消订单
{
	echo "quxiao";
}
else if($module == "AjaxRebackOrder")//申请退货
{
	echo "tuihuo";
}
else if($module == "AjaxConfirmOrder")//确认收货
{
	echo "queren";
}
else if($module == "AjaxGetAddr")//ajax动态更新城市列表
{
	$level = $_POST['level'];
	$parentid = $_POST['parentid'];
	$data = $userbusi->getLevelAddr($level, $parentid);
	$response = json_encode($data);
	echo $response;
}
else {}

//echo "<pre>";
//print_r($self);
//exit;
?>