<?php
require_once ('BaseBusiness.php');
require_once ('DateUtil.php');
require_once ('SupportException.php');
require_once 'SendMailFunction.php';
require_once ('MessageUtil.php');

class RegisterBusiness extends BaseBusiness
{
    
    function __construct()
    {
        parent::__construct ();
    }
    
    function reg_update($tablename, $data, $where)
    {
        parent::Update ( $tablename, $data, $where );
    }
    
    function reg_insert($tablename, $data)
    {
        return parent::Insert ( $tablename, $data );
    }
    
    function reg_search($tablename, $fieldslist)
    {
        parent::Search ( $tablename, $fieldslist );
    }
    
    function reg_delete($tablename,$where)
    {
        return parent::Delete($tablename,$where);
    }
    //发送激活邮件进行注册认证
    function reg_sendMail($name, $password, $email,$url)
    {
        //邮件标题
        $mailtitle = MessageUtil::getMessage ( "M0002_ZH" );
        //邮件模板文件url
        $templatepath = BaseUrl . "/templates/emailtemplates/email_register.html";
        //发送邮件
        $issucc = sendMail ( $mailtitle, $templatepath, $name, $email, $password, $url, $email );
        //echo "here";
        return $issucc;
    }
    
    //check，判断是否存在
    function check_exist($tablename, $compare)
    {
        $this->sql = "SELECT id FROM  " . $tablename . " WHERE " . $compare;
        $rs = $this->db->exceuteQuery ( $this->sql );
        if (count ( $rs ) == "0")
        {
            return "0"; //不存在
        }
        return "1"; //存在
    }
}
?>