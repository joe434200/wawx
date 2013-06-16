<?php
require_once('base.php');
require_once('BaseBusiness.php');
require_once('MininatureUtil.php');
require_once('GoodsBusiness.php');
require_once('FlowBusiness.php');
$goodsbsi = new GoodsBusiness();//获得业务类对象
$fbsi=new FlowBusiness();

//用户id
$userid=1;//以后从session获取
//用户姓名
$username=chenheng;//以后从session获取
//获得sessionid
//$sessonid=session_id();
//如是COOKIE 里面不为空
if (!empty($_COOKIE['ssid'])){
	$sessonid=$_COOKIE['ssid'];//从cookie中取sessionid
}else{
	//获得sessionid
	$sessonid=session_id();
	//如果COOKIE里面为空，则把当前的sessonid写入COOKIE
	setcookie('ssid', $sessonid, time() + 3600 * 24);//购物车保存一天
}
//商品id
$goodid=$_REQUEST['goodsid'];
$act=$_REQUEST['act'];
//获得商品评论的当前页码
$currpage = $_REQUEST['p'];
//如果当前页码为空即为首页
if (empty($currpage)){
	$currpage = 1;
}
//获得商品成交的当前页码
$currpage1 = $_REQUEST['p2'];
//如果当前页码为空即为首页
if (empty($currpage1)){
	$currpage1 = 1;
}

