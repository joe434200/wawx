{include file=userheader.tpl}
 

<div class="my_right clearfix">
   
   <div class="my_data clearfix">
   <ul class="my_data_tag">
   <li ><a href="userCenter.php?module=dataModify">基本资料</a></li>
   <li class="sel"><a href="userCenter.php?module=dataFriend">交友资料</a></li>
   <li><a href="userCenter.php?module=dataHobby">兴趣爱好</a></li>
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
   <form action="UserCenterHandler.php?module=dataFriend" method="post">
   <p class="prompt">完善你的交友信息，让TA能更容易的在人群中找到你！ </p>
   <table width="100%" border="0" cellspacing="0" cellpadding="0" class="ttbb1">
  <tr>
    <td width="13%">恋爱情况：</td>
    <td width="87%">
    <select name="self[lovecondition]" id="select5">
      <option value="1" {if $self.lovecondition eq "1"}selected{/if}>单身</option>
	  <option value="2" {if $self.lovecondition eq "2"}selected{/if}>热恋中</option>
    </select>
    </td>
    </tr>
  <tr>
    <td>寻找对象： </td>
    <td><input type="radio" name="self[wondertype]" value="1" {if $self.wondertype eq "1"}checked{/if}/>异性好友&nbsp;&nbsp;&nbsp;
	<input type="radio" name="self[wondertype]" value="2" {if $self.wondertype eq "2"}checked{/if}/>同性好友&nbsp;&nbsp;&nbsp;
	<input type="radio" name="self[wondertype]" value="3" {if $self.wondertype eq "3"}checked{/if}/>学习好友&nbsp;&nbsp;&nbsp;
	<input type="radio" name="self[wondertype]" value="4" {if $self.wondertype eq "4"}checked{/if}/>兴趣好友</td>
    </tr>
  <tr>
    <td>交友宣言： </td>
    <td><input type="text" name="self[frienddeclaretion]" id="textfield52"  class="my_txt_350" value="{$self.frienddeclaretion}"/></td>
    </tr>
<tr>
    <td>自我介绍： </td>
    <td><input type="text" name="self[selfintroduction]" id="textfield52"  class="my_txt_350" value="{$self.selfintroduction}"/></td>
    </tr>
  <tr>
    <td>爱情观：</td>
    <td><input type="text" name="self[loveview]" id="textfield522"  class="my_txt_350" value="{$self.loveview}"/></td>
    </tr>
  <tr>
    <td>我的性格： </td>
    <td><input type="text" name="self[selfcharacter]" id="textfield5222"  class="my_txt_350" value="{$self.selfcharacter}"/></td>
    </tr>
	<tr>
    <td>我的体形：</td>
    <td><input type="text" name="self[bodyshape]" id="textfield522"  class="my_txt_350" value="{$self.bodyshape}"/></td>
    </tr>
  <tr>
    <td>交友目的： </td>
    <td><input type="text" name="self[friendpurpose]" id="textfield5222"  class="my_txt_350" value="{$self.friendpurpose}"/></td>
    </tr>
	<tr>
    <td>交友要求：</td>
    <td><textarea cols="" rows="5" class="my_txt_350" name="self[friendrequest]">{$self.friendrequest}</textarea></td>
    </tr>
</table>
<p class="prompt">你希望对方是：</p>

<table width="100%" border="0" cellspacing="0" cellpadding="0" class="ttbb1">
  <tr>
    <td width="13%">形象：</td>
    <td width="59%"><input type="text" name="self[friendfigure]" id="textfield5"  class="my_txt_350" value="{$self.friendfigure}"/></td>
    <td width="28%">&nbsp;</td>
  </tr>
  <tr>
    <td>生活习惯： </td>
    <td><input type="text" name="self[friendhabit]" id="textfield6"  class="my_txt_350" value="{$self.friendhabit}"/></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>体型：</td>
    <td><input type="text" name="self[friendshape]" id="textfield7"  class="my_txt_350" value="{$self.friendshape}"/></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>不喜欢： </td>
    <td><input type="text" name="self[frienddislike]" id="textfield8"  class="my_txt_350" value="{$self.frienddislike}"/></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>最看重： </td>
    <td><input type="text" name="self[friendimportance]" id="textfield8"  class="my_txt_350" value="{$self.friendimportance}"/></td>
    <td>&nbsp;</td>
  </tr>
</table>
<p class="top20"><input type="submit" name="button" id="button" value="保存进入下一步"  class="my_ann1"/></p>
</form>
   </div>
   
   </div>
   
   </div>
   </div>
   </div>
   
 
   <div class="blank10"></div>
   </div>
  




{include file=barfooter.tpl}