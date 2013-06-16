
var userid = null;
var idm = null;

//set input text's pos
function set_ShoDiv_Pos()
{
	var tableHeight = document.getElementById("tabuserlist").offsetHeight+150;


	try{
		document.getElementById('fade').style.height = tableHeight;
		if(document.all)
		{

			//document.getElementById('fade').style.left = mousePos.x-500;
			document.getElementById('light').style.top = mousePos.y+20;
			document.getElementById('light').style.left = mousePos.x-500;
		}
		else
		{
			//document.getElementById('fade').style.top = mousePos.y+20;
			//document.getElementById('fade').style.left = mousePos.x-500;
			document.getElementById('light').style.top = mousePos.y+20+"px";
			document.getElementById('light').style.left = mousePos.x-500+"px";
		}
		return true;
	}catch(e)
	{
		return false;

	}
}
function checkSubmit()
{
	clearError();
    var data = new Array();
    // ブランド名称必須入力チェック
    var username1 = $('username1').value;
    var username2 = $('username2').value;
    isNotBlank(username1+username2, '氏名', data);
    //isNotBlank(username2, '氏名', data);
    var pronunciation1 = $('pronunciation1').value;
    var pronunciation2 = $('pronunciation2').value;
    isNotBlank(pronunciation1+pronunciation2, 'カナ', data);
  //----------------------氏名、カナ---------------------------

	isNameJp(username1 + username2, "氏名", data);


	isNameKana(pronunciation1 + pronunciation2, "カナ", data);
	//----------------------check end-------------------------------




    //isNotBlank(pronunciation2, 'カナ', data);
    var email1 = $('email1').value;
    var email2 = $('email2').value;
    isNotBlank(email1+email2, 'Mail Address', data);
    isMail(email1+"@"+email2, 'Mail Address', data);


    var depart = $('idm_depart').value;
    isNotBlank(depart, '部門', data);





  //------------------check password-----------------------------

	var pwd1 = $('password').value;
	var pwd2 = $('repassword').value;




	errflag = isNotBlank($('password').value,"パスワード",data);//blank check
	if (errflag)
	{
		errflag = checkpasslen(pwd1,4, "パスワード",data);
		if (errflag)
		{
			errflag = isHankaku(pwd1,"パスワード",data);//半角英数字チェック

		}

	}
	if (errflag)
	{
		errflag=isNotBlank($('repassword').value,"パスワード再入力",data);//blank check
		if (errflag)
		{
			// 文字列の大小比較
		    equals(pwd1, pwd2, "パスワード", "確認パスワード", data);

		}

	}
    //isNotBlank(email2, 'Mail Address', data);

    if (data.length > 0) {
        showWarning(data);
        return true;
    }
    checkUserEmailExist(email1,email2);


}


//取指定部门
function doGetDepart()
{
	//alert('uuuuuuuuuuu');
	sel = document.getElementById('idm_company');
	v = sel.options[sel.selectedIndex].value;
	//72-78行是执行ajax
	var myAjax = new Ajax.Request(
			"user.php?module=depart&comid="+v,
            {
                method: 'get',//是ajax返回时，需要执行的js  函数
                onComplete: GetDepartSucc//ajax返回时，需要执行的js  函数
            }
        );

}
function checkUserEmailExist($mail1,$mail2)
{
	var uid = document.getElementById('uid').value;
	var rightobj = document.getElementById('userright');
	var currright = rightobj.options[rightobj.selectedIndex].value;
	var myAjax = new Ajax.Request(
			"user.php?module=chkmail&mail1="+$mail1+"&mail2="+$mail2+"&uid="+uid+"&currright="+currright,
            {
                method: 'get',//是ajax返回时，值传递
                onComplete: checkUserEmailExist_succ//ajax返回时，需要执行的js  函数
            }
        );
}
function checkUserEmailExist_succ(response)
{
	var text = response.responseText;

	var data = new Array();
	if (text != null && text != "")
	{
		text = "* "+text;
		data.push(text);
		showWarning(data);
		return true;//存在
	}
	else
	{
		$('frmuser').submit();
	}

}
function GetDepartSucc(response)//这个函数必须带一个参数response(是user.php返回的结果),这个response不是字符串，是个对象
{
	departlist = response.responseText;//这个responseText就相当于对象的一个属
	sel = document.getElementById('idm_depart');//得到下拉列表对象
	sel.options.length=0;
	if (departlist != "")
	{
		dep = departlist.split("|");//解析字符串

		for (var i = 0; i < dep.length; i++)//循环解析字符串，生成对应下拉列表
		{
			tempoption = dep[i].split(":");
			sel.options[sel.length] = new Option(tempoption[1],tempoption[0]);
		}
	}
	//alert(departlist);
}
function deleteUser(id) {


   clearError();
  //  alert(id);
   if (!delete_confirm()) {
        return ;
    }
  // alert("123");
   call('user.php', 'module=del&id=' + id);
}
function deleteSuccess()
{
	location = "user.php?module=list";
}




