<?php
require_once('StringUtil.php');
require_once('LoggerManager.php');
class SupportException extends Exception
{
    // メッセージ配列
    var $errorMsg = array();
    var $logger;

    /**
     * construct メソッドが定義する。<br>
     */
    function SupportException($massage = '', $errorCode = null)
    {
        $this->logger = LoggerManager::getLogger('SupportException');
        if (StringUtil::isNotBlank($massage)) {
            $this->addError($errorCode, $massage);
        }
        parent::__construct($massage);
    }

    /**
     * メッセージのレコード数を取得する。<br>
     *
     * @return int メッセージのレコード数
     */
    function getCount()
    {
        return count($this->errorMsg);
    }

    /**
     　　　   * すべてメッセージを取得する。<br>
     　　　   *
     　　　   * @return array すべてメッセージ
     　　　   */
    function getErrors()
    {
        return $this->errorMsg;
    }

    /**
     　　　   * 指定のメッセージを取得する。<br>
     　　　   *
     　　　   * @return object メッセージ
     　　　   */
    function getError($index)
    {
        return $this->errorMsg[$index];
    }

    /**
     　　　   * メッセージを追加する。<br>
     　　　   *
     　　　   */
    function addError($errorCode, $msg)
    {
        $error = new stdClass();
        $error->errorCode = $errorCode;
        $error->message = $msg;
        $this->errorMsg[] = $error;
        unset($error);
    }

    /**
     　　　   * すべてエラーコードを取得する。<br>
     　　　   *
     　　　   */
    function getErrorCodes()
    {
        $codes = array();
        foreach ($this->errorMsg as $temp) {
            $codes[$temp->errorCode] = $temp->errorCode;
        }
        return implode(',', $codes);
    }

    function __toString()
    {
        $str = '';
        foreach ($this->errorMsg as $error) {
            $str .= $error->errorCode . ':' . $error->message . "\r\n";
        }
        return $str;
    }

    /**
     * destructメソッドが定義する。<br>
     */
    function __destruct()
    {
        unset($this->errorMsg);
    }

}
?>