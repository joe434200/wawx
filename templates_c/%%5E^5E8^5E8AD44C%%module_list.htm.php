<?php /* Smarty version 2.6.18, created on 2013-06-02 16:47:53
         compiled from backstage/module_list.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'backstage/module_list.htm', 50, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "pageheader.htm", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<form enctype="multipart/form-data" action="admin_module.php?act=list" method="post" id="haha" name="haha">


<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="10%" align="left"><strong>模块名称</strong></td>
    <td width="15%" align="left"><input name="query[modulename]" type="text" id="modulename"  class="txt200"  value="<?php echo $this->_tpl_vars['query']['modulename']; ?>
"/></td>
     <td width="10%" align="left"><strong>所属模块</strong></td>
    <td width="15%" align="left">
<select name="query[parentid]" id="parentid"  >
                <option value="" >请选择</option>
                <?php $_from = $this->_tpl_vars['pmodules']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['index'] => $this->_tpl_vars['item']):
?>
                <option value="<?php echo $this->_tpl_vars['item']['ID']; ?>
" <?php if ($this->_tpl_vars['query']['parentid'] == $this->_tpl_vars['item']['ID']): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['item']['modulename']; ?>
</option>
                <?php endforeach; endif; unset($_from); ?>
      </select>



   </td>
     <td width="10%" align="left"><strong>适用类型</strong></td>
    <td width="15%" align="left">
<select name="query[usertype]" id="usertype"  >
                <option value="" >请选择</option>
                <?php $_from = $this->_tpl_vars['usertype']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
                <option value="<?php echo $this->_tpl_vars['key']; ?>
" <?php if ($this->_tpl_vars['query']['usertype'] == $this->_tpl_vars['key']): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['item']; ?>
</option>
                <?php endforeach; endif; unset($_from); ?>
      </select>
</td>
    <td  align="left" width="10%"><input type="submit"  class="button" value="查找"  /></td>
    <td>&nbsp;</td>

  </tr>
  </table>
 <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "warning.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</form>
<!-- start ads list -->
<div class="list-div" id="listDiv">
<table cellpadding="3" cellspacing="1">
  <tr>
    <th>模块名称</th>
   
    <th>链接</th>
      <th>所属模块</th>
    <th>适用类型</th>
   
    <th>操作</th>
  </tr>
  <?php if (count($this->_tpl_vars['modules']) == 0): ?>
      <tr><td class="no-records" colspan="10">您还没有添加模块</td></tr>
  <?php else: ?>
 <?php $_from = $this->_tpl_vars['modules']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
  <tr>
    <td align="center"><?php if ($this->_tpl_vars['item']['delflag'] == 1): ?><img src="./templates/images/backstage/no.gif" border="0" height="16" width="16" alt="已删除"/><?php endif; ?><?php echo $this->_tpl_vars['item']['modulename']; ?>
</td>
    <td  align="center"><?php echo $this->_tpl_vars['item']['moduleurl']; ?>
</td>
    <td  align="center"><?php echo $this->_tpl_vars['item']['parentname']; ?>
</td>
    <td  align="center"><?php echo $this->_tpl_vars['usertype'][$this->_tpl_vars['item']['usertype']]; ?>
</td>
    <td  align="center">
    <a href="admin_module.php?act=edit&id=<?php echo $this->_tpl_vars['item']['ID']; ?>
" title="编辑"><img src="./templates/images/backstage/icon_edit.gif" border="0" height="16" width="16" /></a>
      
      <a href="javascript:confirm_redirect('您确定要删除该模块吗？', 'admin_module.php?act=del&id=<?php echo $this->_tpl_vars['item']['ID']; ?>
')" title="删除"><img src="./templates/images/backstage/icon_drop.gif" border="0" height="16" width="16" /></a>
    <?php if ($this->_tpl_vars['item']['delflag'] == 1): ?>
    <a href="admin_module.php?act=reuse&id=<?php echo $this->_tpl_vars['item']['ID']; ?>
" title="再启用"><img src="./templates/images/backstage/yes.gif" border="0" height="16" width="16" /></a>
    <?php endif; ?>
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

