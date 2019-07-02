<?php
class Filter{
	 /*public function filterSlug( $string,$separator = "_" )
        {
		    $string = preg_replace( "/ +/", " ", strtolower($string) );

            $string = str_replace(array('.',';','/','?',':','@','&','=','+','$',','),
                                  $separator, $string);

$string = str_replace(array("Ã","Ã€","áº¢","Ãƒ","áº ","Ã‚","áº¤","áº¦","áº¨","áºª","áº¬","Ä‚","áº®","áº°","áº²","áº´","áº¶","Ã¡","Ã ","áº£","Ã£","áº¡","Ã¢","áº¥","áº§","áº©","áº«","áº­","Äƒ","áº¯","áº±","áº³","áºµ","áº·"),"a",$string);
$string = str_replace(array("Ä","Ä'",),"d",$string);
$string = str_replace(array("Ã‰","Ãˆ","áºº","áº¼","áº¸","ÃŠ","áº¾","á»€","á»‚","á»","á»†","Ã©","Ã¨","áº»","áº½","áº¹","Ãª","áº¿","á»","á»ƒ","á»…","á»‡"),"e",$string);
$string = str_replace(array("Ã","ÃŒ","á»ˆ","Ä¨","á»Š","Ã­","Ã¬","á»‰","Ä©","á»‹"),"i",$string);
$string = str_replace(array("Ã","Ã","á»Ž","Ã•","á»Œ","Ã","á»","á»'","á»","á»–","á»˜","Æ ","á»š","á»œ","á»ž","á» ","á»¢","Ã³","Ã²","á»","Ãµ","á»","Ã´","á»'","á»","á»•","á»—","á»™","Æ¡","á»›","á»","á»Ÿ","á»¡","á»£"),"o",$string);
$string = str_replace(array("Ãš","Ã™","á»¦","Å¨","á»¤","Æ¯","á»¨","á»ª","á»¬","á»®","á»°","Ãº","Ã¹","á»§","Å©","á»¥","Æ°","á»©","á»«","á»­","á»¯","á»±"),"u",$string);
$string = str_replace(array("Ã","á»²","á»¶","á»¸","á»´","Ã½","á»³","á»·","á»¹","á»µ"),"y",$string);

            $search  = array(' ', 'ä', 'ö', 'ü','é','è','à','ç', 'à', 'è', 'ì',
                             'ò', 'ù', 'á', 'é', 'í', 'ó', 'ú', 'ë', 'ï' );
            $replace = array( $separator, 'a','o','u','e','e','a','c', 'a', 'e', 'i',
                              'o', 'u', 'a', 'e', 'i', 'o', 'u', 'e', 'i' );
          
            $string = str_replace($search, $replace, $string);
            
                // replaced/encoded, throw it away
            $good_characters = "a-z0-9.\\".$separator;
          
            $string = preg_replace( '/[^'.$good_characters.']/', '', $string );        
            
                // remove doubled separators
            $string = preg_replace("/[".$separator."]+/", $separator, $string);
                // remove starting and trailing separator chars
            $string = trim($string, $separator);
          
            
            return $string;            
        }*/
	
	
	public function filterSlug( $value){
		$value = trim(strtolower($value));
		$charaterA = '#(À|Ả|Ã|Á|Ạ|Ă|Ằ|Ẵ|Ẳ|Ắ|Ặ|Â|Ấ|Ầ|Ẫ|Ẩ|Ậ|à|ả|ã|á|ạ|ă|ằ|ẳ|ẵ|ắ|ặ|â|ầ|ẩ|ẫ|ấ|ậ)#imsU';
		$replaceCharaterA = 'a';
		$value = preg_replace($charaterA, $replaceCharaterA, $value);
		
		$charaterD = '#(đ|Đ)#imsU';
		$replaceCharaterD = 'd';
		$value = preg_replace($charaterD,$replaceCharaterD,$value);
		
		$charaterE = '#(È|É|Ẹ|Ẻ|Ẽ|Ê|Ế|Ề|Ể|Ễ|Ệ|è|ẻ|ẽ|é|ẹ|ê|ề|ể|ễ|ế|ệ)#imsU';
		$replaceCharaterE = 'e';
		$value = preg_replace($charaterE,$replaceCharaterE,$value);
		
		$charaterI = '#(Ì|Ỉ|Ĩ|Ị|ì|ỉ|ĩ|í|ị)#imsU';
		$replaceCharaterI = 'i';
		$value = preg_replace($charaterI,$replaceCharaterI,$value);
		
		$charaterO = '#(Ò|Ỏ|Õ|Ó|Ọ|Ô|Ồ|Ổ|Ỗ|Ố|Ộ|Ơ|Ờ|Ở|Ỡ|Ớ|Ợ|ò|ỏ|õ|ó|ọ|ô|ồ|ổ|ỗ|ố|ộ|ơ|ờ|ở|ỡ|ớ|ợ)#imsU';
		$replaceCharaterO = 'o';
		$value = preg_replace($charaterO,$replaceCharaterO,$value);
			
		$charaterU = '#(Ù|Ủ|Ũ|Ú"Ụ|Ư|Ừ|Ử|Ữ|Ứ|Ự|ù|ủ|ũ|ú|ụ|ư|ừ|ử|ữ|ứ|ự)#imsU';
		$replaceCharaterU = 'u';
		$value = preg_replace($charaterU,$replaceCharaterU,$value);
		
		$charaterY = '#(Y|Ỳ|Ỷ|Ý|Ỵ|ỳ|ỷ|ỹ|ý|ỵ)#imsU';
		$replaceCharaterY = 'y';
		$value = preg_replace($charaterY,$replaceCharaterY,$value);
	
		//$value = str_replace(' ','-',$value);
		return  $value;
		
		}
	
