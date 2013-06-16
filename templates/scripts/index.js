function doGetDepart(ID)
{	
	var myAjax = new Ajax.Request(	
			"index.php?module=ajax&id="+ID,
            {
                method: 'GET',
                onComplete: GetDepartSucc
            }
        );

}
function GetDepartSucc(response)
{
	data =response.responseText;
	alert(data);
}
