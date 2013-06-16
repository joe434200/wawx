<?php
require_once('base.php');
require_once('BaseBusiness.php');
require_once('MininatureUtil.php');
require_once('FocusAndRecomBusiness.php');

//获得对象
$frbs=new FocusAndRecomBusiness();
//得到操作类型
$act=$_REQUEST['acttype'];
//用户id
$userid=1;//以后从session获取
//用户姓名
$username=chenheng;//以后从session获取
//未登录
if(empty($userid)){
	echo "login";
	exit;
}else{//登录
	//店铺关注
	if($act=='focus'){
		//获得店铺id
		$shopid=$_REQUEST['shopid'];
		$isfocus=$frbs->isUserFocusShop($shopid,$userid);
		if(!empty($isfocus)){
			//已关注
			echo "true";
			exit;
			
		}else{
			//店铺关注表中增加1条关注记录
			$frbs->insertShopFocus($shopid,$userid);
			//对应店铺的关注次数加1
			$frbs->focusnumadd($shopid);
			//成功关注
			echo "false";
			exit;
		}
	}
	//店铺推荐给社区朋友
	elseif($act=='shiprecom'){
		$shopid=$_REQUEST['shopid'];
		$isrecoms=$frbs->isUserRecomShop($shopid,$userid,"0");
		if(!empty($isrecoms)){
			//已推荐
			echo "true";
			exit;
		}else{
			$shopname=$_REQUEST['shopname'];
			$data=array();
			//给朋友发消息，对朋友来说是收消息
			$data['senderid']=$userid;
			$data['content']="您的朋友".$username."向您推荐了店铺：".$shopname."，赶快去看看吧！";
			$data['title']="店铺：".$shopname."很不错";
			$data['type']=3;//推荐商家
			$data['garbageflg']=0;//不是垃圾箱
			$data['sendflg']=0;//不是发件箱
			$data['receiveflg']=1;//是收件箱
			$data['readflg']=0;//没读标志
			$data['shopid']=$shopid;
			//向消息表中追加记录（发给朋友）
			$result=$frbs->recomShopInsertMess($data,"0");
			//已发送消息（自己）
			$data1=array();
			$data1['senderid']=$userid;
			$data1['recriverid']=$userid;
			$data1['content']="我向朋友推荐了店铺：".$shopname;
			$data1['title']="店铺：".$shopname."很不错";
			$data1['type']=3;//推荐商家
			$data1['garbageflg']=0;//不是垃圾箱
			$data1['sendflg']=1;//不是发件箱
			$data1['receiveflg']=0;//是收件箱
			$data1['readflg']=0;//没读标志
			$data1['shopid']=$shopid;
			//成功追加消息
			if(!empty($result)){
				//消息表中追加一条信息（自己已发送消息）
				$result1=$frbs->InsertmyMess($data1,"0");
				$snum=$frbs->recNumShop($userid,'3');
				if($snum[0]<10){
					//推荐赢校币
					$data2=array();
					$data2['idt_user']=$userid;
					$data2['coins']=1;//以后再改
					$data2['type']=3;//推荐商家
					$data2['getflg']=0;//未领取
					$frbs->recomShopgetcoins($data2);
				}
				//成功推荐
				echo "false";
				exit;
			}else{
				//没有朋友时追加不成
				echo "nofriend";
				exit;
			}
			
		}
	}
	//商品推荐给社区朋友
	elseif($act=='goodsrecom'){
		$goodsid=$_REQUEST['goodsid'];
		$isrecomg=$frbs->isUserRecomShop($goodsid,$userid,"1");
		if(!empty($isrecomg)){
			//已推荐
			echo "true";
			exit;
		}else{
			$goodsname=$_REQUEST['goodsname'];
			//给朋友发消息，对朋友来说是收消息
			$data=array();
			$data['senderid']=$userid;
			$data['content']="您的朋友".$username."向您推荐了商品：".$goodsname."，赶快去看看吧！";
			$data['title']="商品：".$goodsname."很不错";
			$data['type']=4;//推荐商家
			$data['garbageflg']=0;//不是垃圾箱
			$data['sendflg']=0;//不是发件箱
			$data['receiveflg']=1;//是收件箱
			$data['readflg']=0;//没读标志
			$data['goodsid']=$goodsid;
			//向消息表中追加记录（发给朋友）
			$result=$frbs->recomShopInsertMess($data,"1");
			//已发送消息（自己）
			$data1=array();
			$data1['senderid']=$userid;
			$data1['recriverid']=$userid;
			$data1['content']="我向朋友推荐了商品：".$goodsname;
			$data1['title']="商品：".$goodsname."很不错";
			$data1['type']=3;//推荐商家
			$data1['garbageflg']=0;//不是垃圾箱
			$data1['sendflg']=1;//不是发件箱
			$data1['receiveflg']=0;//是收件箱
			$data1['readflg']=0;//没读标志
			$data1['goodsid']=$goodsid;
			//成功追加消息
			if(!empty($result)){
				//消息表中追加一条信息（自己已发送消息）
				$result1=$frbs->InsertmyMess($data1,"1");
				$snum=$frbs->recNumShop($userid,'4');
				if($snum[0]<10){
					//推荐赢校币
					$data2=array();
					$data2['idt_user']=$userid;
					$data2['coins']=1;//以后再改
					$data2['type']=4;//推荐商品
					$data2['getflg']=0;//未领取
					$frbs->recomShopgetcoins($data2);
				}
				//成功推荐
				echo "false";
				exit;
			}else{
				//没有朋友时追加不成
				echo "nofriend";
				exit;
			}
			
		}		
	}
	elseif ($act=='delete')	{
		$data3=array();
		$data3['goodsid']=$_REQUEST['goodsid'];
		$data3['userid']=$_REQUEST['userid'];
		$frbs->deletecoll($data3);
		echo "true";
		exit;
	}
}





?>