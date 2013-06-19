<?php
require_once('BaseBusiness.php');
require_once('DateUtil.php');
require_once('SupportException.php');
require_once('SessionUtil.php');
require_once('PageSplitBusiness.php');



class forum_homeBusiness extends PageSplitBusiness
{
	
	private $totalRows;
	private $isTotalRows = false;
	
	/**
	 * 
	 *查询帖子
	 *@param string $type:帖子所属板块
	 *@param string $order:帖子的排序方式
	 *@param string $currpage:分页的总页数
	 *@param string $numbersperpage:每一页多少条回复
	 *@param string $id:用户的id
	 *@param string $power:是否是版主
	 */
    function  searchforum($type,$order,$currpage,$numbersperpage,$id,$power)
	{
		$sql = "SELECT 
                    a.ID,
                    a.title,
                    a.creater,
                    DATE(a.createtime) AS createday,
                    a.browsercount,
                    a.excelflg,
                    a.shieldflg,
                    a.topflg,
                    b.nickname,
                    c.replyname,
                    c.replyID,
                    d.name,
                    d.imagename,
                    a.replynum,
                    DATE(c.lastreply) AS replyday
                   FROM `t_forum_topic` a
                   INNER JOIN `t_user` b
                   ON  a.creater = b.ID
                   INNER JOIN `m_forumtopic_catalog` d
                   ON  a.idm_forumtopic_catalog =  d.ID
                   LEFT  join   
                   (
	                  SELECT  creater AS replyID,businessid,nickname AS replyname,MAX(t_reply.createtime) AS lastreply FROM t_reply 
	                  INNER JOIN t_user 
	                  ON    creater =  t_user.ID 
	                  WHERE  businesstype = '4'
	                  AND  `status` = '1' ";
	 if(empty($power))
		{
	      $sql .="AND  t_reply.shieldflg = '0' ";
	    } 
	  $sql .=" GROUP BY  businessid
                  ) c
                 ON a.ID  = c.businessid
                 WHERE a.idm_forum_catalog = '$type'
                 AND b.`status` = '1'
	             AND b.shieldflg = '0' ";
	if(empty($power))
	   {
	     $sql .=" AND  a.shieldflg = '0'";
	   }
			if (!empty($id))
		        {
				   $sql .= " AND a.creater = '$id'";
			     }
			     
			     
	  $sqlcount = "SELECT count(1)  FROM `t_forum_topic`
                  INNER JOIN `t_user` 
                  ON  t_forum_topic.creater = t_user.ID
                  INNER JOIN `m_forumtopic_catalog` 
                   ON t_forum_topic.idm_forumtopic_catalog =  m_forumtopic_catalog.ID 
                  WHERE 
                  t_forum_topic.idm_forum_catalog = '$type'
                  AND t_user.`status` = '1' 
	              AND t_user.shieldflg = '0' ";
                  if(empty($power))
                  {
                   $sqlcount .=" AND  t_forum_topic.shieldflg = '0' ";
                  }
                  
	        if (!empty($id))
		     	{
				   $sqlcount .= " AND t_forum_topic.creater = '$id'";
			    }
			    
			    
		    if($order == 1)
			   {
			   	$sql .= " ORDER BY a.topflg desc,c.lastReply desc ,a.createtime desc";
                }
		    elseif($order == 2)
			 {
				$sql .="  ORDER BY a.topflg desc,a.createtime DESC";
			  }
		    elseif($order == 3)
			 {
				  $sql .=" AND a.excelflg = '1' 
				         ORDER BY a.topflg desc,a.createtime DESC";
			      $sqlcount .= " AND t_forum_topic.excelflg = '1'";
			
			}
			if (!$this->isTotalRows)
		    {
			    $this->setTotalRow($this->buildTotalRow($sqlcount));
				 
				$this->isTotalRows = true;
			
		    }
		 $result = $this->QueryForPageSplit($sql, $currpage, $numbersperpage);
		 return $result;
		 
	}
	/**
	 * 
	 *查询总共多少一级板块
	 */
    function seachfirstforumtype()
	{
		$sql = "SELECT ID,name
		        FROM `m_forum_catalog`
			    WHERE  parentid  = '99999'
			    OR parentid IS NULL
			    ORDER BY ID";
		$rs = $this->db->exceuteQuery($sql);
		return $rs;
	}
	/**
	 * 
	 *查询帖子话题信息
	 */
  function seachforumtopic()
	{
		$sql = "SELECT *
		        FROM `m_forumtopic_catalog`
			    WHERE  parentid  = '99999'
			    OR parentid IS NULL
			    ORDER BY ID";
		$rs = $this->db->exceuteQuery($sql);
		return $rs;
	}
	
