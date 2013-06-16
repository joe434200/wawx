{include file=userheader.tpl}
{literal}
<style>
div.panel
{
margin:0px;
padding:5px;
text-align:center;
background:#e5eecc;
border:solid 1px #c3c3c3;
}
div.panel
{
}

</style>
{/literal}

<input type="hidden" id="ColType" value="3">
<div class="my_right clearfix">
   <div class="my_data clearfix">
   <ul class="my_data_tag">
   <li><a href="userCenter.php?module=collect">商品收藏</a></li>
   <li><a href="userCenter.php?module=collectTZ">帖子收藏</a></li>
   <li class="sel"><a href="userCenter.php?module=collectRZ">日志收藏</a></li>
   </ul>
   </div>
   
   <div class="panel" style="display:none;" id="DiaryShow"></div>
   <div class="my_collect_nr" id="HidShow">
   <table width="100%" border="0" cellspacing="0" cellpadding="0" class="ttbb6">

  <tr valign="top" class="pic">
  <td>&nbsp;</td>
  </tr>
  <tr>
    <th width="7%" align="center" bgcolor="#f7f7f7"><input type="checkbox" id="onGoodSel" value="checkbox" onclick="javascript:onGoodSel(this)"/><a href="javascript:void(0)" onclick="javascript:onGoodDel()">删除</a></th>
    <th width="15%" align="center" bgcolor="#f7f7f7">作者</th>
    <th width="56%" align="center" bgcolor="#f7f7f7">标题</th>
    <th width="16%" align="center" bgcolor="#f7f7f7">收藏时间</th>
    <th width="9%" align="center" bgcolor="#f7f7f7">编辑</th>
  </tr>
  
  <tr valign="top" class="pic">
  <td>&nbsp;</td>
  </tr>
  </table>
  
  
  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="ttbb6" id="BackReply">
  {foreach from=$data.info item=item key=key}
  <tr>
    <td width="6%" align="center"><input type="checkbox" name="GoodSel" value="{$item.ID}" /></td>
    <td width="15%" align="center"><a href="javascript:void(0)" onclick="window.location='zone.php?uid={$item.uid}'">{$item.name}</a></td>
    <td width="56%" align="center"><a href="javascript:void(0)" onclick="javascript:userRZShow('{$item.sid}')">{$item.title}</td>
    <td width="16%" align="center">{$item.collecttime}</td>
    <td width="9%" align="center"><a href="javascript:void(0)" onclick="javascript:onGoodDelSingle('{$item.ID}')"><img src="./templates/images/schoolbar/zc_bj6.gif" /></a></td>
  </tr>
  
  <tr valign="top" class="pic">
  <td>&nbsp;</td>
  </tr>
 {/foreach}
</table>
   </div>
   
   <div class="album_page" id="pageFooter">
   {if $data.info|@count neq 0}
		{if $data.base.pageCounts eq '1'}
		<a class="pageFooterStyle">1</a>
		{else}
		    {if $data.base.page eq '1'}
		    <a href="javascript:void(0)" class="pageFooterStyle">上一页</a>
		    {else}
		    <a  href="javascript:void(0)" onclick="javascript:userRZCollect('{$data.base.page-1}')">上一页</a>
		    {/if}
		    {section name=loop loop=$data.base.pageCounts}
		    	{if $data.base.page eq $smarty.section.loop.index+1}
		    	&nbsp;<a href="javascript:void(0)" class="pageFooterStyle">{$smarty.section.loop.index+1}</a>
		    	{else}
		    	&nbsp;<a href="javascript:void(0)" onclick="javascript:userRZCollect('$smarty.section.loop.index+1}')">{$smarty.section.loop.index+1}</a>
		    	{/if}
		    {/section}
			{if $data.base.page eq $reply.base.pageCounts}
			&nbsp;<a class="pageFooterStyle">下一页</a>
			{else}
			&nbsp;<a  href="javascript:void(0)" onclick="javascript:userRZCollect('{$data.base.page+1}')">下一页</a>
			{/if}
		{/if}
	{/if}
   
   </div>
   
   </div>
   
   </div>
   </div>
   </div>
   
 
   <div class="blank10"></div>
   </div>

{include file=barfooter.tpl}