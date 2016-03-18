<?php

    /**
     * Created by PhpStorm.
     * User: jkirkby91
     * Date: 10/03/2016
     * Time: 22:08
     */

    namespace UniApi\Common\Handlers;

    use UniApi\Common\Handlers\HandlerInterface;

    class JsonHandler implements HandlerInterface
    {
        /**
         * @param $body
         *
         * @return mixed
         */
        public function parse($body){
            return $body;
        }

        /**
         * @param $payload
         *
         * @return mixed
         */
        public function serialize($payload){
            return $payload;
        }

    }