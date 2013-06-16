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
		<td><span><img src="./templates/images/schoolbar/my_step_11.gif" />填写会员信息</span></td>
		<td><span><img src="./templates/images/schoolbar/my_step_22.gif" />通过邮箱确认</span></td>
		<td><span class="my_step_sel"><img
			src="./templates/images/schoolbar/my_step_3.gif" />注册成功</span></td>
	</tr>
</table>
</div>


<div class="blank20"></div>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td width="17%" align="center"><img
			src="./templates/images/schoolbar/my_zhuce_ok.gif" /></td>
		<td width="83%" valign="top">

		<p class="zhuce_em">恭喜您成功完成了激活，请尽情享受吾校带给您的服务吧。</span></p>
		<p class="size12">系统将在5秒后，自动跳到吾校首页：<span class="a0693e3"><a href="javascript:void(0)" onclick="window.location='loginstep.php'">http://www/515xiao.com</a></span></p>
		</td>
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

{literal} <SCRIPT src="js/jquery.js" type=text/javascript></SCRIPT> <SCRIPT
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



<script type="text/javascript" src="js/q_foot.js"></script>

{/literal}

</body>
</html>
