//////////////////////////////////////////////////////常用JS代码//////////////////////////////////////////////////////
//滚动
function marquee(i, direction)
{
	var obj = document.getElementById("marquee" + i);
	var obj1 = document.getElementById("marquee" + i + "_1");
	var obj2 = document.getElementById("marquee" + i + "_2");

	if (direction == "up")
	{
		if (obj2.offsetTop - obj.scrollTop <= 0)
		{
			obj.scrollTop -= (obj1.offsetHeight + 20);
		}
		else
		{
			var tmp = obj.scrollTop;
			obj.scrollTop++;
			if (obj.scrollTop == tmp)
			{
				obj.scrollTop = 1;
			}
		}
	}
	else
	{
		if (obj2.offsetWidth - obj.scrollLeft <= 0)
		{
			obj.scrollLeft -= obj1.offsetWidth;
		}
		else
		{
			obj.scrollLeft++;
		}
	}
}

//屏蔽鼠标右键
function disabledRightButton()
{
	document.oncontextmenu = function(e){return false;}
	document.onselectstart = function(e){return false;}
	if (navigator.userAgent.indexOf("Firefox") > -1)
	{
		document.writeln("<style>body {-moz-user-select: none;}</style>");
	}
}

//设为首页
function setHomePage()
{
	if(document.all)
	{
		var obj = document.links(0);
		if (obj)
		{
			obj.style.behavior = 'url(#default#homepage)';
			obj.setHomePage(window.location.href);
		}
  	}
	else
	{
		if(window.netscape)
		{
			try
			{
				netscape.security.PrivilegeManager.enablePrivilege("UniversalXPConnect");
			}
			catch (e)
			{
				alert("此操作被浏览器拒绝！\n请在浏览器地址栏输入“about:config”并回车\n然后将[signed.applets.codebase_principal_support]设置为'true'");
			}
		}
		var prefs = Components.classes['@mozilla.org/preferences-service;1'].getService(Components.interfaces.nsIPrefBranch);
		prefs.setCharPref('browser.startup.homepage', window.location.href);
   	}
}

//加入收藏
function addFavorite()
{
	var url		= document.location.href;
	var title	= document.title;
	if (document.all)
	{
		window.external.addFavorite(url,title);
	}
	else if (window.sidebar)
	{
		window.sidebar.addPanel(title, url,"");
	}
}


//////////////////////////////////////////////////////访问统计相关//////////////////////////////////////////////////////
function GetXMLRequester()
{
	var xmlHttpRequest = false;
	try
	{
		if(window.ActiveXObject)
		{
			for(var i = 5; i; i--)
			{
				try
				{
					if( i == 2 )
					{
						xmlHttpRequest = new ActiveXObject("Microsoft.XMLHTTP");
					}
					else
					{
						xmlHttpRequest = new ActiveXObject("Msxml2.XMLHTTP." + i + ".0" );
						xmlHttpRequest.setRequestHeader("Content-Type","text/xml");
						xmlHttpRequest.setRequestHeader("Content-Type","gb2312");
					}
					break;
				}
				catch(e)
				{
					xmlHttpRequest = false;
				}
			}
		}
		else if(window.XMLHttpRequest)
		{
			xmlHttpRequest = new XMLHttpRequest();
			if (xmlHttpRequest.overrideMimeType)
			{
				xmlHttpRequest.overrideMimeType('text/xml');
			}
		}
	}
	catch(e)
	{
		xmlHttpRequest = false;
	}

	return xmlHttpRequest;
}

function Counter(refer, ip)
{
	var	url = "counter.asp?refer=" + refer + "&ip=" + ip;
	var xmlHttpRequest = GetXMLRequester();
	xmlHttpRequest.open('GET', url, true);
	xmlHttpRequest.send(null);
}

//////////////////////////////////////////////////////flash相关//////////////////////////////////////////////////////
//v1.0
//Copyright 2006 Adobe Systems, Inc. All rights reserved.
function AC_AddExtension(src, ext)
{
  if (src.indexOf('?') != -1)
    return src.replace(/\?/, ext+'?'); 
  else
    return src + ext;
}

function AC_Generateobj(objAttrs, params, embedAttrs) 
{ 
  var str = '<object ';
  for (var i in objAttrs)
    str += i + '="' + objAttrs[i] + '" ';
  str += '>';
  for (var i in params)
    str += '<param name="' + i + '" value="' + params[i] + '" /> ';
  str += '<embed ';
  for (var i in embedAttrs)
    str += i + '="' + embedAttrs[i] + '" ';
  str += ' ></embed></object>';

  document.write(str);
}

function AC_FL_RunContent(){
  var ret = 
    AC_GetArgs
    (  arguments, ".swf", "movie", "clsid:d27cdb6e-ae6d-11cf-96b8-444553540000"
     , "application/x-shockwave-flash"
    );
  AC_Generateobj(ret.objAttrs, ret.params, ret.embedAttrs);
}

function AC_SW_RunContent(){
  var ret = 
    AC_GetArgs
    (  arguments, ".dcr", "src", "clsid:166B1BCA-3F9C-11CF-8075-444553540000"
     , null
    );
  AC_Generateobj(ret.objAttrs, ret.params, ret.embedAttrs);
}

function AC_GetArgs(args, ext, srcParamName, classid, mimeType){
  var ret = new Object();
  ret.embedAttrs = new Object();
  ret.params = new Object();
  ret.objAttrs = new Object();
  for (var i=0; i < args.length; i=i+2){
    var currArg = args[i].toLowerCase();    

    switch (currArg){	
      case "classid":
        break;
      case "pluginspage":
        ret.embedAttrs[args[i]] = args[i+1];
        break;
      case "src":
      case "movie":	
        args[i+1] = AC_AddExtension(args[i+1], ext);
        ret.embedAttrs["src"] = args[i+1];
        ret.params[srcParamName] = args[i+1];
        break;
      case "onafterupdate":
      case "onbeforeupdate":
      case "onblur":
      case "oncellchange":
      case "onclick":
      case "ondblClick":
      case "ondrag":
      case "ondragend":
      case "ondragenter":
      case "ondragleave":
      case "ondragover":
      case "ondrop":
      case "onfinish":
      case "onfocus":
      case "onhelp":
      case "onmousedown":
      case "onmouseup":
      case "onmouseover":
      case "onmousemove":
      case "onmouseout":
      case "onkeypress":
      case "onkeydown":
      case "onkeyup":
      case "onload":
      case "onlosecapture":
      case "onpropertychange":
      case "onreadystatechange":
      case "onrowsdelete":
      case "onrowenter":
      case "onrowexit":
      case "onrowsinserted":
      case "onstart":
      case "onscroll":
      case "onbeforeeditfocus":
      case "onactivate":
      case "onbeforedeactivate":
      case "ondeactivate":
      case "type":
      case "codebase":
        ret.objAttrs[args[i]] = args[i+1];
        break;
      case "width":
      case "height":
      case "align":
      case "vspace": 
      case "hspace":
      case "class":
      case "title":
      case "accesskey":
      case "name":
      case "id":
      case "tabindex":
        ret.embedAttrs[args[i]] = ret.objAttrs[args[i]] = args[i+1];
        break;
      default:
        ret.embedAttrs[args[i]] = ret.params[args[i]] = args[i+1];
    }
  }
  ret.objAttrs["classid"] = classid;
  if (mimeType) ret.embedAttrs["type"] = mimeType;
  return ret;
}
