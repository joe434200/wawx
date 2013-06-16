<?php
define ('UTF32_BIG_ENDIAN_BOM'   , chr(0x00) . chr(0x00) . chr(0xFE) . chr(0xFF));
define ('UTF32_LITTLE_ENDIAN_BOM', chr(0xFF) . chr(0xFE) . chr(0x00) . chr(0x00));
define ('UTF16_BIG_ENDIAN_BOM'   , chr(0xFE) . chr(0xFF));
define ('UTF16_LITTLE_ENDIAN_BOM', chr(0xFF) . chr(0xFE));
define ('UTF8_BOM'               , chr(0xEF) . chr(0xBB) . chr(0xBF));


final class EncodeUtil{

public static function detect_utf_encoding($text) {
    $first2 = substr($text, 0, 2);
    $first3 = substr($text, 0, 3);
    $first4 = substr($text, 0, 3);
    
   
    if ($first3 == UTF8_BOM) return 'UTF-8';
    elseif ($first4 == UTF32_BIG_ENDIAN_BOM) return 'UTF-32BE';
    elseif ($first4 == UTF32_LITTLE_ENDIAN_BOM) return 'UTF-32LE';
    elseif ($first2 == UTF16_BIG_ENDIAN_BOM) return 'UTF-16BE';
    elseif ($first2 == UTF16_LITTLE_ENDIAN_BOM) return 'UTF-16LE';
}
public static function getFileEncoding($str){
    $encoding=mb_detect_encoding($str);
    
    
    if(empty($encoding)){
        $encoding=EncodeUtil::detect_utf_encoding($str);
    }
    return $encoding;
}
public static function  js_unescape($str)
{
        $ret = '';
        $len = strlen($str);

        for ($i = 0; $i < $len; $i++)
        {
                if ($str[$i] == '%' && $str[$i+1] == 'u')
                {
                        $val = hexdec(substr($str, $i+2, 4));

                        if ($val < 0x7f) $ret .= chr($val);
                        else if($val < 0x800) $ret .= chr(0xc0|($val>>6)).chr(0x80|($val&0x3f));
                        else $ret .= chr(0xe0|($val>>12)).chr(0x80|(($val>>6)&0x3f)).chr(0x80|($val&0x3f));

                        $i += 5;
                }
                else if ($str[$i] == '%')
                {
                        $ret .= urldecode(substr($str, $i, 3));
                        $i += 2;
                }
                else $ret .= $str[$i];
        }
        return $ret;
}
	


}