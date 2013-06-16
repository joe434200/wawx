<?php

require_once('base.php');
require_once('GroupBusiness.php');
require_once('SessionUtil.php');
require_once('ConstUtil.php');


$ID=$_REQUEST['ID'];  
$photoID=$_REQUEST['photoID']; 
$mem_ID = $_SESSION['baseinfo']['ID'];

$module=$_REQUEST['module'];

$groupbusi = new GroupBusiness();


$pagesize =21;
$page = $_REQUEST['page'];
IF(empty($page)||!isset($page)||$page == 1)  //如果page为空或者未1，则为首页
{
	$page =1;
}

IF(empty($photoID)||!isset($photoID))
{
	$rs = $groupbusi->getGroupMessage($ID);
	
	//图片分页数据
	$separatedata = $groupbusi->separatePage($ID,$page,$pagesize,"photo"); //提取当前页面的话题; //获取话题信息
	
	$checkIn = $groupbusi->checkIN($ID,$mem_ID);   //判断用户是否在圈子内
	
	$pageMessage = $groupbusi->getPageMessage($ID,$pagesize,$page,"photo"); //分页信息

	$newReply = $groupbusi->getReply(null,"newReply",4);  //获取最新的评论
	
	//echo "<pre>";
	//print_r($newReply);
	//exit;
	
	//$smarty->assign("type",$type);
	$pageTitle = "图片列表：".$rs['main']['groupname'];
	$smarty->assign("pageTitle",$pageTitle);
	$smarty->assign("checkIn",$checkIn);
	$smarty->assign("nowpage",$page);
	$smarty->assign("pageMessage",$pageMessage);
	$smarty->assign("separatedata",$separatedata);
	$smarty->assign("rs",$rs);
	$smarty->assign("newReply",$newReply);
	$smarty->display("group/grp_photo.tpl");
}
ELSEIF($module=="review")
{
	/*
	 * 图片评论
	 */
	$key = $_REQUEST['key'];

	/*
	 * 转码
	 */
	$htmlData = '';
	if (!empty($_POST['textarea'])) {
		if (get_magic_quotes_gpc()) {
			$htmlData = stripslashes($_POST['textarea']);
		} else {
			$htmlData = $_POST['textarea'];
		}
	}
	
	$replyType = $_REQUEST['replyType'];
	
	/*
	 * 一级回复
	 */
	if($replyType=="发表"||empty($replyType))
	{
		$data = array(
					"businessid"=>$photoID,
					"businesstype"=>8,
					"content"=>$htmlData,
					"creater"=>$_SESSION['baseinfo']['ID'],
					"createtime"=>date('YmdHis',time()),
					"shieldflg"=>0,
					"level"=>1,
					"idt_reply_parentid"=>0
					);
	}
	/*
	 * 二级回复
	 */
	else 
	{
		$data = array(
					"businessid"=>$photoID,
					"businesstype"=>8,
					"content"=>$htmlData,
					"creater"=>$_SESSION['baseinfo']['ID'],
					"createtime"=>date('YmdHis',time()),
					"shieldflg"=>0,
					"level"=>2,
					"idt_reply_parentid"=>$_REQUEST['replyID']
					);
	}
	//$groupbusi->updataNumber($ID,"photo");  //更新话题回复数目
	$groupbusi->createNewReply(1,$data,$photoID);
	
	echo "<script language='javascript'>";
	echo "location='grp_photo.php?ID=$ID&photoID=$photoID&key=$key#here';";
	echo "</script>";
}
ELSEIF($module=="nextPage")
{
	/*
	 * 下一页
	 */
	$key = $_REQUEST['key']; //当前图片是第key张图片
	
	//echo $key."         ";
	
	$number = $groupbusi->getNumber($ID,"photo");
	
	//echo "<pre>";
	//print_r($number);
	
	//echo $key;
	IF($key==$number[0])//如果当前图片是最后一张图片，下一张图片回到最开始
	{
		$key=0;
	
	}
	
	$photoID = $groupbusi->getPhotoPage($ID,$key,"photo"); //获取下一张图片的ID
	

	$key = $key+1;
	
	echo "<script language='javascript'>";
	echo "location='grp_photo.php?ID=$ID&photoID=$photoID&key=$key#here';";
	echo "</script>";
}
ELSEIF($module=="redel")
{
	/*
	 * 删除回复
	 */
	

	$key = $_REQUEST['key'];
	
	$reviewID=$_REQUEST['reviewID'];

	$data = array(
					"shieldflg"=>1
					);
	$groupbusi->setTopicTopOrDel("redel",$data,$reviewID); //删除该回复
	
	echo "<script language='javascript'>";
	echo "location='grp_photo.php?ID=$ID&photoID=$photoID&key=$key#here';";
	echo "</script>";
}
ELSE
{
	$repagesize =6;
	/*
	 * 单个图片详细
	 */
	$key = $_REQUEST['key'];//如果key为空
	
	//echo $key;
	if(empty($key)||!isset($key))
	{
		$key1 = $_REQUEST['key1'];
		$key2 = $_REQUEST['key2'];
		
		if(empty($key1)&&empty($key2)) // 如果key1和key2为空  从最新图片评论那里进入到单个图片
		{
			$key = $groupbusi->getPhotoKey($ID,$photoID);
		}
		else
		{
			$key = ($key2-1)*$pagesize+$key1;
		}
	}

	$rs = $groupbusi->getGroupMessage($ID);
	
	$photoMsg = $groupbusi->getReply($photoID,"photo");

	$ReplyMsg = $groupbusi->getReplyPageMessage($photoMsg['reply'],$repagesize, $page);
	
	$pageMessage = $groupbusi->getPageNumber($repagesize,count($photoMsg['reply']));
	
	$checkIn=$groupbusi->checkIN($ID, $mem_ID);
	
	$number = $groupbusi->getNumber($ID,"photo");
	
	$pageTitle = "图片：".$photoMsg['base']['oldname'];
	
	$smarty->assign("pageTitle",$pageTitle);
	$smarty->assign("checkIn",$checkIn);
	$smarty->assign("photonum",$number[0]);
	$smarty->assign("no",$key);
	$smarty->assign("rs",$rs);
	$smarty->assign("pageMessage",$pageMessage);
	$smarty->assign("ReplyMsg",$ReplyMsg);
	$smarty->assign("photoMsg",$photoMsg);
	$smarty->display("group/grp_single_photo.tpl");
}

?>