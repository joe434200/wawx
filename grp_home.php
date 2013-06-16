<?php

require_once('base.php');
require_once('GroupBusiness.php');
require_once('SessionUtil.php');
require_once('ConstUtil.php');
require_once('DateUtil.php');
require_once('FilesOperateBusiness.php');
require_once('FileUtil.php');
require_once('MininatureUtil.php');


//echo "<pre>";
//print_r($_SESSION['baseinfo']);
//exit;
$groupbusi = new GroupBusiness();

$module=$_REQUEST['module'];  //判断“我的圈子”还是“创建圈子”

$secondID = $_REQUEST['secondID']; //小类型
$minMember=$_REQUEST['minMember'];    //最小人数
$maxMember=$_REQUEST['maxMember'];  //最大人数
$label=$_REQUEST['label'];    //标签
$method=$_REQUEST['method'];   //排序方式
$school=$_REQUEST['school'];   //学校


//-------------------add by zrh---------------------
$_SESSION['barType'] = 2;
//-------------------add by zrh end-------------------


IF(empty($module) || !isset($module))   //圈子的主页面
{
	/*
	 *设置圈子主页面的标题
	 */

	//echo "<pre>";
	//print_r($_COOKIE);
	TplConstTitle::setPageTitle($smarty,'grp_home'); 
	
	$ad = $groupbusi->getAd();
	
	/*
	 * 获取圈子首页所有信息
	 */
	$homeGrp = $groupbusi->getHomeMessage("home");
	
	$insnum = $groupbusi->getInsNum();
	$exnum = $groupbusi->getExcelringNum();
	$supernum = $groupbusi->getSuper();
	//echo "<pre>";
	
	//print_r($homeGrp);
	
	/*
	 * start1,start2,start3变量用于换一组的实现
	 */

	$smarty->assign("ad",$ad);
	$smarty->assign("insnum",$insnum);
	$smarty->assign("exnum",$exnum);
	$smarty->assign("supernum",$supernum);
	$smarty->assign("start1",0);
	$smarty->assign("start2",0);
	$smarty->assign("start3",0);
	$smarty->assign("homeGrp",$homeGrp);
	$smarty->display("group/grp_home.tpl");
}
/*
 * ajax 换一组的代码
 */
