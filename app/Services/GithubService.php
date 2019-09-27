<?php

namespace App\Services;

use App\Helper\CurlClient;

class GithubService
{
    static $API_URL = 'https://api.github.com';

    protected $key;

    protected $client;

    public function __construct($key = null)
    {
        $this->client = new CurlClient('erikaheidi/hacktober-panel');
    }

    public function get($query)
    {
        return $this->client->get(self::$API_URL . $query);
    }
}