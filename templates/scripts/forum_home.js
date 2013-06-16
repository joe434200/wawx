
//提交表单时的验证信息
function checkSubmit()
  {
	editor.sync();
  	 var checktitle;
  	 var checklabel;
  	 var checkcontent;
  	 var checkforum;
   //验证标题是否为空
      var title = document.getElementById("title").value;
      if(title == null || title.length == 0)
    	  {
    	  document.getElementById("title").style.borderColor = "red";
    	  checktitle = "&nbsp;&nbsp;请输入标题";
    	  document.getElementById("limittitle").innerHTML = checktitle;
    	  document.getElementById("limittitle").style.color = "red";
    	  }
      else
    	  {
    	  document.getElementById("title").style.borderColor = "";
    	  checktitle = "";
    	  document.getElementById("limittitle").style.color = "";
    	  }
    //验证标签
    var labels = document.getElementById("labels").value;
	var lab =labels.split(",");
	var leng = lab.length;
	//alert(leng);
	
	 if(leng == 0||!labels)
	   {
		 document.getElementById("labels").style.borderColor = "red";
		 checklabel = "&nbsp;&nbsp;请添加标签";
   	     document.getElementById("limitlabel").innerHTML = checklabel;
   	     document.getElementById("limitlabel").style.color = "red";
	   }
	  else if(leng > 5)
		{
		 
		 document.getElementById("labels").style.borderColor = "red";
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
				    	  document.getElementById("labels").style.borderColor = "red";
				    	  checklabel = "&nbsp;&nbsp;每个标签最多20个字符";
				    	  document.getElementById("limitlabel").innerHTML = checklabel;
				    	  document.getElementById("limitlabel").style.color = "red";
				    	  break;
				    	 }
			}
			if(i==leng)
				{
				  document.getElementById("labels").style.borderColor = "";
				  checklabel = "";
				  document.getElementById("limitlabel").innerHTML = "&nbsp;&nbsp;最多添加5个标签，多个标签之间用\",\"(英文逗号)分隔";
		    	  document.getElementById("limitlabel").style.color = "";
				}
	
		}
    //验证发帖内容是否为空
	 if (editor.isEmpty()) 
	   {
		checkcontent = "&nbsp;&nbsp;请输入发帖内容";
   	     document.getElementById("limitcontent").innerHTML = checkcontent;
   	     document.getElementById("limitcontent").style.color = "red";
	   }
	 else
		 {
		  checkcontent = "";
   	      document.getElementById("limitcontent").style.color = "";
		 }
	//验证帖子类型是否为空
     var forumtype = document.getElementById("forumtype").value;
	 if(forumtype == 0)
		 {
		 document.getElementById("forumtype").style.borderColor = "red";
		 checkforum = "&nbsp;&nbsp;请选择帖子类型";
   	     document.getElementById("limitforum").innerHTML = checkforum;
   	     document.getElementById("limitforum").style.color = "red";
		 }
	 else
		 {
		  document.getElementById("forumtype").style.borderColor = "";
		  checkforum = "";
   	      document.getElementById("limitforum").style.color = "";
		 }
    if(checktitle==""&&checklabel==""&&checkcontent==""&&checkforum=="")
    	{
  	       $('sendforum').submit();
    	}
  }




