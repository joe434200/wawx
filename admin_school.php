<?php

require_once('base.php');
require_once('admin_base.php');
require_once('SessionUtil.php');
require_once('ConstUtil.php');
require_once('MessageUtil.php');
require_once('AdminSchoolBusiness.php');
require_once('SupportException.php');
require_once('AdminCityBusiness.php');




$logger = LoggerManager::getLogger('login');


$logger->info('学校列表：開始');
$admin = new AdminSchoolBusiness();
$citybsi = new AdminCityBusiness();
//追加和编辑时使用
if ($_REQUEST['act'] == 'add' || $_REQUEST['act'] == 'edit' || $_REQUEST['act'] == 'import')
{
	
	$countrylist = $citybsi->getAllChilds('0','99999');
	$provincelist = $citybsi->getAllChilds('1',null);
	$citylist = $citybsi->getAllChilds('2',null);
	$skirtlist = $citybsi->getAllChilds('3',null);
	
	$smarty->assign("countrylist",$countrylist);
	$smarty->assign("provincelist",$provincelist);
	$smarty->assign("citylist",$citylist);
	$smarty->assign("skirtlist",$skirtlist);
}




if (empty($_REQUEST['act']) || $_REQUEST['act'] == 'list')//列表
{
	
	//-----------------------------------------------------------------
	$currpage = $_REQUEST['p'];
	if (empty($currpage))
	{
		$currpage = 1;
	}
	$schoollist = $admin->getAllSchools($currpage,PAGE_NUMBER);//修改为自己的分页查询函数
	//$pagepar = array("pagecount"=>$adminmodule->getTotalPage(),"recordcount"=>$adminmodule->getTotalRow(),"currpage"=>$currpage,"numberpage"=>$numberpage);
	$smarty->assign("pagecount",$admin->getTotalPage());
	//----------------分页公共部分---------------------------
	$smarty->assign("schoollist",$schoollist);

	//---------公共部分，看看是否需要加入------------------
	$smarty->assign("url_here",$_TITLES['01_school_list']['text']);//url_here不能更改
	$smarty->assign("action_link",array($_TITLES['04_school_import'],$_TITLES['02_school_add']));//action_link 不能更改，或者为action_link1
	
	
	$smarty->display("backstage/school_list.htm");
}
else if ($_REQUEST['act'] == 'import')
{
	$smarty->assign("schoollist",$admin->getAllBatchRecords());
	$smarty->assign("url_here",$_TITLES['04_school_import']['text']);//url_here不能更改
	$smarty->display("backstage/school_import.htm");
}
else if ($_REQUEST['act'] == 'delimport')
{
	
	$info = $_REQUEST['info'];
	
	$updateid = explode("@", $info);
	
	$id = $updateid[0];
	
	$data['idm_city4'] = $updateid[1];
	$data['idm_city1'] = $updateid[2];
	$data['idm_city2'] = $updateid[3];
	$data['idm_city3'] = $updateid[4];
	$admin->updateSchools($data, $id);
	
	echo "<script language='javascript'>";
	echo "location='admin_school.php?act=import';";
	echo "</script>";
}






else if ($_REQUEST['act'] == 'add')
{
	
	$smarty->assign("url_here",$_TITLES['02_school_add']['text']);//url_here不能更改
	$smarty->display("backstage/school_add.htm");
}
else if ($_REQUEST['act'] == 'edit')
{
	$mid = $_REQUEST['id'];
	$data = $admin->getOneSchoolByID($mid);
	$smarty->assign("data",$data[0]);//url_here不能更改
	
	$smarty->assign("url_here",$_TITLES['03_school_edit']['text']);//url_here不能更改
	$smarty->display("backstage/school_add.htm");
	
	
}
else if ($_REQUEST['act'] == 'del')
{
	$mid = $_REQUEST['id'];
	$admin->deleteSchools($mid);
	echo "<script language='javascript'>";
	echo "location='admin_school.php';";
	echo "</script>";
}
else if ($_REQUEST['act'] == 'submit')
{
	$id = $_REQUEST['id'];
	$data = $_POST['data'];
	$data['importflg'] = '1';
	
	
	

	if (empty($id))//新增
	{
		$admin->insertSchools($data);
	}
	else //更新
	{
		$admin->updateSchools($data, $id);
	}
	echo "<script language='javascript'>";
	echo "location='admin_school.php';";
	echo "</script>";
}
else if ($_REQUEST['act'] == 'importsubmit')
{
	
	   
		$upfile= './uploadfiles/backstage/'.date('YmdGis').'school'.'.csv';
		$do = move_uploaded_file($_FILES['pure_ink']['tmp_name'],$upfile);

		if (!$do)
		{
			echo '文件上传失败，文件大小不合适。';
			echo "<br/><a href='admin_school.php?act=import'>返回</a>";
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
	    if(!($data1[0]=='schoolname'&&$data1[1]=='schooladdr'&&$data1[2]=='introduction'))//使用数据表中的字段名
	 	{
	 		echo '不是学校列表csv文件要求的格式';
	 		echo "<br/><a href='admin_school.php?act=import'>返回</a>";
			exit;
	 	}
	 	
     	while ($data = fgetcsv($file))
     	{

      		$ink['schoolname'] = $data[0];
          	$ink['schooladdr'] = $data[1];
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
	echo "location='admin_school.php?act=import';";
	echo "</script>";
}
else if ($_REQUEST['act'] == 'ajaxlist')
{
	
	$pid = $_REQUEST['pid'];
	
	$plist = $citybsi->getAllChilds(null,$pid);
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