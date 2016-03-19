<?php

    require_once(__DIR__ . '/vendor/autoload.php');

    // initialize the base client
    try {
        $exampleSDKClient = \UniApi\UniApiClient::create('ExampleSDK');
    } catch (RuntimeException $e) {
        echo $e->getMessage();
    }

    // call our method and send
    $response = $exampleSDKClient
        ->httpBinPost()
        ->send([
                'user' => [
                    'email'     => 'jon@smith.com',
                    'password'  => md5('password'),
                    'profile'   => [
                        'dob'       => '15/08/1992',
                        'userName'  => 'TerryTibbs'
                    ]
                ]
            ]);

    ddd($response);