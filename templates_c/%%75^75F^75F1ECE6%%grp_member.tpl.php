<?php /* Smarty version 2.6.18, created on 2013-06-03 20:19:39
         compiled from group/grp_member.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "barheader.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<!------------------------------------------body-->
   <script src="./templates/scripts/group.js" type="text/javascript"></script>
   <script src="./templates/scripts/prototype.js" type="text/javascript"></script>
<div class="backbj clearfix">
   
   <div class="blank10"></div>
   <div class="box2">
     
   <!--标题-->
   <div class="q_b_b clearfix">
     <h3><?php echo $this->_tpl_vars['rs']['main']['groupname']; ?>
</h3>
	 <p class="a999">http://daofuaowuifr.com/299</p>
   </div>
   <!--/标题-->
   
   
   <div class="blank10"></div>
   <!--导航-->
   <div class="case clearfix">
     <ul class="q_l_dh a666_b">
	 <li><a href="grp_single_home.php?ID=<?php echo $this->_tpl_vars['rs']['main']['ID']; ?>
">首页</a></li>
	 <li><a href="grp_topic.php?ID=<?php echo $this->_tpl_vars['rs']['main']['ID']; ?>
">话题</a></li>
	 <li class="dh_sel"><a href="grp_member.php?ID=<?php echo $this->_tpl_vars['rs']['main']['ID']; ?>
">成员</a></li>
	 <li><a href="grp_act.php?ID=<?php echo $this->_tpl_vars['rs']['main']['ID']; ?>
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
      <div class="q_l_btbig a666_b"><span>(共有位<?php echo $this->_tpl_vars['rs']['main']['membernum']; ?>
成员)</span>成员</div>
	  
	  <div class="case clearfix">

	      <div class="q_partner clearfix">
	         <ul>
	         <?php $_from = $this->_tpl_vars['separatedata']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
			 <li>
			     <dt><a href="#"><img src="./uploadfiles/user/<?php echo $this->_tpl_vars['item']['tp']; ?>
" border="0" /></a></dt>
		         <dd>
				 <p class="bt a0693e3">
				 <?php if ($this->_tpl_vars['item']['nickname'] != ""): ?>
				 <a href="zone.php?uid=<?php echo $this->_tpl_vars['item']['uID']; ?>
"><?php echo $this->_tpl_vars['item']['nickname']; ?>
</a> 
				 <?php else: ?>
				 <a href="zone.php?uid=<?php echo $this->_tpl_vars['item']['uID']; ?>
"> <?php echo $this->_tpl_vars['item']['email']; ?>
</a>
				 <?php endif; ?>&nbsp;<span class="a999"><?php if ($this->_tpl_vars['item']['sex'] == 1): ?>男<?php else: ?>女<?php endif; ?></span>
				 &nbsp;
				 <?php if ($this->_tpl_vars['item']['auditflg'] == 1): ?>
				 
					 <?php if (( $_SESSION['baseinfo']['ID'] == $this->_tpl_vars['admin']['creater'] ) && ( $_SESSION['loginok'] == 1 )): ?>
						 <?php if (( $this->_tpl_vars['item']['idt_user'] == $this->_tpl_vars['admin']['admin1'] ) || ( $this->_tpl_vars['item']['idt_user'] == $this->_tpl_vars['admin']['admin2'] ) || ( $this->_tpl_vars['item']['idt_user'] == $this->_tpl_vars['admin']['admin3'] )): ?>
						 <a href="#" onclick="memberReplyDel('removeAdmin','<?php echo $this->_tpl_vars['rs']['main']['ID']; ?>
','<?php echo $this->_tpl_vars['item']['idt_user']; ?>
')"><img src="./templates/images/schoolbar/removeAdmin.jpg"  title="撤销管理员"></a>
						 <a href="#" onclick="memberReplyDel('exitMember','<?php echo $this->_tpl_vars['rs']['main']['ID']; ?>
','<?php echo $this->_tpl_vars['item']['idt_user']; ?>
')"><img src="./templates/images/schoolbar/removeMember.jpg"  title="移出本圈" ></a>
						 <?php elseif ($this->_tpl_vars['item']['idt_user'] == $this->_tpl_vars['admin']['creater']): ?>
						 <?php else: ?>
						 <a href="#" onclick="memberReplyDel('setAdmin','<?php echo $this->_tpl_vars['rs']['main']['ID']; ?>
','<?php echo $this->_tpl_vars['item']['idt_user']; ?>
')"><img src="./templates/images/schoolbar/setAdmin.jpg"  title="任命管理员" ></a>
						 <a href="#" onclick="memberReplyDel('exitMember','<?php echo $this->_tpl_vars['rs']['main']['ID']; ?>
','<?php echo $this->_tpl_vars['item']['idt_user']; ?>
')"><img src="./templates/images/schoolbar/removeMember.jpg"  title="移出本圈"></a>
						 <?php endif; ?>
					 <?php elseif (( ( $_SESSION['baseinfo']['ID'] == $this->_tpl_vars['admin']['admin1'] ) || ( $_SESSION['baseinfo']['ID'] == $this->_tpl_vars['admin']['admin2'] ) || ( $_SESSION['baseinfo']['ID'] == $this->_tpl_vars['admin']['admin3'] ) ) && ( $_SESSION['loginok'] == 1 )): ?>
					 	<?php if (( $this->_tpl_vars['item']['idt_user'] == $this->_tpl_vars['admin']['creater'] ) || ( $this->_tpl_vars['item']['idt_user'] == $this->_tpl_vars['admin']['admin1'] ) || ( $this->_tpl_vars['item']['idt_user'] == $this->_tpl_vars['admin']['admin2'] ) || ( $this->_tpl_vars['item']['idt_user'] == $this->_tpl_vars['admin']['admin3'] )): ?>
					 	<?php else: ?>
					 	 	<a href="#" onclick="memberReplyDel('exitMember','<?php echo $this->_tpl_vars['rs']['main']['ID']; ?>
','<?php echo $this->_tpl_vars['item']['idt_user']; ?>
')"><img src="./templates/images/schoolbar/removeMember.jpg"  title="移出本圈" ></a>
					 	<?php endif; ?>
					 <?php endif; ?>
				 <?php else: ?>
				 	 <?php if (( ( $_SESSION['baseinfo']['ID'] == $this->_tpl_vars['admin']['admin1'] ) || ( $_SESSION['baseinfo']['ID'] == $this->_tpl_vars['admin']['admin2'] ) || ( $_SESSION['baseinfo']['ID'] == $this->_tpl_vars['admin']['admin3'] ) || ( $_SESSION['baseinfo']['ID'] == $this->_tpl_vars['admin']['creater'] ) ) && ( $_SESSION['loginok'] == 1 )): ?>
				 	 <a href="#" onclick="memberReplyDel('joinMember','<?php echo $this->_tpl_vars['rs']['main']['ID']; ?>
','<?php echo $this->_tpl_vars['item']['idt_user']; ?>
')"><img src="./templates/images/schoolbar/joinMember.jpg"  title="加入本圈" ></a>
				 	 <?php else: ?>
				 	  等待管理员审核
				 	 <?php endif; ?>
				 <?php endif; ?>
				 </p>
				 <p class="a666_b"><a href="#"><?php echo $this->_tpl_vars['item']['schoolname']; ?>
</a><br/><?php echo $this->_tpl_vars['item']['department']; ?>
</p>
				 <?php if ($_SESSION['baseinfo']['ID'] != null && $_SESSION['baseinfo']['ID'] != $this->_tpl_vars['item']['uID']): ?>
				 <p class="btton"><input type="button" 
				 <?php if ($this->_tpl_vars['item']['attentionflg'] == 1): ?>
				 value="关注"
				 <?php elseif ($this->_tpl_vars['item']['attentionflg'] == 2): ?>
				  value="已关注" disabled = "disabled"
				 <?php endif; ?>
				 class="q_p_an" onclick="takeCall('attention','<?php echo $this->_tpl_vars['item']['uID']; ?>
','<?php echo $this->_tpl_vars['item']['nickname']; ?>
');"/>
				 &nbsp;&nbsp;&nbsp;<input name="" type="button" value="打招呼" class="q_p_an" onclick="takeCall('hello','<?php echo $this->_tpl_vars['item']['uID']; ?>
','<?php echo $this->_tpl_vars['item']['nickname']; ?>
');"/></p>
				 
				 <?php endif; ?>
				 </dd>
			 </li>
			 <?php endforeach; endif; unset($_from); ?>
			 </ul>
	      </div>
		  
		  <input id="attflg" name="attflg" value="" style="display:none"/>
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
	  
   <div class="blank10"></div>
   </div>
     
   </div>
<!------------------------------------------body over-->
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "barfooter.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>