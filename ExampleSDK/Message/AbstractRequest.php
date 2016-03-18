<?php

    namespace UniApi\ExampleSDK\Message;

    abstract class AbstractRequest extends \UniApi\Common\Message\AbstractRequest
    {
        protected $uri = 'http://httpbin.org/';
    }