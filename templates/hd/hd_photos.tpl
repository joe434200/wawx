 {include file=barheader.tpl}

 <div class="blank10"></div>
   
   <div class="box2 clearfix">
      <div class="q_l_btbig a666_b"><span>(共有{$act_info.photonum}张照片)</span>图片</div>
	      
	      <div class="case clearfix">
		  
		  <div class="AreaL2 clearfix">
		  <div class="q_list_pic clearfix">
	         <ul>
	         {foreach from = $data_photo key=key item = item}
	         <li><a href="q_list_pic_show.html"><img src="uploadfiles/activity/hdImage/{$item.realname}" border="0" /></a></li>
	         {/foreach}
	         <!-- 
			 <li><a href="q_list_pic_show.html"><img src="images/2.jpg" border="0" /></a></li>
			 <li><a href="q_list_pic_show.html"><img src="images/3.jpg" border="0" /></a></li>
			 <li><a href="q_list_pic_show.html"><img src="images/4.jpg" border="0" /></a></li>
			 <li><a href="q_list_pic_show.html"><img src="images/5.jpg" border="0" /></a></li>
			 
			 <li><a href="q_list_pic_show.html"><img src="images/6.jpg" border="0" /></a></li>
			 <li><a href="q_list_pic_show.html"><img src="images/7.jpg" border="0" /></a></li>
			 <li><a href="q_list_pic_show.html"><img src="images/1.jpg" border="0" /></a></li>
			 <li><a href="q_list_pic_show.html"><img src="images/2.jpg" border="0" /></a></li>
			 
			 <li><a href="q_list_pic_show.html"><img src="images/4.jpg" border="0" /></a></li>
			 <li><a href="q_list_pic_show.html"><img src="images/3.jpg" border="0" /></a></li>
			 <li><a href="q_list_pic_show.html"><img src="images/5.jpg" border="0" /></a></li>
			 <li><a href="q_list_pic_show.html"><img src="images/6.jpg" border="0" /></a></li>
			 
			 <li><a href="q_list_pic_show.html"><img src="images/2.jpg" border="0" /></a></li>
			 <li><a href="q_list_pic_show.html"><img src="images/1.jpg" border="0" /></a></li>
			 <li><a href="q_list_pic_show.html"><img src="images/7.jpg" border="0" /></a></li>
			 <li><a href="q_list_pic_show.html"><img src="images/3.jpg" border="0" /></a></li>
			 
			 <li><a href="q_list_pic_show.html"><img src="images/4.jpg" border="0" /></a></li>
			 <li><a href="q_list_pic_show.html"><img src="images/5.jpg" border="0" /></a></li>
			 <li><a href="q_list_pic_show.html"><img src="images/6.jpg" border="0" /></a></li>
			 <li><a href="q_list_pic_show.html"><img src="images/2.jpg" border="0" /></a></li>
			  -->
			 </ul>
	      </div>
		  <!--page-->
	   <div class="num_pg">
	     <a href="hd.php?module=hd_photos&hd_id={$act_info.ID}&page_new=1"><<</a>
	    <!--  <strong>1</strong> -->
	     {foreach from = $pages key = key item = item}
	     <a href="hd.php?module=hd_photos&hd_id={$act_info.ID}&page_new={$key}">{$item}</a>
	     {/foreach}
		 
		 <a href="hd.php?module=hd_photos&hd_id={$act_info.ID}&page_new={$count}">>></a>
	   </div>
	   <div class="blank20"></div>
	   <!--/page-->
		  </div>
	      
		 <!-- 
		  <div class="AreaR clearfix">
		  <div class="q_list_pic_show_pl">
		  <h3>图片最新评论</h3>
		  <ul>
		  <li>
		  <p class="ava"><span class="a0693e3"><a href="#">5月的阳光</a></span> 评论 </p>
		  <p class="a0693e3"><a href="q_list_pic_show.html">sdffasf.jpg</a></p>
		  <p>美食广场 韩之味 咖喱猪扒饭 吃的我好撑</p>
		  </li>
		  
		  <li>
		  <p class="ava"><span class="a0693e3"><a href="#">5月的阳光</a></span> 评论 </p>
		  <p class="a0693e3"><a href="q_list_pic_show.html">sdffasf.jpg</a></p>
		  <p>美食广场 韩之味 咖喱猪扒饭 吃的我好撑</p>
		  </li>
		  
		  <li>
		  <p class="ava"><span class="a0693e3"><a href="#">5月的阳光</a></span> 评论 </p>
		  <p class="a0693e3"><a href="q_list_pic_show.html">sdffasf.jpg</a></p>
		  <p>美食广场 韩之味 咖喱猪扒饭 吃的我好撑</p>
		  </li>
		  
		  <li>
		  <p class="ava"><span class="a0693e3"><a href="#">5月的阳光</a></span> 评论 </p>
		  <p class="a0693e3"><a href="q_list_pic_show.html">sdffasf.jpg</a></p>
		  <p>美食广场 韩之味 咖喱猪扒饭 吃的我好撑</p>
		  </li>
		  
		  </ul>
		  </div>
		  
		  
	      </div>
	       --> 
	  </div>
   </div>
	  
   <div class="blank10"></div>
   </div>
     
   </div>
  
  
    <script type="text/javascript" src="./templates/scripts/hd.js"></script>
 {include file=barfooter.tpl}