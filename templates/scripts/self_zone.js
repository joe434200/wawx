
//添加上传相册参数
function addUploadParas()
{
	
	var obj = document.getElementById('handler_path');
	var part = obj.value.split("?");
	obj.value = part[0];
	var sel = document.getElementById('album').value;
	obj.value = obj.value+"?album="+sel;
	//alert(obj.value);
}


/**
 * 
 */
//设置提示框样式

function setEnterEorrer(obj,isset,text,tisset)
{
	if(isset)
	{
		obj.style.borderColor = '#cc0000';
		obj.style.background = '#F5DCDC';
		obj.style.fontSize = '12px';
		obj.value = text;
		return;
	}
	obj.style.borderColor = '';
	obj.style.background = '';
	if(tisset)
	{
		obj.value = '';
	}
	
}
//新建相册
function CreateNewAlbum()
{
	//alert(111);
	var albName = document.getElementById('newAlbum');
	if(isBlank(albName.value,'',''))
	{
		setEnterEorrer(albName,true,'',true);
		return;
	}
	var url = "self_photo.php?module=CreateAlbum";
	var pars = "albName="+albName.value;
	//alert(222);
	var newAjax = new Ajax.Request(
			url,
			{
				method:'post',
				parameters:pars,
				onComplete:BackCreateNewAlbum
				
			}
		);
}
function BackCreateNewAlbum(response)
{
	//alert(333);
	var albName = document.getElementById('newAlbum');
	if(response.responseText == "exist")
	{
		//alert(111);
		setEnterEorrer(albName,true,"相册名字已存在",true);
		//alert(222);
	}
	else
	{
		setEnterEorrer(albName,false,"",true);
		var part = response.responseText.split("|");
		var objCenter = document.getElementById('centerList');
		var objRight = document.getElementById('rightList');
		var CnewNote = document.createElement('li');
		var RnewNote = document.createElement('li');
		var url = "javascript:window.location='self_photo.php?module=album&alb="+part[0]+"'";
		CnewNote.innerHTML = "<span><a href='#'>编辑</a>&nbsp;&nbsp;<a href='#'>删除</a></span><a href='javascript:void(0)' onclick="+url+">"+part[1]+"</a>";
		RnewNote.innerHTML = "<span>(0)</span><a href='#' onclick="+url+">"+part[1]+"</a>";
		//alert(444);
		objCenter.appendChild(CnewNote);
		objRight.appendChild(RnewNote);
		
	}
	
}



//新建日志分类
function CreateNewDiary()
{
	//alert(111);
	var albName = document.getElementById('newDiary');
	if(isBlank(albName.value,'',''))
	{
		setEnterEorrer(albName,true,'请输入分类名字',true);
		return;
	}
	var url = "self_diary.php?module=CreateDiary";
	var pars = "albName="+albName.value;
	//alert(222);
	var newAjax = new Ajax.Request(
			url,
			{
				method:'post',
				parameters:pars,
				onComplete:BackCreateNewDiary
				
			}
		);
}
function BackCreateNewDiary(response)
{
	//alert(333);
	var albName = document.getElementById('newDiary');
	if(response.responseText == "exist")
	{
		//alert(111);
		setEnterEorrer(albName,true,"名字已存在",true);
		//alert(222);
	}
	else
	{
		setEnterEorrer(albName,false,"",true);
		var part = response.responseText.split("|");
		var objCenter = document.getElementById('centerList');
		var objRight = document.getElementById('rightList');
		var CnewNote = document.createElement('li');
		var RnewNote = document.createElement('li');
		CnewNote.innerHTML = "<span><a href='#'>编辑</a>&nbsp;&nbsp;<a href='#'>删除</a></span><a href='javascript:void(0)' onclick='javascript:window.location='self_photo.php?module=album&alb="+part[0]+"''>"+part[1]+"</a>";
		RnewNote.innerHTML = "<span>(0)</span><a href='#' onclick='javascript:window.location='self_photo.php?module=album&alb="+part[0]+"''>"+part[1]+"</a>";
		//alert(444);
		objCenter.appendChild(CnewNote);
		objRight.appendChild(RnewNote);
		
	}
	
}




