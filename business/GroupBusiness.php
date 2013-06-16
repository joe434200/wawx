<?php
require_once('BaseBusiness.php');
require_once('DateUtil.php');
require_once('SupportException.php');

class GroupBusiness extends BaseBusiness
{
	
	//CREATE方法（INSERT）---------------------START-----------------------------------------------------
	
	/**
	 * 创建一个新的圈子
	 */
	
	function createNewGroup($data,$photoName)  //创建一个新的圈子
	{		
     		$rs = parent::Insert('t_grp_main', $data);  //插入圈子的信息
			
     		//根据图片名称搜索出圈子的ID
			$this->sql = "SELECT ID FROM t_grp_main WHERE photo = '$photoName'";
			$result = $this->db->exceuteQuery($this->sql);
			
			/*
			 * 将创建者加入到成员表中
			 */
			$this->createOrUpdataMember($result[0][0],$data['creater'],$data['createtime'],0,1);	
			
			//更新圈子类型的圈子数目
			$rs = $this->updateTypeNum($data['idm_grp_catalog'],$data['idm_grp_second_catalog'],$data['schoolname']);
			
			return $result[0][0];
	}
	
	/**
	 * 加入新成员
	 */
	function createOrUpdataMember($idt_grp_main,$idt_user,$jointime,$outflg,$auditflg,$module="create")
	{
		
		$member=array(
						"idt_grp_main"=>$idt_grp_main,
						"idt_user"=>$idt_user,
						"jointime"=>$jointime,
						"outflg"=>$outflg,
						"auditflg"=>$auditflg
					);
		/*
		 * 如果module是create就是直接加入（圈子无需审核）
		 */
		IF($module == "create")
		{
			$rs = parent::Insert('t_grp_member',$member);  //向成员表中插入创建者的信息
			
			return 1;
		}
		/*
		 * （圈子需要审核）就将该成员的审核标志变为0（通过审核了）
		 */
		ELSEIF($module=="updata")   //更新成员信息
		{
			$this->sql = "SELECT ID FROM t_grp_member WHERE idt_grp_main = '$idt_grp_main' AND idt_user='$idt_user'";
			$ID = $this->db->exceuteQuery($this->sql);
			$length = count($ID);
			$ID = $ID[$length-1]['ID'];		
			$rs = parent::Update('t_grp_member',$member,"u.ID='$ID'");
						
			return 1;
		}
	}
	
	/**
	 * 活动新成员
	 */
	function actNewMember($module,$idt_act_main,$idt_user,$time,$outflg=null)
	{
		//如果module是in，就是加入活动
		IF($module=="in")
		{
			$data = array(
						"idt_act_main"=>$idt_act_main,
						"idt_user"=>$idt_user,
						"jointime"=>$time,
						"outflg"=>0
						);
		    $rs = parent::Insert('t_act_member',$data);  //向成员表中插入新成员的信息
		}
		//否则，是关注活动
		ELSE
		{
			$data = array(
						"idt_act_main"=>$idt_act_main,
						"idt_user"=>$idt_user,
						"attentiontime"=>$time,
						);
			$rs = parent::Insert('t_act_attention',$data);  //向关注成员表中插入关注者的信息
		}
		return 1;
	}
	
	
	/**
	 * 上传圈子头像
	 */
	function Insert_file($image,$type)   ////插入file的信息
	{

		 $name_head = date('YmdHis',time()).rand(0, 100); ///生成图片头名字
	     $name_end = substr($image['name'],strpos($image['name'], "."));   //图片未名
	     $imageName = $name_head.$name_end; 
		
	     $upfile='./uploadfiles/group/'.$type.'/'.$imageName;

   	     $a = move_uploaded_file($image['tmp_name'], $upfile);
   	     //echo "<pre>";
	     //print_r($a);
		 return $imageName;
	}
	
	/**
	 * 创建一个新的回复
	 */
	function createNewReply($type,$data,$businessid)
	{
		IF($type==1)
		{
			$rs = parent::Insert('t_reply',$data); 
		}
	}
	
	/**
	 * 创建一个新的帖子（话题）
	 */
	function createNewTopic($data)
	{
		$rs = parent::Insert('t_grp_topic',$data); 
	}
	
	/**
	 * 创建一个新的活动（可能已经用不到）
	 */
	function createNewAct($data,$photoName)
	{
		$rs = parent::Insert('t_act_main',$data);
		
		$this->sql = "SELECT ID FROM t_act_main WHERE photo = '$photoName'";
		$result = $this->db->exceuteQuery($this->sql);
			
		$this->actNewMember("in", $result[0][0], $data['creater'], $data['createtime']);	
		
		return $result[0][0];
		
	}
	
	/**
	 * 创建一个新的标签或者更新标签的圈子数目
	 */
	function createOrUpdataLabel($data,$ID)   //标签函数
	{
		
		$len = count($data);
		
		for($i=0;$i<$len;$i++)   
		{
			$label = $data[$i];
			$this->sql = "SELECT * FROM t_grp_label WHERE label='$label'";
			$result = $this->db->exceuteQuery($this->sql);  //判断表中是否有该标签
			
			if(empty($result)||!isset($result))  //如果结果为空
			{
				$label_msg = array(
								  "label"=>$label,
								  "groupnum"=>1
								  );
				$rs = parent::Insert('t_grp_label',$label_msg);    //插入新的标签
				
				$this->sql = "SELECT * FROM t_grp_label WHERE label='$label'";  
				$result = $this->db->exceuteQuery($this->sql);  //获取新标签的ID
				
				/*
				 * 在t_grp_group_label中将圈子和标签信息存入
				 */
				$label_group = array(
									"idt_grp_label"=>$result[0][ID],
									"idt_grp_main"=>$ID
									);
									
				$rs = parent::Insert('t_grp_group_label',$label_group); 
			}
			//如果有该标签
			else 
			{
				$labelID = $result[0]['ID'];
				$result[0]['groupnum'] = $result[0]['groupnum']+1;
				
				//将该标签的groupnum数+1
				$label_msg = array(
									"ID"=>$labelID,
								    "label"=>$result[0]['label'],
									"groupnum"=>$result[0]['groupnum']
								  );
				
				$rs = parent::Update('t_grp_label',$label_msg,"u.ID='$labelID'");
				
				/*
				 * 在t_grp_group_label中将圈子和标签信息存入
				 */
				$label_group = array(
									"idt_grp_label"=>$labelID,
									"idt_grp_main"=>$ID
									);
									
				$rs = parent::Insert('t_grp_group_label',$label_group); 
			}
		}
		
		return 1;
	}
	/**
	 * 加关注，打招呼
	 * Enter description here ...
	 * @param unknown_type $type
	 * @param unknown_type $memID
	 * @param unknown_type $ID
	 */
	function takeCall($type,$memID,$ID)
	{
		$nowDate  = date('Y-m-d H:i:s',time());
		
		if($type=="hello")
		{
			$data = array(
				"senderid"=>$ID,
				"receiverid"=>$memID,
				"createtime"=>$nowDate,
				"type"=>1,
				"garbageflg"=>0,
				"sendflg"=>0,
				"receiveflg"=>0,
				"readflg"=>0
			);
			$rs = parent::Insert('t_message',$data); 
		}
		else
		{
			$data=array(
				"browserid"=>$memID,
				"idt_user"=>$ID,
				"createtime"=>$nowDate
			);
			$rs = parent::Insert('t_user_attention',$data); 
		}
	}
	
	//CREATE方法（INSERT）---------------------END-----------------------------------------------------
	
	
	
	
	//GET方法（SELECT）---------------------start-----------------------------------------------------
	
	/**
	 * 获取圈子的类型
	 */
	function  getGroupType($level=0,$parentid=null)///搜索出圈子类型 
	{
		If($level==0) //$level：0代表第一级分类，1带表第二级分类
		{
			$this->sql = "SELECT id,name,groupnum FROM m_grp_catalog WHERE parentid='99999'";
			$result = $this->db->exceuteQuery($this->sql);
			return $result;
		}
		
		IF($level==1)
		{
			$this->sql = "SELECT id,name,groupnum FROM m_grp_catalog WHERE parentid ='$parentid'";
			$result = $this->db->exceuteQuery($this->sql);
			return $result;
		}
		ELSE IF($level==3)
		{
			$this->sql = "SELECT schoolname FROM m_school";
			$result = $this->db->exceuteQuery($this->sql);
			return $result;
		}
		
	}
	
	/**
	 * 搜索出某个类型的圈子数量 
	 * Enter description here ...
	 * @param unknown_type $ID
	 */
	function  getGroupTypeNumber($ID)
	{
			$this->sql = "SELECT id,name,groupnum FROM m_grp_catalog WHERE ID='$ID'";
			$result = $this->db->exceuteQuery($this->sql);
			
			return $result[0]['groupnum'];
	}
	
