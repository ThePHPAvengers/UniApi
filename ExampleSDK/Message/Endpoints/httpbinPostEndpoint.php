<?php

    namespace UniApi\ExampleSDK\Message\Endpoints;

    use UniApi\Common\HttpClient;
    use UniApi\Common\Helpers\HandlerHelper;
    use UniApi\ExampleSDK\Message\AbstractRequest;

    /**
     * Class httpbinPostEndpoint
     *
     * @package UniApi\ExampleSDK\Message
     */
    class httpbinPostEndpoint extends AbstractRequest implements EndpointInterface {

        public $endpoint = '/post';
        public $requestType = 'json';
        public $responseType = 'json';

        /**
         * @param HttpClient $httpClient
         */
        public function __construct(HttpClient $httpClient)
        {
            $this->handler = HandlerHelper::getHandler($this->requestType);

            $httpClient->setHeaders(
                $httpClient->getAttribute('options'),
                [
                    'Content-Type' => HandlerHelper::getFullMime($this->requestType),
                    'Accept'       => HandlerHelper::getFullMime($this->responseType),
                ]
            );
        }

        /**
         * @return string
         */
        public function getEndpoint()
        {
            return $this->endpoint;
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