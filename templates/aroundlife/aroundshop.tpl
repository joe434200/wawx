	{include file=header.tpl}
<!------------------------------------------body-->
<DIV class="blank"></DIV>
<DIV class="block clearfix">

<DIV class="AreaL clearfix">

     <!--搜索条件-->
  <div class="box">
  <div class="box_1 clearfix">
  <div class="title_bt"><h3>搜索</h3></div>
  <div class="ex_ss">
  <form action="search.php?aroundact={$aroundact}&searchtype=small" name="smallSearchForm" method="post">
  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="ttbb1">
  <tr>
    <td><input type="text" name="searchkey" onfocus="valuenull()" class="txt_170" value="关键字"/></td>
  </tr>
  <tr>
    <td align="center">
    <input  type="button" onclick="inputValidate()"  class="bnt_price" value="搜索"/>
    </td>
  </tr>
</table>
  </form>
  </div>
  </div>
  </div>
 
  <!--还看过什么-->
  <DIV class="blank5"></DIV>
  <div class="box">
  <div class="box_1 clearfix">
  <div class="title_bt"><h3>还看过什么</h3></div>
  <div class="ex_duihuan ared">
   <ul>
   {section name=shopnames loop=$allshopnamelist}
   <li><a href="shop.php?shopid={$allshopnamelist[shopnames].id}">
   {$allshopnamelist[shopnames].shopname|msubstr:0:13}</a></li>
   {sectionelse}	
	<li>暂时还没看到什么！</li>
   {/section} 
   
   </ul>
  </div>
  </div>
  </div>
  <!--还看过什么-->
  
  
  
  
  
  <!--本月销售榜-->
  <DIV class="blank5"></DIV>
  <div class="box">
  <div class="box_1 clearfix">
  <div class="title_bt"><h3>本月销售榜</h3></div>
  <div class="mouth_sell  clearfix ared">
    <ul>
	{section name=months loop=$monthnumlist start=0 step=1 max=11 show=true}
   <li class="clearfix">
	<a href="goods.php?goodsid={$monthnumlist[months].goodsid}">
	<img src="./uploadfiles/goods/{$monthnumlist[months].goodsimg}" border="0" /></a>
	<div class="wen">
	<p><a href="goods.php?goodsid={$monthnumlist[months].goodsid}">
	{$monthnumlist[months].goodsname|msubstr:0:10}</a></p>
	<p class="num">购买：<span>{$monthnumlist[months].goodsnum}</span></p>
	</div>
	</li>
   {sectionelse}	
	<li>暂时还没商品销售！</li>
   {/section} 
	
	</ul>
  </div>
  </div>
  </div>
  <!--/本月销售榜-->
  
</div>


<DIV class="AreaR clearfix">

<!--今日推荐-->
  <div class="box">
  <div class="box_color clearfix">
      <div class="title_bt"><h3>今日推荐</h3></div>
	  <div class="tehui_list">
	  <ul>
	{if $advertshopslist }  
		{foreach from=$advertshopslist item=item key=key}
	  <li class="clearfix ared">
	  <a href="shop.php?shopid={$item.id}"><img src="./uploadfiles/shop/{$item.shoppicture}" /></a>
	  <h3><a href="shop.php?shopid={$item.id}">{$item.shopname|msubstr:0:16}</a></h3>
	  <em>吾校卡{$item.schooldiscount}折</em>
	  </li>
	 	{/foreach}
	{else}
  		暂时还没有推荐信息！
     {/if} 
	  
	  </ul>
	  </div>
  </div>
  </div>
<!--今日推荐-->



<div class="blank"></div>
<div class="box ared">
  <div class="box_color clearfix">
     <div class="title_bt"><h3>搜索条件</h3></div>
	 <div class="tehui_shuzhi clearfix">
	  <ul>
	  <li><a href="aroundlife.php?aroundact={$aroundact}">全部</a></li>  
  	{section name=foodsearch loop=$foodsearchlist  show=true}
   <li><a href="aroundlife.php?aroundact={$aroundact}&mid={$foodsearchlist[foodsearch].mid}">
   {$foodsearchlist[foodsearch].mname}
   （{$foodsearchlist[foodsearch].snum}）</a></li>
   {sectionelse}	
	<li>暂时还没有商家！</li>
   {/section} 	  
	  </ul>
	  </div>
  </div>
  </div>



 
