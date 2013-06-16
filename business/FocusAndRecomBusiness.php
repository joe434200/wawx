<?php 
require_once('BaseBusiness.php');
require_once('DateUtil.php');
require_once('SupportException.php');
class FocusAndRecomBusiness extends BaseBusiness{
	//用户是否对店铺关注过
	function isUserFocusShop($shopid,$userid){
		$this->sql = "
			SELECT 
				ID 
			FROM 
				t_shop_focus
		 	WHERE  
		 		idt_shopinfo=".$shopid." AND 
		 		idt_user=".$userid 
		 	;
		$rs = $this->db->exceuteQuery($this->sql);
		return $rs[0];
	}
	//店铺关注表中增加1条关注记录
	function insertShopFocus($shopid,$userid){
		$this->sql = "
			INSERT INTO t_shop_focus (
				idt_shopinfo,
				idt_user,
				focustime
			) VALUES(
				'".$shopid.
				"','".$userid.
				"',NOW())"
		;
		$rs = $this->db->exceuteUpdate($this->sql);
		return mysql_insert_id();
	}
	//对应店铺的关注次数加1
	function focusnumadd($shopid){
		$this->sql = "
			UPDATE 
				t_shopinfo
			SET
				focusnum=focusnum+1
			WHERE
				ID=".$shopid
		;
		$rs = $this->db->exceuteUpdate($this->sql);
		return mysql_insert_id();
	}
	//用户是否对店铺(或商品)推荐过
	function isUserRecomShop($shopid,$userid,$flag){
		$this->sql = "
			SELECT 
				ID 
			FROM 
				t_message
		 	WHERE ";
		//店铺推荐
		if($flag=='0'){
			$this->sql=$this->sql."shopid=".$shopid." AND 
		 		senderid=".$userid." AND 
		 		sendflg=1" ;
		}
		//商品推荐
		if($flag=='1'){
			$this->sql=$this->sql."goodsid=".$shopid." AND 
		 		senderid=".$userid." AND 
		 		sendflg=1" ;
		}
		$rs = $this->db->exceuteQuery($this->sql);
		return $rs[0];
	}
	//推荐店铺（或商品）时往消息表中追加记录（给朋友发消息）
	function recomShopInsertMess($data,$flag){
		$this->sql = "
			INSERT INTO
				t_message(
					senderid,
					receiverid,
					content,
					title,
					createtime,
					type,
					garbageflg,
					sendflg,
					receiveflg,
					readflg,
			";
			//店铺推荐
			if($flag=='0'){
				$this->sql=$this->sql."
					shopid )";
			}
			//商品推荐
			if($flag=='1'){
				$this->sql=$this->sql."
					goodsid )";
			}
			$this->sql=$this->sql."
				SELECT
				".$data['senderid']."
				,friendid".
				",'".$data['content'].
				"','".$data['title'].
				"',NOW(),".$data['type'].
				",".$data['garbageflg'].
				",".$data['sendflg'].
				",".$data['receiveflg'].
				",".$data['readflg'];
				//店铺推荐
				if($flag=='0'){
					$this->sql=$this->sql.",".$data['shopid'];
				}	
				//商品推荐
				if($flag=='1'){
					$this->sql=$this->sql.",".$data['goodsid'];
				}	
				$this->sql=$this->sql.
					" FROM
						t_user_friends
					WHERE
						idt_user=".$data['senderid']." AND
						overflg=0";
		$rs = $this->db->exceuteUpdate($this->sql);
		return mysql_insert_id();
	}
	//推荐店铺（或商品）时往消息表中追加记录（已发送消息）
	function InsertmyMess($data1,$flag){
		$this->sql = "
			INSERT INTO
				t_message(
					senderid,
					receiverid,
					content,
					title,
					createtime,
					type,
					garbageflg,
					sendflg,
					receiveflg,
					readflg,";
				//店铺推荐
				if($flag=='0'){
					$this->sql=$this->sql."shopid ";
				}	
				//商品推荐
				if($flag=='1'){
					$this->sql=$this->sql."goodsid ";
				}$this->sql=$this->sql.")
				VALUES(
					".$data1['senderid']."
					,".$data1['recriverid'].
					",'".$data1['content'].
					"','".$data1['title'].
					"',NOW(),".$data1['type'].
					",".$data1['garbageflg'].
					",".$data1['sendflg'].
					",".$data1['receiveflg'].
					",".$data1['readflg'];
				//店铺推荐
				if($flag=='0'){
					$this->sql=$this->sql.",".$data1['shopid'].")";
				}	
				//商品推荐
				if($flag=='1'){
					$this->sql=$this->sql.",".$data1['goodsid'].")";
				}	
			$rs = $this->db->exceuteUpdate($this->sql);
			return mysql_insert_id();
	}
	//推荐赢校币（商品或店铺）
	function recomShopgetcoins($data2){
		$this->sql = "
			INSERT INTO
				t_getcoins(
					idt_user,
					coins,
					type,
					getflg
				)
			VALUES
			(
			".$data2['idt_user'].
			",".$data2['coins'].
			",".$data2['type'].
			",".$data2['getflg']."	
			)		
			"	
	 	;
		$rs = $this->db->exceuteUpdate($this->sql);
		return mysql_insert_id();
	}
	//同一天推荐商品、店铺的次数
	function recNumShop($userid,$type){
		$this->sql = "
			SELECT 
				count(1) 
			FROM 
				t_message 
			WHERE
				senderid='".$userid."' AND
				receiverid='".$userid."' AND
				type='".$type."' AND
				date_format(createtime,'%Y-%m-%d')=date_format(NOW(),'%Y-%m-%d')"
		 	;
		$rs = $this->db->exceuteQuery($this->sql);
		return $rs[0];
	}
	//删除收藏	
	function deletecoll($data){
		$this->sql = "
			DELETE	FROM 
				t_goods_collect 
			WHERE 
				idt_user='".$data['userid']."' AND
				idt_goods='".$data['goodsid']."'
		";
		$rs = $this->db->exceuteUpdate($this->sql);
		return mysql_insert_id();
	}
	
}




?>