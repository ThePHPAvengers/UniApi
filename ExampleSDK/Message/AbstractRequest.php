<?php

    namespace UniApi\ExampleSDK\Message;

    abstract class AbstractRequest extends \UniApi\Common\Message\AbstractRequest
    {
        protected $endpoint = 'http://httpbin.org/';

    }