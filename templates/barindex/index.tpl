{include file=barheader.tpl}
{literal}
<style>
.home_top_l{ width:780px; height:300px; float:left; background:#ccc;}
.home_top_l li img{width:780px; height:300px;}

.travel_focus{width:980px;height:280px;overflow:hidden;position:relative;}
.travel_focus ul{height:980px; position:absolute;}
.travel_focus ul li{width:980px;height:280px;overflow:hidden; position:relative; background:#000;}

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
.travel_listimg .travel_btn{width:700px;height:32px;position:relative;left:0;top:248px;}
.travel_listimg .travel_btn_bg{position:absolute;left:0;bottom:0;width:700px;height:32px;background:#333;opacity:0.66;filter:alpha(opacity = 66);z-index:1;}
.travel_listimg .btn{left:510px;bottom:5px;}
.travel_listimg .travel_btn_text{color:#fff;position:absolute;left:10px;bottom:0;height:32px;overflow:hidden;white-space:nowrap;text-overflow:ellipsis;line-height:32px;z-index:100;font-size:14px;}
.travel_listimg .travel_btn_text p{height:32px;overflow:hidden;position:relative;}



</style>
{/literal}

 <script src="./templates/scripts/group.js" type="text/javascript"></script>
   <script src="./templates/scripts/hd.js" type="text/javascript"></script>
   <script src="./templates/scripts/prototype.js" type="text/javascript"></script>
   
   
   <link href="./plugin/adimage/travel.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="./plugin/adimage/js/jquery-1.7.2.min.js"></script>
	<script src="./plugin/adimage/js/travel_list.js" type="text/javascript"></script>
  
  
  
   <div class="blank10"></div>
   <div class="box roll">
  
 
   <div id="marquee0" style="overflow:hidden;width:990px; height:14px; float:left; padding:3px 0; background: #ccc;">
   <DIV style="OVERFLOW: hidden; WIDTH: 10000px">
   <div id="marquee0_1">
   <ul>
   <li><a href="#">1中国新任国家主席将对俄罗斯等四国进行访问</a></li>
   <li><a href="#">国五条遭遇舆论反弹 三部门紧急磋商保护刚需</a></li>
   <li><a href="#">贵仁:现行高考制度没有地域不公</a></li>
   <li><a href="#">造国家机关公文印章罪被批捕</a></li>
   
   <li><a href="#">中国新任国家主席将对俄罗斯等四国进行访问</a></li>
   <li><a href="#">国五条遭遇舆论反弹 三部门紧急磋商保护刚需</a></li>
   <li><a href="#">贵仁:现行高考制度没有地域不公</a></li>
   <li><a href="#">造国家机关公文印章罪被批捕</a></li>
   
   <li><a href="#">中国新任国家主席将对俄罗斯等四国进行访问</a></li>
   <li><a href="#">贵仁:现行高考制度没有地域不公</a></li>
   <li><a href="#">造国家机关公文印章罪被批捕</a></li>
   
   <li><a href="#">中国新任国家主席将对俄罗斯等四国进行访问</a></li>
   <li><a href="#">国五条遭遇舆论反弹 三部门紧急磋商保护刚需</a></li>
   <li><a href="#">贵仁:现行高考制度没有地域不公</a></li>
   <li><a href="#">造国家机关公文印章罪被批捕</a></li>
   
   </ul>
   </div>
  
   <div id="marquee0_2"></div>
   </div>
   </div>
   {literal}
<SCRIPT language=javascript>
	  var marqueeVar0;
	  document.getElementById('marquee0_2').innerHTML = document.getElementById('marquee0_1').innerHTML;
					marqueeVar0 = window.setInterval("marquee(0, 'left')", 20);
					document.getElementById('marquee0').onmouseover = function(){window.clearInterval(marqueeVar0);}
					document.getElementById('marquee0').onmouseout = function(){marqueeVar0 = window.setInterval("marquee(0, 'left')", 20);}
</SCRIPT>
{/literal}
   </div>
   
   
   
   <div class="blank10"></div>
   <div class="box clearfix">
   <div class="case_ll clearfix">
	  <!--头部广告+注册窗口-->
	  	<!-- 
	    <div class="home_top_l"><img src="./templates/images/schoolbar/home_adv.jpg" /></div>
	     -->
	     
	     
	     <!-- 广告 -->
	      <div class="travel_banner travel_focus travel_listimg home_top_l" id="travel_focus">
			  <ul>
			    <li><a href="#" target="_blank"><img src="./templates/images/schoolbar/zhuce_bj.gif"  /></a></li>
			    <li><a href="#" target="_blank"><img src="./templates/images/schoolbar/wb_pic2.gif" /></a></li>
			    <li><a href="#" target="_blank"><img src="./templates/images/schoolbar/wb_pic1.gif" /></a></li>
			    <li><a href="#" target="_blank"><img src="./templates/images/schoolbar/wb1.jpg"  /></a></li>
			    <li><a href="#" target="_blank"><img src="./templates/images/schoolbar/tenkenn02.jpg"  /></a></li>
			    <li><a href="#" target="_blank"><img src="./templates/images/schoolbar/wb_pic2.gif"  /></a></li>
			    <li><a href="#" target="_blank"><img src="./templates/images/schoolbar/zhuce_bj.gif"  /></a></li>
			    <li><a href="#" target="_blank"><img src="./templates/images/schoolbar/wb_pic1.gif"  /></a></li>
			  </ul>
		 
			  <div class="travel_btn">
			    <div class="travel_btn_bg"></div>
			    <div class="btn"> <span class="">1</span> <span class="on">2</span> <span class="">3</span> <span class="">4</span> <span class="">5</span> <span class="">6</span> </div>
			      <div class="thRelative" style="width:700px;height:32px;overflow:hidden;">
			        <div class="travel_btn_text">
			        <p>杜莎夫人蜡像馆+山顶缆车+摩天台+游艇游维港+酒店，绝对超值！</p>
			        <p>兴业银行信用卡约惠全球，加订更优惠！</p>
			        <p>香港快速过关，团队L签不跟团</p>
			        <p>精彩景点全囊括，包含香港迪士尼、海洋公园等！</p>
			        <p>香港快速过关，团队L签不跟团</p>
			        <p>优质香港游</p>
			        <p>优质香港游</p>
			        <p>优质香港游</p>
			        </div>
			     </div>
			  </div>
		</div>
		
		<!-- 广告 -->
		
		
		
		
		
		
		
		<!--注册窗口-->
		<div class="home_top_r">
		   <div class="clearfix">
		   
		    
		    {if $smarty.session.loginok eq 1}
		     <h3 class="bottom10">欢迎回来~ </h3>
		    
		     <p align="center">
		     {if $smarty.session.baseinfo.nickname neq ""}
		     {$smarty.session.baseinfo.nickname}
		     {else}
		     {$smarty.session.baseinfo.email}
		     {/if} ~</p>
		     <br/>
		      <p align="center"><input name="" type="button"  class="anniu22" value="注销" onclick="window.location='forum_home.php?module=logout'"/></p>
		     {else}
		      <h3 class="bottom10">账号登录 </h3>
              <form action="forum_home.php" method="post" id="forumlogin" name="forumlogin">
               
                <p><input type="text"  class="lt_txt2" value="账号" name = "email2" id="email2" {if $remember eq "1"} style="display:none;" {/if} onfocus="inputemail()"/></p>
                <p><input type="text"  class="lt_txt2" value="{$ema}"   name = "ema" id="ema" {if $remember eq ""} style="display:none;" {/if} onblur="leaveemail()"/></p>
                  <p><input type="text"  class="lt_txt2" value="密码" name = "password2" id="password2" {if $remember eq "1"} style="display:none;" {/if} onfocus="inputpassword()"/></p>
                <p><input type="password"  class="lt_txt2" value="{$pwd}" name = "pwd" id="pwd" {if $remember eq ""} style="display:none;" {/if} onblur="leavepassword()"/></p>
                <p class="bottom10"><input type="checkbox" name="rememberstatus" id="remember" {if $remember eq "1"} checked="checked" {/if}/>记住密码&nbsp;&nbsp;<a href="reg_reback.php">忘记密码</a></p>
               <p><span id="checkloginid"></span></p>
                <p><input name="" type="button"  class="lt_ann1" value="" onclick="checkforumlogin()"/>
                  <input name="input" type="button"  class="lt_ann3" value="" onclick="window.location='register.php'"/>
                </p>
              </form>
              {/if}
              </div>
		</div>
	  <!--+注册窗口-->
	  <!--/头部广告+注册窗口-->
   </div>
   </div>
   
   
   
   
   <div class="blank10"></div>
   <div class="box clearfix">
   <div class="AreaL">
   
       <!--童鞋们都喜欢的活动-->
       <div class="case_ll clearfix">
       <input type="hidden" id="pagesAct" name="pagesAct" value="0"/>
	   <div class="q_bt"><span class="a0693e3"><a href="#someid" onclick="changeAct();">换一组</a></span>童鞋们都喜欢的活动</div>
	   <div class="home_list">
	   <ul id="act_hot">
	   {foreach from = $act_hot key=key item=item}
	   <li>
	   <a href="hd.php?module=hd_list_show1&hd_id={$item.ID}">
	   <img src="./uploadfiles/activity/hdImage/{$item.photo}" />
	   <p class="bt">{$item.actname}</p></a>
	   <p class="care">{$item.attentionnum}人关注</p>
	   </li>
	   {/foreach}
	   </ul>
	   </div>
	   </div>
	   <!--/童鞋们都喜欢的活动-->
	   
	   
	   
	   <!--热点圈子-->
	    <!--你可能会喜欢的圈子-->
	    <input id="listtype" value="" style="display:none"></input>
   
	   <div class="case clearfix">
	   <div class="q_bt"><span class="a0693e3"><a href="#someid" onclick="changeGroup('like');">换一组</a></span>你可能喜欢的圈子</div>
	   <input id="like" name="like" value="{$start1}" style="display:none"></input>
	   <input id="insnum" name="insnum" value="{$insnum}" style="display:none"></input>
	   <ul class="part clearfix" id="likelist" name="likelist">
	   {foreach from=$homeGrp.like item=item key=key}
	     <li style='display:block'>
	      <img src="./uploadfiles/group/groupImage/{$item.photo}"/>
		  <p class="a0693e3"><a href="grp_single_home.php?ID={$item.ID}" >{$item.groupname}</a></p>
		  <dd >话题：{$item.topicnum}
		  <br>{$item.membernum}人加入
		  </dd>
	     </li>
	     {/foreach}
		 
	   </ul>
	   </div>
	   
	   <!--/热点圈子-->
	   
	   
	   
	   <div class="blank10"></div>
	   <div class="case clearfix">
	   
	    <!--圈子达人-->
	    <!--圈子达人-->
	     <div class="part_left clearfix">
		    <div class="q_bt"><span class="a0693e3"><a href="#someid" onclick="changeGroup('super');">换一组</a></span>圈子达人</div>
			<input id="super" name="super" value="{$start2}" style="display:none"></input>
			<input id="supernum" name="supernum" value="{$supernum}" style="display:none"></input>
		<ul class="part3 clearfix a666" id="superlist">
		{foreach from=$homeGrp.super item=item key=key}
		 <li>
	      <img src="./uploadfiles/user/{$item.photo}" />
		  <p class="aff6600"><a href="self_zone.php?uid={$item.ID}">{$item.nickname}</a></p>
		  
		  <dd class="clearfix"><em>{$item.topic.0.replynum}个回应</em><span class="a0693e3">【讨论】</span><a href="grp_topic.php?module=scan&ID={$item.topic.0.idt_grp_main}&topicID={$item.topic.0.gID}">{$item.topic.0.title}</a>  </dd>
		  <dd class="clearfix"><em>{$item.topic.1.replynum}个回应</em><span class="a0693e3">【讨论】</span><a href="grp_topic.php?module=scan&ID={$item.topic.1.idt_grp_main}&topicID={$item.topic.1.gID}">{$item.topic.1.title}</a> </dd>
		  <dd class="clearfix"><em>{$item.topic.2.replynum}个回应</em><span class="a0693e3">【讨论】</span><a href="grp_topic.php?module=scan&ID={$item.topic.2.idt_grp_main}&topicID={$item.topic.2.gID}">{$item.topic.2.title}</a>  </dd>
	     </li>
	     {/foreach}
	   </ul>
		 </div>
	   <!--/圈子达人-->
	   
	   
	    <!--优秀圈主-->
	    <div class="part_right clearfix">
		    <div class="q_bt"><span class="a0693e3"><a href="#someid" onclick="changeGroup('excelring');">换一组</a></span>优秀圈主</div>
			<input id="excelring" name="excelring" value="{$start3}" style="display:none"></input>
		    <input id="exnum" name="exnum" value="{$exnum}" style="display:none"></input>
		<ul class="part3 clearfix a666" id="excelringlist">
		{foreach from=$homeGrp.excelring item=item key=key}
	     <li>
	     <img src="./uploadfiles/user/{$item.photo}" />
		 <a href="self_zone.php?uid={$item.ID}">
		 <font color="#ff6600" size="2px">{$item.nickname}
		 </font></a>
		 <br>他的热门圈：<a href="grp_single_home.php?ID={$item.gID}">{$item.groupname}</a>
		 <br>成员：{$item.membernum}
		 <br><a href="grp_single_home.php?ID={$item.gID}">去看看>></a>
	     </li>
	     {/foreach}
		 
	   </ul>
		 </div>
	   <!--/优秀圈主-->
	    </div>
		
		
		
		<div class="blank10"></div>
	   
	   <!--你可能敢兴趣的圈子活动-->
	   <div class="case clearfix">
	   <div class="q_bt"><span class="a0693e3"><a href="hd.php">更多活动</a></span>你可能敢兴趣的圈子活动</div>
	   <ul class="part clearfix">
		 
		 {foreach from=$homeGrp.actIns item=item key=key}
		 <li>
	       <a href="#"><img src="./uploadfiles/activity/hdImage/{$item.photo}" border="0" /></a>
		  <p class="aff6600"><a href="grp_act.php?module=single&ID={$item.idt_grp_main}&actID={$item.ID}">{$item.actname}</a></p>
		  <dd>开始时间：{$item.begintime}</dd>
		  <dd>结束时间：{$item.endtime}</dd>
		  <dd class="cl_999">参与人数：{$item.membernum}人</dd>
	     </li>
	     {/foreach}

	   </ul>
	   </div>
	   <!--/你可能敢兴趣的圈子活动-->
	   
   </div>
   
   
   
   <div class="AreaR">
       <div class="case clearfix">
	     <div class="q_new clearfix">
		   <p class="q_new_a"><span class="a0693e3">建立</span>您的圈子，<span class="aff6600">集合</span>身边<br />志同道合的童鞋...</p>
		   <p class="q_new_b afff"><a {if $smarty.session.loginok eq 1}href="grp_home.php?module=create"{else}href="#" onclick="LoginOut();"{/if}>创建圈子</a></p>
		   <p class="q_new_c afff">你也可以：<br />去自己的 <span class="a0693e3"><a {if $smarty.session.loginok eq 1}href="grp_home.php?module=myschoolgrp"{else}href="#" onclick="LoginOut();"{/if}>学校圈子看看>></a></span></p>
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
		  {foreach from=$homeGrp.label item=item key=key}
		  <li><a href="grp_home.php?module=label&labelID={$item.ID}&label={$item.label}&labelnum={$item.groupnum}">{$item.label}</a><span>({$item.groupnum})</span></li>
		  {/foreach}
		  </ul>
	   </div>
	   <!--/热门标签-->
	   
	   
	    
		<div class="blank10"></div>
	   <!--最新话题-->
	   <div class="case clearfix">
	      <div class="q_bt_r">最新话题</div>
	      
		  <ul class="new_topic a666_b">
		  {foreach from=$homeGrp.newTopic item=item key=key}
		  <li>
		     <h3><a href="grp_topic.php?module=scan&topicID={$item.ID}&ID={$item.idt_grp_main}">{$item.title}</a></h3>
			 <p class="a0693e3"><a href="self_zone.php?uid={$item.uID}">{$item.nickname}</a></p>
		  </li>
		  {/foreach}
		  </ul>
	   </div>
	   <!--/最新话题-->


   </div>
   
   
   </div>
   
   
   
   
   

   <div class="blank10"></div>
   </div>
  

  <script type="text/javascript" src="./tempaltes/scripts/schoolbar/q_foot.js"></script>








<!------------------------------------------body over-->
{include file=barfooter.tpl}
 <script src="./templates/scripts/forum_home.js" type="text/javascript"></script>