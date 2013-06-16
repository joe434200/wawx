<?php
require_once('StringUtil.php');
require_once('DateUtil.php');
require_once('SupportException.php');
require_once('MessageUtil.php');

final class ValidateUtil
{

    /**
     * 必須入力チェックを行う。<br>
     *
     * @param string $value チェックする対象値
     * @param string $msgParam メッセージパラメタ
     * @param ServiceException $errorCode エラー
     * @return チェック結果
     */
    public static function isNotBlank($value, $msgParam, $errorCode)
    {
        if (!StringUtil::isNotBlank($value)) {
            $m = sprintf(MessageUtil::getMessage('W0001'), $msgParam);
            $errorCode->addError('W0001', $m);
            return false;
        }
        return true;
    }
	/**
	 * パスワード入力チェックを行う。
	 *
	 * @param string $value チェックする対象値
     * @param string $msgParam メッセージパラメタ
     * @param ServiceException $errorCode エラー
     * @return チェック結果
	 */
	function isPassWordCheck($pwd1,$pwd2, $msgParam, $errorsCode) {
	    if(StringUtil::isNotBlank($pwd1)) {	
	    	if (!($pwd1 == $pwd2)){
	    		$m = sprintf(MessageUtil::getMessage('W0012'), $msgParam);
                $errorCode->addError('W0012', $m);
	            return false;
	    	}
	    }
	    return true;
	}
    /**
     * 半角英数字チェックを行う。<br>
     *
     * @param string $value チェックする対象値
     * @param string $msgParam メッセージパラメタ
     * @param ServiceException $errorCode エラー
     * @return チェック結果
     */
    public static function isHankaku($value, $msgParam, $errorCode)
    {
        if (!StringUtil::isNotBlank($value)) {
            return true;
        }
        if (mb_ereg('[^0-9a-zA-Z]', $value)) {
            $m = sprintf(MessageUtil::getMessage('W0002'), $msgParam);
            $errorCode->addError('W0002', $m);
            return false;
        }
        return true;
    }

    /**
     * 日付チェックを行う。<br>
     *
     * @param string $value チェックする対象値
     * @param string $msgParam メッセージパラメタ
     * @param ServiceException $errorCode エラー
     * @return チェック結果
     */
    public static function isDate($value, $msgParam, $errorCode)
    {
        if (!StringUtil::isNotBlank($value)) {
            return true;
        }
        if (!DateUtil::isDate($value)) {
            $m = sprintf(MessageUtil::getMessage('W0003'), $msgParam);
            $errorCode->addError('W0003', $m);
            return false;
        }
        return true;
    }

    /**
     * 浮動数字チェックを行う。<br>
     *
     * @param string $value チェックする対象値
     * @param string $msgParam メッセージパラメタ
     * @param ServiceException $errorCode エラー
     * @return チェック結果
     */
    public static function isFloat($value, $msgParam, $errorCode)
    {
        if (!StringUtil::isNotBlank($value)) {
            return true;
        }
        $pattern = '/^[+|-]?\d*\.?\d*$/';
        if (!preg_match($pattern, $value)) {
            $m = sprintf(MessageUtil::getMessage('W0011'), $msgParam);
            $errorCode->addError('W0011', $m);
            return false;
        }
        return true;
    }

    /**
     * 数字チェックを行う。<br>
     *
     * @param string $value チェックする対象値
     * @param string $msgParam メッセージパラメタ
     * @param ServiceException $errorCode エラー
     * @return チェック結果
     */
    public static function isSuuji($value, $msgParam, $errorCode)
    {
        if (!StringUtil::isNotBlank($value)) {
            return true;
        }
        $pattern = '/^[0-9]+$/';
        if (!preg_match($pattern, $value)) {
            $m = sprintf(MessageUtil::getMessage('W0006'), $msgParam);
            $errorCode->addError('W0006', $m);
            return false;
        }
        return true;
    }

    /**
     * サイズチェックを行う。<br>
     *
     * @param string $value チェックする対象値
     * @param int $length 最大入力可能バイト数
     * @param string $msgParam メッセージパラメタ
     * @param ServiceException $errorCode エラー
     * @return チェック結果
     */
    public static function isAllowedLength($value, $length, $msgParam, $errorCode)
    {
        if (!StringUtil::isNotBlank($value)) {
            return true;
        }

        if (strlen($value) > $length) {
            $m = sprintf(MessageUtil::getMessage('W0005'), $msgParam, $length);
            $errorCode->addError('W0005', $m);
            return false;
        }
        return true;
    }

