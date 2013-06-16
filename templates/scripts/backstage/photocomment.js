
function checksubmit()
{
	
	act = document.getElementById('act1').value;
	gid = document.getElementById('actid').value;
	status = 0;
	$radios = $('status1').checked;
	if ($radios)
	{
		status = $('status1').value;
	}
	else
	{
		status = $('status').value;
	}
	window.location = "admin_photocomment.php?act="+act+"_rs&status="+status+"&id="+gid;
	

}

  