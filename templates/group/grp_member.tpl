{include file=barheader.tpl}
<!------------------------------------------body-->
   <script src="./templates/scripts/group.js" type="text/javascript"></script>
   <script src="./templates/scripts/prototype.js" type="text/javascript"></script>
<div class="backbj clearfix">
   
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
	 <li class="dh_sel"><a href="grp_member.php?ID={$rs.main.ID}">成员</a></li>
	 <li><a href="grp_act.php?ID={$rs.main.ID}">活动</a></li>
	 <li><a href="grp_photo.php?ID={$rs.main.ID}">图片</a></li>
	 <li><a href="grp_info.php?ID={$rs.main.ID}">介绍</a></li>
	 </ul>
   </div>
   <!--/导航-->
   
   
   <div class="blank10"></div>
   
   <div class="box2 clearfix">
      <div class="q_l_btbig a666_b"><span>(共有位{$rs.main.membernum}成员)</span>成员</div>
	  
	  <div class="case clearfix">

	      <div class="q_partner clearfix">
	         <ul>
	         {foreach from=$separatedata item=item key=key}
			 <li>
			     <dt><a href="#"><img src="./uploadfiles/user/{$item.tp}" border="0" /></a></dt>
		         <dd>
				 <p class="bt a0693e3">
				 {if $item.nickname neq ""}
				 <a href="zone.php?uid={$item.uID}">{$item.nickname}</a> 
				 {else}
				 <a href="zone.php?uid={$item.uID}"> {$item.email}</a>
				 {/if}&nbsp;<span class="a999">{if $item.sex eq 1}男{else}女{/if}</span>
				 &nbsp;
				 {if $item.auditflg eq 1}
				 
					 {if ($smarty.session.baseinfo.ID eq $admin.creater) and ($smarty.session.loginok eq 1)}
						 {if ($item.idt_user eq $admin.admin1) or ($item.idt_user eq $admin.admin2) or ($item.idt_user eq $admin.admin3) }
						 <a href="#" onclick="memberReplyDel('removeAdmin','{$rs.main.ID}','{$item.idt_user}')"><img src="./templates/images/schoolbar/removeAdmin.jpg"  title="撤销管理员"></a>
						 <a href="#" onclick="memberReplyDel('exitMember','{$rs.main.ID}','{$item.idt_user}')"><img src="./templates/images/schoolbar/removeMember.jpg"  title="移出本圈" ></a>
						 {elseif $item.idt_user eq $admin.creater}
						 {else}
						 <a href="#" onclick="memberReplyDel('setAdmin','{$rs.main.ID}','{$item.idt_user}')"><img src="./templates/images/schoolbar/setAdmin.jpg"  title="任命管理员" ></a>
						 <a href="#" onclick="memberReplyDel('exitMember','{$rs.main.ID}','{$item.idt_user}')"><img src="./templates/images/schoolbar/removeMember.jpg"  title="移出本圈"></a>
						 {/if}
					 {elseif (($smarty.session.baseinfo.ID eq $admin.admin1) or ($smarty.session.baseinfo.ID eq $admin.admin2) or ($smarty.session.baseinfo.ID eq $admin.admin3)) and ($smarty.session.loginok eq 1)}
					 	{if ($item.idt_user eq $admin.creater) or ($item.idt_user eq $admin.admin1) or ($item.idt_user eq $admin.admin2) or ($item.idt_user eq $admin.admin3)}
					 	{else}
					 	 	<a href="#" onclick="memberReplyDel('exitMember','{$rs.main.ID}','{$item.idt_user}')"><img src="./templates/images/schoolbar/removeMember.jpg"  title="移出本圈" ></a>
					 	{/if}
					 {/if}
				 {else}
				 	 {if (($smarty.session.baseinfo.ID eq $admin.admin1) or ($smarty.session.baseinfo.ID eq $admin.admin2) or ($smarty.session.baseinfo.ID eq $admin.admin3) or ($smarty.session.baseinfo.ID eq $admin.creater)) and ($smarty.session.loginok eq 1)}
				 	 <a href="#" onclick="memberReplyDel('joinMember','{$rs.main.ID}','{$item.idt_user}')"><img src="./templates/images/schoolbar/joinMember.jpg"  title="加入本圈" ></a>
				 	 {else}
				 	  等待管理员审核
				 	 {/if}
				 {/if}
				 </p>
				 <p class="a666_b"><a href="#">{$item.schoolname}</a><br/>{$item.department}</p>
				 {if $smarty.session.baseinfo.ID neq null and $smarty.session.baseinfo.ID neq $item.uID}
				 <p class="btton"><input type="button" 
				 {if $item.attentionflg eq 1}
				 value="关注"
				 {elseif $item.attentionflg eq 2}
				  value="已关注" disabled = "disabled"
				 {/if}
				 class="q_p_an" onclick="takeCall('attention','{$item.uID}','{$item.nickname}');"/>
				 &nbsp;&nbsp;&nbsp;<input name="" type="button" value="打招呼" class="q_p_an" onclick="takeCall('hello','{$item.uID}','{$item.nickname}');"/></p>
				 
				 {/if}
				 </dd>
			 </li>
			 {/foreach}
			 </ul>
	      </div>
		  
		  <input id="attflg" name="attflg" value="" style="display:none"/>
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
	  
   <div class="blank10"></div>
   </div>
     
   </div>
<!------------------------------------------body over-->
{include file=barfooter.tpl}
