<?php
require_once('BaseBusiness.php');
require_once('DateUtil.php');
require_once('SupportException.php');
require_once('SessionUtil.php');
require_once('PageSplitBusiness.php');

/**
 * 
 * 用户管理
 * @author Administrator
 *
 */
class AdminUserBusiness extends PageSplitBusiness
{

	function getAllUserList($currpage=null,$numbersperpage=null,$query=null)
	{
		$sql = "
		SELECT 
		ID
		,email
		,password
		,photo
		,adminflg
		
		,nickname
		,sex
		,realname
		,shieldflg
		,status
		,schoolname
		,department
		,schooltime
		,bindmobile
		,excelringflg
		,superringflg
		,level
		,cardnum
		,cardvaliddatefrom
		,cardvaliddateto
		
		FROM t_user a
		WHERE a.usertype='0'  AND a.status <> '2'
		";
		
		$sqlcount = "
		SELECT COUNT(1) FROM  t_user a
		WHERE a.usertype='0'  AND a.status <> '2' 
	
		";
		
		$sqlwhere = "";
		if (!empty($query))
		{
			/*if (!empty($query['usertype']) || $query['usertype'] =='0')
			{
				$sqlwhere .= "  AND a.usertype = '$query[usertype]'";
			}*/
			if (!empty($query['realname']))
			{
				$sqlwhere .= "  AND a.realname LIKE '%$query[realname]%'";
			}
			if (!empty($query['nickname']))
			{
				$sqlwhere .= "  AND a.nickname LIKE '%$query[nickname]%'";
			}
			if (!empty($query['schoolname']))
			{
				$sqlwhere .= "  AND a.schoolname LIKE '%$query[schoolname]%'";
			}
			/*if (!empty($query['shopname']))
			{
				$sqlwhere .= "  AND a.shopname LIKE '%$query[shopname]%'";
			}
			if (!empty($query['scope']))
			{
				$sqlwhere .= "  AND a.scope LIKE '%$query[scope]%'";
			}
			if (!empty($query['chargeperson']) )
			{
				$sqlwhere .= "  AND a.chargeperson LIKE '%$query[chargeperson]%'";
			}*/
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
		foreach ($result as &$item)//各种数量表示
		{
			$item['CGoupNum'] = $this->getMyCreateGroupNum($item['ID']);
			$item['AGoupNum'] = $this->getMyApplyGroupNum($item['ID']);
			$item['PGoupNum'] = $this->getMyParticipateGroupNum($item['ID']);
			$item['TopicNum'] = $this->getGroupTopicNum($item['ID']);
		}
		return $result;
		
	}
	function getUserInfo($id)
	{
		$sql = "SELECT * FROM t_user WHERE ID='$id'";
		$rs = $this->db->exceuteQuery($sql);
		return $rs[0];
	}
	function getUserInfoByMail($email)
	{
		$this->sql = "SELECT ID FROM t_user WHERE email='$email' AND status='1'  AND shieldflg='0' ";

		
		$rs = $this->db->exceuteQuery($this->sql);
		return $rs;
	}
	function deleteUser($id)
	{
		parent::Update('t_user', array('status'=>'2'),"u.id='$id'");
	}
	function editUser($id,$data)
	{
		parent::Update('t_user', $data,"u.id='$id'");
	}
	function addAdminUser($data)
	{
		parent::Insert('t_user', $data);
	}
	function excelUser($id,$status)
	{
		parent::Update('t_user', array('excelringflg'=>$status),"u.id='$id'");
	}
	function superUser($id,$status)
	{
		parent::Update('t_user', array('superringflg'=>$status),"u.id='$id'");
	}
	function getMyCreateGroupNum($uid)//通过审核的圈子数
	{
		$sql = "SELECT COUNT(1) AS num  FROM t_grp_main  WHERE creater = '$uid' AND auditflg='1'  ";
		$rs = $this->db->exceuteQuery($sql);
		return $rs[0]['num'];
	}
	function getMyApplyGroupNum($uid)//正在申请的圈子数
	{
		$sql = "SELECT COUNT(1)  AS num FROM t_grp_main  WHERE creater = '$uid' AND auditflg='0'  ";
		$rs = $this->db->exceuteQuery($sql);
		return $rs[0]['num'];
	}
	function getMyParticipateGroupNum($uid)//我加入的圈子数
	{
		$sql = "SELECT COUNT(idt_grp_main)  AS num FROM t_grp_member  WHERE idt_user = '$uid' AND auditflg='1'  ";
		$rs = $this->db->exceuteQuery($sql);
		return $rs[0]['num'];
	}
	function getGroupTopicNum($uid)//我发布的圈子话题
	{
		$sql = "SELECT COUNT(1)  AS num FROM t_grp_topic  WHERE creater = '$uid' AND shieldflg='0'  ";
		$rs = $this->db->exceuteQuery($sql);
		return $rs[0]['num'];
	}
	//获取校卡编号
	function getCardNum($head=null)
	{
		if (empty($head))
		{
			$head = 'W';
		}
		$sql = "SELECT nextval_str('CardNo',4,'$head') ";
		$rs = $this->db->exceuteQuery($sql);
		return $rs[0][0];
	}
	
}

?>