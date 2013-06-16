<?php
final class ConstUtil{

public static $minWidth = 60;
public static $minHeight = 60;
public static $maxWidth = 800;
public static $maxHeight = 800;

//常量调用方法
 public static function getConstArray($key)
    {
    	$methodName = "get".$key;
    	$class = new ReflectionClass('ConstUtil');


    	if(!$class->hasMethod($methodName))
    	{
        	throw new Exception($methodName." is missing");
        	return null;
        }
        else
        {

        	$setter = $class->getMethod($methodName);
    		$ok = $setter->invoke(null,null);
    		return $ok;

        }

    }

public static function getCityLevels()
{
	$data = array('0' => '国家',
	              '1' => '省/直辖市',
				  '2' => '市',
				  '3' => '县/区',
	              );
           return $data;
}

public static function getStandardUserType()
{
	$data = array('0' => '个人',
	              '1' => '企业'
	              );
           return $data;
}

public static function getUserType()
{
	$data = array('0' => '网站管理员',
	              '1' => '店主'
	              );
           return $data;
}
public static function getStudentWillType()
{
	$data = array('0' => '团购',
	              '1' => '特色'
	              );
           return $data;
}
public static function getAuditStatus()
{
	$data = array('0' => '待审核',
	              '1' => '审核通过',
				  '2' => '未通过审核'
	              );
           return $data;
}
public static function getAuditStatusShop()
{
		$data = array('1' => '审核中',
	              '2' => '审核通过',
				  '3' => '未通过审核'
	              );
           return $data;
}

public static function getAuditStatusShopAll()
{
		$data = array(
				  '0' => '待审核',
		          '1' => '审核中',
	              '2' => '审核通过',
				  '3' => '未通过审核'
	              );
           return $data;
}

public static function getShieldStatus()
{
	$data = array('0' => '未屏蔽',
	              '1' => '已屏蔽'
	              );
    return $data;
}
public static function getCloseStatus()
{
	$data = array('0' => '未关闭',
	              '1' => '已关闭'
	              );
    return $data;
}

public static function getExcelStatus()
{
	$data = array('0' => '正常',
	              '1' => '精华'
	              );
    return $data;
}
public static function getTopStatus()
{
	$data = array('0' => '正常',
	              '1' => '置顶'
	              );
    return $data;
}

public static function getYesNo()
{
	$data = array('0' => '是',
	              '1' => '否'
	              );
    return $data;
}

public static function getYesNo_NG()
{
	$data = array('0' => '否',
	              '1' => '是'
	              );
    return $data;
}

public static function getSummeryList()
{
	$data = array('0' => '好',
	              '1' => '中',
				  '2' => '差'
	              );
    return $data;
}
public static function getGoodsType()
{
	$data = array('0' => '学生惠',
	              '1' => '校边生活'
	              );
    return $data;
}


public  static function getRebackType()
{
	$data = array('0' => '照片评论回复',
	              '1' => '圈子话题回复',
	'2' => '活动评论-回复',
	'3' => '空间-日志-评论回复',
	'4' => '论坛帖子回复',
	'5' => '留言板回复',
	'6' => '回复的回复',
	'7' => '圈子-活动—图片-评论',
	'8' => '圈子-图片-评论'
	              );
    return $data;
}
public static function getPhotoRemarkType()
{
	$data = array('0' => '圈子照片评论',
	              '1' => '活动图片评论',
	'2' => '空间-照片-评论',
	'3' => '活动评论'	
	              );
    return $data;
}
//设定广告位置
public static function getAdsPosList()
{
	$data = array(
	'0'=>array('text'=>'首页中心','width'=>540,'height'=>294,'num'=>1),
	'1'=>array('text'=>'首页左侧花校币','width'=>218,'height'=>133,'num'=>1),
	'2'=>array('text'=>'笑校吧首页','width'=>740,'height'=>260,'num'=>1),
	'3'=>array('text'=>'圈子首页','width'=>740,'height'=>260,'num'=>1),
	'4'=>array('text'=>'活动首页','width'=>740,'height'=>260,'num'=>3),
	'5'=>array('text'=>'笑谈首页-导航下方','width'=>860,'height'=>90,'num'=>1),
	'6'=>array('text'=>'笑谈首页-热门话题左侧','width'=>399,'height'=>271,'num'=>7),
	'7'=>array('text'=>'校边生活首页','width'=>790,'height'=>280,'num'=>5),
	'8'=>array('text'=>'学生惠首页','width'=>1000,'height'=>90,'num'=>1),
	'9'=>array('text'=>'校币了没','width'=>100,'height'=>100,'num'=>3)
	);

    return $data;
}
public static function getAdsType()
{
	$data = array('0' => '店铺',
	              '1' => '商品',
	'2' => '充值',
	'3' => '其他'	
	              );
    return $data;
    
}


/**
 * 将应该插入Int型数值的空或者空串转换为Int型数值
 * Enter description here ...
 * @param unknown_type $data
 */
public static function NullToInt($data)
{
	if (empty($data) || $data == "")
	{
		return "0";
	}
	return $data;
}



//--------------------------------------------by:ly:end--------------------------------
//获取指定年月日的星期数
public static function  GetWeekDay($year,$month,$day)
{
	$strDay = $year . "/" .$month ."/" .$day;
	$mydate = strtotime($strDay);
	//echo $strDay;
	return ConstUtil::GetWeekDay2($mydate);
}


public static function GetWeekDay2($strDay)
{
	return date('w',$strDay);
}
public static function encodeUTF8($array)
{
	foreach ( $array as $key => $value )
	{
		if (! is_array ( $value ))
			{
				$array [$key] = mb_convert_encoding ( trim($value), "utf-8", "GBK" );
			}
			else
			{
				$array [$key] = ConstUtil::encodeUTF8 ( $value );
			}
		}
	return $array;
}
}