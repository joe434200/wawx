<?php
//============================================================+
// File name   : example_038.php
// Begin       : 2008-09-15
// Last Update : 2011-10-01
//
// Description : Example 038 for TCPDF class
//               CID-0 CJK unembedded font
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com s.r.l.
//               Via Della Pace, 11
//               09044 Quartucciu (CA)
//               ITALY
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: CID-0 CJK unembedded font
 * @author Nicola Asuni
 * @since 2008-09-15
 */

require_once('../config/lang/eng.php');
require_once('../tcpdf.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 038');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 038', PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

//set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

//set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

//set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

//set some language-dependent strings
$pdf->setLanguageArray($l);

// ---------------------------------------------------------

// set font
$pdf->SetFont('cid0jp', '', 15);

// add a page
$pdf->AddPage();

$txt = '<div  style="width:650px; float:left;font-size:20px;">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="16%">IK001469</td>
    <td width="14%"><h3>新規</h3></td>
    <td width="40%" align="center"><h1>エコリカ出指示書</h1></td>
    <td width="30%"><h3>2010/9/15&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;担当者：鈴木</h3></td>
  </tr>
</table>

<div style="padding:10px 0;">
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="ttbb">
  <tr>
    <td style="padding:2px; line-height:18px;"width="14%" rowspan="2"><strong>氏名：</strong></td>
    <td style="padding:2px; line-height:18px;"colspan="2">カミキ　シンチシンイチ</td>
    <td style="padding:2px; line-height:18px;"width="18%">&nbsp;</td>
    <td style="padding:2px; line-height:18px;"width="12%" ><strong>対応区分：</strong></td>
    <td style="padding:2px; line-height:18px;"width="21%">フリーダイヤル</td>
  </tr>
  <tr>
    <td style="padding:2px; line-height:18px;"colspan="2">神木　信一</td>
    <td style="padding:2px; line-height:18px;">様</td>
    <td style="padding:2px; line-height:18px;">&nbsp;</td>
    <td style="padding:2px; line-height:18px;">&nbsp;</td>
  </tr>
  <tr>
    <td style="padding:2px; line-height:18px;"><strong>郵便：</strong></td>
    <td style="padding:2px; line-height:18px;"width="26%">611-0013</td>
    <td style="padding:2px; line-height:18px;"width="9%" ><strong>住所：</strong></td>
    <td style="padding:2px; line-height:18px;"colspan="3">綾瀬市上土棚北5-8-21</td>
    </tr>
  <tr>
    <td style="padding:2px; line-height:18px;">&nbsp;</td>
    <td style="padding:2px; line-height:18px;">&nbsp;</td>
    <td style="padding:2px; line-height:18px;"><strong>建物名：</strong></td>
    <td style="padding:2px; line-height:18px;"colspan="3">&nbsp;</td>
    </tr>
  <tr>
    <td style="padding:2px; line-height:18px;"><strong>電話：</strong></td>
    <td style="padding:2px; line-height:18px;">0774-22-1567</td>
    <td style="padding:2px; line-height:18px;">&nbsp;</td>
    <td style="padding:2px; line-height:18px;">&nbsp;</td>
    <td style="padding:2px; line-height:18px;">&nbsp;</td>
    <td style="padding:2px; line-height:18px;">&nbsp;</td>
  </tr>
  <tr>
    <td style="padding:2px; line-height:18px;"><strong>プリンタ職種名：</strong></td>
    <td style="padding:2px; line-height:18px;">PMA900</td>
    <td style="padding:2px; line-height:18px;"><strong>購入店：</strong></td>
    <td style="padding:2px; line-height:18px;">不明</td>
    <td style="padding:2px; line-height:18px;"><strong>顧客満足度：</strong></td>
    <td style="padding:2px; line-height:18px;">かなり不満</td>
  </tr>
</table>

</div>



<div style="padding:10px 0;border-top:1px  dashed  #999;">
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="ttbb">
  <tr>
    <th style="padding:2px; line-height:18px;"width="23%" scope="col">購入カートリッジ</th>
    <th style="padding:2px; line-height:18px;"width="25%" scope="col">不具合カートリッジ</th>
    <th style="padding:2px; line-height:18px;"width="39%" scope="col">不具合内容</th>
    <th style="padding:2px; line-height:18px;"width="13%" scope="col">&nbsp;</th>
  </tr>
  <tr>
    <td style="padding:2px; line-height:18px;"align="center">ECI-E35M</td>
    <td style="padding:2px; line-height:18px;"align="center">ECI-E35M</td>
    <td style="padding:2px; line-height:18px;"align="center">チップ不良</td>
    <td style="padding:2px; line-height:18px;"align="center">1948D1A</td>
  </tr>
</table>
</div>


<hr />

