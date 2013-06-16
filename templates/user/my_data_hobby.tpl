{include file=userheader.tpl}


<div class="my_right clearfix">
   
   <div class="my_data clearfix">
   <ul class="my_data_tag">
   <li ><a href="userCenter.php?module=dataModify">基本资料</a></li>
   <li><a href="userCenter.php?module=dataFriend">交友资料</a></li>
   <li class="sel"><a href="userCenter.php?module=dataHobby">兴趣爱好</a></li>
   </ul>
   
   <div class="my_jindu_x">
   <h3>资料完善度</h3>
   <div class="my_jindu">
   <p class="bar" style="width:60px;"></p>
   </div>
   <h3>30%</h3>
   </div>
   
   </div>
   
   
   <div class="my_data_tb clearfix">
   <form action="UserCenterHandler.php?module=dataHobby" method="post">
   <p class="prompt">生活多姿多彩，看看酷友们是否和你的兴趣一样呢</p>
   <table width="100%" border="0" cellspacing="0" cellpadding="0" class="ttbb1">
  <tr>
    <td width="15%">加入的社团： </td>
    <td width="85%"><input type="text" name="self[societyenroll]" id="textfield52"  class="my_txt_350" value="{$self.societyenroll}"/></td>
    </tr>
<tr>
    <td>您喜欢的游戏： </td>
    <td><input type="text" name="self[gamelike]" id="textfield52"  class="my_txt_350" value="{$self.gamelike}"/></td>
    </tr>
  <tr>
    <td>准备过的考试：</td>
    <td><input type="text" name="self[goneplace]" id="textfield522"  class="my_txt_350" value="{$self.goneplace}"/></td>
    </tr>
  <tr>
    <td>准备去的地方： </td>
    <td><input type="text" name="self[goingplace]" id="textfield5222"  class="my_txt_350" value="{$self.goingplace}"/></td>
    </tr>
	<tr>
    <td>喜欢的明星：</td>
    <td><input type="text" name="self[starlike]" id="textfield522"  class="my_txt_350" value="{$self.starlike}"/></td>
    </tr>
    <tr>
    <td>喜欢的影视： </td>
    <td><input type="text" name="self[movielike]" id="textfield5222"  class="my_txt_350" value="{$self.movielike}"/></td>
    </tr>
	<tr>
    <td>喜欢的歌曲：</td>
    <td><input type="text" name="self[songlike]" id="textfield522"  class="my_txt_350" value="{$self.songlike}"/></td>
    </tr>
    <tr>
    <td>喜欢的书籍： </td>
    <td><input type="text" name="self[booklike]" id="textfield5222"  class="my_txt_350" value="{$self.booklike}"/></td>
    </tr>
	<tr>
    <td>喜欢的运动：</td>
    <td><input type="text" name="self[sportlike]" id="textfield522"  class="my_txt_350" value="{$self.sportlike}"/></td>
    </tr>
    <tr>
    <td>喜欢的食物： </td>
    <td><input type="text" name="self[foodlike]" id="textfield5222"  class="my_txt_350" value="{$self.foodlike}"/></td>
    </tr>
	<tr>
    <td>喜欢的动物： </td>
    <td><input type="text" name="self[animallike]" id="textfield5222"  class="my_txt_350" value="{$self.animallike}"/></td>
    </tr>
</table>

<p class="top20"><input type="submit" name="button" id="button" value="完成"  class="my_ann1"/></p>
</form>
   </div>
   
   </div>
   
   </div>
   </div>
   </div>
   
 
   <div class="blank10"></div>
   </div>
  


{include file=barfooter.tpl}