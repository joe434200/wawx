// JavaScript Document


document.writeln("<div class=\"q_toper\">");
document.writeln("       <div class=\"box\">");
document.writeln("	   <ul class=\"q_toper_a\">");
document.writeln("	   <li><a href=\"../school_www/index.html\">吾校首页</a></li>");
document.writeln("	   <li><a href=\"../school_www/around_food.html\">校边生活</a></li>");
document.writeln("	   <li><a href=\"../school_www/stud_index.html\">学生惠</a></li>");
document.writeln("	   <li><a href=\"../school_www/exchange_index.html\">校币了没</a></li>");
document.writeln("	   <li><a href=\"index.html\">校笑吧</a></li>  ");
document.writeln("	   ");
document.writeln("	   <li class=\"rr\"><a href=\"my_index.html\">设置</a></li>");
document.writeln("	   <li class=\"rr\"><a href=\"zhuce.html\">注册</a></li>");
document.writeln("	   <li class=\"rr\"  id=\"content\"><a href=\"#\">登录</a></li>");
document.writeln("	   <li class=\"rr\"><a href=\"self_index.html\">亲，欢迎来到吾校！</a> </li>");
document.writeln("	   </ul>");
document.writeln("	   </div>");
document.writeln("   </div>");






document.writeln("<div id=\"alert\">  ");
document.writeln("<h4><span> 现在登录</span><span id=\"close\"> 关闭</span></h4>");
document.writeln("<div style=\"padding:20px;\"> ");
document.writeln("<form action=\"\" method=\"get\">");
document.writeln("<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" class=\"ttbb2\">");
document.writeln("  <tr>");
document.writeln("    <td width=\"18%\">用户名：</td>");
document.writeln("    <td colspan=\"2\"><input type=\"text\" name=\"textfield\"  class=\"txt_zhuce\"/></td>");
document.writeln("    </tr>");
document.writeln("  <tr>");
document.writeln("    <td>&nbsp;</td>");
document.writeln("    <td height=\"20\" colspan=\"2\" valign=\"top\" class=\"color_999\">例如：name_123</td>");
document.writeln("    </tr>");
document.writeln("  <tr>");
document.writeln("    <td>密 &nbsp;&nbsp;码：</td>");
document.writeln("    <td width=\"59%\"><input type=\"text\" name=\"textfield\"  class=\"txt_zhuce\"/></td>");
document.writeln("    <td width=\"23%\" class=\"a0392\"><a href=\"#\">找回密码？</a></td>");
document.writeln("  </tr>");
document.writeln("  <tr>");
document.writeln("    <td>&nbsp;</td>");
document.writeln("    <td height=\"40\" colspan=\"2\" valign=\"bottom\">");
document.writeln("      <input name=\"checkbox\" type=\"checkbox\" value=\"checkbox\" checked=\"checked\" />");
document.writeln("      记住用户&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;");
document.writeln("      ");
document.writeln("      <input type=\"checkbox\" name=\"checkbox2\" value=\"checkbox\" />");
document.writeln("      保持登录状态</td>");
document.writeln("    </tr>");
document.writeln("  <tr>");
document.writeln("    <td>&nbsp;</td>");
document.writeln("    <td height=\"50\" colspan=\"2\" valign=\"bottom\"><input type=\"submit\" name=\"Submit\" value=\"登 录\"  class=\"anniu4\"/>");
document.writeln("	&nbsp;&nbsp;&nbsp;&nbsp;<input type=\"button\" name=\"Submit\" value=\"注 册\"  class=\"anniu4\" onClick=\"window.location.href=\'zhuce.html\' \"/>");
document.writeln("	</td>");
document.writeln("    </tr>");
document.writeln("</table>");
document.writeln("</form>");
document.writeln("</div>");
document.writeln("</div>");
document.writeln("");
document.writeln("<script type=\"text/javascript\">  ");
document.writeln("var myAlert = document.getElementById(\"alert\");  ");
document.writeln("var reg = document.getElementById(\"content\").getElementsByTagName(\"a\")[0];  ");
document.writeln("var mClose = document.getElementById(\"close\");  ");
document.writeln("reg.onclick = function()  ");
document.writeln("{  ");
document.writeln("myAlert.style.display = \"block\";  ");
document.writeln("myAlert.style.position = \"absolute\";  ");
document.writeln("myAlert.style.top = \"40%\";  ");
document.writeln("myAlert.style.left = \"50%\";  ");
document.writeln("myAlert.style.marginTop = \"-75px\";  ");
document.writeln("myAlert.style.marginLeft = \"-150px\";  ");
document.writeln("  ");
document.writeln("mybg = document.createElement(\"div\");  ");
document.writeln("mybg.setAttribute(\"id\",\"mybg\");  ");
document.writeln("mybg.style.background = \"#000\";  ");
document.writeln("mybg.style.width = \"100%\";  ");
document.writeln("mybg.style.height = \"100%\";  ");
document.writeln("mybg.style.position = \"absolute\";  ");
document.writeln("mybg.style.top = \"0\";  ");
document.writeln("mybg.style.left = \"0\";  ");
document.writeln("mybg.style.zIndex = \"500\";  ");
document.writeln("mybg.style.opacity = \"0.6\";  ");
document.writeln("mybg.style.filter = \"Alpha(opacity=60)\";  ");
document.writeln("document.body.appendChild(mybg);  ");
document.writeln("document.body.style.overflow = \"hidden\";  ");
document.writeln("}  ");
document.writeln(" ");
document.writeln(" mClose.onclick = function()  ");
document.writeln("{  ");
document.writeln("myAlert.style.display = \"none\";  ");
document.writeln("mybg.style.display = \"none\";  ");
document.writeln("}  ");
document.writeln("</script>");