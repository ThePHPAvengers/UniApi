<?php

    /**
     * Created by PhpStorm.
     * User: jkirkby91
     * Date: 10/03/2016
     * Time: 22:09
     */

    namespace UniApiClient\Handlers;

    use UniApiClient\Interfaces\HandlerInterface;

    class XmlHandler extends HandlerAdapter implements HandlerInterface {

        /**
         * @param string $body
         *
         * @return mixed
         */
        public function parse($body)
        {
            return $body;
        }

        /**
         * @param mixed $payload
         *
         * @return mixed|string|void
         */
        public function serialize($payload)
        {
            return $payload;
        }
    }