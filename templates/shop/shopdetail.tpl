{include file=header.tpl}
<!------------------------------------------body-->

<DIV class="blank"></DIV>
<DIV class="block clearfix"><!--当前位置-->
<div class="location ared">当前位置：<a href="index.php"> 首页 </a> > <a href="aroundlife.php">校边生活</a>
{if $shop.mID} > <a href="aroundlife.php?aroundact={$shop.mID}"> {$shop.name}</a>{/if} >  商家
</div>
<!--end-->

<DIV class="blank"></DIV>

<!--end-->
<div id="goodsInfo" class="clearfix">
<div class="imgInfo">
{if $pictures} 
<a href="javascript:;"
	onclick="window.open('gallery.php?shopid={$shop.ID}'); return false;">
<img class=thumb src="./uploadfiles/shop/{$shop.shoppicture}"
	alt="{$shop.shopname}" /> </a> 
{else}
 <img class=thumb src="./uploadfiles/shop/{$shop.shoppicture}"
	alt="{$shop.shopname}" /> 
{/if}
<div class="blank5"></div>
<!--相册 START--> 
{if $pictures}

<div class="clearfix"><span onmouseover="moveLeft()"
	onmousedown="clickLeft()" onmouseup="moveLeft()"
	onmouseout="scrollStop()"></span>
<div class="gallery">
<div id="demo">
<div id="demo1" style="float: left">
<ul>
	{foreach from=$pictures item=picture}
	<li><a href="gallery.php?shopid={$shop.ID}" target="_blank"> <img
		class="B_blue" src="./uploadfiles/shop/{$picture.newimg}"
		alt="{$shop.shopname}" /></a></li>
	{/foreach}
</ul>
</div>
<div id="demo2" style="display: inline; overflow: visible;"></div>
</div>
</div>
<span class="spanR" onmouseover="moveRight()" onmousedown="clickRight()"
	onmouseup="moveRight()" onmouseout="scrollStop()"></span> 

      </div>
{/if} <!--相册 END-->
<div class="blank5"></div>
</div>
</div>
<!--end--> <!--商品表述-->
<div class="goods_desc clearfix">
<div class="bt">{$shop.shopname|msubstr:0:30}</div>
<div class="nr clearfix">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td width="69%">
		<p><span>电话:</span>{$shop.telephone}</p>
		<p><span>地址:</span>{$shop.address}</p>
		<p class="top5">{if $shop.issignshop} <img
			src="./templates/images/goods/sh_icon1.gif" /> {/if} {if
		$shop.isrecommendshop} <img
			src="./templates/images/goods/sh_icon2.gif" /> {/if} {if
		$shop.iscertificationshop} <img
			src="./templates/images/goods/sh_icon3.gif" /> {/if}</p>
		</td>
		<td width="14%"><img src="./templates/images/goods/card.gif" /></td>
		<td width="17%">
		<p class="zhekou">{$shop.schooldiscount}折</p>
		</td>
	</tr>
</table>
</div>

<div class="card"><br>
<input type="button" class="sh_bnt"  onclick="recomCheck(this,'{$shop.ID}','{$shop.shopname}')" value="推荐给社区朋友赢校币" />&nbsp;&nbsp;
<input type="button" class="sh_bnt2" onclick="focusCheck(this,'{$shop.ID}')" value="关注" />

</div>

