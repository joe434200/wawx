{include file = barheader.tpl}
{literal}
<style>

.home_top_l{ width:310px; height:210px; float:left; background:#ccc;}
.home_top_l li img{width:310px; height:210px;}

.hd_adv{ height:210px; background:#ccc;}
.travel_focus{width:980px;height:210px;overflow:hidden;position:relative;}
.travel_focus ul{height:980px; position:absolute;}
.travel_focus ul li{width:980px;height:290px;overflow:hidden; position:relative; background:#000;}

.travel_focus ul li div{position:absolute; overflow:hidden;}
.travel_focus .btn {position:absolute;height:22px;left:392px;bottom:10px;z-index:200;}
.travel_focus .btn span {display:inline-block; _display:inline; _zoom:1;text-align:center;color:#fff;width:22px;height:22px;line-height:20px;_font-size:0; margin-left:10px; cursor:pointer; background:#333;}
.travel_focus .btn span.on {background:#FF6600;}

/*======== travel_banner end =======*/


.travel_listimg,.travel_listimg ul,.travel_listimg ul li{width:310px;}

.travel_listimg .btn span{-webkit-border-radius:20px;-moz-border-radius:30px;border-radius:12px;margin-left:-50px;}
.travel_listimg .travel_btn{width:310px;height:32px;position:absolute;left:0;top:180px;}
.travel_listimg .travel_btn_bg{position:absolute;left:0;bottom:0;width:310px;height:32px;background:#333;opacity:0.66;filter:alpha(opacity = 66);z-index:1;}
.travel_listimg .btn{left:310px;bottom:5px;}
.travel_listimg .travel_btn_text{color:#fff;position:absolute;left:10px;bottom:0;height:32px;overflow:hidden;white-space:nowrap;text-overflow:ellipsis;line-height:32px;z-index:100;font-size:14px;}
.travel_listimg .travel_btn_text p{height:32px;overflow:hidden;position:relative;}
.travel_banner ul,li,dl,dt,dd{list-style-type:none;float:left;}
.travel_banner p,ul,ol,li{margin:0;padding:0;}

.thRelative{position:relative;top:0;left:0;}
</style>


{/literal}
<script src="./templates/scripts/prototype.js" type="text/javascript"></script>


	<script type="text/javascript" src="./plugin/adimage/js/jquery-1.7.2.min.js"></script>
	<script src="./plugin/adimage/js/travel_list.js" type="text/javascript"></script>
	
	
	
	
	
   
   <div class="blank10"></div>
   <div class="box clearfix blue_bj">
   <div class="Area120 clearfix">
   <div id="float">
   <div class="forum_dh" >
   {if $firstforumtype}
    <ul>
   {foreach from=$firstforumtype item=item key=key}
    <li style="float:none"><a href="forum_home.php?module=home&type={$item.ID}">{$item.name}</a></li>
   {/foreach}
   </ul>
   {/if}
   </div>
   </div>
   <script type="text/javascript" src="./templates/scripts/schoolbar/a.js"></script>
   </div>
   
   
   
   <div class="Area860 clearfix">
   
   
   <div class="forum_right_fix"><img src="./templates/images/schoolbar/forum_adv1.gif" /></div>
   
   		
   
   <div class="blank10"></div>
   <div class="Area650 clearfix">
   <div class="case_ll clearfix">
   
      <div class="lt_info_bankuai">
	  <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="58%"><strong>社区统计：</strong>今日：<span class="af90"><strong>{$forum.counttoday}</strong></span>&nbsp;&nbsp;&nbsp;&nbsp;主题：<span class="af30"><strong>{$forum.countforum}</strong></span>&nbsp;&nbsp;&nbsp;&nbsp;帖子：<span class="a963"><strong>{$forum.countall}</strong></span></td>
    <td width="42%" align="right" class="a963">欢迎: <a href="zone.php?uid={$smarty.session.baseinfo.ID}">
    {if $smarty.session.baseinfo.nickname neq ""}
    {$smarty.session.baseinfo.nickname}
    {else}
    {$smarty.session.baseinfo.email}
    {/if}
    </a>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;<a href="#">新手上路</a>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;
    <a {if $smarty.session.loginok eq 1} 
    href="forum_home.php?module=myforum" 
    {else} href="javascript:void(0)" onclick="LoginOut();"{/if}>我的帖子</a></td>
  </tr>
</table>
	  </div>
	  
      <div class="lt_main">
           <div class="lt_list_l clearfix">
           <div class="travel_banner travel_focus travel_listimg home_top_l " id="travel_focus">
			  <ul>
			    <li><a href="#" target="_blank"><img src="./templates/images/schoolbar/zhuce_bj.gif"  /></a></li>
			    <li><a href="#" target="_blank"><img src="./templates/images/schoolbar/wb_pic2.gif" /></a></li>
			    <li><a href="#" target="_blank"><img src="./templates/images/schoolbar/wb_pic1.gif" /></a></li>
			    <li><a href="#" target="_blank"><img src="./templates/images/schoolbar/wb1.jpg"  /></a></li>
			    <li><a href="#" target="_blank"><img src="./templates/images/schoolbar/tenkenn02.jpg"  /></a></li>
			    <li><a href="#" target="_blank"><img src="./templates/images/schoolbar/wb_pic2.gif"  /></a></li>
			    <li><a href="#" target="_blank"><img src="./templates/images/schoolbar/zhuce_bj.gif"  /></a></li>
			    <li><a href="#" target="_blank"><img src="./templates/images/schoolbar/wb_pic1.gif"  /></a></li>
			  </ul>
		 
			  <div class="travel_btn">
			    <div class="travel_btn_bg"></div>
			    <div class="btn"> <span class="">6</span> <span class="on">5</span> <span class="">4</span> <span class="">3</span> <span class="">2</span> <span class="">1</span> </div>
			      <div class="thRelative" style="width:310px;height:32px;overflow:hidden;">
			        <div class="travel_btn_text">

			        </div>
			     </div>
			  </div>
		</div>
		
		<!-- 广告 -->
			</div>
           <div class="lt_list_rr clearfix">
           
             <div class="lt_toutiao clearfix">
               <ul>
               <li>
               <h3 class="a666_line"><a href="forum_home.php?module=replylist&forumid={$hot[0].ID}">{$hot[0].title}</a></h3>
               </li>
               
               </ul>
             </div>
             
             <div class="lt_tuijian2 clearfix">
             {if $hot}
               <ul class="a666_line">
               {foreach from=$hot item=item key=key} 
               {if $key gt 0 and $key lt 7}
               <li style="float:none"><span class="a999"><a href="zone.php?uid={$item.creater}">{$item.nickname}</a></span>  <a href="forum_home.php?module=replylist&forumid={$item.ID}">[{$item.name}] {$item.title}</a></li>
              {/if}
              {/foreach}
              </ul>
               {/if}
             </div>
           </div>
           
        </div>
   </div>
   
   
   <div class="blank10"></div>
   <div class="case_ll clearfix">
   <div class="lt_info_bankuai">
	  <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><strong>版主：</strong>
	<span class="af90"><strong>{$forum.adminname1}</strong></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<strong>副版主：</strong>
	<span class="a963"><strong>{$forum.adminname2} &nbsp;&nbsp; {$forum.adminname3}</strong></span>
	</td>
    
  </tr>
</table>
</div>
	  
	  
<div class="lt_main">
<!--标题栏-->
<div class="lt_heng_bt">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="7%">排序：</td>
      <td width="53%">
	  <span class="a963"><a href="forum_home.php?module=home&type={$type}&order=1">最新回复</a></span>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
	  <span class="af90"><a href="forum_home.php?module=home&type={$type}&order=2">最新发表</a></span>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
	  <span class="af30"><a href="forum_home.php?module=home&type={$type}&order=3">精华区</a></span></td>
      <td width="13%">作者 | 时间 </td>
      <td width="14%">回复 | 点击 </td>
      <td width="13%">最后发表 </td>
    </tr>
  </table>
</div>
<!--/标题栏-->



<div class="forum_li clearfix">
<ul id="forum_tab">
{if $allforum}
{foreach from=$allforum item=item key=key} 
<li>
    <dl>
	<dd class="li_x"><img src="./templates/images/schoolbar/{$item.imagename}" width="16" height="15" onerror="this.src='./templates/images/schoolbar/avatar.jpeg'"/></dd>
    <dd class="li_a"><em>[{$item.name}]</em>  <a href="forum_home.php?module=replylist&forumid={$item.ID}">{$item.title}</a></dd>
    <dd class="li_b a963"><a href="zone.php?uid={$item.creater}">{$item.nickname}</a><br /><span>{$item.createday}</span></dd>
    <dd class="li_c">{$item.replynum}</dd>
    <dd class="li_e">|&nbsp;&nbsp;{$item.browsercount}</dd>
    <dd class="li_d"><a href="zone.php?uid={$item.replyID}">{$item.replyname}</a><br /><span>{$item.replyday}</span></dd>
    </dl>
</li>
{/foreach}
{/if}
</ul>
{literal}
<script type="text/javascript">
   window.onload = function(){ 
      var Ptr=document.getElementById("forum_tab").getElementsByTagName("li");
      for(i=1;i<Ptr.length+1;i++){
         Ptr[i-1].className = (i%2>0)?"t1":"t2"; 
     }
	 
	}
</script>
{/literal}
</div>




<!--头部发新贴-->
<div class="blank10"></div>
<div class="forum_post_new clearfix">
<div class="faite"> 
<a {if $smarty.session.loginok eq 1} href="forum_home.php?module=new&type={$type}"
{else} href="javascript:void(0)" onclick="LoginOut();"{/if}>
<img src="./templates/images/schoolbar/post5.gif" border="0" /></a>
</div>

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
   
   
<div class="Area200 clearfix">

       <!--注册窗口-->
		<div class="forum_zhuce">
		   <div class="clearfix">
		   
		    
		    {if $smarty.session.loginok eq 1}
		     <h3 class="bottom10">欢迎回来~ </h3>
		    
		     <p align="center">
		     {if $smarty.session.baseinfo.nickname neq ""}
		     {$smarty.session.baseinfo.nickname}
		     {else}
		     {$smarty.session.baseinfo.email}
		     {/if} ~</p>
		     <br/>
		      <p align="center"><input name="" type="button"  class="anniu22" value="注销" onclick="window.location='forum_home.php?module=logout'"/></p>
		     {else}
		      <h3 class="bottom10">账号登录 </h3>
              <form action="forum_home.php" method="post" id="forumlogin" name="forumlogin">
               
                <p><input type="text"  class="lt_txt2" value="账号" name = "email2" id="email2" {if $remember eq "1"} style="display:none;" {/if} onfocus="inputemail()"/></p>
                <p><input type="text"  class="lt_txt2" value="{$ema}"   name = "ema" id="ema" {if $remember eq ""} style="display:none;" {/if} onblur="leaveemail()"/></p>
                  <p><input type="text"  class="lt_txt2" value="密码" name = "password2" id="password2" {if $remember eq "1"} style="display:none;" {/if} onfocus="inputpassword()"/></p>
                <p><input type="password"  class="lt_txt2" value="{$pwd}" name = "pwd" id="pwd" {if $remember eq ""} style="display:none;" {/if} onblur="leavepassword()"/></p>
                <p class="bottom10"><input type="checkbox" name="rememberstatus" id="remember" {if $remember eq "1"} checked="checked" {/if}/>记住密码&nbsp;&nbsp;<a href="reg_reback.php">忘记密码</a></p>
               <p><span id="checkloginid"></span></p>
                <p><input name="" type="button"  class="lt_ann1" value="" onclick="checkforumlogin()"/>
                  <input name="input" type="button"  class="lt_ann3" value="" onclick="window.location='register.php?module=init'"/>
                </p>
              </form>
              {/if}
              </div>
		</div>
	  <!--+注册窗口-->
	  
	  
	  

<div class="blank10"></div>
<!--热点关注 -->
<div class="case3 clearfix">
{literal}
<script type=text/javascript>
	function set_Syn ( i )
	{
		select_Syn(i);
	}
	
	function select_Syn ( i )
	{
		switch(i){
			case 1:
			document.getElementById("Tab_Con1").style.display="block";
			document.getElementById("Tab_Con2").style.display="none";
			document.getElementById("font1").className="select";
			document.getElementById("font2").className="";
			break;
			case 2:
			document.getElementById("Tab_Con1").style.display="none";
			document.getElementById("Tab_Con2").style.display="block";
			document.getElementById("font1").className="";
			document.getElementById("font2").className="select";
			break;
		}
	}
</script>
{/literal}

<div class="forum_side_bt">
   <ul class="xixi1" id="bg">
    <li id="font1" class="select" onclick="set_Syn(1)">热点关注</li>
    <li id="font2" onclick="set_Syn(2)">最新会员</li>
   </ul>
</div>


<div id="Tab_Con1">
<div class="forum_side_hot nn333">
{if $hot}
<ul>
{foreach from=$hot item=item key=key} 
<li><span>{$item.days} {$item.createtime}</span><a href="forum_home.php?module=replylist&forumid={$item.ID}">{$item.title}</a></li>
{/foreach}
</ul>
{/if}
</div>
</div>

<div id=Tab_Con2  style="display:none">
<div class="forum_side_hot nn333">
<ul>
{if $member}
{foreach from=$member item=item key=key} 
<li><span>{$item.days} {$item.createtime}</span><p><img src="./uploadfiles/user/{$item.photo}" width="15" height="14" onerror="this.src='./templates/images/schoolbar/avatar.jpeg'"/></p><a href="wb_index.php?uid={$item.ID}">{$item.nickname}</a></li>
{/foreach}
{/if}
</ul>
</div>
</div>
</div>
<!--热点关注  end-->


<!--最新图片-->
<div class="blank10"></div>
<div class="box_lt clearfix">

<div class="forum_s_bt clearfix"><h3>最新图片</h3></div>
<div class="forum_side_b clearfix a333">
<ul>
{if $newpic}
{foreach from=$newpic item=item key=key}
<li><img src="./uploadfiles/forum/{$item.realname}" width="49" height="48"/><p><a href="./uploadfiles/forum/{$item.realname}">{$item.oldname}</a></p></li>
{/foreach}
{/if}
</ul>
</div>
</div>
<!--最新图片end-->





<!--精彩热卖-->
<div class="blank10"></div>
<div class="box_lt clearfix">
<div class="forum_s_bt clearfix"><h3>精彩热卖</h3></div>
<div class="forum_side_c clearfix a333">
<ul>
<li>
<img src="./templates/images/schoolbar/forum_adv3.gif" />
<div class="a333">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="3" align="center"><a href="#">阿迪达斯运动旅游鞋</a></td>
    </tr>
  <tr>
    <td width="48%" align="right">价格:<span class="forum_yellow">￥20</span></td>
    <td width="4%" align="center">&nbsp;</td>
    <td width="48%">人气:<span class="forum_yellow">56</span></td>
  </tr>
</table>
</div>
</li>
</ul>

</div></div>
<!--精彩热卖 end-->




<!--商家推广-->
<div class="blank10"></div>
<div class="box_lt clearfix">

<div class="forum_s_bt clearfix"><h3>商家推广</h3></div>
<div class="forum_side_d a333 clearfix">
<ul>
<li>
<h3 class="blue"><a href="#">大连将新增10艘海上执法船艇</a></h3>
<p class="a666"><a href="#">石自东再度在卢浮宫2012沙龙展中获奖石自东再度在卢浮宫2012沙龙展中获奖</a></p>
</li>

<li>
<h3 class="blue"><a href="#">大连农民工拿到200万欠薪</a></h3>
<p class="a666"><a href="#">明年大连区市县将启用10个PM2.5监测点明年大连区市县将启用10个PM2.5监测点</a></p>
</li>

<li>
<h3 class="blue"><a href="#">明年大连区市县将启用监测点</a></h3>
<p class="a666"><a href="#">大连将新增10艘海上执法船艇大连将新增10艘海上执法船艇</a></p>
</li>

<li>
<h3 class="blue"><a href="#">石自东再度在卢浮宫2012沙龙展中获奖</a></h3>
<p class="a666"><a href="#">大连168名农民工拿到200万欠薪大连168名农民工拿到200万欠薪</a></p>
</li>
</ul>

<div class="forum_side_adv"><img src="./templates/images/schoolbar/tenkenn02.jpg" /></div>
</div>
</div>
<!--商家推广end-->


</div>
   
   </div>
   </div>
   
   
   
   
   
   
   
   <!--友情链接-->
   <div class="blank10"></div>
   <div class="box clearfix">
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
   
{include file = barfooter.tpl}
 <script src="./templates/scripts/forum_home.js" type="text/javascript"></script>