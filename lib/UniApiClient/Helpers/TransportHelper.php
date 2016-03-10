<?php

    /**
     * Created by PhpStorm.
     * User: jkirkby91
     * Date: 10/03/2016
     * Time: 17:30
     */

    namespace UniApiClient\Helpers;

    /**
     * Class TransportHelper
     *
     * @package UniApiClient\Helpers
     */
    trait TransportHelper {

        /**
         * @param $path
         * @param array $params
         *
         * @return string
         */
        private function prepareQueryString($path, array &$params = [])
        {
            if (!$params) {
                return $path;
            }
            // omit two_factor_token
            $query = array_diff_key($params, [Param::TWO_FACTOR_TOKEN => true]);
            $params = array_intersect_key($params, [Param::TWO_FACTOR_TOKEN => true]);
            $path .= false === strpos($path, '?') ? '?' : '&';
            $path .= http_build_query($query, '', '&');
            return $path;
        }

        /**
         * @param $path
         *
         * @return string
         */
        private function prepareUrl($path)
        {
            return $this->apiUrl.'/'.ltrim($path, '/');
        }

        /**
         * @param $method
         * @param $path
         * @param array $params
         *
         * @return array
         */
        private function prepareOptions($method, $path, array $params = [])
        {
            $options = [];
            if ($this->caBundle) {
                $options[RequestOptions::VERIFY] = $this->caBundle;
            }
            // omit two_factor_token
            $data = array_diff_key($params, [Param::TWO_FACTOR_TOKEN => true]);
            if ($data) {
                $options[RequestOptions::JSON] = $data;
                $body = json_encode($data);
            } else {
                $body = '';
            }
            $defaultHeaders = [
                'User-Agent' => 'coinbase/php/'.Client::VERSION,
                'CB-VERSION' => $this->apiVersion,
            ];
            if (isset($params[Param::TWO_FACTOR_TOKEN])) {
                $defaultHeaders['CB-2FA-TOKEN'] = $params[Param::TWO_FACTOR_TOKEN];
            }
            $options[RequestOptions::HEADERS] = $defaultHeaders + $this->auth->getRequestHeaders(
                    $method,
                    $path,
                    $body
                );
            return $options;
        }

    }