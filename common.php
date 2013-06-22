<?php
require_once('base.php');
require_once('BaseBusiness.php');
require_once('MininatureUtil.php');
require_once('CityBusiness.php');

//ajax 转码函数
function  js_unescape($str)
{
        $ret = '';
        $len = strlen($str);

        for ($i = 0; $i < $len; $i++)
        {
                if ($str[$i] == '%' && $str[$i+1] == 'u')
                {
                        $val = hexdec(substr($str, $i+2, 4));

                        if ($val < 0x7f) $ret .= chr($val);
                        else if($val < 0x800) $ret .= chr(0xc0|($val>>6)).chr(0x80|($val&0x3f));
                        else $ret .= chr(0xe0|($val>>12)).chr(0x80|(($val>>6)&0x3f)).chr(0x80|($val&0x3f));

                        $i += 5;
                }
                else if ($str[$i] == '%')
                {
                        $ret .= urldecode(substr($str, $i, 3));
                        $i += 2;
                }
                else $ret .= $str[$i];
        }
        return $ret;
}



$citybsi = new CityBusiness();//获取城市列表和学校列表处理类变量
$module = $_REQUEST['module'];
//echo "<pre>";
//print_r($_SESSION['cityid']);
if (empty($module))//初始化
{
	
	//第一次进入页面时初始化地点的session值
	if (empty($_SESSION['cityid']['firstcity'])&&empty($_SESSION['cityid']['secondcity'])&&empty($_SESSION['cityid']['thirdcity']))//如果没有点击
	{
		//echo "chushihua";
		$firstcity = $citybsi->getCitis('1');//获取所有的城市，省份或直辖市
		$_SESSION['cityid']['firstcity']=$firstcity['0']['ID'];;
	    $secondcity = $citybsi->getCitis('2',$firstcity['0']['ID']); //查找省以下的市级
	    $_SESSION['cityid']['secondcity']=$secondcity[0]['ID'];
	    if(!empty($secondcity)) 
	    {
		     $thirdcity = $citybsi->getCitis('3',$secondcity[0]['ID']);
		   
	    }
	    $_SESSION['cityid']['thirdcity']=$thirdcity[0]['ID'];
	}
    else
    {
	    if( !empty($_SESSION['cityid']['firstcity']))
	      {
	      	$firstcityother = $citybsi->getCitis('1');//获取所有的城市，省份或直辖市
	   	    $i=1;
	   	    foreach($firstcityother as $key => $value)
	   	    {       
	   	    	if($value['ID'] == $_SESSION['cityid']['firstcity'])
	   	    	{
	   	    		$firstcity[0]=$value;
	   	    	}
	   	    	else 
	   	    	{

	   	    		 $firstcity[$i]=$value;
	   	    		 $i++;
	   	    		
	   	    		
	   	    	}
	   	    }
	      }
	    if(!empty($_SESSION['cityid']['secondcity']))
	    {
	    	
	    	$secondcityother = $citybsi->getCitis('2',$_SESSION['cityid']['firstcity']); //查找省以下的市级
	         $i=1;
	   	    foreach($secondcityother as $key => $value)
	   	    {
	   	    	          
	   	    	if($value['ID'] == $_SESSION['cityid']['secondcity'])
	   	    	{
	   	    		$secondcity[0]=$value;
	   	    	}
	   	    	else 
	   	    	{
	   	    		 $secondcity[$i]=$value;
	   	    		 $i++;
	   	    		
	   	    	}
	   	    }
    	
         }
	    if(!empty($_SESSION['cityid']['secondcity'])&&!empty($_SESSION['cityid']['thirdcity']))
	    {
	    	
	    	$thirdcityother= $citybsi->getCitis('3',$_SESSION['cityid']['secondcity']);
	        foreach($thirdcityother as $key => $value)
	   	    {
	   	    	          
	   	    	if($value['ID'] == $_SESSION['cityid']['thirdcity'])
	   	    	{
	   	    		$thirdcity[0]=$value;
	   	    	}
	   	    	else 
	   	    	{
	   	    		 $thirdcity[$i]=$value;
	   	    		 $i++;
	   	    	}
	   	    }
	    }
    }
    
    //根据session初始化学校信息
    if(empty($_SESSION['cityid']['schoolcity']))
    {
    	$selectcityid=$_SESSION['cityid']['firstcity'];
    	$schoolist = $citybsi->getSchools($selectcityid);
        $_SESSION['cityid']['schoolid']=$schoolist[0]['ID'];
        $defaultschoolname=$schoolist[0]['schoolname'];
	  
    }
    else 
    {
    	$selectcityid=$_SESSION['cityid']['schoolcity'];
    	$schoolist = $citybsi->getSchools($selectcityid);
    	$defaultschool=$citybsi->getSchoolBySchoolId($_SESSION['cityid']['schoolid']);
    	$defaultschoolname=$defaultschool['schoolname'];
    }
  
     if(isset($defaultschoolname{12}))
	    {
	    	$defaultschoolname=substr($defaultschoolname,0,12);
	    }
	  
	$alliance =$citybsi->getalliance();
	$friendlink=$citybsi->getFriendLink();
	$smarty->assign("defaultschoolname",$defaultschoolname);
	$smarty->assign("selectcityid",$selectcityid);
	$smarty->assign("schools",$schoolist);//tpl页面填充选中的城市下的学校
	$smarty->assign("firstcity",$firstcity);//tpl页面填充所有的省份或直辖市
	$smarty->assign("secondcity",$secondcity);
	$smarty->assign("thirdcity",$thirdcity);
	$smarty->assign("alliance",$alliance);
	$smarty->assign("friendlink",$friendlink);
}

