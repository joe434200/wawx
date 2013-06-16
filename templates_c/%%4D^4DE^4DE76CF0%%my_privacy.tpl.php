<?php /* Smarty version 2.6.18, created on 2013-06-03 18:49:20
         compiled from user/my_privacy.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "userheader.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>



<div class="my_right clearfix">
  
   <div class="my_data_privacy clearfix">
   <h3 class="bottom20">隐私设置</h3>
<form action="UserCenterHandler.php?module=privacy" method="post">
   <table width="100%" border="0" cellspacing="0" cellpadding="0" class="ttbb1 bor_bot4">
  <tr>
    <td width="14%"><strong>基本资料：</strong></td>
    <td width="15%">真实姓名：</td>
    <td width="71%">
      <select name="self[isvisiblename]">
        <option value="0" <?php if ($this->_tpl_vars['self']['isvisiblename'] == '0'): ?>selected<?php endif; ?>>仅自己</option>
      <option value="1" <?php if ($this->_tpl_vars['self']['isvisiblename'] == '1'): ?>selected<?php endif; ?>>仅所有好友</option>
      <option value="2" <?php if ($this->_tpl_vars['self']['isvisiblename'] == '2'): ?>selected<?php endif; ?>>所有人</option>
      </select>
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>出生日期：</td>
    <td><select name="self[isvisiblebirth]">
      <option value="0" <?php if ($this->_tpl_vars['self']['isvisiblebirth'] == '0'): ?>selected<?php endif; ?>>仅自己</option>
      <option value="1" <?php if ($this->_tpl_vars['self']['isvisiblebirth'] == '1'): ?>selected<?php endif; ?>>仅所有好友</option>
      <option value="2" <?php if ($this->_tpl_vars['self']['isvisiblebirth'] == '2'): ?>selected<?php endif; ?>>所有人</option>
    </select></td>
  </tr>
</table>


<table width="100%" border="0" cellspacing="0" cellpadding="0" class="ttbb1 bor_bot4">
  <tr>
    <td width="14%"><strong>联系方式：</strong></td>
    <td width="15%">QQ ：</td>
    <td width="71%">
      <select name="self[isvisibleqq]">
        <option value="0" <?php if ($this->_tpl_vars['self']['isvisibleqq'] == '0'): ?>selected<?php endif; ?>>仅自己</option>
      <option value="1" <?php if ($this->_tpl_vars['self']['isvisibleqq'] == '1'): ?>selected<?php endif; ?>>仅所有好友</option>
      <option value="2" <?php if ($this->_tpl_vars['self']['isvisibleqq'] == '2'): ?>selected<?php endif; ?>>所有人</option>
      </select>
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>手机：</td>
    <td><select name="self[isvisiblemobile]">
      <option value="0" <?php if ($this->_tpl_vars['self']['isvisiblemobile'] == '0'): ?>selected<?php endif; ?>>仅自己</option>
      <option value="1" <?php if ($this->_tpl_vars['self']['isvisiblemobile'] == '1'): ?>selected<?php endif; ?>>仅所有好友</option>
      <option value="2" <?php if ($this->_tpl_vars['self']['isvisiblemobile'] == '2'): ?>selected<?php endif; ?>>所有人</option>
    </select></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>邮箱：</td>
    <td><select name="self[isvisiblemail]">
      <option value="0" <?php if ($this->_tpl_vars['self']['isvisiblemail'] == '0'): ?>selected<?php endif; ?>>仅自己</option>
      <option value="1" <?php if ($this->_tpl_vars['self']['isvisiblemail'] == '1'): ?>selected<?php endif; ?>>仅所有好友</option>
      <option value="2" <?php if ($this->_tpl_vars['self']['isvisiblemail'] == '2'): ?>selected<?php endif; ?>>所有人</option>
    </select></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>现居住地：</td>
    <td><select name="self[isvisibleresid]">
      <option value="0" <?php if ($this->_tpl_vars['self']['isvisibleresid'] == '0'): ?>selected<?php endif; ?>>仅自己</option>
      <option value="1" <?php if ($this->_tpl_vars['self']['isvisibleresid'] == '1'): ?>selected<?php endif; ?>>仅所有好友</option>
      <option value="2" <?php if ($this->_tpl_vars['self']['isvisibleresid'] == '2'): ?>selected<?php endif; ?>>所有人</option>
    </select></td>
  </tr>
</table>


<table width="100%" border="0" cellspacing="0" cellpadding="0" class="ttbb1">
  <tr>
    <td width="14%"><strong>其它：</strong></td>
    <td width="15%"><strong>交友资料：</strong></td>
    <td width="71%">
      <select name="self[isvisiblefriendinfo]">
        <option value="0" <?php if ($this->_tpl_vars['self']['isvisiblefriendinfo'] == '0'): ?>selected<?php endif; ?>>仅自己</option>
      <option value="1" <?php if ($this->_tpl_vars['self']['isvisiblefriendinfo'] == '1'): ?>selected<?php endif; ?>>仅所有好友</option>
      <option value="2" <?php if ($this->_tpl_vars['self']['isvisiblefriendinfo'] == '2'): ?>selected<?php endif; ?>>所有人</option>
      </select>    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><strong>个人兴趣：</strong></td>
    <td><select name="self[isvisibleinst]">
      <option value="0" <?php if ($this->_tpl_vars['self']['isvisibleinst'] == '0'): ?>selected<?php endif; ?>>仅自己</option>
      <option value="1" <?php if ($this->_tpl_vars['self']['isvisibleinst'] == '1'): ?>selected<?php endif; ?>>仅所有好友</option>
      <option value="2" <?php if ($this->_tpl_vars['self']['isvisibleinst'] == '2'): ?>selected<?php endif; ?>>所有人</option>
    </select></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><dl>
      <dt><strong>空间隐私设置：</strong></dt>
    </dl>    </td>
    <td><select name="self[isvisiblespace]">
      <option value="0" <?php if ($this->_tpl_vars['self']['isvisiblespace'] == '0'): ?>selected<?php endif; ?>>仅自己</option>
      <option value="1" <?php if ($this->_tpl_vars['self']['isvisiblespace'] == '1'): ?>selected<?php endif; ?>>仅所有好友</option>
      <option value="2" <?php if ($this->_tpl_vars['self']['isvisiblespace'] == '2'): ?>selected<?php endif; ?>>所有人</option>
    </select></td>
  </tr>
</table>

<table>
<tr>
<td>&nbsp;</td>
</tr>
<tr>
<tr>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td align="right"><p class="top20"><input type="submit" name="button" id="button" value="完成"  class="my_ann1"/></p></td>
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