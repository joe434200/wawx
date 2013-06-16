<?php

require_once('base.php');
require_once('LoginBusiness.php');
require_once('SessionUtil.php');
require_once('ConstUtil.php');

//获取module
$module = $_REQUEST['module'];

$loginbusi = new LoginBusiness();

//设置session生存时间
//$lifeTime = 5 * 3600;
//setcookie(session_name(), session_id(), time() + $lifeTime, "/");
//初始化画面

IF (empty($module) || !isset($module))
{
	//TplConstTitle::setPageTitle($smarty, 'Login');
	if(empty($_SESSION['baseinfo']))
	{ //检查一下session是不是为空

		if(empty($_COOKIE['email']) || empty($_COOKIE['password']))
		{

		}
		else
		{
			if($_COOKIE['rememberstatus']=="1")
			{
					$smarty->assign("email",$_COOKIE['email']);
					$smarty->assign("password",$_COOKIE['password']);
					$smarty->assign("rememberstatus",$_COOKIE['rememberstatus']);
			}

		
		}
      }
      else 
      {
      		echo "<script language='javascript'>";
      		echo "alert('您已登陆，正在跳转首页');";
			echo "location='index.php';";
			echo "</script>";
      }

	$smarty->display("login/login.tpl");
}
/*ELSEIF ($module == "login")
{
	//echo "<pre>";
	//print_r($_POST['data']);
	$otherdata = array();
	//提取用户和企业共同信息
	$basedata = $loginbusi->getLoginUserInfo($_POST['data']['email'], $_POST['data']['password']);
	
	if($basedata['usertype']==0)
	{
		$otherdata = $loginbusi->getUserInfo($_POST['data']['email'], $_POST['data']['password']);
		$_SESSION['otherinfo'] = $otherdata;
	}else 
	{
		$otherdata = $loginbusi->getShopInfo($_POST['data']['email'], $_POST['data']['password']);
		$_SESSION['otherinfo'] = $otherdata;
	}
	
	$_SESSION['baseinfo'] = $basedata;
	$_SESSION['loginok'] = 1;

	//echo "<pre>";
	//print_r($_SESSION['baseinfo']);
	//print_r($_SESSION['otherinfo']);
	//exit();
	echo "<script language='javascript'>";
	echo "location='index.php';";
	echo "</script>";
	
	
}*/
ELSE IF ($module == "checkuser")
{
	$email = $_REQUEST['n_email'];
	$pwd = $_REQUEST['n_password'];
	

	$rememberstatus = $_REQUEST['n_rememberstatus'];

	$rs = $loginbusi->checkIsExist($email,$pwd);
	
	IF ($rs == 1 || $rs == 2 )//用户不存在或密码错误
	{
		$echomsg = "";
		$echomsg = "*".MessageUtil::getMessage('E000'.$rs."_ZH");
		echo $echomsg;
	}
	ELSE
	{
		 if($rememberstatus=="select")
   		 {  // 如果用户选择了，记录登录状态就把用户名和加了密的密码放到cookie里面
   		 	//首先清空原来的值
			setcookie("email", '', -1);
			setcookie("password", '', -1);
			setcookie("rememberstatus",'',-1);
			
			setcookie("email", $email,time()+3600*24*365);
			setcookie("password", $pwd,time()+3600*24*365);
			setcookie("rememberstatus",'1',time()+3600*24*365);
		}
		else
		{
			setcookie("email", '', -1);
			setcookie("password", '', -1);
			setcookie("rememberstatus",'',-1);
		}
		//echo "<pre>";
		//print_r($_POST['data']);
		//echo $_COOKIE['email']."aaaaaaaaa";
		$otherdata = array();
		//提取用户和企业共同信息
		$basedata = $loginbusi->getLoginUserInfo($email,$pwd);
		
		if($basedata['usertype']==0)
		{
			$otherdata = $loginbusi->getUserInfo($email,$pwd);
			$_SESSION['otherinfo'] = $otherdata;
		}else 
		{
			$otherdata = $loginbusi->getShopInfo($email,$pwd);
			$_SESSION['otherinfo'] = $otherdata;
		}
		
		$_SESSION['baseinfo'] = $basedata;
		$_SESSION['loginok'] = 1;
		
		echo 0;
	}
	
}
ELSE IF ($module == "logout")
{
	session_destroy();
	
	echo "<script language='javascript'>";
	echo "location='login.php';";
	echo "</script>";
	
}
//错误画面
ELSE 
{
	//
}


?>