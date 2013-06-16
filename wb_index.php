<?php
require_once('base.php');
require_once('LoginBusiness.php');
require_once('SessionUtil.php');
require_once('ConstUtil.php');
require_once('SelfBusiness.php');
require_once('WbBusiness.php');


$selfbusi = new SelfBuiness();
$wbbusi = new WbBusiness();
$currtime = date("Y-m-d H:i:s");

//获取模块参数
$module = $_REQUEST['module'];

//获取wb用户，wb为被访问的用户,并将当前用户暂时写到session
$wbid = !empty($_REQUEST['uid'])?$_REQUEST['uid']:(!empty($_SESSION['wbUser'])?$_SESSION['wbUser']:NULL);
$_SESSION['wbUser'] = $wbid;
$userid = $_SESSION['baseinfo']['ID'];

//传递被查看用户的基本信息
$wbinfo = $selfbusi->getUserBaseInfo($wbid);
$smarty->assign('wbinfo',$wbinfo);
$smarty->assign('uid',$wbid);



if(empty($wbid))
{
	$msg = "访问用户错误";
	$smarty->assign('msg',$msg);
	$smarty->display('wb_zone/wb_noAccess.tpl');
}
else if(!$wbbusi->isAccess($userid, $wbid))//判断当前用户权限
{
	$msg = "该用户设置了空间访问权限";
	$smarty->assign('msg',$msg);
	$smarty->display('wb_zone/wb_noAccess.tpl');
}
else if($module == "index" || empty($module))//空间首页
{
	$info = $selfbusi->getAttenInfo($wbid);
	$atten = $selfbusi->getAttentionList($wbid, '1', '0');
	//用户日志
	$page = $wbbusi->getUserDiarys($userid,$wbid,'1');
    $smarty->assign('page',$page);
    //判断是否为好友
    $isFriend = $wbbusi->isFriend($userid, $wbid)?1:0;
    //判断是否关注
    $isAtten = $wbbusi->isAttention($userid, $wbid)?1:0;
    
    $smarty->assign('isAtten',$isAtten);
    $smarty->assign('isFriend',$isFriend);
	$smarty->assign('atten',$atten);
	$smarty->assign('info',$info);
	$smarty->display('wb_zone/wb_index.tpl');
}
else if($module == "diary")//用户日志
{
    $page = $wbbusi->getUserDiarys($userid,$wbid,'1');   
    $smarty->assign('page',$page);
	$smarty->display('wb_zone/wb_diary.tpl');
}
else if($module == "diaryShow")//显示指定日志
{
	$diaid = $_REQUEST['diary'];
    $diary = $selfbusi->get_diary_show($diaid);
    $reply = $selfbusi->get_Reply('1', $diaid,'1');//获取该日志评论
    
    $smarty->assign('reply',$reply);
    $smarty->assign('diary',$diary);
	$smarty->display('wb_zone/wb_diary_show.tpl');
}
else if($module == "DiaryCollect")//Ajax收藏日志
{
	if($wbbusi->isDiaryCollect($_POST['diaryid'], $userid))
	{
		echo "exist";
	}
	else
	{
		$data['idt_goods'] = $_POST['diaryid'];
		$data['idt_user'] = $userid;
		$data['collecttime'] = $currtime;
		$data['collectname'] = $_POST['name'];
		$data['collecttype'] = '1';
		$wbbusi->self_insert('t_goods_collect', $data);
		echo "success";//返回item
	}	
}
else if($module == "GetDiarySplit")//分页获取日志
{
	$wbid = $_POST['wbid'];
	$page = $_POST['page'];
	$data = $wbbusi->getUserDiarys($userid,$wbid,$page);
	$data['base']['photo'] = $wbinfo['photo'];
	$data['base']['name'] = $wbinfo['name'];
	$data['base']['uid'] = $wbid;
	$response = json_encode($data);
	echo $response;
	
}
else if($module == "album")//相册
{
	$page = $selfbusi->getAlbumByPage($wbid, '1');
    $albums = $selfbusi->get_album($wbid);
    
    
    $smarty->assign('page',$page);
    $smarty->assign('album',$albums);
	$smarty->display('wb_zone/wb_album.tpl');
}
else if($module == "reply")//留言板
{
	$reply = $selfbusi->get_Reply('3', $wbid,'1');//获取用户空间评论
    $smarty->assign('reply',$reply);
	$smarty->display('wb_zone/wb_reply.tpl');
}
else if($module == "perdoc")//个人档
{
	$self = $selfbusi->getSpace($wbid);
    $info = $selfbusi->getUserInfo($wbid);
    
    $smarty->assign('info',$info);
    $smarty->assign('self',$self);
	$smarty->display('wb_zone/wb_about.tpl');
}
else if($module == "albumShow")//相册->相片列表
{
	$albid = $_REQUEST['alb'];
    $photo = $selfbusi->get_album_photos($albid);
    $albums = $selfbusi->get_album($userid); 
    $reply = $selfbusi->get_Reply('2', $albid,'1');//获取该照片评论
    
    $smarty->assign('diaid',$albid);//相册ID
    $smarty->assign('reply',$reply);
    $smarty->assign('album',$albums);    
    $smarty->assign('photo',$photo);
	$smarty->display('wb_zone/wb_album_show.tpl');
}
else if($module == "friends")//用户好友
{
	$self = $selfbusi->getSpace($wbid);
    $info = $selfbusi->getUserInfo($wbid);
    $frinfo = $selfbusi->getFriendsList($wbid,'1');//查找第一页好友
    
    $smarty->assign('frinfo',$frinfo);
    $smarty->assign('info',$info);
    $smarty->assign('self',$self);
	$smarty->display('wb_zone/wb_friends.tpl');
}
else if($module == "attention")//用户关注
{	
	$atten = $selfbusi->getAttentionList($wbid, '1','0');
	$smarty->assign('atten',$atten);
	$smarty->display('wb_zone/wb_attention.tpl');
}
else if($module == "fans")//用户粉丝
{
	$atten = $selfbusi->getAttentionList($wbid, '1','1');
	$smarty->assign('atten',$atten);
	$smarty->display('wb_zone/wb_fans.tpl');
}
else if($module == "GetAtten")//Ajax获取关注
{
	$page = $_POST['page'];
	$type = $_POST['type'];
	$data = $selfbusi->getAttentionList($wbid, $page,$type);
	$response = json_encode($data);
	echo $response;
}
else if($module == "GetDiaryCatalog")//Ajax获取用户日志分类
{
	$wbid = $_POST['wbid'];
	$item = $_POST['item'];
	$prename = $_POST['prename'];
	$data['base']['item'] = $item;
	$data['base']['wbid'] = $wbid;
	$data['base']['prename'] = $prename;
	$data['info'] = $wbbusi->get_diary_catalog($wbid);	
	$response = json_encode($data);
	echo $response;
}
else if($module == "TransDiary")//Ajax转发日志
{
	$data['creator'] = $userid;
	$data['owner'] = $_POST['wbid'];
	$data['authority'] = $_POST['authority'];
	$data['sectitle'] = $sectitle;
	$data['idt_diary'] = $_POST['diaryid'];
	$data['title'] = $_POST['title'];
	$data['idt_space_diary_catalog'] = $_POST['catalog'];
	$data['createtime'] = $currtime;
	$data['type'] = '1';	
	//增加原文转发次数
	$wbbusi->addTranSum($_POST['diaryid']);	
	//insert新数据
	if($wbbusi->self_insert('t_space_diary', $data))
	{
		echo "sueccess";
	}
	else 
	{
		echo "failed";
	}
	
}
else if($module == "AddAtten")//Ajax添加关注
{
	$uid = $_POST['browserid'];
	$data['idt_user'] = $userid;
	$data['browserid'] = $uid;
	$data['createtime'] = $currtime;
	if($wbbusi->self_insert('t_user_attention', $data))
	{
		echo "success";
	}
	else 
	{
		echo "failed";
	}
}
else if($module == "AddFriend")//Ajax发送好友请求
{
	$data['senderid'] = $userid;
	$data['receiverid'] = $_POST['wbid'];
	$data['type'] = '5';
	$data['sendflg'] = '1';
	$data['receiveflg'] = '1';
	$data['readflg'] = '0';
	$data['createtime'] = $currtime;
	if($wbbusi->self_insert('t_message', $data))
	{
		echo "success";
	}
	else
	{
		echo "failed";
	}
	
}


?>