<?php /* Smarty version 2.6.18, created on 2013-06-03 19:31:16
         compiled from wb_zone/wb_index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'wb_zone/wb_index.tpl', 246, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "wbheader.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php echo '
<style>
.wb_list
{
	height:auto !important;
	height:640px;
	min-height:640px;

}
.diary_box
{
	width:640px;
	margin:5px 0 15px 0;
	white-space:normal;
	word-break:break-all;
	word-wrap:break-word;
	overflow:hidden;
	text-overflow:ellipsis;
}
.diary_box img
{
	float:left;
	border:none;
	max-width:100%;
	width:e­xpression(document.body.clientWidth>640?"640px":"auto");
	text-overflow:ellipsis;
	overflow:hidden;
}
div.panel,p.flip
{
margin:0px;
padding:5px;
text-align:center;
background:#e5eecc;
border:solid 1px #c3c3c3;
}
div.panel
{
height:120px;
display:none;
}

</style>
'; ?>

    
    
 <!--中间-->
 <td valign="top" class="wb_bd_m clearfix" id="topMark">
    
<div>男，辽宁大连人</div>

<div class="wb_gz blue_s clearfix">
  <?php if ($this->_tpl_vars['isAtten'] == 1): ?>
  <p><a href="javascript:void(0)">已关注</a></p>
  <?php else: ?>  
  <p id="isAtten"><a href="javascript:void(0)" onclick="javascript:wbAddAtten('<?php echo $this->_tpl_vars['uid']; ?>
')"><img src="./templates/images/schoolbar/wb7.gif" /></a></p>
  <?php endif; ?>
  <?php if ($this->_tpl_vars['isFriend'] == 1): ?>
  <p><a href="javascript:void(0)">已添加好友</a></p>
  <?php else: ?>
  <p id="isFriend"><a href="javascript:void(0)" onclick="javscript:wbAddFriend('<?php echo $this->_tpl_vars['uid']; ?>
')">加为好友</a></p>
  <?php endif; ?>
  <p><a href="javascript:void(0)">拉入黑名单</a></p>
  <p><a href="javascript:void(0)" onclick="window.location='wb_index.php?module=perdoc'">查看资料</a></p>
</div>

<div class="wb_dh blue_s  clearfix">
<p><a href="javascript:void(0)">新动态</a></p>
</div>




<input type="hidden" id="wbid" value="<?php echo $this->_tpl_vars['uid']; ?>
">
<input type="hidden" id="panelid" value="">
<div class="wb_list clearfix">
<ul id="BackReply">



<?php $_from = $this->_tpl_vars['page']['info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
<li class="clearfix">
  <div class="pic"><img src="<?php echo $this->_tpl_vars['wbinfo']['photo']; ?>
" /></div>
  
  <div class="wb_list_mess clearfix">
    <div class="top">
      <p class="name blue_s"><a href="#"><?php echo $this->_tpl_vars['wbinfo']['name']; ?>
</a></p>
      <h3 class="title  blue_s">
      <?php if ($this->_tpl_vars['item']['type'] == 0): ?>
                <strong>发表日志</strong>&nbsp;&nbsp;<a href="javascript:void(0)" onclick=""><?php echo $this->_tpl_vars['item']['title']; ?>
</a>
      <?php else: ?>
                 <strong>转发日志</strong>&nbsp;&nbsp;<a href="javascript:void(0)" onclick=""><?php echo $this->_tpl_vars['item']['sectitle']; ?>
</a>
      <?php endif; ?>
      </h3>
    </div>
    
      <?php if ($this->_tpl_vars['item']['type'] == 0): ?>
      <div class="blank5"></div>
	      <div class="nr">
	         <div class="wb_list_zf clearfix">
	         <div class="b_top">
	          <span class="blue_s"></span>
	         </div>
	       	 
	        <div class="b_nr">
	        <?php echo $this->_tpl_vars['item']['content']; ?>

	        </div>
	        <div class="b_xx a999_line">
	        <span>
	        <a href="javascript:void(0)">评论(<?php echo $this->_tpl_vars['item']['resum']; ?>
)</a></span>
	        <span><a href="javascript:void(0)">转发(<?php echo $this->_tpl_vars['item']['transum']; ?>
)</a></span>
	        <span>
	        <a href="javascript:void(0)" onclick="window.location='wb_index.php?module=diaryShow&diary=<?php echo $this->_tpl_vars['item']['id']; ?>
'">查看原文>></a>
	        </span>
	        </div>
	     </div>
	     </div>
     	      
      <?php else: ?>
      	  <div class="blank5"></div>
	      <div class="nr">
	         <div class="wb_list_zf clearfix">
	         <div class="b_top">
	          <h3 class="b_title  blue_s"><a href="javascript:void(0)" onclick="window.location='zone.php?uid=<?php echo $this->_tpl_vars['item']['owner']; ?>
'"><?php echo $this->_tpl_vars['item']['name']; ?>
</a>&nbsp;<strong>:</strong>&nbsp;&nbsp;<a href="javascript:void(0)"><?php echo $this->_tpl_vars['item']['origintitle']; ?>
</a></h3>
	          <span class="blue_s"></span>
	        </div>
	       
	       <!-- 
	        <div class="b_nr"><img src="./templates/images/schoolbar/avatar5.jpg" /></div>
	       -->
	        <div class="diary_box"><?php echo $this->_tpl_vars['item']['seccontent']; ?>
</div>
	        <div class="b_xx a999_line">
	        <span><a href="javascript:void(0)">评论(<?php echo $this->_tpl_vars['item']['resum']; ?>
)</a></span>
	        <span><a href="javascript:void(0)">转发(<?php echo $this->_tpl_vars['item']['sectransum']; ?>
)</a></span>
	        <span>
	        <a href="javascript:void(0)" onclick="window.location='wb_index.php?module=diaryShow&diary=<?php echo $this->_tpl_vars['item']['idt_diary']; ?>
'">查看原文>></a>
	        </span>
	        </div>
	     </div>
	     </div>
      <?php endif; ?>
      <!--转发 模块-->
     
     <!--转发 模块 结束-->
   
   
   <div class="xx a999_line">
   <span class="n2"><a href="javascript:void(0)" onclick="window.location='wb_index.php?module=diaryShow&diary=<?php echo $this->_tpl_vars['item']['idt_diary']; ?>
'" >评论</a></span>
   <?php if ($this->_tpl_vars['item']['type'] == 0): ?>
   <span><a href="javascript:void(0)" onclick="javascript:AddCollect('#<?php echo $this->_tpl_vars['item']['id']; ?>
','<?php echo $this->_tpl_vars['item']['id']; ?>
','<?php echo $this->_tpl_vars['item']['title']; ?>
')">收藏</a></span>
   <span><a href="javascript:void(0)" onclick="javascript:tranSlide('#<?php echo $this->_tpl_vars['item']['id']; ?>
','<?php echo $this->_tpl_vars['item']['title']; ?>
')">转发</a></span>
   <?php else: ?>
   <span><a href="javascript:void(0)" onclick="javascript:AddCollect('#<?php echo $this->_tpl_vars['item']['id']; ?>
','<?php echo $this->_tpl_vars['item']['idt_diary']; ?>
','<?php echo $this->_tpl_vars['item']['origintitle']; ?>
')">收藏</a></span>
   <span><a href="javascript:void(0)" onclick="javascript:tranSlide('#<?php echo $this->_tpl_vars['item']['id']; ?>
','<?php echo $this->_tpl_vars['item']['origintitle']; ?>
')">转发</a></span>
   <?php endif; ?>
   
       发表时间<a href="javascript:void(0)"><?php echo $this->_tpl_vars['item']['time']; ?>
</a>&nbsp;&nbsp;
   <div>
   <a href="javascript:void(0)" onclick="javascript:transDiary('<?php echo $this->_tpl_vars['uid']; ?>
','<?php echo $this->_tpl_vars['item']['transid']; ?>
','<?php echo $this->_tpl_vars['item']['title']; ?>
',this)" id="<?php echo $this->_tpl_vars['item']['id']; ?>
_" style="display:none;"></a>
   <div class="panel" id="<?php echo $this->_tpl_vars['item']['id']; ?>
" >
   </div>
   </div>
   </div>
   
   
  </div>
</li>
<?php endforeach; endif; unset($_from); ?>


</ul>

<!-- 
<div class="album_page" id="pageFooter">
<?php if ($this->_tpl_vars['page']['base']['pageCounts'] == '1'): ?>
<a href="javascript:void(0)" class="pageFooterStyle">1</a>
<?php else: ?>
    <?php if ($this->_tpl_vars['page']['base']['page'] == '1'): ?>
    <a href="javascript:void(0)" class="pageFooterStyle">上一页</a>
    <?php else: ?>
    <a  href="javascript:void(0)" onclick="javascript:wbGetDiarySplit('<?php echo $this->_tpl_vars['page']['base']['page']-1; ?>
')">上一页</a>
    <?php endif; ?>
    
    <?php unset($this->_sections['loop']);
$this->_sections['loop']['name'] = 'loop';
$this->_sections['loop']['loop'] = is_array($_loop=$this->_tpl_vars['page']['base']['pageCounts']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['loop']['show'] = true;
$this->_sections['loop']['max'] = $this->_sections['loop']['loop'];
$this->_sections['loop']['step'] = 1;
$this->_sections['loop']['start'] = $this->_sections['loop']['step'] > 0 ? 0 : $this->_sections['loop']['loop']-1;
if ($this->_sections['loop']['show']) {
    $this->_sections['loop']['total'] = $this->_sections['loop']['loop'];
    if ($this->_sections['loop']['total'] == 0)
        $this->_sections['loop']['show'] = false;
} else
    $this->_sections['loop']['total'] = 0;
if ($this->_sections['loop']['show']):

            for ($this->_sections['loop']['index'] = $this->_sections['loop']['start'], $this->_sections['loop']['iteration'] = 1;
                 $this->_sections['loop']['iteration'] <= $this->_sections['loop']['total'];
                 $this->_sections['loop']['index'] += $this->_sections['loop']['step'], $this->_sections['loop']['iteration']++):
$this->_sections['loop']['rownum'] = $this->_sections['loop']['iteration'];
$this->_sections['loop']['index_prev'] = $this->_sections['loop']['index'] - $this->_sections['loop']['step'];
$this->_sections['loop']['index_next'] = $this->_sections['loop']['index'] + $this->_sections['loop']['step'];
$this->_sections['loop']['first']      = ($this->_sections['loop']['iteration'] == 1);
$this->_sections['loop']['last']       = ($this->_sections['loop']['iteration'] == $this->_sections['loop']['total']);
?>
    	<?php if ($this->_tpl_vars['page']['base']['page'] == $this->_sections['loop']['index']+1): ?>
    	&nbsp;<a href="javascript:void(0)" class="pageFooterStyle"><?php echo $this->_sections['loop']['index']+1; ?>
</a>
    	<?php else: ?>
    	&nbsp;<a href="javascript:void(0)" onclick="javascript:wbGetDiarySplit('<?php echo $this->_sections['loop']['index']+1; ?>
')"><?php echo $this->_sections['loop']['index']+1; ?>
</a>
    	<?php endif; ?>
    <?php endfor; endif; ?>
    
	<?php if ($this->_tpl_vars['page']['base']['page'] == $this->_tpl_vars['reply']['base']['pageCounts']): ?>
	&nbsp;<a href="javascript:void(0)" class="pageFooterStyle">下一页</a>
	<?php else: ?>
	&nbsp;<a  href="javascript:void(0)" onclick="javascript:wbGetDiarySplit('<?php echo $this->_tpl_vars['page']['base']['page']+1; ?>
')">下一页</a>
	<?php endif; ?>
<?php endif; ?>
</div>
 -->

<!--/下部评论-->


</div>



<!--页码 -->
<div class="blank"></div>

</td>

     <!--右侧-->
    <td valign="top" class="wb_bd_r  clearfix" >
    
    
    <!--右侧 个人关注信息-->
    <div class="wb_info clearfix">
    <div class="a  blue_s">
   <table width="80%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><p><a href="javascript:void(0)" onclick="window.location='wb_index.php?module=friends'"><?php echo $this->_tpl_vars['info']['frsum']; ?>
</a></p> <a href="javascript:void(0)" onclick="window.location='wb_index.php?module=friends'">好友</a></td>
    <th><p><a href="javascript:void(0)" onclick="window.location='wb_index.php?module=attention'"><?php echo $this->_tpl_vars['info']['atsum']; ?>
</a></p><a href="javascript:void(0)" onclick="window.location='wb_index.php?module=attention'">关注</a></th>
    <th><p><a href="javascript:void(0)" onclick="window.location='wb_index.php?module=fans'"><?php echo $this->_tpl_vars['info']['ansum']; ?>
</a></p><a href="javascript:void(0)" onclick="window.location='wb_index.php?module=fans'">粉丝</a></th>
  </tr>
  </table>
  </div>
  </div>
  
  
  
<!--右侧 个人在线时间-->
<div class="wb_time clearfix">
社区积分：101996<br />
上次登录：<?php echo $this->_tpl_vars['wbinfo']['lastlogintime']; ?>
<br />
登录次数：<?php echo $this->_tpl_vars['wbinfo']['logintimes']; ?>
<br />
注册日期：<?php echo $this->_tpl_vars['wbinfo']['createtime']; ?>

</div>


<!--右侧 关注他的人-->
<div class="wb_peos clearfix">
<p class="fk">TA关注的人</p>
<ul>
<?php if (count($this->_tpl_vars['atten']['info']) != 0): ?>
<?php $_from = $this->_tpl_vars['atten']['info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
	<?php if ($this->_tpl_vars['key'] < 6): ?>
	<li><a href="javascript:void(0)" onclick="window.location='wb_index.php?uid=<?php echo $this->_tpl_vars['item']['frid']; ?>
'"><img src="<?php echo $this->_tpl_vars['item']['photo']; ?>
"/></a>
	<p class="blue_s"><a href="javascript:void(0)" onclick="window.location='wb_index.php?uid=<?php echo $this->_tpl_vars['item']['frid']; ?>
'"><?php echo $this->_tpl_vars['item']['name']; ?>
</a></p>
	<span></span>
	</li>
	<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>
<?php else: ?>
<li>
<a>您尚未关注任何好友哦，亲</a>
</li>
<?php endif; ?>
</ul>
</div>


<!--右侧 服务专区-->
<div class="wb_sever clearfix blue_s">
<p class="fwzq">服务专区</p>
<ul>
<li><a href="#">天涯客服</a></li>
<li><a href="#">新手上路</a></li>
<li><a href="#">用户投诉</a></li>
<li><a href="#">建议申请</a></li>
<li><a href="#">议事广场</a></li>
<li><a href="#">不实信息曝光</li>
</ul>
</div>

    
    </td>
  </tr>
</table>
</div>


<div class="blank10"></div>
<input type="hidden" id="jokelist"/>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "barfooter.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>