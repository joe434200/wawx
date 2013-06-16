<?php /* Smarty version 2.6.18, created on 2013-06-03 20:19:35
         compiled from uploadify.tpl */ ?>
<?php echo '
<link rel="stylesheet" href="./plugin/multiimage/themes/default/default.css" />
<script src="./plugin/multiimage/kindeditor.js"></script>
<script src="./plugin/multiimage/lang/zh_CN.js"></script>
<script src="./plugin/multiimage/plugins/multiimage/multiimage.js"></script>

<script>
	KindEditor.ready(function(K) {
		var editor = K.editor({
			allowFileManager : true
		});
		K(\'#J_selectImage\').click(function() {
			editor.loadPlugin(\'multiimage\', function() {
				editor.plugin.multiImageDialog({
					clickFn : function(urlList) {
						var div = K(\'#J_imageView\');
						div.html(\'\');
						K.each(urlList, function(i, data) {
							div.append(\'<img src="\' + data.url + \'">\');
						});
						editor.hideDialog();
						AfterUploadHandler();//上传完后的处理函数
					}
				});
			});
		});
	});
</script>
'; ?>