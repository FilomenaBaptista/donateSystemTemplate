<?php

namespace App\Helpers;

class GuzzleHelper
{

    public static function getAsync($url, $param)
    {
        if(strpos('localhost', $url) !== TRUE) {
            $url = str_replace('localhost', 'nginx', $url);
        }

        $client = new \GuzzleHttp\Client();

        $promise = $client->getAsync($url, ['query' => $param])->then(
            function ($response) {
                $response = json_decode($response->getBody(), true);
                return $response['data'];
            },
            function ($exception) {
                $exception->getMessage();
            }
        );

        return $promise;
    }

    public static function postGuzzleRequest($url, $params)
    {
        if(strpos('localhost', $url) !== TRUE) {
            $url = str_replace('localhost', 'nginx', $url);
        }

        $client = new \GuzzleHttp\Client();
        $request = $client->post($url, ['form_params' => $params]);
        $response = json_decode($request->getBody(), true);

        return $response;
    }

    public static function deleteGuzzleRequest($url, $params)
    {
        if(strpos('localhost', $url) !== TRUE) {
            $url = str_replace('localhost', 'nginx', $url);
        }

        $client = new \GuzzleHttp\Client();
        $request = $client->delete($url, ['form_params' => $params]);
        return json_decode($request->getBody(), true);
    }

    public static function putGuzzleRequest($url, $params)
    {
        if(strpos('localhost', $url) !== TRUE) {
            $url = str_replace('localhost', 'nginx', $url);
        }

        $client = new \GuzzleHttp\Client();
        $request = $client->put($url, ['form_params' => $params]);
        $response = json_decode($request->getBody(), true);

        return $response;
    }

}
