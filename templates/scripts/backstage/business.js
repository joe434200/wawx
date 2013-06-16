function setStatus(type,value,id)
{
	
	var myAjax = new Ajax.Request(

			"admin_business.php?act=status&type="+type+"&v="+value+"&id="+id,
            {
                method: 'get',
                onComplete: setStatus_succ
            }
        );
}

function setStatus_succ(response)
{
	resstr=response.responseText;
	
	objjson = eval(resstr);
	myid = objjson[0]['id'];
	mytype = objjson[0]['type'];
	myvalue = objjson[0]['status'];
	createHTML(myid,mytype,myvalue);
}

function createHTML(myid,type,status)
{
	tdimgid = document.getElementById(""+myid+"_"+type+"_img");
	tdtxtid = document.getElementById(""+myid+"_"+type+"_txt");
	
	if (status == '1')//变成0
	{
		$(tdimgid).innerHTML = "<img src=\"./templates/images/backstage/yes.gif\" border=\"0\" height=\"16\" width=\"16\"  />";
		$(tdtxtid).innerHTML = "<a href=\"#\" onclick=\"javascript:setStatus('"+type+"','0','"+myid+"')\">取消</a>";
		
	}
	else//变成1
	{
		$(tdimgid).innerHTML = "<img src=\"./templates/images/backstage/no.gif\" border=\"0\" height=\"16\" width=\"16\"  />";
		$(tdtxtid).innerHTML = "<a href=\"#\" onclick=\"javascript:setStatus('"+type+"','1','"+myid+"')\">设置</a>";
	}
}


  