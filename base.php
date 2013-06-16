<?php
Session_start ();
header ( "Content-Type:text/html; charset=UTF-8" );
error_reporting ( E_ERROR );
define ( 'BaseUrl', dirname ( __FILE__ ) );
date_default_timezone_set ( 'Asia/Shanghai' );
preg_match ( '/\/([^\/]+\.[a-z]+)[^\/]*$/', $_SERVER ['SCRIPT_NAME'], $match );
$page_name = $match [1];

/*if(!isset($_SESSION['login_ok']) && $_SESSION['login_ok'] != '1' && $page_name != 'login.php'){
	header('Location:login.php');
	exit();
}*/

$_ENV ['log4php.configuration'] = BaseUrl . '/config/log4php.properties';
set_include_path ( '.' . PATH_SEPARATOR . BaseUrl . '/business/' . PATH_SEPARATOR . BaseUrl . '/util/' . PATH_SEPARATOR . BaseUrl . '/templates/' . PATH_SEPARATOR . BaseUrl . '/lib/log4php/' . //. PATH_SEPARATOR . BaseUrl.'/lib/html2pdf/'
PATH_SEPARATOR . BaseUrl . '/lib/tcpdf/' . PATH_SEPARATOR . BaseUrl . '/function/' . 
PATH_SEPARATOR . BaseUrl . '/pchart/' . PATH_SEPARATOR . BaseUrl . '/lib/phpmailer/' . 
PATH_SEPARATOR . BaseUrl . '/lib/Getoip/' . PATH_SEPARATOR . BaseUrl . '/lib/PHPExcel/' . 
PATH_SEPARATOR . BaseUrl . '/config/' . PATH_SEPARATOR . '/plugin/editor/php' . PATH_SEPARATOR .
get_include_path () );

require_once ('Const.php');
require_once ('JSON.php');
require_once ('LoggerManager.php');
require_once ('MySmarty.inc');
require_once ('TplConstTitle.php');
require_once('BackTplConstTitle.php');
require_once('MMUtil.php');

//if(!isset($_SESSION['user_info']) && str_replace('/', '', $_SERVER['PHP_SELF']) != 'login.php') {
//header('Location:login.php');
//}


set_time_limit ( 0 );
ini_set ( 'session.gc_maxlifetime', 3600 / 12 );

$smarty = new MySmarty ();
$smarty->template_dir = BaseUrl . '/templates';

$smarty->assign ( 'userInfo', $_SESSION ['userinfo'] );
$smarty->assign ( 'backstagehome', $_TITLES ['00_home'] );

//$smarty->assign('nowdate', $_SESSION['userinfo']);


function createJsonRedirect($url)
{
    $result = array ();
    $result ['result'] = "redirect";
    $result ['redirect'] = $url;
    $json = new Services_JSON ();
    return $json->encode ( $result );
}

function createJonSuccess($func_name, $param_data)
{
    $result = array ();
    $result ['result'] = $func_name;
    $result ['params'] = $param_data;
    $json = new Services_JSON ();
    return $json->encode ( $result );
}

function createJsonError($validate_result)
{
    
    $json = new Services_JSON ();
    $result = array ();
    $result ['result'] = "error";
    $result ['error'] = $validate_result->getErrors ();
    //return $json->encode($result);
    return $result;
}

function createJsonError1($validate_result)
{
    
    $json = new Services_JSON ();
    $result = array ();
    $result ['result'] = "error";
    $result ['error'] = $validate_result->getErrors ();
    
    return $json->encode ( $result );
}
