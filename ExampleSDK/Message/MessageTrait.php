<?php

    /**
     * Created by PhpStorm.
     * User: Satoshi
     * Date: 18/03/2016
     * Time: 16:03
     */

    namespace UniApi\ExampleSDK\Message;

    /**
     * Class MessageTrait
     *
     * @package UniApi\ExampleSDK\Message
     */
    trait MessageTrait {

        /**
         * @param $rawPayload
         *
         * @return mixed
         */
        public function send($rawPayload)
        {
            return $this->httpClient->post($this->getEndpoint(),[],$this->serializePayload($rawPayload));
        }

        /**
         * @return string
         */
        private function getEndpoint()
        {
            return $this->uri.$this->endpoint;
        }

        /**
         * @param $rawPayload
         *
         * @return mixed
         */
        public function serializePayload($rawPayload)
        {
            return $this->handler->serialize($rawPayload);
        }

        /**
         * @param $rawResponse
         *
         * @return mixed
         */
        public function parseResponse($rawResponse)
        {
            return $this->handler->parse($rawResponse);
        }

        /**
         * @param $response
         *
         * @return bool
         */
        public function analyseResponse($response)
        {
            //do logic
            return true;
        }

    }