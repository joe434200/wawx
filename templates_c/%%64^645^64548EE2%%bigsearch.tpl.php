<?php /* Smarty version 2.6.18, created on 2013-06-19 16:00:57
         compiled from bigsearch/bigsearch.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $this->_tpl_vars['pageTitle']; ?>
</title>
<link href="./templates/css/schoolbar/style.css" rel="stylesheet" type="text/css" />
<link href="./templates/scripts/My97DatePicker/skin/WdatePicker.css" rel="stylesheet" type="text/css" />
<link href="./templates/pagesplit/page.css"  rel="stylesheet" type="text/css" />

  <script src="./templates/scripts/front.js" type="text/javascript"></script>
  <script src="./templates/scripts/validate.js" type="text/javascript"></script>

<script src="./templates/scripts/My97DatePicker/WdatePicker.js"></script>

<script src="./templates/scripts/jquery-1.6.3.js" type="text/javascript"></script>
<script src="./templates/pagesplit/page.js" type="text/javascript"></script>
<script src="./templates/scripts/schoolbar/roll.js" type="text/javascript"></script>
<script src="./templates/scripts/login.js" type="text/javascript"></script>
 <script src="./templates/scripts/prototype.js" type="text/javascript"></script>
 <script  src="./templates/scripts/bigsearch.js" type="text/javascript"></script>
</head>



<body>

<div class="q_toper">
       <div class="box">
	   <ul class="q_toper_a">
	   <li><a href="index.php">吾校首页</a></li>
	   <li><a href="aroundlife.php">校边生活</a></li>
	   <li><a href="index.php?act=studentwill">学生惠</a></li>
	   <li><a href="exchange.php?act=index">校币了没</a></li>
	   <li><a href="barindex.php">校笑吧</a></li> 
	   
	   <li class="rr"><a href="userCenter.php">设置</a></li>
	   <?php if ($_SESSION['loginok'] == 1): ?>
	   <li class="rr"><a href="javascript:void(0)">亲，欢迎来到吾校！</a> </li>
	   		<?php if ($_SESSION['baseinfo']['nickname'] != ""): ?>
	   		<li class="rr"><a href="self_zone.php"><?php echo $_SESSION['baseinfo']['nickname']; ?>
</a></li>
	   		<?php else: ?>
	   		<li class="rr"><a href="self_zone.php"><?php echo $_SESSION['baseinfo']['email']; ?>
</a></li>
	   		<?php endif; ?>
	   <?php else: ?>
	   <li class="rr"><a href="register.php?module=init">注册</a></li>
	   <li class="rr" ><a href="javascript:void(0)" id="content""  onclick="LoginOut();">登录</a></li>
	   <li class="rr"><a>亲，欢迎来到吾校！</a> </li>
	   <?php endif; ?>
	   
	   </ul>
	   </div>
   </div>






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
    <td width="23%" class="a0392"><a href="#">找回密码？</a></td>
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
	&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" name="Submit" value="注 册"  class="anniu4" onclick="window.location='register.php?module=init'"/>	
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


     <div class="box4">
     <div class="wx_search">
	 <form action="" method="get">
	 
	 <table width="100%" border="0" cellspacing="0" cellpadding="0" class="ttbb1"> 
	
  <tr>
    <td align="right">&nbsp;</td>
    <td><span><a href="javascript:void(0)" onclick="javascript:changesearch(4)" id="typesearch4" <?php if ($this->_tpl_vars['type'] == 4): ?> style="color:blue" <?php endif; ?>>话题</a></span>  <span>|</span>
	<span><a href="javascript:void(0)" onclick="javascript:changesearch(2)" id="typesearch2" <?php if ($this->_tpl_vars['type'] == 2): ?> style="color:blue" <?php endif; ?>>圈子</a></span>  <span>|</span>
	<span><a href="javascript:void(0)" onclick="javascript:changesearch(5)" id="typesearch5" <?php if ($this->_tpl_vars['type'] == 5): ?> style="color:blue" <?php endif; ?>>用户</a></span>  <span>|</span>
	<span><a href="javascript:void(0)" onclick="javascript:changesearch(3)" id="typesearch3" <?php if ($this->_tpl_vars['type'] == 3): ?> style="color:blue" <?php endif; ?>>活动</a></span>  </td>
    <td>&nbsp;</td>
  </tr>
  
  <tr>
    <td width="18%" align="right"><img src="./templates/images/schoolbar/search_2.gif" width="113" height="32" /></td>
    <td width="58%"><input name="Input" type="text"  class="wx_search_txt" id="searcharea" value="<?php echo $this->_tpl_vars['key']; ?>
"/></td>
    <td width="24%"><input name="" type="button"  class="wx_search_an" value="" onclick="javascript:checksearch()"/></td>
  </tr>
 
   </table>
	 </form>
     </div>
	 
	 
	 
	 <div class="wx_search_list" style="height:auto!important;height:300px;min-height:300px;">
	 <?php if ($this->_tpl_vars['searchdata']['info']): ?>
    <!--找到数据-->
	<p class="size14">为您找到<?php echo $this->_tpl_vars['searchdata']['countnum']; ?>
条相关数据</p>
	<div class="blank20"></div>
	
	    <?php if ($this->_tpl_vars['type'] == 1 || $this->_tpl_vars['type'] == 2): ?>
	   <div class="q_list clearfix">
	     <ul class=" clearfix">
			 <?php $_from = $this->_tpl_vars['searchdata']['info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
			 <li  class=" clearfix">
			   <div class="pic"><a href="javascript:void(0)"><img src="./uploadfiles/group/groupImage/<?php echo $this->_tpl_vars['item']['photo']; ?>
" border="0" /></a></div>
			   <div class="info  clearfix">
			      <dl>
			      <p class="a0693e3"><a href="grp_single_home.php?ID=<?php echo $this->_tpl_vars['item']['ID']; ?>
"><?php echo $this->_tpl_vars['item']['groupname']; ?>
</a></p>
				  <dt>话题：<?php echo $this->_tpl_vars['item']['topicnum']; ?>
&nbsp;&nbsp;&nbsp;&nbsp;成员：<?php echo $this->_tpl_vars['item']['membernum']; ?>
</dt>
				  <dd><?php echo $this->_tpl_vars['item']['introduction']; ?>
</dd>
				  </dl>
			   </div>
			   <div class="ann afff"><a href="grp_single_home.php?ID=<?php echo $this->_tpl_vars['item']['ID']; ?>
">进入圈子</a></div>
			 </li>
			 <?php endforeach; endif; unset($_from); ?>
		 </ul>
	   </div> <!--/全部 list-->
	  <?php endif; ?>
	 <?php if ($this->_tpl_vars['type'] == 3): ?>
	  <div class="hd_activities clearfix">
			     <ul id="act_list">
			  
			    <?php $_from = $this->_tpl_vars['searchdata']['info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['act_listsKey'] => $this->_tpl_vars['act_list']):
?>
    			<li class="clearfix">
				   <div class="pic"><?php if ($this->_tpl_vars['act_list']['photo']): ?><img src="./uploadfiles/activity/hdImage/<?php echo $this->_tpl_vars['act_list']['photo']; ?>
"  border="0" /><?php else: ?><img src="./templates/images/schoolbar/6.jpg" border="0" /><?php endif; ?></div>
				   <div class="info">
				       <h3 class="a0693e3_line"><a href="hd.php?module=hd_list_show1&hd_id=<?php echo $this->_tpl_vars['act_list']['ID']; ?>
"><?php echo $this->_tpl_vars['act_list']['actname']; ?>

				       </a></h3>
					   <p>活动时间: <?php echo $this->_tpl_vars['act_list']['begintime']; ?>
 --- <?php echo $this->_tpl_vars['act_list']['endtime']; ?>
</p>
					   <p>地点：<?php echo $this->_tpl_vars['act_list']['name']; ?>
 </p>
					   <p>发起：<em class="a0693e3"><a href="zone.php?uid=<?php echo $this->_tpl_vars['act_list']['uID']; ?>
"><?php echo $this->_tpl_vars['act_list']['nickname']; ?>
</a></em></p>
					   <p> <em class="nub1"><?php echo $this->_tpl_vars['act_list']['attentionnum']; ?>
</em>  人关注&nbsp;&nbsp;&nbsp;<em class="nub2"><?php echo $this->_tpl_vars['act_list']['membernum']; ?>
</em>  人参加 </p>
				   </div>
				   <div class="tag">
				      <p class="wen">其它</p>
					  <p class="pp"><?php if ($this->_tpl_vars['act_list']['endtime'] >= $this->_tpl_vars['date_new']): ?><img src="./templates/images/schoolbar/hd_bj5.gif" /><?php else: ?>活动已经过期<?php endif; ?></p>
				   </div>
				 </li>
   				<?php endforeach; endif; unset($_from); ?>
   				</ul>
   				</div>
   	
   		<?php endif; ?>
   <?php if ($this->_tpl_vars['type'] == 4): ?>
	<div class="wx_search_list">
	<ul>
		 <?php $_from = $this->_tpl_vars['searchdata']['info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
		<li>
		<h3><a href="forum_home?module=replylist&forumid=<?php echo $this->_tpl_vars['item']['ID']; ?>
"><?php echo $this->_tpl_vars['item']['title']; ?>
</a></h3>
		<p><?php echo $this->_tpl_vars['item']['content']; ?>
</p>
		</li>
		<?php endforeach; endif; unset($_from); ?>
	</ul>
	</div>
	   <?php endif; ?>
	 <?php if ($this->_tpl_vars['type'] == 5): ?>
	 <div class="wx_search_peo clearfix">
   <h3>你可能想认识的人</h3>
	   <ul>
	    <?php $_from = $this->_tpl_vars['searchdata']['info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
	   <li>
	   <p><img src="./uploadfiles/user/<?php echo $this->_tpl_vars['item']['photo']; ?>
" width="100px" height="100px" onerror="this.src='./templates/images/schoolbar/avatar.jpeg'"/></p>
	   <p><a href="wb_index.php?uid=<?php echo $this->_tpl_vars['item']['ID']; ?>
"><?php if ($this->_tpl_vars['item']['nickname']): ?> <?php echo $this->_tpl_vars['item']['nickname']; ?>
 <?php else: ?> <?php echo $this->_tpl_vars['item']['email']; ?>
 <?php endif; ?></a></p>
	   </li>
	   <?php endforeach; endif; unset($_from); ?>
	    </ul>
   </div>
      <?php endif; ?>
	 
	<div class="blank20"></div>
	<!--page-->
	   <div class="num_pg">
	  <script type="text/javascript">
       var pg1 = new showPages('pg1');
	   pg1.pageCount = '<?php echo $this->_tpl_vars['pagecount']; ?>
';
	   pg1.argName = 'p';
	   pg1.printHtml();
     </script>
	   </div>
	   <div class="blank20"></div>
	   <!--/page-->
	</div>
	<?php endif; ?>
	
	 <!--/找到数据-->
   
     <!--没有找到-->
	   <?php if (! $this->_tpl_vars['searchdata']['info'] && $this->_tpl_vars['key']): ?>
		 <?php if ($this->_tpl_vars['type'] != 5): ?>
		 <p class="size14">吾校已为您搜到0条相关结果。（用时<?php echo $this->_tpl_vars['runtime']; ?>
秒）</p>
	     <div class="blank20"></div>
	     <?php else: ?>
		 <table width="100%" border="0" cellspacing="0" cellpadding="0">
	  <tr>
	    <td width="22%">&nbsp;</td>
	    <td width="16%"><img src="./templates/images/schoolbar/search_3.gif" width="86" height="127" /></td>
	    <td width="62%" class="size14">很抱歉，这里没有找到你想找的人！</td>
	  </tr>
	   </table>
	     <?php endif; ?>
	   <?php endif; ?>
  
   <!--/没有找到-->
   
   
   
   
   

    
     </div>
	 
	 
	 
	 
	 

    

  

 <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "barfooter.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>