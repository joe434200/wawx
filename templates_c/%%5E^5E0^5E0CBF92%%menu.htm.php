<?php /* Smarty version 2.6.18, created on 2013-06-02 16:47:51
         compiled from backstage/menu.htm */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>ECSHOP Menu</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="./templates/css/backstage/general.css" rel="stylesheet" type="text/css" />
<link href="./templates/css/backstage/menu.css" rel="stylesheet" type="text/css" />


</head>
<body>
<div id="tabbar-div">
<p><span style="float:right; padding: 3px 5px;" ><a href="javascript:toggleCollapse();"><img id="toggleImg" src="./templates/images/backstage/menu_minus.gif" width="9" height="9" border="0" alt="闭合" /></a></span>
  <span class="tab-front" id="menu-tab">菜单</span>
</p>
</div>
<div id="main-div">
<div id="menu-list">
<ul id="menu-ul">


<?php $_from = $this->_tpl_vars['menus']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
  <li class="explode" key="<?php echo $this->_tpl_vars['item']['head']['modulekey']; ?>
" name="menu">
    <?php echo $this->_tpl_vars['item']['head']['modulename']; ?>
        <ul>
          <?php $_from = $this->_tpl_vars['item']['child']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key1'] => $this->_tpl_vars['item1']):
?>
          <li class="menu-item"><a href="<?php echo $this->_tpl_vars['item1']['moduleurl']; ?>
" target="main-frame"><?php echo $this->_tpl_vars['item1']['modulename']; ?>
</a></li>
          <?php endforeach; endif; unset($_from); ?>
          <!-- 
          <li class="menu-item"><a href="goods.php?act=list" target="main-frame">商品列表</a></li>
          <li class="menu-item"><a href="goods.php?act=add" target="main-frame">添加新商品</a></li>
          <li class="menu-item"><a href="category.php?act=list" target="main-frame">商品分类</a></li>
          <li class="menu-item"><a href="comment_manage.php?act=list" target="main-frame">用户评论</a></li>
          <li class="menu-item"><a href="brand.php?act=list" target="main-frame">商品品牌</a></li>
          <li class="menu-item"><a href="goods_type.php?act=manage" target="main-frame">商品类型</a></li>
          <li class="menu-item"><a href="goods.php?act=trash" target="main-frame">商品回收站</a></li>
          <li class="menu-item"><a href="picture_batch.php" target="main-frame">图片批量处理</a></li>
          <li class="menu-item"><a href="goods_batch.php?act=add" target="main-frame">商品批量上传</a></li>
          <li class="menu-item"><a href="goods_export.php?act=goods_export" target="main-frame">商品批量导出</a></li>
          <li class="menu-item"><a href="goods_batch.php?act=select" target="main-frame">商品批量修改</a></li>
          <li class="menu-item"><a href="gen_goods_script.php?act=setup" target="main-frame">生成商品代码</a></li>
          <li class="menu-item"><a href="tag_manage.php?act=list" target="main-frame">标签管理</a></li>
          <li class="menu-item"><a href="goods.php?act=list&extension_code=virtual_card" target="main-frame">虚拟商品列表</a></li>
          <li class="menu-item"><a href="goods.php?act=add&extension_code=virtual_card" target="main-frame">添加虚拟商品</a></li>
          <li class="menu-item"><a href="virtual_card.php?act=change" target="main-frame">更改加密串</a></li>
          <li class="menu-item"><a href="goods_auto.php?act=list" target="main-frame">商品自动上下架</a></li> -->
        </ul>
        
      </li>
 <?php endforeach; endif; unset($_from); ?>
  
  
</ul>
</div>
<div id="help-div" style="display:none">
<h1 id="help-title"></h1>
<div id="help-content"></div>
</div>
</div>
<?php echo '
<script type="text/javascript" src="./templates/scripts/backstage/global.js"></script>
<script type="text/javascript" src="./templates/scripts/backstage/utils.js"></script>
<script type="text/javascript" src="./templates/scripts/backstage/transport.js"></script>
<script language="JavaScript">
<!--
var collapse_all = "闭合";
var expand_all = "展开";
var collapse = true;

