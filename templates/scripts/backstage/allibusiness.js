
function checksubmit()
{
	var errors = new Array();
	bsiname = $('bsiname').value;
	isNotBlank(bsiname,'商家名称',errors);
	
	linkurl = $('linkurl').value;
	isNotBlank(linkurl,'主页(URL)',errors);

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

  