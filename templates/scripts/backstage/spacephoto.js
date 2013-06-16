
function shieldActPhoto(myid)
{
	

	var myAjax = new Ajax.Request(

			"admin_spacephoto.php?act=ajaxset&id="+myid,
            {
                method: 'get',
                onComplete: shieldActPhoto_succ
            }
        );
	

}
function shieldActPhoto_succ(response)
{
	resstr=response.responseText;
	arr = resstr.split("|");
	
	if (arr.length == 2)
	{
		spanobj = document.getElementById("s_"+arr[0]);
		
		if (arr[1] == "1")
		{
			spanobj.innerHTML = "取消屏蔽";
		}
		else
		{
			spanobj.innerHTML = "屏蔽";
		}
	}
	
}

  