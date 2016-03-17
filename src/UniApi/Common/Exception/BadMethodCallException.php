<?php

    namespace UniApi\Common\Exception;

    use UniApi\Common\Exception\ExceptionInterface;

    /**
     * Bad Method Call Exception
     */
    class BadMethodCallException extends \BadMethodCallException implements ExceptionInterface
    {
    }
