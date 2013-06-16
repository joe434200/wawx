{include file=spaceheader.tpl}
{literal}
<style>
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
		height : "155px",
		syncType : "form",
		resizeType : 0 
	});
});
</script>
{/literal}


<div class="blank"></div>
<div class="block  blue_s">
<div class="blank10"></div>
<div class="AreaL750" style="height:auto;float:left;">
   <!--留言板模版 -->
   <div class="box_lt clearfix" style="height:auto;">
  <div class="title_bt blue_s">留言板</div>
  
  
<div class="space_board clearfix">

<div class="lyk" style="height:auto;">
<form action="" method="get">
<input type="hidden" id="diaid" value="{$uid}">
<input type="hidden" id="type" value="3">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td>
<div class="txt" style="height:auto;"><textarea name="emoticons" cols="" rows="" id="Reply"></textarea></div>
</td>
</tr>
<tr>
<td align="right">
<div class="ann"><input type="button" value="留言"  class="anniu25" onclick="javascript:addReply()"/></div>
</td>
</tr>
</table>
</form>
</div>

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
<a class="pageFooterStyle">1</a>
{else}
    {if $reply.base.page eq '1'}
    <a href="javascript:void(0)" class="pageFooterStyle">上一页</a>
    {else}
    <a  href="javascript:void(0)" onclick="javascript:splitPage(3,'{$reply.base.page-1}')">上一页</a>
    {/if}
    
    {section name=loop loop=$reply.base.pageCounts}
    	{if $reply.base.page eq $smarty.section.loop.index+1}
    	&nbsp;<a href="javascript:void(0)" class="pageFooterStyle">{$smarty.section.loop.index+1}</a>
    	{else}
    	&nbsp;<a href="javascript:void(0)" onclick="javascript:splitPage(3,'{$smarty.section.loop.index+1}')">{$smarty.section.loop.index+1}</a>
    	{/if}
    {/section}
	{if $reply.base.page eq $reply.base.pageCounts}
	&nbsp;<a class="pageFooterStyle">下一页</a>
	{else}
	&nbsp;<a  href="javascript:void(0)" onclick="javascript:splitPage(3,'{$reply.base.page+1}')">下一页</a>
	{/if}
{/if}
</div>
</div><!--留言板模版结束-->
</div>




<!--头像-->
<div class="AreaRR">
<div class="box_lt clearfix">
  <div class="title_bt"><a href="javascript:void(0)" onclick="window.location='userCenter.php?module=avatar'">头像</a></div>
  <div class="space_avatar ">
  <p class="pic"><img src="{$self.photo}" style="height:150px;width:150px;"/></p>
  <p class="name"><a href="#">{if $self.nickname eq ""}{$self.email}{else}{$self.nickname}{/if}</a></p>
  </div>
  
<div class="space_info  clearfix ">
<ul>
<li class="a1">日志: <a href="#">{$info.disum}</a></li>
<li class="a2">照片: <a href="#">{$info.phsum}</a></li>
<li class="a3">好友: <a href="#">{$info.frsum}</a></li>
</ul>
</div>
</div>
</div>
<!--/头像-->
<input type="hidden" id="currpage">


</div>
<div class="blank10"></div>




{include file=barfooter.tpl}