<div style="padding:10px 0;">
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="ttbb">
  <tr>
    <th style="padding:2px; line-height:18px;"width="23%" scope="col">送付ートリッジ</th>
    <th style="padding:2px; line-height:18px;"width="13%" scope="col">数量</th>
    <th style="padding:2px; line-height:18px;"width="64%" align="left" scope="col">クレーム詳細</th>
    </tr>
  <tr>
    <td style="padding:2px; line-height:18px;"align="center" valign="top">ECI-E35M</td>
    <td style="padding:2px; line-height:18px;"align="center" valign="top">１</td>
    <td style="padding:2px; line-height:18px;"align="left" valign="top">
    ICチップ不良<br />
      プリンタヘの着脱プリンタヘの着脱プリンタヘの着脱プリンタヘの着脱プリンタヘの着脱<br />
      <br />
      <br />
      <br />
      <br /></td>
    </tr>
  <tr>
    <td style="padding:2px; line-height:18px;"align="center" valign="top">&nbsp;</td>
    <td style="padding:2px; line-height:18px;"align="center" valign="top">&nbsp;</td>
    <td style="padding:2px; line-height:18px;"align="left" valign="top"><strong>備考</strong>
      <br />
      <br />
      <br />
      <br />
    </td>
  </tr>
  <tr>
    <td style="padding:2px; line-height:18px;"align="center" valign="top">&nbsp;</td>
    <td style="padding:2px; line-height:18px;"align="center" valign="top">&nbsp;</td>
    <td style="padding:2px; line-height:18px;"align="left" valign="top">&nbsp;</td>
  </tr>
    
    
</table>
</div>



<div style="padding:10px 0;border-top:1px  dashed  #999;">

<div style="width:58%; float:left;">
<div style="width:57%; float:left;  border:1px solid #ccc; padding:5px;">
<table width="100%" border="0" cellspacing="0" cellpadding="0" >
  <tr>
    <td style="padding:2px; line-height:18px;" colspan="4"><strong>カスレ</strong></td>
    </tr>
  <tr>
    <td style="padding:2px; line-height:18px;" width="33%">クリーニング</td>
    <td style="padding:2px; line-height:18px;" width="14%">&times;</td>
    <td style="padding:2px; line-height:18px;" width="39%">&nbsp;</td>
    <td style="padding:2px; line-height:18px;" width="14%">&nbsp;</td>
  </tr>
  <tr>
    <td style="padding:2px; line-height:18px;">ノズルチェック</td>
    <td style="padding:2px; line-height:18px;">&times;</td>
    <td style="padding:2px; line-height:18px;">&nbsp;</td>
    <td style="padding:2px; line-height:18px;">&nbsp;</td>
  </tr>
  <tr>
    <td style="padding:2px; line-height:18px;">インク残量</td>
    <td style="padding:2px; line-height:18px;">&times;</td>
    <td style="padding:2px; line-height:18px;">&nbsp;</td>
    <td style="padding:2px; line-height:18px;">&nbsp;</td>
  </tr>
  <tr>
    <td style="padding:2px; line-height:18px;">使用額度</td>
    <td style="padding:2px; line-height:18px;">&times;</td>
    <td style="padding:2px; line-height:18px;">テープ剥離確認</td>
    <td style="padding:2px; line-height:18px;">O</td>
  </tr>
  <tr>
    <td style="padding:2px; line-height:18px;">購入時期</td>
    <td style="padding:2px; line-height:18px;">&times;</td>
    <td style="padding:2px; line-height:18px;">紙の設定</td>
    <td style="padding:2px; line-height:18px;">&times;</td>
  </tr>
</table>

</div>

<div style="width:30%; float:right;  border:1px solid #ccc; padding:5px;">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="80%"><strong>チップ</strong></td>
    <td width="20%">&nbsp;</td>
  </tr>
  <tr>
    <td>C/脱着確認</td>
    <td><span style="padding:2px; line-height:18px;">&times;</span></td>
  </tr>
  <tr>
    <td>電極部清掃確認し</td>
  <td>×</td>
    </tr>
    <tr>
      <td>装着直後</td>
    <td><span style="padding:2px; line-height:18px;">&times;</span></td>
  </tr>
  <tr>
    <td>使用途中</td>
    <td><span style="padding:2px; line-height:18px;">&times;</span></td>
  </tr>
</table>



</div>
</div>

<div style="width:40%; float:right;">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="2"><strong>受付時間：</strong>12:10</td>
    </tr>
  <tr>
    <td colspan="2"><strong>対応</strong>：</td>
    </tr>
  <tr>
    <td colspan="2"><strong>着払伝票NO.</strong>:3540-5715-8033-</td>
    </tr>
  <tr>
    <td width="51%"><strong>ヤスト():</strong></td>
    <td width="49%"><strong>着日指定:</strong>9/16</td>
  </tr>
</table>

</div>

</div>

</div>';

//$pdf->Write(0, $txt, '', 0, 'L', true, 0, false, false, 0);
$pdf->writeHTML($txt, true, 0, true, 0);

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('example_038.pdf', true);

//============================================================+
// END OF FILE
//============================================================+
