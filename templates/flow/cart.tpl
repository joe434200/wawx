	{include file=header.tpl}
<!------------------------------------------body-->

<DIV class="blank"></DIV>
<DIV class="block clearfix"><!--当前位置-->
<div class="location ared">当前位置：<a href="index.php">首页</a> > 购物流程 > 购物车 </div>
<div class="blank"></div> 
<div>
  <div class="flowBox">
  {if $cartgoods}
    <h6><span>商品列表</span></h6>
        <form id="formCart" name="formCart" method="post" action="">
           <table width="99%" align="center" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
            <tr>
              <th bgcolor="#ffffff">商品名称</th>
              <th bgcolor="#ffffff">商品属性</th>
              <th bgcolor="#ffffff">市场价格</th>
              <th bgcolor="#ffffff">本店价格</th>
              <th bgcolor="#ffffff">购买数量</th>
              <th bgcolor="#ffffff">小计</th>
              <th bgcolor="#ffffff">操作</th>
            </tr>  
            {foreach from=$cartgoods item=item key=key}
            <tr>
              <td bgcolor="#ffffff" align="center">
                    <a href="goods.php?goodsid={$item.goodsid}&shoppingtype={$item.shoppingtype}" ><img style="width: 100px;height: 100px;"
					 src="./uploadfiles/goods/{$item.newimg}" border="0" title="{$item.goodsname}" /></a><br>
                    <a style="text-decoration:none;" href="goods.php?goodsid={$item.goodsid}&shoppingtype={$item.shoppingtype}"  class="f6" >{$item.goodsname}</a>
              </td>
              <td bgcolor="#ffffff">
              <!-- 商品属性参数 -->
               {foreach from=';'|explode:$item.goodsparamenter item=goodsp}
	  				{$goodsp}<br>
	  			{/foreach}
    		  </td>
              <td align="right" bgcolor="#ffffff"><span id="mprice_{$item.goodsid}">{$item.marketprice}</span> </td>
              <td align="right" bgcolor="#ffffff"><span id="sprice_{$item.goodsid}">{$item.shoppingprice}</span> </td>
              <td align="center" bgcolor="#ffffff">
                <a href="javascript:subadd(document.getElementById('id_{$item.goodsid}'),{$item.goodsid},'sub')"><img src="./templates/images/goods/sub.jpg"  title="数量减一" /></a>
                <input type="text" name="goods_number" id="id_{$item.goodsid}" value="{$item.shoppingnum}" size="4"
                 class="inputBg" style="text-align:center" onchange="subadd(document.getElementById('id_{$item.goodsid}'),{$item.goodsid},'auto')"/>
                <a href="javascript:subadd(document.getElementById('id_{$item.goodsid}'),{$item.goodsid},'add')"><img src="./templates/images/goods/add.jpg" title="数量加一" /></a>
              </td>
              <td align="right" bgcolor="#ffffff">￥&nbsp;<span id="ssum_{$item.goodsid}">{$item.sumsmall}</span>&nbsp;元 </td>
              <td align="center" bgcolor="#ffffff">
              	<a style="text-decoration:none;" href="javascript:collectGoods({$item.goodsid},{$item.shoppingtype})" class="f6" id="coll_{$item.goodsid}" title="收藏">收藏</a><br>
                <a style="text-decoration:none;" href="javascript:showdivconfirm(document.getElementById('del_{$item.goodsid}'),'确定从购物车中删除该商品吗？','确定','取消','flow.php?act=delete&goodsid={$item.goodsid}')"  id="del_{$item.goodsid}" class="f6" title="删除">删除</a>
              </td>
            </tr>
       	 {/foreach}    	
          </table>
          <table width="99%" align="center" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
            <tr>  
              <td bgcolor="#ffffff">
             		购物金额总计(不含运费) <font class="pricetype">￥&nbsp;<span id="stotal">{if $cartgoods[0].shopTotal}{$cartgoods[0].shopTotal}{else}0{/if}</span>&nbsp;元</font>，比市场价 
             		<font class="pricetype">￥&nbsp;<span id="mtotal">{if $cartgoods[0].marketTotal}{$cartgoods[0].marketTotal}{else}0{/if}</span>&nbsp;元</font>
             		 节省了 <font class="pricetype">￥&nbsp;<span id="dismoney">{if $cartgoods[0].disMoney}{$cartgoods[0].disMoney}{else}0{/if}</span>&nbsp;元（&nbsp;<span id="rate">{if $cartgoods[0].rate}{$cartgoods[0].rate}{else}0{/if}</span>&nbsp;%&nbsp;）</font>
              </td>
              <td align="right" bgcolor="#ffffff">
                <input type="button" value="清空购物车" class="bnt_blue_1" id="bnt11" onclick="showdivconfirm(document.getElementById('bnt11'),'确定清空购物车吗？','确定','取消','flow.php?act=clear')"  />
              </td>
            </tr>
          </table>
        </form>
        <table width="99%" align="center" border="0" cellpadding="5" cellspacing="0" bgcolor="#dddddd">
          <tr>
            <td bgcolor="#ffffff"><a href="./"><img src="./templates/images/goods/continue.gif" alt="continue" /></a></td>
            <td bgcolor="#ffffff" align="right">
            <a href="flow.php?act=checkout"><img src="./templates/images/goods/checkout.gif" alt="checkout" /></a>
            </td>
          </tr>
        </table>
        {else}
        	<br><br><br>
        	<center><font size="6">亲，购物车中没有宝贝（或已下订单），请开心购物！</font></center>
        	<br><br><br>
        {/if}
  </div>
    <div class="blank"></div>
	<div class="flowBox">
  
    <h6><span>我的收藏</span></h6>
     {if $smarty.session.loginok eq 0 or $smarty.session.loginok eq ''}
    	<br>
    		<center>请登录！</center>
    	<br>
    {else}
    	{if $collgoods}
           <table width="99%" align="center" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
            <tr>
              <th bgcolor="#ffffff">商品名称</th>
              <th bgcolor="#ffffff">市场价格</th>
              <th bgcolor="#ffffff">本店价格</th>
              <th bgcolor="#ffffff">操作</th>
            </tr>  
            {foreach from=$collgoods item=item1 key=key}
            <tr>
              <td bgcolor="#ffffff" align="center">
                    {$item1.goodsname}
              </td>
           
              <td align="right" bgcolor="#ffffff">{$item1.marketprice}</td>
              <td align="right" bgcolor="#ffffff">{$item1.shopprice}</td>
              
              <td align="center" bgcolor="#ffffff">
              {if $item1.collecttype eq '5'}
              	<a style="text-decoration:none;" href="goods.php?goodsid={$item1.ID}" class="f6"  title="去看看">去看看</a>
              {elseif $item1.collecttype eq '6'}
              	<a style="text-decoration:none;" href="goods.php?goodsid={$item1.ID}&shoppingtype=1" class="f6"  title="去看看">去看看</a>
              {elseif $item1.collecttype eq '7'}
              	<a style="text-decoration:none;" href="goods.php?goodsid={$item1.ID}&shoppingtype=2" class="f6"  title="去看看">去看看</a>
              {elseif $item1.collecttype eq '8'}
              	<a style="text-decoration:none;" href="goods.php?act=exchange&goodsid={$item1.ID}" class="f6"  title="去看看">去看看</a>
              {/if}
              	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <a style="text-decoration:none;" href="javascript:showdivconfirm(document.getElementById('del1_{$item1.ID}'),'确定从收藏中删除吗？','确定','取消','foucsandrecom.php?acttype=delete&goodsid={$item1.ID}&userid={$item1.idt_user}')"  id="del1_{$item1.ID}"  class="f6" title="删除">删除</a>
              </td>
            </tr>
       	 {/foreach} 
       	   </table>   	
      {else}
        	<br>
        	<center>亲，您还没有收藏！</center>
        	<br>
      {/if}
   {/if}
  </div>    
     
 </div>
 </DIV>
<script src="./templates/scripts/goods/showdiv.js" type="text/javascript"></script>
<script src="./templates/scripts/goods/cart.js" type="text/javascript"></script>
 <!------------------------------------------body over-->
{include file=footer.tpl}