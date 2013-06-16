	{include file=header.tpl}
<!------------------------------------------body-->

<DIV class="blank"></DIV>
<DIV class="block clearfix"><!--当前位置-->
<div class="location ared">当前位置：<a href="index.php">首页</a> > 购物流程 > 确认订单信息</div>
<div class="blank"></div>



<form action="flow.php?act=addorder&actgbuy={$actgbuy}" method="post" name="theForm" id="theForm" >
<div class="flowBox">
{if $cartgoods }
    <h6><span>商品列表</span>
    {if $actgbuy}
    	<a style="text-decoration:none;"  href="goods.php?goodsid={$goodsid}&shoppingtype={$shoppingtype}" class="f6">修改</a>
    {else}
    	<a style="text-decoration:none;" href="flow.php?act=index" class="f6">修改</a>
    {/if} 	
    </h6>
             <table width="99%" align="center" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
            <tr>
              <th bgcolor="#ffffff">商品名称</th>
              <th bgcolor="#ffffff">商品属性</th>
              <th bgcolor="#ffffff">市场价格</th>
              <th bgcolor="#ffffff">本店价格</th>
              <th bgcolor="#ffffff">购买数量</th>
              <th bgcolor="#ffffff">小计</th>
            </tr>  
            {foreach from=$cartgoods item=item key=key}
            <tr>
              <td bgcolor="#ffffff">
                   {$item.goodsname}
              </td>
              <td bgcolor="#ffffff">
              <!-- 商品属性参数 -->
               {foreach from=';'|explode:$item.goodsparamenter item=goodsp}
	  				{$goodsp}&nbsp;
	  		   {/foreach}
    		  </td>
              <td align="right" bgcolor="#ffffff">{$item.marketprice} &nbsp;</td>
              <td align="right" bgcolor="#ffffff">{$item.shoppingprice} &nbsp;</td>
              <td align="right" bgcolor="#ffffff">{$item.shoppingnum} &nbsp;</td>
              <td align="right" bgcolor="#ffffff">￥&nbsp;{$item.sumsmall}&nbsp;元 &nbsp;</td>
            </tr>
       	 {/foreach} 
       	  <tr>
       	  		<td bgcolor="#ffffff" colspan="6">
       	 			购物金额总计 
       	 			<font class="pricetype">￥&nbsp;<span id="stotal">{if $cartgoods[0].shopTotal}{$cartgoods[0].shopTotal}{else}0{/if}</span>&nbsp;元
       	 			</font>，比市场价 
             		<font class="pricetype">￥&nbsp;<span id="mtotal">{if $cartgoods[0].marketTotal}{$cartgoods[0].marketTotal}{else}0{/if}</span>&nbsp;元
             		</font>节省了 
             		<font class="pricetype">￥&nbsp;<span id="dismoney">{if $cartgoods[0].disMoney}{$cartgoods[0].disMoney}{else}0{/if}</span>&nbsp;元（&nbsp;<span id="rate">{if $cartgoods[0].rate}{$cartgoods[0].rate}{else}0{/if}</span>&nbsp;%&nbsp;）
             		</font>   	
              </td>
          </tr>   	
        </table>  