//图片放大 缩小
function PhotoShowAndHide(path,isset)
{
	//alert('111');
	var list = document.getElementById('alblist');
	var img = document.getElementById('imgArea');
	var show = document.getElementById('albshow');
	//alert(1212);
	if(isset)
	{
		//alert(222);
		list.style.display = 'none';
		//img.setAttribute("src",path);
		//img.setAttribute("alt","点击图片可放大缩小");
		//img.setAttribute("title","点击图片可放大缩小");
		img.src = path;
		img.title = "点击图片可放大缩小";
		img.alt = "点击图片可放大缩小";
		show.style.display = '';
		return;
	}
	
	list.style.display = '';
	//img.setAttribute("src",path);
	show.style.display = 'none';
	return;
	
}

//发表日志
function diaryCheckSubmit()
{
	//alert(111);
	editor.sync();
	var form = document.getElementById("diaForm");
	var title = document.getElementById("title");
	//var content = document.getElementById("content");
	//alert(222);
	if(title.value.length < 1)
	{
		//alert(333);
		setEnterEorrer(title,true,"标题不能为空",true);
		return false;
	}
	else
	{
		//alert(555);
		form.submit();
	}
		
	
}

//页面滚动指定位置
function pageScroll()
{
	//alert("111");
	//editor.sync();
	//document.getElementById("Reply").focus();
	window.location.hash = "#position";
	//$("html,body").animate({scrollTop:$("#position").offset().top},1000);
	//alert("111");
}



//评论日志
function CreateNewReply()
{
	//alert(111);
	var diaid = document.getElementById('diaid').value;
	var newReply = editor.html();
	var upid;
	
	
		
	if(editor.isEmpty())
	{
		alert("内容不能为空");
		editor.focus();
		return "";
	}
	//-------------判断是否为二级回复
	var sstr = newReply.indexOf("</a>");
	var estr = newReply.indexOf("</a>",sstr+1);
	if(estr == -1)
	{
		upid = "";
	}
	else
	{
		alert("二级回复");
		//-----获取我预先先到文本内容里面的回复id
		var sindex = newReply.indexOf("\"");
		var eindex = newReply.indexOf("\"",sindex+1);
		upid = newReply.substring(sindex+1,eindex);
		//----------------------------------------
		alert("二级回复ID："+upid);
	}
	var url = "self_diary.php?module=NewReply";
	var pars = "newReply="+newReply+"&diaid="+diaid+"&upid="+upid;
	//alert(222);
	var newAjax = new Ajax.Request(
			url,
			{
				method:'post',
				parameters:pars,
				onComplete:getARBack
				
			}
		);
}

//评论照片
function CreateNewPhotoReply()
{
	//alert(111);
	var diaid = document.getElementById('diaid').value;
	var newReply = editor.html();
	
	var upid;
	//alert(newReply);
	
	
	
	if(editor.isEmpty())
	{
		alert("内容不能为空");
		editor.focus();
		return "";
	}
	//-------------判断是否为二级回复
	var sstr = newReply.indexOf("</a>");
	var estr = newReply.indexOf("</a>",sstr+1);
	if(estr == -1)
	{
		upid = "";
	}
	else
	{
		alert("二级回复");
		//-----获取我预先先到文本内容里面的回复id
		var sindex = newReply.indexOf("\"");
		var eindex = newReply.indexOf("\"",sindex+1);
		upid = newReply.substring(sindex+1,eindex);
		//----------------------------------------
		alert("二级回复ID："+upid);
	}
	
	
	var url = "self_photo.php?module=NewReply";
	var pars = "newReply="+newReply+"&diaid="+diaid+"&upid="+upid;
	var newAjax = new Ajax.Request(
			url,
			{
				method:'post',
				parameters:pars,
				onComplete:getARBack
				
			}
		);
}

//弹出删除日志对话框
function show_confirm()
{
	var r=confirm("删除后将无法恢复,请确认");
	if(r==true)
	{
		var diaid = document.getElementById("diaid").value;
		window.location="self_diary.php?module=del&diaid="+diaid;
	}
}





