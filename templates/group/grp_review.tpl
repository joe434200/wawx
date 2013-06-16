{include file=barheader.tpl}
<!------------------------------------------body-->
<div class="backbj clearfix">
      <script src="./templates/scripts/group.js" type="text/javascript"></script>
   <script src="./templates/scripts/prototype.js" type="text/javascript"></script>
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
	 <li  class="dh_sel"><a href="grp_topic.php?ID={$rs.main.ID}">话题</a></li>
	 <li><a href="grp_member.php?ID={$rs.main.ID}">成员</a></li>
	 <li><a href="grp_act.php?ID={$rs.main.ID}">活动</a></li>
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
		  <h3>
		  <span>
		  <a href="grp_topic.php?ID={$rs.main.ID}">返回话题列表   </a>
		  {if $power neq 3 and $smarty.session.loginok eq 1}
			  {if $topic.base.topflg eq 0}
			  <a href="grp_topic.php?module=top&ID={$rs.main.ID}&topicID={$topic.base.ID}">帖子置顶</a>
			  {else}
			  <a href="grp_topic.php?module=canceltop&ID={$rs.main.ID}&topicID={$topic.base.ID}">取消置顶</a>
			  {/if}
			  <a href="grp_topic.php?module=del&ID={$rs.main.ID}&topicID={$topic.base.ID}">帖子删除</a>
		  {/if}
		  </span>
		  
		  {$topic.base.title}
		  </h3>
		  <div class="blank10"></div>
		  
		  <!--发表标题，内容-->
		  <div class="show clearfix">
		  <div class="show_left"><img src="./uploadfiles/user/{$topic.base.up}" /></div>
		  <div class="show_right">
		    <div class="time"><span>{$topic.base.replynum} / {$topic.base.browsenum} </span> <em class="a0693e3_line"><a href="#">{$topic.base.nickname}</a></em> 发表于：{$topic.base.createtime}</div>
		    {if $topic.base.topflg eq 1} 
		 	 <div id="Layer2"><img src="./templates/images/schoolbar/005.gif" /></div>
		  	{/if}
			
			<div class="neirong">
			{$topic.base.content}
            </div>
		  
		  </div>  
		  </div>
		   <!--/发表标题，内容-->
		   
		   
		   
		   <!--下面是评论-->
		   <div class="plun clearfix">
		   <ul>
	
	 	   {foreach from=$ReplyMsg item=item key=key}
	 	    <li class="clearfix">
		   <table width="100%" border="0" cellspacing="0" cellpadding="0">
			   <tr>
			   <td valign="top" class="pic"><p><img src="uploadfiles/user/{$item.up}" /></p></td>
			   <td valign="top" class="nr">
				    <p class="name">{$key+1}楼 &nbsp;<a href="#">{$item.nickname }</a> <span>{$item.createtime}</span></p>
				    <p class="pl">{$item.content}</p>
				    </td>
					<td valign="bottom" class="edit a999">
					{if $checkIn eq 3}				
					<a href="javascript:pageScroll('{$item.ID}','{$item.nickname}')">回复</a>&nbsp;&nbsp;
					{/if}
					{if $power neq 3 and $smarty.session.loginok eq 1}
					<a href="#" onclick="topicReplyDel('delreply','{$item.ID}','{$rs.main.ID}','{$topic.base.ID}');">删除</a>
					{/if}
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
			         <p class="name"><a href="#">{$item.nickname }</a> <span>{$item.createtime}</span></p>
			         <p class="pl">{$item.content}</p>
			         </td>
			         </tr>
					 <tr>
					 <td valign="top" class="pic">&nbsp;</td>
					 <td class="a999">
					 {if $checkIn eq 3}				
					 <a href="javascript:pageScroll('{$item.idt_reply_parentid}','{$item.nickname}')">回复</a>&nbsp;&nbsp;
					 {/if}
					 {if $power neq 3 and $smarty.session.loginok eq 1}
					 <a href="#" onclick="topicReplyDel('reply','{$item.ID}','{$rs.main.ID}','{$topic.base.ID}');">删除</a>
					 {/if}
					 </td>
					 </tr>
				     </table>
			    </td>
			  </tr>
			  {/foreach}
			</table>
			</li>
			{/foreach}

		   </ul>
		   
			  <script type="text/javascript">
	   		  var pg1 = new showPages('pg1');
			  pg1.pageCount = '{$pageMessage}';
			  pg1.argName = 'page';
			  pg1.printHtml();
			  </script>
		   </div>
		   <!--/下面是评论-->
		   <!--发表评论-->
		   {if $checkIn eq 3}		
		   <div class="plun_fabiao clearfix" id="position">
		   <form action="grp_topic.php?module=review&topicID={$topic.base.ID}&ID={$rs.main.ID}" method="post" id="frm2" name="frm2">
		   
		   <textarea id="editor_id" name="editor_id" style="width:650px;height:200px;">
		   </textarea>
		   <input type="text" id="textarea" name="textarea" style="display:none"></input>
		 
		   <div  id="limitcontent">你还可以输入8000个字符</div> 
		   <br /><br />
           <input name="review" id="review" type="button" class="anniu25"  value="发表"  onclick="checkBlock();"/>
           
           <input name="replyType" id="replyType" name="replyType" type="text" class="anniu25"  value=""  style="display:none"/>
           <input name="replyID" id="replyID" type="text" class="anniu25"  value="" style="display:none"/>
		   </form>
		   </div>
		   <!--/发表评论-->
		   {else}
		   <em class="a0693e3_line"><a href="#" onclick="LoginOut();">亲，您不是该圈子的成员或者您未登陆</a></em>
		   {/if}
		  </div>   
		  </div>
		  </div>
		
		<!--右侧最新话题-->
		<div class="AreaR clearfix">
		<div class="case clearfix">
	  <div class="q_bt_r2">最新话题</div>
	  <div class="q_lastnew clearfix">
	     <ul>
	     {foreach from=$rs.topic item=item key=key}
		 <li>
		 <p class="bt">[讨论] <span class="a0693e3_line"><a href="grp_topic.php?module=scan&topicID={$item.ID}&ID={$rs.main.ID}">{$item.title}</a> </span></p>
		 <p><span class="peo"><a href="grp_topic.php?module=scan&topicID={$item.ID}&ID={$rs.main.ID}">去看看</a></span> {$item.createtime} </p>
		 </li>
		 {/foreach}
		 
		 </ul>
	  </div>
	  </div>
		</div>
		<!--/右侧最新话题-->
		  
		  
   </div>
   
	  
   <div class="blank10"></div>
   </div>
     
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
				        'undo', 'redo', '|', 'preview', 'justifyleft', 'justifycenter', 'justifyright',
				        'justifyfull', 'insertorderedlist', 'insertunorderedlist', 'indent', 'outdent', 'subscript',
				        'superscript', 'quickformat', '|',
				        'formatblock', 'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold',
				        'italic', 'underline', 'strikethrough', 'lineheight', 'removeformat', '|', 'image',
				        'table', 'emoticons'
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
			    		      document.getElementById('limitcontent').innerHTML="&nbsp;&nbsp;你还可以输入"+count+"个字符";
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
