{include file=barheader.tpl}
<!------------------------------------------body-->
<div class="backbj clearfix">
   <script src="./templates/scripts/group.js" type="text/javascript"></script>
   <script src="./templates/scripts/prototype.js" type="text/javascript"></script>
   <div class="blank10"></div>
   <div class="box2">
     
   <!--标题-->
   <div class="q_b_b clearfix">
     <h3>{$rs.main.groupname}</h3>
	 <p class="a999">http://daofuaowuifr.com/299</p>
   </div>
   <!--/标题-->
   <input type="text" id="gID" name="gID" value="{$rs.main.ID}" style="display:none"></input>
   
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
   
   <div class="blank10"></div>
   
   <div class="box2 clearfix">
        <div class="AreaL2 clearfix">
		  <div class="case clearfix">
		  <!--list-->
		     <div class="q_l_list">

			   <div class="q_l_btbt a666_b">
			   <p class="hd_fqhd">
			   {if $checkIn eq 3}	
			   <input type="button"  class="hd_ann3" value="" onClick="window.location.href='hd.php?module=hd_new&grpID={$rs.main.ID}'"/>
			   	{/if}
			   </p>
			   <span><a href="grp_act.php?ID={$rs.main.ID}&type=attention">↑按关注</a>&nbsp;&nbsp;<a href="grp_act.php?ID={$rs.main.ID}&type=member">↑按人数</a>&nbsp;&nbsp;
			   <select name="acttype" id="acttype" onchange="acttype();">
			     <option value="0">全部</option>
			     {foreach from=$acttype item=item key=key}
			     <option value="{$item.ID}" {if $catalog eq $item.ID} selected="selected"{/if}>{$item.name}</option>
			     {/foreach}
			   </select></span>
			   本圈活动</div>
			   <div class="blank10"></div>
			   
			   <!--活动列表-->
			   <div class="hd_activities clearfix">
			     <ul>
			     {if $separatedata eq null}
			             亲，圈子还没有活动，快点来发一个吧！
			     {else}
			     {foreach from=$separatedata item=item key=key}
				 <li class="clearfix">
				   <div class="pic"><img src="./uploadfiles/activity/hdImage/{$item.photo}" /></div>
				   <div class="info">
				       <h3 class="a0693e3_line"><a href="grp_act.php?module=single&ID={$rs.main.ID}&actID={$item.ID}">{$item.content}</a></h3>
					   <p>活动时间：{$item.begintime} - {$item.endtime}</p>
					   <p>地点：{$item.place} </p>
					   <p>发起：<em class="a0693e3"><a href="zone.php?uid={$item.uID}">{$item.nickname}</a></em></p>
					   <p> <em class="nub1">{$item.attentionnum}</em>  人关注&nbsp;&nbsp;&nbsp;<em class="nub2">{$item.membernum}</em>  人参加 </p>
				   </div>
				   <div class="tag">
				      <p class="wen">其它</p>
					  <p class="pp">
					  {if $item.overflg eq 0}
					      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;活动已经过期
					  {elseif $item.overflg eq 2}
					  	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;活动尚未开始
					  {else}
					  <img src="./templates/images/schoolbar/hd_bj5.gif" />
					  {/if}</p>
				   </div>
				 </li>
				 {/foreach}
				 {/if}
				 
				 </ul>
			     </div>
			    <!--/活动列表-->
			   
			   
			 </div>
		  <!--list-->
		  
		  <!--page--> 
	   <!--page-->
	   	  <script type="text/javascript">
   		  var pg1 = new showPages('pg1');
		  pg1.pageCount = '{$pageMessage}';
		  pg1.argName = 'page';
		  pg1.printHtml();
		</script>
	   <!--/page-->
	   
		  </div>
		</div>
		
		
		
		<div class="AreaR clearfix">
		
	<!--圈子名片-->		
    <div class="case clearfix">
	<div class="nlk clearfix">
	<div class="nlk_name">{$rs.main.groupname}</div>
    <div class="nlk_pic">
    {if $rs.main.photo eq ""}
	<img src="./templates/images/schoolbar/def.gif" />
    {else}
    <img src="./uploadfiles/group/groupImage/{$rs.main.photo}" />
	{/if}
    </div>
	{if $checkIn eq 3}
    {if $rs.main.creater eq $smarty.session.baseinfo.ID}
     <div class="nlk_ann afff"><a href="#" onclick="dismiss();">解散该圈子</a></div>
    {else}
    <div class="nlk_ann afff"><a href="#" onclick="exit();">退 出 圈 子</a></div>
    {/if}
    {else}
	<div class="nlk_ann afff"><a href="#" {if $smarty.session.loginok eq 1}onclick="checkIn();"{else}onclick="LoginOut();"{/if}>加入该圈子</a></div>
	{/if}
	
	<!-- 隐藏文本域传圈子ID -->
	<input type="text" name="grp_ID" id="grp_ID" class="txt_zhuce" value="{$rs.main.ID}" style='display:none'/>
    <div class="nlk_xinxi a666_b">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <th><p><a href="#"><strong>{$rs.main.level}级</strong></a></p>
    等级</th>
    <th><p><a href="#"><strong>{if $rs.main.topicnum eq null}0{else}{$rs.main.topicnum}{/if}</strong></a></p>
    话题</th>
    <td align="center"><p><a href="#"><strong>{if $rs.main.photonum eq null}0{else}{$rs.main.photonum}{/if}</strong></a></p>
    图片</td>
  </tr>
</table>
    </div>
    
    <div class="nlk_xx">
    <ul>
    
    <dd>圈子号：</dd>
    <dt>{$rs.main.ID}</dt>
    
    <dd></dd>
    <dd>创建于：</dd>
    <dt>{$rs.main.createtime}</dt>
    <dd></dd>
    <dd>创建人：</dd>
    <dt class="a0693e3"><a href="zone.php?uid={$item.uID}">{$rs.main.nickname}</a></dt>
    <dd></dd>
    
    {foreach from=$rs.main.admin item=item key=key}
    <dd>管理员{$key+1}：</dd>
    <dt class="a0693e3">
    <a href="zone.php?uid={$item.uID}">{$item.nickname}</a>
    </dt>
    <dd></dd>
    {/foreach}
    </ul>
    </div>
    </div>
	</div> 
	<!--/圈子名片-->	
	
	
	
	
	<!--/热门活动-->
			<div class="blank10"></div>
			<div class="case clearfix">
			  <div class="hd_bt_r">热门活动</div>
			  <ul class="hd_love clearfix">
			  {foreach from=$hotact item=item key=key}
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
			<!--/热门活动-->
	
   </div>
   </div>
	  
   <div class="blank10"></div>
   </div>
     
   </div>
  
  
   
  <script type="text/javascript" src="js/q_foot.js"></script>
  
  

</body>
</body>
<!------------------------------------------body over-->
{include file=barfooter.tpl}