function toggleCollapse()
{
  var items = document.getElementsByTagName(\'LI\');
  for (i = 0; i < items.length; i++)
  {
    if (collapse)
    {
      if (items[i].className == "explode")
      {
        toggleCollapseExpand(items[i], "collapse");
      }
    }
    else
    {
      if ( items[i].className == "collapse")
      {
        toggleCollapseExpand(items[i], "explode");
        ToggleHanlder.Reset();
      }
    }
  }

  collapse = !collapse;
  document.getElementById(\'toggleImg\').src = collapse ? \'./templates/images/backstage/menu_minus.gif\' : \'./templates/images/backstage/menu_plus.gif\';
  document.getElementById(\'toggleImg\').alt = collapse ? collapse_all : expand_all;
}

function toggleCollapseExpand(obj, status)
{
  if (obj.tagName.toLowerCase() == \'li\' && obj.className != \'menu-item\')
  {
    for (i = 0; i < obj.childNodes.length; i++)
    {
      if (obj.childNodes[i].tagName == "UL")
      {
        if (status == null)
        {
          if (obj.childNodes[1].style.display != "none")
          {
            obj.childNodes[1].style.display = "none";
            ToggleHanlder.RecordState(obj.getAttribute("key"), "collapse");
            obj.className = "collapse";
          }
          else
          {
            obj.childNodes[1].style.display = "block";
            ToggleHanlder.RecordState(obj.getAttribute("key"), "explode");
            obj.className = "explode";
          }
          break;
        }
        else
        {
          if( status == "collapse")
          {
            ToggleHanlder.RecordState(obj.getAttribute("key"), "collapse");
            obj.className = "collapse";
          }
          else
          {
            ToggleHanlder.RecordState(obj.getAttribute("key"), "explode");
            obj.className = "explode";
          }
          obj.childNodes[1].style.display = (status == "explode") ? "block" : "none";
        }
      }
    }
  }
}
document.getElementById(\'menu-list\').onclick = function(e)
{
  var obj = Utils.srcElement(e);
  toggleCollapseExpand(obj);
}

document.getElementById(\'tabbar-div\').onmouseover=function(e)
{
  var obj = Utils.srcElement(e);

  if (obj.className == "tab-back")
  {
    obj.className = "tab-hover";
  }
}

document.getElementById(\'tabbar-div\').onmouseout=function(e)
{
  var obj = Utils.srcElement(e);

  if (obj.className == "tab-hover")
  {
    obj.className = "tab-back";
  }
}

document.getElementById(\'tabbar-div\').onclick=function(e)
{
  var obj = Utils.srcElement(e);

 // var mnuTab = document.getElementById(\'menu-tab\');
  var hlpTab = document.getElementById(\'help-tab\');
  var mnuDiv = document.getElementById(\'menu-list\');
  var hlpDiv = document.getElementById(\'help-div\');

  //if (obj.id == \'menu-tab\')
//  {
//    mnuTab.className = \'tab-front\';
//    hlpTab.className = \'tab-back\';
//    mnuDiv.style.display = "block";
//    hlpDiv.style.display = "none";
//  }

  if (obj.id == \'help-tab\')
  {
    mnuTab.className = \'tab-back\';
    hlpTab.className = \'tab-front\';
    mnuDiv.style.display = "none";
    hlpDiv.style.display = "block";

    loc = parent.frames[\'main-frame\'].location.href;
    pos1 = loc.lastIndexOf("/");
    pos2 = loc.lastIndexOf("?");
    pos3 = loc.indexOf("act=");
    pos4 = loc.indexOf("&", pos3);

    filename = loc.substring(pos1 + 1, pos2 - 4);
    act = pos4 < 0 ? loc.substring(pos3 + 4) : loc.substring(pos3 + 4, pos4);
    loadHelp(filename, act);
  }
}

/**
 * 创建XML对象
 */
function createDocument()
{
  var xmlDoc;

  // create a DOM object
  if (window.ActiveXObject)
  {
    try
    {
      xmlDoc = new ActiveXObject("Msxml2.DOMDocument.6.0");
    }
    catch (e)
    {
      try
      {
        xmlDoc = new ActiveXObject("Msxml2.DOMDocument.5.0");
      }
      catch (e)
      {
        try
        {
          xmlDoc = new ActiveXObject("Msxml2.DOMDocument.4.0");
        }
        catch (e)
        {
          try
          {
            xmlDoc = new ActiveXObject("Msxml2.DOMDocument.3.0");
          }
          catch (e)
          {
            alert(e.message);
          }
        }
      }
    }
  }
  else
  {
    if (document.implementation && document.implementation.createDocument)
    {
      xmlDoc = document.implementation.createDocument("","doc",null);
    }
    else
    {
      alert("Create XML object is failed.");
    }
  }
  xmlDoc.async = false;

  return xmlDoc;
}

//菜单展合状态处理器
var ToggleHanlder = new Object();

Object.extend(ToggleHanlder ,{
  SourceObject : new Object(),
  CookieName   : \'Toggle_State\',
  RecordState : function(name,state)
  {
    if(state == "collapse")
    {
      this.SourceObject[name] = state;
    }
    else
    {
      if(this.SourceObject[name])
      {
        delete(this.SourceObject[name]);
      }
    }
    var date = new Date();
    date.setTime(date.getTime() + 99999999);
    document.setCookie(this.CookieName, this.SourceObject.toJSONString(), date.toGMTString());
  },

  Reset :function()
  {
    var date = new Date();
    date.setTime(date.getTime() + 99999999);
    document.setCookie(this.CookieName, "{}" , date.toGMTString());
  },

  Load : function()
  {
    if (document.getCookie(this.CookieName) != null)
    {
      this.SourceObject = eval("("+ document.getCookie(this.CookieName) +")");
      var items = document.getElementsByTagName(\'LI\');
      for (var i = 0; i < items.length; i++)
      {
        if ( items[0].getAttribute("name") == "menu" && items[0].getAttribute("id") != \'20_yun\')
        {
          for (var k in this.SourceObject)
          {
            if ( typeof(items[i]) == "object")
            {
              if (items[i].getAttribute(\'key\') == k)
              {
                toggleCollapseExpand(items[i], this.SourceObject[k]);
                collapse = false;
              }
            }
          }
        }
     }
    }
    document.getElementById(\'toggleImg\').src = collapse ? \'./templates/images/backstage/menu_minus.gif\' : \'./templates/images/backstage/menu_plus.gif\';
    document.getElementById(\'toggleImg\').alt = collapse ? collapse_all : expand_all;
  }
});

ToggleHanlder.CookieName += "_1";
//初始化菜单状态
ToggleHanlder.Load();
//Ajax.call(\'cloud.php?is_ajax=1&act=menu_api\',\'\', start_menu_api, \'GET\', \'JSON\');
function start_menu_api(result)
{
      if(result.content==0)
      {
      }
      else
      {
          document.getElementById("menu-ul").innerHTML = document.getElementById("menu-ul").innerHTML + result.content;
      }   
}
//-->
</script>
'; ?>


</body>
</html>