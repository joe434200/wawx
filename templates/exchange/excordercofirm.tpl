	{include file=header.tpl}
<!------------------------------------------body-->
<DIV class="blank"></DIV>
<DIV class="block clearfix"><!--当前位置-->
<div class="location ared">当前位置：<a href="index.php">首页</a> > 校币兑换 > 确认订单信息</div>
<div class="blank"></div>


<form action="flow.php?act=exchangeorder" method="post" name="theForm" id="theForm" >
<div class="flowBox">
{if $exchgoods}
    <h6><span>商品列表</span>
    	<a style="text-decoration:none;"  href="goods.php?act=exchange&goodsid={$goodsid}" class="f6">修改</a>
    </h6>
             <table width="99%" align="center" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
            <tr>
              <th bgcolor="#ffffff">商品名称</th>
              <th bgcolor="#ffffff">商品属性</th>
              <th bgcolor="#ffffff">市场价格</th>
              <th bgcolor="#ffffff">单件耗币</th>
              <th bgcolor="#ffffff">兑换数量</th>
              <th bgcolor="#ffffff">耗币总计</th>
            </tr>  
            <tr>
              <td bgcolor="#ffffff">
                   {$exchgoods.goodsname}
              </td>
              <td bgcolor="#ffffff">
              <!-- 商品属性参数 -->
               {foreach from=';'|explode:$exchgoods.goodsparamenter item=goodsp}
	  				{$goodsp}&nbsp;
	  		   {/foreach}
    		  </td>
              <td align="right" bgcolor="#ffffff">￥&nbsp;{$exchgoods.marketprice}&nbsp;元</td>
              <td align="right" bgcolor="#ffffff">{$exchgoods.exchangemoney}&nbsp;校币</td>
              <td align="right" bgcolor="#ffffff">{$exchgoods.mknum}&nbsp;件</td>
              <td align="right" bgcolor="#ffffff">{$exchgoods.sumcoins}&nbsp;校币</td>
            </tr>
        </table>  
</div>
<div class="blank"></div>
      <div class="flowBox">
      <h6><span>收货人信息</span><a href="flow.php?act=consigneeQuery&flag=exchange" style="text-decoration:none;" class="f6">修改</a></h6>
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

<div class="flowBox">
    <h6><span>费用总计</span></h6>   
	<div id="ECS_ORDERTOTAL">
	<table width="99%" align="center" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">

  <tr>
    <td align="right" bgcolor="#ffffff">
    	<strong>订单完成后，您将消耗&nbsp;<font class="f4_b" size=4>{$exchgoods.sumcoins}</font>&nbsp;校币。</strong>
    </td>
  </tr>
  <tr>
    <td align="right" bgcolor="#ffffff">
      	<strong>商品总价:</strong>&nbsp;<font class="f4_b" size=4>￥&nbsp;0.00&nbsp;元</font>&nbsp;&nbsp;
      	<strong>运费:</strong>&nbsp;<font class="f4_b" size=4>￥&nbsp;0.00&nbsp;元</font>
    </td>
  </tr>
  <tr>
    <td align="right" bgcolor="#ffffff"> 
    	<strong>应付款:</strong>&nbsp;<font class="f4_b" size=4>￥&nbsp;<span id="s_3">0.00</span>&nbsp;元</font>
	</td>
  </tr>
</table>
</div>
         
    <div align="center" style="margin:8px auto;">
         <a href="javascript:showdivconfirm2(document.getElementById('sub_id'),'确定订单信息，提交完成后不可再更改！','确定','取消')"><img id="sub_id" src="./templates/images/goods/bnt_subOrder.gif" /></a>
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