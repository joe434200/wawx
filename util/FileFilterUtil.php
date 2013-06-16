<?php
require_once ('Const.php');

/**
 * 脏文字自动过滤器
 * Enter description here ...
 * @author Administrator
 *
 */
final class FileFilterUtil
{
	protected  static  $dirtystr = "";
	protected static $dirtyFile = "Filter/filter.txt";
	//读,脏文字数据
	public static function readDocument()
	{	
		$file_handle = fopen(self::$dirtyFile, "r");
		while (!feof($file_handle)) 
		{
   			$line = fgets($file_handle);
   			self::$dirtystr = self::$dirtystr.$line;
   			
		}
	
		fclose($file_handle);
		
		self::$dirtystr = substr(self::$dirtystr,0,strlen(self::$dirtystr)-1);
		
	}
	//指定文字过滤
	public static function filterText($txt)
	{
		
		self::readDocument();
		$patterns = "/(".self::$dirtystr.")/";
		
		$replace = '**';
		$txt =  preg_replace($patterns, $replace, $txt);
		return $txt;
	}
	
  
}
