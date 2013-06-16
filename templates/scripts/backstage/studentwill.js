
function checksubmit()
{
	var errors = new Array();
	willname = $('willname').value;

	isNotBlank(willname,'分类名称',errors);

	if (errors.length > 0) {
        showWarning(errors);
        return true;
    }
	
	
    $('theForm').submit();
	
	
	
  //return validator.passed();
}


  