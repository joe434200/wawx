{include file=barheader.tpl}
    <script type="text/javascript" src="./templates/scripts/prototype.js"></script>
    
        {literal}          
<SCRIPT language="javascript" src="./templates/scripts/schoolbar/dh_soll.js" type="text/javascript"></SCRIPT>      

<SCRIPT type="text/javascript" language="javascript">
if(9>=1){
HD('hdFlag1','1');
}
</SCRIPT>
    {/literal}

<div class="backbj clearfix">

   
   <div class="blank10"></div>
   <div class="box clearfix">
        <div style="position: relative;">
		
        <div class="AreaL clearfix">
		   
		  
		   <!--同城活动-->
		   <div class="case clearfix">
		      <div class="hd_bt clearfix">
			  <p class="hd_ttt">{if $log==1}同城活动 : {/if}{if $log==2}线上活动 : {/if}{if $log==3}本校活动 : {/if}{if $log==4}我的活动 : {/if} </p>
			  <p class="hd_zp">全部</p>
			  <p class="hd_fqhd"><input type="button"  class="hd_ann3" value=""{if $smarty.session.loginok eq 1} onclick="window.location.href='hd.php?module=hd_new&log={$log}'" {else} onclick="LoginOut();" {/if}/></p>
			  </div>
			  
			  <div class="hd_calculate clearfix">
			     <div class="hd_calculate2 clearfix">
			     <input type="hidden" id="list_page" name="list_page" value="1"/>
			     <p>共{$row}个活动</p>
				 <p class="a0693e3"><a href="hd.php?module=hd_list_pages&order=week&page=1&log={$log}">最近一周</a></p>
				 <p class="a0693e3"><a href="hd.php?module=hd_list_pages&order=place&page=1&place={$place.ID}&log={$log}">{$place.place}</a></p>
				 <p class="a0693e3"><a href="hd.php?module=hd_list_pages&order=going&page=1&log={$log}">进行中</a></p>
				 <p class="right a0693e3"><a href="hd.php?module=hd_list_pages&order=ontime&page=1&log={$log}">按时间排序</a></p>
			  </div></div>
			  
			  
			  <div class="hd_activities clearfix">
			     <ul id="act_list">
			  
			    {foreach from =$act_lists key=act_listsKey item = act_list}
    			<li class="clearfix">
				   <div class="pic">{if $act_list.photo}<img src="./uploadfiles/activity/hdImage/{$act_list.photo}"  border="0" />{else}<img src="./templates/images/schoolbar/6.jpg" border="0" />{/if}</div>
				   <div class="info">
				       <h3 class="a0693e3_line"><a href="hd.php?module=hd_list_show1&hd_id={$act_list.ID}">{$act_list.actname}
				       </a></h3>
					   <p>活动时间: {$act_list.begintime} --- {$act_list.endtime}</p>
					   <p>地点：{$act_list.place} </p>
					   <p>发起：<em class="a0693e3"><a href="zone.php?uid={$act_list.uID}">{$act_list.nickname}</a></em></p>
					   <p> <em class="nub1">{$act_list.attentionnum}</em>  人关注&nbsp;&nbsp;&nbsp;<em class="nub2">{$act_list.membernum}</em>  人参加 </p>
				   </div>
				   <div class="tag">
				      <p class="wen">其它</p>
					  <p class="pp">{if $act_list.endtime>=$date_new}<img src="./templates/images/schoolbar/hd_bj5.gif" />{else}活动已经过期{/if}</p>
				   </div>
				 </li>
   				{/foreach}
			  <!--   
				 <li class="clearfix">
				   <div class="pic"><img src="./templates/images/schoolbar/51.jpg" /></div>
				   <div class="info">
				       <h3 class="a0693e3_line"><a href="hd.php?module=hd_list_show">开学了，聚会吧！</a></h3>
					   <p>活动时间：09月01日 16:27 - 不限</p>
					   <p>地点：全国 全省/市 重庆 不限 </p>
					   <p>发起：<em class="a0693e3"><a href="#">任盈盈</a></em></p>
					   <p> <em class="nub1">500</em>  人关注&nbsp;&nbsp;&nbsp;<em class="nub2">8</em>  人参加 </p>
				   </div>
				   <div class="tag">
				      <p class="wen">其它</p>
					  <p class="pp"><img src="./templates/images/schoolbar/hd_bj5.gif" /></p>
				   </div>
				 </li>
				 
				 
				 <li class="clearfix">
				   <div class="pic"><img src="./templates/images/schoolbar/11.jpg" /></div>
				   <div class="info">
				       <h3 class="a0693e3_line"><a href="hd.php?module=hd_list_show">开学了，聚会吧！</a></h3>
					   <p>活动时间：09月01日 16:27 - 不限</p>
					   <p>地点：全国 全省/市 重庆 不限 </p>
					   <p>发起：<em class="a0693e3"><a href="#">任盈盈</a></em></p>
					   <p> <em class="nub1">500</em>  人关注&nbsp;&nbsp;&nbsp;<em class="nub2">8</em>  人参加 </p>
				   </div>
				   <div class="tag">
				      <p class="wen">其它</p>
					  <p class="pp"><img src="./templates/images/schoolbar/hd_bj5.gif" /></p>
				   </div>
				 </li>
				 
				 
				 <li class="clearfix">
				   <div class="pic"><img src="./templates/images/schoolbar/7.jpg" /></div>
				   <div class="info">
				       <h3 class="a0693e3_line"><a href="hd.php?module=hd_list_show">开学了，聚会吧！</a></h3>
					   <p>活动时间：09月01日 16:27 - 不限</p>
					   <p>地点：全国 全省/市 重庆 不限 </p>
					   <p>发起：<em class="a0693e3"><a href="#">任盈盈</a></em></p>
					   <p> <em class="nub1">500</em>  人关注&nbsp;&nbsp;&nbsp;<em class="nub2">8</em>  人参加 </p>
				   </div>
				   <div class="tag">
				      <p class="wen">其它</p>
					  <p class="pp"><img src="./templates/images/schoolbar/hd_bj5.gif" /></p>
				   </div>
				 </li>
				 
				 
				 <li class="clearfix">
				   <div class="pic"><img src="./templates/images/schoolbar/4.jpg" /></div>
				   <div class="info">
				       <h3 class="a0693e3_line"><a href="hd.php?module=hd_list_show">开学了，聚会吧！</a></h3>
					   <p>活动时间：09月01日 16:27 - 不限</p>
					   <p>地点：全国 全省/市 重庆 不限 </p>
					   <p>发起：<em class="a0693e3"><a href="#">任盈盈</a></em></p>
					   <p> <em class="nub1">500</em>  人关注&nbsp;&nbsp;&nbsp;<em class="nub2">8</em>  人参加 </p>
				   </div>
				   <div class="tag">
				      <p class="wen">其它</p>
					  <p class="pp"><img src="./templates/images/schoolbar/hd_bj5.gif" /></p>
				   </div>
				 </li>
				 
				 <li class="clearfix">
				   <div class="pic"><img src="./templates/images/schoolbar/5.jpg" /></div>
				   <div class="info">
				       <h3 class="a0693e3_line"><a href="hd.php?module=hd_list_show">开学了，聚会吧！</a></h3>
					   <p>活动时间：09月01日 16:27 - 不限</p>
					   <p>地点：全国 全省/市 重庆 不限 </p>
					   <p>发起：<em class="a0693e3"><a href="#">任盈盈</a></em></p>
					   <p> <em class="nub1">500</em>  人关注&nbsp;&nbsp;&nbsp;<em class="nub2">8</em>  人参加 </p>
				   </div>
				   <div class="tag">
				      <p class="wen">其它</p>
					  <p class="pp"><img src="./templates/images/schoolbar/hd_bj5.gif" /></p>
				   </div>
				 </li>
				 
				 
				 <li class="clearfix">
				   <div class="pic"><img src="./templates/images/schoolbar/4.jpg" /></div>
				   <div class="info">
				       <h3 class="a0693e3_line"><a href="hd.php?module=hd_list_show">开学了，聚会吧！</a></h3>
					   <p>活动时间：09月01日 16:27 - 不限</p>
					   <p>地点：全国 全省/市 重庆 不限 </p>
					   <p>发起：<em class="a0693e3"><a href="#">任盈盈</a></em></p>
					   <p> <em class="nub1">500</em>  人关注&nbsp;&nbsp;&nbsp;<em class="nub2">8</em>  人参加 </p>
				   </div>
				   <div class="tag">
				      <p class="wen">其它</p>
					  <p class="pp"><img src="./templates/images/schoolbar/hd_bj5.gif" /></p>
				   </div>
				 </li>
				 
				 <li class="clearfix">
				   <div class="pic"><img src="./templates/images/schoolbar/5.jpg" /></div>
				   <div class="info">
				       <h3 class="a0693e3_line"><a href="hd.php?module=hd_list_show">开学了，聚会吧！</a></h3>
					   <p>活动时间：09月01日 16:27 - 不限</p>
					   <p>地点：全国 全省/市 重庆 不限 </p>
					   <p>发起：<em class="a0693e3"><a href="#">任盈盈</a></em></p>
					   <p> <em class="nub1">500</em>  人关注&nbsp;&nbsp;&nbsp;<em class="nub2">8</em>  人参加 </p>
				   </div>
				   <div class="tag">
				      <p class="wen">其它</p>
					  <p class="pp"><img src="./templates/images/schoolbar/hd_bj5.gif" /></p>
				   </div>
				 </li>
				 --> 
				 </ul>
			  </div>
			   <div class="hd_calculate clearfix">
			     <div class="hd_calculate2 clearfix">
				 <p class="right a0693e3">
				 <a href="hd.php?module=hd_list_pages&page=1&log={$log}&order={$order_web}"><<</a>
				{foreach from=$arr key=key item=item}
				<a href="hd.php?module=hd_list_pages&page={$item}&log={$log}&order={$order_web}" >{$item}</a>
				{/foreach}
				 <a href="hd.php?module=hd_list_pages&page={$pages}&log={$log}&order={$order_web}">>></a>
				 </p>
			  </div></div>
	      </div>
		   <!--同城活动-->
		  </div>
		
		
		
		
		
		<div class="AreaR clearfix">
			<!--近期热门活动-->
			<div class="case clearfix">
			  <div class="hd_bt_r">近期热门活动</div>
			  <ul class="hd_hot clearfix">
			  {foreach from=$data_new_hots item=item key=key}
			   <li class="more" id="hdFlag1_B{$key+1}" style="DISPLAY: none">
                <p class="numBig num{$key+1}{$key+1}"></p>
                <p class="img"><a href="hd.php?module=hd_list_show1&hd_id={$item.ID}"><img id="Img_hdFlag1_{$key+1}" ></a></p>
                <div class="info">
                  <h3 class="a0693e3_line"><a href="hd.php?module=hd_list_show1&hd_id={$item.ID}">{$item.actname}</a></h3>
                  <p class="a999"><em class="nub2 cl_f30">{$item.membernum}</em>人</p>
                </div>
               {if $item.photo} <div id="ImgSrc_hdFlag1_{$key+1}"  style="DISPLAY: none">./uploadfiles/activity/hdImage/{$item.photo}</div>
               {else} 
               <div id="ImgSrc_hdFlag1_{$key+1}"  style="DISPLAY: none">./templates/images/schoolbar/1.jpg</div>
               {/if}
               </li>
                    <li class="num{$key+1} listHeight" id="hdFlag1_S{$key+1}" onMouseOver="HD('hdFlag1','{$key+1}')">
              <a href="#">{$item.actname}</a>
              </li>
			  {/foreach}
			  <!--  
              <li class="more" id="hdFlag1_B2" style="DISPLAY: none">
                <p class="numBig num22"></p>
                <p class="img"><a href="#"><img id="Img_hdFlag1_2" ></a></p>
                <div class="info">
                  <h3 class="a0693e3_line"><a href="#">热火半决赛第五场比赛花絮..</a></h3>
                  <p class="a999"><em class="nub2 cl_f30">232</em>人</p>
                </div>
                <div id="ImgSrc_hdFlag1_2"  style="DISPLAY: none">./templates/images/schoolbar/2.jpg</div>
               </li>
  
              <li class="num2 listHeight" id="hdFlag1_S2" onMouseOver="HD('hdFlag1','2')">
              <a href="#">热火半决赛第五场比赛花絮</a>
              </li>
              
              
              
              <li class="more" id="hdFlag1_B3" style="DISPLAY: none">
                <p class="numBig num33"></p>
                <p class="img"><a href="#"><img id="Img_hdFlag1_3" ></a></p>
                <div class="info">
                  <h3 class="a0693e3_line"><a href="#">杰克曼等主演的音乐电影</a></h3>
                  <p class="a999"><em class="nub2 cl_f30">232</em>人</p>
                </div>
                <div id="ImgSrc_hdFlag1_3"  style="DISPLAY: none">./templates/images/schoolbar/3.jpg</div>
               </li>
  
              <li class="num3 listHeight" id="hdFlag1_S3" onMouseOver="HD('hdFlag1','3')">
              <a href="#">杰克曼等主演的音乐电影</a>
              </li>
              
              <li class="more" id="hdFlag1_B4" style="DISPLAY: none">
                <p class="numBig num44"></p>
                <p class="img"><a href="#"><img id="Img_hdFlag1_4" ></a></p>
                <div class="info">
                  <h3 class="a0693e3_line"><a href="#">杰克曼等主演的音乐电影</a></h3>
                  <p class="a999"><em class="nub2 cl_f30">232</em>人</p>
                </div>
                <div id="ImgSrc_hdFlag1_4"  style="DISPLAY: none">./templates/images/schoolbar/4.jpg</div>
               </li>
  
              <li class="num4 listHeight" id="hdFlag1_S4" onMouseOver="HD('hdFlag1','4')">
              <a href="#">杰克曼等主演的音乐电影</a>
              </li>
              
             
              <li class="more" id="hdFlag1_B5" style="DISPLAY: none">
                <p class="numBig num55"></p>
                <p class="img"><a href="#"><img id="Img_hdFlag1_5" ></a></p>
                <div class="info">
                  <h3 class="a0693e3_line"><a href="#">杰克曼等主演的音乐电影</a></h3>
                  <p class="a999"><em class="nub2 cl_f30">232</em>人</p>
                </div>
                <div id="ImgSrc_hdFlag1_5"  style="DISPLAY: none">./templates/images/schoolbar/5.jpg</div>
               </li>
  
              <li class="num5 listHeight" id="hdFlag1_S5" onMouseOver="HD('hdFlag1','5')">
              <a href="#">杰克曼等主演的音乐电影</a>
              </li>
              
              
              
              
              
              <li class="more" id="hdFlag1_B6" style="DISPLAY: none">
                <p class="numBig num66"></p>
                <p class="img"><a href="#"><img id="Img_hdFlag1_6" ></a></p>
                <div class="info">
                  <h3 class="a0693e3_line"><a href="#">杰克曼等主演的音乐电影</a></h3>
                  <p class="a999"><em class="nub2 cl_f30">232</em>人</p>
                </div>
                <div id="ImgSrc_hdFlag1_6"  style="DISPLAY: none">./templates/images/schoolbar/6.jpg</div>
               </li>
  
              <li class="num6 listHeight" id="hdFlag1_S6" onMouseOver="HD('hdFlag1','6')">
              <a href="#">杰克曼等主演的音乐电影</a>
              </li>
              
              
              <li class="more" id="hdFlag1_B7" style="DISPLAY: none">
                <p class="numBig num77"></p>
                <p class="img"><a href="#"><img id="Img_hdFlag1_7" ></a></p>
                <div class="info">
                  <h3 class="a0693e3_line"><a href="#">韩国娱乐明星"鸟叔"的名字翻译</a></h3>
                  <p class="a999"><em class="nub2 cl_f30">232</em>人</p>
                </div>
                <div id="ImgSrc_hdFlag1_7"  style="DISPLAY: none">./templates/images/schoolbar/7.jpg</div>
               </li>
  
              <li class="num7 listHeight" id="hdFlag1_S7" onMouseOver="HD('hdFlag1','7')">
              <a href="#">韩国娱乐明星"鸟叔"的名字翻译</a>
              </li>
              
              
              <li class="more" id="hdFlag1_B8" style="DISPLAY: none">
                <p class="numBig num88"></p>
                <p class="img"><a href="#"><img id="Img_hdFlag1_8" ></a></p>
                <div class="info">
                  <h3 class="a0693e3_line"><a href="#">是一款即拍即译的专业翻译软件</a></h3>
                  <p class="a999"><em class="nub2 cl_f30">232</em>人</p>
                </div>
                <div id="ImgSrc_hdFlag1_8"  style="DISPLAY: none">./templates/images/schoolbar/11.jpg</div>
               </li>
  
              <li class="num8 listHeight" id="hdFlag1_S8" onMouseOver="HD('hdFlag1','8')">
              <a href="#">是一款即拍即译的专业翻译软件</a>
              </li>
              
              
              <li class="more" id="hdFlag1_B9" style="DISPLAY: none">
                <p class="numBig num99"></p>
                <p class="img"><a href="#"><img id="Img_hdFlag1_9" ></a></p>
                <div class="info">
                  <h3 class="a0693e3_line"><a href="#">是一款即拍即译的专业翻译软件</a></h3>
                  <p class="a999"><em class="nub2 cl_f30">232</em>人</p>
                </div>
                <div id="ImgSrc_hdFlag1_9"  style="DISPLAY: none">./templates/images/schoolbar/10.jpg</div>
               </li>
  
              <li class="num9 listHeight" id="hdFlag1_S9" onMouseOver="HD('hdFlag1','9')">
              <a href="#">是一款即拍即译的专业翻译软件</a>
            </li>
    
           -->
			  </ul>
			</div>
			<!--/近期热门活动-->
			
			
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
   
   
   
 
   <div class="blank10"></div>
   </div>
  
  
     <script type="text/javascript" src="./templates/scripts/hd.js"></script>
 {include file=barfooter.tpl}
  
  

