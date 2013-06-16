<?php
require_once('BaseBusiness.php');
require_once('DateUtil.php');
require_once('SupportException.php');
require_once('SessionUtil.php');
require_once('PageSplitBusiness.php');

/**
 * 
 * 商品-管理
 * @author Administrator
 *
 */
class AdminShopGoodsBusiness extends PageSplitBusiness
{
	function getAllShopGoodsList($currpage=null,$numbersperpage=null,$query=null)
	{
		$sql = "
		SELECT 
		a.*
		,b.shopname
		,b.idt_user
		,b.telephone
		,b.address
		,b.summary
		,b.mapurl
		,b.busline
		
		
		FROM t_goods a
		LEFT JOIN t_shopinfo b ON a.shopid = b.ID
		LEFT JOIN t_user c ON c.ID = b.idt_user AND c.usertype='1' AND c.verifystate = '2'
		WHERE 1=1
		";
		
		$sqlcount = "
		SELECT COUNT(1) 
		FROM t_goods a
		LEFT JOIN t_shopinfo b ON a.shopid = b.ID
		LEFT JOIN t_user c ON c.ID = b.idt_user AND c.usertype='1' AND c.verifystate = '2'
		WHERE 1=1
	
		";
		
		$sqlwhere = "";
		if (!empty($query))
		{
			/*if (!empty($query['usertype']) || $query['usertype'] =='0')
			{
				$sqlwhere .= "  AND a.usertype = '$query[usertype]'";
			}*/
			if (!empty($query['shopname']))
			{
				$sqlwhere .= "  AND b.shopname LIKE '%$query[shopname]%'";
			}
			if (!empty($query['goodsname']))
			{
				$sqlwhere .= "  AND a.goodsname LIKE '%$query[goodsname]%'";
			}
			if (!empty($query['ispromote']))
			{
				$sqlwhere .= "  AND a.ispromote = '$query[ispromote]'";
			}
			if (!empty($query['isout']))
			{
				$sqlwhere .= "  AND a.isout = '$query[isout]'";
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
		$result = $this->changeGoodsPar($result);
		
		return $result;
		
	}
	function changeGoodsPar($data)
	{
		foreach ($data as &$item)
		{
			$item['goodsparamenter'] = explode(";", $item['goodsparamenter']);
		}
		return $data;
	}
	function addGoodsPhoto($data)
	{
		parent::Insert('t_goods_pic', $data);
	}
	function getGoodsPhotoList($id)
	{
		$sql = "
		SELECT 
		a.*
		
		FROM t_goods_pic a
		WHERE a.idt_goods='$id'  AND a.pictype='1'
		";
		$rs = $this->db->exceuteQuery($sql);
		return $rs;
	}
	function deleteGoodsPhoto($id)
	{
		parent::Delete('t_goods_pic',"d.ID='$id'");
	}
	function getShopGoodsInfo($id)
	{
		$sql = "
		SELECT 
		a.*
		
		FROM t_goods a
		WHERE a.ID='$id'
		";
		$rs = $this->db->exceuteQuery($sql);
		return $rs;
	}
	
	
	function getCommentOfGoodsByGoodsID($goodsid,$currpage=null,$numbersperpage=null,$query=null)
	{
		$sql = "
		SELECT a.*  
		
		
		FROM 
		t_goods_comment a
		
		WHERE a.idt_goods='$goodsid'";
		
		$sqlcount = "
		SELECT COUNT(1) 
		FROM 
		t_goods_comment a
		
		WHERE a.idt_goods='$goodsid'";

		
		
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
			if (!empty($query['stars']) || $query['stars'] == '0')
			{
				$sqlwhere .= "  AND a.stars = '$query[stars]'";
			}
			
			
			if (!empty($query['score']) )
			{
				$sqlwhere .= "  AND a.score = '$query[score]'";
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
		return parent::Delete('t_goods_comment',"d.ID='$id'");
	}
	function  setCommentVisible($id,$status)
	{
		return parent::Update('t_goods_comment', array('isshow'=>$status),"u.ID='$id'");
	}
	
	
	
	function deleteGoods($id,$status)
	{
		$this->deleteGoodsPhoto($id);
		return parent::Update('t_goods', array('isdelete'=>$status),"u.ID='$id'");
	}
	function addGoods($data)
	{
		return parent::Insert('t_goods', $data);
	}
	function editGoods($id,$data)
	{
		return parent::Update('t_goods', $data,"u.id='$id'");
	}
	//获取我开的所有的店铺
	function getMyShopGoodsList($uid,$currpage=null,$numbersperpage=null,$query=null)
	{
		$sql = "
		SELECT 
		a.*
		,b.shopname
		,b.idt_user
		,b.telephone
		,b.address
		,b.summary
		,b.mapurl
		,b.busline
		
		
		
		FROM t_goods a
		INNER JOIN t_shopinfo b ON a.shopid = b.ID
		INNER JOIN t_user c ON c.ID = b.idt_user AND b.idt_user='$uid'
		WHERE c.usertype='1' AND c.verifystate = '2' AND a.goodstype='1' AND a.isdelete='0'
		";
		
		$sqlcount = "
		SELECT COUNT(1) 
		FROM t_goods a
		INNER JOIN t_shopinfo b ON a.shopid = b.ID
		INNER JOIN t_user c ON c.ID = b.idt_user AND b.idt_user='$uid'
		WHERE c.usertype='1' AND c.verifystate = '2' AND a.goodstype='1' AND a.isdelete='0'
	
		";
		
		$sqlwhere = "";
		if (!empty($query))
		{
			/*if (!empty($query['usertype']) || $query['usertype'] =='0')
			{
				$sqlwhere .= "  AND a.usertype = '$query[usertype]'";
			}*/
			if (!empty($query['shopname']))
			{
				$sqlwhere .= "  AND b.shopname LIKE '%$query[shopname]%'";
			}
			if (!empty($query['goodsname']))
			{
				$sqlwhere .= "  AND a.goodsname LIKE '%$query[goodsname]%'";
			}
			if (!empty($query['ispromote']) || $query['ispromote'] == '0')
			{
				$sqlwhere .= "  AND a.ispromote = '$query[ispromote]'";
			}
			if (!empty($query['isout']) || $query['isout'] == '0')
			{
				$sqlwhere .= "  AND a.isout = '$query[isout]'";
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
		$result = $this->changeGoodsPar($result);
		return $result;
	}
	
	
	
	function setStatus($id,$type,$status)
	{
		switch ($type)
		{
				case "1":
					$this->isNewGoods($id, $status);
				break;
				
				case "2":
					$this->isHotGoods($id, $status);
				break;
				case "3":
					$this->isOddsGoods($id, $status);
				break;
				case "4":
					$this->isGroupGoods($id, $status);
				break;
				case "5":
					$this->isSpecialGoods($id, $status);
					break;
				case "6":
					$this->isRecommendGoods($id, $status);
				break;
				
				
		}
	}

	function isNewGoods($id,$status)//是否推荐商品
	{
		parent::Update('t_goods', array('isnew'=>$status),"u.id='$id'");
	}
	
	function isRecommendGoods($id,$status)//是否推荐商品
	{
		parent::Update('t_goods', array('isbest'=>$status,'recommendtime'=>date('Y-m-d')),"u.id='$id'");
	}
	function isHotGoods($id,$status)//是否推荐商品
	{
		parent::Update('t_goods', array('ishot'=>$status),"u.id='$id'");
	}
	function isOddsGoods($id,$status)//是否推荐商品
	{
		parent::Update('t_goods', array('isodds'=>$status),"u.id='$id'");
	}
	function isGroupGoods($id,$status)//是否推荐商品
	{
		parent::Update('t_goods', array('isgroup'=>$status),"u.id='$id'");
	}
	function isSpecialGoods($id,$status)//是否推荐商品
	{
		parent::Update('t_goods', array('isspecial'=>$status),"u.id='$id'");
	}
	
	function getGoodsPars()
	{
		$sql = "SELECT * FROM m_goods_parameter WHERE parentid='99999'";
		$result = $this->db->exceuteQuery($sql);
		return $result;
	}
	
	
	
	
	
	
}

?>