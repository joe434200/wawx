/**
 * 
 */




function grpchecksubmit()
{
	var errors = new Array();
	clearError();
	modulename = $('groupname').value;
	isNotBlank(modulename,'模块名称',errors);
	if (errors.length > 0) {
        showWarning(errors);
        return true;
    }
	
    $('theForm').submit();
	
	
}

function noticechecksubmit()// 公告提交
{
	var errors = new Array();
	clearError();
	tiltle = $('title').value;
	isNotBlank(title,'标题',errors);
	if (errors.length > 0) {
        showWarning(errors);
        return true;
    }
	
    $('theForm').submit();
	
	

}


//控制div显示
function hidparentlist()
{

	var chk = $('nodetypechild').checked;//如果nodetypechild被选中的话
	if (chk == true)
	{
		$('upnode').style.display = "block";
	}
	else
	{
		$('upnode').style.display = "none";//看是否存在grouptypechild这个东西。
	}
}