//   用来显示剩余多少字，并限制字数，传入3个参数，分别为表单区的名字，表单域元素id，字符限制;
 function   textCounter(field,countfield,maxlimit)   
 {   
	
	 var field = document.getElementById(field);
	 if(field.value.length   >   maxlimit)
		 {
		      //如果元素区字符数大于最大字符数，按照最大字符数截断；     
		     field.value   =   field.value.substring(0,maxlimit);   
		 }
	       
	  else   
		  {
		    //在记数区文本框内显示剩余的字符数；
			  var countfield = document.getElementById(countfield);
		      var count = maxlimit - field.value.length;   
		      countfield.innerHTML="&nbsp;&nbsp;你还可以输入"+count+"个字符";
		  }
  }   

 
 //帖子置顶操作
 function changetop()
 {
	 var forumtop = document.getElementById("forumtop").innerHTML;
	 var forumid = document.getElementById("forumid").value;
	 if(forumtop == "帖子置顶")
		 {
		   topflg = 1;
		 }
	 else
		 {
		   topflg = 0;
		 }
	 var myAjax = new Ajax.Request(
				"forum_home.php?module=top&topflg="+topflg+"&forumid="+forumid,
	            {
	                method: 'get',//是ajax返回时，需要执行的js  函数
	                onComplete: changetopReponse//ajax返回时，需要执行的js  函数
	            }
	        );

 }
 function changetopReponse(response)
 {

		var res = response.responseText;
		var topimage = document.getElementById("Layer1");
		if(res == "1")
		{
			document.getElementById("forumtop").innerHTML="取消置顶";
			topimage.innerHTML = "<img src=\"./templates/images/schoolbar/005.gif\"/>";
		}
		else
		{
			document.getElementById("forumtop").innerHTML="帖子置顶";
			topimage.innerHTML ="";
		}
		
	 
 }
 //帖子精华操作
 function changeexcel()
 {
	 var forumexcel = document.getElementById("forumexcel").innerHTML;
	 var forumid = document.getElementById("forumid").value;
	 if(forumexcel == "帖子加精")
		 {
		   excelflg = 1;
		 }
	 else
		 {
		   excelflg = 0;
		 }
	 var myAjax = new Ajax.Request(
				"forum_home.php?module=excel&excelflg="+excelflg+"&forumid="+forumid,
	            {
	                method: 'get',//是ajax返回时，需要执行的js  函数
	                onComplete: changeexcelReponse//ajax返回时，需要执行的js  函数
	            }
	        );

 }
 function changeexcelReponse(response)
 {

		var res = response.responseText;
		if(res == "1")
		{
			document.getElementById("forumexcel").innerHTML="取消加精";
		}
		else
		{
			document.getElementById("forumexcel").innerHTML="帖子加精";
		}
		
	 
 }
 
 //帖子屏蔽操作
 function changeshield()
 {
	 var forumshield = document.getElementById("forumshield").innerHTML;
	 var forumid = document.getElementById("forumid").value;
	 if(forumshield == "帖子屏蔽")
		 {
		 shieldflg = 1;
		 }
	 else
		 {
		 shieldflg = 0;
		 }
	 var myAjax = new Ajax.Request(
				"forum_home.php?module=shield&shieldflg="+shieldflg+"&forumid="+forumid,
	            {
	                method: 'get',//是ajax返回时，需要执行的js  函数
	                onComplete: changeshieldReponse//ajax返回时，需要执行的js  函数
	            }
	        );

 }
 function changeshieldReponse(response)
 {

		var res = response.responseText;
		if(res == "1")
		{
			document.getElementById("forumshield").innerHTML="取消屏蔽";
		}
		else
		{
			document.getElementById("forumshield").innerHTML="帖子屏蔽";
		}
		
	 
 }
 
//二级回复屏蔽操作
 var secondid;
 function changesecondreply(secondreplyid)
 {
	 secondid =secondreplyid;
	 secondfield= "secondreply"+secondid;
	 var secondshield = document.getElementById(secondfield).innerHTML;
	 if(secondshield == "屏蔽")
		 {
		 shieldflg = 1;
		 }
	 else
		 {
		  shieldflg = 0;
		 }
	 var myAjax = new Ajax.Request(
				"forum_home.php?module=secondreplyshield&shieldflg="+shieldflg+"&secondid="+secondid,
	            {
	                method: 'get',//是ajax返回时，需要执行的js  函数
	                onComplete: changesecondreplyReponse//ajax返回时，需要执行的js  函数
	            }
	        );

 }
 function changesecondreplyReponse(response)
 {

		var res = response.responseText;
		secondfield= "secondreply"+secondid;
		if(res == "1")
		{
			document.getElementById(secondfield).innerHTML="取消屏蔽";
		}
		else
		{
			document.getElementById(secondfield).innerHTML="屏蔽";
		}
		
	 
 }
