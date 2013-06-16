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
    
    
 <!--中间-->
 <td valign="top" class="wb_bd_m clearfix" id="topMark">
    
<div>男，辽宁大连人</div>

<div class="wb_gz blue_s clearfix">
  {if $isAtten eq 1}
  <p><a href="javascript:void(0)">已关注</a></p>
  {else}  
  <p id="isAtten"><a href="javascript:void(0)" onclick="javascript:wbAddAtten('{$uid}')"><img src="./templates/images/schoolbar/wb7.gif" /></a></p>
  {/if}
  {if $isFriend eq 1}
  <p><a href="javascript:void(0)">已添加好友</a></p>
  {else}
  <p id="isFriend"><a href="javascript:void(0)" onclick="javscript:wbAddFriend('{$uid}')">加为好友</a></p>
  {/if}
  <p><a href="javascript:void(0)">拉入黑名单</a></p>
  <p><a href="javascript:void(0)" onclick="window.location='wb_index.php?module=perdoc'">查看资料</a></p>
</div>

<div class="wb_dh blue_s  clearfix">
<p><a href="javascript:void(0)">新动态</a></p>
</div>




<input type="hidden" id="wbid" value="{$uid}">
<input type="hidden" id="panelid" value="">
<div class="wb_list clearfix">
<ul id="BackReply">



{foreach from=$page.info item=item key=key}
<li class="clearfix">
  <div class="pic"><img src="{$wbinfo.photo}" /></div>
  
  <div class="wb_list_mess clearfix">
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

<!-- 
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
</div>
 -->

<!--/下部评论-->


</div>



<!--页码 -->
<div class="blank"></div>

</td>

     <!--右侧-->
    <td valign="top" class="wb_bd_r  clearfix" >
    
    
    <!--右侧 个人关注信息-->
    <div class="wb_info clearfix">
    <div class="a  blue_s">
   <table width="80%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><p><a href="javascript:void(0)" onclick="window.location='wb_index.php?module=friends'">{$info.frsum}</a></p> <a href="javascript:void(0)" onclick="window.location='wb_index.php?module=friends'">好友</a></td>
    <th><p><a href="javascript:void(0)" onclick="window.location='wb_index.php?module=attention'">{$info.atsum}</a></p><a href="javascript:void(0)" onclick="window.location='wb_index.php?module=attention'">关注</a></th>
    <th><p><a href="javascript:void(0)" onclick="window.location='wb_index.php?module=fans'">{$info.ansum}</a></p><a href="javascript:void(0)" onclick="window.location='wb_index.php?module=fans'">粉丝</a></th>
  </tr>
  </table>
  </div>
  </div>
  
  
  
<!--右侧 个人在线时间-->
<div class="wb_time clearfix">
社区积分：101996<br />
上次登录：{$wbinfo.lastlogintime}<br />
登录次数：{$wbinfo.logintimes}<br />
注册日期：{$wbinfo.createtime}
</div>


<!--右侧 关注他的人-->
<div class="wb_peos clearfix">
<p class="fk">TA关注的人</p>
<ul>
{if $atten.info|@count neq 0}
{foreach from=$atten.info item=item key=key}
	{if $key<6}
	<li><a href="javascript:void(0)" onclick="window.location='wb_index.php?uid={$item.frid}'"><img src="{$item.photo}"/></a>
	<p class="blue_s"><a href="javascript:void(0)" onclick="window.location='wb_index.php?uid={$item.frid}'">{$item.name}</a></p>
	<span></span>
	</li>
	{/if}
{/foreach}
{else}
<li>
<a>您尚未关注任何好友哦，亲</a>
</li>
{/if}
</ul>
</div>


<!--右侧 服务专区-->
<div class="wb_sever clearfix blue_s">
<p class="fwzq">服务专区</p>
<ul>
<li><a href="#">天涯客服</a></li>
<li><a href="#">新手上路</a></li>
<li><a href="#">用户投诉</a></li>
<li><a href="#">建议申请</a></li>
<li><a href="#">议事广场</a></li>
<li><a href="#">不实信息曝光</li>
</ul>
</div>

    
    </td>
  </tr>
</table>
</div>


<div class="blank10"></div>
<input type="hidden" id="jokelist"/>

{include file=barfooter.tpl}