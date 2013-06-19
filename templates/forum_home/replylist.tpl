{include file = barheader.tpl}
 <script src="./templates/scripts/prototype.js" type="text/javascript"></script>
 <script  src="./plugin/editor/kindeditor.js" type="text/javascript"></script>
<script  src="./piugin/editor/lang/zh_CN.js" type="text/javascript"></script>
{literal}
<script>
	  KindEditor.ready(function(K) {
		  window.editor = K.create('#editor_id', {
			  items : [
				        'undo', 'redo', '|', 'preview', 'justifyleft', 'justifycenter', 'justifyright',
				        'justifyfull', 'insertorderedlist', 'insertunorderedlist', 'subscript',
				        'superscript', '|',
				        'formatblock', 'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold',
				        'italic', 'underline', 'strikethrough', 'lineheight', 'removeformat', '|',
				        'table', 'emoticons'
				],
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
			    		  }
			      
		                    }
			
		  });
          
	  });
		  
</script>
{/literal}
   <div class="blank10"></div>
   <div class="box2 clearfix">
   <div class="case_ll clearfix">
   
      <div class="lt_show_bt">
	  <span class="lt_show_bt1">社区精华</span>
	  <em>热门推荐：
	  {if $hot}
      {foreach from=$excel item=item key=key} 
     <a href="forum_home.php?module=replylist&forumid={$item.ID}">{$item.title}</a>
     {/foreach}
     {/if}</em>	  </div>
	  
	  <div class="blank5"></div>
      <div class="lt_show_info">
	  {if $newpic}
	  <ul>
      {foreach from=$newpic item=item key=key}
      {if $key ge 0 and $key lt 6}
      <li><img src="./uploadfiles/forum/{$item.realname}" width="121" height="90" onerror="this.src='./templates/images/schoolbar/wb1.jpg'"/><p><a href="./uploadfiles/forum/{$item.realname}">{$item.oldname}</a></p></li>
      {/if}
      {/foreach}
	  </ul>
	   {/if}
      </div>
	  
	  <div class="lt_show_wen">
	 
	  {if $hot}
      <ul>
      {foreach from=$hot item=item key=key} 
      {if $key ge 0 and $key lt 5}
      <li><a href="forum_home.php?module=replylist&forumid={$item.ID}">{$item.title}</a></li>
      {/if}
      {/foreach}
	  </ul>
	  {/if}
	  </div>
   </div>    
   </div>
   
   

   <div class="blank10"></div>
   <div class="box2 clearfix">
   <div class="case_ll clearfix">
   <div class="lt_main">
      
<!--头部发新贴-->
<div class="forum_post_new clearfix">
<div class="faite"><a {if $smarty.session.loginok eq 1} 
href="forum_home.php?module=new&type={$oneforum.idm_forum_catalog}"
{else} href="javascript:void(0)" onclick="LoginOut();"{/if}>
<img src="./templates/images/schoolbar/post5.gif" border="0" /></a></div>
<div class="num">
<DIV class="num_pg">

{if $oneforum.power eq '1'}
 {if $oneforum.topflg}
 <a  href="javascript:changetop();void(0)" id="forumtop" >取消置顶</a>
 {else}
  <a  href="javascript:changetop();void(0)" id="forumtop" >帖子置顶</a>
  {/if}
  {if $oneforum.excelflg}
 <a  href="javascript:changeexcel();void(0)" id="forumexcel" >取消加精</a>
 {else}
  <a  href="javascript:changeexcel();void(0)" id="forumexcel" >帖子加精</a>
  {/if}
  {if $oneforum.shieldflg}
 <a  href="javascript:changeshield();void(0)" id="forumshield" >取消屏蔽</a>
 {else}
  <a  href="javascript:changeshield();void(0)" id="forumshield" >帖子屏蔽</a>
  {/if}
 {/if}
<script type="text/javascript">
    var pg2 = new showPages('pg2');
	pg2.pageCount = '{$pagecount}';
	pg2.argName = 'p';
	pg2.printHtml();
</script>
</DIV>
</div>


<p><input type="button"  class="anniu23" value="只看楼主" onclick="window.location='forum_home.php?module=louzhu&forumid={$oneforum.ID}'"/></p>

<p><input name="" type="button"  class="anniu22" value="返回列表" onclick="window.location='forum_home.php?module=home&type={$oneforum.idm_forum_catalog}'"/></p>

</div>
</div>
<!--/头部发新贴-->


