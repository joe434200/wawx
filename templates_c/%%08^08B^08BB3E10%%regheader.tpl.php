<?php /* Smarty version 2.6.18, created on 2013-06-07 12:42:57
         compiled from regheader.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>注册</title>
<link href="./templates/css/schoolbar/style.css" rel="stylesheet"
	type="text/css" />
</head>

<body onload="createCode()">

<div class="clearfix">
<?php echo '
<script type="text/javascript" src="./templates/scripts/prototype.js"></script>
<script type="text/javascript" src="./templates/scripts/jquery-1.6.3.js"></script>
<script type="text/javascript" src="./templates/scripts/validate.js"></script>
<script type="text/javascript" src="./templates/scripts/register_check.js"></script>
'; ?>

<!------------ q_upper.js start -------------------->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $this->_tpl_vars['pageTitle']; ?>
</title>
<link href="./templates/css/schoolbar/style.css" rel="stylesheet" type="text/css" />
<link href="./templates/scripts/My97DatePicker/skin/WdatePicker.css" rel="stylesheet" type="text/css" />
<link href="./templates/pagesplit/page.css"  rel="stylesheet" type="text/css" />

  <script src="./templates/scripts/front.js" type="text/javascript"></script>
  <script src="./templates/scripts/validate.js" type="text/javascript"></script>

<script src="./templates/scripts/My97DatePicker/WdatePicker.js"></script>

<script src="./templates/scripts/jquery-1.6.3.js" type="text/javascript"></script>
<script src="./templates/pagesplit/page.js" type="text/javascript"></script>
<script src="./templates/scripts/schoolbar/roll.js" type="text/javascript"></script>
<script src="./templates/scripts/login.js" type="text/javascript"></script>

</head>



<body>

<div class="q_toper">
       <div class="box">
	   <ul class="q_toper_a">
	   <li><a href="index.php">吾校首页</a></li>
	   <li><a href="aroundlife.php">校边生活</a></li>
	   <li><a href="index.php?act=studentwill">学生惠</a></li>
	   <li><a href="exchange.php?act=index">校币了没</a></li>
	   <li><a href="barindex.php">校笑吧</a></li> 
	   
	   <li class="rr"><a href="userCenter.php">设置</a></li>
	   <?php if ($_SESSION['loginok'] == 1): ?>
	   <li class="rr"><a href="javascript:void(0)">亲，欢迎来到吾校！</a> </li>
	   		<?php if ($_SESSION['baseinfo']['nickname'] != ""): ?>
	   		<li class="rr"><a href="self_zone.php"><?php echo $_SESSION['baseinfo']['nickname']; ?>
</a></li>
	   		<?php else: ?>
	   		<li class="rr"><a href="self_zone.php"><?php echo $_SESSION['baseinfo']['email']; ?>
</a></li>
	   		<?php endif; ?>
	   <?php else: ?>
	   <li class="rr"><a href="register.php?module=init">注册</a></li>
	   <li class="rr" ><a href="javascript:void(0)" id="content""  onclick="LoginOut();">登录</a></li>
	   <li class="rr"><a>亲，欢迎来到吾校！</a> </li>
	   <?php endif; ?>
	   
	   </ul>
	   </div>
   </div>






<div id="alert">  
<h4><span> 现在登录</span><span id="close"> 关闭</span></h4>
<div style="padding:20px;"> 
<form action="" method="post" id="frm1" name="frm1">
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="ttbb2">
  <tr>
    <td width="18%">用户名：</td>
    <td colspan="2"><input type="text" name="email" id="email" class="txt_zhuce" value=""/></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td height="20" colspan="2" valign="top" class="color_999">例如：1234@qq.com</td>
    </tr>
  <tr>
    <td>密 &nbsp;&nbsp;码：</td>
    <td width="59%"><input type="password" name="password" id="password" class="txt_zhuce" value=""/></td>
    <td width="23%" class="a0392"><a href="#">找回密码？</a></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td height="40" colspan="2" valign="bottom">
      <input type="checkbox" name="rememberstatus" id="rememberstatus"  <?php if ($this->_tpl_vars['rememberstatus'] == '1'): ?>checked="checked"<?php endif; ?> value=""/>
     记住密码&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      </td>
    </tr>
  <tr>
    <td>&nbsp;
    <input id="logintype" name="logintype" value="0" style="display:none"/>
    </td>
    <td height="50" colspan="2" valign="bottom"><input type="button" name="login" value="登 录"  class="anniu4" onclick="javascript:checklogin();"/>
	&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" name="Submit" value="注 册"  class="anniu4" onclick="javascript:window.location='register.php?module=init'"/>	
	</td>
	
    </tr>
</table>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "warning.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</form>
</div>
</div>


<!------------ q_upper.js end -------------------->