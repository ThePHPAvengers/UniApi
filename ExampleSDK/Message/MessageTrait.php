<?php

    namespace UniApi\ExampleSDK\Message;

    /**
     * Class MessageTrait
     *
     * @package UniApi\ExampleSDK\Message
     */
    trait MessageTrait {

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
         * @return bool
         */
        public function parseResponse($rawResponse)
        {
            return $this->analyseResponse($this->handler->parse($rawResponse));
        }

        /**
         * @param $response
         *
         * @return bool
         */
        public function analyseResponse($response)
        {
            //do logic
            return $response;
        }
    }