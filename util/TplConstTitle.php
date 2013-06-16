<?php
//require_once("Const.php");
//require_once("StringEncrypt.php");
final class TplConstTitle
{


	//------------------------------------李楠 圈子-----------------------------------

	static $Sys_grp_home = "圈子首页";
	static $Sys_grp_select="搜索圈子";
	static $Sys_grp_create="创建圈子";
	static $Sys_grp_ins="兴趣圈子";
	static $Sys_grp_school="学校圈子";
	static $Sys_grp_club="社团圈子";
	
	static $Sys_grp_MyCreate="我创建的圈子";
	static $Sys_grp_MyCheck="正在审核的圈子";
	static $Sys_grp_MyIn="我加入的圈子";
	
	static $Sys_bar_Index="校笑吧";
	
   //------------------------------------李楠 圈子-----------------------------------

	public static function setTplTitle($smarty,  $system,$subsystem,$seqNo=null )
    {
    	$showtitle = "Pg_" . $system . "_" . $subsystem ;
    	if (!empty($seqNo))
    	{
    		$showtitle = $showtitle. "_" . $seqNo;
    	}



    	$smarty->assign("tplTitle",self::$$showtitle);

    }

    public static function setPageTitle($smarty,$pagecode)
    {
    	$smarty->assign("pageTitle", self::getTitle($pagecode));
    }

    public static function getTitle($pagecode)
    {
    	 $key = "Sys_".$pagecode;
    	  return self::$ $key;
    }
	public static function setSubTplTitle($smarty,  $system,$subsystem,$seqNo=null )
    {
    	$showtitle = "Pg_" . $system . "_" . $subsystem ;
    	if (!empty($seqNo))
    	{
    		$showtitle = $showtitle. "_" . $seqNo;
    	}


    	$smarty->assign("subtplTitle",self::$$showtitle);

    }

	public static function setTplTitle_ConstStr($smarty,  $system,$subsystem,$conststr=null )
    {
    	$showtitle = "Pg_" . $system . "_" . $subsystem ;
    	if (!empty($seqNo))
    	{
    		$showtitle = $showtitle. "_" . $seqNo;
    	}

    	if (!empty($conststr))
    	{
    		$smarty->assign("tplTitle",$conststr.self::$$showtitle);
    	}
    	else
    	{
    		$smarty->assign("tplTitle",self::$$showtitle);
    	}




    }
}