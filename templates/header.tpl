<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>首页</title>


<link href="./templates/css/goods/daohang.css" rel="stylesheet" type="text/css" />

<link href="./templates/css/goods/common.css" rel="stylesheet" type="text/css" />
<link href="./templates/css/goods/style.css" rel="stylesheet" type="text/css" />
<link href="./templates/pagesplit/page.css" rel="stylesheet" type="text/css" />
  <script src="./templates/scripts/front.js" type="text/javascript"></script>
  <script src="./templates/scripts/validate.js" type="text/javascript"></script>
<script src="./templates/scripts/prototype.js" type="text/javascript"></script>
<script src="./templates/scripts/jquery-1.6.3.js" type="text/javascript"></script>
<script src="./templates/pagesplit/page.js" type="text/javascript"></script>

<script src="./templates/scripts/login.js" type="text/javascript"></script>

<script src="./templates/scripts/myschoolheader.js" type="text/javascript"></script>

</head>



<body>

<div class="all_zong">
<!--最上面 灰色条部分-->
<div class="all_zong_top">
<div class="all_zong_top_left a8c">
<table border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><a href="javascript:AddFavorite('我爱我校',location.href)"">收藏本站</a><span class="xx">|</span></td>
    <td><input name="" type="checkbox" value="" /></td>
    <td>手机版<span  class="xx">|</span></td>
    <td><input name="" type="checkbox" value="" /></td>
    <td>ipad版</td>
  </tr>
</table>
</div>

<div class="all_zong_top_right a8c">
<table border="0" cellspacing="0" cellpadding="0" class="main_login">
  <tr>
    <td>{if $smarty.session.loginok eq 0 or $smarty.session.loginok eq ''}
    <p class="main_login_anniu">
       <a href="javascript:void(0)" id="content""  onclick="LoginOut();">登录</a></p>
    {else}
    
    	欢迎[<font color="#9e0405">{$smarty.session.baseinfo.nickname}</font>]来到吾校
    {/if}
    </td>
    <td><p class="main_login_anniu"><a href="register.php?module=init">注册</a></p></td>
    {if $smarty.session.loginok eq 0 or $smarty.session.loginok eq ''}
    {else}
    
    <td><span class="xx">|</span><a href="userCenter.php">用户中心</a><span class="xx">|</span></td>
        {if $smarty.session.baseinfo.usertype eq 1}
      <td><a href="shop.php">我的吾校店</a>
      <span class="xx">|</span></td>
         {/if}
     {/if}
    
    <td><a href="#">帮助中心</a>
    <span class="xx">|</span></td>
    <td> <div class="menu2">
            <em><a class="menu-hd" href="javascript:void(0)">商家联盟</a></em>
            <div class="menu-bd">
				<div class="menu-bd-panel">
					<ul>
                      {foreach from=$alliance item=item key=key}
						<li><a href="{$item.linkurl}">{$item.name}</a></li>
					 {/foreach}
					</ul>
				</div>
             </div>
    </div><span class="xx">|</span></td>
    
    <td>
    <div class="menu3">
            <em><a class="menu-hd" href="javascript:void(0)">吾爱吾校友情推荐</a></em>
            <div class="menu-bd">
				<div class="menu-bd-panel">
					<ul>
                        {foreach from=$friendlink item=item key=key}
						<li><a href="{$item.linkurl}">{$item.name}</a></li>
					    {/foreach}
					</ul>
				</div>
             </div>
    </div>
    </td>
  </tr>
</table>
</div>
</div>
<!--end-->



