{include file=spaceheader.tpl}

<div class="blank10"></div>
<div class="block  blue_s">

<div class="AreaL750">
<!--日志模版-->
<div class="box_lt clearfix">
  <div class="title_bt blue_s">日志分类管理</div>
  <div class="space_daily_kri">
  <ul id="centerList">
  {foreach from=$catalog item=item key=key}
  {if $key eq "0"}
  <li><span>(此分类不支持编辑及删除)</span><a href="#">默认分类</a></li>
  {else}
  <li><span><a href="#">编辑</a>&nbsp;&nbsp;<a href="#">删除</a></span><a href="#">{$item.name}</a></li>
  {/if}
  {/foreach}
  </ul>
  </div>
  <div class="space_daily_add">
  <form action="" method="get" >
  <input name="" type="text"  class="my_txt_220" id="newDiary" onfocus="javascript:setEnterEorrer(this,false,'')"/>&nbsp;&nbsp;
  <input name="" type="button"  value="添加" class="anniu25" onclick="javascript:CreateNewDiary()" onfocus="javascript:setEnterEorrer('newDiary',false,'')"/>
  </form>
  </div>
  
</div>
<!--日志模版 结束-->
</div>

<!--日志分类-->
<div class="AreaRR">
<div class="box_lt clearfix">
  <div class="title_bt"><span><a href="#">管理</a></span><a href="#">分类</a></div>
  <div class="space_daily_kri">
  <ul id="rightList">
  {foreach from=$catalog item=item key=key}
  <li><span>({$item.sum})</span><a href="#">{$item.name}</a></li>
  {/foreach}
  </ul>
  </div>
  

</div>
</div>
<!--/日志分类-->




</div>

<div class="blank10"></div>
{include file=barfooter.tpl}