{include file=userheader.tpl}
<div class="my_right clearfix">
   
   <div class="my_overview clearfix">
     <div class="my_overview_a clearfix">
     <p class="my_avatar"><img src="{$self.photo}" /></p>
     <ul class="my_info">
     <li><a href="#">{if $self.nickname neq ""}{$self.nickname}{else}{$self.email}{/if}</a>&nbsp;  |&nbsp;  <a href="#">{if $self.schoolname neq ""}{$self.schoolname}{else}尚未填写{/if}</a></li>
     <li>等&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;级：{$self.level}级</li>
     <li>注册时间：{$self.createtime}</li>
     <li>上次登录：{$self.lastlogintime}</li>
     <li>登录次数：{$self.logintimes}</li>
     </ul>
	 
	 <ul class="my_info">
     <li>注册手机：{if $self.bindmobile neq ""}<a href="#">{$self.bindmobile}</a>{else} <img src="./templates/images/schoolbar/tel.gif" />未验证{/if}</li>
     <li>消费积分：<span class="af30" style="font-size:14px;"><strong>{$self.consumcoins}积分</strong></span> &nbsp;&nbsp; <span class="af30"><a href="#">积分卡充值</a></span></li>
     <li>校吧积分：<span class="af30" style="font-size:14px;"><strong>{$self.forumcoins}积分</strong></span></li>
     <li>总积分：<span class="af30"><strong>{$self.coins}积分</strong></span></li>
     <li><a href="#"><img src="./templates/images/schoolbar/my_jf.gif" border="0" /></a>&nbsp;&nbsp;已领取{$self.timescoins}次</li>
     </ul>
     </div>
   </div>
   
   
   
   <div class="my_detailed clearfix">
   <ul>
   <li>你获得的勋章：小灰灰(假数据)<span></span></li>
   <li>评论条数：<span>我给别人的评论 0条(假数据)</span></li>
   <li>空间访客数：<span>{$self.visitsum} 人</span></li>
   <li>照片张数：<span>{$info.phsum} 张</span></li>
   <li>日记篇数：<span>{$info.disum} 篇</span></li>
   <li>添加好友：<span>{$info.frsum} 人</span></li>
   <li>发帖总数：<span>{$info.tpsum} 次</span></li>
   <li>求职总数：<span>0(假数据) 个岗位</span></li>
   </ul>
   </div>
   
   </div>
   
   </div>
   </div>
   </div>
   
 
   <div class="blank10"></div>
   </div>




{include file=barfooter.tpl}