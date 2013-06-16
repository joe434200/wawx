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

class SelfBuiness extends BaseBusiness
{
    var $photo_path;
    function __construct()
    {
        parent::__construct ();
        $this->photo_path = "./uploadfiles/space/";
    }
    
    //echo跳转url
    function toLocation($url)
    {
    	echo "<script language='javascript'>";
		echo "location='$url';";
		echo "</script>";
    }
    //---------------------------------------------overload--------------------------------------------------------------
    function self_update($tablename, $data, $where)
    {
        parent::Update ( $tablename, $data, $where );
    }
    
    function self_insert($tablename, $data)
    {
        return parent::Insert ( $tablename, $data );
    }
    
    function self_search($tablename, $fieldslist)
    {
        parent::Search ( $tablename, $fieldslist);
    }
    
    function self_delete($tablename,$where)
    {
        return parent::Delete($tablename,$where);
    }
    
    //--------------------------------------------new function by zrh--------------------------------------------
    
    function getUserBaseInfo($userid)//获取用户基本信息
    {
    	$this->sql = "SELECT u.* FROM t_user u WHERE u.id='$userid'";
    	$result = $this->db->exceuteQuery($this->sql);
    	$result[0]['photo'] = "./uploadfiles/user/".$result[0]['photo'];
    	$result[0]['name'] = empty($result[0]['nickname'])?$value[0]['email']:$result[0]['nickname'];
    	return $result[0];
    }
    /**
     * 
     * 获取用户所有相册信息
     * @param unknown_type $userid :要获取的用户的ID
     */
    function get_album($userid)
    {
        $this->sql = "SELECT count(s.id) sum ,t.*
        				FROM t_space_album t
        				LEFT JOIN t_space_album_photo s ON s.idt_space_album = t.id
        				WHERE t.creater = '$userid'
        				GROUP BY t.createtime ASC";
        $rs = $this->db->exceuteQuery($this->sql);
        return $rs;
    }    
    /**
     * 
     * 按分页获取相册
     * @param unknown_type $userid :要获取的用户的ID
     * @param unknown_type $page :要获取的页数
     */
    function getAlbumByPage($userid,$page)
    {
        $pageNum = 10;
        $offset = $pageNum * ($page-1);
        $this->sql = "SELECT t.* FROM t_space_album t WHERE t.creater='$userid' GROUP BY t.createtime LIMIT $offset,$pageNum";
        
        //查询所有的记录数
        $calsql = "SELECT count(t.ID) sums FROM t_space_album t WHERE t.creater='$userid'";
        $cal = $this->db->exceuteQuery($calsql);
        $pageCounts = $cal[0]['sums'];
        
        
        $rs = $this->db->exceuteQuery($this->sql);
        $data['base']['page'] = $page;
        $data['base']['counts'] = $pageCounts;//总记录数
        $data['base']['pageNum'] = $pageNum;
        $data['base']['pageCounts'] = $this->getCounts($pageCounts);
        foreach($rs as $key => $value)
        {
            $data['alb'][$key]['ID'] = $value['ID'];
            $data['alb'][$key]['name'] = $value['albumname'];
        }
        return $data;
    }
   
    /**
     * 
     * 获取具体相册的所有照片
     * 相册的保存路径是：uploadfiles/space/用户email/相册名字/照片名
     * @param unknown_type $albid ：相册ID
     */
    function get_album_photos($albid)
    {
        $this->sql = "SELECT t.*,u.email,s.albumname,s.ID albid
        				FROM t_space_album_photo t 
        				INNER JOIN t_space_album s ON s.id = t.idt_space_album
        				INNER JOIN t_user u ON u.id = t.creater
        				WHERE t.idt_space_album = '$albid'";
        $rs = $this->db->exceuteQuery($this->sql);
        foreach($rs as $key => $value)
        {
        	$data[$key]['ID'] = $value['ID'];
            $data[$key]['path'] = $this->photo_path.$value['email']."/".$value['albid']."/".$value['realname'];
            $data[$key]['name'] = $value['realname'];
            //echo $data[$key];
        }
        return $data;
    }
    
