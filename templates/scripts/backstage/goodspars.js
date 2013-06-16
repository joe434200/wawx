
function checksubmit()
{
	var errors = new Array();
	optionname = $('optionname').value;

	isNotBlank(optionname,'项目名称',errors);

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

  