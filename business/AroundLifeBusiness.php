<?php
require_once('BaseBusiness.php');
require_once('DateUtil.php');
require_once('SupportException.php');
require_once('PageSplitBusiness.php');

class AroundLifeBusiness extends PageSplitBusiness{
	private $totalRows;
	private $isTotalRows = false;
	
	//获取校边生活首页的品牌商家
	function getBrandShop(){
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
		 		focusnum DESC limit 9";
		$rs = $this->db->exceuteQuery($this->sql);
		return $rs;
	}
	//获取校边生活首页的推荐商家
	function getRecommendShop(){
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
		 		ts.focusnum DESC limit 15";
		$rs = $this->db->exceuteQuery($this->sql);
		return $rs;
	}
	//获取校边生活首页的最新商家
	function getNewShop(){
		$this->sql = "
			SELECT 
				id,
				shoppicture,
				shopname,
				schooldiscount 
			FROM 
				t_shopinfo
		 	WHERE  
		 		isdelete=0 and 
		 		verifystate=2 
		 	ORDER BY
		 		effecttime DESC ";
		$rs = $this->db->exceuteQuery($this->sql);
		return $rs;
	}
	//获取校边生活首页的店铺评论
	function getShopComment(){
		$this->sql = "
			SELECT 
				tsc.id as scid,
				ts.ID as shopid,
				ts.shopname as shopname,
				tsc.schoolnum as tscschool, 
				ts.shoppicture as spicture, 
				tsc.username as tscuser, 
				tsc.content as tscc,
				tsc.idt_user as userid, 
				tsc.userip as userip,
				date_format(tsc.commenttime,'%Y.%c.%e') as comtime
			FROM 
				t_shopinfo  ts, 
				t_shop_comment  tsc 
			WHERE  
				ts.id=tsc.idt_shopinfo AND 
			 	tsc.isshow=1 
			ORDER BY
				tsc.commenttime DESC ";
		$rs = $this->db->exceuteQuery($this->sql);
		return $rs;
	}
	
