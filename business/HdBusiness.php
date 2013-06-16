<?php
require_once ('BaseBusiness.php');
require_once ('DateUtil.php');
require_once ('SupportException.php');


class HdBusiness extends BaseBusiness
{
	function getUse_info($id)
	{
		$where = "m.id = $id";//查表条件
		$joinsql = "";
				    
		$data = parent::Search('t_user', 'm.*',$joinsql,$where);
		return $data;
	}
	function getAct_info($id)
	{
		$where = "m.ID = $id";//查表条件
		$joinsql = " INNER JOIN
				     	t_user tu ON tu.id = m.creater";
				    
		$data = parent::Search('t_act_main', 'm.*,tu.usertype,tu.nickname,tu.ID as uID',$joinsql,$where);
		if($data[0]['usertype']==1)
		{
			$data[0]['usertype']="企业";
		}
		else if($data[0]['usertype']==0)
		{
			$data[0]['usertype']="个人";
		}
		return $data;
	}
	//按照一定顺序显示活动

	function getAct_list_order_log($log,$flg,$order,$where1)
	{
		if($log){
			$where .= "m.idm_act_catalog in ($log) ";
		        }
		if($flg){
			if($log)
			$where .=" and ";
		    $where .= " m.themeflg = $flg ";
		        }
		if($where1)
		        {
		        	if($flg || $log)$where .="and";
		        	$where .= " $where1";
		        }
		$joinsql = " INNER JOIN
				        t_user tu ON tu.ID = m.creater";
		$ordersql = $order;
		$data = parent::Search('t_act_main', 'm.*,tu.schoolname,tu.nickname,tu.ID as uID,tu.residence',$joinsql,$where,null,$ordersql);
		return $data;
	}
	
	
	//活动评论
	function getRem_info($id,$order)
	{ 
		$where = "m.businesstype = '2' and m.shieldflg = '0' and m.businessid = $id and m.idt_reply_parentid = '0'";
		$joinsql = " INNER JOIN
				        t_user tu ON tu.ID = m.creater";
		$data = parent::Search('t_reply', 'm.*,tu.nickname,tu.photo',$joinsql,$where,null,$order);
		return $data;
	} 
	
	
	function getRem_info_single($id)
	{
		$this->sql = "SELECT m.* FROM t_act_remark m WHERE m.ID='$id'";
		$rs =  $this->db->exceuteQuery($this->sql);
		return $rs;
	}
	//活动关注
	function getAtt_info($id,$use_id)
	{
		$where = "m.idt_act_main = $id and m.idt_user = $use_id";
		$data = parent::Search('t_act_attention', 'm.*',null,$where,null,null);
		return $data;
	}
	function getMem_info($id,$use_id)
	{
		$where = "m.idt_act_main = $id and m.idt_user = $use_id and m.outflg = '0'";
		$data = parent::Search('t_act_member', 'm.*',null,$where,null,null);
		return $data;
	}
	//获得活动里的图片信息
	function getAct_photo($id,$ordersql)
	{
		$ordersql = $ordersql;
		$where = "m.id = $id";//查表条件
		$joinsql = " INNER JOIN
				        t_act_photo tap ON tap.idt_act_main = m.id";
		$data = parent::Search('t_act_main', 'tap.*',$joinsql,$where,null,$ordersql);
		return $data;
	}
	//万金油更新数据
	function UpdateData($tablename,$data,$where)
	{
		
		parent::Update($tablename, $data,$where);
	}
	//一定条件查找一定where的活动，并伴有order
	function getAct_list($where,$ordersql)
	{
		$where = $where;//查表条件
		$joinsql = "";
		$ordersql = $ordersql;
		$data = parent::Search('t_act_main', 'm.*',$joinsql,$where,null,$ordersql);
		return $data;
	}
	function Insert_file($image,$type)   ////插入file的信息
	{

		 $name_head = date('YmdHis',time()).rand(0, 100); ///生成图片头名字
	     $name_end = substr($image['name'],strpos($image['name'], "."));   //图片未名
	     $imageName = $name_head.$name_end; 
		
	     $upfile='uploadfiles/activity/'.$type;
	if (!file_exists($upfile)) {
		mkdir($upfile);
	}
	$upfile.='/'.$imageName;
   	     $a = move_uploaded_file($image['tmp_name'], $upfile);
   	     //echo "<pre>";
	     //print_r($a);
		 return $imageName;
	}
	
