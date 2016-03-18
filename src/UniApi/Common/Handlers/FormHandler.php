<?php

    namespace UniApi\Helpers\MimeHandlers;

    use UniApi\Interfaces\HandlerInterface;

    class FormHandler implements HandlerInterface
    {
        /**
         * @param $body
         *
         * @return mixed
         */
        public function parse($body)
        {
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