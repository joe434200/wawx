  {include file=barheader.tpl}
  <div class="blank10"></div>
   
   <div class="box2 clearfix">
      <div class="q_l_btbig a666_b"><span>(共有位{$act_info.membernum}成员)</span>成员</div>
	  
	  <div class="case clearfix">

	      <div class="q_partner clearfix">
	         <ul>
	         {foreach from = $member key = key item = item}
	         			 <li>
			     <dt><a href="#"><img src="./uploadfiles/user/{$member.photo}" border="0" /></a></dt>
		         <dd>
				 <p class="bt a0693e3">
				 				 <a href="zone.php?uid={$item.uID}">{$item.nickname}</a> 
				 &nbsp;<span class="a999">{$item.sex}</span>
				 &nbsp;
				 				 
					 						 			<!-- <img src="./templates/images/schoolbar/removeAdmin.jpg"  title="撤销管理员" onclick="window.location.href='#'">  -->			 
						 <img src="./templates/images/schoolbar/removeMember.jpg"  title="踢出活动" onclick="window.location.href='hd.php?module=exitMember&hd_id={$hd_id}&member_id={$item.uID}'">
						 					 				 				 </p>
				 <p class="a666_b"><a href="#"></a><br/></p>
				 <p class="btton"><input type="button" value="关注"  class="q_p_an"/>&nbsp;&nbsp;&nbsp;<input name="" type="button" value="打招呼" class="q_p_an"/></p>
				 </dd>
			 </li>
			 
			 {/foreach}
			 
			 <!--  
			 			 <li>
			     <dt><a href="#"><img src="./uploadfiles/user/2.jpg" border="0" /></a></dt>
		         <dd>
				 <p class="bt a0693e3">
				 				 <a href="#">胡一菲</a> 
				 &nbsp;<span class="a999">女</span>
				 &nbsp;
				 				 
					 						 						 <img src="./templates/images/schoolbar/removeAdmin.jpg"  title="撤销管理员" onclick="window.location.href='grp_member.php?module=removeAdmin&ID=3&grpMemID=2'">
						 <img src="./templates/images/schoolbar/removeMember.jpg"  title="移出本圈" onclick="window.location.href='grp_member.php?module=exitMember&ID=3&grpMemID=2'">
						 					 				 				 </p>
				 <p class="a666_b"><a href="#"></a><br/></p>
				 <p class="btton"><input type="button" value="关注"  class="q_p_an"/>&nbsp;&nbsp;&nbsp;<input name="" type="button" value="打招呼" class="q_p_an"/></p>
				 </dd>
			 </li>
			 			 <li>
			     <dt><a href="#"><img src="./uploadfiles/user/1.jpg" border="0" /></a></dt>
		         <dd>
				 <p class="bt a0693e3">
				 				 <a href="#">曾小贤</a> 
				 &nbsp;<span class="a999">男</span>
				 &nbsp;
				 				 
					 						 						 					 				 				 </p>
				 <p class="a666_b"><a href="#">北京大学</a><br/></p>
				 <p class="btton"><input type="button" value="关注"  class="q_p_an"/>&nbsp;&nbsp;&nbsp;<input name="" type="button" value="打招呼" class="q_p_an"/></p>
				 </dd>
			 </li>
			 -->
			 			 </ul>
	      </div>
		   <!--page-->
		    <div class="num_pg">
	     <a href="hd.php?module=hd_member&hd_id={$act_info.ID}&page_new=1"><<</a>
	    <!--  <strong>1</strong> -->
	     {foreach from = $pages key = key item = item}
	     <a href="hd.php?module=hd_member&hd_id={$act_info.ID}&page_new={$key}">{$item}</a>
	     {/foreach}
		 
		 <a href="hd.php?module=hd_member&hd_id={$act_info.ID}&page_new={$count}">>></a>
	   </div>
	   <div class="blank20"></div>
	<!-- 
	   	  <script type="text/javascript">
   		  var pg1 = new showPages('pg1');
		  pg1.pageCount = '3';
		  pg1.argName = 'page';
		  pg1.printHtml();
		</script>
		 -->
	   <!--/page-->
	   
	  </div>
   </div>
	  
   
   
     
  
    {include file=barfooter.tpl}
  