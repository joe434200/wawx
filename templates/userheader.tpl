<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>个人设置--我的概况</title>
<link href="./templates/css/schoolbar/style.css" rel="stylesheet" type="text/css" />
<script src="./templates/scripts/jquery-1.6.3.js" type="text/javascript"></script>
<script src="./templates/scripts/group.js" type="text/javascript"></script>
<script src="./templates/scripts/self_zone.js" type="text/javascript"></script>
<script src="./templates/scripts/preview.js" type="text/javascript"></script>
<script src="./templates/scripts/userCenter.js" type="text/javascript"></script>
<script src="./templates/scripts/prototype.js" type="text/javascript"></script>
</head>

<body>
<div class="backbj clearfix">



<!-- q_upper.js -->
<div class="q_toper">
       <div class="box">
	   <ul class="q_toper_a">
	   <li><a href="index.php">吾校首页</a></li>
	   <li><a href="aroundlife.php">校边生活</a></li>
	   <li><a href="index.php?act=studentwill">学生惠</a></li>
	   <li><a href="exchange.php?act=index">校币了没</a></li>
	   <li><a href="barindex.php">校笑吧</a></li>
	   
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
{/literal}



<!-- q_upper.js end -->

<div class="my_dh bor_bot1">
    <div class="box2">
	  <div class="my_logo"><img src="./templates/images/schoolbar/logo.gif" /></div>
	  <div class="my_dh2">
	   <ul>
	   <li class="sel"><a href="indivitual.php">首页</a></li>
	   <li><a href="self_zone.php">我的空间</a></li>
	   <li><a href="grp_home.php">我的圈子</a></li>
	   <li><a href="hd.php">我的活动</a></li>
	   </ul>
	  </div>
	 
	</div>
</div>

<div class="blank10"></div>
   <div class="box">
   <div class="case_ll clearfix">
   
   
   <div class="my_set clearfix">
   <div class="my_left clearfix">
   <p class="my_left_bt">个人设置</p>
   <ul class="my_left_dh">
   <li {if $smarty.session.temp.module eq "index" or $smarty.session.temp.module eq ""}class="sel"{/if}>{if $smarty.session.temp.module eq "index" or $smarty.session.temp.module eq ""}<div class="my_arrow"></div>{/if}<a href="userCenter.php" class="my1">我的概况</a></li>
   <li {if $smarty.session.temp.module eq "dataModify" or $smarty.session.temp.module eq "dataFriend" or $smarty.session.temp.module eq "dataHobby"}class="sel"{/if}>{if $smarty.session.temp.module eq "dataModify" or $smarty.session.temp.module eq "dataFriend" or $smarty.session.temp.module eq "dataHobby"}<div class="my_arrow"></div>{/if}<a href="userCenter.php?module=dataModify"  class="my2">资料修改</a></li>
   <li {if $smarty.session.temp.module eq "avatar"}class="sel"{/if}>{if $smarty.session.temp.module eq "avatar"}<div class="my_arrow"></div>{/if}<a href="userCenter.php?module=avatar"  class="my3">头像设置</a></li>
   <li {if $smarty.session.temp.module eq "privacy"}class="sel"{/if}>{if $smarty.session.temp.module eq "privacy"}<div class="my_arrow"></div>{/if}<a href="userCenter.php?module=privacy"  class="my4">隐私设置</a></li>
   <li {if $smarty.session.temp.module eq "password"}class="sel"{/if}>{if $smarty.session.temp.module eq "password"}<div class="my_arrow"></div>{/if}<a href="userCenter.php?module=password"  class="my5">修改密码</a></li>
   </ul>
   
   {if $smarty.session.temp.module eq "order"}
   <div class="my_left_bt sel"><div class="my_arrow2"></div><a href="userCenter.php?module=order">我的订单</a></div>
   {else}
   <p class="my_left_bt"><a href="userCenter.php?module=order">我的订单</a></p>
   {/if}
   {if $smarty.session.temp.module eq "address"}
   <div class="my_left_bt sel"><div class="my_arrow2"></div><a href="userCenter.php?module=address">收货地址</a></div>
   {else}
   <p class="my_left_bt"><a href="userCenter.php?module=address">收货地址</a></p>
   {/if}
   {if $smarty.session.temp.module eq "collect" or $smarty.session.temp.module eq "collectTZ" or $smarty.session.temp.module eq "collectRZ"}
   <div class="my_left_bt sel"><div class="my_arrow2"></div><a href="userCenter.php?module=collect">我的收藏</a></div>
   {else}
   <p class="my_left_bt"><a href="userCenter.php?module=collect">我的收藏</a></p>
   {/if}
   <p class="my_left_bt">我的信箱</p>
   <ul class="my_left_dh">
   {if $smarty.session.temp.module eq "outbox"}
   <li class="sel"><div class="my_arrow"></div><a href="userCenter.php?module=outbox" class="my6">发件箱</a></li>   
   {else}
   <li><a href="userCenter.php?module=outbox" class="my6">发件箱</a></li>
   {/if}
   {if $smarty.session.temp.module eq "inbox"}
   		{if $hinfo.base.uncounts eq 0}
   		<li class="sel"><div class="my_arrow"></div><a href="userCenter.php?module=inbox" class="my6">收件箱</a></li>   
   		{else}
   		<li class="sel"><div class="my_arrow"></div><a href="userCenter.php?module=inbox" class="my6">收件箱<img src="./templates/images/schoolbar/wb3.gif" alt="您有未读邮件" title="您有未读邮件"/></a></li>
   		{/if}
   {else}
   		{if $hinfo.base.uncounts eq 0}
   		<li><a href="userCenter.php?module=inbox" class="my6">收件箱</a></li>
   		{else}
   		<li><a href="userCenter.php?module=inbox">收件箱<img src="./templates/images/schoolbar/wb3.gif" alt="您有未读邮件" title="您有未读邮件"/></a></li>
   		{/if}
   {/if}
   {if $smarty.session.temp.module eq "dustbin"}
   <li class="sel"><div class="my_arrow"></div><a href="userCenter.php?module=dustbin" class="my6">垃圾箱</a></li>   
   {else}
   <li><a href="userCenter.php?module=dustbin" class="my6">垃圾箱</a></li>
   {/if}
   </ul>
   
   
   </div>