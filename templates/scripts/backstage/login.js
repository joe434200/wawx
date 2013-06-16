
function a()
{
	
	var errors = new Array();
	uname = $('username').value;
	
	vercode = $('captcha').value;
	isNotBlank(uname,'管理员姓名',errors);
	isNotBlank(vercode,'验证码',errors);
	
	if (errors.length > 0) {
        showWarning(errors);
        return true;
    }
	
	
	
    $('theForm').submit();
	
	
	
  //return validator.passed();
}
  function refreshYZ()
  {
  	document.getElementById('yzimg').src='GenerateYZ.php?timeamp='+new Date().getTime();
  }