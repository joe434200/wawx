<?php

require_once ('base.php');
require_once ('HdBusiness.php');
require_once ('SessionUtil.php');
require_once ('ConstUtil.php');
require_once('GroupBusiness.php');

$hd = new hdBusiness ();
$groupbusi = new GroupBusiness();
$grpID=$_GET['ID'];
$hd_id=$_GET['hd_id'];
$currdate = date("Y-m-d H:i:s");
$module = $_REQUEST['module'];
$_SESSION['baseinfo']['ID'];

 //-------------------add by zrh---------------------
$_SESSION['barType'] = 3;
//-------------------add by zrh end-------------------

//活动首页
if ($_REQUEST ['module'] == "hd_index" || $_REQUEST ['module'] == "" ) 
{
	
	// $data = $hd->getUse_info($_SESSION['baseinfo']['ID']);
	 $order =" m.attentionnum DESC limit 0,5 ";
	 $order_city = " m.attentionnum DESC limit 0,12 ";
	 $where_theme = "m.themeflg = '1' ";
	 $order_theme = "m.attentionnum DESC limit 0,3 ";
	 $where_time = "m.begintime <'$currdate' ";
	 $order_time= " m.attentionnum ASC limit 0,2 ";
	 $order_like=" m.membernum DESC limit 0,3 ";
	 $data_hot_hd = $hd->getAct_list_order_log("1,2,3,4","",$order);
	 $data_hot_city = $hd->getAct_list_order_log(1,"",$order_city);
	 $data_hot_online = $hd->getAct_list_order_log(2,"",$order);
	 $data_theme = $hd->getAct_list($where_theme,$order_theme);
	 $data_past = $hd->getAct_list($where_time,$order_time);
	 $data_like = $hd->getAct_list_order_log("1,2,3,4","",$order_like);
	 
	 foreach($data_hot_city as $key => $value)
	 {
	 	$end = strtotime($data_hot_city[$key]['endtime']);
	 	$begin = strtotime($data_hot_city[$key]['begintime']);
	 	$data_hot_city[$key]['endtime'] = date("m-d",$end);
		$data_hot_city[$key]['begintime'] = date("m-d",$begin);
	 	/*
	 	$arr1 = explode("/",$data_city[$key]['begintime']);
   		$arr2 = explode("/",$data_city[$key]['endtime']);
   		$beginstamp = mktime(0,0,0,$arr1[1],$arr1[0],0);
   		$endstamp = mktime(0,0,0,$arr2[1],$arr2[0],0);
	 	//$begin = strtotime($beginstamp);
	 	//$end = strtotime($endstamp);
	 	$data_hot_city[$key]['endtime'] = date("m-d",$endstamp);
		$data_hot_city[$key]['begintime'] = date("m-d",$beginstamp);
		*/ 
	
	 }
	 
	
	// $smarty->assign('use_info',$data);
	 $smarty->assign('act_hots',$data_hot_hd);
	  $smarty->assign('act_citys',$data_hot_city);
	   $smarty->assign('act_city_time',$data_city);
	    $smarty->assign('act_city_onlines',$data_hot_online);
	    $smarty->assign('data_themes',$data_theme);
	    $smarty->assign('data_times',$data_past);
	     $smarty->assign('data_likes',$data_like);
	   $smarty->display ( 'hd/hd_index.tpl' );
	
	
}




//活动列表
else if ($_REQUEST ['module'] == "hd_list_time")
{
		$log =$_GET['log'];
		$where_time = "m.begintime >='$currdate' and m.idm_act_catalog = $log";
		$order_time= " m.begintime ASC ";
		$data_hot_city = $hd->getAct_list($where_time,$order_time);
		$smarty->assign('act_lists',$data_hot_city);
		$smarty->display ( 'hd/hd_list.tpl' );
}


 
//发起活动页面
else if ($_REQUEST ['module'] == "hd_new")
{
	
	$place_parent = $hd->getCountry();
	$parent = $hd->getActCatalog($_GET['log']);
	
	$smarty->assign('parent',$parent);
	$smarty->assign('place_parent',$place_parent);
    $smarty->display ( 'hd/hd_new.tpl' );
}

