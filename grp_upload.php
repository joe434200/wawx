<?php

//require_once 'JSON.php';
require_once 'base.php';
require_once 'SessionUtil.php';
require_once 'BaseBusiness.php';
require_once('GroupBusiness.php');

$groupbusi = new GroupBusiness();

$grp_ID = $_REQUEST['ID'];
$act_ID = $_REQUEST['actID'];

$php_path = dirname(__FILE__) . '/';
$php_url = dirname($_SERVER['PHP_SELF']) . '/';
$currtime = date("Y-m-d H:i:s");
$base = new BaseBusiness();
//文件保存目录路径
//$save_path = $php_path . '../uploadfiles/space/';
$save_path = 'uploadfiles/group/';
//文件保存目录URL
$save_url = $php_url . '/uploadfiles/group/';



//给用户定义次级目录
$creater = SessionUtil::getBase('ID');

//定义允许上传的文件扩展名
$ext_arr = array(
	'image' => array('gif', 'jpg', 'jpeg', 'png', 'bmp'),
	'flash' => array('swf', 'flv'),
	'media' => array('swf', 'flv', 'mp3', 'wav', 'wma', 'wmv', 'mid', 'avi', 'mpg', 'asf', 'rm', 'rmvb'),
	'file' => array('doc', 'docx', 'xls', 'xlsx', 'ppt', 'htm', 'html', 'txt', 'zip', 'rar', 'gz', 'bz2'),
);
//最大文件大小
$max_size = 100000000;

//$save_path = realpath($save_path) . '/';

//PHP上传失败
if (!empty($_FILES['imgFile']['error'])) {
	switch($_FILES['imgFile']['error']){
		case '1':
			$error = '超过php.ini允许的大小。';
			break;
		case '2':
			$error = '超过表单允许的大小。';
			break;
		case '3':
			$error = '图片只有部分被上传。';
			break;
		case '4':
			$error = '请选择图片。';
			break;
		case '6':
			$error = '找不到临时目录。';
			break;
		case '7':
			$error = '写文件到硬盘出错。';
			break;
		case '8':
			$error = 'File upload stopped by extension。';
			break;
		case '999':
		default:
			$error = '未知错误。';
	}
	alert($error);
}

//有上传文件时
if (empty($_FILES) === false) {
	//原文件名
	$file_name = $_FILES['imgFile']['name'];
	//服务器上临时文件名
	$tmp_name = $_FILES['imgFile']['tmp_name'];
	//文件大小
	$file_size = $_FILES['imgFile']['size'];
	//检查文件名
	if (!$file_name) {
		alert("请选择文件。");
	}
	//检查目录
	if (@is_dir($save_path) === false) {
		alert("上传目录不存在。");
	}
	//检查目录写权限
	if (@is_writable($save_path) === false) {
		alert("上传目录没有写权限。");
	}
	//检查是否已上传
	if (@is_uploaded_file($tmp_name) === false) {
		alert("上传失败。");
	}
	//检查文件大小
	if ($file_size > $max_size) {
		alert("上传文件大小超过限制。");
	}
	
	
	
	//检查目录名
	
	//--------------------modify by zx---------------------------------------
	
	$dir_name = empty($_GET['dir']) ? 'image' : trim($_GET['dir']);
	if (empty($ext_arr[$dir_name])) {
		alert("目录名不正确。");
	}	
	//获得文件扩展名
	$temp_arr = explode(".", $file_name);
	$file_ext = array_pop($temp_arr);
	$file_ext = trim($file_ext);
	$file_ext = strtolower($file_ext);
	//检查扩展名
	if (in_array($file_ext, $ext_arr[$dir_name]) === false) {
		alert("上传文件扩展名是不允许的扩展名。\n只允许" . implode(",", $ext_arr[$dir_name]) . "格式。");
	}
	
	
	//path
	$save_path .= $grp_ID . "/";
	$save_url .= $grp_ID . "/";
	if (!file_exists($save_path)) {
		mkdir($save_path);
	}

    //创建文件夹
	$forum_name = $_REQUEST['module'];
	if ($dir_name !== '') {
		$save_path .= $forum_name . "/";
		$save_url .= $forum_name . "/";
		if (!file_exists($save_path)) {
			mkdir($save_path);
		}
	}
	
	//新文件名
	$new_file_name = date("YmdHis") . '_' . rand(10000, 99999) . '.' . $file_ext;
	//移动文件
	$file_path = $save_path . $new_file_name;
	if (move_uploaded_file($tmp_name, $file_path) === false) {
		alert("上传文件失败。");
	}
	
	
	//路径插入数据库-----add by zx-----------
	if($forum_name=="group_photo")
	{	
		$data['idt_grp_main'] = $grp_ID;
		$data['realname'] = $new_file_name;
		$data['oldname'] = $file_name;
		$data['createtime'] = $currtime;
		$data['creater'] = $creater;
		
		
		$base->Insert("t_grp_photo", $data);
	
		$groupbusi->updataNumber($grp_ID,"photo");
		
	}
	elseif($forum_name=="act_photo")
	{
		$data['idt_act_main'] = $act_ID;
		$data['realname'] = $new_file_name;
		$data['oldname'] = $file_name;
		$data['createtime'] = $currtime;
		$data['creater'] = $creater;
		
		
		$base->Insert("t_act_photo", $data);
	
		$groupbusi->updataNumber($act_ID,"act","photo");
	}

	
	//-------------------------------------

	@chmod($file_path, 0644);
	$file_url = $save_url . $new_file_name;

	header('Content-type: text/html; charset=UTF-8');
	$json = new Services_JSON();
	echo $json->encode(array('error' => 0, 'url' => $file_url));

	
	exit;
}

function alert($msg) {
	header('Content-type: text/html; charset=UTF-8');
	$json = new Services_JSON();
	echo $json->encode(array('error' => 1, 'message' => $msg));
	exit;
}


