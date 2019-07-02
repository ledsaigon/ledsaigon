<?php
    if (!defined('BASEPATH')) exit('No direct script access allowed');
    Class template_base {
        
        public $data = null;
        function getDataPage()
        {
            ini_set('zlib_output_compression','On'); 
            $CI =& get_instance();
            $CI->load->database();            
            $CI->load->model('view/Mod_viewer');
			
			if(isset($_SESSION['lang']))
			$lang = $_SESSION['lang'] ;
			else $lang ='vn';
            $CI->lang->load($lang,$lang);
            $data = $CI->Mod_viewer->Getlanguage($lang);
            
            $CI->lang->load($lang,$lang);
        }
        
        function getDataPage_Admin()
        {   
            $CI =& get_instance();
            $CI->load->database();            
            $CI->load->model(array('admin/m_viewer'));
            
        
            if($CI->session->userdata('login') == false)
            {
                if( !strpos($_SERVER["REQUEST_URI"],'AdminCP/login') )
                {
                    $_SESSION['login'] = false;
                    redirect(base_url().'AdminCP/login','refresh');
                    exit(0);   
                }
            }
            
            if($CI->session->userdata('lang') != "")
                $lang = $CI->session->userdata('lang');
            else
            {
                $lang = 'vietnam';
            }
            
            
            $CI->lang->load('vi','vietnam/admin');
            
            $data = $CI->m_viewer->Getlanguage($lang);
            $data['languageList'] = $CI->m_viewer->getLanguageList($data['langID']);
            
            $data = array_merge($data,array(
                     'resource' => base_url().'resource',
                     'base_url' => base_url().'',
                     'title_admin' => ':: Admin Cpanel ::',
                     'title_site' => '',
                     'messages' => 0,
                     'error' => '',
                     'fontsize' => isset($_COOKIE['fontsize']) ? $_COOKIE['fontsize'] : 12                                                                                                                
                     ));
            return $data;
        }       
        
        function Counter($onl=0,$count=0)
        {
            $expire = 600;
            $filename = "include/counter.txt"; 
            if (file_exists($filename)) 
            {
               $ignore = false;
               $current_agent = (isset($_SERVER['HTTP_USER_AGENT'])) ? addslashes(trim($_SERVER['HTTP_USER_AGENT'])) : "no agent";
               $current_time = time();
               $current_ip = $_SERVER['REMOTE_ADDR']; 
                  
               // daten einlesen
               $c_file = array();
               $handle = fopen($filename, "r");
               
               if ($handle)
               {
                  while (!feof($handle)) 
                  {
                     $line = trim(fgets($handle, 4096)); 
            		 if ($line != "")
            		    $c_file[] = $line;		  
                  }
                  fclose ($handle);
               }
               else
                  $ignore = true;
               
               // bots ignorieren   
               if (substr_count($current_agent, "bot") > 0)
                  $ignore = true;
            	  
               
               // hat diese ip einen eintrag in den letzten expire sec gehabt, dann igornieren?
               for ($i = 1; $i < sizeof($c_file); $i++)
               {
                  list($counter_ip, $counter_time) = explode("||", $c_file[$i]);
            	  $counter_time = trim($counter_time);
            	  
            	  if ($counter_ip == $current_ip && $current_time-$expire < $counter_time)
            	  {
            	     // besucher wurde bereits gez?t, daher hier abbruch
            		 $ignore = true;
            		 break;
            	  }
               }
               
               // counter hochz?en
               if ($ignore == false)
               {
                  if (sizeof($c_file) == 0)
                  {
            	     // wenn counter leer, dann f??n      
            		 $add_line1 = date("z") . ":1||" . date("W") . ":1||" . date("n") . ":1||" . date("Y") . ":1||1||1||" . $current_time . "\n";
            		 $add_line2 = $current_ip . "||" . $current_time . "\n";
            		 
            		 // daten schreiben
            		 $fp = fopen($filename,"w+");
            		 if ($fp)
                     {
            		    flock($fp, LOCK_EX);
            			fwrite($fp, $add_line1);
            		    fwrite($fp, $add_line2);
            			flock($fp, LOCK_UN);
            		    fclose($fp);
            		 }
            		 
            		 // werte zur verf??g stellen
            		 $day = $week = $month = $year = $all = $record = 1;
            		 $record_time = $current_time;
            		 $online = 1;
            	  }
                  else
            	  {
            	     // counter hochz?en
            		 list($day_arr, $week_arr, $month_arr, $year_arr, $all, $record, $record_time) = explode("||", $c_file[0]);
            		 
            		 // day
            		 $day_data = explode(":", $day_arr);
            		 $day = $day_data[1];
            		 if ($day_data[0] == date("z")) $day++; else $day = 1;
            		 
            		 // week
            		 $week_data = explode(":", $week_arr);
            		 $week = $week_data[1];
            		 if ($week_data[0] == date("W")) $week++; else $week = 1;
            		 
            		 // month
            		 $month_data = explode(":", $month_arr);
            		 $month = $month_data[1];
            		 if ($month_data[0] == date("n")) $month++; else $month = 1;
            		 
            		 // year
            		 $year_data = explode(":", $year_arr);
            		 $year = $year_data[1];
            		 if ($year_data[0] == date("Y")) $year++; else $year = 1;
            		  
            		 // all
            		 $all++;
            		 
            		 // neuer record?
            		 $record_time = trim($record_time);
            		 if ($day > $record)
            		 {
            		    $record = $day;
            			$record_time = $current_time;
            		 }
            		 
            		 // speichern und aufr?en und anzahl der online leute bestimmten
            		 
            		 $online = 1;
            		 
            		 // daten schreiben
            		 $fp = fopen($filename,"w+");
            		 if ($fp)
                     {
            		    flock($fp, LOCK_EX);
            			$add_line1 = date("z") . ":" . $day . "||" . date("W") . ":" . $week . "||" . date("n") . ":" . $month . "||" . date("Y") . ":" . $year . "||" . $all . "||" . $record . "||" . $record_time . "\n";		 
            		    fwrite($fp, $add_line1);
            		 
            		    for ($i = 1; $i < sizeof($c_file); $i++)
                        {
                           list($counter_ip, $counter_time) = explode("||", $c_file[$i]);
            	  
            	           // ??nehmen
            		   	   if ($current_time-$expire < $counter_time)
            	           {
            	              $counter_time = trim($counter_time);
            				  $add_line = $counter_ip . "||" . $counter_time . "\n";
            			      fwrite($fp, $add_line);
            			      $online++;
            	           }
                        }
            		    $add_line = $current_ip . "||" . $current_time . "\n";
            		    fwrite($fp, $add_line);
            		    flock($fp, LOCK_UN);
            		    fclose($fp);
            	     }
            	  }
               }
               else
               {
                  // nur zum anzeigen lesen
            	  if (sizeof($c_file) > 0)
            	     list($day_arr, $week_arr, $month_arr, $year_arr, $all, $record, $record_time) = explode("||", $c_file[0]);
            	  else
            		 list($day_arr, $week_arr, $month_arr, $year_arr, $all, $record, $record_time) = explode("||", date("z") . ":1||" . date("W") . ":1||" . date("n") . ":1||" . date("Y") . ":1||1||1||" . $current_time);
            	  
            	  // day
            	  $day_data = explode(":", $day_arr);
                  $day = $day_data[1];
            	  
            	  // week
            	  $week_data = explode(":", $week_arr);
            	  $week = $week_data[1];
            	
            	  // month
            	  $month_data = explode(":", $month_arr);
            	  $month = $month_data[1];
            	  
            	  // year
            	  $year_data = explode(":", $year_arr);
            	  $year = $year_data[1];
            	  
            	  $record_time = trim($record_time);
            	  
            	  $online = sizeof($c_file) - 1;
               }
               
               $CI =& get_instance();
            $CI->load->library('common');
            
            $html  = '<table id="statis" cellpadding="0" cellspacing="0" border="0">';
            $html .= '  <tr>';
            $html .= '      <td style="text-align:center"> ';
            $html .= $CI->common->couterWithImage($all + $count);
            $html .= '      </td>';
            $html .= '  </tr>';
            $html .= '  <tr>';
            $html .= '      <td> ';
            $html .= '          <img src="'.base_url().'resource/view/images/statistic/vtoday.gif"/>  '.lang('online_user').($online + $onl);
            $html .= '      </td>';
            $html .= '  </tr>';
            $html .= '  <tr>';
            $html .= '      <td> ';
            $html .= '          <img src="'.base_url().'resource/view/images/statistic/vyesterday.gif"/>  '.lang('online_today').($day + $onl);
            $html .= '      </td>';
            $html .= '  </tr>';
            $html .= '  <tr>';
            $html .= '      <td> ';
            $html .= '          <img src="'.base_url().'resource/view/images/statistic/vweek.gif"/>  '.lang('online_week').($week + $onl);
            $html .= '      </td>';
            $html .= '  </tr>';
            $html .= '  <tr>';
            $html .= '      <td> ';
            $html .= '          <img src="'.base_url().'resource/view/images/statistic/vmonth.gif"/>  '.lang('online_month').($month + $onl);
            $html .= '      </td>';
            $html .= '  </tr>';
            $html .= '  <tr>';
            $html .= '      <td> ';
            $html .= '          <img src="'.base_url().'resource/view/images/statistic/vall.gif"/>  '.lang('online_year').($year + $count);
            $html .= '      </td>';
            $html .= '  </tr>';
            $html .= '</table>';
            return $html;
        }
    }
}
?>