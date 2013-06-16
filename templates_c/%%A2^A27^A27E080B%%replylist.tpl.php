<?php /* Smarty version 2.6.18, created on 2013-06-08 15:49:00
         compiled from forum_home/replylist.tpl */ ?>
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
				        \'italic\', \'underline\', \'strikethrough\', \'lineheight\', \'removeformat\', \'|\',
				        \'table\', \'emoticons\'
				],
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
   
      <div class="lt_show_bt">
	  <span class="lt_show_bt1">社区精华</span>
	  <em>热门推荐：
	  <?php if ($this->_tpl_vars['hot']): ?>
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
      
<!--头部发新贴-->
<div class="forum_post_new clearfix">
<div class="faite"><a <?php if ($_SESSION['loginok'] == 1): ?> 
href="forum_home.php?module=new&type=<?php echo $this->_tpl_vars['oneforum']['idm_forum_catalog']; ?>
"
<?php else: ?> href="javascript:void(0)" onclick="LoginOut();"<?php endif; ?>>
<img src="./templates/images/schoolbar/post5.gif" border="0" /></a></div>
<div class="num">
<DIV class="num_pg">
<?php if ($this->_tpl_vars['oneforum']['power'] == 1): ?>
 <?php if ($this->_tpl_vars['oneforum']['topflg']): ?>
 <a  href="javascript:changetop();void(0)" id="forumtop" >取消置顶</a>
 <?php else: ?>
  <a  href="javascript:changetop();void(0)" id="forumtop" >帖子置顶</a>
  <?php endif; ?>
  <?php if ($this->_tpl_vars['oneforum']['excelflg']): ?>
 <a  href="javascript:changeexcel();void(0)" id="forumexcel" >取消加精</a>
 <?php else: ?>
  <a  href="javascript:changeexcel();void(0)" id="forumexcel" >帖子加精</a>
  <?php endif; ?>
  <?php if ($this->_tpl_vars['oneforum']['shieldflg']): ?>
 <a  href="javascript:changeshield();void(0)" id="forumshield" >取消屏蔽</a>
 <?php else: ?>
  <a  href="javascript:changeshield();void(0)" id="forumshield" >帖子屏蔽</a>
  <?php endif; ?>
 <?php endif; ?>
<script type="text/javascript">
    var pg2 = new showPages('pg2');
	pg2.pageCount = '<?php echo $this->_tpl_vars['pagecount']; ?>
';
	pg2.argName = 'p';
	pg2.printHtml();
</script>
</DIV>
</div>


<p><input type="button"  class="anniu23" value="只看楼主" onclick="window.location='forum_home.php?module=louzhu&forumid=<?php echo $this->_tpl_vars['oneforum']['ID']; ?>
'"/></p>

<p><input name="" type="button"  class="anniu22" value="返回列表" onclick="window.location='forum_home.php?module=home&type=<?php echo $this->_tpl_vars['oneforum']['idm_forum_catalog']; ?>
'"/></p>

</div>
</div>
<!--/头部发新贴-->


<div class="blank10"></div>

<div class="forum_post_lista clearfix">

  <div id="Layer1"><?php if ($this->_tpl_vars['oneforum']['topflg']): ?><img src="./templates/images/schoolbar/005.gif" /><?php endif; ?></div>
  <!--内页 帖子主题-->
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td class="lk">
    <div class="cen">
     查看: <span class="forum_red"><?php echo $this->_tpl_vars['oneforum']['browsercount']; ?>
</span>&nbsp;&nbsp;|&nbsp;&nbsp;回复: <span class="forum_red"><?php echo $this->_tpl_vars['oneforum']['replynum']; ?>
</span></div>
    </td>
    <td class="rk"><h1><?php echo $this->_tpl_vars['oneforum']['title']; ?>
</h1><p class="a999"></p><p class="a999">
    <a <?php if ($_SESSION['loginok'] == 1): ?>
    href="javascript:collectforum();void(0)" 
    <?php else: ?> href="javascript:void(0)" onclick="LoginOut();"<?php endif; ?> id="collect">[收藏]</a></p></td>
  </tr>
  <tr>
    <td class="lk_h">&nbsp;</td>
    <td class="rk_h">&nbsp;</td>
  </tr>