//获取日志回复，照片回复，留言板分页
function splitPage(type,page)
{
	//alert(11111);
	//留言页面的diaid指的是用户的ID
	var id = document.getElementById("diaid").value;
	var url = "self_diary.php?module=GetRelpy";
	//alert(type);
	//获取JSON数据
	var newAjax = new Ajax.Request(
			url,
			{
				method:'post',
				parameters:"type="+type+"&page="+page+"&id="+id,
				onComplete:getReplyBack
				
			}
		);
	
}
function getReplyBack(json)//日志评论
{
	//alert(json.responseText);
	var obj = eval("("+json.responseText+")");

	//alert(obj.base.pageCounts);
	var content = "";
	var footer = "";
	var fiurl;
	var seurl;
	//ajax显示回复内容
	
	for(var i=0;i<obj.reply.length;i++)
	{
		//回复url
		fiurl = "javascript:addSecReply('"+obj.reply[i].name+"',"+obj.reply[i].id+")";
		//--------------------------------------
		content += "<li>";
		content += "<table width='100%' border='0' cellspacing='0' cellpadding='0'>";
		content += "<tr>";
		content += "<td valign='top' class='pic'><p><img src='./templates/images/schoolbar/avatar2.jpg' /></p></td>";
		content += "<td valign='top' class='nr'>";
		content += "<p class='name'><a href='#'>"+obj.reply[i].name+"</a> <span>"+obj.reply[i].createtime+"</span></p>";
		content += "<p class='pl'>"+obj.reply[i].content+"</p>";
		content += "</td>";
		content += "<td valign='bottom' class='edit a999'><a href='javascript:void(0)' onclick="+fiurl+">回复</a>&nbsp;&nbsp;<a class='wbDiaryDel' href='javascript:void(0)' onclick='javascript:getDelReply("+obj.reply[i].id+")'>删除</a></td>";
		content += "</tr>";
		if(obj.reply[i].sec != null)
		{
			for(var j=0;j<obj.reply[i].sec.length;j++)
			{
				//回复url
				seurl = "javascript:addSecReply('"+obj.reply[i].sec[j].name+"',"+obj.reply[i].id+")";
				//---------------------------------
				content += "<tr>";
				content += "<td valign='top' class='pic'>&nbsp;</td>";
				content += "<td valign='top' class='nr reply' colspan='2'>";
				content += "<table width='100%' border='0' cellspacing='0' cellpadding='0'>";
				content += "<tr>";
				content += "<td valign='top' class='pic'><p><img src='./templates/images/schoolbar/avatar2.jpg' /></p></td>";
				content += "<td valign='top' class='nr'>";
				content += "<p class='name'><a href='#'>"+obj.reply[i].sec[j].name+"</a> <span>"+obj.reply[i].sec[j].createtime+"</span></p>";
				content += "<p class='pl'>"+obj.reply[i].sec[j].content+"</p>";
				content += "</td>";
				content += "</tr>";
				content += "<tr>";
				content += "<td valign='top' class='pic'>&nbsp;</td>";
				content += "<td class='a999'><a href='javascript:void(0)' onclick="+seurl+">回复</a>&nbsp;&nbsp;<a href='javascript:void(0)' onclick='javascript:getDelReply("+obj.reply[i].sec[j].id+")'>删除</a></td>";
				content += "</tr>";
				content += "</table>";
				content += "</td>";
				content += "</tr>";
				
			}
		}
		content += "</table>";
		content += "</li>";
		//content += "";
	}
	
	//显示分页
	if(obj.base.pageCounts == "1")
	{
		footer += "<a class='pageFooterStyle'>1</a>";
	}
	else
	{
		//处理“上一页”按钮
		if(obj.base.page == "1")
		{
			footer += "<a href='javascript:void(0)' class='pageFooterStyle'><strong>上一页</strong></a>&nbsp;&nbsp;";
		}
		else
		{
			footer += "<a  href='javascript:void(0)' onclick='javascript:splitPage("+(obj.base.type)+","+(obj.base.page-1)+")'>上一页</a>&nbsp;&nbsp;";
		}
		
		//处理中间数字选项
		for(var i=1; i<=obj.base.pageCounts; i++)
		{
			//alert("loop");
			if(obj.base.page == i)
			{
				//alert("equal");
				footer += "<a class='pageFooterStyle'>"+i+"</a>&nbsp;&nbsp;";
			}
			else
			{
				//alert(footer);
				footer += "<a href='javascript:void(0)' onclick='javascript:splitPage("+(obj.base.type)+","+i+")'>"+i+"</a>&nbsp;&nbsp;";
				//alert(footer);
			}
		}
		
		//处理“下一页”按钮
		if(parseInt(obj.base.page) == parseInt(obj.base.pageCounts))
		{
			footer += "<a href='javascript:void(0)' class='pageFooterStyle'>下一页</a>";
		}
		else
		{
			footer += "<a  href='javascript:void(0)' onclick='javascript:splitPage("+(obj.base.type)+","+(parseInt(obj.base.page)+1)+")'>下一页</a>";
		}
	}
	
	
	//innerHTML重构页面
	
	//alert(footer);
	//document.getElementById("pageFooter").innerHTML=footer;
	$jq("#BackReply").html(content);
	$jq("#pageFooter").html(footer);
	$jq("#currpage").html(obj.base.page);
	
	
}





