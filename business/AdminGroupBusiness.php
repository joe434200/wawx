<?php
require_once('BaseBusiness.php');
require_once('DateUtil.php');
require_once('SupportException.php');
require_once('SessionUtil.php');
require_once('PageSplitBusiness.php');

/**
 * 
 * 圈子管理
 * @author Administrator
 *
 */
class AdminGroupBusiness extends PageSplitBusiness
{

	function getAllGroupList($currpage=null,$numbersperpage=null,$query=null)
	{
		$sql = "
		SELECT a.*
		,b.name grptypename
		,t.nickname nickname
		
		
		
		FROM  t_grp_main a  
		INNER JOIN m_grp_catalog b ON b.ID=a.idm_grp_catalog
		INNER JOIN t_user t ON t.ID = a.creater
		";
		
		$sqlcount = "
		SELECT COUNT(1) FROM  t_grp_main a
		INNER JOIN m_grp_catalog b ON b.ID=a.idm_grp_catalog
		INNER JOIN t_user t ON t.ID = a.creater
		
		";
		
		$sqlwhere = "";
		if (!empty($query))
		{
			if (!empty($query['idm_grp_catalog']))
			{
				$sqlwhere .= "  AND a.idm_grp_catalog = '$query[idm_grp_catalog]'";
			}
			if (!empty($query['lables']))
			{
				$sqlwhere .= "  AND a.lables LIKE '%$query[lables]%'";
			}
			if (!empty($query['groupname']))
			{
				$sqlwhere .= "  AND a.groupname LIKE '%$query[groupname]%'";
			}
			
			
		}
		$sql .= $sqlwhere;
		$sqlcount .= $sqlwhere;

		
		$sql .= "  ORDER BY a.membernum DESC,a.topicnum DESC,a.createtime DESC ";
		$result = $this->db->exceuteQuery($sql);
		if (!$this->isTotalRows)//获取记录数
		{
			    $this->setTotalRow($this->buildTotalRow($sqlcount));
				$this->isTotalRows = true;
			
		}
		$result = $this->QueryForPageSplit($sql, $currpage, $numbersperpage);
		return $result;
		
	}
	
	function getGroupInfo($id)
	{
		$sql = "
		SELECT a.*
		,b.name grptypename
		,t.nickname nickname
		,t.realname realname
		
		
		
		FROM  t_grp_main a  
		INNER JOIN m_grp_catalog b ON b.ID=a.idm_grp_catalog
		INNER JOIN t_user t ON t.ID = a.creater
		
		WHERE a.ID='$id'
		";
		$result = $this->db->exceuteQuery($sql);
		return $result;
		
		
	}
	
	function auditGroup($id,$auditflg)
	{
		parent::Update('t_grp_main', array("auditflg"=>$auditflg),"u.id='$id'");
	}
	function shieldGroup($id,$shieldflgg)
	{
		parent::Update('t_grp_main', array("shieldflg"=>$shieldflgg),"u.id='$id'");
	}
	function getGroupType()
	{
		$sql = "SELECT * FROM m_grp_catalog WHERE parentid='99999'";
		return $this->db->exceuteQuery($sql);
	}
	
}

?>