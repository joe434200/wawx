
function checkmessage()
{
    var data = new Array();

    groupname = "groupname";
    type = "type";
    groupinfo = "groupinfo";
    label = "label";
    school="school";

	groupname = document.getElementById(groupname).value;
	type = document.getElementById(type).value;
	school = document.getElementById(school).value;
	groupinfo = document.getElementById(groupinfo).value;
	label = document.getElementById(label).value;
	
	if(groupname == null || groupname.length == 0)
	  {
		  document.getElementById("groupname").style.borderColor = "red";
		  checktitle = "&nbsp;&nbsp;请输入圈子名称";
		  document.getElementById("limittitle").innerHTML = checktitle;
		  document.getElementById("limittitle").style.color = "red";
	  }
	else
	  {
		  document.getElementById("groupname").style.borderColor = "";
		  checktitle = "";
		  document.getElementById("limittitle").innerHTML = checktitle;
		  document.getElementById("limittitle").style.color = "";
	  }
	

	 var lab =label.split(",");
	 var leng = lab.length;
	 //alert(label.length);
	 //alert(leng);
	 if(label.length == 0)
	  {
		 document.getElementById("label").style.borderColor = "red";
		 checklabel = "&nbsp;&nbsp;请添加标签";
 	     document.getElementById("limitlabel").innerHTML = checklabel;
 	     document.getElementById("limitlabel").style.color = "red";
	  }
	  else if(leng > 5)
	  {
		 
		 document.getElementById("label").style.borderColor = "red";
		 checklabel = "&nbsp;&nbsp;最多添加五个标签";
 	     document.getElementById("limitlabel").innerHTML = checklabel;
 	     document.getElementById("limitlabel").style.color = "red";
	    	
	  }
	  else
	 {
	     document.getElementById("label").style.borderColor = "";
		 checklabel = "";
		 document.getElementById("limitlabel").innerHTML = "&nbsp;&nbsp;最多添加5个标签，多个标签之间用\",\"(英文逗号)分隔";
		 document.getElementById("limitlabel").style.color = "";

	
		}
	 
	 
	 if(type == 0)
	  {
		  document.getElementById("type").style.borderColor = "red";
		  checktype = "选择类型";
		  document.getElementById("limittype").innerHTML = checktype;
		  document.getElementById("limittype").style.color = "red";
	  }
	 else if(type==2||type==3)
	  {
		 if(school==null)
		 {
		  checktype = "选择学校";
		  document.getElementById("limittype").innerHTML = checktype;
		  document.getElementById("limittype").style.color = "red";
		 }
		 else
		 {
			 checktype = "";
			 document.getElementById("limittype").innerHTML = checktype;
			 document.getElementById("limittype").style.color = "";
		 }
	  }
	 else
	  {
		  document.getElementById("type").style.borderColor = "";
		  checktype = "";
		  document.getElementById("limittype").innerHTML = checktype;
		  document.getElementById("limittype").style.color = "";
	  }
	

	 if (groupinfo==null || groupinfo.length==0) 
	   {
		 document.getElementById("groupinfo").style.borderColor = "red";
		 checkinfo = "&nbsp;&nbsp;圈子介绍不能为空";
 	     document.getElementById("limitcontent").innerHTML = checkinfo;
 	     document.getElementById("limitcontent").style.color = "red";
	   }
	 else
		 {
		  document.getElementById("groupinfo").style.borderColor = "";
		  checkinfo = "";
		  document.getElementById("limitcontent").innerHTML = checkinfo;
 	      document.getElementById("limitcontent").style.color = "";
		 }
	 
	if(checktitle==""&&checklabel==""&&checktype==""&&checkinfo=="")
 	{
		$('frm2').submit();
 	}

}


function showWarningData(error_list)
{
	msg = "";
	for(var i = 0; i < error_list.length; i++) {
		msg = msg +  error_list[i];
		msg = msg + "\r\n";
	}
	alert(msg);
}

