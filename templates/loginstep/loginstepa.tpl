<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="./templates/scripts/prototype.js" type="text/javascript"></script>
<script src="./templates/scripts/jquery-1.6.3.js" type="text/javascript"></script>
<title>注册</title>
<link href="./templates/css/schoolbar/style.css" rel="stylesheet" type="text/css" />

</head>
 
<body>
<div class="backbj_re clearfix">
 
   <div class="my_dh bor_bot1">
    <div class="box3">
	  <div class="my_logo"><img src="./templates/images/schoolbar/logo.png" /></div>
	  
	</div>
   </div>
   
 
     <div class="blank10"></div>
   
     <div class="box3">
     
     <div class="case_ll clearfix">
        <div class="regist">
 
  <div class="blank20"></div>
  <form action="" method="post" >
  
  <div class="zhuce_tag">
  <ul>
  <li class="zc1_sel">1.您的兴趣标签</li>
  <li class="zc2">2.推荐找找你敢兴趣的人</li>
  <li class="zc3">3.进入吾校</li>
  </ul>
  </div>
 
  <div class="zhuce_all clearfix">
  <p class="zhuce_a">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;贴上你的标签，找到你的同道中人</p>
  <p class="zhuce_b">每个标签都隐藏着一个志同道合的人</p>
   
 
  <div class="blank15"></div>
   <div class="q_bt" id = "pageFooter"><span class="a0693e3">
   {if $labels.base.pageCounts gt '1'}
   <a  href="javascript:void(0)" onclick="javascript:AjaxGetLabels('{$labels.base.page+1}')">换一组</a>
   {/if}</span></div>
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="14%"> 您的兴趣是：</td>
    <td width="32%"><input name="interest" id="interest"type="text"  class="my_txt_200"/></td>
    
    <td width="54%"><input type="button" value="提交" class="my_ann2"   onclick="checksubmit()"/> <span id="interestlimit"></span></td>
  </tr>
  <tr>
    <td colspan="3">
	<ul class="zhuce_inter" style="height:250px" id="labelsarea">
	{if $labels.info|@count neq 0}
	{foreach from=$labels.info item=item key=key}
	<li><a href="loginstep.php?module=friend&label={$item.mylabels}">{$item.mylabels}</a></li>
	{/foreach}
	{else}
	您将是第一个添加标签的哟~
	{/if}
	
	</ul>
	</td>
    </tr>
   
</table>
  </div>
  

   
  </form>
  <div class="blank5"></div>
  <p align="center">
    <a href="index.php">跳过，直接进入吾校</a></p>
  

  </div>
  <div class="blank10"></div>
     </div>
     </div>
    
	
	<div class="blank10"></div>
	
	
   </div>
  
 
   
  {include file = barfooter.tpl}
 <script src="./templates/scripts/loginstep.js" type="text/javascript"></script>
