<?php
require_once('base.php');
require_once('LoginBusiness.php');
require_once('SessionUtil.php');
require_once('ConstUtil.php');
require_once('SelfBusiness.php');
$module =$_REQUEST['module'];
$selfbusi = new SelfBuiness();
$currtime = date("Y-m-d H:i:s");

//获取业务用户ID
//业务用户可能是 当前登录用户，也可能是被查询的用户
$userid = ($_REQUEST['uid'] == ''||empty($_REQUEST['uid'])) ? $_SESSION['baseinfo']['ID'] : $_REQUEST['uid'];


{
    $catalog = $selfbusi->get_diary_catalog($userid);
    $smarty->assign('catalog',$catalog);
}

if($module == "new")//（显示）新建日志
{
    
    $smarty->display('self_zone/self_rizhi_edit.tpl');
}
else if($module == "show")//显示指定日志
{
    $diaid = $_REQUEST['diaid'];
    $diary = $selfbusi->get_diary_show($diaid);
    $reply = $selfbusi->get_Reply('1', $diaid,'1');//获取该日志评论
    
    $smarty->assign('reply',$reply);
    $smarty->assign('diary',$diary);
    $smarty->display('self_zone/self_diary_show.tpl');
}
else if($module == "edit")//编辑指定日志
{
    $diaid = $_REQUEST['diaid'];
    $diary = $selfbusi->get_diary_show($diaid);
    $smarty->assign('diary',$diary);
    $smarty->display('self_zone/self_rizhi_edit.tpl');
}
else if($module == "del")//删除指定日志
{
    $diaid = $_REQUEST['diaid'];
    $selfbusi->self_delete('t_space_diary', "d.id='$diaid'");
    
    echo "<script language='javascript'>";
	echo "location='self_zone.php?module=daily';";
	echo "</script>";
    
}
else if($module == "newDiary")//创建新日志
{
    
    $data['title'] = $_POST['title'];
    $data['content'] = $_POST['content'];
    $data['creator'] = $_SESSION['baseinfo']['ID'];
    $data['createtime'] = $currtime;
    $data['idt_space_diary_catalog'] = $_POST['catalog'];
    $data['authority'] = "2";
    $id = $_POST['edit'];
    if(empty($id))//为空 ，则是新建，否则为编辑
    {
        $selfbusi->self_insert('t_space_diary', $data);
    }
    else
    {
        $selfbusi->self_update('t_space_diary', $data,"u.id='$id'");
    }
       
    echo "<script language='javascript'>";
	echo "location='self_zone.php?module=daily';";
	echo "</script>";
}
else if($module == "manager")//日志管理
{
    $smarty->display('self_zone/self_diary_guanli.tpl');
}
else if($module == "catalog")//按日志分类查看
{
    $diaid = $_REQUEST['diaid'];
    $diary = $selfbusi->get_diary($userid, $diaid);

    $smarty->assign('diary',$diary);
    $smarty->display('self_zone/self_diary_catalog.tpl');
}
else if($module == "CreateDiary")//AJAX创建新相册
{
    $albName = $_POST['albName'];
    if(count($selfbusi->Search("t_space_diary_catalog", "m.id","","m.name='$albName'")) > 0)
    {
        echo "exist";
    }
    else 
    {
        $data['name'] = $albName;
        $data['idt_user'] = $userid;
        $data['sum'] = "0";
        $albid = $selfbusi->self_insert('t_space_diary_catalog', $data);
        $response = $albid."|".$albName;
        echo $response;
           
    }
}
else if($module == "NewReply")//ajax提交日志评价
{
    
    $data['content'] = $_POST['newReply'];
    $data['idt_diary'] = $_POST['diaid'];
    $data['createtime'] = $currtime;
    $data['crisisid'] = $_SESSION['baseinfo']['ID'];
    $data['level'] = empty($_POST['upid'])?"1":"2";
    $data['upid'] = empty($_POST['upid'])?0:$_POST['upid'];
    $data['type'] = "1";
    $data['delflg'] = "0";
    $selfbusi->self_insert('t_space_reply', $data);
    echo "Success";    
}
else if($module == "GetRelpy")//ajax获取日志，照片，留言板分页数据
{
    
    $type = $_POST['type'];
    $page = $_POST['page'];
    $id = $_POST['id'];
    $data = $selfbusi->get_Reply($type,$id,$page);
    $response = json_encode($data);//转换成json字符串
    echo $response;

}
else if($module == "GetDiarySplit")//ajax获取分页日志显示
{
    $uid = $_POST['id'];
    $diaid = $_POST['diaid'];
    $page = $_POST['page'];
    $data = $selfbusi->getDiaryPage($uid, $diaid, $page);
    $response = json_encode($data);//转换成json字符串
    echo $response;
    
}

?>