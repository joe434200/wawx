<?php 
require_once('BaseBusiness.php');
require_once('DateUtil.php');
require_once('SupportException.php');
class FlowBusiness extends  BaseBusiness{
	//查询购物车里的商品
	function checkGoodsIn($sessinId,$userid){
		$this->sql = "
				SELECT 
					tc.ID,
					tcr.goodsid,
					tcr.goodsname,
					tcr.newimg,
					tcr.goodsparamenter,
					tcr.marketprice,
					tcr.shoppingprice,
					tcr.shoppingtype,
					tcr.shoppingnum,
					tcr.shoppingprice*tcr.shoppingnum AS sumsmall,
					tt.marketTotal,
					tt.shopTotal,
					tt.disMoney,
					tt.rate
				FROM 
					t_cart tc,
					t_cart_record tcr,
					(
					SELECT
						sum(tcr1.marketprice*tcr1.shoppingnum) AS marketTotal,
						sum(tcr1.shoppingprice*tcr1.shoppingnum) AS shopTotal,
						sum(tcr1.marketprice*tcr1.shoppingnum-tcr1.shoppingprice*tcr1.shoppingnum) AS disMoney,
						ROUND(sum(tcr1.marketprice*tcr1.shoppingnum-tcr1.shoppingprice*tcr1.shoppingnum)/sum(tcr1.marketprice*tcr1.shoppingnum)*100,2) AS rate 
					FROM
						t_cart tc1,
						t_cart_record tcr1
					WHERE 
						tc1.sessionID='".$sessinId."'  
						AND tc1.issettlement=0 
						AND tcr1.idt_cart=tc1.ID ";
					if(!empty($userid))
						$this->sql =$this->sql."
							AND tc1.idt_user='".$userid."'" ;
					else 
						$this->sql =$this->sql."
							AND tc1.idt_user='0'" ;
					$this->sql = $this->sql."
						) tt
				WHERE 
					tc.sessionID='".$sessinId."'  
					AND tc.issettlement=0 
					AND tcr.idt_cart=tc.ID ";
				if(!empty($userid))
					$this->sql =$this->sql."
						AND tc.idt_user='".$userid."'";
				else 
					$this->sql =$this->sql."
						AND tc.idt_user='0'" ;
				$this->sql = $this->sql."
					GROUP BY
						tcr.goodsid
				
			";
		$rs = $this->db->exceuteQuery($this->sql);
		return $rs;
	}
	//获得我的收藏
	function collGoods($userid){
		$this->sql = "
				SELECT
					tg.ID,
					tg.goodsname,
					tg.marketprice,
					tg.shopprice,
					tgc.collecttype,
					tgc.idt_user
				FROM
					t_goods_collect tgc,
					t_goods tg
				WHERE
					tgc.idt_user='".$userid."' AND
					tg.ID=tgc.idt_goods
				ORDER BY
					tgc.collecttime DESC
				LIMIT 10	
			";
		$rs = $this->db->exceuteQuery($this->sql);
		return $rs;
	}
	//判断购物车是否存在
	function isHasCart($sessinId,$userid){
		$this->sql = "
				SELECT 
					*
				FROM 
					t_cart
				WHERE 
					sessionID='".$sessinId."' 
					AND issettlement=0 ";
				if(!empty($userid))
					$this->sql =$this->sql." AND idt_user='".$userid."'";
				else 
					$this->sql =$this->sql."
						AND idt_user='0'" ;
					
		$rs = $this->db->exceuteQuery($this->sql);
		return $rs;
	}
	//创建购物车
	function createCart($cart){
		$this->sql = "
			INSERT INTO t_cart (
				idt_user,
				issettlement,
				createtime,
				sessionID
			) VALUES(
				".$cart['idt_user'].
				",".$cart['issettlement'].
				",NOW()".
				",'".$cart['sessionID']."')";
		$rs = $this->db->exceuteUpdate($this->sql);
		return mysql_insert_id();
	}
	//把商品添加到购物车
	function addCart($goodcart,$userid) {
				$this->sql = "
					INSERT INTO 
						t_cart_record
						(
						idt_cart,
						goodsid,
						goodsname,
						marketprice,
						shoppingprice,
						shoppingnum,
						shoppingtype,
						goodsparamenter,
						newimg,
						shopid
						)
					SELECT 
						tc.ID,
						tg.ID,
						tg.goodsname,
						tg.marketprice,
						tg.shopprice,
						'".$goodcart['mknum']."',
						'".$goodcart['shoppingtype']."',
						tg.goodsparamenter,
						tg.newimg,
						tg.shopid
					 FROM 
						t_cart tc,t_goods tg  
					 WHERE 
					 	tc.sessionID='".$goodcart['sessionID']."' 
						AND tg.ID='".$goodcart['goodsid']."' 
						AND tc.issettlement=0 ";
					if(!empty($userid))
						$this->sql =$this->sql."
							AND tc.idt_user='".$userid."' ";
					else 
						$this->sql =$this->sql."
							AND tc.idt_user='0'" ;
		$rs = $this->db->exceuteUpdate($this->sql);
		return mysql_insert_id();			
	}
	//更新一件商品的购买量
	function updateAgoodsCart($goodcart){
		$this->sql = "
				UPDATE 
					t_cart_record tcr,t_cart tc 
				SET 
					tcr.shoppingnum=tcr.shoppingnum+".$goodcart['mknum']."
				WHERE 
					tc.sessionID='".$goodcart['sessionID']."' AND
					tc.issettlement=0 AND 
					tcr.idt_cart=tc.ID AND 
					tcr.goodsid=".$goodcart['goodsid'];
					if(!empty($goodcart['idt_user']))
						$this->sql =$this->sql."
							AND tc.idt_user='".$goodcart['idt_user']."' ";
					else 
						$this->sql =$this->sql."
							AND tc.idt_user='0'" ;
			$rs = $this->db->exceuteUpdate($this->sql);
			return mysql_insert_id();	
	}
	//收藏商品
	function collectGoods($userid,$goodsid,$ctype){
		$this->sql = "INSERT INTO 
						t_goods_collect(
							idt_user,
							idt_goods,
							collecttime,
							collecttype
						)
					   VALUES(
					   	".$userid.",
					   	".$goodsid.",
					   	NOW(),
					   	".$ctype."
					   )";  
			$rs = $this->db->exceuteUpdate($this->sql);
			return mysql_insert_id();
	}
	//是否收藏了该商品
	function iscollectGoods($userid,$goodsid){
		$this->sql = "SELECT
						* 
					 FROM
					 	t_goods_collect
					 WHERE
					   	idt_user=".$userid." AND 
					   	idt_goods=".$goodsid;
			$rs = $this->db->exceuteQuery($this->sql);
			return $rs;
	}
	//从购物车中删除商品
	function deleteGoods($sessonid,$goodsid,$userid){
		$this->sql = "
				DELETE FROM 
					t_cart_record 
				WHERE idt_cart=
					(SELECT 
						ID 
					FROM 
						t_cart 
					WHERE sessionID='".$sessonid."' 
						AND issettlement=0 ";
					if(!empty($userid)) 
						$this->sql =$this->sql." AND idt_user='".$userid."'";
					else 
						$this->sql =$this->sql."
							AND idt_user='0'" ;
					$this->sql = $this->sql." )
					AND goodsid=".$goodsid;
		$rs = $this->db->exceuteUpdate($this->sql);
		return mysql_insert_id();
	}
	//更新购物车商品的购买量（加减）
	function updateGoods($sessonid,$goodsid,$mknum,$userid){
		$this->sql = "
				UPDATE 
					t_cart_record 
				SET
					shoppingnum=".$mknum." 
				WHERE idt_cart=
					(SELECT ID FROM t_cart WHERE sessionID='".$sessonid."' 
					AND issettlement=0 ";
					if(!empty($userid)) 
						$this->sql =$this->sql." AND idt_user='".$userid."'";
					else 
						$this->sql =$this->sql."
							AND idt_user='0'" ;
					$this->sql = $this->sql." )
					AND goodsid=".$goodsid;
		$rs = $this->db->exceuteUpdate($this->sql);
		return mysql_insert_id();
	}
	//查询商品的库存量
	function getNum($goodsid){
		$this->sql = "
			SELECT 
				goodsnumber
			FROM
				t_goods
			WHERE
				ID='".$goodsid."'";
		$rs = $this->db->exceuteQuery($this->sql);
		return $rs[0];
	}
	//更新商品的库存量
	function updateNum($goodsid,$num){
		$this->sql = "
			UPDATE 
				t_goods
			SET
				goodsnumber=goodsnumber-".$num.",
				makenum=makenum+".$num." 
			WHERE
				ID=".$goodsid;
		$rs = $this->db->exceuteUpdate($this->sql);
		return mysql_insert_id();	
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
					if(!empty($userid))
						$this->sql =$this->sql." AND tc.idt_user='".$userid."'";
					else 
						$this->sql =$this->sql."
							AND tc.idt_user='0'" ;
		$rs = $this->db->exceuteQuery($this->sql);
		return $rs[0];
	}
	//清空购物车
	function clearGoods($sessonid,$userid){
		$this->sql = "
				DELETE FROM 
					t_cart_record 
				WHERE idt_cart=
					(SELECT ID FROM t_cart WHERE sessionID='".$sessonid."'
					 AND issettlement=0 ";
					if(!empty($userid)) 
						$this->sql =$this->sql." AND idt_user='".$userid."')";
					else 
						$this->sql =$this->sql."
							AND idt_user='0')" ;
		$rs = $this->db->exceuteUpdate($this->sql);
		return mysql_insert_id();
	}
	//获取用户启动的配送地址
	function getCosignee($userid){
		$this->sql = "
			SELECT
				tc.idt_user,
				tc.country,
				tc.province,
				tc.city,
				tc.district,
				tc.consignee,
				tc.address,
				tc.signbuilding,
				tc.email,
				tc.zipcode,
				tc.tel,
				tc.mobile,
				tc.isuse,
				tc.besttime,
				mc1.name AS countryname,
				mc2.name AS provincename,
				mc3.name AS cityname,
				mc4.name AS districtname
			FROM
				t_consigneeadress tc, 
				m_city mc1,
				m_city mc2,
				m_city mc3,
				m_city mc4
			WHERE
				tc.idt_user=".$userid." AND 
				tc.isuse=1 AND
				mc1.ID=tc.country AND
				mc2.ID=tc.province AND
				mc3.ID=tc.city AND
				mc4.ID=tc.district ";
		$rs = $this->db->exceuteQuery($this->sql);
		return $rs[0];
	}
	//判断用户是否有配送地址
	function isHasCosignee($userid){
		$this->sql = "
			SELECT
				*
			FROM
				t_consigneeadress tc
			WHERE
				tc.idt_user=".$userid." AND 
				tc.isuse=1 ";
		$rs = $this->db->exceuteQuery($this->sql);
		return $rs[0];
	}
	//添加收货人信息
	function addCosignee($data){
		$this->sql = "
			INSERT INTO
				t_consigneeadress(
					idt_user,
					country,
					province,
					city,
					district,
					consignee,
					address,
					signbuilding,
					email,
					zipcode,
					tel,
					mobile,
					isuse,
					besttime
				)
			VALUES(
				'".$data['idt_user']."',
				'".$data['country']."',
				'".$data['province']."',
				'".$data['city']."',
				'".$data['district']."',
				'".$data['consignee']."',
				'".$data['address']."',
				'".$data['signbuilding']."',
				'".$data['email']."',
				'".$data['zipcode']."',
				'".$data['tel']."',
				'".$data['mobile']."',
				'".$data['isuse']."',
				'".$data['besttime']."'
			)
			";
		$rs = $this->db->exceuteUpdate($this->sql);
		return mysql_insert_id();		
	}
	//更新收货人信息
	function updateCosignee($data){
		$this->sql = "
			UPDATE
				t_consigneeadress
			SET
				idt_user='".$data['idt_user']."',
				country='".$data['country']."',
				province='".$data['province']."',
				city='".$data['city']."',
				district='".$data['district']."',
				consignee='".$data['consignee']."',
				address='".$data['address']."',
				signbuilding='".$data['signbuilding']."',
				email='".$data['email']."',
				zipcode='".$data['zipcode']."',
				tel='".$data['tel']."',
				mobile='".$data['mobile']."',
				isuse='".$data['isuse']."',
				besttime='".$data['besttime']."'
			WHERE
				idt_user='".$data['idt_user']."' AND
				isuse='".$data['isuse']."'";
			$rs = $this->db->exceuteUpdate($this->sql);
			return mysql_insert_id();	
	}
	//获取国家、省、市、区县信息
	function getRegion($level){
		$this->sql = "
			SELECT
				*
			FROM
				m_city
			WHERE 
				level=".$level."
			ORDER BY convert(name USING gbk) COLLATE gbk_chinese_ci	
			";
		$rs = $this->db->exceuteQuery($this->sql);
		return $rs;
	}
	//获得所有支付方式
	function getPayment(){
		$this->sql = "SELECT * FROM m_payment";
		$rs = $this->db->exceuteQuery($this->sql);
		return $rs;
	}
	//获得所有配送方式
	function getShipping(){
		$this->sql = "SELECT * FROM m_shipping ORDER BY ID DESC";
		$rs = $this->db->exceuteQuery($this->sql);
		return $rs;
	}
	//获得发票内容
	function getInvcontent(){
		$this->sql = "
					SELECT 
						* 
					FROM 
						m_invcontent
					ORDER BY 
						convert(name USING gbk) COLLATE gbk_chinese_ci
		";
		$rs = $this->db->exceuteQuery($this->sql);
		return $rs;
	}
	//获得发票内容
	function getAInvcontent($id){
		$this->sql = "
					SELECT 
						* 
					FROM 
						m_invcontent
					WHERE 
						ID=".$id;
		$rs = $this->db->exceuteQuery($this->sql);
		return $rs;
	}
	//获得上一次用户采用的支付和发票信息
	function last_shipping_and_payment($userid)
	{
    		$this->sql = "
    			SELECT 
    				ti.payid,
    				ti.isinv,
    				ti.invpayee,
    				ti.invcID,
    				ti.invtype 
          		FROM 
          			t_order_info ti
            	WHERE 
            		ti.idt_user = '".$userid."'   
            	ORDER BY 
            		ti.ID DESC LIMIT 1";
    		$rs = $this->db->exceuteQuery($this->sql);
    	if (empty($rs)){
       	 /* 如果获得是一个空数组，则返回默认值 */
        	$rs = array( 
        	'payid' => 0,'isinv'=>0,'invpayee'=>'',invcontent=>'',invtype=>0);
    		return $rs;
    	}else{
    		return $rs[0];
    	}
	}
	//获得用户选择的配送方式
	function getSelectShipping($shipid)
	{
    		$this->sql = "
    			SELECT 
    				* 
          		FROM 
          			m_shipping
            	WHERE 
            		ID = '".$shipid."'";
    	$rs = $this->db->exceuteQuery($this->sql);
    	return $rs;
	}
	//获得用户选择的支付方式
	function getSelectPayment($payid){
		$this->sql = "SELECT * FROM m_payment where ID='".$payid."'";
		$rs = $this->db->exceuteQuery($this->sql);
		return $rs;
	}
	//产生一个订单编号
	function get_order_sn(){
    	/* 选择一个随机的方案 */
    	mt_srand((double) microtime() * 1000000);
    	return date('Ymd') . str_pad(mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT);
	}
	//添加订单信息
	function addOrderInfo($data){
		$this->sql = "
			INSERT INTO
				t_order_info(
					idt_user,
					ordersn,
					idt_cart,
					paystatus,
					consignee,
					country,
					province,
					city,
					district,
					address,
					zipcode,
					tel,
					mobile,
					email,
					besttime,
					signbuilding,
					payid,
					payname,
					isinv,
					invpayee,
					invcID,
					invcontent,
					goodsamount,
					schoolmoney,
					orderamount,
					addtime,
					invtype,
					discount
				)
			VALUES(
				'".$data['idt_user']."',
				'".$data['ordersn']."',
				'".$data['idt_cart']."',
				'".$data['paystatus']."',
				'".$data['consignee']."',
				'".$data['country']."',
				'".$data['province']."',
				'".$data['city']."',
				'".$data['district']."',
				'".$data['address']."',
				'".$data['zipcode']."',
				'".$data['tel']."',
				'".$data['mobile']."',
				'".$data['email']."',
				'".$data['besttime']."',
				'".$data['signbuilding']."',
				'".$data['payid']."',
				'".$data['payname']."',
				'".$data['isinv']."',
				'".$data['invpayee']."',
				'".$data['invcID']."',
				'".$data['invcontent']."',
				'".$data['goodsamount']."',
				'".$data['schoolmoney']."',
				'".$data['orderamount']."',
				NOW()".",
				'".$data['invtype']."',
				'".$data['discount']."'
			)
			";
		$rs = $this->db->exceuteUpdate($this->sql);
		return mysql_insert_id();				
	}
	//判断订单号是否已经存在
	function isOrdersnExit($sn){
		$this->sql = "SELECT ID FROM t_order_info where ordersn='".$sn."'";
		$rs = $this->db->exceuteQuery($this->sql);
		return $rs;		
	}
	//获取新订单ID
	function insert_id($sn){
		$this->sql = "
			SELECT  LAST_INSERT_ID() FROM t_order_info WHERE ordersn='".$sn."'";
		$rs = $this->db->exceuteQuery($this->sql);
		return $rs;		
	}
	//获取订单信息
	function getOrder($id){
		$this->sql = "
			SELECT  * FROM t_order_info WHERE ID='".$id."'";
		$rs = $this->db->exceuteQuery($this->sql);
		return $rs;		
	}
	//把立刻购买商品添加到订单记录里面
	function insertGbuyOrderRecord($new_order_id,$data){
		$this->sql = "
			INSERT INTO
				t_order_record(
					idt_order_info,
					idt_goods,
					goodsname,
					shopprice,
					marketprice,
					shopnum,
					shopid,
					shoppingtype,
					goodsparamenter,
					newimg,
					shippingstatus,
					orderstatus,
					singlsum
				)
			VALUES(
				'".$new_order_id."',
				'".$data['goodsid']."',
				'".$data['goodsname']."',
				'".$data['shoppingprice']."',
				'".$data['marketprice']."',
				'".$data['shoppingnum']."',
				'".$data['shopid']."',
				'".$data['shoppingtype']."',
				'".$data['goodsparamenter']."',
				'".$data['newimg']."',
				0,
				0,
				'".$data['sumsmall']."')";
		$rs = $this->db->exceuteUpdate($this->sql);
		return mysql_insert_id();
	}
	//插入订单商品到订单记录里面
	function insertOrderRecord($new_order_id,$sessionid,$userid){
		$this->sql = "
			INSERT INTO
				t_order_record(
					idt_order_info,
					idt_goods,
					goodsname,
					shopprice,
					marketprice,
					shopnum,
					shopid,
					shoppingtype,
					goodsparamenter,
					newimg,
					shippingstatus,
					orderstatus,
					singlsum
				)
			SELECT
				'".$new_order_id."',
				tcr.goodsid,
				tcr.goodsname,
				tcr.shoppingprice,
				tcr.marketprice,
				tcr.shoppingnum,
				tcr.shopid,
				tcr.shoppingtype,
				tcr.goodsparamenter,
				tcr.newimg,
				0,
				0,
				tcr.shoppingnum*tcr.shoppingprice
			FROM
				t_cart_record tcr,t_cart tc
			WHERE
				tc.sessionID='".$sessionid."' AND
				tc.issettlement=0 AND 
				tcr.idt_cart=tc.ID ";
			if(!empty($userid)) 
				$this->sql =$this->sql." AND tc.idt_user='".$userid."'";
			else 
				$this->sql =$this->sql."
						AND tc.idt_user='0'" ;
		$rs = $this->db->exceuteUpdate($this->sql);
		return mysql_insert_id();		
	}
	//添加校币兑换订单信息
	function addExchOrderInfo($data){
		$this->sql = "
			INSERT INTO
				t_order_info(
					idt_user,
					ordersn,
					paystatus,
					consignee,
					country,
					province,
					city,
					district,
					address,
					zipcode,
					tel,
					mobile,
					email,
					besttime,
					signbuilding,
					goodsamount,
					schoolmoney,
					orderamount,
					addtime,
					discount
				)
			VALUES(
				'".$data['idt_user']."',
				'".$data['ordersn']."',
				'".$data['paystatus']."',
				'".$data['consignee']."',
				'".$data['country']."',
				'".$data['province']."',
				'".$data['city']."',
				'".$data['district']."',
				'".$data['address']."',
				'".$data['zipcode']."',
				'".$data['tel']."',
				'".$data['mobile']."',
				'".$data['email']."',
				'".$data['besttime']."',
				'".$data['signbuilding']."',
				'".$data['goodsamount']."',
				'".$data['schoolmoney']."',
				'".$data['orderamount']."',
				NOW()".",
				'".$data['discount']."'
			)
			";
		$rs = $this->db->exceuteUpdate($this->sql);
		return mysql_insert_id();				
	}
	//插入校币兑换商品到订单记录里面
	function insertExchOrderRecord($new_order_id,$data){
		$this->sql = "
			INSERT INTO
				t_order_record(
					idt_order_info,
					idt_goods,
					goodsname,
					shopprice,
					marketprice,
					shopnum,
					shopid,
					shoppingtype,
					goodsparamenter,
					newimg,
					simpleschoolmoney,
					shippingstatus,
					orderstatus,
					singlsum
				)
			values(
				'".$new_order_id."',
				'".$data['ID']."',
				'".$data['goodsname']."',
				'".$data['shopprice']."',
				'".$data['marketprice']."',
				'".$data['mknum']."',
				'".$data['shopid']."',
				'".$data['flow_type']."',
				'".$data['goodsparamenter']."',
				'".$data['newimg']."',
				'".$data['exchangemoney']."',
				0,
				'".$data['orderstatus']."',
				'".$data['singlsum']."')";
		$rs = $this->db->exceuteUpdate($this->sql);
		return mysql_insert_id();		
	}
	//插入兑换记录
	function insertExchRecord($data){
		$this->sql = "
			INSERT INTO
				t_exchange_record(
					idt_user,
					username,
					idt_goods,
					goodsname,
					exchangetime,
					exchangenum
				)
			values(
				'".$data['userid']."',
				'".$data['username']."',
				'".$data['ID']."',
				'".$data['goodsname']."',
				NOW()".",
				'".$data['mknum']."'
				)";
		$rs = $this->db->exceuteUpdate($this->sql);
		return mysql_insert_id();		
	}
	//扣除会员的校币
	function updateUserCoins($data){
		$this->sql = "
			UPDATE
				t_user
			SET
				coins=coins-'".$data['sumcoins']."' 
			WHERE
				ID='".$data['userid']."'
			";
		$rs = $this->db->exceuteUpdate($this->sql);
		return mysql_insert_id();			
	}
	//修改购物车的标识
	function updateCart($userid,$sessionid){
		$this->sql = "
			UPDATE
				t_cart
			SET
				issettlement=1
			WHERE
				idt_user='".$userid."' AND
				sessionID='".$sessionid."' AND 
				issettlement=0
			";
		$rs = $this->db->exceuteUpdate($this->sql);
		return mysql_insert_id();	
	}
	//查询成功购买的商品
	function getSucGoods($id){
		$this->sql = "
				SELECT 
					idt_goods,
					goodsname,
					shopprice,
					shopnum,
					goodsparamenter,
					shopprice*shopnum AS sumsmall,
					simpleschoolmoney*shopnum AS scoins,
					simpleschoolmoney
				FROM 
					t_order_record
				WHERE 
					idt_order_info='".$id."'
			";
		$rs = $this->db->exceuteQuery($this->sql);
		return $rs;
	}
	//插入支付日志记录
	function insertPayLog($data){
		$this->sql = "
			INSERT INTO
				t_pay_log(
					ordersn,
					orderamount,
					paytype,
					ispaid
				)
			values(
				'".$data['ordersn']."',
				'".$data['orderamount']."',
				'".$data['paytype']."',
				'".$data['ispaid']."')";
		$rs = $this->db->exceuteUpdate($this->sql);
		return mysql_insert_id();		
	}
	//更新支付日志记录
	function updatePayLog($data){
		$this->sql = "
			UPDATE
				t_pay_log
			SET
				ispaid='".$data['ispaid']."',
				paydate=NOW()
			WHERE
				ordersn='".$data['ordersn']."'";
		$rs = $this->db->exceuteUpdate($this->sql);
		return mysql_insert_id();		
	}
	//更新订单表
	function updateOrderInfo($data){
		$this->sql = "
			UPDATE
				t_order_info
			SET
				paystatus='".$data['paystatus']."',
				paytime=NOW()
			WHERE
				ordersn='".$data['ordersn']."'";
		$rs = $this->db->exceuteUpdate($this->sql);
		return mysql_insert_id();		
	}
}
?>