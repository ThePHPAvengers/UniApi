<?php

    require __DIR__ . '/vendor/autoload.php';
    $UniApiClient = new UniApiClient\Gateway();
    var_dump($UniApiClient->func());