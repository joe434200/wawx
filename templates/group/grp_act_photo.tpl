{include file=barheader.tpl}
<!------------------------------------------body-->
<div class="backbj clearfix">

  <script src="./templates/scripts/group.js" type="text/javascript"></script>
      <script src="./templates/scripts/prototype.js" type="text/javascript"></script>
   <div class="blank10"></div>
   <div class="box2">
     
   <!--标题-->
   <!--标题-->
   <div class="q_b_b clearfix">
     <h3>{$rs.main.groupname}</h3>
	 <p class="a999">http://daofuaowuifr.com/299</p>
   </div>
   <!--/标题-->
   
   
   <div class="blank10"></div>
   <!--导航-->
   <div class="case clearfix">
     <ul class="q_l_dh a666_b">
	 <li><a href="grp_single_home.php?ID={$rs.main.ID}">首页</a></li>
	 <li><a href="grp_topic.php?ID={$rs.main.ID}">话题</a></li>
	 <li><a href="grp_member.php?ID={$rs.main.ID}">成员</a></li>
	 <li class="dh_sel"><a href="grp_act.php?ID={$rs.main.ID}">活动</a></li>
	 <li ><a href="grp_photo.php?ID={$rs.main.ID}">图片</a></li>
	 <li><a href="grp_info.php?ID={$rs.main.ID}">介绍</a></li>
	 </ul>
   </div>
   <!--/导航-->
   
   
   <div class="blank10"></div>
   
   <div class="box2 clearfix">
      <div class="q_l_btbig a666_b"><span>(共有{$number.0}张照片)</span><span><a href="grp_act.php?module=single&ID={$rs.main.ID}&actID={$actID}">返回活动</a></span>活动图片
      </div>
	      
	      <div class="case clearfix">
		  
		  <div class="AreaL2 clearfix">
		  <div class="q_list_pic clearfix">
	         <ul>
	         {foreach from=$separatedata item=item key=key}
			 <li><a href="grp_act.php?module=singlephoto&ID={$rs.main.ID}&photoID={$item.ID}&actID={$actID}&key1={$key+1}&key2={$page}" onClick="window.location.href='grp_act.php?module=singlephoto&ID={$rs.main.ID}&photoID={$item.ID}&actID={$actID}&key1={$key+1}&key2={$page}'"><img src="./uploadfiles/group/{$rs.main.ID}/act_photo/{$item.realname}" border="0" /></a></li>
			 {/foreach}
			 </ul>
			  {if $separatedata eq 0}
               	 亲，活动还没有图片，来发第一张图片吧？
               {/if}
	      </div>
		  <!--page-->
	 <script type="text/javascript">
   		  var pg1 = new showPages('pg1');
		  pg1.pageCount = '{$pageMessage}';
		  pg1.argName = 'page';
		  pg1.printHtml();
		</script>
	   <!--/page-->
		  </div>
	      
		  
		  <div class="AreaR clearfix">
		  <div class="q_list_pic_show_pl">
		  <h3>图片最新评论</h3>
		  <ul>
		{foreach from=$newReply.reply item=item key=key}
		  <li>
		  <p class="ava"><span class="a0693e3"><a href="zone.php?uid={$item.uID}">{$item.nickname}</a></span> 评论 </p>
		  <p class="a0693e3"><a href="grp_act.php?module=singlephoto&ID={$rs.main.ID}&photoID={$item.businessid}&actID={$actID}">{$item.realname}</a></p>
		  <p>{$item.content}</p>
		  </li>
		  {/foreach}
		  
		  </ul>
		  </div>
		  
		  
	      </div>
	  </div>
   </div>
	  
   <div class="blank10"></div>
   </div>
     
   </div>

<!------------------------------------------body over-->
{include file=barfooter.tpl}
