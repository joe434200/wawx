<?php
require_once('BaseBusiness.php');
require_once('DateUtil.php');
require_once('SupportException.php');
require_once('SessionUtil.php');
require_once('PageSplitBusiness.php');

/**
 * 
 * 圈子话题分类管理
 * @author Administrator
 *
 */
class AdminGroupTopicCatalogBusiness extends PageSplitBusiness
{
	/**
	 * 
	 * 获取所有的圈子话题分类
	 * @param unknown_type $currpage:当前页
	 * @param unknown_type $numbersperpage，每页的记录数
	 * @return unknown
	 */
	function getAllGrpTopicType($currpage=null,$numbersperpage=null)
	{
		$sql = "
		SELECT 
		a.*
		,b.name parentname 
		FROM  m_grptopic_catalog a  
		LEFT JOIN m_grptopic_catalog b ON b.ID = a.parentid
		
		";
		
		$sqlcount = "
		SELECT COUNT(1) FROM  m_grptopic_catalog a  ";

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
	function getOneGrpTopicTypeByID($id=null)
	{
		$sql = "
		SELECT a.* FROM  m_grptopic_catalog a  WHERE 1=1";
		
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
	function deleteGrpTopicType($id)
	{
		parent::Delete('m_grptopic_catalog',"d.ID='$id'");
	}
	function insertGrpTopicType($data)//key,value,key字段名，value，就是对应的值
	{
		parent::Insert('m_grptopic_catalog', $data);
	}
	function updateGrpTopicType($data,$id)
	{
		parent::Update('m_grptopic_catalog', $data,"u.id='$id'");
	}
	
	//获取一级的圈子话题分类
	function getGrpTopicType()
	{
		$this->sql = "SELECT m.* FROM m_grptopic_catalog m WHERE m.parentid='99999'";
		$rs = $this->db->exceuteQuery($this->sql);
		return $rs;
	}
}

?>