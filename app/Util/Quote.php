<?php

namespace App\Util;
use \GuzzleHttp\Client;

class Quote{

    protected $client; 

    public function __construct(){
        $key = config('services.paperquote.key');
        $this->client = new \GuzzleHttp\Client(['headers' =>  ['Authorization' => 'Token '. $key, 'Content-Type'=> 'application/json']]);
    }

    public function fetchQuote($lang = 'en'){

       
        $url = config('services.paperquote.endpoint');
       
       // $this->client->setDefaultOption();
        $request = $this->client->get($url . '?lang='. $lang);
        
        $response = $request->getBody();

        return json_decode($response);
    }
}