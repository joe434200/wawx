<?php
require_once('base.php');
require_once('BaseBusiness.php');
require_once('MininatureUtil.php');
require_once('ShopBusiness.php');
$shopbsi = new ShopBusiness();//获得业务类对象

$_SESSION['loginok']=1;//以后登录成功设置
//用户id
$userid=1;//以后从session获取
$shopid=$_REQUEST['shopid'];

//获得店铺评论的当前页码
$currpage = $_REQUEST['p2'];
//如果当前页码为空即为首页
if (empty($currpage)){
	$currpage = 1;
}

//获得店铺商品详情的当前页码
$currpage1 = $_REQUEST['p'];
//如果当前页码为空即为首页
if (empty($currpage1)){
	$currpage1 = 1;
}
//分页关键字(成交记录还是评论详情)
$pagekey = $_REQUEST['pagekey'];
//店铺评论每页显示条数
$numbersperpage = 5;
//店铺商品详情每页显示条数
$numbersperpage1 = 8;
//获取店家信息
$ashopList = $shopbsi->getAshopInfo($shopid);
//获取店家相册
$ashoppicsList = $shopbsi->getAshopPics($shopid);
//获取店家的商品信息
$ashopgoodsList = $shopbsi->getShopGoodsInfo($shopid,$currpage1,$numbersperpage1);
//获得店铺商品信息的总页数
$totalpages1 = $shopbsi->getTotalPage();
//获得店家总体评价之服务、口味、环境、性价比
$commentList = $shopbsi->getCommet1($shopid);
//获得店家的好评数
//$goodcomment = $shopbsi->getGoodComNum($shopid);
//好评百分比
//$goodcom = ($goodcomment[1]/$commentList[1])*100;
//好评价详情
$comdetail = $shopbsi->getShopComment($shopid,$currpage,$numbersperpage);
//获得店铺评论的总页数
$totalpages = $shopbsi->getTotalPage();
//关注商家的用户
$focususer = $shopbsi->getUserFocusShop($shopid);
//判断一个用户是否评价过该店铺
if(!empty($userid)){
	$iscom=$shopbsi->isUserComShop($userid,$shopid);
}
//tpl页面填充店家信息
$smarty->assign("shop",$ashopList);
//把数组放到js里面
//$smarty->assign('shopjs',json_encode($ashopList));
//tpl页面填充店家相册
$smarty->assign("pictures",$ashoppicsList);
//tpl页面填充店家商品信息
$smarty->assign("shopgoods",$ashopgoodsList);
//tpl页面填充店家总体评价之服务、口味、环境、性价比
$smarty->assign("comment",$commentList);
//tpl页面填充店家好评百分比
//$smarty->assign("goodcom",$goodcom);
//tpl页面填充店家评价详情
$smarty->assign("comdetail",$comdetail);
//tpl页面填充评论总页数
$smarty->assign("pagecount1",$totalpages);
//tpl页面填充商品的总页数
$smarty->assign("pagecount",$totalpages1);
//tpl页面填充店家关注用户
$smarty->assign("focususer",$focususer);
//tpl页面填充用户是否评价过该店铺
$smarty->assign("iscom",$iscom);

//如是COOKIE 里面不为空，则往里面增加一个店铺ID，保存浏览记录（还看过什么）
if (!empty($_COOKIE['SHOP']['history'])){
	//取得COOKIE里面的值，并用逗号把它切割成一个数组
	$history = explode(',', $_COOKIE['SHOP']['history']);
	//在这个数组的开头插入当前正在浏览的店铺ID
	array_unshift($history, $shopid);
	//去除数组里重复的值
	$history = array_unique($history);
	// $arr = array (1,2,3,1,3);
	// $arr = array (1,1,2,3,3);
	// $arr = array (1,2,3);
	//当数组的长度大于5里循环执行里面的代码，校边美食页面里还看过什么可以显示20个
	while (count($history) > 20){
		//将数组最后一个单元弹出，直到它的长度小于等于20为止
		array_pop($history);
	}
	//把这个数组用逗号连成一个字符串写入COOKIE，并设置其过期时间为30天
	setcookie('SHOP[history]', implode(',', $history), time() + 3600 * 24 * 30);
}else{
	//如果COOKIE里面为空，则把当前浏览的店铺ID写入COOKIE ，这个只在第一次浏览该网站时发生
	setcookie('SHOP[history]', $shopid, time() + 3600 * 24 * 30);
}

//分页关键字(成交记录还是评论详情)
$smarty->assign("pagekey",$pagekey);
$smarty->display("shop/shopdetail.tpl");
?>