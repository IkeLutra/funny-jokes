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
        $this->client = new Client();
    }

    private function getClient()
    {
        return $this->client;
    }

    public function tellMeAJoke($html=true)
    {
        $response = $this->getClient()->get("http://api.icndb.com/jokes/random");
        $data = json_decode((string) $response->getBody(), true);
        $joke = $data['value']['joke'];
        if ($html === false) {
            $joke = html_entity_decode($joke);
        }
        return $joke;
    }
}
