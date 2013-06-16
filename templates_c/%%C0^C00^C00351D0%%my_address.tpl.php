<?php /* Smarty version 2.6.18, created on 2013-06-14 20:48:22
         compiled from user/my_address.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'user/my_address.tpl', 18, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "userheader.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>



<div class="my_right clearfix">
   <div class="my_address clearfix">
      <h3>常用收货地址</h3>
	  <div class="top10">
	  
<form action="UserCenterHandler.php?module=addrUse" method="post">
  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="ttbb5">
  <tr>
    <td width="7%" align="center">启用</td>
    <td width="63%" align="center">配送区域</td>
    <td width="15%" align="center">收货人姓名</td>
    <td width="15%" align="center">最佳送货时间</td>
  </tr>
  <?php if (count($this->_tpl_vars['addr']) == 0): ?>
  <tr><td colspan="4" align="center">暂无更新收货地址</td></tr>
  <?php else: ?>
   <?php $_from = $this->_tpl_vars['addr']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
	   <tr>
	    <td align="center">
	    <input type="radio" name="useid" value="<?php echo $this->_tpl_vars['item']['ID']; ?>
" <?php if ($this->_tpl_vars['item']['isuse'] == 1): ?>checked<?php endif; ?>/>
	    </td>
	    <td><?php echo $this->_tpl_vars['item']['district']; ?>
</td>
	    <td align="center"><?php echo $this->_tpl_vars['item']['consignee']; ?>
</td>
	    <td align="center"><?php echo $this->_tpl_vars['item']['besttime']; ?>
</td>
	  </tr>
   <?php endforeach; endif; unset($_from); ?>
   <tr>
   <td colspan="4" align="center">
   <input type="submit" name="Submit" value="提交" class="anniu24" />
   </td>
    </tr>
  <?php endif; ?>
</table>
</form>
	  </div>
	  
	  <div class="blank20"></div>
      <h3>收货人信息</h3>
	  <div class="top10">
	  
	<form action="UserCenterHandler.php?module=addrAdd" method="post">
	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="ttbb5">
  <tr>
    <td width="14%" align="right">配送区域：</td>
    <td colspan="3">
	<select name="" onchange="javascript:getProvince()">    
    <option value="0">中国</option>
    </select>
	<select name="123" onchange="javascript:getCity(this);">
	<?php $_from = $this->_tpl_vars['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
      <option value="<?php echo $this->_tpl_vars['item']['ID']; ?>
"><?php echo $this->_tpl_vars['item']['name']; ?>
</option>
      <?php endforeach; endif; unset($_from); ?>    
    </select>
	
	<select name="" onchange="javascript:getDistrct(this)">
      <option value="0">请选择</option>
    </select>
	<select name="">
      <option value="0">请选择</option>
    </select>
	(必填)	</td>
    </tr>
  <tr>
    <td align="right">收货人姓名：</td>
    <td width="36%"><input type="text" name="addr[consignee]"  class="my_txt_200"/> (必填)</td>
    <td width="14%" align="right">电子邮箱地址：</td>
    <td width="36%"><input type="text" name="addr[email]"  class="my_txt_200"/>
      (必填)</td>
  </tr>
  <tr>
    <td align="right">详细地址：</td>
    <td><input type="text" name="addr[address]"  class="my_txt_200"/>
      (必填)</td>
    <td align="right">邮政编码：</td>
    <td><input type="text" name="addr[zipcode]"  class="my_txt_200"/></td>
  </tr>
  <tr>
    <td align="right">电话：</td>
    <td><input type="text" name="addr[tel]"  class="my_txt_200"/>
      (必填)</td>
    <td align="right">手机：</td>
    <td><input type="text" name="addr[mobile]"  class="my_txt_200"/></td>
  </tr>
  <tr>
    <td align="right">标志建筑：</td>
    <td><input type="text" name="addr[signbuilding]"  class="my_txt_200"/></td>
    <td align="right">最佳送货时间：</td>
    <td><input type="text" name="addr[besttime]"  class="my_txt_200"/></td>
  </tr>
  <tr>
    <td colspan="4" align="center">
    <input type="submit" name="Submit" value="确认" class="anniu24" />
    </td>
    </tr>
</table>
</form>
	  </div>
	  
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