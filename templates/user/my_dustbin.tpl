{include file=userheader.tpl}

<input type="hidden" value="2" id="EmailType"/>
<div class="my_right clearfix">
   <div class="my_data clearfix">
   <table width="100%" border="0" cellspacing="0" cellpadding="0">
   <tr valign="top" class="pic">
  <td>&nbsp;</td>
  </tr>
  <tr>
  <tr>
    <td width="10%"><h3>垃圾箱</h3></td>
    <td width="90%">&nbsp;</td>
   </tr>
   </table>
   </div>
   
   <div class="my_collect_nr">
   <table width="100%" border="0" cellspacing="0" cellpadding="0" class="ttbb6">
   <tr valign="top" class="pic">
  <td>&nbsp;</td>
  </tr>
  <tr>
   <tr>
    <td colspan="6" bgcolor="#eef7ff">
	  
	  <input name="" type="button"  value="删除"  onclick="javascript:AjaxDelMultiBox(1)"/>	  &nbsp;&nbsp;
	  <input name="" type="button"  value="转发" />&nbsp;&nbsp;	  </td>
    </tr>
    <tr valign="top" class="pic">
  <td>&nbsp;</td>
  </tr>
  <tr>
  <tr>
    <th width="4%" align="center" bgcolor="#f7f7f7">&nbsp;</th>
    <th width="12%" align="center" bgcolor="#f7f7f7">收件人</th>
    <th width="27%" align="center" bgcolor="#f7f7f7">内容</th>
    <th width="13%" align="center" bgcolor="#f7f7f7">时间</th>
    <th width="12%" align="center" bgcolor="#f7f7f7">编辑</th>
  </tr>
  <tr valign="top" class="pic">
  <td>&nbsp;</td>
  </tr>
  </table>
  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="ttbb6" id="GetBox">
  {if $info.info|@count neq 0}
  {foreach from=$info.info item=item key=key}
  <tr>
    <td width="4%" align="center"><input type="checkbox" name="DelBox" value="{$item.ID}" /></td>
    <td width="12%" align="center">{$item.name}</td>
    <td width="27%" align="center">{$item.content}</td>
    <td width="13%" align="center">{$item.createtime}</td>
    <td width="12%" align="center"><input name="Input" type="button"  value="删除"  onclick="javascript:AjaxDelBox(3,'{$item.ID}')"/></td>
  </tr>
  <tr valign="top" class="pic">
  <td>&nbsp;</td>
  </tr>
  {/foreach}
  {else}
  <tr><td colspan="5" align="center"><p>发信箱为空</p><td></tr>
  {/if}
</table>
   </div>
   <div class="album_page" id="pageFooter">
   {if $info.info|@count neq 0}
		{if $info.base.pageCounts eq '1'}
		<a class="pageFooterStyle">1</a>
		{else}
		    {if $info.base.page eq '1'}
		    <a href="javascript:void(0)" class="pageFooterStyle">上一页</a>
		    {else}
		    <a  href="javascript:void(0)" onclick="javascript:AjaxGetBox(3,'{$info.base.page-1}')">上一页</a>
		    {/if}
		    {section name=loop loop=$info.base.pageCounts}
		    	{if $info.base.page eq $smarty.section.loop.index+1}
		    	&nbsp;<a href="javascript:void(0)" class="pageFooterStyle">{$smarty.section.loop.index+1}</a>
		    	{else}
		    	&nbsp;<a href="javascript:void(0)" onclick="javascript:AjaxGetBox(3,'$smarty.section.loop.index+1}')">{$smarty.section.loop.index+1}</a>
		    	{/if}
		    {/section}
			{if $info.base.page eq $reply.base.pageCounts}
			&nbsp;<a class="pageFooterStyle">下一页</a>
			{else}
			&nbsp;<a  href="javascript:void(0)" onclick="javascript:AjaxGetBox(3,'{$info.base.page+1}')">下一页</a>
			{/if}
		{/if}
	{/if}
   
   </div>
   
   </div>
   </div>
   </div>
   
 
   <div class="blank10"></div>
   </div>



{include file=barfooter.tpl}