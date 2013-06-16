// JavaScript Document

var myAlert = document.getElementById("alert")  
var reg = document.getElementById("content").getElementsByTagName("a")[0];  
var mClose = document.getElementById("close")  
reg.onclick = function()  
{  
myAlert.style.display = "block";  
myAlert.style.position = "absolute";  
myAlert.style.top = "40%";  
myAlert.style.left = "50%";  
myAlert.style.marginTop = "-75px";  
myAlert.style.marginLeft = "-150px";  
  
mybg = document.createElement("div")  
mybg.setAttribute("id","mybg")   
mybg.style.background = "#000";  
mybg.style.width = "100%";  
mybg.style.height = "100%";  
mybg.style.position = "absolute";  
mybg.style.top = "0";  
mybg.style.left = "0";  
mybg.style.zIndex = "500";  
mybg.style.opacity = "0.6";  
mybg.style.filter = "Alpha(opacity=60)";  
document.body.appendChild(mybg);  
document.body.style.overflow = "hidden";  
}  
 
 mClose.onclick = function()  
{  
myAlert.style.display = "none";  
mybg.style.display = "none";  
}  
