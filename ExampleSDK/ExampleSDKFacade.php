<?php

    /**
     * Created by PhpStorm.
     * User: Satoshi
     * Date: 17/03/2016
     * Time: 16:10
     */

    namespace UniApi\ExampleSDK;

    use UniApi\Common\AbstractFacade;
    use UniApi\ExampleSDK\ExampleSDK;

    class ExampleSDKFacade extends AbstractFacade
    {
        public $exampleSDK;

        public function __construct(ExampleSDK $exampleSDK)
        {
            $this->exampleSDK = $exampleSDK;
        }

        public function getName()
        {
            return 'ExampleSDK';
        }

        /**
         * Get the gateway parameters.
         *
         * @return array
         */
        public function getDefaultParameters()
        {
            return array(
                'apiKey' => '',
            );
        }

        /**
         * Get the gateway API Key.
         *
         * Authentication is by means of a single secret API key set as
         * the apiKey parameter when creating the gateway object.
         *
         * @return string
         */
        public function getApiKey()
        {
            return $this->getParameter('apiKey');
        }

        /**
         * @param $value
         *
         * @return $this
         */
        public function setApiKey($value)
        {
            return $this->setParameter('apiKey', $value);
        }

        /**
         * @return $this
         */
        public function getMethodEndPoint()
        {
            $this->exampleSDK->getMethodEndPoint();
            return $this;

        }

        /**
         * @return $this
         */
        public function postMethodEndPoint()
        {
            $this->exampleSDK->getMethodEndPoint();
            return $this;
        }
    }