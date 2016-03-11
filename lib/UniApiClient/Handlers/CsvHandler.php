<?php

    /**
     * Created by PhpStorm.
     * User: jkirkby91
     * Date: 10/03/2016
     * Time: 22:09
     */

    namespace UniApiClient\Handlers;

    use UniApiClient\Interfaces\HandlerInterface;

    class CsvHandler extends HandlerAdapter implements HandlerInterface {

        /**
         * @param $body
         *
         * @return mixed
         */
        public function parse($body)
        {

        }

        /**
         * @param $payload
         *
         * @return mixed
         */
        public function serialize($payload)
        {

        }
    }