<?php

require_once('base.php');
require_once('admin_base.php');
require_once('SessionUtil.php');
require_once('ConstUtil.php');
require_once('MessageUtil.php');
require_once('AdminShopGoodsBusiness.php');
require_once('AdminShopBusiness.php');
require_once('SupportException.php');
require_once('CommonFunction.php');



$logger = LoggerManager::getLogger('login');


$logger->info('商品管理：開始');
$admin = new AdminShopGoodsBusiness();
$smarty->assign("YNStatus",ConstUtil::getYesNo_NG());

$adminshop = new AdminShopBusiness();
$myshoplist = $adminshop->getMyAllshopList($_SESSION['admininfo']['ID']);

$goodspar = $admin->getGoodsPars();
$smarty->assign("goodspar",$goodspar);



if ($_REQUEST['act'] == 'add' || $_REQUEST['act'] == 'edit')
{
	$smarty->assign("myshop",$myshoplist);
}



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
	


	$list = $admin->getAllShopGoodsList($currpage,PAGE_NUMBER,$_SESSION['query']);//修改为自己的分页查询函数

	//$pagepar = array("pagecount"=>$adminmodule->getTotalPage(),"recordcount"=>$adminmodule->getTotalRow(),"currpage"=>$currpage,"numberpage"=>$numberpage);
	$smarty->assign("pagecount",$admin->getTotalPage());
	//----------------分页公共部分---------------------------
	$smarty->assign("list",$list);

	$smarty->assign("query",$_SESSION['query']);
	$smarty->assign("goodstype",ConstUtil::getGoodsType());
	//---------公共部分，看看是否需要加入------------------
	$smarty->assign("url_here",$_TITLES['01_goods_list']['text']);//url_here不能更改
	$smarty->assign("action_link",array($_TITLES['08_admingoods_add']));//action_link 不能更改，或者为action_link1
	$smarty->display("backstage/adminshopgoods_list.htm");
}
else if ($_REQUEST['act'] == 'add')
{
	
	$smarty->assign("url_here",$_TITLES['02_shopgoods_add']['text']);//url_here不能更改
	$smarty->assign("lev1list",$lev1list);
	$smarty->display("backstage/adminshopgoods_add.htm");
}
else if ($_REQUEST['act'] == 'edit')
{
	$mid = $_REQUEST['id'];
	$data = $admin->getShopGoodsInfo($mid);
	
	$photo = $admin->getGoodsPhotoList($mid);
	


	$smarty->assign("data",$data[0]);//url_here不能更改
	$smarty->assign("photo",$photo);//url_here不能更改
	$smarty->assign("url_here",$_TITLES['03_shopgoods_edit']['text']);//url_here不能更改
	$smarty->display("backstage/adminshopgoods_add.htm");
	
	
}
else if ($_REQUEST['act'] == 'del')
{
	$id = $_REQUEST['id'];
	$status = $_REQUEST['s']; 
	if ($status == '1')
	{
		$status = '0';
	}
	else 
	{
		$status = '1';
	}
	$admin->deleteGoods($id, $status);
	echo "<script language='javascript'>";
	echo "location='admin_goods.php';";
	echo "</script>";
}
else if ($_REQUEST['act'] == 'submit')
{
	$id = $_REQUEST['id'];
	$data = $_POST['data'];
	$data['isonsale']=getCheckBoxValue($data,'isonsale');
	$data['isout']=getCheckBoxValue($data,'isout');
	$data['ispromote']=getCheckBoxValue($data,'ispromote');
	$data['isexchange']=getCheckBoxValue($data,'isexchange');
	
	$data['isgroup']=getCheckBoxValue($data,'isgroup');
	$data['isspecial']=getCheckBoxValue($data,'isspecial');
	$data['isodds']=getCheckBoxValue($data,'isodds');
	$data['isbest']=getCheckBoxValue($data,'isbest');
	$data['isnew']=getCheckBoxValue($data,'isnew');
	$data['ishot']=getCheckBoxValue($data,'ishot');
	$data['isEntity']=getCheckBoxValue($data,'isEntity');
	
	$data['goodsparamenter'] = ArrayToStr(";", $_POST['goodspars']);
	
	$data['goodstype']='0';
	
	$data['isdelete'] = '0';
	
	$data['lastupdate']= date("Y-m-d H:i:s");
	if (!empty($data['isbest']))
	{
		$data['recommendtime']= date("Y-m-d H:i:s");
	}
	if (!empty($_FILES['mainpic']['name']))
	{
		$fileexttype = FileUtil::getFileExtentionStr($_FILES['mainpic']['name']);
		$filename=date('YmdGis').".".$fileexttype;
	
		$upfile= './uploadfiles/goods/'.$filename;
		$do = move_uploaded_file($_FILES['mainpic']['tmp_name'],$upfile);
	
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
			echo "<br/><a href='admin_goods.php?$act'>返回</a>";
			exit;
		}
		$data['newimg'] = $filename;
		$data['oldimg'] = $_FILES['mainpic']['name'];
	}
	
	
	echo "<pre>";
	print_r($data);
	exit;


	if (empty($id))//新增
	{
		$data['addtime']= date("Y-m-d H:i:s");
		$id = $admin->addGoods($data);
		echo "<script language='javascript'>";
		echo "location='admin_goods.php?act=edit&id=$id';";
		echo "</script>";
	}
	else //更新
	{
		$admin->editGoods($id,$data);
		echo "<script language='javascript'>";
		echo "location='admin_goods.php';";
		echo "</script>";
	}

}
else if ($_REQUEST['act'] == 'delphoto')
{
	$id = $_REQUEST['id'];
	$admin->deleteGoodsPhoto($id);
	echo $id;
}
else if ($_REQUEST['act'] == 'status')
{
	$type = $_REQUEST['type'];
	$status = $_REQUEST['v']; 
	$id = $_REQUEST['id'];
	$admin->setStatus($id, $type, $status);
	$rsdata = array(array("id"=>$id,"status"=>$status,"type"=>$type));
	echo json_encode($rsdata);
	
}






?>