</table>
<!--内页 帖子主题end-->
<?php if ($this->_tpl_vars['currpage'] == 1 && $this->_tpl_vars['userid'] == ''): ?>
<div>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td class="nlk">
    <div class="tz_name"><?php echo $this->_tpl_vars['oneforum']['nickname']; ?>
</div>
    <div class="nlk_pic"><img src="./uploadfiles/user/<?php echo $this->_tpl_vars['oneforum']['photo']; ?>
" onerror="this.src='./templates/images/schoolbar/avatar.jpeg'"" width="128" height="95"/></div>
    <div class="nlk_xinxi a_blue">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <th><p><a href="javascript:void(0)"><?php echo $this->_tpl_vars['countforumtype']; ?>
</a></p>主题</th>
    <th><p><a href="javascript:void(0)" name = "listen<?php echo $this->_tpl_vars['oneforum']['creater']; ?>
"><?php echo $this->_tpl_vars['oneforum']['listennum']; ?>
</a></p>听众</th>
    <td align="center"><p><a href="javascript:void(0)"><?php echo $this->_tpl_vars['oneforum']['forumcoins']; ?>
</a></p>积分</td>
  </tr>
</table>
    </div>
    
    <div class="nlk_jb a333"><a href="javascript:void(0)"><?php echo $this->_tpl_vars['oneforum']['adminflg']; ?>
</a>
	<br/>
	<?php echo $this->_tpl_vars['oneforum']['levelimage']; ?>

     </div>
   
    <div class="nlk_xx">
    <ul class="a_blue">
    
    <dd>在线时间</dd>
    <dt><?php echo $this->_tpl_vars['oneforum']['onlinetime']; ?>
</dt>
    
    <dd>最后登录</dd>
    <dt><?php echo $this->_tpl_vars['oneforum']['logindate']; ?>
</dt>
    
    <dd>帖子</dd>
    <dt><a href="javascript:void(0)"><?php echo $this->_tpl_vars['oneforum']['countforumbyid']; ?>
</a></dt>

    </ul>
    </div>
    <div class="nlk_mail2 a_blue">
    <a <?php if ($_SESSION['loginok'] == 1): ?> href="javascript:listen(<?php echo $this->_tpl_vars['oneforum']['creater']; ?>
);void(0)"
    <?php else: ?> href="javascript:void(0)" onclick="LoginOut();"<?php endif; ?>>收听TA</a></div>
    <div class="nlk_mail a_blue" >
    <a <?php if ($_SESSION['loginok'] == 1): ?> href="javascript:sendmessage(<?php echo $this->_tpl_vars['oneforum']['creater']; ?>
);void(0)"
      <?php else: ?> href="javascript:void(0)" onclick="LoginOut();"<?php endif; ?> id = "sendmessage">发信息</a>
    </div>
    </td>
    
    
    <td valign="top" class="nrk">
    <div class="nrk_all">
    <div class="fl">楼主</div>
    <div class="nrk_a a333"><img src="./templates/images/schoolbar/online_admin.gif" />
    <em>发表于 <?php echo $this->_tpl_vars['oneforum']['createtime']; ?>
 </em>&nbsp;&nbsp;|&nbsp;&nbsp;
    <a href="forum_home?module=replylist&forumid=<?php echo $this->_tpl_vars['oneforum']['ID']; ?>
&userid=<?php echo $this->_tpl_vars['oneforum']['creater']; ?>
">只看该作者</a>
     &nbsp;&nbsp;|&nbsp;&nbsp;
    <?php if ($this->_tpl_vars['order']): ?>
    <a href="forum_home.php?module=replylist&forumid=<?php echo $this->_tpl_vars['oneforum']['ID']; ?>
">正序浏览 </a>
    <?php else: ?>
     <a href="forum_home.php?module=replylist&forumid=<?php echo $this->_tpl_vars['oneforum']['ID']; ?>
