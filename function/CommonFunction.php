<?php
/**
 * 获取当前登录的IP地址
 * Enter description here ...
 */
function getIP()
{
    if ($_SERVER ['HTTP_CLIENT_IP'] && $_SERVER ['HTTP_CLIENT_IP'] != 'unknown')
    {
        $ip = $_SERVER ['HTTP_CLIENT_IP'];
    }
    elseif ($_SERVER ['HTTP_X_FORWARDED_FOR'] && $_SERVER ['HTTP_X_FORWARDED_FOR'] != 'unknown')
    {
        $ip = $_SERVER ['HTTP_X_FORWARDED_FOR'];
    }
    else
    {
        $ip = $_SERVER ['REMOTE_ADDR'];
    }
    return $ip;
}
/**
 * 
 * 获取用户类型
 * @param unknown_type $lng：语言
 */
function getUserType($lng)
{
    if ("EN" == strtoupper ( $lng ))
    {
        return 1;
    }
    else
    {
        return 0;
    }
}
/**
 * 
 * 设置前台页面是否显示：EN ZH
 * @param unknown_type $mysmarty
 * @param unknown_type $lng
 */
function SetLangAndUrl($mysmarty, $lng)
{
    
    $mysmarty->assign ( "showlng", 1 );
    $url = $_SERVER ['REQUEST_URI'];
    $arr = explode ( '/', $url );
    $phpurl = $arr [count ( $arr ) - 1];
    
    if (strtoupper ( $lng ) == "EN")
    {
        $mysmarty->assign ( "url_en", $phpurl );
        $zhphpurl = str_replace ( 'en', 'zh', $phpurl );
        $mysmarty->assign ( "url_zh", $zhphpurl );
    
    }
    else
    {
        $mysmarty->assign ( "url_zh", $phpurl );
        $enphpurl = str_replace ( 'zh', 'en', $phpurl );
        $mysmarty->assign ( "url_en", $enphpurl );
    }
}

/**
 * 
 * 数组转换为字符串
 * @param unknown_type $demiliter:连接符
 * @param unknown_type $arr：被转换的数组
 */
function ArrayToStr($demiliter, $arr)
{
    $str = "";
    
    foreach ( array_keys ( $arr ) as $i )
    {
        $str = $str . $arr [$i];
        $str = $str . $demiliter;
    
    }
    
    $str = substr ( $str, 0, strlen ( $str ) - 1 );
    //echo $str;
    return $str;
}
/**
 * 
 * 将checkbox的值转换为0或者1
 * @param unknown_type $data
 * @param unknown_type $key
 */
function getCheckBoxValue($data, $key)
{
    if (empty ( $data [$key] ))
    {
        return 0;
    }
    else
    {
        return 1;
    }
}
//判断是否是闰年
function isLeapYear($year)
{
    $time = mktime ( 20, 20, 20, 2, 1, $year ); //取得一个日期的 Unix 时间戳;
    if (date ( "t", $time ) == 29)
    { //格式化时间，并且判断2月是否是29天；
        return true; //是29天就输出时闰年；
    }
    else
    {
        return false;
    }

}
//获取某年某月有多少天
function GetDays($month, $year)
{
    $time = mktime ( 20, 20, 20, $month, 1, $year ); //取得一个日期的 Unix 时间戳;
    return date ( "t", $time );
}
function getWeekDay2($strDay)
{
    //echo $strDay;
    return date ( 'w', $strDay );
}
//获取某年某月某日是星期几
function getWeekDay($year, $month, $day, $lng)
{
    if ($lng == "EN")
    {
        return getWeekDay_en ( $year, $month, $day );
    }
    else
    {
        return getWeekDay_zh ( $year, $month, $day );
    }
}
function getWeekDay_en($year, $month, $day)
{
    $strDay = $year . "/" . $month . "/" . $day;
    //echo $strDay;
    $mydate = strtotime ( $strDay );
    //echo $mydate."ddd";
    return getWeekDay2 ( $mydate );
}
function getWeekDay_zh($year, $month, $day)
{
    $week = getWeekDay_en ( $year, $month, $day );
    
    //
    $week = $week - 1;
    IF ($week < 0)
    {
        $week = 6;
    }
    return $week;

}
/***
 * 1,2,3,4,5,6,日
 */
