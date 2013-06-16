<?php
//require_once("Const.php");
//require_once("StringEncrypt.php");
final class StringUtil
{
    /**
     * 文字列が入力されているかどうかをチェックする。<br>
     *
     * @param string $value
     * @return チェック結果
     */
    public static function isNotBlank($value)
    {
        if (is_null($value) || mb_strlen($value) <= 0) {
            return false;
        }
        return true;
    }

    /**
     * 文字列が入力されているかどうかをチェックする。<br>
     *
     * @param string $value
     * @return チェック結果
     */
    public static function equals($from, $to)
    {
        if (StringUtil::isNotBlank($from) && StringUtil::isNotBlank($to)) {
            return strcmp($from, $to) == 0;
        }
        return false;
    }

    /**
     * 「全角」英数字を「半角」英数字に変換
     *
     * @param string $value
     * @return 「半角」英数字
     */
    public static function toHankaku($value)
    {
        return mb_convert_kana($value, "a", "UTF-8");
    }

    /**
     * selectを選択されるの文字列を取得する。<br>
     *
     * @param string $var
     * @param string $value
     * @return 選択されるの文字列
     */
    public static function isSelected($var, $value)
    {
        if ($var == $value) {
            return "selected";
        }
        return "";
    }

    /**
     * checkboxを選択されるの文字列を取得する。<br>
     *
     * @param string $var
     * @param string $value
     * @return 選択されるの文字列
     */
    public static function isChecked($var, $value)
    {
        if ($var == $value) {
            return "checked";
        }
        return "";
    }

    /**
     * ボタンを使えるの文字列を取得する。<br>
     *
     * @param string $value
     * @return 使えれるの文字列
     */
    public static function isDisabled($value)
    {
        if ($value != "1") {
            return "disabled";
        }
        return "";
    }


    /**
     * 文字列のエスケープを解除する。<br>
     *
     * @param string $value 文字列
     * @return 文字列
     */
    public static function inputFilter($value)
    {
        if (get_magic_quotes_gpc()) {
            return stripslashes($value);
        }
        return $value;
    }

    /**
     * 文字列のエスケープをする。<br>
     *
     * @param string $value 文字列
     * @return 文字列
     */
    public static function addStrips($value)
    {
        return addslashes($value);
    }

    /**
     * 文字列のHTMLエスケープを解除する。<br>
     *
     * @param string $value 文字列
     * @return 文字列
     */
    public static function encodeHtml($value)
    {
        return htmlspecialchars(StringUtil::inputFilter($value));
    }

    /**
     * 文字列のHTMLエスケープをする。<br>
     *
     * @param string $value 文字列
     * @return 文字列
     */
    public static function decodeHtml($value)
    {
        return htmlspecialchars_decode($value);
    }

    public static function getRoleList()
    {
        $data = array('1' => '一般社員',
                      '2' => '課長',
                      '3' => '部長',
                      '4' => '顧問',
                      '5' => '事業所長',
                      '6' => '管理部長',
                      '7' => '社長');
        return $data;

    }

    public static function getNegotiatelMemoRoleList()
    {
        $data = array('0' => '無し',
                      '1' => '有り');
        return $data;
    }

    public static function getNegotiateRoleList()
    {
        $data = array('0' => '無し',
                      '1' => '有り');
        return $data;
    }

    public static function getStatus() {
        $data = array('1' => '承認',
                      '2' =>'条件付き承認',
                      '3' => '却下',
                      '4' => '再提出');
        return $data;
    }

	public static function getNegotiateStatus() {
    	$data = array('1' => '審議中',
                      '2' =>'許可',
                      '3' => '却下',
                      '4' => '再提出');
        return $data;
    }

    public static function getRepairStatus() {
        $data = array('1' => '在庫',
                      '2' =>'貸出',
                      '3' => '返却',
                      '4' => '検証',
                      '5' => '修理',
                      '6' => '修理戻り',
                      '7' => '再修理');
        return $data;
    }

    public static function getUserPrinterStatus() {
        $data = array('1' => '予かり受付',
                      '2' =>'検証作業',
                      '3' => '修理',
                      '4' => '修理戻り',
                      '5' => '返却',
                      '6' => '再修理');
        return $data;
    }

    public static function getOrderShop() {
        $data = array('1' => 'ST',
                      '2' =>'ヨドバシカメラ',
                      );
        return $data;
    }

	public static function getCategory() {
    	$data = array('1' => 'お詫び状');
    	return $data;
    }

    public static function getWrongFlg() {
    	$data = array('0' => '誤購入なし',
    				  '1' => '誤購入あり');
    	return $data;
    }

    public static function getSupportStatus() {
    	$data = array('0' => '受付',
    				  '1' => '代替品送付',
    				  '2' => '受取完了',
    				  '3' => '受取期限超過',
    				  '4' => '保留・コールバック',
    				  '5' => '不具合検証結果登録済',
    				  '6' => '検証報告済',
    				  '7' => '解析期限超過');
    	return $data;
    }

