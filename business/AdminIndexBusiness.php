<?php
require_once('BaseBusiness.php');
require_once('DateUtil.php');
require_once('SupportException.php');
require_once('SessionUtil.php');

/**
 * 首页
 * @author Administrator
 *
 */
class AdminIndexBusiness extends BaseBusiness
{
	/**
	 * 
	 * 获取指定用户的顶部导航,快捷菜单
	 * @param unknown_type $userid
	 */
	function getMyTopNavigators($userid)
	{
		$sql = "SELECT B.* FROM t_personalmodules  A
		INNER JOIN m_backmodules B ON A.idm_backmodules = B.ID
		
		
		WHERE idt_user='$userid'";
		$rs = $this->db->exceuteQuery($sql);
		return $rs;
	}
	/**
	 * 
	 * 获取指定用户类型左侧的菜单
	 * @param unknown_type $userid
	 */
	function getMyLeftMenus($usertype)
	{
		//1获取分类
		$result = array();
		$temp = array();
		$sqltype = "SELECT ID,modulename,modulekey FROM m_backmodules WHERE usertype='$usertype' AND nodetype='0' AND parentid = '99999' AND delflag='0'";
		$rstype = $this->db->exceuteQuery($sqltype);
		foreach ($rstype as $item)
		{
			$temp = array();
			$temp['head'] = $item;
			$pid = $item['ID'];
			$sqllist = "SELECT * FROM m_backmodules WHERE usertype='$usertype' AND nodetype='1' AND parentid='$pid' AND delflag='0'";
			$child = $this->db->exceuteQuery($sqllist);
			$temp['child'] = $child;
			$result[]=$temp;
			
		}
		return $result;
		
	}
	
}

?>