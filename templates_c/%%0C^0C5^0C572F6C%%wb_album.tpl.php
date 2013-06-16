<?php /* Smarty version 2.6.18, created on 2013-06-03 19:31:40
         compiled from wb_zone/wb_album.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "wbheader.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<input type="hidden" id="uid" value="<?php echo $this->_tpl_vars['uid']; ?>
">
<input type="hidden" id="albumUrl" value="javascipt:window.location='wb_index.php?module=albumShow&alb=">
<!--右侧-->
<td valign="top" class="wb_ny_RR clearfix">


<div class="wb_bt blue_s">相册</div>

<div class="wb_pics clearfix a_blue" style="height:650px;">
<ul id="BackReply">


<?php $_from = $this->_tpl_vars['album']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
<?php if ($this->_tpl_vars['key'] < $this->_tpl_vars['page']['base']['pageNum']): ?>
<li>
<div class="pic">
<a href="javascript:void(0)" onclick="javascipt:window.location='wb_index.php?module=albumShow&alb=<?php echo $this->_tpl_vars['item']['ID']; ?>
'"><img src="./templates/images/schoolbar/wb_pic1.gif" /></a>
</div>
<p class="jj"><a href="javascript:void(0)" onclick="javascipt:window.location='wb_index.php?module=albumShow&alb=<?php echo $this->_tpl_vars['item']['ID']; ?>
'"><?php echo $this->_tpl_vars['item']['albumname']; ?>
</a></p>
</li>
<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>

</ul>
</div>




<!--页码 -->
<div class="blank"></div>
<div class="wb_num">

<div class="all">共<?php echo $this->_tpl_vars['page']['base']['counts']; ?>
个，第<a id="currpage"><?php echo $this->_tpl_vars['page']['base']['page']; ?>
</a>页</div>
<div class="au">

<div class="album_page" id="pageFooter">
<?php if ($this->_tpl_vars['page']['base']['pageCounts'] == '1'): ?>
<a href="javascript:void(0)" class="pageFooterStyle">1</a>
<?php else: ?>
	<?php if ($this->_tpl_vars['page']['base']['page'] == 1): ?>
	<a href="javascript:void(0)" class="pageFooterStyle">上一页</a>
	<?php else: ?>
	<a href="javascript:void(0)" onclick="javascript:getAlbumSplitPage('<?php echo $this->_tpl_vars['page']['base']['page']-1; ?>
')">上一页</a>
	<?php endif; ?>
	
	<?php unset($this->_sections['loop']);
$this->_sections['loop']['name'] = 'loop';
$this->_sections['loop']['loop'] = is_array($_loop=$this->_tpl_vars['page']['base']['pageCounts']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
    	<?php if ($this->_tpl_vars['page']['base']['page'] == $this->_sections['loop']['index']+1): ?>
    	&nbsp;<a href="javascript:void(0)" class="pageFooterStyle"><?php echo $this->_sections['loop']['index']+1; ?>
</a>
    	<?php else: ?>
    	&nbsp;<a href="javascript:void(0)" onclick="javascript:getAlbumSplitPage('<?php echo $this->_sections['loop']['index']+1; ?>
')"><?php echo $this->_sections['loop']['index']+1; ?>
</a>
    	<?php endif; ?>
    <?php endfor; endif; ?>
	
	<?php if ($this->_tpl_vars['page']['base']['page'] == $this->_tpl_vars['page']['base']['pageCounts']): ?>
	<a href="javascript:void(0)" class="pageFooterStyle">下一页</a>
	<?php else: ?>
	<a href="javascript:void(0)" onclick="javascript:getAlbumSplitPage('<?php echo $this->_tpl_vars['page']['base']['page']+1; ?>
')">下一页</a>
	<?php endif; ?>
<?php endif; ?>
</div>
</div>
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