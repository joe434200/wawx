<?php /* Smarty version 2.6.18, created on 2013-06-05 18:27:52
         compiled from exchange/index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'msubstr', 'exchange/index.tpl', 112, false),)), $this); ?>
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

<DIV class="AreaL clearfix">
	<?php if ($this->_tpl_vars['user']): ?>
     <!--个人信息-->
     <div class="red_bt"><span>登录信息</span></div>
     <div class="use_login clearfix">
     <div class="nlk_name clearfix">
     <p class="av"><a href="#<?php echo $this->_tpl_vars['user']['ID']; ?>
"><img src="./uploadfiles/goods/<?php echo $this->_tpl_vars['user']['photo']; ?>
" /></a></p>
         
     <div class="nlk_jb a333"><?php echo $this->_tpl_vars['user']['nickname']; ?>
<br />
      <a href="#<?php echo $this->_tpl_vars['user']['ID']; ?>
"><?php echo $this->_tpl_vars['user']['role']; ?>
</a><br />
      <?php if ($this->_tpl_vars['user']['level'] == 1): ?>
      <img src="./templates/images/goods/star_level.gif" />
      <?php elseif ($this->_tpl_vars['user']['level'] == 2): ?>
      <img src="./templates/images/goods/star_level.gif" />
      <img src="./templates/images/goods/star_level.gif" />
      <?php elseif ($this->_tpl_vars['user']['level'] == 3): ?>
      <img src="./templates/images/goods/star_level.gif" />
      <img src="./templates/images/goods/star_level.gif" />
      <img src="./templates/images/goods/star_level.gif" />
      <?php elseif ($this->_tpl_vars['user']['level'] == 4): ?>
      <img src="./templates/images/goods/star_level.gif" />
      <img src="./templates/images/goods/star_level.gif" />
      <img src="./templates/images/goods/star_level.gif" />
      <img src="./templates/images/goods/star_level.gif" />
      <?php elseif ($this->_tpl_vars['user']['level'] == 5): ?>
      <img src="./templates/images/goods/star_level.gif" />
      <img src="./templates/images/goods/star_level.gif" />
      <img src="./templates/images/goods/star_level.gif" />
      <img src="./templates/images/goods/star_level.gif" />
      <img src="./templates/images/goods/star_level.gif" />
      <?php endif; ?>
      </div>
      
      </div>
   
    <div class="nlk_xx clearfix">
    <ul class="a_blue">
    
    <dd>在线时间</dd>
    <dt><?php if ($this->_tpl_vars['user']['onlinetime']): ?><?php echo $this->_tpl_vars['user']['onlinetime']; ?>
<?php else: ?>0<?php endif; ?>小时</dt>
    
    <dd>最后登录</dd>
    <dt><?php echo $this->_tpl_vars['user']['lltime']; ?>
</dt>
    
    <dd>校币</dd>
    <dt><?php if ($this->_tpl_vars['user']['coins']): ?><?php echo $this->_tpl_vars['user']['coins']; ?>
<?php else: ?>0<?php endif; ?></dt>
    
    <dd>帖子</dd>
    <dt><a href="#"><?php if ($this->_tpl_vars['user']['tnum']): ?><?php echo $this->_tpl_vars['user']['tnum']; ?>
<?php else: ?>0<?php endif; ?></a></dt>
    </ul>
    </div>
    </div>
  <!--个人信息 end-->
  <?php else: ?>
  	登录
  <?php endif; ?>
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
   
 <?php unset($this->_sections['excs']);
$this->_sections['excs']['name'] = 'excs';
$this->_sections['excs']['loop'] = is_array($_loop=$this->_tpl_vars['exchangelist']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['excs']['start'] = (int)0;
$this->_sections['excs']['step'] = ((int)1) == 0 ? 1 : (int)1;
$this->_sections['excs']['max'] = (int)23;
$this->_sections['excs']['show'] = (bool)true;
if ($this->_sections['excs']['max'] < 0)
    $this->_sections['excs']['max'] = $this->_sections['excs']['loop'];
if ($this->_sections['excs']['start'] < 0)
    $this->_sections['excs']['start'] = max($this->_sections['excs']['step'] > 0 ? 0 : -1, $this->_sections['excs']['loop'] + $this->_sections['excs']['start']);
else
    $this->_sections['excs']['start'] = min($this->_sections['excs']['start'], $this->_sections['excs']['step'] > 0 ? $this->_sections['excs']['loop'] : $this->_sections['excs']['loop']-1);
if ($this->_sections['excs']['show']) {
    $this->_sections['excs']['total'] = min(ceil(($this->_sections['excs']['step'] > 0 ? $this->_sections['excs']['loop'] - $this->_sections['excs']['start'] : $this->_sections['excs']['start']+1)/abs($this->_sections['excs']['step'])), $this->_sections['excs']['max']);
    if ($this->_sections['excs']['total'] == 0)
        $this->_sections['excs']['show'] = false;
} else
    $this->_sections['excs']['total'] = 0;
if ($this->_sections['excs']['show']):

            for ($this->_sections['excs']['index'] = $this->_sections['excs']['start'], $this->_sections['excs']['iteration'] = 1;
                 $this->_sections['excs']['iteration'] <= $this->_sections['excs']['total'];
                 $this->_sections['excs']['index'] += $this->_sections['excs']['step'], $this->_sections['excs']['iteration']++):
$this->_sections['excs']['rownum'] = $this->_sections['excs']['iteration'];
$this->_sections['excs']['index_prev'] = $this->_sections['excs']['index'] - $this->_sections['excs']['step'];
$this->_sections['excs']['index_next'] = $this->_sections['excs']['index'] + $this->_sections['excs']['step'];
$this->_sections['excs']['first']      = ($this->_sections['excs']['iteration'] == 1);
$this->_sections['excs']['last']       = ($this->_sections['excs']['iteration'] == $this->_sections['excs']['total']);
?>
 	<li>
  <?php echo $this->_tpl_vars['exchangelist'][$this->_sections['excs']['index']]['username']; ?>
兑换了<?php echo $this->_tpl_vars['exchangelist'][$this->_sections['excs']['index']]['exchangenum']; ?>
件<?php echo ((is_array($_tmp=$this->_tpl_vars['exchangelist'][$this->_sections['excs']['index']]['goodsname'])) ? $this->_run_mod_handler('msubstr', true, $_tmp, 0, 4) : smarty_modifier_msubstr($_tmp, 0, 4)); ?>
</li>
  <?php endfor; else: ?>
	<li>暂时还没有兑换信息！</li>
  <?php endif; ?>     
   
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
	<?php unset($this->_sections['oddgood']);
$this->_sections['oddgood']['name'] = 'oddgood';
$this->_sections['oddgood']['loop'] = is_array($_loop=$this->_tpl_vars['oddsadvList']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['oddgood']['start'] = (int)0;
$this->_sections['oddgood']['step'] = ((int)1) == 0 ? 1 : (int)1;
$this->_sections['oddgood']['max'] = (int)3;
$this->_sections['oddgood']['show'] = (bool)true;
if ($this->_sections['oddgood']['max'] < 0)
    $this->_sections['oddgood']['max'] = $this->_sections['oddgood']['loop'];
if ($this->_sections['oddgood']['start'] < 0)
    $this->_sections['oddgood']['start'] = max($this->_sections['oddgood']['step'] > 0 ? 0 : -1, $this->_sections['oddgood']['loop'] + $this->_sections['oddgood']['start']);
else
    $this->_sections['oddgood']['start'] = min($this->_sections['oddgood']['start'], $this->_sections['oddgood']['step'] > 0 ? $this->_sections['oddgood']['loop'] : $this->_sections['oddgood']['loop']-1);
if ($this->_sections['oddgood']['show']) {
    $this->_sections['oddgood']['total'] = min(ceil(($this->_sections['oddgood']['step'] > 0 ? $this->_sections['oddgood']['loop'] - $this->_sections['oddgood']['start'] : $this->_sections['oddgood']['start']+1)/abs($this->_sections['oddgood']['step'])), $this->_sections['oddgood']['max']);
    if ($this->_sections['oddgood']['total'] == 0)
        $this->_sections['oddgood']['show'] = false;
} else
    $this->_sections['oddgood']['total'] = 0;
if ($this->_sections['oddgood']['show']):

            for ($this->_sections['oddgood']['index'] = $this->_sections['oddgood']['start'], $this->_sections['oddgood']['iteration'] = 1;
                 $this->_sections['oddgood']['iteration'] <= $this->_sections['oddgood']['total'];
                 $this->_sections['oddgood']['index'] += $this->_sections['oddgood']['step'], $this->_sections['oddgood']['iteration']++):
$this->_sections['oddgood']['rownum'] = $this->_sections['oddgood']['iteration'];
$this->_sections['oddgood']['index_prev'] = $this->_sections['oddgood']['index'] - $this->_sections['oddgood']['step'];
$this->_sections['oddgood']['index_next'] = $this->_sections['oddgood']['index'] + $this->_sections['oddgood']['step'];
$this->_sections['oddgood']['first']      = ($this->_sections['oddgood']['iteration'] == 1);
$this->_sections['oddgood']['last']       = ($this->_sections['oddgood']['iteration'] == $this->_sections['oddgood']['total']);
?>
  	  <li class="clearfix ared">
	  <a href="goods.php?act=exchange&goodsid=<?php echo $this->_tpl_vars['oddsadvList'][$this->_sections['oddgood']['index']]['id']; ?>
"><img src="./uploadfiles/goods/<?php echo $this->_tpl_vars['oddsadvList'][$this->_sections['oddgood']['index']]['newimg']; ?>
" /></a>
	  <h3><a href="goods.php?act=exchange&goodsid=<?php echo $this->_tpl_vars['oddsadvList'][$this->_sections['oddgood']['index']]['id']; ?>
">[校币抢购]<?php echo ((is_array($_tmp=$this->_tpl_vars['oddsadvList'][$this->_sections['oddgood']['index']]['goodsname'])) ? $this->_run_mod_handler('msubstr', true, $_tmp, 0, 7) : smarty_modifier_msubstr($_tmp, 0, 7)); ?>
</a></h3>
	  <p><?php echo $this->_tpl_vars['oddsadvList'][$this->_sections['oddgood']['index']]['exchangemoney']; ?>
校币</p>
	  </li>
  	<?php endfor; else: ?>
	<li>暂时还没有特惠商品！</li>
  	<?php endif; ?>   
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
	<?php unset($this->_sections['exgood']);
$this->_sections['exgood']['name'] = 'exgood';
$this->_sections['exgood']['loop'] = is_array($_loop=$this->_tpl_vars['exchangegoods']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['exgood']['show'] = true;
$this->_sections['exgood']['max'] = $this->_sections['exgood']['loop'];
$this->_sections['exgood']['step'] = 1;
$this->_sections['exgood']['start'] = $this->_sections['exgood']['step'] > 0 ? 0 : $this->_sections['exgood']['loop']-1;
if ($this->_sections['exgood']['show']) {
    $this->_sections['exgood']['total'] = $this->_sections['exgood']['loop'];
    if ($this->_sections['exgood']['total'] == 0)
        $this->_sections['exgood']['show'] = false;
} else
    $this->_sections['exgood']['total'] = 0;
if ($this->_sections['exgood']['show']):

            for ($this->_sections['exgood']['index'] = $this->_sections['exgood']['start'], $this->_sections['exgood']['iteration'] = 1;
                 $this->_sections['exgood']['iteration'] <= $this->_sections['exgood']['total'];
                 $this->_sections['exgood']['index'] += $this->_sections['exgood']['step'], $this->_sections['exgood']['iteration']++):
$this->_sections['exgood']['rownum'] = $this->_sections['exgood']['iteration'];
$this->_sections['exgood']['index_prev'] = $this->_sections['exgood']['index'] - $this->_sections['exgood']['step'];
$this->_sections['exgood']['index_next'] = $this->_sections['exgood']['index'] + $this->_sections['exgood']['step'];
$this->_sections['exgood']['first']      = ($this->_sections['exgood']['iteration'] == 1);
$this->_sections['exgood']['last']       = ($this->_sections['exgood']['iteration'] == $this->_sections['exgood']['total']);
?>  
 	 <li>
	  <a href="goods.php?act=exchange&goodsid=<?php echo $this->_tpl_vars['exchangegoods'][$this->_sections['exgood']['index']]['id']; ?>
"><img src="./uploadfiles/goods/<?php echo $this->_tpl_vars['exchangegoods'][$this->_sections['exgood']['index']]['newimg']; ?>
" /></a>
	  <div><span class="pp f_fen">市场价：<?php echo $this->_tpl_vars['exchangegoods'][$this->_sections['exgood']['index']]['marketprice']; ?>
</span> 消耗校币：<span class="f_fen"><?php echo $this->_tpl_vars['exchangegoods'][$this->_sections['exgood']['index']]['exchangemoney']; ?>
</span></div>
	  <p class="ared top5"><a href="goods.php?act=exchange&goodsid=<?php echo $this->_tpl_vars['exchangegoods'][$this->_sections['exgood']['index']]['id']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['exchangegoods'][$this->_sections['exgood']['index']]['goodsbrief'])) ? $this->_run_mod_handler('msubstr', true, $_tmp, 0, 25) : smarty_modifier_msubstr($_tmp, 0, 25)); ?>
</a></p>
	  </li>	    
  	<?php endfor; else: ?>
	<li>暂时还没有兑换商品！</li>
  	<?php endif; ?>   	  
	  </ul>
	  </div>
	  
	  <!--页码-->
<DIV class="blank"></DIV>
<div class="num">
<DIV class="num_pg">
<script type="text/javascript">
    var pg1 = new showPages('pg1');
	pg1.pageCount = '<?php echo $this->_tpl_vars['pagecount']; ?>
';
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
<?php echo '
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
'; ?>
 
<!------------------------------------------body over-->
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>