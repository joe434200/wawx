/**
 * 
 */

function F_Open_dialog()
{
	document.getElementById('picPath').click();
}

function readFile(fileBrowser) { 
    if (navigator.userAgent.indexOf("MSIE")!=-1) 
        readFileIE(fileBrowser); 
    else if (navigator.userAgent.indexOf("Firefox")!=-1 || navigator.userAgent.indexOf("Mozilla")!=-1) 
        readFileFirefox(fileBrowser); 
    else 
        alert("Not IE or Firefox (userAgent=" + navigator.userAgent + ")"); 
}

function readFileFirefox(fileBrowser) { //FF浏览器
    try { 
        netscape.security.PrivilegeManager.enablePrivilege("UniversalXPConnect"); 
    }  
    catch (e) { 
        alert('路径错误!'); 
        return; 
    }

    var fileName=fileBrowser.value; 
    var file = Components.classes["@mozilla.org/file/local;1"] 
        .createInstance(Components.interfaces.nsILocalFile); 
    try { 
        file.initWithPath( fileName.replace(/\//g, "\\\\") ); 
    } 
    catch(e) { 
        if (e.result!=Components.results.NS_ERROR_FILE_UNRECOGNIZED_PATH) throw e; 
        return; 
    }

    if ( file.exists() == false ) { 
        alert("File '" + fileName + "' not found."); 
        return; 
    } 
    alert(file.path); 
}

function readFileIE(fileBrowser) { //IE浏览器，可直接获取上传文件路径
    alert(document.getElementByIdx_x("fileBrowser").value);
}