<div class="blank10"></div>

<div class="forum_post_lista clearfix">

  <div id="Layer1">{if $oneforum.topflg}<img src="./templates/images/schoolbar/005.gif" />{/if}</div>
  <!--内页 帖子主题-->
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td class="lk">
    <div class="cen">
     查看: <span class="forum_red">{$oneforum.browsercount}</span>&nbsp;&nbsp;|&nbsp;&nbsp;回复: <span class="forum_red">{$oneforum.replynum}</span></div>
    </td>
    <td class="rk"><h1>{$oneforum.title}</h1><p class="a999"></p><p class="a999">
    <a {if $smarty.session.loginok eq 1}
    href="javascript:collectforum();void(0)" 
    {else} href="javascript:void(0)" onclick="LoginOut();"{/if} id="collect">[收藏]</a></p></td>
  </tr>
  <tr>
    <td class="lk_h">&nbsp;</td>
    <td class="rk_h">&nbsp;</td>
  </tr>
</table>
<!--内页 帖子主题end-->
{if $currpage eq 1 and $userid eq ''}
<div>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td class="nlk">
    <div class="tz_name">{$oneforum.nickname}</div>
    <div class="nlk_pic"><img src="./uploadfiles/user/{$oneforum.photo}" onerror="this.src='./templates/images/schoolbar/avatar.jpeg'"" width="128" height="95"/></div>
    <div class="nlk_xinxi a_blue">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <th><p><a href="javascript:void(0)">{$countforumtype}</a></p>主题</th>
    <th><p><a href="javascript:void(0)" name = "listen{$oneforum.creater}">{$oneforum.listennum}</a></p>听众</th>
    <td align="center"><p><a href="javascript:void(0)">{$oneforum.coins}</a></p>积分</td>
  </tr>
</table>
    </div>
    
    <div class="nlk_jb a333"><a href="javascript:void(0)">{$oneforum.adminflg}</a>
	<br/>
	{$oneforum.levelimage}
     </div>
   
    <div class="nlk_xx">
    <ul class="a_blue">
    
    <dd>在线时间</dd>
    <dt>{$oneforum.onlinetime}</dt>
    
    <dd>最后登录</dd>
    <dt>{$oneforum.logindate}</dt>
    
    <dd>帖子</dd>
    <dt><a href="javascript:void(0)">{$oneforum.countforumbyid}</a></dt>

    </ul>
    </div>
    <div class="nlk_mail2 a_blue">
    <a {if $smarty.session.loginok eq 1} href="javascript:listen({$oneforum.creater});void(0)"
    {else} href="javascript:void(0)" onclick="LoginOut();"{/if}>收听TA</a></div>
    <div class="nlk_mail a_blue" >
    <a {if $smarty.session.loginok eq 1} href="javascript:sendmessage({$oneforum.creater});void(0)"
      {else} href="javascript:void(0)" onclick="LoginOut();"{/if} id = "sendmessage">发信息</a>
    </div>
    </td>
    
    
    <td valign="top" class="nrk">
    <div class="nrk_all">
    <div class="fl">楼主</div>
    <div class="nrk_a a333"><img src="./templates/images/schoolbar/online_admin.gif" />
    <em>发表于 {$oneforum.createtime} </em>&nbsp;&nbsp;|&nbsp;&nbsp;
    <a href="forum_home?module=replylist&forumid={$oneforum.ID}&userid={$oneforum.creater}">只看该作者</a>
     &nbsp;&nbsp;|&nbsp;&nbsp;
    {if $order}
    <a href="forum_home.php?module=replylist&forumid={$oneforum.ID}">正序浏览 </a>
    {else}
     <a href="forum_home.php?module=replylist&forumid={$oneforum.ID}&order=1">倒序浏览 </a>
     {/if}
    </div>
    </div>
    
    <div class="nrk_nr">{$oneforum.content}</div>

    
    </td>
  </tr>
  <tr>
    <td class="room">&nbsp;</td>
    <td class="nrk_foot a333">
    <p class="ref">
    <a  {if $smarty.session.loginok eq 1} href="javascript:pageScroll()"
    {else} href="javascript:void(0)" onclick="LoginOut();"{/if}>回复</a></p>
    </td>
  </tr>
  <tr>
    <td class="lk_h">&nbsp;</td>
    <td class="rk_h">&nbsp;</td>
  </tr>
</table>
</div>
{/if}


