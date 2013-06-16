{include file=header.tpl}
<!------------------------------------------body-->
<DIV class="blank"></DIV>
<DIV class="block clearfix"><!--当前位置-->
<div class="location ared">当前位置：
<a href="index.php">首页</a> > <a href="aroundlife.php?aroundact={$around.ID}">{$around.name}</a> > 搜索结果
</div>
  <div class="shop_wenben">
<div class="clearfix">
    <div id="show_menu">
    <UL id="tags">
    {if $pagekey eq 'pg_1' or $pagekey eq ''}
    <LI class=selectTag>
    {else}
    <LI>
    {/if}
    
    <A onClick="selectTag('tagContent0',this)" href="javascript:void(0)">宝贝（{$goodsnum}）</A> </LI>
    {if $pagekey eq 'pg_2'}
    <LI class=selectTag>
    {else}
    <LI>
    {/if}
    <A onClick="selectTag('tagContent1',this)" href="javascript:void(0)">店铺（{$shopnum}）</A> </LI>
    </UL>
    </div>
    {if $pagekey eq 'pg_1' or $pagekey eq ''}
		<div id="tagContent0" style="DISPLAY: block">
	{else}
		<div id="tagContent0" style="DISPLAY: none">
	{/if}
  
	<div class="show_all_plun1">
 <div class="box">
  <div class="box_1 clearfix">
  
      <div class="ec_paixu clearfix ared">
	  <ul>
	  <li class="bt">排序</li>
	  {if $actorder1 eq 'mknum1'}
	  	{if $nextOrder eq 'DESC'}
	  	 	<li class="up" id="order01"><a id="order011" class="afont" href="search.php?aroundact={$aroundact}&actorder1=mknum1&searchkey={$searchkey}&pagekey=pg_1&searchtype=small&order={$nextOrder}" title="销量由高到低">销量</a></li>
	  	{else}
	  		<li class="up" id="order01"><a id="order011" class="afont" href="search.php?aroundact={$aroundact}&actorder1=mknum1&searchkey={$searchkey}&pagekey=pg_1&searchtype=small&order={$nextOrder}" title="销量由低到高">销量</a></li>
	  	{/if}
	  {else}
	  <li class="down" id="order01"><a id="order011" href="search.php?aroundact={$aroundact}&actorder1=mknum1&searchkey={$searchkey}&pagekey=pg_1&searchtype=small" title="销量由高到低">销量</a></li>
	  {/if}
	  {if $actorder1 eq 'price'}
	  	{if $nextOrder eq 'DESC'}
	   		<li class="up" id="order02"><a id="order022" class="afont" href="search.php?aroundact={$aroundact}&actorder1=price&searchkey={$searchkey}&pagekey=pg_1&searchtype=small&order={$nextOrder}" title="价格由高到低">价格</a></li>
	   	{else}
	   		<li class="up" id="order02"><a id="order022" class="afont" href="search.php?aroundact={$aroundact}&actorder1=price&searchkey={$searchkey}&pagekey=pg_1&searchtype=small&order={$nextOrder}" title="价格由低到高">价格</a></li>
	   	{/if}
	   {else}
	  <li class="down" id="order02"><a id="order022" href="search.php?aroundact={$aroundact}&actorder1=price&searchkey={$searchkey}&pagekey=pg_1&searchtype=small" title="价格由高到低">价格</a></li>
	  {/if}
	  {if $actorder1 eq 'discount1'}
	  	{if $nextOrder eq 'DESC'}
	  		<li class="up" id="order03"><a id="order033" class="afont" href="search.php?aroundact={$aroundact}&actorder1=discount1&searchkey={$searchkey}&pagekey=pg_1&searchtype=small&order={$nextOrder}" title="折扣由高到低">折扣</a></li>
	  	{else}
	  		<li class="up" id="order03"><a id="order033" class="afont" href="search.php?aroundact={$aroundact}&actorder1=discount1&searchkey={$searchkey}&pagekey=pg_1&searchtype=small&order={$nextOrder}" title="折扣由低到高">折扣</a></li>
	  	{/if}
	  {else}
	 <li class="down" id="order03"><a id="order033" href="search.php?aroundact={$aroundact}&actorder1=discount1&searchkey={$searchkey}&pagekey=pg_1&searchtype=small" title="折扣由高到低">折扣</a></li>
	   {/if}
	  {if $actorder1 eq 'addtime'}
	  	{if $nextOrder eq 'DESC'}
	  		<li class="up" id="order04"><a id="order044" class="afont" href="search.php?aroundact={$aroundact}&actorder1=addtime&searchkey={$searchkey}&pagekey=pg_1&searchtype=small&order={$nextOrder}" title="上架时间由晚到早">上架时间</a></li>
	  	{else}
	  		<li class="up" id="order04"><a id="order044" class="afont" href="search.php?aroundact={$aroundact}&actorder1=addtime&searchkey={$searchkey}&pagekey=pg_1&searchtype=small&order={$nextOrder}" title="上架时间由早到晚">上架时间</a></li>
	  	{/if}
	  {else}
	  <li class="down" id="order04"><a id="order044" href="search.php?aroundact={$aroundact}&actorder1=addtime&searchkey={$searchkey}&pagekey=pg_1&searchtype=small" title="上架时间由晚到早">上架时间</a></li>
	  {/if}
	  </ul>
	  </div>
 
	  <div class="ec_list1">
	  <ul>
   {section name=goods loop=$goodsalllist}	  
	  <li>
	  <a href="goods.php?goodsid={$goodsalllist[goods].ID}"><img src="./uploadfiles/shop/{$goodsalllist[goods].newimg}" /></a>
	  <p class="ared top5" align="center"><a href="goods.php?goodsid={$goodsalllist[goods].ID}">{$goodsalllist[goods].goodsname|msubstr:0:15}</a></p>
	  <p class="top5"  align="center"><span class="color_999">市场价格</span> <span class="forum_red">￥{$goodsalllist[goods].marketprice}</span></p>
	  <p class="top5"  align="center"><span class="color_999">本店价格</span> <span class="forum_red">￥{$goodsalllist[goods].shopprice}</span></p>
	  </li>
   {sectionelse}	
	<li>没找到心意的宝贝！</li>
   {/section} 	  
	  
	  </ul>
	  </div>
	  
	  <!--页码-->
