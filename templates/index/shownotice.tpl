{include file=header.tpl}
<!------------------------------------------body-->
<DIV class="blank"></DIV>
<DIV class="block clearfix"><!--当前位置-->
<div class="location ared">当前位置：<a href="index.php">首页</a> > 公告栏
</div>
<div class="blank"></div>
<div class="AreaR">
	<h2 align="center">{$anotice.title}</h2>
	<br></br>
 	<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{$anotice.detail}</p>
 	<br></br>
 	<p align="right">{$anotice.createtime}</p>
 </div>
 </div>
<!------------------------------------------body over-->
{include file=footer.tpl}