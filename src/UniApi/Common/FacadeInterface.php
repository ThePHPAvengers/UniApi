<?php
    /**
     * SDK implementation interface
     */
    namespace UniApi\Common;
    /**
     * Interface GatewayInterface
     *
     * @package UniApi\Common
     */
    interface FacadeInterface
    {
        /**
         * Get gateway display name
         *
         * This can be used by carts to get the display name for each gateway.
         */
        public function getName();

        /**
         * Get gateway short name
         *
         * This name can be used with GatewayFactory as an alias of the gateway class,
         * to create new instances of this gateway.
         */
        public function getShortName();

        /**
         * Initialize gateway with parameters
         */
        public function initialize(array $parameters = array());
    }