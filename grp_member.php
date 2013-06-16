<?php

require_once('base.php');
require_once('GroupBusiness.php');
require_once('SessionUtil.php');
require_once('ConstUtil.php');


$ID=$_REQUEST['ID'];
$module = $_REQUEST['module'];

$pagesize =12;
$page = $_REQUEST['page'];
$mem_ID= $_REQUEST['baseinfo']['ID'];

$groupbusi = new GroupBusiness();

IF(empty($page)||!isset($page)||$page == 1)  //如果page为空或者未1，则为首页
{
	$page =1;
}


IF(empty($module)||!isset($module))
{
	$rs = $groupbusi->getGroupMessage($ID);
	
	/*
	 * 获取圈子成员的分页信息
	 */
	$separatedata = $groupbusi->separatePage($ID,$page,$pagesize,"member");
	
	//echo "<pre>";
	//print_r($separatedata);
	$checkIn = $groupbusi->checkIN($ID,$mem_ID);   //判断用户是否在圈子内
	
	$admin = $groupbusi->getGrpAdmin($ID); //获取圈子的管理员，创建者
	
	$pageMessage = $groupbusi->getPageMessage($ID,$pagesize,NULL,"member"); //分页信息
	
	$pageTitle = "成员列表：".$rs['main']['groupname']; 
	$smarty->assign("pageTitle",$pageTitle);
	
	//echo "<pre>";
	//print_r($separatedata);
	//exit;
	
	$smarty->assign("admin",$admin);
	$smarty->assign("pageMessage",$pageMessage);
	$smarty->assign("separatedata",$separatedata);
	$smarty->assign("rs",$rs);
	$smarty->assign("checkIn",$checkIn);
	$smarty->display("group/grp_member.tpl");
}
ELSEIF($module=="joinMember")
{
	$grpMemID=$_REQUEST['grpMemID'];  
	 
	$groupbusi->updataNumber($ID,"member");  //成员数+1
	$groupbusi->createOrUpdataMember($ID, $grpMemID, date('YmdHis',time()), 0, 1,"updata");  //新建成员
	
	echo "<script language='javascript'>";
	echo "location='grp_member.php?ID=$ID';";
	echo "</script>";
}
ELSEIF($module=="exitMember")
{
	/*
	 * 踢出圈子成员
	 */
	$grpMemID=$_REQUEST['grpMemID'];

	$groupbusi->updataNumber($ID,"member",null,"exit");

	$admin = $groupbusi->getGrpAdmin($ID);
	
	if($grpMemID == $admin['admin1']||$grpMemID==$admin['admin2']||$grpMemID==$admin['admin3'])
	{
		$groupbusi->setGrpAdmin("remove",$ID,$grpMemID);
	}
	
	$result = $groupbusi->createOrUpdataMember($ID,$grpMemID,date('YmdHis',time()),1,0,"updata");

	echo "<script language='javascript'>";
	echo "location='grp_member.php?ID=$ID';";
	echo "</script>";
}
ELSEIF($module=="setAdmin")
{
	/*
	 * 设置管理员
	 */
	$grpMemID=$_REQUEST['grpMemID'];
	
	$rs = $groupbusi->checkGrpAdminNum($ID);
	
	IF($rs==0)
	{
		echo "<script language='javascript'>";
		echo "alert('该圈管理员数量已达上限');";
		echo "location='grp_member.php?ID=$ID';";
		echo "</script>";
	}
	ELSE
	{
		$groupbusi->setGrpAdmin("set",$ID,$grpMemID,$rs);
		
		echo "<script language='javascript'>";
		echo "location='grp_member.php?ID=$ID';";
		echo "</script>";
	}

}
ELSEIF($module=="removeAdmin")
{
	/*
	 * 撤销管理员
	 */
	$grpMemID=$_REQUEST['grpMemID'];
	
	$groupbusi->setGrpAdmin("remove",$ID,$grpMemID);
	
	echo "<script language='javascript'>";
	echo "location='grp_member.php?ID=$ID';";
	echo "</script>";
}
ELSEIF ($module=="takeCall")
{
	$type = $_REQUEST['type'];
	$memID = $_REQUEST['memID'];
	$nickname = rawurldecode($_REQUEST['nickname']);
	
	$groupbusi->takeCall($type,$memID,$_SESSION['baseinfo']['ID']);
	
	if($type=="attention")
	{
		$str = "您已成功关注了 ".$nickname." ";
		echo $str;
	}
	else 
	{
		$str = "您已经成功向  ".$nickname." 打了一声招呼";
		echo $str;
	}
	
}



?>