ELSEIF($module=="changeGroup")
{
	/*
	 * 获取类型（感兴趣圈子，圈子达人，优秀圈主）
	 * 获取start
	 */
	$type=$_REQUEST['type'];
	$start = $_REQUEST['start'];
	
	/*
	 * 获取新组信息
	 */
	$homeGrp = $groupbusi->getHomeMessage($type,$start); 
	
	$json = json_encode($homeGrp[$type]);
	
	echo $json;
	
}
ELSEIF($module=="showType")  //获取类型
{
	/*
	 * 创建圈子的时候取出类型
	 */
	$type=$_REQUEST['type'];
	
	$rs= $groupbusi->getGroupType(1,$type);
	
	$json = json_encode($rs);
	echo $json;
	
}
ELSEIF($module == "my_grp")   //我的圈子
{
	//$_SESSION['loginok']=1;
		$mygrp = $_REQUEST['label']; //判断“已加入”还是“我创建的”还是“审核中”
		
		IF($mygrp=="create") //我创建的
		{
				TplConstTitle::setPageTitle($smarty,'grp_MyCreate');
				
				$type=$_REQUEST['type']; 
				
				$smarty->assign("mygrp",$mygrp);
				
				if($type=="school") //学校圈
				{
					$rs = $groupbusi->getMyGroupMessage($mygrp, $type,$_SESSION['baseinfo']['ID']);
					
					$smarty->assign("rs",$rs);
					$smarty->assign("type",$type);
					$smarty->display("group/grp_my.tpl");
					
				}else IF($type=="club") //社团圈
				{
					$rs = $groupbusi->getMyGroupMessage($mygrp, $type,$_SESSION['baseinfo']['ID']);
					
					$smarty->assign("rs",$rs);
					$smarty->assign("type",$type);
					$smarty->display("group/grp_my.tpl");
					
				}else  //兴趣圈
				{
					$rs = $groupbusi->getMyGroupMessage($mygrp, $type,$_SESSION['baseinfo']['ID']);
					
					$smarty->assign("rs",$rs);
					$smarty->assign("type",$type);
					$smarty->display("group/grp_my.tpl");
				}
		}
		ELSEIF($mygrp=="check") //审核中的
		{
			    TplConstTitle::setPageTitle($smarty,'grp_MyCheck');
				$type=$_REQUEST['type'];  //判断圈子的类型
				
				$smarty->assign("mygrp",$mygrp);
				
				if($type=="school")    //学校圈
				{
					$rs = $groupbusi->getMyGroupMessage($mygrp, $type,$_SESSION['baseinfo']['ID']);
					
					$smarty->assign("rs",$rs);
					$smarty->assign("type",$type);
					$smarty->display("group/grp_my.tpl");
					
				}else IF($type=="club") //社团圈
				{
					$rs = $groupbusi->getMyGroupMessage($mygrp, $type,$_SESSION['baseinfo']['ID']);
					
					$smarty->assign("rs",$rs);
					$smarty->assign("type",$type);
					$smarty->display("group/grp_my.tpl");
					
				}else    //兴趣圈
				{
					$rs = $groupbusi->getMyGroupMessage($mygrp, $type,$_SESSION['baseinfo']['ID']);
					
					$smarty->assign("rs",$rs);
					$smarty->assign("type",$type);
					$smarty->display("group/grp_my.tpl");
				}
				
		}
		ELSE  // 已加入的
		{
			TplConstTitle::setPageTitle($smarty,'grp_MyIn');
			
				$type=$_REQUEST['type'];
				
				$smarty->assign("mygrp",$mygrp);
				
				if($type=="school")   //学校圈
				{
					$rs = $groupbusi->getMyGroupMessage($mygrp, $type,$_SESSION['baseinfo']['ID']);
					
					$smarty->assign("rs",$rs);
					$smarty->assign("type",$type);
					$smarty->display("group/grp_my.tpl");
					
				}else IF($type=="club") //社团圈
				{
					$rs = $groupbusi->getMyGroupMessage($mygrp, $type,$_SESSION['baseinfo']['ID']);
					
					$smarty->assign("rs",$rs);
					$smarty->assign("type",$type);
					$smarty->display("group/grp_my.tpl");
					
				}else  //兴趣圈
				{
					$rs = $groupbusi->getMyGroupMessage($mygrp, $type,$_SESSION['baseinfo']['ID']);
					
					$smarty->assign("rs",$rs);
					$smarty->assign("type",$type);
					$smarty->display("group/grp_my.tpl");
					
				}
				
		}
}


ELSEIF($module == "create")   //创建圈子
{
	TplConstTitle::setPageTitle($smarty,'grp_create');

	$rs = $groupbusi->getGroupType(0);
		
		/*
		 * 获取学校信息
		 */
		$a= $groupbusi->getGroupType(3);
	
		
		$len = count($a);//学校数
		
		/*
		 *将学校信息存入数组
		 */
		$str = "";
		
		for($i=0;$i<$len;$i++)
		{
			$str = $str.$a[$i]['schoolname'].",";
		}
	
		
		$smarty->assign("str",$str);
		$smarty->assign("rs",$rs);
		$smarty->display("group/grp_new.tpl");
	
}


