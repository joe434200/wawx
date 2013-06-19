<?php
require_once('base.php');
require_once('forum_homeBusiness.php');
require_once('LoginBusiness.php');
require_once('SessionUtil.php');
//require_once('ConstUtil.php');
//获取module
$module = $_REQUEST['module'];

$forumbusi = new forum_homeBusiness();
$loginbusi = new LoginBusiness();

//-------------------add by zrh---------------------
$_SESSION['barType'] = 4;
//-------------------add by zrh end-------------------

//截取字符串，否则中文可能乱码
function utf8Substr($str, $from, $len) 
{ 
	return preg_replace('#^(?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,'.$from.'}'. 
	'((?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,'.$len.'}).*#s', 
	'$1',$str); 
}
function formatetime($value)
{
	$value = substr($value,11,2)." : "
			.substr($value,14,2);
	return $value;
}
//将日期转化为前几天的格式
function formatdate($value)
{
	if($value==0)
		$value='今日';
	elseif ($value==1)
	    $value='昨日';
	elseif ($value==2)
	    $value='前日';
	else
		$value='前'.$value.'日';
    return $value;
}
//将等级转化为图片
function getleveltag($level)
{
    $i=1;
    while($level!=0)
    {
    	$lev[$i]= $level%4;
		$level= (int)($level/4);
		$i++;
    }
    if($lev[4])
    {
	   for($k=0;$k<$lev[4];$k++)
	   {
	   	$levelurl .="<img src=\"./templates/images/schoolbar/huangguan.gif\"/>";
	   }
    }
    if($lev[3])
    {
	   for($k=0;$k<$lev[3];$k++)
	   {
	   	$levelurl .="<img src=\"./templates/images/schoolbar/taiyang.gif\"/>";
	   }
    }
    if($lev[2])
    {
	   for($k=0;$k<$lev[2];$k++)
	   {
	   	$levelurl .="<img src=\"./templates/images/schoolbar/yueliang.gif\"/>";
	   }
    }
   for($k=0;$k<$lev[1];$k++)
   {
   	$levelurl .="<img src=\"./templates/images/schoolbar/xingxing.gif\"/>";
   }
   return $levelurl;
}

//记住密码
function  SetRememberInfo($loginbusi,$smarty)
{
	//检查登陆
	if(empty($_SESSION['baseinfo']))
	{ //检查一下session是不是为空

		if(empty($_COOKIE['email']) || empty($_COOKIE['password']))
		{

		}
		else
		{
			if($_COOKIE['rememberstatus']=="1")
			{
					$smarty->assign("ema",$_COOKIE['email']);
					$smarty->assign("pwd",$_COOKIE['password']);
					$smarty->assign("remember",$_COOKIE['rememberstatus']);
					
			}

		
		}
      }
}

