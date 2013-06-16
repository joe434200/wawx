{include file=wbheader.tpl}

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

<input type="hidden" id="diaid" value="{$uid}">
<!--右侧-->
    <td valign="top" class="wb_ny_RR clearfix">

<div class="wb_bt blue_s">TA的留言板</div>
<div class="wb_tz a_blue clearfix" style="height:625px;height:auto;">



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

</div>

<!--页码 -->
<div class="blank"></div>
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
<!--页码 end-->

</td>
    
    
    
  </tr>
</table>
</div>

<div class="blank10"></div>

{include file=barfooter.tpl}