	public function filterName( $string,$separator = "_" )
        {
            // remove unnecessary spaces and make everything lower case
		    $string = preg_replace( "/ +/", " ", strtolower($string) );

            // removing a set of reserved characters (rfc2396: ; / ? : @ & = + $ ,)
            $string = str_replace(array(';','/','?',':','@','&','=','+','$',','),
                                  $separator, $string);

$string = str_replace(array("Ã","Ã€","áº¢","Ãƒ","áº ","Ã‚","áº¤","áº¦","áº¨","áºª","áº¬","Ä‚","áº®","áº°","áº²","áº´","áº¶","Ã¡","Ã ","áº£","Ã£","áº¡","Ã¢","áº¥","áº§","áº©","áº«","áº­","Äƒ","áº¯","áº±","áº³","áºµ","áº·"),"a",$string);
$string = str_replace(array("Ä","Ä'",),"d",$string);
$string = str_replace(array("Ã‰","Ãˆ","áºº","áº¼","áº¸","ÃŠ","áº¾","á»€","á»‚","á»","á»†","Ã©","Ã¨","áº»","áº½","áº¹","Ãª","áº¿","á»","á»ƒ","á»…","á»‡"),"e",$string);
$string = str_replace(array("Ã","ÃŒ","á»ˆ","Ä¨","á»Š","Ã­","Ã¬","á»‰","Ä©","á»‹"),"i",$string);
$string = str_replace(array("Ã","Ã","á»Ž","Ã•","á»Œ","Ã","á»","á»'","á»","á»–","á»˜","Æ ","á»š","á»œ","á»ž","á» ","á»¢","Ã³","Ã²","á»","Ãµ","á»","Ã´","á»'","á»","á»•","á»—","á»™","Æ¡","á»›","á»","á»Ÿ","á»¡","á»£"),"o",$string);
$string = str_replace(array("Ãš","Ã™","á»¦","Å¨","á»¤","Æ¯","á»¨","á»ª","á»¬","á»®","á»°","Ãº","Ã¹","á»§","Å©","á»¥","Æ°","á»©","á»«","á»­","á»¯","á»±"),"u",$string);
$string = str_replace(array("Ã","á»²","á»¶","á»¸","á»´","Ã½","á»³","á»·","á»¹","á»µ"),"y",$string);

            // replace some characters to similar ones
            $search  = array(' ', 'ä', 'ö', 'ü','é','è','à','ç', 'à', 'è', 'ì',
                             'ò', 'ù', 'á', 'é', 'í', 'ó', 'ú', 'ë', 'ï' );
            $replace = array( $separator, 'a','o','u','e','e','a','c', 'a', 'e', 'i',
                              'o', 'u', 'a', 'e', 'i', 'o', 'u', 'e', 'i' );
          
            $string = str_replace($search, $replace, $string);
            
            $good_characters = "a-z0-9.\\".$separator;
          
            $string = preg_replace( '/[^'.$good_characters.']/', '', $string );        
            
            $string = preg_replace("/[".$separator."]+/", $separator, $string);
            $string = trim($string, $separator);
          
            
            return $string;     
}
	}?>