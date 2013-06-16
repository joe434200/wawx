
function checksubmit()
{
	var errors = new Array();
	grptopictypename = $('grptopictypename').value;

	isNotBlank(grptopictypename,'圈子话题分类名称',errors);

	if (errors.length > 0) {
        showWarning(errors);
        return true;
    }
	
	
    $('theForm').submit();
	
	
	
  //return validator.passed();
}


  