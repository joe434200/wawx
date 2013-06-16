<?php /* Smarty version 2.6.18, created on 2013-06-02 16:47:59
         compiled from backstage/school_list.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'backstage/school_list.htm', 17, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "pageheader.htm", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


<!-- start ads list -->
<div class="list-div" id="listDiv">
<table cellpadding="3" cellspacing="1">
  <tr>
    <th>学校名称</th>
   <th>所在国家</th>
    <th>所在省份/直辖市</th>
      <th>所在市</th>
      <th>所在区/县</th>
      <th>学校地址</th>
      <th>学校介绍</th>
    <th>操作</th>
  </tr>
  <?php if (count($this->_tpl_vars['schoollist']) == 0): ?>
      <tr><td class="no-records" colspan="10">您还没有添加任何学校</td></tr>
  <?php else: ?>
 <?php $_from = $this->_tpl_vars['schoollist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
  <tr>
    <td align="center"><?php echo $this->_tpl_vars['item']['schoolname']; ?>
</td>
    <td  align="center"><?php echo $this->_tpl_vars['item']['countryname']; ?>
</td>
    <td  align="center"><?php echo $this->_tpl_vars['item']['provincename']; ?>
</td>
     <td  align="center"><?php echo $this->_tpl_vars['item']['cityname']; ?>
</td>
    <td  align="center"><?php echo $this->_tpl_vars['item']['skirtname']; ?>
</td>
    <td  align="center"><?php echo $this->_tpl_vars['item']['schooladdr']; ?>
</td>
     <td  align="center"><?php echo $this->_tpl_vars['item']['introduction']; ?>
</td>
    
    <td  align="center">
    <a href="admin_school.php?act=edit&id=<?php echo $this->_tpl_vars['item']['ID']; ?>
" title="编辑"><img src="./templates/images/backstage/icon_edit.gif" border="0" height="16" width="16" /></a>
      
      <a href="javascript:confirm_redirect('您确定要删除该该学校吗？', 'admin_shcool.php?act=del&id=<?php echo $this->_tpl_vars['item']['ID']; ?>
')" title="删除"><img src="./templates/images/backstage/icon_drop.gif" border="0" height="16" width="16" /></a>
   
    </td>
   
         
  </tr>
  <?php endforeach; endif; unset($_from); ?>
  <?php endif; ?>
      
      
      
      
      
    <tr>
    <td align="right"  colspan="10">      
     
     
<div class="num">
<DIV class="num_pg">

<script type="text/javascript">
    var pg1 = new showPages('pg1');
	pg1.pageCount = '<?php echo $this->_tpl_vars['pagecount']; ?>
';
	pg1.argName = 'p';
	pg1.printHtml();
</script>
</DIV>
</div>
      
      
</td>
  </tr>
</table>

</div>
<!-- end ad_position list -->


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "pagefooter.htm", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

