
function checksubmit()
{
	var errors = new Array();
	linkname = $('linkname').value;
	isNotBlank(linkname,'名称',errors);
	
	linkurl = $('linkurl').value;
	isNotBlank(linkurl,'URL',errors);

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

  