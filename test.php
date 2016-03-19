<?php

    /**
     * Created by PhpStorm.
     * User: Satoshi
     * Date: 16/03/2016
     * Time: 17:33
     */

    require_once(__DIR__ . '/vendor/autoload.php');

    // initialize the base client
    try {
        $exampleSDKClient = \UniApi\UniApiClient::create('ExampleSDK');
    } catch (RuntimeException $e) {
        echo $e->getMessage();
    }
    $response = $exampleSDKClient
        ->httpBinPost()
        ->send([
                'foo' => 'bar',
                'key' => 'var'
            ]);

    // call our method and send
    ddd(
$response
    );