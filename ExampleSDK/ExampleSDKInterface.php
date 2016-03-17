<?php

    /**
     * Created by PhpStorm.
     * User: jkirkby91
     * Date: 17/03/2016
     * Time: 15:33
     */

    namespace UniApi\ExampleSDK;

    /**
     * Interface ExampleSDKInterface
     *
     * @package ExampleSDK\Message
     */
    interface ExampleSDKInterface {

        /**
         * @return mixed
         */
        public function getMethodEndPoint();

        /**
         * @return mixed
         */
        public function postMethodEndPoint();

    }