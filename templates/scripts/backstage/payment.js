
function checksubmit()
{
	var errors = new Array();
	payname = $('payname').value;
	paycode = $('paycode').value;
	isNotBlank(payname,'支付方式名称',errors);
	isNotBlank(paycode,'支付方式代码',errors);
	if (errors.length > 0) {
        showWarning(errors);
        return true;
    }
	
	
    $('theForm').submit();
	
	
	
  //return validator.passed();
}

  