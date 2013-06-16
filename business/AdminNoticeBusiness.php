<?php
require_once('BaseBusiness.php');
require_once('DateUtil.php');
require_once('SupportException.php');
require_once('SessionUtil.php');
require_once('PageSplitBusiness.php');






class AdminNoticeBusiness extends PageSplitBusiness
{
	
	function getAllNotices($currpage=null,$numbersperpage=null)
	{
		$sql = "
		SELECT a.* FROM  t_notice a ";
		
		$sqlcount = "
		SELECT COUNT(1) FROM  t_notice  ";

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
	function getOneNoticeByID($id=null)//$id=&item.ID;
	{
		$sql = "
		SELECT a.* FROM  t_notice a  WHERE 1=1 ";
		
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
	function deleteNotices($id)
	{
		parent::Delete('t_notice',"d.ID='$id'");
	}
	
	
	function insertNotices($data)
	{
		parent::Insert('t_notice', $data);
	}
	
	
	
	function updateNotices($data,$id)
	{
		parent::Update(' t_notice', $data,"u.id='$id'");
	}
	
	
}

?>