function showType()
{
	
	type = document.getElementById('type').value;

	if(type==0)
	{
		document.getElementById('type1').disabled = "disabled";
		document.getElementById('school').disabled = "disabled";
		document.getElementById('school').value="请输入学校的名称";
	}
	else
	{
		if(type==1)
		{
			document.getElementById('type1').disabled = "";
			document.getElementById('school').disabled = "disabled";
			document.getElementById('school').value="请输入学校的名称";
		}
	    else if(type==2)
		{
	    	document.getElementById('type1').disabled = "disabled";
			document.getElementById('school').disabled = "";
			
			if(document.getElementById('school').value=="请输入学校的名称")
			{
				document.getElementById('school').value="";
			}
		}
		else if(type==3)
		{
			document.getElementById('type1').disabled = "";
			document.getElementById('school').disabled = "";
			document.getElementById('school').value="";
		}
		
		var myAjax = new Ajax.Request(
				"grp_home.php?module=showType&type="+type,
	            {
	                method: 'get',
	                onComplete: returntype
	            }
	        );
	}
	
}
function returntype(response)
{
	resstr=response.responseText;
	
	var objjson = eval(resstr);
		
		if(resstr==null)
		{
			objSelect = $('type1');
			objSelect.options.length = 0;
		}
		else
		{
			objSelect = $('type1');
			objSelect.options.length = 1;
			for (k = 0; k < objjson.length; k++)
			{
				var objItemValue = objjson[k]['id'];
				var objItemText =  objjson[k]['name'];
				var varItem = new Option(objItemText,objItemValue);
		        objSelect.options.add(varItem);
			}
		}
	
}

function checkIn()   //加入圈子
{
	ID=document.getElementById("grp_ID").value;;
	
	var myAjax = new Ajax.Request(
			"grp_info.php?module=checkIn&grp_ID="+ID,
            {
                method: 'get',
                onComplete: checkreturn
            }
        );
}
function checkreturn(response) //加入圈子
{
	if (response.responseText==0){
		
			alert("* 请勿重复提交申请");
			return false;
	}				//登陆成功
	else if(response.responseText==1)
	{
		alert("* 您的申请已提交，请耐心等待管理员的批准");
		location.reload();
		return false;
	}
	else if(response.responseText==2)
	{
		alert("* 您已成功加入了该圈子");
		location.reload();
		return false;
	}
	else
	{
		alert("* 您已加入该圈子");
		return false;
	}
}

function exit()   //退出圈子
{
	ID=document.getElementById("grp_ID").value;;
	
	var myAjax = new Ajax.Request(
			"grp_info.php?module=exit&grp_ID="+ID,
            {
                method: 'get',
                onComplete: exitreturn
            }
        );
}
function exitreturn(response)  //退出圈子
{
	if (response.responseText==1)
	{
		alert("已成功退出该圈");
		location.reload();
	}
	else
	{
		alert("ERROR");
	}
}

function dismiss()
{
	ID=document.getElementById("grp_ID").value;

	var myAjax = new Ajax.Request(
			"grp_info.php?module=dismiss&grp_ID="+ID,
            {
                method: 'get',
                onComplete: dismissreturn
            }
        );
	
}
function dismissreturn(response)  //退出圈子
{
	if (response.responseText==1)
	{
		alert("已经成功解散该圈子");
		window.location.href="grp_home.php";
	}
	else
	{
		alert("ERROR");
	}
}




function check_char(max_number,type)   //显示剩余数字
{
	var text = "text"+type;
	var label = "label"+type;
	var len=document.getElementById(text).value; 
	
	var len=max_number-len.length; 
	
	if(len>0)
	{
		var show="你还可以输入"+len+"个字"; 
		document.getElementById(label).innerText=show; 
	}
	else if(len<0)
	{
		len = -len;
		var show=" * 已经超出"+len+"个字"; 
		document.getElementById(label).innerText=show; 
	}
	else
	{
		var show="已经达到最大字数限制"; 
		document.getElementById(label).innerText=show;
	}

}

function checkBlock()  //新建回复
{	
	c = document.getElementById("textarea").value;
	
	if(isBlank(c))
	{
		alert("评论不能为空");
	}
	else
	{
		$('frm2').submit();
		//location.reload();
	}

}

