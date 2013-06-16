<?php
require_once('BaseBusiness.php');

class PageSplitBusiness extends  BaseBusiness{
	private  $totalPage = 0;
	private  $totalRow = 0;
	private  $currentPage = 1;
	/**
	 * @return the $totalPage
	 */
	public function getTotalPage() {
		return $this->totalPage;
	}

	/**
	 * @return the $totalRow
	 */
	public function getTotalRow() {
		return $this->totalRow;
	}

	/**
	 * @return the $currentPage
	 */
	public function getCurrentPage() {
		return $this->currentPage;
	}

	/**
	 * @param field_type $totalPage
	 */
	public function setTotalPage($totalPage) {
		$this->totalPage = $totalPage;
	}

	/**
	 * @param field_type $totalRow
	 */
	public function setTotalRow($totalRow) {
		$this->totalRow = $totalRow;
	}

	/**
	 * @param field_type $currentPage
	 */
	public function setCurrentPage($currentPage) {
		$this->currentPage = $currentPage;
	}

	/**
	 * 根据sql取得总记录数
	 * @param sql
	 * @return
	 */
	public  function buildTotalRow($sql)
	{
		
		$result = $this->db->exceuteQuery($sql);
		
		return $result[0][0];
	}
	
	/**
	 * 根据总行数和每页显示记录数取得总页数
	 * @param trow
	 * @param numPerPage
	 * @return
	 */
	public function buildTotalPage($trow,$numPerPage)
	{
		$rt = 0;
		$rt = intval($trow/$numPerPage);
		if($trow%$numPerPage != 0)
		{
			$rt = $rt + 1;
		}
		return $rt;
	}
	/**
	 * 取得起始行数
	 * @param crtpage
	 * @param numPerPage
	 * @return
	 */
	public function buildStart($crtpage,$numPerPage)
	{
		return ($crtpage - 1)*$numPerPage;
	}
	
	protected function QueryForPageSplit($sql,$crtpage,$numPerPage,$orderstr=null)
	{
		
		$this->logger->info("開始");
		//$rsss = $this->db->exceuteQuery("select count(1) from m_zip_master ORDER BY id desc ");
		//$this->totalRow = $this->db->exceuteQuery($sql);
		
		
		
		$this->totalPage = $this->buildTotalPage($this->totalRow, $numPerPage);
		
		
		
		$this->currentPage = $crtpage;
		$beginrecord = $this->buildStart($crtpage, $numPerPage);
		
		
		
		$sqllimt = " SELECT tabl.* FROM ";
		$sqllimt .= " (";
		
		$sqllimt .= $sql;
		
		$sqllimt .= " ) tabl " . $orderstr;
		
		
		$sqllimt .= " LIMIT  $beginrecord,$numPerPage";
		
		
		//print_r($sqllimt);
		//exit;
		
		$result = $this->db->exceuteQuery($sqllimt);
		
		
		
		
		
		$this->logger->info("終了");
		return ($result);
		
	}
	protected function simplyQuery($tablename,$currpage=null,$numbersperpage=null)
	{
		$sql = "
		SELECT a.* FROM  $tablename a  
		";
		
		$sqlcount = "
		SELECT COUNT(1) FROM  $tablename a 
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
	protected function simplyQueryOne($tablename,$id=null)
	{
		$sql = "
		SELECT a.* FROM  $tablename a  WHERE 1=1 ";
		
		if (!empty($id))
		{
			$sql .= " AND a.ID='$id'";
		}
		$sql .= "  ORDER BY a.ID ";
		$result = $this->db->exceuteQuery($sql);
		return $result;
	}
	
	protected function simplyQuery_parent($tablename,$keyparentname,$currpage=null,$numbersperpage=null)
	{
		$sql = "
		SELECT a.*,b.$keyparentname parentname FROM  $tablename a  
		LEFT JOIN $tablename b ON a.parentid=b.ID
		";
		
		$sqlcount = "
		SELECT COUNT(1) FROM  $tablename a
		LEFT JOIN $tablename b ON a.parentid=b.ID  
		";

		$sql .= "  ORDER BY a.parentid,a.ID ";
		$result = $this->db->exceuteQuery($sql);
		if (!$this->isTotalRows)//获取记录数
		{
			    $this->setTotalRow($this->buildTotalRow($sqlcount));
				$this->isTotalRows = true;
			
		}
		$result = $this->QueryForPageSplit($sql, $currpage, $numbersperpage);
		return $result;
	}
	protected function simplyLevel1List($tablename)
	{
		$sql = "
		SELECT a.* FROM  $tablename a 
		WHERE a.parentid='99999' 
		";
		$result = $this->db->exceuteQuery($sql);
		return $result;
	}

}
?>