	/**
	 * 搜索出圈子话题类型
	 * Enter description here ...
	 * @param unknown_type $level
	 * @param unknown_type $parentid
	 */
	function  getTopicType($level=0,$parentid=99999)
	{
		If($level==0) //$level：0代表第一级分类，1带表第二级分类
		{
			$this->sql = "SELECT id,name FROM m_grptopic_catalog WHERE parentid ='99999'";
			$result = $this->db->exceuteQuery($this->sql);
			return $result;
		}
		ELSE
		{
			$this->sql = "SELECT id,name FROM m_grptopic_catalog WHERE parentid ='$parentid' ";
			$result = $this->db->exceuteQuery($this->sql);
			return $result;
		}
		
	}
	
	/**
	 * 搜索出我的圈子的信息
	 * Enter description here ...
	 * @param unknown_type $label
	 * @param unknown_type $type
	 * @param unknown_type $id
	 */
	function getMyGroupMessage($label=null,$type=null,$id=null)   //我的圈子信息
	{
		$this->sql = "SELECT a.* 
					  FROM t_grp_main a 
					  WHERE 1=1 AND a.shieldflg = 0 ";
		IF($type=="school")   //学校圈
		{
			$this->sql = $this->sql."AND idm_grp_catalog='2' ";
		}
		ELSEIF ($type=="club") //社团圈
		{
			$this->sql = $this->sql."AND idm_grp_catalog='3' ";
		}
		ELSE //兴趣圈
		{
			$this->sql = $this->sql."AND idm_grp_catalog='1' ";
		}
		 
		IF($label=="create")  //我创建的圈子
		{
			$this->sql = $this->sql."AND creater='$id'";
		} 
		ELSEIF($label=="check")   //待审核的圈子
		{
			$this->sql = $this->sql."AND a.ID IN (
									 SELECT b.idt_grp_main 
									 FROM t_grp_member b 
									 WHERE b.idt_user = '$id'
									 AND b.auditflg='0'
									 AND b.outflg='0')"; 
		}
		ELSE  //审核通过的圈子（加入的圈子）
		{
			$this->sql = $this->sql."AND a.ID IN (
									 SELECT b.idt_grp_main 
									 FROM t_grp_member b 
									 WHERE b.idt_user = '$id'
									 AND b.auditflg='1')"; 
		}
		
		$result = $this->db->exceuteQuery($this->sql);
		return $result;
		
	}
	
	
	/**
	 * 单个圈子首页的所有信息
	 * 传单个参数取出相应的首页信息，只传ID搜索出该圈子的基本信息
	 * Enter description here ...
	 * @param unknown_type $ID
	 * @param unknown_type $topic
	 * @param unknown_type $member
	 * @param unknown_type $photo
	 */
	function getGroupMessage($ID,$topic=null,$member=null,$photo=null) //查询首页圈子的信息
	{
		$main_msg = array();
		$topic_msg = array();
		$member_msg = array();
		$photo_msg = array();
		
		IF(!empty($ID) || isset($ID)) //GET圈子的基本信息
		{
			$this->sql="SELECT main.*,t.ID uID,t.nickname,t.email,t.photo tp
						FROM t_grp_main main 
						INNER JOIN t_user t
						ON t.ID = main.creater
						WHERE main.ID='$ID'";
			$main_ary = $this->db->exceuteQuery($this->sql);
			$main_ary[0]['createtime'] = $this->dataFormat($main_ary[0]['createtime']); 
			
			/**
			 * 设置圈子的等级
			 */
			$this->setGrpLevel($main_ary[0]);
			
			$this->sql="SELECT t.ID uID,t.nickname,t.email
						FROM t_user t
						INNER JOIN t_grp_main main
						ON (t.ID = main.admin1 or t.ID = main.admin2 or t.ID = main.admin3)
						WHERE main.ID='$ID'";
			$admin['admin'] = $this->db->exceuteQuery($this->sql);
			
			$main_msg['main'] = array_merge($main_ary[0],$admin);
			
			
		}
		
		IF($topic=="topic")  //GET圈子首页话题信息
		{
			$this->sql="SELECT topic.*,t.ID uID,t.nickname,t.email,t.photo tp,m.name mn,m.imagename
							FROM t_grp_topic topic 
							INNER JOIN t_user t
							ON t.ID = topic.creater
							INNER JOIN m_grptopic_catalog m
							ON m.ID = topic.idm_grptopic_catalog
							WHERE topic.idt_grp_main='$ID'
							AND topic.shieldflg=0
							GROUP BY topic.topflg DESC,
							ID DESC
							LIMIT 10
							";
			$topic_ary = $this->db->exceuteQuery($this->sql);
			$topic_msg['topic'] = $topic_ary;
			$topic_msg['topic']=$this->dataFormat($topic_msg['topic'],1,"createtime");
			
			
		}
		
		IF($member=="member")  //GET圈子成员信息
		{
				$this->sql="SELECT member.*,
								   t.ID uID,
								   t.nickname,
								   t.schoolname,
								   t.department,
								   t.sex,
								   t.email,
								   t.photo tp
							FROM t_grp_member member 
							INNER JOIN t_user t
							ON t.ID = member.idt_user
							WHERE member.idt_grp_main='$ID'
							AND member.outflg='0'
							AND member.auditflg='1'
							GROUP BY member.ID
							DESC 
							LIMIT 12";
			$member_ary = $this->db->exceuteQuery($this->sql);
			
			$member_ary = $this->setTitle($member_ary, "nickname",6);
			$member_msg['member']=$member_ary;
			$member_msg['member']=$this->dataFormat($member_msg['member'],1,"jointime");
		}
		
		IF($photo=="photo")  //GET圈子照片信息
		{
			$this->sql="SELECT photo.*,t.ID uID,t.nickname,t.email,t.photo tp 
						FROM t_grp_photo photo 
						INNER JOIN t_user t
						ON t.ID = photo.creater
						WHERE photo.idt_grp_main='$ID'
						GROUP BY photo.ID
						DESC
						LIMIT 4";
			
			$photo_ary = $this->db->exceuteQuery($this->sql);
			$photo_msg['photo']=$photo_ary;
			$photo_msg['photo']=$this->dataFormat($photo_msg['photo'],1,"createtime");
		}
		
		$result =array_merge($main_msg,$topic_msg,$member_msg,$photo_msg);

		return $result;
	}
	
	
	/**
	 * 获取圈子话题数目，话题回复数目和浏览数，照片数目，成员的数目 
	 */
	//
	function getNumber($ID,$type=null,$module=null,$catalog=null) //ID:圈子ID type:类型  mudule:回复数OR浏览数
	{
		/*
		 * 圈子话题数目
		 */
		IF($type=="topic")
		{
			IF($module=="reply")  //ID：圈子话题ID 圈子回复数
			{
				$this->sql = "SELECT replynum
		   				      FROM t_grp_topic
		   				      WHERE ID='$ID'";
			}
			ELSEIF($module=="browse")  //ID：圈子话题ID 圈子浏览数
			{
				$this->sql = "SELECT browsenum 
		   				      FROM t_grp_topic
		   				      WHERE ID='$ID'";
			}
			ELSEIF($module=="catalog") //圈子单个类型的圈子数：提问帖，话题帖等
			{
				$this->sql = "SELECT count(ID) catalognum
		   				      FROM t_grp_topic
		   				      WHERE idm_grptopic_catalog='$catalog'
		   				      AND idt_grp_main='$ID'";
			}
		    ELSE  //ID：圈子ID 圈子话题数
		    {
		    	$this->sql = "SELECT topicnum
		   				 FROM t_grp_main
		   				 WHERE ID='$ID'";
		    }
		}
		ELSEIF($type=="photo") //ID：圈子ID 圈子照片数目
		{
			$this->sql = "SELECT photonum
		   				 FROM t_grp_main
		   				 WHERE ID='$ID'";
		}
		ELSEIF($type=="member") //ID：圈子ID  圈子成员数
		{
			$this->sql = "SELECT membernum
		   				  FROM t_grp_main
		   				  WHERE ID='$ID'";
		}
		ELSEIF($type=="act") //圈子活动数目
		{
			IF($module=="in")  //圈子活动成员数
			{
				$this->sql = "SELECT membernum
			   				  FROM t_act_main
			   				  WHERE ID='$ID'";
			}
			ELSEIF($module=="attention") //圈子关注人数
			{
				$this->sql = "SELECT attentionnum
			   				  FROM t_act_main
			   				  WHERE ID='$ID'";
			}
			ELSEIF($module=="photo")//圈子活动图片数目
			{
				$this->sql = "SELECT photonum
			   				  FROM t_act_main
			   				  WHERE ID='$ID'";
			}
			ELSEIF($module=="reply") //圈子活动评论数
			{
				$this->sql = "SELECT replynum
			   				  FROM t_act_main
			   				  WHERE ID='$ID'";
			}
			ELSEIF($module=="catalog") //圈子活动单个类型数目，如线上活动
			{
				$this->sql = "SELECT count(ID) actnum
			   				  FROM t_act_main
			   				  WHERE idt_grp_main='$ID'
			   				  AND idm_act_catalog = '$catalog'";
			}
			ELSE //圈子活动数
			{
				$this->sql = "SELECT actnum
			   				  FROM t_grp_main
			   				  WHERE ID='$ID'";
			}
		}
		
		$number = $this->db->exceuteQuery($this->sql);
		//echo "<pre>";
		//print_r($number);
		return $number[0];
	}
	
	/**
	 * 得到单个话题，圈子，活动的全部信息
	 * Enter description here ...
	 * @param unknown_type $ID
	 * @param unknown_type $type
	 */
	function getSingleMessage($ID,$type)
	{
		$this->sql = "SELECT t.*,u.ID uID,u.nickname,u.email,u.photo up FROM ";
		IF($type=="topic")     //话题 
		{
			$this->sql = $this->sql."t_grp_topic t";
		}
		ELSEIF($type=="photo") //图片
		{
			$this->sql = $this->sql."t_grp_photo t";
		}
		ELSEIF($type=="act") //活动
		{
			$this->sql = $this->sql."t_act_photo t";
		}
		
		$this->sql = $this->sql." INNER JOIN t_user u WHERE t.creater = u.ID AND t.ID='$ID'";
		
		
		$rs = $this->db->exceuteQuery($this->sql);
		return $rs[0];
		
		
	}
	
	/**
	 * 
	 * 获取一级回复
	 */
	function getReply($businessid,$type,$number=0) //获取回复
	{
		$reply = array();
		$base = array();
	
		$this->sql = "SELECT r.*,u.ID uID,u.nickname,u.email,u.photo up FROM t_reply r
					  INNER JOIN t_user u
					  INNER JOIN ";
		IF($type=="topic")  //获取某个话题的回复
		{
			$this->sql = $this->sql."t_grp_topic t WHERE r.businesstype = 1 
									 AND r.level=1";
		}
		ELSEIF($type=="photo")  //获取某个图片的回复
		{
			$this->sql = $this->sql."t_grp_photo t WHERE r.businesstype = 8
									 AND r.level=1";
		}
		ELSEIF($type=="act") //获取活动的回复
		{
			$this->sql = $this->sql."t_act_main t WHERE r.businesstype = 8 AND t.grpflg=1
									 AND r.level=1";
		}	
		ELSEIF($type=="newReply") //图片的最新评论
		{
			$this->sql = "SELECT r.*,u.ID uID,u.nickname,u.email,u.photo up,t.ID pID,t.realname FROM t_reply r
					  	  INNER JOIN t_user u
					  	  ON u.ID = r.creater
					      INNER JOIN t_grp_photo t 
					      ON r.businessid=t.ID 
					      WHERE r.businesstype = 8
					      AND r.level=1
					      GROUP BY r.ID 
					      DESC 
					      LIMIT $number";  //图片最新评论
		}
		ELSEIF($type=="actNewRe") //活动的最新评论
		{
			$this->sql = "SELECT r.*,u.ID uID,u.nickname,u.email,u.photo up,t.ID pID,t.realname FROM t_reply r
					  	  INNER JOIN t_user u
					  	  ON u.ID = r.creater 
					      INNER JOIN t_act_photo t 
					      ON r.businessid=t.ID 
					      WHERE r.businesstype = 7
					      AND r.level=1
					      AND r.shieldflg = 0
					      GROUP BY r.ID 
					      DESC 
					      LIMIT $number";
		}
		ELSEIF($type=="photoReply")  //活动图片的评论
		{
			$this->sql = "SELECT t.*,u.ID uID,u.email,u.nickname,u.photo tp 
					  FROM t_reply t 
					  INNER JOIN t_user u
					  ON u.ID = t.creater
					  INNER JOIN t_act_photo p
					  ON p.ID = t.businessid
					  WHERE t.businessid='$businessid'
					  AND t.level=1
					  AND t.shieldflg = 0
					  AND t.businesstype = 7
					  ORDER BY t.ID DESC
					";
		}
		ELSEIF($type=="actReply")   //活动评论
		{
			$this->sql = "SELECT t.*,u.ID uID,u.email,u.nickname,u.photo up 
						  FROM t_reply t 
						  INNER JOIN t_user u
						  ON u.ID = t.creater
						  WHERE t.businessid='$businessid'
						  AND t.level=1
						  AND t.businesstype = 2
						  AND t.shieldflg=0
						  ORDER BY t.ID DESC
					";
		}
		
		if($type=="topic"||$type=="photo"||$type=="act")
		{
			$module = $type;
			$this->sql = $this->sql." AND u.ID = r.creater AND r.businessid=t.ID AND r.businessid = '$businessid' AND r.shieldflg=0 GROUP BY r.ID DESC";
		}
		elseif($type=="actNewRe"||$type=="photoReply"||$type=="actReply")
		{
			$module="act";
		}
		elseif($type=="newReply")
		{
			$module="photo";
		}
	
		$reply['reply'] = $this->db->exceuteQuery($this->sql);
		
		if($type=="topic"||$type=="photo"||$type=="act"||$type=="photoReply"||$type=="actReply")
		{
			/*
			 * 获取二级回复
			 */
			$reply['reply']= $this->getSecondReply($reply['reply']);
		}
		$base['base'] = $this->getSingleMessage($businessid,$module);
		
		$rs = array_merge($base,$reply);
		
		return $rs;
	}
	
	/**
	 * 获取二级回复
	 * Enter description here ...
	 * @param unknown_type $data
	 */
	function getSecondReply($data)
	{
		
		$len = count($data);
		
		
		
		for($i=0;$i<$len;$i++)
		{
			$parentID = $data[$i]['ID'];
			$this->sql = "SELECT r.*,u.ID uID,u.nickname,u.email,u.photo up FROM t_reply r
					  	  INNER JOIN t_user u
					      ON u.ID=r.creater
					      WHERE r.level=2
					      AND r.idt_reply_parentid ='$parentID'
					      AND r.shieldflg = 0";
			$msg=$this->db->exceuteQuery($this->sql);
			
			$data[$i]['secondReply'] = $msg;
		}
		
		return $data;

	}
	
	
	
	
	/**
	 * 圈子单个活动的首页
	 * Enter description here ...
	 * @param unknown_type $grpID
	 * @param unknown_type $actID
	 */
	function getSingelAct($grpID,$actID) //圈子单个活动的首页信息
	{
		$act_main = array();
		$act_attention = array();
		$act_member = array();
		$act_photo = array();
		$act_reply = array();
		
		$this->sql = "SELECT act.* ,u.ID uID,u.email,u.nickname
					  FROM t_act_main act 
					  INNER JOIN t_user u
					  ON u.ID = act.creater
					  WHERE act.ID='$actID'";
		$act_main = $this->db->exceuteQuery($this->sql);   //活动的基本信息
		$act_main = $this->dataFormat($act_main,1,"begintime");
		$act_main = $this->dataFormat($act_main,1,"endtime");
		$act_main_msg['main'] = $act_main['0'];
		
		
			$this->sql = "SELECT u.ID uID,u.photo,u.email,u.nickname,act.*
						  FROM t_act_member act 
						  INNER JOIN t_user u
						  ON u.ID = act.idt_user
						  WHERE act.idt_act_main='$actID'
						  AND act.outflg = 0
						  GROUP BY act.ID
						  DESC
						  LIMIT 6";
			$act_member = $this->db->exceuteQuery($this->sql);  //活动成员信息
			$act_member_msg['member'] = $act_member;
	
		
			$this->sql = "SELECT u.ID uID,u.photo,u.email,u.nickname,act.*
						  FROM t_act_photo act 
						  INNER JOIN t_user u
						  ON u.ID = act.creater
						  WHERE act.idt_act_main='$actID'
						  GROUP BY act.ID
						  DESC
						  LIMIT 5 ";
			
			$act_photo = $this->db->exceuteQuery($this->sql);  //活动图片信息
			$act_photo_msg['photo'] = $act_photo;
		
		
		
		$this->sql = "SELECT r.*,u.ID uID,u.photo,u.email,u.nickname
					  FROM t_reply r
					  INNER JOIN t_user u
					  ON u.ID = r.creater
					  WHERE r.businessid = '$actID'
					  AND r.businesstype = 2
					  AND r.shieldflg = 0
					  AND r.level=1
					  GROUP BY r.ID
					  DESC
					  LIMIT 5 ";
		$act_reply = $this->db->exceuteQuery($this->sql);  //活动评论
		$act_reply_msg['reply'] = $act_reply;
		
		$act_rs = array_merge_recursive($act_main_msg,$act_member_msg,$act_photo_msg,$act_reply_msg);
		
		return $act_rs;
	}
	
	/**
	 * 获取下一张图片的ID
	 * Enter description here ...
	 * @param unknown_type $ID
	 * @param unknown_type $page
	 * @param unknown_type $type
	 */
	function getPhotoPage($ID,$page,$type)
	{	
		
		IF($type=="act")
		{
			$this->sql="SELECT photo.*
						FROM t_act_photo photo 
						WHERE photo.idt_act_main='$ID'
						ORDER BY photo.ID
						DESC
						LIMIT $page,1";
		}
		ELSE
		{
			$this->sql="SELECT photo.*
						FROM t_grp_photo photo 
						WHERE photo.idt_grp_main='$ID'
						ORDER BY photo.ID
						DESC
						LIMIT $page,1";
		}
		
		$photoID = $this->db->exceuteQuery($this->sql);

		return $photoID[0][0];
		
	}
	
	/**
	 * 分页函数
	 * 通过sql文获取分页数据
	 * Enter description here ...
	 * @param unknown_type $ID
	 * @param unknown_type $page
	 * @param unknown_type $pagesize
	 * @param unknown_type $type
	 * @param unknown_type $module
	 * @param unknown_type $catalog
	 */
	function getPageData($ID,$page,$pagesize,$type,$module=null,$catalog=null)
	{
		$data = array();
		
		$start = $page*$pagesize;
		
		IF($type=="topic")   //话题分页数据
		{
			$this->sql="SELECT topic.*,t.ID uID,t.email,t.nickname,t.photo tp,m.name mn,m.imagename
							FROM t_grp_topic topic 
							INNER JOIN t_user t
							ON t.ID = topic.creater
							INNER JOIN m_grptopic_catalog m 
							ON topic.idm_grptopic_catalog = m.ID
							WHERE topic.idt_grp_main='$ID'
							AND topic.shieldflg=0 
							";
			/**
			 * 话题类型
			 */
			IF(!empty($catalog)||isset($catalog))  
			{
				$this->sql = $this->sql." AND topic.idm_grptopic_catalog = '$catalog' ";
			}
			
			/**
			 * 话题回复
			 */
			IF($module=="reply")
			{
				$this->sql = $this->sql." GROUP BY topflg DESC,replynum DESC,topic.ID DESC LIMIT $start,$pagesize";
			}
			/**
			 * 话题浏览
			 */
			ELSEIF($module=="browse")
			{
				$this->sql = $this->sql." GROUP BY topflg DESC,browsenum DESC,topic.ID DESC LIMIT $start,$pagesize";
			}
			/**
			 * 默认模式
			 */
			ELSE
			{
				$this->sql = $this->sql." GROUP BY topflg DESC,topic.ID DESC LIMIT $start,$pagesize";
			}
			
			$data = $this->db->exceuteQuery($this->sql);
			$data=$this->dataFormat($data,1,"createtime");
			
		}
		/**
		 * 圈子照片
		 */
		ELSEIF($type=="photo")
		{
			$this->sql="SELECT photo.*,t.ID uID,t.email,t.nickname,t.photo tp 
						FROM t_grp_photo photo 
						INNER JOIN t_user t
						ON t.ID = photo.creater
						WHERE photo.idt_grp_main='$ID'
						GROUP BY photo.ID
						DESC
						LIMIT $start,$pagesize";
			
			$data = $this->db->exceuteQuery($this->sql);
			$data=$this->dataFormat($data,1,"createtime");
		}
		/**
		 * 圈子成员
		 */
		ELSEIF($type=="member")
		{
				$this->sql="SELECT member.*,t.ID uID,t.email,t.nickname,t.schoolname,t.department,t.sex,t.photo tp
							FROM t_grp_member member 
							INNER JOIN t_user t
							ON t.ID = member.idt_user
							WHERE member.idt_grp_main='$ID'
							AND member.outflg='0'
							GROUP BY member.auditflg
							DESC,
							member.ID
							DESC 
							LIMIT $start,$pagesize";
				
			$data = $this->db->exceuteQuery($this->sql);
			$data=$this->dataFormat($data,1,"createtime");
			$data=$this->checkAttention($data);
		}
		/**
		 * 圈子活动
		 */
		ELSEIF($type=="activity")
		{
			$this->sql="SELECT act.*,t.ID uID,t.email,t.nickname,t.photo tp 
						FROM t_act_main act 
						INNER JOIN t_user t
						ON t.ID = act.creater
						WHERE act.idt_grp_main='$ID'";
			
		    IF(!empty($catalog)||isset($catalog))
			{
				$this->sql = $this->sql." AND act.idm_act_catalog = '$catalog' ";
			}
			
			
			IF($module=="attention")
			{
				$this->sql = $this->sql." GROUP BY attentionnum DESC,act.ID DESC LIMIT $start,$pagesize";
			}
			ELSEIF($module=="member")
			{
				$this->sql = $this->sql." GROUP BY membernum DESC,act.ID DESC LIMIT $start,$pagesize";
			}
			ELSE
			{
				$this->sql = $this->sql." GROUP BY act.ID DESC LIMIT $start,$pagesize";
			}
			
			$data = $this->db->exceuteQuery($this->sql);
			$data=$this->dataFormat($data,1,"begintime");
			$data=$this->dataFormat($data,1,"endtime");
			$data = $this->checkDateOver($data,1);
		}
		/**
		 * 单个活动
		 */
		ELSEIF($type=="singleAct")
		{
			IF($module=="member")
			{
				$this->sql="SELECT act.*,t.ID uID,t.email,t.nickname,t.photo tp,t.sex,t.schoolname,t.department
							FROM t_act_member act 
							INNER JOIN t_user t
							ON t.ID = act.idt_user
							WHERE act.idt_act_main='$ID'
							AND act.outflg=0
							GROUP BY act.ID DESC LIMIT $start,$pagesize";	
				
			}
			ELSEIF($module=="photo")
			{
				$this->sql="SELECT act.*,t.ID uID,t.email,t.nickname,t.photo tp 
							FROM t_act_photo act 
							INNER JOIN t_user t
							ON t.ID = act.creater
							WHERE act.idt_act_main='$ID'
							GROUP BY act.ID DESC LIMIT $start,$pagesize";
			}
			ELSEIF($module=="reply")
			{
				$this->sql="SELECT t.*,u.ID uID,u.email,u.nickname,u.photo tp 
							FROM t_reply t 
							INNER JOIN t_user u
							ON u.ID = t.creater
							WHERE t.businessid='$ID'
							AND t.businesstype = 2
							AND t.shieldflg = 0
							AND t.level = 1
							GROUP BY t.ID DESC LIMIT $start,$pagesize";
			}
			ELSE{}
			
			$data = $this->db->exceuteQuery($this->sql);
		
			if($module=="member")
			{
				$data = $this->checkAttention($data);
			}
			//$data=$this->dataFormat($data,1,"createtime");
		}
		ELSE
		{			
		}
		
		return $data;
	}
	
	/**
	 * 获取回复的分页
	 * Enter description here ...
	 * @param unknown_type $module
	 * @param unknown_type $ID
	 */
	function getReplyPageMessage($data,$pagesize,$page)
	{
		$start = ($page-1)*$pagesize;
		
		for($i=0;$i<$pagesize;$i++)
		{
			if(!empty($data[$start+$i]))
			{
				$rs[$start+$i] = $data[$start+$i];
			}
			else 
			{
				break;
			}
		}
		return $rs;
	}
	
	
	
	/**
	 * 获取感兴趣的圈子数目
	 * Enter description here ...
	 */
	function getInsNum()
	{
		$this->sql ="SELECT ID FROM t_grp_main WHERE shieldflg=0";
			
		$data = $this->db->exceuteQuery($this->sql);
		
		return count($data);
	}
	
	/**
	 * 获取优秀圈主的数目
	 * Enter description here ...
	 */
	function getExcelringNum()
	{
		$this->sql ="SELECT ID FROM t_user WHERE STATUS = 1
						AND excelringflg = 1";
		$data = $this->db->exceuteQuery($this->sql);
		
		return count($data);
	}
	
	
	/**
	 * 获取圈子达人的数目
	 */
	function getSuper()
	{
		$this->sql = "SELECT * FROM t_user WHERE status = 1 AND superringflg = 1";
		
		$data = $this->db->exceuteQuery($this->sql);
		
		return count($data);
	}
	
	/**
	 * 圈子首页的所有信息
	 * Enter description here ...
	 * @param unknown_type $module
	 * @param unknown_type $start
	 */
	
	function getHomeMessage($module=null,$start=0)  //圈子首页信息  
	{	
		
		$nowDate  = date('Y-m-d H:i:s',time());
		
		$like_msg = array();
		$topic_msg = array();
		$excelring_msg = array();
		$super_msg = array();
		$actIns_msg = array();
		$newTop_msg = array();
		$label_msg = array();
		
		/**
		 * 搜索出感兴趣的圈子
		 */
		
		IF($module=="like"||$module=="home")
		{
			$this->sql="SELECT * FROM t_grp_main
					WHERE shieldflg = 0
					GROUP BY membernum 
					DESC,ID ASC
					LIMIT $start,6";
			
			$data = $this->db->exceuteQuery($this->sql);

			$like_msg['like'] = $data;
		}
		
		/**
		 * 推荐的话题
		 */
		IF($module=="topic"||$module=="home")
		{
			
			$this->sql="SELECT t.*,g.groupname,u.nickname
			            FROM t_grp_topic t
						INNER JOIN t_grp_main g
						ON g.ID=t.idt_grp_main
						INNER JOIN t_user u
						ON u.ID=t.creater
						WHERE t.shieldflg =0
						GROUP BY t.replynum 
						DESC,t.ID ASC
						LIMIT 6";			
			
			$data = $this->db->exceuteQuery($this->sql);
			
			$topic_msg['topic'] = $data;
			
			$topic_msg['topic'] = $this->setTitle($topic_msg['topic'], "title");
			
		}
		
		/**
		 * 优秀圈主
		 */
		IF($module=="excelring"||$module=="home")  //优秀圈住
		{
			
			$this->sql="SELECT u.*
						FROM t_user u		
						WHERE u. STATUS = 1
						AND u.excelringflg = 1
						GROUP BY u. LEVEL DESC,u.ID ASC
						LIMIT $start,2";
			$data = $this->db->exceuteQuery($this->sql);
			
			$data = $this->getMemberTopic($data,"group");
			
			$excelring_msg['excelring'] = $data;
		}
		
		/**
		 * 圈子达人
		 */
		IF($module=="super"||$module=="home")  //圈子达人
		{
			
			$this->sql="SELECT * FROM t_user
						WHERE status = 1
						AND superringflg = 1
						GROUP BY level 
						DESC,ID ASC
						LIMIT $start,2";
			
			
			$data = $this->db->exceuteQuery($this->sql);
			
			$data = $this->getMemberTopic($data,"topic");


			$super_msg['super'] = $data;
			
			
		}
		
		/**
		 * 热门标签
		 */
		IF($module=="label"||$module=="home")  //标签
		{
			$this->sql="SELECT * FROM t_grp_label
						WHERE 1=1
						GROUP BY groupnum
						DESC,ID ASC
						LIMIT 10";
			
			$data = $this->db->exceuteQuery($this->sql);
		
			$label_msg['label'] = $data;
		}
		
		/**
		 * 热门活动
		 */
		IF($module=="actIns"||$module=="home")
		{
			$this->sql="SELECT t.* FROM t_act_main t
						WHERE t.endtime >'$nowDate'
						AND t.grpflg = 1
						GROUP BY t.membernum
						DESC,ID ASC
						LIMIT 3";
			
			$data = $this->db->exceuteQuery($this->sql);
			
			$data = $this->dataFormat($data,1,"begintime");
			$data = $this->dataFormat($data,1,"endtime");
		
			$actIns_msg['actIns'] = $data;
			$actIns_msg['actIns'] = $this->setTitle($actIns_msg['actIns'], "actname");
		}
		
		/**
		 * 最新的活动
		 */
		IF($module=="newTopic"||$module=="home")
		{
			$this->sql="SELECT t.*,u.ID uID,u.email,u.nickname FROM t_grp_topic t
						INNER JOIN t_user u
						ON u.ID = t.creater
						WHERE t.shieldflg = 0
						GROUP BY t.ID DESC
						LIMIT 5";
			
			$data = $this->db->exceuteQuery($this->sql);
			
			$newTop_msg['newTopic'] = $data;
			
			$newTop_msg['newTopic'] = $this->setTitle($newTop_msg['newTopic'], "title");
		}
		
		
		$rs = array_merge($like_msg,$topic_msg,$excelring_msg,$super_msg,$actIns_msg,$newTop_msg,$label_msg);

		return $rs;
	}

	/**
	 * 根据圈子达人的信息搜索出他的热门帖子
	 * Enter description here ...
	 * @param unknown_type $data
	 * @param unknown_type $module
	 */
	function getMemberTopic($data,$module)
	{
		$len = count($data);
		
		if($module=="group")
		{
			for($i=0;$i<$len;$i++)
			{
				$ID = $data[$i]['ID'];
				$this->sql="SELECT g.ID gID,g.groupname,g.membernum
							FROM t_grp_main g
							WHERE g.creater='$ID'
							AND g.shieldflg = 0
							ORDER BY g.membernum DESC,ID ASC LIMIT 1";
				$rs = $this->db->exceuteQuery($this->sql);
			
				$data[$i] = array_merge($data[$i],$rs[0]);
			
			}
		}
		else 
		{
			for($i=0;$i<$len;$i++)
			{
					$ID = $data[$i]['ID'];
					$this->sql="SELECT g.ID gID,g.title,g.replynum,g.idt_grp_main
								FROM t_grp_topic g
								WHERE g.creater='$ID'
								ORDER  BY g.replynum DESC,
								ID DESC
								LIMIT 3";
					$rs = $this->db->exceuteQuery($this->sql);
					
					for ($k=0;$k<3;$k++)
					{
						 $rs_msg['topic'][$k] = $rs[$k];
					}
					
					$rs_msg['topic'] = $this->setTitle($rs_msg['topic'],"title");
					
					$data[$i] = array_merge($data[$i],$rs_msg);
			}
				
		}
		
		return $data;
	}

	
	/**
	 * 获取活动的类型
	 * Enter description here ...
	 */
	function  getActType()
	{
		$this->sql = "SELECT * FROM m_act_catalog 
		              WHERE parentid = 99999";
		$data = $this->db->exceuteQuery($this->sql);
		return $data;
		
	}
	
	
	/*
	  搜索圈子，学校圈，兴趣圈，社团圈的信息
	 */
	function getSelectMessage($firstID=null,/*第一个类型*/
							  $secondID=null,/*第二个类型*/
							  $minMember=null,/*最小人数*/
							  $maxMember=null,/*最大人数*/
							  $keyword=null,/*搜索关键字*/
							  $module=null,/*判断是时间还是热度排序*/
							  $school=null,/*学校名*/
							  $page,/*第几个页面*/
							  $pagesize)/*每个页面的数据量*/
	{
		
			
			$this->sql = "SELECT * FROM t_grp_main t WHERE 1=1 AND t.shieldflg = 0 ";
			
			/**
			 * 根据大类型，小类型搜索
			 */
			IF(empty($firstID)||!isset($firstID)){}
			ELSE
			{
				$this->sql = $this->sql."AND t.idm_grp_catalog = '$firstID' ";
				IF(empty($secondID)||!isset($secondID)||$secondID=="null"){
					$secondID = null;
				}
				ELSE
				{
					$this->sql = $this->sql."AND t.idm_grp_second_catalog ='$secondID' ";
				}
			}
			
			/**
			 * 最小人数-最大人数搜索
			 */
			IF(empty($minMember)||!isset($minMember)||$minMember=="null")
			{
				$minMember = null;
				$maxMember = null;
			}
			ELSE
			{
				if($minMember == 1)
				{
					$minMember = 0;
				}
				if(empty($maxMember)||!isset($maxMember))
				{
					$this->sql = $this->sql."AND t.membernum> $minMember ";
				}
				else 
				{
					$this->sql = $this->sql."AND t.membernum> $minMember AND t.membernum < $maxMember ";	
				}
			}
			
			/**
			 * 根据学校名字
			 */
			IF(empty($school)||!isset($school)||$school=="null")
			{
				$school= null;
			}
			ELSE
			{
				$this->sql = $this->sql."AND t.schoolname = '$school'";
			}
			
			/**
			 * 根据搜索关键字
			 */
			IF(!empty($keyword)||isset($keyword))
			{
				$this->sql = $this->sql." AND (t.groupname LIKE '%".$keyword."%'"."
											  or t.lables LIKE '%".$keyword."%')";
			}
			
			/**
			 * 根据时间还是热度排序
			 */
			IF(empty($module)||!isset($module)||$module=="time")
			{
				$this->sql = $this->sql."GROUP BY t.ID DESC";
			}
			ELSE
			{
				$this->sql = $this->sql."GROUP BY t.membernum DESC,t.ID DESC";
			}
			
			$data = $this->db->exceuteQuery($this->sql);
			
			return $data;
	}
	
	/**
	 * 通过数组来获取分页信息
	 * Enter description here ...
	 * @param unknown_type $data
	 * @param unknown_type $page
	 * @param unknown_type $pagesize
	 */
	function getSelectPageMessage($data,$page,$pagesize)
	{
		$page = $page -1; 
		$start = $page*$pagesize;
		
		for($i=0;$i<$pagesize;$i++)
		{
			if(!empty($data[$start+$i]))
			{
				$rs[$start+$i] = $data[$start+$i];
			}
			else 
			{
				break;
			}
				
		}
		return $rs;
	}
	
	/**
	 * 获取圈子管理员，创建者的详细信息
	 * Enter description here ...
	 * @param unknown_type $ID
	 */
	function getGrpAdmin($ID)
	{
		$this->sql = "SELECT creater,admin1,admin2,admin3 FROM t_grp_main WHERE ID='$ID' AND shieldflg = 0";
		$data = $this->db->exceuteQuery($this->sql);
		
		return $data[0];
		
	}

	/**
	 * 根据标签来搜索出相关标签的圈子
	 * Enter description here ...
	 * @param unknown_type $label
	 * @param unknown_type $page
	 * @param unknown_type $pagesize
	 * @param unknown_type $method
	 */
	function getLabelGroup($label,$page,$pagesize,$method=null)
	{
		$page = $page-1;
		$start = $page*$pagesize;
		
		
		$this->sql = "SELECT t.*,g.ID gID,g.groupname,g.membernum,g.topicnum,g.introduction,g.photo
					  FROM t_grp_group_label t
					  INNER JOIN t_grp_main g
					  ON t.idt_grp_main = g.ID
					  WHERE t.idt_grp_label = '$label' 
					  AND g.shieldflg = 0 ";
		
		IF(empty($method)||!isset($method))
		{
			$this->sql = $this->sql."GROUP BY g.ID DESC ";
		}
		ELSE
		{
			$this->sql = $this->sql."GROUP BY g.membernum DESC,g.ID ASC ";
		}
		
		$this->sql = $this->sql."LIMIT $start,$pagesize";
		
		$data = $this->db->exceuteQuery($this->sql);
		return $data;
		
	}
	
	
	/**
	 * 获取其他圈子信息
	 */
	function getOtherGroup()
	{
		$this->sql = "SELECT t.ID,t.photo,t.groupname
					  FROM t_grp_main t
					  WHERE 1=1
					  AND t.shieldflg = 0
					  ORDER BY t.membernum
					  LIMIT 6";
		$data = $this->db->exceuteQuery($this->sql);
		
		$data = $this->setTitle($data, "groupname",12);
		return $data;
	}
	
	/**
	 * 获取热门活动
	 */
	
	function getHotAct()
	{
		$nowDate  = date('Y-m-d H:i:s',time());
		
		$this->sql = "SELECT t.ID,t.photo,t.actname,t.membernum
					  FROM t_act_main t
					  WHERE t.begintime < '$nowDate'
					  AND t.endtime > '$nowDate'
					  ORDER BY t.membernum
					  LIMIT 3";
		
		$data = $this->db->exceuteQuery($this->sql);
		
		return $data;
		
	}
	
	/**
	 * 根据图片ID获取图片位置
	 * Enter description here ...
	 * @param unknown_type $ID
	 * @param unknown_type $photoID
	 */
	function getPhotoKey($ID,$photoID,$module="photo")
	{
		if($module=="photo")
		{
			$this->sql = "SELECT ID FROM t_grp_photo
						  WHERE idt_grp_main ='$ID'
						  ORDER BY ID DESC";
			
			$data = $this->db->exceuteQuery($this->sql);
		}elseif($module=="actphoto")
		{
			$this->sql = "SELECT ID FROM t_act_photo
						  WHERE idt_act_main ='$ID'
						  ORDER BY ID DESC";
		}

		$len = count($data);
		
		for ($i=0;$i<$len;$i++)
		{
			if($data[$i]['ID']==$photoID)
			{
				break;
			}
		}

		return $i+1;

	}
	
	function getMyschool($schoolname)
	{
		$this->sql = "SELECT t.* FROM t_grp_main t
					  WHERE t.schoolname='$schoolname'
					  AND t.shieldflg = 0
					  ORDER BY t.membernum
					  DESC
					  LIMIT 1";
		$data = $this->db->exceuteQuery($this->sql);
		
		return $data[0][0];
	}
	
	
	function getAd()
	{
		$nowDate  = date('Y-m-d H:i:s',time());
		
		$this->sql = "SELECT * FROM t_advertisement 
					  WHERE starttime < '$nowDate'
					  AND endtime > '$nowDate'
					  AND isshow = 1
					  AND position = 3
					  ";
		$data = $this->db->exceuteQuery($this->sql);
		
		return $data;
	}

	//GET方法（SELECT）---------------------END-----------------------------------------------------
	
	

	
	//updata方法（updata）-----------------START----------------------------------------------------
	
	//更新
	/**
	 * 更新圈子数，回复数，浏览数，图片数
	 * Enter description here ...
	 * @param unknown_type $ID
	 * @param unknown_type $type
	 * @param unknown_type $module
	 * @param unknown_type $exit
	 */
	function updataNumber($ID,$type=null,$module=null,$exit=null)
	{	
		/**
		 * 如果删除
		 */
		IF($exit=="exit")
		{
			/**
			 * 获取数量之后减一
			 * Enter description here ...
			 * @var unknown_type
			 */
			$number = $this->getNumber($ID,$type,$module);
			$number = $number[0]-1;

		}
		ELSE
		{
			/**
			 * 否则+1
			 * Enter description here ...
			 * @var unknown_type
			 */
			$number = $this->getNumber($ID,$type,$module);
			$number = $number[0]+1;
		}
		
		/**
		 * 如果是话题
		 */
		IF($type=="topic")
		{
			//更新话题回复数
			IF($module=="reply")  //ID：圈子话题ID
			{
				$data = array("replynum"=>$number);
				parent::Update('t_grp_topic', $data,"u.ID='$ID'");
				
			}
			//更新话题浏览数
			ELSEIF($module=="browse")  //ID：圈子话题ID
			{
				$data = array("browsenum"=>$number);
				parent::Update('t_grp_topic', $data,"u.ID='$ID'");
				
			}
			//更新圈子话题数
		    ELSE  //ID：圈子ID
		    {
		    	$data = array("topicnum"=>$number);
				parent::Update('t_grp_main', $data,"u.ID='$ID'");
				
		    }
		}
		/**
		 * 更新圈子图片数
		 */
		ELSEIF($type=="photo")
		{
			$data = array("photonum"=>$number);
			parent::Update('t_grp_main', $data,"u.ID='$ID'");
			
		}
		/**
		 * 更新圈子成员数
		 */
		ELSEIF($type=="member")
		{
			$data = array("membernum"=>$number);
			parent::Update('t_grp_main', $data,"u.ID='$ID'");
			
		}
		/**
		 * 更新活动
		 */
		ELSEIF($type=="act")
		{
			//更新活动成员数
			IF($module=="in")
			{
				$data = array("membernum"=>$number);
				parent::Update('t_act_main', $data,"u.ID='$ID'");
			}
			//更新活动关注人数
			ELSEIF($module=="attention")
			{
				$data = array("attentionnum"=>$number);
				parent::Update('t_act_main', $data,"u.ID='$ID'");
			}
			//更新活动图片数
			ELSEIF($module=="photo")
			{
				$data = array("photonum"=>$number);
				parent::Update('t_act_main', $data,"u.ID='$ID'");
			}
			//更新活动评论数
			ELSEIF($module=="reply")
			{
				$data = array("replynum"=>$number);
				parent::Update('t_act_main', $data,"u.ID='$ID'");

			}
			//更新圈子活动数
			ELSE
			{
				$data = array("actnum"=>$number);
				parent::Update('t_grp_main', $data,"u.ID='$ID'");
			}
		}
		
	}
	
	/**
	 * 更新类型数，比如“追星”类型的圈子数
	 * Enter description here ...
	 * @param unknown_type $firstID
	 * @param unknown_type $secondID
	 * @param unknown_type $schoolname
	 * @param unknown_type $module
	 */
	function updateTypeNum($firstID,$secondID,$schoolname,$module=null)
	{
		$this->sql  = "SELECT * FROM m_grp_catalog WHERE ID='$firstID'";
		
		$firstNum = $this->db->exceuteQuery($this->sql);
		
		if($secondID!=0)
		{
			$this->sql  = "SELECT * FROM m_grp_catalog WHERE ID='$secondID'";
		
			$secondNum = $this->db->exceuteQuery($this->sql);
		}
		
		
		if(empty($module)||!isset($module))
		{
			$Number1 = array(
								"groupnum"=>$firstNum[0]['groupnum']+1
							);
			$Number2 = array(
								"groupnum"=>$secondNum[0]['groupnum']+1
							);
			
	
			
			parent::Update('m_grp_catalog',$Number1,"u.ID='$firstID'");
			parent::Update('m_grp_catalog',$Number2,"u.ID='$secondID'");
		}
		else
		{
			$Number1 = array(
								"groupnum"=>$firstNum['groupnum']-1
							);
			$Number2 = array(
								"groupnum"=>$secondNum['groupnum']-1
							);
			
			parent::Update('m_grp_catalog',$Number1,"u.ID='$firstID'");
			parent::Update('m_grp_catalog',$Number1,"u.ID='$secondID'");
		}
	}
	
	
	/**
	 * 设施圈子管理员
	 * Enter description here ...
	 * @param unknown_type $module
	 * @param unknown_type $ID
	 * @param unknown_type $memID
	 * @param unknown_type $rs
	 */
	function setGrpAdmin($module,$ID,$memID=null,$rs=null)
	{
		/**
		 * 如果是set就是设置管理员
		 */
		IF($module=="set")
		{
			/**
			 *找出admin1，admin2，admin3中空着的位置
			 */
			for($i=1;$i<4;$i++)
			{
				if(empty($rs[0][$i-1])||!isset($rs[0][$i-1]))
				{
					$str = "admin".$i;
					break;
				}
			}
			
			$data = array($str=>$memID);
			
			parent::Update('t_grp_main',$data,"u.ID='$ID'");
			
		}
		ELSEIF ($module=="remove")
		{
			/**
			 * 撤销管理员
			 * Enter description here ...
			 * @var unknown_type
			 */
			$this->sql = "SELECT admin1,admin2,admin3 FROM t_grp_main WHERE ID='$ID'";
		
			$rs = $this->db->exceuteQuery($this->sql);
			
			$data = $rs[0];
			
			for($i=1;$i<4;$i++)
			{
				if($data[$i-1]==$memID)
				{
					$str = "admin".$i;
					break;
				}
			}
			
			$data = array($str=>NULL);
		
			parent::Update('t_grp_main',$data,"u.ID='$ID'");
		}
		ELSE
		{
			
		}
	}
	
	/**
	 * 话题的置顶，取消置顶，删除，删除话题回复
	 * Enter description here ...
	 * @param unknown_type $module
	 * @param unknown_type $data
	 * @param unknown_type $ID
	 */
	function setTopicTopOrDel($module,$data,$ID)
	{
		IF($module=="top")
		{
			parent::Update('t_grp_topic',$data,"u.ID='$ID'");
		}
		ELSEIF($module=="canceltop")
		{
			parent::Update('t_grp_topic',$data,"u.ID='$ID'");
		}
		ELSEIF($module=="del")
		{
			parent::Update('t_grp_topic',$data,"u.ID='$ID'");
		}
		ELSEIF($module=="redel")
		{
			parent::Update('t_reply',$data,"u.ID='$ID'");
		}
	}
	
	
	function setActDel($data,$ID)
	{
			parent::Update('t_reply',$data,"u.ID='$ID'");
	}
	
	/**
	 * 更新圈子的公告和介绍
	 * Enter description here ...
	 * @param unknown_type $data
	 * @param unknown_type $ID
	 */
	function setGrpNoticeAndIntor($data,$ID)
	{
			parent::Update('t_grp_main',$data,"u.ID='$ID'");
	}
	
	/**
	 * 解散圈子
	 * Enter description here ...
	 * @param unknown_type $ID
	 */
	
	function dismissGroup($ID)
	{
		$data = array(
					"shieldflg"=>1
				);
		parent::Update('t_grp_main',$data,"u.ID='$ID'");
		
		$rs = $this->getGroupMessage($ID);
		
		$label_ary = explode(",",$rs['main']['lables']);
		
		$a = $this->updataLabel($label_ary);
		
		if($rs['main']['idm_grp_catalog']==1 || $rs['main']['idm_grp_catalog']==3)
		{
			$firID = $rs['main']['idm_grp_catalog'];
			$secID = $rs['main']['idm_grp_second_catalog'];
			
			$firstnum = $this->getGroupTypeNumber($rs['main']['idm_grp_catalog']);
			$secondnum = $this->getGroupTypeNumber($rs['main']['idm_grp_second_catalog']);
			
			$fis = array("groupnum"=>$firstnum-1);
			$sec = array("groupnum"=>$secondnum-1);
			
			parent::Update('m_grp_catalog',$fis,"u.ID='$firID'");
			parent::Update('m_grp_catalog',$sec,"u.ID='$secID'");
		}
		
		return 1;
	}
	
	
	function updataLabel($label_ary)
	{
		$len = count($label_ary);
		
		for($i=0;$i<$len;$i++)
		{
			$label = $label_ary[$i];
			$this->sql = "SELECT * FROM t_grp_label WHERE label='$label'";
			
			$result = $this->db->exceuteQuery($this->sql);
			
			$groupnum = array(
							"groupnum"=>$result[0]['groupnum']-1
							);
			parent::Update('t_grp_label',$groupnum,"u.label='$label'");			
		}
		
		return 0;
	}
	//updata方法（updata）-----------------END----------------------------------------------------
	
	
	
	
	//其他方法-----------------START----------------------------------------------------
	/**
	 * 格式化时间 type=1是数组，type=0是字符串
	 * Enter description here ...
	 * @param unknown_type $str
	 * @param unknown_type $type
	 * @param unknown_type $field
	 */
	function dataFormat($str,$type=0,$field=null)//0格式化字符串  1格式化数组
	{
		if($type==1)
		{
			$length = count($str);
		
			for($i=0;$i<$length;$i++)
			{
				$str[$i][$field] = substr($str[$i][$field], 0,4)."-".
										 substr($str[$i][$field],5,2)."-".
										 substr($str[$i][$field],8,2);
			}
		}
		ELSE{
			$str = substr($str, 0,4)."-".substr($str,5,2)."-".substr($str,8,2);
		}
		return $str;
	}
	
	/**
	 * 判断用户是否在圈子里
	 * Enter description here ...
	 * @param unknown_type $grp_ID
	 * @param unknown_type $mem_ID
	 */
	function checkIN($grp_ID,$mem_ID)//判断用户是否在该圈子里
	{
		$this->sql = "SELECT ID,outflg,auditflg 
					  FROM t_grp_member 
					  WHERE idt_grp_main = '$grp_ID' 
					  AND idt_user='$mem_ID'";
		
		$result = $this->db->exceuteQuery($this->sql);
		$length  = count($result);
		
		IF(empty($result)||!isset($result))  //不在圈子里
		{
			return 1;
		}
		ELSE
		{
			IF($result[$length-1]['auditflg']==0&&$result[$length-1]['outflg']==0) //申请了但是未审核
			{
				return 0;
			}
			ELSEIF($result[$length-1]['auditflg']==0&&$result[$length-1]['outflg']==1)  //退圈子的
			{
				return 2;
			}
			
			return 3; //在圈子内的
		}
	}
	
	/**
	 * 判断用户是否参加或关注了该活动
	 * Enter description here ...
	 * @param unknown_type $actID
	 * @param unknown_type $userID
	 */
