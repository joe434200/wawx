<?php
require_once('LoggerManager.php');
require_once('DBUtil.php');
require_once('ValidateUtil.php');
require_once('SupportException.php');
require_once('StringUtil.php');
require_once('AppendStringUtil.php');

class BaseBusiness
{
	var $logger;
	var $className = "BaseBusiness";
	protected $db;
	protected $sql;


	private static $insertsql = "INSERT INTO
				t_message
				(type
				,creater
				,editor
				,creattime
				,edittime
				,manageno
				,formtype
				,idt_form
				,status
				,result
				,delflag
				,senderid
				,receiverid
				,overflg
				,sendstatus
				)
				VALUES
				";

	/**
	 * construct メソッドが定義する。<br>
	 *
	 */
	function __construct() {

		$this->logger = LoggerManager::getLogger($this->className);

		$this->db = new DBUtil();


	}

	/**
	 *
	 * 通用插入方法
	 * @param string $tablename:需要插入数据的表名
	 * @param array $data:需要插入的数据，注意格式，$data是一个数组，key=表中对应的字段名
	 * 譬如：$data['name']='lzg'
	 * $data['code']='001'
	 * $data['type']='1'
	 * 上述数据中code 、name和type都是表m_company中的字段
	 */


	function Insert($tablename,$data)
	{

		$insertsql = "INSERT INTO ".$tablename."  ";
		$keysql ="(";
		$valuesql = "(";


		//循环生成$keysql 和 $valuesql

		foreach($data as $key => $value)
		{
			$keysql = $keysql.$key.",";
			$valuesql = $valuesql."'".$value."',";
		}
		//去掉最后一个逗号
		$keysql = substr($keysql,0,strlen($keysql)-1);
		$valuesql = substr($valuesql,0,strlen($valuesql)-1);

		$keysql .=")";
		$valuesql .= ")";

		$insertsql = $insertsql.$keysql." "." VALUES ";
		$insertsql = $insertsql.$valuesql;

		$rs = $this->db->exceuteUpdate($insertsql);

		return mysql_insert_id();
	}


	/**
	 *
	 * 通用更新方法,主表别名u
	 * @param string $tablename:需要插入数据的表名
	 * @param array $data：需要更新的数据，注意格式，$data是一个数组，key=表中对应的字段名
	 * @param string $where:更新条件
	 * 譬如：$data['name']='lzg'
	 * $data['code']='001'
	 * $data['type']='1'
	 * 上述数据中code 、name和type都是表m_company中的字段
	 */
	function Update($tablename,$data,$where=null)
	{

		$updatesql = "UPDATE  ".$tablename." u  SET  ";
		$setsql ="";



		//循环生成$keysql 和 $valuesql

		foreach($data as $key => $value)
		{
			if ((!empty($value) || ($value === 0 || $value==='0' || $value==="0")))
			{
				$setsql = $setsql."u.".$key."="."'".$value."',";
			}
			else
			{

				$setsql = $setsql."u.".$key."=NULL,";
			}
		}
		//去掉最后一个逗号
		$setsql = substr($setsql,0,strlen($setsql)-1);

		$updatesql = $updatesql.$setsql;
		if (!empty($where))
		{
			$updatesql = $updatesql." WHERE ".$where;
		}


		$rs = $this->db->exceuteUpdate($updatesql);
		return $rs;
	}

	/**
	 *
	 * 通用查询方法，主表别名m
	 * @param string $tablename:查询主表名称
	 * @param string $fieldslist:取出的字段列表
	 * @param string $joinsql:内连接 等连接子句
	 * @param string $where:条件
	 * @param string $groupsql:分组条件
	 * @param string $ordersql：排序子句
	 */
	function Search($tablename,$fieldslist,$joinsql=null,
		$where=null,$groupsql=null,$ordersql=null)
	{

		$selectsql = "SELECT  ".$fieldslist."     ";
		$selectsql .= " FROM ".$tablename." m ";
		if (!empty($joinsql))
		{
			$selectsql .= $joinsql." ";
		}
		if (!empty($where))
		{
			$selectsql .= "WHERE ".$where." ";
		}
		if (!empty($groupsql))
		{
			$selectsql .= "GROUP BY ".$groupsql." ";
		}
		if (!empty($ordersql))
		{
			$selectsql .= "ORDER BY ".$ordersql." ";
		}
		$rs = $this->db->exceuteQuery($selectsql);
		return $rs;
	}


