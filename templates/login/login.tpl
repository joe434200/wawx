<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="./templates/css/schoolbar/style.css" rel="stylesheet"
	type="text/css" />
<title>{$pageTitle}</title>

</head>

<body>
<div class="zhuce_zong">

<div class="zhuce_zong1">
<div class="zhuce_zong1_left"><img
	src="./templates/images/schoolbar/logo.png" /></div>
<div class="zhuce_zong1_right a333"><a href="javascript:void(0)" onclick="window.location='register.php'">用户注册</a>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;忘记密码</div>
</div>


<div class="zhuce_mid">
<div class="zhuce_mid_kk">
<div class="zhuce_mid_kkz">
<div class="zhuce_mid_kk1"><img
	src="./templates/images/schoolbar/zhuce_1.gif" /></div>
<div class="zhuce_mid_kk2">
<form action="login.php?module=checkuser" method="post" id="frm1" name="frm1">
<table width="100%" border="0" cellspacing="0" cellpadding="0"
	class="ttbb2">
	<tr>
		<td width="18%">用户名：</td>
		<td colspan="2"><input type="text" name="email" id="email"
			class="txt_zhuce" value="{$email}"/>
			
		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td height="20" colspan="2" valign="top" class="color_999">例如：name_123</td>
	</tr>
	<tr>
		<td>密 &nbsp;&nbsp;码：</td>
		<td width="59%"><input type="password" name="password"
			id="password" class="txt_zhuce" value="{$password}"/></td>
		<td width="23%" class="a0392"><a href="reg_reback.php">找回密码？</a></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td height="40" colspan="2" valign="bottom"><input name="rememberstatus" id="rememberstatus" type="checkbox" {if $rememberstatus eq "1"}checked="checked"{/if}  />
		记住用户&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td height="50" colspan="2" valign="bottom"><input type="button"
			name="login" value="登 录" class="anniu4"
			onclick="javascript:checklogin();" /> &nbsp;&nbsp;&nbsp;&nbsp;<input
			type="button" name="Submit" value="注 册" class="anniu4"
			onClick="window.location.href='register.php?module=init' " /></td>
	</tr>
</table>
{include file=warning.tpl}</form>
</div>
<input id="logintype" name="logintype" value="1" style="display:none"/>


<div class="zhuce_mid_kk3 a0392"><span class="red"><a href="#">无校网-新年特惠推广套餐</a></span>&nbsp;&nbsp;
<a href="#">我有货盘，我做主</a> <br />
<a href="#">无校网-新年特惠推广套餐</a>&nbsp;&nbsp; <a href="#">找朋友</a></div>

</div>
</div>
</div>

</div>

<script type="text/javascript"
	src="./templates/scripts/schoolbar/q_foot.js"></script>
<script src="./templates/scripts/prototype.js" type="text/javascript"></script>
<script src="./templates/scripts/front.js" type="text/javascript"></script>
<script src="./templates/scripts/validate.js" type="text/javascript"></script>

<script src="./templates/scripts/My97DatePicker/WdatePicker.js"></script>

<script src="./templates/scripts/jquery-1.6.3.js" type="text/javascript"></script>
<script src="./templates/pagesplit/page.js" type="text/javascript"></script>
<script src="./templates/scripts/schoolbar/roll.js"
	type="text/javascript"></script>
<script src="./templates/scripts/login.js" type="text/javascript"></script>
</body>
</html>