{if $currpage eq 1 and $userid eq $oneforum.creater}
<div>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td class="nlk">
    <div class="tz_name">{$oneforum.nickname}</div>
    <div class="nlk_pic"><img src="./uploadfiles/user/{$oneforum.photo}" onerror="this.src='./templates/images/schoolbar/avatar.jpeg'"" width="128" height="95"/></div>
    <div class="nlk_xinxi a_blue">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <th><p><a href="javascript:void(0)">{$countforumtype}</a></p>主题</th>
    <th><p><a href="javascript:void(0)" name = "listen{$oneforum.creater}">{$oneforum.listennum}</a></p>听众</th>
    <td align="center"><p><a href="javascript:void(0)">{$oneforum.coins}</a></p>积分</td>
  </tr>
</table>
    </div>
    
    <div class="nlk_jb a333"><a href="javascript:void(0)">{$oneforum.adminflg}</a>
	<br/>
	{$oneforum.levelimage}
     </div>
   
    <div class="nlk_xx">
    <ul class="a_blue">
    
    <dd>在线时间</dd>
    <dt>{$oneforum.onlinetime}</dt>
    
    <dd>最后登录</dd>
    <dt>{$oneforum.logindate}</dt>
    
    <dd>帖子</dd>
    <dt><a href="javascript:void(0)">{$oneforum.countforumbyid}</a></dt>

    </ul>
    </div>
    <div class="nlk_mail2 a_blue">
    <a {if $smarty.session.loginok eq 1} href="javascript:listen({$oneforum.creater});void(0)"
    {else} href="javascript:void(0)" onclick="LoginOut();"{/if}>收听TA</a></div>
    <div class="nlk_mail a_blue" >
    <a {if $smarty.session.loginok eq 1} href="javascript:sendmessage({$oneforum.creater});void(0)"
      {else} href="javascript:void(0)" onclick="LoginOut();"{/if} id = "sendmessage">发信息</a>
    </div>
    </td>
    
    
    <td valign="top" class="nrk">
    <div class="nrk_all">
    <div class="fl">楼主</div>
    <div class="nrk_a a333"><img src="./templates/images/schoolbar/online_admin.gif" />
    <em>发表于 {$oneforum.createtime} </em>&nbsp;&nbsp;|&nbsp;&nbsp;
    <a href="forum_home?module=replylist&forumid={$oneforum.ID}">显示全部楼层</a>
    </div>
    </div>
    
    <div class="nrk_nr">{$oneforum.content}</div>

    
    </td>
  </tr>
  <tr>
    <td class="room">&nbsp;</td>
    <td class="nrk_foot a333">
    <p class="ref">
    <a  {if $smarty.session.loginok eq 1} href="javascript:pageScroll()"
    {else} href="javascript:void(0)" onclick="LoginOut();"{/if}>回复</a></p>
    </td>
  </tr>
  <tr>
    <td class="lk_h">&nbsp;</td>
    <td class="rk_h">&nbsp;</td>
  </tr>
</table>
</div>
{/if}


<!--内页 帖子数据循环 end-->
{foreach from=$allreply item=item key=key} 
<div><!-- copy -->
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td class="nlk">
    <div class="tz_name">{$item.nickname}</div>
    <div class="nlk_pic"><img src="./uploadfiles/user/{$item.photo}" onerror="this.src='./templates/images/schoolbar/avatar.jpeg'"" width="128" height="95"/></div>
    <div class="nlk_xinxi a_blue">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <th><p><a href="javascript:void(0)">{$countforumtype}</a></p>主题</th>
    <th><p><a href="javascript:void(0)" name = "listen{$item.creater}">{$item.listennum}</a></p>听众</th>
    <td align="center"><p><a href="javascript:void(0)">{$item.coins}</a></p>积分</td>
  </tr>
