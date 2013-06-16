/**
 *
 */
function change_two_select(url,param,change_select) {    //双选择框ajax联动
    var ajax=new Ajax.Request(url,{
                       method:    'post',
                       contentType: 'application/x-www-form-urlencoded',
                       asynchronous: true,
                       encoding:  'UTF-8',
                       requestHeaders: {Accept:'application/json'},
                       parameters:  param,
                       onComplete: function(req){
                    	   document.getElementById(change_select).options.length = 0;
                    	   var json = req.responseText.evalJSON(true);
                    	   for(var i = 0;i<json.length;i++){
                    		   document.getElementById(change_select).options.add(new Option(json[i][1],json[i][0]));
                    	   }
                       }
                       });
}

function change_two_select_liveone(url,param,change_select){
    var ajax=new Ajax.Request(url,{
        method:    'post',
        contentType: 'application/x-www-form-urlencoded',
        asynchronous: true,
        encoding:  'UTF-8',
        requestHeaders: {Accept:'application/json'},
        parameters:  param,
        onComplete: function(req){
     	   document.getElementById(change_select).options.length = 1;
     	   var json=req.responseText.evalJSON(true);
     	   for(var i = 0;i<json.length;i++){
     		   document.getElementById(change_select).options.add(new Option(json[i][1],json[i][0]));
     	   }
        }
        });
}

/*
 * 郵便番号より都道府県、住所などを取得する
 *
 * url         'zipmaster.php?module=search'にする
 * param       param.zip_codeにする
 * prefectural 都道府県表示用idの名称
 * address     住所表示用idの名称
 */
function zipAjaxChange(url, param, prefectural, address, addressKana, copyPrefectural, copyAddress) {
	var ajax=new Ajax.Request(url,{
                       method: 'post',
                       contentType: 'application/x-www-form-urlencoded',
                       asynchronous: true,
                       encoding: 'UTF-8',
                       requestHeaders: {Accept:'application/json'},
                       parameters: param,
                       onComplete: function(req) {
                    	   var json = req.responseText.evalJSON(true);
                    	   if (json.length == 0) {
                    		   document.getElementById(prefectural).value = "";
                    		   document.getElementById(address).value = "";
                    		   alert("検索内容はありません。");
                    	   } else {
                    		   for(var i=0; i<json.length; i++) {
                        		   document.getElementById(prefectural).value = json[i][0];
                        		   document.getElementById(address).value = json[i][1]+json[i][2];
                        		   if(copyPrefectural != undefined){
                        			   document.getElementById(copyPrefectural).value = json[i][0];
                        			   document.getElementById(copyAddress).value = json[i][1]+json[i][2];
                        		   }
                        		   //document.getElementById(addressKana).value = json[i][3];
                        	   }
                    	   }
                       	}
                       });
}

function ajaxResponse(url,param,functionname){
    var ajax=new Ajax.Request(url,{
        method:    'post',
        contentType: 'application/x-www-form-urlencoded',
        asynchronous: true,
        encoding:  'UTF-8',
        requestHeaders: {Accept:'application/json'},
        parameters:  param,
        onComplete:  function(req){
        	if(req.responseText == 1){
        		functionname;
        	}
        	else{
        		location.reload();
        	}
        }
        });
}

function creatDiv(PObj,num){
	var aElement = document.createElement("div");
	aElement.id = "div"+num;
	PObj.appendChild(aElement);
	return aElement;
}

function creatTable(PObj){
	var aElement = document.createElement("Table");
	PObj.appendChild(aElement);
	return aElement;
}

function createInput(PObj,num){
	var aElement = document.createElement("input");
	aElement.id = "file"+num;
	aElement.name = "file"+num;
	aElement.setAttribute("type", "file");
	aElement.className = "txt250";
	PObj.appendChild(aElement);
    var aElement=document.createElement("input");
    aElement.setAttribute("type", "button");
    aElement.className = "anniu6";
	aElement.attachEvent("onclick",function(){deleteDiv(num)});
	PObj.appendChild(aElement);
}

function addRow(tableObj){
	var newTr = tableObj.insertRow();
	return newTr;
}

function addRowNowDown(tableObj,i){
	var newTr = tableObj.insertRow(i);
	return newTr;
}

function delRow(tableid,obj){
	var tableObj = document.getElementById(tableid);
	tableObj.deleteRow(obj.rowIndex);
}

function addTD(TrObj){
	var newTd = TrObj.insertCell();
	newTd.align = "center";
	return newTd;
}

function addFreeNode(type,text){
	var aElement = document.createElement(type);
	aElement.innerHTML = text;
	return aElement;
}

function addInput(name,id,type,classname,readonly,functionname){
	var aElement = document.createElement("input");
	aElement.id = id;
	aElement.name = name;
	aElement.setAttribute("type", type);
	aElement.className = classname;
	aElement.setAttribute("readOnly", readonly);
	if(functionname != ''){
		aElement.attachEvent("onclick",function(){functionname(aElement)});
	}
	return aElement;
}

function addImage(src,functionname,width,height,tableid,trobj){
	var aElement = document.createElement("IMG");
	aElement.src = src;
	aElement.width = width;
	aElement.height = height;
	if(functionname != ''){
		aElement.attachEvent("onclick",function(){functionname(tableid,trobj)});
	}
	return aElement;
}

function addImageComm(src,functionname,width,height){
	var aElement = document.createElement("IMG");
	aElement.src = src;
	aElement.width = width;
	aElement.height = height;
	if(functionname != ''){
		aElement.attachEvent("onclick",function(){functionname(aElement)});
	}
	return aElement;
}

function addOtherObj(type,text,name,id,classname){
	var aElement = document.createElement(type);
	aElement.name = name;
	aElement.id = id;
	aElement.className = classname;
	aElement.innerHTML = text;
	return aElement;
}

function deleteTableRows(tableObj,save_row_num){
    if(tableObj.rows.length != save_row_num) {
    	for(var i = tableObj.rows.length - 1; i > 0; i--) {
    		tableObj.deleteRow(i);
    	}
    }
}

function deleteLastPointChar(char,point){
	var lastIndex = char.lastIndexOf(point);
    if (lastIndex > -1) {
    	char = char.substring(0, lastIndex) + char.substring(lastIndex + 1, char.length);
    }
    return char;
}