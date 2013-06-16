{include file=header.tpl}
<!------------------------------------------body-->
<DIV class="blank"></DIV>
<DIV class="block clearfix">

  <!--当前位置-->
   <div class="location ared">当前位置：<a href="index.php">首页</a> >  
   {if $shopname.shopid}<a href="aroundlife.php?aroundact={$shopname.mID}">{$shopname.mname} > </a><a href="shop.php?shopid={$shopname.shopid}">{$shopname.shopname}</a>
   {else} <a href="index.php?act=studentwill"> 学生惠 </a> {/if} > {if $goods.shoppingtype eq '2'}团购{/if}{if $goods.shoppingtype eq '1'}特色{/if}商品</div>
  <!--end-->
   
    <DIV class="blank"></DIV>
    
    <!--end-->
      <div id="goodsInfo"  class="clearfix">
      
      <!--商品图片和相册 start-->
     <div class="imgInfo">
     {if $pictures}
     <a href="javascript:;" onclick="window.open('gallery.php?goodsid={$goods.ID}'); return false;">
      <img class=thumb src="./uploadfiles/goods/{$goods.newimg}" alt="{$goods.goodsname}"/>
     </a>
     {else}
         <img class=thumb src="./uploadfiles/goods/{$goods.newimg}" alt="{$goods.goodsname}"/>
     {/if}
     <div class="blank5"></div>
     <!--相册 START-->
   {if $pictures}
   
     <div class="clearfix">
      <span onmouseover="moveLeft()" onmousedown="clickLeft()" onmouseup="moveLeft()" onmouseout="scrollStop()"></span>
      <div class="gallery">
        <div id="demo">
          <div id="demo1" style="float:left">
            <ul>
           {foreach from=$pictures item=picture}
            <li>
            	<a href="gallery.php?goodsid={$goods.ID}" target="_blank">
            	<img class="B_blue" src="./uploadfiles/goods/{$picture.newimg}" alt="{$goods.goodsname}" /></a>
            </li>
           {/foreach}
            </ul>
          </div>
          <div id="demo2" style="display:inline; overflow:visible;"></div>
        </div>
      </div>
      <span class="spanR" onmouseover="moveRight()" onmousedown="clickRight()" onmouseup="moveRight()" onmouseout="scrollStop()" ></span>
	  
     </div>
    {/if}
     <!--相册 END-->
         <div class="blank5"></div>
     </div>
     <!--商品图片和相册 end-->
   
   </div>
      <!--end-->
      
      <!--商品表述-->
     <div class="goods_desc">
    <div class="bt">{$goods.goodsname|msubstr:0:30}
    </div>
    <div class="goods_show">
	   <ul>
	   <li>
	   <span>价格:</span>
	   <strong class="yj">{$goods.marketprice}元</strong>
	   </li>
	   
	   <li>
	   <span>吾校卡{$goods.schooldiscount}折:</span>
	   <strong class="xj">{$goods.schooldprice}元</strong>
	   </li>
	   
	   
	   <li>
	   <span>评价:</span>{if $goods.commentnum}{$goods.commentnum}{else}0{/if}条
	   </li>
	   
	   
	   <li>
	   <span>支付:</span>
	   {section name=pa loop=$payment}
	   		{$payment[pa].payname}&nbsp;&nbsp;
	    {sectionelse}
	    	还没有支付方式
	    {/section}
	   </li>
	   
	   <li>
	   <span>购买数量:</span>
	   <input type="text" id="mkrum"  class="good_txt" value="1"/> (库存{$goods.goodsnumber}件)
	   </li>
	   
	   </ul>

    </div>
    <p class="bottom10 top5">
   
    &nbsp;&nbsp;
    {if $goods.shoppingtype eq '2'}
    	{if $isin eq '0'}
    		团购活动已结束！
    	{elseif $isin eq '1'}
    		<span id="isin">团购即将开始，敬请期待！</span>
    	{else}
    	 <a href="javascript:checkcart('check','{$goods.ID}','{$goods.shoppingtype}')"><img src="./templates/images/goods/goods_ann1.gif" /></a><span id="ann1"></span>
    	剩余<span id="day">00</span>天
    	<span id="hour">00</span>小时
    	<span id="minute">00</span>分
    	<span id="second">00</span>秒
    	{/if}
    {else}
    <a href="javascript:checkcart('check','{$goods.ID}','{$goods.shoppingtype}')"><img src="./templates/images/goods/goods_ann1.gif" /></a><span id="ann1"></span>
    <a href="javascript:checkcart('add','{$goods.ID}','{$goods.shoppingtype}')"><img  src="./templates/images/goods/goods_ann2.gif" /></a><span id="ann2"></span></p>
	{/if}
	<div class="card">
	<input id="sh_bnt11"  type="button" class="sh_bnt" value="推荐给社区朋友赢校币" onclick="recomCheck('{$goods.ID}','{$goods.goodsname}')" />
	<img id="coll_id" src="./templates/images/goods/bnt_coll.gif"  style="cursor: pointer;" onclick="collectGoods('{$goods.ID}','{$goods.shoppingtype}')" />
	</div>
	
    </div>
    <!--end-->