    /**
     * 
     * 获取空间日志的分类和总数
     * @param unknown_type $userid
     */
    function get_diary_catalog($userid)
    {
        $this->sql = "SELECT t.* FROM t_space_diary_catalog t WHERE t.idt_user='$userid'";
        $rs = $rs = $this->db->exceuteQuery($this->sql);
        return $rs;
    }
    
    /**
     * 
     * 按分页查找日志
     * @param unknown_type $uid：用户ID
     * @param unknown_type $diaid：日志类型ID，如果为空，则查询所有日志
     * @param unknown_type $page：当前查询的页码
     */
    function getDiaryPage($uid,$diaid,$page)
    {
        //获取用户日志数
        $data = array();
        $pageNum = 10; 
        $offest = $pageNum * ($page-1);
        
        if(!empty($diaid) && $diaid != "")
        {
            $calsql = "SELECT count(t.ID) sums FROM t_space_diary t WHERE t.creator='$uid' AND t.idt_space_diary_catalog='$diaid'";
            $this->sql = "SELECT t.*,count(r.id) resum,count(b.id) brsum
        				FROM t_space_diary t
        				LEFT JOIN t_space_reply r ON r.idt_diary=t.id AND r.level='1' AND t.type='3'
        				LEFT JOIN t_space_diary_browser b ON b.idt_forum_topic = t.id
        				WHERE t.idt_space_diary_catalog='$diaid' AND t.creator='$uid'
        				GROUP BY t.id
        				ORDER BY t.createtime DESC
        				";
        }
        else 
        {
            $calsql = "SELECT count(t.ID) sums FROM t_space_diary t WHERE t.creator='$uid'";
            $this->sql = "SELECT t.*,count(r.id) resum,count(b.id) brsum
        				FROM t_space_diary t 
        				LEFT JOIN t_space_reply r ON r.idt_diary=t.id AND r.level='1'
        				LEFT JOIN t_space_diary_browser b ON b.idt_forum_topic = t.id
        				WHERE t.creator='$uid'
        				GROUP BY t.id
        				ORDER BY t.createtime DESC
        				";
        }
        
        $this->sql .= "   LIMIT $offest,$pageNum";
        
        $cal = $this->db->exceuteQuery($calsql);
        $num = $cal[0]['sums'];
        $rs = $this->db->exceuteQuery($this->sql);
        
        $data['base']['page'] = $page;
        $data['base']['pageCounts'] = $this->getCounts($num);
        //echo $num;
        //echo $data['base']['pageCounts'];
        foreach($rs as $key => $value)
        {
            $data['info'][$key]['id'] = $value['ID'];
            $data['info'][$key]['content'] = $value['content'];
            $data['info'][$key]['title'] = $value['title'];
            $data['info'][$key]['time'] = $value['createtime'];
            $data['info'][$key]['resum'] = $value['resum'];
            $data['info'][$key]['brsum'] = $value['brsum'];
        }
        
        //echo "<pre>";
        //print_r($data);
        //exit;
        return $data;
    }
    /**
     * 
     * 查找日志
     * $diaid,日志分类
     */
    function get_diary($userid,$diaid)
    {
        if(!empty($diaid) && $diaid != "")
        {
            $this->sql = "SELECT t.*,count(r.id) resum,count(b.id) brsum
        				FROM t_space_diary t 
        				LEFT JOIN t_space_reply r ON r.idt_diary=t.id AND r.level='1'
        				LEFT JOIN t_space_diary_browser b ON b.idt_forum_topic = t.id
        				WHERE t.idt_space_diary_catalog='$diaid' AND t.creator='$userid'
        				GROUP BY t.id
        				ORDER BY t.createtime DESC
        				";
        }
        else 
        {
            $this->sql = "SELECT t.*
        				FROM t_space_diary t 
        				LEFT JOIN t_space_reply r ON r.idt_diary=t.id AND r.level='1'
        				LEFT JOIN t_space_diary_browser b ON b.idt_forum_topic = t.id
        				WHERE t.creator='$userid'
        				GROUP BY t.id
        				ORDER BY t.createtime DESC
        				";
        }
        $rs = $rs = $this->db->exceuteQuery($this->sql);
        return $rs;
        
    }
    
