<?php

namespace Yeamin\Bitly\Client;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Psr7\Request;


/**
 * Class BitlyClient
 */
Class BitlyClient
{
    private $client;
    private $token;

    /**
     * BitlyClient constructor.
     *
     * @param ClientInterface $client
     * @param $token
     */
    public function __construct(ClientInterface $client, $token)
    {
        $this->client = $client;
        $this->token = $token;
    }


    /**
     * Process and give short url
     *
     * @param String $long_url
     * @return String
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getShortUrl(String $long_url): String
    {
        try {
            $requestUrl = 'https://api-ssl.bitly.com/v4/shorten';

            $header = [
                'Authorization' => 'Bearer ' . $this->token,
                'Content-Type' => 'application/json',
            ];

            $request = new Request('POST', $requestUrl, $header, json_encode(['long_url' => $long_url]));
            $response = $this->client->send($request);
            $data = json_decode($response->getBody()->getContents(), true);

            return $data['link'];
        }
        catch (\Exception $exception){
            return $exception->getMessage();
        }

    }
}