function checkSubmit()
{
	 var checktitle;
	 var checklabel;
	 var checkforum;
	 var checkcontent;
 //验证标题是否为空
    var title = document.getElementById("text1").value;
    if(title == null || title.length == 0)
  	  {
  	  document.getElementById("text1").style.borderColor = "red";
  	  checktitle = "&nbsp;&nbsp;请输入标题";
  	  document.getElementById("limittitle").innerHTML = checktitle;
  	  document.getElementById("limittitle").style.color = "red";
  	  }
    else
  	  {
  	  document.getElementById("text1").style.borderColor = "";
  	  checktitle = "";
  	  document.getElementById("limittitle").style.color = "";
  	  }
  //验证标签
    var labels = document.getElementById("text3").value;
	var lab =labels.split(",");
	var leng = lab.length;
	//alert(leng);
	
	 if(leng == 0||!labels)
	   {
		 document.getElementById("text3").style.borderColor = "red";
		 checklabel = "&nbsp;&nbsp;请添加标签";
 	     document.getElementById("limitlabel").innerHTML = checklabel;
 	     document.getElementById("limitlabel").style.color = "red";
	   }
	  else if(leng > 5)
		{
		 
		 document.getElementById("text3").style.borderColor = "red";
		 checklabel = "&nbsp;&nbsp;最多添加五个标签";
 	     document.getElementById("limitlabel").innerHTML = checklabel;
 	     document.getElementById("limitlabel").style.color = "red";
	    	
		}
	 else
		{
			for(var i=0;i< leng;i++)
				{
				     if(lab[i].length>20)
				    	 {
				    	  document.getElementById("text3").style.borderColor = "red";
				    	  checklabel = "&nbsp;&nbsp;每个标签最多20个字符";
				    	  document.getElementById("limitlabel").innerHTML = checklabel;
				    	  document.getElementById("limitlabel").style.color = "red";
				    	  break;
				    	 }
			}
			if(i==leng)
				{
				  document.getElementById("text3").style.borderColor = "";
				  checklabel = "";
				  document.getElementById("limitlabel").innerHTML = "&nbsp;&nbsp;最多添加5个标签，多个标签之间用\",\"(英文逗号)分隔";
		    	  document.getElementById("limitlabel").style.color = "";
				}
	
		}
  //验证发帖内容是否为空
	 if (editor.isEmpty()) 
	   {
		// editor.sync();

		// document.getElementById("editor_id").style.backgroundColor = "red";
		 checkcontent = "&nbsp;&nbsp;请输入发帖内容";
 	     document.getElementById("limitcontent").innerHTML = checkcontent;
 	     document.getElementById("limitcontent").style.color = "red";
	   }
	 else
		 {
		  //document.getElementById("editor_id").style.backgroundColor = "";
		  checkcontent = "";
 	      document.getElementById("limitcontent").style.color = "";
		 }



	 
	//验证选择板块是否为空
   var forumtype = document.getElementById("type").value;
	 if(forumtype==0)
		 {
		 document.getElementById("type").style.borderColor = "red";
		 checkforum = "&nbsp;&nbsp;请选择所要发帖的板块";
 	     document.getElementById("limitforum").innerHTML = checkforum;
 	     document.getElementById("limitforum").style.color = "red";
		 }
	 else
		 {
		  document.getElementById("type").style.borderColor = "";
		  checkforum = "";
 	      document.getElementById("limitforum").style.color = "";
		 }
  if(checktitle==""&&checklabel==""&&checkforum==""&&checkcontent=="")
  	{
	       $('frm2').submit();
  	}
}

function changeGroup(type)   //换一组的方法
{
		start1 = parseInt(document.getElementById('like').value);
		start3 = parseInt(document.getElementById('excelring').value);
		start2 = parseInt(document.getElementById('super').value);
	
		
		ins_num = parseInt(document.getElementById('insnum').value);
		ex_num = parseInt(document.getElementById('exnum').value);
		super_num = parseInt(document.getElementById('supernum').value);
		
		//alert("aaaaaaaaaa");

		ins = ins_num%6;
		ex = ex_num%2;
		sup = super_num%2;
		
		if(ins != 0)
		{
			ins_num = ins_num + 6;
			ins_num = ins_num-ins;
		}

		//alert(ex_num);
		if(ex != 0)
		{
			ex_num = ex_num + 2;
			ex_num = ex_num-ex;
		}
		
		if(sup != 0)
		{
			super_num = super_num + 2;
			super_num = super_num-sup;
		}
		//alert(ex_num);
		
		if(type=="like")
		{
			start1 = start1+6;
			if(start1 == ins_num)
			{
				start1 =0;
			}
			
			var myAjax = new Ajax.Request(
					"grp_home.php?module=changeGroup&type="+type+"&start="+start1,
		            {
		                method: 'get',
		                onComplete: returnGroup
		            }
		        );
			
			document.getElementById('like').value = start1;
			document.getElementById('listtype').value = type+"list";
		}
		else if(type=="super")
		{
			
			start2 = start2+2;
			if(start2 == super_num)
			{
				start2 =0;
			}
			
			var myAjax = new Ajax.Request(
					"grp_home.php?module=changeGroup&type="+type+"&start="+start2,
		            {
		                method: 'get',
		                onComplete: returnGroup
		            }
		        );
			
	
			document.getElementById('super').value = start2;
			document.getElementById('listtype').value = type+"list";
		}
		else if(type=="excelring")
		{	
			start3 = start3+2;
			if(start3 == ex_num)
			{
				start3 =0;
			}
			
	
			var myAjax = new Ajax.Request(
					"grp_home.php?module=changeGroup&type="+type+"&start="+start3,
		            {
		                method: 'get',
		                onComplete: returnGroup
		            }
		        );
			
	
			document.getElementById('excelring').value = start3;
			document.getElementById('listtype').value = type+"list";
		}
}

