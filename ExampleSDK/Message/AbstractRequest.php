<?php

    namespace UniApi\ExampleSDK\Message;

    /**
     * Class AbstractRequest
     *
     * @package UniApi\ExampleSDK\Message
     */
    abstract class AbstractRequest extends \UniApi\Common\Message\AbstractRequest
    {
        /**
         * @var string
         */
        protected $uri = 'http://httpbin.org/';

        /**
         * @return mixed
         */
        abstract protected function getEndpoint();

        /**
         * @param $rawPayload
         *
         * @return mixed
         */
        abstract protected function serializePayload($rawPayload);

        /**
         * @param $rawPayload
         *
         * @return mixed
         */
        abstract protected function parseResponse($rawPayload);

        /**
         * @param $response
         *
         * @return mixed
         */
        abstract protected function analyseResponse($response);
    }