   	/**
	 * 
	 *查找有多少帖子
	 *@param string $id:是否查某个人的帖子数量
	 *@param string $today:查是否为今天的帖子
	 *
	 */
	function counttiezi($id,$today)
		{
			$sql = "SELECT count(1) 
			        FROM `t_forum_topic`
				    INNER JOIN `t_user` 
				    ON creater = t_user.ID
					WHERE   t_user.status = '1'
					AND   t_forum_topic.shieldflg = '0' ";
			if(!empty($id))
			{
				$sql .=" AND creater='$id' ";
			}
			if(!empty($today))
			{
				$sql .=" AND to_days(t_forum_topic.createtime) = to_days(now())";
			}
			$rs = $this->db->exceuteQuery($sql);
			return $rs[0][0];
		}
	
   /**
	 * 
	 *查找所有板块的数量
	 *
	 */
	function countforum()
	{
		
	  $sql = "SELECT count(1) 
			  FROM `m_forum_catalog`
			  WHERE
			  parentid  = '99999'
			  OR parentid IS NULL
			;";
			$rs = $this->db->exceuteQuery($sql);
			return $rs[0][0];
	}

		/**
	 * 
	 *查询前十个最新的会员
	 *
	 */
	function searchmember()
	{
	
		 $sql = "SELECT ID,
		               nickname,
		               photo,
		               createtime,
		               DATEDIFF(now(),createtime) as days
							  FROM `t_user`
							  WHERE t_user.status = '1'
							  ORDER BY createtime DESC
							  limit 0,10;";
		 $rs = $this->db->exceuteQuery($sql);
		 foreach ($rs as &$value)
		 {
		 	$value['days']=$this->formatdate($value['days']);
		 	$value['createtime'] = $this->formatetime($value['createtime']);
		 }
		 unset($value);
		 return $rs;
	}
	/**
	 * 
	 *查询热点话题
	 *
	 */
	function searchhot()
	{
		 $sql = "SELECT t_forum_topic.ID,
		               title,
		               m_forumtopic_catalog.name,
		               t_forum_topic.createtime,
		               creater,
		               replynum,
		               t_user.nickname,
		               DATEDIFF(now(),t_forum_topic.createtime) as days
					   FROM `t_forum_topic`
					   INNER JOIN `t_user`
					   ON creater = t_user.ID
					   INNER JOIN `m_forumtopic_catalog`
					   ON idm_forumtopic_catalog = m_forumtopic_catalog.ID
					   WHERE t_forum_topic.shieldflg = '0'
					   AND   t_user.status = '1'
		 		       AND   t_user.shieldflg = '0'
					   ORDER BY replynum DESC,
					   createtime DESC
					   limit 0,10;";
		 $rs = $this->db->exceuteQuery($sql);
		 foreach ($rs as &$value)
		 {
		 	$value['days']=$this->formatdate($value['days']);
		 	$value['createtime'] = $this->formatetime($value['createtime']);
		 	$value['title']=$this->utf8Substr($value['title'],0,4);
		 }
		 unset($value);
		 return $rs;
		
	}
	/**
	 *
	 *查询精华
	 *
	 */
	
	function searchexcel()
	{
		$sql = "SELECT t_forum_topic.ID,
		               title,
		               m_forumtopic_catalog.name,
		               t_forum_topic.createtime,
		               creater,
		               replynum,
		               t_user.nickname,
		               DATEDIFF(now(),t_forum_topic.createtime) as days
					   FROM `t_forum_topic`
					   INNER JOIN `t_user`
					   ON creater = t_user.ID
					   INNER JOIN `m_forumtopic_catalog`
					   ON idm_forumtopic_catalog = m_forumtopic_catalog.ID
					   WHERE t_forum_topic.excelflg = '1'
				       AND   t_forum_topic.shieldflg = '0'
					   AND   t_user.status = '1'
		 		       AND   t_user.shieldflg = '0'
					   ORDER BY 
					   createtime DESC
					   limit 0,4;";
		$rs = $this->db->exceuteQuery($sql);
			
		return $rs;
	
	}
	/**
	 * 
	 *查询用户称昵
	 *@param string $id:用户的ID
	 */
	function searchuser($id)
	{
		$sql = "SELECT nickname
		        ,photo
                FROM `t_user`
			    WHERE  ID = '$id'
			    AND  status = '1'
			    ;";
		 $rs = $this->db->exceuteQuery($sql);
		 return $rs[0];
	}
	/**
	 * 
	 *查询版主信息
	 *@param string $id:板块的ID
	 */
	function searchadmin($id)
	{
		$sql = "SELECT *
                FROM `m_forum_catalog`
			    WHERE ID = '$id' 
			    ;";
		 $rs = $this->db->exceuteQuery($sql);
		 return $rs[0];
	}
/**
	 * 
	 *查询图片专区的ID
	 */
	function searchpic()
	{
		$sql = "SELECT ID
                FROM `m_forum_catalog`
			    WHERE name LIKE '%图片专区%' 
			    ;";
		 $rs = $this->db->exceuteQuery($sql);
		 return $rs[0][0];
	}
	/**
	 * 
	 *查询最新的图片
	 */
	function searchnewpic()
	{
		$sql = "SELECT ID,
		        oldname,
		        realname
                FROM `t_forum_file`
                ORDER BY createtime DESC
			    LIMIT 0,9;";
		 $rs = $this->db->exceuteQuery($sql);
		 foreach ($rs as &$value)
		 {
		 	$picinfo = explode(".",$value['oldname']);
		 	$value['oldname'] = $picinfo[0];
		 }
		 unset($value);
		 return $rs;
	}
	/**
	 * 
	 *查询所点击的帖子
	 *@param string $id:帖子的ID
	 */
	function searchoneforum($id)
	{
			$sql = "SELECT
					t_user.nickname,
				    t_user.photo,
					t_user.adminflg,
					t_user.onlinetime,
					t_user.level,
					t_user.forumcoins,
					t_user.coins,
					date(t_user.lastlogintime) AS logindate,
					t_forum_topic.*
				FROM
					`t_forum_topic`
				INNER JOIN `t_user` ON creater = t_user.ID
				WHERE
					t_forum_topic.ID = '$id'
				
					  ";
		 $rs = $this->db->exceuteQuery($sql);
		 return $rs[0];
	}
	