<!--店铺列表-->
  <div class="box">
  <div class="box_1 clearfix">
  
      <div class="ec_paixu clearfix ared">
	  <ul>
	  <li class="bt">排序</li>
	  {if $act eq 'mknum'}
	  	{if $nextOrder eq 'DESC'}
	  	 <li class="up" id="order1"><a id="order11" class="afont"  href="aroundlife.php?aroundact={$aroundact}&act=mknum&mid={$mid}&order={$nextOrder}" title="销量由高到低">销量</a></li>
	  	 {else}
	  	 <li class="up" id="order1"><a id="order11" class="afont"  href="aroundlife.php?aroundact={$aroundact}&act=mknum&mid={$mid}&order={$nextOrder}" title="销量由低到高">销量</a></li>
	  	 {/if}
	  {else}
	  <li class="down" id="order1"><a id="order11" href="aroundlife.php?aroundact={$aroundact}&act=mknum&mid={$mid}" title="销量由高到低">销量</a></li>
	  {/if}
	  {if $act eq 'comment'}
	  	 {if $nextOrder eq 'DESC'}
	  	 <li class="up" id="order2"><a id="order22" class="afont" href="aroundlife.php?aroundact={$aroundact}&act=comment&mid={$mid}&order={$nextOrder}" title="好评由高到低">好评</a></li>
	  	 {else}
	  	  <li class="up" id="order2"><a id="order22" class="afont" href="aroundlife.php?aroundact={$aroundact}&act=comment&mid={$mid}&order={$nextOrder}" title="好评由低到高">好评</a></li>
	  	 {/if}
	  {else}
	  <li class="down" id="order2"><a id="order22" href="aroundlife.php?aroundact={$aroundact}&act=comment&mid={$mid}" title="好评由高到低">好评</a></li>
	  {/if}
	  {if $act eq 'discount'}
	  	{if $nextOrder eq 'DESC'}
	  <li class="up" id="order3"><a id="order33" class="afont" href="aroundlife.php?aroundact={$aroundact}&act=discount&mid={$mid}&order={$nextOrder}" title="折扣由高到低">折扣</a></li>
	  	{else}
	  	<li class="up" id="order3"><a id="order33" class="afont" href="aroundlife.php?aroundact={$aroundact}&act=discount&mid={$mid}&order={$nextOrder}" title="折扣由低到高">折扣</a></li>
	  	{/if}
	  {else}
	  <li class="down" id="order3"><a id="order33" href="aroundlife.php?aroundact={$aroundact}&act=discount&mid={$mid}" title="折扣由高到低">折扣</a></li>
	  {/if}
	  {if $act eq 'effecttime'}
	  	{if $nextOrder eq 'DESC'}
	  	<li class="up" id="order4"><a id="order44" class="afont" href="aroundlife.php?aroundact={$aroundact}&act=effecttime&mid={$mid}&order={$nextOrder}" title="入驻时间由晚到早">入驻时间</a></li>
	  	{else}
	  	<li class="up" id="order4"><a id="order44" class="afont" href="aroundlife.php?aroundact={$aroundact}&act=effecttime&mid={$mid}&order={$nextOrder}" title="入驻时间由早到晚">入驻时间</a></li>
	  	{/if}
	  {else}
	  <li class="down" id="order4"><a id="order44" href="aroundlife.php?aroundact={$aroundact}&act=effecttime&mid={$mid}" title="入驻时间由晚到早">入驻时间</a></li>
	  {/if}
	  </ul>
	  </div>
	  
	  <div class="ec_list">
	  <ul>
   {section name=shopall loop=$shopalllist start=0 step=1 max=12 show=true}	  
	  <li>
	  <a href="shop.php?shopid={$shopalllist[shopall].sid}"><img src="./uploadfiles/shop/{$shopalllist[shopall].spic}" /></a>
	  <p class="ared top5" align="center"><a href="shop.php?shopid={$shopalllist[shopall].sid}">{$shopalllist[shopall].sname|msubstr:0:15}</a></p>
	  <p class="top5"  align="center"><span class="color_999">吾校卡消费</span> <span class="forum_red">{$shopalllist[shopall].sdiscount} 折</span></p>
	  </li>
   {sectionelse}	
	<li>暂时还没店铺信息！</li>
   {/section} 	  
	  
	  </ul>
	  </div>
	  
	  <!--页码-->
<DIV class="blank"></DIV>
<DIV class="clearfix">
<div class="num">
<DIV class="num_pg">

<script type="text/javascript">
    var pg1 = new showPages('pg1');
	pg1.pageCount = '{$pagecount}';
	pg1.argName = 'p';
	pg1.printHtml();
</script>

</DIV>
</div>
</div>
<!--页码 end-->
<div class="blank"></div>


  </div>
  </div>
<!--店铺列表-->



</DIV>
<script src="./templates/scripts/goods/aroundshop.js" type="text/javascript"></script>
<!------------------------------------------body over-->
{include file=footer.tpl}