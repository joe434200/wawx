<?php
require_once('BaseBusiness.php');
require_once('DateUtil.php');
require_once('SupportException.php');
require_once('SessionUtil.php');
require_once('PageSplitBusiness.php');

/**
 * 
 * 活动分类管理
 * @author Administrator
 *
 */
class AdminActCatagoryBusiness extends PageSplitBusiness
{

	function getAllActCatagory($currpage=null,$numbersperpage=null)
	{
		$sql = "
		SELECT a.*,b.name parentname FROM  m_act_catalog a  
		LEFT JOIN m_act_catalog b ON a.parentid=b.ID
		";
		
		$sqlcount = "
		SELECT COUNT(1) FROM  m_act_catalog a
		LEFT JOIN m_act_catalog b ON a.parentid=b.ID  
		";

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
	 * 查询所有的一级分类
	 * Enter description here ...
	 */
	function getLevel1List()
	{
		$sql = "
		SELECT a.* FROM  m_act_catalog a 
		WHERE a.parentid='99999' 
		";
		$result = $this->db->exceuteQuery($sql);
		return $result;
	}
	/**
	 * 通过ID查找指定的活动分类
	 * Enter description here ...
	 * @param unknown_type $pid
	 */
	function getOneAcCatagorytByID($id=null)
	{
		$sql = "
		SELECT a.* FROM  m_act_catalog a  WHERE 1=1 ";
		
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
	function deleteActCatagory($id)
	{
		parent::Delete('m_act_catalog',"d.ID='$id'");
	}
	function insertActCatagory($data)//key,value,key字段名，value，就是对应的值
	{
		parent::Insert('m_act_catalog', $data);
	}
	function updateActCatagory($data,$id)
	{
		parent::Update('m_act_catalog', $data,"u.id='$id'");
	}
	
}

?>