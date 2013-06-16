<?php
require_once("Const.php");
class PagerUtil
{
    /** 開始レコード数 */
    var $startCount = 0;
    /** ステプ */
    var $step = PAGE_NUMBER;
    /** 最大レコード数 */
    var $maxCount = 0;
    /** 現在レコード数 */
    var $currentCount = 0;

    /**
     * 最初のレコード数を取得する。<br>
     *
     * @return　最初のレコード数
     */
    public function getStart() {
        if ($this->step == 0) {
            $this->step = PAGE_NUMBER;
        }
        if ($this->maxCount > $this->startCount) {
            return $this->startCount;
        } else {
            if ($this->maxCount != 0 && $this->maxCount % $this->step == 0) {
                return $this->maxCount - $this->step;
            }
            return floor($this->maxCount/$this->step) * $this->step;
        }
    }

    /**
     * 次のレコード数を取得する。<br>
     *
     * @return　次のレコード数
     */
    private function getNext() {
        $start = $this->getStart();
        if (($start + $this->step) > $this->maxCount) {
            return this.getLast();
        }
        return $start + $this->step;
    }

    /**
     * 前のレコード数を取得する。<br>
     *
     * @return　前のレコード数
     */
    private function getBack() {
        $start = $this->getStart();
        if ($start - $this->step < 0) {
            return 0;
        }
        return $start - $this->step;
    }

    /**
     * 最後のレコード数を取得する。<br>
     *
     * @return　最後のレコード数
     */
    private function getLast() {
        if ($this->step == 0) {
            $this->step = PAGE_NUMBER;
        }
        return floor($this->maxCount/$this->step)* $this->step ;
    }

    /**
     * 分け頁メニューを取得する。<br>
     *
     * @return　分け頁メニュー
     */
    public function pagerButton() {
        if ($this->maxCount != 0) {
            $start = $this->getStart() + 1;
        } else {
            $start = 0;
        }
        $pagerStr = $this->maxCount."&nbsp;件中&nbsp;$start-".($this->getStart() + $this->currentCount)."&nbsp;件を表示&nbsp;&nbsp;";
        if ($this->getStart() >= $this->step) {
            // 最初
            $pagerStr = $pagerStr."<a href=javascript:doPager(0)>最初</a>|";
            // 前
            $pagerStr = $pagerStr."<a href=javascript:doPager(".$this->getBack().")>前</a>|";
        } else {
            // 最初
            $pagerStr = $pagerStr."最初|";
            // 前
            $pagerStr = $pagerStr."前|";
        }

        if ($this->getStart() + $this->step < $this->maxCount) {
            // 次
            $pagerStr = $pagerStr."<a href=javascript:doPager(".$this->getNext().")>次</a>|";
            // 最後
            $pagerStr = $pagerStr."<a href=javascript:doPager(".$this->getLast().")>最後</a>";
        } else {
            // 次
            $pagerStr = $pagerStr."次|";
            // 最後
            $pagerStr = $pagerStr."最後";
        }

        return $pagerStr;
    }

}