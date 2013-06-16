<?php /* Smarty version 2.6.18, created on 2013-06-02 16:58:52
         compiled from backstage/admin_forumcatagory_list.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'backstage/admin_forumcatagory_list.html', 17, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "pageheader.htm", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


<!-- start ads list -->
<div class="list-div" id="listDiv">
<table cellpadding="3" cellspacing="1">
  <tr>
    <th>论坛名称</th> 
    <th>上级分类</th>
    <th>描述内容</th>
    <th>版主</th>
    <th>副版主A</th>
    <th>副版主B</th>
    <th>操作</th>
  </tr>
  
  <?php if (count($this->_tpl_vars['frm']) == 0): ?>
      <tr><td class="no-records" colspan="10">您还没有添加论坛分类</td></tr>
  <?php else: ?>
 <?php $_from = $this->_tpl_vars['frm']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
  <tr>
    <td align="center"><?php echo $this->_tpl_vars['item']['name']; ?>
</td>
    <td  align="center"><?php echo $this->_tpl_vars['item']['parentname']; ?>
</td>
    <td  align="center"><?php echo $this->_tpl_vars['item']['remark']; ?>
</td>
    <td align="center"><?php echo $this->_tpl_vars['item']['mainnickname']; ?>
</td>
    <td  align="center"><?php echo $this->_tpl_vars['item']['adminnickname1']; ?>
</td>
    <td  align="center"><?php echo $this->_tpl_vars['item']['adminnickname2']; ?>
</td>
    <td  align="center">
    <a href="admin_forumcatagory.php?act=edit&id=<?php echo $this->_tpl_vars['item']['ID']; ?>
" title="编辑"><!-- 大写ID 是什么 -->
    <img src="./templates/images/backstage/icon_edit.gif" border="0" height="16" width="16" /></a><!-- 把id传到控制层 -->
      
      <a href="javascript:confirm_redirect
      ('您确定要删除该模块吗？', 'admin_forumcatagory.php?act=del&id=<?php echo $this->_tpl_vars['item']['ID']; ?>
')" title="删除">
      <img src="./templates/images/backstage/icon_drop.gif" border="0" height="16" width="16" /></a>
    
    </td>
  </tr>
  <?php endforeach; endif; unset($_from); ?>
  <?php endif; ?>

  
<!-- end ad_position list -->


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "pagefooter.htm", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