//创建人员屏蔽活动评论
else if($_REQUEST ['module'] == "shield")
{
	$data_hd = $hd->getAct($_GET['ID']);
	if($_SESSION['baseinfo']['ID']==$data_hd['0']['creater'])
	{
		$data_hd1['replynum']=$data_hd['0']['replynum']-1;
		$rs1['shieldflg']='1';
		$hd->UpdateData("t_act_remark",$rs1,"u.ID='".$_GET['remark_ID']."'");
		$hd->UpdateData("t_act_main",$data_hd1,"u.ID='".$_GET['ID']."'");
	}
	echo "<script language='javascript'>";
	echo "location='hd.php?module=hd_list_show1&hd_id=".$_GET['ID']."'";
	echo "</script>";
}
//发表互动评论
else if($_REQUEST ['module'] == "remark")
{
	if($_GET['remark']=="1")
	{
		$data_act = $hd->getAct($hd_id);
		$data_remark['replynum'] = $data_act['0']['replynum']+1;
		
		$data['idt_act_main']=$hd_id;
		$data['content']=$_POST['remark_textarea'];
		$data['creater']=$_SESSION['baseinfo']['ID'];	
		$data['createtime']= $currdate;
		$data['shieldflg'] = "0";
		$hd ->UpdateData("t_act_main",$data_remark,"u.ID='".$hd_id."'");
		$remark_id = $hd ->Insert("t_act_remark", $data);
	}
		echo "<script language='javascript'>";
		echo "location='hd.php?module=hd_list_show1&hd_id=".$hd_id."'";
		echo "</script>";
}

//活动详细<---非发起活动
else if ($_REQUEST ['module'] == "hd_list_show1")
{
	$data_hd = $hd->getAct_info($hd_id);
	
	if($data_hd[0]['grpflg'])
	{
	echo "<script language='javascript'>";
	echo "location='grp_act.php?module=single&ID=".$data_hd[0]['idt_grp_main']."&actID=".$hd_id."';";
	echo "</script>";
	}
	else 
	{
	$order_mem = " m.jointime DESC limit 0,6 ";
	$ordersql = " createtime DESC limit 0,5 ";
	$order_like=" m.membernum DESC limit 0,3";
	$order_remark =" m.createtime DESC limit 0,2";
	$data_mem = $hd->getMem($hd_id,$order_mem);
	$data_hd_photo = $hd->getAct_photo($hd_id,$ordersql);
	$data_like = $hd->getAct_list_order_log("1,2,3,4","",$order_like);
	$data_remark = $hd->getRem_info($hd_id,$order_remark);
	$data_hd[0]['place'] = $hd->get_hd_place($data_hd[0]['place']);
	$data_hd[0]['begintime'] = strtotime($data_hd[0]['begintime']);
	$data_hd[0]['begintime'] =  date("Y-m-d",$data_hd[0]['begintime']);
	$data_hd[0]['endtime'] = strtotime($data_hd[0]['endtime']);
	$data_hd[0]['endtime'] =  date("Y-m-d",$data_hd[0]['endtime']);
	$smarty->assign('mem_info',$data_mem);
	$smarty->assign('act_info',$data_hd[0]);
	$smarty->assign('data_likes',$data_like);
	$smarty->assign('data_hd_photo',$data_hd_photo);
	$smarty->assign('date_new',$currdate);
	$smarty->assign('data_remarks',$data_remark);
	$smarty->display ( 'hd/hd_list_show.tpl' );
	}
	
}



