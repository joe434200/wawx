<?php
require_once('BaseBusiness.php');
require_once('DateUtil.php');
require_once('SupportException.php');
require_once('SessionUtil.php');
require_once('PageSplitBusiness.php');

/**
 * 
 * 圈子话题管理
 * @author Administrator
 *
 */
class AdminGroupTopicsManageBusiness extends PageSplitBusiness
{

	function getAllGroupTopicsList($currpage=null,$numbersperpage=null,$query=null)
	{
		$sql = "
		SELECT a.*
		,b.name grptopicname 
		,c.groupname 
		,t.nickname nickname
		FROM  t_grp_topic a  
		INNER JOIN m_grptopic_catalog b ON a.idm_grptopic_catalog=b.ID
		INNER JOIN t_grp_main c ON a.idt_grp_main=c.ID
		INNER JOIN t_user t ON t.ID = a.creater
		";
		
		$sqlcount = "
		SELECT COUNT(1) 
		FROM  t_grp_topic a  
		INNER JOIN m_grptopic_catalog b ON a.idm_grptopic_catalog=b.ID
		INNER JOIN t_grp_main c ON a.idt_grp_main=c.ID
		INNER JOIN t_user t ON t.ID = a.creater
		";

		$sqlwhere = "";
		if (!empty($query))
		{
			if (!empty($query['groupname']))
			{
				$sqlwhere .= "  AND c.groupname LIKE '%$query[groupname]%'";
			}
			if (!empty($query['idm_grptopic_catalog']))
			{
				$sqlwhere .= "  AND a.idm_grptopic_catalog = '$query[idm_grptopic_catalog]'";
			}
			if (!empty($query['title']))
			{
				$sqlwhere .= "  AND a.title LIKE '%$query[title]%'";
			}
			if (!empty($query['labels']))
			{
				$sqlwhere .= "  AND a.labels LIKE '%$query[labels]%'";
			}
			
		}
		$sql .= $sqlwhere;
		$sqlcount .= $sqlwhere;
		
		$sql .= "  ORDER BY a.topflg DESC,a.creater,a.idt_grp_main ";
		$result = $this->db->exceuteQuery($sql);
		if (!$this->isTotalRows)//获取记录数
		{
			    $this->setTotalRow($this->buildTotalRow($sqlcount));
				$this->isTotalRows = true;
			
		}
		$result = $this->QueryForPageSplit($sql, $currpage, $numbersperpage);
		return $result;
		
	}
	function getGroupTopicInfo($id)
	{
		$sql = "
		SELECT a.*
		,b.name grptopicname 
		,c.groupname 
		,t.nickname nickname
		FROM  t_grp_topic a  
		INNER JOIN m_grptopic_catalog b ON a.idm_grptopic_catalog=b.ID
		INNER JOIN t_grp_main c ON a.idt_grp_main=c.ID
		INNER JOIN t_user t ON t.ID = a.creater
		
		WHERE a.ID='$id'
		";
		$result = $this->db->exceuteQuery($sql);
		return $result;
		
		
	}
	function shieldGrpTopic($id,$shieldflg)
	{
		parent::Update('t_grp_topic', array("shieldflg"=>$shieldflg),"u.id='$id'");
	}
	
	function getGroupTopicType()
	{
		$sql = "SELECT * FROM m_grptopic_catalog WHERE parentid='99999'";
		return $this->db->exceuteQuery($sql);
	}
	
	
}

?>