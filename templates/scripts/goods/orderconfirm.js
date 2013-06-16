var request=createXMLHttpRequest();//创建ajax
//弹出确定框层
function showdivconfirm0(obj,show_div_text1,show_div_text2,show_div_text3)
{
	var inputid = obj.id;
    var flag=false;
    if (swtemp == 1)
    {
        hidediv("messagediv1");
    }
    if (!getobj("messagediv1"))
    {
        //若尚未创建就创建层
        crertdiv("" , "div" , "messagediv1" , "messagediv");//创建层"messagediv"
        crertdiv("messagediv1" , "li" , "messageli1" , "messageli");//创建"请刷新"li
        getobj("messageli1").innerHTML = "<img src='./templates/images/goods/alam.jpg'/>&nbsp;"+show_div_text1;
        crertdiv("messagediv1" , "a" , "messagebb" , "messagediv1");//创建"确定"a
        crertdiv("messagediv1" , "a" , "messageaa" , "messagediv1");//创建"关闭"a
        getobj("messagebb").innerHTML = show_div_text2+"&nbsp;&nbsp;";
        getobj("messageaa").innerHTML = show_div_text3;
        getobj("messageaa").onclick = function(){
            hidediv("messagediv1");
            var ship=document.getElementsByName('shipping');
            var val="";
            for(var i=0;i<ship.length;i++){
                if(ship[i].checked==true){
                	val=ship[i].value;
                }
            }
            document.getElementById('need_id').checked=false;
            document.getElementById('need_id').disabled=false;
            document.getElementById('need_id').value='0';
			request.open("post","flow.php?act=shipping&shipid="+val+"&issure=0");
			request.send();
			//当readyState属性改变时的事件处理
			request.onreadystatechange=function(){
				if(request.readyState==4){//响应完成
					if(request.status==200){//一切顺利
						var value=request.responseText;
						var result=value.split("@");
						var s_1=document.getElementById("s_1");
						var s_2=document.getElementById("s_2");
						var s_3=document.getElementById("s_3");
						s_1.innerHTML=result[0];
						s_2.innerHTML=result[1];
						s_3.innerHTML=result[2];
					}
				}
			} 
         };
        getobj("messagebb").onclick = function(){
        	hidediv("messagediv1");
            var ship=document.getElementsByName('shipping');
            var val=0;
            for(var i=0;i<ship.length;i++){
                if(ship[i].checked==true){
                	val=ship[i].value;
                }
            }
            document.getElementById('need_id').disabled=false;
       	 	document.getElementById('need_id').checked=true;
          	document.getElementById('need_id').value='1'; 
			request.open("post","flow.php?act=shipping&shipid="+val+"&issure=1");
			request.send();
			//当readyState属性改变时的事件处理
			request.onreadystatechange=function(){
				if(request.readyState==4){//响应完成
					if(request.status==200){//一切顺利
						var value=request.responseText;
						var result=value.split("@");
						var s_1=document.getElementById("s_1");
						var s_2=document.getElementById("s_2");
						var s_3=document.getElementById("s_3");
						s_1.innerHTML=result[0];
						s_2.innerHTML=result[1];
						s_3.innerHTML=result[2];
					}
				}
			}		
        };
    } 
    var newdiv = getobj("messagediv1");
    newdiv.style.left    = (getAbsoluteLeft(obj) - 50) + "px";
    newdiv.style.top     = (getAbsoluteTop(obj) - 65) + "px";
    newdiv.style.display = "block";
    getobj("messageli1").innerHTML = "<img src='./templates/images/goods/alam.jpg'/>&nbsp;"+show_div_text1;
    getobj("messagebb").innerHTML = show_div_text2+"&nbsp;&nbsp;";
    getobj("messageaa").innerHTML = show_div_text3;
    timer = setTimeout(function(){hidediv("messagediv1");} , 5000);
    swtemp  = 1;
}  
//不支持保价
function notissure(){
	document.getElementById('need_id').checked=false; 
	document.getElementById('need_id').disabled=true;
	document.getElementById('need_id').value='0';
    var ship=document.getElementsByName('shipping');
    var val="";
    for(var i=0;i<ship.length;i++){
        if(ship[i].checked==true){
        	val=ship[i].value;
        }
    }
	request.open("post","flow.php?act=shipping&shipid="+val+"&issure=0");
	request.send();
	//当readyState属性改变时的事件处理
	request.onreadystatechange=function(){
		if(request.readyState==4){//响应完成
			if(request.status==200){//一切顺利
				var value=request.responseText;
				var result=value.split("@");
				var s_1=document.getElementById("s_1");
				var s_2=document.getElementById("s_2");
				var s_3=document.getElementById("s_3");
				s_1.innerHTML=result[0];
				s_2.innerHTML=result[1];
				s_3.innerHTML=result[2];
			}
		}
	} 	
}
//点击是否需要选项
function isNeedSs(){
    var ship=document.getElementsByName('shipping');
    var val="";
    for(var i=0;i<ship.length;i++){
        if(ship[i].checked==true){
        	val=ship[i].value;
        }
    }
    if(document.getElementById('need_id').checked==true){
    	document.getElementById('need_id').value='1';
    }else{
    	document.getElementById('need_id').value='0';
    }
    var iss=document.getElementById('need_id').value;
	request.open("post","flow.php?act=shipping&shipid="+val+"&issure="+iss);
	request.send();
	//当readyState属性改变时的事件处理
	request.onreadystatechange=function(){
		if(request.readyState==4){//响应完成
			if(request.status==200){//一切顺利
				var value=request.responseText;
				var result=value.split("@");
				var s_1=document.getElementById("s_1");
				var s_2=document.getElementById("s_2");
				var s_3=document.getElementById("s_3");
				s_1.innerHTML=result[0];
				s_2.innerHTML=result[1];
				s_3.innerHTML=result[2];
			}
		}
	} 		
}
//发票
function selectInv(){
	var invpay=document.getElementsByName('invpay');
	if(invpay[0].checked==true){
		document.getElementById('invpayee').disabled=true;
		document.getElementById('invpayee').value="";
	}
	if(invpay[1].checked==true){
		document.getElementById('invpayee').disabled=false;
	}
}
//是否需要发票
function isNeedInv(){
	var need_vid=document.getElementById('need_vid');
	var invpayee=document.getElementById('invpayee');
	var invcontent=document.getElementById('invcontent');
	var invpay=document.getElementsByName('invpay');
	if(need_vid.checked==true){
		need_vid.value='1';
		invpay[0].disabled=false;
		invpay[1].disabled=false;
		invpayee.disabled=false;
		invcontent.disabled=false;
	}else{
		need_vid.value='0';
		invpayee.value="";
		invcontent.value="";
		invpay[0].checked=false;
		invpay[1].checked=false;
		invpay[0].disabled=true;
		invpay[1].disabled=true;
		invpayee.disabled=true;
		invcontent.disabled=true;
	}
}
//弹出确定框层
function showdivconfirm1(obj,show_div_text1,show_div_text2,show_div_text3)
{
	/*var need_vid=document.getElementById('need_vid');
	var invpayee=document.getElementById('invpayee');
	var invcontent=document.getElementById('invcontent');
	var invpay=document.getElementsByName('invpay');

	if(need_vid.value=='1'){
		if(!invpay[0].checked&&!invpay[1].checked){
			alert("请选择发票抬头！");
			return false;
		}
		if(invpay[1].checked&&trim(invpayee.value).length==0){
			alert("请输入发票单位！");
			return false;
		}
		if(invcontent.value==""){
			alert("请选择发票内容");
			return false;
		}
	}
	*/
	var payment=document.getElementsByName('payment');
	var count=0;
	for(var i=0;i<payment.length;i++){
		if(!payment[i].checked)
			count++;
	}
	if(count==payment.length){
		alert("请选择支付方式！");
		return false;
	}
	var inputid = obj.id;
    var flag=false;
    if (swtemp == 1)
    {
        hidediv("messagediv2");
    }
    if (!getobj("messagediv2"))
    {
        //若尚未创建就创建层
        crertdiv("" , "div" , "messagediv2" , "messagediv");//创建层"messagediv2"
        crertdiv("messagediv2" , "li" , "messageli2" , "messageli");//创建"请刷新"li
        getobj("messageli2").innerHTML = "<img src='./templates/images/goods/alam.jpg'/>&nbsp;"+show_div_text1;
        crertdiv("messagediv2" , "a" , "messagebb2" , "messagediv1");//创建"确定"a
        crertdiv("messagediv2" , "a" , "messageaa2" , "messagediv1");//创建"关闭"a
        getobj("messagebb2").innerHTML = show_div_text2+"&nbsp;&nbsp;";
        getobj("messageaa2").innerHTML = show_div_text3;
        getobj("messageaa2").onclick = function(){
            hidediv("messagediv2");
         };
        getobj("messagebb2").onclick = function(){
        	hidediv("messagediv2");
 			document.theForm.submit();
        };
    } 
    var newdiv = getobj("messagediv2");
    newdiv.style.left    = (getAbsoluteLeft(obj) - 50) + "px";
    newdiv.style.top     = (getAbsoluteTop(obj) - 65) + "px";
    newdiv.style.display = "block";
    getobj("messageli2").innerHTML = "<img src='./templates/images/goods/alam.jpg'/>&nbsp;"+show_div_text1;
    getobj("messagebb2").innerHTML = show_div_text2+"&nbsp;&nbsp;";
    getobj("messageaa2").innerHTML = show_div_text3;
    timer = setTimeout(function(){hidediv("messagediv2");} , 5000);
    swtemp  = 1;
}  

