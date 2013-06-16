
//点击减减按钮
function subadd(obj,goodsid,flag){
	var mess="";
	var request=createXMLHttpRequest();//创建ajax
	var mkvalue=trim(obj.value);
	var gn=1;
	//手动输入
	if(flag=='auto'){
		if(mkvalue==null||mkvalue.length==0||!mkvalue.match(/^[0-9]+$/)){
			gn=1;
		}else{
			gn=Number(mkvalue);
		}
	}
	//减号
	else if(flag=='sub'){
		gn=Number(mkvalue);
		gn=gn-1;
		if(gn==0){
			gn=1;
		}
	}
	//加号
	else if(flag=='add'){
		gn=Number(mkvalue);
		gn=gn+1;
	}
	obj.value=gn;
	request.open("post","flow.php?act=update&mknum="+gn
			+"&goodsid="+goodsid);
	request.send();
	//当readyState属性改变时的事件处理
	request.onreadystatechange=function(){
		if(request.readyState==4){//响应完成
			if(request.status==200){//一切顺利
				var value=request.responseText;
				var result=value.split("@");
				document.getElementById("ssum_"+goodsid).innerHTML=result[0];
				document.getElementById("stotal").innerHTML=result[1];
				document.getElementById("mtotal").innerHTML=result[2];	 
				document.getElementById("dismoney").innerHTML=result[3];
				document.getElementById("rate").innerHTML=result[4];
				if(result[5]=='true'){
					mess='修改成功，购物金额总计'+result[1]+'元';
					showdiv(obj,mess,'关闭','1');
				}else{
					//超出库存量
					obj.value=result[6];
					showdiv(obj,result[5],'关闭','0');
				}
			}
		}
	}
}
 
//收藏商品
function collectGoods(goodsid,type){
	var mess="";
	var request=createXMLHttpRequest();//创建ajax
	var ctype="";
	if(type=='2'){
		ctype='7';
	}else if(type=='1'){
		ctype='6';
	}else if(type=='0'){
		ctype='5';
	}
	//var request=createXMLHttpRequest();//创建ajax
	request.open("post","flow.php?act=collect&goodsid="+goodsid+"&ctype="+ctype);
	request.send();
	//当readyState属性改变时的事件处理
	request.onreadystatechange=function(){
		if(request.readyState==4){//响应完成
			if(request.status==200){//一切顺利
				var value=request.responseText;
				//成功收藏
				if(value=="true"){
					showdiv(document.getElementById("coll_"+goodsid),"成功收藏该商品！","关闭","1");
					return false;
				}else{
					showdiv(document.getElementById("coll_"+goodsid),"您已收藏过该商品！","关闭","0");
					return false;
				}
			}
		}
	}		
}
//删除收藏
function deletecoll(goodsid,userid){
	if(window.confirm('真的从收藏中删除吗？')){
		var url ="foucsandrecom.php?acttype=delete&goodsid="+goodsid;
		var newAjax = new Ajax.Request(
				url,
				{
					method:'post',
					parameters:"userid="+userid,
					onComplete:delecollBack
				}
			);
		
	}else{
		return false;
	}
}

//删除收藏返回
function delecollBack(json)
{
	var obj = json.responseText;
	if(obj=="true"){
		window.location.href="flow.php?act=index";
		return false;
	}
}
