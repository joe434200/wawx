//修改省
function changefirstcity(id,name)
{  
	document.getElementById("firstcity").innerHTML=name;
      var url="common.php?module=firstcity";
	  var newAjax = new Ajax.Request(
			url,
			{
				method:'post',
				parameters:"firstcityid="+id,
				onComplete:changefirstcityReponse
				
			}
		);
	}

function changefirstcityReponse(json)
{
	var obj = eval("("+json.responseText+")");
	var firstcontent = "";
	var secondcontent = "";
	var thirdcontent = "";
	var citycontent="";
	var schoolcontent="";
	
	//省份处理
	for(var i=0; i<obj.firstcityname.length; i++)
	{
		
		if(obj.baseinfo.firstcityid != obj.firstcityname[i].ID)
		{
			var url="javascript:changefirstcity("+parseInt(obj.firstcityname[i].ID)+",'"+obj.firstcityname[i].name+"')";
			firstcontent += "<li>";
			firstcontent += "<A href="+url+">"+obj.firstcityname[i].name+"</A>";
			firstcontent += "</li>";
		}
	}
	//市级的处理
	 if(obj.secondcityname.length == 0)
	 {
		 document.getElementById("secondcity").innerHTML="";
		 secondcontent += "<li>";
		 secondcontent += "<A href=''></A>";
		 secondcontent += "</li>";
		
	  
	 }
	 else if(obj.secondcityname.length == 1)
	  {
		 
		   document.getElementById("secondcity").innerHTML=obj.secondcityname[0].name;
		   secondcontent += "<li>";
		   secondcontent += "<A href=''></A>";
		   secondcontent += "</li>";
		   
		
	  }
	 else
		 {
		   document.getElementById("secondcity").innerHTML=obj.secondcityname[0].name;
		   for(var i=1; i<obj.secondcityname.length; i++)
			{
				var url="javascript:changsecondcity("+parseInt(obj.secondcityname[i].ID)+",'"+obj.secondcityname[i].name+"')";
				secondcontent += "<li>";
				secondcontent += "<A href="+url+">"+obj.secondcityname[i].name+"</A>";
				secondcontent += "</li>";
			}
		 }
	 //区的处理
	if(obj.thirdcityname.length == 0)
	{
		document.getElementById("thirdcity").innerHTML="";
		thirdcontent += "<li>";
		thirdcontent += "<A href=''></A>";
		thirdcontent += "</li>";
	
	}
	else if(obj.thirdcityname.length==1)
		{
		document.getElementById("thirdcity").innerHTML=obj.thirdcityname[0].name;
	
			thirdcontent += "<li>";
			thirdcontent += "<A href=''></A>";
			thirdcontent += "</li>";
		
		}
	else
		{
		document.getElementById("thirdcity").innerHTML=obj.thirdcityname[0].name;
		for(var i=1; i<obj.thirdcityname.length; i++)
		{
			var url="javascript:changethirdcity("+parseInt(obj.thirdcityname[i].ID)+",'"+obj.thirdcityname[i].name+"')";
			thirdcontent += "<li>";
			thirdcontent += "<A href="+url+">"+obj.thirdcityname[i].name+"</A>";
			thirdcontent += "</li>";
		}
		}
	//学校上方的省级处理
	for(var i=0;i<obj.firstcityname.length;i++)
	{
	   var url="javascript:changeschools("+obj.firstcityname[i].ID+")";
	    citycontent +="<dd";
		if(obj.baseinfo.schoolcityid==obj.firstcityname[i].ID)
			{
			citycontent +=" class='sel'"; 
			}
		citycontent +=" id='city"+obj.firstcityname[i].ID+"'";
		citycontent +=" onclick='"+url+"'>"+obj.firstcityname[i].name+"</dd>";
	}
	
	//学校的处理
 for(var i=0;i<obj.schoollist.length;i++)
	{
	    schoolcontent +="<dd";
		if(obj.baseinfo.schoolid==obj.schoollist[i].ID)
			{
			schoolcontent +=" class='sel'"; 
			 if(obj.schoollist[i].schoolname.length>4)
			 {
		        var chooseschool=obj.schoollist[i].schoolname.substr(0,4);
		
			 }
		     else
			 {
			    var chooseschool=obj.schoollist[i].schoolname;
			 }
		 $jq("#schooldisplayarea").html(chooseschool);
			}
		schoolcontent +=" id='school"+obj.schoollist[i].ID+"'";
		schoolcontent +=" onclick='javascript:addschool("+parseInt(obj.schoollist[i].ID)+")'>"+obj.schoollist[i].schoolname+"</dd>";
	}
 
	$jq("#schooldisplayarea").html(chooseschool);
	$jq("#firstcityarea").html(firstcontent);
	$jq("#secondcityarea").html(secondcontent);
	$jq("#thirdcityarea").html(thirdcontent);
	$jq("#cityarea").html(citycontent);
	$jq("#schoolarea").html(schoolcontent);
}

