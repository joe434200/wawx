<?php
require_once('base.php');
require_once('BaseBusiness.php');
require_once('MininatureUtil.php');
require_once('GoodsBusiness.php');
$goodsbsi = new GoodsBusiness();//获得业务类对象
//商品id
$goodid=$_REQUEST['goodsid'];
//获取商品信息
$agoodsList = $goodsbsi->getAgoodsInfo($goodid);
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

$remain_time=$end_format-$nowtime;

$remain_day=floor($remain_time/(24*60*60));

$remain_hour=floor(($remain_time-$remain_day*24*60*60)/(60*60));

$remain_minute=floor(($remain_time-$remain_day*24*60*60-$remain_hour*60*60)/60);

$remain_second=floor($remain_time-$remain_day*24*60*60-$remain_hour*60*60-$remain_minute*60);

echo json_encode(array('day'=>$remain_day,'hour'=>$remain_hour,'minute'=>$remain_minute,'second'=>$remain_second,'$isin'=>$isin));
exit;

?>