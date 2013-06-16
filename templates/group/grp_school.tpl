{include file=barheader.tpl}
<!------------------------------------------body-->
   <script src="./templates/scripts/group.js" type="text/javascript"></script>
   <script src="./templates/scripts/prototype.js" type="text/javascript"></script>
<div class="backbj clearfix">

   <script type="text/javascript" src="js/q_upper.js"></script>

    <script type="text/javascript" src="js/head.js"></script>
   <input type="text" id="schoolvalue" name="schoolvalue" value="{$str}" style="display:none">
   <div class="blank10"></div>
     <!--兴趣圈-类别-->
   <div class="box">
     <div class="case clearfix">
	   <div class="q_bt">
	     <p class="a0693e3">亲，你可以通过以下方式，寻找学校社团组织</p>
	   </div>
	   	   <form action="grp_home.php?module=school" method="post" id ="frm2" name="frm2">
	   <ul class="q_type  clearfix">
	   <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top"> <li>学&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;校：</li></td>
    <td valign="top">
	  <dl class="a666_b">
		  <dd><a href="grp_home.php?module=school">不限</a></dd>
		     <dt> 
		     	<input type="text" name="school" id="school" value="{$selectMsg.school.name}">
		         <em><input type=submit onclick="" value="" class="search_school"></input></em>
		     </dt>   
	   </dl>
	</td>
  </tr>
  <tr>
    <td valign="top"> <li>圈子大小：</li></td>
    <td valign="top"><dl class="a666_b">
		  <dd><a href="#" onclick="selectGrpMemNum('0');">不限</a></dd>
		  <dd><a href="#" onclick="selectGrpMemNum('1');">10人以下</a></dd>
		  <dd><a href="#" onclick="selectGrpMemNum('2');">10-50人</a></dd>
		  <dd><a href="#" onclick="selectGrpMemNum('3');">50-100人</a></dd>
		  <dd><a href="#" onclick="selectGrpMemNum('4');">100人以上</a></dd>
	   </dl>
	   <input type="text" id="minMember" name="minMember" value="{$selectMsg.number.minMember}" style="display:none">
	   <input type="text" id="maxMember" name="maxMember" value="{$selectMsg.number.maxMember}" style="display:none">
	</td>
  </tr>
  {if $selectMsg.type.name eq null and $selectMsg.school.name eq null and $selectMsg.number.name eq null}
  <tr>
  {else}
  	<td valign="top"> <li>搜索标签：</li></td>
  	 <td valign="top"><dl class="a666_b">
  	 <dd><a href="grp_home.php?module=school">清空</a></dd>
  	 {if $selectMsg.type.name neq null}
  	 	<dd>{$selectMsg.type.name}<a href="#" onclick="exitGrpSelect('0');"><img  src="./templates/images/schoolbar/zc_bj6.gif"></a>
  	 	</dd>
  	 	{/if}
  	 {if $selectMsg.number.name neq null}
  	 	 <dd>{$selectMsg.number.name}<a href="#" onclick="exitGrpSelect('1');"><img  src="./templates/images/schoolbar/zc_bj6.gif"></a>
  	 	</dd>
  	 {/if}
  	 {if $selectMsg.school.name neq null}
  	 	<dd>{$selectMsg.school.name}<a href="#" onclick="exitGrpSelect('2');"><img src="./templates/images/schoolbar/zc_bj6.gif"></a>
  	 	</dd>
  	 {/if}
  	 </dl></td>
  </tr>
 {/if}
