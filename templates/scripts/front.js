//错误表示
function callback(result) {
    if(result.result == "error") {
      var error_list = result.error;
      var ul = document.createElement("ul");
      for(var i = 0; i < error_list.length; i++) {
          var li = document.createElement("li");
          li.innerHTML = error_list[i].message;
          ul.appendChild(li);
      }
      $('advice_error').appendChild(ul);
      $('advice_error').style.display = "block";
    } else if(result.result == "redirect") {
      location = result.redirect;
    } else {
        if(result.params != null) {
            eval(result.result)(result.params);
        } else {
            eval(result.result)();
        }
    }
}

//警告信息表示
function showWarning(error_list) {
   if (error_list.length > 0) {
        var ul = document.createElement("ul");
        for(var i = 0; i < error_list.length; i++) {
            var li = document.createElement("li");
            li.innerHTML = error_list[i];
            ul.appendChild(li);
        }
        //$('advice_error').appendChild(ul);
        //$('advice_error').style.display = "block";
        $jq("#advice_error").append(ul);
        $jq("#advice_error").css({"display":"block"});
    }
}

//警告信息删除
function clearError() {
    //$('advice_error').innerHTML = "";
    //$('advice_error').style.display = "none";
	$jq("#advice_error").html("");
	$jq("#advice_error").css({"display":"none"});
}

//ajax送信
function call(url, param) {
    clearError();
    new Ajax.Request(url,{
        method : 'post',
        parameters : param,
        onComplete : function(req, result) {
            callback(result);
        }
    });
}

//ajaxForm送信
function callForm(url, formID) {
    clearError();
    new Ajax.Request(url, {
        method : 'post',
        parameters : Form.serialize($(formID)),
        onComplete : function(req, result) {
            callback(result);
        }
    });
}

/**
 * Radio値を取得する。
 *
 */
function getRadioValue(radioName){

    var targetArrays = $A(document.getElementsByName(radioName));
    var value = null;

    targetArrays.find(
        function(item) {
            if(item.checked == true) {
              value = item.value;
              return true;
            }
        }
    );
    return value;
}

/**
 * Radio値を設定する。
 *
 */
function setRadioValue(radioName,value) {
    var targetArrays = $A(document.getElementsByName(radioName));
    targetArrays.find(
        function(item) {
            if(item.value == value) {
                item.checked = true;
                return true;
            }
        }
    );
}
//确认删除
function delete_confirm() {
    var msg = '真的要删除吗？';
    if (arguments.length > 0) {
        msg = arguments[0];
    }
    if(window.confirm(msg)){
        return true;
    }
    else{
        window.alert('已经取消。');
        return false;
    }
}

//add by lzg 20120328
function showReasonDiv(checkobj,showflg)
{
	var obj = document.getElementById("showreason");

	if ((checkobj.checked&&showflg=='1'))
	{
		//alert("d1");
		obj.style.display="";
		document.getElementById("ngreason").value="理由";
	}
	else
	{
		//alert("d2");
		obj.style.display="none";
	}
}