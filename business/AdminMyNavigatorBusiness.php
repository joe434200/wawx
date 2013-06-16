<?php
require_once('BaseBusiness.php');
require_once('DateUtil.php');
require_once('SupportException.php');
require_once('SessionUtil.php');
require_once('PageSplitBusiness.php');

/**
 * 
 * 我的导航管理
 * @author Administrator
 *
 */
class AdminMyNavigatorBusiness extends BaseBusiness
{
	/**
	 * 获取我的导航信息
	 * Enter description here ...
	 * @param unknown_type $uid
	 */
	function getMyNavigators($uid)
	{
		$sql = "SELECT a.* FROM m_backmodules a
		INNER JOIN t_personalmodules b ON a.ID= b.idm_backmodules
		WHERE b.idt_user='$uid'
		";
		$result = $this->db->exceuteQuery($sql);
		return $result;
	}
	/**
	 * 查找所有可以选择的模块
	 * Enter description here ...
	 * @param unknown_type $usertype
	 */
	function getAllModules($usertype)
	{
		$result = array();
		$sqlbig = "SELECT * FROM  m_backmodules WHERE nodetype='0' AND  usertype='$usertype' AND parentid='99999' ORDER BY ID ";
		$bigrs = $this->db->exceuteQuery($sqlbig);
		foreach($bigrs as $item)
		{
			$pid = $item['ID'];
			$sql = "SELECT a.* FROM 
			m_backmodules a  
			WHERE a.nodetype='1' AND a.parentid = '$pid' AND a.usertype='$usertype'";
			$chirs = $this->db->exceuteQuery($sql);
			
			$result[] = array("parent"=>$item,"child"=>$chirs);
		}
		
		return $result;
	}
	function updateMyInfo($data,$mynavis,$uid)
	{
		parent::Delete('t_personalmodules',"d.idt_user='$uid'");//删除所有
		parent::Update('t_user', $data,"u.ID='$uid'");//更新信息
		$sqlins = "INSERT INTO t_personalmodules (modulename,idm_backmodules,idt_user) VALUES ";
		foreach ($mynavis as $item)
		{
			$item = "('".str_replace("|", "','", $item)."'";
			$item .= ",'".$uid."'),";
			$sqlins .= $item;
		}
		$sqlins = substr($sqlins, 0,strlen($sqlins)-1);
		$this->db->exceuteUpdate($sqlins);
		
	}
	
	
}

?>