ELSEIF($module=="success")   //创建成功
{
	//echo "<pre>";
	//print_r($data);
	//print_r($_FILES['picPath']);
	
	//上传图片
	
	$filesubmitflg = $_POST['filesubmitflg'];
	
	if ($filesubmitflg == '1')
	{
			$fileexttype = FileUtil::getFileExtentionStr($_FILES['picPath']['name']);
			$filename=date('YmdGis').".".$fileexttype;

			if (strtolower($fileexttype) != "bmp" && strtolower($fileexttype) != "jpg"
			&& strtolower($fileexttype) != "gif" && strtolower($fileexttype) != "ico"
			&& strtolower($fileexttype) != "png"
			)
			{
				$errmsg = FileUtil::getMessage('F0001');
				echo "<script>parent.callbackVideo({'code':1,'message':'$errmsg'});</script>";
			}
			else
			{
				$upfile= './uploadfiles/group/groupImage/'.$filename;
				if (move_uploaded_file($_FILES["picPath"]["tmp_name"],$upfile))
				{
					echo "<script>parent.callbackVideo({'code':0,'newfilename':'$filename'});</script>";

				}
				else
				{
					$errmsg = FileUtil::getMessage('F0002');
					echo "<script>parent.callbackVideo({'code':1,'message':'$errmsg'});</script>";

				}
			}
			exit;
	}
	

	//------------------正常提交------------
	//判断文件是否存在，如果存在删除服务器上的文件
	
	$oldfilename = $_POST['tmpfilename'];
	$delfile= './uploadfiles/group/groupImage/'.$oldfilename;
	if (file_exists($delfile))
	{
    	$result=unlink ($delfile);
  	}
  	//---------------------------------------------
	
	if($_FILES['picPath']['name']!=NULL)
	{
	    $imageName = $groupbusi->Insert_file($_FILES['picPath'],"groupImage");
	}
	
	//如果是需要审核
	if($_REQUEST['checkboxC'])
	{
	    $joinflg = 1;
	}//如果不需要审核
	else 
	{
		$joinflg = 0;
	}
	
	//圈子信息数组
	$data = array(
				"groupname" =>$_REQUEST['groupname'],
				"idm_grp_catalog" => $_REQUEST['type'],
				"idm_grp_second_catalog" => $_REQUEST['type1'],
				"schoolname"=>$_REQUEST['school'],
				"introduction"=>$_REQUEST['groupinfo'],
				"lables"=>$_REQUEST['label'],
				"level"=>1,
				"auditflg"=>0,
				"creater"=>$_SESSION['baseinfo']['ID'],
				"createtime"=>date('Y-m-d',time()),
				"photo"=>$imageName,
				"topicnum"=>0,
				"membernum"=>1,
				"shieldflg"=>0,
				"joinflg"=>$joinflg
				);
	/*
	 * 将圈子标签根据','分成数组
	 */
	$label_ary = explode(",",$data['lables']);
	
	//新建圈子，返回圈子ID
	$ID = $groupbusi->createNewGroup($data,$imageName);

	//新建label或者是给已有的圈子标签更新数目
	$groupbusi->createOrUpdataLabel($label_ary,$ID);
	
	IF($_FILES['picPath']['name']!=NULL)
	{
		echo "<script>parent.tiaozhuan($ID)</script>";
	}
	ELSE
	{
		echo "<script language='javascript'>";
		echo "location='grp_single_home.php?ID=$ID';";
		echo "</script>";
	}
}
ELSEIF($module=="school")
{
	/*
	 * 学校圈子 学校圈子需要学校信息
	 */
	TplConstTitle::setPageTitle($smarty,'grp_school');
	$page = $_REQUEST['page'];
	
	//每页显示多少条数据
	$pagesize = 8;
	
	iF(empty($page)||!isset($page))
	{
		$page =1;
	}
	
	//搜索出圈子达人
	$super = $groupbusi->getHomeMessage("super");
	//搜索出最新的话题
	$newTopic = $groupbusi->getHomeMessage("newTopic");
	
	//学校圈子ID是2
	$firstID = 2; //大类型	
	
	//搜索出全部的学校圈子
	$data = $groupbusi->getSelectMessage(2,null,$minMember,$maxMember,null,$method,$school);

	//学校圈子数量
	$typenumber = count($data);
	
	//取出分页数组
	$data = $groupbusi->getSelectPageMessage($data, $page, $pagesize);
	
	$pageMessage =$groupbusi->getPageNumber($pagesize, $typenumber);//获取一共多少页
	
	//取出所有学校信息
	$selectMsg = $groupbusi->selMsg(null,$minMember,$maxMember,$method,$school);
	
	$schoolvalue= $groupbusi->getGroupType(3);
	
	$len = count($schoolvalue);
		
	$str = "";
		
	for($i=0;$i<$len;$i++)
	{
		$str = $str.$schoolvalue[$i]['schoolname'].",";
	}
	
	$supernum = $groupbusi->getSuper();
	
	$smarty->assign("supernum",$supernum);
	$smarty->assign("start2",0);
	$smarty->assign("selectMsg",$selectMsg);
	$smarty->assign("typenumber",$typenumber);
	$smarty->assign("str",$str);
	$smarty->assign("pageMessage",$pageMessage);
	$smarty->assign("newTopic",$newTopic);
	$smarty->assign("super",$super);
	$smarty->assign("data",$data);
	$smarty->display("group/grp_school.tpl");
}
ELSEIF($module=="club")
{
	/*
	 * 社团圈子 类似于学校圈   社团圈需要学校信息和第二类型
	 */
	TplConstTitle::setPageTitle($smarty,'grp_club');
	$page = $_REQUEST['page'];
	
	iF(empty($page)||!isset($page))
	{
		$page =1;
	}
	
	$pagesize = 8;
	
	$super = $groupbusi->getHomeMessage("super");
	$newTopic = $groupbusi->getHomeMessage("newTopic");
	
	$firstID = 3; //大类型	
	
	$data = $groupbusi->getSelectMessage(3,$secondID,$minMember,$maxMember,null,$method,$school);
	
	$typenumber = count($data);
	
	$data = $groupbusi->getSelectPageMessage($data, $page, $pagesize);
	
	//取出社团圈子的类型
	$type = $groupbusi->getGroupType(1,$firstID);
	
	$selectMsg = $groupbusi->selMsg($secondID,$minMember,$maxMember,$method,$school,$type);
	
	$pageMessage =$groupbusi->getPageNumber($pagesize, $typenumber);
	
	$schoolvalue= $groupbusi->getGroupType(3);
	
	$len = count($schoolvalue);
		
	$str = "";
		
	for($i=0;$i<$len;$i++)
	{
		$str = $str.$schoolvalue[$i]['schoolname'].",";
	}
	
	$pageMessage =$groupbusi->getPageNumber($pagesize, $typenumber);
	
	$supernum = $groupbusi->getSuper();

	$smarty->assign("selectMsg",$selectMsg);
	$smarty->assign("supernum",$supernum);
	$smarty->assign("start2",0);
	$smarty->assign("typenumber",$typenumber);
	$smarty->assign("str",$str);
	$smarty->assign("pageMessage",$pageMessage);
	$smarty->assign("newTopic",$newTopic);
	$smarty->assign("super",$super);
	$smarty->assign("typenumber",$typenumber);
	$smarty->assign("data",$data);
	$smarty->assign("type",$type);
	$smarty->display("group/grp_club.tpl");
}
ELSEIF($module=="interest")
{	
	/*
	 * 兴趣圈子 类似于学校圈   兴趣圈需要第二类型
	 */

	//	echo "aaaaaaaaaa";
	TplConstTitle::setPageTitle($smarty,'grp_ins');
	$page = $_REQUEST['page'];
	
	iF(empty($page)||!isset($page))
	{
		$page =1;
	}
	
	$pagesize = 8;
	
	$super = $groupbusi->getHomeMessage("super");

	$newTopic = $groupbusi->getHomeMessage("newTopic");
	
	$firstID = 1;   

	$data = $groupbusi->getSelectMessage(1,$secondID,$minMember,$maxMember,null,$method,null);
	
	$typenumber = count($data);
	
	$data = $groupbusi->getSelectPageMessage($data, $page, $pagesize);
	
	$type = $groupbusi->getGroupType(1,$firstID);
	
	$selectMsg = $groupbusi->selMsg($secondID,$minMember,$maxMember,$method,$school,$type);
	
	$pageMessage =$groupbusi->getPageNumber($pagesize,$typenumber);
	
	$supernum = $groupbusi->getSuper();
	
	$smarty->assign("selectMsg",$selectMsg);
	$smarty->assign("supernum",$supernum);
	$smarty->assign("start2",0);
	$smarty->assign("pageMessage",$pageMessage);
	$smarty->assign("newTopic",$newTopic);
	$smarty->assign("super",$super);
	$smarty->assign("typenumber",$typenumber);
	$smarty->assign("data",$data);
	$smarty->assign("type",$type);
	$smarty->display("group/grp_ins.tpl");
}
ELSEIF($module=="label")
{
	
	/*
	 * 根据标签
	 */
	
	//获取页面
	$page = $_REQUEST['page'];
	
	iF(empty($page)||!isset($page))
	{
		$page =1;
	}
	
	$pagesize = 8;
	
	//获取label的ID，名称，和数目
	$labelMsg = array(
				"labelID"=>$_REQUEST['labelID'],
				"labelName"=>$_REQUEST['label'],
				"labelNum"=>$_REQUEST['labelnum']
	);
	/*
	 * 圈子达人和最新话题
	 */
	$super = $groupbusi->getHomeMessage("super");
	$newTopic = $groupbusi->getHomeMessage("newTopic");
	
	//取出label的圈子信息
	$rs = $groupbusi->getLabelGroup($labelMsg['labelID'],$page,$pagesize,$method);
	
	$pageMessage =$groupbusi->getPageNumber($pagesize, $labelMsg['labelNum']);
	
	$smarty->assign("pageTitle","标签：".$labelMsg['labelName']);
	$smarty->assign("pageMessage",$pageMessage);
	$smarty->assign("newTopic",$newTopic);
	$smarty->assign("super",$super);
	$smarty->assign("rs",$rs);
	$smarty->assign("labelMsg",$labelMsg);
	$smarty->display("group/grp_label.tpl");
	
}
ELSEIF($module=="select")
{
	
	/*
	 * 圈子搜索
	 */
	TplConstTitle::setPageTitle($smarty,'grp_select');
	
	//获取搜索关键字
	$keyword = $_REQUEST['keyword'];
	
	$page = $_REQUEST['page'];
	
	$pagesize = 8;
	IF(empty($page)||!isset($page))
	{
		$page =1;
	}
	
	//如果关键是空或者为输入关键字、标签查找
	IF(empty($keyword)||!isset($keyword)||$keyword=="输入关键字、标签查找")
	{
		$keyword="";
	}
	
	$super = $groupbusi->getHomeMessage("super");

	$newTopic = $groupbusi->getHomeMessage("newTopic");
	
	/*
	 * 取出该关键字的数据    按照圈子名称和标签搜索
	 */
	$data = $groupbusi->getSelectMessage(null,null,null,null,$keyword,$method,null);
	
	
	//有多少条数据
	$typenumber = count($data);
	
	//获取分页数据
	$data = $groupbusi->getSelectPageMessage($data,$page, $pagesize);

	
	$pageMessage =$groupbusi->getPageNumber($pagesize,$typenumber);
	
	//如果关键字是空，在页面显示关键字：无
	IF(empty($keyword)||!isset($keyword)||$keyword=="输入关键字、标签查找")
	{
		$keyword="无";	
	}
	
	$smarty->assign("keyword",$keyword);
	$smarty->assign("typenumber",$typenumber);
	$smarty->assign("pageMessage",$pageMessage);
	$smarty->assign("newTopic",$newTopic);
	$smarty->assign("super",$super);
	$smarty->assign("data",$data);
	$smarty->display("group/grp_select.tpl");
}
ELSEIF ($module=="myschoolgrp")
{
	$schoolname = $_SESSION['baseinfo']['schoolname'];
	/*
	 * 学校圈子 学校圈子需要学校信息
	 */
	TplConstTitle::setPageTitle($smarty,'grp_school');
	$page = $_REQUEST['page'];
	
	//每页显示多少条数据
	$pagesize = 8;
	
	iF(empty($page)||!isset($page))
	{
		$page =1;
	}
	
	//搜索出圈子达人
	$super = $groupbusi->getHomeMessage("super");
	//搜索出最新的话题
	$newTopic = $groupbusi->getHomeMessage("newTopic");
	
	//学校圈子ID是2
	$firstID = 2; //大类型	
	
	//搜索出全部的学校圈子
	$data = $groupbusi->getSelectMessage(2,null,$minMember,$maxMember,null,$method,$schoolname);

	//学校圈子数量
	$typenumber = count($data);
	
	//取出分页数组
	$data = $groupbusi->getSelectPageMessage($data, $page, $pagesize);
	
	$pageMessage =$groupbusi->getPageNumber($pagesize, $typenumber);//获取一共多少页
	
	$supernum = $groupbusi->getSuper();
	
	$selectMsg = $groupbusi->selMsg(null,$minMember,$maxMember,$method,$schoolname);
	
	$smarty->assign("selectMsg",$selectMsg);
	$smarty->assign("supernum",$supernum);
	$smarty->assign("start2",0);
	$smarty->assign("schoolname",$schoolname);
	$smarty->assign("typenumber",$typenumber);
	$smarty->assign("pageMessage",$pageMessage);
	$smarty->assign("newTopic",$newTopic);
	$smarty->assign("super",$super);
	$smarty->assign("data",$data);
	$smarty->display("group/grp_my_school.tpl");
}
?>