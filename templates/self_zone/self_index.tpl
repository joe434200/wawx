{include file=spaceheader.tpl}
{literal}
<style>
.visname
{
	width:100px;
    text-align:left;	
    overflow:hidden;
    text-overflow:ellipsis;
    white-space:nowrap;
}
.diary_box
{
	
}
.diary_box img
{
	border:0;
	margin:0;
	padding:0;
	height:450px;
	width:480px;
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
		height : "120px",
		syncType : "form",
		resizeType : 0 
	});
});
</script>
{/literal}


<input type="hidden" id="diaid" value="{$uid}">
<input type="hidden" id="type" value="3">

<div class="blank10"></div>

<!--主体开始-->
<div class="blank10"></div>
<div class="block  ">

<div class="AreaL240">

<!--头像-->

<div class="box_lt clearfix">
  <div class="title_bt"><a href="javascript:void(0)" onclick="window.location='userCenter.php?module=avatar'">头像</a></div>
  <div class="space_avatar ">
  {if $self.photo|@count neq 0}
  <p class="pic"><img src="{$self.photo}" style="height:150px;width:150px;"/></p>
  <p class="name"><a href="#">{if $self.nickname eq ""}{$self.email}{else}{$self.nickname}{/if}</a></p>
  {else}
  <p><a>我的头像还是空哦</a></p>
  <p><a href="javascript:void(0)" onclick="window.location='userCenter.php?module=avatar'">现在就去上传我的个人头像</a></p>
  {/if}
  </div>
  
<div class="space_info  clearfix ">
<ul>
<li class="a1">日志: <a href="javascript:void(0)">{$info.disum}</a></li>
<li class="a2">照片: <a href="javascript:void(0)">{$info.phsum}</a></li>
<li class="a3">好友: <a href="javascript:void(0)">{$info.frsum}</a></li>
</ul>
</div>
</div>





<!--相册-->
<div class="blank10"></div>
<div class="box_lt clearfix">
  <div class="title_bt"><a href="javascript:void(0)" onclick="window.location='self_zone.php?module=album'">相册</a></div>
  
<div class="space_pics  clearfix ">
<ul>
{foreach from=$albums item=item key=key}
<li>
<h3><a href="javascript:void(0)" onclick="javascipt:window.location='self_photo.php?module=album&alb={$item.ID}'"><img src="./templates/images/schoolbar/wb_pic1.gif" /></a></h3>
<p class="visname"><a href="javascript:void(0)" onclick="javascipt:window.location='self_photo.php?module=album&alb={$item.ID}'">{$item.albumname}</a></p>
</li>
{/foreach}
</ul>
</div>
</div>

</div><!--左侧结束-->


<div class="AreaM500">

<!--个人资料-->

<div class="box_lt clearfix">
<div class="title_bt "><a href="javascript:void(0)" onclick="window.location='self_zone.php?module=perdoc'">个人资料</a></div>
  
<div class="space_personal clearfix ">
<ul>
<li><span>真实姓名</span>{if $self.nickname eq ""}尚未填写{else}{$self.nickname}{/if}</li>
<li><span>性别</span>{if $self.sex eq ""}尚未填写{else}{if $self.sex eq "0"}女{else}男{/if}{/if}</li>
<li><span>生日</span>{if $self.birthdate eq ""}尚未填写{else}{$self.birthdate}{/if}</li>
<li><span>居住地</span>{if $self.residence eq ""}尚未填写{else}{$self.residence}{/if}</li>
<li><span>个人主页</span><a href="javascript:void(0)">{if $self.personalwebsite eq ""}尚未填写{else}{$self.personalwebsite}{/if}</a></li>
</ul>
<p class="show"><a href="self_zone.php?module=perdoc">查看全部个人资料</a></p>
</div>
</div>



<!--日志-->
<div class="blank10"></div>
<div class="box_lt clearfix">
  <div class="title_bt "><a href="javascript:void(0)" onclick="window.location='self_zone.php?module=daily'">日志</a></div>
  
