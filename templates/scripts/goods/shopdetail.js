	//var request=createXMLHttpRequest();//创建ajax
	//关注
	function focusCheck(obj,a){
		var request=createXMLHttpRequest();//创建ajax
		request.open("post","foucsandrecom.php?shopid="+a+"&acttype=focus");
		request.send();
		//当readyState属性改变时的事件处理
		request.onreadystatechange=function(){
			if(request.readyState==4){//响应完成
				if(request.status==200){//一切顺利
					var value=request.responseText;
					if(value=="true"){
						showdiv(obj,"您已关注过该店铺！",'确定','0');
						return false;
					}
					else if(value=="false"){
						showdiv(obj,"您成功关注该店铺！",'确定','1');
						return false;
					}
					//没有登录，请登录
					else if(value=="login"){
						
						alert("请登录");
						return false;
					}
				}
			}
		}
	}
	//推荐
	function recomCheck(obj,a,b){
		var request=createXMLHttpRequest();//创建ajax
		request.open("post","foucsandrecom.php?shopid="+a+"&acttype=shiprecom&shopname="+b);
		request.send();
		//当readyState属性改变时的事件处理
		request.onreadystatechange=function(){
			if(request.readyState==4){//响应完成
				if(request.status==200){//一切顺利
					var value=request.responseText;
					if(value=="true"){
						showdiv(obj,"您已推荐过该店铺！",'确定','0');
						return false;
					}
					else if(value=="false"){
						showdiv(obj,"您成功推荐该店铺！",'确定','1');
						return false;
					}
					else if(value=="nofriend"){
						showdiv(obj,"您还没有社区朋友！",'确定','0');
						return false;
					}
					//没有登录，请登录
					else if(value=="login"){
						alert("请登录");
						return false;
					}
				}
			}
		}
	}

	//评价函数
	function rate(obj,oEvent,order){
		var imgSrc = './templates/images/goods/dark.jpg';
		var imgSrc_2 = './templates/images/goods/bright.jpg';
		if(obj.rateFlag) return;
		var e = oEvent || window.event;
		var target = e.target || e.srcElement;
		var imgArray = obj.getElementsByTagName("img");
		for(var i=0;i<imgArray.length;i++){
   			imgArray[i]._num = i;
   			imgArray[i].onclick=function(){
   				if(obj.rateFlag) return;
 				var inputid=this.parentNode.previousSibling
 				inputid.value=this._num+1;
				if(order=='1'){
					document.rateForm.service.value=this._num+1;
					if(document.rateForm.service.value==5){
						document.getElementById("show1").innerHTML="服务（很好）";
					}
					else if(document.rateForm.service.value==4){
						document.getElementById("show1").innerHTML="服务（较好）";
					}
					else if(document.rateForm.service.value==3){
						document.getElementById("show1").innerHTML="服务（还好）";
					}
					else if(document.rateForm.service.value==2){
						document.getElementById("show1").innerHTML="服务（一般）";
					}
					else if(document.rateForm.service.value==1){
						document.getElementById("show1").innerHTML="服务（很差）";
					}
					
				}else if(order=='2'){
					document.rateForm.taste.value=this._num+1;
					if(document.rateForm.taste.value==5){
						document.getElementById("show2").innerHTML="质量（很好）";
					}
					else if(document.rateForm.taste.value==4){
						document.getElementById("show2").innerHTML="质量（较好）";
					}
					else if(document.rateForm.taste.value==3){
						document.getElementById("show2").innerHTML="质量（还好）";
					}
					else if(document.rateForm.taste.value==2){
						document.getElementById("show2").innerHTML="质量（一般）";
					}
					else if(document.rateForm.taste.value==1){
						document.getElementById("show2").innerHTML="质量（很差）";
					}
				}
				else if(order=='3'){
					document.rateForm.environment.value=this._num+1;
					if(document.rateForm.environment.value==5){
						document.getElementById("show3").innerHTML="环境（很好）";
					}
					else if(document.rateForm.environment.value==4){
						document.getElementById("show3").innerHTML="环境（较好）";
					}
					else if(document.rateForm.environment.value==3){
						document.getElementById("show3").innerHTML="环境（还好）";
					}
					else if(document.rateForm.environment.value==2){
						document.getElementById("show3").innerHTML="环境（一般）";
					}
					else if(document.rateForm.environment.value==1){
						document.getElementById("show3").innerHTML="环境（很差）";
					}
					
				}
				else if(order=='4'){
					document.rateForm.costperformance.value=this._num+1;
					if(document.rateForm.costperformance.value==5){
						document.getElementById("show4").innerHTML="性价比（很好）";
					}
					else if(document.rateForm.costperformance.value==4){
						document.getElementById("show4").innerHTML="性价比（较好）";
					}
					else if(document.rateForm.costperformance.value==3){
						document.getElementById("show4").innerHTML="性价比（还好）";
					}
					else if(document.rateForm.costperformance.value==2){
						document.getElementById("show4").innerHTML="性价比（一般）";
					}
					else if(document.rateForm.costperformance.value==1){
						document.getElementById("show4").innerHTML="性价比（很差）";
					}
				}
	   	   		
   			}
		}
		//
		if(target.tagName=="IMG"){
	   		for(var j=0;j<imgArray.length;j++){
	    		if(j<=target._num){
	     			imgArray[j].src=imgSrc_2;
	    		} else {
	     			imgArray[j].src=imgSrc;
	    		}
	 			target.parentNode.onmouseout=function(){
	 				var imgnum=parseInt(target.parentNode.previousSibling.value);
	  				for(n=0;n<imgArray.length;n++){
	   					imgArray[n].src=imgSrc;
	  				}
	  				for(n=0;n<imgnum;n++){
	  					imgArray[n].src=imgSrc_2;
	  				}
	 			}
	   		}
		} else {
	 		return false;
		}
	}
	//提交表单函数
	function subForm(){
		//总体评价是一个数组
		var tatolcomm=document.rateForm.commentrank;
		//获得服务、质量、环境、性价比等评价
		var service=document.rateForm.service.value;
		var taste=document.rateForm.taste.value;
		var environment=document.rateForm.environment.value;
		var costperformance=document.rateForm.costperformance.value;
		//获得评价内容
		var content=document.rateForm.content.value.trim();
		//服务评价为空
		if(service==0){
			alert("亲，请对服务进行评价！");
			return false;
		}
		//质量评价为空
		if(taste==0){
			alert("亲，请对质量进行评价！");
			return false;
		}
		//环境评价为空
		if(environment==0){
			alert("亲，请对环境进行评价！");
			return false;
		}
		//性价比评价为空
		if(costperformance==0){
			alert("亲，请对性价比进行评价！");
			return false;
		}
		//获得总体评价的值，提交给后台
		for(var i=0;i<tatolcomm.length;i++){
			if(tatolcomm[i].checked){
				document.rateForm.commentTotal.value=tatolcomm[i].value;
			}
		}
		//评价内容为空
		if(content.length==0){
			alert("亲，请输入评价内容！");
			document.rateForm.content.focus();
			return false;
		}
		document.rateForm.submit();
		return true;
	}
	//换箭头
	function changecom(checkV) {
		var commentV=document.getElementById("commentV");
		//好
		if(checkV=='2'){
			commentV.className="jiantou1";
			document.getElementById("show1").innerHTML="服务（较好）";
			document.getElementById("show2").innerHTML="质量（较好）";
			document.getElementById("show3").innerHTML="环境（较好）";
			document.getElementById("show4").innerHTML="性价比（较好）";
			//对服务、质量、环境、性价比等赋值
			document.getElementById("showimg1").innerHTML="<img src='./templates/images/goods/bright.jpg' title='很差'>"
				+"<img src='./templates/images/goods/bright.jpg' title='一般'>"
				+"<img src='./templates/images/goods/bright.jpg' title='还好'>"
				+"<img src='./templates/images/goods/bright.jpg' title='较好'>"
				+"<img src='./templates/images/goods/dark.jpg' title='很好'><input type='hidden' name='service' value='4' />";
			document.getElementById("showimg2").innerHTML="<img src='./templates/images/goods/bright.jpg' title='很差'>"
				+"<img src='./templates/images/goods/bright.jpg' title='一般'>"
				+"<img src='./templates/images/goods/bright.jpg' title='还好'>"
				+"<img src='./templates/images/goods/bright.jpg' title='较好'>"
				+"<img src='./templates/images/goods/dark.jpg' title='很好'><input type='hidden' name='taste' value='4' />";
			document.getElementById("showimg3").innerHTML="<img src='./templates/images/goods/bright.jpg' title='很差'>"
				+"<img src='./templates/images/goods/bright.jpg' title='一般'>"
				+"<img src='./templates/images/goods/bright.jpg' title='还好'>"
				+"<img src='./templates/images/goods/bright.jpg' title='较好'>"
				+"<img src='./templates/images/goods/dark.jpg' title='很好'><input type='hidden' name='environment' value='4' />";
			document.getElementById("showimg4").innerHTML="<img src='./templates/images/goods/bright.jpg' title='很差'>"
				+"<img src='./templates/images/goods/bright.jpg' title='一般'>"
				+"<img src='./templates/images/goods/bright.jpg' title='还好'>"
				+"<img src='./templates/images/goods/bright.jpg' title='较好'>"
				+"<img src='./templates/images/goods/dark.jpg' title='很好'><input type='hidden' name='costperformance' value='4' />";
		}
		//中
		else if(checkV=='1'){
			commentV.className="jiantou2";
			document.getElementById("show1").innerHTML="服务（还好）";
			document.getElementById("show2").innerHTML="质量（还好）";
			document.getElementById("show3").innerHTML="环境（还好）";
			document.getElementById("show4").innerHTML="性价比（还好）";
			document.getElementById("showimg1").innerHTML="<img src='./templates/images/goods/bright.jpg' title='很差'>"
				+"<img src='./templates/images/goods/bright.jpg' title='一般'>"
				+"<img src='./templates/images/goods/bright.jpg' title='还好'>"
				+"<img src='./templates/images/goods/dark.jpg' title='较好'>"
				+"<img src='./templates/images/goods/dark.jpg' title='很好'><input type='hidden' name='service' value='3' />";
			document.getElementById("showimg2").innerHTML="<img src='./templates/images/goods/bright.jpg' title='很差'>"
				+"<img src='./templates/images/goods/bright.jpg' title='一般'>"
				+"<img src='./templates/images/goods/bright.jpg' title='还好'>"
				+"<img src='./templates/images/goods/dark.jpg' title='较好'>"
				+"<img src='./templates/images/goods/dark.jpg' title='很好'><input type='hidden' name='taste' value='3' />";
			document.getElementById("showimg3").innerHTML="<img src='./templates/images/goods/bright.jpg' title='很差'>"
				+"<img src='./templates/images/goods/bright.jpg' title='一般'>"
				+"<img src='./templates/images/goods/bright.jpg' title='还好'>"
				+"<img src='./templates/images/goods/dark.jpg' title='较好'>"
				+"<img src='./templates/images/goods/dark.jpg' title='很好'><input type='hidden' name='environment' value='3' />";
			document.getElementById("showimg4").innerHTML="<img src='./templates/images/goods/bright.jpg' title='很差'>"
				+"<img src='./templates/images/goods/bright.jpg' title='一般'>"
				+"<img src='./templates/images/goods/bright.jpg' title='还好'>"
				+"<img src='./templates/images/goods/dark.jpg' title='较好'>"
				+"<img src='./templates/images/goods/dark.jpg' title='很好'><input type='hidden' name='costperformance' value='3' />";
		}
		//差
		else if(checkV=='0'){
			commentV.className="jiantou3";
			document.getElementById("show1").innerHTML="服务（一般）";
			document.getElementById("show2").innerHTML="质量（一般）";
			document.getElementById("show3").innerHTML="环境（一般）";
			document.getElementById("show4").innerHTML="性价比（一般）";
			//对服务、质量、环境、性价比等赋值
			document.getElementById("showimg1").innerHTML="<img src='./templates/images/goods/bright.jpg' title='很差'>"
				+"<img src='./templates/images/goods/bright.jpg' title='一般'>"
				+"<img src='./templates/images/goods/dark.jpg' title='还好'>"
				+"<img src='./templates/images/goods/dark.jpg' title='较好'>"
				+"<img src='./templates/images/goods/dark.jpg' title='很好'><input type='hidden' name='service' value='2' />";
			document.getElementById("showimg2").innerHTML="<img src='./templates/images/goods/bright.jpg' title='很差'>"
				+"<img src='./templates/images/goods/bright.jpg' title='一般'>"
				+"<img src='./templates/images/goods/dark.jpg' title='还好'>"
				+"<img src='./templates/images/goods/dark.jpg' title='较好'>"
				+"<img src='./templates/images/goods/dark.jpg' title='很好'><input type='hidden' name='taste' value='2' />";
			document.getElementById("showimg3").innerHTML="<img src='./templates/images/goods/bright.jpg' title='很差'>"
				+"<img src='./templates/images/goods/bright.jpg' title='一般'>"
				+"<img src='./templates/images/goods/dark.jpg' title='还好'>"
				+"<img src='./templates/images/goods/dark.jpg' title='较好'>"
				+"<img src='./templates/images/goods/dark.jpg' title='很好'><input type='hidden' name='environment' value='2' />";
			document.getElementById("showimg4").innerHTML="<img src='./templates/images/goods/bright.jpg' title='很差'>"
				+"<img src='./templates/images/goods/bright.jpg' title='一般'>"
				+"<img src='./templates/images/goods/dark.jpg' title='还好'>"
				+"<img src='./templates/images/goods/dark.jpg' title='较好'>"
				+"<img src='./templates/images/goods/dark.jpg' title='很好'><input type='hidden' name='costperformance' value='2' />";
		}
	}