<?php /* Smarty version 2.6.18, created on 2013-06-03 20:19:37
         compiled from group/grp_list_act.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "barheader.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<!------------------------------------------body-->
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
	 <li><a href="grp_topic.php?ID=<?php echo $this->_tpl_vars['rs']['main']['ID']; ?>
">话题</a></li>
	 <li><a href="grp_member.php?ID=<?php echo $this->_tpl_vars['rs']['main']['ID']; ?>
">成员</a></li>
	 <li class="dh_sel"><a href="grp_act.php?ID=<?php echo $this->_tpl_vars['rs']['main']['ID']; ?>
">活动</a></li>
	 <li><a href="grp_photo.php?ID=<?php echo $this->_tpl_vars['rs']['main']['ID']; ?>
">图片</a></li>
	 <li><a href="grp_info.php?ID=<?php echo $this->_tpl_vars['rs']['main']['ID']; ?>
">介绍</a></li>
	 </ul>
   </div>
   <!--/导航-->
   
   <div class="blank10"></div>
   
   <div class="box2 clearfix">
        <div class="AreaL2 clearfix">
		  <div class="case clearfix">
		  <!--list-->
		     <div class="q_l_list">

			   <div class="q_l_btbt a666_b">
			   <p class="hd_fqhd">
			   <?php if ($this->_tpl_vars['checkIn'] == 3): ?>	
			   <input type="button"  class="hd_ann3" value="" onClick="window.location.href='hd.php?module=hd_new&grpID=<?php echo $this->_tpl_vars['rs']['main']['ID']; ?>
'"/>
			   	<?php endif; ?>
			   </p>
			   <span><a href="grp_act.php?ID=<?php echo $this->_tpl_vars['rs']['main']['ID']; ?>
&type=attention">↑按关注</a>&nbsp;&nbsp;<a href="grp_act.php?ID=<?php echo $this->_tpl_vars['rs']['main']['ID']; ?>
&type=member">↑按人数</a>&nbsp;&nbsp;
			   <select name="acttype" id="acttype" onchange="acttype();">
			     <option value="0">全部</option>
			     <?php $_from = $this->_tpl_vars['acttype']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
			     <option value="<?php echo $this->_tpl_vars['item']['ID']; ?>
" <?php if ($this->_tpl_vars['catalog'] == $this->_tpl_vars['item']['ID']): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['item']['name']; ?>
</option>
			     <?php endforeach; endif; unset($_from); ?>
			   </select></span>
			   本圈活动</div>
			   <div class="blank10"></div>
			   
			   <!--活动列表-->
			   <div class="hd_activities clearfix">
			     <ul>
			     <?php if ($this->_tpl_vars['separatedata'] == null): ?>
			             亲，圈子还没有活动，快点来发一个吧！
			     <?php else: ?>
			     <?php $_from = $this->_tpl_vars['separatedata']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
				 <li class="clearfix">
				   <div class="pic"><img src="./uploadfiles/activity/hdImage/<?php echo $this->_tpl_vars['item']['photo']; ?>
" /></div>
				   <div class="info">
				       <h3 class="a0693e3_line"><a href="grp_act.php?module=single&ID=<?php echo $this->_tpl_vars['rs']['main']['ID']; ?>
&actID=<?php echo $this->_tpl_vars['item']['ID']; ?>
"><?php echo $this->_tpl_vars['item']['content']; ?>
</a></h3>
					   <p>活动时间：<?php echo $this->_tpl_vars['item']['begintime']; ?>
 - <?php echo $this->_tpl_vars['item']['endtime']; ?>
</p>
					   <p>地点：<?php echo $this->_tpl_vars['item']['place']; ?>
 </p>
					   <p>发起：<em class="a0693e3"><a href="zone.php?uid=<?php echo $this->_tpl_vars['item']['uID']; ?>
"><?php echo $this->_tpl_vars['item']['nickname']; ?>
</a></em></p>
					   <p> <em class="nub1"><?php echo $this->_tpl_vars['item']['attentionnum']; ?>
</em>  人关注&nbsp;&nbsp;&nbsp;<em class="nub2"><?php echo $this->_tpl_vars['item']['membernum']; ?>
</em>  人参加 </p>
				   </div>
				   <div class="tag">
				      <p class="wen">其它</p>
					  <p class="pp">
					  <?php if ($this->_tpl_vars['item']['overflg'] == 0): ?>
					      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;活动已经过期
					  <?php elseif ($this->_tpl_vars['item']['overflg'] == 2): ?>
					  	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;活动尚未开始
					  <?php else: ?>
					  <img src="./templates/images/schoolbar/hd_bj5.gif" />
					  <?php endif; ?></p>
				   </div>
				 </li>
				 <?php endforeach; endif; unset($_from); ?>
				 <?php endif; ?>
				 
				 </ul>
			     </div>
			    <!--/活动列表-->
			   
			   
			 </div>
		  <!--list-->
		  
		  <!--page--> 
	   <!--page-->
	   	  <script type="text/javascript">
   		  var pg1 = new showPages('pg1');
		  pg1.pageCount = '<?php echo $this->_tpl_vars['pageMessage']; ?>
';
		  pg1.argName = 'page';
		  pg1.printHtml();
		</script>
	   <!--/page-->
	   
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
	
	
	
	
	<!--/热门活动-->
			<div class="blank10"></div>
			<div class="case clearfix">
			  <div class="hd_bt_r">热门活动</div>
			  <ul class="hd_love clearfix">
			  <?php $_from = $this->_tpl_vars['hotact']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
			  <li>
			      <a href="3"><img src="./uploadfiles/activity/hdImage/<?php echo $this->_tpl_vars['item']['photo']; ?>
" border="0" /></a>
			      <div class="info">
				  <div class="hd_over">晒照片</div>
			      <p class="bt a0693e3"><a href="#"><?php echo $this->_tpl_vars['item']['actname']; ?>
</a></p>
				  <p><?php echo $this->_tpl_vars['item']['membernum']; ?>
人参加</p>
				  </div>  
			  </li>
			  <?php endforeach; endif; unset($_from); ?>
			  </ul>
			</div>
			<!--/热门活动-->
	
   </div>
   </div>
	  
   <div class="blank10"></div>
   </div>
     
   </div>
  
  
   
  <script type="text/javascript" src="js/q_foot.js"></script>
  
  

</body>
</body>
<!------------------------------------------body over-->
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "barfooter.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>