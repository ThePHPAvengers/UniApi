<?php

    /**
     * Created by PhpStorm.
     * User: jkirkby91
     * Date: 16/03/2016
     */

    namespace UniApiClient;

    use Psr\Log\LoggerInterface;
    use GuzzleHttp\ClientInterface;
    use UniApiClient\ClientResponse;
    use UniApiClient\ClientTransport;
    use UniApiClient\Registry\MimeTypes;
    use GuzzleHttp\Client as GuzzleClient;

    /**
     * Class Client
     *
     * @package UniApiClient
     */
    class Client extends MimeTypes {

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
            $httpClient = new ClientTransport($transport ?: new GuzzleClient());
            $httpClient->setCaBundle($this->caBundle);
            $httpClient->setLogger($this->logger);
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