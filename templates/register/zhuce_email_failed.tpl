{include file=regheader.tpl}

<div class="regist">
<div class="blank20"></div>
<div class="my_step">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td><span><img src="./templates/images/schoolbar/doc1.gif" />亲,邮件发送失败..</span></td>
	</tr>
</table>
</div>


<div class="blank20"></div>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td width="17%" align="center"><img
			src="./templates/images/schoolbar/search_3.gif" /></td>
		<td width="83%" valign="top">

		<p class="zhuce_em">注册尚未成功<span /></p>
		<p class="zhuce_em">请返回<span class="a0693e3"><a
			href="register.php?module={$module}">上一步</a></span>检查邮箱地址是否正确</p>
		<p class="zhuce_em">或者>><span class="a0693e3"><a
			href="register.php?module={$module}">重新注册</a></span></p>
		<p class="size12">系统将在20秒后，自动跳到注册页面：<span class="a0693e3"><a
			href="index.php">http://www/515xiao.com</a></span></p>
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
