<?php
require_once('BaseBusiness.php');
require_once('DateUtil.php');
require_once('SupportException.php');
require_once('SessionUtil.php');
require_once('PageSplitBusiness.php');

/**
 * 
 * 活动图片管理
 * @author Administrator
 *
 */
class AdminActPhotoBusiness extends PageSplitBusiness
{

	function getAllActPhotoList($currpage=null,$numbersperpage=null,$query=null)
	{
		$sql = "
		SELECT b.*
		,p.name acttypename
		,t.nickname nickname
		FROM  t_act_main b
		INNER JOIN m_act_catalog p ON p.ID = b.idm_act_catalog
		INNER JOIN t_user t ON t.ID = b.creater
		WHERE 1=1 
		
		";
		
		$sqlcount = "
		SELECT COUNT(1) FROM  t_act_main b
		INNER JOIN m_act_catalog p ON p.ID = b.idm_act_catalog
		INNER JOIN t_user t ON t.ID = b.creater
		WHERE 1=1 
		";
		$sqlwhere = "";
		if (!empty($query))
		{
			if (!empty($query['actname']))
			{
				$sqlwhere .= "  AND b.actname LIKE '%$query[actname]%'";
			}
			if (!empty($query['keywords']))
			{
				$sqlwhere .= "  AND b.keywords LIKE '%$query[keywords]%'";
			}
			
		}
		
		$sql .= $sqlwhere;
		$sqlcount .= $sqlwhere;
		
		
		
		
		$sql .= "  ORDER BY b.creater,b.createtime ";
		$result = $this->db->exceuteQuery($sql);
		if (!$this->isTotalRows)//获取记录数
		{
			    $this->setTotalRow($this->buildTotalRow($sqlcount));
				$this->isTotalRows = true;
			
		}
		$result = $this->QueryForPageSplit($sql, $currpage, $numbersperpage);
		return $result;
		
	}
	
	function getActPhotoListByActID($actid,$currpage=null,$numbersperpage=null)
	{
		$sql = "
		SELECT a.*
		FROM t_act_photo a
		WHERE a.idt_act_main = '$actid'
		
		";
		
		$sqlcount = "
		SELECT COUNT(1) FROM  t_act_photo a
		WHERE a.idt_act_main = '$actid'
		";
		
		$sql .= "  ORDER BY a.creater,a.createtime ";
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
	 * 屏蔽
	 * Enter description here ...
	 * @param unknown_type $data
	 * @param unknown_type $id
	 */
	function shieldActPhoto($id,$shieldflg)
	{
		parent::Update('t_act_photo', array("shieldflg"=>$shieldflg),"u.id='$id'");
	}
	function getShieldFlg($id)
	{
		$sql = "
		SELECT a.shieldflg
		FROM t_act_photo a
		WHERE a.ID = '$id'
		
		";
		$rs = $this->db->exceuteQuery($sql);
		return $rs[0];
		
	}
	
	
}

?>