/**
 * 
 */

var red = "#FF3300";
var green = "#4CB849";
var ispass = false;
function setBlank(obj)
{
	obj.setAttribute("type","password");
	obj.style.borderColor = '';
	obj.style.background = '';
	obj.value = '';
}
function setPwdEnterError(obj,isset,color,text)
{
	//alert("set");
	obj.setAttribute("type","password");
	if(isset)
	{
		if(color == "red")
		{
			obj.setAttribute("type","text");
			obj.style.borderColor = '#cc0000';
			obj.style.background = '#F5DCDC';
			obj.value = text;
		}
		else
		{
			obj.setAttribute("type","password");
			obj.style.borderColor = green;
			//obj.style.background = '#F5DCDC';
			
		}
		obj.style.fontSize = '12px';	
		return;
	}
}
//验证密码
function AjaxCheckPwd()
{
	//alert(222);
	var val = document.getElementById("oldpwd").value;
	if(val == "")
	{
		return false;
	}
	var url = "UserCenterHandler.php?module=AjaxCheckPwd";
	var newAjax = new Ajax.Request(
			url,
			{
				method:'post',
				parameters:"password="+val,
				onComplete:AjaxCheckPwdBack
				
			}
		);
}
function AjaxCheckPwdBack(response)
{
	var obj = document.getElementById("oldpwd");
	if(response.responseText == "wrong")
	{
		setPwdEnterError(obj,true,"red","输入的原密码有误");
		ispass = false;
		return false;
	}
	else
	{
		setPwdEnterError(obj,true,"green","");
		ispass = true;
		return true;
	}
	
}


//验证密码
function check_vali_pwd(obj)
{
	//alert(222);
	if(obj.value.length == "")
	{
		return false;
	}
	else if(obj.value.length<=5 )
	{		
		setPwdEnterError(obj,true,"red","密码长度不得小于6个字符");
		return false;
	}
	else if(obj.value.length>16 )
	{		
		setPwdEnterError(obj,true,"red","密码长度不大于16个字符");
		return false;
	}
	else if(!obj.value.match(/^[0-9a-zA-Z]+$/))
	{
		setPwdEnterError(obj,true,"red","密码必须由数字或者英文组成");
		return false;
	}
	else
	{
		setPwdEnterError(obj,true,"green","");
		return true;
	}
	//alert("end");
}
//二次验证密码
function check_vali_repwd(obj)
{
	var pwd = document.getElementById("newpwd").value;

	if(obj.value.length == "")
	{
		return false;
	}
	else if(obj.value != pwd)
	{
		setPwdEnterError(obj,true,"red","重复密码不一致");
		return false;
	}
	else
	{
		setPwdEnterError(obj,true,"green","");
		return true;
	}
}
function checkNewPwd()
{
	var newform = document.getElementById("modifyForm");
	var oldpwd = document.getElementById("oldpwd");
	var newpwd = document.getElementById("newpwd");
	var repwd = document.getElementById("repwd");
	if(ispass && check_vali_pwd(newpwd) && check_vali_repwd(repwd))
	{
		alert("密码修改成功");
		newform.submit();	
		return true;
	}
	alert("请填写正确");
	return false;
}



