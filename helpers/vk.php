<?php

namespace app\helpers;

use GuzzleHttp\Client;

class Vk
{

    private $url = 'https://api.vk.com/method/friends.get?user_id=83085807&fields=city';

    const URL_VK_API = 'https://api.vk.com/method/';

    /**
     * Instance of GuzzleHttp\Client
     * @var \GuzzleHttp\Client
     */
    private $guzzle = false;


    /**
     * Here we store Method Name
     * @var bool|string
     */
    private $methodName = false;
    /**
     * Here we store arguments
     * @var array|bool
     */
    private $args = [ ];

    public function __construct( $methodName, $args = false, $accessToken = false, $callback = false )
    {
        $this->methodName  = $methodName;
        $this->args        = $args;
        $this->accessToken = $accessToken;
        $this->callback    = $callback;
    }

    /**
     * Запит до АПІ
     * @return Api
     */
    public function fetchData()
    {
        if ( ! $this->guzzle) {
            $this->guzzle = new Client();
        }
        $args = $this->args;
        $body = '?';
        foreach($args as $key => $item){
            $body .= "$key=$item";
        }
        //$data = file_get_contents(self::URL_VK_API . $this->methodName . $body );
        $data = $this->guzzle->post( self::URL_VK_API . $this->methodName,
            [ 'body' => $args ] )->json();
        //$data = $data->json();
        //ddd($data);
        return $data;
    }

}