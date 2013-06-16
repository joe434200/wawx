<?php /* Smarty version 2.6.18, created on 2013-06-08 15:48:21
         compiled from group/grp_single_home.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "barheader.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<!------------------------------------------body-->
   <script src="./templates/scripts/group.js" type="text/javascript"></script>
   <script src="./templates/scripts/prototype.js" type="text/javascript"></script>
<div class="backbj clearfix">
   
<script src="./templates/scripts/group.js" type="text/javascript"></script>
  
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
	 <li class="dh_sel"><a href="grp_single_home.php?ID=<?php echo $this->_tpl_vars['rs']['main']['ID']; ?>
">首页</a></li>
	 <li><a href="grp_topic.php?ID=<?php echo $this->_tpl_vars['rs']['main']['ID']; ?>
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
   <!--/导航-->
   
   
   <div class="blank10"></div>
   
   <div class="box2 clearfix">
        <div class="AreaL2 clearfix">
		  <div class="case clearfix">
		  
		     <div class="q_l_list">
			 <!--标题 公告-->
			   <div class="q_l_bt">
			     <h3>本社团公告</h3>
			     <?php if ($this->_tpl_vars['rs']['main']['notice'] != null): ?>
				 <p><?php echo $this->_tpl_vars['rs']['main']['notice']; ?>
</p>
				 <?php else: ?>
				 <p>本圈暂时没有公告</p>
				 <?php endif; ?>
			   </div>
			   <div class="blank10"></div>
			   <div class="q_l_btbt">本圈子热门话题</div>
			   <div class="blank10"></div>
			   <!--/标题 公告-->
			   
			   
			   <!--list-->
			   <div class="q_l_li clearfix a666_b">
               <ul>
               <?php $_from = $this->_tpl_vars['rs']['topic']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
			     <li>
                 <dl>
                 <dd class="li_x">
                 <img src="./templates/images/schoolbar/<?php echo $this->_tpl_vars['item']['imagename']; ?>
" />
                 </dd>
                 <dd class="li_a"><a href="grp_topic.php?module=scan&topicID=<?php echo $this->_tpl_vars['item']['ID']; ?>
&ID=<?php echo $this->_tpl_vars['rs']['main']['ID']; ?>
">
                 <?php if ($this->_tpl_vars['item']['topflg'] == 1): ?>
                 [顶]
                 <?php endif; ?>
                 <?php echo $this->_tpl_vars['item']['title']; ?>

                 </a></dd>
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
			   </ul>
			   </div>
			   <!--list-->
			   
			   <div class="blank10"></div>
			   <div class="q_more"><a href="grp_topic.php?ID=<?php echo $this->_tpl_vars['rs']['main']['ID']; ?>
">更多本圈话题</a></div>

			 </div>
			 
			 
			 			   
			   
			   
			   <!--更多图片-->
				
			   <div class="q_l_list"> <div class="q_l_btbt">本圈图片</div></div>
			   <div class="q_l_list_pic">
			   <ul>
			   <?php $_from = $this->_tpl_vars['rs']['photo']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
			   <li><a href="grp_photo.php?ID=<?php echo $this->_tpl_vars['rs']['main']['ID']; ?>
&photoID=<?php echo $this->_tpl_vars['item']['ID']; ?>
&key=<?php echo $this->_tpl_vars['key']+1; ?>
" ><img src="./uploadfiles/group/<?php echo $this->_tpl_vars['rs']['main']['ID']; ?>
/group_photo/<?php echo $this->_tpl_vars['item']['realname']; ?>
" border="0" /></a></li>
			   <?php endforeach; endif; unset($_from); ?>
			   </ul>
               <div class="blank5"></div>
			   <div class="q_l_list"><div class="q_more"><a href="grp_photo.php?ID=<?php echo $this->_tpl_vars['rs']['main']['ID']; ?>
">更多本圈图片</a></div></div>
			   </div>
 
              <!--/更多图片-->

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
	<div class="nlk_ann afff"><a href="#" 
	<?php if ($_SESSION['loginok'] == 1): ?>onclick="checkIn();"<?php else: ?>onclick="LoginOut();"<?php endif; ?>>加入该圈子</a></div>
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
    <th><p><a href="grp_topic.php?ID=<?php echo $this->_tpl_vars['rs']['main']['ID']; ?>
"><strong><?php if ($this->_tpl_vars['rs']['main']['topicnum'] == null): ?>0<?php else: ?><?php echo $this->_tpl_vars['rs']['main']['topicnum']; ?>
<?php endif; ?></strong></a></p>
    话题</th>
    <td align="center"><p><a href="grp_photo.php?ID=<?php echo $this->_tpl_vars['rs']['main']['ID']; ?>
"><strong><?php if ($this->_tpl_vars['rs']['main']['photonum'] == null): ?>0<?php else: ?><?php echo $this->_tpl_vars['rs']['main']['photonum']; ?>
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
    <?php if ($this->_tpl_vars['rs']['main']['nickname'] != ""): ?>
    <dt class="a0693e3"><a href="zone.php?uid=<?php echo $this->_tpl_vars['item']['uID']; ?>
"><?php echo $this->_tpl_vars['rs']['main']['nickname']; ?>
</a></dt>
    <?php else: ?>
    <dt class="a0693e3"><a href="#"><?php echo $this->_tpl_vars['rs']['main']['email']; ?>
</a></dt>
    <?php endif; ?>
    <dd></dd>
   
    <?php $_from = $this->_tpl_vars['rs']['main']['admin']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
     <dd>管理员：</dd>
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
		  <li>
		  <img src="./uploadfiles/user/<?php echo $this->_tpl_vars['item']['tp']; ?>
" /><p>
		  <a href="zone.php?uid=<?php echo $this->_tpl_vars['item']['uID']; ?>
">
		  <?php echo $this->_tpl_vars['item']['nickname']; ?>

		  </a>
		  </p></li>
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