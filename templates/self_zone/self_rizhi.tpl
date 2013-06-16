{include file=spaceheader.tpl}


<div class="blank10"></div>
<div class="block  blue_s">

<div class="AreaL750">
<!--日志模版-->
<div class="box_lt clearfix">
  <div class="title_bt blue_s">日志</div>
 <input type="hidden" id="uid" value="{$uid}">
 <input type="hidden" id="diaid" value="">
<div class="space_daily clearfix">

<div class="space_daily_new clearfix">
<span class="anniu26"><a href="javascript:void(0)" onclick="window.location='self_diary.php?module=new'">写日志</a></span>
</div>
<ul id="BackReply">
{if $reply.info|@count neq 0}
{foreach from=$reply.info item=item key=key}
<li>
<h3 class=" blue_s"><a href="javascript:void(0)" onclick="javascript:window.location='self_diary.php?module=show&diaid={$item.id}'">{$item.title}</a></h3>
<p class="sj">{$item.time}</p>
<p class="cs a999"><a>({$item.brsum})次阅读 </a> |  <a>({$item.resum})个评论</a> |  <a href="javascript:void(0)" onclick="window.location='self_diary.php?module=edit&diaid={$item.id}'">编辑</a></p>
</li>
{/foreach}
{else}
<li align="center"><a href="javascript:void(0)">您的空间很空哦，赶快留下点痕迹吧^_^</a></li>
<li align="center"><a href="javascript:void(0)" onclick="window.location='self_diary.php?module=new'">马上去写属于我自己的第一篇日志</a></li>
{/if}
</ul>
</div>
<div class="album_page" id="pageFooter">
{if $reply.base.pageCounts eq '1'}
<a class="pageFooterStyle">1</a>
{else}
    {if $reply.base.page eq '1'}
    <a href="javascript:void(0)" class="pageFooterStyle">上一页</a>
    {else}
    <a  href="javascript:void(0)" onclick="javascript:getDiarySplitPage('{$reply.base.page-1}')">上一页</a>
    {/if}
    
    {section name=loop loop=$reply.base.pageCounts}
    	{if $reply.base.page eq $smarty.section.loop.index+1}
    	&nbsp;<a href="javascript:void(0)" class="pageFooterStyle">{$smarty.section.loop.index+1}</a>
    	{else}
    	&nbsp;<a href="javascript:void(0)" onclick="javascript:getDiarySplitPage('{$smarty.section.loop.index+1}')">{$smarty.section.loop.index+1}</a>
    	{/if}
    {/section}
	{if $reply.base.page eq $reply.base.pageCounts}
	&nbsp;<a class="pageFooterStyle">下一页</a>
	{else}
	&nbsp;<a  href="javascript:void(0)" onclick="javascript:getDiarySplitPage('{$reply.base.page+1}')">下一页</a>
	{/if}
{/if}
</div>
</div>
<!--日志模版 结束-->
</div>

<!--日志分类-->
<div class="AreaRR">
<div class="box_lt clearfix">
  <div class="title_bt"><span><a href="self_diary.php?module=manager">管理</a></span><a href="#">分类</a></div>
  <div class="space_daily_kri">
  <ul>
  <ul>
  {foreach from=$catalog item=item key=key}
  <li><span>({$item.sum})</span><a href="#">{$item.name}</a></li>
  {/foreach}
  </ul>
  </ul>
  </div>
  

</div>
</div>
<!--/日志分类-->




</div>

<div class="blank10"></div>


{include file=barfooter.tpl}