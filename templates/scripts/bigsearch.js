function checksearch()
{
	
	var searchvalue=document.getElementById("searcharea").value;

		location.href="bigsearch.php?module=init&keyword="+searchvalue;
	
	
	}
function changesearch(searchtype)
{
	
	for(var i=2;i<6;i++)
		{
		  var select="typesearch"+i;
		  if(i==searchtype)
			  {
			  document.getElementById(select).style.color="blue";
			  }
		  else
			  {
			  document.getElementById(select).style.color="black";
			  }
		}
	
	 var myAjax = new Ajax.Request(
				"bigsearch.php?module=changesearch&searchtype="+searchtype,
	            {
	                method: 'get',//是ajax返回时，需要执行的js  函数
	              
	            }
	        );
	}
