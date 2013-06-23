<?php
require_once('BaseBusiness.php');
require_once('DateUtil.php');
require_once('SupportException.php');
require_once('SessionUtil.php');
require_once('PageSplitBusiness.php');






class orderBusiness extends PageSplitBusiness
{
	
	function getAllOrders($currpage=null,$numbersperpage=null)
	{
		$sql = "
		SELECT a.* FROM  t_order_info a ";
		
		$sqlcount = "
		SELECT COUNT(1) FROM  t_order_info  ";

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
	 * 通过ID查找指定的订单
	 * Enter description here ...
	 * @param unknown_type $pid
	 */
	function getOneOrderByID($id=null)//$id=&item.ID;
	{
		$sql = "
		SELECT a.* FROM  t_order_info a  WHERE 1=1 ";
		
		if (!empty($id))
		{
			$sql .= " AND a.ID='$id'";
		}
		$sql .= "  ORDER BY a.ID ";
		$result = $this->db->exceuteQuery($sql);
		return $result;
	}
	/*
	 * 更改订单列表的总金额
	 */
	function updateALLMONEY($money,$id)
	{
		$this->sql="UPDATE t_order_info a SET a.orderamount=a.orderamount+'$money' WHERE a.ID='$id'";
		$result = $this->db->exceuteQuery($this->sql);
		return $result;
	}
	
    
	/**
	 * 删除
	 * 
	 * @param unknown_type $mid
	 */
	function deleteOrders($id)
	{
		parent::Delete('t_order_info',"d.ID='$id'");
	}
	
	
	function insertOrders($data)
	{
		parent::Insert('t_order_info', $data);
	}
	
	
	
	function updateOrders($data,$id)
	{
		parent::Update('t_order_info', $data,"u.id='$id'");
	}
	
	function getUser_infors($id)//取得商家的信息//注意sql语句的双引号 没写它会提示re-declare
	{
		$sql="SELECT a.*
		      FROM t_user a
		      WHERE 1=1";
		if(!empty($id))
		{
			$sql .="   AND a.ID='$id'";
		}
        $result = $this->db->exceuteQuery($sql);
		return $result[0];
	}
	
	function getShoper_infors($id)//取得卖家的信息，仅仅通过订单号
	{
		$sql="SELECT a.*,b.nickname,b.email,b.mobile
		FROM t_order_info a 
		INNER JOIN t_user b
		ON b.ID=a.idt_user";
		if(!empty($id))
		{
			$sql .="  WHERE  a.ID='$id'";
		
		}
		$result = $this->db->exceuteQuery($sql);
	    return $result[0];
	}
}
