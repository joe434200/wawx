{include file=spaceheader.tpl}
{include file=uploadify.tpl}
{literal}
<script type="text/javascript">
//window.onload=function(){addpars("album","album");}
</script>
{/literal}


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

<input type="hidden" id="handler_path" value="self_photo_upload.php?album={$diaid}"/>
<input type="hidden" id="RebackFunction">
<div class="blank10"></div>
<div class="block  blue_s">

<div class="AreaL750">
   <!--相册模版 -->
  <div class="box_lt clearfix">
  <div class="title_bt blue_s">相册<a href="javascript:void(0)" id="J_selectImage">上传照片</a></div>
<div class="space_album_show">
<div class="list a_blue clearfix" id="alblist" style="padding:0 10px;width:700px;height:auto;float:left;">
<ul id="AlbumList">
{if !empty($photo)}
    {foreach from=$photo item=item key=key}
    <li>
    <div class="pic">
    <a href="javascript:void(0)" onclick="javascript:PhotoShowAndHide('{$item.path}',true)"><img src="{$item.path}" border="0" width="174px" height="130px" alt="点击图片可放大缩小" title="点击图片可放大缩小"/></a><br/><br/>
    <p align="center"><input type="checkbox" value="{$item.ID}" style="width:25px;height:25px;display:none;" name="selBox" ></input>
    </div>
    </li>
    {/foreach}
{else}
	<div class="only clearfix" id="albshow">
    <a><img src="./templates/images/schoolbar/zhuce_bj.gif" width="650" height="450" id="imgArea"/></a><br/>
    
    </div>
{/if}
</ul>
</div>
<div class="only clearfix" id="albshow" style="display:none">
<a href="javascript:void(0)" onclick="javascript:PhotoShowAndHide('{$item.path}',false)"><img src="" width="650" height="480" id="imgArea"/></a>
</div>






<input type="hidden" id="currpage">
<div class="blank10"></div>
<div style="padding:0 10px;">
<!--下部评论开始-->
<br/>
<br/>
<br/>
<p align="right">
<a href="javascript:void(0)" onclick="javascript:multiManage(true,this)" id="MultiManage">批量管理</a>&nbsp;

<div id="MultiSelAll" style="display:none;">
<p align="right">
<input type="checkbox" onclick="javascript:multiSelAll(this)"/><label>全选</label>&nbsp;
<a href="javascript:void(0)" onclick="javascript:MultiDelSel();">删除选中的照片</a>&nbsp;
<a href="javascript:void(0)" onclick="javascript:multiManage(false,this)">退出管理</a>&nbsp;
</div>
<h3 class="space_daily_bt">
</h3>
<div class="space_daily_pl clearfix">
<form action="" method="get">
<input type="hidden" id="diaid" value="{$diaid}">
<input type="hidden" id="type" value="2">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
  <td width="15%" valign="top">
    <p class="av"><img src="./uploadfiles/user/{$smarty.session.baseinfo.photo}" style="width:100px;height:100px;"/></p>
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

<div class="album_page" id="pageFooter">
{if $reply.base.pageCounts eq '1'}
<a class="pageFooterStyle">1</a>
{else}
    {if $reply.base.page eq '1'}
    <a href="javascript:void(0)" class="pageFooterStyle">上一页</a>
    {else}
    <a  href="javascript:void(0)" onclick="javascript:splitPage('2','{$reply.base.page-1}')">上一页</a>
    {/if}
    
    {section name=loop loop=$reply.base.pageCounts}
    	{if $reply.base.page eq $smarty.section.loop.index+1}
    	&nbsp;<a href="javascript:void(0)" class="pageFooterStyle">{$smarty.section.loop.index+1}</a>
    	{else}
    	&nbsp;<a href="javascript:void(0)" onclick="javascript:splitPage('2','{$smarty.section.loop.index+1}')">{$smarty.section.loop.index+1}</a>
    	{/if}
    {/section}
	{if $reply.base.page eq $reply.base.pageCounts}
	&nbsp;<a class="pageFooterStyle">下一页</a>
	{else}
	&nbsp;<a  href="javascript:void(0)" onclick="javascript:splitPage('2','{$reply.base.page+1}')">下一页</a>
	{/if}
{/if}
</div>
<!--/下部评论-->
</div>

</div>
</div><!--相册结束-->
</div>




<!--头像-->
<div class="AreaRR">
<div class="box_lt clearfix">
  <div class="title_bt"><span><a href="self_photo_guanli.html">管理</a></span><a href="#">相册分类</a></div>
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