<?php /* Smarty version 2.6.18, created on 2013-06-02 16:46:23
         compiled from backstage/login.htm */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>管理中心</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="./templates/css/backstage/general.css" rel="stylesheet" type="text/css" />
<link href="./templates/css/backstage/main.css" rel="stylesheet" type="text/css" />

<script src="./templates/scripts/prototype.js" type="text/javascript"></script>
<script src="./templates/scripts/front.js" type="text/javascript"></script>
<script src="./templates/scripts/validate.js" type="text/javascript"></script>
<script src="./templates/scripts/backstage/login.js" type="text/javascript"></script>

</head>
<body style="background: #278296">
<?php echo '
<style type="text/css">
body {
  color: white;
}
</style>
'; ?>

<form method="post" action="admin_login.php?act=submit" name='theForm' id="theForm">
  <table cellspacing="0" cellpadding="0" style="margin-top: 100px" align="center">
  <tr>
    <td><img src="./templates/images/backstage/login.png" width="178" height="256" border="0" alt="ECSHOP" /></td>
    <td style="padding-left: 50px">
      <table>
      <tr>
        <td>管理员EMail：</td>
        <td><input type="text" name="username" id='username' value="<?php echo $this->_tpl_vars['username']; ?>
"/></td>
      </tr>
      <tr>
        <td>管理员密码：</td>
        <td><input type="password" name="password" id='userpwd' value="<?php echo $this->_tpl_vars['password']; ?>
"/></td>
      </tr>
      
      <tr>
        <td>验证码：</td>
        <td><input type="text" name="captcha" class="capital" id='captcha'/></td>
      </tr>
      <tr>
      <td colspan="2" align="right">
      <img src="GenerateYZ.php" width="143" height="25" id="yzimg" alt="CAPTCHA" border="1" onclick= "javascript:refreshYZ(this);" style="cursor: pointer;" title="看不清?点击更换另一个验证码." />
      </td>
      </tr>
     
      <tr><td colspan="2"><input type="checkbox" value="1" name="rememberstatus" id="rememberstatus" <?php if ($this->_tpl_vars['rememberstatus'] == 1): ?>checked <?php endif; ?>/><label for="remember">请保存我这次的登录信息。</label></td></tr>
      <tr><td>&nbsp;</td><td><input type="button" value="进入管理中心" class="button"  onclick="javascript:a();"/></td></tr>
      <tr>
        <td colspan="2" align="right">&raquo; <a href="<?php echo $this->_tpl_vars['home']; ?>
" style="color:white">返回首页</a> &raquo; <a href="<?php echo $this->_tpl_vars['forget']; ?>
" style="color:white">忘记密码</a></td>
      
      </tr>
      </table>
    </td>
  </tr>
  </table>
  

</form>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "warning.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

</body>
</html>