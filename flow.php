<?php
//使session不依赖于cookie
//ini_set('session.use_cookies','0');
//打开session
//session_start();
require_once('base.php');
require_once('BaseBusiness.php');
require_once('MininatureUtil.php');
require_once('FlowBusiness.php');
require_once('GoodsBusiness.php');
require_once('payclass.php');

$fbsi=new FlowBusiness();
$gbsi=new GoodsBusiness();


$act=$_REQUEST['act'];
//立刻购买提交订单
$actgbuy=$_REQUEST['actgbuy'];
//用户id
$userid=1;//以后从session获取
//用户姓名
$username=chenheng;//以后从session获取

//如是COOKIE 里面不为空
if (!empty($_COOKIE['ssid'])){
	$sessonid=$_COOKIE['ssid'];//从cookie中取sessionid
}else{
	//获得sessionid
	$sessonid=session_id();
	//如果COOKIE里面为空，则把当前的sessonid写入COOKIE
	setcookie('ssid', $sessonid, time() + 3600 * 24);//购物车保存一天
}
//加入购物车
if($act=='cart'){
	//向购物车中加入的商品id
	$goodsid=$_REQUEST['goodsid'];
	//购买数量
	$mknum=$_REQUEST['mknum'];
	$goodcart=array();
	//商品信息
	$goodcart['sessionID']=$sessonid;
	$goodcart['goodsid']=$goodsid;
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
		//获得购物车中已有的购买量
		$cartmknum=$fbsi->shopNum($goodsid,$sessonid,$userid);
		//在购物车中
		if(!empty($cartmknum)){
			//获得商品的库存量
			$goodsnum=$fbsi->getNum($goodsid);
			//总购买量
			$totalmk=$mknum+$cartmknum[0];
			if($totalmk>$goodsnum[0]){
				$mkalam="购买量超出库存，您最多可购买".$goodsnum[0]."件";
				echo $mkalam;
				exit;
			}else{
				//更新一件商品的购买量
				$fbsi->updateAgoodsCart($goodcart);
			}
		}else{//不在购物车中
			//把商品添加到购物车
			$fbsi->addCart($goodcart,$userid);	
		}		
	}
	//获得购物车里面的商品信息
	$cartgoods=$fbsi->checkGoodsIn($sessonid,$userid); 
	//获得我的收藏
	$collgoods=$fbsi->collGoods($userid); 
	$smarty->assign("cartgoods",$cartgoods);
	$smarty->assign("collgoods",$collgoods);
	$smarty->display("flow/cart.tpl");
}
//首页点击购物车
elseif ($act=='index'){
	
	//-------------------add by zx---------------------
  $_SESSION['myschooltype'] = 4;
  //-------------------add by zx end-------------------
	
	//获得购物车里面的商品
	$cartgoods=$fbsi->checkGoodsIn($sessonid,$userid);
	/*//本店价总计金额
	$shopTotal=0;
	//市场价总金额
	$marketTotal=0;
	for($i=0;$i<count($cartgoods);$i++){
		//计算购物车的市场价总计金额
		$marketTotal=$marketTotal+$cartgoods[$i]['marketprice']*$cartgoods[$i]['shoppingnum'];
		//计算购物车的本店价总计金额
		$shopTotal=$shopTotal+$cartgoods[$i]['shoppingprice']*$cartgoods[$i]['shoppingnum'];
	}			
	$marketTotal=round($marketTotal,2);
	$shopTotal=round($shopTotal,2);
	//计算购物车节省金额
	$disMoney=$marketTotal-$shopTotal;
	//计算购物车节省百分比
	$rate=($disMoney/$marketTotal)*100;
	$rate=round($rate,2);
	//tpl页面填充市场价总金额
	$smarty->assign("marketTotal",$marketTotal);
	//tpl页面填充本店价总计金额
	$smarty->assign("shopTotal",$shopTotal);
	//tpl页面填充节省金额
	$smarty->assign("disMoney",$disMoney);
	//tpl页面填充节省百分比
	$smarty->assign("rate",$rate);
	*/
	
	//获得我的收藏
	$collgoods=$fbsi->collGoods($userid); 
	//tpl页面填充购物车的商品信息
	$smarty->assign("cartgoods",$cartgoods);
	$smarty->assign("collgoods",$collgoods);
	$smarty->display("flow/cart.tpl");
}
//收藏商品
elseif ($act=='collect'){
	//没有登录，请登录
	if(empty($userid)){
		
	}else{
		//获得商品id
		$goodsid=$_REQUEST['goodsid'];
		//获得收藏类型
		$ctype=$_REQUEST['ctype'];
		
		//用户是否收藏了该商品
		$iscollect=$fbsi->iscollectGoods($userid,$goodsid);
		if(!empty($iscollect)){
			echo "false";
			exit;
		}else{
			$issuc=$fbsi->collectGoods($userid,$goodsid,$ctype);
			//成功收藏
			if($issuc>0){
				echo "true";
				exit;
			}
		}
	}
}
//从购物车删除商品
elseif ($act=='delete'){
	//向购物车中删除的商品id
	$goodsid=$_REQUEST['goodsid'];
	$issuc=$fbsi->deleteGoods($sessonid,$goodsid,$userid);
}
//更新购物车
elseif ($act=='update'){
	//更新的商品id
	$goodsid=$_REQUEST['goodsid'];
	//购买数量
	$mknum=$_REQUEST['mknum'];
	//警告
	$mkalam="true";
	//获得商品的库存量
	$goodsnum=$fbsi->getNum($goodsid);
	//购买量超出库存
	if($mknum>$goodsnum[0]){
		$mkalam="购买量超出库存，您最多可购买".$goodsnum[0]."件";
		$issuc=$fbsi->updateGoods($sessonid,$goodsid,$goodsnum[0],$userid);
	}else{
		//更新
		$issuc=$fbsi->updateGoods($sessonid,$goodsid,$mknum,$userid);
	}
	//更新后重新获得购物车里面的商品
	$cartgoods=$fbsi->checkGoodsIn($sessonid,$userid);
	//商品金额小计
	$ssum=0;
	for($i=0;$i<count($cartgoods);$i++){
		if($goodsid==$cartgoods[$i]['goodsid']){
			$ssum=$cartgoods[$i]['sumsmall'];
			break;
		}
	}
	//本店价总计金额
	$shopTotal=$cartgoods[0]['shopTotal'];
	//市场价总金额
	$marketTotal=$cartgoods[0]['marketTotal'];
	//计算购物车节省金额
	$disMoney=$cartgoods[0]['disMoney'];
	//计算购物车节省百分比
	$rate=$cartgoods[0]['rate'];
	//返回结果
	$result=$ssum."@".$shopTotal."@".$marketTotal."@".$disMoney."@".$rate."@".$mkalam."@".$goodsnum[0];
	echo $result;
	exit;
}
//清空购物车
elseif ($act=='clear'){
	$fbsi->clearGoods($sessonid,$userid);
}
//校币兑换
elseif ($act=='exchangemk'){
	if(empty($userid)){
		
	}else{
		//收货人信息
		$cosignee=$fbsi->getCosignee($userid);
		$flag=$_REQUEST['flag'];
		//没有修改收货人信息时
		if(empty($flag)){
			$goodsid=$_REQUEST['goodsid'];
			//兑换数量
			$mknum=$_REQUEST['mknum'];
			//获得兑换商品信息
			$goods=$gbsi->getAgoodsInfo($goodsid);
			
			$mknum=sprintf("%d",$mknum);
			$goods['mknum']=$mknum;
			//兑换单件商品所需校币
			$scoins=$goods['exchangemoney'];
			$scoins=sprintf("%d",$scoins);
			//耗币总计
			$goods['sumcoins']=$mknum*$scoins;
			//校币兑换
			$flag="exchange";
			//放到session中
			$_SESSION['exchgoods']=$goods;
		}
		//修改收货人信息
		else{
			$goods=$_SESSION['exchgoods'];
		}
		//如果没有收货人信息
		if(empty($cosignee)){
			//获取国家信息
			$country_list=$fbsi->getRegion(0);
			//获取省份信息
			$province_list=$fbsi->getRegion(1);
			//获取市信息
			$city_list=$fbsi->getRegion(2);
			//获取区县信息
			$district_list=$fbsi->getRegion(3);
			
			$smarty->assign("country_list",$country_list);
			$smarty->assign("province_list",$province_list);
			$smarty->assign("city_list",$city_list);
			$smarty->assign("flag",$flag);
			$smarty->assign("district_list",$district_list);
			//填写收货人信息
			$smarty->display("flow/consignee.tpl");
		}else {
			//tpl页面填充收货人信息
			$smarty->assign("cosignee",$cosignee);
			//tpl页面填充收商品信息
			$smarty->assign("exchgoods",$goods);
			//tpl页面填充收商品信息
			$smarty->assign("goodsid",$goods['ID']);
			$smarty->display("exchange/excordercofirm.tpl");
		}		
	}
}
//清算中心
elseif ($act=='checkout'){
	//没有登录，请登录
	
	//-------------------add by zx---------------------
  $_SESSION['myschooltype'] = 5;
//-------------------add by zx end-------------------
	
	if(empty($userid)){
		
	}else{
		//收货人信息
		$cosignee=$fbsi->getCosignee($userid);
		//如果没有收货人信息
		if(empty($cosignee)){
			//获取国家信息
			$country_list=$fbsi->getRegion(0);
			//获取省份信息
			$province_list=$fbsi->getRegion(1);
			//获取市信息
			$city_list=$fbsi->getRegion(2);
			//获取区县信息
			$district_list=$fbsi->getRegion(3);
		
			$smarty->assign("country_list",$country_list);
			$smarty->assign("province_list",$province_list);
			$smarty->assign("city_list",$city_list);
			$smarty->assign("district_list",$district_list);
			//填写收货人信息
			$smarty->display("flow/consignee.tpl");
		}else{
			//获得支付方式
			$payment=$fbsi->getPayment();
			//获得配送方式
			//$shipping=$fbsi->getShipping();
			//获得发票内容
			//$invcontent=$fbsi->getInvcontent();
			//获得上一次用户采用的支付和配送方式
			$lastsp=$fbsi->last_shipping_and_payment($userid);
			//邮费、保价费、应付款项的计算(初始化)
			//$datacom=array();
			//默认邮费计算
			/*if($cartgoods[0]['shopTotal']>=$lastsp['freefee']){
				$datacom['fee']='0.00';
			}else{
				$datacom['fee']=$lastsp['fee'];
			}
			
			if($lastsp['issure']==1){
				$datacom['insure']=$cartgoods[0]['shopTotal']*$lastsp['insure']/100;
			}else{
				$datacom['insure']='0.00';
			}*/
			//应付款项
			//$datacom['sumfee']=$cartgoods[0]['shopTotal'];
			//$datacom['sumfee']=sprintf("%.2f",$datacom['sumfee']);
			
			//获得购物车里面的商品信息
			$cartgoods=$fbsi->checkGoodsIn($sessonid,$userid);
			//tpl页面填充款项信息
			//$smarty->assign("datacom",$datacom);
			//校币计算
			$schoolmoney=$cartgoods[0]['shopTotal'];
			$schoolmoney=sprintf("%d",$schoolmoney);
			//tpl页面填充购物车的商品信息
			$smarty->assign("cartgoods",$cartgoods);
			//tpl页面填充收货人信息
			$smarty->assign("cosignee",$cosignee);
			//tpl页面填充支付方式
			$smarty->assign("payment",$payment);
			//tpl页面填充配送方式
			//$smarty->assign("shipping",$shipping);
			//tpl页面填充发票内容
			//$smarty->assign("invcontent",$invcontent);
			//tpl页面填充上一次用户采用的支付和发票
			$smarty->assign("lastsp",$lastsp);
			//tpl页面填充校币
			$smarty->assign("schoolmoney",$schoolmoney);
			//确认订单
			$smarty->display("flow/ordercofirm.tpl");
		}
	}
}
//立刻购买
elseif ($act=='gbuy'){
	//没有登录，请登录
	if(empty($userid)){
		
	}else{
		$mknum1=$_REQUEST['mknum'];
		if(empty($mknum1)){
			$cartgoods=$_SESSION['gbuygoods'];
		}else{
			unset($_SESSION['gbuygoods']);
			//获得商品信息
			$goodsid=$_REQUEST['goodsid'];
			$shoppingtype=$_REQUEST['shoppingtype'];
			$goods=$gbsi->getAgoodsInfo($goodsid);
			$cartgoods[0]['goodsname']=$goods['goodsname'];
			$cartgoods[0]['shopid']=$goods['shopid'];
			$cartgoods[0]['goodsparamenter']=$goods['goodsparamenter'];
			$cartgoods[0]['newimg']=$goods['newimg'];
			$cartgoods[0]['marketprice']=$goods['marketprice'];
			$cartgoods[0]['shoppingprice']=$goods['shopprice'];
			$cartgoods[0]['shoppingnum']=$_REQUEST['mknum'];
			$cartgoods[0]['sumsmall']=$cartgoods[0]['shoppingprice']*$cartgoods[0]['shoppingnum'];
			$cartgoods[0]['sumsmall']=sprintf("%0.2f",$cartgoods[0]['sumsmall']);
			$cartgoods[0]['shopTotal']=$cartgoods[0]['sumsmall'];
			$cartgoods[0]['marketTotal']=$cartgoods[0]['marketprice']*$cartgoods[0]['shoppingnum'];
			$cartgoods[0]['marketTotal']=sprintf("%0.2f",$cartgoods[0]['marketTotal']);
			$cartgoods[0]['disMoney']=$cartgoods[0]['marketTotal']-$cartgoods[0]['shopTotal'];
			$cartgoods[0]['disMoney']=sprintf("%0.2f",$cartgoods[0]['disMoney']);
			$cartgoods[0]['rate']=($cartgoods[0]['disMoney']/$cartgoods[0]['marketTotal'])*100;
			$cartgoods[0]['rate']=sprintf("%0.2f",$cartgoods[0]['rate']);
			$cartgoods[0]['shoppingtype']=$shoppingtype;
			$cartgoods[0]['goodsid']=$goodsid;
			//放到session中
			$_SESSION['gbuygoods']=$cartgoods;
		}
		//收货人信息
		$cosignee=$fbsi->getCosignee($userid);
		//如果没有收货人信息
		if(empty($cosignee)){
			//获取国家信息
			$country_list=$fbsi->getRegion(0);
			//获取省份信息
			$province_list=$fbsi->getRegion(1);
			//获取市信息
			$city_list=$fbsi->getRegion(2);
			//获取区县信息
			$district_list=$fbsi->getRegion(3);
			//立刻购买
			$flag='gbuy';
			$smarty->assign("flag",$flag);
			$smarty->assign("country_list",$country_list);
			$smarty->assign("province_list",$province_list);
			$smarty->assign("city_list",$city_list);
			$smarty->assign("district_list",$district_list);
			//填写收货人信息
			$smarty->display("flow/consignee.tpl");
		}else{
			//获得支付方式
			$payment=$fbsi->getPayment();
			//获得上一次用户采用的支付和配送方式
			$lastsp=$fbsi->last_shipping_and_payment($userid);
			$smarty->assign("actgbuy",$act);
			$smarty->assign("shoppingtype",$cartgoods[0]['shoppingtype']);
			$smarty->assign("goodsid",$cartgoods[0]['goodsid']);
			//校币计算
			$schoolmoney=$cartgoods[0]['shopTotal'];
			$schoolmoney=sprintf("%d",$schoolmoney);
			//tpl页面填充购物车的商品信息
			$smarty->assign("cartgoods",$cartgoods);
			//tpl页面填充收货人信息
			$smarty->assign("cosignee",$cosignee);
			//tpl页面填充支付方式
			$smarty->assign("payment",$payment);
			//tpl页面填充配送方式
			//$smarty->assign("shipping",$shipping);
			//tpl页面填充发票内容
			//$smarty->assign("invcontent",$invcontent);
			//tpl页面填充上一次用户采用的支付和发票
			$smarty->assign("lastsp",$lastsp);
			//tpl页面填充校币
			$smarty->assign("schoolmoney",$schoolmoney);
			//确认订单
			$smarty->display("flow/ordercofirm.tpl");
		}
	}
}

