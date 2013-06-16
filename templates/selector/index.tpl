<!-- $Id: ads_list.htm 14216 2008-03-10 02:27:21Z testyang $ -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="robots" content="noindex, nofollow"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>{$backstagehome.text} {if $url_here} - {$url_here} {/if}</title>


<link href="./templates/css/backstage/general.css" rel="stylesheet" type="text/css" />
<link href="./templates/css/backstage/main.css" rel="stylesheet" type="text/css" />
<link href="./templates/pagesplit/page.css" rel="stylesheet" type="text/css" />
<link href="./templates/scripts/My97DatePicker/skin/WdatePicker.css" rel="stylesheet" type="text/css" />

<script src="./templates/scripts/prototype.js" type="text/javascript"></script>
<script src="./templates/scripts/front.js" type="text/javascript"></script>
<script src="./templates/scripts/validate.js" type="text/javascript"></script>


<script src="./templates/scripts/backstage/common.js" type="text/javascript"></script>





<script src="./templates/scripts/backstage/wpCalendar.js" type="text/javascript"></script> 

<script src="./templates/scripts/backstage/validator.js" type="text/javascript"></script> 

<script src="./templates/pagesplit/backpage.js" type="text/javascript"></script>

</head>
<body>

<h1>

<span class="action-span1"><a href="#">数据选择</a> </span>
<div style="clear:both">&nbsp;</div>
</h1>





<!-- start ads list -->
<div class="list-div" id="listDiv">
<table cellpadding="3" cellspacing="1">
  <tr>
   <th>序号</th>
   <th>选择</th>
     {foreach from=$fields item=item key=key}
    <th>{$item.showname}</th>
    {/foreach}

  </tr>
  {if $data|@count eq 0}
      <tr><td class="no-records" colspan="15">系统还没有数据</td></tr>
  {else}
 {foreach from=$data item=item key=key}
  <tr>
   <td>{$key+1}</td>
   <td><input  type="radio"  name="radio_s" id="{$item[$hiddenfield]}" value={$item[$showfield]} {if $key eq '0'}checked{/if}//></td>
     {foreach from=$fields item=item1 key=index}
    <td>{$item[$item1.key]}</td>
    {/foreach}
   
         
  </tr>
  {/foreach}
  {/if}
      
      
      
      
      
    <tr>
    <td align="right"  colspan="15">      
     
     
<div class="num">
<div class="num_pg">

<script type="text/javascript">
    var pg1 = new showPages('pg1');
	pg1.pageCount = '{$pagecount}';
	pg1.argName = 'p';
	pg1.printHtml();
</script>
</div>
</div>
      
      
</td>
  </tr>
 
</table>

</div>
<script src="./templates/scripts/selector.js" type="text/javascript"></script>
<div align="center"><input type="button"  class="button" value="选择"  onclick="javascript:selectback();"/><input type="button"  class="button" value="关闭"  onclick="javascript:self.close();"/></div>
<!-- end ad_position list -->

</body>
</html>


