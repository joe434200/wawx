/* 
 
showPages v1.1 
---------------------- 
var pg = new showPages('pg'); 
pg.pageCount = 12; //定义总页数(必要) 
pg.argName = 'p';    //定义参数名(可选,缺省为page) 
pg.printHtml();        //显示页数 
 
 
Supported in Internet Explorer, Mozilla Firefox 
*/  
  
function showPages(name) { //初始化属性  
    this.name = name;      //对象名称  
    this.page = 1;         //当前页数  
    this.pageCount = 1;    //总页数  
    this.argName = 'page'; //参数名  
    this.showTimes = 1;    //打印次数  
}  
  
showPages.prototype.getPage = function(){ //丛url获得当前页数,如果变量重复只获取最后一个  
    var args = location.search;  
    var reg = new RegExp('[\?&]?' + this.argName + '=([^&]*)[&$]?', 'gi');  
    var chk = args.match(reg);  
    if(chk == null)
    	this.page = 1;
    else
    	this.page = RegExp.$1;
} ; 
showPages.prototype.checkPages = function(){ //进行当前页数和总页数的验证  
    if (isNaN(parseInt(this.page))) this.page = 1;  
    if (isNaN(parseInt(this.pageCount))) this.pageCount = 1;  
    if (this.page < 1) this.page = 1;  
    if (this.pageCount < 1) this.pageCount = 1;  
    if (this.page > this.pageCount) this.page = this.pageCount;  
    this.page = parseInt(this.page);  
    this.pageCount = parseInt(this.pageCount);  
}  ;
showPages.prototype.createHtml = function(mode){ //生成html代码  
    var strHtml = '', prevPage = this.page - 1, nextPage = this.page + 1;  
    //  
			strHtml += '<div class="pagination">';
			
            strHtml += '<span class="count">总共  <strong>' + this.pageCount + '</strong> 页 &nbsp当前第  <strong>' + this.page + '</strong> 页&nbsp;</span>';  
            strHtml += '<span class="number">';  
            if (prevPage < 1) {  
                strHtml += '<span title="首页" class="disabled prev_page">首页</span>&nbsp;';  
                strHtml += '<span title="上一页" class="disabled prev_page">上一页</span>&nbsp;';  
            } else {  
                strHtml += '<span title="首页"><a href="javascript:' + this.name + '.toPage(1);">首页</a></span>&nbsp;';  
                strHtml += '<span title="上一页" class="prev_page" rel="prev start"><a href="javascript:' + this.name + '.toPage(' + prevPage + ');">上一页</a></span>&nbsp;';  
            }  
            if (this.page != 1) strHtml += '<span title="第1页"><a href="javascript:' + this.name + '.toPage(1);">第1页</a></span>';  
            if (this.page >= 5) strHtml += '<span>...</span>';  
            if (this.pageCount > this.page + 2) {  
                var endPage = this.page + 2;  
            } else {  
                var endPage = this.pageCount;  
            }  
            for (var i = this.page - 2; i <= endPage; i++) {  
                if (i > 0) {  
                    if (i == this.page) {  
                        strHtml += '<span title="第' + i + '页" class="current">第' + i + '页</span>';  
                    } else {  
                        if (i != 1 && i != this.pageCount) {  
                            strHtml += '<span title="第' + i + '页"><a href="javascript:' + this.name + '.toPage(' + i + ');">第' + i + '页</a></span>';  
                        }  
                    }  
                }  
            }  
            if (this.page + 3 < this.pageCount) strHtml += '<span>...</span>';  
            if (this.page != this.pageCount) strHtml += '<span  title="第' + this.pageCount + '页"><a href="javascript:' + this.name + '.toPage(' + this.pageCount + ');">第' + this.pageCount + '页</a></span>';  
            if (nextPage > this.pageCount) {  
                strHtml += '&nbsp;<span title="下一页" class="disabled next_page">下一页</span>';  
                strHtml += '&nbsp;<span title="尾页" class="disabled next_page">尾页</span>';  
            } else {  
                strHtml += '&nbsp;<span title="下一页" class="next_page" rel="next"><a href="javascript:' + this.name + '.toPage(' + nextPage + ');">下一页</a></span>';  
                strHtml += '&nbsp;<span title="尾页" class="next_page" rel="next"><a href="javascript:' + this.name + '.toPage(' + this.pageCount + ');">尾页</a></span>';  
            }  
            strHtml += '</span>';  
			strHtml += '</div>';
  
    return strHtml;  
}  ;
showPages.prototype.createUrl = function (page) { //生成页面跳转url  
    if (isNaN(parseInt(page))) page = 1;  
    if (page < 1) page = 1;  
    if (page > this.pageCount) page = this.pageCount;  
    var url = location.protocol + '//' + location.host + location.pathname;  
    var args = location.search;  
    var reg = new RegExp('([\?&]?)' + this.argName + '=[^&]*[&$]?', 'gi');  
    args = args.replace(reg,'$1');  
    if (args == '' || args == null) {  
        args += '?' + this.argName + '=' + page;  
    } else if (args.substr(args.length - 1,1) == '?' || args.substr(args.length - 1,1) == '&') {  
            args += this.argName + '=' + page;  
    } else {  
            args += '&' + this.argName + '=' + page;  
    }  
    return url + args;  
}  ;
showPages.prototype.toPage = function(page){ //页面跳转  
    var turnTo = 1;  
    if (typeof(page) == 'object') {  
        turnTo = page.options[page.selectedIndex].value;  
    } else {  
        turnTo = page;  
    }  
    self.location.href = this.createUrl(turnTo);  
}  ;
showPages.prototype.printHtml = function(mode){ //显示html代码  
    this.getPage();  
    this.checkPages();  
    this.showTimes += 1;  
    document.write('<div id="pages_' + this.name + '_' + this.showTimes + '" class="page"></div>');  
    document.getElementById('pages_' + this.name + '_' + this.showTimes).innerHTML = this.createHtml(mode);  
      
}  ;
showPages.prototype.formatInputPage = function(e){ //限定输入页数格式  
    var ie = navigator.appName=="Microsoft Internet Explorer"?true:false;  
    if(!ie) var key = e.which;  
    else var key = event.keyCode;  
    if (key == 8 || key == 46 || (key >= 48 && key <= 57)) return true;  
    return false;  
} ; 