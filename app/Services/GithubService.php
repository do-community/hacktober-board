<?php

namespace App\Services;

use App\Helper\CurlClient;

class GithubService
{
    static $API_URL = 'https://api.github.com';

    static $ENDPOINT_ISSUES = "/search/issues";

    protected $token;

    protected $client;

    public function __construct($token = null)
    {
        $this->token = $token;
        $this->client = new CurlClient('erikaheidi/hacktober-panel');
    }

    protected function get($query)
    {
        return $this->client->get($query, $this->getDefaultHeaders());
    }

    public function getRaw($query)
    {
        return $this->get($query);
    }

    public function getIssues($search = null, $label = null, $language = null, $cap_date = null)
    {
        $query_string = "?q=$search+is:issue+state:open";

        if (!$cap_date) {
            $cap_date = date('Y') . '-01-01';
        }

        //issues should have been updated recently
        $query_string .= "+updated:>$cap_date";

        if ($label) {
            $query_string .= "+label:$label";
        }
        if ($language) {
            $query_string .= "+language:$language";
        }

        $query_string .= '&sort=created&order=desc';
        return $this->get(self::$API_URL . self::$ENDPOINT_ISSUES . '?q=' . $query_string);
    }

    /**
     * @return array
     */
    protected function getDefaultHeaders()
    {
        $headers[] = "Accept: application/vnd.github.v3+json";
        $headers[] = "Authorization: token $this->token";

        return $headers;
    }
}