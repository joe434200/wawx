{include file=spaceheader.tpl}

{literal}
<style>
form {
	margin: 0;
}
textarea {
	display: block;
}
#editor_id img {
     /*设置图片垂直居中*/
     vertical-align:middle;
	 width:650px;
	 height:480px;
     }
</style>
<link rel="stylesheet" href="./plugin/editor/themes/default/default.css" />
<script charset="utf-8" src="./plugin/editor/kindeditor-min.js"></script>
<script charset="utf-8" src="./plugin/editor/lang/zh_CN.js"></script>
<script>
var editor;
KindEditor.ready(function(K) {
	editor = K.create('textarea[name="content"]', {
		allowFileManager : true,
		syncType : "form",
		resizeType : 0,
		allowImageUpload : true,
		width : "700px",
		height : "700px",
		uploadJson : "self_photo_upload.php?module=diary"
		//uploadJson : basePath + ""
	});
	K('input[name=getHtml]').click(function(e) {
		alert(editor.html());
	});
	K('input[name=isEmpty]').click(function(e) {
		alert(editor.isEmpty());
	});
	K('input[name=getText]').click(function(e) {
		alert(editor.text());
	});
	K('input[name=selectedHtml]').click(function(e) {
		alert(editor.selectedHtml());
	});
	K('input[name=setHtml]').click(function(e) {
		editor.html('<h3>Hello KindEditor</h3>');
	});
	K('input[name=setText]').click(function(e) {
		editor.text('<h3>Hello KindEditor</h3>');
	});
	K('input[name=insertHtml]').click(function(e) {
		editor.insertHtml('<strong>插入HTML</strong>');
	});
	K('input[name=appendHtml]').click(function(e) {
		editor.appendHtml('<strong>添加HTML</strong>');
	});
	K('input[name=clear]').click(function(e) {
		editor.html('');
	});
});
</script>
{/literal}

<div class="blank10"></div>
<div class="block  blue_s">

<div class="AreaL750">
<!--日志模版-->
<div class="box_lt clearfix">
  <div class="title_bt blue_s">日志</div>
  
  <div class="space_daily_show clearfix">
  
  
  
  <form method="post" action="self_diary.php?module=newDiary" id="diaForm" name="diaForm" enctype="multipart/form-data">
  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="ttbb1">
  <tr>
    <td><strong>标题</strong></td>
    <td><input name="title" id="title" value="{$diary.title}" type="text"  class="my_txt_350" onfocus="javascript:setEnterEorrer(this,false,'')"/></td>
  </tr>
  <tr>
    <td valign="top"><strong>内容</strong></td>
    <td>
    <textarea id="editor_id" name="content">{$diary.content}</textarea>
	</td>  
  </tr>
  <tr>
  <td><strong>分类</strong></td>
  <td>
  <select name="catalog">
  {foreach from=$catalog item=item key=key}
  <option value="{$item.ID}" {if $item.ID eq $diary.idt_space_diary_catalog}selected{/if}>{$item.name}</option>
  {/foreach}
  </select>
  </td>
  </tr>
  <tr>
    <td>&nbsp;<input type="hidden" name="edit" value="{$diary.ID}"/></td>
    <td><input name="" type="button" class="anniu25" value="发表" onclick="javascript:diaryCheckSubmit()"/>
    <input name="" type="button" class="anniu25" value="取消" onclick="javascript:window.location='self_zone.php?module=daily'"/></td> 
  </tr>
</table>
</form>
</div>
  
  
</div>
<!--日志模版 结束-->
</div>

<!--日志分类-->
<div class="AreaRR">
<div class="box_lt clearfix">
  <div class="title_bt"><span><a href="#">管理</a></span><a href="#">分类</a></div>
  <div class="space_daily_kri">
  <ul>
  {foreach from=$catalog item=item key=key}
  <li><span>({$item.sum})</span><a href="#">{$item.name}</a></li>
  {/foreach}
  </ul>
  </div>
  

</div>
</div>
<!--/日志分类-->




</div>

<div class="blank10"></div>

{include file=barfooter.tpl}