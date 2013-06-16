//根据不同的浏览器创建不同的XMLHttpRequest对象
function createXMLHttpRequest() {
	var xmlreq=false;
	if(window.XMLHttpRequest){
		xmlreq=new XMLHttpRequest();
	}
	else if(window.ActiveXObject){
		try{
			xmlreq=new ActiveXObject("Msxml2.XMLHTTP");
		}catch(e1){
			try{
				xmlreq=new ActiveXObject("Microsoft.XMLHTTP");
			}catch(e2){
				
			}
		}
	}
	return xmlreq;
}
