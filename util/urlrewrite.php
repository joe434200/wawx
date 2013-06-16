<?php

class UrlRewriteFiler {

  	public static function url_rewrite() {
  
	    global $_SERVER, $_GET;
	    
	    $QueryString = !empty($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : str_replace($_SERVER["SCRIPT_NAME"], '', $_SERVER["REQUEST_URI"]);
	    $QueryString = str_replace(array('"', "'", '<', '>'), array('%22', '%27', '%3C', '%3E'), $QueryString);
	    if (strrpos($QueryString, "&") && strrpos($QueryString, "&")) {
	        $ParaArray = explode('&', $_SERVER["QUERY_STRING"]);
	        for ($i=0; $i<count($ParaArray); $i++) {
	            if (strpos($ParaArray[$i], '=')+1 != strlen($ParaArray[$i])) {
	                $Para = explode('=', $ParaArray[$i]);
	                 if (!empty($Para[1])) {
	                    if (strpos($Para[0], '/')) $Para[0] = '{' . $Para[0] . '}';
	                    if (strpos($Para[1], '/')) $Para[1] = '{' . $Para[1] . '}';
	                    $RequestURL .= '/' . $Para[0] . '/' . $Para[1];
	                 }
	            }
	        }
	        $_SERVER["R_QUERY_STRING"] = $RequestURL;
	    }
	    elseif (strrpos($QueryString, "/")) {
	        $QueryString = str_replace('.html', '', $QueryString);
	        $_SERVER["R_QUERY_STRING"] = $QueryString;
	        preg_match_all ("/{(.*)}/U", $QueryString, $matches);
	        for ($i=0; $i<count($matches[0]); $i++) {
	            $QueryString = str_replace($matches[0][$i], rawurlencode($matches[1][$i]), $QueryString);
	        }
	        $ParaArray = explode('/', $QueryString);
	        for ($i=0; $i<count($ParaArray); $i=$i+2) {
	            if (!empty($ParaArray[$i+1])) {
	                if (!empty($RequestURL)) $RequestURL .= '&';
	                if (strpos($ParaArray[$i+1], '%2F')) $ParaArray[$i+1] = rawurldecode($ParaArray[$i+1]);
	                if (strpos($ParaArray[$i+2], '%2F')) $ParaArray[$i+2] = rawurldecode($ParaArray[$i+2]);
	                $StrArray[$ParaArray[$i+1]] = $ParaArray[$i+2];
	                $RequestURL .= $ParaArray[$i+1] . "=" . $ParaArray[$i+2];
	            }
	        }
	        $_GET = $StrArray;
	        $_SERVER['QUERY_STRING'] = $RequestURL;
	    }
	    unset($QueryString, $ParaArray, $Para, $StrArray, $RequestURL, $matches, $i);
  	}
  
	public static function build_rewriteURL($string, $UrlStyle=0) {
	    if (strpos($string, '?')) {
	        $StrArray = explode('?', $string);
	        $Page = $StrArray[0];
	        $ParaString = $StrArray[1];
	    }
	    else $ParaString = $string;
	    $ParaString = str_replace('?', '', $ParaString);
	    if (!strpos($ParaString, '&')) return $this->ParaString;
	    $URLArray = explode('&', $ParaString);
	    for ($i=0; $i<count($URLArray); $i++) {
	        $Para = explode('=', $URLArray[$i]);
	        if (!empty($Para[1])) {
	            if (!empty($UrlString)) $UrlString .= '/';
	            if (strpos($Para[0], '/')) $Para[0] = '{' . $Para[0] . '}';
	            if (strpos($Para[1], '/')) $Para[1] = '{' . $Para[1] . '}';
	            $UrlString .= $Para[0] . '/' . $Para[1];
	        }
	    }
	    switch ($UrlStyle) {
	        case 1: $AddString = '/'; break;
	        case 2: $AddString = ''; break;
	        default: $AddString = '.html'; break;
	    }
	    return str_replace('//', '/', $Page . '/' . $UrlString . $AddString);
	}
}

?>