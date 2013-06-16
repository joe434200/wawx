<?php
require_once('BaseBusiness.php');
require_once('DateUtil.php');
require_once('SupportException.php');
require_once('SessionUtil.php');
require_once('PageSplitBusiness.php');

/**
 * 
 * 网站模块管理
 * @author Administrator
 *
 */
class AdminModuleBusiness extends PageSplitBusiness
{
	
	/**
	 * 
	 * 查找所有的模块信息
	 * @param unknown_type $mid
	 */
	function getAllModules($currpage=null,$numbersperpage=null,$query=null)
	{
		
		$sql = "
		SELECT a.*,b.modulename parentname FROM 
		m_backmodules a  
		INNER JOIN m_backmodules b ON a.parentid=b.ID
		WHERE a.nodetype='1' AND b.nodetype='0' AND b.parentid ='99999'";
		
		$sqlcount = "
		SELECT count(1) FROM 
		m_backmodules a  
		INNER JOIN m_backmodules b ON a.parentid=b.ID
		WHERE a.nodetype='1' AND b.nodetype='0' AND b.parentid ='99999'";
		
		if (!empty($query['modulename']))
		{
			$sql .= " AND a.modulename LIKE '%$query[modulename]%'";
			$sqlcount .= " AND a.modulename LIKE '%$query[modulename]%'";
		}
		if (!empty($query['parentid']))
		{
			$sql .= " AND a.parentid='$query[parentid]'";
			$sqlcount .= " AND a.parentid='$query[parentid]'";
			
		}
		if (!empty($query['usertype']) || $query['usertype'] == '0')
		{
			$sql .= " AND a.usertype='$query[usertype]'";
			$sqlcount .= " AND a.usertype='$query[usertype]'";
		}
		
	
		$sql .= "  ORDER BY a.usertype,a.parentid,a.ID ";
		$result = $this->db->exceuteQuery($sql);
		if (!$this->isTotalRows)//获取记录数
		{
			    $this->setTotalRow($this->buildTotalRow($sqlcount));
				$this->isTotalRows = true;
			
		}
		$result = $this->QueryForPageSplit($sql, $currpage, $numbersperpage);
		return $result;
		
	}
	/**
	 * 通过ID查找指定的模块
	 * Enter description here ...
	 * @param unknown_type $pid
	 */
	function getAllModulesByID($mid=null)
	{
		$sql = "
		SELECT a.*,b.modulename parentname FROM 
		m_backmodules a  
		INNER JOIN m_backmodules b ON a.parentid=b.ID
		WHERE a.nodetype='1' AND b.nodetype='0' AND b.parentid ='99999' ";
		
		if (!empty($mid))
		{
			$sql .= " AND a.ID='$mid'";
		}
		$sql .= "  ORDER BY a.usertype,a.ID ";
		$result = $this->db->exceuteQuery($sql);
		return $result;
	}
	/**
	 * 通过父ID查找所有的模块
	 * Enter description here ...
	 * @param unknown_type $pid
	 */
	function getAllModulesByParentID($pid=null)
	{
		$sql = "
		SELECT a.*,b.modulename parentname FROM 
		m_backmodules a  
		INNER JOIN m_backmodules b ON a.parentid=b.ID
		WHERE a.nodetype='1' AND b.nodetype='0' AND b.parentid ='99999' ";
		
		if (!empty($pid))
		{
			$sql .= " AND a.parentid='$pid'";
		}
		$sql .= "  ORDER BY a.usertype,a.ID ";
		$result = $this->db->exceuteQuery($sql);
		return $result;
	}
	/**
	 * 获取所有的上级节点
	 * 
	 */
	function getAllTopModules()
	{
		$sql = "
		SELECT * FROM  m_backmodules WHERE nodetype='0'  ORDER BY usertype ";

		$result = $this->db->exceuteQuery($sql);
		return $result;
	}
	/**
	 * 删除
	 * 
	 * @param unknown_type $mid
	 */
	function deleteModules($mid)
	{
		parent::DeleteLogical(m_backmodules,"d.ID='$mid'");
	}
	/**
	 * 再次启动指定的模块
	 * Enter description here ...
	 * @param unknown_type $mid
	 */
	function reuseModule($mid)
	{
		$sql = "update m_backmodules u SET u.delflag='0'  WHERE u.ID='$mid'";
		return $this->db->exceuteUpdate($sql);
	}
	function insertModules($data)
	{
		parent::Insert('m_backmodules', $data);
	}
	function updateModules($data,$mid)
	{
		parent::Update('m_backmodules', $data,"u.id='$mid'");
	}
	
}

?>