<div class="space_daily clearfix">
<ul>
{if $diarys|@count neq ""}
{foreach from=$diarys item=item key=key}
<li class="diary_box">
<h3 class=""><a href="javascript:void(0)" onclick="javascript:window.location='self_diary.php?module=show&diaid={$item.id}'">{$item.title}</a><span>{$item.createtime}</span></h3>
<p class="jj">{$item.content}</p>
<p class="cs"><a href="javascript:void(0)" onclick="javascript:window.location='self_diary.php?module=show&diaid={$item.id}'">({$item.brsum})次阅读 </a> |  <a href="javascript:void(0)" onclick="javascript:window.location='self_diary.php?module=show&diaid={$item.id}'">({$item.resum})个评论</a></p>
</li>
{/foreach}
{else}
<li align="center"><a href="javascript:void(0)">暂无空间日志哦，亲</a></li>
<li align="center"><a href="javascript:void(0)" onclick="window.location='self_diary.php?module=new'">马上去写属于我自己的第一篇日志</a></li>
{/if}

</ul>
<p class="show "><a href="self_zone.php?module=daily">查看更多</a></p>
</div>
</div>



<!--留言板-->
<div class="blank10"></div>
<div class="box_lt clearfix">
<div class="title_bt "><a href="javascript:void(0)" onclick="javascript:window.location='self_zone.php?module=reply'">留言板</a></div>
  
<div class="space_board clearfix">

<div class="lyk">
<form action="" method="get">
<input type="hidden" id="diaid" value="{$uid}">
<input type="hidden" id="type" value="3">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td>
<div class="txt" style="height:auto;"><textarea name="emoticons" cols="" rows="" id="Reply"></textarea></div>
</td>
</tr>
<tr>
<td align="right">
<div class="ann"><input type="button" value="留言"  class="anniu25" onclick="javascript:addReply()"/></div>
</td>
</tr>
</table>
</form>
</div>

<div class="ly">
<ul id="BackReply">

{foreach from=$reply.reply item=item key=key}
<li>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top" class="pic"><p><img src="./templates/images/schoolbar/avatar2.jpg" /></p></td>
    <td valign="top" class="nr">
    <p class="name"><a href="javascript:void(0)">{$item.name}</a> <span>{$item.createtime}</span></p>
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
         <p class="name"><a href="javascript:void(0)">{$sec.name}</a> <span>{$sec.createtime}</span></p>
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

<p class="show "><a href="self_zone.php?module=reply">查看全部</a></p>
</div>

</div>
</div>

</div><!--中间结束-->


<div class="AreaRR">

<!--好友-->

<div class="box_lt clearfix">
  <div class="title_bt"><span><a href="javascript:void(0)" onclick="window.location='self_zone.php?module=friends'">查看</a> </span> <a href="javascript:void(0)" onclick="window.location='self_zone.php?module=friends'">好友</a></div>
  
  <div class="space_friend clearfix">
<ul>
{if $visitors|@count neq ""}
{foreach from=$friends item=item key=key}
<li>
<h3><img src="{$item.photo}" /></h3>
<p class="visname"><a href="#">{if $item.nickname eq ""}{$item.email}{else}{$item.nickname}{/if}</a></p>
</li>
{/foreach}
{else}
<li>暂无好友哦，亲</li>
{/if}

</ul>
</div>
</div>


<!--最近访客-->
<div class="blank10"></div>
<div class="box_lt clearfix">
<div class="title_bt"><a href="javascript:void(0)">最近访客</a></div>
<div class="space_friend clearfix">
<ul>
{if $visitors|@count neq ""}
{foreach from=$visitors item=item key=key}
<li>
<h3><img src="{$item.photo}" /></h3>
<p class="visname"><a href="#">{if $item.nickname eq ""}{$item.email}{else}{$item.nickname}{/if}</a></p>
</li>
{/foreach}
{else}
<li align="">暂无访客哦，亲</li>
{/if}
</ul>
</div>
</div>

</div><!--右侧结束-->




</div>

   <div class="blank10"></div>
 
  
{include file=barfooter.tpl}