<?php

    namespace UniApi\ExampleSDK\Message\Endpoints;

    use UniApi\Common\Handlers\HandlerRegistry;

    /**
     * Class httpbinPostEndpoint
     *
     * @package UniApi\ExampleSDK\Message
     */
    class httpbinPostEndpoint extends \UniApi\ExampleSDK\Message\AbstractRequest
    {
        public function __construct()
        {
        //@TODO set request mime type
            $this->handlerRegistry = new HandlerRegistry();
            $this->setRequestContentType('json');
        }

        /**
         * @return mixed|void
         */
        public function setRequestContentType($mimeShortName)
        {
            $requestContentType = $this->handlerRegistry->getFullMime($mimeShortName);
            //@TODO set headers
        }

        /**
         * @return array|mixed
         */
        public function payloadFactory($rawData)
        {
            return json_encode($rawData);
        }

        /**
         * @return string
         */
        function getEndpoint()
        {
            return $this->endpoint.'/post';
        }
    }