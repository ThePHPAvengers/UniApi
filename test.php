<?php

    /**
     * Created by PhpStorm.
     * User: Satoshi
     * Date: 16/03/2016
     * Time: 17:33
     */

    require_once(__DIR__ . '/vendor/autoload.php');

    use UniApi\UniApiClient;

    try {
        $gateway = UniApiClient::create('ExampleSDK');
    } catch (RuntimeException $e) {
        echo $e->getMessage();
    }

    $gateway->getMethodEndPoint()->postMethodEndpoint();