<?php /* Smarty version 2.6.18, created on 2013-06-02 16:47:53
         compiled from pageheader.htm */ ?>
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
<script src="./templates/scripts/jquery-1.6.3.js" type="text/javascript"></script>

<script src="./templates/scripts/backstage/common.js" type="text/javascript"></script>
<script src="./templates/scripts/backstage/wpCalendar.js" type="text/javascript"></script> 
<script src="./templates/scripts/backstage/validator.js" type="text/javascript"></script> 
<script src="./templates/pagesplit/backpage.js" type="text/javascript"></script>
<script src="./templates/scripts/self_zone.js" type="text/javascript"></script>
</head>
<body>







<h1>
<?php if ($this->_tpl_vars['action_link']): ?>
 <?php $_from = $this->_tpl_vars['action_link']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
<span class="action-span"><a href="<?php echo $this->_tpl_vars['item']['href']; ?>
"><?php echo $this->_tpl_vars['item']['text']; ?>
</a></span>
<?php endforeach; endif; unset($_from); ?>
<?php endif; ?>
<span class="action-span1"><a href="<?php echo $this->_tpl_vars['backstagehome']['href']; ?>
"><?php echo $this->_tpl_vars['backstagehome']['text']; ?>
</a> </span><span id="search_id" class="action-span1"> <?php if ($this->_tpl_vars['url_here']): ?> - <?php echo $this->_tpl_vars['url_here']; ?>
 <?php endif; ?> </span>
<div style="clear:both"></div>
</h1>