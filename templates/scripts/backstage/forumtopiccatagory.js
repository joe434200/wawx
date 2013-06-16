
function checksubmit()
{
	var errors = new Array();
	forumtopictypename = $('forumtopictypename').value;

	isNotBlank(forumtopictypename,'论坛话题分类名称',errors);

	if (errors.length > 0) {
        showWarning(errors);
        return true;
    }
	
	
    $('theForm').submit();
	
	
	
  //return validator.passed();
}


  