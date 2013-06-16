<?php

require_once('base.php');
require_once('GroupBusiness.php');
require_once('SessionUtil.php');
require_once('ConstUtil.php');


$groupbusi = new GroupBusiness();

$topicID=$_REQUEST['topicID'];  
$ID =$_REQUEST['ID'];
$mem_ID = $_SESSION['baseinfo']['ID'];
$module = $_REQUEST['module'];

$pagesize =14;
$page = $_REQUEST['page'];


IF(empty($page)||!isset($page)||$page == 1)  //如果page为空或者未1，则为首页
{
	$page =1;
}

IF(empty($module)||!isset($module))  //进入圈子话题列表
{

	$type = $_REQUEST['type'];
	
	$catalog = $_REQUEST['catalog'];
	
	IF(empty($catalog)||$catalog==0)
	{
		$catalog = null;
	}
	
	$rs = $groupbusi->getGroupMessage($ID,null,"member",null);

	/*
	 * 如果是按照回复数排列
	 */
	if($type =="reply")
	{
		$separatedata = $groupbusi->separatePage($ID,$page,$pagesize,"topic","reply"); //提取当前页面的话题 //获取话题信息
	}
	/*
	 * 如果是按照浏览数排列
	 */
	elseif($type=="browse")
	{
		$separatedata = $groupbusi->separatePage($ID,$page,$pagesize,"topic","browse"); //提取当前页面的话题 //获取话题信息
	}
	/*
	 * 默认方式排列（时间顺序）
	 */
	else 
	{	
		$separatedata = $groupbusi->separatePage($ID,$page,$pagesize,"topic",null,$catalog); //提取当前页面的话题; //获取话题信息
	}
	
	$checkIn = $groupbusi->checkIN($ID,$mem_ID);   //判断用户是否在圈子内
	
	
	if($catalog==null)
	{	
		$pageMessage = $groupbusi->getPageMessage($ID,$pagesize,null,"topic"); //分页信息
	}
	else 
	{
		$pageMessage = $groupbusi->getPageMessage($ID,$pagesize,null,"topic","catalog",$catalog); //分页信息
	}
	
	$topictype = $groupbusi->getTopicType();

	$pageTitle = "话题列表：".$rs['main']['groupname'];
	
	$otherGrp = $groupbusi->getOtherGroup();
	
	$smarty->assign("otherGrp",$otherGrp);
	
	$smarty->assign("pageTitle",$pageTitle);
	$smarty->assign("catalog",$catalog);
	$smarty->assign("topictype",$topictype);
	$smarty->assign("type",$type);
	$smarty->assign("pageMessage",$pageMessage);
	$smarty->assign("separatedata",$separatedata);
	$smarty->assign("checkIn",$checkIn);
	$smarty->assign("rs",$rs);
	$smarty->display("group/grp_topic.tpl");
}
ELSEIF($module=="new")
{
	/*
	 * 发贴
	 */
	$type = $groupbusi->getTopicType();

	$smarty->assign("ID",$ID);
	$smarty->assign("type",$type);
	$smarty->display("group/grp_new_topic.tpl");
}
ELSEIF($module == "success")
{
	/*
	 * 发帖成功
	 */
	$htmlData = '';
	if (!empty($_POST['textarea'])) {
		if (get_magic_quotes_gpc()) {
			$htmlData = stripslashes($_POST['textarea']);
		} else {
			$htmlData = $_POST['textarea'];
		}
	}
	
	$data = array(
				"idm_grptopic_catalog"=>$_REQUEST['type'],
				"title"=>$_REQUEST['text1'],
				"content"=>$htmlData,
				"labels"=>$_REQUEST['text3'],
				"idt_grp_main"=>$ID,
				"creater"=>$_SESSION['baseinfo']['ID'],
				"createtime"=>date('YmdHis',time()),
				"replynum"=>0,
				"browsenum"=>0,
				"excelflg"=>0,
				"shieldflg"=>0,
				"topflg"=>0
				);

				/*
				 * 更新话题数
				 */
	$groupbusi->updataNumber($ID,"topic");
	$groupbusi->createNewTopic($data,$ID);
	
	echo "<script language='javascript'>";
	echo "location='grp_topic.php?ID=$ID';";
	echo "</script>";
	

}
ELSEIF($module=="review")
{
	/*
	 * 回复帖子
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
					"businessid"=>$topicID,
					"businesstype"=>1,
					"content"=>$htmlData,
					"creater"=>$_SESSION['baseinfo']['ID'],
					"createtime"=>date('YmdHis',time()),
					"shieldflg"=>0,
					"level"=>1,
					"idt_reply_parentid"=>0
					);
					
		$groupbusi->updataNumber($topicID,"topic","reply");  //更新话题回复数目
	}
	/*
	 * 二级回复
	 */
	elseif($replyType=="回复")
	{
		$data = array(
					"businessid"=>$topicID,
					"businesstype"=>1,
					"content"=>$htmlData,
					"creater"=>$_SESSION['baseinfo']['ID'],
					"createtime"=>date('YmdHis',time()),
					"shieldflg"=>0,
					"level"=>2,
					"idt_reply_parentid"=>$_REQUEST['replyID']
					);
	}
	
	$groupbusi->createNewReply(1,$data,$topicID);
	
	echo "<script language='javascript'>";
	echo "location='grp_topic.php?module=scan&ID=$ID&topicID=$topicID';";
	echo "</script>";
	
}
ELSEIF($module=="scan")   //浏览话题
{

	$pagesize = 10;
	
	$rs = $groupbusi->getGroupMessage($ID,"topic",null,null,"HOME"); //获取话题信息
	
	$groupbusi->updataNumber($topicID,"topic","browse");  //更新话题浏览数目
	
	$topic = $groupbusi->getReply($topicID, "topic",0);
	
	$ReplyMsg = $groupbusi->getReplyPageMessage($topic['reply'],$pagesize, $page);
	
	$pageMessage = $groupbusi->getPageNumber($pagesize,count($topic['reply']));
	
	$checkIn = $groupbusi->checkIN($ID, $mem_ID);  //等于3则在圈子里
	
	$power = $groupbusi->getAdminPower($ID,$mem_ID);
	
	$pageTitle = "话题：".$topic['base']['title'];
	$smarty->assign("pageTitle",$pageTitle);
	
	$smarty->assign("pageMessage",$pageMessage);
	$smarty->assign("checkIn",$checkIn);
	$smarty->assign("power",$power);
	$smarty->assign("ReplyMsg",$ReplyMsg);
	$smarty->assign("rs",$rs);
	$smarty->assign("topic",$topic);
	$smarty->display("group/grp_review.tpl");
	
}
ELSEIF($module=="top")
{
	/*
	 * 设置置顶
	 */
	$data = array(
				"topflg"=>1
				);
	$groupbusi->setTopicTopOrDel("top",$data,$topicID);		
	
	echo "<script language='javascript'>";
	echo "location='grp_topic.php?module=scan&ID=$ID&topicID=$topicID';";
	echo "</script>";
}
ELSEIF($module=="canceltop")
{
	/*
	 * 取消置顶
	 */
	$data = array(
				"topflg"=>0
				);
	$groupbusi->setTopicTopOrDel("canceltop",$data,$topicID);
				
	echo "<script language='javascript'>";
	echo "location='grp_topic.php?module=scan&ID=$ID&topicID=$topicID';";
	echo "</script>";
}
ELSEIF($module=="del")
{
	/*
	 * 删除帖子
	 */
	$data = array(
				"shieldflg"=>1
				);
	$groupbusi->setTopicTopOrDel("del",$data,$topicID);
	$groupbusi->updataNumber($ID,"topic",null,"exit");
	
	echo "<script language='javascript'>";
	echo "location='grp_topic.php?ID=$ID';";
	echo "</script>";
}
ELSEIF($module=="redel")
{
	/*
	 * 删除回复
	 */
	$reviewID=$_REQUEST['reviewID'];
	$deltype=$_REQUEST['type'];
	
	$data = array(
					"shieldflg"=>1
					);
		$groupbusi->setTopicTopOrDel("redel",$data,$reviewID);
	if($deltype=="reply")
	{}
	else 
	{
		$groupbusi->updataNumber($topicID,"topic","reply","exit");
	}
		
	echo "<script language='javascript'>";
	echo "location='grp_topic.php?module=scan&ID=$ID&topicID=$topicID';";
	echo "</script>";
}


//$smarty->display("group/grp_single_home.tpl");

?>