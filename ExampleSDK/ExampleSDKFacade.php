<?php

    namespace UniApi\ExampleSDK;

    use UniApi\ExampleSDK\ExampleSDK;
    use UniApi\Common\AbstractFacade;

    class ExampleSDKFacade extends AbstractFacade
    {
        /**
         * @var ExampleSDK
         */
        public $exampleSDK;

        public $endpoint = '/post';

        public function __construct(ExampleSDK $exampleSDK)
        {
            $this->exampleSDK = $exampleSDK;
        }

        /**
         * @return string
         */
        public function getName()
        {
            return 'ExampleSDK';
        }

        /**
         * @param $payload
         *
         * @return myApiEndpointMethod
         */
        public function httpBinPost()
        {
            return $this->exampleSDK->httpbinPostEndpoint();
        }
    }