//处理相册分页
function getAlbumSplitPage(page)
{
	//alert("222");
	var id = document.getElementById("uid").value;
	var url = "self_photo.php?module=GetSplit";
	//alert(type);
	//获取JSON数据
	var newAjax = new Ajax.Request(
			url,
			{
				method:'post',
				parameters:"page="+page+"&id="+id,
				onComplete:getASPBack
				
			}
		);
}
function getASPBack(json)
{
	var obj = eval("("+json.responseText+")");

	
	var content = "";
	var footer = "";
	var url = document.getElementById("albumUrl").value;
	
	//显示相册
	for(var i=0; i<obj.alb.length; i++)
	{
		url = url+(obj.alb[i].ID)+"'";
		content += "<li>";
		content += "<div class='pic'>";
		content += "<a href='javascript:void(0)' onclick="+url+"><img src='./templates/images/schoolbar/wb_pic1.gif' /></a>";
		content += "</div>";
		content += "<p class='jj'><a href='javascript:void(0)' onclick="+url+">"+obj.alb[i].name+"</a></p>";
		content += "</li>";
	}
	
	
	//显示分页
	if(obj.base.pageCounts == "1")
	{
		footer += "<a class='pageFooterStyle'>1</a>";
	}
	else
	{
		//处理“上一页”按钮
		if(obj.base.page == "1")
		{
			footer += "<a href='javascript:void(0)' class='pageFooterStyle'><strong>上一页</strong></a>&nbsp;&nbsp;";
		}
		else
		{
			footer += "<a  href='javascript:void(0)' onclick='javascript:getAlbumSplitPage("+(obj.base.page-1)+")'>上一页</a>&nbsp;&nbsp;";
		}
		
		//处理中间数字选项
		for(var i=1; i<=obj.base.pageCounts; i++)
		{
			//alert("loop");
			if(obj.base.page == i)
			{
				//alert("equal");
				footer += "<a class='pageFooterStyle'>"+i+"</a>&nbsp;&nbsp;";
			}

			else
			{
				//alert(footer);
				footer += "<a href='javascript:void(0)' onclick='javascript:getAlbumSplitPage("+(parseInt(obj.base.page))+")'>"+i+"</a>&nbsp;&nbsp;";
				//alert(footer);
			}
		}
		
		//处理“下一页”按钮
		if(parseInt(obj.base.page) == parseInt(obj.base.pageCounts))
		{
			footer += "<a href='javascript:void(0)' class='pageFooterStyle'>下一页</a>";
		}
		else
		{
			footer += "<a  href='javascript:void(0)' onclick='javascript:getAlbumSplitPage("+(parseInt(obj.base.page)+1)+")'>下一页</a>";
		}
	}
	
		
	$jq("#BackReply").html(content);
	$jq("#pageFooter").html(pageFooter);
	$jq("#currpage").html(obj.base.page);
	
	//var div = document.getElementById("BackReply");
	//var foot = document.getElementById("pageFooter");
	//var curr = document.getElementById("currpage");
	//curr.innerHTML = obj.base.page;
	//div.innerHTML = content;
	//foot.innerHTML = footer;
	
}