	/**
	 * 获取一级活动
	 * Enter description here ...
	 */
	function getActCatalog($log)
	{
		if($log == null)
		$this->sql = "SELECT m.* FROM m_act_catalog m WHERE m.parentid='99999'";
		else
		$this->sql = "SELECT m.* FROM m_act_catalog m WHERE m.id='$log'";
		$result = $this->db->exceuteQuery($this->sql);
	
		$pid = $result[0]['ID'];
		$this->sql = "SELECT m.* FROM m_act_catalog m WHERE m.parentid='$pid'";
		
		
		$rs =  $this->db->exceuteQuery($this->sql);
		foreach($rs as $key => $value)
		{
			$result[0][sec][$key]['ID'] = $value['ID'];
			$result[0][sec][$key]['name'] = $value['name'];
		}
		return $result;
	}
	//获取二级分类
	function getSecCatalog($id)
	{
		$this->sql = "SELECT m.* FROM m_act_catalog m WHERE m.parentid='$id'";
		$rs =  $this->db->exceuteQuery($this->sql);
		return $rs;
	}
	//获得国家-一级
	function getCountry()
	{
		$this->sql = "SELECT m.* FROM m_city m WHERE m.level='0'";
		$result = $this->db->exceuteQuery($this->sql);
		
		$pid = $result[0]['ID'];
		$this->sql = "SELECT m.* FROM m_city m WHERE m.parentid='$pid'";
		$rs =  $this->db->exceuteQuery($this->sql);
		
		$pid = $rs[0]['ID'];
		$this->sql = "SELECT m.* FROM m_city m WHERE m.parentid='$pid'";
		$rs1 =  $this->db->exceuteQuery($this->sql);
		
		$pid = $rs1[0]['ID'];
		$this->sql = "SELECT m.* FROM m_city m WHERE m.parentid='$pid'";
		$rs2 =  $this->db->exceuteQuery($this->sql);
		foreach($rs as $key => $value)
		{
			$result[0][a][$key]['ID'] = $value['ID'];
			$result[0][a][$key]['name'] = $value['name'];
		}
		foreach($rs1 as $key => $value)
		{
			$result[0][b][$key]['ID'] = $value['ID'];
			$result[0][b][$key]['name'] = $value['name'];
		}
		foreach($rs2 as $key => $value)
		{
			$result[0][c][$key]['ID'] = $value['ID'];
			$result[0][c][$key]['name'] = $value['name'];
		}
		return $result;
	}
	//获得地方-二级
	function getSecPla($id)
	{
		$this->sql = "SELECT m.* FROM m_city m WHERE m.parentid='$id'";
		$rs =  $this->db->exceuteQuery($this->sql);
		return $rs;
	}
	/*
	*/
	//活动成员表
	function getMem($id,$order)
	{
		$this->sql = "SELECT m.*,t_user.*,t_user.ID as uID FROM t_act_member m ,t_user WHERE m.idt_act_main='$id' and m.idt_user = t_user.ID and m.outflg = '0' ORDER BY $order";
		$rs =  $this->db->exceuteQuery($this->sql);
		return $rs;
	}
	function getAct($id)
	{
		$this->sql = "SELECT m.* FROM t_act_main m WHERE m.ID='$id'";
		$rs =  $this->db->exceuteQuery($this->sql);
		return $rs;
	}
	function setActDel($data,$ID)
	{
			parent::Update('t_reply',$data,"u.ID='$ID'");
	}
	function getReply($businessid,$number=0) //获取回复
	{
		$reply = array();
		$base = array();
		
			$this->sql = "SELECT t.*,u.ID uID,u.email,u.nickname,u.photo up 
						  FROM t_reply t 
						  INNER JOIN t_user u
						  ON u.ID = t.creater
						  WHERE t.businessid='$businessid'
						  AND t.level=1
						  AND t.businesstype = 2
						  AND t.shieldflg=0
					";
			$module="act";
			$reply['reply'] = $this->db->exceuteQuery($this->sql);
			$reply['reply']= $this->getSecondReply($reply['reply']);
		
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
			$this->sql = "SELECT r.*,u.nickname,u.email,u.photo up FROM t_reply r
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
function getSingleMessage($ID)
	{
		$this->sql = "SELECT t.*,u.nickname,u.email,u.photo FROM ";
		
		$this->sql = $this->sql."t_act_photo t";
		
		$this->sql = $this->sql." INNER JOIN t_user u WHERE t.creater = u.ID AND t.ID='$ID'";
		
		
		$rs = $this->db->exceuteQuery($this->sql);
		return $rs[0];
		
		
	}
	function get_hd_place($id)
	{
		
		$this->sql = "SELECT t.* FROM m_city t where t.ID='$id'";
		$rs = $this->db->exceuteQuery($this->sql);
		$parentid =  $rs[0]['parentid'];
		//$place[$rs[0]['level']] = "/".$rs[0]['name'];
		$place .= $rs[0]['name'];
		for($i=$rs[0]['level'];$i>0;$i--)
		{
			$this->sql = "SELECT t.* FROM m_city t where t.ID=$parentid";
			$rs_parent = $this->db->exceuteQuery($this->sql);
			$parentid = $rs_parent[0]['parentid'];
			//$place[$rs[0]['level']-1] = "/".$rs_parent[0]['name'];
			$place .= "/".$rs_parent[0]['name'];
			
		}
		return $place;
		
	}
//	获得用户当前IP
	function getRealIp() 
	{
		if (!empty($_SERVER['HTTP_CLIENT_IP'])) {  //check ip from share internet
			$ip=$_SERVER['HTTP_CLIENT_IP'];
		} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) 
		{  //to check ip is pass from proxy
			$ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
		} else 
		{
		$ip=$_SERVER['REMOTE_ADDR'];
		}
		return $ip;
		}

//获取ip地址后，访问有道提供的一个api取得所在城市

	function get_address_from_ip($ip)
 
	{
 
$url='http://www.youdao.com/smartresult-xml/search.s?type=ip&q=';
 
$xml=file_get_contents($url.$ip);
 
$data=simplexml_load_string($xml);
 
return $data->product->location;
 
	}
		

}

				    // INNER JOIN
				     	//t_act_remark tar ON tar.idt_act_main = m.id

?>