{include file=header.tpl}
<!------------------------------------------body-->
<DIV class="blank"></DIV>
<DIV class="block clearfix"><!--当前位置-->
<div class="location ared">当前位置：<a href="index.php">首页</a> > <a href="index.php?act=studentwill">学生惠</a> > 特色区
</div>
<div class="blank"></div>
<div class="AreaRM">

<!--特色区 列表 start-->
<DIV class="box_1">
<div class="group_bt ared"><span></span>
  <h3>特色区</h3></div>
<div class="group_indexM">
<ul class="ared">
 {section name=sgoods loop=$sgoodslist}
<li>
    <div class="new_i"></div> <!--此代码是右上角的“新单”标记-->
    <div class="pic"><img src="./uploadfiles/goods/{$sgoodslist[sgoods].newing}" /></div>
	<div class="zk">
	<p class="price">市场价：<em>￥{$sgoodslist[sgoods].mkp}</em></p>
	<p class="price2"><em>{$sgoodslist[sgoods].udisc}</em>折</p>
	<p class="num"><em>{$sgoodslist[sgoods].mnum}</em>件售出</p>
	</div>	
	<div class="qkk">
	<p class="price"><strong>￥</strong>{$sgoodslist[sgoods].vopricen}.<em>{$sgoodslist[sgoods].vopricem}</em></p>
	<p class="ann"><a href="goods.php?goodsid={$sgoodslist[sgoods].id}&shoppingtype=1"><img src="./templates/images/goods/stud_7.png" border="0" /></a></p>
	</div>
	<div class="bt"><a href="goods.php?goodsid={$sgoodslist[sgoods].id}&shoppingtype=1">{$sgoodslist[sgoods].gbf|msubstr:0:20}</a></div>
</li>  
  {sectionelse}
	<li>暂时还没有特色商品！</li>
  {/section}

<!--循环数据-->
</ul>
</div></div>
<!--/特色区 列表-->
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