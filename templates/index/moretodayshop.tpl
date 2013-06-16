{include file=header.tpl}
<!------------------------------------------body-->
<DIV class="blank"></DIV>
<DIV class="block clearfix"><!--当前位置-->
<div class="location ared">当前位置：<a href="index.php">首页</a> > 今日推荐
</div>
<div class="blank"></div>
<div class="AreaRM">
<!--今日推荐 列表-->
<DIV class="blank5"></DIV>
<div class="box">
<div class="box_color ared">
<div class="title_bt"><span></span><h3>今日推荐</h3></div>
<div class="itemgood_nrM clearfix">
<ul>

{section name=shop loop=$todayshoplist}
<li>
  <div>
    <p class="pic"><a href="shop.php?shopid={$todayshoplist[shop].id}"><img src="./uploadfiles/shop/{$todayshoplist[shop].shoppicture}" /></a></p>
    <p class="wz"><strong><a href="shop.php?shopid={$todayshoplist[shop].id}">{$todayshoplist[shop].shopname|msubstr:0:8}</a></strong><em><span>{$todayshoplist[shop].discount}折现金卡</span></em></p>
  </div>		
</li>
{sectionelse}
  		<div><li>暂时还没有商家信息！</li></div>
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
<!--今日推荐 列表 end-->
 </div>
 </div>
<!------------------------------------------body over-->
{include file=footer.tpl}