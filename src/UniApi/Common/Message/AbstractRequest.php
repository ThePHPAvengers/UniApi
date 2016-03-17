<?php
    /**
     * Abstract Request
     */

    namespace UniApi\Common\Message;

    use UniApi\Common\Helpers;
    use InvalidArgumentException;
    use Guzzle\Http\ClientInterface;
    use UniApi\Common\Exception\RuntimeException;
    use Symfony\Component\HttpFoundation\ParameterBag;
    use UniApi\Common\Exception\InvalidRequestException;
    use Symfony\Component\HttpFoundation\Request as HttpRequest;

    /**
     * Class AbstractRequest
     *
     * @package UniApi\Common\Message
     */
    abstract class AbstractRequest
    {
        /**
         * The request parameters
         *
         * @var \Symfony\Component\HttpFoundation\ParameterBag
         */
        protected $parameters;

        /**
         * The request client.
         *
         * @var \Guzzle\Http\ClientInterface
         */
        protected $httpClient;

        /**
         * The HTTP request object.
         *
         * @var \Symfony\Component\HttpFoundation\Request
         */
        protected $httpRequest;

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
        public function __construct(ClientInterface $httpClient, HttpRequest $httpRequest)
        {
            $this->httpClient = $httpClient;
            $this->httpRequest = $httpRequest;
            $this->initialize();
        }

        /**
         * Initialize the object with parameters.
         *
         * If any unknown parameters passed, they will be ignored.
         *
         * @param array $parameters An associative array of parameters
         *
         * @return $this
         * @throws RuntimeException
         */
        public function initialize(array $parameters = array())
        {
            if (null !== $this->response) {
                throw new RuntimeException('Request cannot be modified after it has been sent!');
            }

            $this->parameters = new ParameterBag;

            Helper::initialize($this, $parameters);

            return $this;
        }

        /**
         * Get all parameters as an associative array.
         *
         * @return array
         */
        public function getParameters()
        {
            return $this->parameters->all();
        }

        /**
         * Get a single parameter.
         *
         * @param string $key The parameter key
         * @return mixed
         */
        protected function getParameter($key)
        {
            return $this->parameters->get($key);
        }

        /**
         * Set a single parameter
         *
         * @param string $key The parameter key
         * @param mixed $value The value to set
         * @return AbstractRequest Provides a fluent interface
         * @throws RuntimeException if a request parameter is modified after the request has been sent.
         */
        protected function setParameter($key, $value)
        {
            if (null !== $this->response) {
                throw new RuntimeException('Request cannot be modified after it has been sent!');
            }

            $this->parameters->set($key, $value);

            return $this;
        }

        /**
         * Send the request
         *
         * @return ResponseInterface
         */
        public function send()
        {
            $data = $this->getData();

            return $this->sendData($data);
        }

        /**
         * Get the associated Response.
         *
         * @return ResponseInterface
         */
        public function getResponse()
        {
            if (null === $this->response) {
                throw new RuntimeException('You must call send() before accessing the Response!');
            }

            return $this->response;
        }
    }