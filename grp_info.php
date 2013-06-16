<?php

require_once('base.php');
require_once('GroupBusiness.php');
require_once('SessionUtil.php');
require_once('ConstUtil.php');


$ID=$_REQUEST['ID'];  
$module = $_REQUEST['module'];
$mem_ID = $_SESSION['baseinfo']['ID'];

$groupbusi = new GroupBusiness();


/*
 * 圈子介绍
 */

IF(empty($module)||!isset($module))   //显示圈子介绍
{
	$rs = $groupbusi->getGroupMessage($ID);   //获取圈子的信息
	
	$admin = $rs['main']['admin']; //获取当前圈子的管理员，创建者
	
	$checkIn = $groupbusi->checkIN($ID, $mem_ID); //检查当前登录者是否在该圈子里

	
	$power = $groupbusi->getAdminPower($ID,$mem_ID); //检查当前登录者的权限
	/*echo "<pre>";
	print_r($rs);
	exit;*/
	$pageTitle = "圈子详细：".$rs['main']['groupname'];
	$smarty->assign("pageTitle",$pageTitle);
	
	$smarty->assign("power",$power);
	$smarty->assign("checkIn",$checkIn);
	$smarty->assign("admin",$admin);
	$smarty->assign("rs",$rs);
	$smarty->display("group/grp_info.tpl");
}
ELSEIF($module=="updata")
{
	/*
	 * 更新圈子公告和圈子简介
	 */
	$data = $_REQUEST['data'];
	
	$groupbusi->setGrpNoticeAndIntor($data,$ID);
	
	
	echo "<script language='javascript'>";
	echo "alert('修改成功');";
	echo "location='grp_info.php?ID=$ID';";
	echo "</script>";
	
}
ELSEIF($module == "checkIn")   //判断用户在申请加入圈子的时候是否已经加入了该圈
{
	/*
	 * 加入圈子 AJAX
	 */
	$grp_ID=$_REQUEST['grp_ID'];
	$mem_ID=$_SESSION['baseinfo']['ID'];
	$result = $groupbusi->checkIN($grp_ID,$mem_ID); //获得结果，0是加入了，1是未加入
	
	IF($result==0)
	{
		echo $result;

	}
	ELSEIF($result == 1 || $result == 2)   //未加入的，提示申请成功
	{
		$rs = $groupbusi->getGroupMessage($grp_ID);
		
		if($rs['main']['joinflg']==1) //如果该圈子加入需要审核
		{
			$groupbusi->createOrUpdataMember($grp_ID, $mem_ID, date('YmdHis',time()), 0, 0);
			echo 1;
		}
		else//否则就直接加入了
		{
			$groupbusi->updataNumber($grp_ID,"member");
			$groupbusi->createOrUpdataMember($grp_ID, $mem_ID, date('YmdHis',time()), 0, 1);
			
			echo 2;
		}
		
		
	}
}
ELSEIF($module=="exit")
{
	/*
	 * 退出圈子
	 */
	$grp_ID=$_REQUEST['grp_ID'];
	$mem_ID=$_SESSION['baseinfo']['ID'];
	
	$groupbusi->updataNumber($grp_ID,"member",null,"exit");
	$result = $groupbusi->createOrUpdataMember($grp_ID, $mem_ID, date('YmdHis',time()), 1, 0,"updata");
	
	echo $result;
}
ELSEIF($module=="dismiss")
{
	$grp_ID=$_REQUEST['grp_ID'];
	
	$rs = $groupbusi->dismissGroup($grp_ID);
	
	echo $rs;
	
	
}

?>