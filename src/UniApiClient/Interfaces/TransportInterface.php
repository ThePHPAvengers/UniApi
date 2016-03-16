<?php

    /**
     * Created by PhpStorm.
     * User: Satoshi
     * Date: 16/03/2016
     * Time: 19:39
     */

    namespace UniApiClient\Interfaces;

    interface TransportInterface {

        /**
         * @param $payload
         * @param $endpoint
         *
         * @return mixed
         */
        public function get($endpoint);

        /**
         * @param $payload
         * @param $endpoint
         *
         * @return mixed
         */
        public function head($payload,$endpoint);

        /**
         * @param $payload
         * @param $endpoint
         *
         * @return mixed
         */
        public function post($payload,$endpoint);

        /**
         * @param $payload
         * @param $endpoint
         *
         * @return mixed
         */
        public function put($payload,$endpoint);

        /**
         * @param $payload
         * @param $endpoint
         *
         * @return mixed
         */
        public function delete($payload,$endpoint);

        /**
         * @param $payload
         * @param $endpoint
         *
         * @return mixed|void
         */
        public function trace($payload,$endpoint);

        /**
         * @param $payload
         * @param $endpoint
         *
         * @return mixed
         */
        public function options($payload,$endpoint);
        /**
         * @param $payload
         * @param $endpoint
         *
         * @return mixed
         */
        public function connect($payload,$endpoint);

        /**
         * @param $payload
         * @param $endpoint
         *
         * @return mixed
         */
        public function patch($payload,$endpoint);

    }