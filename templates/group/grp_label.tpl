{include file=barheader.tpl}
<!------------------------------------------body-->
   <script src="./templates/scripts/group.js" type="text/javascript"></script>
   <script src="./templates/scripts/prototype.js" type="text/javascript"></script>
<div class="backbj clearfix">

   <script type="text/javascript" src="js/q_upper.js"></script>
   
    <script type="text/javascript" src="js/head.js"></script>
   
   <div class="blank10"></div>
     <!--兴趣圈-类别-->
   <div class="box">
     <div class="case clearfix">
	   <div class="q_bt">标签：{$labelMsg.labelName}</div>
	   
	   <div class="blank15"></div>
	 </div>
   </div>
   
   
   
   
   <div class="blank10"></div>
   
   <div class="box">
   <div class="AreaL">
     
	   
	   <div class="case clearfix">
	   <div class="q_bt q_bj1"><span class=" aff6600">
	   <a href="grp_home.php?module=label&labelID={$labelMsg.labelID}&label={$labelMsg.labelName}&labelnum={$labelMsg.labelNum}"">↑按时间</a>
	   &nbsp;&nbsp;&nbsp;
	   <a href="grp_home.php?module=label&labelID={$labelMsg.labelID}&label={$labelMsg.labelName}&labelnum={$labelMsg.labelNum}&method=member">↑按热度</a>
	   </span><em class=" aff6600">全部</em>&nbsp;&nbsp;&nbsp;共{$labelMsg.labelNum}条</div>
	   
	   
	   <!--全部 list-->
	   <div class="q_list clearfix">
	     <ul class=" clearfix">
		 {foreach from=$rs item=item key=key}
		 <li  class=" clearfix">
		   <div class="pic"><a href="#"><img src="./uploadfiles/group/groupImage/{$item.photo}" border="0" /></a></div>
		   <div class="info  clearfix">
		      <dl>
		      <p class="a0693e3"><a href="grp_single_home.php?ID={$item.gID}">{$item.groupname}</a></p>
			  <dt>话题：{$item.topicnum}&nbsp;&nbsp;&nbsp;&nbsp;成员：{$item.membernum}</dt>
			  <dd>{$item.introduction}</dd>
			  </dl>
		   </div>
		   <div class="ann afff"><a href="grp_single_home.php?ID={$item.gID}">进入圈子</a></div>
		 </li>
		 {/foreach}
		 {if $rs eq null}
		  <li>
		  	<img src="./templates/images/schoolbar/search_3.gif">
		  	亲，没有找到您要的圈子哦！
		  </li>
		 {/if}
		 </ul>
	   </div> <!--/全部 list-->
	   
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
   
   
   
   
   <div class="AreaR">
       
	   
	   <!--搜索圈子-->
	   <div class="case clearfix">
	      <div class="q_bt">搜索圈子</div>
		  <div class="q_search  clearfix">
		  <form action="" method="get">
		    <div class="q_search_txt"><input type="text" value="输入关键字、标签查找"  class="search_txt"/></div>
			<div class="q_search_ann"><input name="" type="button"  value=" "  class="search_ann"/></div>
		  </form>
		  </div>
	   </div>
	   <!--/搜索圈子-->
	   
	   
	   <div class="blank10"></div>
	   <!--创建圈子-->
	   <div class="case clearfix">
	        <div class="q_search_q"><a href="grp_home.php?module=create">创建兴趣圈子</a></div>
	   </div>
	   <!--创建圈子-->
	   
	   
	   
	   
	   <div class="blank10"></div>
	   
	   <!--最新话题-->
	   <div class="case clearfix">
	      <div class="q_bt_r">最新话题</div>
		  <ul class="new_topic a666_b">
		  {foreach from=$newTopic.newTopic item=item key=key}
		  <li>
		     <h3><a href="grp_topic.php?module=scan&topicID={$item.ID}&ID={$item.idt_grp_main}">{$item.title}</a></h3>
			 <p class="a0693e3"><a href="zone.php?uid={$item.uID}">{$item.nickname}</a></p>
		  </li>
		  {/foreach}
		  </ul>
	   </div>
	   <!--/最新话题-->
	   
	   
	   <div class="blank10"></div>
	   <!--圈子达人-->
	    <div class="case clearfix">
	        <div class="q_bt_r"><span class="a0693e3"><a href="#someid" onclick="changeSuperGroup();">换一组</a></span>社团达人</div>
			<input id="super" name="super" value="{$start2}" style="display:none"></input>
			<input id="supernum" name="supernum" value="{$supernum}" style="display:none"></input>
		 <ul class="part4 clearfix a666" id="superlist">
		 {foreach from=$super.super item=item key=key}
		 <li>
	      <img src="./uploadfiles/user/{$item.photo}" />
		  <p class="aff6600"><a href="zone.php?uid={$item.ID}">{$item.nickname}</a></p>
		  
		  <dd class="clearfix">【讨论】<span class="a0693e3"><a href="grp_topic.php?module=scan&ID={$item.topic.0.idt_grp_main}&topicID={$item.topic.0.gID}">{$item.topic.0.title}</a></span>
		  <em>{$item.topic.0.replynum}个回应</em></dd>
	     </li>
	     {/foreach}
		 
	   </ul>
	   </div>
	   <!--圈子达人-->

   </div>  
   </div>
   
   <div class="blank20"></div>
   </div>
  
  
   
  <script type="text/javascript" src="js/q_foot.js"></script>
  
<!------------------------------------------body over-->
{include file=barfooter.tpl}
