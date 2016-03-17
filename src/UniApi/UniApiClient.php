<?php

    namespace UniApi;

    use UniApi\Common\FacadeFactory;

    /**
     * Class UniApiClient
     *
     * @package UniApi
     */
    class UniApiClient
    {

        /**
         * Internal factory storage
         *
         * @var FacadeFactory
         */
        private static $factory;

        /**
         * Get the Facade Factory
         *
         * Creates a new empty FacadeFactory if none has been set previously.
         *
         * @return FacadeFactory
         */
        public static function getFactory()
        {
            if (is_null(static::$factory)) {
                static::$factory = new FacadeFactory;
            }

            return static::$factory;
        }

        /**
         * Set the Facade Factory
         *
         * @param FacadeFactory $factory
         */
        public static function setFactory(FacadeFactory $factory = null)
        {
            static::$factory = $factory;
        }

        /**
         * @param $method
         * @param $parameters
         *
         * @return mixed
         */
        public static function __callStatic($method, $parameters)
        {
            $factory = static::getFactory();

            return call_user_func_array(array($factory, $method), $parameters);
        }
    }
