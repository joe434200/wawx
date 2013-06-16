<?php
require_once('BaseBusiness.php');
require_once('DateUtil.php');
require_once('SupportException.php');
class IndexBusiness extends BaseBusiness{
	//获得本地商户
	function getAroundShop(){
		$this->sql = "
				SELECT 
					ID,
					`name` 
				FROM 
					m_shop_classfy
				WHERE 
					parentid=0 AND isshow=1 
 				ORDER BY  
 					ID ";
		$rs = $this->db->exceuteQuery($this->sql);
		return $rs;
	}	
	//获得广告信息
	function getAdvertise($position){
		$this->sql = "
				SELECT 
					* 
				FROM 
					t_advertisement
				WHERE 
					isshow=1 AND position='".$position."'";
		$rs = $this->db->exceuteQuery($this->sql);
		return $rs;
	}	
	//获取兑换记录表
	function getExchangeRecord()
	{
		$this->sql = "
			SELECT 
				* 
			FROM 
				t_exchange_record 
			ORDER BY 
				exchangetime DESC ";
		$rs = $this->db->exceuteQuery($this->sql);
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
				type=0 
			ORDER BY 
				createtime DESC ";	
		$rs = $this->db->exceuteQuery($this->sql);
		return $rs;
	}
	//根据id获取某个公告信息
	function getNoticeById($id)
	{
		$this->sql = "
			SELECT 
				id,
				title,
				detail,
				createtime,
				starttime,
				endtime 
			FROM 
				t_notice 
			WHERE id=".$id;
		$rs = $this->db->exceuteQuery($this->sql);
		return $rs[0];
	}
	
	//获取销售前十位的商品
	function getTop10Goods()
	{
		$this->sql = "
			SELECT 
				tg.id,
				tg.goodsname,
				tg.newimg,
				tg.shopprice,
				(CASE WHEN sum(tor.shopnum) IS NULL THEN 0 ELSE sum(tor.shopnum) END)  as goodsnum 
			FROM 
				t_goods tg left join( t_order_info ti, t_order_record tor)  
  			ON 
 				(DATE_SUB(CURDATE(), INTERVAL 1 MONTH)<=date(ti.addtime) AND 
 				tor.idt_order_info=ti.id AND 
 				tg.ID=tor.idt_goods AND 
 				ti.paystatus=2)
			WHERE 
				tg.isdelete=0 AND 
				tg.isonsale=0
			GROUP BY 
				tg.id
		 	ORDER BY
		 	 	goodsnum DESC LIMIT 10";
		$rs = $this->db->exceuteQuery($this->sql);
		return $rs;
	}
	//获取首页的商家推荐（广告）
	function getAdvertRecommendShop(){
		$this->sql = "
			SELECT 
				ts.id,
				ts.shoppicture,
				ts.schooldiscount,
				ts.shopname 
			FROM 
				t_shopinfo ts,t_user tu
		 	WHERE  
		 		ts.isdelete=0 AND 
		 		tu.isadvertshop=1 AND
		 		ts.idt_user=tu.ID AND
		 		ts.verifystate=2 LIMIT 3";
		$rs = $this->db->exceuteQuery($this->sql);
		return $rs;
	}
	//获取今日推荐商家
	function getTodatRecommendShop(){
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
		 		tu.recommendtime DESC LIMIT 15";
		$rs = $this->db->exceuteQuery($this->sql);
		return $rs;
	}
	//获取热点商家
	function getHotShop(){
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
		 		focusnum DESC LIMIT 15";
		$rs = $this->db->exceuteQuery($this->sql);
		return $rs;
	}
	//获取热点圈子
	function getHotgrp(){
		$this->sql = "
			SELECT 
				id,
				groupname,
				photo 
			FROM 
				t_grp_main
		 	WHERE  
		 		auditflg=1 AND 
		 		shieldflg=0 
		 	ORDER BY 
		 		membernum DESC";
		$rs = $this->db->exceuteQuery($this->sql);
		return $rs;
	}
	//获取热点帖子
	function getHottforum(){
		$this->sql = "
			SELECT 
				id,
				title 
			FROM 
				t_forum_topic
		 	WHERE 
		 		shieldflg=0 
		 	ORDER BY
		 		replynum DESC ";
		$rs = $this->db->exceuteQuery($this->sql);
		return $rs;
	}
	
