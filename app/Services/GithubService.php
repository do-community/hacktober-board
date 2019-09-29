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

    protected function get($query)
    {
        return $this->client->get($query);
    }

    public function getRaw($query)
    {
        return $this->get($query);
    }

    public function getIssues($label = 'hacktoberfest', $language = null)
    {
        $filter_lang = "";
        if ($language) {
            $filter_lang = "+language=$language";
        }

        $date = '2019-01-01';
        $query_string = "?q=label:$label+state:open+created:>$date+$filter_lang&type=Issues";

        return $this->get(self::$API_URL . self::$ENDPOINT_ISSUES . '?q=' . $query_string);
    }
}