<?php
require_once('base.php');
require_once('LoginBusiness.php');
require_once('SessionUtil.php');
require_once('ConstUtil.php');
require_once('SelfBusiness.php');
$module =$_REQUEST['module'];

$selfbusi = new SelfBuiness();

$currtime = date("Y-m-d H:i:s");
//$userid = ($_REQUEST['uid'] == ''||empty($_REQUEST['uid'])) ? $_SESSION['baseinfo']['ID'] : $_REQUEST['uid'];
$userid = $_SESSION['baseinfo']['ID'];





//判断获取ID ，如果页面没有穿过来uid 则是获取当前登录用户的ID，根据用户ID获取相册
if($module == "photo_upload")
{
    
    $albums = $selfbusi->get_album($userid); 
    $smarty->assign('album',$albums);
    $smarty->display('self_zone/self_photo_upload.tpl');
}
else if($module == "photo_manager")//相册管理
{
       
    $albums = $selfbusi->get_album($userid);    
    $smarty->assign('album',$albums);
    $smarty->display('self_zone/self_photo_guanli.tpl');
}
else if($module == "album")//显示ID指定相册
{
    $albid = $_REQUEST['alb'];
    $photo = $selfbusi->get_album_photos($albid);
    $albums = $selfbusi->get_album($userid); 
    $reply = $selfbusi->get_Reply('2', $albid,'1');//获取该照片评论
    
    $smarty->assign('diaid',$albid);//相册ID
    $smarty->assign('reply',$reply);
    $smarty->assign('album',$albums);
    $smarty->assign('photo',$photo);
    $smarty->display('self_zone/self_photo_album.tpl');
}
else if($module == "CreateAlbum")//AJAX创建新相册
{
    $albName = $_POST['albName'];
    if(count($selfbusi->Search("t_space_album", "m.id","","m.albumname='$albName'")) > 0)
    {
        echo "exist";
    }
    else 
    {
        $data['albumname'] = $albName;
        $data['introduction'] = "";
        $data['createtime'] = $currtime;
        $data['creater'] = $_SESSION['baseinfo']['ID'];
        $albid = $selfbusi->self_insert('t_space_album', $data);
        $response = $albid."|".$albName;
        echo $response;
           
    }
}
else if($module == "GetSplit")//AJAX获取分页相册
{
    $page = $_POST['page'];
    $id = $_POST['id'];
    $response = $selfbusi->getAlbumByPage($id, $page);
    $response = $response = json_encode($response);
    echo $response;
    
}
else if($module == "NewReply")//AJAX获取分页相册
{
    $id = $_POST['diaid'];
    $content = $_POST['newReply'];
    $data['idt_diary'] = $id;
    $data['content'] = $content;
    $data['createtime'] = $currtime;
    $data['crisisid'] = $_SESSION['baseinfo']['ID'];
    $data['type'] = "2";
    $data['level'] = empty($_POST['upid'])?"1":"2";
    $data['upid'] = empty($_POST['upid'])?0:$_POST['upid'];
    $data['delflg'] = "0";
    $selfbusi->self_insert('t_space_reply', $data);   
    echo "";
    
}
else if($module == "MultiDelSel")//Ajax删除照片
{
	$idlist = $_POST['ID'];
	$id = explode("|", $idlist);//split在此不通
	array_pop($id);//删除数组最后一项
	foreach($id as $item)
	{
		$where .= "   d.id='$item' OR";
	}
	//删除用户选定照片，真实删除
	$where = substr($where, 0,strlen($where)-2);
	$selfbusi->self_delete('t_space_album_photo', $where);
	//查找相册，更新删除后页面
	$albid = $_POST['alb'];
	$photo = $selfbusi->get_album_photos($albid);
	$response = json_encode($photo);
	echo $response;
}
else if($module == "UpdateAlbum")
{
	$albid = $_POST['alb'];
	$photo = $selfbusi->get_album_photos($albid);
	$response = json_encode($photo);
	echo $response;
}
?>