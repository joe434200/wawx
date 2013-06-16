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

<DIV class="AreaL clearfix">
	{if $user}
     <!--个人信息-->
     <div class="red_bt"><span>登录信息</span></div>
     <div class="use_login clearfix">
     <div class="nlk_name clearfix">
     <p class="av"><a href="#{$user.ID}"><img src="./uploadfiles/goods/{$user.photo}" /></a></p>
         
     <div class="nlk_jb a333">{$user.nickname}<br />
      <a href="#{$user.ID}">{$user.role}</a><br />
      {if $user.level eq 1}
      <img src="./templates/images/goods/star_level.gif" />
      {elseif $user.level eq 2}
      <img src="./templates/images/goods/star_level.gif" />
      <img src="./templates/images/goods/star_level.gif" />
      {elseif $user.level eq 3}
      <img src="./templates/images/goods/star_level.gif" />
      <img src="./templates/images/goods/star_level.gif" />
      <img src="./templates/images/goods/star_level.gif" />
      {elseif $user.level eq 4}
      <img src="./templates/images/goods/star_level.gif" />
      <img src="./templates/images/goods/star_level.gif" />
      <img src="./templates/images/goods/star_level.gif" />
      <img src="./templates/images/goods/star_level.gif" />
      {elseif $user.level eq 5}
      <img src="./templates/images/goods/star_level.gif" />
      <img src="./templates/images/goods/star_level.gif" />
      <img src="./templates/images/goods/star_level.gif" />
      <img src="./templates/images/goods/star_level.gif" />
      <img src="./templates/images/goods/star_level.gif" />
      {/if}
      </div>
      
      </div>
   
    <div class="nlk_xx clearfix">
    <ul class="a_blue">
    
    <dd>在线时间</dd>
    <dt>{if $user.onlinetime}{$user.onlinetime}{else}0{/if}小时</dt>
    
    <dd>最后登录</dd>
    <dt>{$user.lltime}</dt>
    
    <dd>校币</dd>
    <dt>{if $user.coins}{$user.coins}{else}0{/if}</dt>
    
    <dd>帖子</dd>
    <dt><a href="#">{if $user.tnum}{$user.tnum}{else}0{/if}</a></dt>
    </ul>
    </div>
    </div>
  <!--个人信息 end-->
  {else}
  	登录
  {/if}
  <!--幸运大抽奖-->
  <DIV class="blank5"></DIV>
  <div class="box">
  <div class="box_1 clearfix">
  <div class="title_bt">
  <h3>幸运大抽奖</h3></div>
  <div class="ex_jiang">
  <a href="exchange.php?act=drawlottery"><img src="./templates/images/goods/jiang.gif" /></a>
  <p class="ared"><a href="exchange.php?act=drawlottery">校币大转盘<br />
     抽出幸运星<br />
     大奖等你拿</a></p>
  </div>
  </div>
  </div>
  <!--/幸运大抽奖-->
  
  <!--最新兑换记录-->
  <DIV class="blank5"></DIV>
  <div class="box">
  <div class="box_1 clearfix">
  <div class="title_bt">
  <h3>最新兑换记录</h3></div>
  <div class="ex_duihuan ared">
   <ul>
   
 {section name=excs loop=$exchangelist start=0 step=1 max=23 show=true}
 	<li>
  {$exchangelist[excs].username}兑换了{$exchangelist[excs].exchangenum}件{$exchangelist[excs].goodsname|msubstr:0:4}</li>
  {sectionelse}
	<li>暂时还没有兑换信息！</li>
  {/section}     
   
   </ul>
  </div>
  </div>
  </div>
  <!--最新兑换记录-->
  
</div>


<DIV class="AreaR clearfix">

<!--特惠-->
  <div class="box">
  <div class="box_1 clearfix">
      <div class="red_bt"><span>特惠</span></div>
	  <div class="tehui_list">
	  <ul>
	{section name=oddgood loop=$oddsadvList start=0 step=1 max=3 show=true}
  	  <li class="clearfix ared">
	  <a href="goods.php?act=exchange&goodsid={$oddsadvList[oddgood].id}"><img src="./uploadfiles/goods/{$oddsadvList[oddgood].newimg}" /></a>
	  <h3><a href="goods.php?act=exchange&goodsid={$oddsadvList[oddgood].id}">[校币抢购]{$oddsadvList[oddgood].goodsname|msubstr:0:7}</a></h3>
	  <p>{$oddsadvList[oddgood].exchangemoney}校币</p>
	  </li>
  	{sectionelse}
	<li>暂时还没有特惠商品！</li>
  	{/section}   
	  </ul>
	  </div>
  </div>
  </div>
<!--特惠-->


<!--数值-->
  <div class="box">
  <div class="box_1 clearfix">
	  <div class="tehui_shuzhi">
	  <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="10%" class="ared"><a href="exchange.php?act=index">全部</a></td>
    <td width="90%">
	<ul class="ared">
	<li><a href="exchange.php?exbetween=1to200&act=index">1-200校币</a></li>
	<li><a href="exchange.php?exbetween=200to400&act=index">200-400校币</a></li>
	<li><a href="exchange.php?exbetween=400to800&act=index">400-800校币</a></li>
	</ul>
	</td>
  </tr>
</table>
	  </div>
  </div>
  </div>
<!--数值-->


<div class="blank"></div>
<!--兑换列表-->
  <div class="box">
  <div class="box_1 clearfix">
	  <div class="ec_list clearfix">
	  <ul>  
	{section name=exgood loop=$exchangegoods }  
 	 <li>
	  <a href="goods.php?act=exchange&goodsid={$exchangegoods[exgood].id}"><img src="./uploadfiles/goods/{$exchangegoods[exgood].newimg}" /></a>
	  <div><span class="pp f_fen">市场价：{$exchangegoods[exgood].marketprice}</span> 消耗校币：<span class="f_fen">{$exchangegoods[exgood].exchangemoney}</span></div>
	  <p class="ared top5"><a href="goods.php?act=exchange&goodsid={$exchangegoods[exgood].id}">{$exchangegoods[exgood].goodsbrief|msubstr:0:25}</a></p>
	  </li>	    
  	{sectionelse}
	<li>暂时还没有兑换商品！</li>
  	{/section}   	  
	  </ul>
	  </div>
	  
	  <!--页码-->
<DIV class="blank"></DIV>
<div class="num">
<DIV class="num_pg">
<script type="text/javascript">
    var pg1 = new showPages('pg1');
	pg1.pageCount = '{$pagecount}';
	pg1.argName = 'p';
	pg1.printHtml();
</script>
</DIV>
</DIV>
<!--页码 end-->
<div class="blank"></div>


  </div>
  </div>
<!--兑换列表-->



</DIV>




</div>
{literal}
  <SCRIPT language=javascript> 
  
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
</SCRIPT>
{/literal} 
<!------------------------------------------body over-->
{include file=footer.tpl}