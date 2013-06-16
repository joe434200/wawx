{include file=barheader.tpl}
<!------------------------------------------body-->

   <script src="./templates/scripts/group.js" type="text/javascript"></script>
   <script src="./templates/scripts/prototype.js" type="text/javascript"></script>
   <div class="backbj clearfix">   
   <div class="blank10"></div>
     <!--我的圈子-->
   <div class="box">
     <div class="case clearfix">
	   <div class="q_bt">
	     <p class="q_tagtag2">我的圈子</p> 
	     <p class="q_tagtag3">|</p>  
	     <p {if $mygrp eq "in" or $mygrp eq null }class="q_tagtag q_on" {else}  class="q_tagtag" {/if}><a href="grp_home.php?module=my_grp&label=in">我加入的</a></p>  
	     <p class="q_tagtag3">|</p>   
	     <p {if $mygrp eq "create"}class="q_tagtag q_on" {else}  class="q_tagtag" {/if}><a href="grp_home.php?module=my_grp&label=create">我创建的</a></p>   
	     <p class="q_tagtag3">|</p>  
	     <p {if $mygrp eq "check"}class="q_tagtag q_on" {else}  class="q_tagtag" {/if}><a href="grp_home.php?module=my_grp&label=check">审核中</a></p>
		 <p class="q_m a666_b"><a href="#" onclick="window.location.href='grp_home.php?module=select'">发现更多圈子...</a></p>
		 <p class="q_n a666_b"><a href="grp_home.php?module=create">创建新圈子</a></p>
	   </div>
   </div>
   <!--我的圈子-->
   
     <div class="blank10"></div>
     
     {if $mygrp eq "in" or $mygrp eq null}
     <div class="case2 clearfix" >
	 <div class="q_leibie">
	 <p {if $type eq "interest" or $type eq null }class="q_l_sel"{else}class="a666_b"{/if}><a href="grp_home.php?module=my_grp&label=in&type=interest">兴趣圈</a></p> 
	 <p {if $type eq "school"}class="q_l_sel"{else}class="a666_b"{/if}><a href="grp_home.php?module=my_grp&label=in&type=school">学校圈</a></p> 
	 <p {if $type eq "club"}class="q_l_sel"{else}class="a666_b"{/if}><a href="grp_home.php?module=my_grp&label=in&type=club">社团圈</a></p>
	 </div> 
	 </div>
	 
	 {elseif $mygrp eq "create"}
	 
     <div class="case2 clearfix" >
	 <div class="q_leibie">
	 <p {if $type eq "interest" or $type eq null }class="q_l_sel"{else}class="a666_b"{/if}><a href="grp_home.php?module=my_grp&label=create&type=interest">兴趣圈</a></p> 
	 <p {if $type eq "school"}class="q_l_sel"{else}class="a666_b"{/if}><a href="grp_home.php?module=my_grp&label=create&type=school">学校圈</a></p> 
	 <p {if $type eq "club"}class="q_l_sel"{else}class="a666_b"{/if}><a href="grp_home.php?module=my_grp&label=create&type=club">社团圈</a></p>
	 </div> 
	 </div>
	 
	 {else $mygrp eq "check"}
	 
     <div class="case2 clearfix" >
	 <div class="q_leibie">
	 <p {if $type eq "interest" or $type eq null }class="q_l_sel"{else}class="a666_b"{/if}><a href="grp_home.php?module=my_grp&label=check&type=interest">兴趣圈</a></p> 
	 <p {if $type eq "school"}class="q_l_sel"{else}class="a666_b"{/if}><a href="grp_home.php?module=my_grp&label=check&type=school">学校圈</a></p> 
	 <p {if $type eq "club"}class="q_l_sel"{else}class="a666_b"{/if}><a href="grp_home.php?module=my_grp&label=check&type=club">社团圈</a></p>
	 </div> 
	 </div>
	 {/if}
	 
	 
	 <div class="blank10"></div>
	 <!--圈子 列表-->
	 <div class="case3 my_ll clearfix">
	  {foreach from=$rs item=item key=key}
	   <ul class="q_my_list">
	   <a href="grp_single_home.php?ID={$item.ID}"><img src="./uploadfiles/group/groupImage/{$item.photo}" border="0" /></a>
	   <dt class="a0693e3"><a href="grp_single_home.php?ID={$item.ID}">{$item.groupname}</a></dt>
	   <dd>话题：{$item.topicnum} &nbsp;&nbsp;&nbsp;成员：{$item.membernum}</dd>
	   <dd class="a999">{$item.introduction}</dd>
	   </ul>
	   {/foreach}

	 </div>
	  <!--/圈子 列表-->
	  
	  
	  <div class="blank10"></div>
	  <!--友情链接-->
	  <div class="case clearfix">
	  <div class="q_bt">友情链接</div>
	  <div class="q_click a0693e3">
	  <ul>
	  <li><a href="#">PHP培训</a></li>
	  <li><a href="#">无爱任务热污染</a></li>
	  <li><a href="#">额外热为</a></li>
	  <li><a href="#">额外日哦我让</a></li>
	  <li><a href="#">PHP培训</a></li>
	  <li><a href="#">无爱任务热污染</a></li>
	  <li><a href="#">额外热为</a></li>
	  <li><a href="#">额外日哦我让</a></li>
	  <li><a href="#">PHP培训</a></li>
	  <li><a href="#">无爱任务热污染</a></li>
	  <li><a href="#">额外热为</a></li>
	  <li><a href="#">额外日哦我让</a></li>
	  </ul>
	  <div class="blank15"></div>
	  </div>
	  </div>
	  <!--/友情链接-->
	  <div class="blank10"></div>
   
   </div>
     
   </div>
  

<!------------------------------------------body over-->
{include file=barfooter.tpl}
