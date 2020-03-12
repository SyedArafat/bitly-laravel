<?php

namespace Yeamin\Bitly\Client;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Request;


/**
 * Class BitlyClient
 */
Class BitlyClient
{
    private $client;
    private $token;
    private $baseUrl;

    /**
     * BitlyClient constructor.
     *
     * @param ClientInterface $client
     * @param $token
     * @param $baseUrl
     */
    public function __construct(ClientInterface $client, $token, $baseUrl)
    {
        $this->client = $client;
        $this->token = $token;
        $this->baseUrl = $baseUrl;
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
            $requestUrl = $this->baseUrl.'/shorten';
            $header=$this->getHeaderInfo();

            $request = new Request('POST', $requestUrl, $header, json_encode(['long_url' => $long_url]));
            $response = $this->client->send($request);
            $data = json_decode($response->getBody()->getContents(), true);

            return $data['link'];
        }
        catch (\Exception $exception){
            return $exception->getMessage();
        }

    }

    /**
     * Get long url from short url
     *
     * @param String $short_url
     * @return String
     * @throws GuzzleException
     */
    public function getLongUrl(String $short_url): String
    {
        try {
            $requestUrl = $this->baseUrl . '/expand';
            $header = $this->getHeaderInfo();
            $parsed_url=parse_url($short_url);
            if(isset($parsed_url['host']))
                $bitlink_id=$parsed_url['host'].$parsed_url['path'];
            else
                $bitlink_id=$parsed_url['path'];
            $request = new Request('POST', $requestUrl, $header, json_encode(['bitlink_id' => $bitlink_id]));
            $response = $this->client->send($request);
            $data = json_decode($response->getBody()->getContents(), true);

            return $data['long_url'];
        }
        catch (\Exception $exception){
            return $exception->getMessage();
        }

    }

    /**
     * @return array
     */
    private function getHeaderInfo(): array
    {
        return [
            'Authorization' => 'Bearer ' . $this->token,
            'Content-Type' => 'application/json',
        ];
    }
}
