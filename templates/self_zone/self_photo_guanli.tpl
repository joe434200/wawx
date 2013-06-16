{include file=spaceheader.tpl}




<div class="blank10"></div>
<div class="block  blue_s">

<div class="AreaL750">
<!--相册模版-->
<div class="box_lt clearfix">
  <div class="title_bt blue_s">相册分类管理</div>
  <div class="space_daily_kri">
  <ul id="centerList">  
  {if $album neq ''}
 	 {foreach from=$album item=item key=key}
 	 	{if $key eq 0}
 	 	<li><span>(此分类不支持编辑及删除)</span><a href="#">默认相册</a></li>
 	 	{else}
  		<li><span><a href="#">编辑</a>&nbsp;&nbsp;<a href="#">删除</a></span><a href="#" onclick="javascript:window.location='self_photo.php?module=album&alb={$item.ID}'">{$item.albumname}</a></li>
  		{/if}
  	 {/foreach}
  {else}
  		<li><a href="#">No Albums</a></li>
  {/if}
  <!-- 
  <li><span>(此分类不支持编辑及删除)</span><a href="#">全部相册</a></li>
  <li><span><a href="#">编辑</a>&nbsp;&nbsp;<a href="#">删除</a></span><a href="#">个人日记</a></li>
  <li><span><a href="#">编辑</a>&nbsp;&nbsp;<a href="#">删除</a></span><a href="#">天下咋聊</a></li>
   -->
  </ul>
  </div>
  <div class="space_daily_add">
  <form action="" method="get" >
  <input name="" type="text"  class="my_txt_220" id="newAlbum" onfocus="setEnterEorrer(this,false,'')"/>&nbsp;&nbsp;
  <input name="" type="button"  value="创建" class="anniu25" onclick="javascript:CreateNewAlbum()"/>
  </form>
  </div>
  
</div>
<!--相册模版 结束-->
</div>

<!--相册分类-->
<div class="AreaRR">
<div class="box_lt clearfix">
  <div class="title_bt"><span><a href="#">管理</a></span><a href="#">相册分类</a></div>
  <div class="space_daily_kri">
  <ul id="rightList">
  {if !empty($album)}
      {foreach from=$album item=item key=key}
      <li><span>({$item.sum})</span><a href="#" onclick="javascript:window.location='self_photo.php?module=album&alb={$item.ID}'">{$item.albumname}</a></li>
      {/foreach}
  {else}
  	  <li><a href="#">No Albums</a></li>
  {/if}
  <!-- 
  <li><span>(20)</span><a href="#">全部相册</a></li>
  <li><span>(20)</span><a href="#">个人日记</a></li>
  <li><span>(20)</span><a href="#">天下咋聊</a></li>
   -->
  </ul>
  </div>
  

</div>
</div>
<!--/相册分类-->




</div>

<div class="blank10"></div>


{include file=barfooter.tpl}