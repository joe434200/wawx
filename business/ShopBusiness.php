<?php 
require_once('BaseBusiness.php');
require_once('DateUtil.php');
require_once('SupportException.php');
require_once('PageSplitBusiness.php');

class ShopBusiness extends PageSplitBusiness{
	private $totalRows;
	private $isTotalRows = false;
	//获得店家相册
	function getAshopPics($id){
		$this->sql = "
			SELECT 
				* 
			FROM 
				t_goods_pic
			WHERE  
				idt_goods=".$id." AND 
				pictype=1 
			";
		$rs = $this->db->exceuteQuery($this->sql);
		return $rs;
	}
	//获得店家的信息
	function getAshopInfo($id){
		$this->sql = "
			SELECT 
				mc.ID AS mID,
				mc.`name` AS `name`,
				ts.ID,
				ts.shopname,
				ts.shoppicture,
				ts.telephone,
				ts.address,
				tu.issignshop,
				tu.isrecommendshop,
				tu.iscertificationshop,
				ts.schooldiscount,
				ts.summary,
				ts.mapurl
			FROM 
				t_user tu,t_shopinfo ts LEFT JOIN 
					m_shop_classfy mc 
				ON mc.ID=ts.bigtypeid
			WHERE 
				ts.ID=".$id." AND
				tu.ID=ts.idt_user ";
		$rs = $this->db->exceuteQuery($this->sql);
		return $rs[0];
	}
	
	//获得店家的商品信息
	function getShopGoodsInfo($id,$currpage1,$numbersperpage1){
		$this->sql = "
			SELECT 
				* 
			FROM 
				t_goods 
			WHERE  
				shopid=".$id." AND 
				isdelete=0 AND 
				isonsale=0
			";
		//计算总条数
		$sqlcount1 ="
					SELECT 
						count(1)
					FROM 
						t_goods 
					WHERE  
						shopid=".$id." AND 
						isdelete=0 AND 
						isonsale=0
				";
		//查询总条数	
		if (!$this->isTotalRows){
			    $this->setTotalRow($this->buildTotalRow($sqlcount1)); 
				$this->isTotalRows = true;
		}   
		$rs = $this->QueryForPageSplit($this->sql, $currpage1, $numbersperpage1);
		return $rs;
	}
	
	//获得店家总体评价之好评、服务、口味、环境、性价比
	function getCommet1($id){
		$this->sql = "
			SELECT
				tsc1.idt_shopinfo,
				ROUND((COUNT(tsc2.idt_shopinfo)/COUNT(tsc1.idt_shopinfo))*100,2) AS cnum,
				ROUND(SUM(tsc1.service)/COUNT(tsc1.idt_shopinfo),2) AS service,
				ROUND(SUM(tsc1.taste)/COUNT(tsc1.idt_shopinfo),2) AS taste,
				ROUND(SUM(tsc1.environment)/COUNT(tsc1.idt_shopinfo),2) AS environment,
				ROUND(SUM(tsc1.costperformance)/COUNT(tsc1.idt_shopinfo),2) AS costperformance
			FROM
				t_shop_comment tsc1,t_shop_comment tsc2 
				
			WHERE
				tsc1.idt_shopinfo=".$id." AND 
				tsc2.idt_shopinfo=".$id." AND
				tsc2.commentrank=2 AND 
				tsc1.isshow=1 AND
				tsc2.isshow=1
			GROUP BY
				tsc1.idt_shopinfo		
		";
		$rs = $this->db->exceuteQuery($this->sql);
		return $rs[0];
	}
	/*//获得店家的好评数
	function getGoodComNum($id){
		$this->sql = "
			SELECT
				idt_shopinfo,
				COUNT(idt_shopinfo) AS goodnum
			FROM
				t_shop_comment 
			WHERE
				idt_shopinfo=".$id." AND
				commentrank=2 AND 
				isshow=1
			GROUP BY
				idt_shopinfo		
		";
		$rs = $this->db->exceuteQuery($this->sql);
		return $rs[0];
	}*/
	//获得店家的评价详情
	function getShopComment($id,$currpage,$numbersperpage){
		$sqlcount="";
		$this->sql = "
			SELECT
				tsc.content,
				ts.shopname,
				tu.nickname,
				tu.`level`,
				date_format(tsc.commenttime,'%Y-%m-%d') AS commenttime
			FROM
					t_shop_comment tsc,
					t_shopinfo ts,
					t_user tu
			WHERE
				ts.ID=".$id." AND
				tsc.idt_shopinfo=ts.ID AND
				tsc.isshow=1 AND
				tu.ID=tsc.idt_user 
			ORDER BY
				tsc.commenttime DESC		
		";
		//计算总条数
		$sqlcount ="
					SELECT 
						count(1)
					FROM 
						t_shop_comment tsc,
						t_shopinfo ts,
						t_user tu
					WHERE
						ts.ID=".$id." AND
						tsc.idt_shopinfo=ts.ID AND
						tsc.isshow=1 AND
						tu.ID=tsc.idt_user
			";
		//查询总条数	
		if (!$this->isTotalRows){
			    $this->setTotalRow($this->buildTotalRow($sqlcount)); 
				$this->isTotalRows = true;
		}   
		$rs = $this->QueryForPageSplit($this->sql, $currpage, $numbersperpage);
		return $rs;
	}
	//关注商家的用户
	function getUserFocusShop($id){
		$this->sql = "
			SELECT
				DISTINCT tu.ID,
				tu.photo,
				tu.`level`
			FROM
				t_shop_focus tsf,
				t_user tu
			WHERE
				tsf.idt_shopinfo=".$id." AND
				tu.ID=tsf.idt_user
			ORDER BY
				tu.`level` DESC
		 ";
		$rs = $this->db->exceuteQuery($this->sql);
		return $rs;
	}
	//判断一个用户是否评价过该店铺
	function isUserComShop($userid,$shopid){
		$this->sql = "
  	  		SELECT 
				ID
			FROM
				t_shop_comment
			WHERE
				idt_user=".$userid." AND
				idt_shopinfo=".$shopid
		 	;
		$rs = $this->db->exceuteQuery($this->sql);
		return $rs;		
	}		
}