<?php /* Smarty version 2.6.18, created on 2013-06-08 09:36:43
         compiled from user/my_dustbin.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'user/my_dustbin.tpl', 46, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "userheader.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<input type="hidden" value="2" id="EmailType"/>
<div class="my_right clearfix">
   <div class="my_data clearfix">
   <table width="100%" border="0" cellspacing="0" cellpadding="0">
   <tr valign="top" class="pic">
  <td>&nbsp;</td>
  </tr>
  <tr>
  <tr>
    <td width="10%"><h3>垃圾箱</h3></td>
    <td width="90%">&nbsp;</td>
   </tr>
   </table>
   </div>
   
   <div class="my_collect_nr">
   <table width="100%" border="0" cellspacing="0" cellpadding="0" class="ttbb6">
   <tr valign="top" class="pic">
  <td>&nbsp;</td>
  </tr>
  <tr>
   <tr>
    <td colspan="6" bgcolor="#eef7ff">
	  
	  <input name="" type="button"  value="删除"  onclick="javascript:AjaxDelMultiBox(1)"/>	  &nbsp;&nbsp;
	  <input name="" type="button"  value="转发" />&nbsp;&nbsp;	  </td>
    </tr>
    <tr valign="top" class="pic">
  <td>&nbsp;</td>
  </tr>
  <tr>
  <tr>
    <th width="4%" align="center" bgcolor="#f7f7f7">&nbsp;</th>
    <th width="12%" align="center" bgcolor="#f7f7f7">收件人</th>
    <th width="27%" align="center" bgcolor="#f7f7f7">内容</th>
    <th width="13%" align="center" bgcolor="#f7f7f7">时间</th>
    <th width="12%" align="center" bgcolor="#f7f7f7">编辑</th>
  </tr>
  <tr valign="top" class="pic">
  <td>&nbsp;</td>
  </tr>
  </table>
  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="ttbb6" id="GetBox">
  <?php if (count($this->_tpl_vars['info']['info']) != 0): ?>
  <?php $_from = $this->_tpl_vars['info']['info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
  <tr>
    <td width="4%" align="center"><input type="checkbox" name="DelBox" value="<?php echo $this->_tpl_vars['item']['ID']; ?>
" /></td>
    <td width="12%" align="center"><?php echo $this->_tpl_vars['item']['name']; ?>
</td>
    <td width="27%" align="center"><?php echo $this->_tpl_vars['item']['content']; ?>
</td>
    <td width="13%" align="center"><?php echo $this->_tpl_vars['item']['createtime']; ?>
</td>
    <td width="12%" align="center"><input name="Input" type="button"  value="删除"  onclick="javascript:AjaxDelBox(3,'<?php echo $this->_tpl_vars['item']['ID']; ?>
')"/></td>
  </tr>
  <tr valign="top" class="pic">
  <td>&nbsp;</td>
  </tr>
  <?php endforeach; endif; unset($_from); ?>
  <?php else: ?>
  <tr><td colspan="5" align="center"><p>发信箱为空</p><td></tr>
  <?php endif; ?>
</table>
   </div>
   <div class="album_page" id="pageFooter">
   <?php if (count($this->_tpl_vars['info']['info']) != 0): ?>
		<?php if ($this->_tpl_vars['info']['base']['pageCounts'] == '1'): ?>
		<a class="pageFooterStyle">1</a>
		<?php else: ?>
		    <?php if ($this->_tpl_vars['info']['base']['page'] == '1'): ?>
		    <a href="javascript:void(0)" class="pageFooterStyle">上一页</a>
		    <?php else: ?>
		    <a  href="javascript:void(0)" onclick="javascript:AjaxGetBox(3,'<?php echo $this->_tpl_vars['info']['base']['page']-1; ?>
')">上一页</a>
		    <?php endif; ?>
		    <?php unset($this->_sections['loop']);
$this->_sections['loop']['name'] = 'loop';
$this->_sections['loop']['loop'] = is_array($_loop=$this->_tpl_vars['info']['base']['pageCounts']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['loop']['show'] = true;
$this->_sections['loop']['max'] = $this->_sections['loop']['loop'];
$this->_sections['loop']['step'] = 1;
$this->_sections['loop']['start'] = $this->_sections['loop']['step'] > 0 ? 0 : $this->_sections['loop']['loop']-1;
if ($this->_sections['loop']['show']) {
    $this->_sections['loop']['total'] = $this->_sections['loop']['loop'];
    if ($this->_sections['loop']['total'] == 0)
        $this->_sections['loop']['show'] = false;
} else
    $this->_sections['loop']['total'] = 0;
if ($this->_sections['loop']['show']):

            for ($this->_sections['loop']['index'] = $this->_sections['loop']['start'], $this->_sections['loop']['iteration'] = 1;
                 $this->_sections['loop']['iteration'] <= $this->_sections['loop']['total'];
                 $this->_sections['loop']['index'] += $this->_sections['loop']['step'], $this->_sections['loop']['iteration']++):
$this->_sections['loop']['rownum'] = $this->_sections['loop']['iteration'];
$this->_sections['loop']['index_prev'] = $this->_sections['loop']['index'] - $this->_sections['loop']['step'];
$this->_sections['loop']['index_next'] = $this->_sections['loop']['index'] + $this->_sections['loop']['step'];
$this->_sections['loop']['first']      = ($this->_sections['loop']['iteration'] == 1);
$this->_sections['loop']['last']       = ($this->_sections['loop']['iteration'] == $this->_sections['loop']['total']);
?>
		    	<?php if ($this->_tpl_vars['info']['base']['page'] == $this->_sections['loop']['index']+1): ?>
		    	&nbsp;<a href="javascript:void(0)" class="pageFooterStyle"><?php echo $this->_sections['loop']['index']+1; ?>
</a>
		    	<?php else: ?>
		    	&nbsp;<a href="javascript:void(0)" onclick="javascript:AjaxGetBox(3,'$smarty.section.loop.index+1}')"><?php echo $this->_sections['loop']['index']+1; ?>
</a>
		    	<?php endif; ?>
		    <?php endfor; endif; ?>
			<?php if ($this->_tpl_vars['info']['base']['page'] == $this->_tpl_vars['reply']['base']['pageCounts']): ?>
			&nbsp;<a class="pageFooterStyle">下一页</a>
			<?php else: ?>
			&nbsp;<a  href="javascript:void(0)" onclick="javascript:AjaxGetBox(3,'<?php echo $this->_tpl_vars['info']['base']['page']+1; ?>
')">下一页</a>
			<?php endif; ?>
		<?php endif; ?>
	<?php endif; ?>
   
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