</div>
<!--end--> <!--好评率-->
<div class="goods_pjia clearfix">
<div class="name">好评：<em>{if $comment.cnum}{$comment.cnum}{else }0{/if}%</em></div>
<DIV class="blank5"></DIV>
<div class="star clearfix">
<ul>
	<!-- 星级样式“star_1”到“star_8”-->
	<li>
	<div class="kk">服务:</div>
	{if $comment.service eq 0}
	<div class="star_8"></div>
	{elseif $comment.service gt 0 and $comment.service lte 1}
	<div class="star_7"></div>
	{elseif $comment.service gt 1 and $comment.service lt 2.5}
	<div class="star_6"></div>
	{elseif $comment.service gte 2.5 and $comment.service lt 3}
	<div class="star_5"></div>
	{elseif $comment.service gte 3 and $comment.service lt 3.5}
	<div class="star_4"></div>
	{elseif $comment.service gte 3.5 and $comment.service lt 4}
	<div class="star_3"></div>
	{elseif $comment.service gte 4 and $comment.service lt 4.5}
	<div class="star_2"></div>
	{elseif $comment.service gte 4.5 and $comment.service lte 5}
	<div class="star_1"></div>
	{/if}</li>

	<li>
	<div class="kk">口味:</div>
	{if $comment.taste eq 0}
	<div class="star_8"></div>
	{elseif $comment.taste gt 0 and $comment.taste lte 1}
	<div class="star_7"></div>
	{elseif $comment.taste gt 1 and $comment.taste lt 2.5}
	<div class="star_6"></div>
	{elseif $comment.taste gte 2.5 and $comment.taste lt 3}
	<div class="star_5"></div>
	{elseif $comment.taste gte 3 and $comment.taste lt 3.5}
	<div class="star_4"></div>
	{elseif $comment.taste gte 3.5 and $comment.taste lt 4}
	<div class="star_3"></div>
	{elseif $comment.taste gte 4 and $comment.taste lt 4.5}
	<div class="star_2"></div>
	{elseif $comment.taste gte 4.5 and $comment.taste lte 5}
	<div class="star_1"></div>
	{/if}</li>

	<li>
	<div class="kk">环境:</div>
	{if $comment.environment eq 0}
	<div class="star_8"></div>
	{elseif $comment.environment gt 0 and $comment.environment lte 1}
	<div class="star_7"></div>
	{elseif $comment.environment gt 1 and $comment.environment lt 2.5}
	<div class="star_6"></div>
	{elseif $comment.environment gte 2.5 and $comment.environment lt 3}
	<div class="star_5"></div>
	{elseif $comment.environment gte 3 and $comment.environment lt 3.5}
	<div class="star_4"></div>
	{elseif $comment.environment gte 3.5 and $comment.environment lt 4}
	<div class="star_3"></div>
	{elseif $comment.environment gte 4 and $comment.environment lt 4.5}
	<div class="star_2"></div>
	{elseif $comment.environment gte 4.5 and $comment.environment lte 5}
	<div class="star_1"></div>
	{/if}</li>

	<li>
	<div class="kk">性价比:</div>
	{if $comment.costperformance eq 0}
	<div class="star_8"></div>
	{elseif $comment.costperformance gt 0 and $comment.costperformance lte
	1}
	<div class="star_7"></div>
	{elseif $comment.costperformance gt 1 and $comment.costperformance lt
	2.5}
	<div class="star_6"></div>
	{elseif $comment.costperformance gte 2.5 and $comment.costperformance
	lt 3}
	<div class="star_5"></div>
	{elseif $comment.costperformance gte 3 and $comment.costperformance lt
	3.5}
	<div class="star_4"></div>
	{elseif $comment.costperformance gte 3.5 and $comment.costperformance
	lt 4}
	<div class="star_3"></div>
	{elseif $comment.costperformance gte 4 and $comment.costperformance lt
	4.5}
	<div class="star_2"></div>
	{elseif $comment.costperformance gte 4.5 and $comment.costperformance
	lte 5}
	<div class="star_1"></div>
	{/if}</li>
</ul>
</div>

<div class="fbdp clearfix">
<input type="button" class="bnt_plun" onClick="selectTag('tagContent1',this)" value="发表评论" />
</div>

</div>
<!--end--></div>



<DIV class="blank"></DIV>
<DIV class="block clearfix">
<div class="shop_wenben">
<div class="descript">

<div id="menu">
<UL id="tags">
	{if $pagekey eq 'pg_1' or $pagekey eq ''}
		<LI class=selectTag>
	{else}
		<LI>
	{/if}
	<A onClick="selectTag('tagContent0',this)"
		href="javascript:void(0)">商家详情</A></LI>
	{if $pagekey eq 'pg_2'}
		<LI class=selectTag>
	{else}
		<LI>
	{/if}
	<A onClick="selectTag('tagContent1',this)"
		href="javascript:void(0)">网友点评</A></LI>
</UL>
</div>

<div class="menu_con"><!--商家简介-->
{if $pagekey eq 'pg_1' or $pagekey eq ''}
	<div id="tagContent0" style="DISPLAY: block">
{else}
	<div id="tagContent0" style="DISPLAY: none">
{/if}
<div class="bt">商家详情</div>
<div class="nr">{$shop.summary}</div>

