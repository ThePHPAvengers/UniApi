<?php

    namespace UniApi\Common\Helpers;

    use GuzzleHttp\Cookie\CookieJar;

    /**
     * Class HttpClientHelper
     *
     * @package UniApi\Common\Helpers
     */
    trait HttpClientHelper
    {

        /**
         * @param $key
         *
         * @return mixed
         */
        public function getAttribute($key)
        {
            return $this->$key;
        }

        /**
         * Push raw options to request options
         *
         * ['key' => 'value','foo' => 'bar']
         *
         * @param array $options
         * @param array $newOptions
         *
         * @return int
         */
        protected function setOptions(array $options,array $newOptions)
        {
            return array_push($options,$newOptions);
        }

        public function setHeaders(array $options,array $headers)
        {
            return array_push($options['headers'],$headers);
        }

        /**
         * Add cookies to request
         *
         * Must be an instance of guzzle cookie jar class
         *
         * @param array $options
         * @param CookieJar $cookieJar
         *
         * @return mixed
         */
        protected function setCookieOption(array $options,CookieJar $cookieJar)
        {
            return array_push($options,['cookies' => $cookieJar]);
        }

        /**
         * Set allow redirects to true with options
         *
         *    [
         *       'max'             => 10,               // allow at most 10 redirects.
         *       'strict'          => true,             // use "strict" RFC compliant redirects.
         *       'referer'         => true,             // add a Referer header
         *       'protocols'       => ['https','http'], // protocols to follow
         *       'track_redirects' => true
         *   ]
         *
         * @param array $options
         * @param array $redirectOptions
         *
         * @return array
         */
        protected function setRedirectsTrueOption(array $options,array $redirectOptions)
        {
            return array_push($options['allow_redirects'],$redirectOptions);
        }

        /**
         * Add http auth headers
         *
         * $credentials['username', 'password']
         *
         * @param array $options
         * @param array $credentials
         *
         * @return int
         */
        protected function setHttpAuthOption(array $options,array $credentials)
        {
            return array_push($options,['auth' => $credentials]);
        }

        /**
         * Add http digest auth headers
         *
         * $digestCredentials['username', 'password', 'digest']
         *
         * @param array $options
         * @param array $digestCredentials
         *
         * @return int
         */
        protected function setHttpAuthDigestOption(array $options,array $digestCredentials)
        {
            return array_push($options,['auth' => $digestCredentials]);
        }

        /**
         * Set a self signed cert
         *
         * $sslBundle['/path/server.pem', 'password']
         *
         * @param array $options
         * @param array $sslBundle
         *
         * @return int
         */
        protected function setSSLCertBundle(array $options,array $sslBundle)
        {
            return array_push($options,['cert' => $sslBundle]);
        }

        /**
         * Set request timeout
         *
         * @param array $options
         * @param $timeOut
         *
         * @return int
         */
        protected function setConnectTimeout(array $options,$timeOut)
        {
            return array_push($options,['connect_timeout' => floatval($timeOut)]);
        }

        /**
         * Use to proxy request
         *
         *  $proxy[
         *       'http'  => 'tcp://localhost:8125', // Use this proxy with "http"
         *       'https' => 'tcp://localhost:9124', // Use this proxy with "https",
         *      'no' => ['.mit.edu', 'foo.com']    // Don't use a proxy with these
         *       ]
         *
         * You can provide proxy URLs that contain a scheme, username, and password. For example, "http://username:password@192.168.16.1:10".
         *
         * @param array $options
         * @param array $proxy
         *
         * @return int
         */
        protected function setProxy(array $options,array $proxy)
        {
            return array_push($options,['proxy' => $proxy]);
        }

        /**
         * Set request to debug
         *
         * @param array $options
         * @param $debug
         *
         * @return int
         */
        protected function overwriteDebug(array $options,$debug)
        {
            $options['debug'] = $debug;
            return $options;
        }

        /**
         * @param array $options
         * @param $bool
         *
         * @return array
         */
        protected function overwriteVerifyPeer(array $options, $bool)
        {
            $options['verify'] = $bool;
            return $options;
        }

        /**
         * @param array $options
         * @param $version
         *
         * @return array
         */
        protected function overwriteVersion(array $options, $version)
        {
            $options['version'] = $version;
            return $options;
        }

        /**
         * Sets allow redirects to false
         *
         * false is the default value
         *
         * @param array $options
         *
         * @return array
         */
        protected function overwriteRedirectFalseOption(array $options)
        {
            $options['allow_redirects'] = false;
            return $options;
        }

        /**
         * @param array $options
         * @param $encoding
         *
         * @return array
         */
        protected function overwriteAcceptEncodingOption(array $options,$encoding)
        {
            $options['Accept-Encoding'] = $encoding;
            return $options;
        }
    }