<!--logo 搜索-->
<div class="all_zong_logo">
<div class="all_zong_logo2">
<a href="index.php"><img src="./templates/images/goods/logo.gif"  /></a></div>
<div class="all_zong_city">
<p class="bz"><img src="./templates/images/goods/city1.gif" /></p>
<div class="city a8c">
<table  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>
        <div class="menu4">
            [ <em><A class="menu-hd" href="javascript:void(0)" id="firstcity">{$firstcity[0].name}</a></em> ]
            <div class="menu-bd">
				<div class="menu-bd-panel">
					<ul id="firstcityarea">
                        {foreach from=$firstcity item=item key=key}
                        {if $key gt 0}
						<li><A href="javascript:changefirstcity('{$item.ID}','{$item.name}')">{$item.name}</A></li>
						{/if}
						{/foreach}
					</ul>
				</div>
             </div>
    </div>
    </td>

    <td>
        <div class="menu4">
            [ <em><A class="menu-hd" href="javascript:void(0)" id="secondcity">{$secondcity[0].name}</a></em> ]
            <div class="menu-bd">
				<div class="menu-bd-panel">
					<ul id="secondcityarea">
					{foreach from=$secondcity item=item key=key}
					{if $key gt 0}
                        <li><A href="javascript:changsecondcity('{$item.ID}','{$item.name}')" >{$item.name}</A></li>
                        {/if}
                        {/foreach}

					</ul>
				</div>
             </div>
    </div>
    </td>

    <td>
        <div class="menu4">
            [ <em><A class="menu-hd" href="javascript:void(0)" id="thirdcity">{$thirdcity[0].name}</a></em> ]
            <div class="menu-bd">
				<div class="menu-bd-panel">
					<ul id="thirdcityarea">
					{foreach from=$thirdcity item=item key=key}
					{if $key gt 0}
                        <li><A href="javascript:changethirdcity('{$item.ID}','{$item.name}')" >{$item.name}</A></li>
                        {/if}
                        {/foreach}

					</ul>
				</div>
             </div>
    </div>
    </td>

  </tr>
</table>
</div>
</div>
 {literal}
  <script type="text/javascript">
  function valuenull(){
	  document.bigSearchForm.searchkey.value="";
  }
  function inputValidate(){
	  var inputvalue=document.bigSearchForm.searchkey.value;
	  if(inputvalue == null || inputvalue.length == 0) {
	      alert('请输入搜索条件！');
	      document.bigSearchForm.searchkey.focus();
	      return false;
	  }
	  //document.bigSearchForm.action=document.bigSearchForm.action+"&searchkey="+inputvalue;
	  document.bigSearchForm.submit();
	  return true;
  }
  </script> 
  {/literal}
<div class="back_search">
<div class="back_search_red">
<form action="search.php?searchtype=big" method="post" name="bigSearchForm">
<div class="div2"><input type="text" name="searchkey" onfocus="valuenull()"  class="txt" value="{$searchkey}"/></div>
<div class="div1"><input type="button"  class="an" onclick="inputValidate()" value="搜索"/></div>
</form>
<div class="back_search_hot a8c">
<em>热门搜索</em>
{foreach from=$smarty.session.hotsearch item=item key=key }
<span><a href="search.php?searchtype=big&searchkey={$item.keyword}" target="_blank">{$item.keyword}</a></span>
{/foreach}
<!-- <input type="button"  class="an" onclick="sessiondistroy()" value="清除session"/> -->
</div>
</div>

</div>
</div>
<!--end-->

</div>

<!--红色 导航-->
<div class="skin_a">
<div class="front_daohangbj" >
<div class="all_zong">

<div class="front_daohang">
<div class="vip"><a href="register.php?module=init_shangjia"><img src="./templates/images/goods/logo_vip.gif" /></a></div><!--这个商家入驻按钮，不用的时候隐藏-->
<ul>
<li class="all" >
<div class="menu5">
            <p><a class="menu-hd" id="schooldisplayarea" href="javascript:void(0)">{$defaultschoolname}</a></p>
            <div class="menu-bd" id="schooldiv"> 