function dakai(uid,idm_com)
{

	userid = uid;
	idm = idm_com;

	this.getUsers(idm_com);


	set_ShoDiv_Pos();
	document.getElementById('light').style.display='block';
	document.getElementById('fade').style.display='block';


}


function guanbi()
{

	var yuanGong=document.getElementById("yuanGong");
	yuanGong.value="";
	var huoQu=document.getElementById("D2");
	for(var k=0;k<huoQu.length;k++)
	yuanGong.value=yuanGong.value + huoQu.options[k].value + " ";
	document.getElementById('light').style.display='none';
	document.getElementById('fade').style.display='none';
}

function agent()
{

	var myids = document.getElementsByName("ID");
	proid = "";
	for (i = 0; i < myids.length; i++)
	{
		if(myids[i].checked)
		{
			proid = myids[i].value;
			break;
		}
	}

	location = "user.php?module=agent&userid="+userid+"&proid="+proid;
}



//-----------------------------------------------------------------
//------------------------------------------------------------------------------

//选择代理
function moveselect(obj,target,all)
{
	 if (!all) all=0;
	 if (obj!="[object]") obj=eval("document.all."+obj);
	 target=eval("document.all."+target);
	 if (all==0)
	 {
		   while (obj.selectedIndex>-1){
		   //alert(obj.selectedIndex)
		   mot=obj.options[obj.selectedIndex].text;
		   mov=obj.options[obj.selectedIndex].value;
		   obj.remove(obj.selectedIndex);
		   var newoption=document.createElement("OPTION");
		   newoption.text=mot;
		   newoption.value=mov;
		   target.add(newoption);
	   }
	 }
	 else
	 {

		  for (i=0;i<obj.length;i++)
		   {
			   mot=obj.options[i].text;
			   mov=obj.options[i].value;
			   var newoption=document.createElement("OPTION");
			   newoption.text=mot;
			   newoption.value=mov;
			   target.add(newoption);
		   }
		  obj.options.length=0;
	 }
}
//ajax获取代理人列表
function getUsers(idm)
{
	//alert("user.php?module=pro&idm_company="+idm);


	var myAjax = new Ajax.Request(
			"user.php?module=pro&idm_company="+idm+"&userid="+userid,
            {
                method: 'get',//是ajax返回时，需要执行的js  函数
                onComplete: getUsersReponse//ajax返回时，需要执行的js  函数
            }
        );

}

