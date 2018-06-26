<?php
class PetdesignClient {
    const LIBVER = "1.0.0";
    const API_BASE_PATH = "http://api.petsdesign.co.kr";
    const TEST_API_KEY = "cable8mm";

    private $config;

    public function __construct(array $config = array()) {
        $this->config = array_merge(
        [
          'base_path' => self::API_BASE_PATH,
          'api_key' => self::TEST_API_KEY
        ],
        $config
        );

        return;
    }

    public function getGoods($params = []) {
        switch($params['type']) {
            case 'code':
                $opts = [
                    "http" => [
                        "method" => "GET",
                        "header" => "cache-control: no-cache\r\n" .
                            "pd_key: ".$this->config['api_key']."\r\n"
                    ]
                ];
                $context = stream_context_create($opts);
                return file_get_contents(self::API_BASE_PATH.'/goods/'.$params['code'], false, $context);
            break;
            case 'all':
                $opts = [
                    "http" => [
                        "method" => "GET",
                        "header" => "cache-control: no-cache\r\n" .
                            "pd_key: ".$this->config['api_key']."\r\n"
                    ]
                ];
                $context = stream_context_create($opts);
                return file_get_contents(self::API_BASE_PATH.'/goods/all/'.$params['page'], false, $context);
            break;
        }
    }

    public function getGoodsByCode($code) {
        return $this->getGoods(['type'=>'code', 'code'=>$code]);
    }

    public function getAllGoods($page = 1) {
        return $this->getGoods(['type'=>'all', 'page'=>$page]);
    }
}