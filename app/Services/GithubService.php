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
        $this->client = new CurlClient('User-Agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.75 Safari/537.36');
    }

    protected function get($query)
    {
        return $this->client->get($query, $this->getDefaultHeaders());
    }

    public function getRaw($query)
    {
        return $this->get($query);
    }

    public function getIssues($search = null, $language = null, $cap_date = null)
    {
        $label = 'hacktoberfest';

        $query_string = "$search+label:$label+type:issue+state:open";

        if (!$cap_date) {
            $cap_date = date('Y') . '-01-01';
        }

        //issues should have been updated recently
        $query_string .= "+created:>$cap_date";

        if ($language) {
            $query_string .= "+language:$language";
        }

        $query_string .= '&sort=created&order=desc&per_page=100';

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
