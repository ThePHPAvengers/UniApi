<?php

    /**
     * Created by PhpStorm.
     * User: jkirkby91
     * Date: 10/03/2016
     * Time: 17:15
     */

    namespace UniApiClient;

    use GuzzleHttp\Psr7\Request;
    use Psr\Log\LoggerInterface;
    use GuzzleHttp\RequestOptions;
    use GuzzleHttp\ClientInterface;
    use Psr\Http\Message\RequestInterface;
    use UniApiClient\Helpers\TransportHelper;
    use GuzzleHttp\Exception\RequestException;
    use UniApiClient\Interfaces\RequestMethodInterface;

    /**
     * Class HttpTransportClient
     *
     * @package UniApiClient
     */
    class HttpTransportClient implements RequestMethodInterface {

        use TransportHelper;

        const HEAD      = 'HEAD';
        const GET       = 'GET';
        const POST      = 'POST';
        const PUT       = 'PUT';
        const DELETE    = 'DELETE';
        const PATCH     = 'PATCH';
        const OPTIONS   = 'OPTIONS';
        const TRACE     = 'TRACE';

        /**
         * @return array
         */
        public function safeMethods()
        {
            return array(self::HEAD, self::GET, self::OPTIONS, self::TRACE);
        }

        /**
         * @param $method
         *
         * @return bool
         */
        public function isUnsafeMethod($method)
        {
            return !in_array($method, self::safeMethods());
        }

        /**
         * @param $payload
         * @param $endpoint
         *
         * @return mixed
         */
        public function get($payload,$endpoint)
        {
            return $this->request(self::GET,$payload,$endpoint);
        }

        /**
         * @param $payload
         * @param $endpoint
         *
         * @return mixed
         */
        public function head($payload,$endpoint)
        {
            return $this->request(self::HEAD,$payload,$endpoint);
        }

        /**
         * @param $payload
         * @param $endpoint
         *
         * @return mixed
         */
        public function post($payload,$endpoint)
        {
            return $this->request(self::POST, $payload,$endpoint);
        }

        /**
         * @param $payload
         * @param $endpoint
         *
         * @return mixed
         */
        public function put($payload,$endpoint)
        {
            return $this->request(self::PUT, $payload,$endpoint);
        }

        /**
         * @param $payload
         * @param $endpoint
         *
         * @return mixed
         */
        public function delete($payload,$endpoint)
        {
            return $this->request(self::DELETE, $payload,$endpoint);
        }

        /**
         * @param $payload
         * @param $endpoint
         *
         * @return mixed|void
         */
        public function trace($payload,$endpoint)
        {

        }

        /**
         * @param $payload
         * @param $endpoint
         *
         * @return mixed
         */
        public function options($payload,$endpoint){

        }

        /**
         * @param $payload
         * @param $endpoint
         *
         * @return mixed
         */
        public function connect($payload,$endpoint){

        }

        /**
         * @param $payload
         * @param $endpoint
         *
         * @return mixed
         */
        public function patch($payload,$endpoint){

        }

        /**
         * @param $method
         * @param $payload
         * @param $endpoint
         *
         * @return mixed
         */
        public function custom($method,$payload,$endpoint)
        {
            return $this->request($method,$payload,$endpoint);
        }

        /**
         * @param $method
         * @param $endpoint
         * @param $payload
         *
         * @return mixed
         */
        private function request($method,$payload,$endpoint)
        {
            if ('GET' === $method) {
                $endpoint = $this->prepareQueryString($endpoint, $payload);
            }
            $request = new Request($method, $this->prepareUrl($endpoint));
            return $this->send($request, $payload);
        }

        /**
         * @param RequestInterface $request
         * @param array $payload
         *
         * @return mixed
         * @throws
         */
        private function send(RequestInterface $request, $payload)
        {
            $this->lastRequest = $request;
            $options = $this->prepareOptions(
                $request->getMethod(),
                $request->getRequestTarget(),
                $payload
            );
            try {
                $this->lastResponse = $response = $this->transport->send($request, $options);
            } catch (RequestException $e) {
                throw HttpException::wrap($e);
            }
            if ($this->logger) {
                $this->logWarnings($response);
            }
            return $response;
        }
    }