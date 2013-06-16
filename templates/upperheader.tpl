<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>我的空间</title>
<link href="./templates/css/schoolbar/style.css" rel="stylesheet" type="text/css" />

</head>



<body>

<div class="q_toper">
       <div class="box">
	   <ul class="q_toper_a">
	   <li><a href="../school_www/index.html">吾校首页</a></li>
	   <li><a href="../school_www/around_food.html">校边生活</a></li>
	   <li><a href="../school_www/stud_index.html">学生惠</a></li>
	   <li><a href="../school_www/exchange_index.html">校币了没</a></li>
	   <li><a href="index.html">校笑吧</a></li>  
	   
	   <li class="rr"><a href="my_index.html">设置</a></li>
	   <li class="rr"><a href="zhuce.html">注册</a></li>
	   <li class="rr"  id="content"><a href="#">登录</a></li>
	   <li class="rr"><a href="self_index.html">亲，欢迎来到吾校！</a> </li>
	   </ul>
	   </div>
   </div>






<div id="alert">  
<h4><span> 现在登录</span><span id="close"> 关闭</span></h4>
<div style="padding:20px;"> 
<form action="" method="get">
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="ttbb2">
  <tr>
    <td width="18%">用户名：</td>
    <td colspan="2"><input type="text" name="textfield"  class="txt_zhuce"/></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td height="20" colspan="2" valign="top" class="color_999">例如：name_123</td>
    </tr>
  <tr>
    <td>密 &nbsp;&nbsp;码：</td>
    <td width="59%"><input type="text" name="textfield"  class="txt_zhuce"/></td>
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
    <td height="50" colspan="2" valign="bottom"><input type="submit" name="Submit" value="登 录"  class="anniu4"/>
	&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" name="Submit" value="注 册"  class="anniu4" onClick="window.location.href='zhuce.html' "/>
	</td>
    </tr>
</table>
</form>
</div>
</div>
{literal}
<script type="text/javascript">  
var myAlert = document.getElementById("alert");  
var reg = document.getElementById("content").getElementsByTagName("a")[0];  
var mClose = document.getElementById("close");   
reg.onclick = function()  
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
