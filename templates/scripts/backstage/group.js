
function checksubmit()
{
	
	act = document.getElementById('act1').value;
	gid = document.getElementById('groupid').value;
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
	window.location = "admin_group.php?act="+act+"_rs&status="+status+"&id="+gid;
	

}

  