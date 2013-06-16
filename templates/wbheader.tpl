<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>用户空间</title>
<script src="./templates/scripts/jquery-1.6.3.js" type="text/javascript"></script>
<script src="./templates/scripts/prototype.js" type="text/javascript"></script>
<script src="./templates/scripts/self_zone.js" type="text/javascript"></script>
<script src="./templates/scripts/wbUser.js" type="text/javascript"></script>
<script src="./templates/scripts/validate.js" type="text/javascript"></script>
<link href="./templates/css/schoolbar/style.css" rel="stylesheet" type="text/css" />

</head>

<body>
<div class="wb_bj">


<!------------ q_upper.js start -------------------->
<div class="q_toper">
       <div class="box">
	   <ul class="q_toper_a">
	   <li><a href="index.php">吾校首页</a></li>
	   <li><a href="aroundlife.php">校边生活</a></li>
	   <li><a href="index.php?act=studentwill">学生惠</a></li>
	   <li><a href="exchange.php?act=index">校币了没</a></li>
	   <li><a href="barindex.php">校笑吧</a></li>
	   <li><a href="javascript:void(0)" onclick="javascript:window.location='index.php'">校笑吧</a></li>
	   
	   <li class="rr"><a href="userCenter.php">设置</a></li>
	   {if $smarty.session.loginok eq 1}
	   <li class="rr"><a href="#">亲，欢迎来到吾校！</a> </li>
	   		{if $smarty.session.baseinfo.nickname neq ""}
	   		<li class="rr"><a href="javascript:void(0)" onclick="javascript:window.location='self_zone.php'">{$smarty.session.baseinfo.nickname}</a></li>
	   		{else}
	   		<li class="rr"><a href="javascript:void(0)" onclick="javascript:window.location='self_zone.php'">{$smarty.session.baseinfo.email}</a></li>
	   		{/if}
	   {else}
	   <li class="rr"><a href="javascript:void(0)" onclick="window.location='register.php'">注册</a></li>
	   <li class="rr"  id="content"><a href="#" onclick="javascript:RegOnclick()">登录</a></li>
	   <li class="rr"><a href="#">亲，欢迎来到吾校！</a> </li>
	   {/if}
	   
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
{include file=warning.tpl}
</form>
</div>
</div>

{literal}
<script type="text/javascript">  
var myAlert = document.getElementById("alert");
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
{/literal}


<!------------ q_upper.js end -------------------->



<!--头部 信息 简介等-->
<div class="blank"></div>
<div class="block clearfix">
<div class="wb_head">
<h3 style="font-family:KaiTi">XX的个人空间</h3>
<p></p>
</div>
</div>


<!--主体-->
<div class="block clearfix">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
     <!--左侧-->
    <td valign="top" class="wb_bd_l">
<div class="wb_bd_l_p">
<div class="pic"><a href="javascript:void(0)" onclick="window.location='wb_index.php'"><img src="./templates/images/schoolbar/forum_pic1.gif" /></a></div>
<div class="name blue_s"><a href="javascript:void(0)" onclick="window.location='wb_index.php'">美丽高原</a></div> 
</div>

<div class="xian"></div>
<div class="kk a_blue">
<ul>
<li class="e" onclick="window.location='wb_index.php'">TA的主页</li>
<li class="a" onclick="window.location='wb_index.php?module=diary'">TA的日志</li>
<li class="c" onclick="window.location='wb_index.php?module=album'">TA的相册</li>
<li class="b" onclick="window.location='wb_index.php?module=reply'">TA的留言板</li>
<li class="d" onclick="window.location='wb_index.php?module=perdoc'">TA的个人档</li>
</ul>
</div>
</td>