//ajax获取信箱
function AjaxGetBox(type,page)
{
	var url = "UserCenterHandler.php?module=AjaxGetBox";
	var isread = document.getElementById("EmailType").value;
	
	var newAjax = new Ajax.Request(
			url,
			{
				method:'post',
				parameters:"type="+type+"&page="+page+"&isread="+isread,
				onComplete:AjaxGetBoxBack
				
			}
		);
}
function AjaxGetBoxBack(json)
{
	var obj = eval("("+json.responseText+")");
	
	var content = "";
	var footer = "";
	var url;
	
	for(var i=0; i<obj.info.length; i++)
	{
		content += "<tr>";
		content += " <td width='4%' align='center'><input type='checkbox' name='DelBox' value='"+obj.info[i].ID+"' /></td>";
		content += "<td width='12%' align='center'>"+obj.info[i].name+"</td>";
		if(obj.base.type == 2 && obj.info[i].readflg == 0)
		{
			content += "<td width='27%' align='center'>"+obj.info[i].content+"<img src='./templates/images/schoolbar/wb3.gif' alt='未读邮件' title='未读邮件'/></td>";
		}
		else
		{
			content += "<td width='27%' align='center'>"+obj.info[i].content+"</td>";
		}		
		content += "<td width='13%' align='center'>"+obj.info[i].createtime+"</td>";
		if(obj.info[i].type == 5)
		{
			url = "userAddFriend("+obj.info[i].senderid+","+obj.info[i].ID+")";
			content += "<td width='12%' align='center'><input type='button' value='加为好友' onclick="+url+"><input name='Input' type='button'  value='删除' onclick='javascript:AjaxDelBox("+(obj.base.type)+","+(obj.info[i].ID)+")'/></td>";
		}
		else
		{
			content += "<td width='12%' align='center'><input name='Input' type='button'  value='删除' onclick='javascript:AjaxDelBox("+(obj.base.type)+","+(obj.info[i].ID)+")'/></td>";
		}
		
		content += "</tr>";
		content += "<tr valign='top' class='pic'>";
		content += "<td>&nbsp;</td>";
		content += "</tr>";
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
			footer += "<a  href='javascript:void(0)' onclick='javascript:AjaxGetBox("+(obj.base.type)+","+(obj.base.page-1)+")'>上一页</a>&nbsp;&nbsp;";
		}
		
		//处理中间数字选项
		for(var i=1; i<=obj.base.pageCounts; i++)
		{
			//alert("loop");
			if(obj.base.page == i)
			{
				//alert("equal");
				footer += "<a class='pageFooterStyle'><strong>"+i+"</strong></a>&nbsp;&nbsp;";
			}
			else
			{
				//alert(footer);
				footer += "<a href='javascript:void(0)' onclick='javascript:AjaxGetBox("+(obj.base.type)+","+i+")'>"+i+"</a>&nbsp;&nbsp;";
				//alert(footer);
			}
		}
		
		//处理“下一页”按钮
		if(parseInt(obj.base.page) == parseInt(obj.base.pageCounts))
		{
			footer += "<a href='javascript:void(0)' class='pageFooterStyle'><strong>下一页</storng></a>";
		}
		else
		{
			footer += "<a  href='javascript:void(0)' onclick='javascript:AjaxGetBox("+(obj.base.type)+","+(parseInt(obj.base.page)+1)+")'>下一页</a>";
		}
	}
	
	$jq("#GetBox").html(content);
	$jq("#pageFooter").html(footer);
	//var box = document.getElementById("GetBox");
	//var foot = document.getElementById("pageFooter");
	//box.innerHTML = content;
	//foot.innerHTML = footer;
	
}

//ajax删除信箱
function AjaxDelBox(type,boxid)
{
	
	var del=confirm("删除后将无法恢复,请确认");
	if(del == true)
	{
		var url = "UserCenterHandler.php?module=AjaxDelBox";
		var newAjax = new Ajax.Request(
				url,
				{
					method:'post',
					parameters:"id="+boxid+"&type="+type,
					onComplete:AjaxDelBoxBack
					
				}
			);
		return true;
	}
	return false;	
}
//ajax删除信箱回调函数
function AjaxDelBoxBack(json)
{
	var type = json.responseText;
	AjaxGetBox(type,'1');
}

