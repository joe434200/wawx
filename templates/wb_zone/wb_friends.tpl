{include file=wbheader.tpl}


<!--右侧-->
    <td valign="top" class="wb_ny_RR clearfix">
    
<div class="wb_bt blue_s">TA的好友</div>
<div class="space_show_friend clearfix" style="height:605px;">
    <ul id="BackReply">   
    {if $frinfo.info|@count neq 0}
    {foreach from=$frinfo.info item=item key=key}
    <li>
	<p><a href="javascript:void(0)"><img src="{$item.photo}" /></a></p>
	<p><a href="javascript:void(0)">{$item.name}</a></p>
	</li>
    {/foreach}
    {else}
    {/if}
	
	</ul>
  </div>

<!--页码 -->
<div class="blank"></div>
<div class="wb_num">
<div class="all">共{$frinfo.base.counts}个，第<a id="currpage">{$frinfo.base.page}</a>页</div>

<div class="au">
<div class="album_page" id="pageFooter">
{if $frinfo.base.pageCounts eq '1'}
<a class="pageFooterStyle">1</a>
{else}
    {if $frinfo.base.page eq '1'}
    <a href="javascript:void(0)" class="pageFooterStyle">上一页</a>
    {else}
    <a  href="javascript:void(0)" onclick="javascript:AjaxGetFriends('{$frinfo.base.page-1}')">上一页</a>
    {/if}
    
    {section name=loop loop=$frinfo.base.pageCounts}
    	{if $reply.base.page eq $smarty.section.loop.index+1}
    	&nbsp;<a href="javascript:void(0)" class="pageFooterStyle">{$smarty.section.loop.index+1}</a>
    	{else}
    	&nbsp;<a href="javascript:void(0)" onclick="javascript:AjaxGetFriends('{$smarty.section.loop.index+1}')">{$smarty.section.loop.index+1}</a>
    	{/if}
    {/section}
	{if $frinfo.base.page eq $frinfo.base.pageCounts}
	&nbsp;<a class="pageFooterStyle">下一页</a>
	{else}
	&nbsp;<a  href="javascript:void(0)" onclick="javascript:AjaxGetFriends('{$frinfo.base.page+1}')">下一页</a>
	{/if}
{/if}
</div>
</div>
</div>
<!--页码 end-->

</td>
    
    
    
  </tr>
</table>
</div>

<div class="blank10"></div>

{include file=barfooter.tpl}