<?php

require_once('base.php');
require_once('admin_base.php');
require_once('SessionUtil.php');
require_once('ConstUtil.php');
require_once('MessageUtil.php');
require_once('AdminCityBusiness.php');
require_once('SupportException.php');



$logger = LoggerManager::getLogger('login');


$logger->info('城市：開始');
$admin = new AdminCityBusiness();

$allcountries = $admin->getAllChilds('0',null);




if (empty($_REQUEST['act']) || $_REQUEST['act'] == 'list')//列表
{
	
	//-----------------------------------------------------------------
	$currpage = $_REQUEST['p'];
	if (empty($currpage))
	{
		$currpage = 1;
	}
	$citylist = $admin->getAllCities($currpage,PAGE_NUMBER);//修改为自己的分页查询函数
	//$pagepar = array("pagecount"=>$adminmodule->getTotalPage(),"recordcount"=>$adminmodule->getTotalRow(),"currpage"=>$currpage,"numberpage"=>$numberpage);
	$smarty->assign("pagecount",$admin->getTotalPage());
	//----------------分页公共部分---------------------------
	$smarty->assign("citylist",$citylist);

	//---------公共部分，看看是否需要加入------------------
	$smarty->assign("url_here",$_TITLES['01_city_list']['text']);//url_here不能更改
	$smarty->assign("action_link",array($_TITLES['04_city_import'],$_TITLES['02_city_add']));//action_link 不能更改，或者为action_link1
	
	$smarty->assign("levels",ConstUtil::getCityLevels());
	$smarty->display("backstage/city_list.htm");
}
else if ($_REQUEST['act'] == 'import')
{
	$smarty->assign("levels",ConstUtil::getCityLevels());
	$smarty->assign("citylist",$admin->getAllBatchRecords());
	$smarty->assign("url_here",$_TITLES['04_city_import']['text']);//url_here不能更改
	$smarty->display("backstage/city_import.htm");
}
else if ($_REQUEST['act'] == 'importsubmit')
{
	
	   
		$upfile= './uploadfiles/backstage/'.date('YmdGis').'city'.'.csv';
		$do = move_uploaded_file($_FILES['pure_ink']['tmp_name'],$upfile);

		if (!$do)
		{
			echo '文件上传失败，文件大小不合适。';
			echo "<br/><a href='admin_city.php?act=import'>返回</a>";
			exit;
		}
	 	$file = fopen($upfile,'r');
	 	$row=1;
	 	$inserdata = array();
	 	$insertbasenum = 200;
	 	$alldatanum = 0;
	 	$data1 = fgetcsv($file);//排除第1行，表头
	 	$data1=ConstUtil::encodeUTF8($data1);
	 	
	 	//判断csv文件是否与数据库一致
	    if(!($data1[0]=='name'&&$data1[1]=='level'&&$data1[2]=='introduction'))//使用数据表中的字段名
	 	{
	 		echo '不是城市列表csv文件要求的格式';
	 		echo "<br/><a href='admin_city.php?act=import'>返回</a>";
			exit;
	 	}
	 	
     	while ($data = fgetcsv($file))
     	{

      		$ink['name'] = $data[0];
          	$ink['level'] = $data[1];
          	$ink['introduction']= $data[2];
          	$ink['importflg'] = '0';
          	
          	$alldatanum++;
          	if ($alldatanum % $insertbasenum == 0)//到了基数
          	{
          		$admin->batchInsert($inserdata);
          		$inserdata = array();
          	}
          	$inserdata[] = ConstUtil::encodeUTF8($ink);
        }
        if ($alldatanum % $insertbasenum != 0)
        {
        	$admin->batchInsert($inserdata);
        }
       // echo $alldatanum;
  // }
    fclose($file);

   // 跳转到第List画面
	echo "<script language='javascript'>";
	echo "location='admin_city.php?act=import';";
	echo "</script>";
}