//批量删除记录
function AjaxDelMultiBox(type)
{
	
	var delarr = document.getElementsByName("DelBox");
	var count = 0;
	var id = "";
	for(var i=0; i<delarr.length; i++)
	{
		if(delarr[i].checked)
		{
			id += delarr[i].value+"|";
		}	
		else
		{
			count++;
		}
	}
	if(count == delarr.length)
	{
		alert("您没有选中任何记录");
		return false;
	}
	id = id.substring(0,(id.length-1));
	//alert(id);
	var del=confirm("删除所有选中的记录,删除后无法恢复,请确认");
	if(del == true)
	{
		var url = "UserCenterHandler.php?module=AjaxDelMultiBox";
		var newAjax = new Ajax.Request(
				url,
				{
					method:'post',
					parameters:"id="+id+"&type="+type,
					onComplete:AjaxDelBoxBack
					
				}
			);
		return true;
	}
	return false;
}
//ajax批量删除信箱回调函数
function AjaxDelMultiBoxBack(json)
{
	//alert('123');
	var type = json.responseText;
	AjaxGetBox(type,'1');
}


//上传预览头像
function uploadSubmit()
{
	var v = document.getElementById("picPath");
	//alert(v.value);
	if(v.value.length > 0)
	{
		document.getElementById("uploadFrom").submit();
	}	
	//alert("suc");
}







//ajax分页获取用户订单记录
function AjaxGetUserOrder(page)
{
	var url = "UserCenterHandler.php?module=AjaxGetUserOrder";
	var newAjax = new Ajax.Request(
			url,
			{
				method:'post',
				parameters:"page="+page,
				onComplete:AjaxGetUserOrderBack
				
			}
		);
}
function AjaxGetUserOrderBack(json)
{
	var obj = eval("("+json.responseText+")");
	
	var content = "";
	var footer = "";
	
	for(var i=0; i<obj.info.length; i++)
	{
		content += "<tr>";
		content += "<td width='5%' align='center'>"+(i+1)+"</td>";
		content += "<td width='7%' align='center'><img src='./templates/images/schoolbar/10.jpg' width='50' height='50' /></td>";
		content += "<td width='23%' class='size12'><a href='#'>"+obj.info[i].orno+"</a></td>";
		content += "<td width='15%' align='center'>￥"+obj.info[i].total+"</td>";
		content += "<td width='14%' align='center'>"+obj.info[i].time+"</td>";
		content += "<td width='13%' align='center'>"+obj.info[i].status+"</td>";
		if(obj.info[i].status == 0)
		{
			content += "<td width='23%' align='center'><a href='javascript:void(0)' onclick='javascript:userCancelOrder("+obj.info[i].ID+")'>取消订单</a></td>";
		}
		else if(obj.info[i].status == 2)
		{
			//alert(obj.info[i].orderstatus);
			content += "<td width='23%' align='center'><a href='javascript:void(0)' onclick='javascript:userConfirmOrder("+obj.info[i].ID+")'>确认收货</a>&nbsp;<a href='javascript:void(0)' onclick='javascript:userApplyReback("+obj.info[i].ID+")'>申请退货</a></td>";
		}
		else
		{
			content += "<td width='23%' align='center'>无</td>";
		}
		content += "</tr>";
		content += "<tr><td>&nbsp;</td></tr>";
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
			footer += "<a  href='javascript:void(0)' onclick='javascript:AjaxGetUserOrder("+(obj.base.page-1)+")'>上一页</a>&nbsp;&nbsp;";
		}
		
		//处理中间数字选项
		for(var i=1; i<=obj.base.pageCounts; i++)
		{
			//alert("loop");
			if(obj.base.page == i)
			{
				//alert("equal");
				footer += "<a class='pageFooterStyle'><strong>"+i+"</strong></a>&nbsp;&nbsp;";
			}
			else
			{
				//alert(footer);
				footer += "<a href='javascript:void(0)' onclick='javascript:AjaxGetUserOrder("+i+")'>"+i+"</a>&nbsp;&nbsp;";
				//alert(footer);
			}
		}
		
		//处理“下一页”按钮
		if(parseInt(obj.base.page) == parseInt(obj.base.pageCounts))
		{
			footer += "<a href='javascript:void(0)' class='pageFooterStyle'><strong>下一页</strong></a>";
		}
		else
		{
			footer += "<a  href='javascript:void(0)' onclick='javascript:AjaxGetUserOrder("+(parseInt(obj.base.page)+1)+")'>下一页</a>";
		}
	}
	
	$jq("#GetOrder").html(content);
	$jq("#pageFooter").html(footer);
	//var box = document.getElementById("GetOrder");
	//var foot = document.getElementById("pageFooter");
	//box.innerHTML = content;
	//foot.innerHTML = footer;
}













