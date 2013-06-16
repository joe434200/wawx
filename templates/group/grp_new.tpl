{include file=barheader.tpl}
<!------------------------------------------body-->
<div class="backbj clearfix">
   <script src="./templates/scripts/group.js" type="text/javascript"></script>
   <script src="./templates/scripts/prototype.js" type="text/javascript"></script>
   
   <div class="blank10"></div>
   
   <div class="box4">
   <div class="case_ll clearfix">
   
   <div class="regist">
        
  <h3>创建圈子</h3>
  <div class="blank20"></div>
  <div class="my_step"> 请填写圈子信息</div>
<input type="text" id="schoolvalue" name="schoolvalue" value="{$str}" style="display:none">
  
  <div class="blank20"></div>
  <iframe id="phpframe" name="phpframe" width="0" height="0" marginwidth="0" frameborder="0" src="about:blank"></iframe>
  
  <form action="grp_home.php?module=success" method="post" id="frm2" name="frm2" enctype="multipart/form-data">
  <input type="hidden" id="filesubmitflg" name="filesubmitflg"/>
  <input type="hidden" id="tmpfilename" name="tmpfilename"/>
  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="ttbb4">
  <tr>
    <td width="17%" align="right"><span class="cl_f30">*</span> 圈子名称：</td>
    <td width="46%" ><input type="text" name="groupname" id="groupname"  class="my_txt_350"/>
     <span id = "limittitle"></span></td>
    <td width="37%" rowspan="5" align="center" valign="top">
  
	  <table width="100%" border="0" cellspacing="0" cellpadding="0">
	  <tr>
	    <td align="center">
	    <p class="q_aver">
		<img height = "120" width ="120"  id="img" src="./templates/images/schoolbar/def.gif"  style='display:block' >
		</p>
		</td>
	  </tr>
	 
	  <tr>
	    <td align="center">
	    <input type="file" name="picPath" id="picPath"  class="txt_all"  onchange="javascript:upLoadbadpicture();" ></td>
	  </tr>
</table>
  </td>
  </tr>
	
  <tr>
    <td align="right"><span class="cl_f30">*</span> 所属类型：</td>
    <td>
    <select name="type" id="type" onchange="showType();" >
      <option value="0">请选择</option>
      {foreach from=$rs item=item key=key}
      	<option value="{$item.id}">{$item.name}</option>
      {/foreach}
    </select>
    <select name="type1" id="type1" disabled="disabled">
    <option value="0">请选择</option>
    </select>
    <input type="text" name="school" id="school" value="请输入学校的名称" disabled="disabled">
    <span id = "limittype"></span>
    </td>
    </tr>

  <tr>
    <td align="right" valign="top"><span class="cl_f30">*</span> 圈子简介：</td>
    <td><textarea name="groupinfo" id="groupinfo" rows="8" class="my_txt_350"></textarea>
    <span id = "limitcontent"></span>
    </td>
    </tr>
	
	<tr>
    <td width="17%" align="right"><span class="cl_f30">*</span> 标签：</td>
    <td width="46%"><input type="text" name="label" id="label"  class="my_txt_350" />
    <span id = "limitlabel">&nbsp;&nbsp;最多添加5个标签，多个标签之间用","(英文逗号)分隔</span></td>
    </tr>
    
    <tr>
    <td align="right" valign="top"><span class="cl_f30">*</span> 参与权限：</td>
    <td>
    <input type="checkbox" name="checkboxC" id="checkboxC" />是否需要审核 
    </td>
    </tr>
    <tr>
    <td align="right">&nbsp;</td>
    <td height="50"><input type="button" name="button" id="button" value="创建圈子"  class="my_ann1"  onClick="checkmessage();" /></td>
    </tr>
  </table>
  </form>
  </div>
  </div>
  </div>
  </div>
  {include file=warning.tpl}
 
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
+_this.ReData[i].replace(cRegEx,function(s){return '<span style="background:#ff9;font-weight:bold;font-style:normal;color:#e60;">'+s+'</span>';});+'</li>'; 
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
