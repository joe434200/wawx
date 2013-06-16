function checksubmit()
{
	clearError();
	var errors = new Array();
	var have = document.getElementById('cardflg1').checked;
	if (have)
	{
		cardnum = $('cardnum').value;
		isNotBlank(cardnum,'校卡编号',errors);
		
		cardvaliddatefrom = $('cardvaliddatefrom').value;
		isNotBlank(cardvaliddatefrom,'有效期开始',errors);
		
		cardvaliddateto = $('cardvaliddateto').value;
		isNotBlank(cardvaliddateto,'有效期结束',errors);
	}
	
	

	if (errors.length > 0) {
        showWarning(errors);
        return true;
    }
	
	
    $('theForm').submit();
	
	
	
  //return validator.passed();
}

function checkForm()
{
	clearError();
	var errors = new Array();
	email = $('email').value;
	isNotBlank(email,'EMAIL',errors);
	isMail(email,'EMAIL',errors);
	
	password = $('password').value;
	isNotBlank(password,'密码',errors);
	
	repassword = $('repassword').value;
	
	equals(password,repassword,"密码","确认密码",errors);
	
	nickname = $('nickname').value;
	isNotBlank(nickname,'昵称',errors);
	
	realname = $('realname').value;
	isNotBlank(realname,'真实姓名',errors);
	

	if (errors.length > 0) {
        showWarning(errors);
        return true;
    }
	
	//checkUserEmailExist(email1,email2);
    $('theForm').submit();
	
}
function checkUserEmailExist(email)
{
	

	if (email != '' && email != null)
	{
		var myAjax = new Ajax.Request(
			"admin_user.php?act=chkmail&email="+email,
            {
                method: 'get',//是ajax返回时，值传递
                onComplete: checkUserEmailExist_succ//ajax返回时，需要执行的js  函数
            }
        );
	}
}
function checkUserEmailExist_succ(response)
{
	var text = response.responseText;


	var data = new Array();
	if (text != null && text != "")
	{
		text = "* "+text;
		$('emailshowtext').innerHTML = text;
		//data.push(text);
		//showWarning(data);
		return true;//存在
	}
	else
	{
		$('emailshowtext').innerHTML = "*";
	}
	

}

function setEnableByUserType(obj)
{
	//var usertype = document.getElementById('usertype');
	if (obj.selectedIndex == 1)
	{
		document.getElementById('person').style.display = "";
		document.getElementById('enterprise').style.display = "none";
		
	}
	else if (obj.selectedIndex == 2)
	{
		document.getElementById('person').style.display = "none";
		document.getElementById('enterprise').style.display = "";
	}
	else
	{
		document.getElementById('person').style.display = "";
		document.getElementById('enterprise').style.display = "";
	}
	
}

function getCardNum()
{
	var have = document.getElementById('cardflg1').checked;
	document.getElementById('cardnum').value = '';
	if (have)
	{
		var myAjax = new Ajax.Request(

				"admin_user.php?act=card",
	            {
	                method: 'get',
	                onComplete: getCardNum_succ
	            }
	        );
	}

}
function getCardNum_succ(response)
{
	document.getElementById('cardnum').value = response.responseText;
}
function setStatus()
{
	act = document.getElementById('act1').value;
	gid = document.getElementById('actid').value;
	status = 0;
	$radios = $('status1').checked;
	if ($radios)
	{
		status = $('status1').value;
	}
	else
	{
		status = $('status').value;
	}
	window.location = "admin_user.php?act="+act+"_rs&status="+status+"&id="+gid;
}

  