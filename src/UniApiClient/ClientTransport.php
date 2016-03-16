<?php

    /**
     * Created by PhpStorm.
     * User: Satoshi
     * Date: 16/03/2016
     * Time: 17:21
     */

    namespace UniApiClient;

    use GuzzleHttp\Psr7\Request;
    use Psr\Log\LoggerInterface;
    use GuzzleHttp\RequestOptions;
    use GuzzleHttp\ClientInterface;
    use Psr\Http\Message\RequestInterface;
    use UniApiClient\Exception\HttpException;
    use UniApiClient\Helpers\TransportHelper;
    use GuzzleHttp\Exception\RequestException;
    use UniApiClient\Interfaces\TransportInterface;

    /**
     * Class ClientTransport
     *
     * @package UniApiClient
     */
    class ClientTransport extends Client implements TransportInterface {

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
         * @var
         */
        private $caBundle;

        /** @var LoggerInterface */
        private $logger;

        /** @var RequestInterface */
        private $lastRequest;

        /** @var ResponseInterface */
        private $lastResponse;

        /**
         * @var \GuzzleHttp\ClientInterface
         */
        public $transport;

        /**
         */
        public function __construct(ClientInterface $transport)
        {
            $this->transport = $transport;
        }

        /**
         * @return mixed
         */
        public function getCaBundle()
        {
            return $this->caBundle;
        }

        /**
         * @param $caBundle
         */
        public function setCaBundle($caBundle)
        {
            $this->caBundle = $caBundle;
        }

        /**
         * @return LoggerInterface
         */
        public function getLogger()
        {
            return $this->logger;
        }

        /**
         * @param LoggerInterface $logger
         */
        public function setLogger(LoggerInterface $logger = null)
        {
            $this->logger = $logger;
        }

        /**
         * @return RequestInterface
         */
        public function getLastRequest()
        {
            return $this->lastRequest;
        }

        /**
         * @return ResponseInterface
         */
        public function getLastResponse()
        {
            return $this->lastResponse;
        }

        /**
         * @return array
         */
        public function safeMethods()
        {
            return array(self::HEAD, self::GET, self::PTIONS, self::TRACE);
        }

        /**
         * @param $method
         *
         * @return bool
         */
        public function isUnsafeMethod($method)
        {
            return !in_array($method, $this->safeMethods());
        }

        /**
         * @param $payload
         * @param $endpoint
         *
         * @return mixed
         */
        public function get($endpoint)
        {
            return $this->request(self::GET,null,$endpoint);
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
//        public function trace($payload,$endpoint){}

        /**
         * @param $payload
         * @param $endpoint
         *
         * @return mixed
         */
//        public function options($payload,$endpoint){}

        /**
         * @param $payload
         * @param $endpoint
         *
         * @return mixed
         */
//        public function connect($payload,$endpoint){}

        /**
         * @param $payload
         * @param $endpoint
         *
         * @return mixed
         */
//        public function patch($payload,$endpoint){}

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
         * @param array $params
         *
         * @return \Psr\Http\Message\ResponseInterface
         * @throws
         */
        private function send(RequestInterface $request, array $params = [])
        {
            $this->lastRequest = $request;
            $options = $this->prepareOptions(
                $request->getMethod(),
                $request->getRequestTarget(),
                $params
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