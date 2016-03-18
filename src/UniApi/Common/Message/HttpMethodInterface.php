<?php

    /**
     * Created by PhpStorm.
     * User: Satoshi
     * Date: 16/03/2016
     * Time: 19:39
     */

    namespace UniApi\Common\Message;

    /**
     * Interface HttpMethodInterface
     *
     * @package UniApi\Common\Message
     */
    interface HttpMethodInterface {

        /**
         * @param $uri
         * @param $headers
         *
         * @internal param $payload
         * @internal param $endpoint
         *
         * @return mixed
         */
        public function get($uri,array $headers);

        /**
         * @param $uri
         * @param $headers
         * @param $body
         *
         * @internal param $payload
         * @internal param $endpoint
         *
         * @return mixed
         */
        public function post($uri,array $headers,$body);

        /**
         * @param $uri
         * @param $headers
         * @param $body
         *
         * @internal param $payload
         * @internal param $endpoint
         *
         * @return mixed
         */
        public function head($uri,array $headers,$body);

        /**
         * @param $uri
         * @param $headers
         * @param $body
         *
         * @internal param $payload
         * @internal param $endpoint
         *
         * @return mixed
         */
        public function put($uri,array $headers,$body);

        /**
         * @param $uri
         * @param $headers
         * @param $body
         *
         * @internal param $payload
         * @internal param $endpoint
         *
         * @return mixed
         */
        public function delete($uri,array $headers,$body);

        /**
         * @param $uri
         * @param $headers
         * @param $body
         *
         * @internal param $payload
         * @internal param $endpoint
         *
         * @return mixed
         */
        public function options($uri,array $headers,$body);

        /**
         * @param $uri
         * @param $headers
         * @param $body
         *
         * @internal param $payload
         * @internal param $endpoint
         *
         * @return mixed
         */
        public function patch($uri,array $headers,$body);

    }