//分页获取日志
function getDiarySplitPage(page)
{
	var id = document.getElementById("uid").value;
	var diaid = document.getElementById("diaid").value;
	var url = "self_diary.php?module=GetDiarySplit";
	
	//获取JSON数据
	var newAjax = new Ajax.Request(
			url,
			{
				method:'post',
				parameters:"page="+page+"&id="+id+"&diaid="+diaid,
				onComplete:getDSPBack
				
			}
		);
}
function getDSPBack(json)
{
	
	var obj = eval("("+json.responseText+")");
	
	
	var content = "";
	var footer = "";
	
	//显示相册
	for(var i=0; i<obj.info.length; i++)
	{
		readUrl = "javascript:window.location='self_diary.php?module=show&diaid="+obj.info[i].ID+"'";
		editUrl = "javascript:window.location='self_diary.php?module=edit&diaid="+obj.info[i].ID+"'";
		content += "<li>";
		content += "<h3 class=' blue_s'><a href='javascript:void(0)' onclick="+readUrl+">"+obj.info[i].title+"</a></h3>";
		content += "<p class='sj'>"+obj.info[i].time+"</p>";
		content += "<p class='cs a999'><a>("+(obj.info[i].brsum)+")次阅读 </a> |  <a>("+(obj.info[i].resum)+")个评论</a> |  <a href='javascript:void(0)' onclick="+editUrl+">编辑</a></p>";
		content += "</li>";
	}
	
	
	//显示分页
	if(obj.base.pageCounts == "1")
	{
		footer += "<a class='pageFooterStyle'>1</a>";
	}
	else
	{
		//处理“上一页”按钮
		if(obj.base.page == "1")
		{
			footer += "<a href='javascript:void(0)' class='pageFooterStyle'><strong>上一页</strong></a>&nbsp;&nbsp;";
		}
		else
		{
			footer += "<a  href='javascript:void(0)' onclick='javascript:getDiarySplitPage("+(obj.base.page-1)+")'>上一页</a>&nbsp;&nbsp;";
		}
		
		//处理中间数字选项
		for(var i=1; i<=obj.base.pageCounts; i++)
		{
			//alert("loop");
			if(obj.base.page == i)
			{
				//alert("equal");
				footer += "<a class='pageFooterStyle'>"+i+"</a>&nbsp;&nbsp;";
			}

			else
			{
				//alert(footer);
				footer += "<a href='javascript:void(0)' onclick='javascript:getDiarySplitPage("+(parseInt(obj.base.page))+")'>"+i+"</a>&nbsp;&nbsp;";
				//alert(footer);
			}
		}
		
		//处理“下一页”按钮
		if(parseInt(obj.base.page) == parseInt(obj.base.pageCounts))
		{
			footer += "<a href='javascript:void(0)' class='pageFooterStyle'>下一页</a>";
		}
		else
		{
			footer += "<a  href='javascript:void(0)' onclick='javascript:getDiarySplitPage("+(parseInt(obj.base.page)+1)+")'>下一页</a>";
		}
	}
	
	$jq("#BackReply").html(content);
	$jq("#pageFooter").html(footer);
	//var div = document.getElementById("BackReply");
	//var foot = document.getElementById("pageFooter");
	//div.innerHTML = content;
	//foot.innerHTML = footer;
}


