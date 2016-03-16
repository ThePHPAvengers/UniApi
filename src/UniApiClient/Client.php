<?php

    /**
     * Created by PhpStorm.
     * User: jkirkby91
     * Date: 16/03/2016
     */

    namespace UniApiClient;

    class Client extends MimeTypes {

        public $response;
        public $transport;

        public function __construct()
        {
            $this->transport = ClientTransport::getInstance();
            $this->response = ClientResponse::getInstance();;
        }
    }