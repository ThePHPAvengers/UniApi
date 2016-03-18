<?php

    namespace UniApi\Common\Helpers;

    use UniApi\Common\Exception\RuntimeException;
    use UniApi\Common\Helpers\CommonHelper;

    class HandlerHelper {

        const JSON    = 'application/json';
        const XML     = 'application/xml';
        const XHTML   = 'application/html+xml';
        const FORM    = 'application/x-www-form-urlencoded';
        const UPLOAD  = 'multipart/form-data';
        const PLAIN   = 'text/plain';
        const JS      = 'text/javascript';
        const HTML    = 'text/html';
        const YAML    = 'application/x-yaml';
        const CSV     = 'text/csv';

        /**
         * Map short name for a mime type
         * to a full proper mime type
         */
        public static $mimes = array(
            'json'          => self::JSON,
            'xml'           => self::XML,
            'form'          => self::FORM,
            'plain'         => self::PLAIN,
            'text'          => self::PLAIN,
            'upload'        => self::UPLOAD,
            'html'          => self::HTML,
            'xhtml'         => self::XHTML,
            'js'            => self::JS,
            'javascript'    => self::JS,
            'yaml'          => self::YAML,
            'csv'           => self::CSV
        );

        /**
         * @param $shortName
         *
         * @return mixed
         */
        public static function getFullMime($shortName)
        {
            return array_key_exists($shortName, self::$mimes) ? self::$mimes[$shortName] : $shortName;
        }

        /**
         * @param $shortName
         *
         * @return bool
         */
        public static function supportsMimeType($shortName)
        {
            return array_key_exists($shortName, self::$mimes);
        }

        public static function getHandler($handlerShortName)
        {
            $helper = new CommonHelper;

            $handlerClassName = $helper::getHandlerClassName($handlerShortName);

            if (!class_exists($handlerClassName)) {
                throw new RuntimeException("Class '$handlerClassName' not found");
            }
            return new $handlerClassName();
        }
    }