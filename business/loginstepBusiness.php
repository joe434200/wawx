<?php
require_once('BaseBusiness.php');
require_once('DateUtil.php');
require_once('SupportException.php');


class loginstepBusiness extends BaseBusiness
{
	function getlabel($page)
	{
		$num = 2;
    	$offset = $num * ($page-1);
		$sql = "SELECT
	            mylabels,
	            COUNT(1)
                FROM
	           `t_user`
                GROUP BY
	            mylabels
               ";
		$cal = $this->db->exceuteQuery($sql);
    	$data['base']['pageCounts'] = $this->getCounts(count($cal),$num);
    	$data['base']['pagenum'] = $num;
    	$data['base']['page'] = $page;
    	$sql .=" ORDER BY COUNT(1) DESC LIMIT $offset,$num";
		$rs = $this->db->exceuteQuery($sql);
		
		foreach($rs as $key => $value)
    	{
    		$data['info'][$key]['mylabels'] = $value['mylabels']; 		
    	}
    	return $data;
	}
	
function getlabelnum($label)
	{
		$sql = "SELECT
	            mylabels,
	            COUNT(1) AS labelnum
                FROM
	           `t_user`
                WHERE `status`='1'
                AND   shieldflg='0'
                GROUP BY
	            mylabels
                HAVING
	            mylabels = '$label'
                ";
		$rs = $this->db->exceuteQuery($sql);
		return $rs[0];
	}
	
	function getfriends($label,$page)
	{
		$num = 1;
    	$offset = $num * ($page-1);
		$sql = "SELECT
		       ID,
	           nickname,
               email,
               photo
               FROM
	          `t_user`
               WHERE 
               mylabels='$label'
               AND `status`='1'
               AND shieldflg='0'";
		$cal = $this->db->exceuteQuery($sql);
    	$data['base']['pageCounts'] = $this->getCounts(count($cal),$num);
    	$data['base']['pagenum'] = $num;
    	$data['base']['page'] = $page;
    	$data['base']['label']=$label;
    	$sql .="  LIMIT $offset,$num";
		$rs = $this->db->exceuteQuery($sql);
		
		foreach($rs as $key => $value)
    	{
    		$data['info'][$key]['ID'] = $value['ID'];
    		$data['info'][$key]['nickname'] = $value['nickname'];
    		$data['info'][$key]['email'] = $value['email'];
    		$data['info'][$key]['photo'] = $value['photo']; 	
    	}
    	return $data;
	}
	
	function updateuser($label,$id)
	{
		$sql="UPDATE `t_user` SET `mylabels`='$label' WHERE `ID`='$id'";
		$rs = $this->db->exceuteUpdate($sql);
		return $rs;
	}
	
//$data作为一个多维数组
	function Insertfriend($data)
	{
		$insertsql="INSERT INTO `t_user_friends` (friendid,idt_user,createtime,overflg
		) VALUES ";

		foreach($data as $value)
		{
			$insertsql .= $this->createValueStr($value);
			$insertsql .= ",";
		}

		$insertsql = substr($insertsql,0,strlen($insertsql)-1);


		$rs = $this->db->exceuteUpdate($insertsql);
		return $rs;
	}
	
	//单独的一维数据
	function createValueStr($data)
	{
		$valuestr = "(";

		foreach($data as $value)
		{
			
				$valuestr .= "'".$value."'".",";
		}
		$valuestr = substr($valuestr,0,strlen($valuestr)-1);
		$valuestr .= ")";


		return $valuestr;
	}
	
  //获取页数
    function getCounts($num, $infoCounts)
    {
       
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
}
?>