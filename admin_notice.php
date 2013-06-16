<?php
require_once('base.php');
require_once('BaseBusiness.php');
require_once('MininatureUtil.php');
require_once('AdminNoticeBusiness.php');


$noticebusi = new AdminNoticeBusiness();

if ( $_REQUEST['act'] == 'list' ||empty($_REQUEST['act']))
{
	
	$currpage = $_REQUEST['p'];
	if (empty($currpage))
	{
		$currpage = 1;
	}
	$noticelist = $noticebusi->getAllNotices($currpage,PAGE_NUMBER);//修改为自己的分页查询函数//frm
	$smarty->assign("pagecount",$noticebusi->getTotalPage());
	//----------------分页公共部分---------------------------
	$smarty->assign("allnotice",$noticelist);
	

	//---------公共部分，看看是否需要加入------------------
	$smarty->assign("url_here",$_TITLES['07_notice_list']['text']);//url_here不能更改
	$smarty->assign("action_link",$_TITLES['08_notice_add']);//action_link 不能更改，或者为action_link1
	$smarty->display("backstage/admin_notice_list.htm");//html html得与目录对应
	
}
else if($_REQUEST['act'] == 'add')
{

	$smarty->display('backstage/admin_notice_add.htm');
	
}
else if($_REQUEST['act'] == 'edit')
{
	
	$mid = $_REQUEST['id'];
	$data = $noticebusi->getOneNoticeByID($mid);
	$smarty->assign("data",$data[0]);//因为查询的结果是一个二维数组，我们只需要第一行
	$smarty->display("backstage/admin_notice_add.htm");
	
}

else if ($_REQUEST['act'] == 'del')
{
	$mid = $_REQUEST['id'];//当前ID返回
	$noticebusi->deleteNotices($mid);
	echo "<script language='javascript'>";
	echo "location='admin_notice.php';";
	echo "</script>";
	
	
}
else if ($_REQUEST['act'] == 'submit')
{
	

	$id = $_REQUEST['id'];
	$data = $_POST['data'];

	if (empty($id))//新增
	{
		
		$noticebusi->insertNotices($data);
	}
	else //如果ID不空，说明是修改数据
	{
		$noticebusi->updateNotices($data, $id);
	}
	echo "<script language='javascript'>";
	echo "location='admin_notice.php';";
	echo "</script>";
	

}
