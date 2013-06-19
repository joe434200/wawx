<?php /* Smarty version 2.6.18, created on 2013-06-19 16:26:12
         compiled from forum_home/sendpost.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "barheader.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>  


<script src="./templates/scripts/prototype.js" type="text/javascript"></script>
<script  src="./plugin/editor/kindeditor.js" type="text/javascript"></script>
<script  src="./piugin/editor/lang/zh_CN.js" type="text/javascript"></script>
<?php echo '
<script>
	  KindEditor.ready(function(K) {
		  window.editor = K.create(\'#editor_id\', {
			  items : [
				        \'undo\', \'redo\', \'|\', \'preview\', \'justifyleft\', \'justifycenter\', \'justifyright\',
				        \'justifyfull\', \'insertorderedlist\', \'insertunorderedlist\', \'subscript\',
				        \'superscript\', \'|\',
				        \'formatblock\', \'fontname\', \'fontsize\', \'|\', \'forecolor\', \'hilitecolor\', \'bold\',
				        \'italic\', \'underline\', \'strikethrough\', \'lineheight\', \'removeformat\', \'|\', \'image\',
				        \'table\', \'emoticons\'
				],
			  uploadJson : "forum_upload.php",
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
			    		      document.getElementById(\'limitcontent\').innerHTML="&nbsp;&nbsp;你还可以输入"+count+"个字符";
			    		  }
			      
		                    }
			
		  });
          
	  });
		  
</script>
'; ?>

   <div class="blank10"></div>
   <div class="box2 clearfix">
   <div class="case_ll clearfix">
    
      <div class="lt_info_bankuai">
	  <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
  
    <td><strong>社区统计：</strong>今日：<span class="af90"><strong><?php echo $this->_tpl_vars['forum']['counttoday']; ?>
</strong></span>&nbsp;&nbsp;&nbsp;&nbsp;主题：<span class="af30"><strong><?php echo $this->_tpl_vars['forum']['countforum']; ?>
</strong></span>&nbsp;&nbsp;&nbsp;&nbsp;帖子：<span class="a963"><strong><?php echo $this->_tpl_vars['forum']['countall']; ?>
</strong></span></td>
    <td align="right" class="a963">欢迎: <a href="#"><?php echo $_SESSION['baseinfo']['nickname']; ?>
</a>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;<a href="#">新手上路</a>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;<a href="forum_home.php?module=myforum">我的帖子</a></td>
  </tr>
</table>
   </div>
   </div>    
   </div>
   
   
   <div class="blank10"></div>     
   <div class="box2 clearfix">
   <div class="case_ll clearfix">
   
      <div   class="lt_show_bt">
	  <span class="lt_show_bt1">社区精华</span>
	  <em>热门推荐：<?php if ($this->_tpl_vars['hot']): ?>
     <?php $_from = $this->_tpl_vars['hot']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?> 
     <?php if ($this->_tpl_vars['key'] >= 0 && $this->_tpl_vars['key'] < 5): ?>
    <a href="forum_home.php?module=replylist&forumid=<?php echo $this->_tpl_vars['item']['ID']; ?>
"><?php echo $this->_tpl_vars['item']['title']; ?>
</a>
     <?php endif; ?>
     <?php endforeach; endif; unset($_from); ?>
     <?php endif; ?></em>	  </div>
	  <div class="blank5"></div>
      <div class="lt_show_info">
     <?php if ($this->_tpl_vars['newpic']): ?>
	  <ul>
     <?php $_from = $this->_tpl_vars['newpic']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
     <?php if ($this->_tpl_vars['key'] >= 0 && $this->_tpl_vars['key'] < 6): ?>
     <li><img src="./uploadfiles/forum/<?php echo $this->_tpl_vars['item']['realname']; ?>
" width="121" height="90"/><p><a href="./uploadfiles/forum/<?php echo $this->_tpl_vars['item']['realname']; ?>
"><?php echo $this->_tpl_vars['item']['oldname']; ?>
</a></p></li>
     <?php endif; ?>
    <?php endforeach; endif; unset($_from); ?>
	  </ul>
	    <?php endif; ?>
      </div>
	  
	  <div class="lt_show_wen">
	 <?php if ($this->_tpl_vars['hot']): ?>
     <ul>
      <?php $_from = $this->_tpl_vars['hot']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?> 
     <?php if ($this->_tpl_vars['key'] >= 0 && $this->_tpl_vars['key'] < 5): ?>
     <li><a href="forum_home.php?module=replylist&forumid=<?php echo $this->_tpl_vars['item']['ID']; ?>
"><?php echo $this->_tpl_vars['item']['title']; ?>
</a></li>
     <?php endif; ?>
     <?php endforeach; endif; unset($_from); ?>
</ul>
<?php endif; ?>
	  </div>
   </div>    
   </div>
   
   
   <div class="blank10"></div>
   <div class="box2 clearfix">
   <div class="case_ll clearfix">
   <div class="lt_main">
<form action="forum_home.php?module=send" method="post" name="sendforum" id="sendforum">
<input type="hidden" name="newforum[idm_forum_catalog]" value="<?php echo $this->_tpl_vars['forum']['type']; ?>
"/>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="ttbb3">
  <tr>
    <td width="20%" align="right" bgcolor="#edf5ff"><strong>文章标题</strong><ul></ul></td>
    <td width="80%"><input name="newforum[title]" id="title" type="text"  class="my_txt_350" 
    onkeydown = "textCounter('title','limittitle',80);"
    onkeyup = "textCounter('title','limittitle',80);"   
    />
    <span id = "limittitle">&nbsp;&nbsp;你还可以输入80个字符</span></td>
  </tr>
  <tr>
    <td align="right" valign="top" bgcolor="#edf5ff"><strong>文章内容</strong></td>
    <td>  
    
    <textarea id="editor_id" name="newforum[content]" style="width:800px;height:300px;"></textarea>
    <div class="tiezi_new_zs" id="limitcontent">你还可以输入8000个字符</div>
    </td>
  </tr>
  <tr>
    <td align="right" bgcolor="#edf5ff"><strong>标签</strong></td>
    <td><input name="newforum[labels]" id = "labels" type="text"  class="my_txt_350"/>
    <span id = "limitlabel">&nbsp;&nbsp;最多添加5个标签，多个标签之间用","(英文逗号)分隔</span></td>
  </tr>
  <tr>
    <td align="right" bgcolor="#edf5ff"><strong>帖子分类</strong></td>
    <td><select name="newforum[idm_forumtopic_catalog]" id = "forumtype">
    <option value=0>请选择帖子类型</option>
    <?php if ($this->_tpl_vars['forumtopic']): ?>
    <?php $_from = $this->_tpl_vars['forumtopic']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
      <option value=<?php echo $this->_tpl_vars['item']['ID']; ?>
><?php echo $this->_tpl_vars['item']['name']; ?>
</option>
    <?php endforeach; endif; unset($_from); ?>
    <?php endif; ?>
    </select><span id = "limitforum">&nbsp;&nbsp;请选择帖子类型</span></td>
  </tr>
  <tr>
    <td align="right" bgcolor="#edf5ff">&nbsp;</td>
    <td>
    <p class="top10"><input type="button" value=" "  class="anniu_ft" onclick="javascript:checkSubmit()"/></p>
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
   

   <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "barfooter.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <script src="./templates/scripts/forum_home.js" type="text/javascript"></script>
    
    