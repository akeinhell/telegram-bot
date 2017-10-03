<?php


namespace Telegram;


use GuzzleHttp\Client;

class Api
{
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }


    public function call($string, $params = [])
    {
        $response = (string)$this->client->post($string, ['form_params' => $params])->getBody();;

        return array_get(\GuzzleHttp\json_decode($response, true), 'result');
    }
}