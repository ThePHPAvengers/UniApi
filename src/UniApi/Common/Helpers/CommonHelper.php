<?php

    namespace UniApi\Common\Helpers;

    use InvalidArgumentException;

    /**
     * Class CommonHelper
     *
     * @package UniApi\Common\Helpers
     */
    class CommonHelper
    {
        /**
         * @param $str
         *
         * @return mixed
         */
        public static function camelCase($str)
        {
            $str = self::convertToLowercase($str);
            return preg_replace_callback(
                '/_([a-z])/',
                function ($match) {
                    return strtoupper($match[1]);
                },
                $str
            );
        }

        /**
         * @param $str
         *
         * @return string
         */
        protected static function convertToLowercase($str)
        {
            $explodedStr = explode('_', $str);

            if (count($explodedStr) > 1) {
                foreach ($explodedStr as $value) {
                    $lowercasedStr[] = strtolower($value);
                }
                $str = implode('_', $lowercasedStr);
            }

            return $str;
        }

        protected static function getRootNameSpace()
        {
            $nameSpace = explode('\\',__NAMESPACE__);

            return $nameSpace[0];
        }

        /**
         * @param $target
         * @param $parameters
         */
        public static function initialize($target, $parameters)
        {
            if (is_array($parameters)) {
                foreach ($parameters as $key => $value) {
                    $method = 'set'.ucfirst(static::camelCase($key));
                    if (method_exists($target, $method)) {
                        $target->$method($value);
                    }
                }
            }
        }

        /**
         * @param $className
         *
         * @return string
         */
        public static function getShortName($className)
        {
            ddd(self::getRootNameSpace());
            if (0 === strpos($className, '\\')) {
                $className = substr($className, 1);
            }

            if (0 === strpos($className, 'UniApi\\')) {
                return trim(str_replace('\\', '_', substr($className, 8, -7)), '_');
            }

            return '\\'.$className;
        }

        /**
         * @param $shortName
         *
         * @return string
         */
        public function getFacadeClassName($shortName)
        {
            if (0 === strpos($shortName, '\\')) {
                return $shortName;
            }

            // replace underscores with namespace marker, PSR-0 style
            $psr0name = str_replace('_', '\\', $shortName);
            if (false === strpos($psr0name, '\\')) {
                $psr0name .= '\\';
            }
            return '\\'. __NAMESPACE__ . '\\'.$psr0name.$shortName.'Facade';
        }

        /**
         * @param $shortName
         *
         * @return string
         */
        public static function getSDKClassName($shortName)
        {
            if (0 === strpos($shortName, '\\')) {
                return $shortName;
            }

            // replace underscores with namespace marker, PSR-0 style
            $psr0name = str_replace('_', '\\', $shortName);
            if (false === strpos($psr0name, '\\')) {
                $psr0name .= '';
            }

            return '\\UniApi\\'.$psr0name.'\\'.$psr0name;
        }
    }