//修改市
function changsecondcity(id,name)
{
	document.getElementById("secondcity").innerHTML=name;
	var url="common.php?module=secondcity";
	  var newAjax = new Ajax.Request(
				url,
				{
					method:'post',
					parameters:"secondcityid="+id,
					onComplete:changesecondcityReponse
					
				}
			);
	
	}
function changesecondcityReponse(json)
{
	var obj = eval("("+json.responseText+")");
	var secondcontent = "";
	var thirdcontent = "";
	for(var i=0; i<obj.secondcityname.length; i++)
	{
		if(obj.baseinfo.secondcityid != obj.secondcityname[i].ID)
			{
			var url="javascript:changsecondcity("+parseInt(obj.secondcityname[i].ID)+",'"+obj.secondcityname[i].name+"')";
			secondcontent += "<li>";
			secondcontent += "<A href="+url+">"+obj.secondcityname[i].name+"</A>";
			secondcontent += "</li>";
			}
	}
	if(obj.thirdcityname.length == 0)
	{
		document.getElementById("thirdcity").innerHTML="";
		thirdcontent += "<li>";
		thirdcontent += "<A href=''></A>";
		thirdcontent += "</li>";
	
	}
	else if(obj.thirdcityname.length==1)
		{
		document.getElementById("thirdcity").innerHTML=obj.thirdcityname[0].name;
	
			thirdcontent += "<li>";
			thirdcontent += "<A href=''></A>";
			thirdcontent += "</li>";
		
		}
	else
		{
		   document.getElementById("thirdcity").innerHTML=obj.thirdcityname[0].name;
			for(var i=1; i<obj.thirdcityname.length; i++)
			{
				var url="javascript:changethirdcity("+parseInt(obj.thirdcityname[i].ID)+",'"+obj.thirdcityname[i].name+"')";
				thirdcontent += "<li>";
				thirdcontent += "<A href="+url+">"+obj.thirdcityname[i].name+"</A>";
				thirdcontent += "</li>";
			}
		}
	$jq("#secondcityarea").html(secondcontent);
	$jq("#thirdcityarea").html(thirdcontent);
	
	
}
//修改区
function  changethirdcity(id,name)
{
	document.getElementById("thirdcity").innerHTML=name;
	var url="common.php?module=thirdcity";
	  var newAjax = new Ajax.Request(
				url,
				{
					method:'post',
					parameters:"thirdcityid="+id,
					onComplete:changethirdcityReponse
					
				}
			);
	}
function changethirdcityReponse(json)
{
	var obj = eval("("+json.responseText+")");
	var thirdcontent = "";
	for(var i=0; i<obj.thirdcityname.length; i++)
	{
		
		if(obj.baseinfo.thirdcityid != obj.thirdcityname[i].ID)
			{
			var url="javascript:changethirdcity("+parseInt(obj.thirdcityname[i].ID)+",'"+obj.thirdcityname[i].name+"')";
			thirdcontent += "<li>";
			thirdcontent += "<A href="+url+">"+obj.thirdcityname[i].name+"</A>";
			thirdcontent += "</li>";
			}
	}
	$jq("#thirdcityarea").html(thirdcontent);
	
}