//初始化进入页面
if (empty($module)|| $module == 'home')
{
	$type = $_REQUEST['type'];//当前板块类型
	$order = $_REQUEST['order'];//排序类型
	$currpage = $_REQUEST['p'];//分页的当前页数
	if(empty($type))
	{
		$type=1;
	}
    if(empty($order))//初始化页面默认排序方式
	{
		$order=2;
	}
	if(empty($currpage))
	{
		$currpage = 1;
	}
	
	$member = $forumbusi->searchmember();	//查询最新会员信息
	foreach ($member as &$value)
	{
		$value['days']=formatdate($value['days']);
		$value['createtime'] = formatetime($value['createtime']);
		}
    unset($value);
	
    
	$hot = $forumbusi->searchhot();//查找热点帖子显示在页面的右侧
    foreach ($hot as &$value)
	{
		$value['days']=formatdate($value['days']);
		$value['createtime'] = formatetime($value['createtime']);
    	$value['title']=utf8Substr($value['title'],0,4); 
	}
    unset($value);
   
	$newpic = $forumbusi->searchnewpic();//查询最新的图片
	foreach ($newpic as &$value)
	{
		$picinfo = explode(".",$value['oldname']);
		$value['oldname'] = $picinfo[0];
	}
	unset($value);
	
	
	$firstforumtype = $forumbusi->seachfirstforumtype();//查询板块信息
	$forum['countall']=$forumbusi->counttiezi();//查询所有帖子的数量
	$forum['counttoday']=$forumbusi->counttiezi(NULL, 1);//查询今天的帖子
    $forum['countforum'] = $forumbusi->countforum();//查询板块数量
    
   
    $admin = $forumbusi->searchadmin($type); //查询版主ID
    //版主权限
    if($_SESSION['baseinfo']['ID'])
    {
	    if($_SESSION['baseinfo']['ID']==$admin['admin1']||$_SESSION['baseinfo']['ID']==$admin['admin2']||$_SESSION['baseinfo']['ID']==$admin['admin3'])
	    {
	    	$power=1;
	    }
    }
    //查询版主名字
    $admininfo[1]=$forumbusi->searchuser($admin['admin1']);
    $admininfo[2]=$forumbusi->searchuser($admin['admin2']);
    $admininfo[3]=$forumbusi->searchuser($admin['admin3']);
    $forum['adminname1']=$admininfo[1]["nickname"];
    $forum['adminname2']=$admininfo[2]["nickname"];
    $forum['adminname3']=$admininfo[3]["nickname"];
    
    $numbersperpage = 25;//每页显示几个帖子
    $allforum = $forumbusi->searchforum($type,$order,$currpage,$numbersperpage,null,$power);//查询各板块帖子信息
	$totalpages = $forumbusi->getTotalPage();//总共分多少页
	$lngtype = 2;        //分页语言
	
	SetRememberInfo($loginbusi,$smarty);

	$smarty->assign("lngtype",$lngtype);
	$smarty->assign("pagecount",$totalpages);
	$smarty->assign("type",$type);
	$smarty->assign("order",$order);
	$smarty->assign("forum",$forum);
	$smarty->assign("newpic",$newpic);
	$smarty->assign("member",$member);//最新会员
	$smarty->assign("firstforumtype",$firstforumtype);//板块内容
	$smarty->assign("hot",$hot);//最热帖子
	$smarty->assign("allforum",$allforum);//所有的帖子
	$smarty->display("forum_home/mypost.tpl");
}




//进入发帖页面
elseif ($module == 'new')
{
	$forum['type'] = $_REQUEST['type'];
	$forum['counttiezi']=$forumbusi->counttiezi();//查询总共多少帖子
	$forum['counttoday']=$forumbusi->counttiezi(NULL, 1);//查询今天多少帖子
	$forum['countforum'] = $forumbusi->countforum();//查询板块数量
	$forumtopic = $forumbusi->seachforumtopic();//查询帖子分类信息
	$hot = $forumbusi->searchhot();//查找热点帖子显示在页面的右侧
	$newpic = $forumbusi->searchnewpic();//查询最新的图片
	foreach ($newpic as &$value)
	{
		$picinfo = explode(".",$value['oldname']);
		$value['oldname'] = $picinfo[0];
	}
	unset($value);
	
	$smarty->assign('forum',$forum);
	$smarty->assign('forumtopic',$forumtopic);
	$smarty->assign('hot',$hot);
	$smarty->assign('newpic',$newpic);
	$smarty->display("forum_home/sendpost.tpl");
}



//点击发帖按钮时
elseif ($module == 'send')
{
	//获取页面的内容
	$data  = $_POST['newforum'];
	$data['creater']=$_SESSION['baseinfo']['ID'];
	$data['createtime']= date("y-m-d h:i:s",time());
	$data['browsercount']= 0;
	$data['replynum']=0;
	$data['excelflg']=0;
	$data['shieldflg']=0;
	$data['topflg']=0;
	$data['excelflg']=0;
	$suc=$forumbusi ->Insert('t_forum_topic',$data);//将新帖信息插入数据库
	
	if(empty($suc))//插入数据库失败的话则重新发帖
	{
		echo "<script>";
		echo "alert('发帖失败，请重新发贴')";
		echo "window.location='forum_home.php?module=new';";
		echo "</script >";
	}
	else 
	{
		$sendforumnum=$forumbusi->counttiezi($_SESSION['baseinfo']['ID'],1);
		if($sendforumnum<6)
		{
			        $sendforumcoin['idt_user']=$_SESSION['baseinfo']['ID'];
					$sendforumcoin['coins']=2;//以后再改
					$sendforumcoin['type']=0;//推荐商家
					$sendforumcoin['getflg']=0;//未领取
					$forumbusi->Insert('t_getcoins', $sendforumcoin);
		}
		//插入图片信息到数据库中
	   if(!empty($_SESSION['forumfileinfomation']))
	     {
	     	  $picid = $forumbusi->searchpic();  //查找图片专区的id
		      $fileinfoma = $_SESSION['forumfileinfomation'];
		      unset($_SESSION['forumfileinfomation']);
		      foreach ($fileinfoma as $value)
		      {
		      	$value['creater'] = $data['creater'];
		      	$value['idt_forum_catalog'] = $data['idm_forum_catalog'];
		      	if($value['idt_forum_catalog'] == $picid)
		      	{
		      	    $value['filetype'] = 0;
		      	}
		      	else 
		      	{
		      		$value['filetype'] = 1;
		      		$value['idt_forum_topic'] = $suc;
		      		
		      	}
		         $forumbusi->Insert('t_forum_file', $value);
		      }
	    }
		echo "<script>";
		echo "window.location='forum_home.php?module=home';";
		echo "</script>";
	}	
}




