<?php

require_once('base.php');
require_once('loginstepBusiness.php');
require_once('SessionUtil.php');

$module = $_REQUEST['module'];
$loginstep = new loginstepBusiness();

//进入标签页面
IF (empty($module) || !isset($module))
{
	$labels=$loginstep->getlabel('1');
	$smarty->assign("labels",$labels);
	$smarty->display("loginstep/loginstepa.tpl");
}

//进入加好友的页面
elseif ($module=="friend")
{
	$label = $_REQUEST['label'];
	$friends=$loginstep->getfriends($label,'1');
	$labelcount=$loginstep->getlabelnum($label);
	$smarty->assign("labelcount",$labelcount);
	$smarty->assign("friends",$friends);
	$smarty->display("loginstep/loginstepb.tpl");
}

elseif($module=="addfriends")
{
	$mylabel=$_POST['label'];
	$friendID =$_POST['friendcheckbox'];
	//换一组上选中的好友
	$friendsinfo=$_POST['friendsinfo'];
	//将换一组的字符串转化为数组
	$friendsinfo = explode(",",$friendsinfo);
	//因为array_merge函数无法组合空数组，所以先判断数组是否为空
	if(empty($friendID)&&empty($friendsinfo))
	{
		$friendsID = NULL;
	}
	elseif(!empty($friendsinfo)&&empty($friendID))
	{
		$friendsID=$friendsinfo;
	}
	elseif (!empty($friendID)&&empty($friendsinfo))
	{
		$friendsID = $friendID;
	}
	else 
	{
	  $friendsID = array_merge($friendID,$friendsinfo);
	}
	//如果之前在朋友页面更新用户的标签，将查出自己的，所以在这插数据库
	$loginstep->updateuser($mylabel, $_SESSION['baseinfo']['ID']);
	//插入好友信息
	if(!empty($friendsID))
	{
		foreach($friendsID as $key=>$value)
		{
			$friend[$key]['friendid']=$value;
			$friend[$key]['idt_user']=$_SESSION['baseinfo']['ID'];
			$friend[$key]['createtime']= date("y-m-d h:i:s",time());
			$friend[$key]['overflg']=0;
		}
		$loginstep->Insertfriend($friend);
	}
		echo "<script>";
		echo "window.location='index.php';";
		echo "</script>";
	
}

//点击好友页面的跳过
elseif ($module=="skip")
{
	
	$mylabel=$_REQUEST['label'];
	$loginstep->updateuser($mylabel, $_SESSION['baseinfo']['ID']);
	echo "<script>";
	echo "window.location='index.php';";
	echo "</script>";
}
//-----------------------------------------ajax-------------------------------------------
//ajax查找分页标签
else if($module == "GetLabelsSplit")
{
	$page = $_POST['page'];
	$data = $loginstep->getlabel($page);
	$response = json_encode($data);
	echo $response;
}

//ajax查找分页好友
elseif ($module=='GetfriendsSplit')
{
	$page = $_POST['page'];
	$label=$_POST['label'];
	$friendsinfo=$_POST['friendsID'];
	$data = $loginstep->getfriends($label,$page);
	$response = json_encode($data);
	echo $response;
}