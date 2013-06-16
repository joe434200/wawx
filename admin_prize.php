<?php
require_once('base.php');
require_once('BaseBusiness.php');
require_once('MininatureUtil.php');
require_once('AdminLotteryBusiness.php');
require_once('AdminPrizeBusiness.php');

$prizebusi = new AdminPrizeBusiness();


if ( $_REQUEST['act'] == 'list' ||empty($_REQUEST['act']))
{
	//echo "hello";
	$currpage = $_REQUEST['p'];
	if (empty($currpage))
	{
		$currpage = 1;
	}
	$inforlist = $prizebusi->getAllInfor($currpage,PAGE_NUMBER);//修改为自己的分页查询函数//frm
	$smarty->assign("pagecount",$prizebusi->getTotalPage());
	//echo "<pre>"; print_r($data);
	//----------------分页公共部分---------------------------
	$smarty->assign("allinfor",$inforlist);
	

	//---------公共部分，看看是否需要加入------------------
	$smarty->assign("url_here",$_TITLES['01_prize_list']['text']);//url_here不能更改
	//$smarty->assign("action_link",array($_TITLES['02_prize_add']));//action_link 不能更改，或者为action_link1
	$smarty->display("backstage/admin_prize_list.html");//html html得与目录对应
	
	
}

	



else if($_REQUEST['act'] == 'set')
{
	 
	$mid = $_REQUEST['id'];
	$smarty->assign("actid",$mid);
	$currpage = $_REQUEST['p'];//当然在我的商品设置页面中
	if (empty($currpage))
	{
		$currpage = 1;
	}
	$inforlist = $goodsbusi->getAllInfor($currpage,PAGE_NUMBER);//修改为自己的分页查询函数//frm

	$smarty->assign("pagecount",$goodsbusi->getTotalPage());
	//----------------分页公共部分---------------------------
	$smarty->assign("allinfor",$inforlist);
	
	//echo "<pre>"; print_r($data);

	//---------公共部分，看看是否需要加入------------------
	$smarty->display("backstage/admin_prize_set.html");//html html得与目录对应
	
}

else if ($_REQUEST['act'] == 'del')
{
	$mid = $_REQUEST['id'];//当前ID返回
	$prizebusi->deleteInfor($mid);
	echo "<script language='javascript'>";
	echo "location='admin_prize.php';";
	echo "</script>";
	
	
}
else if ($_REQUEST['act'] == 'submit')
{
	/*
	echo "<pre>";
	print_r("RANK:");
	print_r($_POST['rank']);
	print_r("ID:");
	print_r($_POST['goodsid']);
	print_r("NUM:");
	print_r($_POST['goodsnum']);
	print_r("ACTID:");
	print_r($_POST['actid']);
	exit;
	*/
	$rank = $_POST['rank'];
	$goodsid = $_POST['goodsid'];
	$goodsnum = $_POST['goodsnum'];
	$actid = $_POST['actid'];
	
	//count($goodsid)获取数组的长度
	foreach($goodsid as $key => $value)//二维数组value表示当前行地址,key表示第几行,使用方法：value['下标']；  一维数组value表示array[$key]，$key表示下标
	{
		$data['goodsid'] = $goodsid[$key];
		$data['idt_lottery_activity'] = $actid;
		$data['num'] = $goodsnum[$key];
		$data['rank'] = $rank[$key];
		$lotterybusi->Insert('t_prize_set', $data);//每遍历一次插一行记录(设置的活动抽奖的商品)
		
		//更新商品表里面商品的数量
		$lotterybusi->updateGoodsNum($goodsnum[$key],$goodsid[$key]);
	}
	
	echo "<script language='javascript'>";
	echo "location='admin_lottery.php';";
	echo "</script>";
	

}