/*
//活动详细页面<---发起活动--------------------------已经没用了--------哎----------------
else if ($_REQUEST ['module'] == "hd_list_show")
{
	if($_POST['originator'] == $_SESSION['code'])//  上个tpl中保留的code的随机值，再这个PHP中进行对比，防止恶意刷新
	{
	if($_FILES['picPath']['name']!=NULL)//
	{
		
	   $imageName = $hd->Insert_file($_FILES['picPath'],"hdImage");
	    
	}
	$data['photo']=$imageName;
	$data['actname'] = $_POST['actname'];
	$data['idm_act_catalog'] = $_POST['selSec'];
	$arr1 = explode("/",$_POST['date1']);
    $arr2 = explode("/",$_POST['date2']);

    $timestamp1 = mktime('0','0','0',$arr1[1],$arr1[0],$arr1[2]);   
    $timestamp2 = mktime('0','0','0',$arr2[1],$arr2[0],$arr2[2]);
   
    $data['begintime'] = date("Y-m-d",$timestamp1);
    $data['endtime'] = date("Y-m-d",$timestamp2);

    $data['createtime'] = $currdate;
    $data['attentionnum'] = 0;
    $data['membernum'] = 0;
    if($grpID)
    {
    $data['idt_grp_main'] = $grpID;
    $data['grpflg'] = 1;
    }
    if( $_POST['place_parent'] != null)
    {
    $data['place'] = $_POST['place_parent'];
    }
    else if( $_POST['place_son'] != null)
    {
    $data['place'] = $_POST['place_son'];
    }
	else if( $_POST['place_son1'] != null)
    {
    $data['place'] = $_POST['place_son1'];
    }
	else if( $_POST['place_son2'] != null)
    {
    $data['place'] = $_POST['place_son2'];
    }
    $data['cost'] = $_POST['cost'];
	
  
    $data['remcommendflg'] = 0;
	$data['creater'] = $_SESSION['baseinfo']['ID'];
	$data['content'] = $_POST['content'];
	$data['rights'] = $_POST['checkbox_value'];
	$order_like=" m.membernum DESC limit 0,3";
	
	$data_like = $hd->getAct_list_order_log("1,2,3,4","",$order_like);
	$hd_id = $hd ->Insert("t_act_main", $data);
	$data_hd = $hd->getAct_info($hd_id);
	//$data_hd_photo = $hd->getAct_photo($hd_id);
	$data_hd[0]['place'] = $hd->get_hd_place($data_hd[0]['place']);
	$smarty->assign('act_info',$data_hd[0]);
	$smarty->assign('data_likes',$data_like);
	//$smarty->assign('act_info_photo',$data_hd_photo);
	$smarty->display ( 'hd/hd_list_show.tpl' );
	$_SESSION['code'] = $_SESSION['code']+1; //防止用户恶意刷新，用session控制
	}
	else 
	{
		echo "请勿恶意刷新页面";
	}
	
	
     
}

*/



else if ($_REQUEST ['module'] == "hd_list") //活动列表
{
	    $log=$_GET['log'];
	    $fly=$_GET['flg'];
	    $order_web = "";
		$order_city = " m.attentionnum DESC ";
		$order_city1 = " m.attentionnum DESC limit 0,8";
		$order_like=" m.membernum DESC limit 0,3";
		$order_new_hot=" m.attentionnum DESC, m.begintime DESC limit 0,9";
		$data_hot_city = $hd->getAct_list_order_log($log,$fly,$order_city);
		$data_hot_city1 = $hd->getAct_list_order_log($log,$fly,$order_city1);
		$row = 0;
		$arr =array();
		foreach($data_hot_city as $data123)
		{
			$data_hot_city[$key]['place']=$hd->get_hd_place($data_hot_city[$key]['place']);
			$row +=1;
		}
		foreach($data_hot_city1 as $key => $value)
		{
			$data_hot_city1[$key]['place']=$hd->get_hd_place($data_hot_city1[$key]['place']);
		}
		$pages=ceil($row/8);
		if($pages==0)$pages=1;
		for($i=0;$i<$pages;$i++)
		{
			$arr[$i] = $i+1;
		}
		$data_like = $hd->getAct_list_order_log("1,2,3,4","",$order_like);
		if($_SESSION['baseinfo']['loginok'] == '1')
		{
		$t_user = $hd->getUse_info($_SESSION['baseinfo']['ID']);
		$place['ID'] = $t_user[0]['residence'];
		}
		else 
		$place['ID'] = 0;
		
		$data_new_hot = $hd->getAct_list_order_log("1,2,3,4","",$order_new_hot);
		$ip = $hd->getRealIp();
		$place['place'] = $hd->get_address_from_ip($ip);
		$smarty->assign('log',$log);
		$smarty->assign('order',$order_web);
		$smarty->assign('place',$place);
		$smarty->assign('date_new',$currdate);
		$smarty->assign('arr',$arr);
		$smarty->assign('pages',$pages);
	    $smarty->assign('data_likes',$data_like);
	    $smarty->assign('data_new_hots',$data_new_hot);
		$smarty->assign('act_lists',$data_hot_city1);
		$smarty->display ( 'hd/hd_list.tpl' );
}