//弹出兑换确定订单
function showdivconfirm2(obj,show_div_text1,show_div_text2,show_div_text3)
{
	var inputid = obj.id;
    var flag=false;
    if (swtemp == 1)
    {
        hidediv("messagediv2");
    }
    if (!getobj("messagediv2"))
    {
        //若尚未创建就创建层
        crertdiv("" , "div" , "messagediv2" , "messagediv");//创建层"messagediv2"
        crertdiv("messagediv2" , "li" , "messageli2" , "messageli");//创建"请刷新"li
        getobj("messageli2").innerHTML = "<img src='./templates/images/goods/alam.jpg'/>&nbsp;"+show_div_text1;
        crertdiv("messagediv2" , "a" , "messagebb2" , "messagediv1");//创建"确定"a
        crertdiv("messagediv2" , "a" , "messageaa2" , "messagediv1");//创建"关闭"a
        getobj("messagebb2").innerHTML = show_div_text2+"&nbsp;&nbsp;";
        getobj("messageaa2").innerHTML = show_div_text3;
        getobj("messageaa2").onclick = function(){
            hidediv("messagediv2");
         };
        getobj("messagebb2").onclick = function(){
        	hidediv("messagediv2");
 			document.theForm.submit();
        };
    } 
    var newdiv = getobj("messagediv2");
    newdiv.style.left    = (getAbsoluteLeft(obj) - 50) + "px";
    newdiv.style.top     = (getAbsoluteTop(obj) - 65) + "px";
    newdiv.style.display = "block";
    getobj("messageli2").innerHTML = "<img src='./templates/images/goods/alam.jpg'/>&nbsp;"+show_div_text1;
    getobj("messagebb2").innerHTML = show_div_text2+"&nbsp;&nbsp;";
    getobj("messageaa2").innerHTML = show_div_text3;
    timer = setTimeout(function(){hidediv("messagediv2");} , 5000);
    swtemp  = 1;
}  