//商品评论每页显示条数
$numbersperpage = 5;
//商品成交详情每页显示条数
$numbersperpage1 = 5;
//分页关键字(成交记录还是评论详情)
$pagekey = $_REQUEST['pagekey'];
//兑换商品画面
if($act=='exchange'){	
	//获取商品信息
	$agoodsList = $goodsbsi->getAgoodsInfo($goodid);
	//获取商品相册
	$agoodspicsList = $goodsbsi->getAgoodsPics($goodid);
	//获得商品的评论信息
	$goodscomment=$goodsbsi->getGoodsComment($goodid,$currpage,$numbersperpage);
	//获得商品评论的总页数
	$totalpages = $goodsbsi->getTotalPage();
	//获得商品兑换记录个数
	$exrnum=$goodsbsi->getExrnum($goodid);
	//获得商品兑换记录
	$exrecord=$goodsbsi->getExRecord($goodid,$currpage1,$numbersperpage1);
	//获得兑换记录的总页数
	$totalpages1 = $goodsbsi->getTotalPage();
	//获得商品兑换用户
	$exusers=$goodsbsi->getExGoodsUsers($goodid);
	
	if(!empty($userid)){
		//判断一个用户是否评价过该商品
		$iscom=$goodsbsi->isUserComGoods($userid,$goodid);
		//判断一个用户是否兑换过该商品
		$isex=$goodsbsi->isUserExGoods($userid,$goodid);
	}
	
	
	if(!empty($agoodsList['goodsparamenter'])){
		//取得商品参数的值，并用分号把它切割成一个数组
		$goodsparamenter = explode(';', $agoodsList['goodsparamenter']);
		//将数组最后一个单元弹出
		array_pop($goodsparamenter);
	}
	//tpl页面填充商品参数
	$smarty->assign("goodsparamenter",$goodsparamenter);	
	//tpl页面填充商品评论的总页数
	$smarty->assign("pagecount",$totalpages);
	//tpl页面填充商品成交记录的总页数
	$smarty->assign("pagecount1",$totalpages1);
	//tpl页面填充商品信息
	$smarty->assign("goods",$agoodsList);
	//把ID放到js里面
	//$smarty->assign('gid',json_encode($agoodsList['ID']));
	//tpl页面填充商品相册
	$smarty->assign("pictures",$agoodspicsList);
	//tpl页面填充商品的评论信息
	$smarty->assign("comments",$goodscomment);
	//tpl页面填充商品的兑换记录个数
	$smarty->assign("exrnum",$exrnum);
	//tpl页面填充商品的兑换记录
	$smarty->assign("exrecord",$exrecord);
	//tpl页面填充商品的兑换记录
	$smarty->assign("exusers",$exusers);
	//tpl页面填充用户是否评价过该商品
	$smarty->assign("iscom",$iscom);
	//tpl页面填充用户是否兑换过该商品
	$smarty->assign("isex",$isex);
	//分页关键字(成交记录还是评论详情)
	$smarty->assign("pagekey",$pagekey);
	//tpl页面填充支付方式
	//$smarty->assign("payment",$payment);
	$smarty->display("exchange/excgoodsdetail.tpl");	
}
//判断所有购买量是否超出库存量
elseif ($act=='cartmk'){
	//购买数量
	$mknum=$_REQUEST['mknum'];
	//获得购物车中的购买数量
	$cartmk=$goodsbsi->shopNum($goodid,$sessonid,$userid);
	//获取商品的库存量
	$agoodsList = $goodsbsi->getAgoodsInfo($goodid);
	$goodsnumber=$agoodsList['goodsnumber'];
	//数字格式化
	$mknum=sprintf("%d",$mknum);
	$cartmk=sprintf("%d",$cartmk[0]);
	$goodsnumber=sprintf("%d",$goodsnumber);
	//总购买量
	$totalmk=$cartmk+$mknum;
	//还能购买几件
	$canbuy=$goodsnumber-$cartmk;
	$op=$_REQUEST['op'];
	//总购买量超出库存
	if($totalmk>$goodsnumber){
		echo "morethan";
		if($mknum>$goodsnumber){
			echo "很遗憾！购买量大于库存，最多还能购买".$goodsnumber."件!";
		}else{
			echo "购物车有同样商品，最多还能购买".$canbuy."件!";
		}
		exit;
	}else{
		if($op=='add'){
			$goodcart=array();
			//商品信息
			$goodcart['sessionID']=$sessonid;
			$goodcart['goodsid']=$goodid;
			$goodcart['idt_user']=$userid;
			$goodcart['mknum']=$mknum;
			//购买类型
			$shoppingtype=$_REQUEST['shoppingtype'];
			//正常购买
			if(empty($shoppingtype)){
				$goodcart['shoppingtype']=0;
			}
			
			$goodcart['shoppingtype']=$shoppingtype;
			//判断是否有购物车
			$ishascart=$fbsi->isHasCart($sessonid,$userid);
			//购物车不存在
			if(empty($ishascart)){
				$cart=array();
				//创建购物车
				if(empty($userid)){
					$cart['idt_user']=0;
				}else{
					$cart['idt_user']=$userid;
				}
				$cart['issettlement']=0;
				$cart['sessionID']=$sessonid;
				//创建购物车
				$fbsi->createCart($cart);
				//把商品添加到购物车
				$fbsi->addCart($goodcart,$userid);	
			}else{//购物车存在
				//在购物车中
				if(!empty($cartmk)){
					//更新一件商品的购买量
					$fbsi->updateAgoodsCart($goodcart);
				}else{//不在购物车中
					//把商品添加到购物车
					$fbsi->addCart($goodcart,$userid);	
				}
			}
			echo "成功加入购物车，车中共有该宝贝".$totalmk."件!";
			exit;		
		}
	}
}
//判断校币兑换
elseif ($act=='exchangemk'){
	if(empty($userid)){
		
	}else{
		//兑换数量
		$mknum=$_REQUEST['mknum'];
		//获取商品的库存量
		$agoodsList = $goodsbsi->getAgoodsInfo($goodid);
		$goodsnumber=$agoodsList['goodsnumber'];
		//兑换商品所需校币
		$scoins=$agoodsList['exchangemoney'];
		//获得用户的校币量
		$coins=$goodsbsi->getUserCoins($userid);
		//数字格式化
		$mknum=sprintf("%d",$mknum);
		$scoins=sprintf("%d",$scoins);
		$coins=sprintf("%d",$coins[0]);
		$goodsnumber=sprintf("%d",$goodsnumber);
		//所需总校币
		$needcoins=$mknum*$scoins;
		$messvalue="";
		//所需校币大于可用校币
		if($needcoins>$coins){
			$messvalue = "很抱歉！可用校币量不够，您还有&nbsp;".$coins."&nbsp;校币!";
		}elseif($mknum>$goodsnumber){//兑换量超出库存
			$messvalue = "很遗憾！兑换量大于库存，最多可兑换&nbsp;".$goodsnumber."&nbsp;件!";
		}
		echo $messvalue;
		exit;
	}
}
//商品画面
else{
	//获得购买类型
	$shoppingtype=$_REQUEST['shoppingtype'];
	
	//获取商品信息
	$agoodsList = $goodsbsi->getAgoodsInfo($goodid);
	if(!empty($agoodsList['goodsparamenter'])){
		//取得商品参数的值，并用分号把它切割成一个数组
		$goodsparamenter = explode(';', $agoodsList['goodsparamenter']);
		//将数组最后一个单元弹出
		array_pop($goodsparamenter);
	}
	//获取商品相册
	$agoodspicsList = $goodsbsi->getAgoodsPics($goodid);
	//购买此商品的用户
	$tgoodsUserList = $goodsbsi->getGoodsUsers($goodid);
	//获得商品所在的商家名字
	$shopname=$goodsbsi->getShopname($goodid);
	//获得商品的评论信息
	$goodscomment=$goodsbsi->getGoodsComment($goodid,$currpage,$numbersperpage);
	//获得商品评论的总页数
	$totalpages = $goodsbsi->getTotalPage();
	//获得商品的成交详情
	$goodsmkdetail=$goodsbsi->getMkRecord($goodid,$currpage1,$numbersperpage1);
	//获得成交记录的总页数
	$totalpages1 = $goodsbsi->getTotalPage();
	
	if(!empty($userid)){
		//判断一个用户是否购买过该商品
		$ismk=$goodsbsi->isUserMkGoods($userid,$goodid);
		//判断一个用户是否评价过该商品
		$iscom=$goodsbsi->isUserComGoods($userid,$goodid);
	}
	//支付方式
	$payment=$goodsbsi->getPayment();
	if($shoppingtype=='2'){
		date_default_timezone_set('PRC');
		$starttime=$agoodsList['groupstarttime'];
		$endtime=$agoodsList['groupexpiretime'];
		
		$start_format=strtotime($starttime);
		$end_format=strtotime($endtime);
		$nowtime=time();
		
		if($end_format<$nowtime){
			$isin = 0;
		}
		if($start_format>$nowtime){
			$isin = 1;
		}
		//tpl页面填充商品评论的总页数
		$smarty->assign("isin",$isin);
		$smarty->assign('gid',json_encode($goodid));
	}
	//tpl页面填充商品评论的总页数
	$smarty->assign("pagecount",$totalpages);
	//tpl页面填充商品成交记录的总页数
	$smarty->assign("pagecount1",$totalpages1);

	$agoodsList['shoppingtype']=$shoppingtype;
	//tpl页面填充商品信息
	$smarty->assign("goods",$agoodsList);
	$smarty->assign("pictures",$agoodspicsList);
	//tpl页面填充购买此商品的用户
	$smarty->assign("goodsuser",$tgoodsUserList);
	//tpl页面填充商家名字
	$smarty->assign("shopname",$shopname);
	//tpl页面填充商品的评论信息
	$smarty->assign("comments",$goodscomment);
	//tpl页面填充商品的成交详情
	$smarty->assign("mkdetail",$goodsmkdetail);
	//tpl页面填充用户是否购买过该商品
	$smarty->assign("ismk",$ismk);
	//tpl页面填充用户是否评价过该商品
	$smarty->assign("iscom",$iscom);
	//tpl页面填充支付方式
	$smarty->assign("payment",$payment);
	//tpl页面填充商品参数
	$smarty->assign("goodsparamenter",$goodsparamenter);
	//分页关键字(成交记录还是评论详情)
	$smarty->assign("pagekey",$pagekey);
	$smarty->display("goods/goodsdetail.tpl");
}

?>