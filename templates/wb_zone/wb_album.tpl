{include file=wbheader.tpl}

<input type="hidden" id="uid" value="{$uid}">
<input type="hidden" id="albumUrl" value="javascipt:window.location='wb_index.php?module=albumShow&alb=">
<!--右侧-->
<td valign="top" class="wb_ny_RR clearfix">


<div class="wb_bt blue_s">相册</div>

<div class="wb_pics clearfix a_blue" style="height:650px;">
<ul id="BackReply">


{foreach from=$album item=item key=key}
{if $key < $page.base.pageNum}
<li>
<div class="pic">
<a href="javascript:void(0)" onclick="javascipt:window.location='wb_index.php?module=albumShow&alb={$item.ID}'"><img src="./templates/images/schoolbar/wb_pic1.gif" /></a>
</div>
<p class="jj"><a href="javascript:void(0)" onclick="javascipt:window.location='wb_index.php?module=albumShow&alb={$item.ID}'">{$item.albumname}</a></p>
</li>
{/if}
{/foreach}

</ul>
</div>




<!--页码 -->
<div class="blank"></div>
<div class="wb_num">

<div class="all">共{$page.base.counts}个，第<a id="currpage">{$page.base.page}</a>页</div>
<div class="au">

<div class="album_page" id="pageFooter">
{if $page.base.pageCounts eq '1'}
<a href="javascript:void(0)" class="pageFooterStyle">1</a>
{else}
	{if $page.base.page eq 1}
	<a href="javascript:void(0)" class="pageFooterStyle">上一页</a>
	{else}
	<a href="javascript:void(0)" onclick="javascript:getAlbumSplitPage('{$page.base.page-1}')">上一页</a>
	{/if}
	
	{section name=loop loop=$page.base.pageCounts}
    	{if $page.base.page eq $smarty.section.loop.index+1}
    	&nbsp;<a href="javascript:void(0)" class="pageFooterStyle">{$smarty.section.loop.index+1}</a>
    	{else}
    	&nbsp;<a href="javascript:void(0)" onclick="javascript:getAlbumSplitPage('{$smarty.section.loop.index+1}')">{$smarty.section.loop.index+1}</a>
    	{/if}
    {/section}
	
	{if $page.base.page eq $page.base.pageCounts}
	<a href="javascript:void(0)" class="pageFooterStyle">下一页</a>
	{else}
	<a href="javascript:void(0)" onclick="javascript:getAlbumSplitPage('{$page.base.page+1}')">下一页</a>
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