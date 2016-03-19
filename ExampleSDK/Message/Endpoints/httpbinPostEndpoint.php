<?php

    namespace UniApi\ExampleSDK\Message\Endpoints;

    use UniApi\Common\HttpClient;
    use UniApi\Common\Helpers\HandlerHelper;
    use UniApi\ExampleSDK\Message\MessageTrait;
    use UniApi\ExampleSDK\Message\MessageInterface;
    use UniApi\ExampleSDK\Message\AbstractRequest;

    /**
     * Class httpbinPostEndpoint
     *
     * @package UniApi\ExampleSDK\Message
     */
    class httpbinPostEndpoint extends AbstractRequest implements MessageInterface {

        use MessageTrait;

        public $endpoint = 'post';
        public $requestType = 'json';
        public $responseType = 'json';

        /**
         * @param HttpClient $httpClient
         */
        public function __construct(HttpClient $httpClient)
        {
            $this->transport = $httpClient;

            $this->handler = HandlerHelper::getHandler($this->requestType);

            $this->transport->setHeaders(
                $this->transport->getAttribute('options'),
                [
                    'Content-Type' => HandlerHelper::getFullMime($this->requestType),
                    'Accept'       => HandlerHelper::getFullMime($this->responseType),
                ]
            );
        }

        /**
         * @param $rawPayload
         *
         * @return mixed
         */
        public function send($rawPayload)
        {
            return $this->transport->post($this->getEndpoint(),[],$this->serializePayload($rawPayload));
        }
    }