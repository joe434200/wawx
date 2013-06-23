<?php
require_once ('BaseBusiness.php');
require_once ('DateUtil.php');
require_once ('SupportException.php');
require_once 'SendMailFunction.php';
require_once ('MessageUtil.php');

//如果用户session过期，则跳转到登录页面
if(empty($_SESSION['baseinfo']['ID']))
{
	echo "<script language='javascript'>";
	echo "location='login.php';";
	echo "</script>";
}

class UserBusiness extends SelfBuiness
{
    var $photo_path;
    function __construct()
    {
        parent::__construct ();
        $this->photo_path = "./uploadfiles/space/";
    }
    
    /**
     * 
     * 获取当前用户的物流地址
     * @param unknown_type $userid:当前用户ID
     */
    function getRecieveAdress($userid)
    {
    	$this->sql = "SELECT t.*
    					FROM t_consigneeadress t 
    					WHERE t.idt_user = '$userid'
    					ORDER BY t.isuse DESC,t.ID DESC
    					LIMIT 0,5
    	";
    	$result = $this->db->exceuteQuery($this->sql);
    	return $result;
    }
    
    //验证密码是否正确
    function checkPwd($userid,$pwd)
    {
    	$this->sql = "SELECT u.password FROM t_user u WHERE u.ID='$userid'";
    	$result = $this->db->exceuteQuery($this->sql);
    	if($result[0]['password'] == $pwd)
    	{
    		return true;
    	}
    	return false;   	
    }
    
    //获取用户订单
    function getUserOrder($userid)
    {
    	$this->sql = "SELECT t.* FROM t_order_info t WHERE t.idt_user = '$userid'";
    	$result = $this->db->exceuteQuery($this->sql);
    	return $result;
    }
    
    //获取用户收藏
    function getUserCollect($userid)
    {
    	
    }
       
    /**
     * 
     * 获取用户信箱
     * @param unknown_type $type:1为发信箱，2为收信箱 ，3为垃圾箱
     * @param unknown_type $userid:用户ID
     * @param unknown_type $page:当前页
     * @param unknown_type $isread:0是未读,1是已读，2是全选
     */
    function getUserBox($type,$userid,$page,$isread)
    {
    	$num = 10;//测试用
    	$offset = $num * ($page-1);
    	switch ($type) {
    		case 1:
    			$this->sql = "SELECT t.* , u.nickname,u.email
    							FROM t_message t 
    							INNER JOIN t_user u ON t.receiverid = u.id
    							WHERE t.senderid='$userid' 
    							AND t.sendflg='1'";
    			break;
    		case 2:
    			$this->sql = "SELECT t.* ,u.nickname,u.email
    							FROM t_message t 
    							INNER JOIN t_user u ON t.senderid = u.id
    							WHERE t.receiverid='$userid'
    							AND t.receiveflg='1' ";
    			break;
    		case 3:
    			$this->sql = "SELECT t.* ,u.nickname,u.email
    							FROM t_message t 
    							INNER JOIN t_user u ON t.senderid = u.id
    							WHERE (t.receiverid='$userid' OR t.senderid='$userid')
    							AND t.garbageflg='1' ";
    			break;
    	}
    	if($isread == 0)
    	{
    		$this->sql .= "  AND t.readflg='0'";//选出未读的
    		$unreadsql = $this->sql;//查询出未读邮件
    	}
    	else if($isread == 1)
    	{
    		$this->sql .= "  AND t.readflg='1'";//选出已读的
    		$unreadsql = $this->sql;//查询出未读邮件
    		$unreadsql .= "  AND t.readflg='0'";
		}
    	else//默认为都选择
    	{
    		$unreadsql = $this->sql;//查询出未读邮件
    		$unreadsql .= "  AND t.readflg='0'";
    	}
    	//------------------------
    	$unreadcal = $this->db->exceuteQuery($unreadsql);
    	//------------------------
    	$cal = $this->db->exceuteQuery($this->sql);
    	$data['base']['pageCounts'] = $this->getCounts(count($cal));//总页数
    	$data['base']['pagenum'] = $num;//每页记录数
    	$data['base']['counts'] = count($cal);//总记录数
    	$data['base']['page'] = $page;//当前页
    	$data['base']['type'] = $type;//类型
    	$data['base']['uncounts'] = count($unreadcal);//未读邮件数量
    	
    	$this->sql .= "  ORDER BY t.readflg ASC,t.createtime DESC LIMIT $offset,$num";
    	$result = $this->db->exceuteQuery($this->sql);
    	foreach ($result as $key => $value)
    	{
    		$data['info'][$key]['name'] = empty($value['nickname'])?$value['email']:$value['nickname'];
    		$data['info'][$key]['ID'] = $value['ID'];
    		$data['info'][$key]['content'] =  $value['content'];
    		$data['info'][$key]['title'] = $value['title'];
    		$data['info'][$key]['createtime'] = $value['createtime'];
    		$data['info'][$key]['readflg'] = $value['readflg'];
    		$data['info'][$key]['type'] = $value['type'];
    		$data['info'][$key]['senderid'] = $value['senderid'];
    	}
    	return $data;
    }
    
    
    /**
     * 
     * 获取当前用户的订单信息(分页获取)
     * @param unknown_type $userid:当前用户ID
     * @param unknown_type $page:当前分页
     */
    function getUserOrderInfo($userid,$page)
    {
    	$num = 10;
    	$offset = $num * ($page-1);
    	$this->sql = "SELECT t.* FROM t_order_info t WHERE t.idt_user='$userid'";
    	//查询用户订单总数，生成分页
    	$cal = $this->db->exceuteQuery($this->sql);
    	$data['base']['pageCounts'] = $this->getCounts(count($cal));
    	$data['base']['pagenum'] = $num;
    	$data['base']['page'] = $page;
    	
    	//获取一个分页的数量的记录，并按时间排序
    	$this->sql .= "  ORDER BY t.paytime DESC,t.addtime DESC LIMIT $offset,$num";
    	$rs = $this->db->exceuteQuery($this->sql);
    	
    	foreach($rs as $key => $value)
    	{
    		$data['info'][$key]['ID'] = $value['ID'];
    		$data['info'][$key]['orno'] = $value['ordersn'];//订单号
    		$data['info'][$key]['time'] = $value['paytime'];//付款时间
    		$data['info'][$key]['total'] = $value['orderamount'];//订单总额
    		$data['info'][$key]['status'] = $value['paystatus'];//订单状态
    		//$data['info'][$key]['orderstatus'] = $value['orderstatus'];
    	}
    	
    	return $data;
    }
    
    
    
