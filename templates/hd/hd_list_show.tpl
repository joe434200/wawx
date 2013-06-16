{include file=barheader.tpl}
{include file=uploadify.tpl}
<script src="./templates/scripts/prototype.js" type="text/javascript"></script>


<input type="hidden" id="handler_path" value="hd_upload.php?module=hdImage&hd_id={$act_info.ID}">

<div class="backbj clearfix">
<input type="hidden" name="hd_id" id="hd_id"></input>
<input type="hidden" name="use_id" id="use_id" value="32"></input>
 
   <div class="blank10"></div>
   <div class="box clearfix">
        <div style="position: relative;">
		
		
		<div class="AreaL4 clearfix">
		<div class="AreaL4 clearfix">
		
		  <div class="hd_address a0693e3">
		  当前位置： <a href="hd.php?module=hd_index">首页</a> >> <a href="hd.php?module=hd_list">同城活动</a>  >><a href="#">其它</a>  >> {$act_info.actname}		
		  </div>
		  
		  <div class="blank10"></div>
		  <div class="case clearfix">
		    <div class="hd_show clearfix">
		       <div class="pic">{if $act_info.photo}<img src="./uploadfiles/activity/hdImage/{$act_info.photo}" />{else}<img src="./templates/images/schoolbar/5.jpg" />{/if}</div>
			   <div class="info">
				       <h3 class="a0693e3_line"><a href="#">{$act_info.actname}</a></h3>
					   <p>活动时间：{$act_info.begintime}~~~{$act_info.endtime}</p>
					   <p>地点：{$act_info.place} </p>
					   <p>费用：  {$act_info.cost}元/人</p>
					   <p>来自于 {$act_info.usertype}:<em class="a0693e3"><a href="zone.php?uid={$act_info.uID}">{$act_info.nickname}</a></em></p>
					   <p> <em class="cl_f30" id="attentionnum"> {$act_info.attentionnum}</em>  人关注&nbsp;&nbsp;&nbsp;<em class="cl_f30" id="membernum">{$act_info.membernum}</em>  人参加 </p>
					   <p>{if $act_info.endtime>=$date_new}<input type="button"  class="anniu_like" value="关注" {if $smarty.session.loginok eq 1} onclick="javascript:attention_act('{$act_info.ID}')"{else} onclick="LoginOut();" {/if}/>&nbsp;&nbsp;&nbsp;&nbsp;
					   <input type="button"  class="anniu_like" value="我要参加" {if $smarty.session.loginok eq 1} onclick="javascript:member_act('{$act_info.ID}')"{else} onclick="LoginOut();" {/if}/>
					   {else}<input type="button"  class="anniu_like" value="关注" onclick=""/>&nbsp;&nbsp;&nbsp;&nbsp;
					   <input type="button"  class="anniu_like" value="我要参加" onclick=""/>
					   {/if}
					   </p>
			    </div>
				<div class="tag">
				    <p class="wen">其它</p>
					  <p class="pp">{if $act_info.endtime>=$date_new}<img src="./templates/images/schoolbar/hd_bj5.gif" />{else}活动已经过期{/if}</p>
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
				<div class="hd_jj_show">{$act_info.content}</div>
			  </div>
			</div>
		   <!--/活动详情-->
		   
		   
		   <!--上传照片-->
		   <div class="blank10"></div>
			<div class="case clearfix">
			  <div class="hd_jj clearfix">
			    <div class="hd_bt_s clearfix"> 
				<p class="hd_jj_ann1">{if $smarty.session.loginok eq 1}<input type="button"  class="hd_jj_ann" id="J_selectImage" value=" "/>{/if}</p>
				上传照片 <em class="size14">{if !$act_info.photonum}0张{else}{$act_info.photonum}张{/if}</em>
				
				</div>
				<div class="hd_jj_pic">
				 <ul id= "photo">
				 {foreach from=$data_hd_photo key=key item=item}
				 <li><img src="./uploadfiles/activity/hdImage/{$item.realname}" /></li> 
				 {/foreach}
				 <table width="100%" border="0" cellspacing="0" cellpadding="0">
					  <tr>
					  	<td align="right" class="pic">{if $smarty.session.loginok eq 1}<a href="hd.php?module=hd_photos&hd_id={$act_info.ID}">查看更多</a>{/if}</td>
					  </tr>
					</table>
				 </ul> 
				
				</div>
				
			  </div>
			  
			</div> 
		   <!--/上传照片-->
		   
		   <!--活动评论-->
		   <div class="blank10"></div>
			<div class="case clearfix">
			  <div class="hd_jj clearfix">
			    <div class="hd_bt_s clearfix"> 
				活动评论 <em class="size14">{if $act_info.replynum}{$act_info.replynum}条{else}0条{/if}</em>
				  
				</div>
				
				<div class="hd_jj_plun">
				  <!-- <textarea name="remark_textarea" cols="" rows="5" class="area_all"></textarea>  -->
				</div>
				<div class="hd_jj_plun"><!--
				<p class="hd_biaoqing"><img src="./templates/images/schoolbar/hd_ann6.gif" /></p>
				<p class="hd_fabiao">{if $smarty.session.loginok eq 1}<input name="" type="button"  class="hd_jj_ann2" value="" onclick="javascript:remark_new()"/>{/if}</p>
				  --></div>
				
				
				
				<div>
				<ul id="remark_old">	
				{foreach from=$data_remarks item=item key=key}		
				<li>
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
					  <tr>
					  	<td valign="top" class="pic">&nbsp;</td>
					    <td valign="top" class="pic">
					    <p>
					    {if $item.photo}<img src="./templates/images/schoolbar/{$item.photo}" />
					    {else}<img src="./templates/images/schoolbar/avatar2.jpg" />
					    {/if}</p></td>
					    <td valign="top" class="nr">
					    <p class="name"><a href="#">{$item.nickname}</a> <span>{$item.createtime}</span></p>
					    <p class="pl">{$item.content}</p>
					    </td>
						<!-- <td valign="bottom" class="edit a999">&nbsp;&nbsp;<a href="hd.php?module=shield&ID={$act_info.ID}&remark_ID={$item.ID}">屏蔽</a></td> -->
					  </tr>
					</table>
					
				</li>
				<li>&nbsp;</li>
				{/foreach}
				<!-- 
				<li>
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
					  <tr>
					  	<td valign="top" class="pic">&nbsp;</td>
					    <td valign="top" class="pic"><p><img src="./templates/images/schoolbar/avatar2.jpg" /></p></td>
					    <td valign="top" class="nr">
					    <p class="name"><a href="#">arthur1977</a> <span>2010-5-26 16:21</span></p>
					    <p class="pl">你好呀 有空多交流</p>
					    </td>
						<td valign="bottom" class="edit a999">&nbsp;&nbsp;<a href="#">删除</a></td>
					  </tr>
					</table>
				</li>
				<li>&nbsp;</li>
				<li>
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
					  <tr>
					  	<td valign="top" class="pic">&nbsp;</td>
					    <td valign="top" class="pic"><p><img src="./templates/images/schoolbar/avatar2.jpg" /></p></td>
					    <td valign="top" class="nr">
					    <p class="name"><a href="#">arthur1977</a> <span>2010-5-26 16:21</span></p>
					    <p class="pl">你好呀 有空多交流</p>
					    </td>
						<td valign="bottom" class="edit a999">&nbsp;&nbsp;<a href="#">删除</a></td>
					  </tr>
					</table>
				</li>
				<li>&nbsp;</li>
				<li>
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
					  <tr>
					  	<td valign="top" class="pic">&nbsp;</td>
					    <td valign="top" class="pic"><p><img src="./templates/images/schoolbar/avatar2.jpg" /></p></td>
					    <td valign="top" class="nr">
					    <p class="name"><a href="#">arthur1977</a> <span>2010-5-26 16:21</span></p>
					    <p class="pl">你好呀 有空多交流</p>
					    </td>
						<td valign="bottom" class="edit a999">&nbsp;&nbsp;<a href="#">删除</a></td>
					  </tr>
					</table>
				</li>
				<li>&nbsp;</li>
				<li>
				 -->
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					  <tr>
					  	<td align="right" class="pic">{if $smarty.session.loginok eq 1}<a href="hd.php?module=reply&hd_id={$act_info.ID}">查看更多</a>{/if}</td>
					  </tr>
					</table>
				</li>
				</ul>
				</div>
				
				
				<div class="blank10"></div>
			  </div>
			</div>
		   <!--/活动评论-->
		   
		  </div>
		
		
		
		
		
		<div class="AreaR clearfix">
			<!--/活动成员-->
			<div class="case clearfix">
			  <div class="hd_bt_r">活动成员&nbsp;&nbsp;<em class="cl_f60 size12">{$act_info.membernum}</em> <em class="size12 a999" >人参加</em></div>
			  <div class="hd_people">
			  <ul>
			  {foreach from=$mem_info key=key item=item }
			  <li><img src="./templates/images/schoolbar/{$item.photo}" /></li>
			  {/foreach}
			  <!-- 
			    <li><img src="./templates/images/schoolbar/5.jpg" /></li>
				<li><img src="./templates/images/schoolbar/5.jpg" /></li>
				<li><img src="./templates/images/schoolbar/5.jpg" /></li>
				
				<li><img src="./templates/images/schoolbar/5.jpg" /></li>
				<li><img src="./templates/images/schoolbar/5.jpg" /></li>
				<li><img src="./templates/images/schoolbar/5.jpg" /></li>
				 -->
			  </ul>
			  <p class="a0693e3_line"><a href="hd.php?module=hd_member&hd_id={$act_info.ID}" >查看全部参与者</a></p>
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
			 {foreach from=$data_likes key=key item=data_like}
			  <li>
			      <a href="hd.php?module=hd_list_show1&hd_id={$data_like.ID}">{if $data_like.photo}<img src={$data_like.photo}  border="0" />{else}<img src="./templates/images/schoolbar/43.jpg" border="0" />{/if}</a>
			      <div class="info">
				  <div class="hd_over">晒照片</div>
			      <p class="bt a0693e3"><a href="hd.php?module=hd_list_show1&hd_id={$data_like.ID}">{$data_like.actname}</a></p>
				  <p>{$data_like.membernum}人参加</p>
				  </div>  
			  </li>
			  
			  {/foreach}
			  
			  <!-- 
			  <li>
			      <a href="3"><img src="./templates/images/schoolbar/43.jpg" border="0" /></a>
			      <div class="info">
				  <div class="hd_over">晒照片</div>
			      <p class="bt a0693e3"><a href="#">送祝福，得王老吉</a></p>
				  <p>28人参加</p>
				  </div>  
			  </li>
			  
			  
			  <li>
			      <a href="3"><img src="./templates/images/schoolbar/43.jpg" border="0" /></a>
			      <div class="info">
				  <div class="hd_over">晒照片</div>
			      <p class="bt a0693e3"><a href="#">送祝福，得王老吉</a></p>
				  <p>28人参加</p>
				  </div>  
			  </li>
			   -->
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
  
  
  

    <script type="text/javascript" src="./templates/scripts/hd.js"></script>
 {include file=barfooter.tpl}
  
  

