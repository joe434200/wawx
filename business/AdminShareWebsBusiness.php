<?php
require_once('BaseBusiness.php');
require_once('DateUtil.php');
require_once('SupportException.php');
require_once('SessionUtil.php');
require_once('PageSplitBusiness.php');

/**
 * 
 * 分享网站管理
 * @author Administrator
 *
 */
class AdminShareWebsBusiness extends PageSplitBusiness
{

	function getAllShareWebs($currpage=null,$numbersperpage=null)
	{
		return parent::simplyQuery('m_share_website',$currpage,$numbersperpage);
		/*$sql = "
		SELECT a.*,b.name parentname FROM  m_act_catalog a  
		LEFT JOIN m_act_catalog b ON a.parentid=b.ID
		";
		
		$sqlcount = "
		SELECT COUNT(1) FROM  m_act_catalog a
		LEFT JOIN m_act_catalog b ON a.parentid=b.ID  
		";

		$sql .= "  ORDER BY a.ID ";
		$result = $this->db->exceuteQuery($sql);
		if (!$this->isTotalRows)//获取记录数
		{
			    $this->setTotalRow($this->buildTotalRow($sqlcount));
				$this->isTotalRows = true;
			
		}
		$result = $this->QueryForPageSplit($sql, $currpage, $numbersperpage);
		return $result;*/
		
	}
	
	/**
	 * 通过ID查找指定的活动分类
	 * Enter description here ...
	 * @param unknown_type $pid
	 */
	function getOneShareWebsByID($id=null)
	{
		return parent::simplyQueryOne('m_share_website',$id);
		/*$sql = "
		SELECT a.* FROM  m_act_catalog a  WHERE 1=1 ";
		
		if (!empty($id))
		{
			$sql .= " AND a.ID='$id'";
		}
		$sql .= "  ORDER BY a.ID ";
		$result = $this->db->exceuteQuery($sql);
		return $result;*/
	}
	
	
	/**
	 * 删除
	 * 
	 * @param unknown_type $mid
	 */
	function deleteShareWebs($id)
	{
		parent::Delete('m_share_website',"d.ID='$id'");
	}
	function insertShareWebs($data)//key,value,key字段名，value，就是对应的值
	{
		parent::Insert('m_share_website', $data);
	}
	function updateShareWebs($data,$id)
	{
		parent::Update('m_share_website', $data,"u.id='$id'");
	}
	
}

?>