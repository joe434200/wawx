<?php
require_once('BaseBusiness.php');
require_once('DateUtil.php');
require_once('SupportException.php');
require_once('PageSplitBusiness.php');

class MoreBusiness extends PageSplitBusiness{
	private $totalRows;
	private $isTotalRows = false;
	//获取更多今日推荐商家
	//$currpage当前页码
	//$numbersperpage每页显示的数目
	function getMoreTodatRecommendShop($currpage,$numbersperpage){
		$this->sql = "
			SELECT 
				ts.id,
				ts.shoppicture,
				ts.shopname,
				ts.discount 
			FROM 
				t_shopinfo ts,t_user tu
		 	WHERE  
		 		ts.isdelete=0 AND 
		 		tu.isrecommend=1 AND
		 		ts.idt_user=tu.ID AND 
		 		ts.verifystate=2 
		 	ORDER BY 
		 		tu.recommendtime DESC ";
		//计算总条数
		$sqlcount = "SELECT 
						count(1)
					FROM 
						t_shopinfo ts,t_user tu
		 			WHERE  
			 			ts.isdelete=0 AND 
		 				tu.isrecommend=1 AND
		 				ts.idt_user=tu.ID AND 
		 				ts.verifystate=2  ";
		//查询总条数	
		if (!$this->isTotalRows){
			    $this->setTotalRow($this->buildTotalRow($sqlcount)); 
				$this->isTotalRows = true;
		}   
		$rs = $this->QueryForPageSplit($this->sql, $currpage, $numbersperpage);
		return $rs;
	}
	//获取更多热点商家
	function getMoreHotShop($currpage,$numbersperpage){
		$this->sql = "
			SELECT 
				ts.id,
				ts.shoppicture,
				ts.shopname,
				ts.discount 
			FROM 
				t_shopinfo ts,t_user tu
		 	WHERE  
		 		ts.isdelete=0 AND 
		 		tu.ishot=1 AND 
		 		ts.idt_user=tu.ID AND
		 		ts.verifystate=2 
		 	ORDER BY 
		 		focusnum DESC ";
		//计算总条数
		$sqlcount = "SELECT 
						count(1)
					 FROM 
						t_shopinfo ts,t_user tu
		 			 WHERE  
				 		ts.isdelete=0 AND 
		 				tu.ishot=1 AND 
		 				ts.idt_user=tu.ID AND
		 				ts.verifystate=2 ";
		//查询总条数	
		if (!$this->isTotalRows){
			    $this->setTotalRow($this->buildTotalRow($sqlcount)); 
				$this->isTotalRows = true;
		}   
		$rs = $this->QueryForPageSplit($this->sql, $currpage, $numbersperpage);
		return $rs;
	}
	//获取更多的品牌商家
	function getMoreBrandShop($currpage,$numbersperpage){
		$this->sql = "
			SELECT 
				ts.id,
				ts.shoppicture,
				ts.shopname,
				ts.discount 
			FROM 
				t_shopinfo ts,t_user tu
		 	WHERE  
		 		ts.isdelete=0 AND 
		 		tu.isbrand=1 AND 
		 		ts.idt_user=tu.ID AND
		 		ts.verifystate=2 
		 	ORDER BY 
		 		focusnum DESC ";
		//计算总条数
		$sqlcount = "SELECT 
						count(1)
					 FROM 		
						t_shopinfo ts,t_user tu
		 			WHERE  
				 		ts.isdelete=0 AND 
		 				tu.isbrand=1 AND 
		 				ts.idt_user=tu.ID AND
		 				ts.verifystate=2 ";
		//查询总条数	
		if (!$this->isTotalRows){
			    $this->setTotalRow($this->buildTotalRow($sqlcount)); 
				$this->isTotalRows = true;
		}   
		$rs = $this->QueryForPageSplit($this->sql, $currpage, $numbersperpage);
		return $rs;		
	}
	//获取校边生活首页更多的推荐商家
	function getMoreRecommendShop($currpage, $numbersperpage){
		$this->sql = "
			SELECT 
				ts.id,
				ts.shoppicture,
				ts.shopname,
				ts.discount 
			FROM 
				t_shopinfo ts,t_user tu
		 	WHERE  
		 		ts.isdelete=0 AND 
		 		tu.isrecommendshop=1 AND 
		 		ts.idt_user=tu.ID AND
		 		ts.verifystate=2 
		 	ORDER BY
		 		focusnum DESC ";
		//计算总条数
		$sqlcount = "SELECT 
						count(1)
					 FROM 	
						t_shopinfo ts,t_user tu
				 	WHERE  
				 		ts.isdelete=0 AND 
		 				tu.isrecommendshop=1 AND 
		 				ts.idt_user=tu.ID AND
		 				ts.verifystate=2 ";	
		//查询总条数	
		if (!$this->isTotalRows){
			    $this->setTotalRow($this->buildTotalRow($sqlcount)); 
				$this->isTotalRows = true;
		}   
		$rs = $this->QueryForPageSplit($this->sql, $currpage, $numbersperpage);
		return $rs;		
	}
	//获得学生惠更多团购商品
	function getMoreVolumeGoods($currpage, $numbersperpage){
		$this->sql = "
				SELECT 
					tg.ID AS id,
					tg.marketprice AS mkp,
					tg.goodsbrief AS gbf,
					tg.newimg AS newing,
					tg.volumediscount AS vdisc,
					FLOOR(tg.volumeprice) AS vopricen,
					RIGHT(tg.volumeprice,2) AS vopricem,
					COUNT(tor.idt_goods)  AS grnum  
				FROM
					t_goods tg 
					left join (t_order_info ti,t_order_record tor)  
					on( tor.idt_goods=tg.ID AND 
					tor.shoppingtype=2 AND 
					ti.ID=tor.idt_order_info AND
					ti.paystatus=2  )
				WHERE
					tg.isgroup=1 AND
					tg.isonsale=0 AND
					tg.goodstype=0 AND
					(NOW() BETWEEN tg.groupstarttime AND tg.groupexpiretime
					OR NOW()<tg.groupstarttime) 
				GROUP BY
					id 
				ORDER BY
					grnum DESC ";
		//计算总条数
		$sqlcount = "SELECT 
						count(1)
					FROM
						t_goods tg 
					WHERE
						tg.isgroup=1 AND
						tg.isonsale=0 AND
						tg.goodstype=0 AND
						(NOW() BETWEEN tg.groupstarttime AND tg.groupexpiretime
						OR NOW()<tg.groupstarttime)  ";
		//查询总条数	
		if (!$this->isTotalRows){
			    $this->setTotalRow($this->buildTotalRow($sqlcount)); 
				$this->isTotalRows = true;
		}   
		$rs = $this->QueryForPageSplit($this->sql, $currpage, $numbersperpage);
		return $rs;		
	}
	//获得学生惠更多特色商品
	function getMoreSpecialGoods($currpage, $numbersperpage){
		$this->sql = "
				SELECT 
					tg.ID AS id,
					tg.marketprice AS mkp,
					tg.goodsbrief AS gbf,
					tg.newimg AS newing,
					tg.userdiscount AS udisc,
					FLOOR(tg.userprice) AS vopricen,
					RIGHT(tg.userprice,2) AS vopricem,
					(CASE WHEN sum(tor.shopnum) IS NULL THEN 0 ELSE sum(tor.shopnum) END) AS mnum 
				FROM
					t_goods tg  left join (t_order_info ti,t_order_record tor)  
					on(DATE_SUB(CURDATE(), INTERVAL 1 MONTH)<=date(ti.addtime) AND 
					tor.shoppingtype=1 AND 
					ti.ID=tor.idt_order_info AND
					tor.idt_goods=tg.ID AND  
					ti.paystatus=2 )
				WHERE
					tg.isspecial=1 AND
					tg.goodstype=0 AND
					tg.isonsale=0 AND
					tg.isdelete=0  
				GROUP BY 
					tg.ID
				ORDER BY
					mnum DESC ";
		//计算总条数
		$sqlcount = "SELECT 
						count(1)
					FROM
						t_goods tg
					WHERE
						tg.isspecial=1 AND
						tg.isonsale=0 AND
						tg.goodstype=0 AND
						tg.isdelete=0 "; 
		//查询总条数	
		if (!$this->isTotalRows){
			    $this->setTotalRow($this->buildTotalRow($sqlcount)); 
				$this->isTotalRows = true;
		}   
		$rs = $this->QueryForPageSplit($this->sql, $currpage, $numbersperpage);
		return $rs;	
	}	
		
}


?>