//我的收藏(商品收藏)
function userGoodsCollect(page)
{
	var type = $jq("#GoodType").val();
	//alert(type);
	var url = "UserCenterHandler.php?module=AjaxGoodsCollect";
	var newAjax = new Ajax.Request(
			url,
			{
				method:'post',
				parameters:"page="+page+"&type="+type,
				onComplete:userGoodsCollectBack
				
			}
		);
}
function userGoodsCollectBack(json)
{
	var obj = eval("("+json.responseText+")");
	
	var content = "";
	var footer = "";
		
	if(obj.info == undefined)//如果查询的结果为空
	{
		//用于提示的数组
		var tips = new Array();
		tips[2] = "普通商品";
		tips[3] = "兑换商品";
		tips[4] = "特色商品";
		tips[5] = "团购商品";
		var type = $jq("#GoodType").val();
		$jq("#BackReply").html("<tr><td colspan='5' align='center'><p><strong>您尚未收藏"+tips[type]+"</p></strong></td></tr>");
		$jq("#pageFooter").html("");
		return false;
	}
	for(var i=0; i<obj.info.length; i++)
	{
		content += "<tr>";
		content += "<td width='7%' align='center'><input type='checkbox' name='GoodSel' value='"+obj.info[i].gid+"' /></td>";
		content += "<td width='12%' align='center'><a href='"+obj.info[i].collecturl+"'><img src="+obj.info[i].newimg+" width='50' height='50' /></a></td>";
		content += "<td width='23%' align='center'><a href='"+obj.info[i].collecturl+"'>"+obj.info[i].goodsname+"</a></td>";
		content += "<td width='36%' align='center'>"+obj.info[i].goodsdesc+"</td>";
		content += "<td width='10%' align='center'>"+obj.info[i].collecttime+"</td>";
		content += "<td width='9%' align='center'><a href='javascript:void(0)' onclick='javascript:onGoodDelSingle("+obj.info[i].gid+")'><img src='./templates/images/schoolbar/zc_bj6.gif' /></a></td>";
		content += "</tr>";
		content += "<tr><td>&nbsp;</td></tr>";
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
			footer += "<a  href='javascript:void(0)' onclick='javascript:userGoodsCollect("+(obj.base.page-1)+")'>上一页</a>&nbsp;&nbsp;";
		}
		
		//处理中间数字选项
		for(var i=1; i<=obj.base.pageCounts; i++)
		{
			//alert("loop");
			if(obj.base.page == i)
			{
				//alert("equal");
				footer += "<a class='pageFooterStyle'><strong>"+i+"</strong></a>&nbsp;&nbsp;";
			}
			else
			{
				//alert(footer);
				footer += "<a href='javascript:void(0)' onclick='javascript:userGoodsCollect("+i+")'>"+i+"</a>&nbsp;&nbsp;";
				//alert(footer);
			}
		}
		
		//处理“下一页”按钮
		if(parseInt(obj.base.page) == parseInt(obj.base.pageCounts))
		{
			footer += "<a href='javascript:void(0)' class='pageFooterStyle'><strong>下一页</strong></a>";
		}
		else
		{
			footer += "<a  href='javascript:void(0)' onclick='javascript:userGoodsCollect("+(parseInt(obj.base.page)+1)+")'>下一页</a>";
		}
	}
	
	document.getElementById("onGoodSel").checked = "";
	$jq("#BackReply").html(content);
	$jq("#pageFooter").html(footer);
}


