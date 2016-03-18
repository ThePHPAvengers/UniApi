<?php
    /**
     * Abstract Request
     */

    namespace UniApi\Common\Message;

    use InvalidArgumentException;
    use UniApi\Common\HttpClient;
    use UniApi\Common\Helpers\CommonHelper;
    use UniApi\Common\Handlers\HandlerRegistry;
    use UniApi\Common\Exception\RuntimeException;
    use UniApi\Common\Exception\InvalidRequestException;

    /**
     * Class AbstractRequest
     *
     * @package UniApi\Common\Message
     */
    abstract class AbstractRequest
    {

        /**
         * The request client.
         *
         * @var \Guzzle\Http\ClientInterface
         */
        protected $httpClient;

        /**
         * An associated ResponseInterface.
         *
         * @var ResponseInterface
         */
        protected $response;

        /**
         * Create a new Request
         *
         * @param ClientInterface $httpClient  A Guzzle client to make API calls with
         * @param HttpRequest     $httpRequest A Symfony HTTP request object
         */
        public function __construct(HttpClient $httpClient)
        {
            $this->helper = new CommonHelper();
            $this->httpClient = $httpClient;
            $this->initialize();
        }

        /**
         * Initialize the object with parameters.
         *
         * @param array $parameters
         *
         * @return $this
         * @throws \UniApi\Common\Exception\RuntimeException
         */
        public function initialize(array $parameters = [])
        {
            if (null !== $this->response) {
                throw new RuntimeException('Request cannot be modified after it has been sent!');
            }

            $this->helper->initialize($this, $parameters);

            return $this;
        }
    }