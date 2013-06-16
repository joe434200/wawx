<?php /* Smarty version 2.6.18, created on 2013-06-02 16:56:34
         compiled from flow/consignee.tpl */ ?>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<!------------------------------------------body-->

<DIV class="blank"></DIV>
<DIV class="block clearfix"><!--当前位置-->
<div class="location ared">当前位置：<a href="index.php">首页</a> > 购物流程 > 收货人信息</div>
<div class="blank"></div>

<form action="flow.php?act=consignee" method="post" name="theForm" id="theForm" >
	 <div class="flowBox">
	<h6><span>收货人信息</span></h6>
	<table width="99%" align="center" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
	  <tr>
	    <td bgcolor="#ffffff">配送区域:</td>
	    <td colspan="3" bgcolor="#ffffff">
	     <select name="country" id="country"  style="border:1px solid #ccc;">
	        <option value="">选择国家</option>
	        <?php $_from = $this->_tpl_vars['country_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['country']):
?>
        		<option value="<?php echo $this->_tpl_vars['country']['ID']; ?>
" <?php if ($this->_tpl_vars['cosignee']['country'] == $this->_tpl_vars['country']['ID']): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['country']['name']; ?>
</option>
        	<?php endforeach; endif; unset($_from); ?> 
	      </select>
	      <select name="province" id="province" style="border:1px solid #ccc;">
	        <option value="">请选择省</option>
	        
	       <?php $_from = $this->_tpl_vars['province_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['province']):
?> 
        	<option value="<?php echo $this->_tpl_vars['province']['ID']; ?>
" <?php if ($this->_tpl_vars['cosignee']['province'] == $this->_tpl_vars['province']['ID']): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['province']['name']; ?>
</option>
           <?php endforeach; endif; unset($_from); ?> 
	       
	      </select>
	      <select name="city" id="city"  style="border:1px solid #ccc;">
	        <option value="">请选择市</option>
	        
	        <?php $_from = $this->_tpl_vars['city_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['city']):
?> 
        		<option value="<?php echo $this->_tpl_vars['city']['ID']; ?>
" <?php if ($this->_tpl_vars['cosignee']['city'] == $this->_tpl_vars['city']['ID']): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['city']['name']; ?>
</option>
        	<?php endforeach; endif; unset($_from); ?>
	     
	      </select>
	      <select name="district" id="district"  style="border:1px solid #ccc;">
	        <option value="">请选择区</option>
	       <?php $_from = $this->_tpl_vars['district_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['district']):
?> 
        		<option value="<?php echo $this->_tpl_vars['district']['ID']; ?>
" <?php if ($this->_tpl_vars['cosignee']['district'] == $this->_tpl_vars['district']['ID']): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['district']['name']; ?>
</option>
       	   <?php endforeach; endif; unset($_from); ?> 
	      </select>
	    （必填）</td>
	  </tr>

	  <tr>
	    <td bgcolor="#ffffff">收货人姓名:</td>
	    <td bgcolor="#ffffff"><input name="consignee" 
	    id="consignee"  type="text" class="inputBg" 
	    maxlength="20"  value="<?php echo $this->_tpl_vars['cosignee']['consignee']; ?>
" />
	    （必填） </td>
	    <td bgcolor="#ffffff">邮箱:</td>
	    <td bgcolor="#ffffff"><input name="email" 
	    id="email11" type="text" class="inputBg" 
	    onblur="isMail('邮箱',this)" maxlength="30" 
	    value="<?php echo $this->_tpl_vars['cosignee']['email']; ?>
" />
	    （必填）</td>
	  </tr>

	  <tr>
	    <td bgcolor="#ffffff">详细地址:</td>
	    <td bgcolor="#ffffff"><input name="address" 
	    id="address" type="text" class="inputAddrBg"   
	    value="<?php echo $this->_tpl_vars['cosignee']['address']; ?>
" />
	    （必填）</td>
	    <td bgcolor="#ffffff">邮政编码:</td>
	    <td bgcolor="#ffffff"><input name="zipcode" 
	    id="zipcode" type="text" maxlength="6" 
	    class="inputBg" onblur="isZipcode('邮编',this)"  
	    value="<?php echo $this->_tpl_vars['cosignee']['zipcode']; ?>
" /></td>
	  </tr>
	
	  <tr>
	    <td bgcolor="#ffffff">电话:</td>
	    <td bgcolor="#ffffff"><input name="tel" id="tel" 
	    type="text" class="inputBg" maxlength="30"  
	    value="<?php echo $this->_tpl_vars['cosignee']['tel']; ?>
" onblur="isTelMob('电话',this)"/>
	    </td>
	    <td bgcolor="#ffffff">手机:</td>
	    <td bgcolor="#ffffff"><input name="mobile" 
	    id="mobile" type="text" class="inputBg" 
	    maxlength="30" onblur="isTelMob('手机',this)"  value="<?php echo $this->_tpl_vars['cosignee']['mobile']; ?>
" />
	    （必填）</td>
	  </tr>

	  <tr>
	    <td bgcolor="#ffffff">标志性建筑:</td>
	    <td bgcolor="#ffffff"><input name="sign_building" type="text" class="inputBg"   value="<?php echo $this->_tpl_vars['cosignee']['signbuilding']; ?>
" /></td>
	    <td bgcolor="#ffffff">最佳送货时间:</td>
	    <td bgcolor="#ffffff"><input name="best_time"  type="text"  class="inputBg"  value="<?php echo $this->_tpl_vars['cosignee']['besttime']; ?>
" /></td>
	  </tr>

	  <tr>
	    <td colspan="4" align="center" bgcolor="#ffffff">
	    <input type="button" name="Submit" class="bnt_blue_2" onclick="submitForm()" value="配送这个地址" />
	     <input name="address_id" type="hidden" value="" />
	     <input name="flag" type="hidden" value="<?php echo $this->_tpl_vars['flag']; ?>
" />
	    </td>
	  </tr>
	</table>
	</div>
</form>
 </DIV>  
 <script src="./templates/scripts/goods/showdiv.js" type="text/javascript"></script>  
 <script src="./templates/scripts/goods/consignee.js" type="text/javascript"></script>      
 <!------------------------------------------body over-->
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>