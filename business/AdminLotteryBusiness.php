<?php
require_once('BaseBusiness.php');
require_once('DateUtil.php');
require_once('SupportException.php');
require_once('SessionUtil.php');
require_once('PageSplitBusiness.php');






class AdminLotteryBusiness extends PageSplitBusiness
{
	
	function getAllInfor($currpage=null,$numbersperpage=null)
	{
		$sql = "
		SELECT a.* FROM  t_lottery_activity a ";
		
		$sqlcount = "
		SELECT COUNT(1) FROM  t_lottery_activity  ";

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
	function getOneInforByID($id=null)//$id=&item.ID;
	{
		$sql = "
		SELECT a.* FROM  t_lottery_activity a  WHERE 1=1 ";
		
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
	function deleteInfor($id)
	{
		parent::Delete('t_lottery_activity',"d.ID='$id'");
	}
	
	
	function insertInfor($data)
	{
		parent::Insert('t_lottery_activity', $data);
	}
	
	
	
	function updateInfor($data,$id)
	{
		parent::Update(' t_lottery_activity', $data,"u.id='$id'");
	}
	
	
	//更新商品表中得对应商品数量
	function updateGoodsNum($num,$id)
	{
		$this->sql = "UPDATE t_goods u SET u.goodsnumber=u.goodsnumber-'$num' WHERE u.ID='$id'";
		$result = $this->db->exceuteQuery($this->sql);
		return $result;
	}
	
	
}

?>