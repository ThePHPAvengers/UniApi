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

        private $errors;
        private $request;
        private $response;

        /**
         * @param string $message
         * @param array $errors
         * @param RequestInterface $request
         * @param ResponseInterface $response
         * @param \Exception $previous
         */
        public function __construct($message, array $errors, RequestInterface $request, ResponseInterface $response, \Exception $previous)
        {
            parent::__construct($message, 0, $previous);
            $this->errors = $errors;
            $this->request = $request;
            $this->response = $response;
        }

        /**
         * @return array
         */
        public function getErrors()
        {
            return $this->errors;
        }

        /**
         * @return mixed
         */
        public function getError()
        {
            if (isset($this->errors[0])) {
                return $this->errors[0];
            }
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

        /**
         * @return int
         */
        public function getStatusCode()
        {
            return $this->response->getStatusCode();
        }
    }