{include file=barheader.tpl}
<!------------------------------------------body-->

<script src="./templates/scripts/group.js" type="text/javascript"></script>
      <script src="./templates/scripts/prototype.js" type="text/javascript"></script>
<div class="backbj clearfix">
   <script type="text/javascript" src="./templates/scripts/group.js"></script>
   <!--script type="text/javascript" src="js/q_top.js"></script-->
   
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
	 <li  class="dh_sel"><a href="grp_act.php?ID={$rs.main.ID}">活动</a></li>
	 <li><a href="grp_photo.php?ID={$rs.main.ID}">图片</a></li>
	 <li><a href="grp_info.php?ID={$rs.main.ID}">介绍</a></li>
	 </ul>
   </div>
   <!--/导航-->
   
   <div class="blank10"></div>
   
   <div class="box2 clearfix">
        <div class="AreaL2 clearfix">
		  <div class="case clearfix">

		  <div class="q_syousai">
		  <h3><span><a href="grp_act.php?module=single&ID={$rs.main.ID}&actID={$actID}">返回活动</a></span>活动评论：</h3>
		  <div class="blank10"></div>
		   
		   <!--下面是评论-->
		   <div class="plun clearfix">
		   <ul>
		   {foreach from=$ReplyMsg item=item key=key}
	 	    <li>
		   <table width="100%" border="0" cellspacing="0" cellpadding="0">
			   <tr>
			   <td valign="top" class="pic"><p><img src="uploadfiles/user/{$item.up}" /></p></td>
			   <td valign="top" class="nr">
				    <p class="name">{$key+1}楼 &nbsp;<a href="zone.php?uid={$item.uID}">{$item.nickname }</a> <span>{$item.createtime}</span></p>
				    <p class="pl">{$item.content}</p>
				    </td>
					<td valign="bottom" class="edit a999">				
					<a href="javascript:pageScroll('{$item.ID}','{$item.nickname}')">回复</a>&nbsp;&nbsp;
					<a href="#" onclick="actReplyDel('reply','{$item.ID}','{$rs.main.ID}','{$actID}');">删除</a>
					</td>
				  </tr>
			  <!--若点击回复，请用下面的代码-->
			  {foreach from=$item.secondReply item=item key=key}
			  <tr>
			    <td valign="top" class="pic">&nbsp;</td>
			    <td valign="top" class="nr reply" colspan="2">
			          <table width="100%" border="0" cellspacing="0" cellpadding="0">
			          <tr>
			         <td valign="top" class="pic"><p><img src="uploadfiles/user/{$item.up}" /></p></td>
			         <td valign="top" class="nr">
			         <p class="name"><a href="zone.php?uid={$item.uID}">{$item.nickname }</a> <span>{$item.createtime}</span></p>
			         <p class="pl">{$item.content}</p>
			         </td>
			         </tr>
					 <tr>
					 <td valign="top" class="pic">&nbsp;</td>
					 <td class="a999"><a href="javascript:pageScroll('{$item.idt_reply_parentid}','{$item.nickname}')">回复</a>&nbsp;&nbsp;
					 <a href="#" onclick="actReplyDel('replydel','{$item.ID}','{$rs.main.ID}','{$actID}');">删除</a>
					 </td>
					 </tr>
				     </table>
			    </td>
			  </tr>
			  {/foreach}
			</table>
			</li>
			{/foreach}

			{if $actRe eq null}
			亲，还有没有评论，快来抢沙发
			{/if}
		   </ul>
		   </div>
		   <!--/下面是评论-->
		   <!--page-->
	  	<script type="text/javascript">
   		  var pg1 = new showPages('pg1');
		  pg1.pageCount = '{$pageMessage}';
		  pg1.argName = 'page';
		  pg1.printHtml();
		</script>
		  </div>
		   <!--发表评论-->
		   <div class="plun_fabiao clearfix" id="position">
		   {if $smarty.session.loginok eq 1}
		   <form action="grp_act.php?module=review&ID={$rs.main.ID}&actID={$actID}" method="post" id="frm2" name="frm2">
		  
		   <textarea id="editor_id" name="editor_id" style="width:300px;height:200px;">
		   </textarea>
		   
		   <input type="text" id="textarea" name="textarea" style="display:none"></input>
		   
            <input name="review" id="review" type="button" class="anniu25"  value="发表"  onclick="checkBlock();"/>
           
           <input name="replyType" id="replyType" name="replyType" type="text" class="anniu25"  value=""  style="display:none"/>
           <input name="replyID" id="replyID" type="text" class="anniu25"  value="" style="display:none"/>
		   </form>
		   {else}
		   	<em class="a0693e3_line"><a href="#" onclick="LoginOut();">亲，登陆后才能发表评论</a></em>
		   {/if}
		   </div>
		   <!--/发表评论-->
		   

		  </div>   
		  </div>
	</div>
		
		<!--右侧最新活动评论-->

		<!--/右侧最新话题-->
		  
		  
   </div>
   
	  
   <div class="blank10"></div>
   </div>
     
  <input type="hidden" id="handler_path" value="grp_upload.php"/> 
  <script src="./templates/scripts/prototype.js" type="text/javascript"></script>
<script  src="./plugin/editor/kindeditor.js" type="text/javascript"></script>
<script  src="./piugin/editor/lang/zh_CN.js" type="text/javascript"></script>
{literal}
<script>
	  KindEditor.ready(function(K) {
		  window.editor = K.create('#editor_id', {
			  items : [
				        'emoticons'
				],
			  
			  allowImageUpload  : true,
			  resizeType : 1,
			  afterChange : function(){ 
			       var limitNum = 8000;
			       var strValue = this.html();
			    	 if(strValue.length   >   limitNum)
			    		 {
			    		      //如果元素区字符数大于最大字符数，按照最大字符数截断；     
			    		  // var strValue = this.html();
			    	       strValue = strValue.substring(0,limitNum);
			    	       this.html(strValue);      

			    		 }
			    	       
			    	  else   
			    		  {
			    		    //在记数区文本框内显示剩余的字符数；
			    		      var count = limitNum - strValue.length;
			    		      document.getElementById('textarea').value=editor.html();

			    		      if(editor.isEmpty())
			    		      {
			    		    	  document.getElementById('review').value="发表";
			    		    	  document.getElementById('replyType').value="发表";
			    		    	  document.getElementById('replyID').value=null;
				    		  }
			    		  }
			      
		             }
			
		  });
          
	  });
		  
</script>
{/literal}
<!------------------------------------------body over-->
{include file=barfooter.tpl}
