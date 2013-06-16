<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>
校边生活-{$shop.shopname}
</title>
<link rel="shortcut icon" href="./templates/goods/favicon.ico" >
<link rel="icon" href="./templates/goods/animated_favicon.gif" type="image/gif" >
<link href="./templates/css/goods/style.css" rel="stylesheet" type="text/css" />

</head>
<body style="margin:0">
<div id="galleryleft"></div>
<div id="show-pic">
<embed src="./templates/goods/pic-view.swf" quality="high" id="picview" 
flashvars="copyright=shopex&xml=<products name='{$shop.shopname}' shopname='{if $shop.shopname}校边生活{/if}'>
{foreach name=gallery_list from=$pictures item=photo}
<smallpic{if $smarty.foreach.gallery_list.first} selected='selected'{/if}>./uploadfiles/shop/{$photo.newimg}</smallpic>
<photo_desc>{$photo.imgdesc}</photo_desc>
<bigpic{if $smarty.foreach.gallery_list.first} selected='selected'{/if}>./uploadfiles/shop/{$photo.newimg}</bigpic>
{/foreach}
</products>" 
pluginspage="http://www.macromedia.com/go/getflashplayer" 
type="application/x-shockwave-flash" width="100%" height="100%">
</embed>
{literal}
<script>
function windowClose()
{
    if(window.confirm('您是否关闭当前窗口'))
    {
        window.close();
    }
}
</script>
{/literal}
</div>
<div id="galleryright"></div>
</body>
</html>