	{include file=header.tpl}
<!------------------------------------------body-->
<DIV class="blank"></DIV>
<DIV class="block clearfix">
<div style="width:1000px; float:left;">
<div id="marquee0"   style="overflow:hidden;width:1000px; height:14px; float:left; margin:0 auto; background:#d1d1d1; padding:3px 0;">
   <DIV style="OVERFLOW: hidden; WIDTH: 10000px">
   <div id="marquee0_1">
   {if $exchangelist }
   		{foreach from=$exchangelist item=item key=key}
			会员好{$item.username}兑换了{$item.exchangenum}件{$item.goodsname}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		{/foreach} 
   {else}
  		暂时还没有兑换信息！
   {/if}
   </div>
  
   <div id="marquee0_2" style="WIDTH: 1000px"></div>
   </div>
   </div>
</div>

</DIV>

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


<!--销售排行-->
<DIV class="blank5"></DIV>
<DIV class="box">
<DIV class="box_2">
<DIV class="top10Tit"><span>销售排行</span></DIV>
<DIV class="top10List clearfix">
   {if $top10goodslist }
   		{foreach from=$top10goodslist item=item key=key}
		<UL class="clearfix"><IMG class="iteration" src="./templates/images/goods/top_{$key+1|cat:'.gif'}">  
  			<LI class="topimg"><A href="goods.php?goodsid={$item.id}"><IMG class="samllimg" alt="" src="./uploadfiles/goods/{$item.newimg}"></A> </LI>
  			<LI class="iteration1"><A title="" href="goods.php?goodsid={$item.id}">{$item.goodsname|msubstr:0:15}</A><BR>本店售价：<FONT class=f1>￥{$item.shopprice}元</FONT><BR></LI>
		</UL>
		{/foreach} 
   {else}
  		暂时还没有销售信息！
   {/if}

</DIV>
</DIV>
</DIV>
<!--销售排行 end -->


<!--花校币-->
<DIV class="blank5"></DIV>
<DIV class="box">
<DIV class="box_1">
   <div class="title_bt"><h3>花校币</h3></div>
   <div class="spend_nr">
      <div class="ann" align="center"><span><a href="exchange.php?act=drawlottery">抽奖</a></span> <span class="last"><a href="exchange.php?act=index">校币兑换</a></span></div>
      <div class="tj">
        <p class="pic">
        <a href="{$leftadvertise.linkid}" target="_blank"><img src="./uploadfiles/goods/{$leftadvertise.realname}" /></a></p>
        <!-- <img src="./templates/images/goods/stud_16.jpg"  /></p>
        <h3 class="ared"><a href="#">话剧《食物链》门票套票</a></h3>
        <p class="wz a999_line">发起品牌：金名堂文化</p>
		<p class="fx">已有<em>10</em>人参加</p>
        <p class="fx">花<em>1000</em>枚校币</p> -->
      </div>
   </div>
   </div>
</DIV>
<!--花校币 end-->






<DIV class="blank5"></DIV>
<DIV class="box">
<DIV class="box_1">
<div class="title_bt"><span class="a666"><a href="javascript:changehotgrp();" id="grpschange">换一组</a></span>
  <h3>热点圈子</h3></div>
<DIV class="beauty clearfix ared" id="grps">
   <ul>

   {section name=grps loop=$hotgrplist start=0 step=1 max=15 show=true}
 	<li><A href="#{$hotgrplist[grps].id}"><IMG class=iteration src="./uploadfiles/goods/{$hotgrplist[grps].photo}"></A><br />
     <a href="#{$hotgrplist[grps].id}">{$hotgrplist[grps].groupname|msubstr:0:4}</a>
    </li>
  {sectionelse}
	<li>暂时还没有圈子信息！</li>
  {/section}
   </ul>
</DIV>
</DIV>
</DIV>
<!--热点圈子 end-->



<!--本周热帖-->



