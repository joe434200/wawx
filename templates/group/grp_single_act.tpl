{include file=barheader.tpl}
{include file=uploadify.tpl}
<!------------------------------------------body-->
{literal}
<script type="text/javascript">
//window.onload=function(){addpars("album","album");}
</script>
{/literal}

<input type="hidden" id="handler_path" value="grp_upload.php?module=act_photo&ID={$rs.main.ID}&actID={$actMsg.main.ID}"/>
 <script src="./templates/scripts/group.js" type="text/javascript"></script>
 
<div class="backbj clearfix">   
   <div class="blank10"></div>
   <div class="box clearfix">
        
        
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
	 <li><a href="grp_photo.php?ID={$rs.main.ID}">图片</a></li>
	 <li><a href="grp_info.php?ID={$rs.main.ID}">介绍</a></li>
	 </ul>
   </div>
   <!--/导航-->
   <input  name="" id="album" style="display:none">
		<div style="position: relative;">
		<div class="AreaL4 clearfix">
		<div class="AreaL4 clearfix">
		
		
		  
		  <div class="blank10"></div>
		  <div class="case clearfix">
		    <div class="hd_show clearfix">
		       <div class="pic"><img src="./uploadfiles/activity/hdImage/{$actMsg.main.photo}" /></div>
			   <div class="info">
				       <h3 class="a0693e3_line"><a href="grp_act.php?module=single&ID={$rs.main.ID}&actID={$actMsg.main.ID}">{$actMsg.main.title}</a></h3>
					   <p>活动时间：{$actMsg.main.begintime} - {$actMsg.main.endtime}</p>
					   <p>地点：{$actMsg.main.place} </p>
					   <p>费用：￥{$actMsg.main.cost}</p>
					   <p>来自于 个人：<em class="a0693e3"><a href="zone.php?uid={$actMsg.main.uID}">{$actMsg.main.nickname}</a></em></p>
					   <p> <em class="cl_f30">{$actMsg.main.attentionnum}</em>  人关注&nbsp;&nbsp;&nbsp;<em class="cl_f30">{$actMsg.main.membernum}</em>  人参加 </p>
					   <p>
					   {if  $actMsg.main.overflg eq 0 or  $actMsg.main.overflg eq 2 or $checkInGrp neq 3}
					   {else}
						   {if $checkIn eq 0 or $checkIn eq 2}
							<input type="button"  class="anniu_like" value="关注" onclick="window.location.href='grp_act.php?module=attention&ID={$rs.main.ID}&actID={$actMsg.main.ID}'"/>
							{else}
							已关注
							{/if}
						   &nbsp;&nbsp;&nbsp;&nbsp;
						   {if $checkIn eq 0 or $checkIn eq 1}
						   <input type="button"  class="anniu_like" value="我要参加" onclick="window.location.href='grp_act.php?module=in&ID={$rs.main.ID}&actID={$actMsg.main.ID}'"/>
						   {else}
						    已参加
						   	{/if}
					   	{/if}
					   </p>
			    </div>
						
				<div class="tag">
				      <p class="wen">其它</p>
					  <p class="pp">
					  {if $actMsg.main.overflg eq 0}
					  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;活动已经过期
					  {elseif $actMsg.main.overflg eq 2}
					  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;活动尚未开始
					  {else}
					  <img src="./templates/images/schoolbar/hd_bj5.gif" />
					  {/if}</p>
				</div>
		    </div>
		  </div>
		  
		</div>
		
		<div class="blank10"></div>
		<div class="AreaL4 clearfix">
		
        <div class="AreaL clearfix">
           <!--活动详情-->
			<div class="case clearfix">
			  <div class="hd_jj clearfix">
			    <div class="hd_bt_s clearfix"> 活动详情 </div>
				<div class="hd_jj_show">{$actMsg.main.content}</div>
			  </div>
			</div>
		   <!--/活动详情-->
		   
		   
		   <!--上传照片-->
		   <div class="blank10"></div>
			<div class="case clearfix">
			  <div class="hd_jj clearfix">
			    <div class="hd_bt_s clearfix"> 
			    {if $checkIn eq 2 or $checkIn eq 3}
				<p class="hd_jj_ann1">
				<input type="button"  class="hd_jj_ann" value=" "  id="J_selectImage"/></p>
				{/if}
				上传照片 <em class="size14">{$actMsg.main.photonum}张</em>
				</div>
				<div class="hd_jj_pic">
				 <ul>
				 {foreach from=$actMsg.photo item=item key=key}
				 <li><img src="./uploadfiles/group/{$rs.main.ID}/act_photo/{$item.realname}" /></li>
				 {/foreach}
				 
				 </ul> 
				 <div class="q_l_list"><div class="q_more"><a href="grp_act.php?module=photo&ID={$rs.main.ID}&actID={$actMsg.main.ID}">更多活动图片</a></div></div>
				</div>
			  </div>
			</div>
		   <!--/上传照片-->
		   
		   <!--活动评论-->
		   <div class="blank10"></div>
			<div class="case clearfix">
			  <div class="hd_jj clearfix">
			    <div class="hd_bt_s clearfix"> 
				活动评论 <em class="size14">{$actMsg.main.replynum}条</em>
				</div>
				
				<div class="plun clearfix">
				<ul>
				{foreach from=$actMsg.reply item=item key=key}
			    <li>
		       		<table width="100%" border="0" cellspacing="0" cellpadding="0">
				   <tr>
				   <td valign="top" class="nr">
					    <p class="name">{$key+1}楼 &nbsp;<a href="zone.php?uid={$item.uID}">{$item.nickname }</a> <span>{$item.createtime}</span></p>
					    <p class="pl">{$item.content}</p>
					    </td>
					  </tr>
				  	</table>
					</li>
					{/foreach}
				</ul>
				</div>
				<div class="q_l_list"><div class="q_more"><a href="grp_act.php?module=reply&ID={$rs.main.ID}&actID={$actMsg.main.ID}">更多活动评论</a></div></div>
				<form action="grp_act.php?module=review&type=home&ID={$rs.main.ID}&actID={$actMsg.main.ID}" method="post" id='frm2' name='frm2'>
				<div class="hd_jj_plun">
				</div>
				<div class="hd_jj_plun">
				</div>
				</form>
				
				<div class="blank10"></div>
			  </div>
			</div>
		   <!--/活动评论-->
		   
		  </div>
		
		
		
		
		
		<div class="AreaR clearfix">
			<!--/活动成员-->
			<div class="case clearfix">
			  <div class="hd_bt_r">活动成员&nbsp;&nbsp;<em class="cl_f60 size12">{$actMsg.main.membernum}</em> <em class="size12 a999" >人参加</em></div>
			  <div class="hd_people">
			  <ul>
			  {foreach from=$actMsg.member item=item key=key}
				<li><img src="./uploadfiles/user/{$item.photo}" /></li>
				{/foreach}
			  </ul>
			  <p class="a0693e3_line"><a href="grp_act.php?module=member&ID={$rs.main.ID}&actID={$actMsg.main.ID}">查看全部参与者</a></p>
			  </div>
			</div>
			<!--/活动成员-->
			
			
			<!--/广告-->
			<div class="blank10"></div>
			<div class="case clearfix">
			  <div class="right_adv"><a href="#"><img src="./templates/images/schoolbar/96.jpg" border="0" /></a></div>
			</div>
			<!--/广告-->
			
			<!--/你可能喜欢的活动-->
			<div class="blank10"></div>
			<div class="case clearfix">
			  <div class="hd_bt_r">你可能喜欢的活动</div>
			  <ul class="hd_love clearfix">
			  {foreach from = $hotact item=item key=key}
			  <li>
			      <a href="3"><img src="./uploadfiles/activity/hdImage/{$item.photo}" border="0" /></a>
			      <div class="info">
				  <div class="hd_over">晒照片</div>
			      <p class="bt a0693e3"><a href="#">{$item.actname}</a></p>
				  <p>{$item.membernum}人参加</p>
				  </div>  
			  </li>
			  {/foreach}
			  </ul>
			</div>
			<!--/你可能喜欢的活动-->
			
			
			
			
			
		</div>
		
   </div>
   </div>
   </div>
   </div>
   
 
   <div class="blank10"></div>
   </div>
   
<script src="./templates/scripts/prototype.js" type="text/javascript"></script>
<!------------------------------------------body over-->
{include file=barfooter.tpl}
