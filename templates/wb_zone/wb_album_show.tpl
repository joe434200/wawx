{include file=wbheader.tpl}
{literal}
<style>
     #box img {
     /*设置图片垂直居中*/
     vertical-align:middle;
	 width:650px;
	 height:480px;
     }
     #box  { 
     background:#F7FBFC;
　　 text-align: left; 
　　 font-size: 35pt; 
　　 font-family: "隶书", "宋体"; 
　　 letter-spacing: 3px; 
　　 color:navy; 
　　 line-height:30pt; 
　　 text-indent: .5in;
　　 border: solid 2pt; 
　　 }


</style>
<link rel="stylesheet" href="./plugin/editor/themes/default/default.css" />
<script charset="utf-8" src="./plugin/editor/kindeditor-min.js"></script>
<script charset="utf-8" src="./plugin/editor/lang/zh_CN.js"></script>
<script>
var editor;
KindEditor.ready(function(K) {
	editor = K.create('textarea[name="emoticons"]', {
		allowFileManager : true,
		syncType : "form",
		items : ['emoticons'],
		width : "100%",
		height : "155px",
		syncType : "form",
		resizeType : 0 
	});
});
</script>
{/literal}

<!--右侧-->
    <td valign="top" class="wb_ny_RR clearfix">
    
<div class="wb_bt blue_s"><a href="wb_pic.html">TA的相册</a> > 我的大学</div>

<div class="wb_pics_show clearfix a_blue" >
<br/>
<div id="alblist">
<ul>
{if !empty($photo)}
    {foreach from=$photo item=item key=key}
    <li>
    <div class="pic">
    <a href="javascript:void(0)" onclick="javascript:PhotoShowAndHide('{$item.path}',true)"><img src="{$item.path}" border="0" width="174px" height="130px" alt="点击图片可放大缩小" title="点击图片可放大缩小"/></a>
    </div>
    <!-- 
    <p class="jj"><a href="javascript:void(0)" onclick="javascript:PhotoShowAndHide('{$item.path}',true)">{$item.name}</a></p>
     -->
    </li>
    {/foreach}
{else}
	<div class="only clearfix" id="albshow">
    <a><img src="./templates/images/schoolbar/zhuce_bj.gif" width="650" height="450" id="imgArea"/></a>
    </div>
{/if}
</ul>
</div>
</div>

<div class="only clearfix" id="albshow" style="display:none">
<a href="javascript:void(0)" onclick="javascript:PhotoShowAndHide('{$item.path}',false)"><img src="" width="650" height="480" id="imgArea"/></a>
</div>

<div class="blank10"></div>
<!--下部评论-->
<h3 class="space_daily_bt"><span></span>评论</h3>
<div class="space_daily_pl clearfix">
<form action="" method="get">
<input type="hidden" id="diaid" value="{$diaid}">
<input type="hidden" id="type" value="2">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
  <td width="15%" valign="top">
    <p class="av"><img src="{$smarty.session.baseinfo.photo}" style="width:110px;height:110px;"/></p>
	</td>
    <td>
    <div class="txt"><textarea name="emoticons" cols="" rows="" id="Reply"></textarea></div>
    <div>&nbsp;</div>
    
	</td>
  </tr>
  <tr>
  <td>&nbsp;</td>
  <td><div class="ann" align="right"><input type="button" value="评论"  class="anniu25" onclick="javascript:CreateNewPhotoReply()"/></div></td>
  </tr>
</table>
</form>
</div>

<div class="space_board">
<div class="ly">
<ul id="BackReply">
{foreach from=$reply.reply item=item key=key}
<li>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top" class="pic"><p><img src="./templates/images/schoolbar/avatar2.jpg" /></p></td>
    <td valign="top" class="nr">
    <p class="name"><a href="#">{$item.name}</a> <span>{$item.createtime}</span></p>
    <p class="pl">{$item.content}</p>
    </td>
	<td valign="bottom" class="edit a999"><a href="javascript:void(0)" onclick="javascript:addSecReply('{$item.name}','{$item.id}');">回复</a>&nbsp;&nbsp;<a href="javascript:void(0)" onclick="javascript:getDelReply('{$item.id}')">删除</a></td>
  </tr>
  {if $item.sec neq ""}
  {foreach from=$item.sec item=sec key=key}
  <tr>
    <td valign="top" class="pic">&nbsp;</td>
    <td valign="top" class="nr reply" colspan="2">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
         <tr>
         <td valign="top" class="pic"><p><img src="./templates/images/schoolbar/avatar2.jpg" /></p></td>
         <td valign="top" class="nr">
         <p class="name"><a href="#">{$sec.name}</a> <span>{$sec.createtime}</span></p>
         <p class="pl">{$sec.content}</p>
         </td>
         </tr>
		 <tr>
		 <td valign="top" class="pic">&nbsp;</td>
		 <td class="a999"><a href="javascript:void(0)" onclick="javascript:addSecReply('{$sec.name}','{$item.id}');">回复</a>&nbsp;&nbsp;<a href="javascript:void(0)" onclick="javascript:getDelReply('{$sec.id}')">删除</a></td>
		 </tr>
	     </table>
    </td>
  </tr>
  {/foreach}
  {/if}
</table>
</li>
{/foreach}
</ul>
</div>
</div>


<!--/下部评论-->



<!--页码 -->
<div class="blank"></div>
<div class="wb_num">
<div class="all">共{$reply.base.counts}个，第<a id="currpage">{$reply.base.page}</a>页</div>

<div class="au">
<div class="album_page" id="pageFooter">
{if $reply.base.pageCounts eq '1'}
<a class="pageFooterStyle">1</a>
{else}
    {if $reply.base.page eq '1'}
    <a href="javascript:void(0)" class="pageFooterStyle">上一页</a>
    {else}
    <a  href="javascript:void(0)" onclick="javascript:splitPage(2,'{$reply.base.page-1}')">上一页</a>
    {/if}
    
    {section name=loop loop=$reply.base.pageCounts}
    	{if $reply.base.page eq $smarty.section.loop.index+1}
    	&nbsp;<a href="javascript:void(0)" class="pageFooterStyle">{$smarty.section.loop.index+1}</a>
    	{else}
    	&nbsp;<a href="javascript:void(0)" onclick="javascript:splitPage(2,'{$smarty.section.loop.index+1}')">{$smarty.section.loop.index+1}</a>
    	{/if}
    {/section}
	{if $reply.base.page eq $reply.base.pageCounts}
	&nbsp;<a class="pageFooterStyle">下一页</a>
	{else}
	&nbsp;<a  href="javascript:void(0)" onclick="javascript:splitPage(2,'{$reply.base.page+1}')">下一页</a>
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