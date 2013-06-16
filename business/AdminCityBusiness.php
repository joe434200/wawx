<?php
require_once('BaseBusiness.php');
require_once('DateUtil.php');
require_once('SupportException.php');
require_once('SessionUtil.php');
require_once('PageSplitBusiness.php');

/**
 * 
 * 城市管理
 * @author Administrator
 *
 */
class AdminCityBusiness extends PageSplitBusiness
{
	
	private static $insertHead = "INSERT INTO m_city (name,level,introduction,importflg ) VALUES ";
	
	/**
	 * 
	 * 获取所有城市
	 * @param unknown_type $currpage:当前页
	 * @param unknown_type $numbersperpage，每页的记录数
	 * @return unknown
	 */
	function getAllCities($currpage=null,$numbersperpage=null)
	{
		$sql = "
		SELECT a.*,b.name parentname FROM  m_city a  
		LEFT JOIN m_city b ON a.parentid=b.ID
		
		
		";
		
		$sqlcount = "
		SELECT COUNT(1) FROM  m_city a  
		LEFT JOIN m_city b ON a.parentid=b.ID
		";

		$sql .= "  ORDER BY a.level,a.ID ";
		$result = $this->db->exceuteQuery($sql);
		if (!$this->isTotalRows)//获取记录数
		{
			    $this->setTotalRow($this->buildTotalRow($sqlcount));
				$this->isTotalRows = true;
			
		}
		$result = $this->QueryForPageSplit($sql, $currpage, $numbersperpage);
		return $result;
		
	}
	function getAllChilds($level=null,$parentid=null)
	{
		$sql = "
		SELECT a.* FROM  m_city a  
		WHERE 1=1  
		";
		
		if (!empty($level) || $level == '0')
		{
			$sql .= " AND a.level='$level' ";
		}
		if (!empty($parentid))
		{
			$sql .= " AND a.parentid='$parentid' ";
		}
		$result = $this->db->exceuteQuery($sql);
		return $result;
	}
	/**
	 * 通过ID查找指定的模块
	 * Enter description here ...
	 * @param unknown_type $pid
	 */
	function getOneCityByID($id=null)
	{
		$sql = "
		SELECT a.*,b.name parentname,a.parentid pid0,b.parentid pid1 ,c.parentid pid2,d.parentid pid3   FROM  m_city a  
		LEFT JOIN m_city b ON a.parentid=b.ID
    	LEFT JOIN m_city c ON b.parentid=c.ID
		LEFT JOIN m_city d ON c.parentid=d.ID
		WHERE 1=1 
		 
		";
		
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
	function deleteCities($id)
	{
		parent::Delete('m_city',"d.ID='$id'");
	}
	function insertCities($data)//key,value,key字段名，value，就是对应的值
	{
		parent::Insert('m_city', $data);
	}
	function updateCities($data,$id)
	{
		parent::Update('m_city', $data,"u.id='$id'");
	}
	
	function getAllBatchRecords()
	{
		$sql = "
		SELECT a.*,b.name parentname FROM  m_city a  
		LEFT JOIN m_city b ON a.parentid=b.ID
		
		
		WHERE a.importflg='0' 
		
		
		
		
		";
		
	
		$sql .= "  ORDER BY a.ID ";
		$result = $this->db->exceuteQuery($sql);
		return $result;
	}
//单独的一维数据
	function createValueStr($data)
	{
		$valuestr = "(";

		foreach($data as $value)
		{
			if (!empty($value) || $value == '0')
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
	
}

?>