<?php

require_once('BaseBusiness.php');
require_once('DateUtil.php');
require_once('SupportException.php');
require_once('SessionUtil.php');
require_once('PageSplitBusiness.php');

class BigSearchBusiness extends PageSplitBusiness
{
	private $totalRows;
	private $isTotalRows = false;
	function Searchinfo($keyword,$type,$currpage,$numbersperpage)
	{
		
		if($keyword)
		{
	       if($type==1||$type==2)
	       {
	       	
				$sql = "SELECT * FROM t_grp_main t WHERE   
				              (t.groupname LIKE '%$keyword%'
							  or t.lables LIKE '%$keyword%') 
							  AND t.shieldflg = 0 ";
				$sqlcount="SELECT count(1) FROM t_grp_main t WHERE   
				              (t.groupname LIKE '%$keyword%'
							  or t.lables LIKE '%$keyword%') 
							  AND t.shieldflg = 0 ";
		       	if (!$this->isTotalRows)
			    {
			    	$countnum=$this->buildTotalRow($sqlcount);
				    $this->setTotalRow($countnum);
					 
					$this->isTotalRows = true;
				
			    }
				 $result['info'] = $this->QueryForPageSplit($sql, $currpage, $numbersperpage);
				 $result['countnum']=$countnum;
				 return $result;
	       }
	       elseif($type==3)
	       {
	       	
	       }
	       elseif ($type==4)
	       {
	       }
		}
		else 
			return null;
	}
}