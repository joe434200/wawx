<?php /* Smarty version 2.6.18, created on 2013-06-02 17:02:41
         compiled from selector/index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'selector/index.tpl', 56, false),)), $this); ?>
<!-- $Id: ads_list.htm 14216 2008-03-10 02:27:21Z testyang $ -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="robots" content="noindex, nofollow"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $this->_tpl_vars['backstagehome']['text']; ?>
 <?php if ($this->_tpl_vars['url_here']): ?> - <?php echo $this->_tpl_vars['url_here']; ?>
 <?php endif; ?></title>


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
     <?php $_from = $this->_tpl_vars['fields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
    <th><?php echo $this->_tpl_vars['item']['showname']; ?>
</th>
    <?php endforeach; endif; unset($_from); ?>

  </tr>
  <?php if (count($this->_tpl_vars['data']) == 0): ?>
      <tr><td class="no-records" colspan="15">系统还没有数据</td></tr>
  <?php else: ?>
 <?php $_from = $this->_tpl_vars['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
  <tr>
   <td><?php echo $this->_tpl_vars['key']+1; ?>
</td>
   <td><input  type="radio"  name="radio_s" id="<?php echo $this->_tpl_vars['item'][$this->_tpl_vars['hiddenfield']]; ?>
" value=<?php echo $this->_tpl_vars['item'][$this->_tpl_vars['showfield']]; ?>
 <?php if ($this->_tpl_vars['key'] == '0'): ?>checked<?php endif; ?>//></td>
     <?php $_from = $this->_tpl_vars['fields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['index'] => $this->_tpl_vars['item1']):
?>
    <td><?php echo $this->_tpl_vars['item'][$this->_tpl_vars['item1']['key']]; ?>
</td>
    <?php endforeach; endif; unset($_from); ?>
   
         
  </tr>
  <?php endforeach; endif; unset($_from); ?>
  <?php endif; ?>
      
      
      
      
      
    <tr>
    <td align="right"  colspan="15">      
     
     
<div class="num">
<div class="num_pg">

<script type="text/javascript">
    var pg1 = new showPages('pg1');
	pg1.pageCount = '<?php echo $this->_tpl_vars['pagecount']; ?>
';
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