</div>
<div class="blank"></div>
      <div class="flowBox">
      <h6><span>收货人信息</span>
       {if $actgbuy}
       		<a href="flow.php?act=consigneeQuery&flag=gbuy" style="text-decoration:none;" class="f6">修改</a>
       {else}
       		<a href="flow.php?act=consigneeQuery" style="text-decoration:none;" class="f6">修改</a>
       {/if}
      </h6>
      <table width="99%" align="center" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
           <tr>
              <td bgcolor="#ffffff">配送区域:</td>
              <td bgcolor="#ffffff" colspan="3">
              {$cosignee.countryname}&nbsp;
              {$cosignee.provincename}&nbsp;
              {if $cosignee.cityname eq '北京'
              	or $cosignee.cityname eq '上海'
              	or $cosignee.cityname eq '天津'
              	or $cosignee.cityname eq '重庆'
              }
              {else}
              {$cosignee.cityname}&nbsp;{/if}
              {$cosignee.districtname}
              </td>
            </tr>
            
            <tr>
              <td bgcolor="#ffffff">收货人姓名:</td>
              <td bgcolor="#ffffff">{$cosignee.consignee}&nbsp;</td>
              <td bgcolor="#ffffff">电子邮件地址:</td>
              <td bgcolor="#ffffff">{$cosignee.email}&nbsp;</td>
            </tr>

            <tr>
              <td bgcolor="#ffffff">详细地址:</td>
              <td bgcolor="#ffffff">{$cosignee.address}&nbsp; </td>
              <td bgcolor="#ffffff">邮政编码:</td>
              <td bgcolor="#ffffff">{$cosignee.zipcode}&nbsp;</td>
            </tr>
            
            <tr>
              <td bgcolor="#ffffff">电话:</td>
              <td bgcolor="#ffffff">{$cosignee.tel}&nbsp;</td>
              <td bgcolor="#ffffff">手机:</td>
              <td bgcolor="#ffffff">{$cosignee.mobile}&nbsp;</td>
            </tr>
             
            <tr>
              <td bgcolor="#ffffff">标志性建筑:</td>
              <td bgcolor="#ffffff">{$cosignee.signbuilding}&nbsp;</td>
              <td bgcolor="#ffffff">最佳送货时间:</td>
              <td bgcolor="#ffffff">{$cosignee.besttime}&nbsp;</td>
            </tr>
         
          </table>
      </div>
 <div class="blank"></div>
<!--  
 <div class="flowBox">
    <h6><span>配送方式</span></h6>
    <table width="99%" align="center" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd" id="shippingTable">
            <tr>
              <th bgcolor="#ffffff" width="5%">&nbsp;</th>
              <th bgcolor="#ffffff" width="15%">配送名称</th>
              <th bgcolor="#ffffff"	width="35%">配送详情</th>
              <th bgcolor="#ffffff" width="15%">邮费</th>
              <th bgcolor="#ffffff" width="15%">免邮额度</th>
              <th bgcolor="#ffffff" width="15%">保价费用</th>
            </tr>
          {foreach from=$shipping item=item key=key}
            <tr>
              <td bgcolor="#ffffff" valign="top">
              <input 
              	name="shipping" 
              	type="radio" 
              	value="{$item.ID}" 
              	id="item_{$item.ID}"
              	{if $item.insure neq 0}
              		onclick="showdivconfirm0(document.getElementById('item_{$item.ID}'),'是否需要保价？','需要','不需要')" 
              	{else}
              		onclick="notissure()"
              	{/if}
              	{if $lastsp.shippingid eq $item.ID} checked {/if}/>     
              </td>
              <td bgcolor="#ffffff" valign="top"><strong>{$item.shippingname}</strong></td>
              <td bgcolor="#ffffff" valign="top">{$item.shippingdesc}</td>
              <td bgcolor="#ffffff" align="right" valign="top">￥&nbsp;{$item.fee}&nbsp;元</td>
              <td bgcolor="#ffffff" align="right" valign="top">￥&nbsp;{$item.freefee}&nbsp;元</td>
              <td bgcolor="#ffffff" align="right" valign="top">{if $item.insure neq 0}{$item.insure}&nbsp;%{else}不支持保价{/if}</td>
            </tr>
        {/foreach}         
            <tr>
              <td colspan="6" bgcolor="#ffffff" align="right">
                <input name="need_insure" id="need_id" type="checkbox" {if $lastsp.issure eq 1} checked value="1" {else} value="0" disabled="disabled" {/if} onclick="isNeedSs()"   />
               		配送是否需要保价</td>
            </tr>
          </table>
    </div>
  -->  
<div class="blank"></div>

<div class="flowBox">
    <h6><span>支付方式</span></h6>
    <table width="99%" align="center" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd" id="paymentTable">
            <tr>
              <th width="5%" bgcolor="#ffffff">&nbsp;</th>
              <th width="20%" bgcolor="#ffffff">支付名称</th>
              <th bgcolor="#ffffff">支付详情</th>
            </tr>
           {foreach from=$payment item=item key=key}
            <tr>
              <td valign="top" bgcolor="#ffffff"><input type="radio" name="payment" value="{$item.ID}" {if $lastsp.payid eq $item.ID} checked {/if} /></td>
              <td valign="top" bgcolor="#ffffff"><strong>{$item.payname}</strong></td>
              <td valign="top" bgcolor="#ffffff">{$item.paydesc}</td>
            </tr>
           {/foreach} 
            
          </table>
    </div>
    <!-- 
