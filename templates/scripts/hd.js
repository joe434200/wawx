
function clickBTN()
{
	document.getElementById("picPath").click();
}
function tosubmit()
{
	checkbox_value();
	
	var hd_new_form = document.getElementById("hd_new");
	
	//alert(22);
	hd_new_form.submit();
}

function check_time()
{
	
	var obj = document.getElementById("alert");
	var actname = document.getElementById("actname");
	var cost = document.getElementById("cost");
	var date1 = document.getElementById("txtBeginDate");
	var date2 = document.getElementById("txtEndDate");
	if(!actname.value || actname.value == "请输入标题")
		{
			actname.value ="请输入标题";
			return;
		}
	if(date1.value>date2.value || date1.value == "" || date2.value == "")
		{
			date1.value = "输入时间有错";
			date2.value = "输入时间有误";
			return;
		}
	if(!cost.value||cost.value == "请输入费用")
	{
		cost.value = "请输入费用";
		return;
	}
	
	tosubmit();
}
//活动发布评论
function remark_new()
{
	var hd_new_form = document.getElementById('remark_new');
	
	//alert(22);
	hd_new_form.submit();
}
//参与权限的判定
function checkbox_value()
{

	
	var checkbox_value1="";
	var obj = document.getElementById("checkbox_value");
	var objA = document.getElementById("checkboxA");
	var objB = document.getElementById("checkboxB");
	var objC = document.getElementById("checkboxC");
	
	if(document.hd_new.checkboxA.checked)
	{
		checkbox_value1 += "A";
	}
	if(document.hd_new.checkboxB.checked)
	{
		checkbox_value1 += "B";
	}
	if(document.hd_new.checkboxC.checked)
	{
		checkbox_value1 += "C";
	}
	obj.value = checkbox_value1;
}
//通用获取文本框内容
function getTextArea(id)
{
	var obj=document.getElementById(id);
	return obj.value;
}
//关注活动
function attention_act(id)
{

	//ajax返回时，需要执行的js  函数
	var myAjax = new Ajax.Request("hd.php?module=attention&id="+id,
			{
		method:'post',
		onComplete:attention_OK
			});
	
	}
function attention_OK(res)
{
	//var attentionnum = document.getElementById('attentionnum');
	//attentionnum.innerHTML = res.responseText;
	$jq("#attentionnum").html(res.responseText);
}
function member_act(id)
{
	
	//ajax返回时，需要执行的js  函数
	var myAjax = new Ajax.Request("hd.php?module=member&id="+id,
			{
		method:'post',
		onComplete:member_OK
			});
	
	}
function member_OK(res)
{
	//var membernum = document.getElementById('membernum');
	//membernum.innerHTML = res.responseText;
	$jq("#membernum").html(res.responseText);
}

//上传单张照片
function checkPic() {
    var picPath = document.getElementById("picPath").value;
    var type = picPath.substring(picPath.lastIndexOf(".") + 1, picPath.length).toLowerCase();
    if (type != "jpg" && type != "bmp" && type != "gif" && type != "png") {
        alert("请上传正确的图片格式");
        return false;
    }
    return true;
}
//图片预览
function PreviewImage(divImage, upload, width, height) {
    if (checkPic()) {
        try {
            var imgPath;      //图片路径

            var Browser_Agent = navigator.userAgent;
            //判断浏览器的类型
            if (Browser_Agent.indexOf("Firefox") != -1) {
                //火狐浏览器

//getAsDataURL在Firefox7.0 无法预览本地图片，这里需要修改
                imgPath = upload.files[0].getAsDataURL();
                //document.getElementById('img').innerHTML = "<img id='imgPreview' src='" + imgPath + "' width='" + width + "' height='" + height + "'/>";
                $jq("#img").html("<img id='imgPreview' src='" + imgPath + "' width='" + width + "' height='" + height + "'/>");
            } else {
                //IE浏览器 ie9 必须在兼容模式下才能显示预览图片
                var Preview = document.getElementById(divImage);
                Preview.filters.item("DXImageTransform.Microsoft.AlphaImageLoader").src = upload.value;
                Preview.style.width = width;
                Preview.style.height = height;
                show('img');
            }
        } catch (e) {
            alert("请上传正确的图片格式");
        }
    }
}
function show(id)
{
	var img = document.getElementById(id);

	if(img.style.display == "block")
	{
		document.getElementById(id).style.display = "none";
	}
}
//ajax刷新页面
function hd_pages(item)
{     
	var list_class = document.getElementById("class").value;
	var list_page = document.getElementById("list_page");
	list_page.value = item;
	var myAjax = new Ajax.Request("hd.php?module=hd_list_pages_ajax&list_page="+item+"&list_class="+list_class,
			{
		method:'post',
		onComplete:hd_pages_ok
			});
	
}
function hd_pages_ok(response)
{
	var res = response.responseText;
	var act_list = document.getElementById("act_list");
	$jq("#act_list").html(res);
}