    /**
     * 文字列の大小比較を行う。（From-Toチェック）<br>
     *
     * @param string $fromValue 対象値（小とする値）
     * @param string $toValue 対象値（大とする値）
     * @param string $msgParam1 メッセージパラメタリスト（対象項目名、fromValueの項目名）
     * @param string $msgParam2 メッセージパラメタリスト（対象項目名、toValueの項目名）
     * @param ServiceException $errorCode エラー
     * @return チェック結果
     */
    public static function compareString($fromValue, $toValue, $msgParam1, $msgParam2, $errorCode)
    {
        if (strcmp($fromValue, $toValue) > 0) {
            $m = sprintf(MessageUtil::getMessage('W0007'), $msgParam1, $msgParam2);
            $errorCode->addError('W0007', $m);
            return false;
        }
        return true;
    }

    /**
     * 文字列の大小比較を行う。（From-Toチェック）<br>
     *
     * @param string $fromValue 対象値（小とする値）
     * @param string $toValue 対象値（大とする値）
     * @param string $msgParam1 メッセージパラメタリスト（対象項目名、fromValueの項目名）
     * @param string $msgParam2 メッセージパラメタリスト（対象項目名、toValueの項目名）
     * @param ServiceException $errorCode エラー
     * @return チェック結果
     */
    public static function equals($fromValue, $toValue, $msgParam1, $msgParam2, $errorCode)
    {
        if (strcmp($fromValue, $toValue) != 0) {
            $m = sprintf(MessageUtil::getMessage('W0008'), $msgParam1, $msgParam2);
            $errorCode->addError('W0008', $m);
            return false;
        }
        return true;
    }

    /**
     * メールをチェックする。<br>
     *
     * @param string $value チェックする対象値
     * @param string $msgParam メッセージパラメタ
     * @param ServiceException $errorCode エラー
     * @return チェック結果
     */
    public static function isMail($value, $msgParam, $errorCode)
    {
        if (!StringUtil::isNotBlank($value)) {
            return true;
        }
        $pattern = '/^[-._a-zA-Z0-9\/]+@[-._a-z0-9]+\.[a-z]{2,4}$/';
        if (!preg_match($pattern, $value)) {
            $m = sprintf(MessageUtil::getMessage('W0009'), $msgParam);
            $errorCode->addError('W0009', $m);
            return false;
        }
        return true;
    }

    /**
     * 文字列を既に存在チェックする。<br>
     *
     * @param string $value チェックする対象値
     * @param array $data チェックする対象値
     * @param string $msgParam メッセージパラメタ
     * @param ServiceException $errorCode エラー
     * @return チェック結果
     */
    public static function isExist($value, $data, $msgParam, $errorCode)
    {
        if (!StringUtil::isNotBlank($value)) {
            return true;
        }
        foreach ($data as $v) {
            if (StringUtil::equals($v, $value)) {
                $m = sprintf(MessageUtil::getMessage('W0010'), $msgParam);
                $errorCode->addError('W0010', $m);
                return false;
            }
        }
        return true;
    }

    /**
     * 指定ページのアクション(module)にアクセスできるかどうかのチェック<br>
     *
     * @param int     $pageId ページID
     * @param object  $right  カレントユーザの権限オブジェクト
     * @param string  $module 処理アクション
     * @param string $msgParam メッセージパラメタ
     * @param ServiceException $errorCode エラー
     *
     * @return bool アクセス可否
     */
    public static function isAccessible($pageId, $right, $module, $msgParam, $error)
    {
        // アクセス権限が無い場合はエラー対象にメッセージを埋め込む
        if (!Authentication::hasAccessAuth($pageId, $right, $module)) {
            $m = sprintf(MessageUtil::getMessage('E0007'), $msgParam);
            $error->addError('E0007', $m);
            return false;
        }
        return true;
    }

    /**
     * セッションの有効性チェック<br>
     *
     * @param string  $userId セッションから取得したユーザID
     * @param ServiceException $errorCode エラー
     *
     * @return bool 有効性
     */
    public static function isValidSession($userId, $error)
    {
        // ユーザIDが空白の場合はエラーとする
        if (!StringUtil::isNotBlank($userId)) {
            $m = sprintf(MessageUtil::getMessage('E0008'));
            $error->addError('E0008', $m);
            return false;
        }
        return true;
    }

}