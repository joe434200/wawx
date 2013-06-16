{include file=spaceheader.tpl}


<div class="blank10"></div>
<div class="block  blue_s">
<input type="hidden" id="currpage">
<div class="AreaL750">
<!--好友列表-->
<div class="box_lt clearfix">
  <div class="title_bt blue_s">好友列表</div>
  
  <div class="space_show_friend clearfix">
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
  <div class="blank10"></div>
  
</div>
<!--好友列表 结束-->
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




</div>
<div class="blank10"></div>


{include file=barfooter.tpl}