&order=1">倒序浏览 </a>
     <?php endif; ?>
    </div>
    </div>
    
    <div class="nrk_nr"><?php echo $this->_tpl_vars['oneforum']['content']; ?>
</div>

    
    </td>
  </tr>
  <tr>
    <td class="room">&nbsp;</td>
    <td class="nrk_foot a333">
    <p class="ref">
    <a  <?php if ($_SESSION['loginok'] == 1): ?> href="javascript:pageScroll()"
    <?php else: ?> href="javascript:void(0)" onclick="LoginOut();"<?php endif; ?>>回复</a></p>
    </td>
  </tr>
  <tr>
    <td class="lk_h">&nbsp;</td>
    <td class="rk_h">&nbsp;</td>
  </tr>
</table>
</div>
<?php endif; ?>


<?php if ($this->_tpl_vars['currpage'] == 1 && $this->_tpl_vars['userid'] == $this->_tpl_vars['oneforum']['creater']): ?>
<div>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td class="nlk">
    <div class="tz_name"><?php echo $this->_tpl_vars['oneforum']['nickname']; ?>
</div>
    <div class="nlk_pic"><img src="./uploadfiles/user/<?php echo $this->_tpl_vars['oneforum']['photo']; ?>
" onerror="this.src='./templates/images/schoolbar/avatar.jpeg'"" width="128" height="95"/></div>
    <div class="nlk_xinxi a_blue">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <th><p><a href="javascript:void(0)"><?php echo $this->_tpl_vars['countforumtype']; ?>
</a></p>主题</th>
    <th><p><a href="javascript:void(0)" name = "listen<?php echo $this->_tpl_vars['oneforum']['creater']; ?>
"><?php echo $this->_tpl_vars['oneforum']['listennum']; ?>
</a></p>听众</th>
    <td align="center"><p><a href="javascript:void(0)"><?php echo $this->_tpl_vars['oneforum']['forumcoins']; ?>
</a></p>积分</td>
  </tr>
</table>
    </div>
    
    <div class="nlk_jb a333"><a href="javascript:void(0)"><?php echo $this->_tpl_vars['oneforum']['adminflg']; ?>
</a>
	<br/>
	<?php echo $this->_tpl_vars['oneforum']['levelimage']; ?>

     </div>
   
    <div class="nlk_xx">
    <ul class="a_blue">
    
    <dd>在线时间</dd>
    <dt><?php echo $this->_tpl_vars['oneforum']['onlinetime']; ?>
</dt>
    
    <dd>最后登录</dd>
    <dt><?php echo $this->_tpl_vars['oneforum']['logindate']; ?>
</dt>
    
    <dd>帖子</dd>
    <dt><a href="javascript:void(0)"><?php echo $this->_tpl_vars['oneforum']['countforumbyid']; ?>
</a></dt>

    </ul>
    </div>
    <div class="nlk_mail2 a_blue">
    <a <?php if ($_SESSION['loginok'] == 1): ?> href="javascript:listen(<?php echo $this->_tpl_vars['oneforum']['creater']; ?>
);void(0)"
    <?php else: ?> href="javascript:void(0)" onclick="LoginOut();"<?php endif; ?>>收听TA</a></div>
    <div class="nlk_mail a_blue" >
    <a <?php if ($_SESSION['loginok'] == 1): ?> href="javascript:sendmessage(<?php echo $this->_tpl_vars['oneforum']['creater']; ?>
);void(0)"
      <?php else: ?> href="javascript:void(0)" onclick="LoginOut();"<?php endif; ?> id = "sendmessage">发信息</a>
    </div>
    </td>
    
    
    <td valign="top" class="nrk">
    <div class="nrk_all">
    <div class="fl">楼主</div>
    <div class="nrk_a a333"><img src="./templates/images/schoolbar/online_admin.gif" />
    <em>发表于 <?php echo $this->_tpl_vars['oneforum']['createtime']; ?>
 </em>&nbsp;&nbsp;|&nbsp;&nbsp;
    <a href="forum_home?module=replylist&forumid=<?php echo $this->_tpl_vars['oneforum']['ID']; ?>
