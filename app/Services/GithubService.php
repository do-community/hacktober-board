<?php

namespace App\Services;

use App\Helper\CurlClient;

class GithubService
{
    static $API_URL = 'https://api.github.com';

    static $ENDPOINT_ISSUES = "/search/issues";

    protected $key;

    protected $client;

    public function __construct($key = null)
    {
        $this->client = new CurlClient('erikaheidi/hacktober-panel');
    }

    public function getRaw($query)
    {
        return $this->get($query);
    }

    public function getIssues($label = 'hacktoberfest')
    {
        $query_string = "?q=label:$label+state:open&type=issues";

        return $this->get(self::$API_URL . self::$ENDPOINT_ISSUES . '?q=' . $query_string);
    }

    protected function get($query)
    {
        return $this->client->get($query);
    }
}