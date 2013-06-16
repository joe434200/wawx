<?php
require_once('BaseBusiness.php');
require_once('DateUtil.php');
require_once('SupportException.php');
require_once('SessionUtil.php');
require_once('PageSplitBusiness.php');






class AdminPrizeBusiness extends PageSplitBusiness
{
	
	function getAllInfor($currpage=null,$numbersperpage=null)
	{
		$sql = "SELECT m.*,
					a.goodsname goodsnames,
					a.goodsdesc goodsdescs,
					a.newimg  imageurls,
					b.activityintroduce name
		 			FROM t_goods a 
		 			
		 			INNER JOIN t_prize_set m ON m.goodsid= a.ID
		 			INNER JOIN t_lottery_activity b ON b.ID=m.idt_lottery_activity
		 		";
		
		$sqlcount = "
		SELECT COUNT(1) FROM  t_prize_set  ";

		$sql .= "  ORDER BY a.ID ";
		$result = $this->db->exceuteQuery($sql);
		if (!$this->isTotalRows)//获取记录数
		{
			    $this->setTotalRow($this->buildTotalRow($sqlcount));
				$this->isTotalRows = true;
			
		}
		
		$result = $this->QueryForPageSplit($sql, $currpage, $numbersperpage);
		foreach($result as $key => $value)
		{
			$result[$key]['imageurls'] = "./uploadfiles/goods/".$value['imageurls'];
		}
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
		SELECT a.* FROM  t_prize_set a  WHERE 1=1 ";
		
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
		parent::Delete('t_prize_set',"d.ID='$id'");
	}
	
	
	function insertInfor($data)
	{
		parent::Insert('t_prize_set', $data);
	}
	
	
	
	function updateInfor($data,$id)
	{
		parent::Update('t_prize_set', $data,"u.id='$id'");
	}
	
	
}

?>