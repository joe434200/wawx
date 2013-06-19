<?php /* Smarty version 2.6.18, created on 2013-06-19 14:53:02
         compiled from header.tpl */ ?>
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
    <td><?php if ($_SESSION['loginok'] == 0 || $_SESSION['loginok'] == ''): ?>
    <p class="main_login_anniu">
       <a href="javascript:void(0)" id="content""  onclick="LoginOut();">登录</a></p>
    <?php else: ?>
    
    	欢迎[<font color="#9e0405"><?php echo $_SESSION['baseinfo']['nickname']; ?>
</font>]来到吾校
    <?php endif; ?>
    </td>
    <td><p class="main_login_anniu"><a href="register.php?module=init">注册</a></p></td>
    <?php if ($_SESSION['loginok'] == 0 || $_SESSION['loginok'] == ''): ?>
    <?php else: ?>
    
    <td><span class="xx">|</span><a href="userCenter.php">用户中心</a><span class="xx">|</span></td>
        <?php if ($_SESSION['baseinfo']['usertype'] == 1): ?>
      <td><a href="shop.php">我的吾校店</a>
      <span class="xx">|</span></td>
         <?php endif; ?>
     <?php endif; ?>
    
    <td><a href="#">帮助中心</a>
    <span class="xx">|</span></td>
    <td> <div class="menu2">
            <em><a class="menu-hd" href="javascript:void(0)">商家联盟</a></em>
            <div class="menu-bd">
				<div class="menu-bd-panel">
					<ul>
                      <?php $_from = $this->_tpl_vars['alliance']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
						<li><a href="<?php echo $this->_tpl_vars['item']['linkurl']; ?>
"><?php echo $this->_tpl_vars['item']['name']; ?>
</a></li>
					 <?php endforeach; endif; unset($_from); ?>
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
                        <?php $_from = $this->_tpl_vars['friendlink']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
						<li><a href="<?php echo $this->_tpl_vars['item']['linkurl']; ?>
"><?php echo $this->_tpl_vars['item']['name']; ?>
</a></li>
					    <?php endforeach; endif; unset($_from); ?>
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
            [ <em><A class="menu-hd" href="javascript:void(0)" id="firstcity"><?php echo $this->_tpl_vars['firstcity'][0]['name']; ?>
</a></em> ]
            <div class="menu-bd">
				<div class="menu-bd-panel">
					<ul id="firstcityarea">
                        <?php $_from = $this->_tpl_vars['firstcity']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
                        <?php if ($this->_tpl_vars['key'] > 0): ?>
						<li><A href="javascript:changefirstcity('<?php echo $this->_tpl_vars['item']['ID']; ?>
','<?php echo $this->_tpl_vars['item']['name']; ?>
')"><?php echo $this->_tpl_vars['item']['name']; ?>
</A></li>
						<?php endif; ?>
						<?php endforeach; endif; unset($_from); ?>
					</ul>
				</div>
             </div>
    </div>
    </td>

    <td>
        <div class="menu4">
            [ <em><A class="menu-hd" href="javascript:void(0)" id="secondcity"><?php echo $this->_tpl_vars['secondcity'][0]['name']; ?>
</a></em> ]
            <div class="menu-bd">
				<div class="menu-bd-panel">
					<ul id="secondcityarea">
					<?php $_from = $this->_tpl_vars['secondcity']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
					<?php if ($this->_tpl_vars['key'] > 0): ?>
                        <li><A href="javascript:changsecondcity('<?php echo $this->_tpl_vars['item']['ID']; ?>
','<?php echo $this->_tpl_vars['item']['name']; ?>
')" ><?php echo $this->_tpl_vars['item']['name']; ?>
</A></li>
                        <?php endif; ?>
                        <?php endforeach; endif; unset($_from); ?>

					</ul>
				</div>
             </div>
    </div>
    </td>

    <td>
        <div class="menu4">
            [ <em><A class="menu-hd" href="javascript:void(0)" id="thirdcity"><?php echo $this->_tpl_vars['thirdcity'][0]['name']; ?>
</a></em> ]
            <div class="menu-bd">
				<div class="menu-bd-panel">
					<ul id="thirdcityarea">
					<?php $_from = $this->_tpl_vars['thirdcity']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
					<?php if ($this->_tpl_vars['key'] > 0): ?>
                        <li><A href="javascript:changethirdcity('<?php echo $this->_tpl_vars['item']['ID']; ?>
','<?php echo $this->_tpl_vars['item']['name']; ?>
')" ><?php echo $this->_tpl_vars['item']['name']; ?>
</A></li>
                        <?php endif; ?>
                        <?php endforeach; endif; unset($_from); ?>

					</ul>
				</div>
             </div>
    </div>
    </td>

  </tr>
