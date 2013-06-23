<?php
require_once('BaseBusiness.php');
require_once('DateUtil.php');
require_once('SupportException.php');
require_once('SessionUtil.php');
require_once('PageSplitBusiness.php');






class OrderRecordBusiness extends PageSplitBusiness
{
	
	function getAllOrders($currpage=null,$numbersperpage=null)
	{
		$sql = "
		SELECT a.* ,b.goodsname
		FROM  t_order_record a 
		INNER JOIN t_goods b 
		ON a.idt_goods=b.ID";
		
		$sqlcount = "
		SELECT COUNT(1) FROM  t_order_record  ";

		$sql .= " ORDER BY a.ID ";
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
	 * 通过ID查找指定的订单明细
	 * Enter description here ...
	 * @param unknown_type $pid
	 */
	function getOneOrderRecordByID($id=null,$userid=null,$currpage=null,$numbersperpage=null)
	{
		$sql = "
		SELECT a.* 
		FROM  t_order_record a 
		INNER JOIN t_shopinfo b
		ON a.shopid=b.ID  ";//把店铺的信息全都链接过去 只为找到对应user的订单内容
		$sqlcount = "
		SELECT COUNT(1) FROM  t_order_record ";
		
		if (!empty($id))
		{
			$sql .= "WHERE  a.idt_order_info='$id' ";
			$sql .= "AND  b.idt_user='$userid' ";
		}
		$sql .= "ORDER BY a.ID ";
		$result = $this->db->exceuteQuery($sql);
		if (!$this->isTotalRows)//获取记录数
		{
			    $this->setTotalRow($this->buildTotalRow($sqlcount));
				$this->isTotalRows = true;
			
		}
		$result = $this->QueryForPageSplit($sql, $currpage, $numbersperpage);
		return $result;
	}
	function getOneOrderRecordByIDNP($id=null,$userid=null)
	{
		$sql = "
		SELECT a.*
		FROM  t_order_record a 
		INNER JOIN t_shopinfo b
		ON a.shopid=b.ID  ";//把店铺的信息全都链接过去 只为找到对应user的订单内容
		$sqlcount = "
		SELECT COUNT(1) FROM  t_order_record ";
		
		if (!empty($id))
		{
			$sql .= "WHERE  a.idt_order_info='$id' ";
			$sql .= "AND  b.idt_user='$userid' ";
		}
		$sql .= "ORDER BY a.ID ";
		$result = $this->db->exceuteQuery($sql);
		return $result;
	}
	
    
	/**
	 * 删除
	 * 
	 * @param unknown_type $mid
	 */
	function deleteOrders($id)
	{
		parent::Delete('t_order_record',"d.ID='$id'");
	}
	
	
	function insertOrders($data)
	{
		parent::Insert('t_order_record', $data);
	}
	
	
	
	function updateOrderRecord($data,$id)
	{
		parent::Update('t_order_record', $data,"u.id='$id'");
	}
	
	
}

?>