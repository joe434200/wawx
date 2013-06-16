<?php /* Smarty version 2.6.18, created on 2013-06-12 10:43:57
         compiled from user/my_order.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'user/my_order.tpl', 30, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "userheader.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php echo '
<style>
</style>
'; ?>



<div class="my_right clearfix">
   <div class="my_data clearfix">
   <h3>我的订单</h3>
   </div>
   
   <div class="my_order clearfix">
  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="ttbb6">
  <tr><td>&nbsp;</td></tr>

  <tr>
    <th width="5%" align="center" bgcolor="#f7f7f7">NO.</th>
    <th width="7%" align="center" bgcolor="#f7f7f7">&nbsp;</th>
    <th width="23%" align="left" bgcolor="#f7f7f7">订单编号</th>
    <th width="15%" align="center" bgcolor="#f7f7f7">价格</th>
    <th width="14%" align="center" bgcolor="#f7f7f7">购买时间</th>
    <th width="13%" align="center" bgcolor="#f7f7f7">状态</th>
    <th width="23%" align="center" bgcolor="#f7f7f7">操作</th>
  </tr>
  <tr><td>&nbsp;</td></tr>
  </table>
  
  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="ttbb6" id="GetOrder">
  <?php if (count($this->_tpl_vars['info']['info']) != 0): ?>
  <?php $_from = $this->_tpl_vars['info']['info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
	<tr>
    <td width="5%" align="center"><?php echo $this->_tpl_vars['key']+1; ?>
</td>
    <td width="7%" align="center"><img src="./templates/images/schoolbar/10.jpg" width="50" height="50" /></td>
    <td width="23%" class="size12"><a href="#"><?php echo $this->_tpl_vars['item']['orno']; ?>
</a></td>
    <td width="15%" align="center">￥<?php echo $this->_tpl_vars['item']['total']; ?>
</td>
    <td width="14%" align="center"><?php echo $this->_tpl_vars['item']['time']; ?>
</td>
    <td width="13%" align="center"><?php echo $this->_tpl_vars['item']['status']; ?>
</td>
    <?php if ($this->_tpl_vars['item']['status'] == 0): ?>
    <td width="23%" align="center"><a href="javascript:void(0)" onclick="javascript:userCancelOrder('<?php echo $this->_tpl_vars['item']['ID']; ?>
')" title="取消当前的订单">取消订单</a></td>
    <?php elseif ($this->_tpl_vars['item']['status'] == 2): ?>
    <td width="23%" align="center"><a href="javascript:void(0)" onclick="javascript:userConfirmOrder('<?php echo $this->_tpl_vars['item']['ID']; ?>
')" title="向商家申请退货">确认收货</a>&nbsp;<a href="javascript:void(0)" onclick="javascript:userApplyReback('<?php echo $this->_tpl_vars['item']['ID']; ?>
')" title="向商家申请退货">申请退货</a></td>
    <?php else: ?>
    <td width="23%" align="center"><a>无</a></td>
    <?php endif; ?>
   </tr>
   <tr><td>&nbsp;</td></tr>
  <?php endforeach; endif; unset($_from); ?>
  <?php else: ?>
  <tr><td colspan="5">&nbsp;</td></tr>
  <?php endif; ?>
  </table>
    </div>
    
    
    <div class="album_page" id="pageFooter">
   <?php if (count($this->_tpl_vars['info']['info']) != 0): ?>
		<?php if ($this->_tpl_vars['info']['base']['pageCounts'] == '1'): ?>
		<a>1</a>
		<?php else: ?>
		    <?php if ($this->_tpl_vars['info']['base']['page'] == '1'): ?>
		    <a href="javascript:void(0)" class="pageFooterStyle"><strong>上一页</strong></a>
		    <?php else: ?>
		    <a  href="javascript:void(0)" onclick="javascript:AjaxGetUserOrder('<?php echo $this->_tpl_vars['info']['base']['page']-1; ?>
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
		    	&nbsp;<a href="javascript:void(0)" class="pageFooterStyle"><strong><?php echo $this->_sections['loop']['index']+1; ?>
</strong></a>
		    	<?php else: ?>
		    	&nbsp;<a href="javascript:void(0)" onclick="javascript:AjaxGetUserOrder('<?php echo $this->_sections['loop']['index']+1; ?>
')"><?php echo $this->_sections['loop']['index']+1; ?>
</a>
		    	<?php endif; ?>
		    <?php endfor; endif; ?>
			<?php if ($this->_tpl_vars['info']['base']['page'] == $this->_tpl_vars['reply']['base']['pageCounts']): ?>
			&nbsp;<a class="pageFooterStyle"><strong>下一页</strong></a>
			<?php else: ?>
			&nbsp;<a  href="javascript:void(0)" onclick="javascript:AjaxGetUserOrder('<?php echo $this->_tpl_vars['info']['base']['page']+1; ?>
')">下一页</a>
			<?php endif; ?>
		<?php endif; ?>
	<?php endif; ?>
   
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