</table>
    </div>
    
    <div class="nlk_jb a333"><a href="javascript:void(0)">{$item.adminflg}</a>
	<br />
     {$item.levelimage}
     </div>
   
    <div class="nlk_xx">
    <ul class="a_blue">
    
    <dd>在线时间</dd>
    <dt>{$item.onlinetime}小时</dt>
    
    <dd>最后登录</dd>
    <dt>{$item.logindate}</dt>
    
    
    <dd>帖子</dd>
    <dt><a href="#">{$item.countforumbyid}</a></dt>

    </ul>
    </div>
    <div class="nlk_mail2 a_blue">
    <a {if $smarty.session.loginok eq 1} href="javascript:listen({$item.creater});void(0)"
    {else} href="javascript:void(0)" onclick="LoginOut();"{/if}>收听TA</a></div>
    
    <div class="nlk_mail a_blue">
    <a {if $smarty.session.loginok eq 1} href="javascript:sendmessage({$item.creater});void(0)"
       {else} href="javascript:void(0)" onclick="LoginOut();"{/if}>发信息</a></div>
   
    </td>
    <td valign="top" class="nrk">
    <div class="nrk_all">
    <div class="fl">{if $order}  {$currpagebase-$key}
    {else}
    {$key+$currpagebase} {/if}楼</div>
    <div class="nrk_a a333"><img src="./templates/images/schoolbar/online_admin.gif"/>
    <em>发表于 {$item.createtime} </em>
    &nbsp;&nbsp;|&nbsp;&nbsp;
    {if $userid eq ""}
    <a href="forum_home?module=replylist&forumid={$oneforum.ID}&userid={$item.creater}">只看该作者</a>
    {else}
    <a href="forum_home?module=replylist&forumid={$oneforum.ID}">显示全部楼层</a>
    {/if}
    </div>
    </div>
    
    <div class="nrk_nr">{$item.content}</div>
    </td>
   </tr>
   <tr>
    <td class="room">&nbsp;</td>
    <td class="nrk_foot a333">
    <p class="ref">
    <a {if $smarty.session.loginok eq 1}
    href="javascript:pageScroll('{$item.replyid}','{$item.nickname}')"
    {else} href="javascript:void(0)" onclick="LoginOut();"{/if}>回复</a></p>
    {if $oneforum.power eq 1}
    {if $item.shieldflg}
	 <p class="ref"><a href="javascript:changereplyshield('{$item.replyid}','{$item.businessid}');void(0)" id="forumreply{$item.replyid}">取消屏蔽</a></p>
	{else}
	  <p class="ref"><a href="javascript:changereplyshield('{$item.replyid}','{$item.businessid}');void(0)" id="forumreply{$item.replyid}">屏蔽</a></p>
	{/if}
    {/if}
    </td>
  </tr>
   {foreach from=$item.secondReply item=item key=key}
			  <tr>
			    <td valign="top" class="room">&nbsp;</td>
			    <td valign="top" class="nr reply" colspan="2">
			          <table width="100%" border="0" cellspacing="0" cellpadding="0">
			          <tr>
			         <td valign="top" class="nlk_pic"><p><img src="uploadfiles/user/{$item.photo}" onerror="this.src='./templates/images/schoolbar/avatar.jpeg'" width="50" height="50"/></p></td>
			         <td valign="top" class="nr">
			         <p class="name"><a href="#">{$item.nickname }</a> <span>{$item.createtime}</span></p>
			         <p class="pl">{$item.content}</p>
			         </td>
			         </tr>
					 <tr>
					 <td valign="top" class="pic">&nbsp;</td>
					 <td class="a999">
					 <a {if $smarty.session.loginok eq 1} href="javascript:pageScroll('{$item.idt_reply_parentid}','{$item.nickname}')"
					    {else} href="javascript:void(0)" onclick="LoginOut();"{/if}>回复</a>&nbsp;&nbsp;
					 {if $oneforum.power eq 1}
					 {if $item.shieldflg}
					 <a href="javascript:changereplyshield('{$item.replyid}',0);void(0)" id="forumreply{$item.replyid}">取消屏蔽</a>
					 {else}
					 <a href="javascript:changereplyshield('{$item.replyid}',0);void(0)" id="forumreply{$item.replyid}">屏蔽</a>
					 {/if}
					 {/if}
					 </td>
					 </tr>
				     </table>
			    </td>
			  </tr>
			  {/foreach}
  <tr>
    <td class="lk_h">&nbsp;</td>
    <td class="rk_h">&nbsp;</td>
  </tr>
</table>
</div>
{/foreach}

</div>




<!--底部-->
<div class="blank10"></div>
<div class="forum_post_new clearfix">
<div class="num">
<DIV class="num_pg">

<script type="text/javascript">
    var pg1 = new showPages('pg1');
	pg1.pageCount = '{$pagecount}';
	pg1.argName = 'p';
	pg1.printHtml();
</script>
</DIV>
</div>
</div>
<!--底部-->


