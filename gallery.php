<?php
require_once('base.php');
require_once('BaseBusiness.php');
require_once('MininatureUtil.php');
require_once('GoodsBusiness.php');
require_once('ShopBusiness.php');
$shopbsi = new ShopBusiness();//获得业务类对象
$goodsbsi = new GoodsBusiness();//获得业务类对象

$goodid=$_REQUEST['goodsid'];
$shopid=$_REQUEST['shopid'];
//商品相册
if(empty($shopid)){
	//获取商品信息
	$agoodsList = $goodsbsi->getAgoodsInfo($goodid);
	//获取商品相册
	$agoodspicsList = $goodsbsi->getAgoodsPics($goodid);
	//tpl页面填充商品信息
	$smarty->assign("goods",$agoodsList);
	//tpl页面填充商品相册
	$smarty->assign("pictures",$agoodspicsList);

	$smarty->display("goods/gallery.tpl");
}
//店家相册
if(empty($goodid)){
	//获取店家信息
	$ashopList = $shopbsi->getAshopInfo($shopid);
	//获取店家相册
	$ashoppicsList = $shopbsi->getAshopPics($shopid);
	//tpl页面填充店铺信息
	$smarty->assign("shop",$ashopList);
	//tpl页面填充店铺相册
	$smarty->assign("pictures",$ashoppicsList);

	$smarty->display("shop/gallery.tpl");
}

?>