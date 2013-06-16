
function checkForm()
{
	var errors = new Array();
	goodsname = $('goodsname').value;
	isNotBlank(goodsname,'商品名称',errors);
	
	goodsnumber = $('goodsnumber').value;
	var rs = isNotBlank(goodsnumber,'库存数量',errors);
	if (rs)
	{
		isSuuji(goodsnumber,'库存数量',errors);
	}
	
	warnnumber = $('warnnumber').value;
	rs = isNotBlank(warnnumber,'安全库存数量',errors);
	if (rs)
	{
		isSuuji(warnnumber,'安全库存数量',errors);
	}

	if (errors.length > 0) {
        showWarning(errors);
        return true;
    }
	
	
    $('theForm').submit();
	
	
	
  //return validator.passed();
}

function setExchangeEnabled(obj)
{
	
	if (obj.checked)
	{
		$('exchangemoney').disabled = false;
		
	}
	else
	{
		
		$('exchangemoney').disabled = true;
	}
};

function setPromoteEnabled(obj)
{
	
	if (obj.checked)
	{
		$('promoteprice').disabled = false;
		$('promotestartdate').disabled = false;
		$('promoteenddate').disabled = false;
	}
	else
	{
		$('promoteprice').disabled = true;
		$('promotestartdate').disabled = true;
		$('promoteenddate').disabled = true;
	}
};

function setGroupEnabled(obj)
{
	if (obj.checked)
	{
		
		$('groupstarttime').disabled = false;
		$('groupexpiretime').disabled = false;
	}
	else
	{

		$('groupstarttime').disabled = true;
		$('groupexpiretime').disabled = true;
	}
}

function deleteImg(myid)
{
	var myAjax = new Ajax.Request(

			"shopadmin_goods.php?act=delphoto&id="+myid,
            {
                method: 'get',
                onComplete: deleteImg_succ
            }
        );
}
function deleteImg_succ(response)
{
	resstr=response.responseText;
	myid = resstr;
	imgid = "img_"+myid;
	delimgid = "delimg_"+myid;
	pobj = document.getElementById("photolist");
	oldchild = document.getElementById(imgid);
	oldchilddel = document.getElementById(delimgid);

	oldchild.parentNode.removeChild(oldchild) ;
	oldchilddel.parentNode.removeChild(oldchilddel) ;
}

function setStatus(type,value,id)
{
	
	var myAjax = new Ajax.Request(

			"admin_goods.php?act=status&type="+type+"&v="+value+"&id="+id,
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
currseq = 1;
function addPar()
{
	document.getElementById("errormsg").innerHTML = "";
	obj = document.getElementById("goodspars");
	goodpartxt = document.getElementById("goodsparstxt").value;
	if (goodpartxt == "")
	{
		document.getElementById("errormsg").innerHTML = "请输入商品参数";
		return;
	}
	goodsname=obj.options[obj.selectedIndex].text;
	goodsvalue = goodpartxt;
	var v_li=document.createElement("li");//生成li
	showvalue =  goodsname+":"+goodsvalue;
	v_li.id = ""+currseq;
	imgid="img_"+currseq;
	v_li.innerHTML =showvalue+"<input type='hidden' name='goodspars[]' value='"+showvalue+"'/>&nbsp;&nbsp;<img src='./templates/images/backstage/no.gif' id='"+imgid+"' onclick=\"javascript:delli(this)\"/>";
	currseq++;
	$('parlist').appendChild(v_li); 


	
}
function delli(obj)
{
	objid = obj.id;
	//alert(objid);
	obj.parentNode.parentNode.removeChild(obj.parentNode);
}


  