<?php
require_once('BaseBusiness.php');
require_once('DateUtil.php');
require_once('SupportException.php');
require_once('SessionUtil.php');
require_once('PageSplitBusiness.php');

/**
 * 
 * 空间图片管理
 * @author Administrator
 *
 */
class AdminSpacePhotoBusiness extends PageSplitBusiness
{

	function getAllSpacePhotoList($currpage=null,$numbersperpage=null,$query=null)
	{
		$sql = "
		SELECT b.*
		,t.nickname
	
		FROM  t_space_album b
		INNER JOIN t_user t ON b.creater = t.ID
		
		WHERE 1=1 
		
		";
		
		$sqlcount = "
		SELECT COUNT(1) FROM  t_space_album b
		INNER JOIN t_user t ON b.creater = t.ID
	
		WHERE 1=1 
		";
		$sqlwhere = "";
		if (!empty($query))
		{
			if (!empty($query['albumname']))
			{
				$sqlwhere .= "  AND b.albumname LIKE '%$query[albumname]%'";
			}
			if (!empty($query['introduction']))
			{
				$sqlwhere .= "  AND b.introduction LIKE '%$query[introduction]%'";
			}
			if (!empty($query['nickname']))
			{
				$sqlwhere .= "  AND t.nickname LIKE '%$query[nickname]%'";
			}
			
		}
		
		$sql .= $sqlwhere;
		$sqlcount .= $sqlwhere;
		
		
		
		
		$sql .= "  ORDER BY b.creater,b.createtime ";
		$result = $this->db->exceuteQuery($sql);
		if (!$this->isTotalRows)//获取记录数
		{
			    $this->setTotalRow($this->buildTotalRow($sqlcount));
				$this->isTotalRows = true;
			
		}
		$result = $this->QueryForPageSplit($sql, $currpage, $numbersperpage);
		return $result;
		
	}
	
	function getSpacePhotoListByActID($albumid,$currpage=null,$numbersperpage=null)
	{
		$sql = "
		SELECT a.*
		FROM t_space_album_photo a
		WHERE a.idt_space_album = '$albumid'
		
		";
		
		$sqlcount = "
		SELECT COUNT(1) FROM  t_act_photo a
		WHERE a.idt_act_main = '$albumid'
		";
		
		$sql .= "  ORDER BY a.creater,a.createtime ";
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
	 * 屏蔽
	 * Enter description here ...
	 * @param unknown_type $data
	 * @param unknown_type $id
	 */
	function shieldSpacePhoto($id,$shieldflg)
	{
		parent::Update('t_space_album_photo', array("shieldflg"=>$shieldflg),"u.id='$id'");
	}
	function getShieldFlg($id)
	{
		$sql = "
		SELECT a.shieldflg
		FROM t_space_album_photo a
		WHERE a.ID = '$id'
		
		";
		$rs = $this->db->exceuteQuery($sql);
		return $rs[0];
		
	}
	
	
}

?>