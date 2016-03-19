<?php

    namespace UniApi\Common;

    use GuzzleHttp;
    use GuzzleHttp\Psr7;
    use Psr\Http\Message\ResponseInterface;
    use GuzzleHttp\Exception\RequestException;
    use UniApi\Common\Helpers\HttpClientHelper;
    use UniApi\Common\Helpers\ResponseCodeHelper;
    use UniApi\Common\Message\HttpMethodInterface;

    /**
     * Class HttpClient
     *
     * @package UniApi\Common
     */
    class HttpClient implements HttpMethodInterface
    {
        use HttpClientHelper, ResponseCodeHelper;

        const HEAD      = 'HEAD';
        const GET       = 'GET';
        const POST      = 'POST';
        const PUT       = 'PUT';
        const DELETE    = 'DELETE';
        const PATCH     = 'PATCH';
        const OPTIONS   = 'OPTIONS';
        const TRACE     = 'TRACE';

        /** @var LoggerInterface */
        private $logger;

        /** @var RequestInterface */
        private $lastRequest;

        /** @var ResponseInterface */
        private $lastResponse;

        /** @var \GuzzleHttp\ClientInterface */
        public $transport;

        /**
         * Default Options Array
         * @var array
         */
        public static $defaultOptions = [
            'headers' => [
                'User-Agent' => 'UniApiClient/0.0.1',
            ],
            'debug'             => false,
            'verify'            => true,
            'version'           => 1.0,
            'http_errors'       => true,
            'allow_redirects'   => false,
            'Accept-Encoding'   => 'gzip'
        ];

        /** @var */
        public $options;

        public function __construct()
        {
            //set default options
            $this->options = self::$defaultOptions;
            $this->transport = new GuzzleHttp\Client();
        }

        /** @param LoggerInterface $logger */
        public function setLogger(LoggerInterface $logger = null)
        {
            $this->logger = $logger;
        }

        /** @return RequestInterface */
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
            return $this->prepareRequest(self::GET,$uri,$headers,null);
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
            return $this->prepareRequest(self::POST,$uri,$headers,$body);
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
            return $this->prepareRequest(self::HEAD,$uri,$headers,$body);
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
            return $this->prepareRequest(self::PUT,$uri,$headers,$body);
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
            return $this->prepareRequest(self::DELETE,$uri,$headers,$body);
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
            return $this->prepareRequest(self::OPTIONS,$uri,$headers,$body);
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
            return $this->prepareRequest(self::PATCH,$uri,$headers,$body);
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
            return $this->prepareRequest($method,$uri,$headers,$body);
        }

        /**
         * @param $method
         * @param $uri
         * @param array $headers
         * @param null $body
         *
         * @return mixed
         */
        private function prepareRequest($method,$uri,array $headers,$body)
        {
            try {
                return $this->sendRequest(new Psr7\Request($method,$uri,$headers,$body));
            } catch (\Exception $e)
            {
                return json_encode(['responseCode' => $e->getCode(),'responseBody' => $e->getMessage()]);
            }
        }

        /**
         * @param Psr7\Request $request
         *
         * @return mixed|ResponseInterface|string
         */
        public function sendRequest(Psr7\Request $request)
        {
            $this->lastRequest = $request;

            //try make out request
            try {
                $this->lastResponse = $response = $this->transport->send($request);
            } catch (RequestException $e) {
                return json_encode(['responseCode' => $e->getCode(),'responseBody' => $e->getMessage()]);
            }

            //analyse response code
            try {
                $this->responseCodeAnalyser($response,$request);
            } catch (\Exception $e) {
                return json_encode(['responseCode' => $e->getCode(),'responseBody' => $e->getMessage()]);
            }
            $responseBody = json_decode($response->getBody()->getContents(),true);
            return json_encode(['responseCode' => $response->getStatusCode(),'responseBody' => json_decode($responseBody['data'],true)]);
        }
    }