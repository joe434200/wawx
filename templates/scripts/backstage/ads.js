
function checksubmit()
{
	var errors = new Array();
	linkid = $('linkid').value;
	isNotBlank(linkid,'图片URL',errors);
	
	starttime = $('starttime').value;
	isNotBlank(starttime,'开始时间',errors);
	
	validtime = $('validtime').value;
	isNotBlank(validtime,'有效时间',errors);
	


	if (errors.length > 0) {
        showWarning(errors);
        return true;
    }
	
	
    $('theForm').submit();

}

function afterselect(obj)
{
	 selectvalue = obj.options[obj.selectedIndex].value;
	 
	 switch(selectvalue)
	 {
	 case '0':
		 
		 document.getElementById('objname').onclick=function()
		 {
		 	openwindow('1','objname','businessid');
		 };
		 
		 break;
	 case '1':
		 document.getElementById('objname').onclick=function()
		 {
		 	openwindow('2','objname','businessid');
		 };
		 break;
	 case '2':
		 break;
	 case '3':
		 break;
	 }

	/* <option value="0" selected >店铺</option>
     <option value="1" selected >商品</option>
     <option value="2" selected >充值</option>
     */
}


  