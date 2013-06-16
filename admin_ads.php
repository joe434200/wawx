<?php

require_once('base.php');
require_once('admin_base.php');
require_once('SessionUtil.php');
require_once('ConstUtil.php');
require_once('MessageUtil.php');
require_once('AdminAdsBusiness.php');
require_once('SupportException.php');
require_once('MininatureUtil.php');



$minigraph = new CreatMiniature();
$tobase = "./uploadfiles/adver/";

$logger = LoggerManager::getLogger('login');


$logger->info('广告管理：開始');
$admin = new AdminAdsBusiness();

$adspos = ConstUtil::getAdsPosList();
$smarty->assign("adspos",$adspos);
$smarty->assign("adstype",ConstUtil::getAdsType());
if (empty($_REQUEST['act']) || $_REQUEST['act'] == 'list')//列表
{
	
	//-----------------------------------------------------------------
	$currpage = $_REQUEST['p'];
	if (empty($currpage))
	{
		$currpage = 1;
	}
	if ($_POST['query'] != null)
	{
		$_SESSION['query'] = $_POST['query'];
	}
	$list = $admin->getAllAdsList($currpage,PAGE_NUMBER,$_SESSION['query']);//修改为自己的分页查询函数

	$smarty->assign("query",$_SESSION['query']);
	//$pagepar = array("pagecount"=>$adminmodule->getTotalPage(),"recordcount"=>$adminmodule->getTotalRow(),"currpage"=>$currpage,"numberpage"=>$numberpage);
	$smarty->assign("pagecount",$admin->getTotalPage());
	//----------------分页公共部分---------------------------
	$smarty->assign("list",$list);


	//---------公共部分，看看是否需要加入------------------
	$smarty->assign("url_here",$_TITLES['01_ads_list']['text']);//url_here不能更改
	
	$smarty->assign("action_link",array($_TITLES['02_ads_add']));//action_link 不能更改，或者为action_link1
	
	
	$smarty->display("backstage/ads_list.htm");
}
else if ($_REQUEST['act'] == 'add')
{
	
	$smarty->assign("url_here",$_TITLES['02_ads_add']['text']);//url_here不能更改

	$smarty->display("backstage/ads_add.htm");
}
else if ($_REQUEST['act'] == 'edit')
{
	$mid = $_REQUEST['id'];
	$data = $admin->getOneAdsByID($mid);
	$smarty->assign("data",$data[0]);//url_here不能更改

	
	$smarty->assign("url_here",$_TITLES['03_ads_edit']['text']);//url_here不能更改
	$smarty->display("backstage/ads_add.htm");
	
	
}
else if ($_REQUEST['act'] == 'del')
{
	$mid = $_REQUEST['id'];
	$admin->deleteAds($mid);
	echo "<script language='javascript'>";
	echo "location='admin_ads.php';";
	echo "</script>";
}
else if ($_REQUEST['act'] == 'show')
{
	$mid = $_REQUEST['id'];
	$data = $admin->getOneAdsByID($mid);
	$smarty->assign("data",$data[0]);//url_here不能更改

	
	$smarty->assign("url_here",$_TITLES['04_ads_show']['text']);//url_here不能更改
	$smarty->display("backstage/ads_show.htm");
}
else if ($_REQUEST['act'] == 'submit')
{
	$id = $_REQUEST['id'];
	$data = $_POST['data'];
	
	//将广告图片生成对应大小的缩略图

	if($_FILES['adspic']['name']!=NULL)
	{
	    $name_head = date('YmdHis',time()).rand(0, 100).".".FileUtil::getFileExtentionStr($_FILES['adspic']['name']); ///生成图片名字的时间和随机数

	    //echo $name_head.$_FILES['picPath']['name'];
	    $name_end = $_FILES['adspic']['name'];
	    //$_FILES['picPath']['name'] = $name_head.$_FILES['picPath']['name'];
	    //$upfile='./uploadfiles/torokuImage/'.$_FILES['picPath']['name'];
	    $upfile='./uploadfiles/adver/'.$name_head;
	    //echo $upfile;
	    $filename = $name_head;
	    $a = move_uploaded_file($_FILES['adspic']['tmp_name'], $upfile);
	    
	    //生成缩略图,add by lzg 20130512
	    $filetype = FileUtil::getFileExtentionStr($_FILES['adspic']['name']);
		if (strtoupper($filetype) == "BMP" || strtoupper($filetype) == "JPG" || strtoupper($filetype) == "GIF" || strtoupper($filetype) == "PNG" || strtoupper($filetype) == "ICO")
		{
					$minigraph->SetVar($upfile, 'file');
					//$minigraph->PRorate($tobase."sm".$filename, ConstUtil::$minWidth, ConstUtil::$minHeight);
					$minigraph->PRorate($tobase."ok".$filename, $adspos[$data['position']]['width'], $adspos[$data['position']]['height']);
					$data['realname'] = "ok".$filename;
					$data['oldname'] = $_FILES['adspic']['name'];//项数据库中插入或者更新
		}
		
	  //---------end-------------------
	}

	$data['endtime'] = date("Y-m-d",strtotime("+$data[validtime]days",strtotime($data['starttime'])));
	
	

	$data['isshow'] = '1';

	if (empty($id))//新增
	{
		$admin->insertAds($data);
	}
	else //更新
	{
		$admin->updateAds($data, $id);
	}
	echo "<script language='javascript'>";
	echo "location='admin_ads.php';";
	echo "</script>";
}



?>