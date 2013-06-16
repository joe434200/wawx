function checksubmit()
{
	var interest=document.getElementById("interest").value;
	var limit =document.getElementById("interestlimit");
	if(interest.length==0)
		{
		//$jq("#interestlimit").html("请输入标签");
		limit.innerHTML="&nbsp;&nbsp;请输入标签";
		return;
		}
	 if(interest.length>20)
		 {
	//	 $jq("#interestlimit").html("标签长度不能大于20");
		 limit.innerHTML="&nbsp;&nbsp;标签不能大于20个字符";
		 return;
		 }
	 location.href="loginstep.php?module=friend&label="+interest;
	}

//获取标签分页
function AjaxGetLabels(page)
{
	var url = "loginstep.php?module=GetLabelsSplit";
	
	//获取JSON数据
	var newAjax = new Ajax.Request(
			url,
			{
				method:'post',
				parameters:"page="+page,
				onComplete:AjaxGetLabelsBack
				
			}
		);
}
function AjaxGetLabelsBack(json)
{
	var obj = eval("("+json.responseText+")");
	
	
	var content = "";
	var footer = "";
	
	//显示相册
	for(var i=0; i<obj.info.length; i++)
	{
		content += "<li>";
		content += "<a href='loginstep.php?module=friend&label="+obj.info[i].mylabels+"'>"+obj.info[i].mylabels+"</a>";
		content += "</li>";
	}
	
	
	//显示分页
	if(obj.base.pageCounts > "1")
	{
		//处理“下一页”按钮
		if(parseInt(obj.base.page) < parseInt(obj.base.pageCounts))
		{
			footer += "<span class='a0693e3'><a  href='javascript:void(0)' onclick='javascript:AjaxGetLabels("+(parseInt(obj.base.page)+1)+")'>换一组</a></span>";
		}
		else
			{
			footer += "<span class='a0693e3'><a  href='javascript:void(0)'></a></span>";
			}
	
	}
	$jq("#labelsarea").html(content);
	$jq("#pageFooter").html(footer);
	//$jq("#currpage").html(obj.base.page);
}

//获取好友分页
var arr = new Array();
function AjaxGetfriends(label,page)
{
	
	
	var url = "loginstep.php?module=GetfriendsSplit";
	var friendsname = document.getElementsByName("friendcheckbox[]");
	 for(var i = 0;i<friendsname.length;i++)
	 {
		  if(friendsname[i].checked)
			 {
			  arr.push(friendsname[i].value);
			 }
		
	 }
	 document.getElementById("friendsinfo").value=arr;
	// alert(arr);
	//获取JSON数据
	var newAjax = new Ajax.Request(
			url,
			{
				method:'post',
				parameters:"page="+page+"&label="+label+"&friendsID="+arr,
				onComplete:AjaxGetfriendsBack
				
			}
		);
}


function AjaxGetfriendsBack(json)
{
	
	
	var obj = eval("("+json.responseText+")");
	//alert(obj.info);
	var content = "";
	var footer = "";
	
	//显示相册
	for(var i=0; i<obj.info.length; i++)
	{
		//alert("haaa");
		content += "<li>";
		content += "<img src='./uploadfiles/user/"+obj.info[i].photo+"'";
		content += " onerror=";
		content +=" this.src='./templates/images/schoolbar/avatar.jpeg'";
		content +=" width='90' height='90'/><p>";
		
		if(obj.info[i].nickname)
			{
			content += obj.info[i].nickname;
			}
		else
			{
			content += obj.info[i].email;
			}
		content += "</p>";
		content +="<p><input name='friendcheckbox[]' type='checkbox' value='"+obj.info[i].ID+"'/></p></li>";
	}
	
	//显示分页
	if(obj.base.pageCounts > "1")
	{
		//处理“下一页”按钮
		if(parseInt(obj.base.page) < parseInt(obj.base.pageCounts))
		{
			var url = "javascript:AjaxGetfriends('"+obj.base.label+"',"+(parseInt(obj.base.page)+1)+")";
			footer +=  "<span class='a0693e3'><a  href='javascript:void(0)' onclick="+url+">换一组</a></span>";
		}
		else
		{
			footer += "<span class='a0693e3'><a  href='javascript:void(0)'></a></span>";
		}
	}
	$jq("#friendsarea").html(content);
	$jq("#pageFooter").html(footer);
}