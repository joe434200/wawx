<?php /* Smarty version 2.6.18, created on 2013-06-14 11:12:12
         compiled from spaceheader.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'spaceheader.tpl', 140, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>个人后台</title>
<link href="./templates/css/schoolbar/style.css" rel="stylesheet" type="text/css" />
<link href="./templates/scripts/My97DatePicker/skin/WdatePicker.css" rel="stylesheet" type="text/css" />
<script src="./templates/scripts/prototype.js" type="text/javascript"></script>
  <script src="./templates/scripts/front.js" type="text/javascript"></script>
  <script src="./templates/scripts/validate.js" type="text/javascript"></script>

<script src="./templates/scripts/My97DatePicker/WdatePicker.js"></script>

<script src="./templates/scripts/jquery-1.6.3.js" type="text/javascript"></script>
<script src="./templates/pagesplit/page.js" type="text/javascript"></script>
<script src="./templates/scripts/schoolbar/roll.js" type="text/javascript"></script>
<script src="./templates/scripts/login.js" type="text/javascript"></script>
<script src="./templates/scripts/self_zone.js" type="text/javascript"></script>
</head>



<body>

<div class="q_toper">
       <div class="box">
	   <ul class="q_toper_a">
	   <li><a href="javascript:void(0)" onclick="window.location='index.php'">吾校首页</a></li>
	   <li><a href="javascript:void(0)" onclick="window.location='aroundlife.php'">校边生活</a></li>
	   <li><a href="javascript:void(0)" onclick="window.location='index.php?act=studentwill'">学生惠</a></li>
	   <li><a href="javascript:void(0)" onclick="window.locaton='exchange.php?act=index'">校币了没</a></li>
	   <li><a href="javascript:void(0)" onclick="window.location='barindex.php'">校笑吧</a></li>
	   
	   <li class="rr"><a href="userCenter.php">设置</a></li>
	   <?php if ($_SESSION['loginok'] == 1): ?>
	   <li class="rr"><a href="#">亲，欢迎来到吾校！</a> </li>
	   		<?php if ($_SESSION['baseinfo']['nickname'] != ""): ?>
	   		<li class="rr"><a href="javascript:void(0)" onclick="javascript:window.location='self_zone.php'"><?php echo $_SESSION['baseinfo']['nickname']; ?>
</a></li>
	   		<?php else: ?>
	   		<li class="rr"><a href="javascript:void(0)" onclick="javascript:window.location='self_zone.php'"><?php echo $_SESSION['baseinfo']['email']; ?>
</a></li>
	   		<?php endif; ?>
	   <?php else: ?>
	   <li class="rr"><a href="javascript:void(0)" onclick="window.location='register.php'">注册</a></li>
	   <li class="rr"  id="content"><a href="#" onclick="javascript:RegOnclick()">登录</a></li>
	   <li class="rr"><a href="#">亲，欢迎来到吾校！</a> </li>
	   <?php endif; ?>
	   
	   </ul>
	   </div>
   </div>






<div id="alert">  
<h4><span> 现在登录</span><span id="close"> 关闭</span></h4>
<div style="padding:20px;"> 
<form action="login.php?module=login" method="post" id="frm1" name="frm1">
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="ttbb2">
  <tr>
    <td width="18%">用户名：</td>
    <td colspan="2"><input type="text" name="data[email]" id="email"  class="txt_zhuce"/></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td height="20" colspan="2" valign="top" class="color_999">例如：name_123</td>
    </tr>
  <tr>
    <td>密 &nbsp;&nbsp;码：</td>
    <td width="59%"><input type="text" name="data[password]" id="password"  class="txt_zhuce"/></td>
    <td width="23%" class="a0392"><a href="#">找回密码？</a></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td height="40" colspan="2" valign="bottom">
      <input name="checkbox" type="checkbox" value="checkbox" checked="checked" />
      记住用户&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      
      <input type="checkbox" name="checkbox2" value="checkbox" />
      保持登录状态</td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td height="50" colspan="2" valign="bottom"><input type="button" name=login value="登 录"  class="anniu4" onclick="javascript:checklogin();"/>
	&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" name="Submit" value="注 册"  class="anniu4" onClick="window.location.href='zhuce.html' "/>
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
<?php echo '
<script type="text/javascript">  
var myAlert = document.getElementById("alert");  
//var reg = document.getElementById("content");
var mClose = document.getElementById("close");

function RegOnclick()  
{  
myAlert.style.display = "block";  
myAlert.style.position = "absolute";  
myAlert.style.top = "40%";  
myAlert.style.left = "50%";  
myAlert.style.marginTop = "-75px";  
myAlert.style.marginLeft = "-150px";  
  
mybg = document.createElement("div");   
mybg.setAttribute("id","mybg");   
mybg.style.background = "#000";  
mybg.style.width = "100%";  
mybg.style.height = "100%";  
mybg.style.position = "absolute";  
mybg.style.top = "0";  
mybg.style.left = "0";  
mybg.style.zIndex = "500";  
mybg.style.opacity = "0.6";  
mybg.style.filter = "Alpha(opacity=60)";  
document.body.appendChild(mybg);  
document.body.style.overflow = "hidden";  
};  
 
 mClose.onclick = function()  
{  
myAlert.style.display = "none";  
mybg.style.display = "none";  
} ; 

</script>
'; ?>


<!--头部-->

<div class="blank10"></div>
<div class="block">
<div class="space_top">
<h3 style="font-family:KaiTi"><?php if (count($_SESSION['baseinfo']['nickname']) == 0): ?><?php echo $_SESSION['baseinfo']['email']; ?>
<?php else: ?><?php echo $_SESSION['baseinfo']['nickname']; ?>
<?php endif; ?>的个人空间</h3>
<p></p>
<ul class="afff_line clearfix">
<li><a href="self_zone.php?module=index">主页</a></li>
<li><a href="self_zone.php?module=daily">日志</a></li>
<li><a href="self_zone.php?module=album">相册</a></li>
<li><a href="self_zone.php?module=friends">好友</a></li>
<li><a href="self_zone.php?module=reply">留言板</a></li>
<li><a href="self_zone.php?module=perdoc">个人档</a></li>
</ul>
</div>
</div>



