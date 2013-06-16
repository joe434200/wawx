<?php
require_once('PageSplitBusiness.php');
require_once('DateUtil.php');
require_once('SupportException.php');

//获取选择器要求的数据
class SelectorBusiness extends PageSplitBusiness{
	
	function getDataList($dbinfo,$currpage,$numbersperpage)
	{
		$sqlcount = "
		SELECT COUNT(1) FROM  ".$dbinfo['tblname'];
		
		
		
		$sql = "SELECT ";
		
		$fields = "";
		foreach ($dbinfo['fields'] as $item)
		{
			$fields .= $item['key'].",";
		}
		$fields = substr($fields, 0,strlen($fields)-1);
		$sql .= $fields;
		$sql .= "  FROM  ".$dbinfo['tblname'];
		IF (!empty($dbinfo['where']))
		{
			$sql .= "  WHERE ".$dbinfo['where'];
			$sqlcount .= "  WHERE ".$dbinfo['where'];
		}
		
		$sql .= "  ORDER BY ID ";
		$result = $this->db->exceuteQuery($sql);
		if (!$this->isTotalRows)//获取记录数
		{
			    $this->setTotalRow($this->buildTotalRow($sqlcount));
				$this->isTotalRows = true;
			
		}
		$result = $this->QueryForPageSplit($sql, $currpage, $numbersperpage);
		return $result;
		
		
		
		
		
	}
	

	
}