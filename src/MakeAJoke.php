<?php
namespace Joker;

use GuzzleHttp\Client;
/**
 *
 */
class MakeAJoke
{
    private $client;

    public function __construct()
    {
        $this->client = new Client([
            "base_uri" => "http://api.icndb.com/jokes/"
        ]);
    }

    private function getClient()
    {
        return $this->client;
    }

    public function tellMeARandomJoke($html = true, $firstName = false, $lastName = false)
    {
        $query = [];
        if ($firstName !== false) {
            $query['firstName'] = $firstName;
        }
        if ($lastName !== false) {
            $query['lastName'] = $lastName;
        }
        $response = $this->getClient()->get("random", ['query' => $query]);
        $data = json_decode((string) $response->getBody(), true);
        $joke = $data['value']['joke'];
        if ($html === false) {
            $joke = html_entity_decode($joke);
        }
        return $joke;
    }
}
