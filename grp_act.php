<?php

require_once('base.php');
require_once('GroupBusiness.php');
require_once('SessionUtil.php');
require_once('ConstUtil.php');


$ID=$_REQUEST['ID'];   //圈子ID
$module = $_REQUEST['module']; 
$mem_ID = $_SESSION['baseinfo']['ID']; //当前登陆者ID
$actID = $_REQUEST['actID']; //活动ID
$type = $_REQUEST['type'];  //排序类型或者是评论类型
$photoID = $_REQUEST['photoID']; //活动图片ID

$pagesize =7;  //每页数据量
$page = $_REQUEST['page'];  //分页页数

$groupbusi = new GroupBusiness();

IF(empty($page)||!isset($page)||$page == 1)  //如果page为空或者未1，则为首页
{
	$page =1;
}

IF(empty($module)||!isset($module))  //进入活动列表
{
	$catalog = $_REQUEST['catalog'];    //活动类型（线上，同城）
	$rs = $groupbusi->getGroupMessage($ID);  //获取圈子基本信息

	IF(empty($catalog)||$catalog==0)
	{
		$catalog = null;
	}
	
	if($type =="attention") //按照关注度排序
	{
		$separatedata = $groupbusi->separatePage($ID,$page,$pagesize,"activity","attention"); //提取当前页面的话题 //获取话题信息
	}
	elseif($type=="member") //按照成员数排序
	{
		$separatedata = $groupbusi->separatePage($ID,$page,$pagesize,"activity","member"); //提取当前页面的话题 //获取话题信息
	}
	else  //默认排序（时间排序）
	{	
		$separatedata = $groupbusi->separatePage($ID,$page,$pagesize,"activity",null,$catalog); //提取当前页面的话题; //获取话题信息
	}
	
	$checkIn = $groupbusi->checkIN($ID,$mem_ID);   //判断用户是否在圈子内
	
	$pageMessage = $groupbusi->getPageMessage($ID,$pagesize,$page,"act","catalog",$catalog); //分页信息

	$acttype  = $groupbusi->getActType();  //获取活动的类型

	$pageTitle = "活动列表：".$rs['main']['groupname']; //活动列表的PageTitle
	$smarty->assign("pageTitle",$pageTitle);
	
	$hotact =$groupbusi->getHotAct();
	
	$smarty->assign("hotact",$hotact);
	$smarty->assign("catalog",$catalog);
	$smarty->assign("acttype",$acttype);
	$smarty->assign("type",$type);
	$smarty->assign("pageMessage",$pageMessage);
	$smarty->assign("separatedata",$separatedata);
	$smarty->assign("checkIn",$checkIn);
	$smarty->assign("rs",$rs);
	$smarty->display("group/grp_list_act.tpl");
}
ELSEIF($module=="single")   
{	
	/*
	 * 进入单个活动
	 */
	$rs = $groupbusi->getGroupMessage($ID); //圈子的基本信息
	
	/*
	 * 单个活动的所有信息
	 */
	$actMsg = $groupbusi->getSingelAct($ID,$actID);
	
	$checkIn = $groupbusi->checkInAct($actID, $mem_ID); //是否加入了活动 未加入活动不能评论和上传图片
		
	$checkInGrp = $groupbusi->checkIN($ID, $mem_ID); //是否加入了圈子 未加入圈子不能评论和上传图片
	
	/*
	 * 判断该活动是否开始或者过期，否则不能关注和加入活动
	 */
	$actMsg['main'] = $groupbusi->checkDateOver($actMsg['main'],0); 
	
	/*
	 * 判断当前登录者的类型，管理员，创建者还是普通成员
	 */
	$power = $groupbusi->getAdminPower($ID,$mem_ID);

	$pageTitle = "活动：".$actMsg['main']['actname'];
	$smarty->assign("pageTitle",$pageTitle); //活动的PageTitle
	
	$hotact =$groupbusi->getHotAct();
	
	$smarty->assign("hotact",$hotact);
	$smarty->assign("power",$power);
	$smarty->assign("checkInGrp",$checkInGrp);
	$smarty->assign("checkIn",$checkIn);
	$smarty->assign("actMsg",$actMsg);
	$smarty->assign("rs",$rs);
	$smarty->display("group/grp_single_act.tpl");
}
ELSEIF($module=="in")  
{
	/*
	 * 加入该活动
	 */
	$rs = $groupbusi->updataNumber($actID,"act","in");
	$rs = $groupbusi->actNewMember("in", $actID, $mem_ID,date('YmdHis',time()));
	
	echo "<script language='javascript'>";
	echo "alert('您已经成功参加该活动');";
	echo "location='grp_act.php?module=single&ID=$ID&actID=$actID';";
	echo "</script>";
	
}
ELSEIF($module=="attention") //关注该活动
{
	/*
	 * 关注该活动
	 */
	$rs = $groupbusi->updataNumber($actID,"act","attention");
	$rs = $groupbusi->actNewMember("attention", $actID, $mem_ID,date('YmdHis',time()));
	
	echo "<script language='javascript'>";
	echo "alert('您已经成功关注该活动');";
	echo "location='grp_act.php?module=single&ID=$ID&actID=$actID';";
	echo "</script>";
}
ELSEIF($module=="review")  //活动和图片评论
{
	
	/*
	 * 评论活动或者评论活动图片
	 */
	
	//将html代码转化
	$htmlData = '';
	if (!empty($_POST['textarea'])) {
		if (get_magic_quotes_gpc()) {
			$htmlData = stripslashes($_POST['textarea']);
		} else {
			$htmlData = $_POST['textarea'];
		}
	}

	
	//获取回复级别，是一级回复还是二级回复
	$replyType = $_REQUEST['replyType'];
	
	
	
	IF($type=="photo")  //图片评论
	{
		$key = $_REQUEST['key']; //获取该图片是第几张图片
		
			/*
			 * 如果是发表，一级回复 ，评论数增加1
			 */
			if($replyType=="发表"||empty($replyType))
			{
				$data = array(
							"businessid"=>$photoID,
							"businesstype"=>7,
							"content"=>$htmlData,
							"creater"=>$_SESSION['baseinfo']['ID'],
							"createtime"=>date('YmdHis',time()),
							"shieldflg"=>0,
							"level"=>1,
							"idt_reply_parentid"=>0
							);
			}
		   /*
		    * 如果是回复，二级回复，评论数不增加
		    */
			elseif($replyType=="回复")
			{
				$data = array(
							"businessid"=>$photoID,
							"businesstype"=>7,
							"content"=>$htmlData,
							"creater"=>$_SESSION['baseinfo']['ID'],
							"createtime"=>date('YmdHis',time()),
							"shieldflg"=>0,
							"level"=>2,
							"idt_reply_parentid"=>$_REQUEST['replyID']
							);
			}
			//新建回复
			$groupbusi->createNewReply(1,$data,$actID);
		
		echo "<script language='javascript'>";
		echo "location='grp_act.php?module=singlephoto&ID=$ID&actID=$actID&photoID=$photoID&key=$key#here';";
		echo "</script>";
	}
	else  //活动评论
	{
		
		/*
			 * 如果是发表，一级回复 ，评论数增加1
			 */
		if($replyType=="发表"||empty($replyType))
		{
			$data = array(
						"businessid"=>$actID,
						"businesstype"=>2,
						"content"=>$htmlData,
						"creater"=>$_SESSION['baseinfo']['ID'],
						"createtime"=>date('YmdHis',time()),
						"shieldflg"=>0,
						"level"=>1,
						"idt_reply_parentid"=>0
						);
			//一级回复活动评论数+1		
			$rs = $groupbusi->updataNumber($actID,"act","reply");	
		}
		
		 /*
		    * 如果是回复，二级回复，评论数不增加
		    */
		elseif($replyType=="回复")
		{
			$data = array(
						"businessid"=>$actID,
						"businesstype"=>2,
						"content"=>$htmlData,
						"creater"=>$_SESSION['baseinfo']['ID'],
						"createtime"=>date('YmdHis',time()),
						"shieldflg"=>0,
						"level"=>2,
						"idt_reply_parentid"=>$_REQUEST['replyID']
						);
		}

		
		$groupbusi->createNewReply(1,$data,$actID);
		
		
		/*
		 * 这段代码留着，可能维护是会用到，活动首页回复
		 */
		echo "<script language='javascript'>";
		IF($type=="home")
		{
			echo "location='grp_act.php?module=single&ID=$ID&actID=$actID';";
		}
		else 
		{
			echo "location='grp_act.php?module=reply&ID=$ID}&actID=$actID';";
		}
		echo "</script>";
	}
}
ELSEIF($module=="member")  
{
	/*
	 * 活动成员
	 */
	$pagesize =12;
	
	$rs = $groupbusi->getGroupMessage($ID);
	
	$separatedata = $groupbusi->separatePage($actID,$page,$pagesize,"singleAct","member");
	
	$pageMessage = $groupbusi->getPageMessage($actID,$pagesize,$page,"act","in"); //分页信息
	
	$number = $groupbusi->getNumber($actID,"act","in");
	
	$pageTitle = "活动成员：";
	$smarty->assign("pageTitle",$pageTitle);
	
	
	
	//echo "<pre>";
	//print_r($separatedata);
	$smarty->assign("actID",$actID);
	$smarty->assign("number",$number);
	$smarty->assign("pageMessage",$pageMessage);
	$smarty->assign("separatedata",$separatedata);
	$smarty->assign("rs",$rs);
	$smarty->display("group/grp_act_member.tpl");
}
ELSEIF($module=="photo")   //进入活动图片list页
{

	/*
	 * 活动图片列表
	 */
	$pagesize =21;
	
	$rs = $groupbusi->getGroupMessage($ID);  //圈子基本信息
	
	/*
	 * 分页数据
	 */
	$separatedata = $groupbusi->separatePage($actID,$page,$pagesize,"singleAct","photo");
	
	$number = $groupbusi->getNumber($actID,"act","photo");  //获取活动图片数目
	
	$pageMessage = $groupbusi->getPageNumber($pagesize,$number[0]); //分页信息
	
	$newReply = $groupbusi->getReply(null,"actNewRe",4);
	
	/*echo "<pre>";
	print_r($newReply);
	print_r($separatedata);
	exit;*/
	$pageTitle = "活动图片：";
	$smarty->assign("pageTitle",$pageTitle);
	$smarty->assign("page",$page);
	$smarty->assign("actID",$actID);
	$smarty->assign("number",$number);
	$smarty->assign("pageMessage",$pageMessage);
	$smarty->assign("newReply",$newReply);
	$smarty->assign("separatedata",$separatedata);
	$smarty->assign("rs",$rs);
	$smarty->display("group/grp_act_photo.tpl");
}
ELSEIF($module=="singlephoto")   //活动单个图片页面
{
	/*
	 * 单个活动图片的页面
	 */
	$repagesize = 10;
	$key = $_REQUEST['key'];  //获取当前图片是第几张图片，key值就是当前页面的编号

	//echo $key;
	if(empty($key)||!isset($key))  //如果key值为空
	{
		$key1 = $_REQUEST['key1']; //key1是页数
		$key2 = $_REQUEST['key2']; //key2是当前页的第几张图片
		if(empty($key1)&&empty($key2)) // 如果key1和key2为空  从最新图片评论那里进入到单个图片
		{
			$key = $groupbusi->getPhotoKey($actID,$photoID,"actphoto");
		}
		else
		{
			$key = ($key2-1)*$pagesize+$key1;
		}
	}

	//echo $key;
	$rs = $groupbusi->getGroupMessage($ID); 
	$photoMsg = $groupbusi->getReply($photoID,"photoReply");   //获取回复
	
	$ReplyMsg = $groupbusi->getReplyPageMessage($photoMsg['reply'],$repagesize, $page);
	
	$pageMessage = $groupbusi->getPageNumber($repagesize,count($photoMsg['reply']));
	
	$pageTitle = "活动图片：".$photoMsg['base']['oldname'];
	
	
	$smarty->assign("pageTitle",$pageTitle);
	$smarty->assign("no",$key);
	$smarty->assign("actID",$actID);
	$smarty->assign("rs",$rs);
	$smarty->assign("ReplyMsg",$ReplyMsg);
	$smarty->assign("pageMessage",$pageMessage);
	$smarty->assign("photoMsg",$photoMsg);
	$smarty->display("group/grp_act_single_photo.tpl");
}
ELSEIF($module=="nextPage")
{
	/*
	 * 下一页代码
	 */
	$key = $_REQUEST['key'];
	
	$number = $groupbusi->getNumber($actID,"act","photo"); //获取该活动图片数
	
	//echo $key;
	IF($key==$number[0])  //如果key等于图片数，就说明该图片是最后一张图片，下一张的key值为0，重新开始
	{
		$key=0;
	}
	
	$photoID = $groupbusi->getPhotoPage($actID,$key,"act");  //获取第key张图片的ID
	
	$key = $key+1;
	
	/*
	 * 跳转到单个页面
	 */
	echo "<script language='javascript'>";
	echo "location='grp_act.php?module=singlephoto&ID=$ID&actID=$actID&photoID=$photoID&key=$key#here';";
	echo "</script>";
}
ELSEIF($module=="reply")  //活动评论页面
{ 
	
	/*
	 * 活动评论页面
	 */
	$pagesize =10;
	
	$rs = $groupbusi->getGroupMessage($ID);
	
	$actRe = $groupbusi->getReply($actID,"actReply"); //获取活动评论

	$ReplyMsg = $groupbusi->getReplyPageMessage($actRe['reply'],$pagesize, $page);
	
	$pageMessage = $groupbusi->getPageNumber($pagesize,count($actRe['reply']));
	$checkIn = $groupbusi->checkInAct($actID, $mem_ID); //是否加入了活动 未加入活动不能评论和上传图片

	$smarty->assign("checkIn",$checkIn);
	$smarty->assign("actID",$actID);
	$smarty->assign("ReplyMsg",$ReplyMsg);
	$smarty->assign("pageMessage",$pageMessage);
	$smarty->assign("actRe",$actRe);
	$smarty->assign("rs",$rs);
	$smarty->display("group/grp_act_reply.tpl");
}
ELSEIF($module=="redel")  //删除评论
{
	$type = $_REQUEST['type'];
	$reviewID=$_REQUEST['reviewID'];
	
	$data = array(
				"shieldflg"=>1
				);
	$groupbusi->setActDel($data,$reviewID);
	IF($type=="reply")//删除活动评论
	{
		$groupbusi->updataNumber($actID,"act","reply","exit");
		echo "<script language='javascript'>";
		echo "location='grp_act.php?module=reply&ID=$ID&actID=$actID';";
		echo "</script>";
	}
	elseif($type =="replydel")  //删除活动二级评论
	{
		//$groupbusi->updataNumber($actID,"act","reply","exit");
		echo "<script language='javascript'>";
		echo "location='grp_act.php?module=reply&ID=$ID&actID=$actID';";
		echo "</script>";
	}
	else 
	{
		echo "<script language='javascript'>";
		echo "location='grp_act.php?module=singlephoto&ID=$ID&actID=$actID&photoID=$photoID#here';";
		echo "</script>";
	}
	
	
}

?>