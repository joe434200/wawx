{include file=header.tpl}
<!------------------------------------------body-->
<DIV class="blank"></DIV>
<DIV class="block clearfix"><!--当前位置-->
<div class="location ared">当前位置：
<a href="index.php">首页</a> > <a href="aroundlife.php?aroundact={$around.ID}">{$around.name}</a> > 搜索结果
</div>
<div class="shop_wenben">
<div class="clearfix">
    <div id="show_menu">
    <UL id="tags">
    <LI class=selectTag>
    <A onClick="selectTag('tagContent0',this)" href="javascript:void(0)">宝贝（200件）</A> </LI>
    <LI>
    <A onClick="selectTag('tagContent1',this)" href="javascript:void(0)">店铺（300家）</A> </LI>
    </UL>
    </div>
    
  <!-- 宝贝 -->
	<div id="tagContent0" style="DISPLAY: block">
	<div class="show_all_plun1">
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="all_ttbb">
  <tr onmouseover="changebgcolor1(this)" onmouseout="changebgcolor2(this)">
    <td valign="top" class="pl">啊啊啊啊啊啊啊啊啊<span>的速度是多少</span></td>
    <td valign="top" class="addr">的所得税</td>
    <td valign="top" class="name">的速度速度</td>
  </tr>  
</table>
</div></div>
	<!-- 店铺 -->
	<div id="tagContent1" style="DISPLAY: none">
	<div class="show_all_plun1">
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="all_ttbb">
 <tr onmouseover="changebgcolor1(this)" onmouseout="changebgcolor2(this)">
  <td>
   <DIV class="block clearfix">
    <div id="goodsInfo" class="clearfix">
		<img style="width: 115px;height: 115px" src="./uploadfiles/shop/104.jpg" />
	</div>
	<div class="goods_desc clearfix">
	<div class="bt">xcxcxcxcxc</div>
	<div class="nr clearfix">
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td width="69%">
		<p><span>电话:</span>1234</p>
		<p><span>地址:</span>dssds</p>
		<p class="top5"> 
		<img
			src="./templates/images/goods/sh_icon1.gif" /> <img
			src="./templates/images/goods/sh_icon2.gif" /> <img
			src="./templates/images/goods/sh_icon3.gif" /> </p>
		</td>
		<td width="14%"><img src="./templates/images/goods/card.gif" /></td>
		<td width="17%">
		<p class="zhekou">8折</p>
		</td>
	</tr>
	</table>
	</div>
	<div class="card">
		<input type="button" class="sh_bnt"  value="推荐给社区朋友赢校币" />&nbsp;&nbsp;
		<input type="button" class="sh_bnt2" value="关注" />&nbsp;&nbsp;
		<input type="button" class="bnt_plun"  value="查看详情" />
	</div>
	</div>
	</div>
   </td>
  </tr>
<tr onmouseover="changebgcolor1(this)" onmouseout="changebgcolor2(this)">
  <td>
   <DIV class="block clearfix">
    <div id="goodsInfo" class="clearfix">
		<img style="width: 115px;height: 115px" src="./uploadfiles/shop/104.jpg" />
	</div>
	<div class="goods_desc clearfix">
	<div class="bt">xcxcxcxcxc</div>
	<div class="nr clearfix">
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td width="69%">
		<p><span>电话:</span>1234</p>
		<p><span>地址:</span>dssds</p>
		<p class="top5"> 
		<img
			src="./templates/images/goods/sh_icon1.gif" /> <img
			src="./templates/images/goods/sh_icon2.gif" /> <img
			src="./templates/images/goods/sh_icon3.gif" /> </p>
		</td>
		<td width="14%"><img src="./templates/images/goods/card.gif" /></td>
		<td width="17%">
		<p class="zhekou">8折</p>
		</td>
	</tr>
	</table>
	</div>
	<div class="card">
		<input type="button" class="sh_bnt"  value="推荐给社区朋友赢校币" />&nbsp;&nbsp;
		<input type="button" class="sh_bnt2" value="关注" />&nbsp;&nbsp;
		<input type="button" class="bnt_plun"  value="查看详情" />
	</div>
	</div>
	</div>
   </td>
  </tr>
</table>
</div>
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
</div>
</div>
</div>
</DIV>
{literal}
<SCRIPT type=text/javascript>

function changebgcolor1(obj){
	obj.className="show_all_plun1shop";
}
function changebgcolor2(obj){
	obj.className="";
}

function selectTag(showContent,selfObj){

	var tag = document.getElementById("tags").getElementsByTagName("li");
	var taglength = tag.length;
	for(i=0; i<taglength; i++){
		tag[i].className = "";
	}
	selfObj.parentNode.className = "selectTag";

	for(i=0; j=document.getElementById("tagContent"+i); i++){
		j.style.display = "none";
	}
	document.getElementById(showContent).style.display = "block";
}
</SCRIPT>
 {/literal}
<!------------------------------------------body over-->
{include file=footer.tpl}