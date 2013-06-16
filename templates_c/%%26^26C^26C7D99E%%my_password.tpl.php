<?php /* Smarty version 2.6.18, created on 2013-06-08 09:04:31
         compiled from user/my_password.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "userheader.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div class="my_right clearfix">
  
   <div class="my_data_privacy clearfix">
   <h3 class="bottom20">修改密码</h3>
   <form action="UserCenterHandler.php?module=password" method="post" id="modifyForm">
   <table width="100%" border="0" cellspacing="0" cellpadding="0" class="ttbb1">
  <tr>
    <td width="14%">旧密码：</td>
    <td width="86%"><input type="password" name="textfield" id="oldpwd" class="my_txt_350" onblur="javascript:AjaxCheckPwd()" onfocus="javascript:setBlank(this)"/></td>
  </tr>
  <tr> 
    <td>新密码：</td>
    <td><input type="password" name="password" id="newpwd"  class="my_txt_350" onblur="javascript:check_vali_pwd(this)" onfocus="javascript:setBlank(this)"/></td>
  </tr>
  <tr>
    <td>再次输入：</td>
    <td><input type="password" name="textfield2" id="repwd" class="my_txt_350" onblur="javascript:check_vali_repwd(this)" onfocus="javascript:setBlank(this)"/></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><span class="prompt">
      <input type="button" name="button" id="button" value="确认修改"  class="my_ann1" onclick="javascript:checkNewPwd()"/>
    </span></td>
  </tr>
</table>
</form>
   
   </div>
   
   </div>
   
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