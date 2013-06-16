<?php 
require_once('BaseBusiness.php');
require_once('DateUtil.php');
require_once('SupportException.php');
require_once('PageSplitBusiness.php');

class SearchBusiness extends PageSplitBusiness{
	private $totalRows;
	private $isTotalRows1 = false;
	private $isTotalRows2 = false;
	//获得一个本地商户
	function getAaroundShop($id){
		$this->sql = "
				SELECT 
					ID,
					`name` 
				FROM 
					m_shop_classfy
				WHERE 
					ID='".$id."'";
		$rs = $this->db->exceuteQuery($this->sql);
		return $rs[0];
	}
	//获得搜索店铺的家数
	function getSearchShopNum($aract,$searchkey){
		$this->sql = "
			SELECT 
					count(1)
			FROM 
				t_shopinfo ts
			WHERE 
				ts.bigtypeid='".$aract."' AND
				ts.verifystate=2 AND
				ts.isdelete=0 AND
				ts.shopname like '%".$searchkey."%'		
		";
		$rs = $this->db->exceuteQuery($this->sql);
		return $rs[0];
	}	
	//获得大搜索店铺的家数
	function getbigSearchShopNum($searchkey){
		$this->sql = "
			SELECT 
					count(1)
			FROM 
				t_shopinfo ts
			WHERE 
				ts.verifystate=2 AND
				ts.isdelete=0 AND
				ts.shopname like '%".$searchkey."%'		
		";
		$rs = $this->db->exceuteQuery($this->sql);
		return $rs[0];
	}	
	//获得搜索商品的数量
	function getSearchGoodsNum($aract,$searchkey){
		$this->sql = "
				SELECT  
					count(1)
				FROM 
					t_shopinfo ts,
					t_goods tg
				WHERE 
					ts.bigtypeid='".$aract."' AND
					tg.shopid=ts.ID AND
					tg.isonsale=0 AND
					tg.isdelete=0 AND
					tg.goodsname like '%".$searchkey."%'	
		";
		$rs = $this->db->exceuteQuery($this->sql);
		return $rs[0];
	}
	//获得大搜索商品的数量
	function getbigSearchGoodsNum($searchkey){
		$this->sql = "
				SELECT  
					count(1)
				FROM 
					t_goods tg
				WHERE 
					tg.isonsale=0 AND
					tg.isdelete=0 AND
					tg.goodsname like '%".$searchkey."%'	
		";
		$rs = $this->db->exceuteQuery($this->sql);
		return $rs[0];
	}
	//获得搜索商品的结果
	function getSearchGoods($act,$currpage,$numbersperpage,$aract,$searchkey,$order){
		$this->sql="
			SELECT  
				tg.ID,
				tg.goodsname,
				tg.marketprice,
				tg.shopprice,
				tg.newimg,
				ROUND(tg.shopprice/tg.marketprice*10,1) AS discountsp
			FROM 
				t_shopinfo ts,
				t_goods tg
			WHERE 
				ts.bigtypeid='".$aract."' AND
				tg.shopid=ts.ID AND
				tg.isonsale=0 AND
				tg.isdelete=0 AND
				tg.goodsname like '%".$searchkey."%'			
		";
		$sqlcount="
			SELECT  
				count(1)
			FROM 
				t_shopinfo ts,
				t_goods tg
			WHERE 
				ts.bigtypeid='".$aract."' AND
				tg.shopid=ts.ID AND
				tg.isonsale=0 AND
				tg.isdelete=0 AND
				tg.goodsname like '%".$searchkey."%'
		";
		//销量排序
		if($act=='mknum1'){
			$this->sql = $this->sql."
		  		ORDER BY
					tg.makenum ";
			$this->sql .= $order=="ESC" ? "" : " DESC";
		}
		//价格排序
		elseif($act=='price'){
			$this->sql = $this->sql."
		  		ORDER BY
					tg.shopprice ";
				$this->sql .= $order=="ESC" ? "" : " DESC";
		}
		//折扣排序
		elseif($act=='discount1'){
			$this->sql = $this->sql."
		  		ORDER BY
					discountsp ";
				$this->sql .= $order=="ESC" ? "" : " DESC";
		}
		//上架时间
		elseif($act=='addtime'){
			$this->sql = $this->sql."
		  		ORDER BY
					addtime ";
				$this->sql .= $order=="ESC" ? "" : " DESC";
		}
		//默认排序评论
		else {
			$this->sql = $this->sql."
		  		ORDER BY
					tg.commentnum ";
				$this->sql .= $order=="ESC" ? "" : " DESC";
		}
		//查询总条数	
		if (!$this->isTotalRows2){
		    $this->setTotalRow($this->buildTotalRow($sqlcount)); 
			$this->isTotalRows2 = true;
		}   
		$rs = $this->QueryForPageSplit($this->sql, $currpage, $numbersperpage);
		return $rs;
	}	
	//获得大搜索商品的结果
	function getbigSearchGoods($act,$currpage,$numbersperpage,$searchkey){
		$this->sql="
			SELECT  
				tg.ID,
				tg.goodsname,
				tg.marketprice,
				tg.shopprice,
				tg.newimg,
				ROUND(tg.shopprice/tg.marketprice*10,1) AS discountsp
			FROM 
				t_goods tg
			WHERE 
				tg.isonsale=0 AND
				tg.isdelete=0 AND
				tg.goodsname like '%".$searchkey."%'			
		";
		$sqlcount="
			SELECT  
				count(1)
			FROM 
				t_goods tg
			WHERE 
				tg.isonsale=0 AND
				tg.isdelete=0 AND
				tg.goodsname like '%".$searchkey."%'
		";
		//销量排序
		if($act=='mknum1'){
			$this->sql = $this->sql."
		  		ORDER BY
					tg.makenum DESC ";
		}
		//价格排序
		elseif($act=='price'){
			$this->sql = $this->sql."
		  		ORDER BY
					tg.shopprice ";
		}
		//折扣排序
		elseif($act=='discount1'){
			$this->sql = $this->sql."
		  		ORDER BY
					discountsp ";
		}
		//上架时间
		elseif($act=='addtime'){
			$this->sql = $this->sql."
		  		ORDER BY
					addtime DESC ";
		}
		//默认排序评论
		else {
			$this->sql = $this->sql."
		  		ORDER BY
					tg.commentnum DESC ";
		}
		//查询总条数	
		if (!$this->isTotalRows2){
		    $this->setTotalRow($this->buildTotalRow($sqlcount)); 
			$this->isTotalRows2 = true;
		}   
		$rs = $this->QueryForPageSplit($this->sql, $currpage, $numbersperpage);
		return $rs;
	}	
	//获得搜索商户的结果
	function getSearchShop($act,$currpage,$numbersperpage,$aract,$searchkey,$order){
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
					ts.bigtypeid= '".$aract."' AND
					ts.verifystate=2 AND 
					ts.isdelete=0 AND 
					ts.shopname like '%".$searchkey."%'
				GROUP BY
							sid 
				ORDER BY
					mknum  ";
				$this->sql .= $order=="ESC" ? "" : " DESC";
			//计算总条数
			$sqlcount = "SELECT 
							count(1)
						FROM 
							t_shopinfo ts
							left  join t_goods tg on tg.shopid=ts.ID
						WHERE 
							ts.bigtypeid= '".$aract."' AND
							ts.verifystate=2 AND
							ts.isdelete=0 AND
							ts.shopname like '%".$searchkey."%'";		
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
					ts.bigtypeid='".$aract."' AND
					ts.verifystate=2 AND
					ts.isdelete=0 AND
					ts.shopname like '%".$searchkey."%'";
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
						ts.bigtypeid='".$aract."' AND
						ts.verifystate=2 AND
						ts.isdelete=0 AND
						ts.shopname like '%".$searchkey."%'
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
							ts.bigtypeid='".$aract."' AND
							ts.verifystate=2 AND
							ts.isdelete=0 AND
							ts.shopname like '%".$searchkey."%'";
			}
			//查询总条数	
			if (!$this->isTotalRows1){
			    $this->setTotalRow($this->buildTotalRow($sqlcount)); 
				$this->isTotalRows1 = true;
			}   
			$rs = $this->QueryForPageSplit($this->sql, $currpage, $numbersperpage);
			return $rs;
	}
	//获得大搜索商户的结果
	function getbigSearchShop($act,$currpage,$numbersperpage,$searchkey){
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
					ts.verifystate=2 AND 
					ts.isdelete=0 AND 
					ts.shopname like '%".$searchkey."%'
				GROUP BY
					sid 
				ORDER BY
					mknum  DESC ";
			//计算总条数
			$sqlcount = "SELECT 
							count(1)
						FROM 
							t_shopinfo ts
							left  join t_goods tg on tg.shopid=ts.ID
						WHERE 
							ts.verifystate=2 AND
							ts.isdelete=0 AND
							ts.shopname like '%".$searchkey."%'";		
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
					ts.verifystate=2 AND
					ts.isdelete=0 AND
					ts.shopname like '%".$searchkey."%'";
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
						ts.verifystate=2 AND
						ts.isdelete=0 AND
						ts.shopname like '%".$searchkey."%'
					GROUP BY
							sid  
					ORDER BY commentnum DESC				
					";
			}
			//入驻时间排序
			if($act=='effecttime'){
				$this->sql = $this->sql."
		  			ORDER BY
						ts.effecttime DESC ";
			}
			//折扣排序
			if($act=='discount'){
				$this->sql = $this->sql."
		  			ORDER BY
						ts.schooldiscount ";
			}
			//关注次数排序
			if(empty($act)){
				$this->sql = $this->sql."
		  			ORDER BY
						ts.focusnum DESC ";
			}
			//计算总条数
			$sqlcount = "SELECT 
							count(1)
						FROM 
							t_shopinfo ts
						WHERE 
							ts.verifystate=2 AND
							ts.isdelete=0 AND
							ts.shopname like '%".$searchkey."%'";
			}
			//查询总条数	
			if (!$this->isTotalRows1){
			    $this->setTotalRow($this->buildTotalRow($sqlcount)); 
				$this->isTotalRows1 = true;
			}   
			$rs = $this->QueryForPageSplit($this->sql, $currpage, $numbersperpage);
			return $rs;
	}
	//判断是不是在热门搜索表中
	function isHotSearch($searchkey){
		$this->sql = "
			SELECT 
				*
			FROM 
				t_hot_search
			WHERE 
				keyword like '%".$searchkey."%'		
			";
		$rs = $this->db->exceuteQuery($this->sql);
		return $rs[0];
	}
	//更新热门搜索次数
	function updateHotSearch($searchkey){
		$this->sql = "
			UPDATE 
				t_hot_search
			SET
				count=count+1
			WHERE
				keyword like '%".$searchkey."%'	
		";
		$rs = $this->db->exceuteUpdate($this->sql);
		return mysql_insert_id();
	}
	//添加热门搜索
	function insertHotSearch($searchkey){
		$this->sql = "
			INSERT INTO 
				t_hot_search(keyword,count)
			VALUES
				('".$searchkey."',1)";
		$rs = $this->db->exceuteUpdate($this->sql);
		return mysql_insert_id();
	}
	//查询所有热门搜索	
	function selectHotSearch(){
		$this->sql = "
			SELECT * FROM t_hot_search ORDER BY count DESC limit 8
		";
		$rs = $this->db->exceuteQuery($this->sql);
		return $rs;
	}	
			
	
}
?>