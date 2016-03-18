<?php
    /**
     * Created by PhpStorm.
     * User: Satoshi
     * Date: 18/03/2016
     * Time: 16:03
     */

    namespace UniApi\ExampleSDK\Message\Endpoints;

    interface EndpointInterface {

        public function getEndpoint();

        public function serializePayload($rawPayload);

        public function parseResponse($rawPayload);

        public function analyseResponse($response);
    }