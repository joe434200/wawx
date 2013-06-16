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
<div class="login_bj3">
<form action="login.php?module=confirm" method="post">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
{foreach from=$rolelist item=item key=key}
  <tr>
    <td width="14%" valign="middle"><input name="userid" type="radio" value="{$item.id}"  {if $key+1 eq 1} checked {/if} /></td>
    <td width="28%" valign="middle">{$rightlist[$item.userright]}</td>
    <td width="58%">{$item.username1} {$item.username2}</td>
  </tr>
  {/foreach}
  <tr>
    <td colspan="3" align="center" valign="middle"  style="padding-top:10px; border-bottom:none;"><input name="" type="button"  class="anniu5" value=" 戻り" onClick="window.location='login.php'"/>&nbsp;&nbsp;&nbsp;&nbsp;<input name="input" type="submit"  class="anniu2" value="確認"/></td>
    </tr>
</table>
</form>
</div>
</div>
</body>
</html>




<script src="./templates/scripts/login.js" type="text/javascript"></script>
