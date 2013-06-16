{include file=userheader.tpl}
{literal}
{/literal}
<div class="my_right clearfix">
  
   <div class="my_data_avatar clearfix">
   
   <form id="uploadFrom" action="my_avatar_set.php?module=submit" method="post" target="yframe" enctype="multipart/form-data">
   <h3>上传头像</h3>
   <div class="my_upper top20">
   <iframe name="yframe" src="my_avatar_set.php" style="border:none;width:220px;height:220px;" frameborder="0" scrolling="no"></iframe>  
   </div>
   <p class="top20">
   <input type="file" style="display:none;" id="picPath" name="tValue" onchange="javascript:uploadSubmit();">
   <input type="button" value="上传真实头像"  class="my_ann1" onclick="F_Open_dialog()" align="right"/>
   </p>
   </form>
   </div>
   </div>
    
   <!-- 
   <form id="content" action="hello.php" method="post" target="yframe" enctype="multipart/form-data">
  <input type="file" name="tValue">
  <input type="submit" value="submit">
  <iframe name="yframe" src="hello.php" style="border:none;"></iframe>
  </form>
   -->
   </div>
   </div>
   </div>
   
   
   <div class="blank10"></div>
   </div>


{include file=barfooter.tpl}