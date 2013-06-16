
function checksubmit()
{
	var errors = new Array();
	schoolname = $('schoolname').value;

	isNotBlank(schoolname,'学校名称',errors);
	
	schooladdr = $('schooladdr').value;

	isNotBlank(schooladdr,'学校地址',errors);

	if (errors.length > 0) {
        showWarning(errors);
        return true;
    }
	
	
    $('theForm').submit();
	
	
	
  //return validator.passed();
}

function checkImport()
{
	
	var errors = new Array();
	filepath= $('pure_ink').value;

	isNotBlank(filepath,'导入文件路径',errors);
	
	

	if (errors.length > 0) {
        showWarning(errors);
        return true;
    }
	
	
    $('haha').submit();
	
}

onchangeid = "";
function ajaxselect(obj)
{
	
	
	selectvalue = obj.options[obj.selectedIndex].value;
	
	
	onchangeid = obj.id;
	
	
	if (selectvalue != '' )
	{
		//检查是否存在
		
		var myAjax = new Ajax.Request(

				"admin_school.php?act=ajaxlist&pid="+selectvalue,
	            {
	                method: 'get',
	                onComplete: ajaxselect_succ
	            }
	        );
	}
}
function ajaxselect_succ(response)
{
	resstr=response.responseText;
	
	objjson = eval(resstr);
	//levelvalue = getSelectLevel();
	arr = onchangeid.split("_");
	
	newselectobjid = ('idm_city'+(parseInt(onchangeid.substr(8,1))+1));

	
	
	objSelect = $(newselectobjid);
	objSelect.options.length = 1;
	if (resstr != '')
	{
		
		for (k = 0; k < objjson.length; k++)
		{
			var objItemValue = objjson[k]['ID'];
			var objItemText =  objjson[k]['name'];
			var varItem = new Option(objItemText,objItemValue);
	        objSelect.options.add(varItem);
		}
	}
	
}



function ajaxselect1(obj)
{
	
	
	selectvalue = obj.options[obj.selectedIndex].value;
	
	
	onchangeid = obj.id;
	
	if (selectvalue != '' )
	{
		//检查是否存在
		
		var myAjax = new Ajax.Request(

				"admin_school.php?act=ajaxlist&pid="+selectvalue,
	            {
	                method: 'get',
	                onComplete: ajaxselect_succ1
	            }
	        );
	}
}
function ajaxselect_succ1(response)
{
	resstr=response.responseText;
	
	objjson = eval(resstr);
	//levelvalue = getSelectLevel();
	newselectobjid = ('idm_city'+(parseInt(onchangeid.substr(8,1))+1));
	
	objSelect = $(newselectobjid);
	objSelect.options.length = 0;
	if (resstr != '')
	{
		
		for (k = 0; k < objjson.length; k++)
		{
			var objItemValue = objjson[k]['ID'];
			var objItemText =  objjson[k]['name'];
			var varItem = new Option(objItemText,objItemValue);
	        objSelect.options.add(varItem);
		}
	}
	
}

function updateimport(obj)
{
	objid = obj.id;
	
	objidarr = objid.split("_");
	countryid = "idm_city0_"+objidarr[1];
	cobj = $(countryid);
	
	//countryid = cobj.options[cobj.selectedIndex].value;
	cid = cobj.options[cobj.selectedIndex].value;
	
	
	proid = "idm_city1_"+objidarr[1];
	pobj = $(proid);
	pid = pobj.options[pobj.selectedIndex].value;
	
	
	cityid = "idm_city2_"+objidarr[1];
	tobj = $(cityid);
	tid = tobj.options[tobj.selectedIndex].value;
	
	
	skyid = "idm_city3_"+objidarr[1];
	sobj = $(skyid);
	sid = sobj.options[sobj.selectedIndex].value;
	
	info = objidarr[1]+"@"+cid+"@"+pid+"@"+tid+"@"+sid;

	
	window.location = "admin_school.php?act=delimport&info="+info;
}
  