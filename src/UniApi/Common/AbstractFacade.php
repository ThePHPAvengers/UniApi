<?php
    /**
     * Base payment gateway class
     */

    namespace UniApi\Common;

    use UniApi\Common\Helpers\CommonHelper;

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
        public $httpClient;

        /**
         * @var \Symfony\Component\HttpFoundation\Request
         */
        protected $httpRequest;

        /**
         * Create a new gateway instance
         *
         * @param ClientInterface $httpClient
         */
        public function __construct(ClientInterface $httpClient)
        {
            $this->$httpClient = $httpClient;
            $this->helper = new CommonHelper;
            $this->initialize();
        }

        abstract public function getName();

        /**
         * Get the short name of the Gateway
         *
         * @return string
         */
        public function getShortName()
        {
            return $this->helper->getFacadeShortName(get_class($this));
        }

        /**
         * Initialize this gateway with default parameters
         *
         * @param  array $parameters
         * @return $this
         */
        public function initialize(array $parameters = array())
        {

            // set default parameters
            foreach ($this->getDefaultParameters() as $key => $value) {
                if (is_array($value)) {
                    $this->parameters->set($key, reset($value));
                } else {
                    $this->parameters->set($key, $value);
                }
            }

            $this->helper->initialize($this, $parameters);

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
            $className = $this->getName();
            $obj = new $class($this->$className->httpClient, $this->httpRequest);
            return $obj->initialize(array_replace($this->getParameters(), $parameters));
        }

    }