//点击某个帖子标题,进入回帖页面
elseif ($module == 'replylist')
{
	$currpage = $_REQUEST['p'];
	$forumid = $_REQUEST['forumid'];
	$order = $_REQUEST['order'];
	$userid = $_REQUEST['userid'];  //只看该作者时的作者的id 
//	echo "aaa".$userid;
   if (empty($currpage))
	{
		$currpage = 1;
	}
	$numbersperpage = 5;//每页显示几个回复
	$forumbusi->updatebrowercount($forumid);  //更新点击量
	$oneforum = $forumbusi->searchoneforum($forumid);//查询帖子信息
	if($oneforum['adminflg'])
	{
		 $oneforum['adminflg']='管理员';
	}
	else 
	{
		 $oneforum['adminflg']='普通会员';
	}
	$oneforum['countforumbyid']=$forumbusi->counttiezi($oneforum['creater']);//查楼主所发帖子数量
	$oneforum['listennum']=$forumbusi->searchlistencount($oneforum['creater']);//查询收听人数
    $oneforum['replynum']=$forumbusi->replycount($forumid);//查询该帖子的回复数量
    $oneforum['levelimage']=getleveltag($oneforum['level']);//将等级转换成星星等
	$countforumtype = $forumbusi->countforum();//查询板块数量
	$hot = $forumbusi->searchhot();//查找热点帖子
	$excel =$forumbusi->searchexcel();//查找精华帖子
	$newpic = $forumbusi->searchnewpic();//查询最新的图片
	foreach ($newpic as &$value)
	{
		$picinfo = explode(".",$value['oldname']);
		$value['oldname'] = $picinfo[0];
	}
	unset($value);

    $currentuser=$forumbusi->searchuser($_SESSION['baseinfo']['ID']);
    $admin = $forumbusi->searchadmin($oneforum['idm_forum_catalog']);//查询版主ID
    //版主权限
    if($_SESSION['baseinfo']['ID'])
    {
	     if(($_SESSION['baseinfo']['ID']==$admin['admin1'])||($_SESSION['baseinfo']['ID']==$admin['admin2'])||($_SESSION['baseinfo']['ID']==$admin['admin3']))
	     {
	    	$oneforum['power'] = 1;
	     }
    }
    $allreply = $forumbusi ->searchreply($forumid,$currpage,$numbersperpage,$order,$oneforum['power'],$userid);
	foreach($allreply as &$value)
	{
		if($value['adminflg'])
		    $value['adminflg']='管理员';
	     else 
		    $value['adminflg']='普通会员';
		    $value['countforumbyid']=$forumbusi->counttiezi($value['creater']);
		    $value['listennum']=$forumbusi->searchlistencount($value['creater']);
		    $value['levelimage'] = getleveltag($value['level']);
	}
	unset($value);
   
	$totalpages = $forumbusi->getTotalPage();//总共分多少页
	$lngtype = 2; 
	if(empty($order)) 
	{      //分页语言
	   $currpagebase = ($currpage-1) * $numbersperpage+1;//显示楼数
	}
	else 
	{
		$currpagebase =$oneforum['replynum'] - $numbersperpage*($currpage-1);
	}
	
	
	
	$smarty->assign("currentuser",$currentuser);
	$smarty->assign("lngtype",$lngtype);
    $smarty->assign("pagecount",$totalpages);  
    $smarty->assign("order",$order);
    $smarty->assign("userid",$userid);
    $smarty->assign("currpage",$currpage);  
    $smarty->assign('hot',$hot);
    $smarty->assign('excel',$excel);
	$smarty->assign('newpic',$newpic);
    $smarty->assign("currpagebase",$currpagebase);
	$smarty->assign("oneforum",$oneforum);
	$smarty->assign("countforumtype",$countforumtype);
	$smarty->assign("allreply",$allreply);
	$smarty->display("forum_home/replylist.tpl");
}


