
function checksubmit()
{
	var errors = new Array();
	shopname = $('shopname').value;
	isNotBlank(shopname,'分类名称',errors);
	
	shopvalue = $('shopvalue').value;
	isNotBlank(shopvalue,'Key值',errors);


	if (errors.length > 0) {
        showWarning(errors);
        return true;
    }
	
	
    $('theForm').submit();
	
	
	
  //return validator.passed();
}
function setVisible(obj)
{
	objid = obj.id;
	//检查是否存在
	
	var myAjax = new Ajax.Request(

			"admin_shopcatagory.php?act=ajaxset&objid="+objid,
            {
                method: 'get',
                onComplete: setVisible_succ
            }
        );
	
}
function setVisible_succ(response)
{
	resstr=response.responseText;
	if (resstr != "F")
	{
		arr = resstr.split("_");
		if (arr[0] == "nimg")
		{

			$('nimg_'+arr[1]).style.display = "none";
			$('yimg_'+arr[1]).style.display = "block";

			
		}
		else
		{

			$('nimg_'+arr[1]).style.display = "block";
			$('yimg_'+arr[1]).style.display = "none";

		}
		
	}
}

  