	{include file=header.tpl}
<!------------------------------------------

body-->
<DIV class="blank"></DIV>
<DIV class="block clearfix">
<DIV class="AreaL">

	{if $user}
     <!--个人信息-->
    <div class="red_bt"><span>登录信息

</span></div>
     <div class="use_login clearfix">
     <div class="nlk_name clearfix">
     <p class="av"><a href="#{$user.ID}"><img src="./uploadfiles/goods/{$user.photo}" /></a></p>      
     <div class="nlk_jb a333">{$user.nickname}
		<br/>
      <a href="#{$user.ID}">{$user.role}</a><br/>
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
    <dt>{if $user.onlinetime}{$user.onlinetime}

{else}0{/if}小时</dt>
    
    <dd>最后登录</dd>
    <dt>{$user.lltime}</dt>
    
    <dd>校币</dd>
    <dt>{if $user.coins}{$user.coins}{else}0

{/if}</dt>
    
    <dd>帖子</dd>
    <dt><a href="#">{if $user.tnum}{$user.tnum}

{else}0{/if}</a></dt>
    </ul>
    </div>
    </div>
  <!--个人信息 end-->
  {else}
  登录
  {/if}
</div>

<DIV class="AreaR">

<!--活动介绍-->
<DIV class="hdjs">
<DIV class="box">
   <DIV class="box_1">
   <div class="title_bt"><h3>活动介绍</h3></div>
     <div class="jj"><img 

src="./templates/images/goods/hdjs.jpg" />因苏尔
萨是最近在伦敦访问BBC电台编辑部时发表上述讲话的
。3月10日英国将在马尔维纳斯群岛就其归属问题进行
公民投票。阿根廷外交部发表公报称，英国政府无权通
过公民投票改变该群岛的法律地位，希望重启双边谈判
。阿根廷历来坚持对马尔维纳斯群岛拥。 </div>
   </DIV>
   </DIV>
   </DIV>
<!--活动介绍 end-->

<!--奖品设置-->
<DIV class="hdjs2">
<DIV class="box">
   <DIV class="box_1">
   <div class="title_bt"><h3>奖品设置</h3></div>
     <div class="jj"><img src="./templates/images/goods/hdjs2.jpg" />因苏
尔萨是最近在伦敦访问BBC电台编辑部时发表上述讲话
的。3月10日英国将在马尔维纳斯群岛就其归属问题进
行公民投票。阿根廷外交部发表公报称，英国政府无权
通过公民投票改变该群岛的法律地位，希望重启双边谈
判。阿根廷历来坚持对马尔维纳斯群岛拥。 边谈判。
阿根廷历来坚持对马尔维纳斯群岛拥。 边谈判。阿根
廷历来坚持对马尔维纳斯群岛拥。 </div>
   </DIV>
   </DIV>
   </DIV>
<!--奖品设置 end-->
    
</DIV>

</DIV>



<DIV class="blank"></DIV>
<DIV class="block clearfix">
<DIV class="AreaL750">

    <!--我要抽奖-->
    <div class="title_bt B_ccc"><h3>我要抽奖

</h3></div>
    <DIV class="blank"></DIV>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
   <tr>
    <td width="56%" valign="top">
	 <DIV id="demo" style="overflow:hidden;height:380px;width:320px;">
      <DIV class="choujiang_jj" id="demo1">
	  <ul>   	  
   {if $lotterRList }
   		{foreach from=$lotterRList item=item key=key}
		<li><span class="f3">{$item.hour}小时{$item.minute}分钟前</span>
		 <span class="f6">{$item.username}</span>
		  中了 <span class="f1">{$item.rank}等奖
		  </span> 奖品是 {$item.goodname|msubstr:0:20}</li>		
		{/foreach} 
   {else}
  		暂时还没有中奖信息！
   {/if}	  
	  </ul>
	  <DIV id="demo2"></DIV>
	  </DIV>
	  </DIV>
    </td>
    <td width="44%" align="left"  valign="top"> 
   		<embed src="./templates/images/goods/51chou.swf" width="440" height="350" scale="noborder" wmode="transparent"  />  
    </td>
    </tr>
   </table>
  <!--我要抽奖 end-->

</DIV>




<DIV class="AreaRR clearfix">

   <!--公告栏-->
   <DIV class="box">
   <DIV class="box_1">
   <div class="title_bt"><h3>公告栏</h3></div>
   <DIV class="post_list ared">
   <ul>
   
   {section name=notices loop=$noticelist start=0 step=1 max=5 show=true}
		<li><a href="index.php?id={$noticelist[notices].id}&act=notice" target="_blank">
		{$noticelist[notices].title|msubstr:0:20}</a></li>
   {sectionelse}
  		<li>暂时还没有公告信息！</li>
   {/section}   

   </ul>
   </DIV>
   </DIV>
   </DIV>
   <!--公告栏 end-->
   
   
   <!--校币兑换排行榜-->
   <DIV class="blank"></DIV>
   <DIV class="box">
   <DIV class="box_1">
   <div class="title_bt"><h3>校币兑换排行榜

</h3></div>
   <DIV class="exchagn_List clearfix ared">     
    
 {if $exchangeList }
   {foreach from=$exchangeList item=item key=key}
 	<UL class="clearfix">
     <LI class="topimg"><div class="num">{$key+1}</div><A href="goods.php?act=exchange&goodsid={$item.id}">
     <IMG class="samllimg" alt="" src="./uploadfiles/goods/{$item.newimg}"></A> 
</LI>
     <LI class="iteration1">
     <A title="" href="goods.php?act=exchange&goodsid={$item.id}">
     {$item.brief|msubstr:0:14}</A><BR>校币：
<FONT class=f1>{$item.exmoney}</FONT><BR></LI>
    </UL>		
	{/foreach} 
{else}	
	<li>暂时还没有兑换信息！</li>
 {/if}    
   </DIV>
   </DIV>
    </div>
    <!--校币兑换排行榜 end-->
   
</div>
</div>
{literal}
<SCRIPT language=javascript> 
	var speed0=80;
	var demo0 = document.getElementById("demo");
	var demo01= document.getElementById("demo1");
	var demo02= document.getElementById("demo2");
	demo02.innerHTML=demo01.innerHTML;
	function Marqueer00(){
		if(demo02.offsetTop-demo0.scrollTop<=0)
			demo0.scrollTop-=demo01.offsetHeight;
		else{
			demo0.scrollTop++;
		}
	}
	var MyMarr0=setInterval(Marqueer00,speed0);
	demo0.onmouseover=function() {clearInterval(MyMarr0)};
	demo0.onmouseout=function() {MyMarr0=setInterval(Marqueer00,speed0)};
</SCRIPT>
{/literal}
<!------------------------------------------body 

over-->
{include file=footer.tpl}