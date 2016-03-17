<?php
    /**
     * Abstract Response
     */

    namespace UniApi\Common\Message;

    use Psr\Http\Message\ResponseInterface;
    use UniApi\Common\Exception\RuntimeException;

    /**
     * Class AbstractResponse
     *
     * @package UniApi\Common\Message
     */
    abstract class AbstractResponse implements ResponseInterface
    {

        /**
         * @var RequestInterface
         */
        protected $request;

        /**
         * @var
         */
        protected $data;

        /**
         * @param RequestInterface $request
         * @param $data
         */
        public function __construct(RequestInterface $request, $data)
        {
            $this->request = $request;
            $this->data = $data;
        }

        /**
         * Get the initiating request object.
         *
         * @return RequestInterface
         */
        public function getRequest()
        {
            return $this->request;
        }

        /**
         * Get the response data.
         *
         * @return mixed
         */
        public function getData()
        {
            return $this->data;
        }

        /**
         * Return an instance with the specified status code and, optionally, reason phrase.
         *
         * @param int $code
         * @param string $reasonPhrase
         *
         * @return null|ResponseInterface
         */
        public function withStatus($code, $reasonPhrase = '')
        {
            return null;
        }

        /**
         * Response Message
         *
         * @return null|string A response message from the payment gateway
         */
        public function getReasonPhrase()
        {
            return null;
        }

        /**
         * Gets the response status code.
         *
         * @return int|void
         */
        public function getStatusCode()
        {
            return null;
        }
    }