">显示全部楼层</a>
    </div>
    </div>
    
    <div class="nrk_nr"><?php echo $this->_tpl_vars['oneforum']['content']; ?>
</div>

    
    </td>
  </tr>
  <tr>
    <td class="room">&nbsp;</td>
    <td class="nrk_foot a333">
    <p class="ref">
    <a  <?php if ($_SESSION['loginok'] == 1): ?> href="javascript:pageScroll()"
    <?php else: ?> href="javascript:void(0)" onclick="LoginOut();"<?php endif; ?>>回复</a></p>
    </td>
  </tr>
  <tr>
    <td class="lk_h">&nbsp;</td>
    <td class="rk_h">&nbsp;</td>
  </tr>
</table>
</div>
<?php endif; ?>


<!--内页 帖子数据循环 end-->
<?php $_from = $this->_tpl_vars['allreply']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?> 
<div><!-- copy -->
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td class="nlk">
    <div class="tz_name"><?php echo $this->_tpl_vars['item']['nickname']; ?>
</div>
    <div class="nlk_pic"><img src="./uploadfiles/user/<?php echo $this->_tpl_vars['item']['photo']; ?>
" onerror="this.src='./templates/images/schoolbar/avatar.jpeg'"" width="128" height="95"/></div>
    <div class="nlk_xinxi a_blue">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <th><p><a href="javascript:void(0)"><?php echo $this->_tpl_vars['countforumtype']; ?>
</a></p>主题</th>
    <th><p><a href="javascript:void(0)" name = "listen<?php echo $this->_tpl_vars['item']['creater']; ?>
"><?php echo $this->_tpl_vars['item']['listennum']; ?>
</a></p>听众</th>
    <td align="center"><p><a href="javascript:void(0)"><?php echo $this->_tpl_vars['item']['forumcoins']; ?>
</a></p>积分</td>
  </tr>
</table>
    </div>
    
    <div class="nlk_jb a333"><a href="javascript:void(0)"><?php echo $this->_tpl_vars['item']['adminflg']; ?>
</a>
	<br />
     <?php echo $this->_tpl_vars['item']['levelimage']; ?>

     </div>
   
    <div class="nlk_xx">
    <ul class="a_blue">
    
    <dd>在线时间</dd>
    <dt><?php echo $this->_tpl_vars['item']['onlinetime']; ?>
小时</dt>
    
    <dd>最后登录</dd>
    <dt><?php echo $this->_tpl_vars['item']['logindate']; ?>
</dt>
    
    
    <dd>帖子</dd>
    <dt><a href="#"><?php echo $this->_tpl_vars['item']['countforumbyid']; ?>
</a></dt>

    </ul>
    </div>
    <div class="nlk_mail2 a_blue">
    <a <?php if ($_SESSION['loginok'] == 1): ?> href="javascript:listen(<?php echo $this->_tpl_vars['item']['creater']; ?>
);void(0)"
    <?php else: ?> href="javascript:void(0)" onclick="LoginOut();"<?php endif; ?>>收听TA</a></div>
    
    <div class="nlk_mail a_blue">
    <a <?php if ($_SESSION['loginok'] == 1): ?> href="javascript:sendmessage(<?php echo $this->_tpl_vars['item']['creater']; ?>
);void(0)"
       <?php else: ?> href="javascript:void(0)" onclick="LoginOut();"<?php endif; ?>>发信息</a></div>
   
    </td>
    <td valign="top" class="nrk">
    <div class="nrk_all">
    <div class="fl"><?php if ($this->_tpl_vars['order']): ?>  <?php echo $this->_tpl_vars['currpagebase']-$this->_tpl_vars['key']; ?>

    <?php else: ?>
    <?php echo $this->_tpl_vars['key']+$this->_tpl_vars['currpagebase']; ?>
 <?php endif; ?>楼</div>
    <div class="nrk_a a333"><img src="./templates/images/schoolbar/online_admin.gif"/>
    <em>发表于 <?php echo $this->_tpl_vars['item']['createtime']; ?>
 </em>
    &nbsp;&nbsp;|&nbsp;&nbsp;
    <?php if ($this->_tpl_vars['userid'] == ""): ?>
    <a href="forum_home?module=replylist&forumid=<?php echo $this->_tpl_vars['oneforum']['ID']; ?>