//只看楼主页面
elseif ($module=='louzhu')
{
	$forumid = $_REQUEST['forumid'];
	$oneforum = $forumbusi->searchoneforum($forumid);//查询帖子信息
	
	$oneforum['countforumbyid']=$forumbusi->counttiezi($oneforum['creater']);//查楼主所发帖子数量
	$oneforum['listennum']=$forumbusi->searchlistencount($oneforum['creater']);//查询收听人数
	$oneforum['replynum']=$forumbusi->replycount($forumid);//查询该帖子的回复数量
	$oneforum['levelimage']=getleveltag($oneforum['level']);//将等级转换成星星等
	if($oneforum['adminflg'])
		 $oneforum['adminflg']='管理员';
	else 
		 $oneforum['adminflg']='普通会员';
   $hot = $forumbusi->searchhot();//查找热点帖子显示在页面的右侧
   $newpic = $forumbusi->searchnewpic();//查询最新的图片
	foreach ($newpic as &$value)
	{
		$picinfo = explode(".",$value['oldname']);
		$value['oldname'] = $picinfo[0];
	}
	unset($value);
	$countforumtype = $forumbusi->countforum();//查询板块数量
	$smarty->assign("oneforum",$oneforum);
	$smarty->assign('hot',$hot);
	$smarty->assign('newpic',$newpic);
	$smarty->assign("countforumtype",$countforumtype);
	$smarty->display("forum_home/louzhu.tpl");
}
//我的帖子页面
elseif($module == 'myforum')
{
	$type = $_REQUEST['type'];//当前板块类型
	$order = $_REQUEST['order'];//排序类型
	$createrid = $_REQUEST['createrid'];
	$currpage = $_REQUEST['p'];//分页的当前页数
	if(empty($type))
	{
		$type=1;
	}
    if(empty($order)||$order=="")//初始化页面默认排序方式
	{
		$order=2;
	}
	if (empty($currpage))
	{
		$currpage = 1;
	}
    if(empty($createrid))
	{
	  $createrid = $_SESSION['baseinfo']['ID'];
	}
	$numbersperpage = 10;//每页显示几个回复
	
	$allforum = $forumbusi->searchforum($type,$order,$currpage,$numbersperpage,$createrid);//查询各板块帖子信息
	$totalpages = $forumbusi->getTotalPage();//总共分多少页
	
	$firstforumtype = $forumbusi->seachfirstforumtype();//查询板块信息
	$lngtype = 2;        //分页语言
	
	
	$smarty->assign("lngtype",$lngtype);
	$smarty->assign("pagecount",$totalpages);
	$smarty->assign("type",$type);
	$smarty->assign("createrid",$createrid);
	$smarty->assign("firstforumtype",$firstforumtype);//板块内容
	$smarty->assign("allforum",$allforum);//所有的帖子
	$smarty->display("forum_home/myforum.tpl");
	
}
//回贴
elseif ($module=='sendreply')
{
	
	$replyinfo['content']=$_POST['editor_id'];
	$replyinfo['businessid']=$_POST['forumid'];
	$replyinfo['businesstype']=4;
	$replyinfo['creater']=$_SESSION['baseinfo']['ID'];
	$replyinfo['createtime']=date("Y-m-d H:i:s");
	$replyinfo['shieldflg']=0;
	$replyinfo['idt_reply_parentid']=$_POST['replyID'];
	$rs = $forumbusi->Insert('t_reply', $replyinfo);
	if(empty($rs))
	{
		echo "<script>";
	    echo "alert('回帖失败')";
	    echo "</script>";
	}
	else 
	{
		$replytoday = $forumbusi->replytodaynum($_SESSION['baseinfo']['ID']);
		if($replytoday<11)
		{
			        $replycoin['idt_user']=$_SESSION['baseinfo']['ID'];
					$replycoin['coins']=1;//以后再改
					$replycoin['type']=0;
					$replycoin['getflg']=0;//未领取
					$forumbusi->Insert('t_getcoins', $replycoin);
		}
	}
	$forumid=$replyinfo['businessid'];
	echo "<script>";
	echo "window.location='forum_home.php?module=replylist&forumid=$forumid'";
	echo "</script>";
	
	
}


elseif ($module=='logout')
{
	session_destroy();
	
	echo "<script language='javascript'>";
	echo "location='forum_home.php';";
	echo "</script>";
}

