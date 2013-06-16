<?php /* Smarty version 2.6.18, created on 2013-06-03 19:32:09
         compiled from wb_zone/wb_about.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "wbheader.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


<!--右侧-->
    <td valign="top" class="wb_ny_RR clearfix">
    
      <div class="wb_bt blue_s">TA的个人档</div>


<div class="space_personal_ny clearfix" style="height:680px;">
<div class="line">
<div class="name"><strong>youxiayuan</strong>(UID: 1137730)</div>

<div class="rz">
<ul>
<li><em>空间访问量</em><?php echo $this->_tpl_vars['self']['visitsum']; ?>
</li>
<li><em>邮箱状态</em><?php if ($this->_tpl_vars['self']['email'] == ""): ?>未验证<?php else: ?>已认证<?php endif; ?></li>
<li><em>积分</em><?php echo $this->_tpl_vars['self']; ?>
</li>
<li><em>手机认证</em><?php if ($this->_tpl_vars['self']['mobile'] == ""): ?>未认证<?php else: ?>已认证<?php endif; ?></li>
</ul>
</div>


<div class="xx">
<ul>
<li><em>空间名称</em><?php echo $this->_tpl_vars['self']['spacename']; ?>
</li>
<li><em>空间说明</em><?php echo $this->_tpl_vars['self']['introduction']; ?>
</li>
</ul>
</div>

<div class="xx">
<ul>
<li>
    <a href="#">好友数 <?php echo $this->_tpl_vars['info']['frsum']; ?>
</a> <span class="pipe">| </span>
    <a href="#">日志数 <?php echo $this->_tpl_vars['info']['disum']; ?>
</a> <span class="pipe">| </span>
    <a href="#">照片数 <?php echo $this->_tpl_vars['info']['phsum']; ?>
</a> <span class="pipe"></span>
</ul>
</div>
</div>  

<div class="line">
<div class="xx2">
<ul>
<li><em>性别</em><?php if ($this->_tpl_vars['self']['sex'] == '0'): ?>女<?php else: ?>男<?php endif; ?></li>
<li><em>生日</em><?php echo $this->_tpl_vars['self']['birthdate']; ?>
</li>
<li><em>身高</em><?php echo $this->_tpl_vars['self']['height']; ?>
cm</li>
<li><em>体重</em><?php echo $this->_tpl_vars['self']['weight']; ?>
kg</li>
<li><em>血型</em><?php echo $this->_tpl_vars['self']['bloodtype']; ?>
</li>
<li><em>家乡</em><?php echo $this->_tpl_vars['self']['residence']; ?>
</li>
</ul>
</div>
</div>  

<div class="line">
<div class="name"><strong>活跃概况</strong></div>
<div class="rz">
<ul>
<li><em>在线时间</em><?php echo $this->_tpl_vars['self']['onlinetime']; ?>
 小时</li>
<li><em>注册时间</em><?php echo $this->_tpl_vars['self']['createtime']; ?>
</li>
<li><em>最后访问</em><?php echo $this->_tpl_vars['self']['lastlogintime']; ?>
</li>
<li><em>上次发表时间</em>2012-12-12 11:40</li>
<li><em>上次活动时间</em>2012-12-12 11:40</li>
<li><em>所在时区</em>(GMT +08:00) 北京</li>

</ul>
</div>
</div>






</div>





</td>
    
    
    
  </tr>
</table>
</div>


<div class="blank10"></div>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "barfooter.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>