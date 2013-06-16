<?php /* Smarty version 2.6.18, created on 2013-06-03 19:31:42
         compiled from wb_zone/wb_reply.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "wbheader.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php echo '
<style>
</style>
<link rel="stylesheet" href="./plugin/editor/themes/default/default.css" />
<script charset="utf-8" src="./plugin/editor/kindeditor-min.js"></script>
<script charset="utf-8" src="./plugin/editor/lang/zh_CN.js"></script>
<script>
var editor;
KindEditor.ready(function(K) {
	editor = K.create(\'textarea[name="emoticons"]\', {
		allowFileManager : true,
		syncType : "form",
		items : [\'emoticons\'],
		width : "100%",
		height : "155px",
		syncType : "form",
		resizeType : 0 
	});
});
</script>
'; ?>


<input type="hidden" id="diaid" value="<?php echo $this->_tpl_vars['uid']; ?>
">
<!--右侧-->
    <td valign="top" class="wb_ny_RR clearfix">

<div class="wb_bt blue_s">TA的留言板</div>
<div class="wb_tz a_blue clearfix" style="height:625px;height:auto;">



<div class="space_board clearfix">

<div class="lyk" style="height:auto;">
<form action="" method="get">
<input type="hidden" id="diaid" value="<?php echo $this->_tpl_vars['uid']; ?>
">
<input type="hidden" id="type" value="3">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td>
<div class="txt" style="height:auto;"><textarea name="emoticons" cols="" rows="" id="Reply"></textarea></div>
</td>
</tr>
<tr>
<td align="right">
<div class="ann"><input type="button" value="留言"  class="anniu25" onclick="javascript:addReply()"/></div>
</td>
</tr>
</table>
</form>
</div>

<div class="ly">
<ul id="BackReply">
<?php $_from = $this->_tpl_vars['reply']['reply']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
<li>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top" class="pic"><p><img src="./templates/images/schoolbar/avatar2.jpg" /></p></td>
    <td valign="top" class="nr">
    <p class="name"><a href="#"><?php echo $this->_tpl_vars['item']['name']; ?>
</a> <span><?php echo $this->_tpl_vars['item']['createtime']; ?>
</span></p>
    <p class="pl"><?php echo $this->_tpl_vars['item']['content']; ?>
</p>
    </td>
	<td valign="bottom" class="edit a999"><a href="javascript:void(0)" onclick="javascript:addSecReply('<?php echo $this->_tpl_vars['item']['name']; ?>
','<?php echo $this->_tpl_vars['item']['id']; ?>
');">回复</a>&nbsp;&nbsp;<a href="javascript:void(0)" onclick="javascript:getDelReply('<?php echo $this->_tpl_vars['item']['id']; ?>
')">删除</a></td>
  </tr>
  <?php if ($this->_tpl_vars['item']['sec'] != ""): ?>
  <?php $_from = $this->_tpl_vars['item']['sec']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['sec']):
?>
  <tr>
    <td valign="top" class="pic">&nbsp;</td>
    <td valign="top" class="nr reply" colspan="2">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
         <tr>
         <td valign="top" class="pic"><p><img src="./templates/images/schoolbar/avatar2.jpg" /></p></td>
         <td valign="top" class="nr">
         <p class="name"><a href="#"><?php echo $this->_tpl_vars['sec']['name']; ?>
</a> <span><?php echo $this->_tpl_vars['sec']['createtime']; ?>
</span></p>
         <p class="pl"><?php echo $this->_tpl_vars['sec']['content']; ?>
</p>
         </td>
         </tr>
		 <tr>
		 <td valign="top" class="pic">&nbsp;</td>
		 <td class="a999"><a href="javascript:void(0)" onclick="javascript:addSecReply('<?php echo $this->_tpl_vars['sec']['name']; ?>
','<?php echo $this->_tpl_vars['item']['id']; ?>
');">回复</a>&nbsp;&nbsp;<a href="javascript:void(0)" onclick="javascript:getDelReply('<?php echo $this->_tpl_vars['sec']['id']; ?>
')">删除</a></td>
		 </tr>
	     </table>
    </td>
  </tr>
  <?php endforeach; endif; unset($_from); ?>
  <?php endif; ?>
</table>
</li>
<?php endforeach; endif; unset($_from); ?>
</ul>
</div>

</div>

</div>

<!--页码 -->
<div class="blank"></div>
<div class="album_page" id="pageFooter">
<?php if ($this->_tpl_vars['reply']['base']['pageCounts'] == '1'): ?>
<a class="pageFooterStyle">1</a>
<?php else: ?>
    <?php if ($this->_tpl_vars['reply']['base']['page'] == '1'): ?>
    <a href="javascript:void(0)" class="pageFooterStyle">上一页</a>
    <?php else: ?>
    <a  href="javascript:void(0)" onclick="javascript:splitPage(3,'<?php echo $this->_tpl_vars['reply']['base']['page']-1; ?>
')">上一页</a>
    <?php endif; ?>
    
    <?php unset($this->_sections['loop']);
$this->_sections['loop']['name'] = 'loop';
$this->_sections['loop']['loop'] = is_array($_loop=$this->_tpl_vars['reply']['base']['pageCounts']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
    	&nbsp;<a href="javascript:void(0)" onclick="javascript:splitPage(3,'<?php echo $this->_sections['loop']['index']+1; ?>
')"><?php echo $this->_sections['loop']['index']+1; ?>
</a>
    	<?php endif; ?>
    <?php endfor; endif; ?>
	<?php if ($this->_tpl_vars['reply']['base']['page'] == $this->_tpl_vars['reply']['base']['pageCounts']): ?>
	&nbsp;<a class="pageFooterStyle">下一页</a>
	<?php else: ?>
	&nbsp;<a  href="javascript:void(0)" onclick="javascript:splitPage(3,'<?php echo $this->_tpl_vars['reply']['base']['page']+1; ?>
')">下一页</a>
	<?php endif; ?>
<?php endif; ?>
</div>
<!--页码 end-->

</td>
    
    
    
  </tr>
</table>
</div>

<div class="blank10"></div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "barfooter.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>