//刷新页面的分页--活动列表
else if( $_REQUEST ['module'] == "hd_list_pages")
{
	$place = array();
	$order_web = $_GET['order'];
	$place_ordre = $_GET['place'];
	$log = $_GET['log'];
	$page = $_GET['page'];
	if($order_web=="week")
	{
		$order=" m.attentionnum DESC";
		$where="  m.begintime>=DATE_SUB(CURDATE(), INTERVAL 7 DAY)";
		
	}
	else if($order_web=="place")
	{
		
		$order=" m.attentionnum DESC";
		$where=" m.place = ".$place_ordre;
	}
	else if($order_web=="going")
	{
		$order=" m.attentionnum DESC";
		$where=" m.begintime<=CURDATE() and m.endtime>CURDATE()";
	}
	else if($order_web=="ontime")
	{
		$order=" m.begintime ASC";
		$where="";
		
	}
	
		if($order == null)
		$order =" m.attentionnum DESC";
		$page1=($page-1)*8;
	    $order_city = "$order ";
		$order_city1 = " $order limit $page1,8";
		$order_like=" m.membernum DESC limit 0,3";
		$order_new_hot=" m.attentionnum DESC, m.begintime DESC limit 0,9";
		$data_hot_city = $hd->getAct_list_order_log($log,$_SESSION['flg'],$order_city,$where);
		$data_hot_city1 = $hd->getAct_list_order_log($log,$_SESSION['flg'],$order_city1,$where);
		$row = 0;
		$arr =array();
		foreach($data_hot_city as $key => $value)
		{
			$data_hot_city[$key]['place']=$hd->get_hd_place($data_hot_city[$key]['place']);
			$row +=1;
		}
		foreach($data_hot_city1 as $key => $value)
		{
			$data_hot_city1[$key]['place']=$hd->get_hd_place($data_hot_city1[$key]['place']);
		}
		$pages=ceil($row/8);
		if($pages==0)$pages=1;
		for($i=0;$i<$pages;$i++)
		{
			$arr[$i] = $i+1;
		}
		$rest=$row-8*($pages-1);
		$t_user = $hd->getUse_info($_SESSION['baseinfo']['ID']);
		$place['ID'] = $t_user[0]['residence'];
		$place['place'] = $hd->get_hd_place($place['ID']);
		$data_like = $hd->getAct_list_order_log("1,2,3,4","",$order_like);
		$data_new_hot = $hd->getAct_list_order_log("1,2,3,4","",$order_new_hot);
		$smarty->assign('place',$place);
		$smarty->assign('order_web',$order_web);
		$smarty->assign('log',$log);
		$smarty->assign('date_new',$currdate);
		$smarty->assign('arr',$arr);
		$smarty->assign('row',$row);
		$smarty->assign('pages',$pages);
		$smarty->assign('rest',$rest);
	    $smarty->assign('data_likes',$data_like);
	    $smarty->assign('data_new_hots',$data_new_hot); 
		$smarty->assign('act_lists',$data_hot_city1);
		$smarty->display ( 'hd/hd_list.tpl' );
		
	
	
}
//ajax---关注
else if( $_REQUEST ['module'] == "attention")
{
	
	$id = $_GET['id'];
	$use_id = $_SESSION['baseinfo']['ID'];
	$data = $hd->getAct_info($id);
	$data_att = $hd->getAtt_info($id,$use_id);
	//$count=mysql_num_rows($data_att);
	$arr_att['idt_act_main']=$id;
	$arr_att['idt_user']=$use_id;
	$arr_att['attentiontime']=$currdate;
	if($data['creater']!=$use_id && count($data_att)==0)
	{
	$arr['attentionnum']=$data[0]['attentionnum']+1;
	$hd->UpdateData("t_act_main",$arr,"u.id='$id'");
	$hd->Insert("t_act_attention", $arr_att);
	$data1 = $hd->getAct_info($id);
	$res = $data1['0']['attentionnum'];
	echo  $res;
	}
	else {echo  $data['0']['attentionnum'];}//返回给oncomplete后面的函数
	
}



	
//ajax---参与
else if( $_REQUEST ['module'] == "member")
{
	
	$id = $_GET['id'];
	$use_id = $_SESSION['baseinfo']['ID'];
	$data = $hd->getAct_info($id);
	$data_mem = $hd->getMem_info($id,$use_id);
	$arr_att['idt_act_main']=$id;
	$arr_att['idt_user']=$use_id;
	$arr_att['jointime']=$currdate;
	$arr_att['outflg']=0;
	if($data['creater']!=$use_id && count($data_mem)==0)
	{
	$arr['membernum']=$data[0]['membernum']+1;
	$hd->UpdateData("t_act_main",$arr,"u.id='$id'");
	$hd->Insert("t_act_member", $arr_att);
	$data1 = $hd->getAct_info($id);
	$res = $data1['0']['membernum'];
	echo $res;//返回给oncomplete后面的函数
	}
	else {echo $data['0']['membernum'];}
	
}


