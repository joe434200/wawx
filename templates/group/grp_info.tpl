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
   
   
   <div class="blank10"></div>
   <!--导航-->
      <div class="case clearfix">
     <ul class="q_l_dh a666_b">
	 <li><a href="grp_single_home.php?ID={$rs.main.ID}">首页</a></li>
	 <li><a href="grp_topic.php?ID={$rs.main.ID}">话题</a></li>
	 <li><a href="grp_member.php?ID={$rs.main.ID}">成员</a></li>
	 <li><a href="grp_act.php?ID={$rs.main.ID}">活动</a></li>
	 <li><a href="grp_photo.php?ID={$rs.main.ID}">图片</a></li>
	 <li  class="dh_sel"><a href="grp_info.php?ID={$rs.main.ID}">介绍</a></li>
	 </ul>
   </div>
   <!--/导航-->
   
   
   <div class="blank10"></div>
   
   <div class="box2 clearfix">
       <div class="q_l_btbig a666_b">介绍</div>
	   
	   
	    <div class="case clearfix">
	    <div class="q_list_intro clearfix">
	    <div class="q_intro_l">
	    <div class="nlk_pic">
		{if $rs.main.photo eq ""}
		<img src="./templates/images/schoolbar/def.gif" />
    	{else}
    	<img src="./uploadfiles/group/groupImage/{$rs.main.photo}" />
		{/if}
		</div>
		<div class="nlk_name">{$rs.main.groupname}</div>
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
			 </div>
			 
			 <div class="q_intro_r">
	<form action="grp_info.php?module=updata&ID={$rs.main.ID}" id="frm2" name="frm2" method ="post">
              <ul>
                <dd>圈子号：</dd>
                <dt>{$rs.main.ID}</dt>
    
    <dd>创建于：</dd>
    <dt>{$rs.main.createtime}</dt>
    
    <dd>创建人：</dd>
    <dt class="a0693e3"><a href="zone.php?uid={$rs.main.uID}">{$rs.main.nickname}</a></dt>
    
    <dd>管理员：</dd>
    <dt class="a0693e3">
    {foreach from=$admin item=item key=key}
    <a href="zone.php?uid={$item.uID}">{$item.nickname}&nbsp&nbsp</a>
    {/foreach}
    </dt>
    
    <dd>圈子公告：</dd>
    <dt>
    {if $power neq 3 and $smarty.session.loginok eq 1}
    <textarea name="data[notice]" id="notice" rows="6" cols="50">{$rs.main.notice}</textarea>
    {else}
    {$rs.main.notice}
    {/if}
    </dt>
        
	<dd>*圈子简介：</dd>
    <dt>
    {if $power neq 3 and $smarty.session.loginok eq 1}
    <textarea name="data[introduction]" id="groupinfo" rows="6" cols="50">{$rs.main.introduction}</textarea>
    <span id = "limitcontent"></span> 
    {else}
    {$rs.main.introduction}
    {/if}
    </dt>
    <dd>
    <dt>
     {if $power neq 3 and $smarty.session.loginok eq 1}
    <input type="button" name="button" id="button" value="保存" onclick="check();"/>
    <input type="reset" name="reset" id="reset" value="恢复" />
    {/if}
    </dt>
	</dd>
	
    </ul>
   </form>
			 </div>
	      </div>
		  
		  
	 
	   
	  </div>
   </div>
	  
   <div class="blank10"></div>
   </div>
     
   </div>
   
{literal}
<script>
function check()
{
	var groupinfo = document.getElementById("groupinfo").value;

	if(groupinfo.length == 0)
	{
		checklabel = "&nbsp;&nbsp;圈子介绍不能为空";
	    document.getElementById("limitcontent").innerHTML = checklabel;
	    document.getElementById("limitcontent").style.color = "red";
	}
	else
	{
		checklabel = "";
	    document.getElementById("limitcontent").innerHTML = checklabel;
	    document.getElementById("limitcontent").style.color = "";
	}

	if(checklabel == "")
	{
		$('frm2').submit();
	}
}

</script>
{/literal}

</body>
<!------------------------------------------body over-->
{include file=barfooter.tpl}
