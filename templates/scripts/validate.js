// *
var hoshi = "* ";

//必须输入
function isNotBlank(value, msgParam, errors) {
	if(isBlank(value)) {
        var str = hoshi + msgParam + "不能为空。";
        errors.push(str);
        return false;
    }
    return true;
}
//必须输入
function isBlank(value) {

    if(value == null || value.length == 0) {
        return true;
    }
    return false;
}
//是否数字
function isSuuji(value, msgParam, errors) {
    if(isBlank(value)) {
        return true;
    }
    if(!value.match(/^[0-9]+$/)) {
        var str = hoshi + msgParam + "必须为数字。";
        errors.push(str);
        return false;
    }
    return true;
}

//是否是电话号码
function isTel(value, msgParam, errors) {

    if(isBlank(value)) {

        return true;
    }
    if(!value.match(/^[0-9\-]+$/)) {
        var str = hoshi + msgParam + "必须为半角数字。";
        errors.push(str);
        return false;
    }
    return true;
}

//是否是浮点数
function isFloat(value, msgParam, errors) {
    if(isBlank(value)) {
        return true;
    }
    if(!value.match(/^[+|-]?\d*\.?\d*$/)) {
        var str = hoshi + msgParam + "必须为小数。";
        errors.push(str);
        return false;
    }
    return true;
}
//必须是半角英文或数字
function isHankaku(value, msgParam, errors) {
    if(isBlank(value)) {
        return true;
    }
    if(!value.match(/^[0-9a-zA-Z]+$/)) {
        var str = hoshi + msgParam + "必须为半角数字或字母。";
        errors.push(str);
        return false;
    }
    return true;
}

//是否是允许的长度
function isAllowedLength(value, len, msgParam, errors) {
    if(isBlank(value)) {
        return true;
    }
    if(value.length > len) {
        var str = hoshi + msgParam + "不能超出规定的长度「"+len+"」。";
        errors.push(str);
        return false;
    }
    return true;
}
//是否存在
function isExist(msgParam, errors) {
    var str = hoshi + msgParam + "已经存在。";
    errors.push(str);
    return false;
}

//是否不存在
function isNotExist(msgParam, errors) {
    var str = hoshi + msgParam + "不存在。";
    errors.push(str);
    return false;
}
//是否是Email
function isMail(value, msgParam, errors) {
    if(isBlank(value)) {
        return true;
    }

    if(!value.match(/^[a-zA-Z0-9_\.,-]+@([a-zA-Z0-9_\.,-]+\.[a-zA-Z0-9]+$)/)) {
        var str = hoshi + msgParam + "错误，不是email形式。";
        errors.push(str);
        return false;
    }
    return true;
}
//日期形式
function isDate(value, msgParam, errors) {
    if(isBlank(value)) {
        return true;
    }
    if(!value.match(/^((((1[6-9]|[2-9]\d)\d{2})\/(0?[13578]|1[02])\/(0?[1-9]|[12]\d|3[01]))|(((1[6-9]|[2-9]\d)\d{2})\/(0?[13456789]|1[012])\/(0?[1-9]|[12]\d|30))|(((1[6-9]|[2-9]\d)\d{2})\-0?2\/(0?[1-9]|1\d|2[0-8]))|(((1[6-9]|[2-9]\d)(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00))\/0?2\/29\/))$/)) {
        var str = hoshi + msgParam + "错误，不是日期形式「YYYY-MM-DD」。";
        errors.push(str);
        return false;
    }
    return true;
}
//日期形式
function isDateYYYYMMDDHHMM(value, msgParam, errors) {
    if(!isBlank(value)) {
        return true;
    }
    if(!value.match(/^((((1[6-9]|[2-9]\d)\d{2})\-(0?[13578]|1[02])\-(0?[1-9]|[12]\d|3[01]))|(((1[6-9]|[2-9]\d)\d{2})\-(0?[13456789]|1[012])\-(0?[1-9]|[12]\d|30))|(((1[6-9]|[2-9]\d)\d{2})\-0?2\-(0?[1-9]|1\d|2[0-8]))|(((1[6-9]|[2-9]\d)(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00))\-0?2\-29\-))[ ]((1|0?)[0-9]|2[0-3]):([0-5][0-9])$/)) {
        var str = hoshi+msgParam + "错误，不是日期形式「YYYY-MM-DD HH:MM」。";
        errors.push(str);
        return false;
    }
    return true;
}
//字符串是否相等
function equals(fromValue, toValue, msgParam1, msgParam2,  errors) {
    if(isBlank(fromValue) || isBlank(toValue)) {
        return true;
    }

    if(fromValue != toValue) {
    	str = hoshi + msgParam1 + " 和 "+ msgParam2+"不一致。";
        errors.push(str);
        return false;
    }
    return true;
}


//前者字符串是否<=后者相等
function compareString(fromValue, toValue, msgParam1, msgParam2,  errors) {
    if(isBlank(fromValue) || isBlank(toValue)) {
        return true;
    }
    if(fromValue > toValue) {
        var str = hoshi + msgParam1 + " 必须≦ "+ msgParam2+" 。";
        errors.push(str);
        return false;
    }
    return true;
}
//检查密码长度
function checkpasslen(value, len, msgParam, errors) {

    if(value.length < len) {
        var str =hoshi+msgParam+"数据长度为"+len+"以上。";
        errors.push(str);
        return false;
    }
    return true;
}
//比较日期数据的大小
function compareDate(startdate,enddate,msgParam,errors)
{

	if(Date.parse(startdate)-Date.parse(enddate)>0){

		var msg = hoshi+msgParam+"期间输入错误。";
		errors.push(msg);
	return false;
	}
	return true;
}


function trim(str){
    return str.replace(/(^\s*)|(\s*$)/g, "");
}
function ltrim(str){
    return str.replace(/(^\s*)/g,"");
}
function rtrim(str){
    return str.replace(/(\s*$)/g,"");
}


