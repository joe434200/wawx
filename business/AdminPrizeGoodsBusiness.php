<?php
require_once('BaseBusiness.php');
require_once('DateUtil.php');
require_once('SupportException.php');
require_once('SessionUtil.php');
require_once('PageSplitBusiness.php');






class AdminPrizeGoodsBusiness extends PageSplitBusiness
{
	
	function getAllGoodsInfor($currpage=null,$numbersperpage=null)
	{
		$sql = "
		SELECT a.* FROM  t_goods a WHERE 1=1 AND a.isonsale='0'";
		
		$sqlcount = "
		SELECT COUNT(1) FROM  t_goods  ";

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
			$result[$key]['newimg'] = "./uploadfiles/goods/".$value['newimg'];//key就表示第几行，value表示当前行 
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
		SELECT a.* FROM t_goods a  WHERE 1=1 ";
		
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
		parent::Delete('t_goods',"d.ID='$id'");
	}
	
	
	function insertInfor($data)
	{
		parent::Insert('t_goods', $data);
	}
	
	
	
	function updateInfor($data,$id)
	{
		parent::Update('t_goods', $data,"u.id='$id'");
	}
	
	
}

?>