</table>
</div>
</div>
 <?php echo '
  <script type="text/javascript">
  function valuenull(){
	  document.bigSearchForm.searchkey.value="";
  }
  function inputValidate(){
	  var inputvalue=document.bigSearchForm.searchkey.value;
	  if(inputvalue == null || inputvalue.length == 0) {
	      alert(\'请输入搜索条件！\');
	      document.bigSearchForm.searchkey.focus();
	      return false;
	  }
	  //document.bigSearchForm.action=document.bigSearchForm.action+"&searchkey="+inputvalue;
	  document.bigSearchForm.submit();
	  return true;
  }
  </script> 
  '; ?>

<div class="back_search">
<div class="back_search_red">
<form action="search.php?searchtype=big" method="post" name="bigSearchForm">
<div class="div2"><input type="text" name="searchkey" onfocus="valuenull()"  class="txt" value="<?php echo $this->_tpl_vars['searchkey']; ?>
"/></div>
<div class="div1"><input type="button"  class="an" onclick="inputValidate()" value="搜索"/></div>
</form>
<div class="back_search_hot a8c">
<em>热门搜索</em>
<?php $_from = $_SESSION['hotsearch']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
<span><a href="search.php?searchtype=big&searchkey=<?php echo $this->_tpl_vars['item']['keyword']; ?>
" target="_blank"><?php echo $this->_tpl_vars['item']['keyword']; ?>
</a></span>
<?php endforeach; endif; unset($_from); ?>
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
            <p><a class="menu-hd" id="schooldisplayarea" href="javascript:void(0)"><?php echo $this->_tpl_vars['defaultschoolname']; ?>
</a></p>
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
<?php $_from = $this->_tpl_vars['firstcity']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
<dd <?php if ($this->_tpl_vars['selectcityid'] == $this->_tpl_vars['item']['ID']): ?>class="sel"<?php endif; ?> id ="city<?php echo $this->_tpl_vars['item']['ID']; ?>
" onclick="changeschools('<?php echo $this->_tpl_vars['item']['ID']; ?>
')"><?php echo $this->_tpl_vars['item']['name']; ?>
</dd>
<?php endforeach; endif; unset($_from); ?>

</dl>
</div>

<div class="gakko_sel clearfix" id="gakko_roll" >
<dl id="schoolarea" >
<?php $_from = $this->_tpl_vars['schools']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
<dd <?php if ($_SESSION['cityid']['schoolid'] == $this->_tpl_vars['item']['ID']): ?>class="sel"<?php endif; ?> id="school<?php echo $this->_tpl_vars['item']['ID']; ?>
" onclick="javascript:addschool('<?php echo $this->_tpl_vars['item']['ID']; ?>
')"><?php echo $this->_tpl_vars['item']['schoolname']; ?>
</dd>
<?php endforeach; endif; unset($_from); ?>
</dl>
</div>

</div>
</div>

 </div>
</div>
</li>

<li  <?php if ($_SESSION['myschooltype'] == 0 || $_SESSION['barType'] == ""): ?>class="backbj"<?php endif; ?>><a href="index.php">首页</a></li>         
<li  <?php if ($_SESSION['myschooltype'] == 1): ?>class="backbj"<?php endif; ?>><a href="aroundlife.php">校边生活</a></li>
<li  <?php if ($_SESSION['myschooltype'] == 2): ?>class="backbj"<?php endif; ?>><a href="index.php?act=studentwill">学生惠</a></li>
<li  <?php if ($_SESSION['myschooltype'] == 3): ?>class="backbj"<?php endif; ?>><a href="exchange.php?act=index">校币了没</a></li>
<li><a href="barindex.php">校笑吧</a></li>
<li class="buy">

<p <?php if ($_SESSION['myschooltype'] != 4): ?> class="car" <?php else: ?>class="car backbj"<?php endif; ?>><a 
  <?php if ($_SESSION['loginok'] == 1): ?> href="flow.php?act=index" <?php else: ?>  href="javascript:LoginOut()" <?php endif; ?>>购物车</a></p>


<p <?php if ($_SESSION['myschooltype'] != 5): ?>class="result" <?php else: ?>class="result backbj"<?php endif; ?>><a 
<?php if ($_SESSION['loginok'] == 1): ?> href="flow.php?act=checkout" <?php else: ?> href="javascript:LoginOut()" <?php endif; ?>>去结算</a></p>
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
      <input type="checkbox" name="rememberstatus" id="rememberstatus"  <?php if ($this->_tpl_vars['rememberstatus'] == '1'): ?>checked="checked"<?php endif; ?> value=""/>
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
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "warning.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</form>
</div>
</div>



