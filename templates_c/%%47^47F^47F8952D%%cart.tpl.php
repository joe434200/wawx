<?php /* Smarty version 2.6.18, created on 2013-06-02 17:07:03
         compiled from flow/cart.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'explode', 'flow/cart.tpl', 32, false),)), $this); ?>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<!------------------------------------------body-->

<DIV class="blank"></DIV>
<DIV class="block clearfix"><!--当前位置-->
<div class="location ared">当前位置：<a href="index.php">首页</a> > 购物流程 > 购物车 </div>
<div class="blank"></div> 
<div>
  <div class="flowBox">
  <?php if ($this->_tpl_vars['cartgoods']): ?>
    <h6><span>商品列表</span></h6>
        <form id="formCart" name="formCart" method="post" action="">
           <table width="99%" align="center" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
            <tr>
              <th bgcolor="#ffffff">商品名称</th>
              <th bgcolor="#ffffff">商品属性</th>
              <th bgcolor="#ffffff">市场价格</th>
              <th bgcolor="#ffffff">本店价格</th>
              <th bgcolor="#ffffff">购买数量</th>
              <th bgcolor="#ffffff">小计</th>
              <th bgcolor="#ffffff">操作</th>
            </tr>  
            <?php $_from = $this->_tpl_vars['cartgoods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
            <tr>
              <td bgcolor="#ffffff" align="center">
                    <a href="goods.php?goodsid=<?php echo $this->_tpl_vars['item']['goodsid']; ?>
&shoppingtype=<?php echo $this->_tpl_vars['item']['shoppingtype']; ?>
" ><img style="width: 100px;height: 100px;"
					 src="./uploadfiles/goods/<?php echo $this->_tpl_vars['item']['newimg']; ?>
" border="0" title="<?php echo $this->_tpl_vars['item']['goodsname']; ?>
" /></a><br>
                    <a style="text-decoration:none;" href="goods.php?goodsid=<?php echo $this->_tpl_vars['item']['goodsid']; ?>
&shoppingtype=<?php echo $this->_tpl_vars['item']['shoppingtype']; ?>
"  class="f6" ><?php echo $this->_tpl_vars['item']['goodsname']; ?>
</a>
              </td>
              <td bgcolor="#ffffff">
              <!-- 商品属性参数 -->
               <?php $_from = ((is_array($_tmp=';')) ? $this->_run_mod_handler('explode', true, $_tmp, $this->_tpl_vars['item']['goodsparamenter']) : explode($_tmp, $this->_tpl_vars['item']['goodsparamenter'])); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['goodsp']):
?>
	  				<?php echo $this->_tpl_vars['goodsp']; ?>
<br>
	  			<?php endforeach; endif; unset($_from); ?>
    		  </td>
              <td align="right" bgcolor="#ffffff"><span id="mprice_<?php echo $this->_tpl_vars['item']['goodsid']; ?>
"><?php echo $this->_tpl_vars['item']['marketprice']; ?>
</span> </td>
              <td align="right" bgcolor="#ffffff"><span id="sprice_<?php echo $this->_tpl_vars['item']['goodsid']; ?>
"><?php echo $this->_tpl_vars['item']['shoppingprice']; ?>
</span> </td>
              <td align="center" bgcolor="#ffffff">
                <a href="javascript:subadd(document.getElementById('id_<?php echo $this->_tpl_vars['item']['goodsid']; ?>
'),<?php echo $this->_tpl_vars['item']['goodsid']; ?>
,'sub')"><img src="./templates/images/goods/sub.jpg"  title="数量减一" /></a>
                <input type="text" name="goods_number" id="id_<?php echo $this->_tpl_vars['item']['goodsid']; ?>
" value="<?php echo $this->_tpl_vars['item']['shoppingnum']; ?>
" size="4"
                 class="inputBg" style="text-align:center" onchange="subadd(document.getElementById('id_<?php echo $this->_tpl_vars['item']['goodsid']; ?>
'),<?php echo $this->_tpl_vars['item']['goodsid']; ?>
,'auto')"/>
                <a href="javascript:subadd(document.getElementById('id_<?php echo $this->_tpl_vars['item']['goodsid']; ?>
'),<?php echo $this->_tpl_vars['item']['goodsid']; ?>
,'add')"><img src="./templates/images/goods/add.jpg" title="数量加一" /></a>
              </td>
              <td align="right" bgcolor="#ffffff">￥&nbsp;<span id="ssum_<?php echo $this->_tpl_vars['item']['goodsid']; ?>
"><?php echo $this->_tpl_vars['item']['sumsmall']; ?>
</span>&nbsp;元 </td>
              <td align="center" bgcolor="#ffffff">
              	<a style="text-decoration:none;" href="javascript:collectGoods(<?php echo $this->_tpl_vars['item']['goodsid']; ?>
,<?php echo $this->_tpl_vars['item']['shoppingtype']; ?>
)" class="f6" id="coll_<?php echo $this->_tpl_vars['item']['goodsid']; ?>
" title="收藏">收藏</a><br>
                <a style="text-decoration:none;" href="javascript:showdivconfirm(document.getElementById('del_<?php echo $this->_tpl_vars['item']['goodsid']; ?>
'),'确定从购物车中删除该商品吗？','确定','取消','flow.php?act=delete&goodsid=<?php echo $this->_tpl_vars['item']['goodsid']; ?>
')"  id="del_<?php echo $this->_tpl_vars['item']['goodsid']; ?>
" class="f6" title="删除">删除</a>
              </td>
            </tr>
       	 <?php endforeach; endif; unset($_from); ?>    	
          </table>
          <table width="99%" align="center" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
            <tr>  
              <td bgcolor="#ffffff">
             		购物金额总计(不含运费) <font class="pricetype">￥&nbsp;<span id="stotal"><?php if ($this->_tpl_vars['cartgoods'][0]['shopTotal']): ?><?php echo $this->_tpl_vars['cartgoods'][0]['shopTotal']; ?>
<?php else: ?>0<?php endif; ?></span>&nbsp;元</font>，比市场价 
             		<font class="pricetype">￥&nbsp;<span id="mtotal"><?php if ($this->_tpl_vars['cartgoods'][0]['marketTotal']): ?><?php echo $this->_tpl_vars['cartgoods'][0]['marketTotal']; ?>
<?php else: ?>0<?php endif; ?></span>&nbsp;元</font>
             		 节省了 <font class="pricetype">￥&nbsp;<span id="dismoney"><?php if ($this->_tpl_vars['cartgoods'][0]['disMoney']): ?><?php echo $this->_tpl_vars['cartgoods'][0]['disMoney']; ?>
<?php else: ?>0<?php endif; ?></span>&nbsp;元（&nbsp;<span id="rate"><?php if ($this->_tpl_vars['cartgoods'][0]['rate']): ?><?php echo $this->_tpl_vars['cartgoods'][0]['rate']; ?>
<?php else: ?>0<?php endif; ?></span>&nbsp;%&nbsp;）</font>
              </td>
              <td align="right" bgcolor="#ffffff">
                <input type="button" value="清空购物车" class="bnt_blue_1" id="bnt11" onclick="showdivconfirm(document.getElementById('bnt11'),'确定清空购物车吗？','确定','取消','flow.php?act=clear')"  />
              </td>
            </tr>
          </table>
        </form>
        <table width="99%" align="center" border="0" cellpadding="5" cellspacing="0" bgcolor="#dddddd">
          <tr>
            <td bgcolor="#ffffff"><a href="./"><img src="./templates/images/goods/continue.gif" alt="continue" /></a></td>
            <td bgcolor="#ffffff" align="right">
            <a href="flow.php?act=checkout"><img src="./templates/images/goods/checkout.gif" alt="checkout" /></a>
            </td>
          </tr>
        </table>
        <?php else: ?>
        	<br><br><br>
        	<center><font size="6">亲，购物车中没有宝贝（或已下订单），请开心购物！</font></center>
        	<br><br><br>
        <?php endif; ?>
  </div>
    <div class="blank"></div>
	<div class="flowBox">
  
    <h6><span>我的收藏</span></h6>
     <?php if ($_SESSION['loginok'] == 0 || $_SESSION['loginok'] == ''): ?>
    	<br>
    		<center>请登录！</center>
    	<br>
    <?php else: ?>
    	<?php if ($this->_tpl_vars['collgoods']): ?>
           <table width="99%" align="center" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
            <tr>
              <th bgcolor="#ffffff">商品名称</th>
              <th bgcolor="#ffffff">市场价格</th>
              <th bgcolor="#ffffff">本店价格</th>
              <th bgcolor="#ffffff">操作</th>
            </tr>  
            <?php $_from = $this->_tpl_vars['collgoods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item1']):
?>
            <tr>
              <td bgcolor="#ffffff" align="center">
                    <?php echo $this->_tpl_vars['item1']['goodsname']; ?>

              </td>
           
              <td align="right" bgcolor="#ffffff"><?php echo $this->_tpl_vars['item1']['marketprice']; ?>
</td>
              <td align="right" bgcolor="#ffffff"><?php echo $this->_tpl_vars['item1']['shopprice']; ?>
</td>
              
              <td align="center" bgcolor="#ffffff">
              <?php if ($this->_tpl_vars['item1']['collecttype'] == '5'): ?>
              	<a style="text-decoration:none;" href="goods.php?goodsid=<?php echo $this->_tpl_vars['item1']['ID']; ?>
" class="f6"  title="去看看">去看看</a>
              <?php elseif ($this->_tpl_vars['item1']['collecttype'] == '6'): ?>
              	<a style="text-decoration:none;" href="goods.php?goodsid=<?php echo $this->_tpl_vars['item1']['ID']; ?>
&shoppingtype=1" class="f6"  title="去看看">去看看</a>
              <?php elseif ($this->_tpl_vars['item1']['collecttype'] == '7'): ?>
              	<a style="text-decoration:none;" href="goods.php?goodsid=<?php echo $this->_tpl_vars['item1']['ID']; ?>
&shoppingtype=2" class="f6"  title="去看看">去看看</a>
              <?php elseif ($this->_tpl_vars['item1']['collecttype'] == '8'): ?>
              	<a style="text-decoration:none;" href="goods.php?act=exchange&goodsid=<?php echo $this->_tpl_vars['item1']['ID']; ?>
" class="f6"  title="去看看">去看看</a>
              <?php endif; ?>
              	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <a style="text-decoration:none;" href="javascript:showdivconfirm(document.getElementById('del1_<?php echo $this->_tpl_vars['item1']['ID']; ?>
'),'确定从收藏中删除吗？','确定','取消','foucsandrecom.php?acttype=delete&goodsid=<?php echo $this->_tpl_vars['item1']['ID']; ?>
&userid=<?php echo $this->_tpl_vars['item1']['idt_user']; ?>
')"  id="del1_<?php echo $this->_tpl_vars['item1']['ID']; ?>
"  class="f6" title="删除">删除</a>
              </td>
            </tr>
       	 <?php endforeach; endif; unset($_from); ?> 
       	   </table>   	
      <?php else: ?>
        	<br>
        	<center>亲，您还没有收藏！</center>
        	<br>
      <?php endif; ?>
   <?php endif; ?>
  </div>    
     
 </div>
 </DIV>
<script src="./templates/scripts/goods/showdiv.js" type="text/javascript"></script>
<script src="./templates/scripts/goods/cart.js" type="text/javascript"></script>
 <!------------------------------------------body over-->
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>