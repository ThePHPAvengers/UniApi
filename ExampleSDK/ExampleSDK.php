<?php

    namespace UniApi\ExampleSDK;

    use UniApi\ExampleSDK\Message\AbstractRequest;
    use UniApi\ExampleSDK\Message\Endpoints\httpbinPostEndpoint;

    /**
     * Class ExampleSDK
     *
     * @package UniApi\ExampleSDK
     */
    class ExampleSDK {

        public function __construct($httpClient)
        {
            $this->httpClient = $httpClient;
        }

        /**
         * @return myApiEndpointMethod
         */
        public function httpbinPostEndpoint()
        {
            return new httpbinPostEndpoint($this->httpClient);
        }

        /**
         * @param $payload
         */
        public function postMethodEndPoint($payload)
        {
          //  $this->request->send();
        }
    }