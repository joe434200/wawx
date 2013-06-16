
//购物车
function checkcart(op,a,b){
	var mess="";
	var request=createXMLHttpRequest();//创建ajax
	var mkrum=trim(document.getElementById("mkrum").value);
	if(mkrum==null||mkrum.length==0){
		mess="请输入购买数量!";
		showdiv(document.getElementById("mkrum"),mess,'确定','0');
		return false;
	}   
	//数字验证
	if(!mkrum.match(/^[0-9]+$/)){
		mess="购买数量为正整型数字!";
		showdiv(document.getElementById("mkrum"),mess,'确定','0');
		return false;
	}
	if(Number(mkrum)==0){
		mkrum=1;
		document.getElementById("mkrum").value=1;
	}
	request.open("post","goods.php?act=cartmk&goodsid="+a+"&mknum="+mkrum+"&op="+op+"&shoppingtype="+b);
	request.send();
	//当readyState属性改变时的事件处理
	request.onreadystatechange=function(){
		if(request.readyState==4){//响应完成
			if(request.status==200){//一切顺利
				var value=request.responseText;
				//总购买量超出库存
				if(value.substring(0,8)=="morethan"){
					mess=value.substring(8,value.length);
					if(op=='check'){
						showdiv(document.getElementById("ann1"),mess,"确定",'0');
					}
					else if(op=='add'){
						showdiv(document.getElementById("ann2"),mess,"确定",'0');
					}
					return false;
				}else{
					if(op=='check'){
						window.location.href="flow.php?&act=gbuy&goodsid="+a+"&mknum="+mkrum+"&shoppingtype="+b;
						return true;   
					}else if(op=='add'){
						showdivconfirm0(document.getElementById("ann2"),value,"去购物车看看>>&nbsp;&nbsp;","继续购物");
						return false;
					}
				}
			}
		}
	}
}

//推荐
function recomCheck(a,b){
	var mess="";
	var request=createXMLHttpRequest();//创建ajax
	request.open("post","foucsandrecom.php?goodsid="+a+"&acttype=goodsrecom&goodsname="+b);
	request.send();
	//当readyState属性改变时的事件处理
	request.onreadystatechange=function(){
		if(request.readyState==4){//响应完成
			if(request.status==200){//一切顺利
				var value=request.responseText;
				if(value=="true"){
					mess="您已推荐过该商品！";
					showdiv(document.getElementById("sh_bnt11"),mess,"确定",'0');
					return false;
				}
				else if(value=="false"){
					mess="您成功推荐该商品！";
					showdiv(document.getElementById("sh_bnt11"),mess,"确定",'1');
					return false;
				}
				else if(value=="nofriend"){
					mess="您还没有社区朋友！";
					showdiv(document.getElementById("sh_bnt11"),mess,"确定",'0');
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

function selectTag(showContent,selfObj){

	var tag = document.getElementById("tags").getElementsByTagName("li");
	var taglength = tag.length;
	for(i=0; i<taglength; i++){
		tag[i].className = "";
	}
	selfObj.parentNode.className = "selectTag";

	for(i=0; j=document.getElementById("tagContent"+i); i++){
		j.style.display = "none";
	}
	document.getElementById(showContent).style.display = "block";
}

function checkNull(){
	 	var comment=document.commentForm.comment.value.trim();
	 	if(comment==""||comment.length==0){
	 	 	alert("请输入评价的内容！");
	 	 	document.commentForm.comment.focus();
	 	 	return false;
	 	}
	 	document.commentForm.submit();
	 	return true;
}

//弹出确定框层
function showdivconfirm0(obj,show_div_text1,show_div_text2,show_div_text3)
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
        getobj("messageli2").innerHTML = "<img src='./templates/images/goods/jstrue.jpg'/>&nbsp;"+show_div_text1;
        crertdiv("messagediv2" , "a" , "messagebb2" , "messagediv1");//创建"确定"a
        crertdiv("messagediv2" , "a" , "messageaa2" , "messagediv1");//创建"关闭"a
        getobj("messagebb2").innerHTML = show_div_text2+"&nbsp;&nbsp;";
        getobj("messageaa2").innerHTML = show_div_text3;
        getobj("messageaa2").onclick = function(){
            hidediv("messagediv2");
         };
        getobj("messagebb2").onclick = function(){
        	window.location.href="flow.php?act=index";
        	return true;
        };
    } 
    var newdiv = getobj("messagediv2");
    newdiv.style.left    = (getAbsoluteLeft(obj) - 50) + "px";
    newdiv.style.top     = (getAbsoluteTop(obj) - 65) + "px";
    newdiv.style.display = "block";
    getobj("messageli2").innerHTML = "<img src='./templates/images/goods/jstrue.jpg'/>&nbsp;"+show_div_text1;
    getobj("messagebb2").innerHTML = show_div_text2+"&nbsp;&nbsp;";
    getobj("messageaa2").innerHTML = show_div_text3;
    timer = setTimeout(function(){hidediv("messagediv2");} , 5000);
    swtemp  = 1;
}  
//立刻兑换
function checkexchange(a){
	var mess="";
	var request=createXMLHttpRequest();//创建ajax
	var mkrum=trim(document.getElementById("mkrum1").value);
	if(mkrum==null||mkrum.length==0){
		mess="请输入兑换数量!";
		showdiv(document.getElementById("mkrum1"),mess,'确定','0');
		return false;
	}
	//数字验证
	if(!mkrum.match(/^[0-9]+$/)){
		mess="兑换数量为正整型数字!";
		showdiv(document.getElementById("mkrum1"),mess,'确定','0');
		return false;
	}
	if(Number(mkrum)==0){
		mkrum=1;
		document.getElementById("mkrum1").value=1;
	}
	request.open("post","goods.php?act=exchangemk&goodsid="+a+"&mknum="+mkrum);
	request.send();
	//当readyState属性改变时的事件处理
	request.onreadystatechange=function(){
		if(request.readyState==4){//响应完成
			if(request.status==200){//一切顺利
				var value=request.responseText;
				if(value.length>0){
					showdiv(document.getElementById("ann1"),value,"确定",'0');
				}else{
					window.location.href="flow.php?act=exchangemk&goodsid="+a+"&mknum="+mkrum;
					return true;
				}
			}
		}
	}
}

//收藏商品
function collectGoods(goodsid,type){
	var ctype="";
	if(type=='2'){
		ctype='7';
	}else if(type=='1'){
		ctype='6';
	}else{
		ctype='5';
	}
	var url ="flow.php?act=collect&goodsid="+goodsid;
	var newAjax = new Ajax.Request(
			url,
			{
				method:'post',
				parameters:"ctype="+ctype,
				onComplete:collBack
			}
		);
}
//收藏返回
function collBack(json)
{
	var obj = json.responseText;
	if(obj=="true"){
		//alert("成功收藏该商品！");
		showdiv(document.getElementById("coll_id"),"成功收藏该商品！","关闭","1");
		return false;
	}else{
		//alert("您已收藏过该商品！");
		showdiv(document.getElementById("coll_id"),"您已收藏过该商品！","关闭","0");
		return false;
	}
}