function returnGroup(response)
{
	var content = "";
	var type=document.getElementById('listtype').value;
	

	var list = document.getElementById(type);

	var objjson = eval(response.responseText);
	
	if(type =="likelist")
	{
		for(k=0;k<objjson.length; k++)
		{
			content = content+"<li style='display:block' >" ;
			if(objjson[k]['photo']=="")
			{
				content = content+"<img src='./templates/images/schoolbar/def.gif'/>";
			}
			else
			{
				content = content+"<img src='./uploadfiles/group/groupImage/"+objjson[k]['photo']+"'/>";
			}
			content = content+"<p class='a0693e3'><a href='grp_single_home.php?ID="+objjson[k]['ID']+"'>"+objjson[k]['groupname']+"</a></p>"+
					  "<dd >话题："+objjson[k]['topicnum']+"</dd>"+
					  "<dd class='cl_999'>"+objjson[k]['membernum']+"人加入</dd>"+
					  "</li>";	    
		}
		list.innerHTML = content;	
	}
	else if(type =="excelringlist")
	{
		
		for(k=0;k<objjson.length; k++)
		{
			content = content+"<li>";
			if(objjson[k]['photo']=="")
			{
				content = content+"<img src='./templates/images/schoolbar/avatar.jpeg'/>";
			}
			else
			{
				content = content+"<img src='./uploadfiles/user/"+objjson[k]['photo']+"'/>";
			}
			content = content+"<dt class='aff6600'><a href='zone.php?uid="+objjson[k]['ID']+"'>"+objjson[k]['nickname']+"</a></dt>"+
					  "<dd class='a0693e3'>他的热门圈：<a href='grp_single_home.php?ID="+objjson[k]['gID']+"'>"+objjson[k]['groupname']+"</a></dd>"+
					  "<dd>成员："+objjson[k]['membernum']+"</dd>"+
					  "<dd class='cl_999'><a href='grp_single_home.php?ID="+objjson[k]['gID']+"'>去看看>></a></dd>"+
					  "</li>";	    
		}
		list.innerHTML = content;
		
	}
	else if(type =="superlist")
	{
		for(k=0;k<objjson.length; k++)
		{
			content = content+"<li>"+
					  "<img src='./uploadfiles/user/"+objjson[k]['photo']+"'/>"+
					  "<p class='aff6600'><a href='zone.php?uid="+objjson[k]['ID']+"'>"+objjson[k]['nickname']+"</a></p>"+
					  "<dd class='clearfix'><em>"+objjson[k]['topic'][0]['replynum']+"个回应</em><span class='a0693e3'>【讨论】</span><a href='grp_topic.php?module=scan&ID="+objjson[k]['topic'][0]['idt_grp_main']+"&topicID="+objjson[k]['topic'][0]['ID']+"'>"+objjson[k]['topic'][0]['title']+"</a></dd>"+
					  "<dd class='clearfix'><em>"+objjson[k]['topic'][1]['replynum']+"个回应</em><span class='a0693e3'>【讨论】</span><a href='grp_topic.php?module=scan&ID="+objjson[k]['topic'][1]['idt_grp_main']+"&topicID="+objjson[k]['topic'][1]['ID']+"'>"+objjson[k]['topic'][1]['title']+"</a></dd>"+
					  "<dd class='clearfix'><em>"+objjson[k]['topic'][2]['replynum']+"个回应</em><span class='a0693e3'>【讨论】</span><a href='grp_topic.php?module=scan&ID="+objjson[k]['topic'][2]['idt_grp_main']+"&topicID="+objjson[k]['topic'][2]['ID']+"'>"+objjson[k]['topic'][2]['title']+"</a></dd>"+
				      "</li>";	    
		}
		list.innerHTML = content;	
		
	}
	
}

