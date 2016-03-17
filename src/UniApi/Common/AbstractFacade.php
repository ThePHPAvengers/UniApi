<?php
    /**
     * Base payment gateway class
     */

    namespace UniApi\Common;

    use Guzzle\Http\ClientInterface;
    use Guzzle\Http\Client as HttpClient;
    use Symfony\Component\HttpFoundation\ParameterBag;
    use Symfony\Component\HttpFoundation\Request as HttpRequest;

    /**
     * Class AbstractFacade
     *
     * @package UniApi\Common
     */
    abstract class AbstractFacade implements FacadeInterface
    {
        /**
         * @var \Symfony\Component\HttpFoundation\ParameterBag
         */
        protected $parameters;

        /**
         * @var \Guzzle\Http\ClientInterface
         */
        protected $httpClient;

        /**
         * @var \Symfony\Component\HttpFoundation\Request
         */
        protected $httpRequest;

        /**
         * Create a new gateway instance
         *
         * @param ClientInterface $httpClient  A Guzzle client to make API calls with
         * @param HttpRequest     $httpRequest A Symfony HTTP request object
         */
        public function __construct(ClientInterface $httpClient = null, HttpRequest $httpRequest = null)
        {
            $this->httpClient = $httpClient ?: $this->getDefaultHttpClient();
            $this->httpRequest = $httpRequest ?: $this->getDefaultHttpRequest();
            $this->initialize();
        }

        /**
         * Get the short name of the Gateway
         *
         * @return string
         */
        public function getShortName()
        {
            return Helper::getGatewayShortName(get_class($this));
        }

        /**
         * Initialize this gateway with default parameters
         *
         * @param  array $parameters
         * @return $this
         */
        public function initialize(array $parameters = array())
        {
            $this->parameters = new ParameterBag;

            // set default parameters
            foreach ($this->getDefaultParameters() as $key => $value) {
                if (is_array($value)) {
                    $this->parameters->set($key, reset($value));
                } else {
                    $this->parameters->set($key, $value);
                }
            }

            Helper::initialize($this, $parameters);

            return $this;
        }

        /**
         * @return array
         */
        public function getDefaultParameters()
        {
            return array();
        }

        /**
         * @return array
         */
        public function getParameters()
        {
            return $this->parameters->all();
        }

        /**
         * @param  string $key
         * @return mixed
         */
        public function getParameter($key)
        {
            return $this->parameters->get($key);
        }

        /**
         * @param  string $key
         * @param  mixed  $value
         * @return $this
         */
        public function setParameter($key, $value)
        {
            $this->parameters->set($key, $value);

            return $this;
        }

        /**
         * @return boolean
         */
        public function getTestMode()
        {
            return $this->getParameter('testMode');
        }

        /**
         * @param  boolean $value
         * @return $this
         */
        public function setTestMode($value)
        {
            return $this->setParameter('testMode', $value);
        }

        /**
         * @param $class
         * @param array $parameters
         *
         * @return mixed
         */
        protected function createRequest($class, array $parameters)
        {
            $obj = new $class($this->httpClient, $this->httpRequest);

            return $obj->initialize(array_replace($this->getParameters(), $parameters));
        }

        /**
         * Get the global default HTTP client.
         *
         * @return HttpClient
         */
        protected function getDefaultHttpClient()
        {
            return new HttpClient(
                '',
                array(
                    'curl.options' => array(CURLOPT_CONNECTTIMEOUT => 60),
                )
            );
        }

        /**
         * Get the global default HTTP request.
         *
         * @return HttpRequest
         */
        protected function getDefaultHttpRequest()
        {
            return HttpRequest::createFromGlobals();
        }
    }
