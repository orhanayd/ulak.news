<?php

class UlakNews{

    /**
     * get user ip adress
     * 
     * @return string 127.0.0.1
     */
    private function getUserIP(){
        // Get real visitor IP behind CloudFlare network
        if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
                  $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
                  $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
        }
        $client  = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote  = $_SERVER['REMOTE_ADDR'];
    
        if(filter_var($client, FILTER_VALIDATE_IP))
        {
            $ip = $client;
        }
        elseif(filter_var($forward, FILTER_VALIDATE_IP))
        {
            $ip = $forward;
        }
        else
        {
            $ip = $remote;
        }
    
        return $ip;
    }

    /**
     * curl function for request to endpoints.
     * 
     * @param string $url
     * @param int $timeout 
     * @return array
     */
    private function curl_func(string $url, int $timeout=4000){
        $error=null;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Authorization:'.$_ENV["curl-auth-token"]
        ));
        curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_URL, $url); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
        curl_setopt($ch, CURLOPT_NOSIGNAL, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT_MS, $timeout);
        // curl_setopt($ch,CURLOPT_HEADER, false); 
        $data=curl_exec($ch);
        $output=json_decode($data, true);
        $info = curl_getinfo($ch);
        if($info===false){
            $error=curl_error($ch);
        }
        curl_close($ch);
        if($info['http_code']!==200){
            return [];
        }
        return $output;
    }

    /**
     * get latest news from api
     * 
     * @param string $agency
     * @param int $limit
     * @return array
     */
    public function get_news(string $agency="all", int $limit=35){

        if($agency==="all"){
            $curl = $this->curl_func($_ENV['local3']."/news/?limit=$limit");
        }else{
            $curl = $this->curl_func($_ENV['local3']."/news/$agency?limit=$limit");
        }

        if($curl && $curl['status']){
            return $curl['result'];
        }
        return [];
    }

    /**
     * get new from api
     * 
     * @param string $agency
     * @param integer $id
     * @return array
     */
    public function get_new(string $agency=null, int $id=null){
        if($agency === null || $id === null){
            return false;
        }

        $curl = $this->curl_func($_ENV['local3']."/news/$agency/$id");

        if($curl && $curl['status']){
            return $curl['result'][0];
        }

        return false;

    }

    /**
     * get agencies
     * @return array
     */
    public function get_agencies(){
        $curl = $this->curl_func($_ENV['local3']."/agencies");
        if($curl && $curl['status']){
            return $curl['result'];
        }
        return [];
    }


    /**
     * get categories from api
     * 
     * @param integer $limit
     * @return array
     */
    public function get_cats(int $limit=6){
        $curl = $this->curl_func($_ENV['local3']."/categories?limit=$limit");
        if($curl && $curl['status']){
            return $curl['result'];
        }
        return [];
    }

    /**
     * get news filter by categories from api
     * 
     * @param string $cat
     * @param integer $limit
     * @return array
     */
    public function get_cat_news(string $cat, $limit=50){
        $curl = $this->curl_func($_ENV['local3']."/category/$cat?limit=$limit");
        if($curl && $curl['status']){
            return $curl['result'];
        }
        return [];
    }

    /**
     * search news from api
     * 
     * @param string $arg
     * @param integer $limit
     * @return array
     */
    public function search_news(string $arg, $regex=0, $sort=1, $limit=50){
        $arg = urlencode($arg);
        if(strlen($arg)<3){
            return false;
        }
        $url = $_ENV['local3']."/search?q=$arg&regex=$regex&limit=$limit";
        if($sort!==1){
            $url = $_ENV['local3']."/search?q=$arg&regex=$regex&limit=$limit&sort=$sort";
        }
        $curl = $this->curl_func($url, 20000);
        if($curl && $curl['status']){
            return $curl['result'];
        }
        return null;
    }


    /**
     * get most read by filter
     * 
     * @param string $filter
     * @param int $limit
     * @param string $agency
     * @return array
     */
    public function get_most_readed($filter="today", $limit=5, $agency="all"){
    
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$_ENV['local3']."/most_read?limit=$limit");
        curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Authorization:'.$_ENV["curl-auth-token"],
            "content-type: application/json"
        ));
        if($filter==="month"){
            $gte = mktime(0, 0, 0, date("n"), 1);
            $lte = mktime(23, 59, 59, date("n"), date("t"));
        }elseif($filter==="week"){
            $strtotime = date("o-\WW");
            $gte = strtotime($strtotime);
            $lte = strtotime("+6 days 23:59:59", $gte);
        }else{
            $gte = strtotime("today", time());
            $lte   = strtotime("tomorrow", $gte) - 1;
        }
    
        curl_setopt($ch, CURLOPT_POSTFIELDS, "{\n\t\"gte\": $gte,\n\t\"lte\": $lte,\n\t\"agency\": \"$agency\"\n}");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $server_output = json_decode(curl_exec($ch), true);
        curl_close ($ch);
        if($server_output['status']){
                return $server_output['result'];
        }
        return [];
    }

    /**
     * add comment
     * 
     * @param string $name
     * @param string $text
     * @return boolen
     */
    public function add_comment(string $agency=null, string $id=null, string $name=null, string $text=null){
        
        if($name === null || $text === null || $agency === null || $id === null){
            return false;
        }

        $name = strip_tags($name);
        $text = strip_tags($text);
        $ip = $this->getUserIP();

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $_ENV['local3']."/comments/".$agency."/".$id."/add",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_TIMEOUT => 2,
            CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode(
                array(
                    "text"=> $text,
                    "name"=> $name,
                    "ip" => $ip
                )
            ),
            CURLOPT_HTTPHEADER => array(
                "authorization: ".$_ENV["curl-auth-token"],
                "content-type: application/json"
            ),
        ));

        $response = json_decode(curl_exec($curl), true);
        $err = curl_error($curl);
        curl_close($curl);
        
        if ($err) {
            return false;
        } else {
            if($response['status']){
                return true;
            }
        }
        return false;
    }

    /**
     * get comment
     * 
     * @param string $agency
     * @param integer $id
     * @return array
     */
    public function get_comments(string $agency=null, string $id=null){
        
        if($agency === null || $id === null){
            return false;
        }

        $curl = $this->curl_func($_ENV['local3']."/comments/".$agency."/".$id."/get");
        if($curl && $curl['status']){
            return $curl;
        }
        return [];
    }

    /**
     * get emoji stats.
     * 
     * @param string $agency
     * @param integer $id
     * 
     * @return array;
     */
    public function get_emoji(string $agency=null, string $id=null){

        if($agency === null || $id === null){
            return false;
        }

        $id = strip_tags($id);
        $agency = strip_tags($agency);

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $_ENV['local3']."/emoji/get",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_TIMEOUT => 2,
            CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode(
                array(
                    "agency"=> $agency,
                    "id"=> $id
                )
            ),
            CURLOPT_HTTPHEADER => array(
                "authorization: ".$_ENV["curl-auth-token"],
                "content-type: application/json"
            ),
        ));

        $response = json_decode(curl_exec($curl), true);
        $err = curl_error($curl);
        curl_close($curl);
        
        if ($err) {
            return false;
        } else {
            return $response;
        }
        return false;

    }

    /**
     * get emoji stats.
     * 
     * @param string $agency
     * @param integer $id
     * 
     * @return array;
     */
    public function save_emoji(string $agency=null, string $id=null, $rate=null){

        if($agency === null || $id === null || $rate === null){
            return false;
        }

        $id = strip_tags($id);
        $agency = strip_tags($agency);
        $rate = strip_tags($rate);

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $_ENV['local3']."/emoji/save",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_TIMEOUT => 2,
            CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode(
                array(
                    "agency"=> $agency,
                    "id"=> $id,
                    "rate"=> $rate,
                    "ip"=> $this->getUserIP(),
                )
            ),
            CURLOPT_HTTPHEADER => array(
                "authorization: ".$_ENV["curl-auth-token"],
                "content-type: application/json"
            ),
        ));

        $response = json_decode(curl_exec($curl), true);
        $err = curl_error($curl);
        curl_close($curl);
        
        if ($err) {
            return false;
        } else {
            return $response;
        }
        return false;

    }
}

?>