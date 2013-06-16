<?php
require_once ('Const.php');

final class FileUtil
{

    //ADD BY LZG FILE TYPE ERROR
     static $F0001 = 'アップロードファイルのフォーマットはbmp, jpg, gif, ico, とpngに限ります。';
     static $F0002 = 'ファイルをアップロードすることができません。';

    /**
     * config.iniファイルのパラメートーを取得する。
     *
     * @param string $selectionsKey　キー
     * @return 値
     */
    public static function getConfig($selectionsKey)
    {
        $iniData = parse_ini_file(CONFIG_PATH, true);
        return $iniData[$selectionsKey];
    }
    /*
     * 获取文件的后缀名
     * */
    public static function getFileExtentionStr($fileName)
    {
    	$filearr = explode('.' , $fileName);
    	return end($filearr);


    }
	public static function makeRealFileName($file_type){
		$now_time = date("Y-m-d H:i:s");
		$mm = ((double)microtime()*1000000);
		$realname = date("YmdHis").$mm[0].".".$file_type;
		return $realname;
	}
 /**
     * メッセージを取得する。<br />
     *
     * @param string $errorCode エラーコード
     * @return メッセージ
     */
    public static function getMessage($errorCode)
    {
        return self::$$errorCode;
    }
}