<!--回复-->
<div class="forum_post_fabu top10" id="position">
<form action="forum_home.php?module=sendreply" method="post" name="sendreply" id="sendreply">
<input type="hidden" name="forumid" value="{$oneforum.ID}" id="forumid"/>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top" class="lk">
	<div class="tz_name">{$currentuser.nickname}</div>
    <div class="nlk_pic"><img src="./uploadfiles/user/{$currentuser.photo}" onerror="this.src='./templates/images/schoolbar/avatar.jpeg'" width="128" height="95"/></div>
	</td>
    <td class="rk">
	
	 <!--发回复-->
	 <div class="edit">
	   <div> <textarea id="editor_id" name="editor_id" style="width:740px;height:358px;"></textarea>
              <span id="limitcontent">你还可以输入8000个字符</span></div>
	   <div class="top15">验证码：<input name="checkfield" id="checkfield" type="text"  class="my_txt_120"/>
	   &nbsp;&nbsp;
	   <img src='forum_home.php?module=checkimg'
	   onclick = "this.src='forum_home.php?module=checkimg&nocache='+Math.random();"
	   alt = "点击更换验证码" />
	   <span id = "checknum"></span>
	  </div>
	   <div class="top15">
	   <input name="" type="button"  class="anniu25" value="回复" 
	   {if $smarty.session.loginok eq 1} onclick = "checkpic()"
	   {else} href="javascript:void(0)" onclick="LoginOut();"{/if}/>
	  
       <input name="replyID" id="replyID" type="text" class="anniu25"  value="0" style="display:none"/>
	  </div>
      </div>
     <!--/发回复-->
	
	</td>
  </tr>
</table>
</form>
</div>

<div class="blank10"></div>
<!--/回复-->
</div>
   </div>    


 
   
   <!--友情链接-->
   <div class="blank10"></div>
   <div class="box2 clearfix">
   <div class="case_ll clearfix">
   <div class="lt_main">
   <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="8%" valign="top">友情链接：</td>
    <td width="92%">
	<ul class="friend_link">
	<li><a href="#">大学生校内网</a></li>
	<li><a href="#">校园传媒</a></li>
	<li><a href="#">四川外语学院校</a></li>
	<li><a href="#">重庆文理学院校吧</a></li>
	<li><a href="#">广州动漫培训</a></li>
	<li><a href="#">重庆理工花溪论坛</a></li>
	<li><a href="#">大学生校内网</a></li>
	<li><a href="#">校园传</a></li>
	
	<li><a href="#">大学生校内网</a></li>
	<li><a href="#">校园传媒</a></li>
	<li><a href="#">四川外语学院校</a></li>
	<li><a href="#">重庆文理学院校吧</a></li>
	<li><a href="#">广州动漫培训</a></li>
	<li><a href="#">重庆理工花溪论坛</a></li>
	<li><a href="#">大学生校内网</a></li>
	<li><a href="#">校园传</a></li>
	<li><a href="#">大学生校内网</a></li>
	<li><a href="#">校园传媒</a></li>
	<li><a href="#">四川外语学院校</a></li>
	<li><a href="#">重庆文理学院校吧</a></li>
	<li><a href="#">广州动漫培训</a></li>
	<li><a href="#">重庆理工花溪论坛</a></li>
	<li><a href="#">大学生校内网</a></li>
	<li><a href="#">校园传</a></li>
	</ul>
	</td>
  </tr>
</table>
   
   </div>
   </div>    
   </div>
   <!--/友情链接-->
   <div class="blank10"></div>
   
 <div id="message">  
<div style="padding:20px;"> 
<input type="hidden" name="receiver" id="receiver" value=""/>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="ttbb2">
  <tr>
    <td width="18%">标题：</td>
    <td colspan="2"><input type="text" name="messagetitle" id="messagetitle" class="txt_zhuce"/><span id = "checkmessagetitle"></span></td>
    </tr>
  <tr>
    <td>内容：</td>
    <td width="59%"><textarea name="messagecontent" id="messagecontent" style="width:183px"></textarea><span id = "checkmessagecontent"></span></td>
    
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td height="50" colspan="2" valign="bottom"><input type="button" name="login" value="发送"  class="anniu4" onclick="checkmessage();"/>
	&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" name="" value="取消"  class="anniu4" id = "messageclose"/>	
	</td>
    </tr>
</table>
</div>
</div>
  
   
{include file = barfooter.tpl}
 <script src="./templates/scripts/forum_home.js" type="text/javascript"></script>
