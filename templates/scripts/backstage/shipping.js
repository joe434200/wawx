
function checksubmit()
{
	var errors = new Array();
	shippingcode = $('shippingcode').value;
	isNotBlank(shippingcode,'配送代码',errors);
	
	shippingname = $('shippingname').value;
	isNotBlank(shippingname,'配送名称',errors);
	
	insure = $('insure').value;
	isNotBlank(insure,'报价费用',errors);

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

  