//------------------------------------------------ajax---------------------------------
//置顶操作所用的ajax
elseif ($module=='top')
{
	$topflg = $_REQUEST['topflg'];
	$forumid = $_REQUEST['forumid'];
    $forumbusi->updateflg($forumid,"topflg",$topflg);
	echo $topflg;
}


//加精操作所用的ajax
elseif ($module=='excel')
{
	$execlflg = $_REQUEST['excelflg'];
	$forumid = $_REQUEST['forumid'];
	$forumbusi->updateflg($forumid,"excelflg",$execlflg);
	echo $execlflg;
}

//屏蔽操作所用的ajax
elseif ($module=='shield')
{
	$shieldflg = $_REQUEST['shieldflg'];
	$forumid = $_REQUEST['forumid'];
	$forumbusi->updateflg($forumid,"shieldflg",$shieldflg);
	echo $shieldflg;
}

//屏蔽回复操作所用的ajax
elseif ($module=='secondreplyshield')
{
	$replyshieldflg = $_REQUEST['shieldflg'];
	$secondid = $_REQUEST['secondid'];
	$forumbusi->updatereplyflg($secondid,$replyshieldflg);
	echo $replyshieldflg;
}
//收听某人时调用的ajax
elseif ($module=='listen')
{
	$listen['friendid'] = $_REQUEST['userid'];
	$listen['idt_user'] = $_SESSION['baseinfo']['ID'];
	$listen['createtime'] =date("Y-m-d H:i:s");
	$forumbusi->Insert('t_forum_listen', $listen);
	$response = $forumbusi->searchlistencount($listen['friendid']);
	echo $response;
}

//验证图片所用
elseif ($module=='checkpic')
{
	$response = $_SESSION['checkpic'];
	unset($_SESSION['checkpic']);
	echo $response;
}
//发消息所用ajax
elseif ($module == 'sendmessage')
{
	$mess['receiverid']=$_REQUEST['receiver'];
	$mess['title']=$_REQUEST['messagetitle'];
	$mess['content']=$_REQUEST['messagecontent'];
	$mess['senderid']=$_SESSION['baseinfo']['ID'];
	$mess['createtime']=date("Y-m-d H:i:s");
	$mess['type']= 2;
	$mess['garbageflg']=0;
	$mess['sendflg']=1;
	$mess['receiveflg']=0;
	$mess['readflg']=0;
	$forumbusi->Insert('t_message', $mess);	
}

elseif ($module=='checkuser')
{
    $email = $_REQUEST['email2'];
	$pwd = $_REQUEST['password2'];
	$rememberstatus = $_REQUEST['rememberstatus2'];
	$rs = $loginbusi->checkIsExist($email, $pwd);
  if($rs==0) 
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
		//提取用户和企业共同信息
		$basedata = $loginbusi->getLoginUserInfo($email, $pwd);
		
		if($basedata['usertype']==0)
		{
			$otherdata = $loginbusi->getUserInfo($email, $pwd);
			$_SESSION['otherinfo'] = $otherdata;
		}else 
		{
			$otherdata = $loginbusi->getShopInfo($email, $pwd);
			$_SESSION['otherinfo'] = $otherdata;
		}
		$_SESSION['baseinfo'] = $basedata;
		$_SESSION['loginok'] = 1;
		
   
		
    }
	
	echo $rs;
}
elseif ($module=='collect')
{
	$collect['collecturl']=$_REQUEST['current_url'];
	$collect['idt_user']=$_SESSION['baseinfo']['ID'];
	$collect['collecttime']=date("y-m-d h:i:s",time());
	$collect['collecttype']=0;
	$rs=$forumbusi->Insert('t_goods_collect', $collect);
	echo $rs;
	
}


//制作验证图片
elseif($module == 'checkimg')
{
	for($i=0;$i<4;$i++)
	{
		$rand.=dechex(rand(1,15));//产生4个随机数
		
	}

	$_SESSION['checkpic']=$rand;//将随机数赋予$_session
	$im = imagecreatetruecolor(100, 28);
	$bg = imagecolorallocate($im,255,255,255);
    imagefill($im,0,0,$bg); //填充
	$te = imagecolorallocate($im, rand(0, 200), rand(0, 200), rand(0, 200));
	imagestring($im, rand(2,6),  rand(3,70),  rand(0,14), $rand, $te);
	header("Content-type: image/jpeg");
	imagejpeg($im);
}

?>