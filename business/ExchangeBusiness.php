<?php
require_once('BaseBusiness.php');
require_once('DateUtil.php');
require_once('SupportException.php');
require_once('PageSplitBusiness.php');
class ExchangeBusiness extends PageSplitBusiness{
	private $totalRows;
	private $isTotalRows = false;
	
	//获得用户登录信息
	function getUserInfo($id){	
		$this->sql = "
			SELECT 
				tu.ID,
				tu.photo,
				tu.nickname,
				(CASE WHEN tu.adminflg=0 THEN '普通会员' ELSE '管理员' END) AS role,
				tu.`level`,
				tu.onlinetime,
				date_format(tu.lastlogintime,'%Y-%m-%d') AS lltime,
				tu.coins,
				SUM(tft.ID) AS tnum
		 	FROM
		 		t_user tu LEFT JOIN t_forum_topic tft  on  (tft.creater=tu.ID AND tft.shieldflg=0)
		 	WHERE 
		 		tu.ID='".$id."' 
			GROUP BY
				tu.ID";
		$rs = $this->db->exceuteQuery($this->sql);
		return $rs[0];
	}
	//获取特惠广告商品
	function getOddsGoods()
	{
		$this->sql = "
					SELECT 
						id,goodsname,newimg,exchangemoney
		 			FROM 
		 				t_goods 
		 			WHERE
		 				isdelete=0 AND
		 				isadvertgoods=1 
						LIMIT 3";
		$rs = $this->db->exceuteQuery($this->sql);
		return $rs;
	}
	//获取兑换商品
	//$currpage当前页码
	//$numbersperpage每页显示的数目
	function getExchangeGoods($exbetw,$currpage,$numbersperpage)
	{
		$sqlcount="";
		$this->sql = "
        		SELECT 
					id,
					marketprice,
					goodsbrief,
					newimg,
					exchangemoney
				FROM
					t_goods
				WHERE
					isexchange=1 AND
					isonsale=0 ";
			//获取1-200校币的兑换商品
			if($exbetw=='1to200'){
				$this->sql = $this->sql." AND  exchangemoney BETWEEN 1 AND 200 ";
			}
			//获取200-400校币的兑换商品
			elseif($exbetw=='200to400'){
				$this->sql = $this->sql." AND  exchangemoney BETWEEN 200 AND 400 ";
			}
			//获取400-800校币的兑换商品
			elseif($exbetw=='400to800'){
				$this->sql = $this->sql." AND  exchangemoney BETWEEN 400 AND 800 ";
			}
			//获取800-1000校币的兑换商品
			elseif($exbetw=='800to1000'){
				$this->sql = $this->sql." AND  exchangemoney BETWEEN 800 AND 1000 ";
			}						
			$this->sql = $this->sql."	ORDER BY exchangemoney ";
		
			//计算总条数
			$sqlcount = "SELECT 
							count(1)
						FROM 
							t_goods
						WHERE
							isexchange=1 AND
							isonsale=0 ";		
			//获取1-200校币的兑换商品
			if($exbetw=='1to200'){
				$sqlcount = $sqlcount." AND  exchangemoney BETWEEN 1 AND 200 ";
			}
			//获取200-400校币的兑换商品
			elseif($exbetw=='200to400'){
				$sqlcount = $sqlcount." AND  exchangemoney BETWEEN 200 AND 400 ";
			}
			//获取400-800校币的兑换商品
			elseif($exbetw=='400to800'){
				$sqlcount = $sqlcount." AND  exchangemoney BETWEEN 400 AND 800 ";
			}
			//获取800-1000校币的兑换商品
			elseif($exbetw=='800to1000'){
				$sqlcount = $sqlcount." AND  exchangemoney BETWEEN 800 AND 1000 ";
			}								
			//查询总条数	
			if (!$this->isTotalRows){
			    $this->setTotalRow($this->buildTotalRow($sqlcount)); 
				$this->isTotalRows = true;
			}   
			$rs = $this->QueryForPageSplit($this->sql, $currpage, $numbersperpage);
		return $rs;
	}
	//获取公告信息
	function getNotice()
	{
		$this->sql = "
			SELECT 
				id,
				title 
			FROM 
				t_notice 
			WHERE 
				type=1 
			ORDER BY 
				endtime DESC ";
		$rs = $this->db->exceuteQuery($this->sql);
		return $rs;
	}
	//获取抽奖信息
	function getLotteryRecord()
	{
		$this->sql = "
        		SELECT 
					ELT(rank,'一','二','三','四') AS rank,
					goodname,
					username,
					HOUR(SEC_TO_TIME(TIMESTAMPDIFF(SECOND,recordtime,NOW()))) AS `hour`,
					MINUTE(SEC_TO_TIME(TIMESTAMPDIFF(SECOND,recordtime,NOW()))) AS `minute`
				FROM
					t_lottery_record
				ORDER BY
					recordtime DESC		
			";
		$rs = $this->db->exceuteQuery($this->sql);
		return $rs;
	}
	//获取校币兑换排行信息
	function getExchangeRecord()
	{
		$this->sql = "
        		SELECT 
					tg.id AS id,
					tg.goodsbrief AS brief,
					tg.newimg AS newimg,
					tg.exchangemoney AS exmoney,
					SUM(ter.exchangenum) AS exnum
				FROM
					t_goods tg left join t_exchange_record ter
				on 
					(DATE_SUB(CURDATE(), INTERVAL 1 MONTH)<=date(ter.exchangetime) AND
					tg.ID = ter.idt_goods)
				WHERE
					tg.isexchange=1 AND
					tg.isdelete=0 AND
					tg.isonsale=0
				GROUP BY
					id 
				ORDER BY
					exnum DESC LIMIT 5	
			";
		$rs = $this->db->exceuteQuery($this->sql);
		return $rs;
	}		
}

?>