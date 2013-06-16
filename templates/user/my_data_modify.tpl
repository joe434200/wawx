{include file=userheader.tpl}


<div class="my_right clearfix">
   
   <div class="my_data clearfix">
   <ul class="my_data_tag">
   <li class="sel"><a href="userCenter.php?module=dataModify">基本资料</a></li>
   <li><a href="userCenter.php?module=dataFriend">交友资料</a></li>
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
   <form action="UserCenterHandler.php?module=dataModify" method="post">
   <table width="100%" border="0" cellspacing="0" cellpadding="0" class="ttbb1">
  <tr>
    <td width="8%">性别：</td>
    <td width="38%">{if $self.sex eq "0"}女{else}男{/if}</td>
    <td width="54%">&nbsp;</td>
  </tr>
  <tr>
    <td>学校： </td>
    <td>{if $self.schoolname neq ""}{$self.schoolname}{else}尚未填写{/if} </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>身高： </td>
    <td><input type="text" name="self[height]" id="textfield"  class="my_txt_80" value="{$self.height}"/>cm</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>体重：</td>
    <td><input type="text" name="self[weight]" id="textfield2"  class="my_txt_80" value="{$self.weight}"/>kg</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>民族： </td>
    <td><select name="self[nation]" id="select">
      <option value="1" {if $self.nation eq "1"}selected{/if}>汉族</option>
      <option value="2" {if $self.nation eq "2"}selected{/if}>少数民族</option>
      </select></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>血型：</td>
    <td><select name="self[bloodtype]" id="select2">
      <option value="A" {if $self.bloodtype eq "A"}selected{/if}>A</option>
      <option value="B" {if $self.bloodtype eq "B"}selected{/if}>B</option>
      <option value="O" {if $self.bloodtype eq "C"}selected{/if}>O</option>
      <option value="AB" {if $self.bloodtype eq "AB"}selected{/if}>AB</option>
    </select></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>生日： </td>
    <td><input type="text" name="self[birthdate]" id="textfield3"  class="my_txt_120" value="{$self.birthdate}"/></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>星座：</td>
    <td>
    <select name="self[constellation]" id="select">
      <option value="1" {if $self.constellation eq "1"}selected{/if}>白羊座</option>
      <option value="2" {if $self.constellation eq "2"}selected{/if}>金牛座</option>
      <option value="3" {if $self.constellation eq "3"}selected{/if}>双子座</option>
      <option value="4" {if $self.constellation eq "4"}selected{/if}>巨蟹座</option>
      <option value="5" {if $self.constellation eq "5"}selected{/if}>狮子座</option>
      <option value="6" {if $self.constellation eq "6"}selected{/if}>处女座</option>
      <option value="7" {if $self.constellation eq "7"}selected{/if}>天秤座</option>
      <option value="8" {if $self.constellation eq "8"}selected{/if}>天蝎座</option>
      <option value="9" {if $self.constellation eq "9"}selected{/if}>人马座</option>
      <option value="10" {if $self.constellation eq "10"}selected{/if}>魔蝎座</option>
      <option value="11" {if $self.constellation eq "11"}selected{/if}>水瓶座</option>
      <option value="12" {if $self.constellation eq "12"}selected{/if}>双鱼座</option>     
      </select>
    </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>家乡：</td>
    <td><select name="select3" id="select3">
      <option value="1">辽宁</option>
    </select>
      <select name="select4" id="select4">
        <option value="1">大连</option>
      </select></td>
    <td>&nbsp;</td>
  </tr>
</table>
<p class="prompt">以下信息为隐私保护信息，当你不公开时其他用户不可见 </p>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="ttbb1">
  <tr>
    <td width="8%">地址：</td>
    <td width="64%"><input type="text" name="self[residence]" id="textfield5"  class="my_txt_350" value="{$self.residence}"/></td>
    <td width="28%">&nbsp;</td>
  </tr>
  <tr>
    <td>QQ： </td>
    <td><input type="text" name="self[qqnumber]" id="textfield6"  class="my_txt_350" value="{$self.qqnumber}"/></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>邮箱：</td>
    <td><input type="text" name="self[email]" id="textfield7"  class="my_txt_350" value="{$self.email}"/></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>手机： </td>
    <td><input type="text" name="self[bindmobile]" id="textfield8"  class="my_txt_350" value="{$self.bindmobile}"/></td>
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