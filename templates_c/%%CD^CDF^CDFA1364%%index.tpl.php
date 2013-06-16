<?php /* Smarty version 2.6.18, created on 2013-06-02 16:40:45
         compiled from aroundlife/index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'msubstr', 'aroundlife/index.tpl', 57, false),)), $this); ?>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<!------------------------------------------body-->
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
</div>


<DIV class="AreaR">

   <!--中间广告-->
   <DIV id="focus2">
   	<a href="<?php echo $this->_tpl_vars['lifeadvertise']['linkid']; ?>
" target="_blank"><img src="./uploadfiles/goods/<?php echo $this->_tpl_vars['lifeadvertise']['realname']; ?>
" /></a>
   </DIV>
   <!--end-->
   
</DIV>


</DIV>





<DIV class="blank"></DIV>
<DIV class="block clearfix">
<DIV class="AreaL750">

<!--品牌商家模块-->
 <DIV class="blank"></DIV>
 <div class="box">
<div class="box_4 ared clearfix">
<div class="life_bt"><span><a href="more.php?mact=morebrand">更多</a></span><h3>品牌商家</h3></div>
<div class="life_nr clearfix">
<ul>
<?php unset($this->_sections['brands']);
$this->_sections['brands']['name'] = 'brands';
$this->_sections['brands']['loop'] = is_array($_loop=$this->_tpl_vars['brandshoplist']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['brands']['start'] = (int)0;
$this->_sections['brands']['step'] = ((int)1) == 0 ? 1 : (int)1;
$this->_sections['brands']['max'] = (int)9;
$this->_sections['brands']['show'] = (bool)true;
if ($this->_sections['brands']['max'] < 0)
    $this->_sections['brands']['max'] = $this->_sections['brands']['loop'];
if ($this->_sections['brands']['start'] < 0)
    $this->_sections['brands']['start'] = max($this->_sections['brands']['step'] > 0 ? 0 : -1, $this->_sections['brands']['loop'] + $this->_sections['brands']['start']);
else
    $this->_sections['brands']['start'] = min($this->_sections['brands']['start'], $this->_sections['brands']['step'] > 0 ? $this->_sections['brands']['loop'] : $this->_sections['brands']['loop']-1);
if ($this->_sections['brands']['show']) {
    $this->_sections['brands']['total'] = min(ceil(($this->_sections['brands']['step'] > 0 ? $this->_sections['brands']['loop'] - $this->_sections['brands']['start'] : $this->_sections['brands']['start']+1)/abs($this->_sections['brands']['step'])), $this->_sections['brands']['max']);
    if ($this->_sections['brands']['total'] == 0)
        $this->_sections['brands']['show'] = false;
} else
    $this->_sections['brands']['total'] = 0;
if ($this->_sections['brands']['show']):

            for ($this->_sections['brands']['index'] = $this->_sections['brands']['start'], $this->_sections['brands']['iteration'] = 1;
                 $this->_sections['brands']['iteration'] <= $this->_sections['brands']['total'];
                 $this->_sections['brands']['index'] += $this->_sections['brands']['step'], $this->_sections['brands']['iteration']++):
$this->_sections['brands']['rownum'] = $this->_sections['brands']['iteration'];
$this->_sections['brands']['index_prev'] = $this->_sections['brands']['index'] - $this->_sections['brands']['step'];
$this->_sections['brands']['index_next'] = $this->_sections['brands']['index'] + $this->_sections['brands']['step'];
$this->_sections['brands']['first']      = ($this->_sections['brands']['iteration'] == 1);
$this->_sections['brands']['last']       = ($this->_sections['brands']['iteration'] == $this->_sections['brands']['total']);
?>
 	<?php if ($this->_sections['brands']['index']%3 == 0): ?>
 		<li class="fir">
 			<div class="color_<?php echo $this->_sections['brands']['index']%6; ?>
">
 				<p class="pic"><a href="shop.php?shopid=<?php echo $this->_tpl_vars['brandshoplist'][$this->_sections['brands']['index']]['id']; ?>
">
 				<img src="./uploadfiles/shop/<?php echo $this->_tpl_vars['brandshoplist'][$this->_sections['brands']['index']]['shoppicture']; ?>
" /></a></p>
    			<p class="wz"><strong><?php echo ((is_array($_tmp=$this->_tpl_vars['brandshoplist'][$this->_sections['brands']['index']]['shopname'])) ? $this->_run_mod_handler('msubstr', true, $_tmp, 0, 5) : smarty_modifier_msubstr($_tmp, 0, 5)); ?>
</strong>
    			<em><span><?php echo $this->_tpl_vars['brandshoplist'][$this->_sections['brands']['index']]['discount']; ?>
</span>折现金卡</em></p>
  			</div>
	    </li> 
	<?php else: ?>	
		 <li>
 			<div class="color_<?php echo $this->_sections['brands']['index']%6; ?>
">
 				<p class="pic"><a href="shop.php?shopid=<?php echo $this->_tpl_vars['brandshoplist'][$this->_sections['brands']['index']]['id']; ?>
">
 				<img src="./uploadfiles/shop/<?php echo $this->_tpl_vars['brandshoplist'][$this->_sections['brands']['index']]['shoppicture']; ?>
" /></a></p>
    			<p class="wz"><strong><?php echo ((is_array($_tmp=$this->_tpl_vars['brandshoplist'][$this->_sections['brands']['index']]['shopname'])) ? $this->_run_mod_handler('msubstr', true, $_tmp, 0, 5) : smarty_modifier_msubstr($_tmp, 0, 5)); ?>
</strong>
    			<em><span><?php echo $this->_tpl_vars['brandshoplist'][$this->_sections['brands']['index']]['discount']; ?>
</span>折现金卡</em></p>
  			</div>
	    </li> 		
 	<?php endif; ?>
<?php endfor; else: ?>	
	<li>暂时还没有品牌商家！</li>
<?php endif; ?> 

</ul>
</div>
</div>
</DIV>
<!--end-->


<!--推荐商家 模块-->
 <DIV class="blank"></DIV>
 <div class="box">
<div class="box_4 ared clearfix">
<div class="life_bt"><span><a href="more.php?mact=morerecom">更多</a></span><h3>推荐商家</h3></div>
<div class="life_list clearfix">
<ul>
<?php unset($this->_sections['recshops']);
$this->_sections['recshops']['name'] = 'recshops';
$this->_sections['recshops']['loop'] = is_array($_loop=$this->_tpl_vars['recommendshoplist']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['recshops']['start'] = (int)0;
$this->_sections['recshops']['step'] = ((int)1) == 0 ? 1 : (int)1;
$this->_sections['recshops']['max'] = (int)15;
$this->_sections['recshops']['show'] = (bool)true;
if ($this->_sections['recshops']['max'] < 0)
    $this->_sections['recshops']['max'] = $this->_sections['recshops']['loop'];
if ($this->_sections['recshops']['start'] < 0)
    $this->_sections['recshops']['start'] = max($this->_sections['recshops']['step'] > 0 ? 0 : -1, $this->_sections['recshops']['loop'] + $this->_sections['recshops']['start']);
else
    $this->_sections['recshops']['start'] = min($this->_sections['recshops']['start'], $this->_sections['recshops']['step'] > 0 ? $this->_sections['recshops']['loop'] : $this->_sections['recshops']['loop']-1);
if ($this->_sections['recshops']['show']) {
    $this->_sections['recshops']['total'] = min(ceil(($this->_sections['recshops']['step'] > 0 ? $this->_sections['recshops']['loop'] - $this->_sections['recshops']['start'] : $this->_sections['recshops']['start']+1)/abs($this->_sections['recshops']['step'])), $this->_sections['recshops']['max']);
    if ($this->_sections['recshops']['total'] == 0)
        $this->_sections['recshops']['show'] = false;
} else
    $this->_sections['recshops']['total'] = 0;
if ($this->_sections['recshops']['show']):

            for ($this->_sections['recshops']['index'] = $this->_sections['recshops']['start'], $this->_sections['recshops']['iteration'] = 1;
                 $this->_sections['recshops']['iteration'] <= $this->_sections['recshops']['total'];
                 $this->_sections['recshops']['index'] += $this->_sections['recshops']['step'], $this->_sections['recshops']['iteration']++):
$this->_sections['recshops']['rownum'] = $this->_sections['recshops']['iteration'];
$this->_sections['recshops']['index_prev'] = $this->_sections['recshops']['index'] - $this->_sections['recshops']['step'];
$this->_sections['recshops']['index_next'] = $this->_sections['recshops']['index'] + $this->_sections['recshops']['step'];
$this->_sections['recshops']['first']      = ($this->_sections['recshops']['iteration'] == 1);
$this->_sections['recshops']['last']       = ($this->_sections['recshops']['iteration'] == $this->_sections['recshops']['total']);
?>
<li>
  <div>
    <p class="pic"><a href="shop.php?shopid=<?php echo $this->_tpl_vars['recommendshoplist'][$this->_sections['recshops']['index']]['id']; ?>
">
    <img src="./uploadfiles/shop/<?php echo $this->_tpl_vars['recommendshoplist'][$this->_sections['recshops']['index']]['shoppicture']; ?>
" /></a></p>
    <p class="wz">
    <strong><a href="shop.php?shopid=<?php echo $this->_tpl_vars['recommendshoplist'][$this->_sections['recshops']['index']]['id']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['recommendshoplist'][$this->_sections['recshops']['index']]['shopname'])) ? $this->_run_mod_handler('msubstr', true, $_tmp, 0, 8) : smarty_modifier_msubstr($_tmp, 0, 8)); ?>
</a>
    </strong><em><span><?php echo $this->_tpl_vars['recommendshoplist'][$this->_sections['recshops']['index']]['discount']; ?>
折现金卡</span></em></p>
  </div>
</li>
<?php endfor; else: ?>	
	<li>暂时还没有推荐商家！</li>
<?php endif; ?>
</ul>
</div>
</div></div>
<!--end-->



</div>



<DIV class="AreaRR clearfix">
<!--最新商家 模块-->
<DIV class="blank5"></DIV>
<DIV class="box">
<DIV class="box_1">
   <div class="title_bt"><h3>最新商家</h3></div>
   <div class="new_shop_nr">
   <div id="new_shop" style="overflow:hidden;height:290px;width:218px;">
   <div id="new_shop1">
   <ul>
   <?php unset($this->_sections['newshops']);
$this->_sections['newshops']['name'] = 'newshops';
$this->_sections['newshops']['loop'] = is_array($_loop=$this->_tpl_vars['newshoplist']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['newshops']['start'] = (int)0;
$this->_sections['newshops']['step'] = ((int)1) == 0 ? 1 : (int)1;
$this->_sections['newshops']['max'] = (int)10;
$this->_sections['newshops']['show'] = (bool)true;
if ($this->_sections['newshops']['max'] < 0)
    $this->_sections['newshops']['max'] = $this->_sections['newshops']['loop'];
if ($this->_sections['newshops']['start'] < 0)
    $this->_sections['newshops']['start'] = max($this->_sections['newshops']['step'] > 0 ? 0 : -1, $this->_sections['newshops']['loop'] + $this->_sections['newshops']['start']);
else
    $this->_sections['newshops']['start'] = min($this->_sections['newshops']['start'], $this->_sections['newshops']['step'] > 0 ? $this->_sections['newshops']['loop'] : $this->_sections['newshops']['loop']-1);
if ($this->_sections['newshops']['show']) {
    $this->_sections['newshops']['total'] = min(ceil(($this->_sections['newshops']['step'] > 0 ? $this->_sections['newshops']['loop'] - $this->_sections['newshops']['start'] : $this->_sections['newshops']['start']+1)/abs($this->_sections['newshops']['step'])), $this->_sections['newshops']['max']);
    if ($this->_sections['newshops']['total'] == 0)
        $this->_sections['newshops']['show'] = false;
} else
    $this->_sections['newshops']['total'] = 0;
if ($this->_sections['newshops']['show']):

            for ($this->_sections['newshops']['index'] = $this->_sections['newshops']['start'], $this->_sections['newshops']['iteration'] = 1;
                 $this->_sections['newshops']['iteration'] <= $this->_sections['newshops']['total'];
                 $this->_sections['newshops']['index'] += $this->_sections['newshops']['step'], $this->_sections['newshops']['iteration']++):
$this->_sections['newshops']['rownum'] = $this->_sections['newshops']['iteration'];
$this->_sections['newshops']['index_prev'] = $this->_sections['newshops']['index'] - $this->_sections['newshops']['step'];
$this->_sections['newshops']['index_next'] = $this->_sections['newshops']['index'] + $this->_sections['newshops']['step'];
$this->_sections['newshops']['first']      = ($this->_sections['newshops']['iteration'] == 1);
$this->_sections['newshops']['last']       = ($this->_sections['newshops']['iteration'] == $this->_sections['newshops']['total']);
?>
	<li>
		<p class="pic"><a href="shop.php?shopid=<?php echo $this->_tpl_vars['newshoplist'][$this->_sections['newshops']['index']]['id']; ?>
">
		<img src="./uploadfiles/shop/<?php echo $this->_tpl_vars['newshoplist'][$this->_sections['newshops']['index']]['shoppicture']; ?>
" /></a></p>
    	<p class="ared"><strong><a href="shop.php?shopid=<?php echo $this->_tpl_vars['newshoplist'][$this->_sections['newshops']['index']]['id']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['newshoplist'][$this->_sections['newshops']['index']]['shopname'])) ? $this->_run_mod_handler('msubstr', true, $_tmp, 0, 8) : smarty_modifier_msubstr($_tmp, 0, 8)); ?>
</a></strong></p>
		<p class="a999">吾校卡<span><?php echo $this->_tpl_vars['newshoplist'][$this->_sections['newshops']['index']]['schooldiscount']; ?>
</span>折</p>  	
	</li>
	<?php endfor; else: ?>	
	<li>暂时还没有最新商家！</li>
	<?php endif; ?>
   </ul>
   </div>
   <div id="new_shop2"></div>
   </div>

   
   </div>
   </div>
</DIV>
<!--end-->



<!--听他们说 评论模块-->
<DIV class="blank5"></DIV>
<DIV class="box">
<DIV class="box_1">
   <div class="title_bt"><h3>听他们说</h3></div>
   <div class="share_nr clearfix">
   
   <div class="rooller">
   <ul  id="rooller_s"  class="rooller_s">
<!-- 店铺评论start -->	
   <?php unset($this->_sections['shopc']);
$this->_sections['shopc']['name'] = 'shopc';
$this->_sections['shopc']['loop'] = is_array($_loop=$this->_tpl_vars['shopcommentlist']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['shopc']['show'] = (bool)true;
$this->_sections['shopc']['max'] = $this->_sections['shopc']['loop'];
$this->_sections['shopc']['step'] = 1;
$this->_sections['shopc']['start'] = $this->_sections['shopc']['step'] > 0 ? 0 : $this->_sections['shopc']['loop']-1;
if ($this->_sections['shopc']['show']) {
    $this->_sections['shopc']['total'] = $this->_sections['shopc']['loop'];
    if ($this->_sections['shopc']['total'] == 0)
        $this->_sections['shopc']['show'] = false;
} else
    $this->_sections['shopc']['total'] = 0;
if ($this->_sections['shopc']['show']):

            for ($this->_sections['shopc']['index'] = $this->_sections['shopc']['start'], $this->_sections['shopc']['iteration'] = 1;
                 $this->_sections['shopc']['iteration'] <= $this->_sections['shopc']['total'];
                 $this->_sections['shopc']['index'] += $this->_sections['shopc']['step'], $this->_sections['shopc']['iteration']++):
$this->_sections['shopc']['rownum'] = $this->_sections['shopc']['iteration'];
$this->_sections['shopc']['index_prev'] = $this->_sections['shopc']['index'] - $this->_sections['shopc']['step'];
$this->_sections['shopc']['index_next'] = $this->_sections['shopc']['index'] + $this->_sections['shopc']['step'];
$this->_sections['shopc']['first']      = ($this->_sections['shopc']['iteration'] == 1);
$this->_sections['shopc']['last']       = ($this->_sections['shopc']['iteration'] == $this->_sections['shopc']['total']);
?>
   <li>
	  <div class="title a999_line"><span>
	  <a href="#<?php echo $this->_tpl_vars['shopcommentlist'][$this->_sections['shopc']['index']]['userid']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['shopcommentlist'][$this->_sections['shopc']['index']]['tscuser'])) ? $this->_run_mod_handler('msubstr', true, $_tmp, 0, 4) : smarty_modifier_msubstr($_tmp, 0, 4)); ?>
</a></span>说：
	  	<?php echo ((is_array($_tmp=$this->_tpl_vars['shopcommentlist'][$this->_sections['shopc']['index']]['shopname'])) ? $this->_run_mod_handler('msubstr', true, $_tmp, 0, 11) : smarty_modifier_msubstr($_tmp, 0, 11)); ?>
</div>
      <div class="plun">
      <a href="shop.php?shopid=<?php echo $this->_tpl_vars['shopcommentlist'][$this->_sections['shopc']['index']]['shopid']; ?>
">
      <img src="./uploadfiles/shop/<?php echo $this->_tpl_vars['shopcommentlist'][$this->_sections['shopc']['index']]['spicture']; ?>
" />
      </a>
      <p><?php echo ((is_array($_tmp=$this->_tpl_vars['shopcommentlist'][$this->_sections['shopc']['index']]['tscc'])) ? $this->_run_mod_handler('msubstr', true, $_tmp, 0, 28) : smarty_modifier_msubstr($_tmp, 0, 28)); ?>
</p>
      </div>
      <div class="xb"><span><?php echo $this->_tpl_vars['shopcommentlist'][$this->_sections['shopc']['index']]['comtime']; ?>
</span>
      赢：<em><?php echo $this->_tpl_vars['shopcommentlist'][$this->_sections['shopc']['index']]['tscschool']; ?>
</em>校币</div>
	</li>
	<?php endfor; else: ?>	
	<li>暂时还没有店铺评论！</li>
	<?php endif; ?>
<!-- 店铺评论end -->	
	
<!-- 商品评论start -->	
	
 <!--    <?php unset($this->_sections['goodsc']);
$this->_sections['goodsc']['name'] = 'goodsc';
$this->_sections['goodsc']['loop'] = is_array($_loop=$this->_tpl_vars['goodscommentlist']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['goodsc']['show'] = (bool)true;
$this->_sections['goodsc']['max'] = $this->_sections['goodsc']['loop'];
$this->_sections['goodsc']['step'] = 1;
$this->_sections['goodsc']['start'] = $this->_sections['goodsc']['step'] > 0 ? 0 : $this->_sections['goodsc']['loop']-1;
if ($this->_sections['goodsc']['show']) {
    $this->_sections['goodsc']['total'] = $this->_sections['goodsc']['loop'];
    if ($this->_sections['goodsc']['total'] == 0)
        $this->_sections['goodsc']['show'] = false;
} else
    $this->_sections['goodsc']['total'] = 0;
if ($this->_sections['goodsc']['show']):

            for ($this->_sections['goodsc']['index'] = $this->_sections['goodsc']['start'], $this->_sections['goodsc']['iteration'] = 1;
                 $this->_sections['goodsc']['iteration'] <= $this->_sections['goodsc']['total'];
                 $this->_sections['goodsc']['index'] += $this->_sections['goodsc']['step'], $this->_sections['goodsc']['iteration']++):
$this->_sections['goodsc']['rownum'] = $this->_sections['goodsc']['iteration'];
$this->_sections['goodsc']['index_prev'] = $this->_sections['goodsc']['index'] - $this->_sections['goodsc']['step'];
$this->_sections['goodsc']['index_next'] = $this->_sections['goodsc']['index'] + $this->_sections['goodsc']['step'];
$this->_sections['goodsc']['first']      = ($this->_sections['goodsc']['iteration'] == 1);
$this->_sections['goodsc']['last']       = ($this->_sections['goodsc']['iteration'] == $this->_sections['goodsc']['total']);
?>
   <li>
	  <div class="title a999_line"><span>
	  <a href="#<?php echo $this->_tpl_vars['goodscommentlist'][$this->_sections['goodsc']['index']]['userid']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['goodscommentlist'][$this->_sections['goodsc']['index']]['tgcuser'])) ? $this->_run_mod_handler('msubstr', true, $_tmp, 0, 4) : smarty_modifier_msubstr($_tmp, 0, 4)); ?>
</a></span>说：
	  <a href="#<?php echo $this->_tpl_vars['goodscommentlist'][$this->_sections['goodsc']['index']]['gcid']; ?>
">
	  	<?php echo ((is_array($_tmp=$this->_tpl_vars['goodscommentlist'][$this->_sections['goodsc']['index']]['tgcc'])) ? $this->_run_mod_handler('msubstr', true, $_tmp, 0, 11) : smarty_modifier_msubstr($_tmp, 0, 11)); ?>
</a></div>
      <div class="plun">
      <img src="./templates/images/goods/<?php echo $this->_tpl_vars['goodscommentlist'][$this->_sections['goodsc']['index']]['gpicture']; ?>
" />
      <p><?php echo ((is_array($_tmp=$this->_tpl_vars['goodscommentlist'][$this->_sections['goodsc']['index']]['tgcc'])) ? $this->_run_mod_handler('msubstr', true, $_tmp, 0, 28) : smarty_modifier_msubstr($_tmp, 0, 28)); ?>
</p>
      </div>
      <div class="xb"><span><?php echo $this->_tpl_vars['goodscommentlist'][$this->_sections['goodsc']['index']]['comtime']; ?>
</span>
      赢：<em><?php echo $this->_tpl_vars['goodscommentlist'][$this->_sections['goodsc']['index']]['tgcschool']; ?>
</em>校币</div>
	</li>
	<?php endfor; else: ?>	
	<li>暂时还没有商品评论！</li>
	<?php endif; ?>	
	-->
<!-- 商品评论end -->	
	
   </ul>
   </div>
   
   <script type="text/javascript" src="./templates/scripts/goods/rooller.js"></script>
   <?php echo '
   <script type="text/javascript">
   var speed=40;
	var new_shop = document.getElementById("new_shop");
	var new_shop1= document.getElementById("new_shop1");
	var new_shop2= document.getElementById("new_shop2");
	new_shop2.innerHTML=new_shop1.innerHTML;
	function Marqueer(){
		if(new_shop2.offsetTop-new_shop.scrollTop<=0)
			new_shop.scrollTop-=new_shop1.offsetTop;
		else{
			new_shop.scrollTop++;
		}
	}
	var MyMarr=setInterval(Marqueer,speed);
	new_shop.onmouseover=function() {clearInterval(MyMarr)};
	new_shop.onmouseout=function() {MyMarr=setInterval(Marqueer,speed)};
		new slider({id:\'rooller_s\'})
   </script>
  '; ?>

  </div>
</DIV>
</DIV>
<!--end-->
 

</DIV>
</div>
<!------------------------------------------body over-->
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>