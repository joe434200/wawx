<?php /* Smarty version 2.6.18, created on 2013-06-16 16:43:31
         compiled from group/grp_home.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "barheader.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php echo '
<style>

.home_top_l{ width:780px; height:290px; float:left; background:#ccc;}
.home_top_l li img{width:780px; height:290px;}

.q_adv{ height:300px; background:#ccc;}
.travel_focus{width:980px;height:290px;overflow:hidden;position:relative;}
.travel_focus ul{height:980px; position:absolute;}
.travel_focus ul li{width:980px;height:290px;overflow:hidden; position:relative; background:#000;}

.travel_focus ul li div{position:absolute; overflow:hidden;}
.travel_focus .btn {position:absolute;height:22px;left:392px;bottom:10px;z-index:200;}
.travel_focus .btn span {display:inline-block; _display:inline; _zoom:1;text-align:center;color:#fff;width:22px;height:22px;line-height:20px;_font-size:0; margin-left:10px; cursor:pointer; background:#333;}
.travel_focus .btn span.on {background:#FF6600;}
.travel_focus .preNext{width:45px;height:50px;position:absolute;top:80px;background:url(./plugin/multiimage/images/destin_main.png) no-repeat -4px -52px; cursor:pointer;}
.travel_focus .pre {left:0;}
.travel_focus .next {right:0; background-position:-50px 0;}
/*======== travel_banner end =======*/


.travel_listimg,.travel_listimg ul,.travel_listimg ul li{width:738px;}

