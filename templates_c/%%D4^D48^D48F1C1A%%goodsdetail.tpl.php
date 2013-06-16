<?php /* Smarty version 2.6.18, created on 2013-06-02 16:56:23
         compiled from goods/goodsdetail.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'msubstr', 'goods/goodsdetail.tpl', 61, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<!------------------------------------------body-->
<DIV class="blank"></DIV>
<DIV class="block clearfix">

  <!--当前位置-->
   <div class="location ared">当前位置：<a href="index.php">首页</a> >  
   <?php if ($this->_tpl_vars['shopname']['shopid']): ?><a href="aroundlife.php?aroundact=<?php echo $this->_tpl_vars['shopname']['mID']; ?>
"><?php echo $this->_tpl_vars['shopname']['mname']; ?>
 > </a><a href="shop.php?shopid=<?php echo $this->_tpl_vars['shopname']['shopid']; ?>
"><?php echo $this->_tpl_vars['shopname']['shopname']; ?>
</a>
   <?php else: ?> <a href="index.php?act=studentwill"> 学生惠 </a> <?php endif; ?> > <?php if ($this->_tpl_vars['goods']['shoppingtype'] == '2'): ?>团购<?php endif; ?><?php if ($this->_tpl_vars['goods']['shoppingtype'] == '1'): ?>特色<?php endif; ?>商品</div>
  <!--end-->
   
    <DIV class="blank"></DIV>
    
    <!--end-->
      <div id="goodsInfo"  class="clearfix">
      
      <!--商品图片和相册 start-->
     <div class="imgInfo">
     <?php if ($this->_tpl_vars['pictures']): ?>
     <a href="javascript:;" onclick="window.open('gallery.php?goodsid=<?php echo $this->_tpl_vars['goods']['ID']; ?>
'); return false;">
      <img class=thumb src="./uploadfiles/goods/<?php echo $this->_tpl_vars['goods']['newimg']; ?>
" alt="<?php echo $this->_tpl_vars['goods']['goodsname']; ?>
"/>
     </a>
     <?php else: ?>
         <img class=thumb src="./uploadfiles/goods/<?php echo $this->_tpl_vars['goods']['newimg']; ?>
" alt="<?php echo $this->_tpl_vars['goods']['goodsname']; ?>
"/>
     <?php endif; ?>
     <div class="blank5"></div>
     <!--相册 START-->
   <?php if ($this->_tpl_vars['pictures']): ?>
   
     <div class="clearfix">
      <span onmouseover="moveLeft()" onmousedown="clickLeft()" onmouseup="moveLeft()" onmouseout="scrollStop()"></span>
      <div class="gallery">
        <div id="demo">
          <div id="demo1" style="float:left">
            <ul>
           <?php $_from = $this->_tpl_vars['pictures']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['picture']):
?>
            <li>
            	<a href="gallery.php?goodsid=<?php echo $this->_tpl_vars['goods']['ID']; ?>
" target="_blank">
            	<img class="B_blue" src="./uploadfiles/goods/<?php echo $this->_tpl_vars['picture']['newimg']; ?>
" alt="<?php echo $this->_tpl_vars['goods']['goodsname']; ?>
" /></a>
            </li>
           <?php endforeach; endif; unset($_from); ?>
            </ul>
          </div>
          <div id="demo2" style="display:inline; overflow:visible;"></div>
        </div>
      </div>
      <span class="spanR" onmouseover="moveRight()" onmousedown="clickRight()" onmouseup="moveRight()" onmouseout="scrollStop()" ></span>
	  
     </div>
    <?php endif; ?>
     <!--相册 END-->
         <div class="blank5"></div>
     </div>
     <!--商品图片和相册 end-->
   
   </div>
      <!--end-->
      
      <!--商品表述-->
     <div class="goods_desc">
    <div class="bt"><?php echo ((is_array($_tmp=$this->_tpl_vars['goods']['goodsname'])) ? $this->_run_mod_handler('msubstr', true, $_tmp, 0, 30) : smarty_modifier_msubstr($_tmp, 0, 30)); ?>

    </div>
    <div class="goods_show">
	   <ul>
	   <li>
	   <span>价格:</span>
	   <strong class="yj"><?php echo $this->_tpl_vars['goods']['marketprice']; ?>
元</strong>
	   </li>
	   
	   <li>
	   <span>吾校卡<?php echo $this->_tpl_vars['goods']['schooldiscount']; ?>
折:</span>
	   <strong class="xj"><?php echo $this->_tpl_vars['goods']['schooldprice']; ?>
元</strong>
	   </li>
	   
	   
	   <li>
	   <span>评价:</span><?php if ($this->_tpl_vars['goods']['commentnum']): ?><?php echo $this->_tpl_vars['goods']['commentnum']; ?>
<?php else: ?>0<?php endif; ?>条
	   </li>
	   
	   
	   <li>
	   <span>支付:</span>
	   <?php unset($this->_sections['pa']);
$this->_sections['pa']['name'] = 'pa';
$this->_sections['pa']['loop'] = is_array($_loop=$this->_tpl_vars['payment']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['pa']['show'] = true;
$this->_sections['pa']['max'] = $this->_sections['pa']['loop'];
$this->_sections['pa']['step'] = 1;
$this->_sections['pa']['start'] = $this->_sections['pa']['step'] > 0 ? 0 : $this->_sections['pa']['loop']-1;
if ($this->_sections['pa']['show']) {
    $this->_sections['pa']['total'] = $this->_sections['pa']['loop'];
    if ($this->_sections['pa']['total'] == 0)
        $this->_sections['pa']['show'] = false;
} else
    $this->_sections['pa']['total'] = 0;
if ($this->_sections['pa']['show']):

            for ($this->_sections['pa']['index'] = $this->_sections['pa']['start'], $this->_sections['pa']['iteration'] = 1;
                 $this->_sections['pa']['iteration'] <= $this->_sections['pa']['total'];
                 $this->_sections['pa']['index'] += $this->_sections['pa']['step'], $this->_sections['pa']['iteration']++):
$this->_sections['pa']['rownum'] = $this->_sections['pa']['iteration'];
$this->_sections['pa']['index_prev'] = $this->_sections['pa']['index'] - $this->_sections['pa']['step'];
$this->_sections['pa']['index_next'] = $this->_sections['pa']['index'] + $this->_sections['pa']['step'];
$this->_sections['pa']['first']      = ($this->_sections['pa']['iteration'] == 1);
$this->_sections['pa']['last']       = ($this->_sections['pa']['iteration'] == $this->_sections['pa']['total']);
?>
	   		<?php echo $this->_tpl_vars['payment'][$this->_sections['pa']['index']]['payname']; ?>
&nbsp;&nbsp;
	    <?php endfor; else: ?>
	    	还没有支付方式
	    <?php endif; ?>
	   </li>
	   
	   <li>
	   <span>购买数量:</span>
	   <input type="text" id="mkrum"  class="good_txt" value="1"/> (库存<?php echo $this->_tpl_vars['goods']['goodsnumber']; ?>
件)
	   </li>
	   
	   </ul>

    </div>
    <p class="bottom10 top5">
   
    &nbsp;&nbsp;
    <?php if ($this->_tpl_vars['goods']['shoppingtype'] == '2'): ?>
    	<?php if ($this->_tpl_vars['isin'] == '0'): ?>
    		团购活动已结束！
    	<?php elseif ($this->_tpl_vars['isin'] == '1'): ?>
    		<span id="isin">团购即将开始，敬请期待！</span>
    	<?php else: ?>
    	 <a href="javascript:checkcart('check','<?php echo $this->_tpl_vars['goods']['ID']; ?>
','<?php echo $this->_tpl_vars['goods']['shoppingtype']; ?>
')"><img src="./templates/images/goods/goods_ann1.gif" /></a><span id="ann1"></span>
    	剩余<span id="day">00</span>天
    	<span id="hour">00</span>小时
    	<span id="minute">00</span>分
    	<span id="second">00</span>秒
    	<?php endif; ?>
    <?php else: ?>
    <a href="javascript:checkcart('check','<?php echo $this->_tpl_vars['goods']['ID']; ?>
','<?php echo $this->_tpl_vars['goods']['shoppingtype']; ?>
')"><img src="./templates/images/goods/goods_ann1.gif" /></a><span id="ann1"></span>
    <a href="javascript:checkcart('add','<?php echo $this->_tpl_vars['goods']['ID']; ?>
','<?php echo $this->_tpl_vars['goods']['shoppingtype']; ?>
')"><img  src="./templates/images/goods/goods_ann2.gif" /></a><span id="ann2"></span></p>
	<?php endif; ?>
	<div class="card">
	<input id="sh_bnt11"  type="button" class="sh_bnt" value="推荐给社区朋友赢校币" onclick="recomCheck('<?php echo $this->_tpl_vars['goods']['ID']; ?>
','<?php echo $this->_tpl_vars['goods']['goodsname']; ?>
')" />
	<img id="coll_id" src="./templates/images/goods/bnt_coll.gif"  style="cursor: pointer;" onclick="collectGoods('<?php echo $this->_tpl_vars['goods']['ID']; ?>
','<?php echo $this->_tpl_vars['goods']['shoppingtype']; ?>
')" />
	</div>
	
    </div>
    <!--end-->


<!--好评率-->
<div class="goods_other clearfix">
  <h3>购买此商品的用户</h3>
  <ul class="ared">

   <?php unset($this->_sections['ug']);
$this->_sections['ug']['name'] = 'ug';
$this->_sections['ug']['loop'] = is_array($_loop=$this->_tpl_vars['goodsuser']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['ug']['start'] = (int)0;
$this->_sections['ug']['step'] = ((int)1) == 0 ? 1 : (int)1;
$this->_sections['ug']['max'] = (int)9;
$this->_sections['ug']['show'] = (bool)true;
if ($this->_sections['ug']['max'] < 0)
    $this->_sections['ug']['max'] = $this->_sections['ug']['loop'];
if ($this->_sections['ug']['start'] < 0)
    $this->_sections['ug']['start'] = max($this->_sections['ug']['step'] > 0 ? 0 : -1, $this->_sections['ug']['loop'] + $this->_sections['ug']['start']);
else
    $this->_sections['ug']['start'] = min($this->_sections['ug']['start'], $this->_sections['ug']['step'] > 0 ? $this->_sections['ug']['loop'] : $this->_sections['ug']['loop']-1);
if ($this->_sections['ug']['show']) {
    $this->_sections['ug']['total'] = min(ceil(($this->_sections['ug']['step'] > 0 ? $this->_sections['ug']['loop'] - $this->_sections['ug']['start'] : $this->_sections['ug']['start']+1)/abs($this->_sections['ug']['step'])), $this->_sections['ug']['max']);
    if ($this->_sections['ug']['total'] == 0)
        $this->_sections['ug']['show'] = false;
} else
    $this->_sections['ug']['total'] = 0;
if ($this->_sections['ug']['show']):

            for ($this->_sections['ug']['index'] = $this->_sections['ug']['start'], $this->_sections['ug']['iteration'] = 1;
                 $this->_sections['ug']['iteration'] <= $this->_sections['ug']['total'];
                 $this->_sections['ug']['index'] += $this->_sections['ug']['step'], $this->_sections['ug']['iteration']++):
$this->_sections['ug']['rownum'] = $this->_sections['ug']['iteration'];
$this->_sections['ug']['index_prev'] = $this->_sections['ug']['index'] - $this->_sections['ug']['step'];
$this->_sections['ug']['index_next'] = $this->_sections['ug']['index'] + $this->_sections['ug']['step'];
$this->_sections['ug']['first']      = ($this->_sections['ug']['iteration'] == 1);
$this->_sections['ug']['last']       = ($this->_sections['ug']['iteration'] == $this->_sections['ug']['total']);
?>
   <li><a href="#<?php echo $this->_tpl_vars['goodsuser'][$this->_sections['ug']['index']]['ID']; ?>
">
  <img src="./uploadfiles/goods/<?php echo $this->_tpl_vars['goodsuser'][$this->_sections['ug']['index']]['photo']; ?>
" border="0" /></a>
    <p><a href="#<?php echo $this->_tpl_vars['goodsuser'][$this->_sections['ug']['index']]['ID']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['goodsuser'][$this->_sections['ug']['index']]['nickname'])) ? $this->_run_mod_handler('msubstr', true, $_tmp, 0, 4) : smarty_modifier_msubstr($_tmp, 0, 4)); ?>
</a></p>
  </li>
   <?php endfor; else: ?>	
	<li>亲暂时无购买用户！</li>
   <?php endif; ?>  
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
    <?php if ($this->_tpl_vars['pagekey'] == 'pg_1' || $this->_tpl_vars['pagekey'] == 'pg_2'): ?>
    	<LI>
    <?php else: ?>
    	<LI class=selectTag>
    <?php endif; ?>
    <A onClick="selectTag('tagContent0',this)" href="javascript:void(0)">商品详情</A> </LI>
    <?php if ($this->_tpl_vars['pagekey'] == 'pg_1'): ?>
    <LI class=selectTag>
    <?php else: ?>
    <LI>
    <?php endif; ?>
    <A onClick="selectTag('tagContent1',this)" href="javascript:void(0)">评价详情(<?php if ($this->_tpl_vars['goods']['commentnum']): ?><?php echo $this->_tpl_vars['goods']['commentnum']; ?>
<?php else: ?>0<?php endif; ?>条)</A> </LI>
    <?php if ($this->_tpl_vars['pagekey'] == 'pg_2'): ?>
    <LI class=selectTag>
    <?php else: ?>
    <LI>
    <?php endif; ?>
	<A onClick="selectTag('tagContent2',this)" href="javascript:void(0)">成交记录(<?php if ($this->_tpl_vars['goods']['makenum']): ?><?php echo $this->_tpl_vars['goods']['makenum']; ?>
<?php else: ?>0<?php endif; ?>件)</A> </LI>
    </UL>
    </div>
    
    <div class="show_menu_con">
    
	<!--商家简介-->
	<?php if ($this->_tpl_vars['pagekey'] == 'pg_1' || $this->_tpl_vars['pagekey'] == 'pg_2'): ?>
		<div id="tagContent0" style="DISPLAY: none">
	<?php else: ?>
		<div id="tagContent0" style="DISPLAY: block">
	<?php endif; ?>
	  <?php echo $this->_tpl_vars['goods']['goodsdesc']; ?>
<br>
	  <?php $_from = $this->_tpl_vars['goodsparamenter']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['goodsp']):
?>
	  	<?php echo $this->_tpl_vars['goodsp']; ?>
<br>
	  <?php endforeach; endif; unset($_from); ?>
	</div>
	<!--所有评价-->
	<?php if ($this->_tpl_vars['pagekey'] == 'pg_1'): ?>
		<div id="tagContent1" style="DISPLAY: block">
	<?php else: ?>
		<div id="tagContent1" style="DISPLAY: none">
	<?php endif; ?>
 
    
    <!--评论详细-->
	<div class="show_all_plun">
	  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="all_ttbb">
  <?php unset($this->_sections['com']);
$this->_sections['com']['name'] = 'com';
$this->_sections['com']['loop'] = is_array($_loop=$this->_tpl_vars['comments']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['com']['start'] = (int)0;
$this->_sections['com']['step'] = ((int)1) == 0 ? 1 : (int)1;
$this->_sections['com']['max'] = (int)5;
$this->_sections['com']['show'] = (bool)true;
if ($this->_sections['com']['max'] < 0)
    $this->_sections['com']['max'] = $this->_sections['com']['loop'];
if ($this->_sections['com']['start'] < 0)
    $this->_sections['com']['start'] = max($this->_sections['com']['step'] > 0 ? 0 : -1, $this->_sections['com']['loop'] + $this->_sections['com']['start']);
else
    $this->_sections['com']['start'] = min($this->_sections['com']['start'], $this->_sections['com']['step'] > 0 ? $this->_sections['com']['loop'] : $this->_sections['com']['loop']-1);
if ($this->_sections['com']['show']) {
    $this->_sections['com']['total'] = min(ceil(($this->_sections['com']['step'] > 0 ? $this->_sections['com']['loop'] - $this->_sections['com']['start'] : $this->_sections['com']['start']+1)/abs($this->_sections['com']['step'])), $this->_sections['com']['max']);
    if ($this->_sections['com']['total'] == 0)
        $this->_sections['com']['show'] = false;
} else
    $this->_sections['com']['total'] = 0;
if ($this->_sections['com']['show']):

            for ($this->_sections['com']['index'] = $this->_sections['com']['start'], $this->_sections['com']['iteration'] = 1;
                 $this->_sections['com']['iteration'] <= $this->_sections['com']['total'];
                 $this->_sections['com']['index'] += $this->_sections['com']['step'], $this->_sections['com']['iteration']++):
$this->_sections['com']['rownum'] = $this->_sections['com']['iteration'];
$this->_sections['com']['index_prev'] = $this->_sections['com']['index'] - $this->_sections['com']['step'];
$this->_sections['com']['index_next'] = $this->_sections['com']['index'] + $this->_sections['com']['step'];
$this->_sections['com']['first']      = ($this->_sections['com']['iteration'] == 1);
$this->_sections['com']['last']       = ($this->_sections['com']['iteration'] == $this->_sections['com']['total']);
?>
  <tr>
    <td valign="top" class="pl"><?php echo $this->_tpl_vars['comments'][$this->_sections['com']['index']]['content']; ?>
<span>[<?php echo $this->_tpl_vars['comments'][$this->_sections['com']['index']]['commenttime']; ?>
]</span></td>
    <td valign="top" class="addr"><?php echo $this->_tpl_vars['comments'][$this->_sections['com']['index']]['goodsname']; ?>
</td>
    <td valign="top" class="name"><?php echo $this->_tpl_vars['comments'][$this->_sections['com']['index']]['nickname']; ?>

    <?php if ($this->_tpl_vars['comments'][$this->_sections['com']['index']]['level'] == 1): ?>
    <p class="jibie1"></p>
    <?php elseif ($this->_tpl_vars['comments'][$this->_sections['com']['index']]['level'] == 2): ?>
    <p class="jibie2"></p>
    <?php elseif ($this->_tpl_vars['comments'][$this->_sections['com']['index']]['level'] == 3): ?>
    <p class="jibie3"></p>
    <?php elseif ($this->_tpl_vars['comments'][$this->_sections['com']['index']]['level'] == 4): ?>
    <p class="jibie4"></p>
    <?php elseif ($this->_tpl_vars['comments'][$this->_sections['com']['index']]['level'] == 5): ?>
    <p class="jibie5"></p>
    <?php endif; ?>
    </td><!--此处级别样式从'jibie1'到'jibie5'-->
  </tr>
  <?php endfor; else: ?>	
	 <tr><td>亲暂时还没有评论！</td></tr>
  <?php endif; ?>    
</table>

<!--页码-->
       <DIV class="blank"></DIV>
       <div class="num_pg">
       <DIV class="red_pg">
     	<script type="text/javascript">
    		var pg_1 = new showPages('pg_1');
    		pg_1.pageCount = '<?php echo $this->_tpl_vars['pagecount']; ?>
';
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
    <?php if ($this->_tpl_vars['ismk']): ?><!-- 购买过该商品 -->
    	<?php if ($this->_tpl_vars['iscom']): ?><!-- 评价过该商品 -->
    <textarea name="comment" disabled="disabled" rows="5" class="area_all">亲，该商品您已经评价！</textarea>
    	<?php else: ?>
    <textarea name="comment" rows="5" class="area_all">亲，您购买过该商品，请评价赢校币！</textarea>
    	<?php endif; ?>
    <?php else: ?>
    	<textarea name="comment" disabled="disabled" rows="5" class="area_all">亲，只有购买过该商品，并登录才可以评价！</textarea>
    <?php endif; ?>	
    </td>
  </tr>
</table>
<input type="hidden" name="goodsid" value="<?php echo $this->_tpl_vars['goods']['ID']; ?>
">
<div align="center">
<?php if ($this->_tpl_vars['ismk']): ?> <!-- 购买过该商品 -->
    <?php if ($this->_tpl_vars['iscom']): ?>	<!-- 评价过该商品 -->
	<input type="button"  class="anniu10" value="发表点评"/>
	<?php else: ?>
		<input type="button"  class="anniu10" onclick="checkNull()" value="发表点评"/>
	<?php endif; ?>
<?php else: ?>
	<input type="button"  class="anniu10" value="发表点评"/>
<?php endif; ?>
</div>
</form>
</div>
<!--发表点评 end-->

</div>
<!--评论详细 end-->
</div>



	<!--成交记录-->
	<?php if ($this->_tpl_vars['pagekey'] == 'pg_2'): ?>
		<div id="tagContent2" style="DISPLAY: block">
	<?php else: ?>
		<div id="tagContent2" style="DISPLAY: none">
	<?php endif; ?>
   
    <!--成交记录详细-->
	<div class="show_all_plun">
	  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="all_ttbb">
 <?php unset($this->_sections['mk']);
$this->_sections['mk']['name'] = 'mk';
$this->_sections['mk']['loop'] = is_array($_loop=$this->_tpl_vars['mkdetail']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['mk']['start'] = (int)0;
$this->_sections['mk']['step'] = ((int)1) == 0 ? 1 : (int)1;
$this->_sections['mk']['max'] = (int)5;
$this->_sections['mk']['show'] = (bool)true;
if ($this->_sections['mk']['max'] < 0)
    $this->_sections['mk']['max'] = $this->_sections['mk']['loop'];
if ($this->_sections['mk']['start'] < 0)
    $this->_sections['mk']['start'] = max($this->_sections['mk']['step'] > 0 ? 0 : -1, $this->_sections['mk']['loop'] + $this->_sections['mk']['start']);
else
    $this->_sections['mk']['start'] = min($this->_sections['mk']['start'], $this->_sections['mk']['step'] > 0 ? $this->_sections['mk']['loop'] : $this->_sections['mk']['loop']-1);
if ($this->_sections['mk']['show']) {
    $this->_sections['mk']['total'] = min(ceil(($this->_sections['mk']['step'] > 0 ? $this->_sections['mk']['loop'] - $this->_sections['mk']['start'] : $this->_sections['mk']['start']+1)/abs($this->_sections['mk']['step'])), $this->_sections['mk']['max']);
    if ($this->_sections['mk']['total'] == 0)
        $this->_sections['mk']['show'] = false;
} else
    $this->_sections['mk']['total'] = 0;
if ($this->_sections['mk']['show']):

            for ($this->_sections['mk']['index'] = $this->_sections['mk']['start'], $this->_sections['mk']['iteration'] = 1;
                 $this->_sections['mk']['iteration'] <= $this->_sections['mk']['total'];
                 $this->_sections['mk']['index'] += $this->_sections['mk']['step'], $this->_sections['mk']['iteration']++):
$this->_sections['mk']['rownum'] = $this->_sections['mk']['iteration'];
$this->_sections['mk']['index_prev'] = $this->_sections['mk']['index'] - $this->_sections['mk']['step'];
$this->_sections['mk']['index_next'] = $this->_sections['mk']['index'] + $this->_sections['mk']['step'];
$this->_sections['mk']['first']      = ($this->_sections['mk']['iteration'] == 1);
$this->_sections['mk']['last']       = ($this->_sections['mk']['iteration'] == $this->_sections['mk']['total']);
?>
  <tr>
    <td valign="top" style="width:40%"><?php echo $this->_tpl_vars['mkdetail'][$this->_sections['mk']['index']]['goodsname']; ?>
</td>
   	<td valign="top" style="width:20%;color:#999">购买于[<?php echo $this->_tpl_vars['mkdetail'][$this->_sections['mk']['index']]['createtime']; ?>
]</td>
    <td valign="top" style="width:20%; color:#999;"><?php echo $this->_tpl_vars['mkdetail'][$this->_sections['mk']['index']]['shopnum']; ?>
件</td>
    <td valign="top" style="width:20%"><?php echo $this->_tpl_vars['mkdetail'][$this->_sections['mk']['index']]['nickname']; ?>

    <?php if ($this->_tpl_vars['mkdetail'][$this->_sections['mk']['index']]['level'] == 1): ?>
    <p class="jibie1"></p>
    <?php elseif ($this->_tpl_vars['mkdetail'][$this->_sections['mk']['index']]['level'] == 2): ?>
    <p class="jibie2"></p>
    <?php elseif ($this->_tpl_vars['mkdetail'][$this->_sections['mk']['index']]['level'] == 3): ?>
    <p class="jibie3"></p>
    <?php elseif ($this->_tpl_vars['mkdetail'][$this->_sections['mk']['index']]['level'] == 4): ?>
    <p class="jibie4"></p>
    <?php elseif ($this->_tpl_vars['mkdetail'][$this->_sections['mk']['index']]['level'] == 5): ?>
    <p class="jibie5"></p>
    <?php endif; ?>
    </td>
  </tr>
 <?php endfor; else: ?>	
	 <tr><td>亲暂时还没有人购买！</td></tr>
  <?php endif; ?>  
</table>
<!--页码-->
       <DIV class="blank"></DIV>
       <div class="num_pg">
       <DIV class="red_pg">
 		<script type="text/javascript">
    		var pg_2 = new showPages('pg_2');
    		pg_2.pageCount = '<?php echo $this->_tpl_vars['pagecount1']; ?>
';
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
<?php echo '
<script type="text/javascript">
window.setInterval(retain_time, 1000);
function retain_time(){
	var url = "remain_time.php?goodsid="+'; ?>
<?php echo $this->_tpl_vars['gid']; ?>
<?php echo ';
	var newAjax = new Ajax.Request(
			url,
			{
				method:\'post\',
				parameters:"a="+Math.random(),
				onComplete:getBack
			}
		);
}
//日志评论
function getBack(json)
{
	var obj = eval("("+json.responseText+")");
	document.getElementById(\'day\').innerHTML=obj[\'day\'];
	document.getElementById(\'hour\').innerHTML=obj[\'hour\'];
	document.getElementById(\'minute\').innerHTML=obj[\'minute\'];
	document.getElementById(\'second\').innerHTML=obj[\'second\'];
}

</script>
'; ?>

<!------------------------------------------body over-->
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>