<?php
require_once('BaseBusiness.php');
require_once('DateUtil.php');
require_once('SupportException.php');
require_once('SessionUtil.php');
require_once('PageSplitBusiness.php');

/**
 * 
 * 评论/回复管理
 * @author Administrator
 *
 */
class AdminCommentRebackBusiness extends PageSplitBusiness
{

	function getAllReplyList($currpage=null,$numbersperpage=null,$query=null)
	{
		$sql = "
		SELECT a.* 
		,t.nickname
		FROM  t_reply a  
		INNER JOIN t_user t ON a.creater = t.ID
		";
		
		$sqlcount = "
		SELECT COUNT(1) FROM  t_reply a   
		INNER JOIN t_user t ON a.creater = t.ID
		";
		
		$sqlwhere = "";
		if (!empty($query))
		{
			if (!empty($query['content']))
			{
				$sqlwhere .= "  AND a.content LIKE '%$query[content]%'";
			}
			if (!empty($query['nickname']))
			{
				$sqlwhere .= "  AND t.nickname LIKE '%$query[nickname]%'";
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
	function shield($id,$status)
	{
		parent::Update('t_reply', array("shieldflg"=>$status),"u.id='$id'");
	}
	function audit($id,$status)
	{
		parent::Update('t_reply', array("auditflg"=>$status),"u.id='$id'");
	}
	
	function getCommentRebackInfo($id)
	{
		$sql = "
		SELECT a.* 
		,t.nickname
		FROM  t_reply a  
		INNER JOIN t_user t ON a.creater = t.ID
		WHERE a.ID='$id'
		";
		$rs = $this->db->exceuteQuery($sql);
		return $rs;
	}
	
	
	
}

?>