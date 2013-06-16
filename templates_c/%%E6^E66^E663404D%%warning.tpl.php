<?php /* Smarty version 2.6.18, created on 2013-06-02 16:36:54
         compiled from warning.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'warning.tpl', 1, false),)), $this); ?>
<div id="advice_error" class="<?php if ($this->_tpl_vars['message']): ?>success<?php else: ?>error<?php endif; ?>" <?php if (count($this->_tpl_vars['array']) != 0): ?> style="display:block"<?php endif; ?>>
  <?php if (count($this->_tpl_vars['array']) != 0): ?>
  <ul>
  <?php unset($this->_sections['sec']);
$this->_sections['sec']['name'] = 'sec';
$this->_sections['sec']['loop'] = is_array($_loop=$this->_tpl_vars['array']['error']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['sec']['show'] = true;
$this->_sections['sec']['max'] = $this->_sections['sec']['loop'];
$this->_sections['sec']['step'] = 1;
$this->_sections['sec']['start'] = $this->_sections['sec']['step'] > 0 ? 0 : $this->_sections['sec']['loop']-1;
if ($this->_sections['sec']['show']) {
    $this->_sections['sec']['total'] = $this->_sections['sec']['loop'];
    if ($this->_sections['sec']['total'] == 0)
        $this->_sections['sec']['show'] = false;
} else
    $this->_sections['sec']['total'] = 0;
if ($this->_sections['sec']['show']):

            for ($this->_sections['sec']['index'] = $this->_sections['sec']['start'], $this->_sections['sec']['iteration'] = 1;
                 $this->_sections['sec']['iteration'] <= $this->_sections['sec']['total'];
                 $this->_sections['sec']['index'] += $this->_sections['sec']['step'], $this->_sections['sec']['iteration']++):
$this->_sections['sec']['rownum'] = $this->_sections['sec']['iteration'];
$this->_sections['sec']['index_prev'] = $this->_sections['sec']['index'] - $this->_sections['sec']['step'];
$this->_sections['sec']['index_next'] = $this->_sections['sec']['index'] + $this->_sections['sec']['step'];
$this->_sections['sec']['first']      = ($this->_sections['sec']['iteration'] == 1);
$this->_sections['sec']['last']       = ($this->_sections['sec']['iteration'] == $this->_sections['sec']['total']);
?>
    <li> <?php echo $this->_tpl_vars['array']['error'][$this->_sections['sec']['index']]->message; ?>
</li>
  <?php endfor; endif; ?>
  </ul>
  <?php elseif ($this->_tpl_vars['message']): ?>
  <ul>
    <li><?php echo $this->_tpl_vars['message']; ?>
</li>
  </ul>
  <?php endif; ?>
</div>

<!--
<div id="advice_error" class="<?php if ($this->_tpl_vars['message']): ?>success<?php else: ?>error<?php endif; ?>" <?php if (count($this->_tpl_vars['array']) != 0): ?> style="display:block"<?php endif; ?>>
  <ul>
  <?php $_from = $this->_tpl_vars['errs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['err']):
?>
    <li><?php echo $this->_tpl_vars['err']->message; ?>
</li>
  <?php endforeach; endif; unset($_from); ?>
  </ul>
  <ul>
    <li><?php echo $this->_tpl_vars['message']; ?>
</li>
  </ul>
</div>
-->