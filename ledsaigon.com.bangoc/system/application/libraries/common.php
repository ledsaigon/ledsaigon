<?php
    
    /**

     * utilities

     * 

     * @package   

     * @author sgh

     * @copyright The Tai

     * @version 2010

     * @access public

     */

     

    if (!defined('BASEPATH')) exit('No direct script access allowed');

    

    Class common{
        
        CONST MAX_VIEW_NEWS = 5;
        CONST MAX_VIEW_GALLERY = 9;
        

        public function dateFromBD($date) {
    		return date('d/m/Y, H:i', strtotime($date));
    	}
        public function getDateFormDB($date) {
    		return date('d/m/Y', strtotime($date));
    	}
    	// inuput d/m/y
    	// output y-m-d
    	public function dateToBD($date) {
    		list($day, $month, $year) = explode("/",$date);
    		$result = $year.'-'.$month.'-'.$day;
    		return $result;
    	}

        public static function MAX_VIEW_PRODUCT()
        {
            $CI =& get_instance();
            $CI->load->database();            
            $CI->load->model('user/m_viewer');
            $num = $CI->m_viewer->GetConfig('config_max_display');
            return ($num=='') ? 6 : $num;
        }
        
        public static function lang($key='',$value='')
        {
            try
            {
                if(lang($key) == '')
                    return $value;
                else 
                    return lang($key);
            }
            catch (exception $e)
            {
                return $value;
            }
            
        }
        
        public function dropImage($file='',$w=0,$h=0)
        {
            if(file_exists($file))
            {
                $info = getimagesize($file);
            }
            else 
            {
                $info[0] = $w;
                $info[1] = $h;
            }
            
            if($info[0] > $w && $info[1] > $h)
            {
                return 'include/timthumb.php?src='.$file."&w={$w}&h={$h}&zc=1";
            }
            else if($info[0] < $w && $info[1] > $h)
            {
                return 'include/timthumb.php?src='.$file."&h={$h}&zc=1";
            }
            else if($info[0] > $w && $info[1] < $h)
            {
                return 'include/timthumb.php?src='.$file."&w={$w}&zc=1";
            }
            else if($info[0] == $w && $info[1] == $h)
            {
                return 'include/timthumb.php?src='.$file."&w={$w}&h={$h}&zc=1";
            }
            else return $file;
        }
        
        public function readXML($file='',$id='',$idRoot='')
        {
            if(file_exists(str_replace('[@ID]',$id,$file)))
                return simplexml_load_file(str_replace('[@ID]',$id,$file));
            else return simplexml_load_file(str_replace('[@ID]',$idRoot,$file));
        }
        
        // input y-m-d
        // output d/m/y, h:i
       
        
        public function format_currency($val=0){
            return number_format($val,0,"",".");
        }

        function formatMoney($number, $fractional=false) { 
            if ($fractional) { 
                $number = sprintf('%.2f', $number); 
            } 
            while (true) { 
                $replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number); 
                if ($replaced != $number) { 
                    $number = $replaced; 
                } else { 
                    break; 
                } 
            } 
            return $number; 
        } 
        
        //format html
        public function removeHTML($str)
        {
            return preg_replace('/<([\/\w]+)[^>]*>/si', '', $str);
        }
        
        //encode html to html encode
        public function encodeHTML($str)
    	{
    	    return htmlentities($str,ENT_COMPAT,'UTF-8');
    	}
        
        //substring from x to y
        public function subString($str,$start,$length)
    	{
            if(strlen($str) <= $length)
            {
                return $str;
            }
    	    return substr($str,$start,$length).'...';
    	}
        
        
        function cutstr($str, $length, $ellipsis='...')
        {
            $str = $this->removeHTML($str);
            $cut = explode('\n\n',wordwrap($str,$length,'\n\n'));
            return $cut[0].((strlen($cut[0])<strlen($str))?$ellipsis:'');
        }
        
        
        public function upFirstString($str)
    	{
            $str = str_replace("-"," ",$str);
    	    return strtoupper(substr($str,0,1)).substr($str,1,strlen($str) - 1);
    	} 

        /**
         * Common::getstring()
         * 
         * @param mixed $str
         * @return
         */
        public function getstring($str) {
        	$str = preg_replace('/(à|á|ả|ã|ạ|â|ấ|ầ|ẩ|ẫ|ậ|ă|ắ|ằ|ẳ|ẵ|ặ)/', 'a', $str);
    		$str = preg_replace("/(è|é|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ)/", 'e', $str);
    		$str = preg_replace("/(ì|í|ỉ|ĩ|ị)/", 'i', $str);
    		$str = preg_replace("/(ò|ó|ỏ|õ|ọ|ô|ồ|ố|ổ|ỗ|ộ|ơ|ờ|ớ|ở|ỡ|ợ)/", 'o', $str);
    		$str = preg_replace("/(ù|ú|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự)/", 'u', $str);
    		$str = preg_replace("/(ỳ|ý|ỷ|ỹ|ỵ)/", 'y', $str);
    		$str = preg_replace("/(đ)/", 'd', $str);
    
    		$str = preg_replace("/(À|Á|Ả|Ã|Ạ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ)/", 'A', $str);
    		$str = preg_replace("/(È|É|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ)/", 'E', $str);
    		$str = preg_replace("/(Ì|Í|Ỉ|Ĩ|Ị)/", 'I', $str);
    		$str = preg_replace("/(Ò|Ó|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ)/", 'O', $str);
    		$str = preg_replace("/(Ù|Ú|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự)/", 'U', $str);
    		$str = preg_replace("/(Ỳ|Ý|Ỷ|Ỹ|Ỵ)/", 'Y', $str);
    		$str = preg_replace("/(Đ)/", 'D', $str);
    		
    		$str = preg_replace("/('|,|%)/", '', $str);
            $str = preg_replace("/(,)/", '', $str);
    		$str = str_replace(" ", "-", str_replace("&*#39;","",$str));
    		return strtolower($str);
    	}   
        
        public function checkSkype($nick='thetai.nguyen88')
        {
            $status = 'offline';
            $f = fopen("http://mystatus.skype.com/$nick.num", "rb");
    		$contents = '';
    		while (!feof($f)) {
    		  $contents .= fread($f, 8192);
    		}
    		if($contents > 1)
    			$status = 'online';
    		else $status = 'offline';
    		fclose($f);
            return $status;
        }      
    
        public function checkYahoo($nick='billy_nguyen_7')
        {
            $status = 'offline';
            $f = fopen("http://opi.yahoo.com/online?u=$nick&m=t&t=1", "rb");
            $contents = '';
            while (!feof($f)) {
                $contents .= fread($f, 8192);
            }
            if($contents == '01')
                $status = 'online';
            else $status = 'offline';
            fclose($f);
            return $status;
        }
        
        /**
         * Common::COUTERWITHIMAGE()
         * 
         * @param mixed $str
         * @return
         */
        public function couterWithImage($str) {
			if($str<10) $str='000000'.$str;
			if($str>=10 && $str<100) $str='00000'.$str;
			if($str>=100 && $str<1000) $str='0000'.$str;
			if($str>=1000 && $str<10000) $str='000'.$str;
			if($str>=10000 && $str<100000) $str='00'.$str;
			if($str>=100000 && $str<1000000) $str='0'.$str;
            $html = "";
            for($i = 0; $i < strlen($str); $i++)
            {
                $val = substr($str,$i,1);
                switch ($val) {
                    case 0:
                        $html .= '<img src="'.base_url().'publics/images/num/0.gif"/>';
                        break;
                    case 1:
                        $html .= '<img src="'.base_url().'publics/images/num/1.gif"/>';
                        break;
                    case 2:
                        $html .= '<img src="'.base_url().'publics/images/num/2.gif"/>';
                        break;
                    case 3:
                        $html .= '<img src="'.base_url().'publics/images/num/3.gif"/>';
                        break;
                    case 4:
                        $html .= '<img src="'.base_url().'publics/images/num/4.gif"/>';
                        break;
                    case 5:
                        $html .= '<img src="'.base_url().'publics/images/num/5.gif"/>';
                        break;
                    case 6:
                        $html .= '<img src="'.base_url().'publics/images/num/6.gif"/>';
                        break;
                    case 7:
                        $html .= '<img src="'.base_url().'publics/images/num/7.gif"/>';
                        break;
                    case 8:
                        $html .= '<img src="'.base_url().'publics/images/num/8.gif"/>';
                        break;
                    case 9:
                        $html .= '<img src="'.base_url().'publics/images/num/9.gif"/>';
                        break;
                }  
            }
    		return $html;
    	} 
        
        public static function selfURL() {
            $s = empty($_SERVER["HTTPS"]) ? '' : ($_SERVER["HTTPS"] == "on") ? "s" : "";
            $protocol = $this->strleft(strtolower($_SERVER["SERVER_PROTOCOL"]), "/").$s;
            $port = ($_SERVER["SERVER_PORT"] == "80") ? "" : (":".$_SERVER["SERVER_PORT"]);
            return $protocol."://".$_SERVER['SERVER_NAME'].$port.$_SERVER['REQUEST_URI'];
        }
        
        function strleft($s1, $s2) {
            return substr($s1, 0, strpos($s1, $s2));
        }
        
        public static function social()
        {
            $html = '
                <div style="margin:10px;" class="article-share clearfix">
                    <!-- AddThis Button BEGIN -->
                     <div style="float:right;margin-left:5px">
                        <a href="http://twitter.com/share" class="twitter-share-button" data-count="horizontal" data-via="HotTour.Vn" data-related="HotTour.Vn">Tweet</a>
                        <script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
                    </div>
                    <div class="addthis_toolbox addthis_default_style ">
                        <a class="addthis_button_compact at300m" href="http://www.addthis.com/bookmark.php?v=250&amp;username=xa-4d3503215ccf10e2"><span class="at300bs at15t_compact"></span>Share</a>
                        <span class="addthis_separator">|</span>
                        <a class="addthis_button_twitter at300b" href="http://www.addthis.com/bookmark.php?v=250&amp;winname=addthis&amp;pub=xa-4c7770ea16964dcd&amp;source=tbx-250&amp;lng=en-US&amp;s=twitter&amp;url=file%3A%2F%2F%2FC%3A%2FDocuments%2520and%2520Settings%2Fthanhphuc%2FDesktop%2F123sieuthi%2F%40html%2Fver%25202%2Fchitietsanpham.html&amp;title=123sieuthi.com&amp;ate=AT-xa-4c7770ea16964dcd/-/-/4cb44679043e986b/1&amp;CXNID=2000001.5215456080540439074NXC&amp;tt=0" target="_blank" title="Tweet This"><span class="at300bs at15t_twitter"></span></a>
                        <a class="addthis_button_facebook at300b" href="http://www.addthis.com/bookmark.php?v=250&amp;winname=addthis&amp;pub=xa-4c7770ea16964dcd&amp;source=tbx-250&amp;lng=en-US&amp;s=facebook&amp;url=file%3A%2F%2F%2FC%3A%2FDocuments%2520and%2520Settings%2Fthanhphuc%2FDesktop%2F123sieuthi%2F%40html%2Fver%25202%2Fchitietsanpham.html&amp;title=123sieuthi.com&amp;ate=AT-xa-4c7770ea16964dcd/-/-/4cb44679043e986b/2&amp;CXNID=2000001.5215456080540439074NXC&amp;tt=0" target="_blank" title="Send to Facebook"><span class="at300bs at15t_facebook"></span></a>
                        <a class="addthis_button_print at300b" title="Print"><span class="at300bs at15t_print"></span></a>
                        <a class="addthis_button_email at300b" title="Email"><span class="at300bs at15t_email"></span></a>
                        <div class="atclear"></div>
                    </div>
                    <script type="text/javascript">var addthis_config = { ui_language: "vi"};</script>
                    <script src="http://s7.addthis.com/js/250/addthis_widget.js#username=xa-4c7770ea16964dcd" type="text/javascript"></script>
                    <!-- AddThis Button END -->
                </div>
            ';
            return $html;
        }
        
    }
?>