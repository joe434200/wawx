{include file=barheader.tpl}

<script src="./templates/scripts/prototype.js" type="text/javascript"></script>
{literal}
<script type="text/javascript">
function uplode_file()
{
	document.getElementById("picPath").click();
}
</script>
{/literal}
<div class="backbj clearfix" >
<div class="blank10"></div>
   
   <div class="box4">
<div class="case_ll clearfix">

<div class="regist" style="float:left;">
<form action="hdUploadFile.php?module=submit&hd_id={$hd_id}" method="post" id="upform" target="upframe" enctype="multipart/form-data">
<h3>发布活动</h3>
<div class="blank20"></div>
<div class="my_step"> 请填写活动信息</div>
<div align="center">
<ul>
<li>
<div class="pic">
<iframe name="upframe" src="hdUploadFile.php" style="border:none;width:280px;height:280px;"></iframe>
</div>
</li>
<li><input type="file" id="picPath" name="upValue" onchange="javascript:UploadSubmit();"></li>
<li>
<input type="button" class="anniu29" name="file_button" id="file_button" value = "完成封面上传" onclick = "window.location.href='hd.php?module=hd_list_show1&hd_id={$hd_id}' "/>
</li>
</ul>
</div>
</form>

</div>
</div>

<script type="text/javascript" src="./templates/scripts/hd.js"></script>
{include file=barfooter.tpl}