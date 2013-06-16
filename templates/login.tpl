<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=shift_jis" />
<title>LOGIN</title>

<link rel="stylesheet" type="text/css" href="./templates/css/login.css" />
<script src="./templates/scripts/prototype.js" type="text/javascript"></script>
<script src="./templates/scripts/front.js" type="text/javascript"></script>
<script src="./templates/scripts/validate.js" type="text/javascript"></script>
</head>

<body onkeydown="javascript:keyDown(event);">
<div class="login_bj">
<div class="login_bj2">
<form action="login.php?module=login" id="loginId" method="post">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td width="23%" height="35"><img src="./templates/images/login3.gif" /></td>
		<td width="77%"><input type="text" name="staffName" id="staffName"
			class="login_input" value="{$email}" /></td>
	</tr>
	<tr>
		<td height="35"><img src="./templates/images/login4.gif" /></td>
		<td><input type="password" name="password" id="password"
			class="login_input" value="{$password}" /></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td style="font-size: 12px;"><input type="checkbox"
			name="rememberstatus" id="rememberstatus" {if $rememberstatus neq ''}checked{/if}/>ログイン状態を保持</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td height="43" valign="bottom">&nbsp; <input name="button"
			type="button" class="login_bt" id="button" value=""
			onclick=" javascript:login();" /> &nbsp;&nbsp;&nbsp; <input
			name="button" type="button" class="login_bt2" value="" id="yuanGong"
			onclick="dakai_yg()" /></td>
	</tr>
</table>
</form>
</div>

{include file=warning.tpl}



<div id="light" class="white_content">
<h3>WorkFlowSystem</h3>
<p>”WorkFlowSystemを終了しますが、よろしいですか？”</p>
<div class="content_nr"><input name="OK" type="button" class="anniu2"
	value="OK" onclick="javascript:Close_Win();" />&nbsp;&nbsp;&nbsp;&nbsp;
<input name="Close" type="button" class="anniu2" value="キャンセル"
	onclick="window.location='login.php'" /></div>
</div>

<div id="fade" class="black_overlay"></div>
</div>
</body>
</html>




<script src="./templates/scripts/login.js" type="text/javascript"></script>