	//获取商品评论
	function getGoodsComment(){
		$this->sql = "
			SELECT 
				tgc.id as gcid,
				tgc.idt_goods as goodsid,
				tg.newimg as gpicture,
				tgc.schoolnum as tgcschool, 
				tgc.username as tgcuser, 
				tgc.content as tgcc,
				tgc.idt_user as userid, 
				tgc.userip as userip,
				date_format(tgc.commenttime,'%Y.%c.%e') as comtime 
			FROM 
				t_goods  tg, 
				t_goods_comment  tgc 
		 	WHERE  
		 		tg.id=tgc.idt_goods AND
		  		tgc.isshow=1 
		  	ORDER BY 
		  		tgc.commenttime DESC ";
		$rs = $this->db->exceuteQuery($this->sql);
		return $rs;
	}
	//获取本地商户的商家推荐（广告）
	function getAroundRecommendShop($aract){
		$this->sql = "
			SELECT 
				ts.id,
				ts.shoppicture,
				ts.schooldiscount,
				ts.shopname 
			FROM 
				t_shopinfo ts,t_user tu
		 	WHERE  
		 		ts.bigtypeid = ".$aract." AND  
		 		ts.isdelete=0 AND  
		 		tu.isadvertshop=1 AND
		 		ts.idt_user=tu.ID AND  
		 		ts.verifystate=2 LIMIT 3";
		$rs = $this->db->exceuteQuery($this->sql);
		return $rs;
	}
	//获得店铺名称（还看到什么）
	function getAllShopNames($aract,$history){
		$this->sql = "
			SELECT 
				id,
				shopname 
			FROM 
				t_shopinfo
		 	WHERE  
		 		bigtypeid = ".$aract." AND
		 		isdelete=0 AND  
		 		verifystate=2 AND 
		 		ID IN(".$history.")
		 	ORDER BY
		 		focusnum DESC ";
		$rs = $this->db->exceuteQuery($this->sql);
		return $rs;
	}
	//获得本月销售量
	function getMonthNum($aract){
		$this->sql = "
			SELECT  
				tg.id as goodsid,
				tg.goodsname as goodsname,
				tg.newimg  as goodsimg,
				(CASE WHEN sum(tor.shopnum) IS NULL THEN 0 ELSE sum(tor.shopnum) END)  as goodsnum 
  			FROM  
  				t_shopinfo ts,t_goods tg left join( t_order_info ti, t_order_record tor)  
  			ON 
 				(DATE_SUB(CURDATE(), INTERVAL 1 MONTH)<=date(ti.addtime) AND 
 				tor.idt_order_info=ti.id AND 
 				tg.ID=tor.idt_goods AND 
 				ti.paystatus=2)  
 			WHERE 
 				ts.bigtypeid=".$aract." AND 
 				ts.ID=tg.shopid
			GROUP BY 
				goodsid 
			ORDER BY 
				goodsnum DESC limit 12 ";
		$rs = $this->db->exceuteQuery($this->sql);
		return $rs;
	}
	//获得搜索条件
	function getAroundFoodSearch($aract){
		$this->sql = "
				SELECT 
					msc.ID as mid,
					msc.`name` as mname, 
					count(tsi.id) as snum  
				FROM 
					m_shop_classfy msc,t_shopinfo tsi
				WHERE 
					msc.parentid=".$aract." AND
 					tsi.bigtypeid=msc.parentid AND
 					tsi.smalltypeid=msc.ID AND
 					tsi.isdelete=0 AND
 					tsi.verifystate=2
 				GROUP BY  
 					mid ";
		$rs = $this->db->exceuteQuery($this->sql);
		return $rs;
	}
	//获得校边美食里的店铺排序（降序）
	//$currpage当前页码
	//$numbersperpage每页显示的数目
	function getShopOrder($act,$mid,$currpage,$numbersperpage,$aract,$order){
		$this->sql="";
		$sqlcount="";
		//销量排序
		if($act=='mknum'){
			$this->sql = "
				SELECT  
					ts.ID AS sid,
					ts.shopname AS sname,
					ts.shoppicture AS spic,
					ts.schooldiscount AS sdiscount,
					SUM(tg.makenum) AS mknum
				FROM 
					t_shopinfo ts
					left  join t_goods tg on tg.shopid=ts.ID
				WHERE 
					ts.bigtypeid= ".$aract." AND
					ts.verifystate=2 AND
					ts.isdelete=0";
			//小分类
			if($mid!=''){
				$this->sql = $this->sql." AND ts.smalltypeid = ".$mid;
			}
			$this->sql = $this->sql."
			    GROUP BY
					sid 
				ORDER BY
					mknum ";
				$this->sql .= $order=="ESC" ? "" : " DESC";
			//计算总条数
			$sqlcount = "SELECT 
							count(1)
						FROM 
							t_shopinfo ts
							left  join t_goods tg on tg.shopid=ts.ID
						WHERE 
							ts.bigtypeid= ".$aract." AND
							ts.verifystate=2 AND
							ts.isdelete=0";		
		}
		//评价排序、入驻时间排序、关注次数排序	
		else{
			$this->sql = "
				SELECT  
					ts.shopname AS sname,
					ts.ID AS sid,
					ts.shoppicture AS spic,
					ts.schooldiscount AS sdiscount
				FROM 
					t_shopinfo ts
				WHERE 
					ts.bigtypeid=".$aract." AND
					ts.verifystate=2 AND
					ts.isdelete=0 ";
			//小分类
			if($mid!=''){
				$this->sql = $this->sql." AND ts.smalltypeid = ".$mid;
			}
			//评价排序
			if($act=='comment'){
				$this->sql = "
					SELECT  
						ts.ID AS sid,
						ts.shopname AS sname,
						ts.shoppicture AS spic,
						ts.schooldiscount AS sdiscount,
						COUNT(tsc.ID)/COUNT(tsc1.ID) AS commentnum
					FROM 
						 t_shopinfo ts LEFT JOIN (t_shop_comment  tsc,t_shop_comment  tsc1) ON
						 tsc.idt_shopinfo=ts.ID 
						 AND tsc1.idt_shopinfo=ts.ID 
						 AND tsc.commentrank=2 
						 AND tsc.isshow=1
						 AND tsc1.isshow=1
					WHERE 
						ts.bigtypeid=".$aract." AND
						ts.verifystate=2 AND
						ts.isdelete=0 ";  
						//小分类
					if($mid!=''){
						$this->sql = $this->sql." AND ts.smalltypeid = ".$mid;
					}
					$this->sql = $this->sql." 
				 		GROUP BY
							sid 
						ORDER BY commentnum ";
					$this->sql .= $order=="ESC" ? "" : " DESC";
			}
			//入驻时间排序
			if($act=='effecttime'){
				$this->sql = $this->sql."
		  			ORDER BY
						ts.effecttime ";
					$this->sql .= $order=="ESC" ? "" : " DESC";
			}
			//折扣排序
			if($act=='discount'){
				$this->sql = $this->sql."
		  			ORDER BY
						ts.schooldiscount ";
					$this->sql .= $order=="ESC" ? "" : " DESC";
			}
			//关注次数排序
			if(empty($act)){
				$this->sql = $this->sql."
		  			ORDER BY
						ts.focusnum ";
					$this->sql .= $order=="ESC" ? "" : " DESC";
			}
			//计算总条数
			$sqlcount = "SELECT 
						count(1)
					FROM 
						t_shopinfo ts
					WHERE 
						ts.bigtypeid=".$aract." AND
						ts.verifystate=2 AND
						ts.isdelete=0 ";
		}
		//小分类
		if($mid!=''){
			$sqlcount = $sqlcount." AND ts.smalltypeid = ".$mid;
		}
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