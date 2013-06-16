<?php
require_once('BaseBusiness.php');
require_once('DateUtil.php');
require_once('SupportException.php');
require_once('SessionUtil.php');
require_once('PageSplitBusiness.php');

/**
 * 
 * 学校列表管理
 * @author Administrator
 *
 */
class AdminSchoolBusiness extends PageSplitBusiness
{
	
	
	private static $insertHead = "INSERT INTO m_school (schoolname,schooladdr,introduction,importflg ) VALUES ";
	
	/**
	 * 
	 * 获取所有的学校列表
	 * @param unknown_type $currpage:当前页
	 * @param unknown_type $numbersperpage，每页的记录数
	 * @return unknown
	 */
	function getAllSchools($currpage=null,$numbersperpage=null)
	{
		$sql = "
		SELECT a.*,c4.name countryname,c1.name provincename,c2.name cityname,c3.name skirtname  FROM  m_school a  
		INNER JOIN m_city c1  ON a.idm_city1 = c1.ID
		INNER JOIN m_city c2  ON a.idm_city2 = c2.ID
		INNER JOIN m_city c3  ON a.idm_city3 = c3.ID
		INNER JOIN m_city c4  ON a.idm_city4 = c4.ID
		
		
		
		
		";
		
		$sqlcount = "
		SELECT COUNT(1) FROM  m_school a  
		INNER JOIN m_city c1  ON a.idm_city1 = c1.ID
		INNER JOIN m_city c2  ON a.idm_city2 = c2.ID
		INNER JOIN m_city c3  ON a.idm_city3 = c3.ID
		INNER JOIN m_city c4  ON a.idm_city4 = c4.ID
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
	function getOneSchoolByID($id=null)
	{
		$sql = "
		SELECT a.* FROM  m_school a  WHERE 1=1 ";
		
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
	function deleteSchools($id)
	{
		parent::Delete('m_school',"d.ID='$id'");
	}
	function insertSchools($data)//key,value,key字段名，value，就是对应的值
	{
		parent::Insert('m_school', $data);
	}
	function updateSchools($data,$id)
	{
		parent::Update('m_school', $data,"u.id='$id'");
	}
	
	

	//单独的一维数据
	function createValueStr($data)
	{
		$valuestr = "(";

		foreach($data as $value)
		{
			if (!empty($value)|| $value == '0')
			{
				$valuestr .= "'".$value."'";
			}
			else
			{
				$valuestr .="NULL";
			}
			$valuestr .= ",";
		}
		$valuestr = substr($valuestr,0,strlen($valuestr)-1);
		$valuestr .= ")";


		return $valuestr;
	}
	//批量插入
	function batchInsert($data)
	{
		$insertsql = self::$insertHead;

		foreach($data as $value)
		{
			$insertsql .= $this->createValueStr($value);
			$insertsql .= ",";
		}

		$insertsql = substr($insertsql,0,strlen($insertsql)-1);


		$rs = $this->db->exceuteUpdate($insertsql);
		return $rs;
	}
	function getAllBatchRecords()
	{
		$sql = "
		SELECT a.* FROM  m_school a  WHERE a.importflg='0' ";
		
	
		$sql .= "  ORDER BY a.ID ";
		$result = $this->db->exceuteQuery($sql);
		return $result;
	}
	
}

?>