{include file=spaceheader.tpl}

{literal}
<style>
     #box img {
     /*设置图片垂直居中*/
     vertical-align:middle;
	 width:650px;
	 height:480px;
     }
     #box  { 
     background:#F7FBFC;
　　 text-align: left; 
　　 font-size: 35pt; 
　　 font-family: "隶书", "宋体"; 
　　 letter-spacing: 3px; 
　　 color:navy; 
　　 line-height:30pt; 
　　 text-indent: .5in;
　　 border: solid 2pt; 
　　 }


.show
{
	height:auto !important;
	height:480px;
	min-height:480px;
}　　 
</style>
<link rel="stylesheet" href="./plugin/editor/themes/default/default.css" />
<script charset="utf-8" src="./plugin/editor/kindeditor-min.js"></script>
<script charset="utf-8" src="./plugin/editor/lang/zh_CN.js"></script>
<script>
var editor;
KindEditor.ready(function(K) {
	editor = K.create('textarea[name="emoticons"]', {
		allowFileManager : true,
		syncType : "form",
		items : ['emoticons'],
		width : "100%",
		height : "100px",
		syncType : "form",
		resizeType : 0 
	});
});
</script>
{/literal}
<div class="blank10"></div>
<div class="block  blue_s">

<div class="AreaL750">
<!--日志模版-->
<div class="box_lt clearfix" style="height:auto;">
  <div class="title_bt blue_s"><span><a href="javascript:void(0)" onclick="window.location='self_zone.php?module=daily'">返回日志列表</a></span>日志</div>
  
<div class="space_daily_show clearfix">
<h3><a href="#">{$diary.title}</a></h3>

<div class="blank20"></div>
<div class="space_daily_gn clearfix">
<span class="n2"><a href="javascript:void(0)" onclick="javascript:pageScroll()">评论</a></span>
<span class="n3"><a href="javascript:void(0)" onclick="javascript:window.location='self_diary.php?module=edit&diaid={$diary.ID}'">编辑</a></span>
<span class="n4"><a href="javascript:void(0)" onclick="javascript:show_confirm()">删除</a></span>
</div>


<div id="box" class="show clearfix" style="width:650px;height:auto;">
<div style="height:auto;">
{$diary.content}
</div>
</div>


<div class="space_daily_gn clearfix">
<span class="n2"><a href="javascript:void(0)" onclick="javascript:pageScroll()">评论</a></span>
<span class="n3"><a href="javascript:void(0)" onclick="javascript:window.location='self_diary.php?module=edit&diaid={$diary.ID}'">编辑</a></span>
<span class="n4"><a href="javascript:void(0)" onclick="javascript:show_confirm()">删除</a></span>
</div>
<div class="blank10"></div>


<!--下部评论开始-->
<h3 class="space_daily_bt"><span><a href="#">批量管理</a></span>评论</h3>

<div class="space_daily_pl clearfix" id="position">
<form action="" method="get">
<input type="hidden" id="diaid" value="{$diary.ID}"/>
<input type="hidden" id="type" value="1"/>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	
  <tr>
  <td width="15%" valign="top">
    <p class="av"><img src="./templates/images/schoolbar/4.jpg" /></p>
	</td>
    <td>
    <div class="txt"><textarea name="emoticons" cols="" rows="" id="Reply"></textarea></div>
    <div>&nbsp;</div>
    
	</td>
  </tr>
  <tr>
  <td>&nbsp;</td>
  <td><div class="ann" align="right"><input type="button" value="评论"  class="anniu25" onclick="javascript:CreateNewReply()"/></div></td>
  </tr>
</table>
</form>
</div>






<!-- 评论列表 -->
<div class="space_daily_gn clearfix"></div>
<div class="space_board">
<div class="ly">
<ul id="BackReply">
{foreach from=$reply.reply item=item key=key}
<li>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top" class="pic"><p><img src="./templates/images/schoolbar/avatar2.jpg" /></p></td>
    <td valign="top" class="nr">
    <p class="name"><a href="#">{$item.name}</a> <span>{$item.createtime}</span></p>
    <p class="pl">{$item.content}</p>
    </td>
	<td valign="bottom" class="edit a999"><a href="javascript:void(0)" onclick="javascript:addSecReply('{$item.name}','{$item.id}');">回复</a>&nbsp;&nbsp;<a href="javascript:void(0)" onclick="javascript:getDelReply('{$item.id}')">删除</a></td>
  </tr>
  {if $item.sec neq ""}
  {foreach from=$item.sec item=sec key=key}
  <tr>
    <td valign="top" class="pic">&nbsp;</td>
    <td valign="top" class="nr reply" colspan="2">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
         <tr>
         <td valign="top" class="pic"><p><img src="./templates/images/schoolbar/avatar2.jpg" /></p></td>
         <td valign="top" class="nr">
         <p class="name"><a href="#">{$sec.name}</a> <span>{$sec.createtime}</span></p>
         <p class="pl">{$sec.content}</p>
         </td>
         </tr>
		 <tr>
		 <td valign="top" class="pic">&nbsp;</td>
		 <td class="a999"><a href="javascript:void(0)" onclick="javascript:addSecReply('{$sec.name}','{$item.id}');">回复</a>&nbsp;&nbsp;<a href="javascript:void(0)" onclick="javascript:getDelReply('{$sec.id}')">删除</a></td>
		 </tr>
	     </table>
    </td>
  </tr>
  {/foreach}
  {/if}
</table>
</li>
{/foreach}
</ul>
</div>
</div>

<div class="album_page" id="pageFooter">
{if $reply.base.pageCounts eq '1'}
<a href="javascript:void(0)" class="pageFooterStyle">1</a>
{else}
    {if $reply.base.page eq '1'}
    <a href="javascript:void(0)" class="pageFooterStyle">上一页</a>
    {else}
    <a  href="javascript:void(0)" onclick="javascript:splitPage(1,'{$reply.base.page-1}')">上一页</a>
    {/if}
    
    {section name=loop loop=$reply.base.pageCounts}
    	{if $reply.base.page eq $smarty.section.loop.index+1}
    	&nbsp;<a href="javascript:void(0)" class="pageFooterStyle">{$smarty.section.loop.index+1}</a>
    	{else}
    	&nbsp;<a href="javascript:void(0)" onclick="javascript:splitPage(1,'{$smarty.section.loop.index+1}')">{$smarty.section.loop.index+1}</a>
    	{/if}
    {/section}
    
	{if $reply.base.page eq $reply.base.pageCounts}
	&nbsp;<a href="javascript:void(0)" class="pageFooterStyle">下一页</a>
	{else}
	&nbsp;<a  href="javascript:void(0)" onclick="javascript:splitPage(1,'{$reply.base.page+1}')">下一页</a>
	{/if}
{/if}

<!--/下部评论-->
</div>



</div>
<!--日志模版 结束-->
</div>

<!--日志分类-->
<div class="AreaRR">
<div class="box_lt clearfix">
  <div class="title_bt"><span><a href="self_rizhi_guanli.html">管理</a></span><a href="#">分类</a></div>
  <div class="space_daily_kri">
  <ul>
  {foreach from=$catalog item=item key=key}
  <li><span>({$item.sum})</span><a href="#">{$item.name}</a></li>
  {/foreach}
  </ul>
  </div>
  

</div>
</div>
<!--/日志分类-->
<input type="hidden" id="currpage">



</div>

<div class="blank10"></div>
{include file=barfooter.tpl}