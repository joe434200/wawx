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
	       if($type==2)
	       {
	       	
				$sql = "SELECT * FROM t_grp_main t WHERE   
				              (t.groupname LIKE '%$keyword%'
							  or t.lables LIKE '%$keyword%') 
							  AND t.shieldflg = 0 ";
				$sqlcount="SELECT count(1) FROM t_grp_main t WHERE   
				              (t.groupname LIKE '%$keyword%'
							  or t.lables LIKE '%$keyword%') 
							  AND t.shieldflg = 0 ";
	       }
	       elseif($type==3)
	       {
		       	$sql = "SELECT
		          t_user.nickname,
		          t_user.email,
		          t_act_main.*, 
		          m_city.`name`
	          FROM
		          t_act_main
	              INNER JOIN t_user ON t_act_main.creater = t_user.ID
	              LEFT JOIN m_city ON t_act_main.place = m_city.ID
	              WHERE
		          t_act_main.actname LIKE '%$keyword%'";
		       	$sqlcount="SELECT
		          COUNT(1)
	               FROM
		          t_act_main
	              INNER JOIN t_user ON t_act_main.creater = t_user.ID
	              LEFT JOIN m_city ON t_act_main.place = m_city.ID
	              WHERE
		          t_act_main.actname LIKE '%$keyword%'";
		       	
	       }
	       elseif ($type==4)
	       {
	       	$sql="SELECT
	       	           t_forum_topic.ID,
						t_forum_topic.title,
						t_forum_topic.content
					FROM
						t_forum_topic
					 INNER JOIN `t_user` 
                     ON  t_forum_topic.creater = t_user.ID
                    INNER JOIN `m_forumtopic_catalog` 
                     ON t_forum_topic.idm_forumtopic_catalog =  m_forumtopic_catalog.ID 
					WHERE
						(title LIKE '%$keyword%'
					OR labels LIKE '%$keyword%')
					AND t_forum_topic.shieldflg = 0
	       	        AND t_user.`status` = '1' 
	                AND t_user.shieldflg = '0'";
	       	$sqlcount="SELECT
						COUNT(1)
					FROM
						t_forum_topic
					 INNER JOIN `t_user` 
                     ON  t_forum_topic.creater = t_user.ID
                    INNER JOIN `m_forumtopic_catalog` 
                     ON t_forum_topic.idm_forumtopic_catalog =  m_forumtopic_catalog.ID 
					WHERE
						(title LIKE '%$keyword%'
					OR labels LIKE '%$keyword%')
					AND t_forum_topic.shieldflg = 0
	       	        AND t_user.`status` = '1' 
	                AND t_user.shieldflg = '0'";
	       
	       }
	       elseif ($type==5)
	       {
	       	$sql="SELECT
	       	    ID,
				nickname,
				email,
				photo
			FROM
				t_user
			WHERE
				(nickname LIKE '%$keyword%'
			OR email LIKE '%$keyword%')
	       	 AND `status` = 1
             AND shieldflg = 0";
	       	$sqlcount="SELECT
				COUNT(1)
			    FROM
				t_user
		    	WHERE
				(nickname LIKE '%$keyword%'
			 OR email LIKE '%$keyword%')
	       	 AND `status` = 1
             AND shieldflg = 0";
	       	
	       }
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
		else 
			return null;
	}
}