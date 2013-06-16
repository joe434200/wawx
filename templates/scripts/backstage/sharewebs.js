
function checksubmit()
{
	var errors = new Array();
	webname = $('webname').value;
	isNotBlank(webname,'分享网站名称',errors);
	
	weburl = $('weburl').value;
	isNotBlank(weburl,'分享网站URL',errors);
	
	webicon = $('webicon').value+$('oldicon').value;
	isNotBlank(webicon,'分享网站ICON称',errors);

	if (errors.length > 0) {
        showWarning(errors);
        return true;
    }
	
	
    $('theForm').submit();
	
	
	
  //return validator.passed();
}


  