//全选按钮
function onGoodSel(obj)
{
	var sel = document.getElementsByName("GoodSel");
	if(obj.checked)
	{
		//alert(9090);		
		for(var i=0;i<sel.length;i++)
		{
			sel[i].checked = "checked";
		}
	}
	else
	{
		for(var i=0;i<sel.length;i++)
		{
			sel[i].checked = "";
		}
	}
}

//删除收藏所选(多选删除)
function onGoodDel()
{
	var del=confirm("删除所有选中的记录,删除后无法恢复,请确认");
	if(del == true)
	{
		var sel = document.getElementsByName("GoodSel");
		var id = "";
		for(var i=0;i<sel.length;i++)
		{
			if(sel[i].checked)
			{
				id += sel[i].value+"|";
			}
		}
		//alert(id);

		var url = "UserCenterHandler.php?module=AjaxDelMultiCol";
		var newAjax = new Ajax.Request(
				url,
				{
					method:'post',
					parameters:"id="+id,
					onComplete:onGoodDelBack
					
				}
			);
		return true;
	}
	return false;
}
function onGoodDelBack()
{
	//alert(1111);
	document.getElementById("onGoodSel").checked = "";
	var type = $jq("#ColType").val();
	//alert(type);
	if(type == 1)
	{
		userGoodsCollect(1);
	}
	else if(type == 2)
	{
		//alert(222);
		userTZCollect(1);
	}
	else
	{
		userRZCollect(1);
	}
}
//单个删除收藏
function onGoodDelSingle(id)
{

	var del=confirm("删除后无法恢复,请确认");
	if(del == true)
	{
		id = id+"|";
		var url = "UserCenterHandler.php?module=AjaxDelMultiCol";
		var newAjax = new Ajax.Request(
				url,
				{
					method:'post',
					parameters:"id="+id,
					onComplete:onGoodDelBack
					
				}
			);
		return true;
	}
	return false;
}





//------------------------------------------日志----------------------------------

//获取用户日志收藏
function userRZCollect(page)
{
	var url = "UserCenterHandler.php?module=AjaxRZCollect";
	var newAjax = new Ajax.Request(
			url,
			{
				method:'post',
				parameters:"page="+page,
				onComplete:userRZCollectBack
				
			}
		);
}
function userRZCollectBack(json)
{
	var obj = eval("("+json.responseText+")");	
	var content = "";
	var footer = "";
	var url = "";
	if(obj.info == undefined)//如果查询的结果为空
	{
		$jq("#BackReply").html("<tr><td colspan='5' align='center'><p><strong>您尚未收藏任何好友日志</p></strong></td></tr>");
		$jq("#pageFooter").html("");
		return false;
	}
	for(var i=0; i<obj.info.length; i++)
	{

		url = "window.location='zone.php?uid="+obj.info[i].uid+"'";
		content += "<tr>";
		content += "<td width='6%' align='center'><input type='checkbox' name='GoodSel' value='"+obj.info[i].ID+"' /></td>";
		content += "<td width='15%' align='center'><a href='javascript:void(0)' onclick="+url+">"+obj.info[i].name+"</td>";
		content += "<td width='56%' align='center'><a href='javascript:void(0)' onclick=>"+obj.info[i].title+"</a></td>";
		content += "<td width='16%' align='center'>"+obj.info[i].collecttime+"</td>";
		content += "<td width='9%' align='center'><a href='javascript:void(0)' onclick='javascript:onGoodDelSingle("+obj.info[i].ID+")'><img src='./templates/images/schoolbar/zc_bj6.gif' /></a></td>";
		content += "</tr>";
		content += "<tr><td>&nbsp;</td></tr>";
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
			footer += "<a  href='javascript:void(0)' onclick='javascript:userRZCollect("+(obj.base.page-1)+")'>上一页</a>&nbsp;&nbsp;";
		}
		
		//处理中间数字选项
		for(var i=1; i<=obj.base.pageCounts; i++)
		{
			//alert("loop");
			if(obj.base.page == i)
			{
				//alert("equal");
				footer += "<a class='pageFooterStyle'><strong>"+i+"</strong></a>&nbsp;&nbsp;";
			}
			else
			{
				//alert(footer);
				footer += "<a href='javascript:void(0)' onclick='javascript:userRZCollect("+i+")'>"+i+"</a>&nbsp;&nbsp;";
				//alert(footer);
			}
		}
		
		//处理“下一页”按钮
		if(parseInt(obj.base.page) == parseInt(obj.base.pageCounts))
		{
			footer += "<a href='javascript:void(0)' class='pageFooterStyle'><strong>下一页</strong></a>";
		}
		else
		{
			footer += "<a  href='javascript:void(0)' onclick='javascript:userRZCollect("+(parseInt(obj.base.page)+1)+")'>下一页</a>";
		}
	}
	
	document.getElementById("onGoodSel").checked = "";
	$jq("#BackReply").html(content);
	$jq("#pageFooter").html(footer);
}
//-------------------------------------------------------日志------------------------------------------------







