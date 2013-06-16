<?php 
require_once('BaseBusiness.php');
require_once('DateUtil.php');
require_once('SupportException.php');
class CommentBusiness extends  BaseBusiness{
	//向商品评论表中追加一条评论
	function insertgoodscom($data){
		$this->sql = "
			INSERT INTO t_goods_comment (
				idt_goods,
				username,
				content,
				commenttime,
				userip,
				isshow,
				schoolnum,
				idt_user
			) VALUES(
				'".$data['idt_goods'].
				"','".$data['username'].
				"','".$data['content'].
				"',NOW()".
				",'".$data['userip'].
				"',".$data['isshow'].
				",".$data['schoolnum'].
				",'".$data['idt_user'].
			"')"
		;
		$rs = $this->db->exceuteUpdate($this->sql);
		return mysql_insert_id();
	}
	//审核后商品表中对应商品的评论次数加1
	function gcommentnumadd($goodsid){
		$this->sql = "
			UPDATE 
				t_goods
			SET
				commentnum=commentnum+1
			WHERE
				ID=".$goodsid
		;
		$rs = $this->db->exceuteUpdate($this->sql);
		return mysql_insert_id();
	}
	//向店铺评论表中追加一条评论
	function insertshopcom($data){
		$this->sql = "
			INSERT INTO t_shop_comment (
				idt_shopinfo,
				username,
				content,
				commentrank,
				service,
				taste,
				environment,
				costperformance,
				commenttime,
				userip,
				schoolnum,
				isshow,
				idt_user
			) VALUES(
				'".$data['idt_shopinfo'].
				"','".$data['username'].
				"','".$data['content'].
				"','".$data['commentrank'].
				"','".$data['service'].
				"','".$data['taste'].
				"','".$data['environment'].
				"','".$data['costperformance'].
				"',NOW()".
				",'".$data['userip'].
				"',".$data['schoolnum'].
				",".$data['isshow'].
				",'".$data['idt_user'].
			"')"
		;
		$rs = $this->db->exceuteUpdate($this->sql);
		return mysql_insert_id();		
	}
	//审核后店铺表中对应店铺的评论次数加1
	function scommentnumadd($shopid){
		$this->sql = "
			UPDATE 
				t_shopinfo
			SET
				commentnum=commentnum+1
			WHERE
				ID=".$shopid
		;
		$rs = $this->db->exceuteUpdate($this->sql);
		return mysql_insert_id();
	}
	//获得同一天用户对商品、店铺的评论次数
	function commentnumtoday($userid,$table){
		$this->sql = "
			SELECT 
				count(1) 
			FROM 
				".$table." 
			WHERE
				idt_user='".$userid."' AND
				date_format(commenttime,'%Y-%m-%d')=date_format(NOW(),'%Y-%m-%d')"
		;
		$rs = $this->db->exceuteQuery($this->sql);
		return $rs[0];
	}
	//评论赢校币（商品或店铺）
	function comShopgetcoins($data2){
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
}

?>