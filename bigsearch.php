<?php
require_once('base.php');
require_once('BigSearchBusiness.php');
$module = $_REQUEST['module'];
$bigsearchbus=new BigSearchBusiness();

//截取字符串，否则中文可能乱码
function utf8Substr($str, $from, $len)
{
	return preg_replace('#^(?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,'.$from.'}'.
			'((?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,'.$len.'}).*#s',
			'$1',$str);
}

if ($module=='init')//初始化
{
	$currpage = $_REQUEST['p'];//分页的当前页数
	$key=$_REQUEST['keyword'];
	$type=$_SESSION['barType'];
	if($type <2)
	{
		$type = 2;
	}
	if(empty($currpage))
	{
		$currpage = 1;
	}
	$numbersperpage = 8;//每页显示几个帖子
	$time = microtime(true);
	$searchdata=$bigsearchbus->Searchinfo($key, $type, $currpage, $numbersperpage);
	$runtime = microtime(true) - $time;
	$runtime=number_format($runtime,2);
	if($type==4)
	{
		foreach ($searchdata as &$value)
		{
	
				$value['content']=utf8Substr($value['content'],0,80);
		}
	}
	$totalpages = $bigsearchbus->getTotalPage();//总共分多少页
	$lngtype = 2;        //分页语言
	$smarty->assign("lngtype",$lngtype);
	$smarty->assign("pagecount",$totalpages);
	$smarty->assign("type",$type);
	$smarty->assign("key",$key);
	$smarty->assign("runtime",$runtime);
	$smarty->assign("searchdata",$searchdata);
	$smarty->display("bigsearch/bigsearch.tpl");
}
elseif ($module=='changesearch')
{
	$_SESSION['barType']=$_GET['searchtype'];
}
?>