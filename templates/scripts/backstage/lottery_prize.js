var selArr = new Array();


//全选框 有问题可以考虑名字重复
function selAllCHK(obj)
{
	alert(obj.checked);
	var chk = document.getElementById("selAll");
	var arr = document.forms['goodsSet'].elements['all'];//name=doodsSet的form里面的所有name=all的input都选出来了
	var arrID = document.forms['goodsSet'].elements['allID'];
	var arrName = document.forms['goodsSet'].elements['allName'];
	var arrNum = document.forms['goodsSet'].elements['allNumber'];
	//alert("ID"+arrID.length);
	//alert("name"+arrName.length);
	//alert("num"+arrNum.length);
	if(chk.checked)
	{
		for(var i=0; i<arr.length; i++)
		{
			arr[i].checked = true;
			OrderdySetSelCHK(arr[i],arrName[i].value,arrID[i].value,arrNum[i].value);
		}
		
	}
	else
	{
		for(var i=0; i<arr.length; i++)
		{
			arr[i].checked = false;
		}
	}
}

//动态生成新表单
function OrderdySetSelCHK(obj,name,id,num)
{
	
	//alert(123);
	if(obj.checked)//虽然已经onclick但是还是要判断一下
	{
		for(var i=0; i<selArr.length; i++)//判断数组里面是否已经存有此ID
		{
			if(selArr[i] == id)
			{
				alert("已选择");
				return false;
			}		
		}
		
	//往数组里面添加ID
	var index = selArr.length;
	selArr[index] = id;
	selArr[index+1]=undefined;
	//alert(selArr[index+1]);
	var tbl = document.getElementById("DySetSel");
	
	//设置等级下拉列表
	var ranksel = "";
	ranksel += "<select name='rank["+id+"]'>";//要提交的数据的name设置成一个数组
	ranksel += "<option value='1'>一等奖</option>";
	ranksel += "<option value='2'>二等奖</option>";
	ranksel += "<option value='3'>三等奖</option>";
	ranksel += "<option value='0'>特等奖</option>";
	ranksel += "</select>";
	//=-------------------
	var row = tbl.insertRow(tbl.rows.length);//
	row.setAttribute("align","center");//设置对象的属性
	var td1 = row.insertCell(0);//参数0,1,2表示第0列，第n列..
	var td2 = row.insertCell(1);
	var td3 = row.insertCell(2);
	var td4 = row.insertCell(3);
	
	td1.innerHTML = name+"<input type='hidden' value='"+id+"' name='goodsid["+id+"]'/>";
	td2.innerHTML = "<input type='text' name='goodsnum["+id+"]' onblur='javascript:CheckGoodsNum(this,"+num+")' value='1'/><label>个（单位）</label>&nbsp;"+"（数量不能大于"+num+"）";
	td3.innerHTML = ranksel;
	td4.innerHTML = "<input type='button' value='删除' onclick='javascript:delRow(this)'/>";//双引号里的单引号
	}
}

//删除一行
/*
function deletetwoROW(obj)
{
	var tbl = document.getElementById("DySetSel");
	var row=obj.parentNode.parentNode;
	tbl.removeChild(row);
}
*/

function delRow(obj)
{ //参数为按钮标签对象
    var row = obj.parentNode.parentNode; //A标签所在行
    var tb = row.parentNode; //当前表格
    var rowIndex = row.rowIndex; //A标签所在行下标,rowindex可以获取当前行的下标
    tb.deleteRow(rowIndex); //删除当前行
    for(var i=row.rowIndex;i<selArr.length;i++)
    {
    	 selArr[i]=selArr[i+1];
    }
}

/*
function deleteoneROW(id)
 {
	  var tabll = document.getElementById("DySetSel");
	  var index = selArr.length;
	var i=0;
	  for(i;i<index;i++)
		{
		if(selArr[i]==id)
			tabll.deleteRow(i);
		}

}
*/

//提交表单
function submitGOODS()
{
	
	//$('selectgoods')获取表单对象
	$('selectgoods').submit();//根据ID

}