&userid=<?php echo $this->_tpl_vars['item']['creater']; ?>
">只看该作者</a>
    <?php else: ?>
    <a href="forum_home?module=replylist&forumid=<?php echo $this->_tpl_vars['oneforum']['ID']; ?>
">显示全部楼层</a>
    <?php endif; ?>
    </div>
    </div>
    
    <div class="nrk_nr"><?php echo $this->_tpl_vars['item']['content']; ?>
</div>
    </td>
   </tr>
   <tr>
    <td class="room">&nbsp;</td>
    <td class="nrk_foot a333">
    <p class="ref">
    <a <?php if ($_SESSION['loginok'] == 1): ?>
    href="javascript:pageScroll('<?php echo $this->_tpl_vars['item']['replyid']; ?>
','<?php echo $this->_tpl_vars['item']['nickname']; ?>
')"
    <?php else: ?> href="javascript:void(0)" onclick="LoginOut();"<?php endif; ?>>回复</a></p>
    <?php if ($this->_tpl_vars['oneforum']['power'] == 1): ?>
    <?php if ($this->_tpl_vars['item']['shieldflg']): ?>
	 <p class="ref"><a href="javascript:changesecondreply('<?php echo $this->_tpl_vars['item']['replyid']; ?>
');void(0)" id="secondreply<?php echo $this->_tpl_vars['item']['replyid']; ?>
">取消屏蔽</a></p>
	<?php else: ?>
	  <p class="ref"><a href="javascript:changesecondreply('<?php echo $this->_tpl_vars['item']['replyid']; ?>
');void(0)" id="secondreply<?php echo $this->_tpl_vars['item']['replyid']; ?>
">屏蔽</a></p>
	<?php endif; ?>
    <?php endif; ?>
    </td>
  </tr>
   <?php $_from = $this->_tpl_vars['item']['secondReply']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
			  <tr>
			    <td valign="top" class="room">&nbsp;</td>
			    <td valign="top" class="nr reply" colspan="2">
			          <table width="100%" border="0" cellspacing="0" cellpadding="0">
			          <tr>
			         <td valign="top" class="nlk_pic"><p><img src="uploadfiles/user/<?php echo $this->_tpl_vars['item']['photo']; ?>
" onerror="this.src='./templates/images/schoolbar/avatar.jpeg'" width="50" height="50"/></p></td>
			         <td valign="top" class="nr">
			         <p class="name"><a href="#"><?php echo $this->_tpl_vars['item']['nickname']; ?>
</a> <span><?php echo $this->_tpl_vars['item']['createtime']; ?>
</span></p>
			         <p class="pl"><?php echo $this->_tpl_vars['item']['content']; ?>
</p>
			         </td>
			         </tr>
					 <tr>
					 <td valign="top" class="pic">&nbsp;</td>
					 <td class="a999">
					 <a <?php if ($_SESSION['loginok'] == 1): ?> href="javascript:pageScroll('<?php echo $this->_tpl_vars['item']['idt_reply_parentid']; ?>
','<?php echo $this->_tpl_vars['item']['nickname']; ?>
')"
					    <?php else: ?> href="javascript:void(0)" onclick="LoginOut();"<?php endif; ?>>回复</a>&nbsp;&nbsp;
					 <?php if ($this->_tpl_vars['oneforum']['power'] == 1): ?>
					 <?php if ($this->_tpl_vars['item']['shieldflg']): ?>
					 <a href="javascript:changesecondreply('<?php echo $this->_tpl_vars['item']['replyid']; ?>
