<?php /* Smarty version 2.6.18, created on 2013-06-07 12:28:57
         compiled from register/zhuce_key.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>找回密码</title>
<link href="./templates/css/schoolbar/style.css" rel="stylesheet"
	type="text/css" />
</head>

<body>
<div class="clearfix">



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
	   <li class="rr"><a>亲，欢迎来到吾校！</a> </li>
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

<div class="blank20"></div>
<div class="box4">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td width="14%"><img src="./templates/images/schoolbar/logo.png" /></td>
		<td width="86%" valign="bottom">
		<h2>找回密码</h2>
		</td>
	</tr>
</table>
</div>
<div class="blank10"></div>

<div class="box4">
<div class="case_ll clearfix">

<div class="zhuce_key_bj clearfix">
<div class="zhuce_key clearfix ">
<ul>
	<?php if ($this->_tpl_vars['step'] == '1'): ?>
	<li class="sel"><a href="reg_reback.php?module=key_1st">通过注册邮箱</a></li>
	<li><a href="reg_reback.php?module=key_2nd">通过绑定手机</a></li>
	<li><a href="reg_reback.php?module=key_3rd">通过密保问题</a></li>
	<?php elseif ($this->_tpl_vars['step'] == '2'): ?>
	<li><a href="reg_reback.php?module=key_1st">通过注册邮箱</a></li>
	<li class="sel"><a href="reg_reback.php?module=key_2nd">通过绑定手机</a></li>
	<li><a href="reg_reback.php?module=key_3rd">通过密保问题</a></li>
	<?php else: ?>
	<li><a href="reg_reback.php?module=key_1st">通过注册邮箱</a></li>
	<li><a href="reg_reback.php?module=key_2nd">通过绑定手机</a></li>
	<li class="sel"><a href="reg_reback.php?module=key_3rd">通过密保问题</a></li>
	<?php endif; ?>
</ul>
</div>
</div>


<div class="regist">
<div class="blank20"></div>
<form action="" method="get">
<table width="100%" border="0" cellspacing="0" cellpadding="0"
	class="ttbb1">
	<?php if ($this->_tpl_vars['step'] == '1'): ?>
	<tr>
		<td width="39%" align="right">用户名/邮箱：</td>
		<td width="61%"><input type="text" name="textfield" class="my_txt_200" /></td>
	</tr>
	<tr>
		<td align="right">验证码：</td>
		<td><input type="text" name="textfield2" class="my_txt_200" /></td>
	</tr>
	<tr>
		<?php elseif ($this->_tpl_vars['step'] == '2'): ?>
		<tr>
			<td width="39%" align="right">请输入手机号码：</td>
			<td width="61%"><input type="text" name="textfield"
				class="my_txt_200" /></td>
		</tr>
		<?php else: ?>
		<tr>
			<td width="39%" align="right">密保问题：</td>
			<td width="61%"><input type="text" name="textfield"
				class="my_txt_200" /></td>
		</tr>
		<tr>
			<td align="right">答案：</td>
			<td><input type="text" name="textfield2" class="my_txt_200" /></td>
		</tr>
		<tr>
			<?php endif; ?>
			<td align="right">&nbsp;</td>
			<td height="80"><input name="" type="button" class="my_ann1"
				value="下一步" /></td>
		</tr>

</table>
</form>



<div class="blank20"></div>
<div class="zhuce_key_answ"><img
	src="./templates/images/schoolbar/icon9.gif" /> 如果以上方式不能解决您的问题，请联系客服。</div>
<div class="blank20"></div>

</div>
</div>
</div>


<div class="blank10"></div>

</div>


<?php echo '
<script type="text/javascript" src="js/q_foot.js"></script>

'; ?>


</body>
</html>