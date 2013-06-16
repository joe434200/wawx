{include file=barheader.tpl}
{include file=uploadify.tpl}
{literal}
<script type="text/javascript">
//window.onload=function(){addpars("album","album");}
</script>
{/literal}

<input type="hidden" id="handler_path" value="grp_upload.php?module=group_photo&ID={$rs.main.ID}"/>
 <script src="./templates/scripts/group.js" type="text/javascript"></script>
 <script src="./templates/scripts/prototype.js" type="text/javascript"></script>
   

<div class="backbj clearfix">
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
	 <li><a href="grp_act.php?ID={$rs.main.ID}">活动</a></li>
	 <li class="dh_sel"><a href="grp_photo.php?ID={$rs.main.ID}">图片</a></li>
	 <li><a href="grp_info.php?ID={$rs.main.ID}">介绍</a></li>
	 </ul>
   </div>
   <!--/导航-->
   
		<input  name="" id="album" style="display:none">
   <div class="blank10"></div>
   
   <div class="box2 clearfix"> 
   
      <div class="q_l_btbig a666_b"><span>(共有{$rs.main.photonum}张照片)</span>图片
     
      </div>
	      <div class="case clearfix">
		  
		  <div class="AreaL2 clearfix">
		  <div class="q_list_pic clearfix">
	         <ul>
	         {foreach from=$separatedata item=item key=key}
			 <li><a href="grp_photo.php?ID={$rs.main.ID}&photoID={$item.ID}&key1={$key+1}&key2={$nowpage}"><img src="./uploadfiles/group/{$rs.main.ID}/group_photo/{$item.realname}" border="0" /></a></li>
			 {/foreach}
			 </ul>
			 {if $separatedata eq null}
               	 亲，圈子还没有图片，来上传第一张图片吧？
             {/if}
	      </div>
		  <!--page-->
	  <!--page-->
	   {if $checkIn eq 3}
	   <input name="" type="button"  class="hd_jj_ann" value="" id="J_selectImage"/>
	   {/if}
	   	  <script type="text/javascript">
   		  var pg1 = new showPages('pg1');
		  pg1.pageCount = '{$pageMessage}';
		  pg1.argName = 'page';
		  pg1.printHtml();
		</script>
	 </div>
	      
		  
		  <div class="AreaR clearfix">
		  <div class="q_list_pic_show_pl">
		  <h3>图片最新评论</h3>
		  <ul>
		{foreach from=$newReply.reply item=item key=key}
		  <li>
		  <p class="ava"><span class="a0693e3"><a href="zone.php?uid={$item.uID}">{$item.nickname}</a></span> 评论 </p>
		  <p class="a0693e3"><a href="grp_photo.php?ID={$rs.main.ID}&photoID={$item.pID}">{$item.realname}</a></p>
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
