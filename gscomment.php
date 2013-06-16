<?php
require_once('base.php');
require_once('BaseBusiness.php');
require_once('MininatureUtil.php');
require_once('GetGustInfo.php');
require_once('CommentBusiness.php');
//获得对象
$cmbs=new CommentBusiness();
//得到评论类型
$act=$_REQUEST['commenttype'];
//用户id
$userid=1;//以后从session获取
//用户姓名
$username='chenheng';//以后从session获取
//未登录
if(empty($userid)){
	echo "<script language='javascript'>";
	echo "alert('亲，请您登录！');";
	echo "location='login.php'";
	echo "</script>";	
}else{//登录
	//商品评论
	if($act=='goodscom'){
		$goodsid=$_POST['goodsid'];
		$comment=$_POST['comment'];
		$data=array();
		$data['idt_goods']=$goodsid;
		$data['content']=$comment;
		$data['idt_user']=$userid;
		$data['username']=$username;
		$data['isshow']=1;//需要管理员审核，所以不显示
		//一个用户同一天的评论次数
		$cnum=$cmbs->commentnumtoday($userid,'t_goods_comment');
		if($cnum[0]>=10){
			$data['schoolnum']=0;
		}else{
			$data['schoolnum']=1;//评论商品赢1校币，以后根据细则再改。
		}
		$data['userip']=GetGustInfo::Getip();
		//向评论表中追加一条评论
		$cmbs->insertgoodscom($data);
		//向领取校币表中插入数据
		if($cnum[0]<10){
				$data2=array();
				$data2['idt_user']=$userid;
				$data2['coins']=1;//以后再改
				$data2['type']=1;//评论
				$data2['getflg']=0;//未领取
				$cmbs->comShopgetcoins($data2);	
		}
		//审核后商品表中对应商品的评论次数加1
		$cmbs->gcommentnumadd($goodsid);
		//跳转商品详情画面
		echo "<script language='javascript'>";
		echo "location='goods.php?goodsid=".$goodsid."'";
		echo "</script>";
	}
	//店铺评论
	elseif($act=='shopcom'){		
		$shopid=$_POST['shopid'];
		$data=array();
		$data['idt_shopinfo']=$shopid;
		$data['username']=$username;
		$data['content']=$_POST['content'];
		//总体评价
		$data['commentrank']=$_POST['commentTotal'];
		$data['service']=$_POST['service'];
		$data['taste']=$_POST['taste'];
		$data['environment']=$_POST['environment'];
		$data['costperformance']=$_POST['costperformance'];
		$data['userip']=GetGustInfo::Getip();
		$data['isshow']=1;//需要管理员审核，所以不显示
		//一个用户同一天的评论次数
		$cnum=$cmbs->commentnumtoday($userid,'t_shop_comment');
		if($cnum[0]>=10){
			$data['schoolnum']=0;
		}else{
			$data['schoolnum']=1;//评论店铺赢1校币，以后根据细则再改。
		}
		$data['idt_user']=$userid;
		//向店铺评论表中追加一条评论
		$cmbs->insertshopcom($data);
		//向领取校币表中插入数据
		if($cnum[0]<10){
				$data2=array();
				$data2['idt_user']=$userid;
				$data2['coins']=1;//以后再改
				$data2['type']=1;//评论
				$data2['getflg']=0;//未领取
				$cmbs->comShopgetcoins($data2);	
		}
		//审核后店铺表中对应店铺的评论次数加1
		$cmbs->scommentnumadd($shopid);
		//跳转店铺详情画面
		echo "<script language='javascript'>";
		echo "location='shop.php?shopid=".$shopid."'";
		echo "</script>";
	}
}
?>