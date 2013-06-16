	{include file=header.tpl}
<!------------------------------------------body-->
<DIV class="blank"></DIV>
<DIV class="block clearfix"><!--当前位置-->
<div class="location ared">当前位置：<a href="index.php">首页</a> >校币兑换 > 订单完成</div>
        <div class="flowBox" style="margin:30px auto 70px auto;">
         <h6 style="text-align:center; height:30px; line-height:30px;">感谢您在本站购物！您的订单已提交成功，
         	请记住您的订单号: <font style="color:red" size=5>{$order.ordersn}</font></h6>
        <div class="flowBox">
   
           <table width="99%" align="center" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
            <tr>
              <th bgcolor="#ffffff">商品名称</th>
              <th bgcolor="#ffffff">商品属性</th>
              <th bgcolor="#ffffff">单件耗币</th>
              <th bgcolor="#ffffff">兑换数量</th>
              <th bgcolor="#ffffff">耗币总计</th>
            </tr>  
            <tr>
              <td bgcolor="#ffffff">
                   {$sucgoods.goodsname}
              </td>
              <td bgcolor="#ffffff">
              <!-- 商品属性参数 -->
               {foreach from=';'|explode:$sucgoods.goodsparamenter item=goodsp}
	  				{$goodsp}&nbsp;
	  		   {/foreach}
    		  </td>
              <td align="right" bgcolor="#ffffff">{$sucgoods.simpleschoolmoney} &nbsp;</td>
              <td align="right" bgcolor="#ffffff">{$sucgoods.shopnum} &nbsp;</td>
              <td align="right" bgcolor="#ffffff">{$sucgoods.scoins}&nbsp;</td>
            </tr>
       	  <tr>
       	  		<td bgcolor="#ffffff" colspan="5" align="right">
       	 			<strong>此次兑换，您消耗了&nbsp;<font size=4 color=red>{$sucgoods.scoins}</font>&nbsp;校币。</strong>
              </td>
          </tr>   	
        </table>  
</div> 
 
</div>

</DIV>  
 <!------------------------------------------body over-->
{include file=footer.tpl}