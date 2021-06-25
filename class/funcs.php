<?php
    class UlakClass{        

        public function time_since(int $time=0, $full = false) {
                // Calculate difference between current 
                // time and given timestamp in saniye 
                $diff     = time() - $time; 
                
                // Time difference in saniye 
                $sec     = $diff; 
                
                // Convert time difference in dakika 
                $min     = round($diff / 60 ); 
                
                // Convert time difference in saat 
                $hrs     = round($diff / 3600); 
                
                // Convert time difference in days 
                $days     = round($diff / 86400 ); 
                
                // Convert time difference in weeks 
                $weeks     = round($diff / 604800); 
                
                // Convert time difference in months 
                $mnths     = round($diff / 2600640 ); 
                
                // Convert time difference in years 
                $yrs     = round($diff / 31207680 ); 
                
                // Check for saniye 
                if($sec <= 60) { 
                    return "$sec saniye önce"; 
                } 
                
                // Check for dakika 
                else if($min <= 60) { 
                    if($min==1) { 
                        return "1 dakika önce"; 
                    } 
                    else { 
                        return "$min dakika önce"; 
                    } 
                } 
                
                // Check for saat 
                else if($hrs <= 24) { 
                    if($hrs == 1) {  
                        return "1 saat önce"; 
                    } 
                    else { 
                        return "$hrs saat önce"; 
                    } 
                } 
                
                // Check for days 
                else if($days <= 7) { 
                    if($days == 1) { 
                        return "Dün"; 
                    } 
                    else { 
                        return "$days gün önce"; 
                    } 
                } 
                
                // Check for weeks 
                else if($weeks <= 4.3) { 
                    if($weeks == 1) { 
                        return "1 hafta önce"; 
                    } 
                    else { 
                        return "$weeks hafta önce"; 
                    } 
                } 
                
                // Check for months 
                else if($mnths <= 12) { 
                    if($mnths == 1) { 
                        return "1 ay önce"; 
                    } 
                    else { 
                        return "$mnths ay önce"; 
                    } 
                } 
                
                // Check for years 
                else { 
                    if($yrs == 1) { 
                        return "1 yıl önce"; 
                    } 
                    else { 
                        return "$yrs yıl önce"; 
                    } 
                } 
            
        }

        public function reading_time(string $string){
            $word = str_word_count(strip_tags($string));
            $m = floor($word / 200);
            $s = floor($word % 200 / (200 / 60));
            return $m . ' dakika' . ($m == 1 ? '' : '') . ', ' . $s . ' saniye' . ($s == 1 ? '' : '');
        }

        public function seo_text(string $s){
            $s  = html_entity_decode($s);
            $tr = array('ş','Ş','ı','I','İ','ğ','Ğ','ü','Ü','ö','Ö','Ç','ç','(',')','/',':',',', "'", "!",'’','#',"'",'&039;','"','“','.','…','?','‘','”', ';', '%');
            $eng = array('s','s','i','i','i','g','g','u','u','o','o','c','c','','','-','-','','','','','','','','','','','','','','', '', '');
            $s = str_replace($tr,$eng,$s);
            $s = strtolower($s);
            $s = preg_replace('/&amp;amp;amp;amp;amp;amp;amp;amp;amp;.+?;/', '', $s);
            $s = preg_replace('/\s+/', '-', $s);
            $s = preg_replace('|-+|', '-', $s);
            $s = preg_replace('/#/', '', $s);
            $s = str_replace('.', '', $s);
            $s = trim($s, '-');
            $s = substr($s, 0, 32);
            return $s;
        }

        public function isActiveAgency($agencies, $agency=[]){
            $result = false;
            if(count($agencies) > 0){
                for ($i=0; $i < count($agencies); $i++) { 
                    if($agencies[$i]['id'] === $agency){
                        $result = true;
                        break;
                    }
                }
            }
            return $result;
        }

    }
?>