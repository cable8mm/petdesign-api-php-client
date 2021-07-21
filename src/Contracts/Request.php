<?php

namespace EscCompany\PetdesignApiClient\Contracts;

use GuzzleHttp\Client;

abstract class Request
{
    const API_BASE_PATH = 'http://api.petsdesign.co.kr/';

    protected $options;

    protected $query = '';

    /**
     * return response from API Server.
     *
     * @var GuzzleHttp\Psr7\Response
     */
    protected $response;

    /**
     * @var GuzzleHttp\Client
     */
    protected $client;

    abstract protected function builder();

    public function __construct(string $apiKey)
    {
        $this->options = [
            'base_uri' => self::API_BASE_PATH,
            'headers' => [
                'cache-control' => 'no-cache',
                'Authorization' => $apiKey,
            ],
        ];

        $this->client = new Client();
    }

    public function setApiKey($apiKey)
    {
        $this->options['headers']['Authorization'] = $apiKey;
    }

    public function get($key = null, $offset = null)
    {
        $this->response = $this->builder()->client->get($this->query, $this->options);

        $contents = json_decode($this->response->getBody()->getContents(), true);

        if (! is_null($key) && ! is_null($offset)) {
            return $contents[$key][$offset] ?? null;
        }

        if (! is_null($offset)) {
            return $contents[$offset] ?? null;
        }

        return $contents;
    }
}
