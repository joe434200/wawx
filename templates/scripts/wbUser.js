/**
 * 
 */


//获取分页好友
function AjaxGetAtten(page)
{
	var url = "wb_index.php?module=GetAtten";
	var type = document.getElementById("type").value;
	
	//获取JSON数据
	var newAjax = new Ajax.Request(
			url,
			{
				method:'post',
				parameters:"page="+page+"&type="+type,
				onComplete:AjaxGetAttenBack
				
			}
		);
}
function AjaxGetAttenBack(json)
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
			footer += "<a  href='javascript:void(0)' onclick='javascript:AjaxGetAtten("+(obj.base.page-1)+")'>上一页</a>&nbsp;&nbsp;";
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
				footer += "<a href='javascript:void(0)' onclick='javascript:AjaxGetAtten("+(parseInt(obj.base.page))+")'>"+i+"</a>&nbsp;&nbsp;";
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
			footer += "<a  href='javascript:void(0)' onclick='javascript:AjaxGetAtten("+(parseInt(obj.base.page)+1)+")'>下一页</a>";
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



//分页获取日志
function wbGetDiarySplit(page)
{
	//alert(888);
	var wbid = $jq("#wbid").val();
	var url = "wb_index.php?module=GetDiarySplit";
	
	//获取JSON数据
	var newAjax = new Ajax.Request(
			url,
			{
				method:'post',
				parameters:"page="+page+"&wbid="+wbid,
				onComplete:wbGetDiarySplitBack
				
			}
		);
}
function wbGetDiarySplitBack(json)
{
	var obj = eval("("+json.responseText+")");	
	var content = "";
	var footer = "";
	var wburl;
	var arurl;
	
	//显示相册
	for(var i=0; i<obj.info.length; i++)
	{
		content += "<li class='clearfix'>";
		content += "<div class='pic'><img src="+obj.base.photo+" /></div>";
		content += "<div class='wb_list_mess_ny clearfix'>";
		content += "<div class='top'>";
		content += "<p class='name blue_s'><a href='#'>"+obj.base.name+"</a></p>";
		content += "<h3 class='title  blue_s'>";
		if(obj.info[i].type == "0")
		{
			content += "<strong>发表日志</strong>&nbsp;&nbsp;<a href='javascript:void(0)'>"+obj.info[i].title+"</a>";
		}
		else
		{
			content += "<strong>转发日志</strong>&nbsp;&nbsp;<a href='javascript:void(0)'>"+obj.info[i].sectitle+"</a>";
		}
		
		content += "</h3>";
		content += "</div>";
		content += "<div class='blank5'></div>";
		content += "<div class='nr'>";
		content += "<div class='wb_list_zf clearfix'>";
		content += "<div class='b_top'>";
		
		
		//---------------------------
		if(obj.info[i].type == "0")
		{
			arurl = "window.location='wb_index.php?module=diaryShow&diary="+obj.info[i].id+"'";
			content += "<span class='blue_s'></span></div>";
			content += "<div class='b_nr'>";
			content += obj.info[i].content;
			content += "</div>";
			content += "<div class='b_xx a999_line'>";
			content += "<span>";
			content += "<a href='javascript:void(0)'>评论("+obj.info[i].resum+")</a></span>";
			content += "<span><a href='javascript:void(0)'>转发("+obj.info[i].transum+")</a></span>";
			content += "<span>";
			content += "<a href='javascript:void(0)' onclick="+arurl+">查看原文>></a>";
			content += "</span></div></div></div>";
		}
		else
		{
			url = "window.location='zone.php?uid="+obj.info[i].owner+"'";
			arurl = "window.location='wb_index.php?module=diaryShow&diary="+obj.info[i].idt_diary+"'";
			content += "<h3 class='b_title  blue_s'><a href='javascript:void(0)' onclick="+url+">"+obj.info[i].name+"</a>&nbsp;<strong>:</strong>&nbsp;&nbsp;<a href='javascript:void(0)'>"+obj.info[i].origintitle+"</a></h3>";
			content += "<span class='blue_s'></span>";
			content += "</div>";
			content += "<div class='diary_box'>"+obj.info[i].seccontent+"</div>";
			content += "<div class='b_xx a999_line'>";
			content += "<span><a href='javascript:void(0)'>评论("+obj.info[i].resum+")</a></span>";
			content += "<span><a href='javascript:void(0)'>转发("+obj.info[i].transum+")</a></span>";
			content += "<span>";
			content += "<a href='javascript:void(0)' onclick="+arurl+">查看原文>></a></span></div></div></div>";
		}
		
		//arurl = "window.location='wb_index.php?module=diaryShow&diary="+obj.info[i].idt_diary+"'";
		content += "<div class='xx a999_line'>";
		content += "<span class='n2'><a href='javascript:void(0)' onclick="+arurl+" >评论</a></span>";
		if(obj.info[i].type == "0")
		{
			url = "javascript:AddCollect('#"+obj.info[i].id+"','"+obj.info[i].id+"','"+obj.info[i].title+"')";
			arurl = "javascript:tranSlide('#"+obj.info[i].id+"','"+obj.info[i].title+"')";
			content += "<span><a href='javascript:void(0)' onclick="+url+">收藏</a></span>";
			content += "<span><a href='javascript:void(0)' onclick="+arurl+">转发</a></span>";
		}
		else
		{
			url = "javascript:AddCollect('#"+obj.info[i].id+"','"+obj.info[i].idt_diary+"','"+obj.info[i].origintitle+"')";
			arurl = "javascript:tranSlide('#"+obj.info[i].id+"','"+obj.info[i].origintitle+"')";
			content += "<span><a href='javascript:void(0)' onclick="+url+">收藏</a></span>";
			content += "<span><a href='javascript:void(0)' onclick="+arurl+">转发</a></span>";
		}
		url = "javascript:transDiary('"+obj.base.uid+"','"+obj.info[i].transid+"','"+obj.info[i].title+"',this)";
		content += "发表时间<a href='javascript:void(0)'>"+obj.info[i].time+"</a>&nbsp;&nbsp;<div>";
		content += "<a href='javascript:void(0)' onclick="+url+" id='"+obj.info[i].id+"_' style='display:none;'></a>";
		content += "<div class='panel' id='"+obj.info[i].id+"' ></div></div></div></div>";
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
			footer += "<a  href='javascript:void(0)' onclick='javascript:wbGetDiarySplit("+(obj.base.page-1)+")'>上一页</a>&nbsp;&nbsp;";
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
				footer += "<a href='javascript:void(0)' onclick='javascript:wbGetDiarySplit("+(parseInt(obj.base.page))+")'>"+i+"</a>&nbsp;&nbsp;";
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
			footer += "<a  href='javascript:void(0)' onclick='javascript:wbGetDiarySplit("+(parseInt(obj.base.page)+1)+")'>下一页</a>";
		}
	}
	
	$jq("#BackReply").html(content);
	$jq("#pageFooter").html(footer);
}




