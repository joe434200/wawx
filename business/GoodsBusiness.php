<?php 
require_once('BaseBusiness.php');
require_once('DateUtil.php');
require_once('SupportException.php');
require_once('PageSplitBusiness.php');

class GoodsBusiness extends PageSplitBusiness{
	private $totalRows;
	private $isTotalRows = false;
	private $isTotalRows1 = false;
	private $isTotalRows2 = false;
	//获得商品的信息
	function getAgoodsInfo($id){
		$this->sql = "SELECT * FROM t_goods WHERE ID=".$id;
		$rs = $this->db->exceuteQuery($this->sql);
		return $rs[0];
	}
	//获得支付方式
	function getPayment(){
		$this->sql = "SELECT * FROM m_payment";
		$rs = $this->db->exceuteQuery($this->sql);
		return $rs;
	}
	//获得商品所在的商家名字
	function getShopname($id){
		$this->sql = "
			SELECT 
				mc.ID AS mID,
				ts.ID AS shopid,
				(CASE WHEN mc.`name` IS NULL THEN '校边生活' ELSE mc.`name` END) AS mname,
				(CASE WHEN ts.shopname IS NULL THEN '学生惠' ELSE ts.shopname END) AS shopname
		 	FROM
		 		t_goods tg LEFT JOIN (t_shopinfo ts LEFT JOIN  m_shop_classfy mc ON mc.ID=ts.bigtypeid) ON ts.ID=tg.shopid 
		 	WHERE 
		 		tg.ID=".$id;
		$rs = $this->db->exceuteQuery($this->sql);
		return $rs[0];
	}
	