    /**
     * 
     * 获取日志详细
     * @param unknown_type $diaid
     */
    function get_diary_show($diaid)
    {
        $this->sql = "SELECT t.* FROM t_space_diary t WHERE t.id = '$diaid'";
        $rs = $rs = $this->db->exceuteQuery($this->sql);
        return $rs[0];
    }
    
    
    
    
    /**
     * 
     * 获取评论内容
     * @param unknown_type $type ： 1：日志  2：照片 3：留言
     * @param unknown_type $id ：日志id 或者 照片id
     */
    function get_Reply($type,$id=null,$page)
    {
        $pageNum = 10;
        $data = array();
        
        //查询一级回复
        $this->sql = "SELECT t.*,u.photo,u.nickname,u.email,u.id uid
        				FROM t_space_reply t  ";
               
        $this->sql .= " INNER JOIN t_user u ON t.crisisid = u.id
 		 				WHERE t.level = '1'
 		 				AND t.type = '$type'   ";
        if(!empty($id))//加入id限制
        {
            $calsql = "SELECT count(t.ID) sums FROM t_space_reply t WHERE t.idt_diary = '$id' AND t.level = '1'";
            $this->sql .= "AND t.idt_diary = '$id'";
            $rs = $this->db->exceuteQuery($calsql);
            $calcount = $rs[0]['sums'];
            
        }
        else 
        {
            $calsql = "SELECT count(t.ID) sums FROM t_space_reply t WHERE t.level = '1'";
            $rs = $this->db->exceuteQuery($calsql);
            $calcount = $rs[0]['sums'];
        }
        //echo $calcount;
        
        //加入limit限制       
        $offset = $pageNum * ($page-1);
        $this->sql .= " ORDER BY t.createtime DESC LIMIT $offset , $pageNum  ";
        
        //查询一级回复
        $rs1 = $this->db->exceuteQuery($this->sql);
        $data['base']['counts'] = $calcount;//总记录数
        $data['base']['pageCounts'] = $this->getCounts($calcount);//保存分页 的页数
        $data['base']['page'] = $page;//保存当前分页
        $data['base']['type'] = $type;//保存查询内容的类型/返回给JS使用
        if(count($rs1) > 0)//如果查询一级回复结果不为空
        {
            $data['base']['counts'] = 1;
            //查询二级回复
            foreach($rs1 as $key => $value)
            {
                $data['reply'][$key]['id'] = $value['ID'];
                $data['reply'][$key]['photo'] = $value['photo'];
                $data['reply'][$key]['content'] = $value['content'];
                $data['reply'][$key]['createtime'] = $value['createtime'];
                $data['reply'][$key]['uid'] = $value['uid'];
                $data['reply'][$key]['name'] = empty($value['nickname'])?$value['email']:$value['nickname'];
                //查询二级回复
                $this->sql = "SELECT t.* ,u.photo,u.nickname,u.email,u.id uid
                				FROM t_space_reply t
                				INNER JOIN t_user u ON t.crisisid = u.id
                				WHERE t.idt_diary = '$id'              				
                				AND t.upid = '".$value['ID']."'
                				AND t.level = '2'
                ";
                $rs2 = $this->db->exceuteQuery($this->sql);
                if(count($rs2) > 0)
                {
                    foreach($rs2 as $k => $v)
                    {
                        $sec[$k]['id'] = $v['ID'];
                        $sec[$k]['content'] = $v['content'];
                        $sec[$k]['photo'] = $v['photo'];
                        $sec[$k]['uid'] = $v['uid'];
                        $sec[$k]['name'] = empty($v['nickname'])?$v['email']:$v['nickname'];
                        $sec[$k]['createtime'] = $v['createtime'];
                        $data['reply'][$key]['sec'] = $sec;
                        
                    }
                }
            }
        }
        else
        {
            $data['base']['counts'] = 0;
        }
        
        //echo "<pre>";
        //print_r($data);
        //exit;
        return $data;
            
    }
    
