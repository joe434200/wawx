{include file = barheader.tpl}
    <script src="./templates/scripts/prototype.js" type="text/javascript"></script>
   <div class="blank10"></div>
   <div class="box clearfix blue_bj">
   <div class="Area120 clearfix">
   <div id="float">
   <div class="forum_dh" >
   {if $firstforumtype}
    <ul>
   {foreach from=$firstforumtype item=item key=key}
    <li><a href="forum_home.php?module=myforum&type={$item.ID}&createrid={$createrid}">{$item.name}</a></li>
   {/foreach}
   </ul>
   {/if}
   </div>
   </div>
   <script type="text/javascript" src="./templates/scripts/schoolbar/a.js"></script>
   </div>
   
   
   
   <div class="Area860 clearfix">
   
 
   
   
   <div class="Area650 clearfix">
    
   
  
   <div class="case_ll clearfix">
 
	  
	  
<div class="lt_main">
<!--标题栏-->
<div class="lt_heng_bt">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="7%">排序：</td>
      <td width="53%">
	  <span class="a963"><a href="forum_home.php?module=myforum&type={$type}&order=1&createrid={$createrid}">最新回复</a></span>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
	  <span class="af90"><a href="forum_home.php?module=myforum&type={$type}&order=2&createrid={$createrid}">最新发表</a></span>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
	  <span class="af30"><a href="forum_home.php?module=myforum&type={$type}&order=3&createrid={$createrid}">精华区</a></span></td>
       <td width="13%"> </td>
      <td width="14%">回复 | 点击 </td>
      <td width="13%">最后发表 </td>
    </tr>
  </table>
</div>
<!--/标题栏-->



<div class="forum_li clearfix">
<ul id="forum_tab" style="height:500px">
{if $allforum}
{foreach from=$allforum item=item key=key} 
<li>
    <dl>
	<dd class="li_x"><img src="./templates/images/schoolbar/{$item.imagename}" /></dd>
    <dd class="li_a"><em>{$item.name}</em>  <a href="forum_home.php?module=replylist&forumid={$item.ID}">{$item.title}</a></dd>
    <dd class="li_b a963"><br /><span></span></dd>
    <dd class="li_c">{$item.replynum}</dd>
    <dd class="li_e">|&nbsp;&nbsp;{$item.browsercount}</dd>
    <dd class="li_d"><a href="#">{$item.replyname}</a><br /><span>{$item.replyday}</span></dd>
    </dl>
</li>
{/foreach}
{/if}
</ul>
</div>




<!--头部发新贴-->

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
<!--/头部发新贴-->
   </div>
   </div>
   </div>
</div>
   

   
   
      
   <div class="blank10"></div>  
{include file = barfooter.tpl}