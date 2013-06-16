<?php /* Smarty version 2.6.18, created on 2013-06-09 18:34:50
         compiled from user/my_index.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "userheader.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="my_right clearfix">
   
   <div class="my_overview clearfix">
     <div class="my_overview_a clearfix">
     <p class="my_avatar"><img src="<?php echo $this->_tpl_vars['self']['photo']; ?>
" /></p>
     <ul class="my_info">
     <li><a href="#"><?php if ($this->_tpl_vars['self']['nickname'] != ""): ?><?php echo $this->_tpl_vars['self']['nickname']; ?>
<?php else: ?><?php echo $this->_tpl_vars['self']['email']; ?>
<?php endif; ?></a>&nbsp;  |&nbsp;  <a href="#"><?php if ($this->_tpl_vars['self']['schoolname'] != ""): ?><?php echo $this->_tpl_vars['self']['schoolname']; ?>
<?php else: ?>尚未填写<?php endif; ?></a></li>
     <li>等&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;级：<?php echo $this->_tpl_vars['self']['level']; ?>
级</li>
     <li>注册时间：<?php echo $this->_tpl_vars['self']['createtime']; ?>
</li>
     <li>上次登录：<?php echo $this->_tpl_vars['self']['lastlogintime']; ?>
</li>
     <li>登录次数：<?php echo $this->_tpl_vars['self']['logintimes']; ?>
</li>
     </ul>
	 
	 <ul class="my_info">
     <li>注册手机：<?php if ($this->_tpl_vars['self']['bindmobile'] != ""): ?><a href="#"><?php echo $this->_tpl_vars['self']['bindmobile']; ?>
</a><?php else: ?> <img src="./templates/images/schoolbar/tel.gif" />未验证<?php endif; ?></li>
     <li>消费积分：<span class="af30" style="font-size:14px;"><strong><?php echo $this->_tpl_vars['self']['consumcoins']; ?>
积分</strong></span> &nbsp;&nbsp; <span class="af30"><a href="#">积分卡充值</a></span></li>
     <li>校吧积分：<span class="af30" style="font-size:14px;"><strong><?php echo $this->_tpl_vars['self']['forumcoins']; ?>
积分</strong></span></li>
     <li>总积分：<span class="af30"><strong><?php echo $this->_tpl_vars['self']['coins']; ?>
积分</strong></span></li>
     <li><a href="#"><img src="./templates/images/schoolbar/my_jf.gif" border="0" /></a>&nbsp;&nbsp;已领取<?php echo $this->_tpl_vars['self']['timescoins']; ?>
次</li>
     </ul>
     </div>
   </div>
   
   
   
   <div class="my_detailed clearfix">
   <ul>
   <li>你获得的勋章：小灰灰(假数据)<span></span></li>
   <li>评论条数：<span>我给别人的评论 0条(假数据)</span></li>
   <li>空间访客数：<span><?php echo $this->_tpl_vars['self']['visitsum']; ?>
 人</span></li>
   <li>照片张数：<span><?php echo $this->_tpl_vars['info']['phsum']; ?>
 张</span></li>
   <li>日记篇数：<span><?php echo $this->_tpl_vars['info']['disum']; ?>
 篇</span></li>
   <li>添加好友：<span><?php echo $this->_tpl_vars['info']['frsum']; ?>
 人</span></li>
   <li>发帖总数：<span><?php echo $this->_tpl_vars['info']['tpsum']; ?>
 次</span></li>
   <li>求职总数：<span>0(假数据) 个岗位</span></li>
   </ul>
   </div>
   
   </div>
   
   </div>
   </div>
   </div>
   
 
   <div class="blank10"></div>
   </div>




<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "barfooter.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>