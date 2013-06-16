<?php /* Smarty version 2.6.18, created on 2013-06-16 16:43:26
         compiled from barheader.tpl */ ?>
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

<div class="lt_dh bor_bot1">
    <div class="box2 clearfix">
	  <div class="lt_dh2 clearfix">
	  
	   <div class="index_logo"><a href="index.php"><img src="./templates/images/schoolbar/logo.png" /></a></div>
	   
	   <ul class="home_dh">
	   <li class="small"><a href="index.php">吾校首页</a></li>
	   <li class="small"><a href="barindex.php" <?php if ($_SESSION['barType'] == 1): ?>class="barchecked"<?php endif; ?>>校笑吧</a></li>
	   <li class="small"}><a href="grp_home.php" <?php if ($_SESSION['barType'] == 2): ?>class="barchecked"<?php endif; ?>>圈子</a></li>
	   <li class="small"><a href="hd.php" <?php if ($_SESSION['barType'] == 3): ?>class="barchecked"<?php endif; ?>>活动</a></li>
	   <li class="small"><a href="forum_home.php" <?php if ($_SESSION['barType'] == 4): ?>class="barchecked"<?php endif; ?>>校谈</a></li>
	   </ul>
	   
	   <div class="home_sear">
	    <div class="lt_input lt_top_txt"><input name="" type="text" /></div>
		<div class="lt_input"><input type="button"  class="lt_top_ann" value=" "/></div>
	  </div>
	  
	  </div>
	  
	</div>
   </div>