	//获得商品的相册
	function getAgoodsPics($id){
		$this->sql = "SELECT * FROM t_goods_pic
		 WHERE  idt_goods=".$id." AND pictype=0 ";
		$rs = $this->db->exceuteQuery($this->sql);
		return $rs;
	}
	//获得购买此商品的用户
	function getGoodsUsers($id){
		$this->sql = "
			SELECT 
				DISTINCT tu.nickname,
				tu.ID,
				tu.photo
			FROM
				t_order_info ti,
				t_order_record tor,
				t_user tu
			WHERE
				tor.idt_goods=".$id." AND
				ti.ID=tor.idt_order_info AND
				ti.paystatus=2 AND
				ti.idt_user=tu.ID 
			ORDER BY
				tu.`level` DESC
			";
		$rs = $this->db->exceuteQuery($this->sql);
		return $rs;
	}		
	//获得商品的评论信息
	function getGoodsComment($id,$currpage,$numbersperpage){
		$this->sql = "
			SELECT
				tgc.content,
				tg.goodsname,
				tu.nickname,
				tu.`level`,
				date_format(tgc.commenttime,'%Y-%m-%d') AS commenttime
			FROM
					t_goods_comment tgc,
					t_goods tg,
					t_user tu
			WHERE
				tg.ID=".$id." AND
				tgc.idt_goods=tg.ID AND
				tgc.isshow=1 AND
				tu.ID=tgc.idt_user 
			ORDER BY
				tgc.commenttime DESC
			";
		//计算总条数
		$sqlcount ="
					SELECT 
						count(1)
					FROM 
						t_goods_comment tgc,
						t_goods tg,
						t_user tu
					WHERE
						tg.ID=".$id." AND
						tgc.idt_goods=tg.ID AND
						tgc.isshow=1 AND
						tu.ID=tgc.idt_user";	 
		//查询总条数	
		if (!$this->isTotalRows1){
			    $this->setTotalRow($this->buildTotalRow($sqlcount)); 
				$this->isTotalRows1 = true;
		}   
		$rs = $this->QueryForPageSplit($this->sql, $currpage, $numbersperpage);
		return $rs;
	}
	//获得商品的成交件数
	function getMkSum($id){
		$this->sql = "
			SELECT 
				sum(tor.shopnum) mksum
			FROM
				t_order_info ti,
				t_order_record tor
			WHERE
				tor.idt_goods=".$id." AND
				ti.ID=tor.idt_order_info AND
				ti.paystatus=2  
			GROUP BY
				tor.idt_goods
			";
		$rs = $this->db->exceuteQuery($this->sql);
		return $rs[0];
	}
	//获得商品的成交记录
	function getMkRecord($id,$currpage1,$numbersperpage1){
		$this->sql = "
			SELECT 
				tu.nickname,
				tu.ID,
				tor.goodsname,
				tu.`level`,
				tor.shopnum,
				date_format(ti.addtime,'%Y-%m-%d') AS createtime
			FROM
				t_order_info ti,
				t_order_record tor,
				t_user tu
			WHERE
				tor.idt_goods=".$id." AND
				ti.ID=tor.idt_order_info AND
				ti.paystatus=2 AND
				ti.idt_user=tu.ID 
			ORDER BY
				createtime DESC
			";
		//计算总条数
		$sqlcount1 ="
					SELECT 
						count(1)
					FROM 
						t_order_info ti,
						t_order_record tor,
						t_user tu
					WHERE
						tor.idt_goods=".$id." AND
						ti.ID=tor.idt_order_info AND
						ti.paystatus=2 AND
						ti.idt_user=tu.ID";
			//查询总条数	
		if (!$this->isTotalRows2){
			    $this->setTotalRow($this->buildTotalRow($sqlcount1)); 
				$this->isTotalRows2 = true;
		}   
		$rs = $this->QueryForPageSplit($this->sql, $currpage1, $numbersperpage1);
		return $rs;
	}	
	//获得商品的兑换记录
	function getExRecord($id,$currpage1, $numbersperpage1){
		$this->sql = "
			SELECT 
				tu.nickname,
				tu.ID,
				ter.goodsname,
				tu.`level`,
				ter.exchangenum,
				date_format(ter.exchangetime,'%Y-%m-%d') AS exchangetime
			FROM
				t_exchange_record ter,
				t_user tu
			WHERE
				ter.idt_goods=".$id." AND
				tu.ID=ter.idt_user 
			ORDER BY
				exchangetime DESC
			";
		//计算总条数
		$sqlcount1 ="
					SELECT 
						count(1)
					FROM 
						t_exchange_record ter,
						t_user tu
					WHERE
						ter.idt_goods=".$id." AND
						tu.ID=ter.idt_user ";
		//查询总条数	
		if (!$this->isTotalRows){
			    $this->setTotalRow($this->buildTotalRow($sqlcount1)); 
				$this->isTotalRows = true;
		}   
		$rs = $this->QueryForPageSplit($this->sql, $currpage1, $numbersperpage1);
		return $rs;
	}	
	//获得用户的可用校币
	function getUserCoins($id){
		$this->sql = "select coins from t_user where ID='".$id."'";
		$rs = $this->db->exceuteQuery($this->sql);
		return $rs[0];
	}	
	//获得商品兑换记录个数
	function getExrnum($id){
		$this->sql = "
   			SELECT 
				count(*) AS exrnum
			FROM 
				t_exchange_record
			WHERE  
				idt_goods=".$id."
			GROUP BY
				idt_goods
		 	";
		$rs = $this->db->exceuteQuery($this->sql);
		return $rs[0];
	}
	//获得兑换此商品的用户
	function getExGoodsUsers($id){
		$this->sql = "
			SELECT 
				DISTINCT tu.nickname,
				tu.ID,
				tu.photo
			FROM
				t_exchange_record ter,
				t_user tu
			WHERE
				ter.idt_goods=".$id." AND
				ter.idt_user=tu.ID 
			ORDER BY
				tu.`level` DESC
			";
		$rs = $this->db->exceuteQuery($this->sql);
		return $rs;
	}		
	//购买此商品的用户还购买了
	function getTgoodsUserGoods($id){
		$this->sql = "
			SELECT 
				tg.ID AS id,
				tg.goodsname AS goodsname,
				tg.newimg AS goodspic,
				sum(tg.makenum) AS mknum
			FROM
				t_goods tg,
				t_cart tc,
				t_cart_record tcr1,
				t_cart_record tcr2
			WHERE
				tcr1.goodsid=".$id." AND
				tc.ID=tcr1.idt_cart AND
				tc.issettlement=1 AND
				tcr2.idt_cart=tcr1.idt_cart AND
				tg.ID=tcr2.goodsid AND
				tg.isonsale=0 AND
				tg.ID<>".$id."
			GROUP BY
				id 
			ORDER BY
				mknum DESC
		";
		$rs = $this->db->exceuteQuery($this->sql);
		return $rs;
	}
	//判断一个用户是否购买过该商品
	function isUserMkGoods($userid,$goodsid){
		$this->sql = "
  	  		SELECT 
				ti.ID
			FROM
				t_order_info ti,
				t_order_record tor
			WHERE
				ti.idt_user=".$userid." AND
				tor.orderstatus=2 AND
				tor.idt_order_info=ti.ID AND
				tor.idt_goods=".$goodsid
		 	;
		$rs = $this->db->exceuteQuery($this->sql);
		return $rs;		
	}
	//判断一个用户是否评价过该商品
	function isUserComGoods($userid,$goodsid){
		$this->sql = "
  	  		SELECT 
				ID
			FROM
				t_goods_comment
			WHERE
				idt_user=".$userid." AND
				idt_goods=".$goodsid
		 	;
		$rs = $this->db->exceuteQuery($this->sql);
		return $rs;		
	}
	//判断一个用户是否兑换过该商品
	function isUserExGoods($userid,$goodsid){
		$this->sql = "
  	  		SELECT 
				ID
			FROM
				t_exchange_record
			WHERE
				idt_user=".$userid." AND
				idt_goods=".$goodsid
		 	;
		$rs = $this->db->exceuteQuery($this->sql);
		return $rs;		
	}
	//获得该商品在购物车中的购买量
	function shopNum($goodsid,$sessionid,$userid){
		$this->sql = "
				SELECT 
					tcr.shoppingnum
				FROM 
					t_cart tc,t_cart_record tcr
				WHERE 
					tc.sessionID='".$sessionid."'  
					AND tc.issettlement=0 
					AND tcr.idt_cart=tc.ID
					AND tcr.goodsid=".$goodsid;
				if(!empty($userid)){
					$this->sql =$this->sql." AND tc.idt_user='".$userid."'";
				}else{
					$this->sql =$this->sql." AND tc.idt_user='0'"; 
				}
		$rs = $this->db->exceuteQuery($this->sql);
		return $rs[0];
	}
				
}