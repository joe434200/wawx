<?php
require_once('BaseBusiness.php');
require_once('DateUtil.php');
require_once('SupportException.php');
require_once('SessionUtil.php');
require_once('PageSplitBusiness.php');

/**
 * 
 *支付方式管理
 * @author Administrator
 *
 */
class AdminPaymentBusiness extends PageSplitBusiness
{
	/**
	 * 
	 * 获取所有的支付方式
	 * @param unknown_type $currpage:当前页
	 * @param unknown_type $numbersperpage，每页的记录数
	 * @return unknown
	 */
	function getAllPayments($currpage=null,$numbersperpage=null)
	{
		return parent::simplyQuery('m_payment',$currpage,$numbersperpage);
		/*$sql = "
		SELECT a.* FROM  m_payment a  ";
		
		$sqlcount = "
		SELECT COUNT(1) FROM  m_payment a  ";

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
	 * 通过ID查找指定的模块
	 * Enter description here ...
	 * @param unknown_type $pid
	 */
	function getOnePaymentByID($id=null)
	{
		return parent::simplyQueryOne('m_payment',$id);
		/*$sql = "
		SELECT a.* FROM  m_payment a  WHERE 1=1 ";
		
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
	function deleteModules($id)
	{
		parent::Delete('m_payment',"d.ID='$id'");
	}
	function insertModules($data)//key,value,key字段名，value，就是对应的值
	{
		parent::Insert('m_payment', $data);
	}
	function updateModules($data,$id)
	{
		parent::Update('m_payment', $data,"u.id='$id'");
	}
	
}

?>