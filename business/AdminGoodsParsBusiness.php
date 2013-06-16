<?php
require_once('BaseBusiness.php');
require_once('DateUtil.php');
require_once('SupportException.php');
require_once('SessionUtil.php');
require_once('PageSplitBusiness.php');

/**
 * 
 * 商品参数管理
 * @author Administrator
 *
 */
class AdminGoodsParsBusiness extends PageSplitBusiness
{

	function getAllGoodsPars($currpage=null,$numbersperpage=null)
	{
		
		return parent::simplyQuery_parent('m_goods_parameter','optionname',$currpage,$numbersperpage);
		/*$sql = "
		SELECT a.* FROM  m_goods_parameter a  
		
		";
		
		$sqlcount = "
		SELECT COUNT(1) FROM  m_goods_parameter a
		
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
	function  getLevel1List()
	{
		return parent::simplyLevel1List('m_goods_parameter');
	}
	
	/**
	 * 通过ID查找指定的商品参数
	 * Enter description here ...
	 * @param unknown_type $pid
	 */
	function getOneGoodsParsByID($id=null)
	{
		return parent::simplyQueryOne('m_goods_parameter',$id);
		
		/*$sql = "
		SELECT a.* FROM  m_goods_parameter a  WHERE 1=1 ";
		
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
	function deleteGoodsPars($id)
	{
		parent::Delete('m_goods_parameter',"d.ID='$id'");
	}
	function insertGoodsPars($data)//key,value,key字段名，value，就是对应的值
	{
		parent::Insert('m_goods_parameter', $data);
	}
	function updateGoodsPars($data,$id)
	{
		parent::Update('m_goods_parameter', $data,"u.id='$id'");
	}
	
}

?>