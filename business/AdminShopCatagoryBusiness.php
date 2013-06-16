<?php
require_once('BaseBusiness.php');
require_once('DateUtil.php');
require_once('SupportException.php');
require_once('SessionUtil.php');
require_once('PageSplitBusiness.php');

/**
 * 
 * 店家分类管理
 * @author Administrator
 *
 */
class AdminShopCatagoryBusiness extends PageSplitBusiness
{

	function getAllShopCatagory($currpage=null,$numbersperpage=null)
	{
		return parent::simplyQuery_parent('m_shop_classfy', 'name',$currpage,$numbersperpage);
		
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
	 * 查询所有的一级分类
	 * Enter description here ...
	 */
	function getLevel1List()
	{
		return parent::simplyLevel1List('m_shop_classfy');
		/*$sql = "
		SELECT a.* FROM  m_act_catalog a 
		WHERE a.parentid='99999' 
		";
		$result = $this->db->exceuteQuery($sql);
		return $result;*/
		
	}
	function getLevel2List($pid = null)
	{
		$sql = "
		SELECT a.* FROM  m_shop_classfy a 
		WHERE 1=1 
		";
		if (!empty($pid))
		{
			$sql .= "  AND a.parentid = '$pid' ";
		}
		else 
		{
			$sql .= "  AND  a.parentid <> '99999' ";
		}
		$result = $this->db->exceuteQuery($sql);
		return $result;
	}
	/**
	 * 通过ID查找指定的活动分类
	 * Enter description here ...
	 * @param unknown_type $pid
	 */
	function getOneShopCatagorytByID($id=null)
	{
		return parent::simplyQueryOne('m_shop_classfy',$id);
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
	function deleteShopCatagory($id)
	{
		parent::Delete('m_shop_classfy',"d.ID='$id'");
	}
	function insertShopCatagory($data)//key,value,key字段名，value，就是对应的值
	{
		parent::Insert('m_shop_classfy', $data);
	}
	function updateShopCatagory($data,$id)
	{
		parent::Update('m_shop_classfy', $data,"u.id='$id'");
	}
	function updateVisible($id,$isshow)
	{
		return parent::Update('m_shop_classfy', array("isshow"=>$isshow),"u.id='$id'");
	}
	
}

?>