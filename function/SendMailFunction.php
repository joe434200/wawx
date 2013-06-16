<?php
require_once ('BaseMail.php');
require_once ('class.phpmailer.php');
function relaceHtml($content, $name, $loginname, $pwd, $url)
{
    $rs = "";
    $rs = str_replace ( "[name]", $name, $content );
    $rs = str_replace ( "[loginname]", $loginname, $rs );
    $rs = str_replace ( "[pwd]", $pwd, $rs );
    $rs = str_replace ( "[url]", $url, $rs );
    return $rs;
}

function relaceHtml_pwd($content, $pwd)
{
    $rs = $content;
    
    $rs = str_replace ( "[pwd]", $pwd, $rs );
    
    return $rs;
}

function sendMail($title, $infoTemplate, $name, $regmail, $pwd, $url, $tomail)
{
    try
    {
        $basemail = new BaseMail ();
        $mail = $basemail->getMail (); //New instance, with exceptions enabled
        $mail->CharSet = "UTF-8";
        $body = file_get_contents ( $infoTemplate );
        $body = preg_replace ( '/\\\\/', '', $body ); //Strip backslashes
        

        $mail->IsSMTP (); // tell the class to use SMTP
        $mail->SMTPAuth = true; // enable SMTP authentication
        $mail->Port = 25; // set the SMTP server port
        $mail->Host = $basemail->getMail_in_host (); // SMTP server
        $mail->Username = $basemail->getMail_in (); // SMTP server username
        $mail->Password = $basemail->getMail_in_pwd (); // SMTP server password
        

        $mail->From = $basemail->getMail_in ();
        $mail->FromName = "吾校网";
        $to = $tomail;
        
        $mail->AddAddress ( $to );
        
        $mail->Subject = $title;
        
        //$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
        $mail->WordWrap = 80; // set word wrap
        

        $body = relaceHtml ( $body, $name, $regmail, $pwd, $url );
        $mail->IsHTML ( true );
        //$mail->addembeddedimage('logo.png', 'logoimg', 'logo.jpg');
        //$body .= "<h1>test 1 of phpmailer html</h1><p>this is a test picture: <img src='cid:logoimg' /></p>";
        

        $mail->MsgHTML ( $body );
        
        $mail->Send ();
        
        return true;
        echo 'Message has been sent.';
    }
    catch ( phpmailerException $e )
    {
        
        return false;
    
     //echo $e->errorMessage();
    }
}
function sendMail_forgetpwd($title, $infoTemplate, $pwd, $tomail)
{
    try
    {
        $basemail = new BaseMail ();
        $mail = $basemail->getMail (); //New instance, with exceptions enabled
        $mail->CharSet = "UTF-8";
        $body = file_get_contents ( $infoTemplate );
        $body = preg_replace ( '/\\\\/', '', $body ); //Strip backslashes
        $mail->IsSMTP (); // tell the class to use SMTP
        $mail->SMTPAuth = true; // enable SMTP authentication
        $mail->Port = 25; // set the SMTP server port
        $mail->Host = $basemail->getMail_in_host (); // SMTP server
        $mail->Username = $basemail->getMail_in (); // SMTP server username
        $mail->Password = $basemail->getMail_in_pwd (); // SMTP server password
        

        $mail->From = $basemail->getMail_in ();
        $mail->FromName = "Dadastan";
        
        $to = $tomail;
        
        $mail->AddAddress ( $to );
        
        $mail->Subject = $title;
        
        //$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
        $mail->WordWrap = 80; // set word wrap
        

        $body = relaceHtml_pwd ( $body, $pwd );
        
        $mail->MsgHTML ( $body );
        
        $mail->IsHTML ( true ); // send as HTML
        

        $mail->Send ();
        return true;
    
     //echo 'Message has been sent.';
    }
    catch ( phpmailerException $e )
    {
        return false;
    
     //echo $e->errorMessage();
    }
}

?>