//ajax添加新回复(留言板)
function addReply()
{
	
	var uid = document.getElementById("diaid").value;
	var newReply = editor.html();
	var upid;
	//alert(newReply);
	
	
	
	if(editor.isEmpty())
	{
		alert("内容不能为空");
		editor.focus();
		return "";
	}
	//-------------判断是否为二级回复
	var sstr = newReply.indexOf("</a>");
	var estr = newReply.indexOf("</a>",sstr+1);
	if(estr == -1)
	{
		upid = "";
	}
	else
	{
		//alert("二级回复");
		//-----获取我预先先到文本内容里面的回复id
		var sindex = newReply.indexOf("\"");
		var eindex = newReply.indexOf("\"",sindex+1);
		upid = newReply.substring(sindex+1,eindex);
		//----------------------------------------
		//alert("二级回复ID："+upid);
	}
	
	var url = "self_zone.php?module=GetNewReply";
	var newAjax = new Ajax.Request(
			url,
			{
				method:'post',
				parameters:"uid="+uid+"&content="+newReply+"&upid="+upid,
				onComplete:getARBack
				
			}
		);
		
}
function getARBack(response)//ajax刷新留言板
{
	editor.html('');//将文本框内容设置为空
	var type = document.getElementById("type").value;
	splitPage(type,1);//ajax刷新留言板
}
//ajax删除回复
function getDelReply(id)
{
	
	var del=confirm("删除后将无法恢复,请确认");
	if(del == true)
	{
		var url = "self_zone.php?module=DelReply";
		var newAjax = new Ajax.Request(
				url,
				{
					method:'post',
					parameters:"id="+id,
					onComplete:getARBack
					
				}
			);
		return true;
	}
	return false;	
}


//二级回复
function addSecReply(name,id)
{
	//alert(name);
	//alert(id);
	editor.html('');
	var content = "";
	content += "<a id='"+id+"'></a><a></a>回复<a style='color:#285FA5'>"+name+"</a>:";
	//alert(content);
	editor.insertHtml(content);
}



//获取分页好友
function AjaxGetFriends(page)
{
	var url = "self_zone.php?module=GetFriendsSplit";
	
	//获取JSON数据
	var newAjax = new Ajax.Request(
			url,
			{
				method:'post',
				parameters:"page="+page,
				onComplete:AjaxGetFrinedsBack
				
			}
		);
}
function AjaxGetFrinedsBack(json)
{
	var obj = eval("("+json.responseText+")");
	
	
	var content = "";
	var footer = "";
	
	//显示相册
	for(var i=0; i<obj.info.length; i++)
	{
		content += "<li>";
		content += "<p><a href='javascript:void(0)'><img src="+obj.info[i].photo+" /></a></p>";
		content += "<p><a href='javascript:void(0)'>"+obj.info[i].name+"</a></p>";
		content += "</li>";
	}
	
	
	//显示分页
	if(obj.base.pageCounts == "1")
	{
		footer += "<a class='pageFooterStyle'>1</a>";
	}
	else
	{
		//处理“上一页”按钮
		if(obj.base.page == "1")
		{
			footer += "<a href='javascript:void(0)' class='pageFooterStyle'><strong>上一页</strong></a>&nbsp;&nbsp;";
		}
		else
		{
			footer += "<a  href='javascript:void(0)' onclick='javascript:AjaxGetFriends("+(obj.base.page-1)+")'>上一页</a>&nbsp;&nbsp;";
		}
		
		//处理中间数字选项
		for(var i=1; i<=obj.base.pageCounts; i++)
		{
			//alert("loop");
			if(obj.base.page == i)
			{
				//alert("equal");
				footer += "<a class='pageFooterStyle'>"+i+"</a>&nbsp;&nbsp;";
			}

			else
			{
				//alert(footer);
				footer += "<a href='javascript:void(0)' onclick='javascript:AjaxGetFriends("+(parseInt(obj.base.page))+")'>"+i+"</a>&nbsp;&nbsp;";
				//alert(footer);
			}
		}
		
		//处理“下一页”按钮
		if(parseInt(obj.base.page) == parseInt(obj.base.pageCounts))
		{
			footer += "<a href='javascript:void(0)' class='pageFooterStyle'>下一页</a>";
		}
		else
		{
			footer += "<a  href='javascript:void(0)' onclick='javascript:AjaxGetFriends("+(parseInt(obj.base.page)+1)+")'>下一页</a>";
		}
	}
	
	$jq("#BackReply").html(content);
	$jq("#pageFooter").html(footer);
	$jq("#currpage").html(obj.base.page);
	//var div = document.getElementById("BackReply");
	//var foot = document.getElementById("pageFooter");
	//var currpage = document.getElementById("currpage");
	//currpage.innerHTML = obj.base.page;
	//div.innerHTML = content;
	//foot.innerHTML = footer;
}



