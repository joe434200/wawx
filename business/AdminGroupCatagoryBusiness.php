<?php
require_once('BaseBusiness.php');
require_once('DateUtil.php');
require_once('SupportException.php');
require_once('SessionUtil.php');
require_once('PageSplitBusiness.php');





class AdminGroupCatagoryBusiness extends PageSplitBusiness
{
	
	function getAllGroups($currpage=null,$numbersperpage=null)
	{
		$sql = "
		SELECT a.*,m.name parentname FROM  m_grp_catalog a LEFT JOIN m_grp_catalog m ON m.ID = a.parentid ";
		
		$sqlcount = "
		SELECT COUNT(1) FROM  m_grp_catalog a LEFT JOIN m_grp_catalog m ON m.ID = a.parentid ";

		$sql .= "  ORDER BY a.ID ";
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
	function getOneGroupByID($id=null)//$id=&item.ID;
	{
		$sql = "
		SELECT a.* FROM  m_grp_catalog a  WHERE 1=1 ";
		
		if (!empty($id))
		{
			$sql .= " AND a.ID='$id'";
		}
		$sql .= "  ORDER BY a.ID ";
		$result = $this->db->exceuteQuery($sql);
		return $result;
	}
	
	
	/**
	 * 删除
	 * 
	 * @param unknown_type $mid
	 */
	function deleteModules($id)
	{
		parent::Delete('m_grp_catalog',"d.ID='$id'");
	}
	function insertModules($data)
	{
		parent::Insert(' m_grp_catalog', $data);
	}
	function updateModules($data,$id)
	{
		parent::Update(' m_grp_catalog', $data,"u.id='$id'");
	}
	
	//获取一级圈子
	function getParentCatalog()
	{
		$this->sql = "SELECT m.*
					FROM m_grp_catalog m 
					WHERE m.parentid='99999'";
		$result =  $this->db->exceuteQuery($this->sql);
		return $result;
	}//OK
	function insertGroups($data)//key,value,key字段名，value，就是对应的值
	{
		parent::Insert('m_grp_catalog', $data);
	}//OK
	function updateGroups($data,$id)
	{
		parent::Update('m_grp_catalog', $data,"u.id='$id'");
	}
	
}

?>