//提交回复时判断验证码是否正确

 function checkpic()
 {
 	 var myAjax = new Ajax.Request(
 				"forum_home.php?module=checkpic",
 	            {
 	                method: 'get',//是ajax返回时，需要执行的js  函数
 	                onComplete: checkreply//ajax返回时，需要执行的js  函数
 	            }
 	        );
 	}
 //回帖所做的验证表单
 function checkreply(response)
 {
	 var imageres = response.responseText;
	 editor.sync();
	 var checkfield;
	 var checkcontent;
	//验证发帖内容是否为空
	 if (editor.isEmpty()) 
	   {
		 checkcontent = "&nbsp;&nbsp;请输入发帖内容";
   	     document.getElementById("limitcontent").innerHTML = checkcontent;
   	     document.getElementById("limitcontent").style.color = "red";
	   }
	 else
		 {
		  checkcontent = "";
   	      document.getElementById("limitcontent").style.color = "";
		 }
	 //判断验证码是否为空
	 var checkvalue = document.getElementById("checkfield").value;
	 
	 if(!checkvalue)
		 {
		 checkfield="&nbsp;&nbsp;请输入验证码";
		 document.getElementById("checknum").innerHTML=checkfield;
		 document.getElementById("checknum").style.color = "red";
		 }
	 else if(checkvalue != imageres)
		{
		 	checkfield = "&nbsp;&nbsp;验证码错误";
			document.getElementById("checknum").innerHTML=checkfield;
			document.getElementById("checknum").style.color = "red";

		}
	else
		{
		checkfield ="";
		document.getElementById("checknum").innerHTML="";
		}
	 if(checkfield==""&&checkcontent=="")
		 {
		 $('sendreply').submit();
		 }
 	
 }
 var listenuserid;
 function listen(userid)
 {
	 listenuserid =userid;
	 var myAjax = new Ajax.Request(
				"forum_home.php?module=listen&userid="+listenuserid,
	            {
	                method: 'get',//是ajax返回时，需要执行的js  函数
	                onComplete: listenReponse//ajax返回时，需要执行的js  函数
	            }
	        );
 }
 function listenReponse(response)
 {
	 res = response.responseText;
	 field = "listen"+listenuserid;
	 var fieldobj = document.getElementsByName(field);
	
	 for(var i = 0;i<fieldobj.length;i++)
		 {
		  fieldobj[i].innerHTML = res;
		 }
	 
 }
 
 //验证消息框内容
 function checkmessage()
 {
	var receiver = document.getElementById("receiver").value;
	var messagetitle = document.getElementById("messagetitle").value;
	var messagecontent = document.getElementById("messagecontent").value;
	 
	 if(messagetitle.length==0)
		 {
		 document.getElementById("checkmessagetitle").innerHTML="&nbsp;请输入标题";
		 return;
		 }
	 else if(messagetitle.length>40)
		 {
		 document.getElementById("checkmessagetitle").innerHTML="&nbsp;多于40个字符";
		 return;
		 }
	 else 
		 {
		  document.getElementById("checkmessagetitle").innerHTML="";
		 }
	if(messagecontent.length==0)
	 {
	 document.getElementById("checkmessagecontent").innerHTML="&nbsp;请输入标题";
	 return;
	 }
    else if(messagecontent.length>80)
	 {
	 document.getElementById("checkmessagecontent").innerHTML="&nbsp;多于80个字符";
	 return;
	 }
    else 
	 {
	  document.getElementById("checkmessagecontent").innerHTML="";
	 }
	 document.getElementById("message").style.display = "none";
	 var myAjax = new Ajax.Request(
				"forum_home.php?module=sendmessage&receiver="+receiver+"&messagetitle="+messagetitle+"&messagecontent="+messagecontent,
	            {
	                method: 'get'//是ajax返回时，需要执行的js  函数
	            }
	        );
	 
	 
 }
 function checkforumlogin()
 {
 	//取出用户的email和密码	
 	var email2 = document.getElementById("ema").value;
 	var password2 = document.getElementById("pwd").value;
 	var rememberstatus=document.getElementById("remember").checked;
 	if(rememberstatus)
	{
 		rememberstatus="select";
	}
	else
	{
		rememberstatus="notselect";
	}
 //	alert(password2);
// 	email2 = email2.replace(/账号/,"");
// 	password2 =  password2.replace(/密码/,"");
 	if(!email2)
 		{
 		 document.getElementById("checkloginid").innerHTML="&nbsp;&nbsp;&nbsp;&nbsp;*请输入邮箱";
 		 return;
 		}
 	if(!email2.match(/^[a-zA-Z0-9_\.,-]+@([a-zA-Z0-9_\.,-]+\.[a-zA-Z0-9]+$)/))
		{
		document.getElementById("checkloginid").innerHTML="&nbsp;&nbsp;&nbsp;&nbsp;*邮箱格式不正确";
		return;
		}
 	if(!password2)
 		{
 		document.getElementById("checkloginid").innerHTML="&nbsp;&nbsp;&nbsp;&nbsp;*请输入密码";
 		return;
 		}
 	
 	//检查是否存在 ajax
 	
 	var myAjax = new Ajax.Request(
 			"forum_home.php?module=checkuser&email2="+email2+"&password2="+password2+"&rememberstatus2="+rememberstatus,
             {
                 method: 'get',
                 onComplete: checkloginmessage2
             }
         );
  }
 function checkloginmessage2(response)
 {
	res=response.responseText;
	//alert(res);
 	if(res==1)
 	{
 		document.getElementById("checkloginid").innerHTML="&nbsp;&nbsp;&nbsp;&nbsp;*用户不存在";
 	}
 	else if(res==2)
 		{
 		document.getElementById("checkloginid").innerHTML="&nbsp;&nbsp;&nbsp;&nbsp;*密码不正确";
 		}
 	else if(res==0)
 		{
 		 $('forumlogin').submit();
 		}
 }
 
 //点击二级回复
 function pageScroll(ID,nickname)
 {
 	   //    window.location.hash = "#position";
	        editor.html('');
 		   
 		    if(ID==null)
 		    {
 		    	  ID=0;
 		    	  re=" ";
 		    	  editor.insertHtml(re);
 		    	 
 		    	  
 		    }
		 	document.getElementById('replyID').value = ID;
		 	if(ID)
		 	{
		 		 re = "回复 @"+nickname+"：";
		 	     editor.insertHtml(re);
	 	   
            }
    

 }
 
