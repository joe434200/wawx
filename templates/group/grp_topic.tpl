{include file=barheader.tpl}
<!------------------------------------------body-->
<body>
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
	 <li class="dh_sel"><a href="grp_topic.php?ID={$rs.main.ID}">话题</a></li>
	 <li><a href="grp_member.php?ID={$rs.main.ID}">成员</a></li>
	 <li><a href="grp_act.php?ID={$rs.main.ID}">活动</a></li>
	 <li><a href="grp_photo.php?ID={$rs.main.ID}">图片</a></li>
	 <li><a href="grp_info.php?ID={$rs.main.ID}">介绍</a></li>
	 </ul>
   </div>
   
   
   <div class="blank10"></div>
   
   <div class="box2 clearfix">
        <div class="AreaL2 clearfix">
		  <div class="case clearfix">
		  <!--list-->
		     <div class="q_l_list">



			   <div class="q_l_btbt a666_b">
			   <span>
			   <a href="grp_topic.php?ID={$rs.main.ID}&type=browse">↑按点击</a>&nbsp;&nbsp;<a href="grp_topic.php?ID={$rs.main.ID}&type=reply">↑按回复</a>&nbsp;&nbsp;
			   <select name="type" id="type" onchange="topictype();">
			    <option value="0">全部</option>
			   {foreach from=$topictype item=item key=key}
			   <option value="{$item.id}"  {if $catalog eq $item.id} selected="selected"{/if}>{$item.name}</option>
			   {/foreach}
			   </select>
			   </span>
			   话题</div>
			   <div class="blank10"></div>
			   
			   
			   <div class="q_l_li clearfix a666_b">
               <ul>
			     {foreach from=$separatedata item=item key=key}
			     <li>
                 <dl>
                 <dd class="li_x">
                 <img src="./templates/images/schoolbar/{$item.imagename}" />
                 </dd>
                 <dd class="li_a">
                 <a href="grp_topic.php?module=scan&ID={$rs.main.ID}&topicID={$item.ID}">
                 {if $item.topflg eq 1}
                 [顶]
                 {/if}
                 {$item.title}
                 </a>
                 </dd>
                 <dd class="li_b a0693e3"><a href="zone.php?uid={$item.uID}">{$item.nickname}</a></dd>
                 <dd class="li_c"><span class="cl_f30">{$item.replynum}</span>/{$item.browsenum}</dd>
                 <dd class="li_d">{$item.createtime}</dd>
                 </dl>
                 </li>
                 {/foreach}
               {if $separatedata eq null}
               	 亲，圈子还没有帖子，来发第一个帖子吧？
               	{/if}
			   </ul>
			   </div>
			   
			 </div>
		  <!--page-->	  
		  <script type="text/javascript">
   		  var pg1 = new showPages('pg1');
		  pg1.pageCount = '{$pageMessage}';
		  pg1.argName = 'page';
		  pg1.printHtml();
		</script>
		
		<div class="forum_post_new clearfix">
         {if $checkIn eq 3}
         <div class="faite"><a href="grp_topic.php?module=new&ID={$rs.main.ID}"><img src="./templates/images/schoolbar/post5.gif" border="0"/></a></div>
         {/if}
		 </div>
	   
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
	
	
	<!--最新成员-->	
	<div class="blank10"></div>
	<div class="case clearfix">
	  <div class="q_bt_r2">最新成员</div>
	  <div class="q_newparter clearfix">
	      <ul class="a666_b">
	      {foreach from=$rs.member item=item key=key}
		  <li><img src="./uploadfiles/user/{$item.tp}" /><p><a href="zone.php?uid={$item.uID}">{$item.nickname}</a></p></li>
		  {/foreach}
		  </ul>
	  </div>
	</div>
	<!--/最新成员-->
	
	
	<!--其他圈子-->	
	<div class="blank10"></div>
	<div class="case clearfix">
	  <div class="q_bt_r2">其他圈子</div>
	  <div class="q_otherparter clearfix">
	      <ul class="a666_b">
		  {foreach from=$otherGrp item=item key=key}
		  <li><img src="./uploadfiles/group/groupImage/{$item.photo}" /><p><a href="grp_single_home.php?ID={$item.ID}">{$item.groupname}</a></p></li>
		  {/foreach}
		  </ul>
	  </div>
	</div>
	<!--/其他圈子-->
	
   </div>
		  
		  
   </div>
   
	  
   <div class="blank10"></div>
   </div>
     
   </div>

<!------------------------------------------body over-->
{include file=barfooter.tpl}
