{include file=barheader.tpl}
{literal}
<style>

.home_top_l{ width:780px; height:290px; float:left; background:#ccc;}
.home_top_l li img{width:780px; height:290px;}

.hd_adv{ height:300px; background:#ccc;}
.travel_focus{width:980px;height:290px;overflow:hidden;position:relative;}
.travel_focus ul{height:980px; position:absolute;}
.travel_focus ul li{width:980px;height:290px;overflow:hidden; position:relative; background:#000;}

.travel_focus ul li div{position:absolute; overflow:hidden;}
.travel_focus .btn {position:absolute;height:22px;left:392px;bottom:10px;z-index:200;}
.travel_focus .btn span {display:inline-block; _display:inline; _zoom:1;text-align:center;color:#fff;width:22px;height:22px;line-height:20px;_font-size:0; margin-left:10px; cursor:pointer; background:#333;}
.travel_focus .btn span.on {background:#FF6600;}
.travel_focus .preNext{width:45px;height:50px;position:absolute;top:80px;background:url(./plugin/multiimage/images/destin_main.png) no-repeat -4px -52px; cursor:pointer;}
.travel_focus .pre {left:0;}
.travel_focus .next {right:0; background-position:-50px 0;}
/*======== travel_banner end =======*/


.travel_listimg,.travel_listimg ul,.travel_listimg ul li{width:738px;}

.travel_listimg .btn span{-webkit-border-radius:12px;-moz-border-radius:12px;border-radius:12px;margin-left:5px;}
.travel_listimg .travel_btn{width:700px;height:32px;position:relative;left:0;top:258px;}
.travel_listimg .travel_btn_bg{position:absolute;left:0;bottom:0;width:700px;height:32px;background:#333;opacity:0.66;filter:alpha(opacity = 66);z-index:1;}
.travel_listimg .btn{left:510px;bottom:5px;}
.travel_listimg .travel_btn_text{color:#fff;position:absolute;left:10px;bottom:0;height:32px;overflow:hidden;white-space:nowrap;text-overflow:ellipsis;line-height:32px;z-index:100;font-size:14px;}
.travel_listimg .travel_btn_text p{height:32px;overflow:hidden;position:relative;}
</style>
 <link href="./plugin/adimage/travel.css" rel="stylesheet" type="text/css" />

{/literal}



	<script type="text/javascript" src="./plugin/adimage/js/jquery-1.7.2.min.js"></script>
	<script src="./plugin/adimage/js/travel_list.js" type="text/javascript"></script>
<div class="backbj clearfix">


   <div class="blank10"></div>
   <div class="box clearfix">
        <div style="position: relative;">
		
        <div class="AreaL clearfix">
        <!-- 
		<div class="hd_adv clearfix"><img src="./templates/images/schoolbar/hd_adv.gif" /></div>
		 -->
		 <!-- 广告 -->
	      <div class="travel_banner travel_focus travel_listimg home_top_l" id="travel_focus">
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
			    <div class="btn"> <span class="">1</span> <span class="on">2</span> <span class="">3</span> <span class="">4</span> <span class="">5</span> <span class="">6</span> </div>
			      <div class="thRelative" style="width:700px;height:32px;overflow:hidden;">
			        <div class="travel_btn_text">
			        <p>杜莎夫人蜡像馆+山顶缆车+摩天台+游艇游维港+酒店，绝对超值！</p>
			        <p>兴业银行信用卡约惠全球，加订更优惠！</p>
			        <p>香港快速过关，团队L签不跟团</p>
			        <p>精彩景点全囊括，包含香港迪士尼、海洋公园等！</p>
			        <p>香港快速过关，团队L签不跟团</p>
			        <p>优质香港游</p>
			        <p>优质香港游</p>
			        <p>优质香港游</p>
			        </div>
			     </div>
			  </div>
		</div>
		
		<!-- 广告 -->
		   
		   
		   <!--推荐活动-->
		   <div class="blank10"></div>
		   <div class="case clearfix">
		      <div class="hd_bt cl_f60">推荐活动</div>
		      <div class="hd_groom clearfix">
			    <ul>
			     {foreach from =$act_hots key=key item = act_hot}
				<li><a href="hd.php?module=hd_list_show1&hd_id={$act_hot.ID}">{if $act_hot.photo}<img src={$act_hot.photo}  border="0" />{else}<img src="./templates/images/schoolbar/6.jpg" border="0" />{/if}</a>
				<p class="bt a0693e3"><a href="hd.php?module=hd_list_show1&hd_id={$act_hot.ID}">{$act_hot.actname}</a></p>
				<p class="a999">{$act_hot.attentionnum}人关注</p>
				</li>
				{/foreach}
				<!-- 
				<li><a href="hd_list.html"><img src="./templates/images/schoolbar/11.jpg" border="0" /></a>
				<p class="bt a0693e3"><a href="hd_list.html">模拟招聘大赛</a></p>
				<p class="a999">3668人关注</p>
				</li>
				
				<li><a href="hd_list.html"><img src="./templates/images/schoolbar/7.jpg" border="0" /></a>
				<p class="bt a0693e3"><a href="hd_list.html">模拟招聘大赛</a></p>
				<p class="a999">3668人关注</p>
				</li>
				
				<li><a href="hd_list.html"><img src="./templates/images/schoolbar/6.jpg" border="0" /></a>
				<p class="bt a0693e3"><a href="hd_list.html">模拟招聘大赛</a></p>
				<p class="a999">3668人关注</p>
				</li>
				
				<li><a href="hd_list.html"><img src="./templates/images/schoolbar/7.jpg" border="0" /></a>
				<p class="bt a0693e3"><a href="hd_list.html">模拟招聘大赛</a></p>
				<p class="a999">3668人关注</p>
				</li>
				 -->
				</ul>
			  </div>
		   </div>
		   <!--/推荐活动-->
		   
		   
		   
		   <!--近期同城活动-->
		   <div class="blank10"></div>
		   <div class="case clearfix">
		      <div class="hd_bt">近期同城活动</div>
			  <div class="hd_new_city">
			  
			     <div class="hd_new_city_tab">
				 <ul class="a6_f">
				 <li class="sel"><a href="hd.php?module=hd_list&log=1">热门活动</a>	</li>
				 <li><a href="hd.php?module=hd_list_time&log=1">最新活动</a>	</li>
				 </ul>
				 <span class="arrow aff6600"><a href="hd.php?module=hd_list&log=1">更多同城活动</a></span>
				 </div>
				 
				 
				 <div class="hd_new_city_con clearfix">
				   <ul>
				    {foreach from =$act_citys key=act_citysKey item = act_city}
				   <li>
				    <a href="hd.php?module=hd_list_show1&hd_id={$act_city.ID}">{if $act_city.photo}<img src={$act_city.photo}  border="0" />{else}<img src="./templates/images/schoolbar/6.jpg" border="0" />{/if}</a> 
					   <p class="bt a0693e3"><a href="hd.php?module=hd_list_show1&hd_id={$act_city.ID}">{$act_city.actname}</a></p>
					   <p>{$act_city.begintime}---{$act_city.endtime}</p>
					   <p class="a999">{$act_city.place}</p>
					   <p class="a0693e3"><a href="hd.php?module=hd_list_show1&hd_id={$act_city.ID}">{$act_city.schoolname}</a></p>
					   <p class="a999">{$act_city.attentionnum}关注</p>
				   </li>
				   {/foreach}
				  <!--  
				   <li>
				       <a href="hd_list.html"><img src="./templates/images/schoolbar/7.jpg" border="0" /></a>
					   <p class="bt a0693e3"><a href="hd_list.html">感恩中国</a></p>
					   <p>01月07日-03月05日</p>
					   <p class="a999">全国</p>
					   <p class="a0693e3"><a href="hd_list.html">中国工商学院</a></p>
					   <p class="a999">1234关注</p>
				   </li>
				   
				   <li>
				       <a href="hd_list.html"><img src="./templates/images/schoolbar/3.jpg" border="0" /></a>
					   <p class="bt a0693e3"><a href="hd_list.html">感恩中国</a></p>
					   <p>01月07日-03月05日</p>
					   <p class="a999">全国</p>
					   <p class="a0693e3"><a href="hd_list.html">中国工商学院</a></p>
					   <p class="a999">1234关注</p>
				   </li>
				   
				   <li>
				       <a href="hd_list.html"><img src="./templates/images/schoolbar/11.jpg" border="0" /></a>
					   <p class="bt a0693e3"><a href="hd_list.html">感恩中国</a></p>
					   <p>01月07日-03月05日</p>
					   <p class="a999">全国</p>
					   <p class="a0693e3"><a href="hd_list.html">中国工商学院</a></p>
					   <p class="a999">1234关注</p>
				   </li>
				   
				   <li>
				       <a href="hd_list.html"><img src="./templates/images/schoolbar/10.jpg" border="0" /></a>
					   <p class="bt a0693e3"><a href="hd_list.html">感恩中国</a></p>
					   <p>01月07日-03月05日</p>
					   <p class="a999">全国</p>
					   <p class="a0693e3"><a href="hd_list.html">中国工商学院</a></p>
					   <p class="a999">1234关注</p>
				   </li>
				   
				   <li>
				       <a href="hd_list.html"><img src="./templates/images/schoolbar/4.jpg" border="0" /></a>
				     <p class="bt a0693e3"><a href="hd_list.html">感恩中国</a></p>
					   <p>01月07日-03月05日</p>
					   <p class="a999">全国</p>
					   <p class="a0693e3"><a href="hd_list.html">中国工商学院</a></p>
					   <p class="a999">1234关注</p>
				   </li>
				   
				   <li>
				       <a href="hd_list.html"><img src="./templates/images/schoolbar/11.jpg" border="0" /></a>
					   <p class="bt a0693e3"><a href="hd_list.html">感恩中国</a></p>
					   <p>01月07日-03月05日</p>
					   <p class="a999">全国</p>
					   <p class="a0693e3"><a href="hd_list.html">中国工商学院</a></p>
					   <p class="a999">1234关注</p>
				   </li>
				   
				   <li>
				       <a href="hd_list.html"><img src="./templates/images/schoolbar/10.jpg" border="0" /></a>
					   <p class="bt a0693e3"><a href="hd_list.html">感恩中国</a></p>
					   <p>01月07日-03月05日</p>
					   <p class="a999">全国</p>
					   <p class="a0693e3"><a href="hd_list.html">中国工商学院</a></p>
					   <p class="a999">1234关注</p>
				   </li>
				   
				   <li>
				       <a href="hd_list.html"><img src="./templates/images/schoolbar/4.jpg" border="0" /></a>
				     <p class="bt a0693e3"><a href="hd_list.html">感恩中国</a></p>
					   <p>01月07日-03月05日</p>
					   <p class="a999">全国</p>
					   <p class="a0693e3"><a href="hd_list.html">中国工商学院</a></p>
					   <p class="a999">1234关注</p>
				   </li>
				   
				   <li>
				       <a href="hd_list.html"><img src="./templates/images/schoolbar/11.jpg" border="0" /></a>
					   <p class="bt a0693e3"><a href="hd_list.html">感恩中国</a></p>
					   <p>01月07日-03月05日</p>
					   <p class="a999">全国</p>
					   <p class="a0693e3"><a href="hd_list.html">中国工商学院</a></p>
					   <p class="a999">1234关注</p>
				   </li>
				   
				   <li>
				       <a href="hd_list.html"><img src="./templates/images/schoolbar/10.jpg" border="0" /></a>
					   <p class="bt a0693e3"><a href="hd_list.html">感恩中国</a></p>
					   <p>01月07日-03月05日</p>
					   <p class="a999">全国</p>
					   <p class="a0693e3"><a href="hd_list.html">中国工商学院</a></p>
					   <p class="a999">1234关注</p>
				   </li>
				   
				   <li>
				       <a href="hd_list.html"><img src="./templates/images/schoolbar/4.jpg" border="0" /></a>
				     <p class="bt a0693e3"><a href="hd_list.html">感恩中国</a></p>
					   <p>01月07日-03月05日</p>
					   <p class="a999">全国</p>
					   <p class="a0693e3"><a href="hd_list.html">中国工商学院</a></p>
					   <p class="a999">1234关注</p>
				   </li>
				   -->
				   </ul>
			    </div>
				 
			  </div>
	      </div>
		   <!--近期同城活动-->
		   
		   
		   <!--热门线上活动-->
		   <div class="blank10"></div>
		   <div class="case clearfix">
		      <div class="hd_bt cl_f60">
			  <span class="arrow aff6600"><a href="hd.php?module=hd_list&log=2">更多线上活动</a></span>
			  热门线上活动</div>
		      <div class="hd_groom clearfix">
			    <ul>
			     {foreach from =$act_city_onlines key=act_city_onlinesKey item = act_city_online}
				<li><a href="hd.php?module=hd_list_show1&hd_id={$act_city_online.ID}">{if $act_city_online.photo}<img src={$act_city_online.photo}  border="0" />{else}<img src="./templates/images/schoolbar/6.jpg" border="0" />{/if}</a>
				<p class="bt a0693e3"><a href="hd.php?module=hd_list_show1&hd_id={$act_city_online.ID}"><strong>{$act_city_online.actname}</strong></a></p>
				<p class="a999"><a href="zone.php?uid={$act_city_online.uID}">{$act_city_online.nickname}</a></p>
				</li>
				{/foreach}
				<!--  
				<li><a href="hd_list.html"><img src="./templates/images/schoolbar/6.jpg" border="0" /></a>
				<p class="bt a0693e3"><a href="hd_list.html"><strong>模拟招聘大赛</strong></a></p>
				<p class="a999"><a href="hd_list.html">小小回忆</a></p>
				</li>
				
				<li><a href="hd_list.html"><img src="./templates/images/schoolbar/5.jpg" border="0" /></a>
				<p class="bt a0693e3"><a href="hd_list.html"><strong>模拟招聘大赛</strong></a></p>
				<p class="a999"><a href="hd_list.html">小小回忆</a></p>
				</li>
				
				<li><a href="hd_list.html"><img src="./templates/images/schoolbar/4.jpg" border="0" /></a>
				<p class="bt a0693e3"><a href="hd_list.html"><strong>模拟招聘大赛</strong></a></p>
				<p class="a999"><a href="hd_list.html">小小回忆</a></p>
				</li>
				
				<li><a href="hd_list.html"><img src="./templates/images/schoolbar/4.jpg" border="0" /></a>
				<p class="bt a0693e3"><a href="hd_list.html"><strong>模拟招聘大赛</strong></a></p>
				<p class="a999"><a href="hd_list.html">小小回忆</a></p>
				</li>
				-->
				
				
				</ul>
			  </div>
		   </div>
		   <!--/热门线上活动-->
		   
		   
		  
		   
		   
		   <!--专题活动-->
		   <div class="blank10"></div>
		   <div class="case clearfix">
		      <div class="hd_bt cl_f60">
			  <span class="arrow aff6600"><a href="hd.php?module=hd_list&flg=1">更多专题活动</a></span>
			  专题活动</div>
		      <div class="hd_active clearfix">
			    <ul>
			  
			    {foreach from=$data_themes key=key item=item}
				<li>
				    <div class="pic"><a href="hd.php?module=hd_list_show1&hd_id={$item.ID}">{if $item.photo}<img src={$item.photo}  border="0" />{else}<img src="./templates/images/schoolbar/28.jpg" border="0" />{/if}</a></div>
					<div class="wen"><a href="hd.php?module=hd_list_show1&hd_id={$item.ID}">{$item.actname}</a></div>
				</li>
				{/foreach}
				
				<!--  
				<li>
				    <div class="pic"><a href="hd_list.html"><img src="./templates/images/schoolbar/28.jpg" border="0" /></a></div>
					<div class="wen"><a href="hd_list.html">逛逛街活动开始啦</a></div>
				</li>
				
				<li>
				    <div class="pic"><a href="hd_list.html"><img src="./templates/images/schoolbar/28.jpg" border="0" /></a></div>
					<div class="wen"><a href="hd_list.html">逛逛街活动开始啦</a></div>
				</li>
				-->
				</ul>
			  </div>
		   </div>
		   <!--/专题活动-->
			
		</div>
		
		
		
		<div class="AreaR clearfix">
		    <!--/导航-->
		    <div class="case clearfix">
			   <div class="fun_active clearfix">
			    
	   <div class="q_new_a clearfix">
	   <ul>
	   <li><a href="hd.php?module=hd_list&log=1" target="_blank">同城活动</a></li>
	   <li><a href="hd.php?module=hd_list&log=2" target="_blank">线上活动</a></li>
	   <li><a href="hd.php?module=hd_list&log=3" target="_blank">本校活动</a></li>
	   <li><a href="hd.php?module=hd_list&log=4" target="_blank">我的活动</a></li>
	   </ul>
	   </div>
				 
				 <p align="center"><input type="button"  class="fun_ann" value=" "{if $smarty.session.loginok eq 1} onClick="window.location.href='hd.php?module=hd_new' " {else} onclick="LoginOut();"{/if}/>
				 </p>
			   </div>
			</div>
			<!--/导航-->
			
			<!--/往期回顾的活动-->
			<div class="blank10"></div>
			<div class="case clearfix">
			  <div class="hd_bt_r">往期回顾的活动</div>
			  <ul class="hd_old clearfix">
			  {foreach from=$data_times key=key item=data_time}
			  <li><a href="hd.php?module=hd_list_show1&hd_id={$data_time.ID}">{if $data_time.photo}<img src={$data_time.photo}  border="0" />{else}<img src="./templates/images/schoolbar/43.jpg" border="0" />{/if}</a>
			      <p class="bt a0693e3"><a href="hd.php?module=hd_list_show1&hd_id={$data_time.ID}">{$data_time.actname}</a></p>
				  <p class="info"><span class="cl_f60">{$data_time.attentionnum}</span>人关注&nbsp;&nbsp;&nbsp;<span class="cl_f60">{$data_time.membernum}</span>人参加</p>
			  </li>
			  {/foreach}
			  <!--  
			  <li><a href="3"><img src="./templates/images/schoolbar/43.jpg" border="0" /></a>
			      <p class="bt a0693e3"><a href="hd_list.html">送祝福，得王老吉</a></p>
				  <p class="info"><span class="cl_f60">39914</span>人关注&nbsp;&nbsp;&nbsp;<span class="cl_f60">28</span>人参加</p>
			  </li>
			  -->
			  
			  </ul>
			</div>
			<!--/往期回顾的活动-->
			
			
			
			
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
			      <p class="bt a0693e3"><a href="hd_list.html">送祝福，得王老吉</a></p>
				  <p>28人参加</p>
				  </div>  
			  </li>
			  
			  
			  <li>
			      <a href="3"><img src="./templates/images/schoolbar/43.jpg" border="0" /></a>
			      <div class="info">
				  <div class="hd_over">晒照片</div>
			      <p class="bt a0693e3"><a href="hd_list.html">送祝福，得王老吉</a></p>
				  <p>28人参加</p>
				  </div>  
			  </li>
			  -->
			  </ul>
			</div>
			<!--/你可能喜欢的活动-->
			
			
			
			<!--/社团活动-->
			<div class="blank10"></div>
			<div class="case clearfix">
			  <div class="hd_bt_r aff6600"><span class="arrow"><a href="hd_list.html">社团入住通道</a></span>社团活动</div>
			  <div class="hd_part">
			    <a href="hd_list.html"><img src="./templates/images/schoolbar/96.jpg" border="0" /></a> </div>
			</div>
			<!--/社团活动-->
			
		</div>
		
   </div>
   </div>
   
   
   
 
   <div class="blank10"></div>
   </div>
  
  
   
    <script type="text/javascript" src="./templates/scripts/hd.js"></script>
 {include file=barfooter.tpl}

