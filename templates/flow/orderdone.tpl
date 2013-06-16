	{include file=header.tpl}
<!------------------------------------------body-->
<DIV class="blank"></DIV>
<DIV class="block clearfix"><!--当前位置-->
<div class="location ared">当前位置：<a href="index.php">首页</a> > 购物流程 > 订单完成</div>
        <div class="flowBox" style="margin:30px auto 70px auto;">
         <h6 style="text-align:center; height:30px; line-height:30px;">感谢您在本站购物！您的订单已提交成功，
         	请记住您的订单号: <font style="color:red" size='5'>{$order.ordersn}</font></h6>
        <div class="flowBox">
   
             <table width="99%" align="center" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
            <tr>
              <th bgcolor="#ffffff">商品名称</th>
              <th bgcolor="#ffffff">商品属性</th>
              <th bgcolor="#ffffff">购买价格</th>
              <th bgcolor="#ffffff">成功购买数量</th>
              <th bgcolor="#ffffff">小计</th>
            </tr>  
            {foreach from=$sucgoods item=item key=key}
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
              <td align="right" bgcolor="#ffffff">{$item.shopprice} &nbsp;</td>
              <td align="right" bgcolor="#ffffff">{$item.shopnum} &nbsp;</td>
              <td align="right" bgcolor="#ffffff">￥&nbsp;{$item.sumsmall}&nbsp;元 &nbsp;</td>
            </tr>
       	 {/foreach} 
       	  <tr>
       	  		<td bgcolor="#ffffff" colspan="5" align="right">
       	 			<strong>您的应付款金额为<font color=red  size='4'>￥&nbsp;{$order.orderamount}&nbsp;元</font>
       	 			；&nbsp;付款成功后，您将获得<font color=red size='4'>&nbsp;{$order.schoolmoney}</font>&nbsp;校币。</strong>
              </td>
          </tr>   	
        </table>  
</div> 
 		{if $order.payname}
          <table width="99%" align="center" border="0" cellpadding="15" cellspacing="0" bgcolor="#fff" style="border:1px solid #ddd; margin:20px auto;" > 
            <tr>
              <td align="center" bgcolor="#FFFFFF">
              	您选定的支付方式为: <strong><font color=red size='4'>{$order.payname}</font></strong>。
              </td>
            </tr>
            <tr>
              <td align="center" bgcolor="#FFFFFF"><strong><font size='4'>{$pay.paydesc}</font></strong>
            {$paybutton}
           
            <!--  
            {if $pay.paycode eq 'online'}
            <form action="pay.php" method="post" target="_blank">
            	<input type="hidden" name="oid" value="{$order.ordersn}"/>
            	<input type="hidden" name="transamt" value="{$order.orderamount}"/>
            	<input type="submit"  class="anniu10" value="支付确认"/>
            </form>
             {/if}
             -->
            </tr>
          </table>
       {/if}
          </div>

</DIV> 
 <!------------------------------------------body over-->
{include file=footer.tpl}