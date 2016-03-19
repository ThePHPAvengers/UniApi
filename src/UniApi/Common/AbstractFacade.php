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
         * @var \Guzzle\Http\ClientInterface
         */
        public $httpClient;
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
    }