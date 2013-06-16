<?php /* Smarty version 2.6.18, created on 2013-06-03 20:19:35
         compiled from group/grp_photo.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "barheader.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "uploadify.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php echo '
<script type="text/javascript">
//window.onload=function(){addpars("album","album");}
</script>
'; ?>


<input type="hidden" id="handler_path" value="grp_upload.php?module=group_photo&ID=<?php echo $this->_tpl_vars['rs']['main']['ID']; ?>
"/>
 <script src="./templates/scripts/group.js" type="text/javascript"></script>
 <script src="./templates/scripts/prototype.js" type="text/javascript"></script>
   

<div class="backbj clearfix">
   <div class="blank10"></div>
   <div class="box2">
     
   <!--标题-->
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
	 <li><a href="grp_member.php?ID=<?php echo $this->_tpl_vars['rs']['main']['ID']; ?>
">成员</a></li>
	 <li><a href="grp_act.php?ID=<?php echo $this->_tpl_vars['rs']['main']['ID']; ?>
">活动</a></li>
	 <li class="dh_sel"><a href="grp_photo.php?ID=<?php echo $this->_tpl_vars['rs']['main']['ID']; ?>
">图片</a></li>
	 <li><a href="grp_info.php?ID=<?php echo $this->_tpl_vars['rs']['main']['ID']; ?>
">介绍</a></li>
	 </ul>
   </div>
   <!--/导航-->
   
		<input  name="" id="album" style="display:none">
   <div class="blank10"></div>
   
   <div class="box2 clearfix"> 
   
      <div class="q_l_btbig a666_b"><span>(共有<?php echo $this->_tpl_vars['rs']['main']['photonum']; ?>
张照片)</span>图片
     
      </div>
	      <div class="case clearfix">
		  
		  <div class="AreaL2 clearfix">
		  <div class="q_list_pic clearfix">
	         <ul>
	         <?php $_from = $this->_tpl_vars['separatedata']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
			 <li><a href="grp_photo.php?ID=<?php echo $this->_tpl_vars['rs']['main']['ID']; ?>
&photoID=<?php echo $this->_tpl_vars['item']['ID']; ?>
&key1=<?php echo $this->_tpl_vars['key']+1; ?>
&key2=<?php echo $this->_tpl_vars['nowpage']; ?>
"><img src="./uploadfiles/group/<?php echo $this->_tpl_vars['rs']['main']['ID']; ?>
/group_photo/<?php echo $this->_tpl_vars['item']['realname']; ?>
" border="0" /></a></li>
			 <?php endforeach; endif; unset($_from); ?>
			 </ul>
			 <?php if ($this->_tpl_vars['separatedata'] == null): ?>
               	 亲，圈子还没有图片，来上传第一张图片吧？
             <?php endif; ?>
	      </div>
		  <!--page-->
	  <!--page-->
	   <?php if ($this->_tpl_vars['checkIn'] == 3): ?>
	   <input name="" type="button"  class="hd_jj_ann" value="" id="J_selectImage"/>
	   <?php endif; ?>
	   	  <script type="text/javascript">
   		  var pg1 = new showPages('pg1');
		  pg1.pageCount = '<?php echo $this->_tpl_vars['pageMessage']; ?>
';
		  pg1.argName = 'page';
		  pg1.printHtml();
		</script>
	 </div>
	      
		  
		  <div class="AreaR clearfix">
		  <div class="q_list_pic_show_pl">
		  <h3>图片最新评论</h3>
		  <ul>
		<?php $_from = $this->_tpl_vars['newReply']['reply']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
		  <li>
		  <p class="ava"><span class="a0693e3"><a href="zone.php?uid=<?php echo $this->_tpl_vars['item']['uID']; ?>
"><?php echo $this->_tpl_vars['item']['nickname']; ?>
</a></span> 评论 </p>
		  <p class="a0693e3"><a href="grp_photo.php?ID=<?php echo $this->_tpl_vars['rs']['main']['ID']; ?>
&photoID=<?php echo $this->_tpl_vars['item']['pID']; ?>
"><?php echo $this->_tpl_vars['item']['realname']; ?>
</a></p>
		  <p><?php echo $this->_tpl_vars['item']['content']; ?>
</p>
		  </li>
		  <?php endforeach; endif; unset($_from); ?>
		  
		  </ul>
		  </div>
		  
		  
	      </div>
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