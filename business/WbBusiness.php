<?php
require_once ('BaseBusiness.php');
require_once ('DateUtil.php');
require_once ('SupportException.php');
require_once 'SendMailFunction.php';
require_once ('MessageUtil.php');


class WbBusiness extends SelfBuiness
{
    function __construct()
    {
        parent::__construct ();  
    }
    
    
    /**
     * 判断当前登录用户是否有权访问wb用户
     * userid:当前登录用户
     * wbid：被访问的用户
     */
    function isAccess($userid,$wbid)
    {
    	$this->sql = "SELECT u.* FROM t_user u WHERE u.id='$wbid' ";
    	$rs = $this->db->exceuteQuery($this->sql);
    	$right = $rs[0]['isvisiblespace'];
    	if( $right == '0')
    	{
    		return false;
    	}
    	else if ($right == '1')
    	{
    		$this->sql = "SELECT t.* FROM t_user_friends t WHERE t.idt_user='$wbid' AND t.friendid='$userid'";
    		$rs = $this->db->exceuteQuery($this->sql);
    		if(count($rs) > 0)
    		{
    			return true;//如果当前用户是被查看用户的好友，则可以访问
    		}
    		return false;
    	}
    	else 
    	{
    		//权限为2时，是对所有人公开
    		return true;
    	}
    }
    
    
    /**
     * 判断当前登录用户是否已经关注wb用户
     * userid:当前登录用户
     * wbid：被访问的用户
     */
    function isAttention($userid,$wbid)
    {
    	$this->sql = "SELECT t.* FROM t_user_attention t WHERE t.idt_user='$userid' AND t.browserid='$wbid'";
    	$rs = $this->db->exceuteQuery($this->sql);
    	if(count($rs) > 0)
	    {
	    	return true;//如果当前用户是被查看用户的好友，则可以访问
	    }
	    return false;
    }
    
    
    /**
     * 判断当前登录用户是否已经关注wb用户
     * userid:当前登录用户
     * wbid：被访问的用户
     */
    function isFriend($userid,$wbid)
    {
    	$this->sql = "SELECT t.* FROM t_user_friends t WHERE t.idt_user='$userid' AND t.friendid='$wbid' AND t.overflg='0'";
    	$rs = $this->db->exceuteQuery($this->sql);
    	if(count($rs) > 0)
	    {
	    	return true;//如果当前用户是被查看用户的好友，则可以访问
	    }
	    return false;
    }
    
    
    
    /**
     * 
     * 获取被查看用户空间日志
     * @param unknown_type $userid：当前登录用户
     * @param unknown_type $wbid：被查看用户
     * @param unknown_type $page：当前页
     */
    function getUserDiarys($userid,$wbid,$page)
    {
    	$size = 10;
    	$offset = $size * ($page -1 );
    	$this->sql = "SELECT t.*,count(s.id) resum,u.nickname,u.email,d.content seccontent,d.transum sectransum,d.title origintitle
    					FROM t_space_diary t
    					LEFT JOIN t_space_diary d ON t.type='1' AND t.idt_diary=d.ID
    					LEFT JOIN t_space_reply s ON s.idt_diary=t.id AND s.level='1' AND t.type='3'
    					LEFT JOIN t_user u ON t.owner = u.ID
    					WHERE t.creator='$wbid'
    					GROUP BY t.id
    					ORDER BY t.createtime DESC
    	";

    	
        
        $cal = $this->db->exceuteQuery($this->sql);
        $this->sql .= "   LIMIT $offset,$size";
        $rs = $this->db->exceuteQuery($this->sql);
        
        $num = count($cal);
        $dsta['base']['counts'] = $num;
        $data['base']['page'] = $page;
        $data['base']['pageCounts'] = $this->getCounts($num);
		
        
        foreach($rs as $key => $value)
        {
        	if($value['authority'] == '2' || ($value['authority'] == '1' && $this->isAttention($userid, $wbid)))
        	{
        		$data['info'][$key]['id'] = $value['ID'];
	            $data['info'][$key]['content'] = $value['content'];
	            $data['info'][$key]['title'] = $value['title'];
	            $data['info'][$key]['time'] = $value['createtime'];
	            $data['info'][$key]['type'] = $value['type'];
	            $data['info'][$key]['sectitle'] = $value['sectitle'];//转发时的用户评论
	            $data['info'][$key]['transum'] = $value['transum'];
	            $data['info'][$key]['resum'] = $value['resum'];
	            $data['info'][$key]['owner'] = $value['owner'];
	            $data['info'][$key]['name'] = empty($value['nickname'])?$value['email']:$value['nickname'];
	            $data['info'][$key]['seccontent'] = $value['seccontent'];
	            $data['info'][$key]['sectransum'] = $value['sectransum'];
	            $data['info'][$key]['idt_diary'] = $value['idt_diary'];
	            $data['info'][$key]['transid'] = $value['type']==1?$value['idt_diary']:$value['ID'];
	            $data['info'][$key]['origintitle'] = $value['origintitle'];
	            //$data['info'][$key][]
        	}
            
        }
        
        //echo "<pre>";
        //print_r($data);
        //exit;
        return $data;
    }
    
    
    //根据指定Id获取日志
    function getDiaryById($diaryid)
    {
    	$this->sql = "SELECT t.* FROM t_space_diary t WHERE t.ID='$diaryid'";
    	$result = $this->db->exceuteQuery($this->sql);
    	return $result[0];
    }
    
    //增加原文转发次数
    function addTranSum($diaryid)
    {
    	$this->sql =  "UPDATE t_space_diary u set u.transum=u.transum+1 WHERE u.ID='$diaryid'";
    	$rs = $this->db->exceuteQuery($this->sql);
    	return $rs;
    }
    
    
    //判断日志是否已收藏
    function isDiaryCollect($diaryid,$userid)
    {
    	$this->sql = "SELECT t.* FROM t_goods_collect t WHERE t.idt_user='$userid' AND t.collecttype='1' AND t.idt_goods='$diaryid'";	
    	$rs = $this->db->exceuteQuery($this->sql);
    	if(count($rs) > 0)
    	{
    		return true;//已存在
    	}
    	return false;//没存在
    }
    
    
    
    function getRecentAffair($wbid)
    {
    	
    	$this->sql = "SELECT u.photo,u.email,u.nickname,
    					FROM t_user u
    					LEFT JOIN t_space_diary d ON d.creator='$wbid'
    					LEFT JOIN	
    	";
    }
    
    
    
    
    
    
    
    
}