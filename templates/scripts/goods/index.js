var i=0;
var j=0;
//换一组热点圈子
function changehotgrp(a){
  var num=++j;
  var table="<ul>";
  var count=0;
  if(a.length<=15){
		//到最后一组，连接不可再点击
	document.getElementById('grpschange').removeAttribute("href");
	return;
  }
//每组显示15个元素
for(var i=num*15;i<a.length;i++){
   count++;
   table=table+" <li> <a href='#"+a[i].id+"'> <IMG class=iteration src='./uploadfiles/goods/"+a[i].photo+"'></A>";
   table=table+"<br><a href='#"+a[i].id+"'>"+a[i].groupname.substr(0,4)+"</a> </li> ";
   if(i==a.length-1){
	   //到最后一组，连接不可再点击
	   document.getElementById('grpschange').removeAttribute("href");;
   }
   if(count==15){
	   break;
   }
 }
	table=table+"</ul>";
	document.getElementById('grps').innerHTML = table;
}
	
	//换一组本周热帖 
function changeGroup(a){
	var num=++i;
	//var a=(如果是数值){/literal}smarty数值变量{literal};(如果是字符串)'{/literal}smarty字符串变量{literal}';
	var table="<ul>";
    var count=0;
    if(a.length<=10){
		//到最后一组，连接不可再点击
		document.getElementById('forumchange').removeAttribute("href");
		return;
	}
	//每组显示10个元素
	for(var j=num*10;j<a.length;j++){
	   count++;
	   table=table+" <li> <a href='#"+a[j].id+"'>"+a[j].title.substr(0,13)+"</a> </li> ";
	   if(j==a.length-1){
		   //到最后一组，连接不可再点击
		   document.getElementById('forumchange').removeAttribute("href");;
	   }
	   if(count==10){
		   break;
	   }
	   
	 }
	table=table+"</ul>";
	document.getElementById('forums').innerHTML = table;
}