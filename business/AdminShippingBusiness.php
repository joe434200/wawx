<?php
require_once('BaseBusiness.php');
require_once('DateUtil.php');
require_once('SupportException.php');
require_once('SessionUtil.php');
require_once('PageSplitBusiness.php');

/**
 * 
 *配送方式管理
 * @author Administrator
 *
 */
class AdminShippingBusiness extends PageSplitBusiness
{

	function getAllShipping($currpage=null,$numbersperpage=null)
	{
		return parent::simplyQuery('m_shipping',$currpage,$numbersperpage);
		/*$sql = "
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
	 * 通过ID查找指定的活动分类
	 * Enter description here ...
	 * @param unknown_type $pid
	 */
	function getOneShippingByID($id=null)
	{
		return parent::simplyQueryOne('m_shipping',$id);
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
	function deleteShipping($id)
	{
		parent::Delete('m_shipping',"d.ID='$id'");
	}
	function insertShipping($data)//key,value,key字段名，value，就是对应的值
	{
		parent::Insert('m_shipping', $data);
	}
	function updateShipping($data,$id)
	{
		parent::Update('m_shipping', $data,"u.id='$id'");
	}
	
}

?>