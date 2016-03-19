<?php

    namespace UniApi\ExampleSDK;

    use UniApi\Common\FacadeFactory;
    use UniApi\ExampleSDK\Message\Endpoints\httpbinPostEndpoint;

    /**
     * Class ExampleSDK
     *
     * @package UniApi\ExampleSDK
     */
    class ExampleSDK implements ExampleSDKInterface
    {

        public function __construct($httpClient)
        {
            $this->httpClient = $httpClient;
        }

        /**
         * @return mixed|httpbinPostEndpoint
         */
        public function httpbinPostEndpoint()
        {
            return new httpbinPostEndpoint($this->httpClient);
        }

        /**
         * @return mixed|void
         */
        public function httpbinGetEndpoint(){}
    }