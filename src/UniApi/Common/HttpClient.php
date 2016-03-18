<?php

    namespace UniApi\Common;

    use GuzzleHttp;
    use GuzzleHttp\Psr7;
    use UniApi\Common\Exception\HttpException;
    use GuzzleHttp\Exception\RequestException;
    use UniApi\Common\Message\MessageInterface;
    use UniApi\Common\Message\HttpMethodInterface;

    /**
     * Class HttpClient
     *
     *   $payload = [
     *      'headers' => array(),
     *      'body'    => $payloadBody,
     *      'version' => $httpVersion
     *   ]
     *
     * @package UniApi
     */
    class HttpClient implements HttpMethodInterface {

        const HEAD      = 'HEAD';
        const GET       = 'GET';
        const POST      = 'POST';
        const PUT       = 'PUT';
        const DELETE    = 'DELETE';
        const PATCH     = 'PATCH';
        const OPTIONS   = 'OPTIONS';
        const TRACE     = 'TRACE';

        /** @var */
        private $caBundle;

        /** @var LoggerInterface */
        private $logger;

        /** @var RequestInterface */
        private $lastRequest;

        /** @var ResponseInterface */
        private $lastResponse;

        /** @var \GuzzleHttp\ClientInterface */
        public $transport;

        /**  */
        public function __construct()
        {
            $this->transport = new GuzzleHttp\Client();
        }

        /** @return mixed */
        public function getCaBundle()
        {
            return $this->caBundle;
        }

        /** @param $caBundle */
        public function setCaBundle($caBundle)
        {
            $this->caBundle = $caBundle;
        }

        /** @return LoggerInterface */
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

        /** @return ResponseInterface */
        public function getLastResponse()
        {
            return $this->lastResponse;
        }

        /**
         * @param $uri
         * @param array $headers
         *
         * @return mixed|void
         */
        public function get($uri,array $headers)
        {
            return $this->request(self::GET,$uri,$headers);
        }

        /**
         * @param $uri
         * @param array $headers
         * @param $body
         *
         * @return mixed|void
         */
        public function post($uri,array $headers,$body)
        {
            return $this->request(self::POST,$uri,$headers,$body);
        }

        /**
         * @param $uri
         * @param array $headers
         * @param $body
         *
         * @return mixed|void
         */
        public function head($uri,array $headers,$body)
        {
            return $this->request(self::HEAD,$uri,$headers,$body);
        }

        /**
         * @param $uri
         * @param array $headers
         * @param $body
         *
         * @return mixed|void
         */
        public function put($uri,array $headers,$body)
        {
            return $this->request(self::PUT,$uri,$headers,$body);
        }

        /**
         * @param $uri
         * @param array $headers
         * @param $body
         *
         * @return Psr7\Request|mixed
         */
        public function delete($uri,array $headers,$body)
        {
            return $this->request(self::DELETE,$uri,$headers,$body);

        }

        /**
         * @param $uri
         * @param array $headers
         * @param $body
         *
         * @return Psr7\Request|mixed
         */
        public function options($uri,array $headers,$body)
        {
            return $this->request(self::OPTIONS,$uri,$headers,$body);

        }

        /**
         * @param $uri
         * @param array $headers
         * @param $body
         *
         * @return Psr7\Request|mixed
         */
        public function patch($uri,array $headers,$body)
        {
            return $this->request(self::PATCH,$uri,$headers,$body);

        }

        /**
         * @param $method
         * @param $uri
         * @param array $headers
         * @param $body
         *
         * @return Psr7\Request
         */
        public function custom($method,$uri,array $headers,$body)
        {
            return $this->request($method,$uri,$headers,$body);
        }

        /**
         * @param $method
         * @param $uri
         * @param array $headers
         * @param null $body
         *
         * @return mixed
         */
        private function request($method,$uri,array $headers,$body=null)
        {
            return $this->send(new Psr7\Request($method,$uri,$headers,$body));
        }

        /**
         * @param Psr7\Request $request
         *
         * @return mixed
         * @throws
         */
        public function send(Psr7\Request $request)
        {
            $this->lastRequest = $request;

            try {
                $this->lastResponse = $response = $this->transport->send($request);
            } catch (RequestException $e) {
                throw HttpException::wrap($e);
            }
            return $this->responseAnalyser($response);
        }

        /**
         * @param $response
         *
         * @return mixed
         */
        private function responseAnalyser($response)
        {
            //@TODO check response code against enums
            //@TODO log interface
            return $response;
        }

    }