<div class="bt2">产品展示</div>
<div class="nr2">
<ul>
	{section name=goods loop=$shopgoods start=0 step=1 max=8 show=true}
	<li>
	<div class="pic">
	<a href="goods.php?goodsid={$shopgoods[goods].ID}"> 
	<img src="./uploadfiles/goods/{$shopgoods[goods].newimg}" border="0" />
	</a></div>
	<p>商品名称: {$shopgoods[goods].goodsname|msubstr:0:7}</p>
	<p>商品价格: <em>￥{$shopgoods[goods].marketprice}元</em></p>
	<p>校卡价格: <em>￥{$shopgoods[goods].schooldprice}元</em></p>
	</li>
	{sectionelse}
	<li>暂时还没有商品信息！</li>
	{/section}

</ul>
</div>

<!--页码-->
<DIV class="blank"></DIV>
<div class="num_pg">
<DIV class="red_pg">
<script type="text/javascript">
    var pg_1 = new showPages('pg_1');
    pg_1.pageCount = '{$pagecount}';
    //pg_1.pageCount=5;
    pg_1.argName = 'p';
    pg_1.printHtml();
</script>
</DIV>
</div>
<!--页码 end--></div>

<!--所有评价-->
{if $pagekey eq 'pg_2'}
	<div id="tagContent1" style="DISPLAY: block">
{else}
	<div id="tagContent1" style="DISPLAY: none">
{/if}
<!--评论详细-->
<div class="all_plun">
<table width="100%" border="0" cellspacing="0" cellpadding="0"
	class="all_ttbb">
	{section name=scom loop=$comdetail start=0 step=1 max=5 show=true}
	<tr>
		<td valign="top" class="pl">{$comdetail[scom].content}<span>[{$comdetail[scom].commenttime}]</span></td>
		<td valign="top" class="addr">{$comdetail[scom].shopname}</td>
		<td valign="top" class="name">{$comdetail[scom].nickname} {if
		$comdetail[scom].level eq 1}
		<p class="jibie1"></p>
		{elseif $comdetail[scom].level eq 2}
		<p class="jibie2"></p>
		{elseif $comdetail[scom].level eq 3}
		<p class="jibie3"></p>
		{elseif $comdetail[scom].level eq 4}
		<p class="jibie4"></p>
		{elseif $comdetail[scom].level eq 5}
		<p class="jibie5"></p>
		{/if}</td>
		<!--此处级别样式从'jibie1'到'jibie5'-->
	</tr>
	{sectionelse}
	<tr>
		<td>亲暂时还没有评论！</td>
	</tr>
	{/section}

</table>
</div>
<!--评论详细 end--> <!--页码-->
<DIV class="blank"></DIV>
<div class="num_pg">
<DIV class="red_pg">
<script type="text/javascript">
    var pg_2 = new showPages('pg_2');
	pg2.pageCount = '{$pagecount1}';
    //pg_2.pageCount=10;
	pg_2.argName = 'p2';
	pg_2.printHtml();
</script>
</DIV>
</div>
<!--页码 end--> 

<!--发表点评 开始--> 

