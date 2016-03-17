<?php

    namespace UniApi\Common;

    use Guzzle\Http\ClientInterface;
    use UniApi\Common\Helpers\CommonHelper;
    use UniApi\Common\Exception\RuntimeException;
    use Symfony\Component\HttpFoundation\Request as HttpRequest;

    /**
     * Class FacadeFactory
     *
     * This class returns a SDK implementations facade for easy use within UniApi client
     *
     * @package UniApi\Common
     */
    class FacadeFactory
    {

        /**
         * @var Helpers\CommonHelper
         */
        protected $helper;

        public function __construct()
        {
            $this->helper = new CommonHelper();
        }

        /**
         * Internal storage for all available gateways
         *
         * @var array
         */
        private $gateways = array();

        /**
         * All available gateways
         *
         * @return array An array of gateway names
         */
        public function all()
        {
            return $this->gateways;
        }

        /**
         * Replace the list of available gateways
         *
         * @param array $gateways An array of gateway names
         */
        public function replace(array $gateways)
        {
            $this->gateways = $gateways;
        }

        /**
         * Register a new gateway
         *
         * @param string $className Gateway name
         */
        public function register($className)
        {
            if (!in_array($className, $this->gateways)) {
                $this->gateways[] = $className;
            }
        }

        /**
         * Automatically find and register all officially supported gateways
         *
         * @return array An array of gateway names
         */
        public function find()
        {
            foreach ($this->getSupportedGateways() as $gateway) {
                $class = $this->helper-getFacadeClassName($gateway);
                if (class_exists($class)) {
                    $this->register($gateway);
                }
            }

            ksort($this->gateways);

            return $this->all();
        }

        /**
         * Create a new facade for the SDK
         *
         * @param $className
         * @param ClientInterface $httpClient
         * @param HttpRequest $httpRequest
         *
         * @return mixed
         * @throws Exception\RuntimeException
         */
        public function create($className, ClientInterface $httpClient = null, HttpRequest $httpRequest = null)
        {
            $facade = $this->helper->getFacadeClassName($className);

            if (!class_exists($facade)) {
                throw new RuntimeException("Class '$facade' not found");
            }
            $className = $this->helper->getSDKClassName($className);
            return new $facade(new $className);
        }

        /**
         * Get a list of supported gateways which may be available
         *
         * @return array
         */
        public function getSupportedGateways()
        {
            $package = json_decode(file_get_contents(__DIR__.'/../../../composer.json'), true);

            return $package['supported-sdk'];
        }
    }