    /**
     * 
     * 获取用户的商品收藏
     * @param unknown_type $userid:用户ID
     * @param unknown_type $type：获取的商品类型
     */
    function getGoodsCollect($userid,$type,$page)
    {
    	$num = 10;
    	$offset = $num * ($page-1);
    	$this->sql = "SELECT t.*,g.goodsname,g.newimg,g.goodsdesc
    					FROM t_goods_collect t
    					INNER JOIN t_goods g ON t.idt_goods=g.ID
    					WHERE t.idt_user='$userid'
    					AND t.collecttype='$type'
    					ORDER BY t.collecttime DESC
    	";
    	$cal = $this->db->exceuteQuery($this->sql);
    	$data['base']['pageCounts'] = $this->getCounts(count($cal));//总记录数
    	$data['base']['counts'] = count($cal);
    	$data['base']['page'] = $page;
    	
    	
    	$this->sql .= " LIMIT $offset,$num";
    	$result = $this->db->exceuteQuery($this->sql);
    	foreach ($result as $key => $value)
    	{
    		$data['info'][$key]['newimg'] = "./uploadfiles/goods/".$result[$key]['newimg'];
    		$data['info'][$key]['gid'] = $value['ID'];
    		$data['info'][$key]['collecttime'] = $value['collecttime'];
    		$data['info'][$key]['goodsname'] = $value['goodsname'];
    		$data['info'][$key]['goodsdesc'] = $value['goodsdesc'];
    		$data['info'][$key]['collecturl'] = $value['collecturl'];
    	}
    	return $data;
    
    }
    
    
    /**
     * 
     * 获取用户帖子收藏
     * @param unknown_type $userid:用户ID
     */
    function getTZCollect($userid,$page)
    {
    	$num = 10;
    	$offset = $num * ($page-1);
    	$this->sql = "SELECT t.*
    					FROM t_goods_collect t
    					WHERE t.idt_user='$userid'
    					AND t.collecttype='0'
    					ORDER BY t.collecttime DESC
    	";
    	$cal = $this->db->exceuteQuery($this->sql);
    	$data['base']['pageCounts'] = $this->getCounts(count($cal));//总记录数
    	$data['base']['counts'] = count($cal);
    	$data['base']['page'] = $page;
    	$this->sql .= " LIMIT $offset,$num";
    	$result = $this->db->exceuteQuery($this->sql);
    	foreach ($result as $key => $value)
    	{
    		$data['info'][$key]['ID'] = $value['ID'];
    		$data['info'][$key]['collecttime'] = $value['collecttime'];
    		$data['info'][$key]['collectname'] = $value['collectname'];
    		$data['info'][$key]['collecturl'] = $value['collecturl'];
    	}
    	return $data;
    }
    
    
    /**
     * 
     * 获取用户日志收藏
     * @param unknown_type $userid：用户ID
     */
    function getRZCollect($userid,$page)
    {
    	$num = 10;
    	$offset = $num * ($page-1);
    	$this->sql = "SELECT t.*,s.ID sid,s.title,u.ID uid,u.nickname,u.email
    					FROM t_goods_collect t
    					INNER JOIN t_space_diary s ON t.idt_goods=s.ID
    					INNER JOIN t_user u ON u.ID=s.creator
    					WHERE t.idt_user='$userid'
    					AND t.collecttype='1'
    					ORDER BY t.collecttime DESC
    	";
    	$cal = $this->db->exceuteQuery($this->sql);
    	$data['base']['pageCounts'] = $this->getCounts(count($cal));//总记录数
    	$data['base']['counts'] = count($cal);
    	$data['base']['page'] = $page;
    	$this->sql .= " LIMIT $offset,$num";
    	$result = $this->db->exceuteQuery($this->sql);
    	foreach ($result as $key => $value)
    	{
    		$data['info'][$key]['ID'] = $value['ID'];
    		$data['info'][$key]['collecttime'] = $value['collecttime'];
    		$data['info'][$key]['name'] = empty($value['nickname'])?$value['email']:$value['nickname'];
    		$data['info'][$key]['uid'] = $value['uid'];
    		$data['info'][$key]['title'] = $value['title'];
    		$data['info'][$key]['sid'] = $value['sid'];
    		//$data['info'][$key]['']
    	}
    	return $data;
    }
    
    
    
    //获取地址（省，市，区）
    function getLevelAddr($level,$parentid)
    {
    	$this->sql = "SELECT m.* FROM m_city m WHERE m.level='$level' AND m.parentid='$parentid'";
    	$result = $this->db->exceuteQuery($this->sql);
    	return $result;
    }
    
    
    
    
}

?>