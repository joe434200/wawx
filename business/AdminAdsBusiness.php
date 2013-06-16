<?php
require_once('BaseBusiness.php');
require_once('DateUtil.php');
require_once('SupportException.php');
require_once('SessionUtil.php');
require_once('PageSplitBusiness.php');

/**
 * 
 * 广告管理
 * @author Administrator
 *
 */
class AdminAdsBusiness extends PageSplitBusiness
{

	function getAllAdsList($currpage=null,$numbersperpage=null,$query=null)
	{
		$sql = "
		SELECT a.*
		FROM t_advertisement a
		WHERE 1=1  
		";
		
		$sqlcount = "
		SELECT COUNT(1) FROM  
		 t_advertisement a
		 WHERE 1=1  
		";
		
		$sqlwhere = "";
		if (!empty($query))
		{
			if (!empty($query['position']))
			{
				$sqlwhere .= "  AND a.position='$query[position]'";
			}
			if (!empty($query['starttime_begin']))
			{
				$sqlwhere .= "  AND a.starttime >= '$query[starttime_begin]'";
			}
			if (!empty($query['starttime_end']))
			{
				$sqlwhere .= "  AND a.starttime <= '$query[starttime_end]'";
			}
			if (!empty($query['endtime_begin']))
			{
				$sqlwhere .= "  AND a.endtime >= '$query[endtime_begin]'";
			}
			if (!empty($query['endtime_end']))
			{
				$sqlwhere .= "  AND a.endtime <= '$query[endtime_end]'";
			}
			if (!empty($query['oldname']))
			{
				$sqlwhere .= "  AND a.oldname  LIKE '%$query[oldname]%'";
			}
			if (!empty($query['advertdesc']))
			{
				$sqlwhere .= "  AND a.advertdesc  LIKE '%$query[advertdesc]%'";
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

	/**
	 * 通过ID查找指定的广告
	 * Enter description here ...
	 * @param unknown_type $pid
	 */
	function getOneAdsByID($id=null)
	{
		$sql = "
		SELECT a.* FROM  t_advertisement a  WHERE 1=1 ";
		
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
	function deleteAds($id)
	{
		parent::Update('t_advertisement', array('isshow'=>'0'),"u.ID='$id'");
	}
	function insertAds($data)//key,value,key字段名，value，就是对应的值
	{
		parent::Insert('t_advertisement', $data);
	}
	function updateAds($data,$id)
	{
		parent::Update('t_advertisement', $data,"u.id='$id'");
	}
	
}

?>