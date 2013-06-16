<?php

require_once('base.php');
require_once('SessionUtil.php');
require_once('ConstUtil.php');
require_once('MessageUtil.php');
require_once('AdminLoginBusiness.php');
require_once('SupportException.php');



$logger = LoggerManager::getLogger('login');


$logger->info('登录：開始');
$adminbsi = new AdminLoginBusiness();

if ($_REQUEST['act'] == 'login'||empty($_REQUEST['act']))//
{
   

	SetRememberInfo($smarty);
	$homeurl = 'index.php';
	$forgetpwdurl = 'get_password.php?act=forget_pwd';
	$smarty->assign("home",$homeurl);
	$smarty->assign("forget",$forgetpwdurl);
    $smarty->display("backstage/login.htm");
}
else if ($_REQUEST['act'] == 'captcha')//生成验证码
{

    $img = new captcha('../data/captcha/');
     
    @ob_end_clean(); //清除之前出现的多余输入
    $img->generate_image();
    

    exit;
}
else if ($_REQUEST['act'] == 'submit')
{
	$username = $_POST['username'];
	$password = $_POST['password'];
	$vercode = $_POST['captcha'];
	$rememberstatus = $_POST['rememberstatus'];
	
	if(!empty($rememberstatus))
   	{  
   		// 如果用户选择了，记录登录状态就把用户名和加了密的密码放到cookie里面
   		//首先清空原来的值
		setcookie("username", '', -1);
		setcookie("password", '', -1);
		setcookie("rememberstatus",'',-1);

		setcookie("username", $username, time()+3600*24*365);
		setcookie("password", $password, time()+3600*24*365);
		setcookie("rememberstatus",$rememberstatus,time()+3600*24*365);
	}
	else
	{
		if (empty($rememberstatus) )
		{
			setcookie("username", '', -1);
			setcookie("password", '', -1);
			setcookie("rememberstatus",'',-1);
		}
	}
		
	try
	{
		
		
		$rs = $adminbsi->isUserExist($username, $password,$vercode,false);//用户不存在
	 	
		$_SESSION['admininfo'] = $rs;
		
		//$smarty->display('index/index.php');
        echo "<script language='javascript'>";
		echo "window.location='admin_home.php';";
		echo "</script>";
		
		
	}
	catch(Exception $e)
	{
		
		
		$logger->error($e);
    	header('X-JSON: ' . createJsonError($e));
		$test = createJsonError($e);
        $smarty->assign('array', $test);
        SetRememberInfo($smarty);
        
        $smarty->display('backstage/login.htm');
	}
	
	
	
	
}
// ログアウト操作
elseif ($_REQUEST['act'] == 'logout') {
	
	
	session_destroy();
	//$smarty->display('login.tpl');
	echo "<script language='javascript'>";
	echo "location='admin_login.php';";
	echo "</script>";

// 初期化
}


function   SetRememberInfo($smarty)
{
	$smarty->assign("username",$_COOKIE['username']);
	$smarty->assign("password",$_COOKIE['password']);
	$smarty->assign("rememberstatus",$_COOKIE['rememberstatus']);

}

?>