<div class="blank"></div>

<div class="flowBox">
    <h6><span>发票信息</span></h6>
    <table width="99%" align="center" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd" id="paymentTable">
            <tr>
              <td bgcolor="#ffffff" width="10%">发票抬头：</td>
              <td valign="top" bgcolor="#ffffff">
              <input type="radio" name="invpay" value="0" 
              {if $lastsp.invtype eq 0} checked {/if} 
              {if $lastsp.isinv eq 0}disabled{/if}  
              onclick="selectInv()"/>个人
              <input type="radio" name="invpay" value="1"
               {if $lastsp.invtype eq 1} checked {/if}
               {if $lastsp.isinv eq 0}disabled{/if}
                onclick="selectInv()"/>单位
              <input type="text" name="invpayee" id="invpayee"
               {if $lastsp.invtype eq 0 or $lastsp.isinv eq 0} disabled {/if} 
               {if $lastsp.invtype eq 1} value="{$lastsp.invpayee}" {/if}/>
              <input name="need_inv" id="need_vid" type="checkbox" value="1" 
              {if $lastsp.isinv eq 1} checked {/if} onclick="isNeedInv()"   />
               		是否需要发票
              </td>
              
            </tr>
            
            <tr>
              <td bgcolor="#ffffff" width="10%">发票内容：</td>
              <td valign="top" bgcolor="#ffffff">
              	<select name="invcontent" id="invcontent">
              		<option value="">&nbsp;</option>
              		 {foreach from=$invcontent item=item key=key} 
              			<option value="{$item.ID}" {if $lastsp.invcID eq $item.ID} selected {/if}>{$item.name}</option>
              		 {/foreach} 
              	</select>
              	<br>
              	数码、手机、家电类商品将默认打印出商品名称和型号
              </td>
            </tr>
          
          </table>
    </div>
     -->
<div class="blank"></div>

 <div class="flowBox">
    <h6><span>费用总计</span></h6>   
	<div id="ECS_ORDERTOTAL">
	<table width="99%" align="center" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">

  <tr>
    <td align="right" bgcolor="#ffffff">
    	<strong>订单完成后，您将获得&nbsp;<font class="f4_b" size=4>{$schoolmoney}</font>&nbsp;校币。</strong>
    </td>
  </tr>
  <tr>
    <td align="right" bgcolor="#ffffff">
      	<strong>商品总价:</strong>&nbsp;<font class="f4_b" size=4>￥&nbsp;{$cartgoods[0].shopTotal}&nbsp;元</font>&nbsp;&nbsp;
      	<strong>运费:</strong>&nbsp;<font class="f4_b" size=4>￥&nbsp;0.00&nbsp;元</font>
    </td>
  </tr>
  <tr>
    <td align="right" bgcolor="#ffffff"> 
    	<strong>应付款:</strong>&nbsp;<font class="f4_b" size=4>￥&nbsp;<span id="s_3">{$cartgoods[0].shopTotal}</span>&nbsp;元</font>
	</td>
  </tr>
</table>
</div>
         
    <div align="center" style="margin:8px auto;">
         <a href="javascript:showdivconfirm1(document.getElementById('sub_id'),'确定订单信息，提交完成后不可再更改！','确定','取消')"><img id="sub_id" src="./templates/images/goods/bnt_subOrder.gif" /></a>
    </div>
    
</div>

</form>
{else}
<br><br><br>
    <center><font size="6">亲，购物车中没有宝贝（或已下订单），请开心购物！</font></center>
<br><br><br>
{/if}
</DIV> 
<script src="./templates/scripts/goods/showdiv.js" type="text/javascript"></script>
<script src="./templates/scripts/goods/orderconfirm.js" type="text/javascript"></script> 
 <!------------------------------------------body over-->
{include file=footer.tpl}