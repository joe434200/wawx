	{include file=header.tpl}
<!------------------------------------------body-->
<DIV class="blank"></DIV>
<DIV class="block clearfix">
<DIV class="AreaL">
<!--左侧本地商户 导航-->
<div class="upper_box">
<DIV class="red_bt"><span>本地商户</span></DIV>
<ul>
 {if $aroundshop }
   		{foreach from=$aroundshop item=item key=key}
		<li><h3 class="title{$key+1}"><a href="aroundlife.php?aroundact={$item.ID}">{$item.name}</a></h3></li>
		{/foreach} 
   {else}
  		暂时还没有本地商户！
   {/if}
</ul>
</div>
<!--左侧本地商户 导航 end -->
</div>


<DIV class="AreaR">

   <!--中间广告-->
   <DIV id="focus2">
   	<a href="{$lifeadvertise.linkid}" target="_blank"><img src="./uploadfiles/goods/{$lifeadvertise.realname}" /></a>
   </DIV>
   <!--end-->
   
</DIV>


</DIV>





<DIV class="blank"></DIV>
<DIV class="block clearfix">
<DIV class="AreaL750">

<!--品牌商家模块-->
 <DIV class="blank"></DIV>
 <div class="box">
<div class="box_4 ared clearfix">
<div class="life_bt"><span><a href="more.php?mact=morebrand">更多</a></span><h3>品牌商家</h3></div>
<div class="life_nr clearfix">
<ul>
{section name=brands loop=$brandshoplist start=0 step=1 max=9 show=true}
 	{if $smarty.section.brands.index%3 eq 0}
 		<li class="fir">
 			<div class="color_{$smarty.section.brands.index%6}">
 				<p class="pic"><a href="shop.php?shopid={$brandshoplist[brands].id}">
 				<img src="./uploadfiles/shop/{$brandshoplist[brands].shoppicture}" /></a></p>
    			<p class="wz"><strong>{$brandshoplist[brands].shopname|msubstr:0:5}</strong>
    			<em><span>{$brandshoplist[brands].discount}</span>折现金卡</em></p>
  			</div>
	    </li> 
	{else}	
		 <li>
 			<div class="color_{$smarty.section.brands.index%6}">
 				<p class="pic"><a href="shop.php?shopid={$brandshoplist[brands].id}">
 				<img src="./uploadfiles/shop/{$brandshoplist[brands].shoppicture}" /></a></p>
    			<p class="wz"><strong>{$brandshoplist[brands].shopname|msubstr:0:5}</strong>
    			<em><span>{$brandshoplist[brands].discount}</span>折现金卡</em></p>
  			</div>
	    </li> 		
 	{/if}
{sectionelse}	
	<li>暂时还没有品牌商家！</li>
{/section} 

</ul>
</div>
</div>
</DIV>
<!--end-->


<!--推荐商家 模块-->
 <DIV class="blank"></DIV>
 <div class="box">
<div class="box_4 ared clearfix">
<div class="life_bt"><span><a href="more.php?mact=morerecom">更多</a></span><h3>推荐商家</h3></div>
<div class="life_list clearfix">
<ul>
{section name=recshops loop=$recommendshoplist start=0 step=1 max=15 show=true}
<li>
  <div>
    <p class="pic"><a href="shop.php?shopid={$recommendshoplist[recshops].id}">
    <img src="./uploadfiles/shop/{$recommendshoplist[recshops].shoppicture}" /></a></p>
    <p class="wz">
    <strong><a href="shop.php?shopid={$recommendshoplist[recshops].id}">{$recommendshoplist[recshops].shopname|msubstr:0:8}</a>
    </strong><em><span>{$recommendshoplist[recshops].discount}折现金卡</span></em></p>
  </div>
</li>
{sectionelse}	
	<li>暂时还没有推荐商家！</li>
{/section}
</ul>
</div>
</div></div>
<!--end-->



</div>



