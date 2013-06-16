/***
 * ����Jqueryʱ����
 * ��дʱ�䣺2012��7��14��
 * version:manhuaDate.1.0.js
***/
$(function() {
	$.fn.manhuaDate = function(options) {
		var defaults = {
			Event : "click",
			Left : 0,
			Top : 22,
			fuhao : "-",
			isTime : false,
			beginY : 1949,
			endY : 2049
		};
		var options = $.extend(defaults,options);
		var bid = parseInt(Math.random()*100000);	
		$("body").prepend("<div class='zhezhao'></div><div class='calender'><div class='calenderContent'><div class='calenderTable'><div class='getyear' id='getdate'><a class='preMonth' id='preMonth"+bid+"'>��һ��</a><select id='year"+bid+"'></select><select id='month"+bid+"'></select><a class='nextMonth' id='nextMonth"+bid+"'>��һ��</a></div><div class='tablebg'><table class='calendertb' id='calender"+bid+"' cellpadding='0' cellspacing='1'><tr bgcolor='#D6D6D6'><th class='weekend'>��</th><th>һ</th><th>��</th><th>��</th><th>��</th><th>��</th><th class='weekend noborder'>��</th></tr><tr><td class='weekend2'></td><td></td><td></td><td></td><td></td><td></td><td class='weekend2 noborder'></td></tr><tr><td class='weekend2'></td><td></td><td></td><td></td><td></td><td></td><td class='weekend2 noborder'></td></tr><tr><td class='weekend2'></td><td></td><td></td><td></td><td></td><td></td><td class='weekend2 noborder'></td></tr><tr><td class='weekend2'></td><td></td><td></td><td></td><td></td><td></td><td class='weekend2 noborder'></td></tr><tr><td class='weekend2'></td><td></td><td></td><td></td><td></td><td></td><td class='weekend2'></td></tr><tr><td class='weekend2'></td><td></td><td></td><td></td><td></td><td></td><td class='weekend2'></td></tr></table></div></div></div></div>");	
		var $mhInput = $(this);
		var isToday = true;//�Ƿ�Ϊ����Ĭ��Ϊ��	
		var date = new Date();//���ʱ�����
		var nowYear = date.getFullYear();//��õ�ǰ���
		var nowMonth = date.getMonth() + 1;//��õ�ǰ�·�
		var today = date.getDate();//��õ�ǰ����
		var nowWeek = new Date(nowYear, nowMonth - 1, 1).getDay();//��õ�ǰ����
		var nowLastday = getMonthNum(nowMonth, nowYear);//������һ��
		//�ꡢ��������ĳ�ʼ��
		for(var i=options.beginY; i<=options.endY; i++){
			$("<option value='"+i+"'>"+i+"��</option>").appendTo($("#year"+bid))
		}
		for(var i=1; i<=12; i++){
			$("<option value='"+i+"'>"+i+"��</option>").appendTo($("#month"+bid));
		}		
		ManhuaDate(nowYear, nowMonth, nowWeek, nowLastday);//��ʼ��Ϊ��ǰ����		
		//��һ�°󶨵���¼�
		$("#preMonth"+bid).click(function() {
			isToday = false;
			var year = parseInt($("#year"+bid).val());
			var month = parseInt($("#month"+bid).val());		
			month = month - 1;
			if (month < 1) {
				month = 12;
				year = year - 1;
			}
			if(nowYear==year && nowMonth==month){
				isToday = true;
			}
			var week = new Date(year, month - 1, 1).getDay();
			var lastday = getMonthNum(month, year);
			ManhuaDate(year, month, week, lastday);
		});		
		//��������ĸı��¼�
		$("#year"+bid).change(function() {	
			isToday = false;				   
			var year = parseInt($(this).val());		
			var month = parseInt($("#month"+bid).val());	
			if(nowYear==year && nowMonth==month){
				isToday = true;
			}
			var week = new Date(year, month - 1, 1).getDay();
			var lastday = getMonthNum(month, year);
			ManhuaDate(year, month, week, lastday);
		});		
		//��������ĸı��¼�
		$("#month"+bid).change(function() {
			isToday = false;
			var year = parseInt($("#year"+bid).val());		
			var month = parseInt($(this).val());	
			if(nowYear==year && nowMonth==month){
				isToday = true;
			}
			var week = new Date(year, month - 1, 1).getDay();
			var lastday = getMonthNum(month, year);
			ManhuaDate(year, month, week, lastday);
		});		
		//��һ���µĵ���¼�
		 $("#nextMonth"+bid).click(function() {
			isToday = false;
			var year = parseInt($("#year"+bid).val());
			var month = parseInt($("#month"+bid).val());
		
			month = parseInt(month) + 1;
			if (parseInt(month) > 12) {
				month = 1;
				year = parseInt(year) + 1;
			}
			if(nowYear==year && nowMonth==month){
				isToday = true;
			}
			var week = new Date(year, month - 1, 1).getDay();
			var lastday = getMonthNum(month, year);
			ManhuaDate(year, month, week, lastday);
		});
		 
		 //��ʼ������
		 function ManhuaDate(year, month, week, lastday) {
			$("#year"+bid).val(year);
			$("#month"+bid).val(month)
			var table = document.getElementById("calender"+bid);
			var n = 1;
			for (var j = 0; j < week; j++) {
				table.rows[1].cells[j].innerHTML = "&nbsp;"
			}
			for (var j = week; j < 7; j++) {
				if (n == today && isToday) {				
					table.rows[1].cells[j].className="tdtoday";				
				}else {
					table.rows[1].cells[j].className="";
				}
				table.rows[1].cells[j].innerHTML = n;
				n++;
			}
			for (var i = 2; i < 7; i++) {
				for (j = 0; j < 7; j++) {
					if (n > lastday) {
						table.rows[i].cells[j].innerHTML = "&nbsp"
					}
					 else {
						if (n == today && isToday) {						
							table.rows[i].cells[j].className="tdtoday";						
						}else {
							table.rows[i].cells[j].className="";
						}
						table.rows[i].cells[j].innerHTML = n;
						n++;
					}
				}
			}
		}
		//����·ݵ�����
		function getMonthNum(month, year) {
			month = month - 1;
			var LeapYear = ((year % 4 == 0 && year % 100 != 0) || year % 400 == 0) ? true: false;
			var monthNum;
			switch (parseInt(month)) {
			case 0:
			case 2:
			case 4:
			case 6:
			case 7:
			case 9:
			case 11:
				monthNum = 31;
				break;
			case 3:
			case 5:
			case 8:
			case 10:
				monthNum = 30;
				break;
			case 1:
				monthNum = LeapYear ? 29: 28;
			}
			return monthNum;
		}		
		//ÿһ�е������¼��ı䵱ǰ��ʽ
		$("#calender"+bid+" td:not(.tdtoday)").hover(function() {
			$(this).addClass("hover")
		},function() {
			$(this).removeClass("hover");
		});		
		//���ʱ���б��¼�
		$("#calender"+bid+" td").live("click",function() {	
													   alert($mhInput.attr("id"));
			var dv = $(this).html();
			if (dv != "&nbsp;"){
				 var str = "";
				 if (options.isTime){			
					var nd = new Date();
					str = $("#year"+bid).val() + options.fuhao + $("#month"+bid).val() + options.fuhao + dv + " "+ nd.getHours()+":"+nd.getMinutes()+":"+nd.getSeconds();
				 }else{
					str = $("#year"+bid).val() + options.fuhao + $("#month"+bid).val() + options.fuhao + dv;
				}
				$mhInput.val(str);
				$(".zhezhao").hide();
				$(".calender").hide();
			}
		});
		//�ı�����¼�
		$mhInput.live(options.Event,function(e){						
		  var iof = $(this).offset();
		  $(".calender").css({ "left" : iof.left+options.Left,"top" : iof.top+options.Top });
		  $(".zhezhao").show();
		  $(".calender").show();	
		});		
		//������ֲ�ر�ʱ���
		$(".zhezhao").live("click",function(){
				$(".calender").hide();
				$(this).hide();
		});		
	};
});