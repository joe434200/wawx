{include file=header.tpl}
<!------------------------------------------body-->
<DIV class="blank"></DIV>
<DIV class="block clearfix"><!--当前位置-->
<div class="location ared">当前位置：<a href="index.php">首页</a> > <a href="aroundlife.php">校边生活</a> > 推荐商家
</div>
<div class="blank"></div>
<div class="AreaRM">
<!--热点商家 列表-->
<div class="box">
<div class="box_4 ared clearfix">
<div class="life_bt"><span></span><h3>推荐商家</h3></div>
<div class="life_listM clearfix">
<ul>
{section name=recshops loop=$recommendshoplist}
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