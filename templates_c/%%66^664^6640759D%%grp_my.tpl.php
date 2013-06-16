<?php /* Smarty version 2.6.18, created on 2013-06-07 12:20:13
         compiled from group/grp_my.tpl */ ?>
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
     <!--我的圈子-->
   <div class="box">
     <div class="case clearfix">
	   <div class="q_bt">
	     <p class="q_tagtag2">我的圈子</p> 
	     <p class="q_tagtag3">|</p>  
	     <p <?php if ($this->_tpl_vars['mygrp'] == 'in' || $this->_tpl_vars['mygrp'] == null): ?>class="q_tagtag q_on" <?php else: ?>  class="q_tagtag" <?php endif; ?>><a href="grp_home.php?module=my_grp&label=in">我加入的</a></p>  
	     <p class="q_tagtag3">|</p>   
	     <p <?php if ($this->_tpl_vars['mygrp'] == 'create'): ?>class="q_tagtag q_on" <?php else: ?>  class="q_tagtag" <?php endif; ?>><a href="grp_home.php?module=my_grp&label=create">我创建的</a></p>   
	     <p class="q_tagtag3">|</p>  
	     <p <?php if ($this->_tpl_vars['mygrp'] == 'check'): ?>class="q_tagtag q_on" <?php else: ?>  class="q_tagtag" <?php endif; ?>><a href="grp_home.php?module=my_grp&label=check">审核中</a></p>
		 <p class="q_m a666_b"><a href="#" onclick="window.location.href='grp_home.php?module=select'">发现更多圈子...</a></p>
		 <p class="q_n a666_b"><a href="grp_home.php?module=create">创建新圈子</a></p>
	   </div>
   </div>
   <!--我的圈子-->
   
     <div class="blank10"></div>
     
     <?php if ($this->_tpl_vars['mygrp'] == 'in' || $this->_tpl_vars['mygrp'] == null): ?>
     <div class="case2 clearfix" >
	 <div class="q_leibie">
	 <p <?php if ($this->_tpl_vars['type'] == 'interest' || $this->_tpl_vars['type'] == null): ?>class="q_l_sel"<?php else: ?>class="a666_b"<?php endif; ?>><a href="grp_home.php?module=my_grp&label=in&type=interest">兴趣圈</a></p> 
	 <p <?php if ($this->_tpl_vars['type'] == 'school'): ?>class="q_l_sel"<?php else: ?>class="a666_b"<?php endif; ?>><a href="grp_home.php?module=my_grp&label=in&type=school">学校圈</a></p> 
	 <p <?php if ($this->_tpl_vars['type'] == 'club'): ?>class="q_l_sel"<?php else: ?>class="a666_b"<?php endif; ?>><a href="grp_home.php?module=my_grp&label=in&type=club">社团圈</a></p>
	 </div> 
	 </div>
	 
	 <?php elseif ($this->_tpl_vars['mygrp'] == 'create'): ?>
	 
     <div class="case2 clearfix" >
	 <div class="q_leibie">
	 <p <?php if ($this->_tpl_vars['type'] == 'interest' || $this->_tpl_vars['type'] == null): ?>class="q_l_sel"<?php else: ?>class="a666_b"<?php endif; ?>><a href="grp_home.php?module=my_grp&label=create&type=interest">兴趣圈</a></p> 
	 <p <?php if ($this->_tpl_vars['type'] == 'school'): ?>class="q_l_sel"<?php else: ?>class="a666_b"<?php endif; ?>><a href="grp_home.php?module=my_grp&label=create&type=school">学校圈</a></p> 
	 <p <?php if ($this->_tpl_vars['type'] == 'club'): ?>class="q_l_sel"<?php else: ?>class="a666_b"<?php endif; ?>><a href="grp_home.php?module=my_grp&label=create&type=club">社团圈</a></p>
	 </div> 
	 </div>
	 
	 <?php else: ?>
	 
     <div class="case2 clearfix" >
	 <div class="q_leibie">
	 <p <?php if ($this->_tpl_vars['type'] == 'interest' || $this->_tpl_vars['type'] == null): ?>class="q_l_sel"<?php else: ?>class="a666_b"<?php endif; ?>><a href="grp_home.php?module=my_grp&label=check&type=interest">兴趣圈</a></p> 
	 <p <?php if ($this->_tpl_vars['type'] == 'school'): ?>class="q_l_sel"<?php else: ?>class="a666_b"<?php endif; ?>><a href="grp_home.php?module=my_grp&label=check&type=school">学校圈</a></p> 
	 <p <?php if ($this->_tpl_vars['type'] == 'club'): ?>class="q_l_sel"<?php else: ?>class="a666_b"<?php endif; ?>><a href="grp_home.php?module=my_grp&label=check&type=club">社团圈</a></p>
	 </div> 
	 </div>
	 <?php endif; ?>
	 
	 
	 <div class="blank10"></div>
	 <!--圈子 列表-->
	 <div class="case3 my_ll clearfix">
	  <?php $_from = $this->_tpl_vars['rs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
	   <ul class="q_my_list">
	   <a href="grp_single_home.php?ID=<?php echo $this->_tpl_vars['item']['ID']; ?>
"><img src="./uploadfiles/group/groupImage/<?php echo $this->_tpl_vars['item']['photo']; ?>
" border="0" /></a>
	   <dt class="a0693e3"><a href="grp_single_home.php?ID=<?php echo $this->_tpl_vars['item']['ID']; ?>
"><?php echo $this->_tpl_vars['item']['groupname']; ?>
</a></dt>
	   <dd>话题：<?php echo $this->_tpl_vars['item']['topicnum']; ?>
 &nbsp;&nbsp;&nbsp;成员：<?php echo $this->_tpl_vars['item']['membernum']; ?>
</dd>
	   <dd class="a999"><?php echo $this->_tpl_vars['item']['introduction']; ?>
</dd>
	   </ul>
	   <?php endforeach; endif; unset($_from); ?>

	 </div>
	  <!--/圈子 列表-->
	  
	  
	  <div class="blank10"></div>
	  <!--友情链接-->
	  <div class="case clearfix">
	  <div class="q_bt">友情链接</div>
	  <div class="q_click a0693e3">
	  <ul>
	  <li><a href="#">PHP培训</a></li>
	  <li><a href="#">无爱任务热污染</a></li>
	  <li><a href="#">额外热为</a></li>
	  <li><a href="#">额外日哦我让</a></li>
	  <li><a href="#">PHP培训</a></li>
	  <li><a href="#">无爱任务热污染</a></li>
	  <li><a href="#">额外热为</a></li>
	  <li><a href="#">额外日哦我让</a></li>
	  <li><a href="#">PHP培训</a></li>
	  <li><a href="#">无爱任务热污染</a></li>
	  <li><a href="#">额外热为</a></li>
	  <li><a href="#">额外日哦我让</a></li>
	  </ul>
	  <div class="blank15"></div>
	  </div>
	  </div>
	  <!--/友情链接-->
	  <div class="blank10"></div>
   
   </div>
     
   </div>
  

<!------------------------------------------body over-->
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "barfooter.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>