</table>
	   </ul>
	   <input id="method" name="method" value="{$selectMsg.method.name}" style="display:none"/>
	   </form>
	 </div>
   </div>
     <!--兴趣圈-类别-->
   
   
   
   
   
   <div class="blank10"></div>
   
   <div class="box">
   <div class="AreaL">
     
	   
	   <div class="case clearfix">
	   <div class="q_bt q_bj1"><span class=" aff6600"><a href="#" onclick="selectGrpMethod('0')">↑按时间</a>&nbsp;&nbsp;&nbsp;<a href="#" onclick="selectGrpMethod('1')">↑按热度</a></span><em class=" aff6600">全部</em>&nbsp;&nbsp;&nbsp;{$school}&nbsp;&nbsp;&nbsp;共{$typenumber}条</div>
	   
	   
	   <!--全部 list-->
	   <div class="q_list clearfix">
	     <ul class=" clearfix">
		 {foreach from=$data item=item key=key}
		 <li  class=" clearfix">
		   <div class="pic"><a href="#">
		   {if $item.photo eq ""}
		   <img src="./templates/images/schoolbar/def.gif" border="0" />
		   {else}
		   <img src="./uploadfiles/group/groupImage/{$item.photo}" border="0" />
		   {/if}
		   </a></div>
		   <div class="info  clearfix">
		      <dl>
		      <p class="a0693e3"><a href="grp_single_home.php?ID={$item.ID}">{$item.groupname}</a></p>
			  <dt>话题：{$item.topicnum}&nbsp;&nbsp;&nbsp;&nbsp;成员：{$item.membernum}</dt>
			  <dd>{$item.introduction}</dd>
			  </dl>
		   </div>
		   <div class="ann afff"><a href="grp_single_home.php?ID={$item.ID}">进入圈子</a></div>
		 </li>
		 {/foreach}
		 
		 {if $data eq null}
		  <li>
		  	<img src="./templates/images/schoolbar/search_3.gif">
		  	亲，没有找到您要的圈子哦！
		  </li>
		 {/if}
		 </ul>
	   </div> <!--/全部 list-->
	   
	   <!--page-->
	    
		  <script type="text/javascript">
   		  var pg1 = new showPages('pg1');
		  pg1.pageCount = '{$pageMessage}';
		  pg1.argName = 'page';
		  pg1.printHtml();
		</script>
	   <!--/page-->
	   </div>
       </div>
   
   
   
   
   <div class="AreaR">
       
	   
	   <!--搜索圈子-->
	   <div class="case clearfix">
	      <div class="q_bt">搜索圈子</div>
		  <div class="q_search  clearfix">
		  <form action="" method="get">
		    <div class="q_search_txt"><input type="text" value="输入关键字、标签查找"   id="keyword" name="keyword" class="search_txt" onclick="clear();"/></div>
			<div class="q_search_ann"><input name="search"  id="search" type="button"  value="     "  class="search_ann" onclick="searchKey();"/></div>
		  </form>
		  </div>
	   </div>
	   <!--/搜索圈子-->
	   
	   
	   <div class="blank10"></div>
	   <!--创建圈子-->
	   <div class="case clearfix">
	        <div class="q_search_q"><a href="grp_home.php?module=create">创建学校圈子</a></div>
	   </div>
	   <!--创建圈子-->
	   
	   
	   
	   
	   <div class="blank10"></div>
	   
	   <!--最新话题-->
	 <div class="case clearfix">
	      <div class="q_bt_r">最新话题</div>
		  <ul class="new_topic a666_b">
		  {foreach from=$newTopic.newTopic item=item key=key}
		  <li>
		     <h3><a href="grp_topic.php?module=scan&topicID={$item.ID}&ID={$item.idt_grp_main}">{$item.title}</a></h3>
			 <p class="a0693e3"><a href="zone.php?uid={$item.uID}">{$item.nickname}</a></p>
		  </li>
		  {/foreach}
		  </ul>
	   </div>
	   <!--/最新话题-->
	   
	   
	   <div class="blank10"></div>
	   <!--圈子达人-->
	   <div class="case clearfix">
	        <div class="q_bt_r"><span class="a0693e3"><a href="#someid" onclick="changeSuperGroup();">换一组</a></span>社团达人</div>
			<input id="super" name="super" value="{$start2}" style="display:none"></input>
			<input id="supernum" name="supernum" value="{$supernum}" style="display:none"></input>
		 <ul class="part4 clearfix a666" id="superlist">
	    {foreach from=$super.super item=item key=key}
		 <li>
	      <img src="./uploadfiles/user/{$item.photo}" />
		  <p class="aff6600"><a href="zone.php?uid={$item.ID}">{$item.nickname}</a></p>
		  
		  <dd class="clearfix">【讨论】<span class="a0693e3"><a href="grp_topic.php?module=scan&ID={$item.topic.0.idt_grp_main}&topicID={$item.topic.0.gID}">{$item.topic.0.title}</a></span>
		  <em>{$item.topic.0.replynum}个回应</em></dd>
	     </li>
	     {/foreach}
		 
	   </ul>
	   </div>
	   <!--圈子达人-->

   </div>  
   </div>
   {literal}
 <script type="text/javascript"> 
