<?php
require_once ('BaseBusiness.php');
require_once ('DateUtil.php');
require_once ('SupportException.php');

class LoginBusiness extends BaseBusiness
{
    function checkIsExist($email, $pwd) ////检查用户
    {
        $this->sql = "SELECT id FROM t_user WHERE email='$email' ";
        
        $result = $this->db->exceuteQuery ( $this->sql );
        if (count ( $result ) >= 1) //用户存在
        {
            $this->sql = "SELECT id FROM t_user WHERE email='$email' AND password='$pwd' ";
            
            $result = $this->db->exceuteQuery ( $this->sql );
            if (count ( $result ) == 0) //没有找到记录，密码错误
            {
                return 2; //密码错误
            }
        }
        else
        {
            return 1; //用户不存在
        }
        
        return 0; //正常找到
    }
    
    function getLoginUserInfo($email, $pwd) //登陆成功后获取用户和企业共同信息
    {
        $this->sql = "SELECT ID,email,usertype,photo,nickname,schoolname
					  FROM t_user 
					  WHERE email='$email' 
					  AND password='$pwd'";
        $rs = $this->db->exceuteQuery ( $this->sql );
        return $rs [0];
    }
    
    function getUserInfo($email, $pwd) //登陆成功后获取用户其他信息
    {
        $this->sql = "SELECT schoolname,department,schooltime,bindmobile,excelringflg,superringflg,level
					FROM t_user
					WHERE email='$email' 
					AND password='$pwd'";
        $rs = $this->db->exceuteQuery ( $this->sql );
        return $rs [0];
    }
    
    function getShopInfo($email, $pwd) //登陆成功后获取企业的其他信息
    {
        $this->sql = "SELECT shopname,scope,chargeperson,contactphone,storeaddr,busilicence,remark
					FROM t_user
					WHERE email='$email' 
					AND password='$pwd'";
        $rs = $this->db->exceuteQuery ( $this->sql );
        return $rs [0];
    
    }

}

?>