.travel_listimg .btn span{-webkit-border-radius:12px;-moz-border-radius:12px;border-radius:12px;margin-left:5px;}
.travel_listimg .travel_btn{width:700px;height:32px;position:relative;left:0;top:258px;}
.travel_listimg .travel_btn_bg{position:absolute;left:0;bottom:0;width:700px;height:32px;background:#333;opacity:0.66;filter:alpha(opacity = 66);z-index:1;}
.travel_listimg .btn{left:510px;bottom:5px;}
.travel_listimg .travel_btn_text{color:#fff;position:absolute;left:10px;bottom:0;height:32px;overflow:hidden;white-space:nowrap;text-overflow:ellipsis;line-height:32px;z-index:100;font-size:14px;}
.travel_listimg .travel_btn_text p{height:32px;overflow:hidden;position:relative;}
</style>
 <link href="./plugin/adimage/travel.css" rel="stylesheet" type="text/css" />

'; ?>

<!------------------------------------------body-->

<div class="backbj clearfix">
   <script src="./templates/scripts/group.js" type="text/javascript"></script>
   <script src="./templates/scripts/prototype.js" type="text/javascript"></script>
  
<script type="text/javascript" src="./plugin/adimage/js/jquery-1.7.2.min.js"></script>
<script src="./plugin/adimage/js/travel_list.js" type="text/javascript"></script>
   <div class="blank10"></div>
   
   <input id="listtype" value="" style="display:none"></input>
   
   
   
   <div class="box">
   <div class="AreaL">
       <!-- 
       <div class="q_adv"><img src="./templates/images/schoolbar/home_adv2.jpg" /></div>
        -->
        <!-- 广告 -->
	      <div class="travel_banner travel_focus travel_listimg home_top_l" id="travel_focus">
			  <ul>
			  	<?php $_from = $this->_tpl_vars['ad']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
			    <li><a href="<?php echo $this->_tpl_vars['item']['linkid']; ?>
" target="_blank"><img src="./uploadfiles/adver/<?php echo $this->_tpl_vars['item']['realname']; ?>
"  /></a></li>
			    <?php endforeach; endif; unset($_from); ?>
			  </ul>
		 
		 		<div class="travel_btn">
			    <div class="travel_btn_bg"></div>
			    <div class="btn"> 
			    <?php $_from = $this->_tpl_vars['ad']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
			    <span class=""><?php echo $this->_tpl_vars['key']+1; ?>
</span>
			    <?php endforeach; endif; unset($_from); ?>
			    </div>
			    <div class="thRelative" style="width:700px;height:32px;overflow:hidden;">
			        <div class="travel_btn_text">
			        <?php $_from = $this->_tpl_vars['ad']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
			        <p><?php echo $this->_tpl_vars['item']['advertdesc']; ?>
</p>
			        <?php endforeach; endif; unset($_from); ?>
			        </div>
			     </div>
			  </div>
		</div>
		
		<!-- 广告 -->
	   <div class="blank10"></div>
       
	   
	   <!--你可能会喜欢的圈子-->
	   <div class="case clearfix">
	   <div class="q_bt"><span class="a0693e3"><a href="#someid" onclick="changeGroup('like');">换一组</a></span>你可能喜欢的圈子</div>
	   <input id="like" name="like" value="<?php echo $this->_tpl_vars['start1']; ?>
" style="display:none"></input>
	   <input id="insnum" name="insnum" value="<?php echo $this->_tpl_vars['insnum']; ?>
" style="display:none"></input>
	   <ul class="part clearfix" id="likelist" name="likelist">
	   <?php $_from = $this->_tpl_vars['homeGrp']['like']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
	     <li style='display:block'>
	      <img src="./uploadfiles/group/groupImage/<?php echo $this->_tpl_vars['item']['photo']; ?>
"/>
		  <p class="a0693e3"><a href="grp_single_home.php?ID=<?php echo $this->_tpl_vars['item']['ID']; ?>
" ><?php echo $this->_tpl_vars['item']['groupname']; ?>
</a></p>
		  <dd>话题：<?php echo $this->_tpl_vars['item']['topicnum']; ?>

		  <br><?php echo $this->_tpl_vars['item']['membernum']; ?>
人加入
		  </dd>
	     </li>
	     <?php endforeach; endif; unset($_from); ?>
		 
	   </ul>
	  
	   
	   <ul class="part2 clearfix a666">
	   <?php $_from = $this->_tpl_vars['homeGrp']['topic']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
	    <li><span class="cl_e09c28"><?php echo $this->_tpl_vars['item']['nickname']; ?>
</span><em class="a0693e3">【<?php echo $this->_tpl_vars['item']['groupname']; ?>
】</em><a href="grp_topic.php?module=scan&ID=<?php echo $this->_tpl_vars['item']['idt_grp_main']; ?>
&topicID=<?php echo $this->_tpl_vars['item']['ID']; ?>
"><?php echo $this->_tpl_vars['item']['title']; ?>
</a></li>
	    <?php endforeach; endif; unset($_from); ?>
	   </ul>
	   </div>
	   
	   <div class="blank10"></div>
	   <div class="case clearfix">
	   
	    <!--圈子达人-->
	     <div class="part_left clearfix">
		    <div class="q_bt"><span class="a0693e3"><a href="#someid" onclick="changeGroup('super');">换一组</a></span>圈子达人</div>
			<input id="super" name="super" value="<?php echo $this->_tpl_vars['start2']; ?>
" style="display:none"></input>
			<input id="supernum" name="supernum" value="<?php echo $this->_tpl_vars['supernum']; ?>
" style="display:none"></input>
		<ul class="part3 clearfix a666" id="superlist">
		<?php $_from = $this->_tpl_vars['homeGrp']['super']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
		 <li>
	      <img src="./uploadfiles/user/<?php echo $this->_tpl_vars['item']['photo']; ?>
" />
		  <p class="aff6600"><a href="zone.php?uid=<?php echo $this->_tpl_vars['item']['ID']; ?>
"><?php echo $this->_tpl_vars['item']['nickname']; ?>
</a></p>
		  
		  <dd class="clearfix"><em><?php echo $this->_tpl_vars['item']['topic']['0']['replynum']; ?>
个回应</em><span class="a0693e3">【讨论】</span><a href="grp_topic.php?module=scan&ID=<?php echo $this->_tpl_vars['item']['topic']['0']['idt_grp_main']; ?>
&topicID=<?php echo $this->_tpl_vars['item']['topic']['0']['gID']; ?>
"><?php echo $this->_tpl_vars['item']['topic']['0']['title']; ?>
</a>  </dd>
		  <dd class="clearfix"><em><?php echo $this->_tpl_vars['item']['topic']['1']['replynum']; ?>
个回应</em><span class="a0693e3">【讨论】</span><a href="grp_topic.php?module=scan&ID=<?php echo $this->_tpl_vars['item']['topic']['1']['idt_grp_main']; ?>
&topicID=<?php echo $this->_tpl_vars['item']['topic']['1']['gID']; ?>
"><?php echo $this->_tpl_vars['item']['topic']['1']['title']; ?>
</a> </dd>
		  <dd class="clearfix"><em><?php echo $this->_tpl_vars['item']['topic']['2']['replynum']; ?>
个回应</em><span class="a0693e3">【讨论】</span><a href="grp_topic.php?module=scan&ID=<?php echo $this->_tpl_vars['item']['topic']['2']['idt_grp_main']; ?>
&topicID=<?php echo $this->_tpl_vars['item']['topic']['2']['gID']; ?>
"><?php echo $this->_tpl_vars['item']['topic']['2']['title']; ?>
</a>  </dd>
	     </li>
	     <?php endforeach; endif; unset($_from); ?>
	   </ul>
		 </div>
	   <!--/圈子达人-->
	   
	   
	    <!--优秀圈主-->
	     <div class="part_right clearfix">
		    <div class="q_bt"><span class="a0693e3"><a href="#someid" onclick="changeGroup('excelring');">换一组</a></span>优秀圈主</div>
			<input id="excelring" name="excelring" value="<?php echo $this->_tpl_vars['start3']; ?>
" style="display:none"></input>
		    <input id="exnum" name="exnum" value="<?php echo $this->_tpl_vars['exnum']; ?>
" style="display:none"></input>
		<ul class="part3 clearfix a666" id="excelringlist">
		<?php $_from = $this->_tpl_vars['homeGrp']['excelring']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
	     <li>
	      <img src="./uploadfiles/user/<?php echo $this->_tpl_vars['item']['photo']; ?>
" />
		   <a href="self_zone.php?uid=<?php echo $this->_tpl_vars['item']['ID']; ?>
">
		   <font color="#ff6600" size="2px"><?php echo $this->_tpl_vars['item']['nickname']; ?>

		 </font></a>
		 <br>他的热门圈：<a href="grp_single_home.php?ID=<?php echo $this->_tpl_vars['item']['gID']; ?>
"><?php echo $this->_tpl_vars['item']['groupname']; ?>
</a>
		 <br>成员：<?php echo $this->_tpl_vars['item']['membernum']; ?>

		 <br><a href="grp_single_home.php?ID=<?php echo $this->_tpl_vars['item']['gID']; ?>
">去看看>></a>
	     </li>
	     <?php endforeach; endif; unset($_from); ?>
		 
	   </ul>
		 </div>
	   <!--/优秀圈主-->
      </div>
		
		
		<div class="blank10"></div>
	   
	   <!--你可能敢兴趣的圈子活动-->
	   <div class="case clearfix">
	   <div class="q_bt"><span class="a0693e3"><a href="hd.php">更多活动</a></span>你可能敢兴趣的圈子活动</div>
	   <ul class="part clearfix">
		 
		 <?php $_from = $this->_tpl_vars['homeGrp']['actIns']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
		 <li>
	       <a href="#"><img src="./uploadfiles/activity/hdImage/<?php echo $this->_tpl_vars['item']['photo']; ?>
" border="0" /></a>
		  <p class="aff6600"><a href="grp_act.php?module=single&ID=<?php echo $this->_tpl_vars['item']['idt_grp_main']; ?>
&actID=<?php echo $this->_tpl_vars['item']['ID']; ?>
"><?php echo $this->_tpl_vars['item']['actname']; ?>
</a></p>
		  <dd>开始时间：<?php echo $this->_tpl_vars['item']['begintime']; ?>
</dd>
		  <dd>结束时间：<?php echo $this->_tpl_vars['item']['endtime']; ?>
</dd>
		  <dd class="cl_999">参与人数：<?php echo $this->_tpl_vars['item']['membernum']; ?>
人</dd>
	     </li>
	     <?php endforeach; endif; unset($_from); ?>

	   </ul>
	   </div>
	   <!--/你可能敢兴趣的圈子活动-->
   </div>
   
   
   
   
   <div class="AreaR">
       <div class="case clearfix">
	     <div class="q_new clearfix">
		 
		   <div class="q_new_a clearfix">
		   <ul>
	   <li><a href="grp_home.php?module=interest" target="_blank">兴趣圈</a></li>
	   <li><a href="grp_home.php?module=school" target="_blank">学校圈</a></li>
	   <li><a href="grp_home.php?module=club" target="_blank">社团圈</a></li>
	   <li><a <?php if ($_SESSION['loginok'] == 1): ?>href="grp_home.php?module=my_grp"<?php else: ?>href="#" onclick="LoginOut();"<?php endif; ?>>我的圈子</a></li>
	   </ul>
		   </div>
		  
		   <p class="q_new_b afff"><a <?php if ($_SESSION['loginok'] == 1): ?>href="grp_home.php?module=create"<?php else: ?>href="#" onclick="LoginOut();"<?php endif; ?>>创建圈子</a></p>
		   <p class="q_new_c afff">去自己的 <span class="a0693e3"><a <?php if ($_SESSION['loginok'] == 1): ?>href="grp_home.php?module=myschoolgrp"<?php else: ?>href="#" onclick="LoginOut();"<?php endif; ?>>学校圈子看看>></a></span></p>
		 </div>  
	   </div>
	   
	   <div class="blank10"></div>
	   
	   <!--搜索圈子-->
	   <div class="case clearfix">
	      <div class="q_bt">搜索圈子</div>
		  <div class="q_search  clearfix">
		  <form action="" method="get">
		    <div class="q_search_txt"><input type="text" value="输入关键字、标签查找"   id="keyword" name="keyword" class="search_txt" onclick=""/></div>
			<div class="q_search_ann"><input name="search"  id="search" type="button"  value="     "  class="search_ann" onclick="searchKey();"/></div>
		  </form>
		  </div>
	   </div>
	   <!--/搜索圈子-->
	   
	   
	   <div class="blank10"></div>
	   
	   <!--热门标签-->
	   <div class="case clearfix">
	      <div class="q_bt">热门标签</div>
		  <ul class="hot_tag a0693e3">
		  <?php $_from = $this->_tpl_vars['homeGrp']['label']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
		  <li><a href="grp_home.php?module=label&labelID=<?php echo $this->_tpl_vars['item']['ID']; ?>
&label=<?php echo $this->_tpl_vars['item']['label']; ?>
&labelnum=<?php echo $this->_tpl_vars['item']['groupnum']; ?>
"><?php echo $this->_tpl_vars['item']['label']; ?>
</a><span>(<?php echo $this->_tpl_vars['item']['groupnum']; ?>
)</span></li>
		  <?php endforeach; endif; unset($_from); ?>
		  </ul>
	   </div>
	   <!--/热门标签-->
	   
	   
	   <div class="blank10"></div>
	   <!--最新话题-->
	   <div class="case clearfix">
	      <div class="q_bt_r">最新话题</div>
	      
		  <ul class="new_topic a666_b">
		  <?php $_from = $this->_tpl_vars['homeGrp']['newTopic']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
		  <li>
		     <h3><a href="grp_topic.php?module=scan&topicID=<?php echo $this->_tpl_vars['item']['ID']; ?>
&ID=<?php echo $this->_tpl_vars['item']['idt_grp_main']; ?>
"><?php echo $this->_tpl_vars['item']['title']; ?>
</a></h3>
			 <p class="a0693e3"><a href="zone.php?uid=<?php echo $this->_tpl_vars['item']['uID']; ?>
"><?php echo $this->_tpl_vars['item']['nickname']; ?>
</a></p>
		  </li>
		  <?php endforeach; endif; unset($_from); ?>
		  </ul>
	   </div>
	   <!--/最新话题-->
   </div>  
   </div>
   </div>

<?php echo '
<script>
function aaa()
{
	document.getElementById("keyword").value="";
}

</script>
'; ?>

<!------------------------------------------body over-->
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "barfooter.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>