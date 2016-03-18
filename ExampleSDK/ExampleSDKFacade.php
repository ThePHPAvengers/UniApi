<?php

    /**
     * Created by PhpStorm.
     * User: Satoshi
     * Date: 17/03/2016
     * Time: 16:10
     */

    namespace UniApi\ExampleSDK;

    use UniApi\Common\AbstractFacade;
    use UniApi\Common\HttpClient;
    use UniApi\ExampleSDK\ExampleSDK;

    class ExampleSDKFacade extends AbstractFacade
    {
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
         * @return $this
         */
        public function httpBinPost()
        {
            return $this->exampleSDK->httpbinPostEndpoint();
        }
    }