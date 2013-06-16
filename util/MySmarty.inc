<?
/**
  * Smartyの派生クラス
  *
  **/

    $mr_dir = dirname(dirname((__FILE__)));
	require_once($mr_dir.'/lib/Smarty/libs/Smarty.class.php');
	class MySmarty extends Smarty
	{
		// Smartyのインストールパス
		private $Smarty_dir = '/lib/Smarty/';
		// テンプレートファイルのパス
		private $mr_dir = "";

		/**
		  * コンストラクタ
		  *
		  **/
		public function __construct()
		{
			// テンプレートファイルのパス
//			$this->mr_dir = dirname(__FILE__).'/../';
			$this->mr_dir = dirname(dirname(__FILE__));	// 2011.05.20 Matsukawa((c)MobileKazas)
			$this->Smarty();
//			echo $this->template_dir = $this->mr_dir."templates";
			$this->config_dir = $this->mr_dir."config";
			$this->cache_dir = $this->Smarty_dir."cache";
//			$this->compile_dir = $this->mr_dir."templates_c";
			$this->compile_dir = $this->mr_dir . "/templates_c";
		}

		/**
		  * デストラクタ
		  *
		  **/
		public function __destruct()
		{
		}
	}
?>