function getTotalWeeks_zh($year, $month)
{
    //获取星期,某年某月1日
    $week = getWeekDay ( $year, $month, '1', "ZH" );
    //echo $week;
    //获取一共有多少天
    $days = getDays ( $month, $year );
    //
    

    if ($days >= 30 && $week == 6) //31/30天，周日,6周
    {
        return 6;
    }
    else if ($days == 31 && $week == 5) //31天，周六，6周
    {
        return 6;
    }
    else if ($days == 28 && $week == 0) //28天，四周
    {
        return 4;
    }
    else //5周
    {
        return 5;
    }
}
/***
 * 日,1,2,3,4,5,6
 */
function getTotalWeeks_en($year, $month)
{
    //获取星期,某年某月1日
    $week = getWeekDay ( $year, $month, '1', "EN" );
    //echo $week;
    //获取一共有多少天
    $days = getDays ( $month, $year );
    //
    if ($days >= 30 && $week == 0) //31/30天，周日,6周
    {
        return 6;
    }
    else if ($days == 31 && $week == 6) //31天，周六，6周
    {
        return 6;
    }
    else if ($days == 28 && $week == 1) //28天，四周
    {
        return 4;
    }
    else //5周
    {
        return 5;
    }
}
//true :add;false:sub
function getSubOneDayYM(&$year, &$month, $day, $addorsub)
{
    $strDay = $year . "/" . $month . "/" . $day;
    //echo $strDay;
    $mydate = strtotime ( $strDay );
    
    //输出一天前的日期，在时间戳上减去一天的秒数 
    $newdate = $mydate;
    if ($addorsub) //add
    {
        $newdate = strtotime ( "$strDay+1 day" );
    }
    else //sub
    {
        $newdate = strtotime ( "$strDay-1 day" );
    }
    //echo date('Y',$newdate);
    $year = date ( 'Y', $newdate );
    $month = date ( 'm', $newdate );

}