	/**
	 * 
	 *查询所有的回复
	 *@param string $id:帖子的ID
	 *@param string $currpage:分页的总页数
	 *@param string $numbersperpage:每一页多少条回复
	 *@param string $ORDER:$order=1时倒序排
	 *@param string $ORDER:$power=1代表是版主登陆
	 *@param string $userid:用户id
	 */
	function searchreply($id,$currpage,$numbersperpage,$order,$power,$userid)
	{
		$sql = "       SELECT
						t_user.nickname,
						t_user.photo,
						t_user.adminflg,
						t_user.onlinetime,
						t_user.level,
						t_user.forumcoins,
						t_user.coins,
						date(t_user.lastlogintime)AS logindate,
						t_reply.ID AS replyid,
						t_reply.content,
						t_reply.creater,
						t_reply.createtime,
						t_reply.shieldflg,
						t_reply.businessid
					FROM
						`t_reply`
					INNER JOIN `t_user` ON t_reply.creater = t_user.ID
					WHERE
						t_reply.businessid = '$id'
					AND t_reply.businesstype = '4'
					AND t_reply.idt_reply_parentid='0'
					
					AND t_user.`status` = '1'
					AND t_user.shieldflg = '0' ";
		        if(!empty($userid))
		        {
		        	$sql .=" AND t_reply.creater='$userid' ";
		        }
			    if(empty($power))
			    {
			    	$sql .=" AND t_reply.shieldflg = '0' ";
			    }
					
				if(empty($order))
				{	
					$sql .=" ORDER BY t_reply.createtime ";
				}
		        else 
		        {
		        	$sql .=" ORDER BY t_reply.createtime DESC";
		        }
		 $sqlcount ="SELECT
					COUNT(1)
					FROM
						`t_reply`
					INNER JOIN `t_user` ON t_reply.creater = t_user.ID
					WHERE
						t_reply.businessid = '$id'
					AND t_reply.idt_reply_parentid='0'
					AND t_reply.businesstype = '4'
					AND t_user.`status` = '1'
					AND t_user.shieldflg = '0'
					   ";
		 
	        if(empty($power))
			   {
			    	$sqlcount .=" AND t_reply.shieldflg = '0' ";
			   }
			if (!$this->isTotalRows)
		    {
			    $this->setTotalRow($this->buildTotalRow($sqlcount));
     			$this->isTotalRows = true;
			
		    }
		 $result = $this->QueryForPageSplit($sql, $currpage, $numbersperpage);
		 $result= $this->secondreply($result,$power);
		 return $result;
		 
	}
	/**
	 * 
	 *查询所有的二级回复
	 *
	 */
	
