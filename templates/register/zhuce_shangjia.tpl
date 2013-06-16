{include file=regheader.tpl}
<div class="blank20"></div>
<div class="box4">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td width="14%"><img src="./templates/images/schoolbar/logo.png" /></td>
		<td width="86%" valign="bottom">
		<h2>商家注册</h2>
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
	<li><a href="register.php?module=init">普通会员</a></li>
	<li class="sel">商家入驻</li>
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

<div class="my_step">请填写商家信息</div>


<div class="blank20"></div>
<form action="register.php?module=send_email" method="post"
	enctype="multipart/form-data" name="register_form" id="register_form">
	<input type="hidden" name="user[type]" value="1">
<table width="100%" border="0" cellspacing="0" cellpadding="0"
	class="ttbb4">
	<tr>
		<td width="19%" align="right"><span class="cl_f30">*</span>E-mail：</td>
		<td width="81%"><input type="text" name="user[email]" id="email"
			class="my_txt_350" onblur="check_vali_email(this)" onfocus="javascript:setEnterEorrer(this,false,'','');"/><span id="tips_email_ck"></span><br/><p id="tips_email"></p></td>
	</tr>
	<tr>
		<td align="right"><span class="cl_f30">*</span> 密码：</td>
		<td><input type="password" name="user[password]" id="password"
			class="my_txt_350" onblur="check_vali_pwd(this)" value="{$temp.password}" onfocus="javascript:setPwdEnterError(this,false,'','');"/><span id="tips_pwd_ck"></span><br/><p id="tips_pwd"></p></td>
	</tr>
	<tr>
		<td align="right"><span class="cl_f30">*</span> 重复密码：</td>
		<td><input type="password" name="user[repassword]" id="repwd"
			class="my_txt_350" onblur="check_vali_repwd(this)" value="{$temp.password}" onfocus="javascript:setPwdEnterError(this,false,'','');"/><span id="tips_repwd_ck"></span><br/><p id="tips_repwd"/></td>
	</tr>
</table>


<table width="100%" border="0" cellspacing="0" cellpadding="0"
	class="ttbb4">

	<tr>
		<td width="19%" align="right"><span class="cl_f30">*</span> 店名：</td>
		<td width="81%"><input type="text" name="user[shopName]" 
			id="shopname" class="my_txt_350" onblur="check_other(this,'tips_shopname','店名')" value="{$temp.shopname}" onfocus="javascript:setEnterEorrer(this,false,'','');"/><span id="tips_shopname_ck"></span><br/><p id="tips_shopname"/></td>
	</tr>
	<tr>
		<td align="right"><span class="cl_f30">*</span> 经营范围：</td>
		<td><input type="text" name="user[shopScope]" id="shoptype" value="{$temp.scope}"
			class="my_txt_350" onblur="check_other(this,'tips_shoptype','经营范围')" onfocus="javascript:setEnterEorrer(this,false,'','');"/><span id="tips_shoptype_ck"></span><br/><p id="tips_shoptype"/></td>
	</tr>
	<tr>
		<td align="right"><span class="cl_f30">*</span> 负责人：</td>
		<td><input type="text" name="user[shopCharger]" id="shopcharger" value="{$temp.chargeperson}"
			class="my_txt_120" onblur="check_vali_user(this)" onfocus="javascript:setEnterEorrer(this,false,'','');"/><span id="tips_username_ck"></span> <label> <input type="radio" name="user[sex]"
			value="1" {if $temp.sex eq 1 or $temp.sex eq ""}checked{/if}/> 男 <input type="radio" name="user[sex]" value="0" {if $temp.sex eq 0}checked{/if}/> 女</label><br/><p id="tips_username"/></td>
	</tr>
	<tr>
		<td align="right"><span class="cl_f30">*</span> 联系电话：</td>
		<td><input type="text" name="user[shopContact]" id="shopnumber"
			class="my_txt_120" onblur="check_vali_number(this)" value="{$temp.contactphone}" onfocus="javascript:setEnterEorrer(this,false,'','');"/><span id="tips_shopnumber_ck"></span><br/><p id="tips_shopnumber"/></td>
	</tr>
	<tr>
		<td align="right"><span class="cl_f30">*</span> 门店地址：</td>
		<td><input type="text" name="user[shopAddress]" id="shopaddress" value="{$temp.storeaddr}"
			class="my_txt_350" onblur="check_other(this,'tips_shopaddress','门店')" onfocus="javascript:setEnterEorrer(this,false,'','');"/><span id="tips_shopaddress_ck"></span><br/><p id="tips_shopaddress"/></td>
	</tr>
	<tr>
		<td align="right"><span class="cl_f30">*</span> 营业执照：</td>
		<td><input type="file" name="shopLicence" class="my_txt_350" value="" id="shopLicence"  onchange="check_vali_file()"/><span id="tips_shoplicence_ck"></span><br/><p id="tips_shoplicence"/></td>
	</tr>
	<tr>
		<td align="right"><span class="cl_f30">*</span> 备注：</td>
		<td><textarea name="user[remark]" rows="8" id="remark"  class="my_txt_350" onblur="check_other(this,'tips_remark','备注')" onfocus="javascript:setEnterEorrer(this,false,'','');">{$temp.remark}</textarea><span id="tips_remark_ck"></span><br/><p id="tips_remark"/></td>
	</tr>
	<tr>
		<td align="right"><span class="cl_f30">*</span> 校验码：</td>
		<td><input type="text" name="user[checkCode]" id="code"
			class="my_txt_120" onblur="check_vali_code()" onfocus="javascript:setEnterEorrer(this,false,'','');"/>
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
	</tr>
	<tr>
		<td align="right">&nbsp;</td>
		<td height="50"><input type="button" name="button" id="button"
			value="注册账号" class="my_ann1" Onclick="check_submit('1')"/><br/><p id="tips_submit"/></td>
	</tr> 
</table>
</form>
<div class="blank20"></div>
</div>
</div>
</div>


<div class="blank10"></div>

</div>



<script type="text/javascript" src="js/q_foot.js"></script>



</body>
</html>
