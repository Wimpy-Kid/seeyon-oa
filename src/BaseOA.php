<?php

namespace CherryLu\SeeYonOa;


use GuzzleHttp\Client;

abstract class BaseOA {

    protected static $token = null;

    protected $restUrl = '';

    protected $client = null;

    public function __construct() {
        $this->restUrl = trim(env('see_yon_rest_url'), '\\/');
        $this->fetchToken();
        $this->client = (new Client(['headers' => ['token' => self::$token]]));
    }

    /**
     * OA 授权
     *
     * @apiDoc http://open.seeyon.com/book/ctp/restjie-kou/gai-shu.html#%E9%AA%8C%E8%AF%81%E6%9C%8D%E5%8A%A1
     *
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    protected function fetchToken() {
        $username = env('see_yon_username');
        $password = env('see_yon_password');
        $response = ( new \GuzzleHttp\Client() )->post($this->restUrl . '/token', [
            'json' => [ 'userName' => $username, 'password' => $password ],
        ]);
        $res      = json_decode((string) ( $response->getBody() ), true);
        if ( empty($res['id']) ) {
            throw new \Exception('OA授权发生未知错误');
        }

        return static::$token = $res['id'];
    }


}