function topictype()
{	
	grpID = document.getElementById('gID').value;
	
	catalog = document.getElementById('type').value;
	
	var str = "grp_topic.php?ID="+grpID+"&catalog="+catalog;
	//alert(str);
	window.location.href=str;
}

function acttype()
{
	
	grpID = document.getElementById('gID').value;
	
	catalog = document.getElementById('acttype').value;
	
	var str = "grp_act.php?ID="+grpID+"&catalog="+catalog;

	window.location.href=str;
}

function searchKey()
{
	keyword = document.getElementById('keyword').value;

	var str = "grp_home.php?module=select&keyword="+keyword;
	
	window.location.href=str;
}

function pageScroll(ID,nickname)
{
	window.location.hash = "#position";

	re = "回复 @"+nickname+"：";
	
	document.getElementById('review').value = "回复";
	document.getElementById('replyType').value = "回复";
	document.getElementById('replyID').value = ID;
	
	editor.html(re);

}


function changeSuperGroup()   //换一组的方法
{
	start2 = parseInt(document.getElementById('super').value);

	ins_num = parseInt(document.getElementById('insnum').value);
	ex_num = parseInt(document.getElementById('exnum').value);
	super_num = parseInt(document.getElementById('supernum').value);
	
	//alert("aaaaaaaaaa");
	sup = super_num%2;
	
	if(sup != 0)
	{
		super_num = super_num + 2;
		super_num = super_num-sup;
	}

	start2 = start2+2;
	
	if(start2 == super_num)
	{
		start2 =0;
	}
	
	var myAjax = new Ajax.Request(
			"grp_home.php?module=changeGroup&type=super"+"&start="+start2,
	           {
	               method: 'get',
	               onComplete: returnSuperGroup
	           }
	        );
		

	document.getElementById('super').value = start2;
	
}

function returnSuperGroup(response)
{
	var content = "";	

	var list = document.getElementById("superlist");

	var objjson = eval(response.responseText);
	
	for(k=0;k<objjson.length; k++)
	{
			content = content+
					  "<li>"+
					  "<img src='./uploadfiles/user/"+objjson[k]['photo']+"'/>"+
					  "<p class='aff6600'><a href='zone.php?uid="+objjson[k]['ID']+"'>"+objjson[k]['nickname']+"</a></p>"+
					  "<dd class='clearfix'>【讨论】<span class='a0693e3'><a href='grp_topic.php?module=scan&ID="+objjson[k]['topic'][0]['idt_grp_main']+"&topicID="+objjson[k]['topic'][0]['ID']+"'>"+objjson[k]['topic'][0]['title']+"</a></span>"+
					  "<em>"+objjson[k]['topic'][0]['replynum']+"个回应</em>"+
				      "</li>";
	}
	list.innerHTML = content;	
}

function takeCall(type,ID,nickname)
{
	memberID = parseInt(ID);

	document.getElementById('attflg').value=type;
	
	_nickname = encodeURIComponent(nickname);
	var myAjax = new Ajax.Request(
			"grp_member.php?module=takeCall&type="+type+"&memID="+ID+"&nickname="+_nickname,
            {
                method: 'get',
                onComplete: returnCall
            }
        );
}
function returnCall(response)
{
	type  = document.getElementById('attflg').value;
	
	str=response.responseText;
	
	alert(str);
	
	if(type=="attention")
	{
		location.reload();
	}
}