	//获得本周销售量(降序)
	function getWeekNum(){
		$this->sql = "
			SELECT  
				tg.id as goodsid,
				tg.goodsname as goodsname,
				tg.newimg  as goodsimg,
				sum(tcr.shoppingnum) as goodsnum 
  			FROM  
  				t_goods tg 
  				left  join (t_cart_record tcr,t_cart tc)
  				 on (tcr.goodsid=tg.ID AND 
  				 tc.id=tcr.idt_cart AND 
  				 tc.issettlement=1 AND
  				 DATE_SUB(CURDATE(), INTERVAL 7 DAY)<=date(tc.createtime))   
			GROUP BY 
				goodsid 
			ORDER BY 
				goodsnum DESC ";
		$rs = $this->db->exceuteQuery($this->sql);
		return $rs;
	}
	//获得学生惠本周热销单品（按最后更新时间降序）
	function getWeekHot(){
		$this->sql = "	
					SELECT
						tg.ID,
						tg.newimg,
						tg.goodsname,
						tg.shopprice,
						(CASE WHEN sum(tor.shopnum) IS NULL THEN 0 ELSE sum(tor.shopnum) END)  as goodsnum,
						(CASE WHEN tg.isgroup='1' THEN 2 ELSE 1 END)  as shoptype   
					FROM
						t_goods tg left join( t_order_info ti, t_order_record tor)  
  					ON 
		 				(DATE_SUB(CURDATE(), INTERVAL 7 DAY)<=date(ti.addtime) AND 
		 				tor.idt_order_info=ti.id AND 
		 				tg.ID=tor.idt_goods AND 
		 				ti.paystatus=2)
					WHERE
						tg.goodstype=0 AND 
						tg.isdelete=0 AND
						tg.isonsale=0
					GROUP BY 
						tg.ID
					ORDER BY 
						 goodsnum DESC
					";
		//DATE_SUB(CURDATE(), INTERVAL 7 DAY)<=date(lastupdate) AND 
		$rs = $this->db->exceuteQuery($this->sql);
		return $rs;
	}
	//获得学生惠最新排行(按上架时间降序)
	function getNewest(){
		$this->sql = "
					SELECT
						ID,newimg,goodsname,shopprice,
						(CASE WHEN isgroup='1' THEN 2 ELSE 1 END)  as shoptype    
					FROM
						t_goods 
					WHERE
						goodstype=0 AND 
						isdelete=0 AND 
						isonsale=0 AND
						isnew=1 
					ORDER BY 
						 addtime DESC
				";
		$rs = $this->db->exceuteQuery($this->sql);
		return $rs;
	}
	//获得学生惠团购商品购买次数
	function getVolumeGoods(){
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
					on(DATE_SUB(CURDATE(), INTERVAL 1 MONTH)<=date(ti.addtime) AND 
					tor.idt_goods=tg.ID AND 
					tor.shoppingtype=2 AND 
					ti.ID=tor.idt_order_info AND 
					ti.paystatus=2 )
				WHERE
					tg.isgroup=1 AND
					tg.goodstype=0 AND 
					tg.isonsale=0 AND
					tg.isdelete=0 AND
					(NOW() BETWEEN tg.groupstarttime AND tg.groupexpiretime
					OR NOW()<tg.groupstarttime)
				GROUP BY
					id 
				ORDER BY
					grnum DESC  limit 9
				";
		$rs = $this->db->exceuteQuery($this->sql);
		return $rs;
	}
	//获得特色商品购买数量
	function getSpecialGoods(){
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
					mnum DESC
				";
		$rs = $this->db->exceuteQuery($this->sql);
		return $rs;
	}	
		
}
?>