<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>注册</title>
<link href="./templates/css/schoolbar/style.css" rel="stylesheet" type="text/css" />
<script src="./templates/scripts/prototype.js" type="text/javascript"></script>
<script src="./templates/scripts/jquery-1.6.3.js" type="text/javascript"></script>
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

  <div class="zhuce_tag">
  <ul>
  <li class="zc1">1.您的兴趣标签</li>
  <li class="zc2 zc2_sel">2.推荐找找你敢兴趣的人</li>
  <li class="zc3">3.进入吾校</li>
  </ul>
  </div>
  <div class="zhuce_all clearfix">
  <form action="loginstep.php?module=addfriends" method="post" id="frm1" name="frm1">
  <input type="hidden" name="label" value="{$labelcount.mylabels}"/>
  <input type="hidden" name="friendsinfo" id="friendsinfo"/>
  {if $friends.info|@count neq 0}
  <p class="zhuce_a">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;根据您的兴趣标签，我们找到了 <span class="cl_f60">{$labelcount.labelnum}</span> 个与您兴趣相同的人</p>
 
  <div class="blank15"></div>
  <div class="q_bt" id = "pageFooter"><span class="a0693e3">
   {if $friends.base.pageCounts gt '1'}
   <a  href="javascript:void(0)" onclick="javascript:AjaxGetfriends('{$labelcount.mylabels}','{$friends.base.page+1}')">换一组</a>
   {/if}</span></div>
  <ul class="zhuce_peo"  style="height:320px" id="friendsarea">
  {foreach from=$friends.info item=item key=key}
  <li><img src="./uploadfiles/user/{$item.photo}"  onerror="this.src='./templates/images/schoolbar/avatar.jpeg'" width="90" height="90"/><p>{if $item.nickname eq ""}{$item.email}{else}{$item.nickname}{/if}</p>
  <p><input name="friendcheckbox[]" type="checkbox" value="{$item.ID}"/></p></li>
  {/foreach}
  </ul>
  
  <div class="blank5"></div>
  <p align="center">
  <input type="submit" value="加入好友"   class="my_ann1"/>
    <a href="loginstep.php?module=skip&label={$label}">跳过，直接进入吾校</a></p>
 {else}
  <p class="zhuce_a">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;您将是第一个对此标签感兴趣的人哟~</p>
  <div class="blank15"></div>
   <ul class="zhuce_peo"  style="height:320px">
   </ul>
  <div class="blank5"></div>
  <p align="center">
    <a href="loginstep.php?module=skip&label={$label}">进入吾校</a>  </p>
    </form>
 {/if}
  </div>
  </div>
  <div class="blank10"></div>
     </div>
     </div>
	
	<div class="blank10"></div>
	
	</div>
  {include file = barfooter.tpl}
 <script src="./templates/scripts/loginstep.js" type="text/javascript"></script>
