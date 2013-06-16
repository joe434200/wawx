<?php
require_once('base.php');
require_once('BaseBusiness.php');
require_once('MininatureUtil.php');
require_once('SearchBusiness.php');
require_once('common.php');
$sbus=new SearchBusiness();

//校边美食里面的小搜索
$searchkey=$_REQUEST['searchkey'];
//获得宝贝的当前页码
$currpage = $_REQUEST['p'];
//如果当前页码为空即为首页
if (empty($currpage)){
	$currpage = 1;
}
//获得店铺的当前页码
$currpage1 = $_REQUEST['p2'];
//如果当前页码为空即为首页
if (empty($currpage1)){
	$currpage1 = 1;
}
//宝贝每页显示条数
$numbersperpage = 12;
//店铺每页显示条数
$numbersperpage1 = 12;
//分页关键字(成交记录还是评论详情)
$pagekey = $_REQUEST['pagekey'];	

$keyword=trim($_POST[searchkey]);
//搜索类型
$searchtype=$_REQUEST['searchtype'];
//小搜索
if($searchtype=='small'){
	//校边生活分类ID
	$aract = $_REQUEST['aroundact'];
	//校边生活分类信息
	$around=$sbus->getAaroundShop($aract);
	
	//获得店铺的排序分类（销量、评价、折扣、入驻时间）
	
	$order = $_REQUEST['order'];
	
	$actorder=$_REQUEST['actorder'];
	//获得校边美食里的所有店铺排序(默认关注次数)
	$shopalllist = $sbus->getSearchShop($actorder,$currpage1,$numbersperpage1,$aract,$searchkey,$order);
	//获得总页数
	$totalpages1 = $sbus->getTotalPage();
	//店铺家数
	$shopnum=$sbus->getSearchShopNum($aract,$searchkey);
	
	//获得商品的排序分类（销量、评价、折扣、入驻时间）
	$actorder1=$_REQUEST['actorder1'];
	
	
	
	//获得搜索的商品排序(默认关注次数)
	$goodsalllist = $sbus->getSearchGoods($actorder1,$currpage,$numbersperpage,$aract,$searchkey,$order);
	
	$nextOrder =  $order=="ESC" ? "DESC" : "ESC";
	
	//获得总页数
	$totalpages = $sbus->getTotalPage();
	//商品数量
	$goodsnum=$sbus->getSearchGoodsNum($aract,$searchkey);
	//tpl页面填充再次排序
	$smarty->assign("nextOrder",$nextOrder);
	//tpl页面填充店铺家数
	$smarty->assign("shopnum",$shopnum[0]);
	//填充校边生活分类信息
	$smarty->assign("around",$around);
	//tpl页面填充校边美食里的店铺排序
	$smarty->assign("shopalllist",$shopalllist);
	//tpl页面填充总页数
	$smarty->assign("pagecount1",$totalpages1);
	//把$actorder放到js里面
	$smarty->assign('actorder',$actorder);
	
	//tpl页面填充商品数量
	$smarty->assign("goodsnum",$goodsnum[0]);
	//tpl页面填充校边美食里的商品排序
	$smarty->assign("goodsalllist",$goodsalllist);
	//tpl页面填充总页数
	$smarty->assign("pagecount",$totalpages);
	//把$actorder放到js里面
	$smarty->assign('actorder1',$actorder1);
	
	//tpl页面填充校边的大分类传到页面
	$smarty->assign("aroundact",$aract);
	//tpl页面填充搜索关键字
	$smarty->assign("searchkey",$searchkey);
	//分页关键字(成交记录还是评论详情)
	$smarty->assign("pagekey",$pagekey);
	$smarty->display("aroundlife/smallserach.tpl");	
}elseif ($searchtype=='big'){
	//判断关键字在不在热门搜索里面
	$isin=$sbus->isHotSearch($searchkey);
	//不在
	if(empty($isin)){
		$sbus->insertHotSearch($searchkey);
	}else{//在
		$sbus->updateHotSearch($searchkey);
	}
	
	
	//获得店铺的排序分类（销量、评价、折扣、入驻时间）
	$actorder=$_REQUEST['actorder'];
	//获得校边美食里的所有店铺排序(默认关注次数)
	$shopalllist = $sbus->getbigSearchShop($actorder,$currpage1,$numbersperpage1,$searchkey);
	//获得总页数
	$totalpages1 = $sbus->getTotalPage();
	//店铺家数
	$shopnum=$sbus->getbigSearchShopNum($searchkey);
	
	//获得商品的排序分类（销量、评价、折扣、入驻时间）
	$actorder1=$_REQUEST['actorder1'];
	//获得搜索的商品排序(默认关注次数)
	$goodsalllist = $sbus->getbigSearchGoods($actorder1,$currpage,$numbersperpage,$searchkey);
	//获得总页数
	$totalpages = $sbus->getTotalPage();
	//商品数量
	$goodsnum=$sbus->getbigSearchGoodsNum($searchkey);
	
	//tpl页面填充店铺家数
	$smarty->assign("shopnum",$shopnum[0]);
	//tpl页面填充校边美食里的店铺排序
	$smarty->assign("shopalllist",$shopalllist);
	//tpl页面填充总页数
	$smarty->assign("pagecount1",$totalpages1);
	//把$actorder放到js里面
	$smarty->assign('actorder',json_encode($actorder));
	//tpl页面填充商品数量
	$smarty->assign("goodsnum",$goodsnum[0]);
	//tpl页面填充校边美食里的商品排序
	$smarty->assign("goodsalllist",$goodsalllist);
	//tpl页面填充总页数
	$smarty->assign("pagecount",$totalpages);
	//把$actorder放到js里面
	$smarty->assign('actorder1',json_encode($actorder1));
	//tpl页面填充搜索关键字
	$smarty->assign("searchkey",$searchkey);
	//分页关键字(店铺还是商品)
	$smarty->assign("pagekey",$pagekey);
	$smarty->display("aroundlife/bigserach.tpl");	
}



?>