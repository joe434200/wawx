	{include file=header.tpl}
<!------------------------------------------body-->
<DIV class="blank"></DIV>
<DIV class="block clearfix">
<div class="banner1000">
<a href="{$stuadvertise.linkid}" target="_blank"><img src="./uploadfiles/goods/{$stuadvertise.realname}" /></a>
</div>

<DIV class="blank"></DIV>
<DIV class="block clearfix">
<div class="AreaR clearfix">

<!--团购区 列表 start-->
<DIV class="box_1">
<div class="group_bt ared"><span><a href="more.php?mact=morerevolume">更多</a></span>
  <h3>团购区</h3></div>
<div class="group_index">
<ul class="ared">
 {section name=vgoods loop=$vgoodslist start=0 step=1 max=9 show=true}
<li>
    <div class="new_i"></div> <!--此代码是右上角的“新单”标记-->
    <div class="pic"><img src="./uploadfiles/goods/{$vgoodslist[vgoods].newing}" /></div>
	<div class="zk">
	<p class="price">市场价：<em>￥{$vgoodslist[vgoods].mkp}</em></p>
	<p class="price2"><em>{$vgoodslist[vgoods].vdisc}</em>折</p>
	<p class="num"><em>{$vgoodslist[vgoods].grnum}</em>人团购</p>
	</div>	
	<div class="qkk">
	<p class="price"><strong>￥</strong>{$vgoodslist[vgoods].vopricen}.<em>{$vgoodslist[vgoods].vopricem}</em></p>
	<p class="ann"><a href="goods.php?goodsid={$vgoodslist[vgoods].id}&shoppingtype=2"><img src="./templates/images/goods/stud_7.png" border="0" /></a></p>
	</div>
	<div class="bt"><a href="goods.php?goodsid={$vgoodslist[vgoods].id}&shoppingtype=2">{$vgoodslist[vgoods].gbf|msubstr:0:20}</a></div>
</li>  
  {sectionelse}
	<li>暂时还没有团购商品！</li>
  {/section}
</ul>
</div></div>
<!--/团购区 列表-->


<!--特色区 列表 start-->

<DIV class="blank"></DIV>
<DIV class="box_1">
<div class="group_bt ared"><span><a href="more.php?mact=morerespecial">更多</a></span>
  <h3>特色区</h3></div>
<div class="group_index">
<ul class="ared">
 {section name=sgoods loop=$sgoodslist start=0 step=1 max=9 show=true}
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
</div>



<div class="AreaLL clearfix">




<!--本周热销单品-->
<DIV class="box">
<DIV class="box_1">
<div class="title_bt"><span class="a666"><a href="javascript:changehotgoods();" id="changegoods">换一组</a></span>
  <h3>本周热销单品</h3></div>
  <DIV class="stud_hot clearfix ared" id="hotgoods">
  <ul>
   {section name=hots loop=$weekhotlist start=0 step=1 max=11 show=true}
    <li class="clearfix">
  	<a href="goods.php?goodsid={$weekhotlist[hots].ID}&shoppingtype={$weekhotlist[hots].shoptype}"><img src="./uploadfiles/goods/{$weekhotlist[hots].newimg}" /></a>
  	<h3><a href="goods.php?goodsid={$weekhotlist[hots].ID}&shoppingtype={$weekhotlist[hots].shoptype}">{$weekhotlist[hots].goodsname|msubstr:0:12}</a></h3>
  	<p class="f_red">￥{$weekhotlist[hots].shopprice}</p>
  	</li>
  {sectionelse}
	<li>暂时还没有热销商品！</li>
  {/section}
  </ul>
  </DIV>
</DIV>
</DIV>
<!--本周热销单品 end-->





<!--最新排行-->
<div class="blank"></div>
<DIV class="box">
<DIV class="box_1">
<div class="title_bt"><span class="a666"><a href="javascript:changenewestgoods();" id="cnewestgoods">换一组</a></span>
  <h3>最新排行</h3></div>
  <DIV class="stud_hot clearfix ared" id="newestgoods">
  <ul>
   {section name=newest loop=$newestlist start=0 step=1 max=11 show=true}
    <li class="clearfix">
  	<a href="goods.php?goodsid={$newestlist[newest].ID}&shoppingtype={$weekhotlist[hots].shoptype}"><img src="./uploadfiles/goods/{$newestlist[newest].newimg}" /></a>
  	<h3><a href="goods.php?goodsid={$newestlist[newest].ID}&shoppingtype={$weekhotlist[hots].shoptype}">{$newestlist[newest].goodsname|msubstr:0:12}</a></h3>
  	<p class="f_red">￥{$newestlist[newest].shopprice}</p>
  	</li>
  {sectionelse}
	<li>暂时还没有最新商品！</li>
  {/section}
  
  </ul>
  </DIV>
</DIV>
</DIV>
<!--最新排行 end-->
</div>
</div>
</div>
{literal}
<script type="text/javascript">
	var j=0;
	var k=0;
	//换一组热销商品
	function changehotgoods(){
		var num=++j;
		//var a=(如果是数值){/literal}smarty数值变量{literal};(如果是字符串)'{/literal}smarty字符串变量{literal}';
		var a= {/literal}{$weekhotlistjs}{literal};
		var table="<ul>";
        var count=0;
        if(a.length<=11){
			//到最后一组，连接不可再点击
			document.getElementById('changegoods').removeAttribute("href");
			return;
		}
   		//每组显示10个元素
		for(var i=num*11;i<a.length;i++){
		   count++;
		   table=table+" <li class='clearfix'><a href='goods.php?goodsid="+a[i].ID+"'><img src='./uploadfiles/goods/"+a[i].newimg+"'></a> ";
		   table=table+"<h3><a href='goods.php?goodsid="+a[i].ID+"'>"+a[i].goodsname.substr(0,12)+"</a></h3> ";
		   table=table+"<p class='f_red'>￥"+a[i].shopprice+"</p></li>";
		   if(i==a.length-1){
			   //到最后一组，连接不可再点击
			   document.getElementById('changegoods').removeAttribute("href");
		   }
		   if(count==11){
			   break;
		   }
		 }
		table=table+"</ul>";
		document.getElementById("hotgoods").innerHTML = table;
	}

	
	//换一组最新排行
	function changenewestgoods(){
		var num=++k;
		//var a=(如果是数值){/literal}smarty数值变量{literal};(如果是字符串)'{/literal}smarty字符串变量{literal}';
		var a= {/literal}{$newestlistjs}{literal};
		var table="<ul>";
        var count=0;
        if(a.length<=11){
			//到最后一组，连接不可再点击
			document.getElementById('cnewestgoods').removeAttribute("href");
			return;
		}
   		//每组显示11个元素
		for(var i=num*11;i<a.length;i++){
		   count++;
		   table=table+" <li class='clearfix'><a href='goods.php?goodsid="+a[i].ID+"'><img src='./uploadfiles/goods/"+a[i].newimg+"'></a> ";
		   table=table+"<h3><a href='goods.php?goodsid="+a[i].ID+"'>"+a[i].goodsname.substr(0,12)+"</a></h3> ";
		   table=table+"<p class='f_red'>￥"+a[i].shopprice+"</p></li>";
		   if(i==a.length-1){
			   //到最后一组，连接不可再点击
			   document.getElementById('cnewestgoods').removeAttribute("href");
		   }
		   
		   if(count==11){
			   break;
		   }
		 }
		
		table=table+"</ul>";
		document.getElementById("newestgoods").innerHTML = table;
	}
</script>
{/literal}
<!------------------------------------------body over-->
{include file=footer.tpl}