    //获取页数
    function getCounts($num)
    {
        $infoCounts = 10;
        if($num <= $infoCounts)
        {
            return 1;
        }
        else
        {
            if($num%$infoCounts == 0)
            {
                return $num/$infoCounts;
            }
            return $num/$infoCounts + 1;
        }
    }
    
    
    //获取空间基本信息(个人档)
    function getSpace($uid)
    {
        $this->sql = "SELECT  u.*,s.spacename,s.introduction,s.visitsum
        				FROM t_user u
        				INNER JOIN t_space s ON u.id = s.idt_user
        				WHERE u.id='$uid'
        				
        ";
        
        $rs = $this->db->exceuteQuery($this->sql);
        $rs[0]['photo'] = "./uploadfiles/user/".$rs[0]['photo'];
        return $rs[0];
    }
    
    //获取用户基本信息日志数 照片数  好友数
    function getUserInfo($uid)
    {
        $frsql = "SELECT count(t.ID) sum FROM t_user_friends t WHERE t.idt_user='$uid'";
        $phsql = "SElECT count(t.ID) sum FROM t_space_album_photo t WHERE t.creater='$uid'";
        $disql = "SElECT count(t.ID) sum FROM t_space_diary t WHERE t.creator='$uid'";
        $tpsql = "SElECT count(t.ID) sum FROM t_forum_topic t WHERE t.creater='$uid'";;
        $rs1 = $this->db->exceuteQuery($frsql);
        $rs2 = $this->db->exceuteQuery($phsql);
        $rs3 = $this->db->exceuteQuery($disql);
        $rs4 = $this->db->exceuteQuery($tpsql);
        
        $data['frsum'] = $rs1[0]['sum'];//好友数
        $data['phsum'] = $rs2[0]['sum'];//照片数
        $data['disum'] = $rs3[0]['sum'];//日志数
        $data['tpsum'] = $rs4[0]['sum'];//帖子数
        return $data;
    }
    
    //获取用户好友
    function getFriends($uid)
    {
        $this->sql = "SELECT t.*,u.id frid,u.nickname,u.email,u.photo
        				FROM t_user_friends t
        				INNER JOIN t_user u ON u.id=t.friendid
        				WHERE t.idt_user='$uid'
        				AND t.overflg='0'
        				ORDER BY t.createtime DESC 
        				LIMIT 0,6";
        $rs  = $this->db->exceuteQuery($this->sql);
        foreach($rs as $key => $value)
        {
            $rs[$key]['photo'] = "./uploadfiles/user/".$value['photo'];
        }
        return $rs;
    }
    
    //获取用户最近访客
    function getVisitors($uid)
    {
        $this->sql = "SELECT t.* ,u.id frid,u.nickname,u.email,u.photo
        				FROM t_user_browser t 
        				INNER JOIN t_user u ON u.id=t.browserid
        				WHERE t.idt_user='$uid' 
        				ORDER BY t.createtime DESC 
        				LIMIT 0,6";
        $rs  = $this->db->exceuteQuery($this->sql);
        foreach($rs as $key => $value)
        {
            $rs[$key]['photo'] = "./uploadfiles/user/".$value['photo'];
        }
        return $rs;
    }
    