');void(0)" id="secondreply<?php echo $this->_tpl_vars['item']['replyid']; ?>
">取消屏蔽</a>
					 <?php else: ?>
					 <a href="javascript:changesecondreply('<?php echo $this->_tpl_vars['item']['replyid']; ?>
');void(0)" id="secondreply<?php echo $this->_tpl_vars['item']['replyid']; ?>
">屏蔽</a>
					 <?php endif; ?>
					 <?php endif; ?>
					 </td>
					 </tr>
				     </table>
			    </td>
			  </tr>
			  <?php endforeach; endif; unset($_from); ?>
  <tr>
    <td class="lk_h">&nbsp;</td>
    <td class="rk_h">&nbsp;</td>
  </tr>
</table>
</div>
<?php endforeach; endif; unset($_from); ?>

</div>




<!--底部-->
<div class="blank10"></div>
<div class="forum_post_new clearfix">
<div class="num">
<DIV class="num_pg">

<script type="text/javascript">
    var pg1 = new showPages('pg1');
	pg1.pageCount = '<?php echo $this->_tpl_vars['pagecount']; ?>
';
	pg1.argName = 'p';
	pg1.printHtml();
</script>
</DIV>
</div>
</div>
<!--底部-->


<!--回复-->
<div class="forum_post_fabu top10" id="position">
<form action="forum_home.php?module=sendreply" method="post" name="sendreply" id="sendreply">
<input type="hidden" name="forumid" value="<?php echo $this->_tpl_vars['oneforum']['ID']; ?>
" id="forumid"/>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top" class="lk">
	<div class="tz_name"><?php echo $this->_tpl_vars['currentuser']['nickname']; ?>
</div>
    <div class="nlk_pic"><img src="./uploadfiles/user/<?php echo $this->_tpl_vars['currentuser']['photo']; ?>
" onerror="this.src='./templates/images/schoolbar/avatar.jpeg'" width="128" height="95"/></div>
	</td>
    <td class="rk">
	
	 <!--发回复-->
	 <div class="edit">
	   <div> <textarea id="editor_id" name="editor_id" style="width:740px;height:358px;"></textarea>
              <span id="limitcontent">你还可以输入8000个字符</span></div>
	   <div class="top15">验证码：<input name="checkfield" id="checkfield" type="text"  class="my_txt_120"/>
	   &nbsp;&nbsp;
	   <img src='forum_home.php?module=checkimg'
	   onclick = "this.src='forum_home.php?module=checkimg&nocache='+Math.random();"
	   alt = "点击更换验证码" />
	   <span id = "checknum"></span>
	  </div>
	   <div class="top15">
	   <input name="" type="button"  class="anniu25" value="回复" 
	   <?php if ($_SESSION['loginok'] == 1): ?> onclick = "checkpic()"
	   <?php else: ?> href="javascript:void(0)" onclick="LoginOut();"<?php endif; ?>/>
	  
       <input name="replyID" id="replyID" type="text" class="anniu25"  value="0" style="display:none"/>
	  </div>
      </div>
     <!--/发回复-->
	
	</td>
  </tr>
</table>
</form>
</div>

<div class="blank10"></div>
<!--/回复-->
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
   
 <div id="message">  
<div style="padding:20px;"> 
<input type="hidden" name="receiver" id="receiver" value=""/>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="ttbb2">
  <tr>
    <td width="18%">标题：</td>
    <td colspan="2"><input type="text" name="messagetitle" id="messagetitle" class="txt_zhuce"/><span id = "checkmessagetitle"></span></td>
    </tr>
  <tr>
    <td>内容：</td>
    <td width="59%"><textarea name="messagecontent" id="messagecontent" style="width:183px"></textarea><span id = "checkmessagecontent"></span></td>
    
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td height="50" colspan="2" valign="bottom"><input type="button" name="login" value="发送"  class="anniu4" onclick="checkmessage();"/>
	&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" name="" value="取消"  class="anniu4" id = "messageclose"/>	
	</td>
    </tr>
</table>
</div>
</div>
  
   
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "barfooter.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
 <script src="./templates/scripts/forum_home.js" type="text/javascript"></script>