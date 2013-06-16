{include file=regheader.tpl}

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
	{if $step eq "1"}
	<li class="sel"><a href="reg_reback.php?module=key_1st">通过注册邮箱</a></li>
	<li><a href="reg_reback.php?module=key_2nd">通过绑定手机</a></li>
	<li><a href="reg_reback.php?module=key_3rd">通过密保问题</a></li>
	{elseif $step eq "2"}
	<li><a href="reg_reback.php?module=key_1st">通过注册邮箱</a></li>
	<li class="sel"><a href="reg_reback.php?module=key_2nd">通过绑定手机</a></li>
	<li><a href="reg_reback.php?module=key_3rd">通过密保问题</a></li>
	{else}
	<li><a href="reg_reback.php?module=key_1st">通过注册邮箱</a></li>
	<li><a href="reg_reback.php?module=key_2nd">通过绑定手机</a></li>
	<li class="sel"><a href="reg_reback.php?module=key_3rd">通过密保问题</a></li>
	{/if}
</ul>
</div>
</div>


<div class="regist">
<div class="blank20"></div>
<form action="" method="get">
<table width="100%" border="0" cellspacing="0" cellpadding="0"
	class="ttbb1">
	{if $step eq "1"}
	<tr>
		<td width="39%" align="right">用户名/邮箱：</td>
		<td width="61%"><input type="text" name="textfield" class="my_txt_200" /></td>
	</tr>
	<tr>
		<td align="right">验证码：</td>
		<td><input type="text" name="textfield2" class="my_txt_200" /></td>
	</tr>
	<tr>
		{elseif $step eq "2"}
		<tr>
			<td width="39%" align="right">请输入手机号码：</td>
			<td width="61%"><input type="text" name="textfield"
				class="my_txt_200" /></td>
		</tr>
		{else}
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
			{/if}
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


{literal}
<script type="text/javascript" src="js/q_foot.js"></script>

{/literal}

</body>
</html>
