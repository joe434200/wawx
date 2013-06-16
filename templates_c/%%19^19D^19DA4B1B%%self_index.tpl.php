<?php /* Smarty version 2.6.18, created on 2013-06-03 18:48:51
         compiled from self_zone/self_index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'self_zone/self_index.tpl', 61, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "spaceheader.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php echo '
<style>
.visname
{
	width:100px;
    text-align:left;	
    overflow:hidden;
    text-overflow:ellipsis;
    white-space:nowrap;
}
.diary_box
{
	
}
.diary_box img
{
	border:0;
	margin:0;
	padding:0;
	height:450px;
	width:480px;
}
</style>
<link rel="stylesheet" href="./plugin/editor/themes/default/default.css" />
<script charset="utf-8" src="./plugin/editor/kindeditor-min.js"></script>
<script charset="utf-8" src="./plugin/editor/lang/zh_CN.js"></script>
<script>
var editor;
KindEditor.ready(function(K) {
	editor = K.create(\'textarea[name="emoticons"]\', {
		allowFileManager : true,
		syncType : "form",
		items : [\'emoticons\'],
		width : "100%",
		height : "120px",
		syncType : "form",
		resizeType : 0 
	});
});
</script>
'; ?>



<input type="hidden" id="diaid" value="<?php echo $this->_tpl_vars['uid']; ?>
">
<input type="hidden" id="type" value="3">

<div class="blank10"></div>

<!--主体开始-->
<div class="blank10"></div>
<div class="block  ">

<div class="AreaL240">

<!--头像-->

<div class="box_lt clearfix">
  <div class="title_bt"><a href="javascript:void(0)" onclick="window.location='userCenter.php?module=avatar'">头像</a></div>
  <div class="space_avatar ">
  <?php if (count($this->_tpl_vars['self']['photo']) != 0): ?>
  <p class="pic"><img src="<?php echo $this->_tpl_vars['self']['photo']; ?>
" style="height:150px;width:150px;"/></p>
  <p class="name"><a href="#"><?php if ($this->_tpl_vars['self']['nickname'] == ""): ?><?php echo $this->_tpl_vars['self']['email']; ?>
<?php else: ?><?php echo $this->_tpl_vars['self']['nickname']; ?>
<?php endif; ?></a></p>
  <?php else: ?>
  <p><a>我的头像还是空哦</a></p>
  <p><a href="javascript:void(0)" onclick="window.location='userCenter.php?module=avatar'">现在就去上传我的个人头像</a></p>
  <?php endif; ?>
  </div>
  
<div class="space_info  clearfix ">
<ul>
<li class="a1">日志: <a href="javascript:void(0)"><?php echo $this->_tpl_vars['info']['disum']; ?>
</a></li>
<li class="a2">照片: <a href="javascript:void(0)"><?php echo $this->_tpl_vars['info']['phsum']; ?>
</a></li>
<li class="a3">好友: <a href="javascript:void(0)"><?php echo $this->_tpl_vars['info']['frsum']; ?>
</a></li>
</ul>
</div>
</div>





<!--相册-->
<div class="blank10"></div>
<div class="box_lt clearfix">
  <div class="title_bt"><a href="javascript:void(0)" onclick="window.location='self_zone.php?module=album'">相册</a></div>
  
<div class="space_pics  clearfix ">
<ul>
<?php $_from = $this->_tpl_vars['albums']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
<li>
<h3><a href="javascript:void(0)" onclick="javascipt:window.location='self_photo.php?module=album&alb=<?php echo $this->_tpl_vars['item']['ID']; ?>
'"><img src="./templates/images/schoolbar/wb_pic1.gif" /></a></h3>
<p class="visname"><a href="javascript:void(0)" onclick="javascipt:window.location='self_photo.php?module=album&alb=<?php echo $this->_tpl_vars['item']['ID']; ?>
'"><?php echo $this->_tpl_vars['item']['albumname']; ?>
</a></p>
</li>
<?php endforeach; endif; unset($_from); ?>
</ul>
</div>
</div>

</div><!--左侧结束-->


<div class="AreaM500">

<!--个人资料-->

<div class="box_lt clearfix">
<div class="title_bt "><a href="javascript:void(0)" onclick="window.location='self_zone.php?module=perdoc'">个人资料</a></div>
  
<div class="space_personal clearfix ">
<ul>
<li><span>真实姓名</span><?php if ($this->_tpl_vars['self']['nickname'] == ""): ?>尚未填写<?php else: ?><?php echo $this->_tpl_vars['self']['nickname']; ?>
<?php endif; ?></li>
<li><span>性别</span><?php if ($this->_tpl_vars['self']['sex'] == ""): ?>尚未填写<?php else: ?><?php if ($this->_tpl_vars['self']['sex'] == '0'): ?>女<?php else: ?>男<?php endif; ?><?php endif; ?></li>
<li><span>生日</span><?php if ($this->_tpl_vars['self']['birthdate'] == ""): ?>尚未填写<?php else: ?><?php echo $this->_tpl_vars['self']['birthdate']; ?>
<?php endif; ?></li>
<li><span>居住地</span><?php if ($this->_tpl_vars['self']['residence'] == ""): ?>尚未填写<?php else: ?><?php echo $this->_tpl_vars['self']['residence']; ?>
<?php endif; ?></li>
<li><span>个人主页</span><a href="javascript:void(0)"><?php if ($this->_tpl_vars['self']['personalwebsite'] == ""): ?>尚未填写<?php else: ?><?php echo $this->_tpl_vars['self']['personalwebsite']; ?>
<?php endif; ?></a></li>
</ul>
<p class="show"><a href="self_zone.php?module=perdoc">查看全部个人资料</a></p>
</div>
</div>



<!--日志-->
<div class="blank10"></div>
<div class="box_lt clearfix">
  <div class="title_bt "><a href="javascript:void(0)" onclick="window.location='self_zone.php?module=daily'">日志</a></div>
  
<div class="space_daily clearfix">
<ul>
<?php if (count($this->_tpl_vars['diarys']) != ""): ?>
<?php $_from = $this->_tpl_vars['diarys']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
<li class="diary_box">
<h3 class=""><a href="javascript:void(0)" onclick="javascript:window.location='self_diary.php?module=show&diaid=<?php echo $this->_tpl_vars['item']['id']; ?>
'"><?php echo $this->_tpl_vars['item']['title']; ?>
</a><span><?php echo $this->_tpl_vars['item']['createtime']; ?>
</span></h3>
<p class="jj"><?php echo $this->_tpl_vars['item']['content']; ?>
</p>
<p class="cs"><a href="javascript:void(0)" onclick="javascript:window.location='self_diary.php?module=show&diaid=<?php echo $this->_tpl_vars['item']['id']; ?>
'">(<?php echo $this->_tpl_vars['item']['brsum']; ?>
)次阅读 </a> |  <a href="javascript:void(0)" onclick="javascript:window.location='self_diary.php?module=show&diaid=<?php echo $this->_tpl_vars['item']['id']; ?>
'">(<?php echo $this->_tpl_vars['item']['resum']; ?>
)个评论</a></p>
</li>
<?php endforeach; endif; unset($_from); ?>
<?php else: ?>
<li align="center"><a href="javascript:void(0)">暂无空间日志哦，亲</a></li>
<li align="center"><a href="javascript:void(0)" onclick="window.location='self_diary.php?module=new'">马上去写属于我自己的第一篇日志</a></li>
<?php endif; ?>

</ul>
<p class="show "><a href="self_zone.php?module=daily">查看更多</a></p>
</div>
</div>



<!--留言板-->
<div class="blank10"></div>
<div class="box_lt clearfix">
<div class="title_bt "><a href="javascript:void(0)" onclick="javascript:window.location='self_zone.php?module=reply'">留言板</a></div>
  
<div class="space_board clearfix">

<div class="lyk">
<form action="" method="get">
<input type="hidden" id="diaid" value="<?php echo $this->_tpl_vars['uid']; ?>
">
<input type="hidden" id="type" value="3">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td>
<div class="txt" style="height:auto;"><textarea name="emoticons" cols="" rows="" id="Reply"></textarea></div>
</td>
</tr>
<tr>
<td align="right">
<div class="ann"><input type="button" value="留言"  class="anniu25" onclick="javascript:addReply()"/></div>
</td>
</tr>
</table>
</form>
</div>

<div class="ly">
<ul id="BackReply">

<?php $_from = $this->_tpl_vars['reply']['reply']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
<li>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top" class="pic"><p><img src="./templates/images/schoolbar/avatar2.jpg" /></p></td>
    <td valign="top" class="nr">
    <p class="name"><a href="javascript:void(0)"><?php echo $this->_tpl_vars['item']['name']; ?>
</a> <span><?php echo $this->_tpl_vars['item']['createtime']; ?>
</span></p>
    <p class="pl"><?php echo $this->_tpl_vars['item']['content']; ?>
</p>
    </td>
	<td valign="bottom" class="edit a999"><a href="javascript:void(0)" onclick="javascript:addSecReply('<?php echo $this->_tpl_vars['item']['name']; ?>
','<?php echo $this->_tpl_vars['item']['id']; ?>
');">回复</a>&nbsp;&nbsp;<a href="javascript:void(0)" onclick="javascript:getDelReply('<?php echo $this->_tpl_vars['item']['id']; ?>
')">删除</a></td>
  </tr>
  <?php if ($this->_tpl_vars['item']['sec'] != ""): ?>
  <?php $_from = $this->_tpl_vars['item']['sec']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['sec']):
?>
  <tr>
    <td valign="top" class="pic">&nbsp;</td>
    <td valign="top" class="nr reply" colspan="2">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
         <tr>
         <td valign="top" class="pic"><p><img src="./templates/images/schoolbar/avatar2.jpg" /></p></td>
         <td valign="top" class="nr">
         <p class="name"><a href="javascript:void(0)"><?php echo $this->_tpl_vars['sec']['name']; ?>
</a> <span><?php echo $this->_tpl_vars['sec']['createtime']; ?>
</span></p>
         <p class="pl"><?php echo $this->_tpl_vars['sec']['content']; ?>
</p>
         </td>
         </tr>
		 <tr>
		 <td valign="top" class="pic">&nbsp;</td>
		 <td class="a999"><a href="javascript:void(0)" onclick="javascript:addSecReply('<?php echo $this->_tpl_vars['sec']['name']; ?>
','<?php echo $this->_tpl_vars['item']['id']; ?>
');">回复</a>&nbsp;&nbsp;<a href="javascript:void(0)" onclick="javascript:getDelReply('<?php echo $this->_tpl_vars['sec']['id']; ?>
')">删除</a></td>
		 </tr>
	     </table>
    </td>
  </tr>
  <?php endforeach; endif; unset($_from); ?>
  <?php endif; ?>
</table>
</li>
<?php endforeach; endif; unset($_from); ?>
 
</ul>

<p class="show "><a href="self_zone.php?module=reply">查看全部</a></p>
</div>

</div>
</div>

</div><!--中间结束-->


<div class="AreaRR">

<!--好友-->

<div class="box_lt clearfix">
  <div class="title_bt"><span><a href="javascript:void(0)" onclick="window.location='self_zone.php?module=friends'">查看</a> </span> <a href="javascript:void(0)" onclick="window.location='self_zone.php?module=friends'">好友</a></div>
  
  <div class="space_friend clearfix">
<ul>
<?php if (count($this->_tpl_vars['visitors']) != ""): ?>
<?php $_from = $this->_tpl_vars['friends']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
<li>
<h3><img src="<?php echo $this->_tpl_vars['item']['photo']; ?>
" /></h3>
<p class="visname"><a href="#"><?php if ($this->_tpl_vars['item']['nickname'] == ""): ?><?php echo $this->_tpl_vars['item']['email']; ?>
<?php else: ?><?php echo $this->_tpl_vars['item']['nickname']; ?>
<?php endif; ?></a></p>
</li>
<?php endforeach; endif; unset($_from); ?>
<?php else: ?>
<li>暂无好友哦，亲</li>
<?php endif; ?>

</ul>
</div>
</div>


<!--最近访客-->
<div class="blank10"></div>
<div class="box_lt clearfix">
<div class="title_bt"><a href="javascript:void(0)">最近访客</a></div>
<div class="space_friend clearfix">
<ul>
<?php if (count($this->_tpl_vars['visitors']) != ""): ?>
<?php $_from = $this->_tpl_vars['visitors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
<li>
<h3><img src="<?php echo $this->_tpl_vars['item']['photo']; ?>
" /></h3>
<p class="visname"><a href="#"><?php if ($this->_tpl_vars['item']['nickname'] == ""): ?><?php echo $this->_tpl_vars['item']['email']; ?>
<?php else: ?><?php echo $this->_tpl_vars['item']['nickname']; ?>
<?php endif; ?></a></p>
</li>
<?php endforeach; endif; unset($_from); ?>
<?php else: ?>
<li align="">暂无访客哦，亲</li>
<?php endif; ?>
</ul>
</div>
</div>

</div><!--右侧结束-->




</div>

   <div class="blank10"></div>
 
  
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "barfooter.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>