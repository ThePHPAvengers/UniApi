<?php

    /**
     * Created by PhpStorm.
     * User: jkirkby91
     * Date: 16/03/2016
     */

    namespace UniApi;

    use UniApi\HttpClient;
    use Psr\Log\LoggerInterface;
    use GuzzleHttp\ClientInterface;
    use GuzzleHttp\Client as GuzzleClient;

    /**
     * Class Client
     *
     * @package UniApi
     */
    abstract class abstractClient {

        /**
         * @var
         */
        public $response;

        /**
         * @var HttpClient
         */
        public $transport;

        /**
         */
        public function __construct()
        {
            $this->transport = $this->createHttpClient();
       //     $this->response = new ClientResponse;
        }

        /** @return HttpClient */
        private function createHttpClient(ClientInterface $transport = null)
        {
            $httpClient = new HttpClient($transport ?: new GuzzleClient());
//            $httpClient->setCaBundle($this->caBundle);
//            $httpClient->setLogger($this->logger);
            return $httpClient;
        }

        /**
         * @return mixed
         */
//        private function createResponseClient()
//        {
//
//            return $responseClient;
//        }
    }