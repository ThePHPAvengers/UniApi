<?php

    /**
     * Created by PhpStorm.
     * User: Satoshi
     * Date: 16/03/2016
     * Time: 17:33
     */

    require_once(__DIR__ . '/vendor/autoload.php');

    use UniApi\UniApiClient as ApiClient;

    // initalise the base client
    try {
        $exampleSDKClient = ApiClient::create('ExampleSDK');
    } catch (RuntimeException $e) {
        echo $e->getMessage();
    }

    $rawPayload = [
        'foo' => 'bar',
        'key' => 'var',
    ];

    $response = $exampleSDKClient->httpBinPost()->send($rawPayload);

    d($response);

    //  $response =$exampleSDKClient->exampleSDK->httpClient->send($request);

  //    d($response);
