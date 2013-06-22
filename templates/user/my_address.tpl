{include file=userheader.tpl}


<input type="hidden" value="" id="city_sel"/>
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
  {if $addr|@count eq 0}
  <tr><td colspan="4" align="center">暂无更新收货地址</td></tr>
  {else}
   {foreach from=$addr item=item key=key}
	   <tr>
	    <td align="center">
	    <input type="radio" name="useid" value="{$item.ID}" {if $item.isuse eq 1}checked{/if}/>
	    </td>
	    <td>{$item.district}</td>
	    <td align="center">{$item.consignee}</td>
	    <td align="center">{$item.besttime}</td>
	  </tr>
   {/foreach}
   <tr>
   <td colspan="4" align="center">
   <input type="submit" name="Submit" value="提交" class="anniu24" />
   </td>
   </tr>
  {/if}
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
	<select onchange="javascript:getCity(this);">
	{foreach from=$data item=item key=key}
      <option value="{$item.ID}">{$item.name}</option>
      {/foreach}
    </select>
	
	<select name="" id="city2" onchange="javascript:getDistrct(this)">
      <option value="0">请选择</option>
    </select>
	<select name="" id="city3">
      <option value="0">请选择</option>
    </select>
	(必填)	</td>
    </tr>
  <tr>
    <td align="right">收货人姓名：</td>
    <td width="36%"><input type="text" name="addr[consignee]" id="consignee" class="my_txt_200"/> (必填)</td>
    <td width="14%" align="right">电子邮箱地址：</td>
    <td width="36%"><input type="text" name="addr[email]" id="useremail" class="my_txt_200"/>
      (必填)</td>
  </tr>
  <tr>
    <td align="right">详细地址：</td>
    <td><input type="text" name="addr[address]" id="address" class="my_txt_200"/>
      (必填)</td>
    <td align="right">有效手机：</td>
    <td><input type="text" name="addr[mobile]" id="mobile" class="my_txt_200"/>
      (必填)</td>
  </tr>
  <tr>
    <td align="right">固定电话：</td>
    <td><input type="text" name="addr[tel]" id="tel"  class="my_txt_200"/>
      (必填)</td>
      <td align="right">邮政编码：</td>
    <td><input type="text" name="addr[zipcode]" id="zipcode" class="my_txt_200"/></td>
    
  </tr>
  <tr>
    <td align="right">标志建筑：</td>
    <td><input type="text" name="addr[signbuilding]" id="signbuilding" class="my_txt_200"/></td>
    <td align="right">最佳送货时间：</td>
    <td><input type="text" name="addr[besttime]" id="besttime" class="my_txt_200"/></td>
  </tr>
  <tr>
    <td colspan="4" align="center">
    <input type="button" name="button" value="确认" class="anniu24" onclick="javascript:addressCheckSubmit()"/>
    </td>
    </tr>
</table>
<span id="tips" style="color:red;"></span>
</form>
	  </div>
	  
   </div>
   
   
   </div>
   </div>
   </div>
   </div>
   
 
   <div class="blank10"></div>
   </div>

{include file=barfooter.tpl}