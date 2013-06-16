<?php /* Smarty version 2.6.18, created on 2013-06-03 18:49:19
         compiled from user/my_avatar_set.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "userheader.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php echo '
'; ?>

<div class="my_right clearfix">
  
   <div class="my_data_avatar clearfix">
   
   <form id="uploadFrom" action="my_avatar_set.php?module=submit" method="post" target="yframe" enctype="multipart/form-data">
   <h3>上传头像</h3>
   <div class="my_upper top20">
   <iframe name="yframe" src="my_avatar_set.php" style="border:none;width:220px;height:220px;" frameborder="0" scrolling="no"></iframe>  
   </div>
   <p class="top20">
   <input type="file" style="display:none;" id="picPath" name="tValue" onchange="javascript:uploadSubmit();">
   <input type="button" value="上传真实头像"  class="my_ann1" onclick="F_Open_dialog()" align="right"/>
   </p>
   </form>
   </div>
   </div>
    
   <!-- 
   <form id="content" action="hello.php" method="post" target="yframe" enctype="multipart/form-data">
  <input type="file" name="tValue">
  <input type="submit" value="submit">
  <iframe name="yframe" src="hello.php" style="border:none;"></iframe>
  </form>
   -->
   </div>
   </div>
   </div>
   
   
   <div class="blank10"></div>
   </div>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "barfooter.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>