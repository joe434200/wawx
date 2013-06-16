{include file=spaceheader.tpl}



<input type="hidden" id="albumUrl" value="javascipt:window.location='self_photo.php?module=album&alb=">
<div class="blank"></div>
<div class="block  blue_s">
<div class="blank10"></div>
<div class="AreaL750">
   <!--相册模版 -->
  <div class="box_lt clearfix">
  <div class="title_bt blue_s">相册</div>
  
<div class="space_album">
<div class="list clearfix" style="padding:0 10px;width:700px;height:auto;float:left;">

<div class="space_daily_new clearfix">
<span class="anniu26"><a href="javascript:void(0)" onclick="javascript:window.location='self_photo.php?module=photo_upload'">上传照片</a></span>
<span class="anniu26"><a href="javascript:void(0)" onclick="javascript:window.location='self_photo.php?module=photo_manager'">创建相册</a></span>

</div>
<div style="height:auto;">
<ul id="BackReply">
{foreach from=$album item=item key=key}
{if $key < $page.base.pageNum}
<li>
<div class="pic">
<a href="javascript:void(0)" onclick="javascipt:window.location='self_photo.php?module=album&alb={$item.ID}'"><img src="./templates/images/schoolbar/wb_pic1.gif" /></a>
</div>
<p class="jj"><a href="javascript:void(0)" onclick="javascipt:window.location='self_photo.php?module=album&alb={$item.ID}'">{$item.albumname}</a></p>
</li>
{/if}
{/foreach}
</ul>
</div>
<p><br /><br/>

</div>
</div>
</div><!--相册结束-->
<div class="album_page" id="pageFooter">
{if $page.base.pageCounts eq '1'}
<a href="javascript:void(0)">1</a>
{else}
	{if $page.base.page eq 1}
	<a href="javascript:void(0)">上一页</a>
	{else}
	<a href="javascript:void(0)" onclick="javascript:getAlbumSplitPage('{$page.base.page-1}')">上一页</a>
	{/if}
	
	{section name=loop loop=$page.base.pageCounts}
    	{if $page.base.page eq $smarty.section.loop.index+1}
    	&nbsp;<a href="javascript:void(0)">{$smarty.section.loop.index+1}</a>
    	{else}
    	&nbsp;<a href="javascript:void(0)" onclick="javascript:getAlbumSplitPage('{$smarty.section.loop.index+1}')">{$smarty.section.loop.index+1}</a>
    	{/if}
    {/section}
	
	{if $page.base.page eq $page.base.pageCounts}
	<a href="javascript:void(0)">下一页</a>
	{else}
	<a href="javascript:void(0)" onclick="javascript:getAlbumSplitPage('{$page.base.page+1}')">下一页</a>
	{/if}
{/if}
</div>
</div>

<input type="hidden" id="uid" value="{$uid}">
<input type="hidden" id="currpage">

<!--头像-->
<div class="AreaRR">
<div class="box_lt clearfix">
  <div class="title_bt"><span><a href="#">管理</a></span><a href="#">相册分类</a></div>
  <div class="space_daily_kri">
  <ul>
  {if !empty($album)}
      {foreach from=$album item=item key=key}
      <li><span>({$item.sum})</span><a href="#" onclick="javascript:window.location='self_photo.php?module=album&alb={$item.ID}'">{$item.albumname}</a></li>
      {/foreach}
  {else}
  	  <li><a href="#">No Albums</a></li>
  {/if}

  </ul>
  </div>
  

</div>
</div>
<!--/头像-->






</div>
<div class="blank10"></div>
{include file=barfooter.tpl}