//---------------------------------------------------帖子---------------------------------

//获取用户帖子
function userTZCollect(page)
{
	var url = "UserCenterHandler.php?module=AjaxTZCollect";
	var newAjax = new Ajax.Request(
			url,
			{
				method:'post',
				parameters:"page="+page,
				onComplete:userTZCollectBack
				
			}
		);
}
function userTZCollectBack(json)
{
	var obj = eval("("+json.responseText+")");
	var content = "";
	var footer = "";
	if(obj.info == undefined)//如果查询的结果为空
	{
		$jq("#BackReply").html("<tr><td colspan='5' align='center'><p><strong>您尚未收藏任何好友日志</p></strong></td></tr>");
		$jq("#pageFooter").html("");
		return false;
	}
	for(var i=0; i<obj.info.length; i++)
	{
		content += "<tr>";
		content += "<td width='7%' align='center'><input type='checkbox' name='GoodSel' value='"+obj.info[i].ID+"' /></td>";
		content += "<td width='15%' align='center'>校吧帖子</td>";
		content += "<td width='56%' align='center'><a href=''>"+obj.info[i].collectname+"</a></td>";
		content += "<td width='16%' align='center'>"+obj.info[i].collecttime+"</td>";
		content += "<td width='9%' align='center'><a href='javascript:void(0)' onclick='javascript:onGoodDelSingle("+obj.info[i].ID+")'><img src='./templates/images/schoolbar/zc_bj6.gif' /></a></td>";
		content += "</tr>";
		content += "<tr><td>&nbsp;</td></tr>";
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
			footer += "<a  href='javascript:void(0)' onclick='javascript:userTZCollect("+(obj.base.page-1)+")'>上一页</a>&nbsp;&nbsp;";
		}
		
		//处理中间数字选项
		for(var i=1; i<=obj.base.pageCounts; i++)
		{
			//alert("loop");
			if(obj.base.page == i)
			{
				//alert("equal");
				footer += "<a class='pageFooterStyle'><strong>"+i+"</strong></a>&nbsp;&nbsp;";
			}
			else
			{
				//alert(footer);
				footer += "<a href='javascript:void(0)' onclick='javascript:userTZCollect("+i+")'>"+i+"</a>&nbsp;&nbsp;";
				//alert(footer);
			}
		}
		
		//处理“下一页”按钮
		if(parseInt(obj.base.page) == parseInt(obj.base.pageCounts))
		{
			footer += "<a href='javascript:void(0)' class='pageFooterStyle'><strong>下一页</strong></a>";
		}
		else
		{
			footer += "<a  href='javascript:void(0)' onclick='javascript:userTZCollect("+(parseInt(obj.base.page)+1)+")'>下一页</a>";
		}
	}
	
	document.getElementById("onGoodSel").checked = "";
	$jq("#BackReply").html(content);
	$jq("#pageFooter").html(footer);
}


