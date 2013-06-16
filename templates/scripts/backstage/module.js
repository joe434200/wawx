
function checksubmit()
{
	var errors = new Array();
	clearError();
	modulename = $('modulename').value;
	moduleurl = $('moduleurl').value;
	isNotBlank(modulename,'模块名称',errors);
	isNotBlank(moduleurl,'模块链接',errors);
	if (errors.length > 0) {
        showWarning(errors);
        return true;
    }
	
	
    $('theForm').submit();
	
	
	
  //return validator.passed();
}
function hidparentlist()
{

	var chk = $('nodetypechild').checked;
	if (chk == true)
	{
		$('upnode').style.display = "block";
	}
	else
	{
		$('upnode').style.display = "none";
	}
}
  