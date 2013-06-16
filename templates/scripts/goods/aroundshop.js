function valuenull(){
	  document.smallSearchForm.searchkey.value="";
  }
  function inputValidate(){
	  var inputvalue=document.smallSearchForm.searchkey.value;
	  if(inputvalue == null || inputvalue.length == 0) {
	      alert('请输入搜索条件！');
	      document.smallSearchForm.searchkey.focus();
	      return false;
	  }
	  //document.smallSearchForm.action=document.smallSearchForm.action+"&searchkey="+inputvalue;
	  document.smallSearchForm.submit();
	  return true;
  }