<DIV class="blank5"></DIV>
<DIV class="box">
<DIV class="box_1">
<div class="title_bt"><span class="a666"><a href="javascript:changeGroup();" id="forumchange">换一组</a></span><em>本周热帖</em></div>
<DIV class="post_list ared" id="forums">
   <ul>
   {section name=forums loop=$hotforumlist start=0 step=1 max=15 show=true}
	 <li><a href="#{$hotforumlist[forums].id}">{$hotforumlist[forums].title|msubstr:0:13}</a></li>	
   {sectionelse}
  		暂时还没有帖子信息！
   {/section} 
   </ul>
</DIV>
</DIV>
</DIV>
<!--本周热帖 end-->




</DIV>


<DIV class="AreaR">
<DIV class="AreaR">
<DIV class="AreaM clearfix">

   <!--广告-->
   <DIV id="focus">
    <a href="{$centeradvertise.linkid}" target="_blank"><img src="./uploadfiles/goods/{$centeradvertise.realname}" /></a>
   </DIV>
   <!--广告 end-->
   
   
   <!--商家推荐-->
   <DIV class="blank5"></DIV>
   <DIV class="clearfix">
     <div class="box_1">
	 <div class="title_bt"><h3>商家推荐</h3></div>
     <div class="week_shop clearfix">
      
       {if $advertshopslist }
       <ul>
   		{foreach from=$advertshopslist item=item key=key}
			<li><a href="shop.php?shopid={$item.id}"><img alt="" src="./uploadfiles/shop/{$item.shoppicture}"/></a></li>
		{/foreach} 
		</ul>
   	  {else}
  		暂时还没有推荐信息！
      {/if}
       
         
       </div>
     </DIV></DIV>
     <!--商家推荐 end-->
   
</DIV>

<DIV class="AreaRR clearfix">

<!--公告栏-->
<DIV class="box">
<DIV class="box_1">
<div class="title_bt"><h3>公告栏</h3></div>
<DIV id="demo0" style="overflow:hidden;height:105px;width:240px;">
<DIV class="post_list ared" id="demo01">
    <ul>
   {section name=notices loop=$noticelist}
		<li><a href="index.php?id={$noticelist[notices].id}&act=notice" target="_blank">
		{$noticelist[notices].title|msubstr:0:20}</a></li>
   {sectionelse}
  		<li>暂时还没有公告信息！</li>
   {/section}
   </ul>
  <DIV id="demo02"></DIV>
  </DIV>
</DIV>
</DIV>
</DIV>
<!--公告栏 end-->


<!--校币图-->
<DIV class="blank5"></DIV>
<DIV class="clearfix">
    <div class="card_bj">
    <p><a href="#">如何赚校币？</a></p>
    <p><a href="#">校币怎么花？</a></p> 
	<p><a href="#">校币如何充值？</a></p> 
   </div>
</DIV>
<!--校币图 end-->


<!--充值-->
<DIV class="blank5"></DIV>
<DIV class="box">
<DIV class="box_3">
    <div id="tags3">
    <UL>
    <LI class="Tag"><A onClick="selectTag('Content0',this)" href="javascript:void(0)">话费直冲</A></LI>
    <LI><A onClick="selectTag('Content1',this)" href="javascript:void(0)">游戏直冲</A></LI>
    <LI><A onClick="selectTag('Content2',this)" href="javascript:void(0)">金币直冲</A></LI>
    </UL>
    </div>
    
    <div class="menu_con3 clearfix">
    <div id="Content0" style="DISPLAY: block" class="clearfix">
      <form action="" method="get">
        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="ttbb1">
  <tr>
    <td width="37%">运营商：</td>
    <td width="63%"><select name="select" id="select">
      <option value="1">请选择运营商</option>
      </select></td>
  </tr>
  <tr>
    <td>手机号码：</td>
    <td><input type="text" name="textfield" id="textfield"  class="txt100"/></td>
  </tr>
  <tr>
    <td>确认号码：</td>
    <td><input type="text" name="textfield" id="textfield"  class="txt100" /></td>
  </tr>
  <tr>
    <td>充值金额：</td>
    <td><select name="select" id="select">
      <option value="1">30</option>
      <option value="1">50</option>
      <option value="1">100</option>
      </select></td>
  </tr>
  <tr>
    <td colspan="2" align="center">
    <input name="" type="button" value="充 值" class="bnt_price"/>
    </td>
    </tr>
