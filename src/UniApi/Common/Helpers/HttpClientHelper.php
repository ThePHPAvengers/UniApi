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
         * Push raw options to request options
         *
         * ['key' => 'value','foo' => 'bar']
         *
         * @param array $options
         * @param array $newOptions
         *
         * @return int
         */
        protected function addOptions(array $options,array $newOptions)
        {
            return array_push($options,$newOptions);
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
        protected function addCookieOption(array $options,CookieJar $cookieJar)
        {
            return array_push($options,['cookies' => $cookieJar]);
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
        protected function setRedirectFalseOption(array $options)
        {
            $options['allow_redirects'] = false;
            return $options;
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
            $options['allow_redirects'] = $redirectOptions;
            return $options;
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
        protected function addHttpAuthOption(array $options,array $credentials)
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
        protected function addHttpAuthDigestOption(array $options,array $digestCredentials)
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
         * Set request to debug
         *
         * @param array $options
         * @param $debug
         *
         * @return int
         */
        protected function setDebug(array $options,$debug)
        {
            return array_push($options,['debug' => $debug]);
        }

        protected function
    }