<?php
require_once('LoggerManager.php');
require_once('SupportException.php');
require_once('MessageUtil.php');
require_once('StringUtil.php');
require_once('FileUtil.php');
/**
 * データベースに処理をする。�f�de�X����N���X�B
 *
 */
class DBUtil
{
    /* データベースのパラメータ*/
    var $host;
    var $database;
    var $user;
    var $password;

    /* private: configuration parameters */
    var $pconnect = false;
    /* private: result array and current row number */
    var $link_id = 0;
    var $query_id = 0;
    var $record = array();
    var $autoID;
    var $logger;

    /**
     * construct メソッドが定義する。<br>
     */
    function __construct()
    {
        $this->logger = LoggerManager::getLogger("DBUtil");
        $data = FileUtil::getConfig("DB");
        $this->host = $data["DB_HOST"];
        $this->database = $data["DB_NAME"];
        $this->user = $data["DB_USER"];
        $this->password = $data["DB_USER_PASSWORD"];
        $this->connect();
    }

    /**
     * �f�データベースにアクセスする。<br>
     */
    function connect()
    {
        if ($this->link_id == 0) {
            if ($this->pconnect) {
                $this->link_id = @mysql_pconnect($this->host, $this->user, $this->password);
            } else {
                $this->link_id = @mysql_connect($this->host, $this->user, $this->password);
            }
            if (!$this->link_id) {
                $this->logger->error("Mysql Connect Error in " . __FUNCTION__ . "():" . mysql_errno() . ":" . mysql_error());
                throw new SupportException(MessageUtil::getMessage("E0001"), "E0001");
            }

            if (!@mysql_select_db($this->database, $this->link_id)) {
                $this->logger->error("Mysql Select database Error in " . __FUNCTION__ . "():" . mysql_errno() . ":" . mysql_error());
                throw new SupportException(MessageUtil::getMessage("E0002"), "E0002");
            }
        }
        return $this->link_id;
    }

    /**
     * データベースに処理を更新する。<br>
     *
     * @param string $strsql SQL文
     * @return 更新結果
     */
    function exceuteUpdate($strsql = "")
    {
        if (empty($strsql)) {
            $this->logger->error("Mysql Error:" . __FUNCTION__ . "() strsql is empty!");
            throw new SupportException(MessageUtil::getMessage("E0003"), "E0003");
        }
        $this->logger->debug("SQL文：" . $strsql);

        if ($this->link_id == 0) {
            $this->connect();
        }

        @mysql_query("SET NAMES 'UTF8'");
        $this->query_id = @mysql_query($strsql, $this->link_id);
        // 追加後はautoID
        $this->autoID = @mysql_insert_id($this->link_id);
        if (!$this->query_id) {
            $this->logger->error("Mysql query fail,Invalid sql:" . $strsql . ".");
            throw new SupportException(sprintf(MessageUtil::getMessage("E0004"), $strsql), "E0004");
        }
        return $this->query_id;
    }

    /**
     * データベースに処理を検索する。<br>
     *
     * @param string $strsql SQL文
     * @param string $style 戻り結果のデータ種別
     * @return 検索結果
     */
    function exceuteQuery($strsql, $style = "array")
    {
        $this->exceuteUpdate($strsql);
        if (!empty($this->record)) {
            $this->record = array();
        }

        $i = 0;
        if ($style == "array") {
            while ($temp = @mysql_fetch_array($this->query_id)) {
                $this->record[$i] = $temp;
                $i++;
            }
        } else {
            while ($temp = @mysql_fetch_object($this->query_id)) {
                $this->record[$i] = $temp;
                $i++;
            }
        }
        unset($i);
        unset($temp);
        return $this->record;
    }

    /**
     * データベースに処理を検索する。<br>
     *
     * @param string $strsql SQL文
     * @param int $number レコードを開始数
     * @param int $offset offer数
     * @return 検索結果
     */
    function excutePagerQuery($strsql, $number, $offset)
    {
        if (!StringUtil::isNotBlank($number)) {
            return $this->exceuteQuery($strsql);
        } else {
            return $this->exceuteQuery($strsql . ' limit ' . $offset . ',' . $number);
        }
    }

    /**
     * ���検索結果をクリアする。<br>�N���A�B
     */
    function free()
    {
        if (($this->query_id) & ($this->query_id != 0)) {
            @mysql_free_result($this->query_id);
        }
    }

    /**
     * �f�データベースにアクセスを閉じる。<br>
     */
    function close()
    {
        $this->free();
        if ($this->link_id != 0) {
            @mysql_close($this->link_id);
        }

        if (mysql_errno() != 0) {
            $this->logger->error("Mysql Error:" . mysql_errno() . ":" . mysql_error());
            throw new SupportException(MessageUtil::getMessage("E0005"), "E0005");
        }

    }

    /**
     * トランザクション開始
     */
    function beginTransaction()
    {
        $this->exceuteUpdate('start transaction');
    }

    /**
     * トランザクションコミット
     */
    function commit()
    {
        $this->exceuteUpdate('commit');
    }

    /**
     * トランザクションロールバック
     */
    function rollback()
    {
        $this->exceuteUpdate('rollback');
    }

    function getAutoID()
    {
        return $this->autoID;
    }

    /**
     * destructメソッドが定義する。<br>
     */
    function __destruct()
    {
        $this->close();
    }
}
