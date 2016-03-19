<?php

    /**
     * Created by PhpStorm.
     * User: jkirkby91
     * Date: 10/03/2016
     * Time: 13:14
     */

    namespace UniApi\Common\Exception;

    use UniApi\Common\Enum\HttpErrorCode;
    use Psr\Http\Message\RequestInterface;
    use Psr\Http\Message\ResponseInterface;
    use UniApi\Common\Exception\ExceptionInterface;

    /**
     * Class HttpException
     *
     * @package UniApi\Common\Exception
     */
    class HttpException extends \RuntimeException implements ExceptionInterface
    {

        private $request;
        private $response;

        /**
         * @param string $message
         * @param int $statusCode
         * @param RequestInterface $request
         * @param ResponseInterface $response
         */
        public function __construct($message, $statusCode, RequestInterface $request, ResponseInterface $response)
        {
            parent::__construct($message,$statusCode);
            $this->message      = $message;
            $this->request      = $request;
            $this->response     = $response;
            $this->code         = $statusCode;
        }

        /**
         * @return RequestInterface
         */
        public function getRequest()
        {
            return $this->request;
        }

        /**
         * @return ResponseInterface
         */
        public function getResponse()
        {
            return $this->response;
        }
    }