</table>
      </form>
    </div>
    <div id="Content1" style="DISPLAY: none">
      <form action="" method="get">
        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="ttbb1">
  <tr>
    <td width="37%">运营商：</td>
    <td width="63%"><select name="select" id="select">
      <option value="1">请选择运营商</option>
      </select></td>
  </tr>
  <tr>
    <td>手机号码：</td>
    <td><input type="text" name="textfield" id="textfield"  class="txt100"/></td>
  </tr>
  <tr>
    <td>确认号码：</td>
    <td><input type="text" name="textfield" id="textfield"  class="txt100" /></td>
  </tr>
  <tr>
    <td>充值金额：</td>
    <td><select name="select" id="select">
      <option value="1">30</option>
      <option value="1">50</option>
      <option value="1">100</option>
      </select></td>
  </tr>
  <tr>
    <td colspan="2" align="center">
    <input name="" type="button" value="充 值" class="bnt_price"/>
    </td>
    </tr>
</table>
      </form>    
    </div>
    <div id="Content2" style="DISPLAY: none">
    
        <form action="" method="get">
        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="ttbb1">
  <tr>
    <td width="37%">运营商：</td>
    <td width="63%"><select name="select" id="select">
      <option value="1">请选择运营商</option>
      </select></td>
  </tr>
  <tr>
    <td>手机号码：</td>
    <td><input type="text" name="textfield" id="textfield"  class="txt100"/></td>
  </tr>
  <tr>
    <td>确认号码：</td>
    <td><input type="text" name="textfield" id="textfield"  class="txt100" /></td>
  </tr>
  <tr>
    <td>充值金额：</td>
    <td><select name="select" id="select">
      <option value="1">30</option>
      <option value="1">50</option>
      <option value="1">100</option>
      </select></td>
  </tr>
  <tr>
    <td colspan="2" align="center">
    <input name="" type="button" value="充 值" class="bnt_price"/>
    </td>
    </tr>
</table>
      </form>  
    
    </div>
    </div>
</DIV>
</DIV>
<!--充值 end-->



</DIV>
</DIV>


<DIV class="AreaR">

<!--今日推荐 列表-->
<DIV class="blank5"></DIV>
<div class="box">
<div class="box_color ared">
<div class="title_bt"><span><a href="more.php?mact=todayrecom">更多</a></span><h3>今日推荐</h3></div>
<div class="itemgood_nr clearfix">
<ul>

 {if $todayshoplist }
 	{foreach from=$todayshoplist item=item key=key}
<li>
  <div>
    <p class="pic"><a href="shop.php?shopid={$item.id}"><img src="./uploadfiles/shop/{$item.shoppicture}" /></a></p>
    <p class="wz"><strong><a href="shop.php?shopid={$item.id}">{$item.shopname|msubstr:0:8}</a></strong><em><span>{$item.discount}折现金卡</span></em></p>
  </div>		
</li>
	{/foreach} 
 {else}	<div><li>暂时还没有商家信息！</li></div>
{/if}
</ul>
</div>
</div>
</div>
<!--今日推荐 列表 end-->


<!--热点商家 列表-->
<DIV class="blank5"></DIV>
<div class="box">
<div class="box_color ared">
<div class="title_bt"><span><a href="more.php?mact=hotshop">更多</a></span>
  <h3>热点商家</h3></div>
<div class="itemgood_nr clearfix">
<ul>

{if $hotshoplist }
   {foreach from=$hotshoplist item=item key=key}
<li>
  <div>
    <p class="pic"><a href="shop.php?shopid={$item.id}"><img src="./uploadfiles/shop/{$item.shoppicture}" /></a></p>
    <p class="wz"><strong><a href="shop.php?shopid={$item.id}">{$item.shopname|msubstr:0:8}</a></strong><em><span>{$item.discount}折现金卡</span></em></p>
  </div>
			
</li>
	{/foreach} 
{else}	
	<div><li>暂时还没有商家信息！</li></div>
 {/if}
</ul>
</div>
</div>
</div>
<!--热点商家 列表 end-->


