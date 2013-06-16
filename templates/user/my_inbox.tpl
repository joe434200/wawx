{include file=userheader.tpl}


<div class="my_right clearfix">
   <div class="my_data clearfix">
   <table width="100%" border="0" cellspacing="0" cellpadding="0">
   <tr valign="top" class="pic">
  <td>&nbsp;</td>
  </tr>
  <tr>
  <tr>
    <td width="10%"><h3>收件箱</h3></td>
    <td width="90%">(共 {$info.base.counts} 封，其中 未读邮件 {$info.base.uncounts} 封)</td>
   </tr>
   </table>
   </div>
   
   <div class="my_collect_nr">
   <table width="100%" border="0" cellspacing="0" cellpadding="0" class="ttbb6">
  <tr>
   <tr valign="top" class="pic">
  <td>&nbsp;</td>
  </tr>
  <tr>
   <tr>
    <td colspan="6" bgcolor="#eef7ff">
	  <select name="select" id="EmailType" onchange="javascript:AjaxGetBox('2','1')">
	  	<option value="2">全部邮件</option>
	    <option value="0">未读邮件</option>
	    <option value="1">已读邮件</option>
	    </select>	  &nbsp;&nbsp;
	  <input name="" type="button"  value="删除" onclick="javascript:AjaxDelMultiBox(1)"/>	  &nbsp;&nbsp;
	  <input name="" type="button"  value="转发" />&nbsp;&nbsp;	  </td>
    </tr>
    <tr valign="top" class="pic">
  <td>&nbsp;</td>
  </tr>
  <tr>
  <tr>
    <th width="4%" align="center" bgcolor="#f7f7f7">&nbsp;</th>
    <th width="12%" align="center" bgcolor="#f7f7f7">发件人</th>
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
    <td width="27%" align="center">{$item.content}{if $item.readflg eq 0}<img src="./templates/images/schoolbar/wb3.gif" alt="未读邮件" title="未读邮件"/>{/if}</td>
    <td width="13%" align="center">{$item.createtime}</td>
    <td width="12%" align="center">{if $item.type eq 5}<input type="button" value="加为好友" onclick="userAddFriend('{$item.senderid}','{$item.ID}')">{/if}<input name="Input" type="button"  value="删除"  onclick="javascript:AjaxDelBox(2,'{$item.ID}')"/></td>
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
		    <a href="javascript:void(0)" class="pageFooterStyle"><strong>上一页</strong></a>
		    {else}
		    <a  href="javascript:void(0)" onclick="javascript:AjaxGetBox(2,'{$info.base.page-1}')">上一页</a>
		    {/if}
		    {section name=loop loop=$info.base.pageCounts}
		    	{if $info.base.page eq $smarty.section.loop.index+1}
		    	&nbsp;<a href="javascript:void(0)" class="pageFooterStyle"><strong>{$smarty.section.loop.index+1}</strong></a>
		    	{else}
		    	&nbsp;<a href="javascript:void(0)" onclick="javascript:AjaxGetBox(2,'{$smarty.section.loop.index+1}')">{$smarty.section.loop.index+1}</a>
		    	{/if}
		    {/section}
			{if $info.base.page eq $reply.base.pageCounts}
			&nbsp;<a class="pageFooterStyle"><strong>下一页</strong></a>
			{else}
			&nbsp;<a  href="javascript:void(0)" onclick="javascript:AjaxGetBox(2,'{$info.base.page+1}')">下一页</a>
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