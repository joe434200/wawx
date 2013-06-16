<?php /* Smarty version 2.6.18, created on 2013-06-02 16:56:19
         compiled from index/studentwill.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'msubstr', 'index/studentwill.tpl', 32, false),)), $this); ?>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<!------------------------------------------body-->
<DIV class="blank"></DIV>
<DIV class="block clearfix">
<div class="banner1000">
<a href="<?php echo $this->_tpl_vars['stuadvertise']['linkid']; ?>
" target="_blank"><img src="./uploadfiles/goods/<?php echo $this->_tpl_vars['stuadvertise']['realname']; ?>
" /></a>
</div>

<DIV class="blank"></DIV>
<DIV class="block clearfix">
<div class="AreaR clearfix">

<!--团购区 列表 start-->
<DIV class="box_1">
<div class="group_bt ared"><span><a href="more.php?mact=morerevolume">更多</a></span>
  <h3>团购区</h3></div>
<div class="group_index">
<ul class="ared">
 <?php unset($this->_sections['vgoods']);
$this->_sections['vgoods']['name'] = 'vgoods';
$this->_sections['vgoods']['loop'] = is_array($_loop=$this->_tpl_vars['vgoodslist']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['vgoods']['start'] = (int)0;
$this->_sections['vgoods']['step'] = ((int)1) == 0 ? 1 : (int)1;
$this->_sections['vgoods']['max'] = (int)9;
$this->_sections['vgoods']['show'] = (bool)true;
if ($this->_sections['vgoods']['max'] < 0)
    $this->_sections['vgoods']['max'] = $this->_sections['vgoods']['loop'];
if ($this->_sections['vgoods']['start'] < 0)
    $this->_sections['vgoods']['start'] = max($this->_sections['vgoods']['step'] > 0 ? 0 : -1, $this->_sections['vgoods']['loop'] + $this->_sections['vgoods']['start']);
else
    $this->_sections['vgoods']['start'] = min($this->_sections['vgoods']['start'], $this->_sections['vgoods']['step'] > 0 ? $this->_sections['vgoods']['loop'] : $this->_sections['vgoods']['loop']-1);
if ($this->_sections['vgoods']['show']) {
    $this->_sections['vgoods']['total'] = min(ceil(($this->_sections['vgoods']['step'] > 0 ? $this->_sections['vgoods']['loop'] - $this->_sections['vgoods']['start'] : $this->_sections['vgoods']['start']+1)/abs($this->_sections['vgoods']['step'])), $this->_sections['vgoods']['max']);
    if ($this->_sections['vgoods']['total'] == 0)
        $this->_sections['vgoods']['show'] = false;
} else
    $this->_sections['vgoods']['total'] = 0;
if ($this->_sections['vgoods']['show']):

            for ($this->_sections['vgoods']['index'] = $this->_sections['vgoods']['start'], $this->_sections['vgoods']['iteration'] = 1;
                 $this->_sections['vgoods']['iteration'] <= $this->_sections['vgoods']['total'];
                 $this->_sections['vgoods']['index'] += $this->_sections['vgoods']['step'], $this->_sections['vgoods']['iteration']++):
$this->_sections['vgoods']['rownum'] = $this->_sections['vgoods']['iteration'];
$this->_sections['vgoods']['index_prev'] = $this->_sections['vgoods']['index'] - $this->_sections['vgoods']['step'];
$this->_sections['vgoods']['index_next'] = $this->_sections['vgoods']['index'] + $this->_sections['vgoods']['step'];
$this->_sections['vgoods']['first']      = ($this->_sections['vgoods']['iteration'] == 1);
$this->_sections['vgoods']['last']       = ($this->_sections['vgoods']['iteration'] == $this->_sections['vgoods']['total']);
?>
<li>
    <div class="new_i"></div> <!--此代码是右上角的“新单”标记-->
    <div class="pic"><img src="./uploadfiles/goods/<?php echo $this->_tpl_vars['vgoodslist'][$this->_sections['vgoods']['index']]['newing']; ?>
" /></div>
	<div class="zk">
	<p class="price">市场价：<em>￥<?php echo $this->_tpl_vars['vgoodslist'][$this->_sections['vgoods']['index']]['mkp']; ?>
</em></p>
	<p class="price2"><em><?php echo $this->_tpl_vars['vgoodslist'][$this->_sections['vgoods']['index']]['vdisc']; ?>
</em>折</p>
	<p class="num"><em><?php echo $this->_tpl_vars['vgoodslist'][$this->_sections['vgoods']['index']]['grnum']; ?>
</em>人团购</p>
	</div>	
	<div class="qkk">
	<p class="price"><strong>￥</strong><?php echo $this->_tpl_vars['vgoodslist'][$this->_sections['vgoods']['index']]['vopricen']; ?>
.<em><?php echo $this->_tpl_vars['vgoodslist'][$this->_sections['vgoods']['index']]['vopricem']; ?>
</em></p>
	<p class="ann"><a href="goods.php?goodsid=<?php echo $this->_tpl_vars['vgoodslist'][$this->_sections['vgoods']['index']]['id']; ?>
&shoppingtype=2"><img src="./templates/images/goods/stud_7.png" border="0" /></a></p>
	</div>
	<div class="bt"><a href="goods.php?goodsid=<?php echo $this->_tpl_vars['vgoodslist'][$this->_sections['vgoods']['index']]['id']; ?>
&shoppingtype=2"><?php echo ((is_array($_tmp=$this->_tpl_vars['vgoodslist'][$this->_sections['vgoods']['index']]['gbf'])) ? $this->_run_mod_handler('msubstr', true, $_tmp, 0, 20) : smarty_modifier_msubstr($_tmp, 0, 20)); ?>
</a></div>
</li>  
  <?php endfor; else: ?>
	<li>暂时还没有团购商品！</li>
  <?php endif; ?>
</ul>
</div></div>
<!--/团购区 列表-->


<!--特色区 列表 start-->

<DIV class="blank"></DIV>
<DIV class="box_1">
<div class="group_bt ared"><span><a href="more.php?mact=morerespecial">更多</a></span>
  <h3>特色区</h3></div>
<div class="group_index">
<ul class="ared">
 <?php unset($this->_sections['sgoods']);
$this->_sections['sgoods']['name'] = 'sgoods';
$this->_sections['sgoods']['loop'] = is_array($_loop=$this->_tpl_vars['sgoodslist']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['sgoods']['start'] = (int)0;
$this->_sections['sgoods']['step'] = ((int)1) == 0 ? 1 : (int)1;
$this->_sections['sgoods']['max'] = (int)9;
$this->_sections['sgoods']['show'] = (bool)true;
if ($this->_sections['sgoods']['max'] < 0)
    $this->_sections['sgoods']['max'] = $this->_sections['sgoods']['loop'];
if ($this->_sections['sgoods']['start'] < 0)
    $this->_sections['sgoods']['start'] = max($this->_sections['sgoods']['step'] > 0 ? 0 : -1, $this->_sections['sgoods']['loop'] + $this->_sections['sgoods']['start']);
else
    $this->_sections['sgoods']['start'] = min($this->_sections['sgoods']['start'], $this->_sections['sgoods']['step'] > 0 ? $this->_sections['sgoods']['loop'] : $this->_sections['sgoods']['loop']-1);
if ($this->_sections['sgoods']['show']) {
    $this->_sections['sgoods']['total'] = min(ceil(($this->_sections['sgoods']['step'] > 0 ? $this->_sections['sgoods']['loop'] - $this->_sections['sgoods']['start'] : $this->_sections['sgoods']['start']+1)/abs($this->_sections['sgoods']['step'])), $this->_sections['sgoods']['max']);
    if ($this->_sections['sgoods']['total'] == 0)
        $this->_sections['sgoods']['show'] = false;
} else
    $this->_sections['sgoods']['total'] = 0;
if ($this->_sections['sgoods']['show']):

            for ($this->_sections['sgoods']['index'] = $this->_sections['sgoods']['start'], $this->_sections['sgoods']['iteration'] = 1;
                 $this->_sections['sgoods']['iteration'] <= $this->_sections['sgoods']['total'];
                 $this->_sections['sgoods']['index'] += $this->_sections['sgoods']['step'], $this->_sections['sgoods']['iteration']++):
$this->_sections['sgoods']['rownum'] = $this->_sections['sgoods']['iteration'];
$this->_sections['sgoods']['index_prev'] = $this->_sections['sgoods']['index'] - $this->_sections['sgoods']['step'];
$this->_sections['sgoods']['index_next'] = $this->_sections['sgoods']['index'] + $this->_sections['sgoods']['step'];
$this->_sections['sgoods']['first']      = ($this->_sections['sgoods']['iteration'] == 1);
$this->_sections['sgoods']['last']       = ($this->_sections['sgoods']['iteration'] == $this->_sections['sgoods']['total']);
?>
<li>
    <div class="new_i"></div> <!--此代码是右上角的“新单”标记-->
    <div class="pic"><img src="./uploadfiles/goods/<?php echo $this->_tpl_vars['sgoodslist'][$this->_sections['sgoods']['index']]['newing']; ?>
" /></div>
	<div class="zk">
	<p class="price">市场价：<em>￥<?php echo $this->_tpl_vars['sgoodslist'][$this->_sections['sgoods']['index']]['mkp']; ?>
</em></p>
	<p class="price2"><em><?php echo $this->_tpl_vars['sgoodslist'][$this->_sections['sgoods']['index']]['udisc']; ?>
</em>折</p>
	<p class="num"><em><?php echo $this->_tpl_vars['sgoodslist'][$this->_sections['sgoods']['index']]['mnum']; ?>
</em>件售出</p>
	</div>	
	<div class="qkk">
	<p class="price"><strong>￥</strong><?php echo $this->_tpl_vars['sgoodslist'][$this->_sections['sgoods']['index']]['vopricen']; ?>
.<em><?php echo $this->_tpl_vars['sgoodslist'][$this->_sections['sgoods']['index']]['vopricem']; ?>
</em></p>
	<p class="ann"><a href="goods.php?goodsid=<?php echo $this->_tpl_vars['sgoodslist'][$this->_sections['sgoods']['index']]['id']; ?>
&shoppingtype=1"><img src="./templates/images/goods/stud_7.png" border="0" /></a></p>
	</div>
	<div class="bt"><a href="goods.php?goodsid=<?php echo $this->_tpl_vars['sgoodslist'][$this->_sections['sgoods']['index']]['id']; ?>
&shoppingtype=1"><?php echo ((is_array($_tmp=$this->_tpl_vars['sgoodslist'][$this->_sections['sgoods']['index']]['gbf'])) ? $this->_run_mod_handler('msubstr', true, $_tmp, 0, 20) : smarty_modifier_msubstr($_tmp, 0, 20)); ?>
</a></div>
</li>  
  <?php endfor; else: ?>
	<li>暂时还没有特色商品！</li>
  <?php endif; ?>

<!--循环数据-->
</ul>
</div></div>
<!--/特色区 列表-->
</div>



<div class="AreaLL clearfix">




<!--本周热销单品-->
<DIV class="box">
<DIV class="box_1">
<div class="title_bt"><span class="a666"><a href="javascript:changehotgoods();" id="changegoods">换一组</a></span>
  <h3>本周热销单品</h3></div>
  <DIV class="stud_hot clearfix ared" id="hotgoods">
  <ul>
   <?php unset($this->_sections['hots']);
$this->_sections['hots']['name'] = 'hots';
$this->_sections['hots']['loop'] = is_array($_loop=$this->_tpl_vars['weekhotlist']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['hots']['start'] = (int)0;
$this->_sections['hots']['step'] = ((int)1) == 0 ? 1 : (int)1;
$this->_sections['hots']['max'] = (int)11;
$this->_sections['hots']['show'] = (bool)true;
if ($this->_sections['hots']['max'] < 0)
    $this->_sections['hots']['max'] = $this->_sections['hots']['loop'];
if ($this->_sections['hots']['start'] < 0)
    $this->_sections['hots']['start'] = max($this->_sections['hots']['step'] > 0 ? 0 : -1, $this->_sections['hots']['loop'] + $this->_sections['hots']['start']);
else
    $this->_sections['hots']['start'] = min($this->_sections['hots']['start'], $this->_sections['hots']['step'] > 0 ? $this->_sections['hots']['loop'] : $this->_sections['hots']['loop']-1);
if ($this->_sections['hots']['show']) {
    $this->_sections['hots']['total'] = min(ceil(($this->_sections['hots']['step'] > 0 ? $this->_sections['hots']['loop'] - $this->_sections['hots']['start'] : $this->_sections['hots']['start']+1)/abs($this->_sections['hots']['step'])), $this->_sections['hots']['max']);
    if ($this->_sections['hots']['total'] == 0)
        $this->_sections['hots']['show'] = false;
} else
    $this->_sections['hots']['total'] = 0;
if ($this->_sections['hots']['show']):

            for ($this->_sections['hots']['index'] = $this->_sections['hots']['start'], $this->_sections['hots']['iteration'] = 1;
                 $this->_sections['hots']['iteration'] <= $this->_sections['hots']['total'];
                 $this->_sections['hots']['index'] += $this->_sections['hots']['step'], $this->_sections['hots']['iteration']++):
$this->_sections['hots']['rownum'] = $this->_sections['hots']['iteration'];
$this->_sections['hots']['index_prev'] = $this->_sections['hots']['index'] - $this->_sections['hots']['step'];
$this->_sections['hots']['index_next'] = $this->_sections['hots']['index'] + $this->_sections['hots']['step'];
$this->_sections['hots']['first']      = ($this->_sections['hots']['iteration'] == 1);
$this->_sections['hots']['last']       = ($this->_sections['hots']['iteration'] == $this->_sections['hots']['total']);
?>
    <li class="clearfix">
  	<a href="goods.php?goodsid=<?php echo $this->_tpl_vars['weekhotlist'][$this->_sections['hots']['index']]['ID']; ?>
&shoppingtype=<?php echo $this->_tpl_vars['weekhotlist'][$this->_sections['hots']['index']]['shoptype']; ?>
"><img src="./uploadfiles/goods/<?php echo $this->_tpl_vars['weekhotlist'][$this->_sections['hots']['index']]['newimg']; ?>
" /></a>
  	<h3><a href="goods.php?goodsid=<?php echo $this->_tpl_vars['weekhotlist'][$this->_sections['hots']['index']]['ID']; ?>
&shoppingtype=<?php echo $this->_tpl_vars['weekhotlist'][$this->_sections['hots']['index']]['shoptype']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['weekhotlist'][$this->_sections['hots']['index']]['goodsname'])) ? $this->_run_mod_handler('msubstr', true, $_tmp, 0, 12) : smarty_modifier_msubstr($_tmp, 0, 12)); ?>
</a></h3>
  	<p class="f_red">￥<?php echo $this->_tpl_vars['weekhotlist'][$this->_sections['hots']['index']]['shopprice']; ?>
</p>
  	</li>
  <?php endfor; else: ?>
	<li>暂时还没有热销商品！</li>
  <?php endif; ?>
  </ul>
  </DIV>
</DIV>
</DIV>
<!--本周热销单品 end-->





<!--最新排行-->
<div class="blank"></div>
<DIV class="box">
<DIV class="box_1">
<div class="title_bt"><span class="a666"><a href="javascript:changenewestgoods();" id="cnewestgoods">换一组</a></span>
  <h3>最新排行</h3></div>
  <DIV class="stud_hot clearfix ared" id="newestgoods">
  <ul>
   <?php unset($this->_sections['newest']);
$this->_sections['newest']['name'] = 'newest';
$this->_sections['newest']['loop'] = is_array($_loop=$this->_tpl_vars['newestlist']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['newest']['start'] = (int)0;
$this->_sections['newest']['step'] = ((int)1) == 0 ? 1 : (int)1;
$this->_sections['newest']['max'] = (int)11;
$this->_sections['newest']['show'] = (bool)true;
if ($this->_sections['newest']['max'] < 0)
    $this->_sections['newest']['max'] = $this->_sections['newest']['loop'];
if ($this->_sections['newest']['start'] < 0)
    $this->_sections['newest']['start'] = max($this->_sections['newest']['step'] > 0 ? 0 : -1, $this->_sections['newest']['loop'] + $this->_sections['newest']['start']);
else
    $this->_sections['newest']['start'] = min($this->_sections['newest']['start'], $this->_sections['newest']['step'] > 0 ? $this->_sections['newest']['loop'] : $this->_sections['newest']['loop']-1);
if ($this->_sections['newest']['show']) {
    $this->_sections['newest']['total'] = min(ceil(($this->_sections['newest']['step'] > 0 ? $this->_sections['newest']['loop'] - $this->_sections['newest']['start'] : $this->_sections['newest']['start']+1)/abs($this->_sections['newest']['step'])), $this->_sections['newest']['max']);
    if ($this->_sections['newest']['total'] == 0)
        $this->_sections['newest']['show'] = false;
} else
    $this->_sections['newest']['total'] = 0;
if ($this->_sections['newest']['show']):

            for ($this->_sections['newest']['index'] = $this->_sections['newest']['start'], $this->_sections['newest']['iteration'] = 1;
                 $this->_sections['newest']['iteration'] <= $this->_sections['newest']['total'];
                 $this->_sections['newest']['index'] += $this->_sections['newest']['step'], $this->_sections['newest']['iteration']++):
$this->_sections['newest']['rownum'] = $this->_sections['newest']['iteration'];
$this->_sections['newest']['index_prev'] = $this->_sections['newest']['index'] - $this->_sections['newest']['step'];
$this->_sections['newest']['index_next'] = $this->_sections['newest']['index'] + $this->_sections['newest']['step'];
$this->_sections['newest']['first']      = ($this->_sections['newest']['iteration'] == 1);
$this->_sections['newest']['last']       = ($this->_sections['newest']['iteration'] == $this->_sections['newest']['total']);
?>
    <li class="clearfix">
  	<a href="goods.php?goodsid=<?php echo $this->_tpl_vars['newestlist'][$this->_sections['newest']['index']]['ID']; ?>
&shoppingtype=<?php echo $this->_tpl_vars['weekhotlist'][$this->_sections['hots']['index']]['shoptype']; ?>
"><img src="./uploadfiles/goods/<?php echo $this->_tpl_vars['newestlist'][$this->_sections['newest']['index']]['newimg']; ?>
" /></a>
  	<h3><a href="goods.php?goodsid=<?php echo $this->_tpl_vars['newestlist'][$this->_sections['newest']['index']]['ID']; ?>
&shoppingtype=<?php echo $this->_tpl_vars['weekhotlist'][$this->_sections['hots']['index']]['shoptype']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['newestlist'][$this->_sections['newest']['index']]['goodsname'])) ? $this->_run_mod_handler('msubstr', true, $_tmp, 0, 12) : smarty_modifier_msubstr($_tmp, 0, 12)); ?>
</a></h3>
  	<p class="f_red">￥<?php echo $this->_tpl_vars['newestlist'][$this->_sections['newest']['index']]['shopprice']; ?>
</p>
  	</li>
  <?php endfor; else: ?>
	<li>暂时还没有最新商品！</li>
  <?php endif; ?>
  
  </ul>
  </DIV>
</DIV>
</DIV>
<!--最新排行 end-->
</div>
</div>
</div>
<?php echo '
<script type="text/javascript">
	var j=0;
	var k=0;
	//换一组热销商品
	function changehotgoods(){
		var num=++j;
		//var a=(如果是数值)'; ?>
smarty数值变量<?php echo ';(如果是字符串)\''; ?>
smarty字符串变量<?php echo '\';
		var a= '; ?>
<?php echo $this->_tpl_vars['weekhotlistjs']; ?>
<?php echo ';
		var table="<ul>";
        var count=0;
        if(a.length<=11){
			//到最后一组，连接不可再点击
			document.getElementById(\'changegoods\').removeAttribute("href");
			return;
		}
   		//每组显示10个元素
		for(var i=num*11;i<a.length;i++){
		   count++;
		   table=table+" <li class=\'clearfix\'><a href=\'goods.php?goodsid="+a[i].ID+"\'><img src=\'./uploadfiles/goods/"+a[i].newimg+"\'></a> ";
		   table=table+"<h3><a href=\'goods.php?goodsid="+a[i].ID+"\'>"+a[i].goodsname.substr(0,12)+"</a></h3> ";
		   table=table+"<p class=\'f_red\'>￥"+a[i].shopprice+"</p></li>";
		   if(i==a.length-1){
			   //到最后一组，连接不可再点击
			   document.getElementById(\'changegoods\').removeAttribute("href");
		   }
		   if(count==11){
			   break;
		   }
		 }
		table=table+"</ul>";
		document.getElementById("hotgoods").innerHTML = table;
	}

	
	//换一组最新排行
	function changenewestgoods(){
		var num=++k;
		//var a=(如果是数值)'; ?>
smarty数值变量<?php echo ';(如果是字符串)\''; ?>
smarty字符串变量<?php echo '\';
		var a= '; ?>
<?php echo $this->_tpl_vars['newestlistjs']; ?>
<?php echo ';
		var table="<ul>";
        var count=0;
        if(a.length<=11){
			//到最后一组，连接不可再点击
			document.getElementById(\'cnewestgoods\').removeAttribute("href");
			return;
		}
   		//每组显示11个元素
		for(var i=num*11;i<a.length;i++){
		   count++;
		   table=table+" <li class=\'clearfix\'><a href=\'goods.php?goodsid="+a[i].ID+"\'><img src=\'./uploadfiles/goods/"+a[i].newimg+"\'></a> ";
		   table=table+"<h3><a href=\'goods.php?goodsid="+a[i].ID+"\'>"+a[i].goodsname.substr(0,12)+"</a></h3> ";
		   table=table+"<p class=\'f_red\'>￥"+a[i].shopprice+"</p></li>";
		   if(i==a.length-1){
			   //到最后一组，连接不可再点击
			   document.getElementById(\'cnewestgoods\').removeAttribute("href");
		   }
		   
		   if(count==11){
			   break;
		   }
		 }
		
		table=table+"</ul>";
		document.getElementById("newestgoods").innerHTML = table;
	}
</script>
'; ?>

<!------------------------------------------body over-->
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>