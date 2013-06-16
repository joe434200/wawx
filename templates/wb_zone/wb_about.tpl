{include file=wbheader.tpl}


<!--右侧-->
    <td valign="top" class="wb_ny_RR clearfix">
    
      <div class="wb_bt blue_s">TA的个人档</div>


<div class="space_personal_ny clearfix" style="height:680px;">
<div class="line">
<div class="name"><strong>youxiayuan</strong>(UID: 1137730)</div>

<div class="rz">
<ul>
<li><em>空间访问量</em>{$self.visitsum}</li>
<li><em>邮箱状态</em>{if $self.email eq ""}未验证{else}已认证{/if}</li>
<li><em>积分</em>{$self}</li>
<li><em>手机认证</em>{if $self.mobile eq ""}未认证{else}已认证{/if}</li>
</ul>
</div>


<div class="xx">
<ul>
<li><em>空间名称</em>{$self.spacename}</li>
<li><em>空间说明</em>{$self.introduction}</li>
</ul>
</div>

<div class="xx">
<ul>
<li>
    <a href="#">好友数 {$info.frsum}</a> <span class="pipe">| </span>
    <a href="#">日志数 {$info.disum}</a> <span class="pipe">| </span>
    <a href="#">照片数 {$info.phsum}</a> <span class="pipe"></span>
</ul>
</div>
</div>  

<div class="line">
<div class="xx2">
<ul>
<li><em>性别</em>{if $self.sex eq "0"}女{else}男{/if}</li>
<li><em>生日</em>{$self.birthdate}</li>
<li><em>身高</em>{$self.height}cm</li>
<li><em>体重</em>{$self.weight}kg</li>
<li><em>血型</em>{$self.bloodtype}</li>
<li><em>家乡</em>{$self.residence}</li>
</ul>
</div>
</div>  

<div class="line">
<div class="name"><strong>活跃概况</strong></div>
<div class="rz">
<ul>
<li><em>在线时间</em>{$self.onlinetime} 小时</li>
<li><em>注册时间</em>{$self.createtime}</li>
<li><em>最后访问</em>{$self.lastlogintime}</li>
<li><em>上次发表时间</em>2012-12-12 11:40</li>
<li><em>上次活动时间</em>2012-12-12 11:40</li>
<li><em>所在时区</em>(GMT +08:00) 北京</li>

</ul>
</div>
</div>






</div>





</td>
    
    
    
  </tr>
</table>
</div>


<div class="blank10"></div>


{include file=barfooter.tpl}