	/**
	 *
	 * 通用删除方法,主表使用别名d
	 * @param string $tablename:需要删除数据的表名
	 * @param string $where:条件
	 *
	 */
	function Delete($tablename,$where=null)
	{

		$delsql = "DELETE d FROM ".$tablename." d ";

		if (!empty($where))
		{
			$delsql .= "WHERE ".$where." ";
		}

		$rs = $this->db->exceuteUpdate($delsql);
		return $rs;
	}


	/**
	 *
	 * 通用逻辑删除方法,主表使用别名d
	 * @param string $tablename:需要删除数据的表名
	 * @param string $where:条件
	 *
	 */
	function DeleteLogical($tablename,$where=null)
	{

		$delsql = "UPDATE  ".$tablename." d ";
		$delsql .= " SET d.delflag='1'";

		if (!empty($where))
		{
			$delsql .= "WHERE ".$where." ";
		}

		$rs = $this->db->exceuteUpdate($delsql);
		return $rs;
	}
	/**
	 * destruct メソッドが定義する。<br>֐�
	 *
	 */
	function __destruct()
	{
		$this->logger = null;
		$this->className = null;
	}
	//取管理No
 	function getManaNo($name)
    {
     	$sql = "SELECT nextval_str('$name',4)";
     	$db = $this->db;
     	$rs = $db->exceuteQuery($sql);
     	return $rs[0][0];
    }
    //获取依赖书+连络书的url
    function getCurrUserUrls($formtype,$comtype)
    {
    	$sql = null;
    	if($comtype == "1")
    	{
    		$sql = "  SELECT * FROM m_urls WHERE formtype='$formtype' AND useright='2'";
    	}
    	else
    	{
    		$sql = "  SELECT * FROM m_urls WHERE formtype='$formtype'";
    	}

    	$db = $this->db;
     	$rs = $db->exceuteQuery($sql);
     	return $rs;
    }

  //分级分类取出相应的url 第2级，带link
    function getCurrUserUrls_Level2($formtype,$comtype)
    {
    	$sql = "  SELECT * FROM m_urls
    	WHERE
    	formtype='$formtype'
    	AND (useright='$comtype' OR useright='2')
    	AND level='2'
    	ORDER BY ID ASC ";
    	$db = $this->db;
     	$rs = $db->exceuteQuery($sql);
     	return $rs;
    }
    //分级分类取出相应的url
    function getCurrUserUrls_Level1($formtype,$level=null)
    {
    	$sql = "SELECT * FROM m_urls WHERE formtype=$formtype";
    	if (!empty($level))
    	{
    		$sql .= " AND level='$level'";
    	}
    	$rs = $this->db->exceuteQuery($sql);
		return $rs;
    }


