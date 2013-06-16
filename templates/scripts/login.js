document.write("<script language='javascript' src='validate.js'></script>"); 
document.write("<script language='javascript' src='front.js'></script>"); 
document.write("<script language='javascript' src='prototype.js'></script>"); 
//<script src="./templates/scripts/prototype.js" type="text/javascript"></script>
function checklogin()
{
    var data = new Array();
	emailid = "email";
	passid = "password" ;
	
	clearError();//清除警告信息

	//取出用户的email和密码	
	email = document.getElementById(emailid).value;
	password = document.getElementById(passid).value;
	remember = document.getElementById("rememberstatus").checked;
	//alert(password);
	//取出用户的email和密码
	//alert(remember);
	
	if(remember)
	{
		remember="select";
	}
	else
	{
		remember="notselect";
	}
	//判断邮箱是否为空
	emailname = "电子邮箱";

	r = isNotBlank(email, emailname, data);
	//判断邮箱是否为空
	
	//判断是否是email格式
	if (r)
	{
		isMail(email,emailname,data);
	}
	//判断是否是email格式
	
	passwordname = "密码";
	isNotBlank(password,passwordname,data);

	if (data.length > 0) {
		showWarning(data);
	    return true;
	}

	//检查是否存在 ajax
	var myAjax = new Ajax.Request(
			"login.php?module=checkuser&n_email="+email+"&n_password="+password+"&n_rememberstatus="+remember,
            {
                method: 'get',
                onComplete: checkloginmessage
            }
        );
}
function checkloginmessage(response)
{
	 type = document.getElementById("logintype").value;
	
	if (response.responseText==0){
		if(type=="0")
		{
			location.reload();
		}
		else
		{
			window.location.href="index.php";
		}
		return false;
	}					//登陆成功
	else
	{
		//var errodiv=$('errodiv');
		var data = Array();
		data.push(response.responseText);
		showWarning(data);
		//errodiv.innerHTML=response.responseText;
	}
}

function LoginOut()
{
	 window.location.hash = "#content";
	var myAlert = document.getElementById("alert");
	var reg = document.getElementById("content");  
	var mClose = document.getElementById("close");   
	
	rememberstatus = getCookie("rememberstatus");
	
	if(rememberstatus==1)
	{
		password = getCookie("password");
		email = getCookie("email");
		
		document.getElementById("email").value=email;
		document.getElementById("password").value=password;
		document.getElementById("rememberstatus").checked="checked";
	}
	if(reg.onclick)
	{
		//alert("aaaaaaaa");
		myAlert.style.display = "block";  
		myAlert.style.position = "absolute";  
		myAlert.style.top = "40%";  
		myAlert.style.left = "50%";  
		myAlert.style.marginTop = "-75px";  
		myAlert.style.marginLeft = "-150px";  
		  
		mybg = document.createElement("div");   
		mybg.setAttribute("id","mybg");   
		mybg.style.background = "#000";  
		mybg.style.width = "100%";  
		mybg.style.height = "100%";  
		mybg.style.position = "absolute";  
		mybg.style.top = "0";  
		mybg.style.left = "0";  
		mybg.style.zIndex = "500";  
		mybg.style.opacity = "0.6";  
		mybg.style.filter = "Alpha(opacity=60)";  
		document.body.appendChild(mybg);  
		document.body.style.overflow = "auto";  
	}
	mClose.onclick = function()  
	{  
		myAlert.style.display = "none";  
		mybg.style.display = "none";  
	} ; 
}



function getCookie(objName)
{
	var arrstr = document.cookie.split(";");
	
	//alert(document.cookie);
	for(var i=0;i<arrstr.length;i++)
	{
		var temp = arrstr[i].split("=");
		temp[0]=trim(temp[0]);
		
		if(temp[0]==objName)
		{
			return trim(unescape(temp[1]));
		}
		
	}
}