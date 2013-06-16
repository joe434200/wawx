<?php
require_once('base.php');
require_once('BaseBusiness.php');
require_once('MininatureUtil.php');
require_once('IndexBusiness.php');
require_once('ExchangeBusiness.php');
require_once('common.php');
//用户ID
$userid=1;
//获取首页处理类变量
$indbsi = new IndexBusiness();
//获取校币了没的处理类变量
$excbsi = new ExchangeBusiness();
$act=$_REQUEST['act'];

//获取用户信息
if(!empty($userid)){
	$user = $excbsi->getUserInfo($userid);
}
//校币了没首页
if($act=='index'){
	//-------------------add by zx---------------------
  $_SESSION['myschooltype'] = 3;
   //-------------------add by zx end-------------------
	
	$exbetw=$_REQUEST['exbetween'];
	//获得当前页码
	$currpage = $_REQUEST['p'];
	//如果当前页码为空即为首页
	if (empty($currpage)){
		$currpage = 1;
	}
	//每页显示条数
	$numbersperpage = 9;
	//获取兑换商品
	$exchangegoods = $excbsi->getExchangeGoods($exbetw,$currpage,$numbersperpage);
	//获得总页数
	$totalpages = $excbsi->getTotalPage();
	//获取兑换记录
	$exchangeRecList = $indbsi->getExchangeRecord();
	//获取特惠广告商品
	$oddsadvList = $excbsi->getOddsGoods();
	//tpl页面填充用户信息
	$smarty->assign("user",$user);
	//tpl页面填充兑换记录
	$smarty->assign("exchangelist",$exchangeRecList);
	//tpl页面填充特惠广告商品
	$smarty->assign("oddsadvList",$oddsadvList);
	
	//tpl页面填充总页数
	$smarty->assign("pagecount",$totalpages);
	//tpl页面填充兑换商品
	$smarty->assign("exchangegoods",$exchangegoods);
	
	$smarty->display("exchange/index.tpl");		
}
//校币大转盘
elseif ($act=='drawlottery'){
	//获取公告
	$noticeList = $excbsi->getNotice();
	//获取抽奖信息
	$lotterRList = $excbsi->getLotteryRecord();
	//获取兑换排行信息
	$exchangeList = $excbsi->getExchangeRecord();
	//tpl页面填充用户信息
	$smarty->assign("user",$user);
	//tpl页面填充公告
	$smarty->assign("noticelist",$noticeList);
	//tpl页面填充中奖信息
	$smarty->assign("lotterRList",$lotterRList);
	//tpl页面填充兑换排行
	$smarty->assign("exchangeList",$exchangeList);
	$smarty->display("exchange/draw.tpl");	
}


?>