//0-6,7表示周日
function getDaysArray($year, $month, $lng)
{
    if ($lng == "EN")
    {
        $weeks = getTotalWeeks_en ( $year, $month );
    }
    else
    {
        $weeks = getTotalWeeks_zh ( $year, $month );
    }
    $daycount = 1;
    
    $day1week = getWeekDay ( $year, $month, '1', $lng );
    
    $currdays = getDays ( $month, $year );
    $daylastweek = getWeekDay ( $year, $month, $currdays, $lng );
    
    $rsarray = array ();
    $oneweek = array (); //先处理第1周
    

    //处理后半部分
    for($i = $day1week; $i < 7; $i ++)
    {
        $oneweek [getStrKey ( $i, $lng )] = array ('day' => $daycount, 'use' => SET_NO );
        $daycount ++;
    }
    
    //处理前半部分
    $preyear = $year;
    $premonth = $month;
    getSubOneDayYM ( $preyear, $premonth, 1, false ); //-1天
    $premonthdays = getDays ( $premonth, $preyear );
    for($i = $day1week - 1; $i >= 0; $i --)
    {
        $oneweek [getStrKey ( $i, $lng )] = array ('day' => $premonthdays, 'use' => SET_DISABLED );
        $premonthdays --;
    }
    //print_r($oneweek);
    

    //exit;
    

    $rsarray [] = $oneweek;
    //处理中间周
    for($i = 1; $i < $weeks - 1; $i ++) //相当于$week-2
    {
        $oneweek = array (); //先处理第1周
        for($j = 0; $j < 7; $j ++)
        {
            $oneweek [getStrKey ( $j, $lng )] = array ('day' => $daycount, 'use' => SET_NO );
            $daycount ++;
        }
        $rsarray [] = $oneweek;
    }
    
    //处理最后一周
    $oneweek = array ();
    for($i = 0; $i < $daylastweek + 1; $i ++)
    {
        $oneweek [getStrKey ( $i, $lng )] = array ('day' => $daycount, 'use' => SET_NO );
        $daycount ++;
        if ($daycount > $currdays)
        {
            break;
        }
    }
    if ($daycount < $currdays)
    {
        for($i = 0; $i < $daylastweek + 1; $i ++)
        {
            $oneweek [getStrKey ( $i, $lng )] = array ('day' => $daycount, 'use' => SET_NO );
            $daycount ++;
            if ($daycount > $currdays)
            {
                break;
            }
        }
    }
    
    //处理最后一周的后半部分
    //$nextyear = $year;
    //$nextmonth = $month;
    //getSubOneDayYM($nextyear,$nextmonth,1,true);//+1天
    $nextmonthdays = 1;
    for($i = $daylastweek + 1; $i < 7; $i ++)
    {
        //echo $i;
        $oneweek [getStrKey ( $i, $lng )] = array ('day' => $nextmonthdays, 'use' => SET_DISABLED );
        $nextmonthdays ++;
    }
    
    $rsarray [] = $oneweek;
    
    return $rsarray;

}
function resetCalendarData($inidata, $dbdata)
{
    $inidata [1] ['Mon'] ['use'] = SET_YES;
    $inidata [1] ['Tue'] ['use'] = SET_NO;
    return $inidata;
}
function getStrKey($num, $lng)
{
    if ($lng == "EN")
    {
        return getStrKey_en ( $num );
    }
    else
    {
        return getStrKey_zh ( $num );
    }
}
function getStrKey_en($num)
{
    $strkey = "Mon";
    switch ($num)
    {
        case 0 :
            $strkey = "Sun";
            break;
        case 1 :
            $strkey = "Mon";
            break;
        case 2 :
            $strkey = "Tue";
            break;
        case 3 :
            $strkey = "Wed";
            break;
        case 4 :
            $strkey = "Thu";
            break;
        case 5 :
            $strkey = "Fri";
            break;
        case 6 :
            $strkey = "Sat";
            break;
    }
    return $strkey;
}
function getStrKey_zh($num)
{
    $strkey = "Mon";
    switch ($num)
    {
        case 6 :
            $strkey = "Sun";
            break;
        case 0 :
            $strkey = "Mon";
            break;
        case 1 :
            $strkey = "Tue";
            break;
        case 2 :
            $strkey = "Wed";
            break;
        case 3 :
            $strkey = "Thu";
            break;
        case 4 :
            $strkey = "Fri";
            break;
        case 5 :
            $strkey = "Sat";
            break;
    }
    return $strkey;
}
/**
 * 时区转换
 * @param unknown_type $GMT_From：当前日期+时间所在的时区：GMT格式，GMT+1，或者GM-10
 * @param unknown_type $GMT_To：转换后的日期+时间
 * @param unknown_type $currdata:当前日期+时间
 */
function GMT_Covert($GMT_From, $GMT_To, $currdata, $linkchar = null)
{
    $fromgmt = substr ( $GMT_From, 3 );
    $togmt = substr ( $GMT_To, 3 );
    
    $mydate = strtotime ( $currdata ); //当前日期
    

    $hour = date ( "H", $mydate ); //取得小时数
    $timesubvalue = $fromgmt - $togmt;
    
    $mayhours = $hour - $timesubvalue;
    
    $maybeaddday = 0;
    if ($mayhours > 24)
    {
        $maybeaddday = 1; //向后加1天
        $mayhours = $mayhours - 24;
        $newdate = strtotime ( "$currdata+1 day" );
    }
    else if ($mayhours < 0)
    {
        $maybeaddday = - 1; //向前减1天
        $mayhours = 24 + $mayhours;
        $newdate = strtotime ( "$currdata-1 day" );
    }
    else
    {
        $newdate = strtotime ( $currdata );
        $maybeaddday = 0; //不加不减
    }
    $newyear = date ( "Y", $newdate ); //取得年
    $newmonth = date ( "m", $newdate ); //取得年
    $newday = date ( "d", $newdate ); //取得年
    $newhour = date ( "H", $newdate ); //取得年
    $newmin = date ( "i", $newdate ); //取得年
    $newsec = date ( "s", $newdate ); //取得年
    

    $newhour = $mayhours;
    
    if (empty ( $linkchar ))
    {
        $linkchar = "-";
    }
    
    $newdatetostr = $newyear . $linkchar . $newmonth . $linkchar . $newday;
    $newdatetostr = $newdatetostr . " " . $newhour . ":" . $newmin . ":" . $newsec;
    
    return $newdatetostr;

}

?>