else if ($_REQUEST['act'] == 'add')
{
	$smarty->assign("preflg",$_REQUEST['pre']);
	$smarty->assign("countries",$allcountries);
	$smarty->assign("levels",ConstUtil::getCityLevels());
	$smarty->assign("url_here",$_TITLES['02_city_add']['text']);//url_here不能更改
	$smarty->display("backstage/city_add.htm");
}
else if ($_REQUEST['act'] == 'edit')
{
	
	$smarty->assign("preflg",$_REQUEST['pre']);
	$mid = $_REQUEST['id'];
	$data = $admin->getOneCityByID($mid);

	
	if ($data[0]['pid3'] == '99999')//区
	{
		$pdata1 = $admin->getAllChilds(null,$data[0]['pid3']);//国家
		$pdata2 = $admin->getAllChilds(null,$data[0]['pid2']);//省
		$pdata3 = $admin->getAllChilds(null,$data[0]['pid1']);//市
		
		//$data[0]['pid3'] = $data[0]['pid1'];
		//$data[0]['pid2'] = $data[0]['pid1'];
	}
	else if ($data[0]['pid2'] == '99999')//市
	{
		$pdata1 = $admin->getAllChilds(null,$data[0]['pid2']);//国家
		$pdata2 = $admin->getAllChilds(null,$data[0]['pid1']);//省
		$data[0]['pid2'] = $data[0]['pid2'];
		$data[0]['pid1'] = $data[0]['pid0'];
		
		
	}
	else if ($data[0]['pid1'] == '99999')//省
	{
		
		$data[0]['pid2'] = $data[0]['pid0'];
		
		
	}

	
	
	$smarty->assign("levels",ConstUtil::getCityLevels());
	$smarty->assign("data",$data[0]);//url_here不能更改
	$smarty->assign("pdata1",$pdata1);//url_here不能更改
	$smarty->assign("pdata2",$pdata2);//url_here不能更改
	$smarty->assign("pdata3",$pdata3);//url_here不能更改
	
	$smarty->assign("countries",$allcountries);
	$smarty->assign("url_here",$_TITLES['03_city_edit']['text']);//url_here不能更改
	$smarty->display("backstage/city_add.htm");
	
	
}
else if ($_REQUEST['act'] == 'del')
{
	$mid = $_REQUEST['id'];
	$admin->deleteCities($mid);
	echo "<script language='javascript'>";
	echo "location='admin_city.php';";
	echo "</script>";
}
else if ($_REQUEST['act'] == 'submit')
{
	$id = $_REQUEST['id'];
	$data = $_POST['data'];
	$data['importflg'] = '1';

	if ($data['level'] == '1')
	{
		$data['parentid'] = '99999';
	}
	else if ($data['level'] == '2')
	{
		$data['parentid'] = $_POST['parent1'];
	}
	else if ($data['level'] == '3')
	{
		$data['parentid'] = $_POST['parent2'];
	}
	else if ($data['level'] == '4')
	{
		$data['parentid'] = $_POST['parent3'];
	}
	$data['level'] = $data['level']-1;
	
	
	
	

	if (empty($id))//新增
	{
		$admin->insertCities($data);
	}
	else //更新
	{
		$admin->updateCities($data, $id);
	}
	if ($_POST['preflg'] == '1')
	{
		echo "<script language='javascript'>";
		echo "history.go(-2)";
		echo "</script>";
	}
	else 
	{
		echo "<script language='javascript'>";
		echo "location='admin_city.php';";
		echo "</script>";
	}
}
else if ($_REQUEST['act'] == 'ajaxlist')
{
	
	$pid = $_REQUEST['pid'];
	$level = $_REQUEST['level'];
	$plist = $admin->getAllChilds(null,$pid);
	$jsarr = json_encode($plist);

	if(!empty($jsarr)){
	    	echo $jsarr;
	}
	else
	{
			echo null;
	}
}



?>