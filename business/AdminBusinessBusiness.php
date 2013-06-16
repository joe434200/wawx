<?php
require_once('BaseBusiness.php');
require_once('DateUtil.php');
require_once('SupportException.php');
require_once('SessionUtil.php');
require_once('PageSplitBusiness.php');

/**
 * 
 * 商家管理
 * @author Administrator
 *
 */
class AdminBusinessBusiness extends PageSplitBusiness
{

function getAllUserList($currpage=null,$numbersperpage=null,$query=null)
	{
		$sql = "
		SELECT 
		ID
		,email
		,password
		,photo
		
		,shopname
		,scope
		,chargeperson
		,contactphone
		,storeaddr
		,busilicence 
		,remark
		,isbrand
		,isrecommend
		,recommendtime
		,ishot
		,verifystate
		,effecttime
		,applytime
		,verifytime
		,issignshop
		,isrecommendshop
		,iscertificationshop
		,isadvertshop
		
		
		FROM t_user a
		WHERE a.usertype='1'
		";
		
		$sqlcount = "
		SELECT COUNT(1) FROM  t_user a
		WHERE a.usertype='1'
	
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
				$sqlwhere .= "  AND a.shopname LIKE '%$query[shopname]%'";
			}
			if (!empty($query['chargeperson']))
			{
				$sqlwhere .= "  AND a.chargeperson LIKE '%$query[chargeperson]%'";
			}
			if (!empty($query['storeaddr']))
			{
				$sqlwhere .= "  AND a.storeaddr LIKE '%$query[storeaddr]%'";
			}
			if (!empty($query['scope']))
			{
				$sqlwhere .= "  AND a.scope LIKE '%$query[scope]%'";
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
	function getUserInfo($id)
	{
		$sql = "SELECT * FROM t_user WHERE ID='$id'";
		$rs = $this->db->exceuteQuery($sql);
		return $rs[0];
	}
	function getLicence($id)
	{
		$sql = "SELECT busilicence  FROM t_user WHERE ID='$id'";
		$rs = $this->db->exceuteQuery($sql);
		return $rs[0]['busilicence'];
	}
	function deleteUser($id)
	{
		parent::Update('t_user', array('status'=>'2'),"u.id='$id'");
	}
	function updateUser($id,$data)
	{
		parent::Update('t_user',$data,"u.id='$id'");
	}
	

	
	function setStatus($id,$type,$status)
	{
		switch ($type)
		{
				case "1":
					$this->isBrand($id, $status);
				break;
				case "2":
					$this->isTodayRecommend($id, $status);
				break;
				case "3":
					$this->isAdvertShop($id, $status);
				break;
				case "4":
					$this->isHot($id, $status);
				break;
				case "5":
					$this->isSignShop($id, $status);
				break;
				case "6":
					$this->isRecommendShop($id, $status);
				break;
				case "7":
					$this->isCertificationShop($id, $status);
				break;
				case "8":
				break;
		}
	}
	
	function isBrand($id,$status)//是否品牌
	{
		parent::Update('t_user', array('isbrand'=>$status),"u.id='$id'");
	}
	function isTodayRecommend($id,$status)//是否今日推荐
	{
		parent::Update('t_user', array('isrecommend'=>$status,'recommendtime'=>date('Y-m-d')),"u.id='$id'");
	}
	function isHot($id,$status)//是否是热点商家
	{
		parent::Update('t_user', array('ishot'=>$status),"u.id='$id'");
	}
	
	function audit($id,$data)//审核
	{
		parent::Update('t_user', $data,"u.id='$id'");
	}
	
	function isSignShop($id,$status)//是否签约商家
	{
		parent::Update('t_user', array('issignshop'=>$status),"u.id='$id'");
	}
	
	function isRecommendShop($id,$status)//是否推荐商家
	{
		parent::Update('t_user', array('isrecommendshop'=>$status),"u.id='$id'");
	}
	
	function isCertificationShop($id,$status)//是否认证商家
	{
		parent::Update('t_user', array('iscertificationshop'=>$status),"u.id='$id'");
	}
	
	function isAdvertShop($id,$status)//是否今日推荐商家（参与广告）
	{
		parent::Update('t_user', array('isadvertshop'=>$status),"u.id='$id'");
	}
	
	
	
	
	
}

?>