function changeschools(id)
{

	var url="common.php?module=changeschool";
	  var newAjax = new Ajax.Request(
				url,
				{
					method:'post',
					parameters:"proviceid="+id,
					onComplete:changeschoolReponse
					
				}
			);
	}
function changeschoolReponse(json)
{
	
	var obj = eval("("+json.responseText+")");
	var content = "";
	for(var i=0; i<obj.citylist.length; i++)
	{
		var cityid = "city"+obj.citylist[i].ID;
		if(obj.citylist[i].ID != obj.baseinfo.proviceid)
			{
			document.getElementById(cityid).className="";
			
			}
		else
			{
			document.getElementById(cityid).className="sel";
			}
		
			
	}
	for(var i=0; i<obj.schoollist.length; i++)
	{
	   
		var url="javascript:addschool("+obj.schoollist[i].ID+")";
		content += "<dd";
		if(obj.schoollist[i].ID==obj.baseinfo.oneschoolid)
			{
			content += " class='sel'"; 
			}
		content += " id='school"+obj.schoollist[i].ID+"'";
		content += " onclick='"+url+"'>";
		content += obj.schoollist[i].schoolname;
		content += "</dd> ";
		
	}
	$jq("#schoolarea").html(content);
	}

function addschool(id,key)
{
	if(key==undefined)
		{
		key=0;
		}
	var url="common.php?module=addschoolsession";
	  var newAjax = new Ajax.Request(
				url,
				{
					method:'post',
					parameters:"schoolid="+id+"&keyword="+key,
					onComplete:addschoolReponse
					
				}
			);
	}
function addschoolReponse(json)
{
	var obj = eval("("+json.responseText+")");
	for(var i=0; i<obj.schoollist.length; i++)
	{
		var school = "school"+obj.schoollist[i].ID;
		if(obj.schoollist[i].ID != obj.baseinfo.schoolid)
			{
			  document.getElementById(school).className="";
			}
		else
			{
			
			 document.getElementById(school).className="sel";
			 if(obj.schoollist[i].schoolname.length>4)
				 {
			 var chooseschool=obj.schoollist[i].schoolname.substr(0,4);
			
				 }
			 else
				 {
				 var chooseschool=obj.schoollist[i].schoolname;
				 }
			 $jq("#schooldisplayarea").html(chooseschool);
			}
			
	}

}

function searchschool()
{
	var name=document.getElementById("schoolsearch").value;
	   if(name == null || name.length == 0)
	   {
		   alert("请输入学校名称");
	       return true;
	    }
	var url="common.php?module=searchschool";
	  var newAjax = new Ajax.Request(
				url,
				{
					method:'post',
					parameters:"schoolname="+name,
					onComplete:searchschoolReponse
					
				}
			);
	}
function searchschoolReponse(json)
{
	var obj = eval("("+json.responseText+")");
	var schoolcontent="";
	for(var i=0;i<obj.schools.length;i++)
	{
		//fiurl = "javascript:addSecReply('"+obj.reply[i].name+"',"+obj.reply[i].id+")";
		var url="javascript:addschool("+parseInt(obj.schools[i].ID)+",'"+obj.baseinfo.schoolname+"')";
	    schoolcontent +="<dd";
		schoolcontent +=" id='school"+obj.schools[i].ID+"'";
		schoolcontent +=" onclick='javascript:addschool("+parseInt(obj.schools[i].ID)+",\""+obj.baseinfo.schoolname+"\")'>"+obj.schools[i].schoolname+"</dd>";
	}
   $jq("#schoolarea").html(schoolcontent);
	}

function AddFavorite(title, url) 
{
	   try {
        window.external.addFavorite(url, title);
	    }
	   catch (e) {
	        try {
	            window.sidebar.addPanel(title, url, "");
	        }
	        catch (e) {
	            alert("抱歉，您所使用的浏览器无法完成此操作。\n\n加入收藏失败，请使用Ctrl+D进行添加");
	        }
	    }
	}