//点击省份的同时改城市的ajax
elseif ($module=='firstcity')
{
  
	$firstcityid =$_POST['firstcityid'];
	$_SESSION['cityid']['firstcity']=$firstcityid;
  //如果没有选过学校
  if(empty($_SESSION['cityid']['schoolcity']))
	{
		$onecityid=$_SESSION['cityid']['firstcity'];
		$schoollist = $citybsi->getSchools($onecityid); //查询该省以下的学校
		$oneschoolid=$schoollist[0]['ID'];
		$_SESSION['cityid']['schoolid']=$oneschoolid;
		
	}
	//如果选过学校
	else 
	{
		$onecityid=$_SESSION['cityid']['schoolcity'];
		$schoollist = $citybsi->getSchools($onecityid); //查询该省以下的学校
		$oneschoolid=$_SESSION['cityid']['schoolid'];
	}
	$firstcityname=$citybsi->getCitis('1');
	$secondcityname=$citybsi->getCitis('2',$firstcityid);//查询市级城市
	if(empty($secondcityname))
	{
		
		$cities['thirdcityname']="";
		$_SESSION['cityid']['secondcity']="";
		$_SESSION['cityid']['thirdcity']="";
		
	}
	else 
	{
		$cities['thirdcityname']=$citybsi->getCitis('3',$secondcityname[0]['ID']);
		$_SESSION['cityid']['secondcity']=$secondcityname[0]['ID'];
		$_SESSION['cityid']['thirdcity']=$cities['thirdcityname'][0]['ID'];
	
		
	}
	$cities['baseinfo']['firstcityid']=$firstcityid;
	$cities['baseinfo']['schoolcityid']=$onecityid;
	$cities['baseinfo']['schoolid']=$oneschoolid;
	$cities['schoollist']=$schoollist;
	$cities['firstcityname']=$firstcityname;
	$cities['secondcityname']=$secondcityname;
	
	$response = json_encode($cities);
	echo $response;
	}

elseif ($module=='secondcity')
{
	//获取二级城市id
	$secondcityid =$_POST['secondcityid'];
	
	$_SESSION['cityid']['secondcity']=$secondcityid;
	
    $secondinfo=$citybsi->getCityById($secondcityid);//获取城市的parentid即省份id
    $provienceId=$secondinfo['parentid'];
    $secondcityname=$citybsi->getCitis('2',$provienceId);//获取省份的所有城市
	$thirdcityname=$citybsi->getCitis('3',$secondcityid);
	$_SESSION['cityid']['thirdcity']=$thirdcityname[0]['ID'];
	$cities['secondcityname']=$secondcityname;
	$cities['thirdcityname']=$thirdcityname;
	$cities['baseinfo']['secondcityid']=$secondcityid;
	$response = json_encode($cities);
	echo $response;
}
	
elseif ($module=='thirdcity')
{
	$thirdcityid =$_POST['thirdcityid'];
	$_SESSION['cityid']['thirdcity']=$thirdcityid;
	$thirdcityinfo=$citybsi->getCityById($thirdcityid);
	$citylevelid=$thirdcityinfo['parentid'];
	$cities['baseinfo']['thirdcityid']=$thirdcityid;
	$cities['thirdcityname']=$citybsi->getCitis('3',$citylevelid);
	$response = json_encode($cities);
	echo $response;
	
}
//点击学校div上的省份时
elseif ($module=='changeschool')
{
	$proviceid =$_POST['proviceid'];
	$oneschool = $_SESSION['cityid']['schoolid'];
	$schools['schoollist'] = $citybsi->getSchools($proviceid);
	$schools['citylist'] = $citybsi->getCitis('1');
	$schools['baseinfo']['oneschoolid']=$oneschool;
	$schools['baseinfo']['proviceid']=$proviceid;
	$response = json_encode($schools);
	echo $response;
	
}
//点击学校名时，将学校加入session中
elseif ($module=='addschoolsession')
{
	$schoolid=$_POST['schoolid'];
	$keyword=$_POST['keyword'];
	
	$_SESSION['cityid']['schoolid']=$schoolid;
	$schoolinfo=$citybsi->getSchoolBySchoolId($schoolid);
	$_SESSION['cityid']['schoolcity']=$schoolinfo['idm_city1'];
	if($keyword=='undefined')
	{
		
		$schools['schoollist']=$citybsi->getSchools($schoolinfo['idm_city1']);
	}
	else 
	{
		//$response="1234";
		$keyword=js_unescape($keyword);
		$schools['schoollist']=$citybsi->getSchoolsByName($keyword);
		
	}
	$schools['baseinfo']['schoolid']=$schoolid;
	$response = json_encode($schools);
	echo $response;
	
}

elseif ($module=='searchschool')
{
	$schoolname=$_POST['schoolname'];
	$schoolname=js_unescape($schoolname);
	$schoolnames['schools']=$citybsi->getSchoolsByName($schoolname);
	$schoolnames['baseinfo']['schoolname']=$schoolname;
	$response = json_encode($schoolnames);
	echo $response;
}



?>