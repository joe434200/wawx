<?php
require_once('base.php');
require_once('BigSearchBusiness.php');
$module = $_REQUEST['module'];
$bigsearchbus=new BigSearchBusiness();
if ($module='init')//初始化
{
	$currpage = $_REQUEST['p'];//分页的当前页数
	$key=$_REQUEST['keyword'];
	$type=$_SESSION['barType'];
	if(empty($currpage))
	{
		$currpage = 1;
	}
	$numbersperpage = 2;//每页显示几个帖子
	
	$searchdata=$bigsearchbus->Searchinfo($key, $type, $currpage, $numbersperpage);
	//echo "<pre>";
	//print_r($searchdata);
	$totalpages = $bigsearchbus->getTotalPage();//总共分多少页
	$lngtype = 2;        //分页语言
	$smarty->assign("lngtype",$lngtype);
	$smarty->assign("pagecount",$totalpages);
	$smarty->assign("type",$type);
	$smarty->assign("key",$key);
	$smarty->assign("searchdata",$searchdata);
	$smarty->display("bigsearch/bigsearch.tpl");
}

?>