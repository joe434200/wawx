<?php

require_once('base.php');
require_once('admin_base.php');
require_once('SessionUtil.php');
require_once('ConstUtil.php');
require_once('MessageUtil.php');
require_once('AdminBusinessBusiness.php');
require_once('SupportException.php');
require_once('FilesOperateBusiness.php');


$logger = LoggerManager::getLogger('login');


$logger->info('商家信息维护：開始');
$admin = new AdminBusinessBusiness();
$smarty->assign("auditstatus",ConstUtil::getAuditStatusShop());
$smarty->assign("YNStatus",ConstUtil::getYesNo_NG());



if (empty($_REQUEST['act']) || $_REQUEST['act'] == 'ini')//列表
{
	
	$data = $admin->getUserInfo($_SESSION['admininfo']['ID']);
	$smarty->assign("url_here",$_TITLES['02_business_edit']['text']);//url_here不能更改

	$smarty->assign("data",$data);
	$smarty->display("backstage/shopadmin_business_edit.htm");
	
}
else if ($_REQUEST['act'] == 'submit')
{
	$data = $_POST['data'];
	if (!empty($_FILES['myphoto']['name']))//头像
	{
		$ms = ((double)microtime()*1000000);
		$fileexttype = FileUtil::getFileExtentionStr($_FILES['myphoto']['name']);
		$filename=date('YmdGis').$ms.".".$fileexttype;
	
		$upfile= './uploadfiles/register/'.$filename;
		$do = move_uploaded_file($_FILES['myphoto']['tmp_name'],$upfile);
		if (!$do)
		{
			echo '文件上传失败，文件大小不合适。';
			echo "<br/><a href='shopadmin_business.php'>返回</a>";
			exit;
		}
		$data['photo'] = $filename;
	}
	
	if (!empty($_FILES['mylicence']['name']))//营业执照
	{
		$ms = ((double)microtime()*1000000);
		$fileexttype = FileUtil::getFileExtentionStr($_FILES['mylicence']['name']);
		$filename=date('YmdGis').$ms.".".$fileexttype;
	
		$upfile= './uploadfiles/register/'.$filename;
		$do = move_uploaded_file($_FILES['mylicence']['tmp_name'],$upfile);
		if (!$do)
		{
			echo '文件上传失败，文件大小不合适。';
			echo "<br/><a href='shopadmin_business.php'>返回</a>";
			exit;
		}
		$data['busilicence'] = $filename;
	}
	$id = $_POST['id'];
	
	$admin->updateUser($id, $data);
	echo "<script language='javascript'>";
	echo "location='shopadmin_business.php';";
	echo "</script>";
}
else if ($_REQUEST['act'] == 'download')
{
	if(isset($_REQUEST["id"]) && $_REQUEST["id"] > 0)
	{
		$id = $_REQUEST["id"];
		$lic = $admin->getLicence($id);
		$fils = new FilesOperateBusiness();
		$fils->downloadFile(UPLOAD_FILES_REG_PATH.$lic, $lic);

		//FilesOperateBusiness::downloadFile(UPLOAD_FILES_HELP_PATH.$info["newfilename"],$info["oldfilename"]);

	}
	exit;
}



?>