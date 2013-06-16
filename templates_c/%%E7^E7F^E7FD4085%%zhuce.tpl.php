<?php /* Smarty version 2.6.18, created on 2013-06-08 21:41:43
         compiled from register/zhuce.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "regheader.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div class="blank20"></div>
<div class="box4">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td width="14%"><img src="./templates/images/schoolbar/logo.png" /></td>
		<td width="86%" valign="bottom">
		<h2>普通会员注册</h2>
		</td>
	</tr>
</table>
</div>
<div class="blank10"></div>

<div class="box4">
<div class="case_ll clearfix">

<div class="zhuce_xuanze_bj clearfix">
<div class="zhuce_xuanze clearfix aff6600">
<ul>
	<li class="sel">普通会员</li>
	<li><a href="register.php?module=init_shangjia">商家入驻</a></li>
</ul>
</div>
</div>


<div class="regist">
<div class="blank20"></div>
<div class="my_step">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td><span class="my_step_sel"><img
			src="./templates/images/schoolbar/my_step_1.gif" />填写会员信息</span></td>
		<td><span><img src="./templates/images/schoolbar/my_step_22.gif" />通过邮箱确认</span></td>
		<td><span><img src="./templates/images/schoolbar/my_step_33.gif" />注册成功</span></td>
	</tr>
</table>
</div>


<div class="blank20"></div>
<form action="register.php?module=send_email" method="post" name="register_form" id="register_form">
<input type="hidden" name="user[type]" value="0">
<table width="100%" border="0" cellspacing="0" cellpadding="0"
	class="ttbb2">
	<tr>
		<td width="16%" align="right"><span class="cl_f30">*</span> E-mail：</td>
		<td width="59%"><input type="text" name="user[email]" id="email"
			class="my_txt_350" onblur="check_vali_email(this)" onfocus="javascript:setEnterEorrer(this,false,'','');"/><span id="tips_email_ck"></span></td>
		<td width="25%">&nbsp;</td>
	</tr>
	<tr>
		<td align="right">&nbsp;</td>
		<td colspan="2" style="font-size: 12px; padding-bottom: 25px;"
			id="tips_email">（有效的E-mail地址才能收到激活码，帐户在激活后才能享受网站服务。）</td>
	</tr>
	<tr>
		<td align="right"><span class="cl_f30">*</span> 密码：</td>
		<td><input type="password" name="user[password]" id="pwd"
			class="my_txt_350" onblur="check_vali_pwd(this)" value="<?php echo $this->_tpl_vars['temp']['password']; ?>
" onfocus="javascript:setPwdEnterError(this,false,'','');"/><span id="tips_pwd_ck"></span></td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td align="right">&nbsp;</td>
		<td colspan="2" style="font-size: 12px; padding-bottom: 25px;" id="tips_pwd">（为了您帐户的安全，建议使用字符+数字等多种不同类型的组合，且长度大于5位。）
		</td>
	</tr>
	<tr>
		<td align="right"><span class="cl_f30">*</span> 重复密码：</td>
		<td><input type="password" name="user[repassword]" id="repwd"
			class="my_txt_350" onblur="javascript:check_vali_repwd(this)" value="<?php echo $this->_tpl_vars['temp']['password']; ?>
" onfocus="javascript:setPwdEnterError(this,false,'','');"/><span id="tips_repwd_ck"></span></td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td align="right">&nbsp;</td>
		<td colspan="2" style="font-size: 12px; padding-bottom: 25px;"  id="tips_repwd">（确保您记住密码。）
		</td>
	</tr>
	<tr>
		<td align="right"><span class="cl_f30">*</span> 校验码：</td>
		<td><input type="text" name="user[checkCode]" id="code" class="my_txt_120" onblur="check_vali_code()" onfocus="javascript:setEnterEorrer(this,false,'','');"/>
		<span><input type="text" readonly="readonly" id="checkCode" class="unchanged" style="width: 80px"  /></span><br />
		<span id="tips_code_ck"></span><br/><p id="tips_code"/>
		</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td align="right">&nbsp;</td>
		<td colspan="2" class="cl_f30"
			style="font-size: 12px; padding-bottom: 25px;">（如果您连续输入不对验证码，请检查您的浏览器是否禁用了Cookie。）
		</td>
	</tr>
	<tr>
		<td align="right"><span class="cl_f30">*</span> 注册条款：</td>
		<td><input type="checkbox" name="protocol_ck" id="checkbox" onclick="check_CKBOX()"/>我已认真阅读了《网络协议》
		</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td align="right">&nbsp;</td>
		<td height="50"><input type="button" name="button" id="button"
			value="注册账号" class="my_ann1" Onclick="check_submit('0')"/><br/><p id="tips_submit"/></td>
		<td>&nbsp;</td>
	</tr>
</table>
</form>
<div class="blank20"></div>
</div>
</div>
</div>


<div class="blank10"></div>

</div>



<script type="text/javascript" src="./templates/scripts/schoolbar/q_foot.js"></script>





</body>
</html>