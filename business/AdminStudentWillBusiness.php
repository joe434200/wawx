<?php
require_once('BaseBusiness.php');
require_once('DateUtil.php');
require_once('SupportException.php');
require_once('SessionUtil.php');
require_once('PageSplitBusiness.php');

/**
 * 
 * 学生惠分类管理
 * @author Administrator
 *
 */
class AdminStudentWillBusiness extends PageSplitBusiness
{

	function getAllStudentWill($currpage=null,$numbersperpage=null)
	{
		return parent::simplyQuery_parent('m_students_will', 'name',$currpage,$numbersperpage);
		/*
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
		return $result;*/
		
	}
	/**
	 * 查询所有的一级分类
	 * Enter description here ...
	 */
	function getLevel1List()
	{
		return parent::simplyLevel1List('m_students_will');
		/*$sql = "
		SELECT a.* FROM  m_act_catalog a 
		WHERE a.parentid='99999' 
		";
		$result = $this->db->exceuteQuery($sql);
		return $result;*/
	}
	/**
	 * 通过ID查找指定的活动分类
	 * Enter description here ...
	 * @param unknown_type $pid
	 */
	function getOneStudentWillByID($id=null)
	{
		return parent::simplyQueryOne('m_students_will',$id);
		/*$sql = "
		SELECT a.* FROM  m_act_catalog a  WHERE 1=1 ";
		
		if (!empty($id))
		{
			$sql .= " AND a.ID='$id'";
		}
		$sql .= "  ORDER BY a.ID ";
		$result = $this->db->exceuteQuery($sql);
		return $result;*/
	}
	
	
	/**
	 * 删除
	 * 
	 * @param unknown_type $mid
	 */
	function deleteStudentWill($id)
	{
		parent::Delete('m_students_will',"d.ID='$id'");
	}
	function insertStudentWill($data)//key,value,key字段名，value，就是对应的值
	{
		parent::Insert('m_students_will', $data);
	}
	function updateStudentWill($data,$id)
	{
		parent::Update('m_students_will', $data,"u.id='$id'");
	}
	
}

?>