<?php

    namespace UniApi\Common\Exception;

    use UniApi\Common\Exception\ExceptionInterface;

    /**
     * Class InvalidResponseException
     *
     * @package UniApi\Common\Exception
     */
    class InvalidResponseException extends \Exception implements ExceptionInterface
    {
        public function __construct($message = "Invalid response from payment gateway", $code = 0, $previous = null)
        {
            parent::__construct($message, $code, $previous);
        }
    }