//转发日志滑动框----------------------------------------转发--------------------------------
function tranSlide(item,prename)
{	
	//从隐藏域获取上一次打开的对象,关闭此对象
	var preobj = $jq("#panelid").val();
	if(preobj!= "" && preobj != item)
	{
		$jq(preobj).slideUp("slow");
	}
	
	if(preobj == item)
	{
		$jq(preobj).slideUp("slow");
		$jq("#panelid").val("");
		return false;
	}
	
	//ajax获取用户日志分类动态生成面板
	$jq("#panelid").val(item);//将这个打开的对象的id覆盖掉隐藏域
	var url = "wb_index.php?module=GetDiaryCatalog";
	var wbid = document.getElementById("wbid").value;	
	var newAjax = new Ajax.Request(
			url,
			{
				method:'post',
				parameters:"prename="+prename+"&wbid="+wbid+"&item="+item,
				onComplete:AjaxGetCatalogBack 
				
			}
		);
	//"wbid="+wbid+"&item="+item+"&prename="+prename,
}
function AjaxGetCatalogBack(json)
{
	//alert(123);
	var item = $jq("#panelid").val();
	var obj = eval("("+json.responseText+")");
	
	var content = "";
	var url = ""; 
	content += "<ol>";
	content += "<li>转发评论:<input type='text' width='200px;' name='sectitle' value="+obj.base.prename+">(不得多于30个字)</li>";
	content += "<li>";
	content += " 选择日志分类:<select name='catalog' id='catalog'>";
	//alert(obj.info.length);
	for(var i=0;i<obj.info.length;i++)
	{
		content += "<option value="+obj.info[i].ID+">"+obj.info[i].name+"</option>";
		url = "javascript:ClickTrans('"+item+"_')"; 
	}
	content += "</select>";
	content += "&nbsp;&nbsp;&nbsp;访问权限&nbsp;<select><option value='2'>公开</option><option value='1'>对好友</option><option value='0'>仅自己</option></select>";
	content += "&nbsp;&nbsp;<a href='javascript:void(0)' onclick="+url+"><strong>确认转发</strong></a>";
	content += "</li>";
	content += "</ol>";
	$jq(item).css({"height":"120px","border":"0px"});
	$jq(item).html(content);
	$jq(item).slideToggle("slow");
	
}
//ajax日志转发
function transDiary(wbid,diaryid,title)
{
	//alert(123);
	var url = "wb_index.php?module=TransDiary";
	var wbid = document.getElementById("wbid").value;
	var item = $jq("#panelid").val();
	var sectitle = $jq(item).find("input").val();
	if(isBlank(sectitle))
	{
		sectitle = title;
	}
	var catalog = $jq(item).find("select").val();
	var authority = $jq(item).find("select:eq(1)").val();
	//alert(sectitle+"+"+catalog+"+"+authority);
	//return ;
	var newAjax = new Ajax.Request(
			url,
			{
				method:'post',
				parameters:"wbid="+wbid+"&diaryid="+diaryid+"&title="+title+"&sectitle="+sectitle+"&catalog="+catalog+"&authority="+authority,
				onComplete:transDiaryBack
				
			}
		);
}
function transDiaryBack(json)
{
	//alert(json.responseText);
	var item = $jq("#panelid").val();
	var content = "";
	content += "<ul><li>";
	content += "<p>转发成功";	
    content += "</ul></li>";
    content += "</li></ul>";
    $jq(item).animate({height:38},"slow");
	$jq(item).html(content);	
	setTimeout(collectSlideUp,3000);
}


