<?php
require_once('BaseBusiness.php');
require_once('DateUtil.php');
require_once('SupportException.php');
require_once('SessionUtil.php');
require_once('PageSplitBusiness.php');

/**
 * 
 * 圈子图片管理
 * @author Administrator
 *
 */
class AdminGroupPhotoBusiness extends PageSplitBusiness
{

function getAllGroupPhotoList($currpage=null,$numbersperpage=null,$query=null)
	{
		$sql = "
		SELECT b.*
		,p.name grptypename
		,t.nickname nickname
		FROM  t_grp_main b
		INNER JOIN m_grp_catalog p ON p.ID = b.idm_grp_catalog
		INNER JOIN t_user t ON t.ID = b.creater
		WHERE 1=1 
		
		";
		
		$sqlcount = "
		SELECT COUNT(1) FROM  t_grp_main b
		INNER JOIN m_grp_catalog p ON p.ID = b.idm_grp_catalog
		INNER JOIN t_user t ON t.ID = b.creater
		WHERE 1=1 
		";
		$sqlwhere = "";
		if (!empty($query))
		{
			if (!empty($query['groupname']))
			{
				$sqlwhere .= "  AND b.groupname LIKE '%$query[groupname]%'";
			}
			if (!empty($query['lables']))
			{
				$sqlwhere .= "  AND b.lables LIKE '%$query[lables]%'";
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
	
	function getGroupPhotoListByActID($grpid,$currpage=null,$numbersperpage=null)
	{
		$sql = "
		SELECT a.*
		FROM t_grp_photo a
		WHERE a.idt_grp_main = '$grpid'
		
		";
		
		$sqlcount = "
		SELECT COUNT(1) FROM  t_grp_photo a
		WHERE a.idt_grp_main = '$grpid'
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
	function shieldGroupPhoto($id,$shieldflg)
	{
		parent::Update('t_grp_photo', array("shieldflg"=>$shieldflg),"u.id='$id'");
	}
	function getShieldFlg($id)
	{
		$sql = "
		SELECT a.shieldflg
		FROM t_grp_photo a
		WHERE a.ID = '$id'
		
		";
		$rs = $this->db->exceuteQuery($sql);
		return $rs[0];
		
	}
	
}

?>