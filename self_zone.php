<?php
require_once('base.php');
require_once('LoginBusiness.php');
require_once('SessionUtil.php');
require_once('ConstUtil.php');
require_once('SelfBusiness.php');


$module =$_REQUEST['module'];
$selfbusi = new SelfBuiness();
$currtime = date("Y-m-d H:i:s");

$userid = ($_REQUEST['uid'] == ''||empty($_REQUEST['uid'])) ? $_SESSION['baseinfo']['ID'] : $_REQUEST['uid'];

$smarty->assign('uid',$userid);

//给用户添加一个默认相册,默认相册由系统创建，不提供给用户更改和删除的接口
//此段代码要转移到 用户注册的时候执行
{
    $rs = $selfbusi->Search("t_space_album", "m.*","","m.introduction='default' AND m.creater='$userid'");
    if(count($rs) < 1 )
    {
        $data['albumname'] = "默认相册";
        $data['introduction'] = "default";
        $data['createtime'] = $currtime;
        $data['creater'] = $_SESSION['baseinfo']['ID'];
        $albid = $selfbusi->self_insert('t_space_album', $data);
    }
    
    $rs = $selfbusi->Search("t_space_diary_catalog", "m.*","","m.name='默认分类' AND m.idt_user='$userid'");
    if(count($rs) < 1 )
    {
        $cata['name'] = "默认分类";
        $cata['idt_user'] = $_SESSION['baseinfo']['ID'];;
        $cata['sum'] = "0";
        $selfbusi->self_insert('t_space_diary_catalog', $cata);
    }
    
    
}



if($module == "" || empty($module) || $module == "index")//空间首页
{
    $info = $selfbusi->getUserInfo($userid);
    $self = $selfbusi->getSpace($userid);
    $albums = $selfbusi->getAlbums($userid);
    $visitors = $selfbusi->getVisitors($userid);
    $friends = $selfbusi->getFriends($userid);
    $diarys = $selfbusi->getDiaryPage($userid, "", "1");
    $reply = $selfbusi->get_Reply('3', $userid,'1');//获取用户空间评论
    
    $smarty->assign('reply',$reply);   
    $smarty->assign('diarys',$diarys['info']);
    $smarty->assign('albums',$albums);
    $smarty->assign('visitors',$visitors);
    $smarty->assign('friends',$friends);
    $smarty->assign('info',$info);
    $smarty->assign('self',$self);
    $smarty->display('self_zone/self_index.tpl');
}
else if($module == "daily")//空间日志首页
{
    $catalog = $selfbusi->get_diary_catalog($userid);
    $diarys = $selfbusi->get_diary($userid, "");
    $page = $selfbusi->getDiaryPage($userid, "", "1");
    
    $smarty->assign('reply',$page);
    $smarty->assign('diary',$diarys);
    $smarty->assign('catalog',$catalog);
    $smarty->display('self_zone/self_rizhi.tpl');
}
else if($module == "album")//空间相册首页
{
    $page = $selfbusi->getAlbumByPage($userid, '1');
    $albums = $selfbusi->get_album($userid);    
    
    
    $smarty->assign('page',$page);
    $smarty->assign('album',$albums);
    $smarty->display('self_zone/self_photo.tpl');
}
else if($module == "reply")//留言板
{
    $reply = $selfbusi->get_Reply('3', $userid,'1');//获取用户空间评论
    $self = $selfbusi->getSpace($userid);
    $info = $selfbusi->getUserInfo($userid);
    
    $smarty->assign('info',$info);    
    $smarty->assign('self',$self);
    $smarty->assign('reply',$reply);
    $smarty->display('self_zone/self_liuyan.tpl');
}
else if($module == "perdoc")//个人档
{
    $self = $selfbusi->getSpace($userid);
    $info = $selfbusi->getUserInfo($userid);
    
    $smarty->assign('info',$info);
    $smarty->assign('self',$self);
    $smarty->display('self_zone/self_about.tpl');
}
else if($module == "friends")//我的好友
{
	$self = $selfbusi->getSpace($userid);
    $info = $selfbusi->getUserInfo($userid);
    $frinfo = $selfbusi->getFriendsList($userid,'1');//查找第一页好友
    
    $smarty->assign('frinfo',$frinfo);
    $smarty->assign('info',$info);
    $smarty->assign('self',$self);
	$smarty->display('self_zone/self_friends.tpl');
}
else if($module == "GetNewReply")//ajax更新留言板回复
{
    $data['content'] = $_POST['content'];
    $data['idt_diary'] = $_POST['uid'];
    $data['level'] = empty($_POST['upid'])?1:2;
    $data['upid'] = empty($_POST['upid'])?0:$_POST['upid'];
    $data['crisisid'] = $_SESSION['baseinfo']['ID'];//评论者为当前登录用户
    $data['createtime'] = $currtime;
    $data['type'] = "3";
    $data['delflg'] = "0";
    $selfbusi->self_insert('t_space_reply', $data);
    echo "";
    
    
}
else if($module == "DelReply")//ajax删除回复
{
    $id = $_POST['id'];
    $selfbusi->self_delete('t_space_reply', " d.id='$id'");
    echo "";
}
else if($module == "GetFriendsSplit")//ajax查找分页好友
{
	$page = $_POST['page'];
	$data = $selfbusi->getFriendsList($userid, $page);
	$response = json_encode($data);
	echo $response;
}

?>