<!--好评率-->
<div class="goods_other clearfix">
  <h3>购买此商品的用户</h3>
  <ul class="ared">

   {section name=ug loop=$goodsuser start=0 step=1 max=9 show=true}
   <li><a href="#{$goodsuser[ug].ID}">
  <img src="./uploadfiles/goods/{$goodsuser[ug].photo}" border="0" /></a>
    <p><a href="#{$goodsuser[ug].ID}">{$goodsuser[ug].nickname|msubstr:0:4}</a></p>
  </li>
   {sectionelse}	
	<li>亲暂时无购买用户！</li>
   {/section}  
  </ul>
</div>
<!--end-->

</div>



<DIV class="blank"></DIV>
<DIV class="block clearfix">
<div class="shop_wenben">
<div class="clearfix">

    <div id="show_menu">
    <UL id="tags">
    {if $pagekey eq 'pg_1' or $pagekey eq 'pg_2'}
    	<LI>
    {else}
    	<LI class=selectTag>
    {/if}
    <A onClick="selectTag('tagContent0',this)" href="javascript:void(0)">商品详情</A> </LI>
    {if $pagekey eq 'pg_1'}
    <LI class=selectTag>
    {else}
    <LI>
    {/if}
    <A onClick="selectTag('tagContent1',this)" href="javascript:void(0)">评价详情({if $goods.commentnum}{$goods.commentnum}{else}0{/if}条)</A> </LI>
    {if $pagekey eq 'pg_2'}
    <LI class=selectTag>
    {else}
    <LI>
    {/if}
	<A onClick="selectTag('tagContent2',this)" href="javascript:void(0)">成交记录({if $goods.makenum}{$goods.makenum}{else}0{/if}件)</A> </LI>
    </UL>
    </div>
    
    <div class="show_menu_con">
    
	<!--商家简介-->
	{if $pagekey eq 'pg_1' or $pagekey eq 'pg_2'}
		<div id="tagContent0" style="DISPLAY: none">
	{else}
		<div id="tagContent0" style="DISPLAY: block">
	{/if}
	  {$goods.goodsdesc}<br>
	  {foreach from=$goodsparamenter item=goodsp}
	  	{$goodsp}<br>
	  {/foreach}
	</div>
	<!--所有评价-->
	{if $pagekey eq 'pg_1'}
		<div id="tagContent1" style="DISPLAY: block">
	{else}
		<div id="tagContent1" style="DISPLAY: none">
	{/if}
 
    
    <!--评论详细-->
	<div class="show_all_plun">
	  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="all_ttbb">
  {section name=com loop=$comments start=0 step=1 max=5 show=true}
  <tr>
    <td valign="top" class="pl">{$comments[com].content}<span>[{$comments[com].commenttime}]</span></td>
    <td valign="top" class="addr">{$comments[com].goodsname}</td>
    <td valign="top" class="name">{$comments[com].nickname}
    {if $comments[com].level eq 1}
    <p class="jibie1"></p>
    {elseif $comments[com].level eq 2}
    <p class="jibie2"></p>
    {elseif $comments[com].level eq 3}
    <p class="jibie3"></p>
    {elseif $comments[com].level eq 4}
    <p class="jibie4"></p>
    {elseif $comments[com].level eq 5}
    <p class="jibie5"></p>
    {/if}
    </td><!--此处级别样式从'jibie1'到'jibie5'-->
  </tr>
  {sectionelse}	
	 <tr><td>亲暂时还没有评论！</td></tr>
  {/section}    
</table>

<!--页码-->
       <DIV class="blank"></DIV>
       <div class="num_pg">
       <DIV class="red_pg">
     	<script type="text/javascript">
    		var pg_1 = new showPages('pg_1');
    		pg_1.pageCount = '{$pagecount}';
    		//pg_1.pageCount = 4;
    		pg_1.argName = 'p';
    		pg_1.printHtml();
		</script>
       </DIV>
	   </div>
       <!--页码 end-->
	   
	   
	   <!--发表点评 开始-->      
