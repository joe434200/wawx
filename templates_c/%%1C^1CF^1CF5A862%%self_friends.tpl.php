<?php /* Smarty version 2.6.18, created on 2013-06-14 11:07:17
         compiled from self_zone/self_friends.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'self_zone/self_friends.tpl', 15, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "spaceheader.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


<div class="blank10"></div>
<div class="block  blue_s">
<input type="hidden" id="currpage">
<div class="AreaL750">
<!--好友列表-->
<div class="box_lt clearfix">
  <div class="title_bt blue_s">好友列表</div>
  
  <div class="space_show_friend clearfix">
    <ul id="BackReply">
    
    <?php if (count($this->_tpl_vars['frinfo']['info']) != 0): ?>
    <?php $_from = $this->_tpl_vars['frinfo']['info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
    <li>
	<p><a href="javascript:void(0)"><img src="<?php echo $this->_tpl_vars['item']['photo']; ?>
" /></a></p>
	<p><a href="javascript:void(0)"><?php echo $this->_tpl_vars['item']['name']; ?>
</a></p>
	</li>
    <?php endforeach; endif; unset($_from); ?>
    <?php else: ?>
    <?php endif; ?>
	
	</ul>
  </div>
  
  
<div class="album_page" id="pageFooter">
<?php if ($this->_tpl_vars['frinfo']['base']['pageCounts'] == '1'): ?>
<a class="pageFooterStyle">1</a>
<?php else: ?>
    <?php if ($this->_tpl_vars['frinfo']['base']['page'] == '1'): ?>
    <a href="javascript:void(0)" class="pageFooterStyle">上一页</a>
    <?php else: ?>
    <a  href="javascript:void(0)" onclick="javascript:AjaxGetFriends('<?php echo $this->_tpl_vars['frinfo']['base']['page']-1; ?>
')">上一页</a>
    <?php endif; ?>
    
    <?php unset($this->_sections['loop']);
$this->_sections['loop']['name'] = 'loop';
$this->_sections['loop']['loop'] = is_array($_loop=$this->_tpl_vars['frinfo']['base']['pageCounts']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
    	<?php if ($this->_tpl_vars['reply']['base']['page'] == $this->_sections['loop']['index']+1): ?>
    	&nbsp;<a href="javascript:void(0)" class="pageFooterStyle"><?php echo $this->_sections['loop']['index']+1; ?>
</a>
    	<?php else: ?>
    	&nbsp;<a href="javascript:void(0)" onclick="javascript:AjaxGetFriends('<?php echo $this->_sections['loop']['index']+1; ?>
')"><?php echo $this->_sections['loop']['index']+1; ?>
</a>
    	<?php endif; ?>
    <?php endfor; endif; ?>
    
	<?php if ($this->_tpl_vars['frinfo']['base']['page'] == $this->_tpl_vars['frinfo']['base']['pageCounts']): ?>
	&nbsp;<a class="pageFooterStyle">下一页</a>
	<?php else: ?>
	&nbsp;<a  href="javascript:void(0)" onclick="javascript:AjaxGetFriends('<?php echo $this->_tpl_vars['frinfo']['base']['page']+1; ?>
')">下一页</a>
	<?php endif; ?>
<?php endif; ?>
</div>
  <div class="blank10"></div>
  
</div>
<!--好友列表 结束-->
</div>


<!--头像-->
<div class="AreaRR">
<div class="box_lt clearfix">
  <div class="title_bt"><a href="javascript:void(0)" onclick="window.location='userCenter.php?module=avatar'">头像</a></div>
  <div class="space_avatar ">
  <p class="pic"><img src="<?php echo $this->_tpl_vars['self']['photo']; ?>
" style="height:150px;width:150px;"/></p>
  <p class="name"><a href="#"><?php if ($this->_tpl_vars['self']['nickname'] == ""): ?><?php echo $this->_tpl_vars['self']['email']; ?>
<?php else: ?><?php echo $this->_tpl_vars['self']['nickname']; ?>
<?php endif; ?></a></p>
  </div>
  
<div class="space_info  clearfix ">
<ul>
<li class="a1">日志: <a href="#"><?php echo $this->_tpl_vars['info']['disum']; ?>
</a></li>
<li class="a2">照片: <a href="#"><?php echo $this->_tpl_vars['info']['phsum']; ?>
</a></li>
<li class="a3">好友: <a href="#"><?php echo $this->_tpl_vars['info']['frsum']; ?>
</a></li>
</ul>
</div>
</div>
</div>
<!--/头像-->




</div>
<div class="blank10"></div>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "barfooter.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>