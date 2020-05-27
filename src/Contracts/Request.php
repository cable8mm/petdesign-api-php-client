<?php

namespace EscCompany\PetdesignApiClient\Contracts;

use GuzzleHttp\Client;

abstract class Request
{
    const API_BASE_PATH = 'http://api.petsdesign.co.kr/';

    /**
     * API Key
     *
     * @var string
     * @see https://github.com/junglebookDevTeam/API or dev@junglebook.co.kr
     */
    protected static $apiKey;

    protected $query = '';

    /**
     * return response from API Server
     *
     * @var GuzzleHttp\Psr7\Response
     */
    protected $response;

    /**
     * @var GuzzleHttp\Client
     */
    protected $client;

    public function __construct(string $apiKey)
    {
        self::$apiKey = $apiKey;

        $config = [
            'base_uri' => self::API_BASE_PATH,
            'headers' => [
                'cache-control' => 'no-cache',
                'Authorization' => self::$apiKey,
            ]
        ];

        $this->client = new Client($config);
    }

    public function get($key = null, $offset = null)
    {
        $this->response = $this->client->get($this->query);

        $contents = json_decode($this->response->getBody()->getContents(), true);

        if (!is_null($key) && !is_null($offset)) {
            return $contents[$key][$offset];
        }

        return $contents;
    }
}