</DIV>
</DIV>
</DIV>

{literal}
<script type="text/javascript">
	var i=0;
	var j=0;
	//换一组热点圈子
	function changehotgrp(){
		var num=++j;
		//var a=(如果是数值){/literal}smarty数值变量{literal};(如果是字符串)'{/literal}smarty字符串变量{literal}';
		var a= {/literal}{$hotgrplistjs}{literal};
		var table="<ul>";
        var count=0;
        if(a.length<=15){
			//到最后一组，连接不可再点击
			document.getElementById('grpschange').removeAttribute("href");
			return;
		}
   		//每组显示15个元素
		for(var i=num*15;i<a.length;i++){
		   count++;
		   table=table+" <li> <a href='#"+a[i].id+"'> <IMG class=iteration src='./uploadfiles/goods/"+a[i].photo+"'></A>";
		   table=table+"<br><a href='#"+a[i].id+"'>"+a[i].groupname.substr(0,4)+"</a> </li> ";
		   if(i==a.length-1){
			   //到最后一组，连接不可再点击
			   document.getElementById('grpschange').removeAttribute("href");;
		   }
		   if(count==15){
			   break;
		   }
		 }
		table=table+"</ul>";
		document.getElementById('grps').innerHTML = table;
	}
		
		//换一组本周热帖 
		function changeGroup(){
			var num=++i;
			//var a=(如果是数值){/literal}smarty数值变量{literal};(如果是字符串)'{/literal}smarty字符串变量{literal}';
			var a= {/literal}{$hotforumlistjs}{literal};
			var table="<ul>";
	        var count=0;
	        if(a.length<=15){
				//到最后一组，连接不可再点击
				document.getElementById('forumchange').removeAttribute("href");
				return;
			}
	   		//每组显示15个元素
			for(var j=num*15;j<a.length;j++){
			   count++;
			   table=table+" <li> <a href='#"+a[j].id+"'>"+a[j].title.substr(0,13)+"</a> </li> ";
			   if(j==a.length-1){
				   //到最后一组，连接不可再点击
				   document.getElementById('forumchange').removeAttribute("href");;
			   }
			   if(count==10){
				   break;
			   }
			   
			 }
			table=table+"</ul>";
			document.getElementById('forums').innerHTML = table;
		}
		function Marqueer(i){
			  var obj = document.getElementById("marquee" + i);
			  var obj1 = document.getElementById("marquee" + i + "_1");
			  var obj2 = document.getElementById("marquee" + i + "_2");
			  if (obj2.offsetWidth - obj.scrollLeft <= 0){
					obj.scrollLeft -= obj1.offsetWidth;;
			  }
			  else{
					obj.scrollLeft++;
			  }
		  }  
		  document.getElementById("marquee0_2").innerHTML= document.getElementById("marquee0_1").innerHTML;
		  var MyMarr=setInterval("Marqueer(0)",40);
		  document.getElementById("marquee0").onmouseover=function() {clearInterval(MyMarr);};
		  document.getElementById("marquee0").onmouseout=function() {MyMarr=setInterval("Marqueer(0)",40);};
		//公告滚动
	  	var speed01i=100;
	  	var demo0i = document.getElementById("demo0");
	  	var demo01i= document.getElementById("demo01");
	  	var demo02i= document.getElementById("demo02");
	  	demo02i.innerHTML=demo01i.innerHTML;
	  	function Marqueer01i(){
	  		if(demo02i.offsetTop-demo0i.scrollTop<=0)
	  			demo0i.scrollTop-=demo01i.offsetHeight;
	  		else{
	  			demo0i.scrollTop++;
	  		}
	  	}
	  	var MyMarr0i=setInterval(Marqueer01i,speed01i);
	  	demo0i.onmouseover=function() {clearInterval(MyMarr0i)};
	  	demo0i.onmouseout=function() {MyMarr0i=setInterval(Marqueer01i,speed01i)};
</script>
{/literal}
<script src="./templates/scripts/goods/selecttag.js" type="text/javascript"></script>

<!------------------------------------------body over-->
{include file=footer.tpl}
