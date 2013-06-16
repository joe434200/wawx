/* $Id: showdiv.js 15469 2008-12-19 06:34:44Z testyang $ */
//创建显示层
var swtemp  = 0;
var timer   = null;

//显示层
function showdiv(obj,show_div_text1,show_div_text2,flagv)
{
    var inputid = obj.id;

    if (swtemp == 1)
    {
        hidediv("messagediv");
    }
    
    if (!getobj("messagediv"))
    {
        //若尚未创建就创建层
        crertdiv("" , "div" , "messagediv" , "messagediv");//创建层"messagediv"
        crertdiv("messagediv" , "li" , "messageli" , "messageli");//创建"请刷新"li
        if(flagv=='1'){
        	getobj("messageli").innerHTML = "<img src='./templates/images/goods/jstrue.jpg'/>&nbsp;"+show_div_text1;
        }else{
        	getobj("messageli").innerHTML = "<img src='./templates/images/goods/alam.jpg'/>&nbsp;"+show_div_text1;
        }
        crertdiv("messagediv" , "a" , "messagea" , "messagediv1");//创建"关闭"a
        getobj("messagea").innerHTML = show_div_text2;
        getobj("messagea").onclick = function(){hidediv("messagediv");};
    }

    var newdiv = getobj("messagediv");

    newdiv.style.left    = (getAbsoluteLeft(obj) - 50) + "px";
    newdiv.style.top     = (getAbsoluteTop(obj) - 65) + "px";
    newdiv.style.display = "block";
    if(flagv=='1'){
    	getobj("messageli").innerHTML = "<img src='./templates/images/goods/jstrue.jpg'/>&nbsp;"+show_div_text1;
    }else{
    	getobj("messageli").innerHTML = "<img src='./templates/images/goods/alam.jpg'/>&nbsp;"+show_div_text1;
    }
    getobj("messagea").innerHTML = show_div_text2;
    timer = setTimeout(function(){hidediv("messagediv");} , 5000);
    swtemp  = 1;
}
//弹出确定框的
function showdivconfirm(obj,show_div_text1,show_div_text2,show_div_text3,url)
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
        getobj("messageaa").onclick = function(){hidediv("messagediv1"); };
        getobj("messagebb").onclick = function(){
        	hidediv("messagediv1"); 
    		var request=createXMLHttpRequest();//创建ajax
			request.open("post",url);
			request.send();
			//当readyState属性改变时的事件处理
			request.onreadystatechange=function(){
				if(request.readyState==4){//响应完成
					if(request.status==200){//一切顺利
						window.location.href="flow.php?act=index";
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


//创建层
function crertdiv(parent , element , id , css)
{
    var newObj = document.createElement(element);

    if(id && id != "")
    {
        newObj.id = id;
    }
    if(css && css != "")
    {
        newObj.className = css;
    }
    if(parent && parent!="")
    {
        var theObj = getobj(parent);
        var parent = theObj.parentNode;
        if(parent.lastChild == theObj)
        {
            theObj.appendChild(newObj);
        }
        else
        {
            theObj.insertBefore(newObj, theObj.nextSibling);
        }
    }
    else
    {
        document.body.appendChild(newObj);
    }
}

//隐藏层
function hidediv(objid)
{
    getobj(objid).style.display = "none";
    swtemp = 0;
    clearTimeout(timer);
}

//获取对象
function getobj(obj)
{
    return document.getElementById(obj);
}

function getAbsoluteHeight(obj)
{
    return obj.offsetHeight;
}

function getAbsoluteWidth(obj)
{
    return obj.offsetWidth;
}

function getAbsoluteLeft(obj)
{
    var s_el = 0;
    var el   = obj;
    while(el)
    {
        s_el = s_el + el.offsetLeft;
        el   = el.offsetParent;
    }
    return s_el;
}

function getAbsoluteTop(obj)
{
    var s_el = 0;
    var el   = obj;
    while(el)
    {
        s_el = s_el + el.offsetTop;
        el   = el.offsetParent;
    }
    return s_el;
}