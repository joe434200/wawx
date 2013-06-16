<?php
require_once ('base.php');
require_once ('LoginBusiness.php');
require_once ('SessionUtil.php');
require_once ('ConstUtil.php');
require_once ('RegisterBusiness.php');

if ($_REQUEST ['module'] == "init" || $_REQUEST ['module'] == "key_1st" || empty ( $_REQUEST ['module'] ))
{
    $step = "1";
}
elseif ($_REQUEST ['module'] == "key_2nd")
{
    $step = "2";
}
else
{
    $step = "3";
}

$smarty->assign ( 'step', $step );
$smarty->display ( 'register/zhuce_key.tpl' );
?>