//点击上传图片确定按钮
function upLoadbadpicture(){


	document.getElementById('filesubmitflg').value="1";
	document.getElementById('frm2').target = 'phpframe';
	document.getElementById('frm2').submit();

	//alert("test");
	//$app.G('video').submit();

}
//图片上传成功后的回调函数
function callbackVideo(e)
{
	clearError();
	if (e.code == '1')
	{
		data = new Array();
		data.push(e.message);
		showWarning(data);
		//清空值
		who = document.getElementById("picPath");
		var who2= who.cloneNode(false);

		who.parentNode.replaceChild(who2,who);
	}
	else
	{
		pathname = "./uploadfiles/group/groupImage/"+e.newfilename;
	    document.getElementById('tmpfilename').value=e.newfilename;

	    document.getElementById('filesubmitflg').value="0";
	    document.getElementById('img').style.display="block";
	    document.getElementById('img').src=pathname;
	}
	
	return false;

}

function tiaozhuan(ID)
{
	var str = "grp_single_home.php?ID="+ID;
	//alert(str);
	window.location.href=str;
}


function selectGrpType(ID)
{
	document.getElementById('secondID').value=ID;
	document.forms[1].submit();
}

function selectGrpMemNum(type)
{
	if(type=="0")
	{
		minMember = null;
		maxMember = null;
	}
	else if(type=="1")
	{
		minMember = 1;
		maxMember = 10;
	}
	else if(type=="2")
	{
		minMember = 10;
		maxMember = 50;
	}
	else if(type=="3")
	{
		minMember = 50;
		maxMember = 100;
	}
	else if(type=="4")
	{
		minMember = 100;
		maxMember = null;
	}
	
	document.getElementById('minMember').value=minMember;
	document.getElementById('maxMember').value=maxMember;
	document.forms[1].submit();
}

function exitGrpSelect(type)
{
	if(type=="0")
	{
		document.getElementById('secondID').value=null;
		document.forms[1].submit();
	}
	else if(type=="1")
	{
		document.getElementById('minMember').value=null;
		document.getElementById('maxMember').value=null;
		document.forms[1].submit();
	}
	else if(type=="2")
	{
		document.getElementById('school').value="";
		document.forms[1].submit();
	}
	
}

function selectGrpMethod(type)
{
	if(type=="0")
	{
		document.getElementById('method').value="time";
		document.forms[1].submit();
	}
	else if(type=="1")
	{
		document.getElementById('method').value="member";
		document.forms[1].submit();
	}
}

function SureOut(str)
{
	if(window.confirm(str)){
        //alert("确定");
        return true;
     }else{
        //alert("取消");
        return false;
    }
}

function actReplyDel(type,reviewID,ID,actID)
{
	if(SureOut("您确定要删除该评论？"))
	{
		//alert("aaaaaaaaa");
		str = "grp_act.php?module=redel&type="+type+"&reviewID="+reviewID+"&ID="+ID+"&actID="+actID;
		window.location.href=str;
		
	}
	else
	{
		
	}
}


function topicReplyDel(type,reviewID,ID,topicID)
{
	if(SureOut("您确定要删除该评论？"))
	{
		//alert("aaaaaaaaa");
		str = "grp_topic.php?module=redel&type="+type+"&reviewID="+reviewID+"&ID="+ID+"&topicID="+topicID;
		window.location.href=str;
		
	}
	else
	{
		
	}
}


function photoReplyDel(module,reviewID,ID,photoID,key)
{
	if(SureOut("您确定要删除该评论？"))
	{
		alert(reviewID);
		if(module=="photo")
		{
			str = "grp_photo.php?module=redel&reviewID="+reviewID+"&ID="+ID+"&photoID="+photoID+"&key="+key;
		}
		else
		{
			str = "grp_act.php?module=redel&reviewID="+reviewID+"&ID="+ID+"&photoID="+photoID+"&key="+key;
		}
		window.location.href=str;
		
	}
	else
	{
		
	}
}


function memberReplyDel(module,ID,memID)
{
	//alert(module);
	if(module=="removeAdmin")
	{
		str="您确定要取消该成员的管理员权限？";
	}
	else if(module=="exitMember")
	{
		str="您确定要踢出该成员？";
	}
	else if(module=="setAdmin")
	{
		str="您确定要设置该成员为管理员？";
	}
	else
	{
		str="您确定要加入该成员？";
	}
	if(SureOut(str))
	{
		//alert("aaaaaaaaa");
		str = "grp_member.php?module="+module+"&ID="+ID+"&grpMemID="+memID;
		window.location.href=str;
		
	}
	else
	{
		
	}
}
