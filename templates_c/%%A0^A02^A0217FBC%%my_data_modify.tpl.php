<?php /* Smarty version 2.6.18, created on 2013-06-08 09:04:26
         compiled from user/my_data_modify.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "userheader.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


<div class="my_right clearfix">
   
   <div class="my_data clearfix">
   <ul class="my_data_tag">
   <li class="sel"><a href="userCenter.php?module=dataModify">基本资料</a></li>
   <li><a href="userCenter.php?module=dataFriend">交友资料</a></li>
   <li><a href="userCenter.php?module=dataHobby">兴趣爱好</a></li>
   </ul>
   
   <div class="my_jindu_x">
   <h3>资料完善度</h3>
   <div class="my_jindu">
   <p class="bar" style="width:60px;"></p>
   </div>
   <h3>30%</h3>
   </div>
   
   </div>
   
   
   <div class="my_data_tb clearfix">
   <form action="UserCenterHandler.php?module=dataModify" method="post">
   <table width="100%" border="0" cellspacing="0" cellpadding="0" class="ttbb1">
  <tr>
    <td width="8%">性别：</td>
    <td width="38%"><?php if ($this->_tpl_vars['self']['sex'] == '0'): ?>女<?php else: ?>男<?php endif; ?></td>
    <td width="54%">&nbsp;</td>
  </tr>
  <tr>
    <td>学校： </td>
    <td><?php if ($this->_tpl_vars['self']['schoolname'] != ""): ?><?php echo $this->_tpl_vars['self']['schoolname']; ?>
<?php else: ?>尚未填写<?php endif; ?> </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>身高： </td>
    <td><input type="text" name="self[height]" id="textfield"  class="my_txt_80" value="<?php echo $this->_tpl_vars['self']['height']; ?>
"/>cm</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>体重：</td>
    <td><input type="text" name="self[weight]" id="textfield2"  class="my_txt_80" value="<?php echo $this->_tpl_vars['self']['weight']; ?>
"/>kg</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>民族： </td>
    <td><select name="self[nation]" id="select">
      <option value="1" <?php if ($this->_tpl_vars['self']['nation'] == '1'): ?>selected<?php endif; ?>>汉族</option>
      <option value="2" <?php if ($this->_tpl_vars['self']['nation'] == '2'): ?>selected<?php endif; ?>>少数民族</option>
      </select></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>血型：</td>
    <td><select name="self[bloodtype]" id="select2">
      <option value="A" <?php if ($this->_tpl_vars['self']['bloodtype'] == 'A'): ?>selected<?php endif; ?>>A</option>
      <option value="B" <?php if ($this->_tpl_vars['self']['bloodtype'] == 'B'): ?>selected<?php endif; ?>>B</option>
      <option value="O" <?php if ($this->_tpl_vars['self']['bloodtype'] == 'C'): ?>selected<?php endif; ?>>O</option>
      <option value="AB" <?php if ($this->_tpl_vars['self']['bloodtype'] == 'AB'): ?>selected<?php endif; ?>>AB</option>
    </select></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>生日： </td>
    <td><input type="text" name="self[birthdate]" id="textfield3"  class="my_txt_120" value="<?php echo $this->_tpl_vars['self']['birthdate']; ?>
"/></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>星座：</td>
    <td>
    <select name="self[constellation]" id="select">
      <option value="1" <?php if ($this->_tpl_vars['self']['constellation'] == '1'): ?>selected<?php endif; ?>>白羊座</option>
      <option value="2" <?php if ($this->_tpl_vars['self']['constellation'] == '2'): ?>selected<?php endif; ?>>金牛座</option>
      <option value="3" <?php if ($this->_tpl_vars['self']['constellation'] == '3'): ?>selected<?php endif; ?>>双子座</option>
      <option value="4" <?php if ($this->_tpl_vars['self']['constellation'] == '4'): ?>selected<?php endif; ?>>巨蟹座</option>
      <option value="5" <?php if ($this->_tpl_vars['self']['constellation'] == '5'): ?>selected<?php endif; ?>>狮子座</option>
      <option value="6" <?php if ($this->_tpl_vars['self']['constellation'] == '6'): ?>selected<?php endif; ?>>处女座</option>
      <option value="7" <?php if ($this->_tpl_vars['self']['constellation'] == '7'): ?>selected<?php endif; ?>>天秤座</option>
      <option value="8" <?php if ($this->_tpl_vars['self']['constellation'] == '8'): ?>selected<?php endif; ?>>天蝎座</option>
      <option value="9" <?php if ($this->_tpl_vars['self']['constellation'] == '9'): ?>selected<?php endif; ?>>人马座</option>
      <option value="10" <?php if ($this->_tpl_vars['self']['constellation'] == '10'): ?>selected<?php endif; ?>>魔蝎座</option>
      <option value="11" <?php if ($this->_tpl_vars['self']['constellation'] == '11'): ?>selected<?php endif; ?>>水瓶座</option>
      <option value="12" <?php if ($this->_tpl_vars['self']['constellation'] == '12'): ?>selected<?php endif; ?>>双鱼座</option>     
      </select>
    </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>家乡：</td>
    <td><select name="select3" id="select3">
      <option value="1">辽宁</option>
    </select>
      <select name="select4" id="select4">
        <option value="1">大连</option>
      </select></td>
    <td>&nbsp;</td>
  </tr>
</table>
<p class="prompt">以下信息为隐私保护信息，当你不公开时其他用户不可见 </p>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="ttbb1">
  <tr>
    <td width="8%">地址：</td>
    <td width="64%"><input type="text" name="self[residence]" id="textfield5"  class="my_txt_350" value="<?php echo $this->_tpl_vars['self']['residence']; ?>
"/></td>
    <td width="28%">&nbsp;</td>
  </tr>
  <tr>
    <td>QQ： </td>
    <td><input type="text" name="self[qqnumber]" id="textfield6"  class="my_txt_350" value="<?php echo $this->_tpl_vars['self']['qqnumber']; ?>
"/></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>邮箱：</td>
    <td><input type="text" name="self[email]" id="textfield7"  class="my_txt_350" value="<?php echo $this->_tpl_vars['self']['email']; ?>
"/></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>手机： </td>
    <td><input type="text" name="self[bindmobile]" id="textfield8"  class="my_txt_350" value="<?php echo $this->_tpl_vars['self']['bindmobile']; ?>
"/></td>
    <td>&nbsp;</td>
  </tr>
</table>
<p class="top20"><input type="submit" name="button" id="button" value="保存进入下一步"  class="my_ann1"/></p>
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