{include file=barheader.tpl}
<!------------------------------------------body-->
   <script src="./templates/scripts/group.js" type="text/javascript"></script>
   <script src="./templates/scripts/prototype.js" type="text/javascript"></script>  
<div class="backbj clearfix">
   <div class="blank10"></div>
   <div class="box2 clearfix">
   <div class="case_ll clearfix">
   
      <div class="lt_info_bankuai">
	  <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><strong>新建话题</strong></td>
    <td align="right" class="a963">欢迎: <a href="#">{$smarty.session.baseinfo.nickname}</a>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;<a href="#">新手上路</a>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;<a href="#">我的帖子</a></td>
  </tr>
</table>
   </div>
   </div>    
   </div>
   
   
   <div class="blank10"></div>
   <div class="box2 clearfix">
   <div class="case_ll clearfix">
   
   <div class="blank10"></div>
   <div class="box2 clearfix">
   <div class="case_ll clearfix">
   <div class="lt_main">
   <form action="grp_topic.php?module=success&ID={$ID}" method="post" id="frm2" name="frm2">
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="ttbb3">
  <tr>
    <td width="20%" align="right" bgcolor="#edf5ff"><strong>文章标题</strong></td>
    <td width="80%"><input name="text1" id="text1" type="text"  class="my_txt_350" onKeyUp="check_char('80','1');"/>&nbsp;&nbsp;<label id="limittitle" >你还可以输入80个字符</label></td>
  </tr>
  <tr>
    <td align="right" valign="top" bgcolor="#edf5ff"><strong>文章内容</strong></td>
    <td>
    <div class="tiezi_new_bt">
    <ul>
    <li class="tiezi_1"><a id="editor" name="editor">编辑</a></li>
    </ul>
    </div>
    
  <textarea id="editor_id" name="editor_id" style="width:800px;height:300px;"></textarea>
   <input type="text" id="textarea" name="textarea" style="display:none"></input>
   
  
    <div class="tiezi_new_zs" id="limitcontent">你还可以输入8000个字符</div>    </td>
  </tr>
  <tr>
    <td align="right" bgcolor="#edf5ff"><strong>标签</strong></td>
    <td><input name="text3" id="text3" type="text"  class="my_txt_350"/><span id = "limitlabel">&nbsp;&nbsp;最多添加5个标签，多个标签之间用","(英文逗号)分隔</span></td>
  </tr>
  <tr>
    <td align="right" bgcolor="#edf5ff"><strong>选择版块</strong></td>
    <td><select name="type" id="type" >
      <option value="0">请选择</option>
      {foreach from=$type item=item key=key}
      <option value="{$item.id}">{$item.name}</option>
      {/foreach}
    </select><span id = "limitforum">&nbsp;&nbsp;请选择所要发帖的版块</span></td>
  </tr>
  <tr>
    <td align="right" bgcolor="#edf5ff">&nbsp;</td>
    <td>
    <p class="top10"><input type="button" value=" "  class="anniu_ft" onclick="checkSubmit();"/></p>
    <p class="top10">
    1.这里发言，表示您接受了吾校论坛的用户行为准则。<br />
    2.请对您的言行负责，并遵守中华人民共和国有关法律法规,尊重网上道德。<br />
    3.转载文章请注明出自“吾校论坛（www.515xiao.com）”。如是商业用途请联系原作者。<br />
</p>
    </td>
  </tr>
</table>
</form>
   </div>
   
   </div>    
   </div>
   
   
   
   <!--友情链接-->
   <div class="blank10"></div>
   <div class="box2 clearfix">
   <div class="case_ll clearfix">
   <div class="lt_main">
   <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="8%" valign="top">友情链接：</td>
    <td width="92%">
	<ul class="friend_link">
	<li><a href="#">大学生校内网</a></li>
	<li><a href="#">校园传媒</a></li>
	<li><a href="#">四川外语学院校</a></li>
	<li><a href="#">重庆文理学院校吧</a></li>
	<li><a href="#">广州动漫培训</a></li>
	<li><a href="#">重庆理工花溪论坛</a></li>
	<li><a href="#">大学生校内网</a>/li>
	<li><a href="#">校园传</a></li>
	
	<li><a href="#">大学生校内网</a></li>
	<li><a href="#">校园传媒</a></li>
	<li><a href="#">四川外语学院校</a></li>
	<li><a href="#">重庆文理学院校吧</a></li>
	<li><a href="#">广州动漫培训</a></li>
	<li><a href="#">重庆理工花溪论坛</a></li>
	<li><a href="#">大学生校内网</a></li>
	<li><a href="#">校园传</a></li>
	<li><a href="#">大学生校内网</a></li>
	<li><a href="#">校园传媒</a></li>
	<li><a href="#">四川外语学院校</a></li>
	<li><a href="#">重庆文理学院校吧</a></li>
	<li><a href="#">广州动漫培训</a></li>
	<li><a href="#">重庆理工花溪论坛</a></li>
	<li><a href="#">大学生校内网</a></li>
	<li><a href="#">校园传</a></li>
	</ul>
	</td>
  </tr>
</table>
   
   </div>
   </div>    
   </div>
   <!--/友情链接-->
   
   
   <div class="blank10"></div>
   </div>
   </div>
   </div>
   
   
<input type="hidden" id="handler_path" value="grp_upload.php"/> 
<script src="./templates/scripts/prototype.js" type="text/javascript"></script>
<script  src="./plugin/editor/kindeditor.js" type="text/javascript"></script>
<script  src="./piugin/editor/lang/zh_CN.js" type="text/javascript"></script>
{literal}
<script>
	  KindEditor.ready(function(K) {
		  window.editor = K.create('#editor_id', {
			  items : [
				        'undo', 'redo', '|', 'preview', 'justifyleft', 'justifycenter', 'justifyright',
				        'justifyfull', 'insertorderedlist', 'insertunorderedlist', 'indent', 'outdent', 'subscript',
				        'superscript', 'quickformat', '|',
				        'formatblock', 'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold',
				        'italic', 'underline', 'strikethrough', 'lineheight', 'removeformat', '|', 'image',
				        'table', 'emoticons'
				],
			  
			  allowImageUpload  : true,
			  resizeType : 1,
			  afterChange : function(){ 
			       var limitNum = 8000;
			       var strValue = this.html();
			    	 if(strValue.length   >   limitNum)
			    		 {
			    		      //如果元素区字符数大于最大字符数，按照最大字符数截断；     
			    		  // var strValue = this.html();
			    	       strValue = strValue.substring(0,limitNum);
			    	       this.html(strValue);      

			    		 }
			    	       
			    	  else   
			    		  {
			    		    //在记数区文本框内显示剩余的字符数；
			    		      var count = limitNum - strValue.length;   
			    		      document.getElementById('limitcontent').innerHTML="&nbsp;&nbsp;你还可以输入"+count+"个字符";
			    		      document.getElementById('textarea').value=editor.html();
			    		  }
			      
		        }
			
		  });
          
	  });
		  
</script>
{/literal}

<!------------------------------------------body over-->
{include file=barfooter.tpl}
