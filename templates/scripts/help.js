var clickcount = 1;
function checkSubmit()
{
	clearError();
    var data = new Array();
    var title = $('title').value;
   isNotBlank(title, 'ファイル名', data);
   isAllowedLength(title,50,'ファイル名',data);
   
    
    var fileFiled = $('fileFiled').value;
    
	    if($('edit').value=='')
	    {	
	    	
	    	isNotBlank(fileFiled, '添付', data);
	    }
	    else
    	{
	    	if(fileFiled!='')
	    	checkOverLapFile('1','fileFiled');
    	}
    
    if (data.length > 0) {
        showWarning(data);
        return true;
    }
    
	 $('huhu').submit();

}
function showhide()
{
	if (clickcount % 2 == 1)
	{
		document.getElementById('mokuji').style.display='block';
		document.getElementById('mc').value=1;
		
	}
	else
	{
		document.getElementById('mokuji').style.display='none';
		document.getElementById('mc').value=0;
	}
	clickcount++;
}

function deleteHelp(id)
{
	    if (!delete_confirm()) {
	        return ;
	    }
	    window.location = "help.php?module=del&id="+id;

}

