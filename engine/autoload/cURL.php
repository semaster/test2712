<?php
/*
|--------------------------------------------------------------------------
| simple CURL usage class
|--------------------------------------------------------------------------
*/
    
class cURL {

    /**
     * API server URL. This one depends on server you use. 
     * @var   String
     */
    protected $server;
    
    /**
     * CURL connection handle
     * @var   
     */
    protected $connection = null;

    /**
     * Create  API instance
     */
    public function __construct($server) {
        $this->server = $server;
    }

    /**
     * Return data from api. 
     */
    public function get($email, $amount, $token, $assoc = false) {
        
        // Build query url
        $url = "http://".$this->server."/transaction/".$email."/".$amount."/".$token; //return $url;

        // Get response
        $buff = $this->curl_get_contents($url);

        return $buff;

    }
    
    /**
     * Returns data from url provided in $url. This function use same curl handle for each request
     * @param   String   $url   Data url to process
     * @return   mixed   String if success, FALSE on failure
     */
    private function curl_get_contents($url) {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_TIMEOUT, 60);
        $data = curl_exec($curl);
        curl_close($curl);
        return json_decode($data, true);
    }

    
}
