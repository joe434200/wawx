{include file=wbheader.tpl}
{literal}
<style>
.wb_list
{
	height:auto !important;
	height:640px;
	min-height:640px;

}
.diary_box
{
	width:640px;
	margin:5px 0 15px 0;
	white-space:normal;
	word-break:break-all;
	word-wrap:break-word;
	overflow:hidden;
	text-overflow:ellipsis;
}
.diary_box img
{
	float:left;
	border:none;
	max-width:100%;
	width:e­xpression(document.body.clientWidth>640?"640px":"auto");
	text-overflow:ellipsis;
	overflow:hidden;
}
div.panel,p.flip
{
margin:0px;
padding:5px;
text-align:center;
background:#e5eecc;
border:solid 1px #c3c3c3;
}
div.panel
{
height:120px;
display:none;
}

</style>
{/literal}

<!--右侧-->
<td valign="top" class="wb_ny_RR clearfix">

<div class="wb_bt blue_s">日志</div>

</div>


<input type="hidden" id="wbid" value="{$uid}">
<input type="hidden" id="panelid" value="">
<div class="wb_list clearfix">
<ul id="BackReply">



{foreach from=$page.info item=item key=key}
<li class="clearfix">
  <div class="pic"><img src="{$wbinfo.photo}" /></div>
  
  <div class="wb_list_mess_ny clearfix">
    <div class="top">
      <p class="name blue_s"><a href="#">{$wbinfo.name}</a></p>
      <h3 class="title  blue_s">
      {if $item.type eq 0}
                <strong>发表日志</strong>&nbsp;&nbsp;<a href="javascript:void(0)" onclick="">{$item.title}</a>
      {else}
                 <strong>转发日志</strong>&nbsp;&nbsp;<a href="javascript:void(0)" onclick="">{$item.sectitle}</a>
      {/if}
      </h3>
    </div>
    
      {if $item.type eq 0}
      <div class="blank5"></div>
	      <div class="nr">
	         <div class="wb_list_zf clearfix">
	         <div class="b_top">
	          <span class="blue_s"></span>
	         </div>
	       	 
	        <div class="b_nr">
	        {$item.content}
	        </div>
	        <div class="b_xx a999_line">
	        <span>
	        <a href="javascript:void(0)">评论({$item.resum})</a></span>
	        <span><a href="javascript:void(0)">转发({$item.transum})</a></span>
	        <span>
	        <a href="javascript:void(0)" onclick="window.location='wb_index.php?module=diaryShow&diary={$item.id}'">查看原文>></a>
	        </span>
	        </div>
	     </div>
	     </div>
     	      
      {else}
      	  <div class="blank5"></div>
	      <div class="nr">
	         <div class="wb_list_zf clearfix">
	         <div class="b_top">
	          <h3 class="b_title  blue_s"><a href="javascript:void(0)" onclick="window.location='zone.php?uid={$item.owner}'">{$item.name}</a>&nbsp;<strong>:</strong>&nbsp;&nbsp;<a href="javascript:void(0)">{$item.origintitle}</a></h3>
	          <span class="blue_s"></span>
	        </div>
	       
	       <!-- 
	        <div class="b_nr"><img src="./templates/images/schoolbar/avatar5.jpg" /></div>
	       -->
	        <div class="diary_box">{$item.seccontent}</div>
	        <div class="b_xx a999_line">
	        <span><a href="javascript:void(0)">评论({$item.resum})</a></span>
	        <span><a href="javascript:void(0)">转发({$item.sectransum})</a></span>
	        <span>
	        <a href="javascript:void(0)" onclick="window.location='wb_index.php?module=diaryShow&diary={$item.idt_diary}'">查看原文>></a>
	        </span>
	        </div>
	     </div>
	     </div>
      {/if}
      <!--转发 模块-->
     
     <!--转发 模块 结束-->
   
   
   <div class="xx a999_line">
   <span class="n2"><a href="javascript:void(0)" onclick="window.location='wb_index.php?module=diaryShow&diary={$item.idt_diary}'" >评论</a></span>
   {if $item.type eq 0}
   <span><a href="javascript:void(0)" onclick="javascript:AddCollect('#{$item.id}','{$item.id}','{$item.title}')">收藏</a></span>
   <span><a href="javascript:void(0)" onclick="javascript:tranSlide('#{$item.id}','{$item.title}')">转发</a></span>
   {else}
   <span><a href="javascript:void(0)" onclick="javascript:AddCollect('#{$item.id}','{$item.idt_diary}','{$item.origintitle}')">收藏</a></span>
   <span><a href="javascript:void(0)" onclick="javascript:tranSlide('#{$item.id}','{$item.origintitle}')">转发</a></span>
   {/if}
   
       发表时间<a href="javascript:void(0)">{$item.time}</a>&nbsp;&nbsp;
   <div>
   <a href="javascript:void(0)" onclick="javascript:transDiary('{$uid}','{$item.transid}','{$item.title}',this)" id="{$item.id}_" style="display:none;"></a>
   <div class="panel" id="{$item.id}" >
   </div>
   </div>
   </div>
   
   
  </div>
</li>
{/foreach}


</ul>

<div class="album_page" id="pageFooter">
{if $page.base.pageCounts eq '1'}
<a href="javascript:void(0)" class="pageFooterStyle">1</a>
{else}
    {if $page.base.page eq '1'}
    <a href="javascript:void(0)" class="pageFooterStyle">上一页</a>
    {else}
    <a  href="javascript:void(0)" onclick="javascript:wbGetDiarySplit('{$page.base.page-1}')">上一页</a>
    {/if}
    
    {section name=loop loop=$page.base.pageCounts}
    	{if $page.base.page eq $smarty.section.loop.index+1}
    	&nbsp;<a href="javascript:void(0)" class="pageFooterStyle">{$smarty.section.loop.index+1}</a>
    	{else}
    	&nbsp;<a href="javascript:void(0)" onclick="javascript:wbGetDiarySplit('{$smarty.section.loop.index+1}')">{$smarty.section.loop.index+1}</a>
    	{/if}
    {/section}
    
	{if $page.base.page eq $reply.base.pageCounts}
	&nbsp;<a href="javascript:void(0)" class="pageFooterStyle">下一页</a>
	{else}
	&nbsp;<a  href="javascript:void(0)" onclick="javascript:wbGetDiarySplit('{$page.base.page+1}')">下一页</a>
	{/if}
{/if}

<!--/下部评论-->
</div>
</div>




<!--页码 -->

<div class="blank"></div>
<!--页码 end-->

    </td>
    
    
    
  </tr>
</table>
</div>


<div class="blank10"></div>
{include file=barfooter.tpl}