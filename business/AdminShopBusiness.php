<?php
require_once('BaseBusiness.php');
require_once('DateUtil.php');
require_once('SupportException.php');
require_once('SessionUtil.php');
require_once('PageSplitBusiness.php');

/**
 * 
 * 店铺-管理-主要是审核
 * @author Administrator
 *
 */
class AdminShopBusiness extends PageSplitBusiness
{

function getAllShopList($currpage=null,$numbersperpage=null,$query=null)
	{
		$sql = "
		SELECT 
		a.*
		,b.shopname businame
		,b.scope
		,b.chargeperson
		,b.contactphone
		,b.storeaddr
		,b.busilicence userlicence
		FROM t_shopinfo a
		INNER JOIN t_user b ON a.idt_user = b.ID
		WHERE b.usertype='1' AND b.verifystate = '2'
		";
		
		$sqlcount = "
		SELECT COUNT(1) 
		FROM t_shopinfo a
		INNER JOIN t_user b ON a.idt_user = b.ID
		WHERE b.usertype='1' AND b.verifystate = '2'
	
		";
		
		$sqlwhere = "";
		if (!empty($query))
		{
			/*if (!empty($query['usertype']) || $query['usertype'] =='0')
			{
				$sqlwhere .= "  AND a.usertype = '$query[usertype]'";
			}*/
			if (!empty($query['businame']))
			{
				$sqlwhere .= "  AND b.shopname LIKE '%$query[businame]%'";
			}
			if (!empty($query['shopname']))
			{
				$sqlwhere .= "  AND a.shopname LIKE '%$query[shopname]%'";
			}
			if (!empty($query['telephone']))
			{
				$sqlwhere .= "  AND a.telephone LIKE '%$query[telephone]%'";
			}
			if (!empty($query['address']))
			{
				$sqlwhere .= "  AND a.address LIKE '%$query[address]%'";
			}
			if (!empty($query['busline']))
			{
				$sqlwhere .= "  AND a.busline LIKE '%$query[busline]%'";
			}
			/*if (!empty($query['shopname']))
			{
				$sqlwhere .= "  AND a.shopname LIKE '%$query[shopname]%'";
			}
			if (!empty($query['scope']))
			{
				$sqlwhere .= "  AND a.scope LIKE '%$query[scope]%'";
			}
			if (!empty($query['chargeperson']) )
			{
				$sqlwhere .= "  AND a.chargeperson LIKE '%$query[chargeperson]%'";
			}*/
		}
		$sql .= $sqlwhere;
		$sqlcount .= $sqlwhere;

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
	function getShopInfo($id)
	{
		$sql = "
		SELECT 
		a.*
		,b.shopname businame
		,b.scope
		,b.chargeperson
		,b.contactphone
		,b.storeaddr
		,b.busilicence userlicence
		,c.name countryname
		,d.name provincename
		,e.name cityname
		,f.name skirtname
		FROM t_shopinfo a
		INNER JOIN t_user b ON a.idt_user = b.ID
		LEFT JOIN m_city c  ON c.ID=a.idm_city1
		LEFT JOIN m_city d  ON d.ID=a.idm_city2
		LEFT JOIN m_city e  ON e.ID=a.idm_city3
		LEFT JOIN m_city f  ON f.ID=a.idm_city4
		WHERE b.usertype='1' AND b.verifystate = '2'  AND a.ID='$id'";
		$rs = $this->db->exceuteQuery($sql);
		return $rs[0];
	}
	function getLicence($id)
	{
		$sql = "SELECT busilicence  FROM t_shopinfo WHERE ID='$id'";
		$rs = $this->db->exceuteQuery($sql);
		return $rs[0]['busilicence'];
	}
	
	function getCommentOfShopByShopID($shopid,$currpage=null,$numbersperpage=null,$query=null)
	{
		$sql = "
		SELECT a.*  
		
		
		FROM 
		t_shop_comment a
		
		WHERE a.idt_shopinfo='$shopid'";
		
		$sqlcount = "
		SELECT COUNT(1) 
		FROM 
		t_shop_comment a
		WHERE a.idt_shopinfo='$shopid'";

		
		
		$sqlwhere = "";
		if (!empty($query))
		{
			/*if (!empty($query['usertype']) || $query['usertype'] =='0')
			{
				$sqlwhere .= "  AND a.usertype = '$query[usertype]'";
			}*/
			if (!empty($query['username']))
			{
				$sqlwhere .= "  AND b.username LIKE '%$query[username]%'";
			}
			if (!empty($query['commentrank']) || $query['commentrank'] == '0')
			{
				$sqlwhere .= "  AND a.commentrank = '$query[commentrank]'";
			}
			if (!empty($query['service']) || $query['service'] == '0')
			{
				$sqlwhere .= "  AND a.service = '$query[service]'";
			}
			if (!empty($query['taste']) || $query['taste'] == '0')
			{
				$sqlwhere .= "  AND a.taste = '$query[taste]'";
			}
			if (!empty($query['environment']) || $query['environment'] == '0')
			{
				$sqlwhere .= "  AND a.environment = '$query[environment]'";
			}
			if (!empty($query['costperformance']) || $query['costperformance'] == '0')
			{
				$sqlwhere .= "  AND a.costperformance = '$query[costperformance]'";
			}
			if (!empty($query['commenttime_from']))
			{
				$sqlwhere .= "  AND a.commenttime >= '$query[commenttime_from]'";
			}
			if (!empty($query['commenttime_to']))
			{
				$sqlwhere .= "  AND a.commenttime <= '$query[commenttime_to]'";
			}
			
		}
		$sql .= $sqlwhere;
		$sqlcount .= $sqlwhere;
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
	
	function deleteComment($id)
	{
		return parent::Delete('t_shop_comment',"d.ID='$id'");
	}
	function  setCommentVisible($id,$status)
	{
		return parent::Update('t_shop_comment', array('isshow'=>$status),"u.ID='$id'");
	}
	
	
	function audit($id,$data)//审核
	{
		parent::Update('t_shopinfo', $data,"u.id='$id'");
	}
	function closeShop($id,$data)
	{
		return parent::Update('t_shopinfo', $data,"u.id='$id'");
	}
	function deleteShop($id,$status)
	{
		return parent::Update('t_shopinfo', array('isdelete'=>$status),"u.ID='$id'");
	}
	function addShop($data)
	{
		return parent::Insert('t_shopinfo', $data);
	}
	function editShop($id,$data)
	{
		return parent::Update('t_shopinfo', $data,"u.id='$id'");
	}
	function getMyAllshopList($uid)
	{
		$sql = "
		SELECT 
		a.*
		,c.name countryname
		,d.name provincename
		,e.name cityname
		,f.name skirtname
		
		FROM t_shopinfo a
		LEFT JOIN m_city c  ON c.ID=a.idm_city1
		LEFT JOIN m_city d  ON d.ID=a.idm_city2
		LEFT JOIN m_city e  ON e.ID=a.idm_city3
		LEFT JOIN m_city f  ON f.ID=a.idm_city4
		
		WHERE a.idt_user='$uid' AND a.verifystate='2'";
		$result = $this->db->exceuteQuery($sql);
		return $result;
	}
	//获取我开的所有的店铺
	function getMyShopList($uid,$currpage=null,$numbersperpage=null,$query=null)
	{
		$sql = "
		SELECT 
		a.*
		,c.name countryname
		,d.name provincename
		,e.name cityname
		,f.name skirtname
		
		FROM t_shopinfo a
		LEFT JOIN m_city c  ON c.ID=a.idm_city1
		LEFT JOIN m_city d  ON d.ID=a.idm_city2
		LEFT JOIN m_city e  ON e.ID=a.idm_city3
		LEFT JOIN m_city f  ON f.ID=a.idm_city4
		
		WHERE a.idt_user='$uid'";
		
		$sqlcount = "
		SELECT COUNT(1) 
		FROM t_shopinfo a
		LEFT JOIN m_city c  ON c.ID=a.idm_city1
		LEFT JOIN m_city d  ON d.ID=a.idm_city2
		LEFT JOIN m_city e  ON e.ID=a.idm_city3
		LEFT JOIN m_city f  ON f.ID=a.idm_city4
		
		WHERE a.idt_user='$uid'";
		
		$sqlwhere = "";
		if (!empty($query))
		{
			if (!empty($query['shopname']))
			{
				$sqlwhere .= "  AND a.shopname LIKE '%$query[shopname]%'";
			}
			if (!empty($query['telephone']))
			{
				$sqlwhere .= "  AND a.telephone LIKE '%$query[telephone]%'";
			}
			if (!empty($query['address']))
			{
				$sqlwhere .= "  AND a.address LIKE '%$query[address]%'";
			}
			if (!empty($query['busline']))
			{
				$sqlwhere .= "  AND a.busline LIKE '%$query[busline]%'";
			}
			
		}
		$sql .= $sqlwhere;
		$sqlcount .= $sqlwhere;

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
	
	
	
	
	
	
	
}

?>