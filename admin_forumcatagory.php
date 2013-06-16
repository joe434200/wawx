<?php
require_once('base.php');
require_once('admin_base.php');
require_once('BaseBusiness.php');
require_once('MininatureUtil.php');
require_once('AdminForumCatalogBusiness.php');

$forumbusi = new AdminForumCatalogBusiness();

if ( $_REQUEST['act'] == 'list' ||empty($_REQUEST['act']))
{
	
	$currpage = $_REQUEST['p'];
	if (empty($currpage))
	{
		$currpage = 1;
	}
	$frmlist = $forumbusi->getAllForumCatalog($currpage,PAGE_NUMBER);//修改为自己的分页查询函数//frm
	$smarty->assign("pagecount",$forumbusi->getTotalPage());
	//----------------分页公共部分---------------------------
	$smarty->assign("frm",$frmlist);
	

	//---------公共部分，看看是否需要加入------------------
	$smarty->assign("url_here",$_TITLES['01_frmcatagory_list']['text']);//url_here不能更改
	$smarty->assign("action_link",array($_TITLES['02_frmcatagory_add']));//action_link 不能更改，或者为action_link1
	
	$smarty->display("backstage/admin_forumcatagory_list.html");//html html得与目录对应
	
}
else if($_REQUEST['act'] == 'add')
{
	//获取所有一级分类
	$parentCatalog = $forumbusi->getParentCatalog();	
	$smarty->assign('parent',$parentCatalog);
	$smarty->assign("url_here",$_TITLES['01_frmcatagory_add']['text']);//url_here不能更改
	$smarty->display('backstage/admin_forumcatagory_add.html');
	
}
else if($_REQUEST['act'] == 'edit')
{
	
	$mid = $_REQUEST['id'];
	$data = $forumbusi->getOneForumCatalogByID($mid);
	$parentCatalog = $forumbusi->getParentCatalog();
	
	$smarty->assign("url_here",$_TITLES['01_frmcatagory_edit']['text']);//url_here不能更改
	$smarty->assign('parent',$parentCatalog);
	$smarty->assign("data",$data[0]);//因为查询的结果是一个二维数组，我们只需要第一行
	$smarty->display("backstage/admin_forumcatagory_add.html");
	
}

else if ($_REQUEST['act'] == 'del')
{
	$mid = $_REQUEST['id'];//当前ID返回
	$forumbusi->deleteForumCatalog($mid);
	echo "<script language='javascript'>";
	echo "location='admin_forumcatagory.php';";
	echo "</script>";
	
	
}
else if ($_REQUEST['act'] == 'submit')
{
	
	$id = $_REQUEST['id'];
	$data = $_POST['data'];

    if($_POST['level'] == "1")
	{
		$data['parentid'] = "99999";
	}

	if (empty($id))//新增
	{
		
		$forumbusi->insertForumCatalog($data);
	}
	else //如果ID不空，说明是修改数据
	{
		$forumbusi->updateForumCatalog($data, $id);
	}
	echo "<script language='javascript'>";
	echo "location='admin_forumcatagory.php';";
	echo "</script>";
	

}
