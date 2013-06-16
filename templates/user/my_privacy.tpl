{include file=userheader.tpl}



<div class="my_right clearfix">
  
   <div class="my_data_privacy clearfix">
   <h3 class="bottom20">隐私设置</h3>
<form action="UserCenterHandler.php?module=privacy" method="post">
   <table width="100%" border="0" cellspacing="0" cellpadding="0" class="ttbb1 bor_bot4">
  <tr>
    <td width="14%"><strong>基本资料：</strong></td>
    <td width="15%">真实姓名：</td>
    <td width="71%">
      <select name="self[isvisiblename]">
        <option value="0" {if $self.isvisiblename eq "0"}selected{/if}>仅自己</option>
      <option value="1" {if $self.isvisiblename eq "1"}selected{/if}>仅所有好友</option>
      <option value="2" {if $self.isvisiblename eq "2"}selected{/if}>所有人</option>
      </select>
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>出生日期：</td>
    <td><select name="self[isvisiblebirth]">
      <option value="0" {if $self.isvisiblebirth eq "0"}selected{/if}>仅自己</option>
      <option value="1" {if $self.isvisiblebirth eq "1"}selected{/if}>仅所有好友</option>
      <option value="2" {if $self.isvisiblebirth eq "2"}selected{/if}>所有人</option>
    </select></td>
  </tr>
</table>


<table width="100%" border="0" cellspacing="0" cellpadding="0" class="ttbb1 bor_bot4">
  <tr>
    <td width="14%"><strong>联系方式：</strong></td>
    <td width="15%">QQ ：</td>
    <td width="71%">
      <select name="self[isvisibleqq]">
        <option value="0" {if $self.isvisibleqq eq "0"}selected{/if}>仅自己</option>
      <option value="1" {if $self.isvisibleqq eq "1"}selected{/if}>仅所有好友</option>
      <option value="2" {if $self.isvisibleqq eq "2"}selected{/if}>所有人</option>
      </select>
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>手机：</td>
    <td><select name="self[isvisiblemobile]">
      <option value="0" {if $self.isvisiblemobile eq "0"}selected{/if}>仅自己</option>
      <option value="1" {if $self.isvisiblemobile eq "1"}selected{/if}>仅所有好友</option>
      <option value="2" {if $self.isvisiblemobile eq "2"}selected{/if}>所有人</option>
    </select></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>邮箱：</td>
    <td><select name="self[isvisiblemail]">
      <option value="0" {if $self.isvisiblemail eq "0"}selected{/if}>仅自己</option>
      <option value="1" {if $self.isvisiblemail eq "1"}selected{/if}>仅所有好友</option>
      <option value="2" {if $self.isvisiblemail eq "2"}selected{/if}>所有人</option>
    </select></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>现居住地：</td>
    <td><select name="self[isvisibleresid]">
      <option value="0" {if $self.isvisibleresid eq "0"}selected{/if}>仅自己</option>
      <option value="1" {if $self.isvisibleresid eq "1"}selected{/if}>仅所有好友</option>
      <option value="2" {if $self.isvisibleresid eq "2"}selected{/if}>所有人</option>
    </select></td>
  </tr>
</table>


<table width="100%" border="0" cellspacing="0" cellpadding="0" class="ttbb1">
  <tr>
    <td width="14%"><strong>其它：</strong></td>
    <td width="15%"><strong>交友资料：</strong></td>
    <td width="71%">
      <select name="self[isvisiblefriendinfo]">
        <option value="0" {if $self.isvisiblefriendinfo eq "0"}selected{/if}>仅自己</option>
      <option value="1" {if $self.isvisiblefriendinfo eq "1"}selected{/if}>仅所有好友</option>
      <option value="2" {if $self.isvisiblefriendinfo eq "2"}selected{/if}>所有人</option>
      </select>    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><strong>个人兴趣：</strong></td>
    <td><select name="self[isvisibleinst]">
      <option value="0" {if $self.isvisibleinst eq "0"}selected{/if}>仅自己</option>
      <option value="1" {if $self.isvisibleinst eq "1"}selected{/if}>仅所有好友</option>
      <option value="2" {if $self.isvisibleinst eq "2"}selected{/if}>所有人</option>
    </select></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><dl>
      <dt><strong>空间隐私设置：</strong></dt>
    </dl>    </td>
    <td><select name="self[isvisiblespace]">
      <option value="0" {if $self.isvisiblespace eq "0"}selected{/if}>仅自己</option>
      <option value="1" {if $self.isvisiblespace eq "1"}selected{/if}>仅所有好友</option>
      <option value="2" {if $self.isvisiblespace eq "2"}selected{/if}>所有人</option>
    </select></td>
  </tr>
</table>

<table>
<tr>
<td>&nbsp;</td>
</tr>
<tr>
<tr>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td align="right"><p class="top20"><input type="submit" name="button" id="button" value="完成"  class="my_ann1"/></p></td>
</tr>
</table>

</form>

   </div>
   
   </div>
   
   </div>
   </div>
   </div>
   
 
   <div class="blank10"></div>
   </div>

{include file=barfooter.tpl}