<DIV class="blank"></DIV>
<div class="input_pl_input_bt">发表点评</div>
<div class="input_pl">
<form action="gscomment.php?commenttype=goodscom" method="post" name="commentForm">
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="input_ttbb">
  <tr>
    <td align="right" valign="top"><span class="color_red">*</span>评价:</td>
    <td valign="top" align="left">
    {if $ismk}<!-- 购买过该商品 -->
    	{if $iscom}<!-- 评价过该商品 -->
    <textarea name="comment" disabled="disabled" rows="5" class="area_all">亲，该商品您已经评价！</textarea>
    	{else}
    <textarea name="comment" rows="5" class="area_all">亲，您购买过该商品，请评价赢校币！</textarea>
    	{/if}
    {else}
    	<textarea name="comment" disabled="disabled" rows="5" class="area_all">亲，只有购买过该商品，并登录才可以评价！</textarea>
    {/if}	
    </td>
  </tr>
</table>
<input type="hidden" name="goodsid" value="{$goods.ID}">
<div align="center">
{if $ismk} <!-- 购买过该商品 -->
    {if $iscom}	<!-- 评价过该商品 -->
	<input type="button"  class="anniu10" value="发表点评"/>
	{else}
		<input type="button"  class="anniu10" onclick="checkNull()" value="发表点评"/>
	{/if}
{else}
	<input type="button"  class="anniu10" value="发表点评"/>
{/if}
</div>
</form>
</div>
<!--发表点评 end-->

</div>
<!--评论详细 end-->
</div>



	<!--成交记录-->
	{if $pagekey eq 'pg_2'}
		<div id="tagContent2" style="DISPLAY: block">
	{else}
		<div id="tagContent2" style="DISPLAY: none">
	{/if}
   
    <!--成交记录详细-->
	<div class="show_all_plun">
	  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="all_ttbb">
 {section name=mk loop=$mkdetail start=0 step=1 max=5 show=true}
  <tr>
    <td valign="top" style="width:40%">{$mkdetail[mk].goodsname}</td>
   	<td valign="top" style="width:20%;color:#999">购买于[{$mkdetail[mk].createtime}]</td>
    <td valign="top" style="width:20%; color:#999;">{$mkdetail[mk].shopnum}件</td>
    <td valign="top" style="width:20%">{$mkdetail[mk].nickname}
    {if $mkdetail[mk].level eq 1}
    <p class="jibie1"></p>
    {elseif $mkdetail[mk].level eq 2}
    <p class="jibie2"></p>
    {elseif $mkdetail[mk].level eq 3}
    <p class="jibie3"></p>
    {elseif $mkdetail[mk].level eq 4}
    <p class="jibie4"></p>
    {elseif $mkdetail[mk].level eq 5}
    <p class="jibie5"></p>
    {/if}
    </td>
  </tr>
 {sectionelse}	
	 <tr><td>亲暂时还没有人购买！</td></tr>
  {/section}  
</table>
<!--页码-->
       <DIV class="blank"></DIV>
       <div class="num_pg">
       <DIV class="red_pg">
 		<script type="text/javascript">
    		var pg_2 = new showPages('pg_2');
    		pg_2.pageCount = '{$pagecount1}';
    		//alert("pg_2.pageCount:"+pg_2.pageCount);
    		//pg_2.pageCount = 2;
    		pg_2.argName = 'p2';
    		pg_2.printHtml();
		</script>
       </DIV>
	   </div>
       <!--页码 end-->
</div>
<!--成交记录 end-->
</div>

</div>
</div>

</div>
</div>
<script src="./templates/scripts/goods/gallery.js" type="text/javascript"></script>	    
<script src="./templates/scripts/goods/showdiv.js" type="text/javascript"></script>
<script src="./templates/scripts/goods/goodsdetail.js" type="text/javascript"></script>
{literal}
<script type="text/javascript">
window.setInterval(retain_time, 1000);
function retain_time(){
	var url = "remain_time.php?goodsid="+{/literal}{$gid}{literal};
	var newAjax = new Ajax.Request(
			url,
			{
				method:'post',
				parameters:"a="+Math.random(),
				onComplete:getBack
			}
		);
}
//日志评论
function getBack(json)
{
	var obj = eval("("+json.responseText+")");
	document.getElementById('day').innerHTML=obj['day'];
	document.getElementById('hour').innerHTML=obj['hour'];
	document.getElementById('minute').innerHTML=obj['minute'];
	document.getElementById('second').innerHTML=obj['second'];
}

</script>
{/literal}
<!------------------------------------------body over-->
{include file=footer.tpl}