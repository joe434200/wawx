/**
 * 
 */

// #FF3300 红色  #4CB849 绿色
var red = "#FF3300";
var green = "#4CB849";
var code = false;
var ck_email = false;

//验证邮箱
function Reg_isMail(value)
{
	if(value.match(/^[a-zA-Z0-9_\.,-]+@([a-zA-Z0-9_\.,-]+\.[a-zA-Z0-9]+$)/))
	{
		return true;
	}
	return false;
}

//设置提示
function set_tips(obj,text,color,isset)
{
	if(isset)
	{
		obj.innerHTML = text;
		//obj.setAttribute("style","color:"+color+";font-size:12px" );
		obj.style.color=color;
		obj.style.fontSize = "12px;";
	}
	else
	{
		obj.innerHTML = "";
	}
}
//设置通过图片
function set_corret_img(obj,isset)
{
	if(isset)
	{
		var content = "<img src='./templates/images/schoolbar/zc_bj5.gif'/>";
		obj.innerHTML = content;
	}
	else
	{
		obj.innerHTML = "";
	}
	
}

//设置提示样式
function setEnterEorrer(obj,isset,color,text)
{
	if(isset)
	{
		if(color == "red")
		{
			obj.style.borderColor = '#cc0000';
			obj.style.background = '#F5DCDC';
			obj.value = text;
		}
		else
		{
			obj.style.borderColor = green;
			
		}
		obj.style.fontSize = '12px';
		return;
	}
	obj.style.borderColor = '';
	obj.style.background = '';
	//obj.value = '';
	
}
function setPwdEnterError(obj,isset,color,text)
{
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
	obj.style.borderColor = '';
	obj.style.background = '';
	obj.value = '';
}
















//验证email-----------------------email-------------
function check_vali_email(obj)
{
	if(obj.value.length < 1)
	{
		setEnterEorrer(obj,true,"red","邮箱地址不能为空");
		return false;
	}
	else if(Reg_isMail(obj.value))//验证是否为邮箱
	{
		var email = obj.value;
		var url = "register.php?module=ajax_check_email";
		var pars = "email="+email;
		var newAjax = new Ajax.Request(
				url,
				{
					parameters:pars,
					method:'get',
					onComplete:Get_Ck_Email
				 }
			);
		return true;
	}
	else
	{
		//alert("alse");
		setEnterEorrer(obj,true,"red","该邮箱无效，请输入正确的邮箱地址");
		return false;
	}
	
	//alert("end");
}
function Get_Ck_Email(response)//ajax
{
	var email_obj = document.getElementById("email_obj");	
	if(response.responseText == "1")
	{
		setEnterEorrer(email_obj,true,"red","该邮箱已经被注册");
		ck_email = false;
		return false;
	}
	else
	{
		setEnterEorrer(email_obj,true,"green","");
		ck_email = true;
		return true;
		
	}
}
//---------------------------------------------//

//验证密码
function check_vali_pwd(obj)
{
	//alert("pwd");
	if(obj.value.length <= 5 )
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
		//alert("true");
		setPwdEnterError(obj,true,"green","");
		return true;
	}
}
//二次验证密码
function check_vali_repwd(obj)
{
	//alert("repwd");	
	var pwd = document.getElementById("pwd");
	//alert(pwd);
	//alert(obj.value);
	if(obj.value == pwd.value)
	{
		//alert(111);
		setPwdEnterError(obj,true,"green","");
		return true;
	}
	else
	{
		setPwdEnterError(obj,true,"red","重复密码不一致");
		return false;
	}
}



//验证码检查
function check_vali_code()
{
	
	var ck_code = document.getElementById("code");
	var url = "register.php?module=check_verycode";
	var newAjax = new Ajax.Request(
			url,
			{
				parameters:"verycode="+ck_code.value,
				method:'get',
				onComplete:check_vali_code_back
			 }
		);
	
}
function check_vali_code_back(json)
{
	var ck_code = document.getElementById("code");
	//alert(json.responseText);
	if(json.responseText == "1")
	{
		setEnterEorrer(ck_code,true,"green","");
		code = true;
		return true;
	}
	setEnterEorrer(ck_code,true,"red","验证码输入有误");
	code = false;
	return false;
}




//验证上传文件------------------------
function check_vali_file()
{
	var objfile = document.getElementById("shopLicence").value;
	var tips = document.getElementById("tips_shoplicence");
	if(objfile.length < 1)
	{	
		set_tips(tips,"请上传有效营业执照",red,true);
		return false;
		
	}
	else
	{
		var objtype=objfile.substring(objfile.lastIndexOf(".")).toLowerCase();
		var fileType=new Array(".bmp",".gif",".png",".jepg",".jpg");
		for(var i=0; i<fileType.length; i++)
		{
	        if(objtype==fileType[i])
	        {        	
	        	set_tips(tips,"上传文件有效",green,true);
		    	return true;
	        }
	    }
		set_tips(tips,"请选择有效文件",red,true);
    	return false;

	}
	
}