<div class="gakko" >
<div class="gakko1 clearfix" >
<div class="gakko_search clearfix" >
<h3>选择学校</h3>
<div class="gakko_search_r  clearfix" >
<form action="" method="get">
<input name="schoolsearch" type="text"  id="schoolsearch" class="gakko_search_txt" onfocus="this.value=''"/>
<input type="button" class="gakko_search_ann" value="搜索" onclick="searchschool()"/>
</form>
</div>
</div>
<div class="gakko_sel clearfix" >
<dl id="cityarea">
{foreach from=$firstcity item=item key=key}
<dd {if $selectcityid eq $item.ID}class="sel"{/if} id ="city{$item.ID}" onclick="changeschools('{$item.ID}')">{$item.name}</dd>
{/foreach}

</dl>
</div>

<div class="gakko_sel clearfix" id="gakko_roll" >
<dl id="schoolarea" >
{foreach from=$schools item=item key=key}
<dd {if $smarty.session.cityid.schoolid eq $item.ID}class="sel"{/if} id="school{$item.ID}" onclick="javascript:addschool('{$item.ID}')">{$item.schoolname}</dd>
{/foreach}
</dl>
</div>

</div>
</div>

 </div>
</div>
</li>

<li  {if $smarty.session.myschooltype eq 0 or $smarty.session.barType eq ""}class="backbj"{/if}><a href="index.php">首页</a></li>         
<li  {if $smarty.session.myschooltype eq 1}class="backbj"{/if}><a href="aroundlife.php">校边生活</a></li>
<li  {if $smarty.session.myschooltype eq 2}class="backbj"{/if}><a href="index.php?act=studentwill">学生惠</a></li>
<li  {if $smarty.session.myschooltype eq 3}class="backbj"{/if}><a href="exchange.php?act=index">校币了没</a></li>
<li><a href="barindex.php">校笑吧</a></li>
<li class="buy">

<p {if $smarty.session.myschooltype neq 4} class="car" {else}class="car backbj"{/if}><a 
  {if $smarty.session.loginok eq 1} href="flow.php?act=index" {else}  href="javascript:LoginOut()" {/if}>购物车</a></p>


<p {if $smarty.session.myschooltype neq 5}class="result" {else}class="result backbj"{/if}><a 
{if $smarty.session.loginok eq 1} href="flow.php?act=checkout" {else} href="javascript:LoginOut()" {/if}>去结算</a></p>
</li>                           
</ul>
</div>




</div>
</div>
</div>
<!--红色 导航 end-->


<!--弹出登录-->
<div id="alert">  
<h4><span> 现在登录</span><span id="close"> 关闭</span></h4>
<div style="padding:20px;"> 
<form action="" method="post" id="frm1" name="frm1">
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="ttbb2">
  <tr>
    <td width="18%">用户名：</td>
    <td colspan="2"><input type="text" name="email" id="email" class="txt_zhuce" value=""/></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td height="20" colspan="2" valign="top" class="color_999">例如：1234@qq.com</td>
    </tr>
  <tr>
    <td>密 &nbsp;&nbsp;码：</td>
    <td width="59%"><input type="password" name="password" id="password" class="txt_zhuce" value=""/></td>
    <td width="23%" class="a0392"><a href="reg_reback.php">找回密码？</a></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td height="40" colspan="2" valign="bottom">
      <input type="checkbox" name="rememberstatus" id="rememberstatus"  {if $rememberstatus eq "1"}checked="checked"{/if} value=""/>
     记住密码&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      </td>
    </tr>
  <tr>
    <td>&nbsp;
    <input id="logintype" name="logintype" value="0" style="display:none"/>
    </td>
    <td height="50" colspan="2" valign="bottom"><input type="button" name="login" value="登 录"  class="anniu4" onclick="javascript:checklogin();"/>
	&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" name="Submit" value="注 册"  class="anniu4" onclick="javascript:window.location='register.php?module=init'"/>	
	</td>
	
    </tr>
</table>
{include file=warning.tpl}
</form>
</div>
</div>