	function secondreply($data,$power)
	{      
			foreach($data as $key=>&$value)
			{
			$parentID = $value['replyid'];
			$sql = "       SELECT
							t_user.nickname,
							t_user.photo,
							t_reply.ID AS replyid,
							t_reply.content,
							t_reply.creater,
							t_reply.createtime,
							t_reply.shieldflg,
							t_reply.idt_reply_parentid
						FROM
							`t_reply`
						INNER JOIN `t_user` ON t_reply.creater = t_user.ID
						WHERE
						idt_reply_parentid ='$parentID'
						AND t_user.`status` = '1'
						AND t_user.shieldflg = '0' ";
			 if(empty($power))
			   {
			    	$sql .=" AND t_reply.shieldflg = '0' ";
			   }
			   $sql .=" ORDER BY t_reply.createtime";
			$msg=$this->db->exceuteQuery($sql);
			$value['secondReply'] = $msg;
		
	   }
	   unset($value);
	   return $data;
					
	}
	
	
	/**
	 * 
	 *查询某个帖子的回复数量
	 */
	function replycount($id)
	{
		$sql =  "SELECT
					COUNT(1)
					FROM
						`t_reply`
					INNER JOIN `t_user` ON t_reply.creater = t_user.ID
					WHERE
						t_reply.businessid = '$id'
					AND t_reply.businesstype = '4'
					AND t_reply.shieldflg = '0'
					AND t_user.`status` = '1'
					AND t_user.shieldflg = '0'
					   ";
		$rs = $this->db->exceuteQuery($sql);
		return $rs[0][0];
		
	}
	
	/**
	 * 
	 *查询今天某个人今天的回帖的数量用来计算校币
	 */
	function replytodaynum($id)
	{
		$sql =  "SELECT
					COUNT(1)
					FROM
						`t_reply`
					INNER JOIN `t_user` ON t_reply.creater = t_user.ID
					WHERE
						t_reply.creater = '$id'
					AND to_days(t_reply.createtime) = to_days(now())
					AND t_reply.businesstype = '4'
					AND t_user.`status` = '1'
					AND t_user.shieldflg = '0'
					   ";
		$rs = $this->db->exceuteQuery($sql);
		return $rs[0][0];
		
	}
/**
	 * 
	 *更新帖子的点击量
	 */
    function updatebrowercount($id)
	{
		$sql = "UPDATE `t_forum_topic` SET `browsercount`= browsercount+1 WHERE `ID`='$id'";
		$rs = $this->db->exceuteUpdate($sql);
		return $rs;
	}
	/**
	 *
	 *更新帖子的回复量
	 */
	function updatereplynum($forumid,$type)
	{
		if($type)
		{
			$sql="UPDATE t_forum_topic
				SET replynum = replynum + 1
				WHERE
				ID = '$forumid'";
		}
		else 
		{
			$sql="UPDATE t_forum_topic
			SET replynum = replynum - 1
			WHERE
			ID = '$forumid'";
		}
		$rs = $this->db->exceuteUpdate($sql);
		return $rs;
	}
	/**
	 * 
	 *更新帖子的标志如屏蔽，置顶等
	 */
	function updateflg($id,$field,$type)
	{
		if($id)
		{
		    $sql="UPDATE `t_forum_topic` SET `$field`='$type' WHERE `ID`='$id' ";
		    $rs = $this->db->exceuteUpdate($sql);
		     return $rs;
		}
	}
	/**
	 * 
	 *更新回复的屏蔽标志
	 */
    function updatereplyflg($id,$type)
	{
		if($id)
		{
		    $sql="UPDATE `t_reply` SET `shieldflg`='$type' WHERE `ID`='$id' ";
		    $rs = $this->db->exceuteUpdate($sql);
		     return $rs;
		}
	}
	/**
	 * 
	 *查询收听者的数量
	 *@param string $id:用户的ID
	 */
	function searchlistencount($id)
	{
		$sql=" SELECT COUNT(1)
                FROM `t_forum_listen`
                WHERE friendid ='$id'
                ";
		$rs = $this->db->exceuteQuery($sql);
		return $rs[0][0];
	}
	/**
	 * 
	 *更新校币的数量
	 *@param string $id:用户的ID
	 *@param string $type:$type为1时为回帖所得校币，为2时为发帖所得校币
	 */
	function updatecoins($id,$type)
	{
		if($type==1)
		{
		 $sql = "UPDATE `t_user` SET `forumcoins`=forumcoins+1 WHERE `ID`='$id'";
		}
		else if($type==2)
		{
			$sql = "UPDATE `t_user` SET `forumcoins`=forumcoins+2 WHERE `ID`='$id'";
		}
		 $rs = $this->db->exceuteUpdate($sql);
		 return $rs;
	}
	
	
	//截取字符串，否则中文可能乱码
	function utf8Substr($str, $from, $len)
	{
		return preg_replace('#^(?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,'.$from.'}'.
				'((?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,'.$len.'}).*#s',
				'$1',$str);
	}
	function formatetime($value)
	{
		$value = substr($value,11,2)." : "
				.substr($value,14,2);
		return $value;
	}
	//将日期转化为前几天的格式
	function formatdate($value)
	{
		if($value==0)
			$value='今日';
		elseif ($value==1)
		$value='昨日';
		elseif ($value==2)
		$value='前日';
		else
			$value='前'.$value.'日';
		return $value;
	}
	
}

?>