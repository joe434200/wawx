<?php /* Smarty version 2.6.18, created on 2013-06-02 16:48:20
         compiled from backstage/city_add.htm */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "pageheader.htm", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="main-div">
<form action="admin_city.php?act=submit" method="post" name="theForm"  >
<input name="why" type="hidden" value=""  id=""/>
<input name="preflg" type="hidden" value="<?php echo $this->_tpl_vars['preflg']; ?>
"/>
  <table width="100%" id="general-table">
    <tr>
      <td  class="label">名称</td>
      <td>
        <input name="data[name]" type="text" id="actname" size="22" value='<?php echo $this->_tpl_vars['data']['name']; ?>
'  /><span class="require-field">*</span>
      </td>
    </tr>

    
    <tr>
      <td  class="label" width="20%">级别</td>
      <td  width="80%">
         <?php $_from = $this->_tpl_vars['levels']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
        <input name="data[level]" type="radio" id="level<?php echo $this->_tpl_vars['key']; ?>
" size="22" value='<?php echo $this->_tpl_vars['key']+1; ?>
'  <?php if ($this->_tpl_vars['data']['level'] == $this->_tpl_vars['key']): ?>checked<?php endif; ?>  onclick="javascript:selectlevel()"/><?php echo $this->_tpl_vars['item']; ?>

        <?php endforeach; endif; unset($_from); ?>
        
      </td>
    </tr>
     
    <tr  id="selectparent"  <?php if ($this->_tpl_vars['data']['level'] != '0' && $this->_tpl_vars['data']['level'] != ''): ?>style="display:block"<?php else: ?>style="display:none"<?php endif; ?>>
      <td  class="label">上级分类</td>
      <td>
        <select name="parent1" id="parent1"  onchange="javascript:ajaxselect(this)"  <?php if ($this->_tpl_vars['data']['level'] != '0' && $this->_tpl_vars['data']['level'] != ''): ?>style="display:block"<?php else: ?> style="display:none;"<?php endif; ?>>
                <option value="" >请选择</option>
                <?php $_from = $this->_tpl_vars['countries']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['index'] => $this->_tpl_vars['item']):
?>
                <option value="<?php echo $this->_tpl_vars['item']['ID']; ?>
" <?php if ($this->_tpl_vars['data']['pid2'] == $this->_tpl_vars['item']['ID'] || $this->_tpl_vars['data']['pid2'] == '99999'): ?>selected <?php endif; ?>><?php echo $this->_tpl_vars['item']['name']; ?>
</option>
                <?php endforeach; endif; unset($_from); ?>
      </select>
       <select name="parent2" id="parent2"  onchange="javascript:ajaxselect(this)" <?php if ($this->_tpl_vars['data']['level'] > 1): ?>style="display:block"<?php else: ?> style="display:none;"<?php endif; ?>>
                <option value="" >请选择</option>
                <?php $_from = $this->_tpl_vars['pdata2']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['index'] => $this->_tpl_vars['item']):
?>
                <option value="<?php echo $this->_tpl_vars['item']['ID']; ?>
" <?php if ($this->_tpl_vars['data']['pid1'] == $this->_tpl_vars['item']['ID']): ?>selected <?php endif; ?>><?php echo $this->_tpl_vars['item']['name']; ?>
</option>
                <?php endforeach; endif; unset($_from); ?>
      </select>
       <select name="parent3" id="parent3"  <?php if ($this->_tpl_vars['data']['level'] > 2): ?>style="display:block"<?php else: ?> style="display:none;"<?php endif; ?>>
                <option value="" >请选择</option>
                <?php $_from = $this->_tpl_vars['pdata3']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['index'] => $this->_tpl_vars['item']):
?>
                <option value="<?php echo $this->_tpl_vars['item']['ID']; ?>
" <?php if ($this->_tpl_vars['data']['pid0'] == $this->_tpl_vars['item']['ID']): ?>selected <?php endif; ?>><?php echo $this->_tpl_vars['item']['name']; ?>
</option>
                <?php endforeach; endif; unset($_from); ?>
      </select>
      </td>
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
<script src="./templates/scripts/backstage/city.js" type="text/javascript"></script>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "pagefooter.htm", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>