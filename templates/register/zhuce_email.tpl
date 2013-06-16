{include file=regheader.tpl}

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
	{if $usertype eq "0"}
	<li class="sel">普通会员</li>
	<li><a href="register.php?module=init_shangjia">商家入驻</a></li>
	{else}
	<li><a href="register.php?module=init">普通会员</a></li>
	<li class="sel">商家入驻</li>
	{/if}
</ul>
</div>
</div>


<div class="regist">
<div class="blank20"></div>
<div class="my_step">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td><span><img src="./templates/images/schoolbar/my_step_11.gif" />填写会员信息</span></td>
		<td><span class="my_step_sel"><img
			src="./templates/images/schoolbar/my_step_2.gif" />通过邮箱确认</span></td>
		<td><span><img src="./templates/images/schoolbar/my_step_33.gif" />注册成功</span></td>
	</tr>
</table>
</div>


<div class="blank20"></div>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td width="17%" height="76" align="center"><img
			src="./templates/images/schoolbar/zc_pic1.gif" width="67" height="51" /></td>
		<td width="83%" valign="top">

		<p class="zhuce_em">您的信息已经成功提交，激活链接已发送到您的邮箱<span class="cl_f30">
		{$email}</span></p>
		<p class="size12">登录注册邮箱，按照邮件内容提示，激活您的帐户即可完成注册。</p>
		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td class="bottom20 bor_bot1"><input name="" type="button"
			value="马上去邮箱激活" class="my_ann1"
			onClick="window.location.href='zhuce_email_ok.html' " /></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td class="top10 size14"><strong>没有收到激活邮件？</strong><br />
		1.确认邮件是否被您提供的邮箱系统自动拦截，或被误认为垃圾邮件放到垃圾箱了。 <br />
		2.如果您确认邮箱地址正确，可以请求<span class="a0693e3_line" ><a href="register.php?module=resend_email" onclick="resend_email()" id="resend">再次发送激活码</a></span><br />
		3.更换相对稳定的邮箱地址<span class="a0693e3_line"><a href="register.php?module=modify_email">更换</a></span></td>
	</tr>
</table>
<div class="blank20"></div>


</div>
</div>
</div>



<DIV style="DISPLAY: none">
<DIV class=simScrollCont id=simTestContent>
<DIV class="mainlist">
<UL>
	<LI>四川外国语学院</LI>
	<LI>四川外国语学院</LI>
	<LI>四川外国语学院</LI>
	<LI>四川外国语学院</LI>
	<LI>四川外国语学院</LI>
	<LI>四川外国语学院</LI>
</UL>
</DIV>

</DIV>
</DIV>

{literal} 
<SCRIPT src="js/jquery.js" type=text/javascript></SCRIPT> <SCRIPT
	src="js/tipswindown.js" type=text/javascript></SCRIPT> <SCRIPT
	type=text/javascript>
/*
*弹出本页指定ID的内容于窗口
*id 指定的元素的id
*title:	window弹出窗的标题
*width:	窗口的宽,height:窗口的高
*/
function showTipsWindown(title,id,width,height){
	tipsWindown(title,"id:"+id,width,height,"true","","true",id);
}

function confirmTerm(s) {
	parent.closeWindown();
	if(s == 1) {
		parent.document.getElementById("isread").checked = true;
	}
}


//弹出层调用
function popTips(){
	showTipsWindown("jquery弹出层", 'simTestContent', 600, 255);
	$("#isread").attr("checked", false);
}

$(document).ready(function(){
	
	$("#isread").click(popTips);
	$("#isread-text").click(popTips);
	
});
</SCRIPT>





<div class="blank10"></div>

</div>



<script type="text/javascript" src="./templates/scripts/schoolbar/q_foot.js"></script>
<script type="text/javascript" src="./templates/scripts/register_check.js"></script>

{/literal}

</body>
</html>
