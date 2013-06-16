<?php
include_once("netpayclient_config.php");
//加载 netpayclient 组件
include_once("netpayclient.php");
class payclass{
    function payclass()
    {
    }

    function __construct()
    {
        $this->payclass();
    }
    function getpayButton($data){
	    //导入私钥文件, 返回值即为您的商户号，长度15位
		$merid = buildKey(PRI_KEY);
		if(!$merid) {
			echo "导入私钥文件失败！";
			exit;
		}
		
		//生成订单号，定长16位，任意数字组合，一天内不允许重复，本例采用当前时间戳，必填
		$ordid = $data['oid'];
		$samt=$data['transamt'];
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
		$pagereturl = "http://localhost/myschool/payback.php";
		//后台返回地址(您服务器上可访问的URL)，最长80位，当用户完成支付后，我方服务器会POST订单结果信息到该页面，必填
		$bgreturl = "$site_url/admin/payback.php";
	
		/************************
		页面返回地址和后台返回地址的区别：
		后台返回从我方服务器发出，不受用户操作和浏览器的影响，从而保证交易结果的送达。
		************************/
		
		//支付网关号，4位，上线时建议留空，以跳转到银行列表页面由用户自由选择，本示例选用0001农商行网关便于测试，可选
		$gateid = "0001";
		//备注，最长60位，交易成功后会原样返回，可用于额外的订单跟踪等，可选
		$priv1 = "memo";
		
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
    	return $def_url;
    }
}
?>