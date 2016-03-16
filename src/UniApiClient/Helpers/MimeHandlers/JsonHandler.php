<?php

    /**
     * Created by PhpStorm.
     * User: jkirkby91
     * Date: 10/03/2016
     * Time: 22:08
     */

    namespace UniApiClient\Helpers\MimeHandlers;

    use UniApiClient\Interfaces\HandlerInterface;

    class JsonHandler extends HandlerAdapter implements HandlerInterface
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