function getUsersReponse(response)
{
	list = response.responseText;//这个responseText就相当于对象的一个属
	table = document.getElementById('userlist');//得到下拉列表对象
	//table.removeChild(oldChild);

	var line = null;
	var depItem = null;
	var usertype = null;


	if (list != "")
	{

		dep = list.split("|");//解析字符串
		//firstrow =  document.getElementById('userlist');//得到下拉列表对象


		for (var i = 0; i < dep.length; i++)//循环解析字符串，生成对应下拉列表
		{

			//tempoption = dep[i].split(":");
			//sel.options[sel.length] = new Option(tempoption[1],tempoption[0]);
			depItem = dep[i].split(":");
			//alert(depItem.length);

			line = i+1;

			if(depItem[2] == "1")
			{
				usertype = "システム";
			}
			else if(depItem[2] == "0")
			{
				usertype = "普通ユーザー";
			}
			var newTr = table.insertRow(i+1);//insert a new row
			var newTd = new Array();
			newTr.insertCell(0).innerHTML = "<input type='radio' name='ID' id='ID' value='"+depItem[0]+"'/>";
			newTr.insertCell(1).innerHTML = line;
			newTr.insertCell(2).innerHTML = depItem[1];
			newTr.insertCell(3).innerHTML = depItem[4];
			newTr.insertCell(4).innerHTML = depItem[3];
			newTr.insertCell(5).innerHTML = usertype;




			/*table.innerHTML = "<tr>";
			table.innerHTML = "<td align='center'><input type='radio' name='ID' id='ID' value='"+depItem[0]+"'/></td>";
			table.innerHTML = "<td>"+line+"</td>";
			table.innerHTML = "<td>"+depItem[1]+"</td>";
			table.innerHTML = "<td>"+depItem[4]+"</td>";
			table.innerHTML = "<td align='center'>"+depItem[3]+"</td>";
			table.innerHTML = "<td align='center'>"+usertype+"</td>";
			//table.innerHTML = "<td align='center'>{if $item2.usertype eq '1'}システム{elseif $item2.usertype eq '0'}普通ユーザー{/if}</td>";
			table.innerHTML = "</tr>";
			*/


		}




	}

}


function search()
{
	//alert(idm);
	//alert(userid);
	var keyword = null;
	keyword = document.getElementById("keyword").value;
	//alert(keyword);
	//if(keyword != "" || keyword == null)
	{
		var myAjax = new Ajax.Request(
				"user.php?module=search&keyword="+escape(keyword)+"&userid="+userid+"&idm_company="+idm,
	            {
	                method: 'get',//是ajax返回时，需要执行的js  函数
	                onComplete: getSearchResponse//ajax返回时，需要执行的js  函数
	            }
	        );
	}
	//else
	{
		//alert("必ず入力してください");
	}
	//location='user.php?module=search&keyword='+keyword;
}


function getSearchResponse(response)
{

	list = response.responseText;//这个responseText就相当于对象的一个属
	table = document.getElementById('userlist');//得到下拉列表对象


	var line = null;
	var depItem = null;
	var usertype = null;

	//alert(list);

	if (list != "")
	{
		mylength = table.rows.length;

		for (i = 0; i < mylength; i++)
		{
			if (i != 0)
			{
				table.deleteRow(1);
			}
		}

		dep = list.split("|");//解析字符串

		for (var i = 0; i < dep.length; i++)//循环解析字符串，生成对应下拉列表
		{

			//tempoption = dep[i].split(":");
			//sel.options[sel.length] = new Option(tempoption[1],tempoption[0]);
			depItem = dep[i].split(":");
			//alert(depItem.length);

			line = i+1;

			if(depItem[2] == "1")
			{
				usertype = "システム";
			}
			else if(depItem[2] == "0")
			{
				usertype = "普通ユーザー";
			}
			var newTr = table.insertRow(i+1);//insert a new row
			var newTd = new Array();
			newTr.insertCell(0).innerHTML = "<input type=\"radio\" name=\"ID\" id=\"ID\" value=\""+depItem[0]+"\"/>";
			newTr.insertCell(1).innerHTML = line;
			newTr.insertCell(2).innerHTML = depItem[1];
			newTr.insertCell(3).innerHTML = depItem[4];
			newTr.insertCell(4).innerHTML = depItem[3];
			newTr.insertCell(5).innerHTML = usertype;

		}
	}
	else
	{
		alert("存在しません");
	}

}
//------------------------------------------------------------------





