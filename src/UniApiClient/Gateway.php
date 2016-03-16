<?php

    /**
     * Created by PhpStorm.
     * User: jkirkby91
     * Date: 10/03/2016
     * Time: 17:15
     */

    namespace UniApiClient;

    use UniApiClient\Registry\MimeTypes;
    use GuzzleHttp\Client as GuzzleClient;
    use UniApiClient\Helpers\MimeHandlers\CsvHandler;
    use UniApiClient\Helpers\MimeHandlers\XmlHandler;
    use UniApiClient\Helpers\MimeHandlers\JsonHandler;
    use UniApiClient\Helpers\MimeHandlers\FormHandler;
    use UniApiClient\Helpers\MimeHandlers\HandlerAdapter;


    /**
     * Class Gateway
     *
     * @package UniApiClient
     */
    class Gateway extends Client
    {
        public $registered = false;
        public $mimeRegistrar = array();

        public function __Construct()
        {
            parent::__construct();
            $this->registerHandlers(new MimeTypes());
        }

        /**
         * Register default mime handlers.  Is idempotent.
         */
        protected function registerHandlers(MimeTypes $mimeTypes)
        {
            if ($this->registered === true) {
                return;
            }
            // @TODO create some kind of factory pattern
            $handlers = array(
                $mimeTypes::JSON => new JsonHandler,
                $mimeTypes::XML  => new XmlHandler,
                $mimeTypes::FORM => new formHandler,
                $mimeTypes::CSV  => new CsvHandler,
            );
            foreach ($handlers as $mime => $handler) {
                // Don't overwrite if the handler has already been registered
                if ($this->hasParserRegistered($mime))
                    continue;
                $this->register($mime, $handler);
            }
            $this->registered = true;
        }

        /**
         * Does this particular Mime Type have a parser registered
         * for it?
         * @param string $mimeType
         * @return bool
         */
        protected function hasParserRegistered($mimeType)
        {
            return isset($this->mimeRegistrar[$mimeType]);
        }

        /**
         * @param $mimeType
         * @param HandlerAdapter $handler
         */
        protected function register($mimeType, HandlerAdapter $handler)
        {
            $this->mimeRegistrar[$mimeType] = $handler;
        }
    }
