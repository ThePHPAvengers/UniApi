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
    use UniApiClient\Helpers\TransportHelper;
    use GuzzleHttp\Exception\RequestException;
    use UniApiClient\Exception\SingletonPatternViolationException;

    class ClientTransport {

        /**
         * @var Singleton reference to singleton instance
         */
        private static $instance;

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
         * gets the instance via lazy initialization (created on first usage).
         *
         * @return self
         */
        public static function getInstance()
        {
            if (null === static::$instance) {
                static::$instance = new static();
            }
            return static::$instance;
        }

        /**
         * is not allowed to call from outside: private!
         */
        private function __construct(){}

        /**
         * prevent the instance from being cloned.
         *
         * @throws SingletonPatternViolationException
         *
         * @return void
         */
        final public function __clone()
        {
            throw new SingletonPatternViolationException('This is a Singleton. Clone is forbidden');
        }

        /**
         * prevent from being unserialized.
         *
         * @throws SingletonPatternViolationException
         *
         * @return void
         */
        final public function __wakeup()
        {
            throw new SingletonPatternViolationException('This is a Singleton. __wakeup usage is forbidden');
        }

        /**
         * @return array
         */
        public static function safeMethods()
        {
            return array(self::HEAD, self::GET, self::OPTIONS, self::TRACE);
        }

        /**
         * @param $method
         *
         * @return bool
         */
        public static function isUnsafeMethod($method)
        {
            return !in_array($method, self::safeMethods());
        }

        /**
         * @param $payload
         * @param $endpoint
         *
         * @return mixed
         */
        public static function get($payload,$endpoint)
        {
            return self::request(self::GET,$payload,$endpoint);
        }

        /**
         * @param $payload
         * @param $endpoint
         *
         * @return mixed
         */
        public static function head($payload,$endpoint)
        {
            return self::request(self::HEAD,$payload,$endpoint);
        }

        /**
         * @param $payload
         * @param $endpoint
         *
         * @return mixed
         */
        public static function post($payload,$endpoint)
        {
            return self::request(self::POST, $payload,$endpoint);
        }

        /**
         * @param $payload
         * @param $endpoint
         *
         * @return mixed
         */
        public static function put($payload,$endpoint)
        {
            return self::request(self::PUT, $payload,$endpoint);
        }

        /**
         * @param $payload
         * @param $endpoint
         *
         * @return mixed
         */
        public static function delete($payload,$endpoint)
        {
            return self::request(self::DELETE, $payload,$endpoint);
        }

        /**
         * @param $payload
         * @param $endpoint
         *
         * @return mixed|void
         */
        public static function trace($payload,$endpoint)
        {

        }

        /**
         * @param $payload
         * @param $endpoint
         *
         * @return mixed
         */
        public static function options($payload,$endpoint){

        }

        /**
         * @param $payload
         * @param $endpoint
         *
         * @return mixed
         */
        public static function connect($payload,$endpoint){

        }

        /**
         * @param $payload
         * @param $endpoint
         *
         * @return mixed
         */
        public static function patch($payload,$endpoint){

        }

        /**
         * @param $method
         * @param $payload
         * @param $endpoint
         *
         * @return mixed
         */
        public static function custom($method,$payload,$endpoint)
        {
            return self::request($method,$payload,$endpoint);
        }

        /**
         * @param $method
         * @param $endpoint
         * @param $payload
         *
         * @return mixed
         */
        private static function request($method,$payload,$endpoint)
        {
            if ('GET' === $method) {
                $endpoint = self::prepareQueryString($endpoint, $payload);
            }
            $request = new Request($method, self::prepareUrl($endpoint));
            return self::send($request, $payload);
        }

        /**
         * @param RequestInterface $request
         * @param array $payload
         *
         * @return mixed
         * @throws
         */
        private static function send(RequestInterface $request, $payload)
        {
            self::lastRequest = $request;
            $options = self::prepareOptions(
                $request->getMethod(),
                $request->getRequestTarget(),
                $payload
            );
            try {
                self::lastResponse = $response = self::transport->send($request, $options);
        } catch (RequestException $e) {
                throw HttpException::wrap($e);
            }
            if (self::logger) {
                self::logWarnings($response);
            }
            return $response;
        }

    }