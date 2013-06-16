<?php
require_once('BaseBusiness.php');
require_once('DateUtil.php');
require_once('SupportException.php');
require_once('SessionUtil.php');
require_once('PageSplitBusiness.php');





class AdminForumCatalogBusiness extends PageSplitBusiness
{
	
	function getAllForumCatalog($currpage=null,$numbersperpage=null)
	{
		$sql = "
		SELECT a.*
		,b.name parentname
		,t1.nickname mainnickname,t1.realname mainrealname
		,t2.nickname adminnickname1,t2.realname adminrealname1
		,t3.nickname adminnickname2,t3.realname adminrealname2
		FROM  m_forum_catalog a  
		LEFT JOIN t_user t1 ON t1.ID=a.admin1
		LEFT JOIN t_user t2 ON t2.ID=a.admin2
		LEFT JOIN t_user t3 ON t3.ID=a.admin3
		LEFT JOIN m_forum_catalog b ON b.ID=a.parentid
		
		
		
		";
		
		$sqlcount = "
		SELECT COUNT(1) FROM  m_forum_catalog a  
		LEFT JOIN t_user t1 ON t1.ID=a.admin1
		LEFT JOIN t_user t2 ON t2.ID=a.admin2
		LEFT JOIN t_user t3 ON t3.ID=a.admin3
		LEFT JOIN m_forum_catalog b ON b.ID=a.parentid
		
		
		";

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
	/**
	 * 通过ID查找指定的模块
	 * Enter description here ...
	 * @param unknown_type $pid
	 */
	function getOneForumCatalogByID($id=null)//$id=&item.ID;
	{
		$sql = "
		SELECT a.* 
		,t1.ID admin1, t1.nickname mainnickname,t1.realname mainrealname
		,t2.ID admin2 ,t2.nickname adminnickname1,t2.realname adminrealname1
		,t3.ID admin3, t3.nickname adminnickname2,t3.realname adminrealname2
		
		FROM  m_forum_catalog a 
		
		LEFT JOIN t_user t1 ON t1.ID=a.admin1
		LEFT JOIN t_user t2 ON t2.ID=a.admin2
		LEFT JOIN t_user t3 ON t3.ID=a.admin3
		
		WHERE 1=1 ";
		
		if (!empty($id))
		{
			$sql .= " AND a.ID='$id'";
		}
		$sql .= "  ORDER BY a.ID ";
		$result = $this->db->exceuteQuery($sql);
		return $result;
	}
	
	
	/**
	 * 删除
	 * 
	 * @param unknown_type $mid
	 */
	function deleteForumCatalog($id)
	{
		parent::Delete('m_forum_catalog',"d.ID='$id'");
	}
	function insertForumCatalog($data)
	{
		parent::Insert(' m_forum_catalog', $data);
	}
	function updateForumCatalog($data,$id)
	{
		parent::Update(' m_forum_catalog', $data,"u.id='$id'");
	}
	
	//获取一级圈子
	function getParentCatalog()
	{
		$this->sql = "SELECT m.* FROM m_forum_catalog m WHERE m.parentid='99999'";
		$result =  $this->db->exceuteQuery($this->sql);
		return $result;
	}//OK
	function insertForums($data)//key,value,key字段名，value，就是对应的值
	{
		parent::Insert('m_forum_catalog', $data);
	}//OK
	function updateForums($data,$id)
	{
		parent::Update('m_forum_catalog', $data,"u.id='$id'");
	}
	
}

?>