    //获取用户相册(首页)
    function getAlbums($uid)
    {
        $this->sql = "SELECT t.* FROM t_space_album t WHERE t.creater='$uid' ORDER BY t.createtime ASC LIMIT 0,10";
        $rs  = $this->db->exceuteQuery($this->sql);
        return $rs;
    }
    
    
    //获取用户日志（首页）
    function getDiarys($uid)
    {
        $this->sql = "SELECT t.* FROM t_space_diary t WHERE t.creator='$uid' ORDER BY t.createtime LIMIT 0,3";
        $rs  = $this->db->exceuteQuery($this->sql);
        return $rs;
    }
    
    
    //获取用户好友
    function getFriendsList($userid,$page)
    {
    	
    	$num = 10;
    	$offset = $num * ($page-1);
    	
    	$this->sql = "SELECT t.*,u.email,u.nickname,u.photo,u.id uid
    					FROM t_user_friends t
    					INNER JOIN t_user u ON t.friendid = u.id
    					WHERE t.idt_user = '$userid'
    					AND t.overflg='0'
    					";
    	
    	$cal = $this->db->exceuteQuery($this->sql);
    	$data['base']['counts'] = count($cal);
    	$data['base']['pageCounts'] = $this->getCounts(count($cal));
    	$data['base']['pagenum'] = $num;
    	$data['base']['page'] = $page;
    	
    	//获取一个分页的数量的记录，并按时间排序
    	$this->sql .= "  ORDER BY t.createtime DESC LIMIT $offset,$num";
    	$rs = $this->db->exceuteQuery($this->sql);
    	
    	foreach($rs as $key => $value)
    	{
    		$data['info'][$key]['frid'] = $value['uid'];
    		$data['info'][$key]['name'] = empty($value['nickname'])?$value['email']:$value['nickname'];
    		$data['info'][$key]['photo'] = "./uploadfiles/user/".$value['photo'];    		
    	}
    	
    	return $data;
    }
    
    
    
    /**
     * 
     * 查找用户的关注 OR 粉丝
     * @param unknown_type $userid:用户id
     * @param unknown_type $page：当前页
     * @param unknown_type $type：0关注，1粉丝
     */
    function getAttentionList($userid,$page,$type)
    {
    	$num = 10;
    	$offset = $num * ($page-1);
    	
    	if($type == '0')
    	{
    		$this->sql = "SELECT t.*,u.email,u.nickname,u.photo,u.id uid
    					FROM t_user_attention t
    					INNER JOIN t_user u ON t.browserid = u.id
    					WHERE t.idt_user = '$userid'
    					";
    	}
    	else 
    	{
    		$this->sql = "SELECT t.*,u.email,u.nickname,u.photo,u.id uid
    					FROM t_user_attention t
    					INNER JOIN t_user u ON t.idt_user = u.id
    					WHERE t.browserid = '$userid'
    					";
    	}
    	
    	
    	$cal = $this->db->exceuteQuery($this->sql);
    	$data['base']['counts'] = count($cal);
    	$data['base']['pageCounts'] = $this->getCounts(count($cal));
    	$data['base']['pagenum'] = $num;
    	$data['base']['page'] = $page;
    	
    	//获取一个分页的数量的记录，并按时间排序
    	$this->sql .= "  ORDER BY t.createtime DESC LIMIT $offset,$num";
    	$rs = $this->db->exceuteQuery($this->sql);
    	
    	foreach($rs as $key => $value)
    	{
    		$data['info'][$key]['frid'] = $value['uid'];
    		$data['info'][$key]['time'] = $value['createtime'];
    		$data['info'][$key]['name'] = empty($value['nickname'])?$value['email']:$value['nickname'];
    		$data['info'][$key]['photo'] = "./uploadfiles/user/".$value['photo']; 		
    	}
    	
    	return $data;
    }
    
    
    //获取首页(WB)好友，关注，粉丝信息
    function getAttenInfo($userid)
    {
    	$frisql = "SELECT count(t.ID) sum FROM t_user_friends t WHERE t.idt_user='$userid' AND t.overflg='0'";
        $attsql = "SElECT count(t.ID) sum FROM t_user_attention t WHERE t.idt_user='$userid'";
        $fansql = "SElECT count(t.ID) sum FROM t_user_attention t WHERE t.browserid='$userid'";
        $rs1 = $this->db->exceuteQuery($frisql);
        $rs2 = $this->db->exceuteQuery($attsql);
        $rs3 = $this->db->exceuteQuery($fansql);
        
        $data['frsum'] = $rs1[0]['sum'];//好友数
        $data['atsum'] = $rs2[0]['sum'];//关注数
        $data['ansum'] = $rs3[0]['sum'];//粉丝数
        return $data;
    }
    
    
    
    
}
?>