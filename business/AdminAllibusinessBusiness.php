<?php
require_once('BaseBusiness.php');
require_once('DateUtil.php');
require_once('SupportException.php');
require_once('SessionUtil.php');
require_once('PageSplitBusiness.php');

/**
 * 
 * 联盟商家管理
 * @author Administrator
 *
 */
class AdminAllibusinessBusiness extends PageSplitBusiness
{

	function getAllAlliBusiness($currpage=null,$numbersperpage=null)
	{
		return parent::simplyQuery('m_allibusiness',$currpage,$numbersperpage);
		
		
		/*$sql = "
		SELECT a.* FROM  m_allibusiness a  
		
		";
		
		$sqlcount = "
		SELECT COUNT(1) FROM  m_allibusiness a
		
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
	 * 通过ID查找指定的活动分类
	 * Enter description here ...
	 * @param unknown_type $pid
	 */
	function getOneAlliBusinessByID($id=null)
	{
		return parent::simplyQueryOne('m_allibusiness',$id);
		/*$sql = "
		SELECT a.* FROM  m_allibusiness a  WHERE 1=1 ";
		
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
	function deleteAlliBusiness($id)
	{
		parent::Delete('m_allibusiness',"d.ID='$id'");
	}
	function insertAlliBusiness($data)//key,value,key字段名，value，就是对应的值
	{
		parent::Insert('m_allibusiness', $data);
	}
	function updateAlliBusiness($data,$id)
	{
		parent::Update('m_allibusiness', $data,"u.id='$id'");
	}
	
}

?>