<DIV class="blank"></DIV>
<DIV class="clearfix">
<div class="num">
<DIV class="num_pg">

<script type="text/javascript">
    var pg_1 = new showPages('pg_1');
	pg_1.pageCount = '{$pagecount}';
	pg_1.argName = 'p';
	pg_1.printHtml();
</script>

</DIV>
</div>
</div>
<!--页码 end-->


<div class="blank"></div>


  </div>
  </div>	
</div>
</div>
</DIV>
</div>
  
  
  
<!--店铺列表-->
{if $pagekey eq 'pg_2'}
		<div id="tagContent1" style="DISPLAY: block">
	{else}
		<div id="tagContent1" style="DISPLAY: none">
	{/if}
	<div class="show_all_plun1">
  <div class="box">
  <div class="box_1 clearfix">
  
      <div class="ec_paixu clearfix ared">
	  <ul>
	  <li class="bt">排序</li>
	  {if $actorder eq 'mknum'}
	  	{if $nextOrder eq 'DESC'}
	  		<li class="up" id="order1"><a id="order11" class="afont" href="search.php?aroundact={$aroundact}&actorder=mknum&searchkey={$searchkey}&pagekey=pg_2&searchtype=small&order={$nextOrder}"  title="销量由高到低">销量</a></li>
	  	{else}
	  		<li class="up" id="order1"><a id="order11" class="afont" href="search.php?aroundact={$aroundact}&actorder=mknum&searchkey={$searchkey}&pagekey=pg_2&searchtype=small&order={$nextOrder}"  title="销量由低到高">销量</a></li>
	  	{/if}
	  {else}
	  <li class="down" id="order1"><a id="order11"  href="search.php?aroundact={$aroundact}&actorder=mknum&searchkey={$searchkey}&pagekey=pg_2&searchtype=small"  title="销量由高到低">销量</a></li>
	  {/if}
	  {if $actorder eq 'comment'}
	  	{if $nextOrder eq 'DESC'}
	   		<li class="up" id="order2"><a id="order22" class="afont" href="search.php?aroundact={$aroundact}&actorder=comment&searchkey={$searchkey}&pagekey=pg_2&searchtype=small&order={$nextOrder}"  title="好评由高到低">好评</a></li>
	  	{else}
	  		<li class="up" id="order2"><a id="order22" class="afont" href="search.php?aroundact={$aroundact}&actorder=comment&searchkey={$searchkey}&pagekey=pg_2&searchtype=small&order={$nextOrder}"  title="好评由低到高">好评</a></li>
	  	{/if}
	  {else}
	  <li class="down" id="order2"><a id="order22" href="search.php?aroundact={$aroundact}&actorder=comment&searchkey={$searchkey}&pagekey=pg_2&searchtype=small"  title="好评由高到低">好评</a></li>
	  {/if}
	  {if $actorder eq 'discount'}
	  	{if $nextOrder eq 'DESC'}
	   		<li class="up" id="order3"><a id="order33" class="afont" href="search.php?aroundact={$aroundact}&actorder=discount&searchkey={$searchkey}&pagekey=pg_2&searchtype=small&order={$nextOrder}"  title="折扣由高到低">折扣</a></li>
	  	{else}
	  		<li class="up" id="order3"><a id="order33" class="afont" href="search.php?aroundact={$aroundact}&actorder=discount&searchkey={$searchkey}&pagekey=pg_2&searchtype=small&order={$nextOrder}"  title="折扣由低到高">折扣</a></li>
	  	{/if}
	  {else}
	  <li class="down" id="order3"><a id="order33" href="search.php?aroundact={$aroundact}&actorder=discount&searchkey={$searchkey}&pagekey=pg_2&searchtype=small"  title="折扣由高到低">折扣</a></li>
	  {/if}
	  {if $actorder eq 'effecttime'}
	  	{if $nextOrder eq 'DESC'}
	   		<li class="up" id="order4"><a id="order44" class="afont" href="search.php?aroundact={$aroundact}&actorder=effecttime&searchkey={$searchkey}&pagekey=pg_2&searchtype=small&order={$nextOrder}"  title="入驻时间由晚到早">入驻时间</a></li>
	  	{else}
	  		<li class="up" id="order4"><a id="order44" class="afont" href="search.php?aroundact={$aroundact}&actorder=effecttime&searchkey={$searchkey}&pagekey=pg_2&searchtype=small&order={$nextOrder}"  title="入驻时间由早到晚">入驻时间</a></li>
	  	{/if}
	  {else}
	  <li class="down" id="order4"><a id="order44" href="search.php?aroundact={$aroundact}&actorder=effecttime&searchkey={$searchkey}&pagekey=pg_2&searchtype=small"  title="入驻时间由晚到早">入驻时间</a></li>
	  {/if}
	  </ul>
	  </div>

	  <div class="ec_list1">
	  <ul>
   {section name=shopall loop=$shopalllist}	  
	  <li>
	  <a href="shop.php?shopid={$shopalllist[shopall].sid}"><img src="./uploadfiles/shop/{$shopalllist[shopall].spic}" /></a>
	  <p class="ared top5" align="center"><a href="shop.php?shopid={$shopalllist[shopall].sid}">{$shopalllist[shopall].sname|msubstr:0:15}</a></p>
	  <p class="top5"  align="center"><span class="color_999">吾校卡消费</span> <span class="forum_red">{$shopalllist[shopall].sdiscount} 折</span></p>
	  </li>
   {sectionelse}	
	<li>没找到心意的宝贝！</li>
   {/section} 	  
	  
	  </ul>
	  </div>
	  
	  <!--页码-->
<DIV class="blank"></DIV>
<DIV class="clearfix">
<div class="num">
<DIV class="num_pg">

<script type="text/javascript">
    var pg_2 = new showPages('pg_2');
	pg_2.pageCount = '{$pagecount1}';
	pg_2.argName = 'p2';
	pg_2.printHtml();
</script>

</DIV>
</div>
</div>
<!--页码 end-->
<div class="blank"></div>


  </div>
  </div>
  
  </div></div>
<!--店铺列表-->

</div>
<script src="./templates/scripts/goods/selecttag.js" type="text/javascript"></script>
<!------------------------------------------body over-->
{include file=footer.tpl}