//显示用户日志
function userRZShow(diaryid)
{
	var url = "UserCenterHandler.php?module=AjaxRZShow";
	var newAjax = new Ajax.Request(
			url,
			{
				method:'post',
				parameters:"diaryid="+diaryid,
				onComplete:userRZShowBack
				
			}
		);
}
function userRZShowBack(json)
{
	var obj = eval("("+json.responseText+")");
	var content = "";
	content += "<ul>";
	content += "<li align='center'><h3>标题："+obj.title+"</h3></li><br/>";
	content += "<li align='left'>日志内容：</li><li><br/></li>";
	content += "<li align='left'>"+obj.content+"</li>";
	content += "</ul>";
	$jq("#HidShow").html("");
	$jq("#pageFooter").html("");
	$jq("#DiaryShow").html(content);	
	$jq("#DiaryShow").slideDown("slow");
	$jq("#DiaryShow").animate({height:640},"slow");
	$jq("#DiaryShow").css({"height":"auto !important","height":"640px","min-height":"px"});
	
	//$jq("#DiaryShow").html();
	
}


//---信箱添加好友
function userAddFriend(frid,msgid)
{
	var url = "UserCenterHandler.php?module=AjaxAddFriend";
	var newAjax = new Ajax.Request(
			url,
			{
				method:'post',
				parameters:"frid="+frid+"&msgid="+msgid,
				onComplete:userAddFriendBack
				
			}
		);
}
function userAddFriendBack(json)
{
	AjaxGetBox(2,1);//显示第一页
}












//------------------------------------------------订单处理-----------------------------------------

//取消订单
function userCancelOrder(orid)
{
	var url = "UserCenterHandler.php?module=AjaxCancelOrder";
	var newAjax = new Ajax.Request(
			url,
			{
				method:'post',
				parameters:"orid="+orid,
				onComplete:userCancelOrderBack
				
			}
		);
}
function userCancelOrderBack(json)
{
	if(json.responseText == "success")
	{
		alert("订单已取消");
		return false;
	}
	alert(json.responseText);
}



//申请退货
function userApplyReback(orid)
{
	var url = "UserCenterHandler.php?module=AjaxRebackOrder";
	var newAjax = new Ajax.Request(
			url,
			{
				method:'post',
				parameters:"orid="+orid,
				onComplete:userApplyRebackBack
				
			}
		);
}
function userApplyRebackBack(json)
{
	if(json.responseText == "exist")
	{
		alert("退货申请已发送");
		return false;
	}
	alert(json.responseText);
}




//确认收货
function userConfirmOrder(orid)
{
	var url = "UserCenterHandler.php?module=AjaxConfirmOrder";
	var newAjax = new Ajax.Request(
			url,
			{
				method:'post',
				parameters:"orid="+orid,
				onComplete:userConfirmOrderBack
				
			}
		);
}
function userConfirmOrderBack(json)
{
	if(json.responseText == "success")
	{
		alert("确认收货");
		return false;
	}
	alert(json.responseText);
	
}





//-----------Address-------------------
function getProvince()//动态获取省份
{
	
}
function getCity(obj)//动态获取城市
{
	var level = "2";
	var parentid = obj.value;
	var url = "UserCenterHandler.php?module=AjaxGetAddr";
	var newAjax = new Ajax.Request(
			url,
			{
				method:'post',
				parameters:"level="+level+"&parentid="+parentid,
				onComplete:""
				
			}
		);
}
function getDistrct(obj)//动态获取区
{
	alert(obj.value);
	var level = "3";
	var parentid = obj.value;
	var url = "UserCenterHandler.php?module=AjaxGetAddr";
	var newAjax = new Ajax.Request(
			url,
			{
				method:'post',
				parameters:"level="+level+"&parentid="+parentid,
				onComplete:""
				
			}
		);
}
function generateCitySel(obj)
{
	var content;
	var obj = eval("("+json.responseText+")");
	for(var i=0; i<obj.length; i++)
	{
		content += "<option value='"+obj[i].ID+"'>"+obj[i].name+"</option>";
	}
}














