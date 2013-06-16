<?php
require_once('BaseBusiness.php');
require_once('DateUtil.php');
require_once('SupportException.php');
require_once('SessionUtil.php');
require_once('PageSplitBusiness.php');

/**
 * 
 * 活动管理
 * @author Administrator
 *
 */
class AdminActBusiness extends PageSplitBusiness
{

	function getAllActList($currpage=null,$numbersperpage=null,$query=null)
	{
		$sql = "
		SELECT 
		a.*
		,p.name acttypename
		,g.groupname
		,t.nickname nickname

		FROM t_act_main a
		INNER JOIN m_act_catalog p ON p.ID = a.idm_act_catalog
		INNER JOIN t_user t ON t.ID = a.creater
		LEFT JOIN t_grp_main   g ON g.ID = a.idt_grp_main
		WHERE 1=1 
		";
		
		$sqlcount = "
		SELECT COUNT(1) FROM   t_act_main a
		INNER JOIN m_act_catalog p ON p.ID = a.idm_act_catalog
		INNER JOIN t_user t ON t.ID = a.creater
		LEFT JOIN t_grp_main   g ON g.ID = a.idt_grp_main
		WHERE 1=1 
		";
		
		$sqlwhere = "";
		if (!empty($query))
		{
			if (!empty($query['actname']))
			{
				$sqlwhere .= "  AND a.actname LIKE '%$query[actname]%'";
			}
			if (!empty($query['keywords']))
			{
				$sqlwhere .= "  AND a.keywords LIKE '%$query[keywords]%'";
			}
			if (!empty($query['idm_act_catalog']))
			{
				$sqlwhere .= "  AND a.idm_act_catalog = '$query[idm_act_catalog]'";
			}
			if (!empty($query['begintime']))
			{
				$sqlwhere .= "  AND a.begintime >= '$query[begintime]'";
			}
			if (!empty($query['endtime']))
			{
				$sqlwhere .= "  AND a.endtime <= '$query[endtime]'";
			}
			if (!empty($query['grpflg']) || $query['grpflg'] == '0')
			{
				$sqlwhere .= "  AND a.grpflg = '$query[grpflg]'";
			}
		}
		$sql .= $sqlwhere;
		$sqlcount .= $sqlwhere;
		

		$sql .= "  ORDER BY a.attentionnum DESC, a.membernum DESC,a.remcommendflg DESC,a.themeflg  DESC";
		$result = $this->db->exceuteQuery($sql);
		if (!$this->isTotalRows)//获取记录数
		{
			    $this->setTotalRow($this->buildTotalRow($sqlcount));
				$this->isTotalRows = true;
			
		}
		$result = $this->QueryForPageSplit($sql, $currpage, $numbersperpage);
		return $result;
		
	}
	function getActInfo($id)
	{
		$sql = "
		SELECT 
		a.*
		,p.name acttypename
		,g.groupname
		,t.nickname nickname

		FROM t_act_main a
		INNER JOIN m_act_catalog p ON p.ID = a.idm_act_catalog
		INNER JOIN t_user t ON t.ID = a.creater
		LEFT JOIN t_grp_main   g ON g.ID = a.idt_grp_main
		WHERE a.ID = '$id' 
		";
		$rs = $this->db->exceuteQuery($sql);
		return $rs;
	}
	function getActCatalogList()
	{
		$sql = "
		SELECT * FROM m_act_catalog ORDER BY parentid ASC,ID ASC
		";
		$rs = $this->db->exceuteQuery($sql);
		return $rs;
	}
	
	/**
	 * 推荐活动
	 * @param unknown_type $id
	 * @param unknown_type $remcommendflg
	 */
	function recommentAct($id,$remcommendflg)
	{
		parent::Update('t_act_main', array("remcommendflg"=>$remcommendflg),"u.id='$id'");
	}
	/**
	 * 专题活动
	 * @param unknown_type $id
	 * @param unknown_type $remcommendflg
	 */
	function themeAct($id,$themeflg)
	{
		parent::Update('t_act_main', array("themeflg"=>$themeflg),"u.id='$id'");
	}
	
	
}

?>