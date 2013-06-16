
function checksubmit()
{
	var errors = new Array();
	actname = $('actname').value;

	isNotBlank(actname,'活动分类名称',errors);

	if (errors.length > 0) {
        showWarning(errors);
        return true;
    }
	
	
    $('theForm').submit();
	
	
	
  //return validator.passed();
}
function hiddenparent()
{
	var selected = document.getElementById('level2').checked;
	if (selected)
	{
		document.getElementById('selectparent').style.display="block";
	}
	else
	{
		document.getElementById('selectparent').style.display="none";
	}
}

  