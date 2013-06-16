<?php
require_once('base.php');
require_once('BaseBusiness.php');
require_once('MininatureUtil.php');
require_once('MoreBusiness.php');

$mbsi = new MoreBusiness();
//获得标记
$mact = $_REQUEST['mact'];


//更多的今日推荐商家
if($mact=='todayrecom'){
	//获得当前页码
	$currpage = $_REQUEST['p'];
	//如果当前页码为空即为第一页
	if (empty($currpage)){
		$currpage = 1;
	}
	//每页显示条数
	$numbersperpage = 18;
	//获取今日推荐商家
	$todayShopList = $mbsi->getMoreTodatRecommendShop($currpage,$numbersperpage);
	//获得总页数
	$totalpages = $mbsi->getTotalPage();
	//tpl页面填充总页数
	$smarty->assign("pagecount",$totalpages);
	//tpl页面填充今日推荐商家信息
	$smarty->assign("todayshoplist",$todayShopList);
	
	$smarty->display("index/moretodayshop.tpl");	
}
//更多的热点商家
elseif ($mact=='hotshop'){
	//获得当前页码
	$currpage = $_REQUEST['p'];
	//如果当前页码为空即为第一页
	if (empty($currpage)){
		$currpage = 1;
	}
	//每页显示条数
	$numbersperpage = 18;
	//获取热点商家
	$hotShopList = $mbsi->getMoreHotShop($currpage,$numbersperpage);
	//获得总页数
	$totalpages = $mbsi->getTotalPage();
	//tpl页面填充总页数
	$smarty->assign("pagecount",$totalpages);
	//tpl页面填充今日推荐商家信息
	$smarty->assign("hotShopList",$hotShopList);
	
	$smarty->display("index/morehotshop.tpl");	
}
//更多的品牌商家
elseif ($mact=='morebrand'){
	//获得当前页码
	$currpage = $_REQUEST['p'];
	//如果当前页码为空即为第一页
	if (empty($currpage)){
		$currpage = 1;
	}
	//每页显示条数
	$numbersperpage = 20;
	//获取品牌商家
	$brandshoplist = $mbsi->getMoreBrandShop($currpage,$numbersperpage);
	//获得总页数
	$totalpages = $mbsi->getTotalPage();
	//tpl页面填充总页数
	$smarty->assign("pagecount",$totalpages);
	//tpl页面填充品牌商家信息
	$smarty->assign("brandshoplist",$brandshoplist);
	
	$smarty->display("aroundlife/morebrand.tpl");			
}
//更多的推荐商家
elseif ($mact=='morerecom'){
	//获得当前页码
	$currpage = $_REQUEST['p'];
	//如果当前页码为空即为第一页
	if (empty($currpage)){
		$currpage = 1;
	}
	//每页显示条数
	$numbersperpage = 18;
	//获取品牌商家
	$recommendshoplist = $mbsi->getMoreRecommendShop($currpage,$numbersperpage);
	//获得总页数
	$totalpages = $mbsi->getTotalPage();
	//tpl页面填充总页数
	$smarty->assign("pagecount",$totalpages);
	//tpl页面填充品牌商家信息
	$smarty->assign("recommendshoplist",$recommendshoplist);
	
	$smarty->display("aroundlife/morerecom.tpl");		
}
//更多的团购商品
elseif ($mact=='morerevolume'){
	//获得当前页码
	$currpage = $_REQUEST['p'];
	//如果当前页码为空即为第一页
	if (empty($currpage)){
		$currpage = 1;
	}
	//每页显示条数
	$numbersperpage = 12;
	//获取团购商品
	$vgoodslist = $mbsi->getMoreVolumeGoods($currpage,$numbersperpage);
	//获得总页数
	$totalpages = $mbsi->getTotalPage();
	//tpl页面填充总页数
	$smarty->assign("pagecount",$totalpages);
	//tpl页面填充团购商品
	$smarty->assign("vgoodslist",$vgoodslist);
	
	$smarty->display("index/morevolume.tpl");	
}
//更多的特色商品
elseif ($mact=='morerespecial'){
	//获得当前页码
	$currpage = $_REQUEST['p'];
	//如果当前页码为空即为第一页
	if (empty($currpage)){
		$currpage = 1;
	}
	//每页显示条数
	$numbersperpage = 12;
	//获取特色商品
	$sgoodslist = $mbsi->getMoreSpecialGoods($currpage,$numbersperpage);
	//获得总页数
	$totalpages = $mbsi->getTotalPage();
	//tpl页面填充总页数
	$smarty->assign("pagecount",$totalpages);
	//tpl页面填充品特色商品
	$smarty->assign("sgoodslist",$sgoodslist);
	
	$smarty->display("index/morespecial.tpl");		
}
?>