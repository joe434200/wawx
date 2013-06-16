<?php
require_once ('class.phpmailer.php');
require_once 'class.smtp.php';
require_once ('FileUtil.php');
class BaseMail extends PHPMailer
{
    var $mail;
    var $mail_in_host;
    var $mail_in;
    var $mail_in_pwd;
    
    var $mail_out_host;
    var $mail_out;
    var $mail_out_pwd;
    
    /**
     * @return the $mail
     */
    public function getMail()
    {
        return $this->mail;
    }
    
    /**
     * @param field_type $mail
     */
    public function setMail($mail)
    {
        $this->mail = $mail;
    }
    
    /**
     * @return the $mail_in
     */
    public function getMail_in()
    {
        return $this->mail_in;
    }
    
    /**
     * @return the $mail_in_pwd
     */
    public function getMail_in_pwd()
    {
        return $this->mail_in_pwd;
    }
    
    /**
     * @return the $mail_out
     */
    public function getMail_out()
    {
        return $this->mail_out;
    }
    
    /**
     * @return the $mail_out_pwd
     */
    public function getMail_out_pwd()
    {
        return $this->mail_out_pwd;
    }
    
    /**
     * @param field_type $mail_in
     */
    public function setMail_in($mail_in)
    {
        $this->mail_in = $mail_in;
    }
    
    /**
     * @param field_type $mail_in_pwd
     */
    public function setMail_in_pwd($mail_in_pwd)
    {
        $this->mail_in_pwd = $mail_in_pwd;
    }
    
    /**
     * @param field_type $mail_out
     */
    public function setMail_out($mail_out)
    {
        $this->mail_out = $mail_out;
    }
    
    /**
     * @param field_type $mail_out_pwd
     */
    public function setMail_out_pwd($mail_out_pwd)
    {
        $this->mail_out_pwd = $mail_out_pwd;
    }
    
    /**
     * construct メソッドが定義する。<br>
     *
     */
    function __construct()
    {
        $this->mail = new PHPMailer ( true );
        $data = FileUtil::getConfig ( "Mail" );
        $this->mail_in_host = $data ["Mail_In_Host"];
        $this->mail_in = $data ["Mail_In"];
        $this->mail_in_pwd = $data ["Mail_In_Pwd"];
        $this->mail_out = $data ["Mail_Out"];
        $this->mail_out_host = $data ["Mail_Out_Host"];
        $this->mail_out_pwd = $data ["Mail_Out_Pwd"];
    }
    
    /**
     * @return the $mail_in_host
     */
    public function getMail_in_host()
    {
        return $this->mail_in_host;
    }
    
    /**
     * @return the $mail_out_host
     */
    public function getMail_out_host()
    {
        return $this->mail_out_host;
    }
    
    /**
     * @param field_type $mail_in_host
     */
    public function setMail_in_host($mail_in_host)
    {
        $this->mail_in_host = $mail_in_host;
    }
    
    /**
     * @param field_type $mail_out_host
     */
    public function setMail_out_host($mail_out_host)
    {
        $this->mail_out_host = $mail_out_host;
    }
    
    /**
     * destruct メソッドが定義する。<br>֐�
     *
     */
    function __destruct()
    {
        $mail = null;
    }

}
?>