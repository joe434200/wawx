<?php
final class MessageUtil
{
    // 共通
    
    static $E0001 = 'Access database fail.';
    static $E0002 = 'database is not exist.';
    static $E0003 = 'SQL input error';
    static $E0004 = 'SQL statement is error';
    static $E0005 = 'Deal database throw an error';
     
     
     //--------------add by zrh---------------------
    static $E0001_EN = "Sorry,E-MAIL is not exist!";
    static $E0001_ZH = "对不起,该用户不存在!";
    
    static $E0002_EN = "Sorry, password input error!";
    static $E0002_ZH = "对不起,密码输入错误!";
    
    static $E0003_EN = "Sorry, the account is invalid!";
    static $E0003_ZH = "对不起,该用户未生效!";
    
    static $E0004_EN = "Sorry, the email has occupied!";
    static $E0004_ZH = "对不起,该email已被占用!";
    
    static $E0005_EN = "Sorry, Verify Code Error!";
    static $E0005_ZH = "对不起,验证码错误!";
    
    static $M0001_EN = "The email can be used";
    static $M0001_ZH = "该email可以使用!";
    
    static $M0002_EN = "Confirm EMail From 515xiao.com";
    static $M0002_ZH = "来自吾校网的确认邮件";
    
    static $M0003_EN = "Bind Success.";
    static $M0003_ZH = "绑定成功.";
    
    static $M0004_EN = "Retrieve the password From 515xiao.com";
    static $M0004_ZH = "来自吾校网的密码找回邮件";
    
    static $M0005_EN = "* Retrieve the password email had sent,please receive it.";
    static $M0005_ZH = "* 密码找回邮件已发送,请查收!";
    
    //-----------------------


    /**
     * メッセージを取得する。<br />
     *
     * @param string $errorCode エラーコード
     * @return メッセージ
     */
    public static function getMessage($errorCode)
    {
        return self::$$errorCode;
    }

}