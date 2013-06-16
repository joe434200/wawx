
function checksubmit()
{
	var errors = new Array();
	actname = $('actname').value;

	isNotBlank(actname,'城市名称',errors);

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
function getSelectLevel()
{
	var level = document.getElementsByName('data[level]');
	var levelvalue = 0;
	for (i=0; i < level.length; i++)
	{
		if (level[i].checked)
		{
			levelvalue = i;
			break;
		}
	}
	return levelvalue;
}

function selectlevel()
{

	selectvalue = getSelectLevel();
	if (selectvalue != 0)
	{
		$('parent1').style.display = "block";
		$('selectparent').style.display = "block";
	}
	else
	{
		$('parent1').style.display = "none";
		$('selectparent').style.display = "none";
	}
	if (selectvalue > 1)
	{
		$('parent2').style.display = "block";
		
	}
	else
	{
		$('parent2').style.display = "none";
	}
	if (selectvalue > 2)
	{
		$('parent3').style.display = "block";
	}
	else
	{
		$('parent3').style.display = "none";
	}
	
}
onchangeid = "";
function ajaxselect(obj)
{
	
	
	selectvalue = obj.options[obj.selectedIndex].value;
	levelvalue = getSelectLevel();
	
	onchangeid = obj.id;
	
	if (selectvalue != '' && levelvalue != 0)
	{
		//检查是否存在
		
		var myAjax = new Ajax.Request(

				"admin_city.php?act=ajaxlist&pid="+selectvalue+"&level="+levelvalue,
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
	newselectobjid = ('parent'+(parseInt(onchangeid.substr(6,1))+1));
	objSelect = $(newselectobjid);
	if (resstr != '')
	{
		objSelect.options.length = 0;
		for (k = 0; k < objjson.length; k++)
		{
			var objItemValue = objjson[k]['ID'];
			var objItemText =  objjson[k]['name'];
			var varItem = new Option(objItemText,objItemValue);
	        objSelect.options.add(varItem);
		}
	}
	
}

  