<?php
//require_once("Const.php");
//require_once("StringEncrypt.php");
final class AppendStringUtil
{
    public static function getImportant()
    {
        $tree = array('0' => '緊急',
                      '1' => '高',
                      '2' => '普通'
					);
        return $tree;

    }


    public  static  function getReadFlag(){
    	$readarr = array('0'=>'未読',
    					 '1'=>'既読'
    					);
    	return $readarr;
    }

    public  static function getUserType(){
    	$usertype=array(
    					'0'=>'一般ユーザー',
    					'1'=>'サポート',
    					'2'=>'システム'
    					);
    	return $usertype;
    }
    public static function getEmployType()
    {
    	$employtype=array(
    		'0'=>'正社員',
    		'1'=>'アルバイト'
    	);

    	/*$employtype=array(
    		'0'=>'正社員',
    		'1'=>'契約社員',
    		'2'=>'アルバイト'
    	);*/
    	return $employtype;
    }
	public  static function getUnitType(){
    	$unittype=array(
    					'0'=>'単品',
    					'1'=>'セット'
    					);
    	return $unittype;
    }
	public  static function getCapacityType(){
		//山寨： 0：普通容量　1：大容量　2：増量
    	$capacitytype=array(
    					'0'=>'普通容量',
    					'1'=>'大容量',
    					'2'=>'増量'
    					);
    	return $capacitytype;
    }
    public static function  getPureCapacityType()
    {
    	//正品： 0：普通容量　1：大容量　2：小容量
    	$capacitytype=array(
    					'0'=>'普通容量',
    					'1'=>'大容量',
    					'2'=>'小容量'
    					);
    	return $capacitytype;
    }

    public  static function getColorList() {
    	$colorlist = array(
    					'0'=>'黒',
    					'1'=>'シアン',
    					'2'=>'マゼンダ',
    					'3'=>'イエロー',
    					'4'=>'ライトシアン',
    					'13'=>'ライトマゼンタ',
    					'8'=>'フォトシアン',
						'9'=>'フォトマゼンダ',
    					'5'=>'グレー',
    					'7'=>'ダークイエロー',
    					'14'=>'フォトブラック',
    					'6'=>'マットブラック',
    					'11'=>'レッド',
    					'12'=>'グリーン',
    					'18'=>'ブルー',
    					'15'=>'6色一体型',
    					'16'=>'4色一体型',
    	                '10'=>'3色一体型',
    					'17'=>'カラー'
    					);
    	return $colorlist;
    }

    public static function getColorString() {

    	$colorstring="0:黒,1:シアン,2:マゼンダ,3:イエロー,4:ライトシアン,13:ライトマゼンタ,8:フォトシアン,9:フォトマゼンダ,5:グレー,7:ダークイエロー,14:フォトブラック,6:マットブラック,11:レッド,12:グリーン,18:ブルー,15:6色一体型,16:4色一体型,10:3色一体型,17:カラー";


    	return $colorstring;
    }

	public  static function getBrandType(){
    	$brandtype=array(
    					'0'=>'エコリカ',
    					'1'=>'プレジール',
    					'2'=>'エステー産業',
    					'3'=>'イノテック'
    					);
    	return $brandtype;
    }
	public  static function getHaveType(){
    	$havetype=array(
    					'0'=>'あり',
    					'1'=>'なし'

    					);
    	return $havetype;
    }
	public  static function getCompensateType(){
    	$havetype=array(
    					'0'=>'全額返金',
    					'1'=>'交渉全額での返金'
    					);
    	return $havetype;
    }
	public  static function getCompensateReason(){
    	$reason=array(
    					'0'=>'使用したくない。代替品手配をご了承いただけなかった。',
    					'1'=>'プリンタ不具合の可能性があり、純正で試して頂く為、弊社製品の購入代金を返金する。',
    					'2'=>'純正では問題なく印字できた為、返金を希望された。',
    					'3'=>'代替品でも回復せず、これ以上使用したくないと返金を希望された。',
    					'4'=>'当社カートリッジを使用し、プリンターが故障した。<br />メーカーより、当社インクカートリッジが故障の原因の可能性があると記載されている。 ',
    					'5'=>'当社インクに起因するのか、補償する必要があるのか判断は難しいが、<br />これ以上のトラブルを回避する為、修理代金、新プリンタ購入代金を補償せざる得ない',
    					'6'=>' 販売店、販社の意向があり、補償せざるえない。',
    					'7'=>'インク漏れ等で、お客様、衣服、家具その他を汚した為 ',
    					'8'=>'赤外線チップでない為（代替品が用意できない） '
    					);
    	return $reason;
    }

    public  static function getCheckContentResult()
    {
    	$claimtype=array(
    					'0'=>'その他',
    					'1'=>'カスレ',
    					'2'=>'ICチップ • 認識不良',
    					'3'=>'ヘッド不良',
    					'4'=>'インク漏れ',
    					'5'=>'誤購入',
    					'6'=>'サンプル送付',
    					);
    	return $claimtype;
    }

	public  static function getClaimType(){
    	$claimtype=array(
    					'0'=>'印字不良',
    					'1'=>'認識不良',
    					'2'=>'インク漏れ',
    					'3'=>'プリンターにエラーが発生'
    					);
    	return $claimtype;
    }
}