function checkInAct($actID,$userID)//判断用户是否参加或者关注了该活动
	{
		$rs = null;
		
		$this->sql = "SELECT ID,outflg 
					  FROM t_act_member 
					  WHERE idt_act_main = '$actID' 
					  AND idt_user='$userID'";
		
		$result1 = $this->db->exceuteQuery($this->sql);   //活动成员中是否有当前登陆者
		$length1  = count($result1);
		
		
		$this->sql = "SELECT ID 
					  FROM t_act_attention 
					  WHERE idt_act_main = '$actID' 
					  AND idt_user='$userID'";
		
		$result2 = $this->db->exceuteQuery($this->sql); //关注活动的成员中是否有当前登陆者
		$length2 = count($result2);
		
		
		IF(empty($result1)||!isset($result1))  //未参加活动
		{
			IF(empty($result2)||!isset($result2))
			{
				return 0; //未关注
			}
			ELSE
			{
				return 1;   //关注了
			}
		}
		ELSE
		{
			IF($result1[$length1-1]['outflg']==0) //参加活动
			{
				IF(empty($result2)||!isset($result2))
				{
					return 2; //未关注
				}
				return 3; //关注
			}
			/*ELSEIF($result1[$length1-1]['outflg']==1)  //退出活动
			{
				IF(empty($result2)||!isset($result2))
				{
					return 4;   //退出活动也未关注
				}
				return 5; //退出活动但是还在关注活动
			}*/
		}
	}
	
	/**
	 * 判断活动是否过期
	 * Enter description here ...
	 * @param unknown_type $data
	 * @param unknown_type $type
	 */
	function checkDateOver($data,$type=null)//判断活动是否过期
	{
	
		$nowDate  = date('Y-m-d H:i:s',time());
		
		
		IF($type==1)
		{
			$len = count($data);
			for ($i=0;$i<$len;$i++)
			{
				IF($data[$i]['begintime']>$nowDate)
				{
					$data[$i]['overflg']=2;
				}
				ELSEIF($data[$i]['endtime']<$nowDate)
				{
					$data[$i]['overflg']=0;
				}
				ELSE
				{
					$data[$i]['overflg'] = 1;
				}
			}
				return $data;
		}
		ELSE
		{

				IF($data['begintime']>$nowDate)
				{
					$data['overflg']=2;
				}
				ELSEIF($data['endtime']<$nowDate)
				{
					$data['overflg']=0;
				}
				ELSE
				{
					$data['overflg'] = 1;
				}
				
				return $data;
		}
	}
	
	
	/**
	 * 判断圈子管理员数，是否达到最大数
	 * Enter description here ...
	 * @param unknown_type $grpID
	 */
	function checkGrpAdminNum($grpID)
	{
		$this->sql = "SELECT admin1,admin2,admin3 FROM t_grp_main WHERE ID='$grpID'";
		
		$rs = $this->db->exceuteQuery($this->sql);
		
		if(!empty($rs[0]['admin1'])&&!empty($rs[0]['admin2'])&&!empty($rs[0]['admin3']))
		{
			return 0;
		}
		
		return $rs;
		
	}
	
	/**
	 * 判断当前登陆者的权限，是创建者还是管理员还是普通成员
	 * Enter description here ...
	 * @param unknown_type $ID
	 * @param unknown_type $memID
	 */
	function getAdminPower($ID,$memID)
	{
		$data = $this->getGrpAdmin($ID);
		
		IF($data['creater']==$memID)
		{
			return 1;
		}
		ELSEIF( ($data['admin1']==$memID) || ($data['admin2']==$memID) || ($data['admin3']==$memID))
		{
			return 2;
		}
		ELSE
		{
			return 3;
		}
	}
	
	//分页方法！-----------------------------------------------------------
	
	/**
	 * 这个方法可以考虑干掉。。。
	 * Enter description here ...
	 * @param unknown_type $ID
	 * @param unknown_type $page
	 * @param unknown_type $pagesize
	 * @param unknown_type $type
	 * @param unknown_type $module
	 * @param unknown_type $catalog
	 */
	function separatePage($ID,$page,$pagesize,$type,$module=null,$catalog=NULL)    //根据$page将数据分出
	{	
		$page = $page-1;
		
		$data = $this->getPageData($ID,$page,$pagesize,$type,$module,$catalog);
	
		return $data;	
	}
	
	
	/**
	 * 无总数时计算总页数
	 * Enter description here ...
	 * @param unknown_type $ID
	 * @param unknown_type $pagesize
	 * @param unknown_type $page
	 * @param unknown_type $type
	 * @param unknown_type $module
	 * @param unknown_type $catalog
	 */
	function getPageMessage($ID,$pagesize,$page=null,$type=null,$module=null,$catalog=null)  //合成分页的相关信息在tpl中使用
	{
		
		$number = $this->getNumber($ID,$type,$module,$catalog);
		
		
		$pagenumber = $number[0]/$pagesize;
	
		$str = gettype($pagenumber);
		
		if($str =="double")
		{
			$pagenumber = $pagenumber+1;
		}
		
		return $pagenumber;

	}
	
	/**
	 * 有总数时计算总页数
	 * Enter description here ...
	 * @param unknown_type $pagesize
	 * @param unknown_type $number
	 */
	function getPageNumber($pagesize,$number)   //获取页数
	{
		$str = gettype($number/$pagesize);

		$pagenum =intval($number/$pagesize);
		IF($str == "double")     //如果有余，页数+1
		{
			return $pagenum+1;
		}
		ELSE		//如果整除，页数-1
		{
			return $pagenum;
		}
	}
	
	/**
	 * 截取字符串
	 * Enter description here ...
	 * @param unknown_type $data
	 * @param unknown_type $str
	 * @param unknown_type $limitNumber
	 */
	function setTitle($data,$str,$limitNumber=30)   //将过长的题目如“啊啊啊啊啊啊啊啊啊啊啊啊啊”变为“啊啊啊啊啊...”
	{
		$len = count($data);
		
		for($i=0;$i<$len;$i++)
		{
			if(strlen($data[$i][$str])>$limitNumber)
			{
				$data[$i][$str] = substr($data[$i][$str],0,$limitNumber)."...";
			}
		}
		
		return $data;
	}
	
	
	/**
	 * 设置圈子的等级
	 * Enter description here ...
	 * @param unknown_type $rs
	 */
	function setGrpLevel($rs)
	{
		$gradedata = array(
						"1"=>0,
						"2"=>20,
						"3"=>60,
						"4"=>120,
						"5"=>200,
						"6"=>300,
						"7"=>420,
						"8"=>560,
						"9"=>720,
						"10"=>900,
						"11"=>1100
		);
		$len = count($gradedata);
		
		
		$grade = $rs['topicnum']*1+$rs['membernum']*2+$rs['photonum']*1+$rs['actnum']*1;
		$ID = $rs["ID"];
		
		for($i=1;$i<=$len;$i++)
		{
			if($i==$len)
			{
				break;
			}
			
			if($grade>=$gradedata[$i]&&$grade<$gradedata[$i+1])
			{
				break;
			}
		}
		
		$level = array(
					"level"=>$i
				);
				
		parent::Update("t_grp_main",$level,"u.ID='$ID'");
	
	}
	
	function selMsg($secondID=NULL,$minMember=NULL,$maxMember=NULL,$method=NULL,$school=NULL,$type=NULL)
	{
		$data = array();
		if(!empty($secondID)||isset($secondID))
		{
			for($i=0;$i<count($type);$i++)
			{
				if($type[$i]['id']==$secondID)
				{
					$data['type']['ID']=$secondID;
					$data['type']['name']=$type[$i]['name'];
					break;
				}
			}
		}
		else 
		{
			
		}
		
		if(!empty($minMember)||isset($minMember))
		{
			if($minMember==1)
			{
				$data['number']['ID']=1;
				$data['number']['name']="10人以下";
				$data['number']['minMember']="1";
				$data['number']['maxMember']="10";
			}
			elseif($minMember==10)
			{
				$data['number']['ID']=2;
				$data['number']['name']="10-50人";
				$data['number']['minMember']="10";
				$data['number']['maxMember']="50";
			}
			elseif($minMember==50)
			{
				$data['number']['ID']=3;
				$data['number']['name']="50-100人";
				$data['number']['minMember']="50";
				$data['number']['maxMember']="100";
			}
			elseif($minMember==100)
			{
				$data['number']['ID']=4;
				$data['number']['name']="100人以上";
				$data['number']['minMember']="100";
				$data['number']['maxMember']=null;
			}
		}
		
		if(empty($method)||!isset($method)||$method=="time")
		{
			$data['method']['name']="time";
		}
		else 
		{
			$data['method']['name']="member";
		}
		
		if(empty($school)||!isset($school))
		{
			$data['school']['name']=null;
		}
		else
		{
			$data['school']['name'] = $school;
		}
		return $data;	
	}

	function checkAttention($member)
	{
		$len = count($member);
		
		$ID = $_SESSION['baseinfo']['ID'];
		for($i=0;$i<$len;$i++)
		{
			$otherID = $member[$i]['idt_user'];
			/**
			 * 如果是本人
			 */
			if($ID==$otherID)
			{
				$member[$i]['attentionflg']=0;
			}
			else
			{
				$this->sql = "SELECT * 
							  FROM t_user_attention 
							  WHERE browserid = '$otherID'
							  AND idt_user = '$ID'";
				
				$msg=$this->db->exceuteQuery($this->sql);
				
				if(empty($msg)||!isset($msg))
				{
					$member[$i]['attentionflg']=1;
				}
				else 
				{
					$member[$i]['attentionflg']=2;
				}
			}
		}
		
		return $member;
	}
	
	//其他方法-----------------END----------------------------------------------------
}
?>