//批量管理照片
function multiManage(isSel,obj)
{
	var arrList = document.getElementsByName("selBox");
	if(isSel)
	{
		obj.style.cssText="display:none;";
		document.getElementById("MultiSelAll").style.cssText="display:block;";		
		for(var i=0;i<arrList.length;i++)
		{
			arrList[i].style.cssText="display:block;";
			arrList[i].checked = "";
		}
		return true;
	}
	for(var i=0;i<arrList.length;i++)
	{
		arrList[i].style.cssText="display:none;";
		arrList[i].checked = "";
	}
	document.getElementById("MultiSelAll").style.cssText="display:none;";
	document.getElementById("MultiManage").style.cssText="display:block;";
	return false;
}
//全选照片
function multiSelAll(obj)
{
	var arrList = document.getElementsByName("selBox");
	if(obj.checked)
	{
		var arrList = document.getElementsByName("selBox");
		for(var i=0;i<arrList.length;i++)
		{
			arrList[i].checked = "checked";			
		}
		return true;
	}
	for(var i=0;i<arrList.length;i++)
	{
		arrList[i].checked = "";		
	}
	return false;
}
//删除选中照片
function MultiDelSel()
{
	var del=confirm("删除后将无法恢复,请确认");
	if(del == true)
	{
		var arrList = document.getElementsByName("selBox");
		var ID = "";
		var count = 0;
		for(var i=0;i<arrList.length;i++)
		{
			if(arrList[i].checked)
			{
				//alert(arrList[i]);
				count ++;
				ID += arrList[i].value+"|";
				continue;
			}			
		}
		if(count == 0)
		{
			alert("您没有选中任何要删除的照片");
			return false;
		}
		//alert(ID);
		//获取JSON数据
		var alb = document.getElementById("diaid").value;
		var url = "self_photo.php?module=MultiDelSel";
		var newAjax = new Ajax.Request(
				url,
				{
					method:'post',
					parameters:"ID="+ID+"&alb="+alb,
					onComplete:MultiDelSelBack
					
				}
			);
	}
	
	
}
function MultiDelSelBack(json)
{
	var obj = eval("("+json.responseText+")");
	//alert("back");
	var content = "";
	var url = "";
	//alert(obj.length);
	if(obj.length != 0)
	{
		for(var i=0; i<obj.length; i++)
		{
			url = "javascript:PhotoShowAndHide('"+obj[i].path+"',true)>";
			content += "<li>";
			content += "<div class='pic'>";
			content += "<a href='javascript:void(0)' onclick="+url+"<img src='"+obj[i].path+"' border='0' width='174px' height='130px' alt='点击图片可放大缩小' title='点击图片可放大缩小'/></a><br/><br/>";
			content += "<p align='center'><input type='checkbox' value='"+obj[i].ID+"' style='width:25px;height:25px;display:none;' name='selBox' ></input>";
			content += "</div>";
			content += "</li>";
		}
	}
	else
	{
		content += "<div class='only clearfix' id='albshow'>";
		content += "<a><img src='./templates/images/schoolbar/zhuce_bj.gif' width='650' height='450' id='imgArea'/></a><br/>";
		content += "</div>";
	}
	$jq("#AlbumList").html(content);
	multiManage(false,"");
	
}

//-----------------------------------------------
function AfterUploadHandler()
{
	//alert("gaoding");
	var alb = document.getElementById("diaid").value;
	var url = "self_photo.php?module=UpdateAlbum";
	var newAjax = new Ajax.Request(
			url,
			{
				method:'post',
				parameters:"alb="+alb,
				onComplete:MultiDelSelBack
				
			}
		);
}