//发信息所用
 function sendmessage($id)
 {
    document.getElementById("receiver").value=$id;
 	var mymessage = document.getElementById("message");
 	var mClose = document.getElementById("messageclose");
 	document.getElementById("messagetitle").value="";
 	document.getElementById("messagecontent").value="";
 		mymessage.style.position = "absolute";  
 		toplength=window.screen.availHeight/2+document.documentElement.scrollTop;
 		leftlength=window.screen.availWidth/2+document.documentElement.scrollLeft; 
 		mymessage.style.top =toplength+"px";
 		mymessage.style.left =leftlength+"px";
 		mymessage.style.marginTop = "-75px";  
 		mymessage.style.marginLeft = "-150px";  
 		mymessage.style.display = "block";  
 		
 		
 		  
 	mClose.onclick = function()  
 	{  
 		mymessage.style.display = "none";
 	
 	} ; 
 }
 
 //收藏
 function collectforum()
 {
	 current_url=window.location.href;
		var myAjax = new Ajax.Request(
	 			"forum_home.php?module=collect&current_url="+current_url,
	             {
	                 method: 'get',
	                 onComplete: collectsuccess
	             }
	         );
 }
 
 function collectsuccess(response)
 {
	 res=response.responseText;
	 if(res)
		 {
		 document.getElementById("collect").innerHTML="[收藏成功]";
		 document.getElementById("collect").disabled=true;
		 }
 }
 
 //输入用户名
 function inputemail()
 {
	 var email2=document.getElementById("email2");
	 var ema=document.getElementById("ema");
	 if(email2.value!="账号")
	  return;
	  email2.style.display = "none";
	  ema.style.display = "";
	  ema.value = "";
	  ema.focus();
 }
 function leaveemail()
 {
	 var email2=document.getElementById("email2");
	 var ema=document.getElementById("ema");
	 if(ema.value != "") return;
	 ema.style.display = "none";
	 email2.style.display = "";
	 email2.value = "账号";
 }
 //输入密码
 function inputpassword()
 {
	 var pass=document.getElementById("password2");
	 var pwd=document.getElementById("pwd");
	 if(pass.value!="密码")
		 return;
		 pass.style.display = "none";
		 pwd.style.display = "";
		 pwd.value = "";
		 pwd.focus();
		
 }
 
 function leavepassword()
 {
	 var pass=document.getElementById("password2");
	 var pwd=document.getElementById("pwd");
	 if(pwd.value != "") return;
	 pwd.style.display = "none";
	 pass.style.display = "";
	 pass.value = "密码";
 }
 

 