//间接点击
function ClickTrans(item)
{
	$jq(item).click();
}


//-------------------------------------------------------转发 end---------------------------------------------


//----------------------------------------------------日志收藏 start----------------------------------------
function AddCollect(item,diaryid,name)
{

	//从隐藏域获取上一次打开的对象,关闭此对象
	var preobj = $jq("#panelid").val();
	if(preobj != "" && preobj != item)
	{
		$jq(preobj).slideUp("slow");
	}
	
		
	//ajax获取用户日志分类动态生成面板
	$jq("#panelid").val(item);//将这个打开的对象的id覆盖掉隐藏域
	var url = "wb_index.php?module=DiaryCollect";
	var wbid = document.getElementById("wbid").value;	
	var newAjax = new Ajax.Request(
			url,
			{
				method:'post',
				parameters:"diaryid="+diaryid+"&name="+name,
				onComplete:AddCollectBack
				
			}
		);
}
function AddCollectBack(json)
{
	//alert(json.responseText);
	var item = $jq("#panelid").val();
	var content = "";
	content += "<ul><li>";
	if(json.responseText == "success")
	{		
		content += "<p>收藏成功";
	}
	else
	{		
		content += "<p>您已收藏此日志";
	}
	content += "</li></ul>";
	$jq(item).css({"height":"38px","border":"0px"});
	$jq(item).html(content);
	$jq(item).slideDown("slow");
	setTimeout(collectSlideUp,3000);
	
}
function collectSlideUp()
{
	var item = $jq("#panelid").val();
	$jq(item).slideUp("slow");
}
//------------------------------------------------日志收藏 end-----------------------------------------



//添加关注
function wbAddAtten(wbid)
{
	//alert("JOE");
	var url = "wb_index.php?module=AddAtten";
	var newAjax = new Ajax.Request(
			url,
			{
				method:'post',
				parameters:"browserid="+wbid,
				onComplete:wbAddAttenBack
				
			}
		);
}
function wbAddAttenBack(response)
{
	//alert(response.responseText);
	if(response.responseText == "success")
	{
		var content = "<a href='javascript:void(0)'>已关注</a>";
		$jq("#isAtten").html(content);
		return true;
	}
	alert("添加关注失败");
	return false;
}


//添加好友
function wbAddFriend(wbid)
{
	//alert("JOE");
	var url = "wb_index.php?module=AddFriend";
	var newAjax = new Ajax.Request(
			url,
			{
				method:'post',
				parameters:"wbid="+wbid,
				onComplete:wbAddFriendBack
				
			}
		);
}
function wbAddFriendBack(response)
{
	if(response.responseText == "success")
	{
		var content = "<a href='javascript:void(0)'>好友请求已发送</a>";
		$jq("#isFriend").html(content);
		return true;
	}
	alert("请求发送失败");
	return false;
}