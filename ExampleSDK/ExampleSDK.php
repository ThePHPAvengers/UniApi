<?php

    namespace UniApi\ExampleSDK;

    use UniApi\ExampleSDK\Message\AbstractRequest;
    use UniApi\ExampleSDK\Message\myApiEndpointMethod;

    /**
     * Class ExampleSDK
     *
     * @package UniApi\ExampleSDK
     */
    class ExampleSDK extends AbstractRequest {

        public function __construct($httpClient)
        {
            $this->httpClient = $httpClient;
        }

        /**
         * @return myApiEndpointMethod
         */
        public function getMethodEndPoint()
        {
            return new myApiEndpointMethod($this->httpClient);
        }

        public function postMethodEndPoint($payload)
        {
          //  $this->request->send();
        }
    }