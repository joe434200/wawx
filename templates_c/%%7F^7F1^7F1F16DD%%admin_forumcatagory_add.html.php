<?php /* Smarty version 2.6.18, created on 2013-06-02 16:58:54
         compiled from backstage/admin_forumcatagory_add.html */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "pageheader.htm", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="main-div">
<form action="admin_forumcatagory.php?act=submit" method="post" name="theForm">

  <table width="100%" id="general-table">
    <tr>
      <td  class="label">类型名称</td>
      <td>
        <input name="data[name]" type="text" id="groupname" size="22" value='<?php echo $this->_tpl_vars['data']['name']; ?>
'  /><!-- 必须和表中的ID对应 -->
        <span class="require-field">*</span>
      </td>
    </tr>

      <tbody >
    
     <tr >
      <td  class="label">论坛类型</td>
      <td>
       <input name="level" type="radio" value="1"  onclick="javascript:hidparentlist()" <?php if ($this->_tpl_vars['data'] != "" && $this->_tpl_vars['data']['parentid'] == '99999'): ?>checked<?php elseif ($this->_tpl_vars['data'] == ""): ?>checked<?php else: ?><?php endif; ?>/> 一级
       
       <!-- 点了一级就执行hideparentlist这个函数 -->
       <input id='nodetypechild' name="level" type="radio" value="2" onclick="javascript:hidparentlist()" <?php if ($this->_tpl_vars['data'] != "" && $this->_tpl_vars['data']['parentid'] != '99999'): ?>checked<?php endif; ?>/> 二级
       
       <!-- 点了二级就执行hideparentlist这个函数 -->
      </td>
    </tr>
   
     <tr id="upnode" <?php if ($this->_tpl_vars['data'] != "" && $this->_tpl_vars['data']['parentid'] != '99999'): ?>style="display:block;"<?php else: ?>style="display:none;"<?php endif; ?>> 
      <td  class="label">上级论坛</td>
      <td>
         <select name="data[parentid]" id="data[parentid]" >
         <!-- 下面循环才是把所有的上级圈子的名称循环显示出来 -->
         <?php $_from = $this->_tpl_vars['parent']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
         <option value="<?php echo $this->_tpl_vars['item']['ID']; ?>
 " <?php if ($this->_tpl_vars['data']['parentid'] == $this->_tpl_vars['item']['name']): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['item']['name']; ?>
</option><!-- ???? -->         
         <?php endforeach; endif; unset($_from); ?>
         
        </select>
      </td>
    </tr>
    <tr>
        <td class="label">备注：</td>
        <td><textarea name="data[remark]" cols="50" rows="5"><?php echo $this->_tpl_vars['data']['remark']; ?>
</textarea></td>
      </tr>
      <tr>
      <td  class="label">版主</td>
      <td>
        <input name="admin1" type="text"  size="22" value='<?php echo $this->_tpl_vars['data']['mainnickname']; ?>
'  id="admin_txt1"  class="txtsearch" readonly onclick="javascript:openwindow('0','admin_txt1','admin_ID1');"/><!-- 必须和表中的ID对应 -->
        <input name="data[admin1]" type="hidden"  size="22" value='<?php echo $this->_tpl_vars['data']['admin1']; ?>
'  ID = "admin_ID1"  class="txtsearch" />
        <span class="require-field">*</span>
      </td>
    </tr>
    <tr>
      <td  class="label">副版主A</td>
      <td>
        <input name="admin2" type="text"  size="22" value='<?php echo $this->_tpl_vars['data']['adminnickname1']; ?>
'   id = "admin_txt2" class="txtsearch" readonly onclick="javascript:openwindow('0','admin_txt2','admin_ID2');"/><!-- 必须和表中的ID对应 -->
        <input name="data[admin2]" type="hidden"  size="22" value='<?php echo $this->_tpl_vars['data']['admin2']; ?>
'  ID = "admin_ID2"  class="txtsearch" />
        <span class="require-field">*</span>
      </td>
    </tr>
    <tr>
      <td  class="label">副版主B</td>
      <td>
        <input name="admin3" type="text"  size="22" value='<?php echo $this->_tpl_vars['data']['adminnickname2']; ?>
'  id = "admin_txt3" class="txtsearch" readonly onclick="javascript:openwindow('0','admin_txt3','admin_ID3');"/><!-- 必须和表中的ID对应 -->
        <input name="data[admin3]" type="hidden"  size="22" value='<?php echo $this->_tpl_vars['data']['admin3']; ?>
'  ID = "admin_ID3"  class="txtsearch" />
        <span class="require-field">*</span>
      </td>
    </tr>
    
    <tr>
       <td class="label">&nbsp;</td>
       <td>
       <!-- 保存从edit控制层传过来的对应行的ID -->
     <input name="id" type="hidden" value="<?php echo $this->_tpl_vars['data']['ID']; ?>
"  id="id"/>
        <input type="button" value=" 确定 " class="button" onclick="javascript:grpchecksubmit();"/>
        <input type="reset" value=" 重置 " class="button" />
       
      </td>
      
    </tr>
    </tbody>
    
 </table>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "warning.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</form>
</div>
<script src="./templates/scripts/backstage/group_module.js" type="text/javascript"></script>
<script src="./templates/scripts/selector.js" type="text/javascript"></script>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "pagefooter.htm", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>