//ajax->>>>>>hd_list的分页，还存在显示问题，由于进度问题，暂时放下，换用刷新页面
else if( $_REQUEST ['module'] == "hd_list_pages_ajax")
{
	
	$page=$_GET['list_page'];
	$list_class = $_GET['list_class'];
	$page1=($page-1)*8;
	$page2=$page*8;
	if($list_class=='1')
	{
		$order_city = " m.attentionnum DESC limit $page1,$page2";
		$data_hot_city1 = $hd->getAct_list_order_log($_GET['log'],$_GET['flg'],$order_city);
	}
	foreach($data_hot_city1 as $key => $value)
	{
		if($data_hot_city1[$key]['endtime']>=$currdate && $data_hot_city1[$key]['photo'])
		{
	   $response .="<li class='clearfix'>
				   <div class='pic'><img src='./uploadfiles/activity/hdImage/".$data_hot_city1[$key]['photo']."'  border='0' /></div>
				   <div class='info'>
				       <h3 class='a0693e3_line'><a href='hd.php?module=hd_list_show1&hd_id=".$data_hot_city1[$key]['ID'].">".$data_hot_city1[$key]['actname']."
				       </a></h3>
					   <p>活动时间: ".$data_hot_city1[$key]['begintime']." --- ".$data_hot_city1[$key]['begintime']."</p>
					   <p>地点：".$data_hot_city1[$key]['place']." </p>
					   <p>发起：<em class='a0693e3'><a href='#'>".$data_hot_city1[$key]['nickname']."</a></em></p>
					   <p> <em class='nub1'>".$data_hot_city1[$key]['attentionnum']."</em>  人关注&nbsp;&nbsp;&nbsp;<em class='nub2'>".$data_hot_city1[$key]['membernum']."</em>  人参加 </p>
				   </div>
				   <div class='tag'>
				      <p class='wen'>其它</p>
					  <p class='pp'><img src='./templates/images/schoolbar/hd_bj5.gif' /></p>
				   </div>
				 </li>" ;
		}
		
		else if($data_hot_city1[$key]['endtime']>=$currdate && !$data_hot_city1[$key]['photo'])
		{
			 $response .="<li class='clearfix'>
				   <div class='pic'><img src='./templates/images/schoolbar/6.jpg' border='0' /></div>
				   <div class='info'>
				       <h3 class='a0693e3_line'><a href='hd.php?module=hd_list_show1&hd_id=".$data_hot_city1[$key]['ID'].">".$data_hot_city1[$key]['actname']."
				       </a></h3>
					   <p>活动时间: ".$data_hot_city1[$key]['begintime']." --- ".$data_hot_city1[$key]['begintime']."</p>
					   <p>地点：".$data_hot_city1[$key]['place']." </p>
					   <p>发起：<em class='a0693e3'><a href='#'>".$data_hot_city1[$key]['nickname']."</a></em></p>
					   <p> <em class='nub1'>".$data_hot_city1[$key]['attentionnum']."</em>  人关注&nbsp;&nbsp;&nbsp;<em class='nub2'>".$data_hot_city1[$key]['membernum']."</em>  人参加 </p>
				   </div>
				   <div class='tag'>
				      <p class='wen'>其它</p>
					  <p class='pp'><img src='./templates/images/schoolbar/hd_bj5.gif' /></p>
				   </div>
				 </li>" ;
		}
		else if($data_hot_city1[$key]['endtime']<$currdate && !$data_hot_city1[$key]['photo'])
		{
			$response .="<li class='clearfix'>
				   <div class='pic'><img src='./templates/images/schoolbar/6.jpg' border='0' /></div>
				   <div class='info'>
				       <h3 class='a0693e3_line'><a href='hd.php?module=hd_list_show1&hd_id=".$data_hot_city1[$key]['ID'].">".$data_hot_city1[$key]['actname']."
				       </a></h3>
					   <p>活动时间: ".$data_hot_city1[$key]['begintime']." --- ".$data_hot_city1[$key]['begintime']."</p>
					   <p>地点：".$data_hot_city1[$key]['place']." </p>
					   <p>发起：<em class='a0693e3'><a href='#'>".$data_hot_city1[$key]['nickname']."</a></em></p>
					   <p> <em class='nub1'>".$data_hot_city1[$key]['attentionnum']."</em>  人关注&nbsp;&nbsp;&nbsp;<em class='nub2'>".$data_hot_city1[$key]['membernum']."</em>  人参加 </p>
				   </div>
				   <div class='tag'>
				      <p class='wen'>其它</p>
					  <p class='pp'>活动已经过期</p>
				   </div>
				 </li>" ;
		}
		else if($data_hot_city1[$key]['endtime']<$currdate && $data_hot_city1[$key]['photo'])
		{
			 $response .="<li class='clearfix'>
				   <div class='pic'><img src='./uploadfiles/activity/hdImage/".$data_hot_city1[$key]['photo']."'  border='0' /></div>
				   <div class='info'>
				       <h3 class='a0693e3_line'><a href='hd.php?module=hd_list_show1&hd_id=".$data_hot_city1[$key]['ID'].">".$data_hot_city1[$key]['actname']."
				       </a></h3>
					   <p>活动时间: ".$data_hot_city1[$key]['begintime']." --- ".$data_hot_city1[$key]['begintime']."</p>
					   <p>地点：".$data_hot_city1[$key]['place']." </p>
					   <p>发起：<em class='a0693e3'><a href='#'>".$data_hot_city1[$key]['nickname']."</a></em></p>
					   <p> <em class='nub1'>".$data_hot_city1[$key]['attentionnum']."</em>  人关注&nbsp;&nbsp;&nbsp;<em class='nub2'>".$data_hot_city1[$key]['membernum']."</em>  人参加 </p>
				   </div>
				   <div class='tag'>
				      <p class='wen'>其它</p>
					  <p class='pp'><img src='./templates/images/schoolbar/hd_bj5.gif' /></p>
				   </div>
				 </li>" ;
		}
		
	}
	
	echo $response;
}
//ajax关于select分类和地址
else if($_REQUEST['module'] == "dyGetCatalog")
{
	$parent = $_GET['parent'];
	$data = $hd->getSecCatalog($parent);
	//把数组转换成json字符串返回
	$response = json_encode($data);
	echo $response;
	
}
else if($_REQUEST['module'] == "dyGetPlace")
{
	$parent = $_GET['parent'];
	$data = $hd->getSecPla($parent);
	//把数组转换成json字符串返回
	$response = json_encode($data);
	echo $response;
	
}

