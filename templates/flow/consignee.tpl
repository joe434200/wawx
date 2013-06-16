	{include file=header.tpl}
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
	        {foreach from=$country_list item=country}
        		<option value="{$country.ID}" {if $cosignee.country eq $country.ID}selected{/if}>{$country.name}</option>
        	{/foreach} 
	      </select>
	      <select name="province" id="province" style="border:1px solid #ccc;">
	        <option value="">请选择省</option>
	        
	       {foreach from=$province_list item=province} 
        	<option value="{$province.ID}" {if $cosignee.province eq $province.ID}selected{/if}>{$province.name}</option>
           {/foreach} 
	       
	      </select>
	      <select name="city" id="city"  style="border:1px solid #ccc;">
	        <option value="">请选择市</option>
	        
	        {foreach from=$city_list item=city} 
        		<option value="{$city.ID}" {if $cosignee.city eq $city.ID}selected{/if}>{$city.name}</option>
        	{/foreach}
	     
	      </select>
	      <select name="district" id="district"  style="border:1px solid #ccc;">
	        <option value="">请选择区</option>
	       {foreach from=$district_list item=district} 
        		<option value="{$district.ID}" {if $cosignee.district eq $district.ID}selected{/if}>{$district.name}</option>
       	   {/foreach} 
	      </select>
	    （必填）</td>
	  </tr>

	  <tr>
	    <td bgcolor="#ffffff">收货人姓名:</td>
	    <td bgcolor="#ffffff"><input name="consignee" 
	    id="consignee"  type="text" class="inputBg" 
	    maxlength="20"  value="{$cosignee.consignee}" />
	    （必填） </td>
	    <td bgcolor="#ffffff">邮箱:</td>
	    <td bgcolor="#ffffff"><input name="email" 
	    id="email11" type="text" class="inputBg" 
	    onblur="isMail('邮箱',this)" maxlength="30" 
	    value="{$cosignee.email}" />
	    （必填）</td>
	  </tr>

	  <tr>
	    <td bgcolor="#ffffff">详细地址:</td>
	    <td bgcolor="#ffffff"><input name="address" 
	    id="address" type="text" class="inputAddrBg"   
	    value="{$cosignee.address}" />
	    （必填）</td>
	    <td bgcolor="#ffffff">邮政编码:</td>
	    <td bgcolor="#ffffff"><input name="zipcode" 
	    id="zipcode" type="text" maxlength="6" 
	    class="inputBg" onblur="isZipcode('邮编',this)"  
	    value="{$cosignee.zipcode}" /></td>
	  </tr>
	
	  <tr>
	    <td bgcolor="#ffffff">电话:</td>
	    <td bgcolor="#ffffff"><input name="tel" id="tel" 
	    type="text" class="inputBg" maxlength="30"  
	    value="{$cosignee.tel}" onblur="isTelMob('电话',this)"/>
	    </td>
	    <td bgcolor="#ffffff">手机:</td>
	    <td bgcolor="#ffffff"><input name="mobile" 
	    id="mobile" type="text" class="inputBg" 
	    maxlength="30" onblur="isTelMob('手机',this)"  value="{$cosignee.mobile}" />
	    （必填）</td>
	  </tr>

	  <tr>
	    <td bgcolor="#ffffff">标志性建筑:</td>
	    <td bgcolor="#ffffff"><input name="sign_building" type="text" class="inputBg"   value="{$cosignee.signbuilding}" /></td>
	    <td bgcolor="#ffffff">最佳送货时间:</td>
	    <td bgcolor="#ffffff"><input name="best_time"  type="text"  class="inputBg"  value="{$cosignee.besttime}" /></td>
	  </tr>

	  <tr>
	    <td colspan="4" align="center" bgcolor="#ffffff">
	    <input type="button" name="Submit" class="bnt_blue_2" onclick="submitForm()" value="配送这个地址" />
	     <input name="address_id" type="hidden" value="" />
	     <input name="flag" type="hidden" value="{$flag}" />
	    </td>
	  </tr>
	</table>
	</div>
</form>
 </DIV>  
 <script src="./templates/scripts/goods/showdiv.js" type="text/javascript"></script>  
 <script src="./templates/scripts/goods/consignee.js" type="text/javascript"></script>      
 <!------------------------------------------body over-->
{include file=footer.tpl}