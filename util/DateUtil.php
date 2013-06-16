<?php
require_once('StringUtil.php');
final class DateUtil
{
    /**
     * 現在時間「YYYY-MM-DD　HH:MM:SS」を取得する。<br>
     *
     * @return 現在時間 「YYYY-MM-DD　HH:MM:SS」
     */
    public static function getNow()
    {
        return date('Y-m-d H:i:s');
    }


    /**
     * 日付「YYYYMMDD」を取得する。<br>
     *
     * @param string $date 入力日付
     *
     * @return 日付 「YYYYMMDD」
     */
    public static function getYYYYMMDD($date = null)
    {
        if (StringUtil::isNotBlank($date)) {
            return date('Y-m-d', strtotime($date));
        }
        return (string) date('Y-m-d');
    }
    
    /**
     * 日付チェックする。<br>
     *
     * @param string $value 日付「YYYYMMDD」
     * @return チェック結果
     */
    public static function isDate($value)
    {
        if (!StringUtil::isNotBlank($value)) {
            return false;
        }
        $date = date('Y-m-d', strtotime($value));
        if (strcmp($value, $date) == 0) {
            return true;
        }
        return false;
    }

    public static function isDateInDates($startDate, $endDate, $now = null)
    {
        if (!StringUtil::isNotBlank($now)) {
            $now = DateUtil::getYYYYMMDD();
        }
        if (StringUtil::isNotBlank($endDate)) {
            if (strcmp($startDate, $now) > 0 || strcmp($endDate, $now) < 0) {
                return false;
            }
        } else {
            if (strcmp($startDate, $now) > 0) {
                return false;
            }
        }
        return true;
    }
    /**
     * 格式化日期字符串
     * */
    
    public static function formateDate($formatestr,$datestr)
    {
    	
    	
    	if ($datestr == "0000-00-00 00:00:00")
    	{
    		return "";
    	}
    	else 
    	{
    		$value = self::getYYYYMMDD($datestr);
    		if (self::isDate($value))
    		{
    			return date($formatestr,strtotime($datestr));
    		}
    		else 
    		{
    			return "";
    		}
    	}
    }

}