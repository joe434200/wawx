<?php
require_once('base.php');
require_once('BaseBusiness.php');
require_once('MininatureUtil.php');
require_once('IndexBusiness.php');
require_once('SearchBusiness.php');
require_once('common.php');


$indbsi = new IndexBusiness();//获取首页处理类变量
$sbsi = new SearchBusiness();
$act = $_REQUEST['act'];//标记判断点击的事件

if(empty($act)){//访问首页
	//获得热门搜索
	
	//-------------------add by zx---------------------
   $_SESSION['myschooltype'] = 0;
   //-------------------add by zx end-------------------
	
	$hotsearch=$sbsi->selectHotSearch();
	$_SESSION['hotsearch']=$hotsearch;
	//获得本地商户
	$aroundshop=$indbsi->getAroundShop();
	$exchangeRecList = $indbsi->getExchangeRecord();//获取兑换记录
	$noticeList = $indbsi->getNotice();//获取公告
	$top10GoodsList = $indbsi->getTop10Goods();//获取销售前十位的商品信息（id、商品名、图片、本店售价）
	$advertShopList = $indbsi->getAdvertRecommendShop();//获取商家推荐（广告）
	$todayShopList = $indbsi->getTodatRecommendShop();//获取今日推荐商家
	$hotShopList = $indbsi->getHotShop();//获取热点商家
	$hotGrpList = $indbsi->getHotgrp();//获取热点圈子
	$hotForumList = $indbsi->getHottforum();//获取热点帖子
	$centeradvertise=$indbsi->getAdvertise(0);//获得首页中心位置的广告信息
	$leftadvertise=$indbsi->getAdvertise(1);//获得首页左则位置的广告信息
	
	$smarty->assign("centeradvertise",$centeradvertise[0]);//tpl页面填充首页中心位置的广告信息
	$smarty->assign("leftadvertise",$leftadvertise[0]);//tpl页面填充首页左则位置的广告信息
	$smarty->assign("exchangelist",$exchangeRecList);//tpl页面填充兑换记录
	$smarty->assign("noticelist",$noticeList);//tpl页面填充公告
	$smarty->assign("top10goodslist",$top10GoodsList);//tpl页面填充前十位的商品信息
	$smarty->assign("advertshopslist",$advertShopList);//tpl页面填充3家推荐商家信息
	$smarty->assign("todayshoplist",$todayShopList);//tpl页面填充今日推荐商家信息
	$smarty->assign("hotshoplist",$hotShopList);//tpl页面填充热点商家信息
	$smarty->assign("hotgrplist",$hotGrpList);//tpl页面填充热点圈子
	$smarty->assign("hotforumlist",$hotForumList);//tpl页面填充热点帖子
	
	$smarty->assign('hotforumlistjs',json_encode($hotForumList));//把数组放到js里面
	$smarty->assign('hotgrplistjs',json_encode($hotGrpList));//把数组放到js里面
	//tpl页面填充本地商户
	$smarty->assign("aroundshop",$aroundshop);
	
	$smarty->display("index/index.tpl");
}
//打开公告详细画面
else if($act=='notice'){
	$anotice=$indbsi->getNoticeById($_GET['id']);
	//tpl页面填充兑换某个公告信息
	$smarty->assign("anotice",$anotice);
	
	$smarty->display("index/shownotice.tpl");
}
//打开学生惠画面
elseif($act=='studentwill'){
	
	//-------------------add by zx---------------------
  $_SESSION['myschooltype'] = 2;
   //-------------------add by zx end-------------------
	
	//获得本周热销单品
	$weekhotlist = $indbsi->getWeekHot();
	//获得最新排行
	$newestlist = $indbsi->getNewest();
	//获得团购商品
	$vgoodslist = $indbsi->getVolumeGoods();
	//获得特色商品
	$sgoodslist = $indbsi->getSpecialGoods();
	
	$stuadvertise=$indbsi->getAdvertise(3);//获得学生惠位置的广告信息
	
	$smarty->assign("stuadvertise",$stuadvertise[0]);//tpl页面填充学生惠位置的广告信息
	
	//tpl页面填充本周热销单品
	$smarty->assign("weekhotlist",$weekhotlist);
	//tpl页面填充最新排行
	$smarty->assign("newestlist",$newestlist);
	//tpl页面填充团购商品
	$smarty->assign("vgoodslist",$vgoodslist);
	//tpl页面填充特色商品
	$smarty->assign("sgoodslist",$sgoodslist);
	//把数组放到js里面
	$smarty->assign('weekhotlistjs',json_encode($weekhotlist));
	//把数组放到js里面
	$smarty->assign('newestlistjs',json_encode($newestlist));
	
	$smarty->display("index/studentwill.tpl");
}

?>