<?php
require_once('BaseBusiness.php');
require_once('DateUtil.php');
require_once('SupportException.php');
require_once('SessionUtil.php');
require_once('PageSplitBusiness.php');

//后台登陆
class AdminLoginBusiness extends BaseBusiness
{
	
	/**
	 * 
	 * 判断用户是否存在，如果存在，表示登陆成功，置session
	 * @param unknown_type $email,email
	 * @param unknown_type $pwd,密码
	 * @param unknown_type $vercode,验证码
	 * @param unknown_type $isIngnorerr,是否忽略错误
	 */
    function  isUserExist($email,$pwd,$vercode=null,$isIngnorerr=true)
	{
		if (!(empty($vercode) || $vercode == null) && strtoupper($vercode) != strtoupper($_SESSION['VerifyCode']))
		{
			if (!$isIngnorerr)
			{
				$error = new SupportException();
        		$error->addError('E0005_ZH', sprintf(MessageUtil::getMessage('E0005_ZH')));
            	throw $error;
			}
		}
		else 
		{
			$sql = "SELECT ID,email,password,usertype,adminflg,nickname,realname FROM t_user WHERE (adminflg='1' OR usertype='1') AND shieldflg='0' AND status='1' ";
			$sql .= " AND email='$email' and `password` = '$pwd' ";
			$result = $this->db->exceuteQuery($sql);
			
			
			if($result[0]['ID'] == NULL || count($result) == 0) {
				
				if (!$isIngnorerr)
				{
					$error = new SupportException();
		        	$error->addError('E0001_ZH', sprintf(MessageUtil::getMessage('E0001_ZH')));
		            throw $error;
				}
	        } else {
	        	$_SESSION['adminLogin_ok'] = '1';
	        }
	        $result = $result[0];
			
	
	
	        return $result;
		}
		
		
 
	}
	
}

?>