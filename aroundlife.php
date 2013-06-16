<?php
require_once('base.php');
require_once('BaseBusiness.php');
require_once('MininatureUtil.php');
require_once('AroundLifeBusiness.php');
require_once('IndexBusiness.php');
require_once('common.php');
//-------------------add by zx---------------------
 $_SESSION['myschooltype'] = 1;
//-------------------add by zx end-------------------

$indxbsi = new IndexBusiness();//获得商家推荐
$alindbsi = new AroundLifeBusiness();//获取校边生活处理类变量
  
$aract = $_REQUEST['aroundact'];//标记判断点击的事件
//运行校边生活首页
if(empty($aract)){
	//获得品牌商家
	$brandshoplist=$alindbsi->getBrandShop();
	//获得推荐商家
	$recommendshoplist=$alindbsi->getRecommendShop();
	//获得最新商家
	$newshoplist=$alindbsi->getNewShop();
	
	//获得店铺评论
	$shopcommentlist=$alindbsi->getShopComment();
	//获得商品评论
	//$goodscommentlist=$alindbsi->getGoodsComment();

	//获得本地商户
	$aroundshop=$indxbsi->getAroundShop();
	
	$lifeadvertise=$indxbsi->getAdvertise(2);//获得校边生活的广告信息
	
	$smarty->assign("lifeadvertise",$lifeadvertise[0]);//tpl页面填充校边生活的广告信息
	
	//tpl页面填充本地商户
	$smarty->assign("aroundshop",$aroundshop);
	//tpl页面填充品牌商家信息
	$smarty->assign("brandshoplist",$brandshoplist);
	//tpl页面填充推荐商家信息
	$smarty->assign("recommendshoplist",$recommendshoplist);
	//tpl页面填充最新商家信息
	$smarty->assign("newshoplist",$newshoplist);
	//tpl页面填充店铺评论
	$smarty->assign("shopcommentlist",$shopcommentlist);
	//tpl页面填充商品评论
	//$smarty->assign("goodscommentlist",$goodscommentlist);
	//header里面的title使用
	$smarty->assign("goodscommentlist",$goodscommentlist);
	
	$smarty->display("aroundlife/index.tpl");
}
//校边商家页面
elseif (!empty($aract)){
	//获得当前页码
	$currpage = $_REQUEST['p'];
	//获取本地商户的商家推荐（广告）
	$advertShopList = $alindbsi->getAroundRecommendShop($aract);
	//取得COOKIE里的数据 ,格式为1,2,3,4 这样，当然也有可以为0
	$history =isset ($_COOKIE['SHOP']['history']) ? $_COOKIE['SHOP']['history'] : 0;
	//获取店铺名称(还看到什么）
	$allshopnamelist = $alindbsi->getAllShopNames($aract,$history);
	//获取本月销售量
	$monthnumlist = $alindbsi->getMonthNum($aract);
	//获得校边美食里的搜索条件
	$foodsearchlist = $alindbsi->getAroundFoodSearch($aract);
	
	//获得校边美食的小分类id
	$mid=$_REQUEST['mid'];
	//获得校边美食的排序分类（销量、评价、折扣、入驻时间）
	$act=$_REQUEST['act'];
	
	$order = $_REQUEST['order'];
	
	
	
	//如果当前页码为空即为首页
	if (empty($currpage)){
		$currpage = 1;
	}
	//每页显示条数
	$numbersperpage = 12;
	//获得校边美食里的所有店铺排序(默认关注次数)
	$shopalllist = $alindbsi->getShopOrder($act,$mid,$currpage,$numbersperpage,$aract,$order);
	
	$nextOrder =  $order=="ESC" ? "DESC" : "ESC";
	//tpl页面填充再次排序
	$smarty->assign("nextOrder",$nextOrder);
	//获得总页数
	$totalpages = $alindbsi->getTotalPage();
	//tpl页面填充店铺名称
	$smarty->assign("allshopnamelist",$allshopnamelist);
	//tpl页面填充3家推荐商家信息
	$smarty->assign("advertshopslist",$advertShopList);
	//tpl页面填充本月销售量
	$smarty->assign("monthnumlist",$monthnumlist);
	//tpl页面填充校边美食里的搜索条件
	$smarty->assign("foodsearchlist",$foodsearchlist);
	//tpl页面填充校边美食里的店铺排序
	$smarty->assign("shopalllist",$shopalllist);
	//tpl页面填充总页数
	$smarty->assign("pagecount",$totalpages);
	//tpl页面填充校边美食里的小分类传到页面
	$smarty->assign("mid",$mid);
	//把$act放到js里面
	$smarty->assign('act',json_encode($act));
	$smarty->assign('act',$act);
	//tpl页面填充校边的大分类传到页面
	$smarty->assign("aroundact",$aract);
	$smarty->display("aroundlife/aroundshop.tpl");	
}



?>