<?php

    namespace UniApi\ExampleSDK\Message;

    /**
     * Interface MessageInterface
     *
     * @package UniApi\ExampleSDK\Message
     */
    interface MessageInterface
    {
        /**
         * @return mixed
         */
        public function send($rawPayload);
    }