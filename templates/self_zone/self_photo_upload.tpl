{include file=spaceheader.tpl}
{include file=uploadify.tpl}
{literal}
<script type="text/javascript">
//window.onload=function(){addpars("album","album");}
</script>
{/literal}

<input type="hidden" id="handler_path" value="self_photo_upload.php?album={$album[0].ID}"/>


<div class="blank10"></div>
<div class="block  blue_s">

<div class="AreaL750">
<!--相册模版-->
<div class="box_lt clearfix">
  <div class="title_bt blue_s">上传照片</div>
  <div class="upload">
  <div class="pic_upload_sel">
  
  <table>
  <tr>
  <td colspan="2">
  <input align="bottom" type="button"  class="anniu27" value="" id="J_selectImage"/>
  </td>
  <td>&nbsp;</td>
  <td colspan="2">
  <label>上传到：</label><select name="" id="album" onchange="javascript:addUploadParas()">
    {foreach from=$album  item=item key=key}
    <option value="{$item.ID}">{$item.albumname}</option>
    {/foreach}
  </select>
  </td>
  </tr>
  </table>
  
  
  
	
  </div>
  
  <div class="pic_upload_sel">
  <a href="javascript:void(0)">相册列表</a>
  </div>
  <!-- 
 <div id="J_imageView"></div>
  -->
	  	
  <div class="pic_upload clearfix" >
  
  <br/>
  <ul>
  {foreach from=$album item=item key=key}
  <li><a href="javascript:void(0)" onclick="javascript:window.location='self_photo.php?module=album&alb={$item.ID}'"><img src="./templates/images/schoolbar/wb_pic1.gif" border="0" /><p>{$item.albumname}</p></a></li>
  {/foreach}
  </ul>
  </div>
 
  </div>
</div>
<!--相册模版 结束-->
</div>

<!--相册分类-->
<div class="AreaRR">
<div class="box_lt clearfix">
  <div class="title_bt"><span><a href="#">管理</a></span><a href="javascript:void()">相册分类</a></div>
  <div class="space_daily_kri">
  <ul>
  {if !empty($album)}
      {foreach from=$album item=item key=key}
      <li><span>({$item.sum})</span><a href="javascript:void(0)" onclick="javascript:window.location='self_photo.php?module=album&alb={$item.ID}'">{$item.albumname}</a></li>
      {/foreach}
  {else}
  	  <li><a href="javascript:void(0)">No Albums</a></li>
  {/if}
  </ul>
  </div>
  

</div>
</div>
<!--/相册分类-->




</div>

<div class="blank10"></div>

{include file=barfooter.tpl}
