<?php

    /**
     * Created by PhpStorm.
     * User: Satoshi
     * Date: 17/03/2016
     * Time: 16:18
     */

    namespace UniApi\ExampleSDK;

    use UniApi\ExampleSDK\Request;
    use UniApi\ExampleSDK\Response;

    class ExampleSDK {

        public function __construct()
        {
            $this->request = new Request(new \UniApi\Common\HttpClient);
        }

        /**
         *
         */
        public function getMethodEndPoint()
        {
            $endpoint = '';
            $this->request->send();
        }

        public function postMethodEndPoint($payload)
        {
            $this->request->send();
        }
    }