else if($_REQUEST['module'] == "reply")  //活动评论页面
{ 
	
	/*
	 * 活动评论页面
	 */
	$pagesize =4;
	
	//$rs = $groupbusi->getGroupMessage($grpID);
	
	$actRe = $hd->getReply($hd_id); //获取活动评论
	//$pageMessage = $groupbusi->getPageMessage($actID,$pagesize,$page,"act","reply"); //分页信息

	$checkIn =2;// $groupbusi->checkInAct($hd_id, $_SESSION['baseinfo']['ID']); //是否加入了活动 未加入活动不能评论和上传图片
	//$number = $groupbusi->getNumber($actID,"act","reply");

	$smarty->assign("checkIn",$checkIn);
	$smarty->assign("actID",$hd_id);
	//$smarty->assign("number",$number);
	//$smarty->assign("pageMessage",$pageMessage);
	$smarty->assign("actRe",$actRe);
	//$smarty->assign("rs",$rs);
	$smarty->display("hd/hd_act_reply.tpl");
}
ELSEIF($module=="review")  //活动和图片评论
{
	
	/*
	 * 评论活动或者评论活动图片
	 */
	
	//将html代码转化
	$htmlData = '';
	if (!empty($_POST['textarea'])) {
		if (get_magic_quotes_gpc()) {
			$htmlData = stripslashes($_POST['textarea']);
		} else {
			$htmlData = $_POST['textarea'];
		}
	}

	
	//获取回复级别，是一级回复还是二级回复
	$replyType = $_REQUEST['replyType'];
	
	
	
	//图片评论
	
	IF($type=="photo")  
	{
		$key = $_REQUEST['key']; //获取该图片是第几张图片
		
			/*
			 * 如果是发表，一级回复 ，评论数增加1
			 */
			if($replyType=="发表"||empty($replyType))
			{
				$data = array(
							"businessid"=>$photoID,
							"businesstype"=>7,
							"content"=>$htmlData,
							"creater"=>$_SESSION['baseinfo']['ID'],
							"createtime"=>date('YmdHis',time()),
							"shieldflg"=>0,
							"level"=>1,
							"idt_reply_parentid"=>0
							);
			}
		   /*
		    * 如果是回复，二级回复，评论数不增加
		    */
			elseif($replyType=="回复")
			{
				$data = array(
							"businessid"=>$photoID,
							"businesstype"=>7,
							"content"=>$htmlData,
							"creater"=>$_SESSION['baseinfo']['ID'],
							"createtime"=>date('YmdHis',time()),
							"shieldflg"=>0,
							"level"=>2,
							"idt_reply_parentid"=>$_REQUEST['replyID']
							);
			}
			//新建回复
			$groupbusi->createNewReply(1,$data,$actID);
		
		echo "<script language='javascript'>";
		echo "location='grp_act.php?module=singlephoto&ID=$ID&actID=$actID&photoID=$photoID&key=$key#here';";
		echo "</script>";
	}
	else  //活动评论
	{
		
		/*
			 * 如果是发表，一级回复 ，评论数增加1
			 */
		if($replyType=="发表"||empty($replyType))
		{
			$data = array(
						"businessid"=>$actID,
						"businesstype"=>2,
						"content"=>$htmlData,
						"creater"=>$_SESSION['baseinfo']['ID'],
						"createtime"=>date('YmdHis',time()),
						"shieldflg"=>0,
						"level"=>1,
						"idt_reply_parentid"=>0
						);
			//一级回复活动评论数+1		
			$rs = $groupbusi->updataNumber($actID,"act","reply");	
		}
		
		 /*
		    * 如果是回复，二级回复，评论数不增加
		    */
		elseif($replyType=="回复")
		{
			$data = array(
						"businessid"=>$actID,
						"businesstype"=>2,
						"content"=>$htmlData,
						"creater"=>$_SESSION['baseinfo']['ID'],
						"createtime"=>date('YmdHis',time()),
						"shieldflg"=>0,
						"level"=>2,
						"idt_reply_parentid"=>$_REQUEST['replyID']
						);
		}

		
		$groupbusi->createNewReply(1,$data,$actID);
		
		
		/*
		 * 这段代码留着，可能维护是会用到，活动首页回复
		 */
		echo "<script language='javascript'>";
		IF($type=="home")
		{
			echo "location='grp_act.php?module=single&ID=$ID&actID=$actID';";
		}
		else 
		{
			echo "location='hd.php?module=reply&hd_id=$actID';";
		}
		echo "</script>";
	}
}
ELSEIF($module=="redel")  //删除评论
{
	$hd_info = $hd->getAct($hd_id);
	if($hd_info[0]['creater'] == $_SESSION['baseinfo']['ID'])
	{
	$reviewID=$_GET['reviewID'];
	
	$data = array(
				"shieldflg"=>1
				);
	$hd->setActDel($data,$reviewID);
	//删除活动评论
	
		$groupbusi->updataNumber($hd_id,"act","reply","exit");
	
	}
	
	
	echo "<script language='javascript'>";
	echo "location='hd.php?module=reply&hd_id=$hd_id';";
	echo "</script>";
	
}
//小辉拆分我tpl做的发布活动
ELSE IF($module=="saveNext")
{
	$data = $_POST['act'];
	$place = $_POST['place'];
	$part = count($place);
	$data['place'] = $place[count($place)-1];
	$right = $_POST['right'];
 	if($grpID)
    {
    $data['idt_grp_main'] = $grpID;
    $data['grpflg'] = 1;
    }
	$data['creater'] = $_SESSION['baseinfo']['ID'];
	$data['createtime'] = $currdate;
	foreach ($right as $item)
	{
		$data['rights'] .= $item."|";
	}
	$data_hd = $hd->Insert('t_act_main', $data);
	
	echo "<script language='javascript'>";
	echo "location='hd.php?module=Next&hd_id=$data_hd';";
	echo "</script>";
	
}
ELSE IF($module=="Next")
{	
	$smarty->assign("hd_id",$_GET['hd_id']);
	$smarty->display('hd/next.tpl');
}
//查看活动成员
else if ($module == "hd_member")
{
	$page_new = $_GET['page_new'];
	$page_sta = ($page_new-1)*6;
	if(empty($page_new)||!isset($page_new)||$page_new == 1)
	$order_mem = " m.jointime DESC limit 0,6 ";
	else 
	$order_mem = " m.jointime DESC limit ".$page_sta.",6 ";
	$member = $hd -> getMem($hd_id,$order_mem);
	$data_hd = $hd ->getAct_info($hd_id);
	$count = ceil($data_hd[0]['membernum']/6);//函数进1方法
	for($key=1;$key<=$count;$key++)
	{
		$pagescount[$key] = $key;
	}
	foreach ($member as $key => $value)
	{
		if($member[$key]['sex'] == '1')
		{
			$member[$key]['sex'] = "男";
		}
		else $member[$key]['sex'] = "女";
	}
	$smarty->assign("pages",$pagescount);
	$smarty->assign("count",$count);
	$smarty->assign("hd_id",$hd_id);
	$smarty->assign("member",$member);
	$smarty->assign("act_info",$data_hd[0]);
	$smarty->display('hd/hd_member.tpl');
}
else if ($module == "exitMember")
{
	$member_id = $_GET['member_id'];
	$data_hd = $hd ->getAct_info($hd_id);
	
	$where = "u.idt_act_main = '$hd_id' and u.idt_user = '$member_id' and u.outflg = '0'";
	$where_hd = "u.ID = $hd_id";
	if($_SESSION['baseinfo']['ID'] == $data_hd[0]['creater'])
	{
	$data['outflg'] = '1';
	$data_hd1['membernum'] = $data_hd[0]['membernum'] - 1;
	$hd -> UpdateData("t_act_member",$data,$where);
	$hd -> UpdateData("t_act_main",$data_hd1,$where_hd);
	}
	echo "<script language='javascript'>";
	echo "location='hd.php?module=hd_member&hd_id=$hd_id';";
	echo "</script>";
}
//活动里的更多图片
else if($module == "hd_photos")
{
	$page_new = $_GET['page_new'];
	$page_sta = ($page_new-1)*9;
	$data_hd = $hd -> getAct_info($hd_id);
	if(empty($page_new)||!isset($page_new)||$page_new == 1)
	$order_photo = " tap.createtime DESC limit 0,9 ";
	else 
	$order_photo = " tap.createtime DESC limit ".$page_sta.",9 ";
	$data_photo = $hd ->getAct_photo($hd_id, $order_photo);
	$count = ceil($data_hd[0]['photonum']/9);//函数进1方法
	for($key=1;$key<=$count;$key++)
	{
		$pagescount[$key] = $key;
	}
	$smarty->assign("pages",$pagescount);
	$smarty->assign("count",$count);
	$smarty->assign("act_info",$data_hd[0]);
	$smarty->assign("data_photo",$data_photo);
	$smarty->display('hd/hd_photos.tpl');
}

?>