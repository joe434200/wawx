{include file=userheader.tpl}
{literal}
<style>
</style>
{/literal}


<div class="my_right clearfix">
   <div class="my_data clearfix">
   <h3>我的订单</h3>
   </div>
   
   <div class="my_order clearfix">
  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="ttbb6">
  <tr><td>&nbsp;</td></tr>

  <tr>
    <th width="5%" align="center" bgcolor="#f7f7f7">NO.</th>
    <th width="7%" align="center" bgcolor="#f7f7f7">&nbsp;</th>
    <th width="23%" align="left" bgcolor="#f7f7f7">订单编号</th>
    <th width="15%" align="center" bgcolor="#f7f7f7">价格</th>
    <th width="14%" align="center" bgcolor="#f7f7f7">购买时间</th>
    <th width="13%" align="center" bgcolor="#f7f7f7">状态</th>
    <th width="23%" align="center" bgcolor="#f7f7f7">操作</th>
  </tr>
  <tr><td>&nbsp;</td></tr>
  </table>
  
  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="ttbb6" id="GetOrder">
  {if $info.info|@count neq 0}
  {foreach from=$info.info item=item key=key}
	<tr>
    <td width="5%" align="center">{$key+1}</td>
    <td width="7%" align="center"><img src="./templates/images/schoolbar/10.jpg" width="50" height="50" /></td>
    <td width="23%" class="size12"><a href="#">{$item.orno}</a></td>
    <td width="15%" align="center">￥{$item.total}</td>
    <td width="14%" align="center">{$item.time}</td>
    <td width="13%" align="center">{$item.status}</td>
    {if $item.status eq 0}
    <td width="23%" align="center"><a href="javascript:void(0)" onclick="javascript:userCancelOrder('{$item.ID}')" title="取消当前的订单">取消订单</a></td>
    {elseif $item.status eq 2}
    <td width="23%" align="center"><a href="javascript:void(0)" onclick="javascript:userConfirmOrder('{$item.ID}')" title="向商家申请退货">确认收货</a>&nbsp;<a href="javascript:void(0)" onclick="javascript:userApplyReback('{$item.ID}')" title="向商家申请退货">申请退货</a></td>
    {else}
    <td width="23%" align="center"><a>无</a></td>
    {/if}
   </tr>
   <tr><td>&nbsp;</td></tr>
  {/foreach}
  {else}
  <tr><td colspan="5">&nbsp;</td></tr>
  {/if}
  </table>
    </div>
    
    
    <div class="album_page" id="pageFooter">
   {if $info.info|@count neq 0}
		{if $info.base.pageCounts eq '1'}
		<a>1</a>
		{else}
		    {if $info.base.page eq '1'}
		    <a href="javascript:void(0)" class="pageFooterStyle"><strong>上一页</strong></a>
		    {else}
		    <a  href="javascript:void(0)" onclick="javascript:AjaxGetUserOrder('{$info.base.page-1}')">上一页</a>
		    {/if}
		    {section name=loop loop=$info.base.pageCounts}
		    	{if $info.base.page eq $smarty.section.loop.index+1}
		    	&nbsp;<a href="javascript:void(0)" class="pageFooterStyle"><strong>{$smarty.section.loop.index+1}</strong></a>
		    	{else}
		    	&nbsp;<a href="javascript:void(0)" onclick="javascript:AjaxGetUserOrder('{$smarty.section.loop.index+1}')">{$smarty.section.loop.index+1}</a>
		    	{/if}
		    {/section}
			{if $info.base.page eq $reply.base.pageCounts}
			&nbsp;<a class="pageFooterStyle"><strong>下一页</strong></a>
			{else}
			&nbsp;<a  href="javascript:void(0)" onclick="javascript:AjaxGetUserOrder('{$info.base.page+1}')">下一页</a>
			{/if}
		{/if}
	{/if}
   
   </div>
   
   
   
   
   </div>
   
   </div>
   </div>
   </div>
   
 
   <div class="blank10"></div>
   </div>



{include file=barfooter.tpl}