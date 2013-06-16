//必须输入
	function isNotBlank1(mess,obj) {
	    if(obj.value == null || obj.value.trim().length == 0) {
	    	mess=mess+'不能为空！';
		    showdiv(obj,mess,'','0');
		    obj.focus();
	        return false;
	    }
	    return true;
	}
	//是否是Email
	function isMail1(mess,obj) {
	    if(!obj.value.match(/^[a-zA-Z0-9_\.,-]+@([a-zA-Z0-9_\.,-]+\.[a-zA-Z0-9]+$)/)) {
	    	mess= mess + "错误，不是email形式。";
	    	showdiv(obj,mess,'','0');
			obj.focus();
	        return false;
	    }
	    return true;
	}
	//验证邮编
	function isZipcode(mess,obj) {
		if(obj.value == null || obj.value.trim().length == 0) {
			return true;
		}
	    if(!obj.value.match(/^[0-9]+$/)) {
	    	mess=mess+"必须为数字。";
	        showdiv(obj,mess,'','0');
			obj.focus();
	        return false;
	    }
	    return true;
	}
	//是否是电话号码
	function isTelMob(mess,obj) {
		
		if(obj.value == null || obj.value.trim().length == 0) {
			return true;
		}
	    if(!obj.value.match(/^[0-9\-]+$/)) {
	    	mess=mess+"必须为数字。";
	        showdiv(obj,mess,'','0');
			obj.focus();
	        return false;
	    }
	    return true;
	}
	//表单验证
	function submitForm(){
		var country=document.getElementById('country');
		var province=document.getElementById('province');
		var city=document.getElementById('city');
		var district=document.getElementById('district');
		
		var consignee=document.getElementById('consignee');//收货人姓名
		var email=document.getElementById('email11');
		var address=document.getElementById('address');
		var mobile=document.getElementById('mobile');
		if(isNotBlank1('国家',country)
				&&isNotBlank1('省份',province)
				&&isNotBlank1('城市',city)
				&&isNotBlank1('所在区',district)
				&&isNotBlank1('收货人',consignee)
				&&isNotBlank1('邮箱',email)
				&&isNotBlank1('详细地址',address)
				&&isNotBlank1('手机',mobile)
				&&isTelMob('手机',mobile)
				&&isMail1('邮箱',email)){
			//提交表单
			//alert(document.theForm.flag.value);
			document.theForm.submit();
		}else{
			return false;
		}
		
	}