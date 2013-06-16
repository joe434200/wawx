<?php

require_once('base.php');
require_once('admin_base.php');
require_once('SessionUtil.php');
require_once('ConstUtil.php');
require_once('MessageUtil.php');
require_once('AdminIndexBusiness.php');


$logger = LoggerManager::getLogger('index');


$logger->info('导航：開始');

$adminindexbsi = new AdminIndexBusiness();
if ($_REQUEST['act'] == 'ini'||empty($_REQUEST['act']))//
{
   
	 //$smarty->assign('shop_url', urlencode($ecs->url()));

    $smarty->display("backstage/index.htm");
}
/*------------------------------------------------------ */
//-- 顶部框架的内容
/*------------------------------------------------------ */
elseif ($_REQUEST['act'] == 'top')
{
    // 获得管理员设置的菜单
    $lst = array();
    $nav = $adminindexbsi->getMyTopNavigators($_SESSION['admininfo']['ID']);

   
    // 获得管理员设置的菜单

    // 获得管理员ID
 
    $smarty->assign('nav_list', $nav);
    $smarty->assign('admin_id', $_SESSION['admininfo']['ID']);
   
    
    


    $smarty->display('backstage/top.htm');
}
/*------------------------------------------------------ */
//-- 计算器
/*------------------------------------------------------ */

elseif ($_REQUEST['act'] == 'calculator')
{
    $smarty->display('backstage/calculator.htm');
}

/*------------------------------------------------------ */
//-- 左边的框架
/*------------------------------------------------------ */
elseif ($_REQUEST['act'] == 'menu')
{
    if ($_SESSION['admininfo']['usertype'] == '1')
    {
    	$usertype = '1';
    }
    else 
    {
    	$usertype = '0';
    }
	$menus = $adminindexbsi->getMyLeftMenus($usertype);
    $smarty->assign('menus',     $menus);
    
  
   
    $smarty->display('backstage/menu.htm');
}
/*------------------------------------------------------ */
//-- 拖动的帧
/*------------------------------------------------------ */

elseif ($_REQUEST['act'] == 'drag')
{
    $smarty->display('backstage/drag.htm');;
}

/*------------------------------------------------------ */
//-- 主窗口，起始页
/*------------------------------------------------------ */
elseif ($_REQUEST['act'] == 'main')
{
	$smarty->display('start.htm');
}



?>