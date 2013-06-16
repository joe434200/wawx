<?php /* Smarty version 2.6.18, created on 2013-06-07 12:20:25
         compiled from hd/hd_new.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "barheader.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<script src="./templates/scripts/prototype.js" type="text/javascript"></script>
<?php echo '
<script type="text/javascript">
function uplode_file()
{
	document.getElementById("picPath").click();
}
</script>

<script type="text/javascript" src="./templates/scripts/date/jquery-1.5.1.js"></script>
    <link href="./plugin/date2/lyz.calendar.css" rel="stylesheet" type="text/css" />
    <script src="./templates/scripts/date/lyz.calendar.min.js" type="text/javascript"></script>
    <style>
        body
        {
            font-size: 12px;
            font-family: "微软雅黑" , "宋体" , "Arial Narrow";
        }
    </style>
    <script>
        $(function () {
            $("#txtBeginDate").calendar({
                controlId: "divDate",                                       // 弹出的日期控件ID，默认: $(this).attr("id") + "Calendar"
                speed: 200,                                                 // 三种预定速度之一的字符串("slow", "normal", or "fast")或表示动画时长的毫秒数值(如：1000),默认：200
                complement: true,                                           // 是否显示日期或年空白处的前后月的补充,默认：true
                readonly: true,                                             // 目标对象是否设为只读，默认：true
                //upperLimit: ,                                          // 日期上限，默认：NaN(不限制)
                lowerLimit: new Date(),                         // 日期下限，默认：NaN(不限制)
                callback: function () {                                     // 点击选择日期后的回调函数
                   // alert("您选择的日期是：" + $("#txtBeginDate").val());
                }
            });
			
            $("#txtEndDate").calendar({
            	lowerLimit: new Date()
                });
        });
    </script>
'; ?>

<div class="backbj clearfix" >

	
     
   <div class="blank10"></div>
   
   <div class="box4">
   <div class="case_ll clearfix">
   
   <div class="regist" style="float:left;">
  <form action="hd.php?module=saveNext" method="post" name="hd_new" id="hd_new">
 
  <input type="hidden" name="originator" value=<?php echo $this->_tpl_vars['code_rand']['code']; ?>
></input>
  <h3>发布活动</h3>
  <div class="blank20"></div>
  <div class="my_step"> 请填写活动信息</div>

  
  <div class="blank20"></div>

  
  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="ttbb4">
  <tr>
    <td width="17%" align="right"><span class="cl_f30">*</span> 活动标题：</td>
    <td width="49%"><input type="text" name="act[actname]" id="actname"  class="my_txt_350" /></td>
	<td width="34%" rowspan="7" align="center" valign="top">
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
	

   
</table>
	
	</tr>
  <tr>
    <td align="right"><span class="cl_f30">*</span> 活动类型：</td>
    <td><select name="act[idm_act_catalog]" id="idm_act_catalog" onchange="javascript:AjaxGetSecAct(this)">
    <?php $_from = $this->_tpl_vars['parent']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
    <option value="<?php echo $this->_tpl_vars['item']['ID']; ?>
"><?php echo $this->_tpl_vars['item']['name']; ?>
</option>
    <?php endforeach; endif; unset($_from); ?>
    </select>
    <select name="selSec" id="selSec">
    <?php $_from = $this->_tpl_vars['parent'][0]['sec']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
    <option value="<?php echo $this->_tpl_vars['item']['ID']; ?>
"><?php echo $this->_tpl_vars['item']['name']; ?>
</option>
    <?php endforeach; endif; unset($_from); ?>
    </select></td>
    </tr>
  <tr>
    <td align="right"><span class="cl_f30">*</span> 开始时间：</td>
    <td><input type="text" name="act[begintime]" id="txtBeginDate" class=""/></td>
    </tr>
  <tr>
    <td align="right"><span class="cl_f30">*</span> 截止时间：</td>
    <td><input type="text" name="act[endtime]" id="txtEndDate" class=""/></td>
    </tr>
    <tr>
    <td align="right"><span class="cl_f30">*</span> 活动地点：</td>
    <td><select name="place[]" id="place_parent" >
    <?php $_from = $this->_tpl_vars['place_parent']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
    <option value="<?php echo $this->_tpl_vars['item']['ID']; ?>
"><?php echo $this->_tpl_vars['item']['name']; ?>
</option>
    <?php endforeach; endif; unset($_from); ?>
    </select>
    <select name="place[]" id="place_son" onclick="javascript:AjaxGetplace(this)">
    <?php $_from = $this->_tpl_vars['place_parent'][0]['a']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
    <option value="<?php echo $this->_tpl_vars['item']['ID']; ?>
"><?php echo $this->_tpl_vars['item']['name']; ?>
</option>
    <?php endforeach; endif; unset($_from); ?>
    </select>
    <select name="place[]" id="place_son1" onclick="javascript:AjaxGetplace1(this)">
    <?php $_from = $this->_tpl_vars['place_parent'][0]['b']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
    <option value="<?php echo $this->_tpl_vars['item']['ID']; ?>
"><?php echo $this->_tpl_vars['item']['name']; ?>
</option>
    <?php endforeach; endif; unset($_from); ?>
    </select>
    <select name="place[]" id="place_son2" >
    <?php $_from = $this->_tpl_vars['place_parent'][0]['c']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
    <option value="<?php echo $this->_tpl_vars['item']['ID']; ?>
"><?php echo $this->_tpl_vars['item']['name']; ?>
</option>
    <?php endforeach; endif; unset($_from); ?>
    </select></td>
    </tr>
	 <tr>
    <td align="right"><span class="cl_f30">*</span> 活动费用：</td>
    <td><span><input type="text" name="act[cost]" id="cost" class=""/>元/人<input type="checkbox" id="free" name="free" onclick="javascript:setText(this)">免费</span></td>
    </tr>
  <tr>
    <td align="right" valign="top"><span class="cl_f30">*</span> 活动内容：</td>
    <td><textarea name="act[content]" id="content" rows="8" class="my_txt_350"></textarea></td>
    </tr>
  <tr>
    <td align="right" valign="top"><span class="cl_f30">*</span> 参与权限：</td>
    <td><input type="checkbox" name="right[]" id="checkboxA" value="A"/>仅本校同学可以参与 （本校活动，可选择此项）<br />
    <input type="checkbox" name="right[]" id="checkboxB" value="B"/> 参与者需提交报名表 （非活动特殊要求，建议不选此项）<br />
    <input type="checkbox" name="right[]" id="checkboxC" value="C"/>是否需要审核 
    <input type="hidden" name="checkbox_value" id="checkbox_value">
    </td>
    </tr>
  <tr>
    <td align="right">&nbsp;</td>
    <td height="50"><input type="button" name="button" id="button" value="下一步"  class="my_ann1"  onClick="javascript:check_time()" /><p id="alert"></p></td>
    </tr>
  </table>
  </form>
  
  
  
  
  
  <div class="blank20"></div>
  </div>
   
   </div>
   </div>
   <div class="blank20"></div>
   </div>
  
<script type="text/javascript" src="./templates/scripts/hd.js"></script>
 <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "barfooter.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>