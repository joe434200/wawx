<?php
require_once('base.php');
require_once('admin_base.php');
require_once('BaseBusiness.php');
require_once('MininatureUtil.php');
require_once('AdminGroupCatagoryBusiness.php');

$sortbusi = new AdminGroupCatagoryBusiness();

if ( $_REQUEST['act'] == 'list' ||empty($_REQUEST['act']))
{
	
	$currpage = $_REQUEST['p'];
	if (empty($currpage))
	{
		$currpage = 1;
	}
	$grplist = $sortbusi->getAllGroups($currpage,PAGE_NUMBER);//修改为自己的分页查询函数
	$smarty->assign("pagecount",$sortbusi->getTotalPage());
	//----------------分页公共部分---------------------------
	$smarty->assign("grp",$grplist);
	

	//---------公共部分，看看是否需要加入------------------
	$smarty->assign("url_here",$_TITLES['01_grpcatagory_list']['text']);//url_here不能更改
	$smarty->assign("action_link",array($_TITLES['02_grpcatagory_add']));//action_link 不能更改，或者为action_link1
	
	
	$smarty->display("backstage/admin_groupcatagory_list.htm");
	
}
else if($_REQUEST['act'] == 'add')
{
	//获取所有一级分类
	$parentCatalog = $sortbusi->getParentCatalog();	
	$smarty->assign('parent',$parentCatalog);

	$smarty->display('backstage/admin_groupcatagory_add.htm');
	
}
else if($_REQUEST['act'] == 'edit')
{
	
	$mid = $_REQUEST['id'];
	$data = $sortbusi->getOneGroupByID($mid);
	$parentCatalog = $sortbusi->getParentCatalog();
	
	$smarty->assign('id',$mid);
	$smarty->assign('parent',$parentCatalog);
	$smarty->assign("data",$data[0]);//因为查询的结果是一个二维数组，我们只需要第一行
	$smarty->display("backstage/admin_groupcatagory_add.htm");
	
}

else if ($_REQUEST['act'] == 'del')
{
	$mid = $_REQUEST['id'];//当前ID返回
	$sortbusi->deleteModules($mid);
	echo "<script language='javascript'>";
	echo "location='admin_groupcatagory.php';";
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
		
		$sortbusi->insertGroups($data);
	}
	else //如果ID不空，说明是修改数据
	{
		$sortbusi->updateGroups($data, $id);
	}
	echo "<script language='javascript'>";
	echo "location='admin_groupcatagory.php';";
	echo "</script>";
	

}