//ajax获取二级活动分类
function AjaxGetSecAct(obj)
{
	//alert(222);
	//alert(obj.value);
	var url = "hd.php?module=dyGetCatalog&parent="+obj.value;
	var myAjax = new Ajax.Request(
			url,
			{
				method:'post',
				onComplete:AjaxGetSecBack
			});
}
function AjaxGetSecBack(json)
{
	//alert(3333);
	var obj = eval("("+json.responseText+")");
	var content = "";
	var sel = document.getElementById("selSec");
	$jq("#selSec").html("");
	for(var i=0; i<obj.length; i++)
	{
		var option = new Option(obj[i].name,obj[i].ID);
		sel.options.add(option);
	}

	//sel.innerHTML = "<option value='2'>123</option>";
	
}

//ajax获得二级地址
function AjaxGetplace(obj)
{
	var url = "hd.php?module=dyGetPlace&parent="+obj.value;
	var myAjax = new Ajax.Request(
			url,
			{
				method:'post',
				onComplete:AjaxGetplaBack
			});
}
function AjaxGetplaBack(json)
{
	var obj = eval("("+json.responseText+")");
	var content = "";
	var sel = document.getElementById("place_son1");
	$jq("#place_son1").html("");
	var sel1 = document.getElementById("place_son2");
	$jq("#place_son2").html("");
	for(var i=0; i<obj.length; i++)
	{
		var option = new Option(obj[i].name,obj[i].ID);
		sel.options.add(option);
	}
	
}
//ajax获得三级地址
function AjaxGetplace1(obj)
{
	var url = "hd.php?module=dyGetPlace&parent="+obj.value;
	var myAjax = new Ajax.Request(
			url,
			{
				method:'post',
				onComplete:AjaxGetplaBack1
			});
}
function AjaxGetplaBack1(json)
{
	var obj = eval("("+json.responseText+")");
	var content = "";
	var sel = document.getElementById("place_son2");
	$jq("#place_son2").html("");
	for(var i=0; i<obj.length; i++)
	{
		var option = new Option(obj[i].name,obj[i].ID);
		sel.options.add(option);
	}
	
}








function UploadSubmit()
{

	var obj = document.getElementById("picPath").value;
	var uploadFrom = document.getElementById("upform");
	uploadFrom.submit();
	
	
}


//---------------------add by zrh----------------
//设置费用是否可用
function setText(obj)
{
	var text = document.getElementById("cost");
	if(obj.checked)
	{
		text.setAttribute("disabled", "disabled");
		text.value = 0;
		return false;
	}
	text.value = "";
	text.setAttribute("disabled", "");
	
}

//ajax 首页index的换一组

function changeAct()
{
	
	var obj = document.getElementById("pagesAct");
	obj.value++;
	var url = "barindex.php?module=changeAct&pagesAct="+obj.value;
	var myAjax = new Ajax.Request(
			url,
			{
				method:'post',
				onComplete:changeAct_ok
			});
}

function changeAct_ok(response)
{
	
	var content = "";
	var sel = document.getElementById("act_hot");
	$jq("#act_hot").html("");
	var obj = eval("("+response.responseText+")");
	for(var i=0; i<obj.length; i++)
	{
		content = content +"<li>"+
	   "<a href='hd.php?module=hd_list_show1&hd_id="+obj[i]['ID']+"'>" +
	   "<img src='./uploadfiles/activity/hdImage/"+obj[i]['photo']+"' >"+
	   		"<p class='bt'>"+obj[i]['actname']+"</p></a>"+
	   "<p class='care'>"+obj[i]['attentionnum']+"人关注</p>"+
	   "</li>" ;
		
	}
	$jq("#act_hot").html(content);
	
}