//配送方式选择（AJAX）
/*elseif ($act=='shipping'){
	$shipid=$_REQUEST['shipid'];
	$issure=$_REQUEST['issure'];
	//用户选择的配送方式
	$selectShip=$fbsi->getSelectShipping($shipid);
	//获得购物车里面的商品信息
	$cartgoods=$fbsi->checkGoodsIn($sessonid);
	//邮费、保价费、应付款项的计算(初始化)
	$datacom=array();
	//邮费计算
	if($cartgoods[0]['shopTotal']>=$selectShip[0]['freefee']){
		$datacom['fee']='0.00';
	}else{
		$datacom['fee']=$selectShip[0]['fee'];
	}
	//保价费
	if($issure=='1'){
		$datacom['insure']=$cartgoods[0]['shopTotal']*$selectShip[0]['insure']/100;
	}else{
		$datacom['insure']='0.00';
	}
	//应付款项
	$datacom['sumfee']=$cartgoods[0]['shopTotal']+$datacom['fee']+$datacom['insure'];
	$datacom['sumfee']=sprintf("%.2f",$datacom['sumfee']);
	$result=$datacom['fee']."@".$datacom['insure']."@".$datacom['sumfee'];
	echo $result;
	exit;
}*/
//保存收货人信息
elseif ($act=='consignee'){
	$data=array();
	$data['idt_user']=$userid;
	$data['country']=$_POST['country'];
	$data['province']=$_POST['province'];
	$data['city']=$_POST['city'];
	$data['district']=$_POST['district'];
	$data['consignee']=trim($_POST['consignee']);
	$data['address']=trim($_POST['address']);
	$data['signbuilding']=trim($_POST['sign_building']);
	$data['email']=trim($_POST['email']);
	$data['zipcode']=trim($_POST['zipcode']);
	$data['tel']=trim($_POST['tel']);
	$data['mobile']=trim($_POST['mobile']);
	$data['isuse']=1;//启动该地址
	$data['besttime']=trim($_POST['best_time']);
	//判断用户是否有配送地址
	$ishas=$fbsi->isHasCosignee($userid);
	if(empty($ishas)){
		//添加收货人信息
		$fbsi->addCosignee($data);
	}else{
		//更新收货人信息
		$fbsi->updateCosignee($data);
	}
	$flag=$_REQUEST['flag'];
	if(empty($flag)){
		//去清算中心确认订单
		echo "<script>";
		echo "window.location.href='flow.php?act=checkout'";
		echo "</script>";
		echo exit;
	}elseif($flag=='exchange'){
		//去兑换清算中心确认订单(兑换)
		echo "<script>";
		echo "window.location.href='flow.php?act=exchangemk&flag=".$flag."'";
		echo "</script>";
		echo exit;
	}elseif($flag=='gbuy'){
		//去兑换清算中心确认订单(立刻购买)
		echo "<script>";
		echo "window.location.href='flow.php?act=gbuy&flag=".$flag."'";
		echo "</script>";
		echo exit;
	}
	
}
//修改收货人信息（查询）
elseif ($act=='consigneeQuery') {
	//收货人信息
	$cosignee=$fbsi->getCosignee($userid);
	//获取国家信息
	$country_list=$fbsi->getRegion(0);
	//获取省份信息
	$province_list=$fbsi->getRegion(1);
	//获取市信息
	$city_list=$fbsi->getRegion(2);
	//获取区县信息
	$district_list=$fbsi->getRegion(3);
	$flag=$_REQUEST['flag'];
	$smarty->assign("country_list",$country_list);
	$smarty->assign("province_list",$province_list);
	$smarty->assign("city_list",$city_list);
	$smarty->assign("district_list",$district_list);
	//tpl页面填充收货人信息
	$smarty->assign("cosignee",$cosignee);
	$smarty->assign("flag",$flag);
	//填写收货人信息
	$smarty->display("flow/consignee.tpl");
}
//校币兑换生成订单
elseif($act=='exchangeorder'){
	//购买类型(校币兑换)
	$flow_type=4;
	//获得兑换商品信息
	$goods=$_SESSION['exchgoods'];
	$goods['flow_type']=$flow_type;
	$goods['userid']=$userid;
	$goods['username']=$username;
	$goods['orderstatus']=0;//订单记录未确认
	$isupdate=0;
	//检查商品库存，下订单时减少库存 
	$goodsnum=$fbsi->getNum($goods['ID']);
	//购买量超出库存
	if($goods['mknum']>$goodsnum[0]){
		$goods['mknum']=$goodsnum[0];
		$isupdate=1;
		//兑换单件商品所需校币
		$scoins=$goods['exchangemoney'];
		$scoins=sprintf("%d",$scoins);
		$goods['mknum']=sprintf("%d",$goods['mknum']);
		$goods['sumcoins']=$goods['mknum']*$scoins;
	}
	//更新库存量和成交量
	$fbsi->updateNum($goods['ID'],$goods['mknum']);
	//获得用户收货地址
	$cosignee=$fbsi->getCosignee($userid);
	//获取新订单号
	$order_sn=$fbsi->get_order_sn();
	//订单号重复的话重新获得订单号
	$isexit=$fbsi->isOrdersnExit($order_sn);
	while(!empty($isexit)){
		$order_sn=$fbsi->get_order_sn();
	}
	//订单数据
	$order=array();
	$order['ordersn']=$order_sn;
	$order['idt_user']=$userid;
	//$order['orderstatus']=0;
	$order['paystatus']=2;
	//收货人信息
	$order['consignee']=$cosignee['consignee'];
	$order['country']=$cosignee['countryname'];
	$order['province']=$cosignee['provincename'];
	$order['city']=$cosignee['cityname'];
	$order['district']=$cosignee['districtname'];
	$order['address']=$cosignee['address'];
	$order['zipcode']=$cosignee['zipcode'];
	$order['tel']=$cosignee['tel'];
	$order['mobile']=$cosignee['mobile'];
	$order['email']=$cosignee['email'];
	$order['besttime']=$cosignee['besttime'];
	$order['signbuilding']=$cosignee['signbuilding'];
	
	//商品总金额
	$order['goodsamount']=0.00;
	//订单总金额
	$order['orderamount']=0.00;
	//订单折扣额
	$order['discount']=0.00;
	$order['schoolmoney']=-$goods['sumcoins'];
	//插入订单表
	$new_order_id=$fbsi->addExchOrderInfo($order);
	//商品小计
	$goods['singlsum']=0.00;
	//插入兑换商品到订单记录里面
	$fbsi->insertExchOrderRecord($new_order_id,$goods);
	//插入兑换记录
	$fbsi->insertExchRecord($goods);
	//扣除会员校币
	$fbsi->updateUserCoins($goods);
	// 清空session
	unset($_SESSION['exchgoods']);
	echo "<script language='javascript'>";
	echo "location='flow?act=exchangedone&oid=".$new_order_id."'";
	echo "</script>";
	
}
elseif($act=='exchangedone'){
	$oid=$_REQUEST['oid'];
	$order=$fbsi->getOrder($oid);
	//成功兑换的商品信息
	$sucgoods=$fbsi->getSucGoods($oid);
	//tpl页面填充订单信息
	$smarty->assign("order",$order[0]);
	//tpl页面填充成功购买商品
	$smarty->assign("sucgoods",$sucgoods[0]);
	//填写收货人信息
	$smarty->display("exchange/excorderdone.tpl");	
}
//生成订单
elseif ($act=='addorder') {
	//配送id
	//$shipping=$_POST['shipping'];
	//是否保价
	//$need_insure=$_POST['need_insure'];
	//支付ID
	$payment=$_POST['payment'];
	//是否需要发票
	//$need_inv=$_POST['need_inv'];
	//抬头(个人或单位)
	//$invpay=$_POST['invpay'];
	//发票单位
	//$invpayee=trim($_POST['invpayee']);
	//发票内容
	//$invcontent=$_POST['invcontent'];
	if(empty($actgbuy)){//走购物车的购物
		//购物车中的商品信息 
		$cartgoods=$fbsi->checkGoodsIn($sessonid,$userid);
		$isupdate=0;
		//检查商品库存，下订单时减少库存 
		for($i=0;$i<count($cartgoods);$i++){
			$goodsnum=$fbsi->getNum($cartgoods[$i]['goodsid']);
			//购买量超出库存
			if($cartgoods[$i]['shoppingnum']>$goodsnum[0]){
				//更新购物车
				$issuc=$fbsi->updateGoods($sessonid,$cartgoods[$i]['goodsid'],$goodsnum[0],$userid);
				$isupdate=1;
				//更新商品的库存量
				$fbsi->updateNum($cartgoods[$i]['goodsid'],$goodsnum[0]);
			}else{
				$fbsi->updateNum($cartgoods[$i]['goodsid'],$cartgoods[$i]['shoppingnum']);
			}	
		}
		if($isupdate==1){
			//订单中最终的商品信息（更新后的购物车）
			$cartgoods=$fbsi->checkGoodsIn($sessonid,$userid);
		}
	}elseif($actgbuy=='gbuy'){//立刻购买购物
		//立刻购买，从session取值。
		$cartgoods=$_SESSION['gbuygoods'];
		//获得库存
		$goodsnum=$fbsi->getNum($cartgoods[0]['goodsid']);
		if($cartgoods[0]['shoppingnum']>$goodsnum[0]){
				//更新购买量
				$cartgoods[0]['shoppingnum']=$goodsnum[0];
				$_SESSION['gbuygoods']=$cartgoods;
		}
		//更新商品的库存量
		$fbsi->updateNum($cartgoods[0]['goodsid'],$cartgoods[0]['shoppingnum']);	
	}
	//校币计算
	$schoolmoney=$cartgoods[0]['shopTotal'];
	$schoolmoney=sprintf("%d",$schoolmoney);
	//获得用户收货地址
	$cosignee=$fbsi->getCosignee($userid);
	//获得配送方式
	//$ship=$fbsi->getSelectShipping($shipping);
	//获得支付方式
	$pay=$fbsi->getSelectPayment($payment);
	//获取新订单号
	$order_sn=$fbsi->get_order_sn();
	//订单号重复的话重新获得订单号
	$isexit=$fbsi->isOrdersnExit($order_sn);
	while(!empty($isexit)){
		$order_sn=$fbsi->get_order_sn();
	}
	//订单数据
	$order=array();
	$order['ordersn']=$order_sn;
	$order['idt_user']=$userid;
	//$order['orderstatus']=0;
	if(empty($actgbuy)){//走购物车
		$order['idt_cart']=$cartgoods[0]['ID'];
	}
	//$order['shippingstatus']=0;
	$order['paystatus']=0;
	//收货人信息
	$order['consignee']=$cosignee['consignee'];
	$order['country']=$cosignee['countryname'];
	$order['province']=$cosignee['provincename'];
	$order['city']=$cosignee['cityname'];
	$order['district']=$cosignee['districtname'];
	$order['address']=$cosignee['address'];
	$order['zipcode']=$cosignee['zipcode'];
	$order['tel']=$cosignee['tel'];
	$order['mobile']=$cosignee['mobile'];
	$order['email']=$cosignee['email'];
	$order['besttime']=$cosignee['besttime'];
	$order['signbuilding']=$cosignee['signbuilding'];
	
	//配送信息
	//$order['shippingid']=$ship[0]['ID'];
	//$order['shippingname']=$ship[0]['shippingname'];
	//支付信息
	$order['payid']=$pay[0]['ID'];
	$order['paydesc']=$pay[0]['paydesc'];
	$order['payname']=$pay[0]['payname'];
	$order['schoolmoney']=$schoolmoney;
	//发票信息
	/*
	if($need_inv=='1'){
		$order['isinv']=1;
		if($invpay=='0'){
			$order['invpayee']=$username;
		}else{
			$order['invpayee']=$invpayee;//单位
		}
		$ainvcontent=$fbsi->getAInvcontent($invcontent);
		$order['invcID']=$invcontent;
		$order['invcontent']=$ainvcontent[0]['name'];
		$order['invtype']=$invpay;
	}else{
		$order['isinv']=0;
		$order['invpayee']='';
		$order['invcontent']='';
		$order['invtype']='';
	}*/
	//商品总金额
	$order['goodsamount']=$cartgoods[0]['shopTotal'];
	/*//计算邮费
	if($order['goodsamount']>=$ship[0]['freefee']){
		$order['shippingfee']='0.00';
	}else{
		$order['shippingfee']=$ship[0]['fee'];
	}
	//保价费
	if($need_insure=='1'){
		$order['insurefee']=$order['goodsamount']*$ship[0]['insure']/100;
	}else{
		$order['insurefee']='0.00';
	}
	$order['issure']=$need_insure;*/
	//订单总金额
	$order['orderamount']=$order['goodsamount'];
	//订单折扣额
	$order['discount']=$cartgoods[0]['disMoney'];
	//插入订单表
	$new_order_id=$fbsi->addOrderInfo($order);
	if(empty($actgbuy)){//走购物车
		//插入订单商品到订单记录里面
		$fbsi->insertOrderRecord($new_order_id,$sessonid,$userid);
		// 清空购物车（更新购物车中的标记位）
		$fbsi->updateCart($userid,$sessonid);
	}elseif ($actgbuy=='gbuy'){
		//插入订单商品到订单记录里面
		$fbsi->insertGbuyOrderRecord($new_order_id,$cartgoods[0]);
		// 清空session
		unset($_SESSION['gbuygoods']);
	}
	//插入支付日志信息（支付前）
	$dataorder=array();
	$dataorder['ordersn']=$order['ordersn'];
	$dataorder['orderamount']=$order['orderamount'];
	$dataorder['paytype']=0;//订单支付
	$dataorder['ispaid']=0;//未支付
    $fbsi->insertPayLog($dataorder);
    
    echo "<script language='javascript'>";
	echo "location='flow?act=done&oid=".$new_order_id."'";
	echo "</script>";
    //插入支付日志
	
}
//订单完成
elseif ($act=='done'){
	$oid=$_REQUEST['oid'];
	$order=$fbsi->getOrder($oid);
	//获得支付方式
	$pays=$fbsi->getSelectPayment($order[0]['payid']);
	//成功购买商品信息
	$sucgoods=$fbsi->getSucGoods($oid);
	//tpl页面填充订单信息
	$smarty->assign("order",$order[0]);
	//tpl页面填充支付详情
	//$smarty->assign("pay",$pays[0]);
	if($pays['0']['paycode']=='online'){
		$datat=array();
		$datat['oid']=$order[0]['ordersn'];
		$datat['transamt']=$order[0]['orderamount'];
		$pay=new payclass();
		/*include_once("netpayclient_config.php");
		//加载 netpayclient 组件
		include_once("netpayclient.php");
		//导入私钥文件, 返回值即为您的商户号，长度15位
		$merid = buildKey(PRI_KEY);
		if(!$merid) {
			echo "导入私钥文件失败！";
			exit;
		}
		//生成订单号，定长16位，任意数字组合，一天内不允许重复，本例采用当前时间戳，必填
		$ordid = $order[0]['ordersn'];
		$samt=$order[0]['orderamount'];
		//订单金额，定长12位，以分为单位，不足左补0，必填
		$transamt = padstr('1',12);
		//货币代码，3位，境内商户固定为156，表示人民币，必填
		$curyid = "156";
		//订单日期，本例采用当前日期，必填
		$transdate = date('Ymd');
		//交易类型，0001 表示支付交易，0002 表示退款交易
		$transtype = "0001";
		//接口版本号，境内支付为 20070129，必填
		$version = "20070129";
		//页面返回地址(您服务器上可访问的URL)，最长80位，当用户完成支付后，银行页面会自动跳转到该页面，并POST订单结果信息，可选
		$pagereturl = "$site_url/payback.php";
		//后台返回地址(您服务器上可访问的URL)，最长80位，当用户完成支付后，我方服务器会POST订单结果信息到该页面，必填
		$bgreturl = "$site_url/admin/payback.php";
	
		//页面返回地址和后台返回地址的区别：
		//后台返回从我方服务器发出，不受用户操作和浏览器的影响，从而保证交易结果的送达。
	
		//支付网关号，4位，上线时建议留空，以跳转到银行列表页面由用户自由选择，本示例选用0001农商行网关便于测试，可选
		$gateid = "0001";
		//备注，最长60位，交易成功后会原样返回，可用于额外的订单跟踪等，可选
		//$priv1 = "memo";
		//按次序组合订单信息为待签名串
		$plain = $merid . $ordid . $transamt . $curyid . $transdate . $transtype . $priv1;
		//生成签名值，必填
		$chkvalue = sign($plain);
		if (!$chkvalue) {
			echo "签名失败！";
			exit;
		}
		$def_url="<form action=".REQ_URL_PAY." method='post' target='_blank'>";
		$def_url.="<input type='hidden' name='MerId' value='".$merid."' />";	    	
    	$def_url.="<input type='hidden' name='Version' value='".$version."' />";
    	$def_url.="<input type='hidden' name='OrdId' value='".$ordid."' />";
    	$def_url.="<input type='hidden' name='TransAmt' value='".$transamt."' />";
    	$def_url.="<input type='hidden' name='CuryId' value='".$curyid."' />";
    	$def_url.="<input type='hidden' name='TransDate' value='".$transdate."' />";
    	$def_url.="<input type='hidden' name='TransType' value='".$transtype."' />";
    	$def_url.="<input type='hidden' name='BgRetUrl' value='".$bgreturl."' />";
    	$def_url.="<input type='hidden' name='PageRetUrl' value='".$pagereturl."' />";
    	$def_url.="<input type='hidden' name='GateId' value='".$gateid."' />";
    	$def_url.="<input type='hidden' name='Priv1' value='".$priv1."' />";
    	$def_url.="<input type='hidden' name='ChkValue' value='".$chkvalue."' />";
    	$def_url.="<input type='submit'  class='anniu10' value='去支付>>'/>";
    	$def_url.="</form>";
    	*/
		$def_url=$pay->getpayButton($datat);
		$smarty->assign("paybutton",$def_url);
	}
	//tpl页面填充成功购买商品
	$smarty->assign("sucgoods",$sucgoods);

	$smarty->display("flow/orderdone.tpl");
}



?>