    //获取指示书类的url
	function getCurrUserUrls_instruct($formtype,$comtype)
    {
    	$sql = null;
    	if($comtype != "1")
    	{
    		$sql = "  SELECT * FROM m_urls WHERE formtype='$formtype' AND (useright='2' OR useright='1')";
    	}
    	else
    	{
    		$sql = "  SELECT * FROM m_urls WHERE formtype='$formtype' AND (useright='2' OR useright='0')";
    	}

    	$db = $this->db;
     	$rs = $db->exceuteQuery($sql);
     	return $rs;
    }
    //取ETA会社的指定权限的所有用户及其代理者
    function getETAAssignRightUsers($right,$right1=null)
    {
    	$etaid = $this->getETACompanyID();
    	/*$this->sql = "
    	SELECT 		u.ID
		FROM 		m_user  u
		WHERE		u.idm_company = '$etaid'
		AND		u.userright = '$right'   AND u.proxyflg= '0'
		UNION  ALL
		SELECT 		u.proxyid
		FROM 		m_user  u
		WHERE		u.idm_company = '$etaid'
		AND		u.userright = '$right'   AND u.proxyflg= '1'
		";
    	$rs = $this->db->exceuteQuery($this->sql);*/
    	$rs = $this->getAssignComRightUsers($right, $etaid, $right1);
    	return $rs;

    }
    /**
     *
     * 取指定会社的指定权限，至多2中权限的所有用户及其对应的代理者
     * @param unknown_type $right
     * @param unknown_type $comid
     * @param unknown_type $right1
     */
    function getAssignComRightUsers($right,$comid,$right1=null)
    {
    	$this->sql = "
    	SELECT DISTINCT * FROM
    	(
    	SELECT 		u.ID
		FROM 		m_user  u
		WHERE		u.idm_company = '$comid'
		AND		(u.userright = '$right'   ";
		if (!empty($right1))
		{
			$this->sql .= " OR u.userright = '$right1'";
		}

		$this->sql .= ")  AND u.proxyflg= '0'
		UNION  ALL
		SELECT 		u.proxyid
		FROM 		m_user  u
		WHERE		u.idm_company = '$comid'
		AND		(u.userright = '$right'   ";

		if (!empty($right1))
		{
			$this->sql .= " OR u.userright = '$right1'";
		}


		$this->sql .= ") AND u.proxyflg= '1'
		)  A
		";
    	$rs = $this->db->exceuteQuery($this->sql);
    	return $rs;
    }



    //取ETA会社的ID
    function getETACompanyID()
    {
    	$this->sql = "SELECT
    				  m.id
    				  FROM m_company m
    				  WHERE m.type='1' AND m.delflag='0'
    	";
    	$rs = $this->db->exceuteQuery($this->sql);
    	return $rs[0][0];

    }
    //取指定用户的权限=我自己的权限+代理人权限
    function getUserRight_All($uid)
    {
    	$this->sql = "
    	SELECT userright FROM m_user WHERE (id='$uid'
    	OR
    	id in (SELECT id FROM m_user WHERE proxyflg='1' AND proxyid='$uid')
    	)
    	";

    	$rsarr = array();
    	$rs = $this->db->exceuteQuery($this->sql);
    	foreach ($rs as $item)
    	{
    		$rsarr[] = $item['userright'];
    	}
    	return $rsarr;

    }

 	/**
     * 取书类的基本信息，头部信息+管理NO+子表ID
     * 当处理结果result不正常（不为0）时
     * //取指定书类子表id的创建者、第2步受领者、第3步受领者
     * @param unknown_type $formtype : 书名
     * @param unknown_type $idt_form_head:子书中idt_form_head字段(可传入idt_form_head 或者ID)
     *
     */
    function getFormInfo($formtable,$idt_form_head)
    {
    	$sql = "SELECT
    			h.creater
    			,h.bacceptperson
    			,h.aacceptperson
    			,h.status
    			,c.ID
    			,c.manageno
    			,c.idm_company
    			FROM
    			".$formtable." c
    			INNER JOIN t_form_head h
    			ON c.idt_form_head = h.id
    			AND (c.idt_form_head='".$idt_form_head."')";

    	$db = $this->db;
        $rs = $db->exceuteQuery($sql);
        return $rs;
    }



    /**
     *  prestatus：NG之前的状态值
		status：NG之后的状态
		idt_form:子表的id
		formtype:书类型
		senderid:NG者
		receiverid：被NG者

     * 当NG，拒绝，却下时，需要记录的数据
     */
    function insertNGRecord($prestatus,$status,$idt_form,$formtype,$senderid,$receiverid)
    {
    	$this->sql = "
    	INSERT INTO t_formbackrecords
    			(prestatus,status,idt_form,formtype,senderid,receiverid,createtime)
    	VALUES
    			('$prestatus','$status','$idt_form','$formtype','$senderid','$receiverid',NOW())
    	";
    	return $this->db->exceuteUpdate($this->sql);
    }
    //更新理由
    function updateNGReason($id,$reason)
    {
    	$updatesql = "UPDATE  t_formbackrecords u  SET  u.reason='$reason' WHERE u.id='$id'";
    	$rs = $this->db->exceuteUpdate($updatesql);
		return $rs;
    }

    function updateToNULL($tablename,$data,$where=null)
	{

		$updatesql = "UPDATE  ".$tablename." u  SET  ";
		$setsql ="";



		//循环生成$keysql 和 $valuesql

		foreach($data as $key => $value)
		{
			$setsql = $setsql."u.".$key."=NULL,";
		}
		//去掉最后一个逗号
		$setsql = substr($setsql,0,strlen($setsql)-1);

		$updatesql = $updatesql.$setsql;
		if (!empty($where))
		{
			$updatesql = $updatesql." WHERE ".$where;
		}


		$rs = $this->db->exceuteUpdate($updatesql);
		return $rs;
	}
	/**
	 *
	 * 发送消息
	 * @param unknown_type $formtype,书类型,0 連絡書;1 指示書; 2 依頼書
	 * @param unknown_type $idt_form_head，头表ID
	 * @param unknown_type $sendStatus：发送状态
	 * @param unknown_type $result：处理结果0，非0
	 * @param unknown_type  $receiverComID:需要查找的会社ID，在承认者之后，是要考虑跨会社,因此这个值，应该放到参数里
	 * @param $currLoginComType:当前登录用户的会社类型
	 * @param unknown_type $preStatus:NG状态有效
	 */
	function sendMessages($formtype,$idt_form_head,$sendStatus,$result,$receiverComID,$currLoginComType,$preStatus=null,$reason=null)
	{
		//----变量初始化---------
		$senderid = $_SESSION['userinfo']['ID'];//发送者为当前用户
		$creater = $_SESSION['userinfo']['ID']; //消息创建者为当前用户
		$editor = $_SESSION['userinfo']['ID'];//消息编辑者为当前用户
		$creattime = date("Y-m-d H:i:s");	//消息创建时间为当前时间
		$edittime = $creattime;//消息编辑时间为当前时间

		//------基础信息-------
		$msgdata = array();
		$msgdata['senderid'] = $senderid;
		$msgdata['creater'] = $creater;
		$msgdata['editor'] = $editor;
		$msgdata['creattime'] = $creattime;
		$msgdata['edittime'] = $edittime;
		//-----------------------

		//设定表名
		$formtable = "";
		if ($formtype == '2')//依赖书,t_depend_form
		{
			$formtable = "t_depend_form";
		}
		else if ($formtype == '1')//指示書,t_instruct_form
		{
			$formtable = "t_instruct_form";
		}
		else//連絡,t_contact_form
		{
			$formtable = "t_contact_form";
		}
		$forminfo = $this->getFormInfo($formtable, $idt_form_head);
		if($result == "0")//正常
		{
			return $this->sendMsgOK($msgdata,$forminfo, $formtype, $idt_form_head, $sendStatus, $result,$receiverComID,$currLoginComType);
		}
		else //异常
		{
			return $this->sendMsgNG($msgdata,$forminfo, $formtype, $idt_form_head, $sendStatus, $result, $receiverComID ,$currLoginComType, $preStatus,$reason);
		}


	}
	//正常处理
	function sendMsgOK($msgdata,$forminfo,$formtype,$idt_form_head,$sendStatus,$result,$receiverComID,$currLoginComType)
	{
		$v = "";
		//根据用户的权限确定接收者
    	if($forminfo[0]['status'] == "0" || $forminfo[0]['status'] == "1" || $forminfo[0]['status'] == "2" || $forminfo[0]['status'] == "5" || $forminfo[0]['status'] == "8")
    	{

    		$data = $this->getAssignComRightUsers('1', $receiverComID,'2');
    	}
    	else if($forminfo[0]['status'] == "3" || $forminfo[0]['status'] == "6" || $forminfo[0]['status'] == "9")
    	{
    		$data = $this->getAssignComRightUsers('2', $receiverComID);
    	}
    	else if($forminfo[0]['status'] == "4" || $forminfo[0]['status'] == "7" || $forminfo[0]['status'] == "10")
    	{
    		$data = $this->getAssignComRightUsers('0', $receiverComID);
    	}

    	if($sendStatus == "4" || $sendStatus == "7" || $sendStatus == "10")
    	{
    		$type = "0";
    	}
    	else
    	{
    		$type = "1";
    	}
    	$receiverid = $data;

		if(empty($receiverid) || count($receiverid) == 0)
		{
			echo "查找不到接收信息用户";
			return;
		}

		$delflag = "0";
		$overflg = "0";
		//循环拼串values((),(),...)
		foreach($receiverid as $key => $value)
		{
			$right = $this->getUserRight_All($receiverid[$key]['ID']);
		 	//根据接收者权限确定下表中的status
	    	if(in_array("1", $right))
			{
				$status = "1";
			}
			else if(in_array("2", $right))
			{
				$status = "2";
			}
			else if(in_array("0", $right))
			{
				$status = "0";
			}

			$v = $v."('".$type.
					"','".$msgdata['creater'].
					"','".$msgdata['editor'].
					"','".$msgdata['creattime'].
					"','".$msgdata['edittime'].
					"','".$forminfo[0]['manageno'].
					"','".$formtype.
					"','".$forminfo[0]['ID'].
					"','".$status.
					"','".$result.
					"','".$delflag.
					"','".$msgdata['senderid'].
					"','".$receiverid[$key]['ID'].
					"','".$overflg.
					"','".$sendStatus.
			"'),";

		}
		//去掉最后一个逗号
		$v = substr($v,0,strlen($v)-1);

		$sql = self::$insertsql;
		$sql = $sql.$v;

        $rs = $this->db->exceuteUpdate($sql);
        return $rs;
	}
	//NG处理
	function sendMsgNG($msgdata,$forminfo,$formtype,$idt_form_head,$sendStatus,$result,$receiverComID,$currLoginComType,$preStatus,$reason=null)
	{

		$v = "";
		if($sendStatus == "5" || $sendStatus == "8")
		{
			$type = "0";
		}
		else
		{
			$type = "1";
		}
		$idt_form = $forminfo[0]['ID'];
		//查询担当者，第2步，第3步受领
		//根据$sendStatus的值确定接收的ID,和status
		if($sendStatus == "3" || $sendStatus == "4" || $sendStatus == "5")
		{
			$receiverid = $forminfo[0]['creater'];
			//向NG表插入NG消息
			$this->insertNGRecord($preStatus, "0", $idt_form, $formtype, $msgdata['senderid'], $receiverid);
			$status = "3";
		}
		else if($sendStatus == "6" || $sendStatus =="7" || $sendStatus == "8")
		{
			$receiverid = $forminfo[0]['bacceptperson'];
			$this->insertNGRecord($preStatus, "5", $idt_form, $formtype, $msgdata['senderid'], $receiverid);
			$status = "0";
		}
		else if($sendStatus == "9" || $sendStatus == "10")
		{
			$receiverid = $forminfo[0]['aacceptperson'];
			$this->insertNGRecord($preStatus, "8", $idt_form, $formtype, $msgdata['senderid'], $receiverid);
			$status = "0";
		}
		//add by lzg
		$ngid = mysql_insert_id();
		$this->updateNGReason($ngid, $reason);
		//add end
		$delflag = "0";
		$overflg = "0";
		$v = $v."('".$type.
					"','".$msgdata['creater'].
					"','".$msgdata['editor'].
					"','".$msgdata['creattime'].
					"','".$msgdata['edittime'].
					"','".$forminfo[0]['manageno'].
					"','".$formtype.
					"','".$forminfo[0]['ID'].
					"','".$status.
					"','".$result.
					"','".$delflag.
					"','".$msgdata['senderid'].
					"','".$receiverid.
					"','".$overflg.
					"','".$sendStatus.
			"')";
		$sql = self::$insertsql;
		$sql = $sql.$v;

        $rs = $this->db->exceuteUpdate($sql);
        return $rs;

	}





	/**
	 * 反写处理标记，正常状态
	 * Enter description here ...
	 */
	function writeBackOverFlg($no,$idt_form,$id_form_head,$formtype,$isUpdateHead=true)
	{
		$updateheaddata = array();
		$status = 0;
		$sendstatus = array();

		switch ($no)
		{
			case '1':
				$sendstatus = array(2,3,4,5);
				$status = 0;
				break;
			case '4':
				$sendstatus = array(2,3);
				$status = 3;
				break;
			case '5':
				$sendstatus = array(2,3,4);
				$status = 4;
				break;
			case '6':
				$sendstatus = array(4,5,6,7,8);
				$status = 5;
				break;
			case '7':
				$sendstatus = array(5,6);
				$status = 6;
				break;
			case '8':
				$sendstatus = array(5,6,7);
				$status = 7;
				break;
			case '9'://这个时候，可能是11，指示书和连络书
				if ($formtype == "2")
				{
					$sendstatus = array(6,7,8,9,10);
					$status = 8;
				}
				else
				{
					$sendstatus = array(7,8);
					$status = 11;
				}
				break;
			case '10':
				$sendstatus = array(8,9);
				$status = 9;
				break;
			case '11':
				$sendstatus = array(8,9,10);
				$status = 10;
				break;
			case '12':
				$sendstatus = array(10);
				$status = 11;
				break;
		}
		if ($isUpdateHead)
		{
			$updateheaddata = array("status"=>$status);
			//更新书类状态
			$this->Update("t_form_head", $updateheaddata, "u.ID='$id_form_head'");
		}
		$sql = "
	    		UPDATE  t_message  msg
				SET msg.overflg='1'
				WHERE ";
		$wheresend = "(";
		$wheresend .= "msg.sendstatus = '$sendstatus[0]'";


		for ($i=1; $i < count($sendstatus); $i++)//将所有的状态拼写为字符串
		{
			$currsendstatus = $sendstatus[$i];
			$wheresend .= " OR ";
			$wheresend .= "msg.sendstatus = '$currsendstatus'";
		}
		$wheresend .= ")";
		$sql .= $wheresend;
		$sql .=	"	AND msg.overflg='0'
				AND msg.idt_form='$idt_form'
				AND msg.formtype='$formtype'

	    	";



        $rs = $this->db->exceuteUpdate($sql);
        return $rs;
	}
	/**
	 * 反写处理标记，NG状态
	 * Enter description here ...
	 */
	function writeBackOverFlgNg($no,$idt_form,$sessinUserID,$sessionComID,$formtype)
	{
		$sql = null;
	    $v = null;

	    $reciever = $this->getAssignComRightUsers('1', $sessionComID,'2');
		$v .= "(";
		foreach($reciever as $key => $value)
		{
			$v .= "msg.receiverid='".$reciever[$key]['ID']."'";
			$v .= " OR ";
		}
		//$v = substr($v,0,strlen($v)-3);
		$v .= "  msg.receiverid='".$sessinUserID."'";
		$v .= ")";


    	if($no == "1")
    	{

    		$sql = "
    		UPDATE 	t_message  msg
			SET  msg.overflg='1'
			WHERE ".$v."
			AND (msg.sendstatus = '2'  OR msg.sendstatus = '3' OR msg.sendstatus = '4' )
			AND msg.idt_form='".$idt_form."'
			AND msg.formtype='$formtype'
			AND msg.overflg='0'
    		";

    	}
    	else if($no == "2")
    	{

    		$sql = "
    		UPDATE 	t_message  msg
			SET  msg.overflg='1'
			WHERE ".$v."
			AND (msg.sendstatus = '4'  OR msg.sendstatus = '5' OR msg.sendstatus = '6' )
			AND msg.idt_form='".$idt_form."'
			AND msg.formtype='$formtype'
			AND msg.overflg='0'
    		";


    	}
    	else if($no == "3")
    	{

    		$sql = "
    		UPDATE 	t_message  msg
			SET  msg.overflg='1'
			WHERE ".$v."
			AND (msg.sendstatus = '7'  OR msg.sendstatus = '8' OR msg.sendstatus = '9' )
			AND msg.idt_form='".$idt_form."'
			AND msg.formtype='$formtype'
			AND msg.overflg='0'";
    	}




        $rs = $this->db->exceuteUpdate($sql);
        return $rs;
	}

	/**
	 * 查找指定用户(一般为当前登陆者)指定书类型的的所有书
	 * @param unknown_type $uid：用户ID
	 * @param unknown_type $formtype:书类型,0 連絡書;1 指示書; 2 依頼書
	 */
	function searchFormListByUId($uid,$formtype,$idm_urls=null)
	{
		//设定表名
		$formtable = "";
		$idmwher = "";
		if ($formtype == '2')//依赖书,t_depend_form
		{
			$formtable = "t_depend_form";
		}
		else if ($formtype == '1')//指示書,t_instruct_form
		{
			$formtable = "t_instruct_form";
			if (!empty($idm_urls))
			{
				$idmwher = "   AND  m.idm_urls = '$idm_urls'";
			}
		}
		else//連絡,t_contact_form
		{
			$formtable = "t_contact_form";

		}

		$this->sql = "
		SELECT DISTINCT *
		FROM
		(
		SELECT
	    		m.*
				,  h.bacceptperson
				,  h.aacceptperson
				,  h.status
				,  h.creater
				,  h.creattime
				,  h.bconfirmperson
				,  h.bconfirmresult
				,  h.badmitperson
				,  h.badmitresult
				,  h.aconfirmperson
				,  h.aconfirmresult
				,  h.aadmitperson
				,  h.aadmitresult
				,  msg.creattime msgcreattime
				,  msg.result
				,  msg.receiverid
				FROM $formtable m
				INNER JOIN 	t_form_head  h
				ON  h.id = m.idt_form_head
				INNER JOIN  t_message  msg
				ON 	msg.overflg = '0'
				AND  msg.formtype='$formtype'
				AND  msg.receiverid ='$uid'
				AND msg.idt_form = m.id
				WHERE 1=1
				$idmwher


				ORDER  BY  msg.creattime  DESC,	status  ASC

		)rstab

		";

		$rs1 = $this->db->exceuteQuery($this->sql);

		$sql2 = "
		SELECT
				m.*
				,  h.bacceptperson
				,  h.aacceptperson
				,  h.bconfirmperson
				,  h.bconfirmresult
				,  h.badmitperson
				,  h.badmitresult
				,  h.aconfirmperson
				,  h.aconfirmresult
				,  h.aadmitperson
				,  h.aadmitresult
				,  h.status
				,  h.creater
				,  h.creattime
				,  h.creattime  msgcreattime
				,  0 result
				,  msg.receiverid

				FROM  $formtable m
				INNER JOIN 	t_form_head  h
				ON 	h.id = m.idt_form_head
				LEFT JOIN t_message msg ON msg.idt_form=m.ID AND msg.receiverid='$uid' AND msg.overflg='0' AND msg.formtype='$formtype'
				WHERE
				((h.creater  = '$uid' AND (h.status = '0'  OR h.status = '1' OR  h.status = '2'))
				OR
				(h.bacceptperson = '$uid' AND h.status = '5')
				OR
				(h.aacceptperson = '$uid' AND h.status = '8')
				)
				$idmwher
				ORDER  BY  creattime  DESC,	status  ASC

		";

		$rs2 = $this->db->exceuteQuery($sql2);

		$records = count($rs2);//先处理别人的，在处理自己的

		for ($i = 0; $i < $records; $i++)
		{
			if (!BaseBusiness::in_array_bykey($rs1, $rs2[$i], 'manageno'))
			{
				$rs1[] = $rs2[$i];
			}
		}
		return $rs1;
	}


	//判断管理No重复插入问题
	function IsMangenoExist($formtype,$manageno)
	{
		$tablename = "";
    	if ($formtype == "2")
    	{
    		$tablename = "t_depend_form";

    	}
    	else if ($formtype == "1")
    	{
    		$tablename = "t_instruct_form";
    	}
    	else
    	{
    		$tablename =  "t_contact_form";
    	}
    	$this->sql = "
    	SELECT * FROM $tablename   A
    	WHERE  A.manageno='$manageno'
    	";
    	$rs = $this->db->exceuteQuery($this->sql );
    	if (count($rs) > 0)
    	{
    		return true;
    	}
    	else
    	{
    		return false;
    	}
	}

	function getHeadTabInfo($idt_form,$formtype)
	{
		$tablename = "";
    	if ($formtype == "2")
    	{
    		$tablename = "t_depend_form";

    	}
    	else if ($formtype == "1")
    	{
    		$tablename = "t_instruct_form";
    	}
    	else
    	{
    		$tablename =  "t_contact_form";
    	}
		$this->sql = "
		SELECT head.*
		,CONCAT(u1.username1,u1.username2) creatername
		,CONCAT(u2.username1,u2.username2) editorname
		,CONCAT(u3.username1,u3.username2) affirmantpersonname
		,CONCAT(u4.username1,u4.username2) approvepersonname
		,CONCAT(u5.username1,u5.username2) bacceptpersonname
		,CONCAT(u6.username1,u6.username2) bconfirmpersonname
		,CONCAT(u7.username1,u7.username2) badmitpersonname
		,CONCAT(u8.username1,u8.username2) aacceptpersonname
		,CONCAT(u9.username1,u9.username2) aconfirmpersonname
		,CONCAT(u10.username1,u10.username2) aadmitpersonname
		,CONCAT(u11.username1,u11.username2) endpersonname
		FROM t_form_head head
		INNER JOIN $tablename  form ON form.idt_form_head = head.ID AND form.ID = '$idt_form'
		LEFT JOIN m_user u1 ON head.creater = u1.ID
		LEFT JOIN m_user u2 ON head.editor = u2.ID
		LEFT JOIN m_user u3 ON head.affirmantperson = u3.ID
		LEFT JOIN m_user u4 ON head.approveperson = u4.ID
		LEFT JOIN m_user u5 ON head.bacceptperson = u5.ID
		LEFT JOIN m_user u6 ON head.bconfirmperson = u6.ID
		LEFT JOIN m_user u7 ON head.badmitperson = u7.ID
		LEFT JOIN m_user u8 ON head.aacceptperson = u8.ID
		LEFT JOIN m_user u9 ON head.aconfirmperson = u9.ID
		LEFT JOIN m_user u10 ON head.aadmitperson = u10.ID
		LEFT JOIN m_user u11 ON head.endperson = u11.ID

		";
	}


	static function in_array_bykey($arr1,$item1,$key)
	{
		foreach ($arr1 as $sitem)
		{
			if ($sitem[$key] == $item1[$key])
			{
				return true;
			}
		}
		return false;
	}



}
?>