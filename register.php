<?php

require_once ('base.php');
require_once ('LoginBusiness.php');
require_once ('SessionUtil.php');
require_once ('ConstUtil.php');
require_once ('RegisterBusiness.php');

$regbusi = new RegisterBusiness ();
$currdate = date("Y-m-d H:i:s");

if ($_REQUEST ['module'] == "init" || $_REQUEST ['module'] == "") //初始化注册首页
{
    $smarty->display ( 'register/zhuce.tpl' );
}
elseif ($_REQUEST ['module'] == "init_shangjia") //初始化商家注册页面
{
    $smarty->display ( 'register/zhuce_shangjia.tpl' );
}
elseif ($_REQUEST ['module'] == "send_email") //提取表单，存数据库,发送邮件
{
    
    $user = $_POST ['user']; //获取表单资料
    $usertype = $user['type'];//获取要注册用户类型
    //echo $usertype;
    //预注册---------
    $data['status'] = "0";
    $userid = $regbusi->reg_insert( 't_user', $data );
    //----------------
    if ($usertype == "0")
    {
        $module = "init";
        $name = "用户";
    }
    else
    {
        $module = "init_shangjia";
        $name = "商家";
    }
              
    //------------------发送邮件-----------------
    //访问服务器的确认连接
    $url = "http://" . $_SERVER ['HTTP_HOST'].$_SERVER['PHP_SELF']."?reg=".$userid."&module=success";
    $issucc = $regbusi->reg_sendMail ( $name, $user['password'], $user['email'] ,$url);
    
    //------------------取数据，存库------------   
    if ($issucc) //邮件发送成功,显示步骤2页面
    {
        //echo "success";
        $_SESSION['temp_user']['email'] = $data ['email'] = $user ['email'];
        $_SESSION['temp_user']['password'] = $data ['password'] = $user ['password'];
        $_SESSION['temp_user']['type'] = $data ['usertype'] = $user['type'];
        if ($usertype == '1') //创建数组，insert到数据库t_user
        {
            $_SESSION['temp_user']['status'] = $data ['status'] = "0"; //用户状态设置为“保存”
            $_SESSION['temp_user']['sex'] = $data ['sex'] = $user ['sex'];
            $_SESSION['temp_user']['shopname'] = $data ['shopname'] = $user ['shopName'];
            $_SESSION['temp_user']['scope'] = $data ['scope'] = $user ['shopScope'];
            $_SESSION['temp_user']['chargeperson'] = $data ['chargeperson'] = $user ['shopCharger'];
            $_SESSION['temp_user']['contactphone'] = $data ['contactphone'] = $user ['shopContact'];
            $_SESSION['temp_user']['storeaddr'] = $data ['storeaddr'] = $user ['shopAddress'];
            $_SESSION['temp_user']['remark'] = $data ['remark'] = $user ['remark'];
            
            
            //----------保存上传的文件-----------
            if (file_exists("uploadfiles/register/" . $_FILES["shopLicence"]["name"]))
            {
                $filename = date("YmdHis").$_FILES['shopLicence'] ['name'];
            }
            else
            {
                $filename = $_FILES['shopLicence'] ['name'];
            }
            
            if(!move_uploaded_file($_FILES["shopLicence"]["tmp_name"],"uploadfiles/register/".$filename) )
            {
                echo "failed";
                exit;
            }
            
            $data['busilicence'] = $filename; 
    
        }
        //实际注册
        $where = " id = '$userid'";
        $regbusi->reg_update('t_user', $data, $where);
        //------------------------

        $_SESSION['temp_user']['url'] = $url;
        $_SESSION['temp_user']['name'] = $name;
        $_SESSION['temp_user']['id'] = $userid;

    
        //echo "<pre>";
        //print_r($_SESSION['temp_user']);
        //exit;
        $smarty->assign('email',$data['email']);
        $smarty->assign ( 'usertype', $usertype ); //传用户类型
        $smarty->assign ( 'module', $module ); //传跳转页面的module
        $smarty->display('register/zhuce_email.tpl');
    }
    else //邮件发送失败,显示失败页面
    {
        //删除注册
        $where = " id = '$userid'";
        $regbusi->reg_delete('t_user', $where);          
        $smarty->display ( 'register/zhuce_email_failed.tpl');
    }
    

}
elseif ($_REQUEST['module'] == "success") //邮件激活成功
{
    //更新用户状态//用户状态设置为“使用”//初始化用户信息
    $data ['status'] = "1";
    $data ['photo'] = "avatar.jpeg";
    $data ['createtime'] = $currdate;
    $data ['level'] = "1";
    $data ['level'] = "1";
    $data ['consumcoins'] = "0";
    $data ['forumcoins'] = "0";
    $data ['timescoins'] = "0";
    $data ['coins'] = "0";
    $userid = $_REQUEST['reg'];
    $where = " id = '$userid'";
    
    
    //给用户添加一个默认相册,默认相册由系统创建，不提供给用户更改和删除的接口
    //此段代码要转移到 用户注册的时候执行
    {
        //创建个人默认相册
        $rs = $selfbusi->Search("t_space_album", "m.*","","m.introduction='default' AND m.creater='$userid'");
        if(count($rs) < 1 )
        {
            $sata['albumname'] = "默认相册";
            $sata['introduction'] = "default";
            $sata['createtime'] = $currtime;
            $sata['creater'] = $userid;
            $albid = $selfbusi->self_insert('t_space_album', $sata);
        }
        
        //创建个人日志分类
        $rs = $selfbusi->Search("t_space_diary_catalog", "m.*","","m.name='默认分类' AND m.idt_user='$userid'");
        if(count($rs) < 1 )
        {
            $cata['name'] = "默认分类";
            $cata['idt_user'] = $userid;
            $cata['sum'] = "0";
            $selfbusi->self_insert('t_space_diary_catalog', $cata);
        }
        
        //创建个人空间
        $space['spacename'] = "个人空间";
        $space['creator'] = $userid;
        $space['idt_user'] = $userid;
        $space['createtime'] = $currdate;
        $selfbusi->self_insert('t_space_diary_catalog', $space);
        
    }
    
    
    $regbusi->reg_update('t_user', $data, $where);
    $smarty->display ( 'register/zhuce_email_ok.tpl' );
}
elseif($_REQUEST['module']=="ajax_check_email") //-------------------reg-----------------ajax-check-----------------------
{
    $email = $_GET['email'];
    $compare = "email = '$email' AND status='1'";
    $response = $regbusi->check_exist('t_user', $compare );
    echo $response;
    //echo "reback";

}
else if($_REQUEST['module'] == "ajax_check_file")
{
    $path = $_GET['path'];
    
}
else if($_GET['module'] == "resend_email")
{
    $compare = "id = '".$_SESSION['temp_user']['id']."' AND status='0'";//先判断ID是否存在,避免重新更新数据库
    $response = $regbusi->check_exist('t_user', $compare );
    if($response == "0")
    {
        echo "failed";
        exit;
    }
    else
    {
        $name = $_SESSION['temp_user']['name'];
        $pwd = $_SESSION['temp_user']['password'];
        $email = $_SESSION['temp_user']['email'];
        $url = $_SESSION['temp_user']['url'];
        $issucc = $regbusi->reg_sendMail($name,$pwd,$email,$url);
        if($issucc)
        {
            $smarty->assign('email',$_SESSION['temp_user']['email']);
            $smarty->display('register/zhuce_email.tpl');
        }
        else 
        {
            $smarty->display ( 'register/zhuce_email_failed.tpl');
        }
    }
    
	
}
else if($_REQUEST['module'] == "modify_email")
{
    $smarty->assign('temp',$_SESSION['temp_user']);
    //echo "<pre>";
    //print_r($_SESSION);
    //exit;
    if($_SESSION['temp_user']['type'] == '0')    
    {
        $smarty->display('register/zhuce.tpl');
    }
    else
    {
        $smarty->display('register/zhuce_shangjia.tpl');
    }
    $_SESSION['temp_user'] = "";
}
else
{
    
}

?>