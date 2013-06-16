{include file=header.tpl}
<!------------------------------------------body-->
<DIV class="blank"></DIV>
<DIV class="block clearfix"><!--当前位置-->
<div class="location ared">当前位置：<a href="index.php">首页</a> > <a href="aroundlife.php">校边生活</a> > 品牌商家
</div>
<div class="blank"></div>
<div class="AreaRM">
<!--热点商家 列表-->
<div class="box">
<div class="box_4 ared clearfix">
<div class="life_bt"><span></span><h3>品牌商家</h3></div>
<div class="life_nrM clearfix">
<ul>
{section name=brands loop=$brandshoplist}
	<li>
 		<div class="color_{$smarty.section.brands.index%6}">
 			<p class="pic"><a href="shop.php?shopid={$brandshoplist[brands].id}">
 			<img src="./uploadfiles/shop/{$brandshoplist[brands].shoppicture}" /></a></p>
    		<p class="wz"><strong>{$brandshoplist[brands].shopname|msubstr:0:5}</strong>
    		<em><span>{$brandshoplist[brands].discount}</span>折现金卡</em></p>
  		</div>
	</li> 		
{sectionelse}	
	<li>暂时还没有品牌商家！</li>
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
<!--热点商家 列表 end-->
 </div>
 </div>
<!------------------------------------------body over-->
{include file=footer.tpl}