//验证联系电话
function check_vali_number(obj)
{
	var reg =/^0?(13[0-9]|15[012356789]|18[0236789]|14[57])[0-9]{8}$/;
	if(obj.value.length < 1)
	{
		setEnterEorrer(obj,true,"red","联系电话不能为空");
		return false;
	}
	else if(!reg.test(obj.value))
	{
		setEnterEorrer(obj,true,"red","联系电话格式不正确");
		return false;
	}
	else
	{
		setEnterEorrer(obj,true,"green","");
		return true;
	}
}

//验证勾选网络协议
function check_CKBOX()
{
	//check_vali_file();
	var tips = document.getElementById("tips_submit");
	if(document.register_form.protocol_ck.checked)
	{
		set_tips(tips,"","",false);
		return true;
	}
	else
	{		
		set_tips(tips,"尚未勾选同意网络协议",red,true);
		return false;
	}
}



//验证负责人
function check_vali_user(obj)
{

	//只能是中文，英文，数字：
	//var reg = "/^(\w|[\u4E00-\u9FA5])*$/";
	if(obj.value.length<1)
	{
		setEnterEorrer(obj,true,"red","负责人不能为空");
		return false;
	}
	else if(!obj.value.match(/^([\u4e00-\u9fa5]+|[a-zA-Z0-9]+)$/))
	{
		setEnterEorrer(obj,true,"red","负责人不能含有特殊字符");
		return false;
	}
	else
	{
		setEnterEorrer(obj,true,"green","");
		return true;
	}
	
	/*	else if(obj.value.match(reg))
	{
		set_tips(tips,"不能包含特殊字符",red);
	}*/
}

//判断不空
function check_other(obj,idname,text)
{
	//var tips = document.getElementById(idname);
	var text_f = text+"不能为空";
	//var text_t = "输入正确";
	if(obj.value.length < 1)
	{
		setEnterEorrer(obj,true,"red",text_f);
		return false;
	}
	else if(obj.value.length > 100)
	{
		setEnterEorrer(obj,true,"red",text+"字符不能大于100");
		return false;
	}
	else
	{
		setEnterEorrer(obj,true,"green","");
		return true;
	}
	
}





//提交表单
function check_submit(value)
{
	var tips = document.getElementById("tips_submit");
	//----------判断网络协议是否勾选--------------
	if(document.register_form.protocol_ck.checked)
	{

		//获取表单对象
		var reg_form = document.getElementById("register_form");
		//获取共同check对象，验证共同部分
		var tips2 = document.getElementById("pwd");
		var tips3 = document.getElementById("repwd");
		
		if( ck_email && check_vali_pwd(tips2) && check_vali_repwd(tips3) && check_vali_code())//全部验证通过
		{
			
			if(parseInt(value) == 1)
			{
				
				var tips4 = document.getElementById("shopname");
				var tips5 = document.getElementById("shoptype");
				var tips6 = document.getElementById("shopcharger");
				var tips7 = document.getElementById("shopnumber");
				var tips8 = document.getElementById("shopaddress");
				var tips9 = document.getElementById("remark");
				if(check_other(tips4,"tips_shopname","店名") && check_other(tips5,"tips_shoptype","经营范围") && check_vali_user(tips6) && check_vali_number(tips7) && check_other(tips8,"tips_shopaddress","门店") && check_vali_file() && check_other(tips9,"tips_remark","备注"))
				{
					reg_form.submit();
					
				}
				else
				{
					set_tips(tips,"请完善注册资料",red,true);
					
				}
				
			}
			else
			{
				reg_form.submit();
			}	
		}
		else
		{
			//alert(444);
			set_tips(tips,"请完善注册资料",red,true);
		}
		
		
		
	}
	else
	{
		set_tips(tips,"尚未勾选同意网络协议",red,true);
	}
}





//---------------------------------生成验证码---------------------------------
/*
function createCode()  
{   
  code = "";  
  var codeLength = 6;//验证码的长度  
  var checkCode = document.getElementById("checkCode");  
  var selectChar = new Array(0,1,2,3,4,5,6,7,8,9,'A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');//所有候选组成验证码的字符，当然也可以用中文的  
     
  for(var i=0;i<codeLength;i++)  
  {       
	  var charIndex = Math.floor(Math.random()*36);  
	  code +=selectChar[charIndex];      
  }  
  //alert(code);  
  if(checkCode)  
  {  
    checkCode.className="code";  
    checkCode.value = code;  
  }  
    
}
*/

var time = 5;
//注册成功，自动跳转
function autoDirect()
{
	alert("auto");
	setInterval(timeCount,1000);
}
function timeCount()
{
	//alert(time);
	if(time == 0)
	{
		window.location="loginstep.php";
		return;
	}
	var obj = document.getElementById("timecount");
	obj.innerHTML = time--;
}





