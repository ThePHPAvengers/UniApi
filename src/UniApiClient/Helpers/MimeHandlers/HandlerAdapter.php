<?php

    /**
     * Created by PhpStorm.
     * User: jkirkby91
     * Date: 10/03/2016
     * Time: 22:10
     */

    namespace UniApiClient\Helpers\MimeHandlers;

    class HandlerAdapter {

        public function __construct(array $args = array())
        {
            $this->init($args);
        }

        /**
         * Initial setup of
         * @param array $args
         */
        public function init(array $args)
        {
        }

        /**
         * @param string $body
         * @return mixed
         */
        public function parse($body)
        {
            return $body;
        }

        /**
         * @param mixed $payload
         * @return string
         */
        function serialize($payload)
        {
            return (string) $payload;
        }

        /**
         * @param $body
         *
         * @return string
         */
        protected function stripBom($body)
        {
            if ( substr($body,0,3) === "\xef\xbb\xbf" )  // UTF-8
                $body = substr($body,3);
            else if ( substr($body,0,4) === "\xff\xfe\x00\x00" || substr($body,0,4) === "\x00\x00\xfe\xff" )  // UTF-32
                $body = substr($body,4);
            else if ( substr($body,0,2) === "\xff\xfe" || substr($body,0,2) === "\xfe\xff" )  // UTF-16
                $body = substr($body,2);
            return $body;
        }
    }