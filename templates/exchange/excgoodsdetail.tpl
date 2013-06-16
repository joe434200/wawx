{include file=header.tpl}
<!------------------------------------------body-->
<DIV class="blank"></DIV>
<DIV class="block clearfix">

  <!--当前位置-->
   <div class="location ared">当前位置：<a href="index.php">首页</a> >
   <a href="exchange.php?act=index">校币了没</a> >兑换商品</div>
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
            	<img class="B_blue" src="./uploadfiles/goods/{$picture.newimg}" 
            	alt="{$goods.goodsname}" /></a>
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
    <div class="bt">{$goods.goodsname|msubstr:0:30}</div>
    <div class="goods_show">
	   <ul>
	   <li>
	   <span>价格:</span>
	   <strong class="yj">{$goods.marketprice}元</strong>
	   </li>
	   
	   <li>
	   <span>单件消耗校币:</span>
	   <strong class="xj">{$goods.exchangemoney}校币</strong>
	   </li>
	   
	   
	   <li>
	   <span>评价:</span>{if $goods.commentnum}{$goods.commentnum}{else}0{/if}条
	   </li>
	   
	   
	   <li>
	   <span>兑换数量:</span>
	   <input type="text" id="mkrum1"  class="good_txt" value="1"/> (库存{$goods.goodsnumber}件)
	   </li>
	   
	   </ul>

    </div>
    <p class="bottom10 top5">
    	<a href="javascript:checkexchange('{$goods.ID}')"><img src="./templates/images/goods/goods_ann1.gif" /></a><span id="ann1"></span>
	<a id="coll_goodsid" href="javascript:collectExGoods('{$goods.ID}','8')"><img src="./templates/images/goods/bnt_coll.gif" /></a>
	</p>
	<div class="card">
		<input type="button" class="sh_bnt" value="推荐给社区朋友赢校币" onclick="recomCheck('{$goods.ID}','{$goods.goodsname}')" />
		<span id="sh_bnt11"></span>
	</div>
    </div>
    <!--end-->


<!--好评率-->
<div class="goods_other clearfix">
  <h3>兑换此商品的用户</h3>
  <ul class="ared">

   {section name=ug loop=$exusers start=0 step=1 max=9 show=true}
   <li><a href="#{$exusers[ug].ID}">
  <img src="./uploadfiles/goods/{$exusers[ug].photo}" border="0" /></a>
    <p><a href="#{$goodsuser[ug].ID}">{$exusers[ug].nickname|msubstr:0:4}</a></p>
  </li>
   {sectionelse}	
	<li>亲暂时无兑换用户！</li>
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
	<A onClick="selectTag('tagContent2',this)" href="javascript:void(0)">兑换记录({if $exrnum[0]}{$exrnum[0]}{else}0{/if}条)</A> </LI>
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
   			//pg_1.pageCount=8;
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
    <td valign="top">
 	{if $isex}
    	{if $iscom}
    <textarea name="comment" disabled="disabled" rows="5" class="area_all">亲，该商品您已经评价！</textarea>
    	{else}
    <textarea name="comment" rows="5" class="area_all">亲，您兑换过该商品，请评价赢校币！</textarea>
    	{/if}
    {else}
    	<textarea name="comment" disabled="disabled" rows="5" class="area_all">亲，只有兑换过该商品，才可以评价！</textarea>
    {/if}	
    </td>
  </tr>
</table>
<input type="hidden" name="goodsid" value="{$goods.ID}">
<div align="center">
	{if $isex}
    	{if $iscom}	
			<input type="button" disabled="disabled"  class="anniu10" value="发表点评"/>
		{else}
			<input type="button"  onclick="checkNull()" class="anniu10" value="发表点评"/>
		{/if}
	{else}
		<input type="button" disabled="disabled"  class="anniu10" value="发表点评"/>
	{/if}
</div>
</form>
</div>
<!--发表点评 end-->

</div>
<!--评论详细 end-->
</div>



	<!--兑换记录-->
   {if $pagekey eq 'pg_2'}
		<div id="tagContent2" style="DISPLAY: block">
	{else}
		<div id="tagContent2" style="DISPLAY: none">
	{/if}
    
    <!--兑换记录详细-->
	<div class="show_all_plun">
	  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="all_ttbb">
 {section name=ex loop=$exrecord }
  <tr>
    <td valign="top" style="width:40%">{$exrecord[ex].goodsname}</td>
   	<td valign="top" style="width:20%;color:#999">兑换于[{$exrecord[ex].exchangetime}]</td>
    <td valign="top" style="width:20%; color:#999;">{$exrecord[ex].exchangenum}件</td>
    <td valign="top" style="width:20%">{$exrecord[ex].nickname}
    {if $exrecord[ex].level eq 1}
    <p class="jibie1"></p>
    {elseif $exrecord[ex].level eq 2}
    <p class="jibie2"></p>
    {elseif $exrecord[ex].level eq 3}
    <p class="jibie3"></p>
    {elseif $exrecord[ex].level eq 4}
    <p class="jibie4"></p>
    {elseif $exrecord[ex].level eq 5}
    <p class="jibie5"></p>
    {/if}
    </td>
  </tr>
 {sectionelse}	
	 <tr><td>亲暂时还没有人兑换！</td></tr>
  {/section}  
</table>
<!--页码-->
       <DIV class="blank"></DIV>
       <div class="num_pg">
       <DIV class="red_pg">
		<script type="text/javascript">
    		var pg_2 = new showPages('pg_2');
    		pg_2.pageCount = '{$pagecount1}';
    		//pg_2.pageCount =10;
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
<script src="./templates/scripts/goods/selecttag.js" type="text/javascript"></script>
<script src="./templates/scripts/goods/showdiv.js" type="text/javascript"></script>
<script src="./templates/scripts/goods/goodsdetail.js" type="text/javascript"></script>
{literal}
<SCRIPT language=javascript> 
//收藏商品
function collectExGoods(goodsid,ctype){
	var request=createXMLHttpRequest();//创建ajax
	request.open("post","flow.php?act=collect&goodsid="+goodsid+"&ctype="+ctype);
	request.send();
	//当readyState属性改变时的事件处理
	request.onreadystatechange=function(){
		if(request.readyState==4){//响应完成
			if(request.status==200){//一切顺利
				var value=request.responseText;
				//成功收藏
				if(value=="true"){
					showdiv(document.getElementById("coll_goodsid"),"成功收藏该商品！","关闭","1");
					return false;
				}else{
					showdiv(document.getElementById("coll_goodsid"),"您已收藏过该商品！","关闭","0");
					return false;
				}
			}
		}
	}		
}
</SCRIPT>
{/literal}
<!------------------------------------------body over-->
{include file=footer.tpl}