<form action="gscomment.php?commenttype=shopcom" method="post" name="rateForm">
<DIV class="blank"></DIV>
<div class="input_pl">
<div class="input_bt">发表点评</div>
<table width="100%" border="0" cellspacing="0" cellpadding="0"
	class="input_ttbb">
	<tr>
		<td width="12%" align="right" valign="top"><span class="color_red">*</span>总体评价:</td>
		<td width="88%" valign="top">&nbsp;&nbsp; 
		<input type="radio" onclick="changecom('2')" name="commentrank" checked value="2" />好&nbsp;&nbsp; 
		<input type="radio" onclick="changecom('1')" name="commentrank" value="1" />中&nbsp;&nbsp;
		<input type="radio" onclick="changecom('0')" name="commentrank" value="0" />差&nbsp;&nbsp;

		<div class="xing"><!--对应“评价好”-->
		<div class="jiantou1" id="commentV"><img src="./templates/images/goods/dian4.jpg" /></div>
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td align="center"><span><div id="show1">服务（较好）</div></span>
				<p onmouseover="rate(this,event,'1')" id="showimg1">
				<input type="hidden" name="service" value="4" />
				<img
					src="./templates/images/goods/bright.jpg" title="很差"><img
					src="./templates/images/goods/bright.jpg" title="一般"><img
					src="./templates/images/goods/bright.jpg" title="还好"><img
					src="./templates/images/goods/bright.jpg" title="较好"><img
					src="./templates/images/goods/dark.jpg" title="很好"></p>
				</td>
				<td align="center"><span><div id="show2">质量（较好）</div></span>
				 
				<p onmouseover="rate(this,event,'2')" id="showimg2">
				<input type="hidden" name="taste" value="4" />
				<img
					src="./templates/images/goods/bright.jpg" title="很差"><img
					src="./templates/images/goods/bright.jpg" title="一般"><img
					src="./templates/images/goods/bright.jpg" title="还好"><img
					src="./templates/images/goods/bright.jpg" title="较好"><img
					src="./templates/images/goods/dark.jpg" title="很好"></p>
				</td>
				<td align="center"><span><div id="show3">环境（较好）</div></span>
				
				<p onmouseover="rate(this,event,'3')" id="showimg3">
				<input type="hidden" name="environment" value="4" />
				<img
					src="./templates/images/goods/bright.jpg" title="很差"><img
					src="./templates/images/goods/bright.jpg" title="一般"><img
					src="./templates/images/goods/bright.jpg" title="还好"><img
					src="./templates/images/goods/bright.jpg" title="较好"><img
					src="./templates/images/goods/dark.jpg" title="很好"></p>
				</td>
				<td align="center"><span><div id="show4">性价比（较好）</div></span>
				 
				<p onmouseover="rate(this,event,'4')" id="showimg4">
				<input type="hidden" name="costperformance" value="4" />
				<img
					src="./templates/images/goods/bright.jpg" title="很差"><img
					src="./templates/images/goods/bright.jpg" title="一般"><img
					src="./templates/images/goods/bright.jpg" title="还好"><img
					src="./templates/images/goods/bright.jpg" title="较好"><img
					src="./templates/images/goods/dark.jpg" title="很好"></p>
				</td>
			</tr>
		</table>
		</div>
	</td>
	</tr>
	<tr>
		<td align="right" valign="top"><span class="color_red">*</span>评价:</td>
		<td valign="top">
{if $smarty.session.loginok eq 0 or $smarty.session.loginok eq ''}
		<textarea name="content"  disabled="disabled" rows="5" style="width: 101%;">亲，成功登录用户才能评价！
		</textarea>
{else}
	{if $iscom}
		<textarea name="content" disabled="disabled" rows="5" style="width: 101%;">亲，您已经评价过该用户！
		</textarea>
	{else}
		<textarea name="content"  rows="5" style="width: 101%;">亲，请您对该店铺进行评价！
		</textarea>
	{/if}
{/if}
		</td>
	</tr>
</table>
<input type="hidden" name="commentTotal" />
<input type="hidden" name="shopid" value="{$shop.ID}"/>
<div align="center">
{if $smarty.session.loginok eq 0 or $smarty.session.loginok eq ''}
	<input type="button"  class="anniu10" value="发表点评"/>
{else}
	{if $iscom}
		<input type="button"  class="anniu10" value="发表点评"/>
	{else}
		<input type="button"  class="anniu10" onclick="subForm()" value="发表点评"/>
	{/if}
{/if}	
</div>
</div>
</form>
<!--发表点评 end--></div>
</div>
</div>

<!--右侧地图-->
<div class="map">
<div class="bt">
<h3>地图</h3>
</div>
<div class="pic"><img src="./uploadfiles/shop/{$shop.mapurl}" /></div>

<div class="bt">
<h3>关注用户</h3>
</div>
<div class="peo_pic">
<ul>
	{section name=fuser loop=$focususer start=0 step=1 max=18 show=true}
	<li><a href="#{$focususer[fuser].ID}"> <img
		src="./uploadfiles/goods/{$focususer[fuser].photo}" /> </a></li>
	{sectionelse}
	<li>亲暂时还没有用户关注！</li>
	{/section}
</ul>
</div>
</div>
<!--右侧地图 end--></div>
</div>

<script src="./templates/scripts/goods/gallery.js" type="text/javascript"></script>	
<script src="./templates/scripts/goods/showdiv.js" type="text/javascript"></script>
<script src="./templates/scripts/goods/shopdetail.js" type="text/javascript"></script>
<script src="./templates/scripts/goods/selecttag.js" type="text/javascript"></script>
<!------------------------------------------body over-->
{include file=footer.tpl}
