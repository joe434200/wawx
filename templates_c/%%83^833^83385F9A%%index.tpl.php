<?php /* Smarty version 2.6.18, created on 2013-06-08 16:06:48
         compiled from index/index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cat', 'index/index.tpl', 53, false),array('modifier', 'msubstr', 'index/index.tpl', 55, false),)), $this); ?>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<!------------------------------------------body-->
<DIV class="blank"></DIV>
<DIV class="block clearfix">
<div style="width:1000px; float:left;">
<div id="marquee0"   style="overflow:hidden;width:1000px; height:14px; float:left; margin:0 auto; background:#d1d1d1; padding:3px 0;">
   <DIV style="OVERFLOW: hidden; WIDTH: 10000px">
   <div id="marquee0_1">
   <?php if ($this->_tpl_vars['exchangelist']): ?>
   		<?php $_from = $this->_tpl_vars['exchangelist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
			会员好<?php echo $this->_tpl_vars['item']['username']; ?>
兑换了<?php echo $this->_tpl_vars['item']['exchangenum']; ?>
件<?php echo $this->_tpl_vars['item']['goodsname']; ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<?php endforeach; endif; unset($_from); ?> 
   <?php else: ?>
  		暂时还没有兑换信息！
   <?php endif; ?>
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
<?php if ($this->_tpl_vars['aroundshop']): ?>
   		<?php $_from = $this->_tpl_vars['aroundshop']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
		<li><h3 class="title<?php echo $this->_tpl_vars['key']+1; ?>
"><a href="aroundlife.php?aroundact=<?php echo $this->_tpl_vars['item']['ID']; ?>
"><?php echo $this->_tpl_vars['item']['name']; ?>
</a></h3></li>
		<?php endforeach; endif; unset($_from); ?> 
   <?php else: ?>
  		暂时还没有本地商户！
   <?php endif; ?>
</ul>
</div>
<!--左侧本地商户 导航 end -->


<!--销售排行-->
<DIV class="blank5"></DIV>
<DIV class="box">
<DIV class="box_2">
<DIV class="top10Tit"><span>销售排行</span></DIV>
<DIV class="top10List clearfix">
   <?php if ($this->_tpl_vars['top10goodslist']): ?>
   		<?php $_from = $this->_tpl_vars['top10goodslist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
		<UL class="clearfix"><IMG class="iteration" src="./templates/images/goods/top_<?php echo ((is_array($_tmp=$this->_tpl_vars['key']+1)) ? $this->_run_mod_handler('cat', true, $_tmp, '.gif') : smarty_modifier_cat($_tmp, '.gif')); ?>
">  
  			<LI class="topimg"><A href="goods.php?goodsid=<?php echo $this->_tpl_vars['item']['id']; ?>
"><IMG class="samllimg" alt="" src="./uploadfiles/goods/<?php echo $this->_tpl_vars['item']['newimg']; ?>
"></A> </LI>
  			<LI class="iteration1"><A title="" href="goods.php?goodsid=<?php echo $this->_tpl_vars['item']['id']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['goodsname'])) ? $this->_run_mod_handler('msubstr', true, $_tmp, 0, 15) : smarty_modifier_msubstr($_tmp, 0, 15)); ?>
</A><BR>本店售价：<FONT class=f1>￥<?php echo $this->_tpl_vars['item']['shopprice']; ?>
元</FONT><BR></LI>
		</UL>
		<?php endforeach; endif; unset($_from); ?> 
   <?php else: ?>
  		暂时还没有销售信息！
   <?php endif; ?>

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
        <a href="<?php echo $this->_tpl_vars['leftadvertise']['linkid']; ?>
" target="_blank"><img src="./uploadfiles/goods/<?php echo $this->_tpl_vars['leftadvertise']['realname']; ?>
" /></a></p>
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

   <?php unset($this->_sections['grps']);
$this->_sections['grps']['name'] = 'grps';
$this->_sections['grps']['loop'] = is_array($_loop=$this->_tpl_vars['hotgrplist']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['grps']['start'] = (int)0;
$this->_sections['grps']['step'] = ((int)1) == 0 ? 1 : (int)1;
$this->_sections['grps']['max'] = (int)15;
$this->_sections['grps']['show'] = (bool)true;
if ($this->_sections['grps']['max'] < 0)
    $this->_sections['grps']['max'] = $this->_sections['grps']['loop'];
if ($this->_sections['grps']['start'] < 0)
    $this->_sections['grps']['start'] = max($this->_sections['grps']['step'] > 0 ? 0 : -1, $this->_sections['grps']['loop'] + $this->_sections['grps']['start']);
else
    $this->_sections['grps']['start'] = min($this->_sections['grps']['start'], $this->_sections['grps']['step'] > 0 ? $this->_sections['grps']['loop'] : $this->_sections['grps']['loop']-1);
if ($this->_sections['grps']['show']) {
    $this->_sections['grps']['total'] = min(ceil(($this->_sections['grps']['step'] > 0 ? $this->_sections['grps']['loop'] - $this->_sections['grps']['start'] : $this->_sections['grps']['start']+1)/abs($this->_sections['grps']['step'])), $this->_sections['grps']['max']);
    if ($this->_sections['grps']['total'] == 0)
        $this->_sections['grps']['show'] = false;
} else
    $this->_sections['grps']['total'] = 0;
if ($this->_sections['grps']['show']):

            for ($this->_sections['grps']['index'] = $this->_sections['grps']['start'], $this->_sections['grps']['iteration'] = 1;
                 $this->_sections['grps']['iteration'] <= $this->_sections['grps']['total'];
                 $this->_sections['grps']['index'] += $this->_sections['grps']['step'], $this->_sections['grps']['iteration']++):
$this->_sections['grps']['rownum'] = $this->_sections['grps']['iteration'];
$this->_sections['grps']['index_prev'] = $this->_sections['grps']['index'] - $this->_sections['grps']['step'];
$this->_sections['grps']['index_next'] = $this->_sections['grps']['index'] + $this->_sections['grps']['step'];
$this->_sections['grps']['first']      = ($this->_sections['grps']['iteration'] == 1);
$this->_sections['grps']['last']       = ($this->_sections['grps']['iteration'] == $this->_sections['grps']['total']);
?>
 	<li><A href="#<?php echo $this->_tpl_vars['hotgrplist'][$this->_sections['grps']['index']]['id']; ?>
"><IMG class=iteration src="./uploadfiles/goods/<?php echo $this->_tpl_vars['hotgrplist'][$this->_sections['grps']['index']]['photo']; ?>
"></A><br />
     <a href="#<?php echo $this->_tpl_vars['hotgrplist'][$this->_sections['grps']['index']]['id']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['hotgrplist'][$this->_sections['grps']['index']]['groupname'])) ? $this->_run_mod_handler('msubstr', true, $_tmp, 0, 4) : smarty_modifier_msubstr($_tmp, 0, 4)); ?>
</a>
    </li>
  <?php endfor; else: ?>
	<li>暂时还没有圈子信息！</li>
  <?php endif; ?>
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
   <?php unset($this->_sections['forums']);
$this->_sections['forums']['name'] = 'forums';
$this->_sections['forums']['loop'] = is_array($_loop=$this->_tpl_vars['hotforumlist']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['forums']['start'] = (int)0;
$this->_sections['forums']['step'] = ((int)1) == 0 ? 1 : (int)1;
$this->_sections['forums']['max'] = (int)15;
$this->_sections['forums']['show'] = (bool)true;
if ($this->_sections['forums']['max'] < 0)
    $this->_sections['forums']['max'] = $this->_sections['forums']['loop'];
if ($this->_sections['forums']['start'] < 0)
    $this->_sections['forums']['start'] = max($this->_sections['forums']['step'] > 0 ? 0 : -1, $this->_sections['forums']['loop'] + $this->_sections['forums']['start']);
else
    $this->_sections['forums']['start'] = min($this->_sections['forums']['start'], $this->_sections['forums']['step'] > 0 ? $this->_sections['forums']['loop'] : $this->_sections['forums']['loop']-1);
if ($this->_sections['forums']['show']) {
    $this->_sections['forums']['total'] = min(ceil(($this->_sections['forums']['step'] > 0 ? $this->_sections['forums']['loop'] - $this->_sections['forums']['start'] : $this->_sections['forums']['start']+1)/abs($this->_sections['forums']['step'])), $this->_sections['forums']['max']);
    if ($this->_sections['forums']['total'] == 0)
        $this->_sections['forums']['show'] = false;
} else
    $this->_sections['forums']['total'] = 0;
if ($this->_sections['forums']['show']):

            for ($this->_sections['forums']['index'] = $this->_sections['forums']['start'], $this->_sections['forums']['iteration'] = 1;
                 $this->_sections['forums']['iteration'] <= $this->_sections['forums']['total'];
                 $this->_sections['forums']['index'] += $this->_sections['forums']['step'], $this->_sections['forums']['iteration']++):
$this->_sections['forums']['rownum'] = $this->_sections['forums']['iteration'];
$this->_sections['forums']['index_prev'] = $this->_sections['forums']['index'] - $this->_sections['forums']['step'];
$this->_sections['forums']['index_next'] = $this->_sections['forums']['index'] + $this->_sections['forums']['step'];
$this->_sections['forums']['first']      = ($this->_sections['forums']['iteration'] == 1);
$this->_sections['forums']['last']       = ($this->_sections['forums']['iteration'] == $this->_sections['forums']['total']);
?>
	 <li><a href="#<?php echo $this->_tpl_vars['hotforumlist'][$this->_sections['forums']['index']]['id']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['hotforumlist'][$this->_sections['forums']['index']]['title'])) ? $this->_run_mod_handler('msubstr', true, $_tmp, 0, 13) : smarty_modifier_msubstr($_tmp, 0, 13)); ?>
</a></li>	
   <?php endfor; else: ?>
  		暂时还没有帖子信息！
   <?php endif; ?> 
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
    <a href="<?php echo $this->_tpl_vars['centeradvertise']['linkid']; ?>
" target="_blank"><img src="./uploadfiles/goods/<?php echo $this->_tpl_vars['centeradvertise']['realname']; ?>
" /></a>
   </DIV>
   <!--广告 end-->
   
   
   <!--商家推荐-->
   <DIV class="blank5"></DIV>
   <DIV class="clearfix">
     <div class="box_1">
	 <div class="title_bt"><h3>商家推荐</h3></div>
     <div class="week_shop clearfix">
      
       <?php if ($this->_tpl_vars['advertshopslist']): ?>
       <ul>
   		<?php $_from = $this->_tpl_vars['advertshopslist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
			<li><a href="shop.php?shopid=<?php echo $this->_tpl_vars['item']['id']; ?>
"><img alt="" src="./uploadfiles/shop/<?php echo $this->_tpl_vars['item']['shoppicture']; ?>
"/></a></li>
		<?php endforeach; endif; unset($_from); ?> 
		</ul>
   	  <?php else: ?>
  		暂时还没有推荐信息！
      <?php endif; ?>
       
         
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
   <?php unset($this->_sections['notices']);
$this->_sections['notices']['name'] = 'notices';
$this->_sections['notices']['loop'] = is_array($_loop=$this->_tpl_vars['noticelist']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['notices']['show'] = true;
$this->_sections['notices']['max'] = $this->_sections['notices']['loop'];
$this->_sections['notices']['step'] = 1;
$this->_sections['notices']['start'] = $this->_sections['notices']['step'] > 0 ? 0 : $this->_sections['notices']['loop']-1;
if ($this->_sections['notices']['show']) {
    $this->_sections['notices']['total'] = $this->_sections['notices']['loop'];
    if ($this->_sections['notices']['total'] == 0)
        $this->_sections['notices']['show'] = false;
} else
    $this->_sections['notices']['total'] = 0;
if ($this->_sections['notices']['show']):

            for ($this->_sections['notices']['index'] = $this->_sections['notices']['start'], $this->_sections['notices']['iteration'] = 1;
                 $this->_sections['notices']['iteration'] <= $this->_sections['notices']['total'];
                 $this->_sections['notices']['index'] += $this->_sections['notices']['step'], $this->_sections['notices']['iteration']++):
$this->_sections['notices']['rownum'] = $this->_sections['notices']['iteration'];
$this->_sections['notices']['index_prev'] = $this->_sections['notices']['index'] - $this->_sections['notices']['step'];
$this->_sections['notices']['index_next'] = $this->_sections['notices']['index'] + $this->_sections['notices']['step'];
$this->_sections['notices']['first']      = ($this->_sections['notices']['iteration'] == 1);
$this->_sections['notices']['last']       = ($this->_sections['notices']['iteration'] == $this->_sections['notices']['total']);
?>
		<li><a href="index.php?id=<?php echo $this->_tpl_vars['noticelist'][$this->_sections['notices']['index']]['id']; ?>
&act=notice" target="_blank">
		<?php echo ((is_array($_tmp=$this->_tpl_vars['noticelist'][$this->_sections['notices']['index']]['title'])) ? $this->_run_mod_handler('msubstr', true, $_tmp, 0, 20) : smarty_modifier_msubstr($_tmp, 0, 20)); ?>
</a></li>
   <?php endfor; else: ?>
  		<li>暂时还没有公告信息！</li>
   <?php endif; ?>
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

 <?php if ($this->_tpl_vars['todayshoplist']): ?>
 	<?php $_from = $this->_tpl_vars['todayshoplist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
<li>
  <div>
    <p class="pic"><a href="shop.php?shopid=<?php echo $this->_tpl_vars['item']['id']; ?>
"><img src="./uploadfiles/shop/<?php echo $this->_tpl_vars['item']['shoppicture']; ?>
" /></a></p>
    <p class="wz"><strong><a href="shop.php?shopid=<?php echo $this->_tpl_vars['item']['id']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['shopname'])) ? $this->_run_mod_handler('msubstr', true, $_tmp, 0, 8) : smarty_modifier_msubstr($_tmp, 0, 8)); ?>
</a></strong><em><span><?php echo $this->_tpl_vars['item']['discount']; ?>
折现金卡</span></em></p>
  </div>		
</li>
	<?php endforeach; endif; unset($_from); ?> 
 <?php else: ?>	<div><li>暂时还没有商家信息！</li></div>
<?php endif; ?>
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

<?php if ($this->_tpl_vars['hotshoplist']): ?>
   <?php $_from = $this->_tpl_vars['hotshoplist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
<li>
  <div>
    <p class="pic"><a href="shop.php?shopid=<?php echo $this->_tpl_vars['item']['id']; ?>
"><img src="./uploadfiles/shop/<?php echo $this->_tpl_vars['item']['shoppicture']; ?>
" /></a></p>
    <p class="wz"><strong><a href="shop.php?shopid=<?php echo $this->_tpl_vars['item']['id']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['shopname'])) ? $this->_run_mod_handler('msubstr', true, $_tmp, 0, 8) : smarty_modifier_msubstr($_tmp, 0, 8)); ?>
</a></strong><em><span><?php echo $this->_tpl_vars['item']['discount']; ?>
折现金卡</span></em></p>
  </div>
			
</li>
	<?php endforeach; endif; unset($_from); ?> 
<?php else: ?>	
	<div><li>暂时还没有商家信息！</li></div>
 <?php endif; ?>
</ul>
</div>
</div>
</div>
<!--热点商家 列表 end-->


</DIV>
</DIV>
</DIV>

<?php echo '
<script type="text/javascript">
	var i=0;
	var j=0;
	//换一组热点圈子
	function changehotgrp(){
		var num=++j;
		//var a=(如果是数值)'; ?>
smarty数值变量<?php echo ';(如果是字符串)\''; ?>
smarty字符串变量<?php echo '\';
		var a= '; ?>
<?php echo $this->_tpl_vars['hotgrplistjs']; ?>
<?php echo ';
		var table="<ul>";
        var count=0;
        if(a.length<=15){
			//到最后一组，连接不可再点击
			document.getElementById(\'grpschange\').removeAttribute("href");
			return;
		}
   		//每组显示15个元素
		for(var i=num*15;i<a.length;i++){
		   count++;
		   table=table+" <li> <a href=\'#"+a[i].id+"\'> <IMG class=iteration src=\'./uploadfiles/goods/"+a[i].photo+"\'></A>";
		   table=table+"<br><a href=\'#"+a[i].id+"\'>"+a[i].groupname.substr(0,4)+"</a> </li> ";
		   if(i==a.length-1){
			   //到最后一组，连接不可再点击
			   document.getElementById(\'grpschange\').removeAttribute("href");;
		   }
		   if(count==15){
			   break;
		   }
		 }
		table=table+"</ul>";
		document.getElementById(\'grps\').innerHTML = table;
	}
		
		//换一组本周热帖 
		function changeGroup(){
			var num=++i;
			//var a=(如果是数值)'; ?>
smarty数值变量<?php echo ';(如果是字符串)\''; ?>
smarty字符串变量<?php echo '\';
			var a= '; ?>
<?php echo $this->_tpl_vars['hotforumlistjs']; ?>
<?php echo ';
			var table="<ul>";
	        var count=0;
	        if(a.length<=15){
				//到最后一组，连接不可再点击
				document.getElementById(\'forumchange\').removeAttribute("href");
				return;
			}
	   		//每组显示15个元素
			for(var j=num*15;j<a.length;j++){
			   count++;
			   table=table+" <li> <a href=\'#"+a[j].id+"\'>"+a[j].title.substr(0,13)+"</a> </li> ";
			   if(j==a.length-1){
				   //到最后一组，连接不可再点击
				   document.getElementById(\'forumchange\').removeAttribute("href");;
			   }
			   if(count==10){
				   break;
			   }
			   
			 }
			table=table+"</ul>";
			document.getElementById(\'forums\').innerHTML = table;
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
'; ?>

<script src="./templates/scripts/goods/selecttag.js" type="text/javascript"></script>

<!------------------------------------------body over-->
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>