function mSift_SeekTp(oObj,nDire){if(oObj.getBoundingClientRect&&!document.all){var oDc=document.documentElement;switch(nDire){case 0:return oObj.getBoundingClientRect().top+oDc.scrollTop;case 1:return oObj.getBoundingClientRect().right+oDc.scrollLeft;case 2:return oObj.getBoundingClientRect().bottom+oDc.scrollTop;case 3:return oObj.getBoundingClientRect().left+oDc.scrollLeft;}}else{if(nDire==1||nDire==3){var nPosition=oObj.offsetLeft;}else{var nPosition=oObj.offsetTop;}if(arguments[arguments.length-1]!=0){if(nDire==1){nPosition+=oObj.offsetWidth;}else if(nDire==2){nPosition+=oObj.offsetHeight;}}if(oObj.offsetParent!=null){nPosition+=mSift_SeekTp(oObj.offsetParent,nDire,0);}return nPosition;}} 
function mSift(cVarName,nMax){this.oo=cVarName;this.Max=nMax;} 
mSift.prototype={ 
Varsion:'v2010.10.29 by AngusYoung | mrxcool.com', 
Target:Object, 
TgList:Object, 
Listeners:null, 
SelIndex:0, 
Data:[], 
ReData:[], 
Create:function(oObj){ 
var _this=this; 
var oUL=document.createElement('ul'); 
oUL.style.display='none'; 
oObj.parentNode.insertBefore(oUL,oObj); 
_this.TgList=oUL; 
oObj.onkeydown=oObj.onclick=function(e){_this.Listen(this,e);}; 
oObj.onblur=function(){setTimeout(function(){_this.Clear();},100);}; 
}, 
Complete:function(){}, 
Select:function(){ 
var _this=this; 
if(_this.ReData.length>0){ 
_this.Target.value=_this.ReData[_this.SelIndex].replace(/\*/g,'*').replace(/\|/g,'|'); 
_this.Clear(); 
} 
setTimeout(function(){_this.Target.focus();},10); 
_this.Complete(); 
}, 
Listen:function(oObj){ 
var _this=this; 
_this.Target=oObj; 
var e=arguments[arguments.length-1]; 
var ev=window.event||e; 
switch(ev.keyCode){ 
case 9://TAB 
return; 
case 13://ENTER 
_this.Target.blur(); 
_this.Select(); 
return; 
case 38://UP 
_this.SelIndex=_this.SelIndex>0?_this.SelIndex-1:_this.ReData.length-1; 
break; 
case 40://DOWN 
_this.SelIndex=_this.SelIndex<_this.ReData.length-1?_this.SelIndex+1:0; 
break; 
default: 
_this.SelIndex=0; 
} 
if(_this.Listeners){clearInterval(_this.Listeners);} 
_this.Listeners=setInterval(function(){ 
_this.Get(); 
},10); 
}, 
Get:function(){ 
var _this=this; 
if(_this.Target.value==''){_this.Clear();return;} 
if(_this.Listeners){clearInterval(_this.Listeners);}; 
_this.ReData=[]; 
var cResult=''; 
for(var i=0;i<_this.Data.length;i++){ 
if(_this.Data[i].toLowerCase().indexOf(_this.Target.value.toLowerCase())>=0){ 
_this.ReData.push(_this.Data[i]); 
if(_this.ReData.length==_this.Max){break;} 
} 
} 
var cRegPattern=_this.Target.value.replace(/\*/g,'*'); 
cRegPattern=cRegPattern.replace(/\|/g,'|'); 
cRegPattern=cRegPattern.replace(/\+/g,'\\+'); 
cRegPattern=cRegPattern.replace(/\./g,'\\.'); 
cRegPattern=cRegPattern.replace(/\?/g,'\\?'); 
cRegPattern=cRegPattern.replace(/\^/g,'\\^'); 
cRegPattern=cRegPattern.replace(/\$/g,'\\$'); 
cRegPattern=cRegPattern.replace(/\(/g,'\\('); 
cRegPattern=cRegPattern.replace(/\)/g,'\\)'); 
cRegPattern=cRegPattern.replace(/\[/g,'\\['); 
cRegPattern=cRegPattern.replace(/\]/g,'\\]'); 
cRegPattern=cRegPattern.replace(/\\/g,'\\\\'); 
var cRegEx=new RegExp(cRegPattern,'i'); 
for(var i=0;i<_this.ReData.length;i++){ 
if(_this.Target.value.indexOf('*')>=0){ 
_this.ReData[i]=_this.ReData[i].replace(/\*/g,'*'); 
} 
if(_this.Target.value.indexOf('|')>=0){ 
_this.ReData[i]=_this.ReData[i].replace(/\|/g,'|'); 
} 
cResult+='<li style="padding:0 5px;line-height:20px;cursor:default;" onmouseover="'+ 
_this.oo+'.ChangeOn(this);'+_this.oo+'.SelIndex='+i+';" onmousedown="'+_this.oo+'.Select();">' 
+_this.ReData[i].replace(cRegEx,function(s){return '<span style="background:#ff9;font-weight:normal;font-style:normal;color:#e60;">'+s+'</span>';});+'</li>'; 
} 
if(cResult==''){_this.Clear();} 
else{ 
_this.TgList.innerHTML=cResult; 
_this.TgList.style.cssText='display:block;position:absolute;background:#fff;border:#090 solid 1px;margin:-1px 0 0;padding: 5px;list-style:none;font-size:12px;'; 
_this.TgList.style.top=mSift_SeekTp(_this.Target,2)+'px'; 
_this.TgList.style.left=mSift_SeekTp(_this.Target,3)+'px'; 
_this.TgList.style.width=_this.Target.offsetWidth-12+'px'; 
} 
var oLi=_this.TgList.getElementsByTagName('li'); 
if(oLi.length>0){ 
oLi[_this.SelIndex].style.cssText='background:#36c;padding:0 5px;line-height:20px;cursor:default;color:#fff;'; 
} 
}, 
ChangeOn:function(oObj){ 
var oLi=this.TgList.getElementsByTagName('li'); 
for(var i=0;i<oLi.length;i++) { 
oLi[i].style.cssText='padding:0 5px;line-height:20px;cursor:default;'; 
} 
oObj.style.cssText='background:#36c;padding:0 5px;line-height:20px;cursor:default;color:#fff;'; 
}, 
Clear:function(){ 
var _this=this; 
if(_this.TgList){ 
_this.TgList.style.display='none'; 
_this.ReData=[]; 
_this.SelIndex=0; 
} 
} 
}
</script>

<script type="text/javascript"> 
	var oo=new mSift('oo',20); 
//数据 
	//alert("a");
	var labels = document.getElementById("schoolvalue").value;
	var lab =labels.split(",");
	oo.Data=lab; 
//指定文本框对象建立特效 
	oo.Create(document.getElementById('school')); 
</script>  
{/literal}
   
<!------------------------------------------body over-->
{include file=barfooter.tpl}
