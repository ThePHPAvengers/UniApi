<?php

    /**
     * Created by PhpStorm.
     * User: jkirkby91
     * Date: 10/03/2016
     * Time: 22:08
     */

    namespace UniApiClient\Interfaces;

    /**
     * Interface HandlerInterface
     *
     * @package UniApiClient\Interfaces
     */
    interface HandlerInterface {

        /**
         * @param $body
         *
         * @return mixed
         */
        public function parse($body);

        /**
         * @param $payload
         *
         * @return mixed
         */
        public function serialize($payload);
    }