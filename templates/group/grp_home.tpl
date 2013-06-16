{include file=barheader.tpl}
{literal}
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

{/literal}
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
			  	{foreach from=$ad item=item key=key}
			    <li><a href="{$item.linkid}" target="_blank"><img src="./uploadfiles/adver/{$item.realname}"  /></a></li>
			    {/foreach}
			  </ul>
		 
		 		<div class="travel_btn">
			    <div class="travel_btn_bg"></div>
			    <div class="btn"> 
			    {foreach from=$ad item=item key=key}
			    <span class="">{$key+1}</span>
			    {/foreach}
			    </div>
			    <div class="thRelative" style="width:700px;height:32px;overflow:hidden;">
			        <div class="travel_btn_text">
			        {foreach from=$ad item=item key=key}
			        <p>{$item.advertdesc}</p>
			        {/foreach}
			        </div>
			     </div>
			  </div>
		</div>
		
		<!-- 广告 -->
	   <div class="blank10"></div>
       
	   
	   <!--你可能会喜欢的圈子-->
	   <div class="case clearfix">
	   <div class="q_bt"><span class="a0693e3"><a href="#someid" onclick="changeGroup('like');">换一组</a></span>你可能喜欢的圈子</div>
	   <input id="like" name="like" value="{$start1}" style="display:none"></input>
	   <input id="insnum" name="insnum" value="{$insnum}" style="display:none"></input>
	   <ul class="part clearfix" id="likelist" name="likelist">
	   {foreach from=$homeGrp.like item=item key=key}
	     <li style='display:block'>
	      <img src="./uploadfiles/group/groupImage/{$item.photo}"/>
		  <p class="a0693e3"><a href="grp_single_home.php?ID={$item.ID}" >{$item.groupname}</a></p>
		  <dd>话题：{$item.topicnum}
		  <br>{$item.membernum}人加入
		  </dd>
	     </li>
	     {/foreach}
		 
	   </ul>
	  
	   
	   <ul class="part2 clearfix a666">
	   {foreach from=$homeGrp.topic item=item key=key}
	    <li><span class="cl_e09c28">{$item.nickname}</span><em class="a0693e3">【{$item.groupname}】</em><a href="grp_topic.php?module=scan&ID={$item.idt_grp_main}&topicID={$item.ID}">{$item.title}</a></li>
	    {/foreach}
	   </ul>
	   </div>
	   
	   <div class="blank10"></div>
	   <div class="case clearfix">
	   
	    <!--圈子达人-->
	     <div class="part_left clearfix">
		    <div class="q_bt"><span class="a0693e3"><a href="#someid" onclick="changeGroup('super');">换一组</a></span>圈子达人</div>
			<input id="super" name="super" value="{$start2}" style="display:none"></input>
			<input id="supernum" name="supernum" value="{$supernum}" style="display:none"></input>
		<ul class="part3 clearfix a666" id="superlist">
		{foreach from=$homeGrp.super item=item key=key}
		 <li>
	      <img src="./uploadfiles/user/{$item.photo}" />
		  <p class="aff6600"><a href="zone.php?uid={$item.ID}">{$item.nickname}</a></p>
		  
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
		 
		   <div class="q_new_a clearfix">
		   <ul>
	   <li><a href="grp_home.php?module=interest" target="_blank">兴趣圈</a></li>
	   <li><a href="grp_home.php?module=school" target="_blank">学校圈</a></li>
	   <li><a href="grp_home.php?module=club" target="_blank">社团圈</a></li>
	   <li><a {if $smarty.session.loginok eq 1}href="grp_home.php?module=my_grp"{else}href="#" onclick="LoginOut();"{/if}>我的圈子</a></li>
	   </ul>
		   </div>
		  
		   <p class="q_new_b afff"><a {if $smarty.session.loginok eq 1}href="grp_home.php?module=create"{else}href="#" onclick="LoginOut();"{/if}>创建圈子</a></p>
		   <p class="q_new_c afff">去自己的 <span class="a0693e3"><a {if $smarty.session.loginok eq 1}href="grp_home.php?module=myschoolgrp"{else}href="#" onclick="LoginOut();"{/if}>学校圈子看看>></a></span></p>
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
			 <p class="a0693e3"><a href="zone.php?uid={$item.uID}">{$item.nickname}</a></p>
		  </li>
		  {/foreach}
		  </ul>
	   </div>
	   <!--/最新话题-->
   </div>  
   </div>
   </div>

{literal}
<script>
function aaa()
{
	document.getElementById("keyword").value="";
}

</script>
{/literal}
<!------------------------------------------body over-->
{include file=barfooter.tpl}
