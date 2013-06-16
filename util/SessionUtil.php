<?php
require_once("Const.php");
class SessionUtil
{
     /**
     * ユーザ情報を設定する。<br>
     *
     * @param stdClass $usr　ユーザ情報
     */
    public static function setStaffInfo($usr)
    {
    	$_SESSION['user_info'] = $usr;
    	if (isset($_SESSION['user_info'])) {
    		return $_SESSION['user_info']['idm_staff'];    		
    	}
    }
    
    /**
     * ユーザIDを取得する。<br>
     *
     * @return string ユーザID
     */
    public static function getStaffID()
    {
        return @$_SESSION['user_info']['idm_staff'];
    }

    /**
     * グルプIDを取得する。<br>
     *
     * @return string ユーザID
     */
    public static function getGroupID()
    {
        return @$_SESSION['user_info']['idm_group'];
    }
    /**
     * ユーザ名を取得する。<br>
     *
     * @return string ユーザ名
     */
    public static function getStaffName()
    {
        return @$_SESSION['user_info']['name_first'] . @$_SESSION['user_info']['name_last'];
    }

    /**
     * グルプ名を取得する。<br>
     *
     * @return string ユーザ名
     */
    public static function getGroupName()
    {
        return @$_SESSION[SESSION_GROUPNAME];
    }
    
    /**
     * ユーザ名を取得する。<br>
     *
     * @return string ユーザ名
     */
    public static function getLastLoginDateTime()
    {
        return @$_SESSION[SESSION_LASTLOGINDATE];
    }

    /**
     * Admin権限を取得する。<br>
     *
     * @return string Admin権限
     */
    public static function getAdmin()
    {
        return @$_SESSION[SESSION_ADMIN];
    }

        /**
     * セッションに権限を設定する。<br>
     *
     * @param 配列 $authList　ページ権限
     */
    public static function setPageAuth($authList)
    {
        $authArray = array();
        foreach($authList as $auth){
            $authArray[$auth->PAGEID] = $auth;
        }
        $_SESSION[SESSION_AUTH] = $authArray;
    }
    
    public static function getBase($info)
    {
        return @$_SESSION['baseinfo'][$info];
    }

}
?>