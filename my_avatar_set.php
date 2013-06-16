<?php
require_once('base.php');
require_once('LoginBusiness.php');
require_once('SessionUtil.php');
require_once('ConstUtil.php');
require_once('SelfBusiness.php');
require_once('UserBusiness.php');

$selfbusi = new SelfBuiness();
$userid = $_SESSION['baseinfo']['ID'];
if($_REQUEST['module'] == "submit")
{
	if(count($_FILES['tValue']) == 0)
	{
		echo "nothig";
	}
	else 
	{
		$file_name = $_FILES['tValue']['name'];
		//获得文件扩展名
		$temp_arr = explode(".", $file_name);
		$file_ext = array_pop($temp_arr);
		$file_ext = trim($file_ext);
		$file_ext = strtolower($file_ext);
		$new_file_name = date("YmdHis") . '_' . rand(10000, 99999) . '.' . $file_ext;
		if(move_uploaded_file($_FILES["tValue"]["tmp_name"], "./uploadfiles/user/".$new_file_name));
		{
			$url = "./uploadfiles/user/".$new_file_name;
		    echo "<img src='$url' width='175px'height='175px'>";
		}
		$data['photo'] = $new_file_name;
		$where = "u.id = '$userid'";
		$selfbusi->self_update('t_user', $data, $where);
	}
	
}
else 
{
	$self = $selfbusi->getSpace($userid);
	$url = $self['photo'];
	echo "<img src='$url' width='175px'height='175px'>";
}
?>