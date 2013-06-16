<?php /* Smarty version 2.6.18, created on 2013-06-03 20:19:40
         compiled from group/grp_topic.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "barheader.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<!------------------------------------------body-->
<body>
<div class="backbj clearfix">
      <script src="./templates/scripts/group.js" type="text/javascript"></script>
      <script src="./templates/scripts/prototype.js" type="text/javascript"></script>
   <div class="blank10"></div>
   <div class="box2">
  
   <!--标题-->
   <div class="q_b_b clearfix">
     <h3><?php echo $this->_tpl_vars['rs']['main']['groupname']; ?>
</h3>
	 <p class="a999">http://daofuaowuifr.com/299</p>
   </div>
   <!--/标题-->
   <input type="text" id="gID" name="gID" value="<?php echo $this->_tpl_vars['rs']['main']['ID']; ?>
" style="display:none"></input>
   <div class="blank10"></div>
   <!--导航-->
   <div class="case clearfix">
     <ul class="q_l_dh a666_b">
	 <li><a href="grp_single_home.php?ID=<?php echo $this->_tpl_vars['rs']['main']['ID']; ?>
">首页</a></li>
	 <li class="dh_sel"><a href="grp_topic.php?ID=<?php echo $this->_tpl_vars['rs']['main']['ID']; ?>
">话题</a></li>
	 <li><a href="grp_member.php?ID=<?php echo $this->_tpl_vars['rs']['main']['ID']; ?>
">成员</a></li>
	 <li><a href="grp_act.php?ID=<?php echo $this->_tpl_vars['rs']['main']['ID']; ?>
">活动</a></li>
	 <li><a href="grp_photo.php?ID=<?php echo $this->_tpl_vars['rs']['main']['ID']; ?>
">图片</a></li>
	 <li><a href="grp_info.php?ID=<?php echo $this->_tpl_vars['rs']['main']['ID']; ?>
">介绍</a></li>
	 </ul>
   </div>
   
   
   <div class="blank10"></div>
   
   <div class="box2 clearfix">
        <div class="AreaL2 clearfix">
		  <div class="case clearfix">
		  <!--list-->
		     <div class="q_l_list">



			   <div class="q_l_btbt a666_b">
			   <span>
			   <a href="grp_topic.php?ID=<?php echo $this->_tpl_vars['rs']['main']['ID']; ?>
&type=browse">↑按点击</a>&nbsp;&nbsp;<a href="grp_topic.php?ID=<?php echo $this->_tpl_vars['rs']['main']['ID']; ?>
&type=reply">↑按回复</a>&nbsp;&nbsp;
			   <select name="type" id="type" onchange="topictype();">
			    <option value="0">全部</option>
			   <?php $_from = $this->_tpl_vars['topictype']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
			   <option value="<?php echo $this->_tpl_vars['item']['id']; ?>
"  <?php if ($this->_tpl_vars['catalog'] == $this->_tpl_vars['item']['id']): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['item']['name']; ?>
</option>
			   <?php endforeach; endif; unset($_from); ?>
			   </select>
			   </span>
			   话题</div>
			   <div class="blank10"></div>
			   
			   
			   <div class="q_l_li clearfix a666_b">
               <ul>
			     <?php $_from = $this->_tpl_vars['separatedata']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
			     <li>
                 <dl>
                 <dd class="li_x">
                 <img src="./templates/images/schoolbar/<?php echo $this->_tpl_vars['item']['imagename']; ?>
" />
                 </dd>
                 <dd class="li_a">
                 <a href="grp_topic.php?module=scan&ID=<?php echo $this->_tpl_vars['rs']['main']['ID']; ?>
&topicID=<?php echo $this->_tpl_vars['item']['ID']; ?>
">
                 <?php if ($this->_tpl_vars['item']['topflg'] == 1): ?>
                 [顶]
                 <?php endif; ?>
                 <?php echo $this->_tpl_vars['item']['title']; ?>

                 </a>
                 </dd>
                 <dd class="li_b a0693e3"><a href="zone.php?uid=<?php echo $this->_tpl_vars['item']['uID']; ?>
"><?php echo $this->_tpl_vars['item']['nickname']; ?>
</a></dd>
                 <dd class="li_c"><span class="cl_f30"><?php echo $this->_tpl_vars['item']['replynum']; ?>
</span>/<?php echo $this->_tpl_vars['item']['browsenum']; ?>
</dd>
                 <dd class="li_d"><?php echo $this->_tpl_vars['item']['createtime']; ?>
</dd>
                 </dl>
                 </li>
                 <?php endforeach; endif; unset($_from); ?>
               <?php if ($this->_tpl_vars['separatedata'] == null): ?>
               	 亲，圈子还没有帖子，来发第一个帖子吧？
               	<?php endif; ?>
			   </ul>
			   </div>
			   
			 </div>
		  <!--page-->	  
		  <script type="text/javascript">
   		  var pg1 = new showPages('pg1');
		  pg1.pageCount = '<?php echo $this->_tpl_vars['pageMessage']; ?>
';
		  pg1.argName = 'page';
		  pg1.printHtml();
		</script>
		
		<div class="forum_post_new clearfix">
         <?php if ($this->_tpl_vars['checkIn'] == 3): ?>
         <div class="faite"><a href="grp_topic.php?module=new&ID=<?php echo $this->_tpl_vars['rs']['main']['ID']; ?>
"><img src="./templates/images/schoolbar/post5.gif" border="0"/></a></div>
         <?php endif; ?>
		 </div>
	   
		  </div>
		</div>
		
		
		
		<div class="AreaR clearfix">
		
	<!--圈子名片-->		
    <div class="case clearfix">
	<div class="nlk clearfix">
	<div class="nlk_name"><?php echo $this->_tpl_vars['rs']['main']['groupname']; ?>
</div>
    <div class="nlk_pic">
	<?php if ($this->_tpl_vars['rs']['main']['photo'] == ""): ?>
	<img src="./templates/images/schoolbar/def.gif" />
    <?php else: ?>
    <img src="./uploadfiles/group/groupImage/<?php echo $this->_tpl_vars['rs']['main']['photo']; ?>
" />
	<?php endif; ?>
	</div>
	<?php if ($this->_tpl_vars['checkIn'] == 3): ?>
    <?php if ($this->_tpl_vars['rs']['main']['creater'] == $_SESSION['baseinfo']['ID']): ?>
     <div class="nlk_ann afff"><a href="#" onclick="dismiss();">解散该圈子</a></div>
    <?php else: ?>
    <div class="nlk_ann afff"><a href="#" onclick="exit();">退 出 圈 子</a></div>
    <?php endif; ?>
    <?php else: ?>
	<div class="nlk_ann afff"><a href="#" <?php if ($_SESSION['loginok'] == 1): ?>onclick="checkIn();"<?php else: ?>onclick="LoginOut();"<?php endif; ?>>加入该圈子</a></div>
	<?php endif; ?>
	
	<!-- 隐藏文本域传圈子ID -->
	<input type="text" name="grp_ID" id="grp_ID" class="txt_zhuce" value="<?php echo $this->_tpl_vars['rs']['main']['ID']; ?>
" style='display:none'/>
    <div class="nlk_xinxi a666_b">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <th><p><a href="#"><strong><?php echo $this->_tpl_vars['rs']['main']['level']; ?>
级</strong></a></p>
    等级</th>
    <th><p><a href="#"><strong><?php if ($this->_tpl_vars['rs']['main']['topicnum'] == null): ?>0<?php else: ?><?php echo $this->_tpl_vars['rs']['main']['topicnum']; ?>
<?php endif; ?></strong></a></p>
    话题</th>
    <td align="center"><p><a href="#"><strong><?php if ($this->_tpl_vars['rs']['main']['photonum'] == null): ?>0<?php else: ?><?php echo $this->_tpl_vars['rs']['main']['photonum']; ?>
<?php endif; ?></strong></a></p>
    图片</td>
  </tr>
</table>
    </div>
    
    <div class="nlk_xx">
    <ul>
    
    <dd>圈子号：</dd>
    <dt><?php echo $this->_tpl_vars['rs']['main']['ID']; ?>
</dt>
    
    <dd></dd>
    <dd>创建于：</dd>
    <dt><?php echo $this->_tpl_vars['rs']['main']['createtime']; ?>
</dt>
    <dd></dd>
    <dd>创建人：</dd>
    <dt class="a0693e3"><a href="zone.php?uid=<?php echo $this->_tpl_vars['item']['uID']; ?>
"><?php echo $this->_tpl_vars['rs']['main']['nickname']; ?>
</a></dt>
    <dd></dd>
    
    <?php $_from = $this->_tpl_vars['rs']['main']['admin']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
    <dd>管理员<?php echo $this->_tpl_vars['key']+1; ?>
：</dd>
    <dt class="a0693e3">
    <a href="zone.php?uid=<?php echo $this->_tpl_vars['item']['uID']; ?>
"><?php echo $this->_tpl_vars['item']['nickname']; ?>
</a>
    </dt>
    <dd></dd>
    <?php endforeach; endif; unset($_from); ?>


    
	
	

    </ul>
    </div>
    </div>
	</div> 
	<!--/圈子名片-->	
	
	
	<!--最新成员-->	
	<div class="blank10"></div>
	<div class="case clearfix">
	  <div class="q_bt_r2">最新成员</div>
	  <div class="q_newparter clearfix">
	      <ul class="a666_b">
	      <?php $_from = $this->_tpl_vars['rs']['member']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
		  <li><img src="./uploadfiles/user/<?php echo $this->_tpl_vars['item']['tp']; ?>
" /><p><a href="zone.php?uid=<?php echo $this->_tpl_vars['item']['uID']; ?>
"><?php echo $this->_tpl_vars['item']['nickname']; ?>
</a></p></li>
		  <?php endforeach; endif; unset($_from); ?>
		  </ul>
	  </div>
	</div>
	<!--/最新成员-->
	
	
	<!--其他圈子-->	
	<div class="blank10"></div>
	<div class="case clearfix">
	  <div class="q_bt_r2">其他圈子</div>
	  <div class="q_otherparter clearfix">
	      <ul class="a666_b">
		  <?php $_from = $this->_tpl_vars['otherGrp']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
		  <li><img src="./uploadfiles/group/groupImage/<?php echo $this->_tpl_vars['item']['photo']; ?>
" /><p><a href="grp_single_home.php?ID=<?php echo $this->_tpl_vars['item']['ID']; ?>
"><?php echo $this->_tpl_vars['item']['groupname']; ?>
</a></p></li>
		  <?php endforeach; endif; unset($_from); ?>
		  </ul>
	  </div>
	</div>
	<!--/其他圈子-->
	
   </div>
		  
		  
   </div>
   
	  
   <div class="blank10"></div>
   </div>
     
   </div>

<!------------------------------------------body over-->
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "barfooter.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>