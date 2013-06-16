<?php

require_once('base.php');
require_once('admin_base.php');
require_once('SessionUtil.php');
require_once('ConstUtil.php');
require_once('MessageUtil.php');
require_once('AdminShareWebsBusiness.php');
require_once('SupportException.php');



$logger = LoggerManager::getLogger('login');


$logger->info('分享网站：開始');
$admin = new AdminShareWebsBusiness();




if (empty($_REQUEST['act']) || $_REQUEST['act'] == 'list')//列表
{
	
	//-----------------------------------------------------------------
	$currpage = $_REQUEST['p'];
	if (empty($currpage))
	{
		$currpage = 1;
	}
	$list = $admin->getAllShareWebs($currpage,PAGE_NUMBER);//修改为自己的分页查询函数
	//$pagepar = array("pagecount"=>$adminmodule->getTotalPage(),"recordcount"=>$adminmodule->getTotalRow(),"currpage"=>$currpage,"numberpage"=>$numberpage);
	$smarty->assign("pagecount",$admin->getTotalPage());
	//----------------分页公共部分---------------------------
	$smarty->assign("list",$list);

	//---------公共部分，看看是否需要加入------------------
	$smarty->assign("url_here",$_TITLES['01_sharewebs_list']['text']);//url_here不能更改
	
	$smarty->assign("action_link",array($_TITLES['02_sharewebs_add']));//action_link 不能更改，或者为action_link1
	
	
	$smarty->display("backstage/sharewebs_list.htm");
}
else if ($_REQUEST['act'] == 'add')
{
	
	$smarty->assign("url_here",$_TITLES['02_sharewebs_add']['text']);//url_here不能更改

	$smarty->display("backstage/sharewebs_add.htm");
}
else if ($_REQUEST['act'] == 'edit')
{
	$mid = $_REQUEST['id'];
	$data = $admin->getOneShareWebsByID($mid);
	$smarty->assign("data",$data[0]);//url_here不能更改

	
	$smarty->assign("url_here",$_TITLES['03_sharewebs_edit']['text']);//url_here不能更改
	$smarty->display("backstage/sharewebs_add.htm");
	
	
}
else if ($_REQUEST['act'] == 'del')
{
	$mid = $_REQUEST['id'];
	$admin->deleteShareWebs($mid);
	echo "<script language='javascript'>";
	echo "location='admin_sharewebs.php';";
	echo "</script>";
}
else if ($_REQUEST['act'] == 'submit')
{
	$id = $_REQUEST['id'];
	$data = $_POST['data'];
	
	

	
	if (!empty($_FILES['webicon']['name']))
	{
		$fileexttype = FileUtil::getFileExtentionStr($_FILES['webicon']['name']);
		$filename=date('YmdGis').".".$fileexttype;
	
		$upfile= './uploadfiles/backstage/icon/'.$filename;
		$do = move_uploaded_file($_FILES['webicon']['tmp_name'],$upfile);
	
		if (empty($id))
		{
			$act = 'add';
		}
		else 
		{
			$act = "edit&id=$id";
		}
		if (!$do)
		{
			echo '文件上传失败，文件大小不合适。';
			echo "<br/><a href='admin_sharewebs.php?$act'>返回</a>";
			exit;
		}
		$data['icon'] = $filename;
	}
	
	
	
	
	

	if (empty($id))//新增
	{
		$admin->insertShareWebs($data);
	}
	else //更新
	{
		$admin->updateShareWebs($data, $id);
	}
	echo "<script language='javascript'>";
	echo "location='admin_sharewebs.php';";
	echo "</script>";
}



?>