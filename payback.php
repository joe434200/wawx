<?php
	header('Content-type: text/html; charset=utf-8');
	include_once("netpayclient_config.php");
?>
<?php
	//加载 netpayclient 组件
	include_once("netpayclient.php");
	require_once('base.php');
	require_once('BaseBusiness.php');
	require_once('MininatureUtil.php');
	include_once('FlowBusiness.php');
	//创建对象
	$fbsi=new FlowBusiness();
	//导入公钥文件
	$flag = buildKey(PUB_KEY);
	if(!$flag) {
		echo "导入公钥文件失败！";
		exit;
	}
	//获取交易应答的各项值
	$merid = $_REQUEST["merid"];
	$orderno = $_REQUEST["orderno"];
	$transdate = $_REQUEST["transdate"];
	$amount = $_REQUEST["amount"];
	$currencycode = $_REQUEST["currencycode"];
	$transtype = $_REQUEST["transtype"];
	$status = $_REQUEST["status"];
	$checkvalue = $_REQUEST["checkvalue"];
	$gateId = $_REQUEST["GateId"];
	$priv1 = $_REQUEST["Priv1"];
	//验证签名值，true 表示验证通过
	$flag = verifyTransResponse($merid, $orderno, $amount, $currencycode, $transdate, $transtype, $status, $checkvalue);
	if(!$flag) {
		echo "<h2>验证签名失败！</h2>";
		exit;
	}
	//交易状态为1001表示交易成功，其他为各类错误，如卡内余额不足等
	if ($status == '1001'){
		$data=array();
		$data['ispaid']=1;
		$data['paystatus']=2;
		$data['ordersn']=$orderno;
		//更新订单状态
		$fbsi->updateOrderInfo($data);
		//更新支付日志
		$fbsi->updatePayLog($data);
		//注意：如果您在提交时同时填写了页面返回地址和后台返回地址，且地址相同，请在这里先做一次数据库查询判断订单状态，以防止重复处理该笔订单
		//去兑换清算中心确认订单
		echo "<script>";
		echo "window.location.href='index.php'";
		echo "</script>";
		echo exit;
	} else {
		echo "<h3>交易失败！</h3>";
	}
?>
