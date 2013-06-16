<?php /* Smarty version 2.6.18, created on 2013-06-02 16:56:55
         compiled from backstage/school_add.htm */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "pageheader.htm", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="main-div">
<form action="admin_school.php?act=submit" method="post" name="theForm"  ">
<input name="why" type="hidden" value=""  id=""/>
  <table width="100%" id="general-table">
    <tr>
      <td  class="label">学校名称</td>
      <td>
        <input name="data[schoolname]" type="text" id="schoolname" size="22" value='<?php echo $this->_tpl_vars['data']['schoolname']; ?>
'  /><span class="require-field">*</span>
      </td>
    </tr>

    
    <tr>
      <td  class="label" width="20%">所在国家</td>
      <td  width="80%">
         <select name="data[idm_city4]" id="idm_city0"  onchange="javascript:ajaxselect(this)"  >
                <option value="" >请选择</option>
                <?php $_from = $this->_tpl_vars['countrylist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['index'] => $this->_tpl_vars['item']):
?>
                <option value="<?php echo $this->_tpl_vars['item']['ID']; ?>
" <?php if ($this->_tpl_vars['data']['idm_city4'] == $this->_tpl_vars['item']['ID']): ?>selected <?php endif; ?>><?php echo $this->_tpl_vars['item']['name']; ?>
</option>
                <?php endforeach; endif; unset($_from); ?>
      </select>
      <a href="admin_city.php?act=add&pre=1" title="增加国家"><img src="./templates/images/backstage/icon_add.gif" border="0" height="16" width="16" /></a>
      
        
      </td>
    </tr>
    
    <tr>
      <td  class="label" width="20%">所在省份/直辖市</td>
      <td  width="80%">
         <select name="data[idm_city1]" id="idm_city1"  onchange="javascript:ajaxselect(this)"  >
                <option value="" >请选择</option>
                <?php $_from = $this->_tpl_vars['provincelist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['index'] => $this->_tpl_vars['item']):
?>
                <option value="<?php echo $this->_tpl_vars['item']['ID']; ?>
" <?php if ($this->_tpl_vars['data']['idm_city1'] == $this->_tpl_vars['item']['ID']): ?>selected <?php endif; ?>><?php echo $this->_tpl_vars['item']['name']; ?>
</option>
                <?php endforeach; endif; unset($_from); ?>
      </select>
         <a href="admin_city.php?act=add&pre=1" title="增加省/直辖市"><img src="./templates/images/backstage/icon_add.gif" border="0" height="16" width="16" /></a>
      </td>
    </tr>
    
    <tr>
      <td  class="label" width="20%">所在市</td>
      <td  width="80%">
         <select name="data[idm_city2]" id="idm_city2"  onchange="javascript:ajaxselect(this)"  >
                <option value="" >请选择</option>
                <?php $_from = $this->_tpl_vars['citylist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['index'] => $this->_tpl_vars['item']):
?>
                <option value="<?php echo $this->_tpl_vars['item']['ID']; ?>
" <?php if ($this->_tpl_vars['data']['idm_city2'] == $this->_tpl_vars['item']['ID']): ?>selected <?php endif; ?>><?php echo $this->_tpl_vars['item']['name']; ?>
</option>
                <?php endforeach; endif; unset($_from); ?>
      </select>
         <a href="admin_city.php?act=add&pre=1" title="增加城市"><img src="./templates/images/backstage/icon_add.gif" border="0" height="16" width="16" /></a>
      </td>
    </tr>
    
    <tr>
      <td  class="label" width="20%">所在区/县</td>
      <td  width="80%">
         <select name="data[idm_city3]" id="idm_city3"  onchange="javascript:ajaxselect(this)"  >
                <option value="" >请选择</option>
                <?php $_from = $this->_tpl_vars['skirtlist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['index'] => $this->_tpl_vars['item']):
?>
                <option value="<?php echo $this->_tpl_vars['item']['ID']; ?>
" <?php if ($this->_tpl_vars['data']['idm_city3'] == $this->_tpl_vars['item']['ID']): ?>selected <?php endif; ?>><?php echo $this->_tpl_vars['item']['name']; ?>
</option>
                <?php endforeach; endif; unset($_from); ?>
      </select>
         <a href="admin_city.php?act=add&pre=1" title="区/县"><img src="./templates/images/backstage/icon_add.gif" border="0" height="16" width="16" /></a>
      </td>
    </tr>
     
     <tr>
        <td class="label">学校地址</td>
        <td><textarea name="data[schooladdr ]" id="schooladdr"  cols="50" rows="5"><?php echo $this->_tpl_vars['data']['schooladdr']; ?>
</textarea><span class="require-field">*</span></td>
      </tr>
    
    <tr>
        <td class="label">说明</td>
        <td><textarea name="data[introduction ]" cols="50" rows="5"><?php echo $this->_tpl_vars['data']['introduction']; ?>
</textarea></td>
      </tr>
      
    
    <tr>
       <td class="label">&nbsp;</td>
       <td>
       <input name="id" type="hidden" value="<?php echo $this->_tpl_vars['data']['ID']; ?>
"  id="id"/>
        <input type="button" value=" 确定 " class="button" onclick="javascript:checksubmit();"/>
        <input type="reset" value=" 重置 " class="button" />
       
      </td>
      
    </tr>

    
 </table>
 
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "warning.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</form>
</div>
<script src="./templates/scripts/backstage/school.js" type="text/javascript"></script>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "pagefooter.htm", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>