	public static function getMonthEn() {
    	$data = array('01' => 'january',
    				  '02' => 'february',
    				  '03' => 'march',
    				  '04' => 'april',
    				  '05' => 'may',
    				  '06' => 'june',
    				  '07' => 'july',
    				  '08' => 'august',
    				  '09' => 'septemper',
    				  '10' => 'october',
    				  '11' => 'november',
    				  '12' => 'december');
    	return $data;
    }

    public static function getObjectFlg() {
        $data = array('0' => 'インクカートッジの補償',
                      '1' => 'プリンターの補償',
                      '2' => 'その他');
        return $data;
    }

    public static function getClaimFlg() {
        $data = array('0' => '初期クレーム',
                      '1' => '再クレーム');
        return $data;

    }

    public static function getDifficultyContent() {
        $data = array('0' => '印字不良',
                      '1' => '認識不良',
                      '2' => 'インク漏れ',
                      '3' => 'プリンターにエラーが発生');
        return $data;

    }

    public static function getCompensationRemark() {
        $data = array('0' => '使用したくない。代替品手配をご了承いただけなかった。',
                      '1' => 'プリンタ不具合の可能性があり、純正で試して頂く為、弊社製品の購入代金を返金する。',
                      '2' => '純正では問題なく印字できた為、返金を希望された。',
                      '3' => '代替品でも回復せず、これ以上使用したくないと返金を希望された。',
                      '4' => '当社カートリッジを使用し、プリンターが故障した。メーカーより、当社インクカートリッジが故障の原因の可能性があると記載されている。',
                      '5' => '当社インクに起因するのか、補償する必要があるのか判断は難しいが、これ以上のトラブルを回避する為、修理代金、新プリンタ購入代金を補償せざる得ない',
                      '6' => '販売店、販社の意向があり、補償せざるえない。',
                      '7' => 'インク漏れ等で、お客様、衣服、家具その他を汚した為',
                      '8' => '赤外線チップでない為（代替品が用意できない）');
        return $data;
    }

    public static function makeGroupTree($datas, $pid)
    {
        $result = array();
        $I = array();
        foreach($datas as $t) {
            if($t['parent_id'] == $pid) {
                $i = count($result);
                $t['depth'] = 1;
                $result[$i] = $t;
                $I[$t['idm_group']] = &$result[$i];
            } else {
                $i = count(@$I[$t['parent_id']]['child']);
                $depth = $I[$t['parent_id']]['depth'];
                $t['depth'] = $depth + 1;
                $I[$t['parent_id']]['child'][$i] = $t;
                $I[$t['idm_group']] = &$I[$t['parent_id']]['child'][$i];
            }
        }
        $I = null;
        return $result;
    }

 public static function makeGroupTreeIncludeSelf($datas, $pid)
    {
        $result = array();
        $I = array();
        foreach($datas as $t) {
            if($t['idm_group'] == $pid) {
                $i = count($result);
                $t['depth'] = 1;
                $result[$i] = $t;
                $I[$t['idm_group']] = &$result[$i];
            } else {
                $i = count(@$I[$t['parent_id']]['child']);
                $depth = $I[$t['parent_id']]['depth'];
                $t['depth'] = $depth + 1;
                $I[$t['parent_id']]['child'][$i] = $t;
                $I[$t['idm_group']] = &$I[$t['parent_id']]['child'][$i];
            }
        }
        $I = null;
        return $result;
    }

    public static function makeGroupSelect($datas, &$str, $id = 1)
    {

        foreach ($datas as $data) {
            $tabs = array();
            if ($data['depth'] > 1) {
                for ($i = 1; $i < $data['depth']; $i++) {
                    $tabs[] = '&nbsp;&nbsp;';
                }
            }
            $selected = $data['idm_group'] == $id ? 'selected' : '';
            $str .= '<option value="' . $data['idm_group'] . '" ' . $selected . '>' . implode('', $tabs) . $data['name_jp'] . '</option>';
            if ($data['child']) {
                self::makeGroupSelect($data['child'], $str, $id);
            }
        }
    }

    public static function getAllGroupName($groupId, $groups) {
        foreach ($groups as $group) {
            $name = array();
            if ($group['idm_group'] == $groupId) {
                $name['1'] = $group['name_jp'];
            } else if ($group['child']) {
                self::getSubGroupName($groupId, $group['child'], $name);
            }
            if (count($name)) {
                return $name;
            }
        }
        return array();
    }

    public static function getSubGroupName($groupId, $groups, &$name = array()) {
        foreach ($groups as $group) {
            if ($group['idm_group'] == $groupId) {
                $name[$group['depth']] = $group['name_jp'];
            } else if ($group['child']) {
                self::getSubGroupName($groupId, $group['child'], $name);
                if (count($name)) {
                    $name[$group['depth']] = $group['name_jp'];
                }
            }
        }
    }

    public static function getCapacityList()
    {
        return array('1' => '普通容量');
    }

    public static function getUnitList()
    {
        return array('1' => '単品');
    }

    public static function getColorList()
    {
        return array('1' => '黒');
    }
}