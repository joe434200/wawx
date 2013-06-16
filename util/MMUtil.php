<?php
require_once('FileUtil.php');
final class MMUtil
{

	private static $encodekey = "";
	
	public static function getKey()
	{
		$this->logger = LoggerManager::getLogger("MMUtil");
        $data = FileUtil::getConfig("other");
        self::$encodekey = $data["MyKey"];
      
	}
	public static function srcEncode($pars)
	{
		$srckey = '@Da$Lian*JT@';
		$encrypt_key = md5(mt_rand(0,100)); 
		$ctr=0;        
		$tmp = "";       
		for ($i=0;$i<strlen($pars);$i++)        
		{ 
		        if ($ctr==strlen($encrypt_key)) 
		            $ctr=0;            
		        $tmp.=substr($encrypt_key,$ctr,1) . (substr($pars,$i,1) ^ substr($encrypt_key,$ctr,1)); 
		        $ctr++;        
		}  
		
		$encrypt_key =    md5($srckey); 
		$ctr=0;        
		
		      
		for($i=0;$i<strlen($tmp);$i++)        
		{            
		        if ($ctr==strlen($encrypt_key)) 
		        $ctr=0;            
		        $tmp.= substr($tmp,$i,1) ^ substr($encrypt_key,$ctr,1); 
		        $ctr++;        
		} 
		return base64_encode($tmp);  
	}

	
	public static function keyED($txt,$encrypt_key) //定义一个keyED
	{        
	    $encrypt_key =    md5($encrypt_key); 
	    $ctr=0;        
	    $tmp = "";        
	    for($i=0;$i<strlen($txt);$i++)        
	    {            
	        if ($ctr==strlen($encrypt_key)) 
	        $ctr=0;            
	        $tmp.= substr($txt,$i,1) ^ substr($encrypt_key,$ctr,1); 
	        $ctr++;        
	    }        
	}
	public static function Encode($txt,$key)    
	{ 
	    $encrypt_key = md5(mt_rand(0,100)); 
	    $ctr=0;        
	    $tmp = "";       
	     for ($i=0;$i<strlen($txt);$i++)        
	     { 
	        if ($ctr==strlen($encrypt_key)) 
	            $ctr=0;            
	        $tmp.=substr($encrypt_key,$ctr,1) . (substr($txt,$i,1) ^ substr($encrypt_key,$ctr,1)); 
	        $ctr++;        
	     }        
	     return self::keyED($tmp,$key); 
	}
	public static  function Decode($txt,$key) 
	{        
	    $txt = self::keyED($txt,$key);        
	    $tmp = "";        
	    for($i=0;$i<strlen($txt);$i++)        
	    {            
	        $md5 = substr($txt,$i,1); 
	        $i++;            
	        $tmp.= (substr($txt,$i,1) ^ $md5);        
	    }        
	    return $tmp; 
	} 
	public static  function Encode_url($url) 
	{ 
	    return rawurlencode(base64_encode(self::encrypt($url,self::$encodekey))); 
	} 
	public static  function Decode_url($url) 
	{ 
	    return self::Decode(base64_decode(rawurldecode($url)),self::$encodekey); 
	} 
	public static  function GetUrl($str) 
	{ 
	    $str = self::Decode_url($str,self::$encodekey); 
	    $url_array = explode('&',$str); 
	    if (is_array($url_array)) 
	    { 
	        foreach ($url_array as $var) 
	        { 
	            $var_array = explode("=",$var); 
	            $vars[$var_array[0]]=$var_array[1]; 
	        } 
	    } 
	    return $vars; 
	} 
	
}