<DIV class="AreaRR clearfix">
<!--最新商家 模块-->
<DIV class="blank5"></DIV>
<DIV class="box">
<DIV class="box_1">
   <div class="title_bt"><h3>最新商家</h3></div>
   <div class="new_shop_nr">
   <div id="new_shop" style="overflow:hidden;height:290px;width:218px;">
   <div id="new_shop1">
   <ul>
   {section name=newshops loop=$newshoplist start=0 step=1 max=10   show=true}
	<li>
		<p class="pic"><a href="shop.php?shopid={$newshoplist[newshops].id}">
		<img src="./uploadfiles/shop/{$newshoplist[newshops].shoppicture}" /></a></p>
    	<p class="ared"><strong><a href="shop.php?shopid={$newshoplist[newshops].id}">{$newshoplist[newshops].shopname|msubstr:0:8}</a></strong></p>
		<p class="a999">吾校卡<span>{$newshoplist[newshops].schooldiscount}</span>折</p>  	
	</li>
	{sectionelse}	
	<li>暂时还没有最新商家！</li>
	{/section}
   </ul>
   </div>
   <div id="new_shop2"></div>
   </div>

   
   </div>
   </div>
</DIV>
<!--end-->



<!--听他们说 评论模块-->
<DIV class="blank5"></DIV>
<DIV class="box">
<DIV class="box_1">
   <div class="title_bt"><h3>听他们说</h3></div>
   <div class="share_nr clearfix">
   
   <div class="rooller">
   <ul  id="rooller_s"  class="rooller_s">
<!-- 店铺评论start -->	
   {section name=shopc loop=$shopcommentlist  show=true}
   <li>
	  <div class="title a999_line"><span>
	  <a href="#{$shopcommentlist[shopc].userid}">{$shopcommentlist[shopc].tscuser|msubstr:0:4}</a></span>说：
	  	{$shopcommentlist[shopc].shopname|msubstr:0:11}</div>
      <div class="plun">
      <a href="shop.php?shopid={$shopcommentlist[shopc].shopid}">
      <img src="./uploadfiles/shop/{$shopcommentlist[shopc].spicture}" />
      </a>
      <p>{$shopcommentlist[shopc].tscc|msubstr:0:28}</p>
      </div>
      <div class="xb"><span>{$shopcommentlist[shopc].comtime}</span>
      赢：<em>{$shopcommentlist[shopc].tscschool}</em>校币</div>
	</li>
	{sectionelse}	
	<li>暂时还没有店铺评论！</li>
	{/section}
<!-- 店铺评论end -->	
	
<!-- 商品评论start -->	
	
 <!--    {section name=goodsc loop=$goodscommentlist  show=true}
   <li>
	  <div class="title a999_line"><span>
	  <a href="#{$goodscommentlist[goodsc].userid}">{$goodscommentlist[goodsc].tgcuser|msubstr:0:4}</a></span>说：
	  <a href="#{$goodscommentlist[goodsc].gcid}">
	  	{$goodscommentlist[goodsc].tgcc|msubstr:0:11}</a></div>
      <div class="plun">
      <img src="./templates/images/goods/{$goodscommentlist[goodsc].gpicture}" />
      <p>{$goodscommentlist[goodsc].tgcc|msubstr:0:28}</p>
      </div>
      <div class="xb"><span>{$goodscommentlist[goodsc].comtime}</span>
      赢：<em>{$goodscommentlist[goodsc].tgcschool}</em>校币</div>
	</li>
	{sectionelse}	
	<li>暂时还没有商品评论！</li>
	{/section}	
	-->
<!-- 商品评论end -->	
	
   </ul>
   </div>
   
   <script type="text/javascript" src="./templates/scripts/goods/rooller.js"></script>
   {literal}
   <script type="text/javascript">
   var speed=40;
	var new_shop = document.getElementById("new_shop");
	var new_shop1= document.getElementById("new_shop1");
	var new_shop2= document.getElementById("new_shop2");
	new_shop2.innerHTML=new_shop1.innerHTML;
	function Marqueer(){
		if(new_shop2.offsetTop-new_shop.scrollTop<=0)
			new_shop.scrollTop-=new_shop1.offsetTop;
		else{
			new_shop.scrollTop++;
		}
	}
	var MyMarr=setInterval(Marqueer,speed);
	new_shop.onmouseover=function() {clearInterval(MyMarr)};
	new_shop.onmouseout=function() {MyMarr=setInterval(Marqueer,speed)};
		new slider({id:'rooller_s'})
   </script>
  {/literal}
  </div>
</DIV>
</DIV>
<!--end-->
 

</DIV>
</div>
<!------------------------------------------body over-->
{include file=footer.tpl}