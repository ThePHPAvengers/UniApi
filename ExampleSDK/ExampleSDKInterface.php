<?php

    namespace UniApi\ExampleSDK;

    /**
     * Interface ExampleSDKInterface
     *
     * Add a interface function for each method of your api
     *
     * @package ExampleSDK\Message
     */
    interface ExampleSDKInterface {

        /**
         * @return mixed
         */
        public function httpbinPostEndpoint();

        /**
         * @return mixed
         */
        public function httpbinGetEndpoint();

    }